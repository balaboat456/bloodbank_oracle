<?php
    include('../../connection.php');


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.7.14:60001/Gate/OpenAutoClose",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => $dataPostJson,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
        ),
        ));

        $resultPost = curl_exec($curl);

        curl_close($curl);
        // echo $resultPost;
        $res = json_decode($resultPost);

        foreach($res as $value) {
            // error_log("**********");
            echo json_encode($value->TagID)."," ;
        }


    // $sql = "SELECT bg.bloodgroupname,
    //     SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) prc,
    //     SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lprc,
    //     SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldprc,
    //     SUM(CASE WHEN bs.bloodtype = 'FFP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ffp,
    //     SUM(CASE WHEN bs.bloodtype = 'PC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) pc,
    //     SUM(CASE WHEN bs.bloodtype = 'SDP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp,
    //     SUM(CASE WHEN bs.bloodtype = 'SDP_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp_pas,
    //     SUM(CASE WHEN bs.bloodtype = 'SDR' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdr,
    //     SUM(CASE WHEN bs.bloodtype = 'WB' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) wb,
    //     SUM(CASE WHEN bs.bloodtype = 'LPPC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc,
    //     SUM(CASE WHEN bs.bloodtype = 'LPPC_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc_pas,
    //     SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) cryo
    //     FROM blood_group bg
    //     LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup AND bs.bloodrh in ('Rh+','Rh(D)') AND bs.istypeag != 1
    //     WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) OR bs.bloodstockstatusid = 4 ) 
    //     AND bg.bloodgroupid in ('A','B','O','AB')
    //     GROUP BY bg.bloodgroupid 
    //     ORDER BY bg.bloodgroupid";

    //     $query = mysqli_query($conn,$sql);

    //     $resultArray = array();
    //     while($result = mysqli_fetch_array($query))
    //     {
    //         array_push($resultArray,$result);
    //     }
  
    //     return   $resultArray;

    
    // echo json_encode(
    //     array(
    //         'status' => true,
    //         'data1' => stock1()
    //     )
        
    // );

    mysqli_close($conn);

?>