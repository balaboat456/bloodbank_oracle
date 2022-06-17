<?php
    include('../../connection.php');

    $condition = '';
    $an =$_GET['an'];

    $sql = "SELECT 	IFNULL(max(BEX.terms),0)+1 AS terms 
            FROM blood_exchange BEX
            LEFT JOIN patient PT ON BEX.patientid = PT.patientid
            WHERE BEX.active <> 0
            AND PT.patientan = '$an'
            ";
    
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