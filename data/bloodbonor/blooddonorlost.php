<?php
    include('../../connection.php');

    $condition = '';
    $donorid =$_GET['donorid'];
  

    $sql = "SELECT * FROM donor_lost
        WHERE donorid = '$donorid'
        ORDER BY donorlostid ASC";
 
    
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