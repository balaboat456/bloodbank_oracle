<?php
    include('../../connection.php');

    $condition = '';
    $bag_number =$_GET['bag_number'];
    $receivingtypeid =$_GET['receivingtypeid'];
    $hospitalid =$_GET['hospitalid'];

    $sql = "SELECT BR.* , 
                IM.bloodborrowitemid,
                PT.patientfullname ,
                IM.bloodstocktypeid,
                ST.bloodstocktypename2,
                IFNULL(IM.a_qty,0) AS a_qty,
                IFNULL(IM.b_qty,0) AS b_qty,
                IFNULL(IM.o_qty,0) AS o_qty,
                IFNULL(IM.ab_qty,0) AS ab_qty,

                IFNULL(IM.cryo_qty,0) AS cryo_qty,
                
                IFNULL(IM.a_qty_get,0) AS a_qty_get,
                IFNULL(IM.b_qty_get,0) AS b_qty_get,
                IFNULL(IM.o_qty_get,0) AS o_qty_get,
                IFNULL(IM.ab_qty_get,0) AS ab_qty_get,
                IFNULL(IM.cryo_qty_get,0) AS cryo_qty_get
            FROM blood_borrow BR 
            LEFT JOIN patient PT ON BR.bloodborrowhn = PT.patienthn
            LEFT JOIN blood_borrow_item IM ON BR.bloodborrowid = IM.bloodborrowid
            LEFT JOIN bloodstock_type ST ON IM.bloodstocktypeid = ST.bloodstocktypeid
            WHERE BR.receivingtypeid = '$receivingtypeid'
            AND BR.hospitalid = '$hospitalid'
            AND IFNULL(IM.bloodstocktypeid,'') != ''
            AND BR.`status` = '0'
            ORDER BY bloodborrowid DESC
            LIMIT 200";


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
            'data' => $resultArray
        )
    );

    mysqli_close($conn);
?>