<?php
    include('../connection.php');

    $condition = '';
    $year =$_GET['year'];
    $bloodstocktypegroupid =$_GET['bloodstocktypegroupid'];
    
    if(!empty($bloodstocktypegroupid) && $bloodstocktypegroupid != 'null')
    $condition = " AND TY.bloodstocktypegroupid = '$bloodstocktypegroupid' ";


    $sql = "SELECT 
                'มกราคม $year' AS monthname,
                'ม.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-01'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-01'  $condition
            UNION
            SELECT 
                'กุมภาพันธ์ $year' AS monthname,
                'ก.พ. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-02'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-02'  $condition
            UNION
            SELECT 
                'มีนาคม $year' AS monthname,
                'มี.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-03'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-03'  $condition
            UNION
            SELECT 
                'เมษายน $year' AS monthname,
                'เม.ย. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-04'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-04'  $condition
            UNION
            SELECT 
                'พฤษภาคม $year' AS monthname,
                'พ.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-05'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-05'  $condition
            UNION
            SELECT 
                'มิถุนายน $year' AS monthname,
                'มิ.ย. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-06'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-06'  $condition
            UNION
            SELECT 
                'กรกฎาคม $year' AS monthname,
                'ก.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-07'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-07'  $condition
            UNION
            SELECT 
                'สิงหาคม $year' AS monthname,
                'ส.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-08'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-08'  $condition
            UNION
            SELECT 
                'กันยายน $year' AS monthname,
                'ก.ย. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-09'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-09'  $condition
            UNION
            SELECT 
                'ตุลาคม $year' AS monthname,
                'ต.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-10'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-10'  $condition
            UNION
            SELECT 
                'พฤศจิกายน $year' AS monthname,
                'พ.ย. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-11'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-11'  $condition
            UNION
            SELECT 
                'ธันวาคม $year' AS monthname,
                'ธ.ค. $year' AS monthcode,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 2 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype2,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 3 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype3,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 4 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype4,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 5 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype5,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 6 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype6,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 7 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype7,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 8 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype8,
                IFNULL(SUM(CASE WHEN MN.bloodstockpaytypeid = 9 THEN 1 ELSE 0 END),0) AS sum_bloodstockpaytype9,
                (
					SELECT COUNT(*)
					FROM request_blood_crossmacth CM
                    LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
					WHERE DATE_FORMAT(payblooddate, '%Y-%m') = '$year-12'  $condition
				) AS sum_crossmatch
            FROM bloodstock_pay_main MN
            LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            WHERE MN.active <> 0
            AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m') = '$year-12'  $condition ";
 
    
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