<?php
    include('../../connection.php');
    include('../dateFormat.php');

    $condition = '';
    $hn =$_GET['hn'];
    $id =$_GET['id'];
    $fromdate = dmyToymd($_GET['fromdate']);
    $todate = dmyToymd($_GET['todate']);
    $washedredbloodcell =$_GET['washedredbloodcell'];

    if($washedredbloodcell == 1){
        $condition = "AND RB.washedredbloodcell = 1";
    }


    if(isset($id))
    if(!empty($id))
    $condition = " AND RB.requestbloodid = '$id' ";

    if(!empty($fromdate) && !empty($todate))
    $condition = " AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";

    $sql = "SELECT MM.* ,
            SUM(CASE WHEN CM.crossmacthstatusid IN (5,6,7,8,9)  THEN 1 ELSE 0 END) AS pay_success,
            SUM(CASE WHEN IFNULL(CM.crossmacthstatusid,0) NOT IN (0,10,11)   THEN 1 ELSE 0 END) AS cross_qty,
            COUNT(*) AS total_cross_qty,
            SUM(CASE WHEN CM.crossmacthstatusid != 10 AND ((TIMESTAMPDIFF(DAY,DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 543 YEAR),'%Y-%m-%d'), MM.usedblooddateto)) < 0)   THEN 1 ELSE 0 END) AS wait_refund
        FROM (SELECT RB.*,
                UN1.unitofficename AS unitofficename1,
                UN2.unitofficename AS unitofficename2,
                BNT.bloodnotificationtypename,
                NU.nursename,
                DT.doctorname,
                SF.nursename AS stafffullname,
                CK.nursename AS blood_certifier_name,
                DG.diseasegroupname,
                ST.requestbloodstatusname,
                BG.bloodgroupname,
                RH.rhname3,
                CBS.checkbloodstatusname,
                PT.patientan 
            FROM request_blood RB
            LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
            LEFT JOIN unit_office UN2 ON RB.usedunit = UN2.unitofficeid
            LEFT JOIN blood_notification_type BNT ON RB.bloodnotificationtypeid = BNT.bloodnotificationtypeid
            LEFT JOIN nurse NU ON RB.nurseid = NU.nurseid
            LEFT JOIN doctor DT ON RB.doctorid = DT.doctorid
            LEFT JOIN nurse SF ON RB.blood_driller_id = SF.nurseid
            LEFT JOIN nurse CK ON RB.blood_certifier_id = CK.nurseid
            LEFT JOIN disease_group DG ON RB.diseasegroupid = DG.diseasegroupid
            LEFT JOIN blood_group BG ON RB.bloodgroupid = BG.bloodgroupid
            LEFT JOIN rh RH ON RB.rhid = RH.rhid
            LEFT JOIN request_blood_status ST ON RB.requestbloodstatusid = ST.requestbloodstatusid
            LEFT JOIN check_blood_status CBS ON RB.checkbloodstatusid = CBS.checkbloodstatusid
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            WHERE RB.hn = '$hn'
            $condition
            ORDER BY RB.requestbloodid DESC) MM
            LEFT JOIN request_blood_crossmacth CM ON MM.requestbloodid = CM.requestbloodid
            GROUP BY MM.requestbloodid 
            ORDER BY CONCAT(requestblooddate,requestbloodtime) DESC";

    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }
    
    $dataItem = array();
    foreach ($resultArray as $item) {
        array_push($dataItem, array_merge($item,getItem($item['requestbloodid']),getRequestBloodCrossmacth($item['requestbloodid'])));
    }


    echo json_encode(
        array(
            'status' => true,
            'data' => $dataItem
        )
    );

    mysqli_close($conn);


    function getItem($id)
    {
        include('../../connection.php');

        $sql = "SELECT IM.* ,BT.bloodstocktypename2
                FROM request_blood_item IM
                LEFT JOIN bloodstock_type BT ON IM.bloodstocktypeid = BT.bloodstocktypeid
                WHERE IM.requestbloodid  = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

       
         
        return   array(
                'item' => $resultArray
        );
     
    }

    function getRequestBloodCrossmacth($id)
    {
        include('../../connection.php');

        $sql = "SELECT CM.* ,
                SK.volume,
                RH.rhname3,BT.bloodstocktypename2
                FROM request_blood_crossmacth CM
                LEFT JOIN rh RH ON CM.rhid = RH.rhid
                LEFT JOIN bloodstock_type BT ON CM.bloodtype = BT.bloodstocktypeid 
                LEFT JOIN bloodstock SK ON CM.bloodstockid = SK.bloodstockid
                WHERE CM.requestbloodid = '$id'
                AND CM.ispayblood = '1' ";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

        $dataItem = array();
        foreach ($resultArray as $item) {
            array_push($dataItem, array_merge($item,getRequestTestBlood($item['requestbloodcrossmacthid'])));
        }

        return   array(
                'requestbloodcrossmacth' => $dataItem
        );
     
    }

    function getRequestTestBlood($id)
    {
        include('../../connection.php');

        $sql = "SELECT *
                FROM request_blood_crossmacth_lab_test
                WHERE requestbloodcrossmacthid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

        return   array(
                'testblood' => $resultArray
        );
     
    }
?>