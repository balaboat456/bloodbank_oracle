<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
   

    $sql = "SELECT RB.* ,RH.rhname3,SC.rhname3 AS confirmsceenname
    FROM request_blood RB
    LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
    LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid
    WHERE RB.hn = '$hn'
    ORDER BY RB.requestbloodid DESC";
    
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