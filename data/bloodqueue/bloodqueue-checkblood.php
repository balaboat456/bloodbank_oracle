<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";
    // $condition = $condition." AND RB.crossmatchdate BETWEEN '$fromdate' AND '$todate' ";

    // if(!empty($hn))
    // $condition = $condition." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT group_concat(IM.requestblooditemqty separator ',') num,
    RB.*,
    PT.patientfullname,
    RH.rhname3,
    (CASE WHEN RB.bloodsampletube = 1 THEN 'มี' ELSE 'ไม่มี' END) AS bloodsampletubename,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    group_concat(IM.bloodstocktypeid separator ',') bloodstocktypeidgroup,
    group_concat(RC.requestbloodcancelname separator ',') requestbloodcancelnamegroup,
    RH2.rhname3 AS confirmrhname3
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN request_blood_cancel_item RCI ON RB.requestbloodid =  RCI.requestbloodid
    LEFT JOIN request_blood_cancel RC ON RCI.requestbloodcancelid = RC.requestbloodcancelid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    -- WHERE RB.iscrossmatch = 1
	-- 	AND RB.isaddblood != 1
    WHERE RB.isaddblood != 1
    AND RB.requestbloodstatusid NOT IN (1,3,4)
    -- AND IM.bloodstocktypeid in ('PRC','LPRC','LPRC-O','LDPRC','SDR')
    $condition
    GROUP BY  RB.requestbloodid
    ORDER BY RB.crossmatchdate,RB.crossmatchtime,RB.requestbloodid"
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