<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition = '';
    $donorid =$_GET['donorid'];

    

    $sql = "SELECT * FROM donate WHERE donorid = '$donorid' ORDER BY donation_date DESC" ;
    
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
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>