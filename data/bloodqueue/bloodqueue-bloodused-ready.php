<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition2 = '';
    $condition1 = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    $condition2 = $condition2." AND CM.readyblooddate BETWEEN '$fromdate' AND '$todate' ";

    $date = dateNowTMD();
    $condition1 = $condition1." AND RB.usedblooddateto >= '$date' ";

    // if(!empty($hn))
    // $condition = $condition." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition1 = $condition1." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT M.bloodtypeid AS bloodtypeid_request ,
	M.qtyblooditem AS qtyblooditem_request ,
    M.* ,CM.bag_number as cm_bag_number,CM.sub as cm_sub,CM.requestbloodcrossmacthid,CS.crossmacthresultname,CM.seq,
    CM.bloodtype as cm_bloodtype,COUNT(CM.bloodtype) AS count_bloodtype,
    CM.bloodrequestunit,CM.bloodrequestcc,CM.confirmbloodrequestdate,CM.confirmbloodrequesttime,
    CM.mostandunstatus,
    CM.crossmacthresultid,
	CM.crossmacthstatusid,
    CM.bloodstockid,
    SK.bloodstockrfid,
    SK.bloodexp,
    TY.bloodstocktypegroupid
    FROM (SELECT 
    GROUP_CONCAT(IM.bloodstocktypeid separator ',') bloodtypeid ,
	GROUP_CONCAT(IM.requestblooditemqty separator ',') qtyblooditem ,
    RB.*,
    PT.patientfullname,
    RH.rhname3,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    RH2.rhname3 AS confirmrhname3,
    BST.bloodstocktypegroupid,
    DC.doctorcode2
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    LEFT JOIN doctor DC ON RB.doctorid = DC.doctorid
    WHERE  true -- RB.isconfirmbloodgroupqueue = 1
    $condition1
    GROUP BY RB.requestbloodid
    ORDER BY RB.crossmatchdate,RB.crossmatchtime,RB.requestbloodid) M
    LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid AND CM.crossmacthstatusid != 10 AND CM.isautocontrol != 1
    LEFT JOIN crossmacth_result CS ON CM.crossmacthresultid = CS.crossmacthresultid
    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
    LEFT JOIN bloodstock SK ON CM.bloodstockid = SK.bloodstockid AND SK.active <> 0
    WHERE CM.crossmacthstatusid = 4
    AND CM.crossmacthresultid != 8
    $condition2
    GROUP BY CM.requestbloodcrossmacthid,CM.bloodtype"
    ;

    error_log($sql);

   

    $query = mysqli_query($conn,$sql);

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