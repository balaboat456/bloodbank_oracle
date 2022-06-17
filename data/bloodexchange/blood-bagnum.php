<?php
    include('../../connection.php');

    $bag_number =$_GET['bag_number'];

    $sql = "SELECT * FROM bloodstock
    where bag_number = '$bag_number'
            ";
    
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