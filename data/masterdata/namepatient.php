<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    if(!empty($keyword))
    $condition = "AND  patientfullname LIKE '%$keyword%' OR  patienthn LIKE '%$keyword%'  ";

    $sql = "SELECT patientid ,patienthn , patientfullname FROM patient WHERE true $condition ";
    
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
