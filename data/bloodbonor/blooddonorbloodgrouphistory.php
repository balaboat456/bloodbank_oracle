<?php
    include('../../connection.php');

    $condition = '';
    $donorid =$_GET['donorid'];
  
    $sql = "SELECT * FROM blood_group_history  WHERE donorid = '$donorid' ORDER BY donorbloodhistory DESC";
    
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