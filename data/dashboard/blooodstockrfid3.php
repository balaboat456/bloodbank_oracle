<?php
    include('../../connection.php');
    include('../replacestring.php');

    $condition = '';

    $curl = curl_init();

    // echo $gate_rfid_config;

    curl_setopt_array($curl, array(
    CURLOPT_URL => $gate_rfid_config,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
    ),
    ));

    $resultPost = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($resultPost);
    

    $countArray = 0;

    $GateArray =  _group_by($res) ;

    sort($GateArray);

    error_log("=============");
    error_log(json_encode($GateArray));

    $resultArrayObj = array();
    foreach ($GateArray as  $value) {

        
        $TagID = "";
        foreach ($res as $inx => $v) {
            if($v->GateID == $value)
            {
                if(!empty($v->TagID))
                {
                    $countArray++;
                }
                $TagID = $TagID.json_encode($v->TagID).",";
            }
            
        }
        $TagID =  laststring($TagID) ;

        
        
        $sql = "SELECT ABC.* 
FROM
((SELECT bg.bloodgroupname,bg.bloodgroupsort,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'PRC' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) prc,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LPRC' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) lprc,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LPRC-O' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) lprc_o,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) ldprc,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'SDR' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) sdr,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LDSDR' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) ldsdr,
        IFNULL(SUM(CASE WHEN bs.bloodtype NOT IN ('PRC','LPRC','LPRC-O','LDPRC','SDR','LDSDR') AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) other
        FROM blood_group bg
        LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup   AND bs.active <> 0
        AND bs.bloodstockrfid in ($TagID) AND bs.bloodstockrfid != ''
        WHERE (bs.bloodstockstatusid IN (1,4)  OR isnull(bs.bloodstockstatusid) ) 
        AND (bg.bloodgroupid in ('A','B','O','AB'))
        GROUP BY bg.bloodgroupid 
        ORDER BY bg.bloodgroupsort asc)
        UNION
        (SELECT 'Other' AS bloodgroupname,'9999' AS bloodgroupsort,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'PRC' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) prc,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LPRC' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) lprc,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LPRC-O' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) lprc_o,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) ldprc,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'SDR' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) sdr,
        IFNULL(SUM(CASE WHEN bs.bloodtype = 'LDSDR' AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) ldsdr,
        IFNULL(SUM(CASE WHEN bs.bloodtype NOT IN ('PRC','LPRC','LPRC-O','LDPRC','SDR','LDSDR') AND (bs.bloodstockstatusid = 1 OR bs.bloodstockstatusid = 4) THEN 1 ELSE 0 END),0) other
        FROM blood_group bg
        LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup   AND bs.active <> 0
        AND bs.bloodstockrfid in ($TagID)  AND bs.bloodstockrfid != ''
        WHERE (bs.bloodstockstatusid IN (1,4)  OR isnull(bs.bloodstockstatusid) ) 
        AND bg.bloodgroupid not in ('A','B','O','AB')
        ORDER BY bg.bloodgroupsort asc)) ABC ORDER BY ABC.bloodgroupsort ASC
        ";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

        error_log($sql);

        $arr = array(
            'gateid' => $value,
            'data' => $resultArray
        );

        array_push($resultArrayObj,$arr);
        
    }    

    sort($GateArray);
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArrayObj,
            'gatetotal' => $countArray,
            'gatearray' => $GateArray
            
        )
    );

    mysqli_close($conn);


    function _group_by($array) {
        $return = array();
        foreach($array as $val) {
            if(!in_array($val->GateID,$return))
            array_push($return,$val->GateID);
        }
        return $return;
    }
?>