<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $requestbloodid =$_GET['requestbloodid'];

    if(!empty($requestbloodid))
    {
        $condition = " AND RB.requestbloodid = '$requestbloodid' ";
    }else
    {
        $condition = " AND RB.hn = '$hn' ";
    }
    

    $sql = "SELECT RB.*,
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
                    CONCAT(SF2.name,' ',SF2.surname) AS checkpatientusername,
                    CONCAT(SF3.gender,SF3.name,' ',SF3.surname) AS checkpatientuserconfirmbloodgroupqueue,
                    PT.patientan,
                    PT.patientrh,
                    PT.patientantibody,
                    PT.patientphenotype,
                    CURDATE() AS datenow
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
            LEFT JOIN staff SF2 ON RB.checkpatientuser = SF2.id
            LEFT JOIN staff SF3 ON RB.userconfirmbloodgroupqueue = SF3.id
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            WHERE RB.requestbloodstatusid != 3
            $condition
            ORDER BY RB.requestblooddate DESC , RB.requestbloodtime DESC";
    
    $query = mysqli_query($conn,$sql);


    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }
    
    $dataItem = array();
    foreach ($resultArray as $item) {
        array_push($dataItem, array_merge($item,getCross($item['requestbloodid']),getItem($item['requestbloodid']),bloodABO($item['requestbloodid']),antiSceen($item['requestbloodid']),rhArr($item['requestbloodid']),antiIden($item['requestbloodid'])));
    }


    echo json_encode(
        array(
            'status' => true,
            'data' => $dataItem
        )
    );

    mysqli_close($conn);


    function antiSceen($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM request_blood_anti_sceen WHERE requestbloodid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

       
         
        return   array(
                'antisceen' => $resultArray
        );
     

    }

    function bloodABO($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM request_abo WHERE requestbloodid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

       
         
        return   array(
                'aboarr' => $resultArray
        );
     

    }

    function antiIden($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM request_blood_anti_iden WHERE requestbloodid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   array(
                'antiiden' => $resultArray
        );   

    }

    function rhArr($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM request_blood_rh WHERE requestbloodid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   array(
                'rharr' => $resultArray
        );   

    }

    function getItem($id)
    {
        include('../../connection.php');

        $sql = "SELECT IM.* , ST.bloodstocktypename2,ST.bloodstocktypegroupid
                FROM request_blood_item IM
                LEFT JOIN bloodstock_type ST ON IM.bloodstocktypeid = ST.bloodstocktypeid 
                WHERE IM.requestbloodid  = '$id' ";

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

    function getCross($id)
    {
        include('../../connection.php');

        $sql = "SELECT CM.*,RH.rhcode,RH.rhname3 ,CM.bloodgroupid AS bloodgroup,CS.crossmacthstatusname,SK.bloodexp,TY.bloodstocktypegroupid
        FROM request_blood_crossmacth CM
        LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
        LEFT JOIN rh RH ON CM.rhid = RH.rhid
        LEFT JOIN crossmacth_status CS ON CM.crossmacthstatusid = CS.crossmacthstatusid
        LEFT JOIN bloodstock SK ON CM.bloodstockid = SK.bloodstockid AND SK.active <> 0
        WHERE CM.requestbloodid = '$id'
        ORDER BY str_to_date(CM.requestbloodcrossmacthdatetime,'%Y-%m-%d %h:%i') ASC,CM.requestbloodcrossmacthid ASC";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

       
         
        return   array(
                'crossitem' => $resultArray
        );
    }
?>