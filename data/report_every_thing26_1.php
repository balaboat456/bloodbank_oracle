<?php
    include('../connection.php');

    $condition = '';
    $fromdatetime =$_GET['fromdatetime'];
    $todatetime =$_GET['todatetime'];
    $usercreate =$_GET['usercreate'];

    if(!empty($usercreate))
    $condition = " AND BLL.usercreate = '$usercreate' ";

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER By BLL.bloodlettingid DESC) AS num_row ,
    	BLL.* ,
                UO.unitofficename,
                DT.doctorname,
                BT.bagtypename,
                PT.patientfullname,
                PT.patienthn,
                BTP.lettingproblemname,
                DATE_FORMAT(BLL.bloodlettingdatetime,'%d/%m/%Y') AS bloodlettingdatetime,
                CONCAT(S.name,' ',S.surname) AS usercreatename ,
                DATE_FORMAT(BLL.bloodlettingdatetime,'%d/%m/%Y') AS datetimee  ,
                DATE_FORMAT(BLL.bloodlettingdatetime,'%H:%I') AS timeedate  
            FROM blood_letting BLL
            LEFT JOIN patient PT ON BLL.patientid = PT.patientid
            LEFT JOIN unit_office UO ON BLL.unitofficeid = UO.unitofficeid
            LEFT JOIN doctor DT ON BLL.doctorid = DT.doctorid
            LEFT JOIN bag_type BT ON BLL.bagtypeid = BT.bagtypeid
            LEFT JOIN blood_letting_problems BTP ON BLL.lettingproblemid = BTP.lettingproblemid
            LEFT JOIN staff S ON BLL.usercreate = S.id
            WHERE BLL.active <> 0
            AND BLL.bloodlettingdatetime BETWEEN '$fromdatetime' AND '$todatetime'
            $condition
            ORDER BY BLL.bloodlettingid DESC";
 
    
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
            'sql' => $sql
        )
        
    );

    mysqli_close($conn);
?>