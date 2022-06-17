<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    $sql = "SELECT 	RC.* ,
                UO.unitofficename,
                PT.patientfullname,
                BG.bloodgroupname,
                RH.rhname3
                
            FROM blood_washed_red_cell RC
            LEFT JOIN patient PT ON RC.patientid = PT.patientid
            LEFT JOIN unit_office UO ON RC.unitofficeid = UO.unitofficeid
            LEFT JOIN blood_group BG ON RC.bloodgroupid = BG.bloodgroupid
            LEFT JOIN rh RH ON RC.rhid = RH.rhid
            WHERE RC.active <> 0
            AND PT.patienthn = '$hn'
            ORDER BY RC.bloodwashedredcellid DESC";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>