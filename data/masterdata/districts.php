<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $provinceid =$_GET['provinceid'];
    
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(districten,''),' ',ifnull(districtth,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM districts WHERE provinceid = '$provinceid' $condition ORDER BY districtth";
    
    
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