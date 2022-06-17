<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['requestbloodid'];
   

    $sql = "SELECT * FROM request_blood_crossmacth_log_main WHERE requestbloodid = '$id' ORDER BY requestbloodcrossmacthlogmainid";
    
    $query = mysqli_query($conn,$sql);

    error_log($sql);

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