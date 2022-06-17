<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    

    $sql = "SELECT RB.*,CM.bag_number,CM.bloodtype
    FROM request_blood RB
    LEFT JOIN request_blood_crossmacth CM ON RB.requestbloodid = CM.requestbloodid
    WHERE CM.isallergic = 1
    AND RB.hn = '$hn'"
    ;

 
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