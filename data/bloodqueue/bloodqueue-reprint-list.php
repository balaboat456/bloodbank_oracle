<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    $sql = "SELECT * FROM request_blood WHERE hn = '$hn' AND requestbloodstatusid=2 ORDER BY requestqueueblooddate DESC ,requestqueuebloodtime DESC"
            
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