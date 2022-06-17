<?php
    include('../../connection.php');

    $hn =$_GET['hn'];

    $sql = "SELECT DATE_FORMAT(requestblooddate, '%d/%m/%Y') AS LASTDATE FROM request_blood WHERE hn = '$hn'ORDER BY requestblooddate DESC";
    
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