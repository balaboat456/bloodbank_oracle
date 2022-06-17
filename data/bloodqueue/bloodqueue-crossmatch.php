<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";

    // if(!empty($hn))
    // $condition = $condition." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT RB.*,
    PT.patientfullname,
    RH.rhname3,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    GROUP_CONCAT(DISTINCT CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    RH2.rhname3 AS confirmrhname3,
    CM.mostandunstatus,
	CM.crossmacthstatusid
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN request_blood_crossmacth CM ON RB.requestbloodid = CM.requestbloodid AND CM.isautocontrol != 1
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    WHERE IFNULL(RB.isconfirmbloodgroupqueue,'') != 1
    AND RB.iscrossmatch = 1
    AND RB.requestbloodstatusid NOT IN (1,3,4)
    $condition
    GROUP BY RB.requestbloodid
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