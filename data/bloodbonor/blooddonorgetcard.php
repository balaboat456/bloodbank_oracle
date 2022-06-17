<?php
    include('../../connection.php');

    $condition = '';
    $donorid =$_GET['donorid'];
  
    $sql = "SELECT DN.* ,SF.name,SF.surname
            FROM donate DN
            LEFT JOIN staff SF ON DN.staffcardid = SF.id
            WHERE DN.getcard = 1
            AND donorid = '$donorid'
            ORDER BY DN.getcarddate DESC";
    
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