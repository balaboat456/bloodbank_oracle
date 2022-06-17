<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(receivingtypeid,''),' ',ifnull(receivingtypecode,''),' ',ifnull(receivingtypename,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM receiving_type where true $condition  AND receivingtypeid IN (2,3,4,12)ORDER BY receivingtypeid ASC ";
    
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