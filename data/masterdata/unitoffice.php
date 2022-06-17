<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    if(!empty($keyword))
    $condition = "AND  CONCAT(IFNULL(unitofficename,''),IFNULL(unitofficecode,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM unit_office WHERE true $condition  ORDER BY unitofficecode ASC";
    
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