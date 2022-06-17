<?php
    include('../../connection.php');

    $condition = '';
    $rhsort =$_GET['rhsort'];
    $firstsort =$_GET['firstsort'];
    $cordblood =$_GET['cordblood'];
    $keyword =$_GET['keyword'];
    $sort = "ORDER BY sort";


    

    if(!empty($keyword))
    $condition = $condition." AND CONCAT(ifnull(rhid,''),' ',ifnull(rhcode,''),' ',ifnull(rhname,'')) LIKE '%$keyword%' ";

    if(empty($cordblood))
    {
        $condition = $condition. " AND cordblood != '1' ";
    }
    

    if(!empty($rhsort))
    $condition = $condition." AND rhid in ('Rh+','Rh-') ";


    if($firstsort == "P")
    {
        $sort = "ORDER BY FIND_IN_SET(rhid,'Rh+,Rh-,Rh(D)')";
    }else if($firstsort == "N")
    {
        $sort = "ORDER BY FIND_IN_SET(rhid,'Rh-,Rh+,Rh(D)')";
    }

    $sql = "SELECT * FROM rh where true $condition $sort";
    
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