<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

$select = $_GET['select'];

if($select == 1){
    $condition = "AND  nurseid NOT LIKE '1' ";
} 
if ($select == 2) {
    $condition = "AND  nurseid NOT LIKE '2' ";
}
else{
    $condition = "AND  nurseid NOT IN (1,2) ";
}

    if(!empty($keyword))
    $condition = "AND  CONCAT(IFNULL(nursename,''),IFNULL(nursecode,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM nurse WHERE true $condition 
    GROUP BY nursename
    ORDER BY nurseid ASC
    LIMIT 100";
    
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