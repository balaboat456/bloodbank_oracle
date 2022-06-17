<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND RB.requestqueueblooddate BETWEEN '$fromdate' AND '$todate' ";

    // if(!empty($hn))
    // $condition = $condition." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT RB.*,
    (CASE WHEN RB.requestbloodstatusid = 2 THEN '1' ELSE '' END) AS r,
    (CASE WHEN RB.requestbloodstatusid = 3 THEN '1' ELSE '' END) AS n,
    PT.patientfullname,
    RH.rhname3,
    (CASE WHEN RB.bloodsampletube = 1 THEN 'มี' ELSE 'ไม่มี' END) AS bloodsampletubename,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    CONCAT(GROUP_CONCAT(DISTINCT IFNULL(RC.requestbloodcancelname,'') SEPARATOR '  '), '  ', IFNULL(RB.requestbloodcancelother,'')) AS requestbloodcancelnamegroup
    
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
        LEFT JOIN request_blood_cancel_item RCI ON RB.requestbloodid =  RCI.requestbloodid
        LEFT JOIN request_blood_cancel RC ON RCI.requestbloodcancelid = RC.requestbloodcancelid
    WHERE RB.requestbloodstatusid = 3
    $condition
    GROUP BY RB.requestbloodid"
    ;
 
   
    
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