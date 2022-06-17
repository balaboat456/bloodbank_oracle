<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(problemproductid,''),' ',ifnull(problemproductcode,''),' ',ifnull(problemproductname,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM problem_product where true $condition ORDER BY problemproductid";
    
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