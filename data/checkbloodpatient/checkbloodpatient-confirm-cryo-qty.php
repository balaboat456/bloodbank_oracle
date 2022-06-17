<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['id'];
   

    $sql = "SELECT SUM(requestbloodcrossmacthconfirmqty) AS sum_requestbloodcrossmacthconfirmqty FROM requestblood_crossmacth_confirm WHERE requestbloodid = '$id' AND bloodtype = 'CRYO' AND IFNULL(requestbloodcrossmacthconfirmcancelstatus,'') != 1";
    
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