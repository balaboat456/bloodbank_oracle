<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
   

    $sql = "SELECT ABO.* ,CONCAT(SF.name,' ',SF.surname) AS requestbloodchangeabofullname
            FROM request_blood_change_abo ABO
            LEFT JOIN staff SF ON ABO.requestbloodchangeabouser = SF.id
    WHERE ABO.hn = '$hn'
    ORDER BY ABO.requestbloodid DESC";
    
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