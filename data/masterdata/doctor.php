<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    if(!empty($keyword))
    $condition = "AND  CONCAT(IFNULL(doctorname,''),' ',IFNULL(doctorcode,''),' ',IFNULL(doctorcode2,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM doctor WHERE true $condition  ORDER BY doctorid ASC
    LIMIT 100";
    
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