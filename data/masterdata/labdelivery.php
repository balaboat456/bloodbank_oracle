<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(reasonsendingcode,''),' ',ifnull(reasonsendingname,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM lab_delivery where active <> 0 $condition ";
    
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