<?php
    include('../connection.php');
    include('dateFormat.php');

    $condition = '';


$bloodstockpaymainremark = $_GET['bloodstockpaymainremark'];
$bloodstockpaymainid = $_GET['bloodstockpaymainid'];



    $sql = "UPDATE bloodstock_pay_main
SET bloodstockpaymainremark = '$bloodstockpaymainremark'
WHERE bloodstockpaymainid = '$bloodstockpaymainid'";

    
    $query = mysqli_query($conn,$sql);



    


    // $resultArray = array();
	// while($result = mysqli_fetch_array($query))
	// {
	// 	array_push($resultArray,$result);
	// }
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
