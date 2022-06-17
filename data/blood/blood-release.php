<?php
    include('../../connection.php');

    $condition = '';
    $condition2 = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    // $condition2 = $condition2."  AND M.usedblooddateto BETWEEN '$fromdate' AND '$todate' ";
    $condition2 = $condition2."  AND (CASE WHEN BS.bloodexp <= M.usedblooddateto THEN  (BS.bloodexp BETWEEN '$fromdate' AND '$todate' ) ELSE (M.usedblooddateto BETWEEN '$fromdate' AND '$todate' ) END) ";


    // $condition2 = $condition2."  AND M.usedblooddateto BETWEEN '$fromdate' AND '$todate' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT M.* ,
    CM.bag_number as cm_bag_number,
    BS.bloodstockrfid,
    CM.sub as cm_sub,
    CM.requestbloodcrossmacthid,
    CS.crossmacthresultname,
    CM.seq,
    CM.bloodtype as cm_bloodtype,
    CM.bloodgroupid AS CM_bloodgroupid,
    CM.crossmacthstatusid,
    BS.bloodexp

    FROM (SELECT RB.*,
    PT.patientfullname,
    RH.rhname3,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    RH2.rhname3 AS confirmrhname3,
    PT.patientan,
    PT.ispassedaway,
    PT.isdischarge
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    WHERE true
    $condition
    GROUP BY RB.requestbloodid
    ORDER BY RB.crossmatchdate,RB.crossmatchtime,RB.requestbloodid) M
    LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid
    LEFT JOIN bloodstock BS ON CM.bloodtype = BS.bloodtype AND CM.bag_number = BS.bag_number AND CM.sub = BS.sub AND BS.active <> 0
    LEFT JOIN crossmacth_result CS ON CM.crossmacthresultid = CS.crossmacthresultid
    WHERE ifnull(CM.crossmacthstatusid,'') != 10 AND ifnull(CM.requestbloodreturnstatusid,'') != 3
    AND CM.ispayblood != 1
    AND IFNULL(CM.isautocontrol,'') != 1
    $condition2

    ORDER BY M.requestblooddate , M.requestbloodtime
    "
    
    ;
    $query = mysqli_query($conn,$sql);

    error_log($sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }
    
   

    $seq = 1;
    $idmain = '';
    $i = 0;
    for ($x = 0; $x < count($resultArray); $x++) {
        if($resultArray[$x]['requestbloodid'] != $idmain)
        {
            $i = $x;
            $seq = 1;
        }else
        {
            $seq = $seq+1;
        }
        $resultArray[$x]['seq'] = $seq;
        $idmain = $resultArray[$x]['requestbloodid'];
    }

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>