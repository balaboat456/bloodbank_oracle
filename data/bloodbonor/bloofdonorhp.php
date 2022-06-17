<?php
    include('../../connection.php');

    $donorid =$_GET['donorid'];

    $sql = "SELECT * FROM donor_hp WHERE donorid = '$donorid'";
    
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