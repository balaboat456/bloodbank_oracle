<?php
    include('../../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $bag_number =$_GET['bag_number'];
    $rfid =$_GET['rfid'];

    if(!empty($bag_number))
    {
        $condition = $condition." AND BS.bag_number = '$bag_number' ";
    }else if(!empty($rfid))
    {
        $condition = $condition." AND BS.bloodstockrfid = '$rfid' ";
    }else if(!empty($fromdate) && !empty($todate))
    {
        $condition = $condition." AND BSM.bloodstockmaindate BETWEEN '$fromdate' AND '$todate' ";
    }else if(!empty($fromdate))
    {
        $condition = $condition." AND BSM.bloodstockmaindate = '$fromdate' ";
    }else
    {
        $condition = $condition." AND false ";
    }
    

    $sql = "SELECT 	
                MAX(CM.requestbloodcrossmacthid) AS requestbloodcrossmacthid,	
                BS.* ,
                RT.receivingtypename,
                HOS.hospitalname,
                BT.bloodstocktypename2,
                BTY.bloodstockpaytypename2,
                BST.bloodstockstatusname,
                RH.rhname3,
                CM.crossmacthstatusid,
                CM.requestbloodreturnstatusid,
                CM.ispayblood,
                ST.crossmacthstatusname,
                ST2.requestbloodreturnstatusname,
                BRM.bloodremarktext,
                PM.bloodstockpaymainremark,
                CONCAT(IFNULL(BRO.bloodbrokenname,'') ,IFNULL(PM.bloodstockpaymainremark,''))  AS bloodbrokenname
            FROM bloodstock BS
            LEFT JOIN bloodstock_pay_type  BTY ON BS.bloodstockpaytypeid = BTY.bloodstockpaytypeid
            LEFT JOIN request_blood_crossmacth CM ON BS.bloodstockid = CM.bloodstockid
            LEFT JOIN bloodstock_pay PY ON BS.bag_number = PY.bag_number AND BS.sub = PY.sub
            LEFT JOIN bloodstock_pay_main PM ON PY.bloodstockpaymainid = PM.bloodstockpaymainid
            LEFT JOIN crossmacth_status ST ON CM.crossmacthstatusid = ST.crossmacthstatusid
            LEFT JOIN request_blood_return_status ST2 ON CM.requestbloodreturnstatusid = ST2.requestbloodreturnstatusid
            LEFT JOIN receiving_type RT ON BS.receivingtypeid = RT.receivingtypeid
            LEFT JOIN hospital HOS ON BS.hospitalid = HOS.hospitalid
            LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
            LEFT JOIN bloodstock_status BST ON BS.bloodstockstatusid = BST.bloodstockstatusid
            LEFT JOIN bloodstock_main BSM ON BS.bloodstockmainid = BSM.bloodstockmainid
            LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
            LEFT JOIN blood_remark BRM ON BS.bloodremarkid = BRM.bloodremarkid
            LEFT JOIN blood_broken BRO ON BRO.bloodbrokenid = PM.bloodbrokenid
            WHERE BS.active <> 0 $condition
            GROUP BY BS.bloodstockid
            ORDER BY BS.bloodstockid DESC";

    error_log($sql );
    
    $query = mysqli_query($conn,$sql);


    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
        if(!empty($result["bag_number"]) && $result["bag_number"] != "")
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