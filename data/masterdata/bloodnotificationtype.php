<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $requestunit =$_GET['requestunit'];
    

    if(!empty($keyword))
    $condition = $condition." AND  CONCAT(IFNULL(bloodnotificationtypename,''),IFNULL(bloodnotificationtypecode,'')) LIKE '%$keyword%' ";

    if($requestunit != 199)
    $condition = $condition." AND  bloodnotificationtypeid NOT IN (2) ";

    $sql = "SELECT * FROM blood_notification_type WHERE true $condition  ORDER BY bloodnotificationtypecode ASC";
    
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