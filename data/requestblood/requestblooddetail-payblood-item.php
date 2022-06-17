<?php
    include('../../connection.php');

    $id =$_GET['id'];
    $bloodtype =$_GET['bloodtype'];

    $sql = "SELECT CM.* ,RH.rhname3,BT.bloodstocktypename2
            FROM request_blood_crossmacth CM
            LEFT JOIN rh RH ON CM.rhid = RH.rhid
            LEFT JOIN bloodstock_type BT ON CM.bloodtype = BT.bloodstocktypeid 
            WHERE  CM.requestbloodid = '$id'
            AND CM.bloodtype = '$bloodtype'
            AND CM.ispayblood = '1'";
    
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