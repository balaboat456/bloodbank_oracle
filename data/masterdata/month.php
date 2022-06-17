<?php
    include('../../connection.php');

    $keyword = $_GET['keyword'];

    $condition = "";

    if(!empty($keyword))
    $condition = " AND monthname = '$keyword'";

    $sql = "SELECT * FROM `month` WHERE true $condition ";
    
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