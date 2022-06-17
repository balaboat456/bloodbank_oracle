<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    if(!empty($keyword))
    $condition = "AND  CONCAT(IFNULL(name,''),' ',IFNULL(surname,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM staff WHERE isblooddriller = 1  ORDER BY id ASC";
    
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