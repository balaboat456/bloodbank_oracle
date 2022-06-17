<?php
    include('../../connection.php');

    $condition = '';
    $bloodtype =$_GET['bloodtype'];
    $bag_number =$_GET['bagnumber'];
    $rfid =$_GET['rfid'];

    if(!empty($bloodtype) && !empty($bag_number))
    $condition = $condition." AND bloodtype = '$bloodtype' AND bag_number = '$bag_number' ";

    if(!empty($rfid))
    $condition = $condition." AND bloodstockrfid = '$rfid'  ";
  
    $sql = "SELECT * 
            FROM bloodstock 
            WHERE bloodstockstatusid = 1 
            AND active <> 0
            $condition
            ORDER BY sub DESC";
    
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