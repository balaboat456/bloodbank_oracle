<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $abofirst =$_GET['abofirst'];
    $notpn =$_GET['notpn'];
    $firstsort =$_GET['firstsort'];
    $cordblood =$_GET['cordblood'];
    $sort = "ORDER BY sort";

    if(!empty($keyword))
    $condition = "AND ifnull(bloodgroupserumname,'') LIKE '%$keyword%' ";
    
    if(!empty($abofirst))
    $condition = $condition." AND bloodgroupserumid in (10,11) ";

    if(!empty($notpn))
    $condition = $condition." AND bloodgroupserumid not in (10,11) ";

    if(empty($cordblood))
    {
        $condition = $condition." AND cordblood != 1 ";
    }
    

    if($firstsort == "P")
    {
        $sort = "ORDER BY FIND_IN_SET(bloodgroupserumid,'10,11')";
    }else if($firstsort == "N")
    {
        $sort = "ORDER BY FIND_IN_SET(bloodgroupserumid,'11,10')";
    }

    $sql = "SELECT * FROM blood_group_serum where true $condition $sort";
    
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