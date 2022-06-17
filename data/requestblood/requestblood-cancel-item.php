<?php
    include('../../connection.php');

    $id =$_GET['id'];
    $requestbloodid =$_GET['requestbloodid'];

    $sql = "SELECT 
    CN.requestbloodcancelname AS grouprequestbloodcancelname,
    IM.* ,
    RB.requestbloodcancelother
            FROM  request_blood RB
            LEFT JOIN request_blood_cancel_item IM ON RB.requestbloodid = IM.requestbloodid
            LEFT JOIN request_blood_cancel CN ON IM.requestbloodcancelid = CN.requestbloodcancelid
            WHERE RB.requestbloodid = '$requestbloodid' ";
    
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