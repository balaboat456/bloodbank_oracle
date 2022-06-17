<?php
    include('../../connection.php');
    include('../dateFormat.php');
    
    $condition = '';
  
    $id = $_GET['id'];

    $sql = "SELECT PT.* ,UR.fullname
    FROM request_blood_history_pay_print PT
    LEFT JOIN users UR ON PT.requestbloodhistorypayuser = UR.username
    WHERE PT.grouppayid = '$id'
    ORDER BY PT.requestbloodhistorypaydate DESC";
 
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>