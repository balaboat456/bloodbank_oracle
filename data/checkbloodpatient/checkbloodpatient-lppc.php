<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['id'];
   

    $sql = "SELECT SK.* ,DN.pc_1,DN.pc_2,DN.pc_3,DN.pc_4,DN.ffp_5
    FROM bloodstock SK
    LEFT JOIN donate DN ON SK.donateid = DN.donateid
    WHERE bloodstockid = '$id' AND SK.active <> 0";
    
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