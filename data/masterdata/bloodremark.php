<?php
    include('../../connection.php');

    $id = $_GET['id'];

    $condition = "";

    if(!empty($id))
    $condition = " AND bloodremarkid = '$id'";

    $sql = "SELECT * FROM blood_remark WHERE true $condition  ORDER BY bloodremarkcode";
    
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