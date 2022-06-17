<?php
    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $hospitalid =$_GET['hospitalid'];
    $bloodstockpaytypeid = $_GET['bloodstockpaytypeid'];

    if($hospitalid == ''){
        $condition = '';
    }
    else{
        $condition = "AND HT.hospitalid = '$hospitalid'";
    }
    if($bloodstockpaytypeid == ''){
        $condition = '';
    }else{
        $condition = "AND BM.bloodstockpaytypeid = '$bloodstockpaytypeid'";
    }

    $sql = "SELECT DATE_FORMAT(BM.bloodstockpaymaindate,'%d/%m/%Y') as paydate, 
    HT.hospitalname, 
    BT.bloodstockpaytypename2, 
    BTT.bloodstocktypename2, 
    COUNT(BP.bloodtype) as cnt 
    FROM bloodstock_pay_main BM
    LEFT JOIN bloodstock_pay BP  ON BP.bloodstockpaymainid = BM.bloodstockpaymainid
    LEFT JOIN hospital HT ON HT.hospitalid = BM.hospitalid
    LEFT JOIN bloodstock_pay_type BT ON BT.bloodstockpaytypeid = BM.bloodstockpaytypeid
    LEFT JOIN bloodstock_type BTT ON BTT.bloodstocktypeid = BP.bloodtype 
    WHERE BM.bloodstockpaymaindate BETWEEN '$fromdate 00:00:00' AND '$todate 23:59:59'
    $condition
    GROUP BY BM.hospitalid,BP.bloodtype,BM.bloodstockpaytypeid
    ORDER BY BM.bloodstockpaymaindate
    ";
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
                'sql' => $sql
            )
            
        );
    
        mysqli_close($conn);
    ?>