<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $cordblood =$_GET['cordblood'];


    if(!empty($keyword))
    $condition = $condition." AND ifnull(bloodgroupserumname,'') LIKE '%$keyword%' ";

    if(empty($cordblood))
    {
        $condition = $condition."  AND cordblood = 1 ";
    }


    $sql = "SELECT * FROM blood_group_serum_crossmacth where true $condition ORDER BY sort";
    
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