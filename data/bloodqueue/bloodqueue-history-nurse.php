<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";

    if(!empty($hn))
    $condition = $condition." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT MM.* ,
	SUM(CASE WHEN CM.crossmacthstatusid IN (5,6,7,8,9)  THEN 1 ELSE 0 END) AS pay_success,
	SUM(CASE WHEN IFNULL(CM.crossmacthstatusid,0) NOT IN (0,10,11)   THEN 1 ELSE 0 END) AS cross_qty,
	COUNT(*) AS total_cross_qty,
	SUM(CASE WHEN CM.crossmacthstatusid != 11 AND CM.crossmacthstatusid != 10 AND CM.ispayblood != 1 AND ((TIMESTAMPDIFF(DAY,DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 543 YEAR),'%Y-%m-%d'), MM.usedblooddateto)) < 0)   THEN 1 ELSE 0 END) AS wait_refund
FROM (SELECT RB.*,
    PT.patientfullname,
    RH.rhname3,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    RH2.rhname3 AS confirmrhname3,
    ST.requestbloodstatusname,
    CONCAT(GROUP_CONCAT(DISTINCT IFNULL(RC.requestbloodcancelname,'') SEPARATOR '  '), '  ', IFNULL(RB.requestbloodcancelother,'')) AS requestbloodcancelnamegroup
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    LEFT JOIN request_blood_status ST ON RB.requestbloodstatusid = ST.requestbloodstatusid
    LEFT JOIN request_blood_cancel_item RCI ON RB.requestbloodid =  RCI.requestbloodid
    LEFT JOIN request_blood_cancel RC ON RCI.requestbloodcancelid = RC.requestbloodcancelid
    WHERE RB.hn =  '$hn'
    GROUP BY RB.requestbloodid
    ORDER BY RB.crossmatchdate,RB.crossmatchtime,RB.requestbloodid) MM
    LEFT JOIN request_blood_crossmacth CM ON MM.requestbloodid = CM.requestbloodid
    GROUP BY MM.requestbloodid 
    ORDER BY MM.requestbloodid DESC"
    ;
 
    error_log($sql);
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
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