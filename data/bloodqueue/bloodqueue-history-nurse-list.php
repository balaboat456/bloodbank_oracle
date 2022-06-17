<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['id'];

    $sql = "SELECT CF.* ,
                UR.fullname,
                TY.bloodstocktypename2,
                SUM(CASE WHEN IFNULL(CM.ispayblood,'') = 1 THEN 1 ELSE 0 END) AS ispaybloodstatus
            FROM requestblood_crossmacth_confirm CF
            LEFT JOIN request_blood_crossmacth CM ON CF.groupid = CM.groupid
            LEFT JOIN bloodstock_type TY ON CF.bloodtype = TY.bloodstocktypeid
            LEFT JOIN users UR ON CF.requestbloodcrossmacthconfirmsaveuserid = UR.username 

            WHERE CF.requestbloodid = '$id'
            GROUP BY CF.requestbloodcrossmacthconfirmid"
            
    ;
    
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