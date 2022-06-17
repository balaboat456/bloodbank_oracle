<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(requestbloodstatuscode,''),' ',ifnull(requestbloodstatusname,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM request_blood_status where requestbloodstatusid BETWEEN 3 AND 4 AND true $condition ";
    
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