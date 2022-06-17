<?php
    include('../../connection.php');

    $condition = '';
$bag_number = $_GET['bag_number'];
$wash_status_remark = $_GET['wash_status_remark'];


    $sql = "UPDATE request_blood_crossmacth
SET wash_status = 1 , wash_status_remark = $wash_status_remark
WHERE bag_number LIKE '$bag_number' ";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
    // $resultArray =[$hn, $requestbloodid];
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
