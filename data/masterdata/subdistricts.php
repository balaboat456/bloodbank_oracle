<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $districtid =$_GET['districtid'];
    
    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(subdistricten,''),' ',ifnull(subdistrictth,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM subdistricts WHERE districtid = '$districtid' $condition ORDER BY subdistrictth";
    
    
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