<?php
    include('../../connection.php');

    $condition = '';
    $bag_number =$_GET['bag_number'];
    $bloodtype =$_GET['bloodtype'];

    $sql = "SELECT * FROM bloodstock_type WHERE bloodstocktypeid = '$bloodtype'"; 
    $query = mysqli_query($conn,$sql);

    $bloodstocktypegroupid = '';
	while($result = mysqli_fetch_array($query))
	{
        $bloodstocktypegroupid = $result["bloodstocktypegroupid"];
    }


    $sql = "SELECT SK.* ,RH.rhcode,RH.rhname3,
    DATEDIFF(SK.bloodexp,DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 543 YEAR),'%Y-%m-%d')) AS statusexp,
    TY.bloodstocktypegroupid
    FROM bloodstock SK
    LEFT JOIN rh RH ON SK.bloodrh = RH.rhid
    LEFT JOIN bloodstock_type TY ON SK.bloodtype = TY.bloodstocktypeid
    WHERE bloodstockstatusid = 1 AND bag_number = '$bag_number' AND SK.active <> 0 ";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
        if($bloodstocktypegroupid == $result["bloodstocktypegroupid"])
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