<?php
    include('../../connection.php');

    $condition = '';
    $bloodexchangeid =$_GET['bloodexchangeid'];
  
    $sql = "SELECT * FROM blood_exchange_document  WHERE bloodexchangeid = '$bloodexchangeid' AND active <> 0 ORDER BY bloodexchangedocumentid DESC";
    
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