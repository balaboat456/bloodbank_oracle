<?php
    include('../../connection.php');

    $condition = '';
    $bag_number =$_GET['bag_number'];
    $bloodtype =$_GET['bloodtype'];

    $sql = "SELECT * FROM bloodstock WHERE bloodstockstatusid = '1' AND bloodtype = '$bloodtype' AND bag_number = '$bag_number' AND active <> 0";
    
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