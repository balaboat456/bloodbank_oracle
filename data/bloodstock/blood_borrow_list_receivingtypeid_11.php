<?php
include('../../connection.php');

$condition = '';
$bag_number = $_GET['bag_number'];
$bloodtype = $_GET['bloodtype'];
$hospitalid = $_GET['hospitalid'];

$sql = "SELECT 
M2.*,

PY2.group_bloodstocktypename_pay2 AS group_bloodstocktypename_pay,
PY2.group_bloodgroup_pay2 AS group_bloodgroup_pay, 
PY2.group_sum_bloodgroup_pay2 AS group_sum_bloodgroup_pay,
PY2.group_bloodstockpaymaindate_pay2 AS group_bloodstockpaymaindate_pay ,
PY2.sum_payqty2 AS sum_payqty


FROM 



(SELECT 
M1.*,
GROUP_CONCAT(DISTINCT CONCAT(M1.bloodstocktypename2,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodstocktypename,
GROUP_CONCAT(DISTINCT CONCAT(M1.bloodgroup,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M1.sum_bloodgroup,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M1.bloodstockmaindate,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodstockmaindate,
    SUM(M1.sum_bloodgroup) as sum_qty
FROM 

(SELECT 
IM.bloodborrowid,
IM.bloodborrowitemid,
BW.bloodborrowcode,
BS.hospitalid,
BS.bloodtype,
HT.hospitalname,
TY.bloodstocktypename2,
BS.bloodgroup,
COUNT(*) AS sum_bloodgroup,
DATE_FORMAT(MN.bloodstockmaindate,'%d/%m/%Y') AS bloodstockmaindate

FROM bloodstock BS
LEFT JOIN blood_borrow_item IM ON BS.bloodborrowitemid = IM.bloodborrowitemid
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_main MN ON BS.bloodstockmainid = MN.bloodstockmainid
LEFT JOIN bloodstock_type TY ON BS.bloodtype = TY.bloodstocktypeid
LEFT JOIN hospital HT ON BS.hospitalid = HT.hospitalid
WHERE 
BS.hospitalid = '$hospitalid'
AND IM.bloodborrowitemid > 0
AND BS.active <> 0
GROUP BY IM.bloodborrowid,BS.bloodtype,BS.bloodgroup,MN.bloodstockmaindate) M1
GROUP BY M1.bloodborrowid) M2



LEFT JOIN 

(
SELECT PY.* ,
GROUP_CONCAT(PY.group_bloodstocktypename_pay SEPARATOR '<br/><hr/>') AS group_bloodstocktypename_pay2,
GROUP_CONCAT(PY.group_bloodgroup_pay SEPARATOR '<br/><hr/>') AS group_bloodgroup_pay2,
GROUP_CONCAT(PY.group_sum_bloodgroup_pay SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup_pay2,
GROUP_CONCAT(PY.group_bloodstockpaymaindate_pay SEPARATOR '<br/><hr/>') AS group_bloodstockpaymaindate_pay2,
SUM(PY.sum_payqty) as sum_payqty2
FROM
(
SELECT MN.* ,
    PY.bag_number,
    PY.bloodtype,
    HP.hospitalname,
    PT.bloodstockpaytypename,
		PY.bloodgroup AS group_bloodgroup_pay,
		TY.bloodstocktypename2 AS group_bloodstocktypename_pay,
        DATE_FORMAT(MN.patient_pay_date,'%d/%m/%Y')  AS group_bloodstockpaymaindate_pay ,
		COUNT(PY.bloodgroup) AS group_sum_bloodgroup_pay ,
		COUNT(PY.bag_number) AS sum_payqty 
    FROM bloodstock_pay_main MN
    LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
    LEFT JOIN hospital HP ON MN.hospitalid = HP.hospitalid
    LEFT JOIN bloodstock_pay_type PT ON MN.bloodstockpaytypeid = PT.bloodstockpaytypeid
    LEFT JOIN users URC ON URC.username = MN.bloodstockpaymainuser 
    LEFT JOIN blood_broken BRO ON BRO.bloodbrokenid = MN.bloodbrokenid
    LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
    WHERE MN.active <> 0
    GROUP BY MN.bloodstockpaymainid , PY.bloodgroup,TY.bloodstocktypename2
    ORDER BY MN.bloodstockpaymainid ASC
) PY

GROUP BY PY.bloodborrowid
) PY2 ON M2.bloodborrowid = PY2.bloodborrowid
ORDER BY M2.bloodborrowid DESC
";




// แบบเก่า

// $sql = "SELECT 
// M2.*,

// PY.group_bloodstocktypename_pay,
// PY.group_bloodgroup_pay,
// PY.group_sum_bloodgroup_pay,
// PY.group_bloodstockpaymaindate_pay,
// PY.sum_payqty

// FROM (SELECT 
// M1.*,
// GROUP_CONCAT(DISTINCT CONCAT(M1.bloodstocktypename2,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodstocktypename,
// GROUP_CONCAT(DISTINCT CONCAT(M1.bloodgroup,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodgroup,
// GROUP_CONCAT(DISTINCT CONCAT(M1.sum_bloodgroup,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup,
// GROUP_CONCAT(DISTINCT CONCAT(M1.bloodstockmaindate,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') ORDER BY M1.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodstockmaindate,
//     SUM(M1.sum_bloodgroup) as sum_qty
// FROM (SELECT 
// IM.bloodborrowid,
// IM.bloodborrowitemid,
// BW.bloodborrowcode,
// BS.hospitalid,
// BS.bloodtype,
// HT.hospitalname,
// TY.bloodstocktypename2,
// BS.bloodgroup,
// COUNT(*) AS sum_bloodgroup,
// DATE_FORMAT(MN.bloodstockmaindate,'%d/%m/%Y') AS bloodstockmaindate

// FROM bloodstock BS
// LEFT JOIN blood_borrow_item IM ON BS.bloodborrowitemid = IM.bloodborrowitemid
// LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
// LEFT JOIN bloodstock_main MN ON BS.bloodstockmainid = MN.bloodstockmainid
// LEFT JOIN bloodstock_type TY ON BS.bloodtype = TY.bloodstocktypeid
// LEFT JOIN hospital HT ON BS.hospitalid = HT.hospitalid
// WHERE 
// BS.hospitalid = '$hospitalid'
// AND IM.bloodborrowitemid > 0
// AND BS.active <> 0
// GROUP BY IM.bloodborrowid,BS.bloodtype,BS.bloodgroup,MN.bloodstockmaindate) M1
// GROUP BY M1.bloodborrowid) M2
// LEFT JOIN (
// SELECT 
// PY.bloodborrowid,
// GROUP_CONCAT(DISTINCT CONCAT(PY.bloodstocktypename2,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') ORDER BY PY.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodstocktypename_pay,
// GROUP_CONCAT(DISTINCT CONCAT(PY.bloodgroup,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') ORDER BY PY.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodgroup_pay,
// GROUP_CONCAT(DISTINCT CONCAT(PY.sum_bloodgroup,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') ORDER BY PY.bloodtype SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup_pay,
// GROUP_CONCAT(DISTINCT CONCAT(PY.bloodstockpaymaindate,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') ORDER BY PY.bloodtype SEPARATOR '<br/><hr/>') AS group_bloodstockpaymaindate_pay,
// SUM(PY.sum_bloodgroup) as sum_payqty
// FROM (SELECT  		IM.bloodborrowid,
// IM.bloodborrowitemid ,
// MN.hospitalid ,
// PY.bloodtype,
// PY.bloodgroup,
// DATE_FORMAT(MN.bloodstockpaymaindate,'%d/%m/%Y') AS bloodstockpaymaindate,
// TY.bloodstocktypename2,
// COUNT(*) AS sum_bloodgroup
// FROM bloodstock_pay PY
// LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
// LEFT JOIN bloodstock_pay_main MN ON PY.bloodstockpaymainid = MN.bloodstockpaymainid
// LEFT JOIN blood_borrow_item IM ON MN.bloodborrowid = IM.bloodborrowid    AND PY.bloodtype = IM.bloodstocktypeid

// WHERE 
//  MN.hospitalid = '$hospitalid'
// AND IM.bloodborrowitemid > 0
// GROUP BY IM.bloodborrowid,PY.bloodtype,PY.bloodgroup,DATE_FORMAT(MN.bloodstockpaymaindate,'%d/%m/%Y')
//          ) PY
//          GROUP BY PY.bloodborrowid
// ) PY ON M2.bloodborrowid = PY.bloodborrowid
// ORDER BY M2.bloodborrowid DESC
// ";


/*

            $sql = "SELECT 
            M2.*,

            GROUP_CONCAT(DISTINCT CONCAT(PY.bloodstocktypename2,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodstocktypename_pay,
            GROUP_CONCAT(DISTINCT CONCAT(PY.bloodgroup,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodgroup_pay,
            GROUP_CONCAT(DISTINCT CONCAT(PY.sum_bloodgroup,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup_pay,
            GROUP_CONCAT(DISTINCT CONCAT(PY.bloodstockpaymaindate,'<input hidden ',PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate,PY.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodstockpaymaindate_pay,
            SUM(PY.sum_bloodgroup) as sum_payqty

            FROM (SELECT 
            M1.*,
            GROUP_CONCAT(DISTINCT CONCAT(M1.bloodstocktypename2,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodstocktypename,
            GROUP_CONCAT(DISTINCT CONCAT(M1.bloodgroup,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodgroup,
            GROUP_CONCAT(DISTINCT CONCAT(M1.sum_bloodgroup,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup,
            GROUP_CONCAT(DISTINCT CONCAT(M1.bloodstockmaindate,'<input hidden ',M1.bloodtype,M1.bloodgroup,M1.bloodstockmaindate,M1.sum_bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodstockmaindate,
                SUM(M1.sum_bloodgroup) as sum_qty
            FROM (SELECT 
            IM.bloodborrowid,
            IM.bloodborrowitemid,
            BW.bloodborrowcode,
            BS.hospitalid,
            BS.bloodtype,
            HT.hospitalname,
            TY.bloodstocktypename2,
            BS.bloodgroup,
            COUNT(*) AS sum_bloodgroup,
            DATE_FORMAT(MN.bloodstockmaindate,'%d/%m/%Y') AS bloodstockmaindate
            
            FROM bloodstock BS
            LEFT JOIN blood_borrow_item IM ON BS.bloodborrowitemid = IM.bloodborrowitemid
            LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
            LEFT JOIN bloodstock_main MN ON BS.bloodstockmainid = MN.bloodstockmainid
            LEFT JOIN bloodstock_type TY ON BS.bloodtype = TY.bloodstocktypeid
            LEFT JOIN hospital HT ON BS.hospitalid = HT.hospitalid
            WHERE 
            BS.hospitalid = '$hospitalid'
            AND IM.bloodborrowitemid > 0
            GROUP BY IM.bloodborrowid,BS.bloodtype,BS.bloodgroup,MN.bloodstockmaindate) M1
            GROUP BY M1.bloodborrowid) M2
            LEFT JOIN (

            SELECT  		IM.bloodborrowid,
            IM.bloodborrowitemid ,
            MN.hospitalid ,
            PY.bloodtype,
            PY.bloodgroup,
            DATE_FORMAT(MN.bloodstockpaymaindate,'%d/%m/%Y') AS bloodstockpaymaindate,
            TY.bloodstocktypename2,
            COUNT(*) AS sum_bloodgroup
            FROM bloodstock_pay PY
            LEFT JOIN bloodstock_type TY ON PY.bloodtype = TY.bloodstocktypeid
            LEFT JOIN bloodstock_pay_main MN ON PY.bloodstockpaymainid = MN.bloodstockpaymainid
            LEFT JOIN blood_borrow_item IM ON MN.bloodborrowid = IM.bloodborrowid 
            
            WHERE MN.hospitalid = '$hospitalid'
            AND IM.bloodborrowitemid > 0
            GROUP BY IM.bloodborrowid,PY.bloodtype,PY.bloodgroup,MN.bloodstockpaymaindate

            ) PY ON M2.bloodborrowid = PY.bloodborrowid
            GROUP BY M2.bloodborrowid,PY.bloodtype,PY.bloodgroup,PY.bloodstockpaymaindate
 ";
 */


error_log($sql);


$query = mysqli_query($conn, $sql);

$resultArray = array();
while ($result = mysqli_fetch_array($query)) {
    array_push($resultArray, $result);
}
echo json_encode(
    array(
        'status' => true,
        'data' => $resultArray
    )
);

mysqli_close($conn);
