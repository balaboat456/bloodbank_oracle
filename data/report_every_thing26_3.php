<?php
    include('../connection.php');

    $condition = '';
    $fromdatetime =$_GET['fromdatetime'];
    $todatetime =$_GET['todatetime'];
    $usercreate =$_GET['usercreate'];

    if(!empty($usercreate))
    $condition = " AND RC.usercreate = '$usercreate' ";

    $sql = "SELECT 	
    ROW_NUMBER() OVER (ORDER By RC.bloodwashedredcellid DESC) AS num_row ,
    RC.* ,
                UO.unitofficename,
                PT.patientfullname,
                PT.patienthn,
                BG.bloodgroupname,
                RH.rhname3,
                CONCAT(S.name,' ',S.surname) AS usercreatename,
				DATE_FORMAT(RC.user_send_wash_date,'%d/%m/%Y %H:%I') AS user_send_wash_date
                
            FROM blood_washed_red_cell RC
            LEFT JOIN patient PT ON RC.patientid = PT.patientid
            LEFT JOIN unit_office UO ON RC.unitofficeid = UO.unitofficeid
            LEFT JOIN blood_group BG ON RC.bloodgroupid = BG.bloodgroupid
            LEFT JOIN rh RH ON RC.rhid = RH.rhid
            LEFT JOIN staff S ON RC.usercreate = S.id
            WHERE RC.active <> 0
            AND RC.user_send_wash_date BETWEEN '$fromdatetime' AND '$todatetime'
            $condition
            ORDER BY RC.bloodwashedredcellid DESC";


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
            'sql' => $sql
        )
        
    );

    mysqli_close($conn);
?>