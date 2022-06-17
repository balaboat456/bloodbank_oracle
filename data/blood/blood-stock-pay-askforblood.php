<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');


    $sql = "SELECT BS.* ,BT.bloodstocktypename2,RH.rhname3,DATEDIFF(BS.bloodexp, (CURDATE() + INTERVAL 543 YEAR) ) AS exp_diff
    FROM bloodstock BS
    LEFT JOIN bloodstock_type BT ON BS.bloodstockid = BT.bloodstocktypeid
    LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
    WHERE BS.bloodstockstatusid = 2
    AND BS.bloodstockpaytypeid = 2
    AND BS.active <> 0
    AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 543 YEAR),'%Y-%m-%d') < BS.bloodexp
    ORDER BY BS.bloodexp,BS.bloodstockid,BS.bloodgroup,BS.bloodrh
    " ;
    
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
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>