<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition = '';
    $isexp =$_GET['isexp'];
    $type =$_GET['type'];

    
    $date = dateNowTMD();
    if(isset($isexp));
    if(!empty($isexp))
    $condition = $condition." AND BS.bloodexp < '$date' ";

    if(isset($type));
    if(!empty($type))
    if($type == 2)
    {
        $condition = $condition." AND BS.bloodtype = 'LPRC' AND BS.bloodgroup = 'O' ";
    }else if($type == 5 || $type == 6 || $type == 7 || $type == 10){
        $condition = $condition." AND BS.bloodexp >= DATE_ADD(CURRENT_DATE, INTERVAL 543 YEAR)";
    }
    

    $sql = "SELECT BS.* ,BT.bloodstocktypename2,RH.rhname3
    FROM bloodstock BS
    LEFT JOIN bloodstock_type BT ON BS.bloodstockid = BT.bloodstocktypeid
    LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
    -- WHERE BS.bloodstockstatusid IN (1,5)
    WHERE BS.bloodstockstatusid = 1
    AND BS.active <> 0
    $condition
    ORDER BY BS.bloodexp, BS.bloodstockid,BS.bloodgroup,BS.bloodrh
    " ;

    error_log("============");
    error_log($sql);
    
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
            'total' => count($resultArray),
            'sql' =>$sql
        )
        
    );

    mysqli_close($conn);
?>