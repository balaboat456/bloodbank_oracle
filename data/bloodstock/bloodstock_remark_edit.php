<?php
    include('../../connection.php');

    $condition = '';
    $keyword = $_GET['keyword'];

    $sql = "SELECT 	* FROM bloodstock_remark_edit WHERE bloodstockremarkedittext LIKE '%$keyword%'";
    
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