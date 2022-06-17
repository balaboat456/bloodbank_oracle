<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition = '';
    $condition2 = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    // Condition 1
    if(!empty($fromdate) && !empty($todate) && $fromdate != "undefined" && $todate != "undefined")
    $condition = $condition." AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";

    $date = dateNowTMD();
    $condition = $condition." AND RB.usedblooddateto >=  '$date' ";
    
    if(isset($hn))
    if(!empty($hn) && $hn != "undefined")
    $condition = $condition." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    // Condition 2
    if(!empty($fromdate) && !empty($todate) && $fromdate != "undefined" && $todate != "undefined")
    $condition2 = $condition2." AND RB.usedblooddatefrom >= '$fromdate' ";

    $date = dateNowTMD();
    $condition2 = $condition2." AND RB.usedblooddateto >=  '$date' ";
    
    if(isset($hn))
    if(!empty($hn) && $hn != "undefined")
    $condition2 = $condition2." AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    $condition2 = $condition2." AND RB.requestunit =  '$requestunit'  ";


    $sql = "SELECT * FROM (
    (SELECT M.* ,CM.bag_number as cm_bag_number,
    CM.requestbloodcrossmacthid,
    SUM(CASE WHEN IFNULL(CM.mostandunstatus,0) = 2 THEN 1 ELSE 0 END) AS mostandunstatus,
    SUM(CASE WHEN IFNULL(CM.mostandunstatus,0) = 3 THEN 1 ELSE 0 END) AS mostandunstatus2,
    CM.crossmacthstatusid,
    CM.crossmacthstatus2id,
    BST.bloodstocktypegroupid,
    CS.crossmacthresultname,
    CM.seq,
    CM.sub,
    SUM(CASE WHEN CM.crossmacthstatusid <= 3 THEN BS.volume ELSE 0 END ) AS volume,
    SUM(CASE WHEN CM.crossmacthstatus2id <= 3 THEN BS.volume ELSE 0 END ) AS volume2,
    CM.bloodtype as cm_bloodtype,
    COUNT(CM.bloodtype) AS count_bloodtype,
    IFNULL(CF.requestbloodcrossmacthconfirmqty,0) AS count_used ,
    SUM(CASE WHEN IFNULL(CM.doctorid,'0') != '0' THEN 1 ELSE 0 END) AS doctorstatus,
    M.bloodstocktypenamegroup2 AS bloodstocktypenamegroup,
    CM.bloodgroupid AS cm_bloodgroup
    FROM (SELECT RB.*,
    (543 - TIMESTAMPDIFF(YEAR,CURDATE(), PT.patientanbirthday)) AS patientage,
    PT.patientfullname,
    RH.rhname3,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    GROUP_CONCAT(IM.bloodstocktypeid separator ',') arr_blood,
	GROUP_CONCAT(IM.requestblooditemqty separator ',') arr_qtyblood,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup2,
    RH2.rhname3 AS confirmrhname3
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    WHERE  IM.bloodstocktypeid != 'CRYO'
    $condition
    GROUP BY RB.requestbloodid
    ORDER BY RB.crossmatchdate,RB.crossmatchtime,RB.requestbloodid) M
    LEFT JOIN request_blood_crossmacth CM ON M.requestbloodid = CM.requestbloodid AND CM.bloodtype != 'CRYO' AND IFNULL(CM.isautocontrol,'') != 1
    LEFT JOIN bloodstock_type BST ON CM.bloodtype = BST.bloodstocktypeid
    LEFT JOIN bloodstock BS ON CM.bloodtype = BS.bloodtype AND CM.bag_number = BS.bag_number AND CM.sub = BS.sub AND BS.active <> 0 
    LEFT JOIN crossmacth_result CS ON CM.crossmacthresultid = CS.crossmacthresultid
    LEFT JOIN (SELECT SUM(requestbloodcrossmacthconfirmqty) AS requestbloodcrossmacthconfirmqty,
    bloodtype,
    requestbloodid,
    bloodgroupid,
    groupid
    FROM requestblood_crossmacth_confirm
    WHERE requestbloodcrossmacthconfirmcancelstatus != 1
    GROUP BY bloodtype,requestbloodid,bloodgroupid,groupid LIMIT 1) CF ON CM.groupid = CF.groupid AND CM.requestbloodid = CF.requestbloodid
    WHERE ifnull(CM.crossmacthresultid,'') != 8
    AND CM.crossmacthstatus2id IN (2,3) 
    AND CM.crossmacthstatusid NOT IN (5,6,7,8,9,10,11)
    AND BS.bloodexp >= '$date'
    GROUP BY M.requestbloodid,CM.bloodtype,CM.bloodgroupid
    HAVING count_bloodtype > 0)
    UNION
    (
        SELECT RB.* ,
        group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
        '' AS cm_bloodgroup
		
		FROM (
        SELECT RB.*,
    (543 - TIMESTAMPDIFF(YEAR,CURDATE(), PT.patientanbirthday)) AS patientage,
    PT.patientfullname,
    RH.rhname3,
    BNT.bloodnotificationtypename,
    UN1.unitofficename AS unitofficename1,
    GROUP_CONCAT(IM.bloodstocktypeid separator ',') arr_blood,
	GROUP_CONCAT(IM.requestblooditemqty separator ',') arr_qtyblood,
    group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup2,
    RH2.rhname3 AS confirmrhname3,
		'' AS cm_bag_number,
		'' AS requestbloodcrossmacthid,
		'' AS mostandunstatus,
        '' AS mostandunstatus2,
        '' AS crossmacthstatusid,
        '' AS crossmacthstatus2id,
        '' AS bloodstocktypegroupid,
		'' AS crossmacthresultname,
		'' AS seq,
		'' AS sub,
		'' AS volume,
        '' AS volume2,
		IM.bloodstocktypeid AS cm_bloodtype,
		IM.requestblooditemqty AS count_bloodtype,
		IFNULL(CF.requestbloodcrossmacthconfirmqty,0) AS count_used,
		0 AS doctorstatus
    FROM request_blood RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    LEFT JOIN bloodstock_type BST ON IM.bloodstocktypeid = BST.bloodstocktypeid
    LEFT JOIN patient PT ON RB.hn = PT.patienthn
    LEFT JOIN rh RH ON RB.rhid = RH.rhid
    LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
    LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
    LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
    LEFT JOIN (SELECT SUM(requestbloodcrossmacthconfirmqty) AS requestbloodcrossmacthconfirmqty,
    bloodtype,
    requestbloodid
    FROM requestblood_crossmacth_confirm
    WHERE requestbloodcrossmacthconfirmcancelstatus != 1
    GROUP BY bloodtype,requestbloodid) CF ON RB.requestbloodid = CF.requestbloodid   AND IM.bloodstocktypeid = CF.bloodtype 
    WHERE IM.bloodstocktypeid = 'CRYO'
    AND RB.requestbloodstatusid = 2
    $condition
    GROUP BY RB.requestbloodid
		HAVING (count_bloodtype - count_used) > 0
    ORDER BY RB.crossmatchdate,RB.crossmatchtime,RB.requestbloodid) RB
    LEFT JOIN request_blood_item IM ON RB.requestbloodid = IM.requestbloodid
    GROUP BY RB.requestbloodid
	HAVING (count_bloodtype - count_used) > 0
		
    )

    ) M
		ORDER BY M.usedblooddateto ASC,M.usedblooddatefrom ASC,M.requestbloodid,FIELD(M.cm_bloodtype, 'CRYO') DESC
    "
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