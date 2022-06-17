<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(bloodstocktypeid,''),' ',ifnull(bloodstocktypecode,''),' ',ifnull(bloodstocktypecodegroup,''),' ',ifnull(bloodstocktypename,''),' ',ifnull(bloodstocktypename2,'')) LIKE '%$keyword%' ";


    $sql = "SELECT  * FROM bloodstock_type WHERE true $condition ORDER BY bloodstocksort";
    // $sql = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";

    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'sql' => $sql
        )
        
    );

    mysqli_close($conn);
?>