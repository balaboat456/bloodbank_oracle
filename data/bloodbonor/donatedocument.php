<?php
    include('../../connection.php');

    $condition = '';
    $donateid =$_GET['donateid'];
  
    $sql = "SELECT * FROM donate_document  WHERE donateid = '$donateid' AND active <> 0 ORDER BY donatedocumentid DESC";
    
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