<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $type =$_GET['type'];
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(code,''),' ',ifnull(name,''),' ',ifnull(surname,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM staff where $type = '1' $condition ";
    
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