<?php
    include('../connection.php');
    include('dateFormat.php');

    $condition = '';
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];


    $sql = "SELECT * FROM ((SELECT 	M1.bloodborrowid AS idcode,
    M1.receivingtypename,
    M1.hospitalname,
    M1.group_bloodstocktypename,
    M1.group_bloodgroup,
    M1.group_sum_bloodgroup,
    M1.sum_qty,
    DATE_FORMAT(M1.bloodborrowdate,'%d/%m/%Y') AS get_date,
    
    
    M1.group_bloodstocktypename2_get AS group_bloodstocktypename_2,
    M1.group_bloodgroup_get AS group_bloodgroup_2,
    M1.group_sum_bloodgroup_get AS group_sum_bloodgroup_2,
    M1.net_sum_bloodgroup_get AS sum_qty_2,
    M1.group_bloodstockmaindate AS get_date_2,
    
    (M1.sum_qty - M1.net_sum_bloodgroup_get) AS  balance

FROM (SELECT M3.*,

GROUP_CONCAT(M3.bloodstocktypename2_get SEPARATOR '<br/><hr/>') AS group_bloodstocktypename2_get,
GROUP_CONCAT(M3.bloodgroup_get SEPARATOR '<br/><hr/>') AS group_bloodgroup_get,
GROUP_CONCAT(M3.sum_bloodgroup_get SEPARATOR '<br/><hr/>') AS group_sum_bloodgroup_get,
GROUP_CONCAT( DATE_FORMAT(M3.bloodstockmaindate,'%d/%m/%Y') SEPARATOR '<br/><hr/>')  AS group_bloodstockmaindate,
SUM(M3.sum_bloodgroup_get) AS net_sum_bloodgroup_get

FROM
(SELECT M2.*,
SK.bloodtype AS bloodtype_get,
TY.bloodstocktypename2 AS bloodstocktypename2_get,
SK.bloodgroup AS bloodgroup_get,
SUM(CASE WHEN SK.bloodgroup IS NOT NULL THEN 1 ELSE 0 END ) AS sum_bloodgroup_get,
MN.bloodstockmaindate


FROM (SELECT M.* ,

GROUP_CONCAT(DISTINCT M.bloodstocktypeid ) AS group_bloodstocktype,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodstocktypename2,'<input hidden ',M.bloodgroup,' />') ORDER BY M.bloodgroup ASC,M.bloodstocktypename2 ASC SEPARATOR '<hr/>') AS group_bloodstocktypename,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodgroup,'<input hidden ',M.bloodstocktypename2,' />') ORDER BY M.bloodgroup ASC,M.bloodstocktypename2 ASC SEPARATOR '<br/><hr/>') AS group_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M.qty,'<input hidden ',M.bloodstocktypename2,M.bloodgroup,' />') ORDER BY M.bloodgroup ASC,M.bloodstocktypename2 ASC SEPARATOR '<hr/>') AS group_sum_bloodgroup,
SUM(M.qty) AS sum_qty
FROM  (SELECT 
IM.bloodborrowid,
BW.bloodborrowdate,
BW.bloodborrowtime,
BW.hospitalid,
HP.hospitalname,
BW.receivingtypeid,
REC.receivingtypename,
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'A' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.a_qty,0) > 0 THEN IM.a_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
LEFT JOIN receiving_type REC ON BW.receivingtypeid = REC.receivingtypeid
WHERE IFNULL(a_qty,0) > 0
AND BW.bloodborrowdate BETWEEN '$fromdate' AND  '$todate' 
AND BW.`status` != 1
GROUP BY IM.bloodborrowid,TY.bloodstocktypeid

UNION 

SELECT 
IM.bloodborrowid,
BW.bloodborrowdate,
BW.bloodborrowtime,
BW.hospitalid,
HP.hospitalname,
BW.receivingtypeid,
REC.receivingtypename,
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'B' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.b_qty,0) > 0 THEN IM.b_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
LEFT JOIN receiving_type REC ON BW.receivingtypeid = REC.receivingtypeid
WHERE IFNULL(b_qty,0) > 0
AND BW.bloodborrowdate BETWEEN '$fromdate' AND  '$todate' 
AND BW.`status` != 1
GROUP BY IM.bloodborrowid,TY.bloodstocktypeid

UNION 

SELECT 
IM.bloodborrowid,
BW.bloodborrowdate,
BW.bloodborrowtime,
BW.hospitalid,
HP.hospitalname,
BW.receivingtypeid,
REC.receivingtypename,
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'O' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.o_qty,0) > 0 THEN IM.o_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
LEFT JOIN receiving_type REC ON BW.receivingtypeid = REC.receivingtypeid
WHERE IFNULL(o_qty,0) > 0
AND BW.bloodborrowdate BETWEEN '$fromdate' AND  '$todate' 
AND BW.`status` != 1
GROUP BY IM.bloodborrowid,TY.bloodstocktypeid

UNION 

SELECT 
IM.bloodborrowid,
BW.bloodborrowdate,
BW.bloodborrowtime,
BW.hospitalid,
HP.hospitalname,
BW.receivingtypeid,
REC.receivingtypename,
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'AB' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.ab_qty,0) > 0 THEN IM.ab_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
LEFT JOIN receiving_type REC ON BW.receivingtypeid = REC.receivingtypeid
WHERE IFNULL(IM.ab_qty,0) > 0
AND BW.bloodborrowdate BETWEEN '$fromdate' AND  '$todate' 
AND BW.`status` != 1
GROUP BY IM.bloodborrowid,TY.bloodstocktypeid

UNION 

SELECT 
IM.bloodborrowid,
BW.bloodborrowdate,
BW.bloodborrowtime,
BW.hospitalid,
HP.hospitalname,
BW.receivingtypeid,
REC.receivingtypename,
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.cryo_qty,0) > 0 THEN IM.cryo_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
LEFT JOIN receiving_type REC ON BW.receivingtypeid = REC.receivingtypeid
WHERE IFNULL(IM.cryo_qty,0) > 0
AND BW.bloodborrowdate BETWEEN '$fromdate' AND  '$todate' 
AND BW.`status` != 1
GROUP BY IM.bloodborrowid,TY.bloodstocktypeid) M
GROUP BY M.bloodborrowid
) M2
LEFT JOIN bloodstock SK ON M2.bloodborrowitemid = SK.bloodborrowitemid
LEFT JOIN bloodstock_type TY ON SK.bloodtype = TY.bloodstocktypeid
LEFT JOIN bloodstock_main MN ON SK.bloodstockmainid = MN.bloodstockmainid
GROUP BY M2.bloodborrowid,SK.bloodtype,SK.bloodgroup,MN.bloodstockmaindate
) M3
WHERE M3.hospitalid NOT IN (1,2)
GROUP BY M3.bloodborrowid
ORDER BY M3.bloodborrowid DESC) M1)
UNION
(
    SELECT  M1.bloodstockpaymaincode AS idcode,
				'รับจากการแลกเลือดจากสถานพยาบาลอื่น' AS receivingtypename,
				M1.hospitalname,
				
				M1.bloodstocktypename2 AS group_bloodstocktypename,
				M1.bloodgroup2 AS group_bloodgroup,
				M1.sum_bloodgroup2 AS group_sum_bloodgroup,
				M1.sum_group_bloodgroup2 AS sum_qty,
				M1.bloodstockmaindate2 AS get_date,
				
				M1.group_bloodstocktypename AS group_bloodstocktypename_2,
				M1.group_bloodgroup AS group_bloodgroup_2,
				M1.group_sum_bloodgroup AS group_sum_bloodgroup_2,
				M1.sum_bloodgroup AS sum_qty_2,
				DATE_FORMAT(M1.formatbloodstockpaydatetime,'%d/%m/%Y') AS get_date_2,
				
				(M1.sum_bloodgroup -  sum_group_bloodgroup2)  AS  balance

FROM (SELECT 
    bloodstockpaymainid,
    bloodstockpaymaincode,
    formatbloodstockpaydatetime,
    hospitalid,
    bloodstockpaymainremark,
    bloodtype,
    group_bloodtype,
    bloodgroup,
    hospitalname,
    sum_bloodgroup,
    GROUP_CONCAT(DISTINCT M.bloodstocktypename1 SEPARATOR '<br/><hr/>') AS bloodstocktypename1,
    M.bloodtype2,

    GROUP_CONCAT( DATE_FORMAT(M.bloodstockmaindate2,'%d/%m/%Y') SEPARATOR '<br/><hr/>')  AS bloodstockmaindate2,
    GROUP_CONCAT( M.bloodgroup2 SEPARATOR '<br/><hr/>')  AS bloodgroup2,
    GROUP_CONCAT( M.sum_bloodgroup2 SEPARATOR '<br/><hr/>')  AS sum_bloodgroup2,
    SUM( M.sum_bloodgroup2 )  AS sum_group_bloodgroup2,
    GROUP_CONCAT( M.bloodstocktypename2 SEPARATOR '<br/><hr/>') AS bloodstocktypename2,
    M.group_bloodstocktypename,
    M.group_bloodgroup,
    group_sum_bloodgroup


    FROM
    (SELECT M.* ,
    HP.hospitalname,
    GROUP_CONCAT(M.bloodtype) AS group_bloodtype,
    TY1.bloodstocktypename2 AS bloodstocktypename1,
    SK.bloodtype AS bloodtype2,
    MN.bloodstockmaindate AS bloodstockmaindate2,
        SK.bloodgroup AS bloodgroup2,
    SUM(CASE WHEN (IFNULL(SK.bloodgroup,'') != '') THEN 1 ElSE 0 END  ) AS sum_bloodgroup2,
    TY2.bloodstocktypename2 AS bloodstocktypename2
    FROM (SELECT 
    M.bloodstockpaymainid,
    M.bloodstockpaymaincode,
    M.formatbloodstockpaydatetime,
    M.hospitalid,
    M.bloodstockpaymainremark,
    M.bloodtype,
    M.bloodgroup,
    SUM(M.sum_bloodgroup) AS sum_bloodgroup,
    GROUP_CONCAT(DISTINCT CONCAT(TY.bloodstocktypename2,'<input hidden ',M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_bloodstocktypename,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodgroup,'<input hidden ',TY.bloodstocktypename2,' />') SEPARATOR '<br/><hr/>') AS group_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M.sum_bloodgroup,'<input hidden ',TY.bloodstocktypename2,M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_sum_bloodgroup

    FROM (SELECT 
    PY.bloodstockpaymainid,
    MN.bloodstockpaymaincode,
    DATE_FORMAT(PY.bloodstockpaydatetime,'%Y-%m-%d') AS formatbloodstockpaydatetime,
    MN.hospitalid,
    MN.bloodstockpaymainremark,
    PY.bloodtype,
    PY.bloodgroup,
    COUNT(*) AS sum_bloodgroup

    FROM bloodstock_pay PY
    LEFT JOIN bloodstock_pay_main MN ON PY.bloodstockpaymainid = MN.bloodstockpaymainid
    WHERE PY.bloodstockpaytypeid = '6'
    
    AND DATE_FORMAT(PY.bloodstockpaydatetime,'%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
    GROUP BY PY.bloodstockpaymainid,PY.bloodtype,PY.bloodgroup) M
    LEFT JOIN bloodstock_type TY ON M.bloodtype = TY.bloodstocktypeid
    GROUP BY M.bloodstockpaymainid ) M

    LEFT JOIN bloodstock_main  MN ON M.bloodstockpaymainid = MN.bloodstockpaymainid
    LEFT JOIN  bloodstock SK ON MN.bloodstockmainid = SK.bloodstockmainid
    LEFT JOIN bloodstock_type TY1 ON M.bloodtype = TY1.bloodstocktypeid
    LEFT JOIN bloodstock_type TY2 ON SK.bloodtype = TY2.bloodstocktypeid
    LEFT JOIN hospital HP ON M.hospitalid = HP.hospitalid
    WHERE SK.active = 1
    GROUP BY M.bloodstockpaymainid,SK.bloodgroup,SK.bloodtype,MN.bloodstockmaindate
    ORDER BY M.bloodstockpaymainid DESC) M
    GROUP BY M.bloodstockpaymainid
    ORDER BY M.bloodstockpaymainid DESC) M1
)

UNION
(
    SELECT M1.bloodstockpaymaincode AS idcode,
				'คืนเลือดให้สถานพยาบาลอื่น' AS receivingtypename,
				M1.hospitalname,
				
				M1.bloodstocktypename2 AS group_bloodstocktypename,
				M1.bloodgroup2 AS group_bloodgroup,
				M1.sum_bloodgroup2 AS group_sum_bloodgroup,
				M1.sum_group_bloodgroup2 AS sum_qty,
				M1.bloodstockmaindate2 AS get_date,
				
				M1.group_bloodstocktypename AS group_bloodstocktypename_2,
				M1.group_bloodgroup AS group_bloodgroup_2,
				M1.group_sum_bloodgroup AS group_sum_bloodgroup_2,
				M1.sum_bloodgroup AS sum_qty_2,
				M1.formatbloodstockpaydatetime AS get_date_2,
				
				(M1.sum_bloodgroup -  sum_group_bloodgroup2)  AS  fluidbalance
				FROM (SELECT 
    bloodstockpaymainid,
    bloodstockpaymaincode,
    formatbloodstockpaydatetime,
    hospitalid,
    bloodstockpaymainremark,
    bloodtype,
    group_bloodtype,
    bloodgroup,
    hospitalname,
    sum_bloodgroup,
    GROUP_CONCAT(DISTINCT M.bloodstocktypename1 SEPARATOR '<br/><hr/>') AS bloodstocktypename1,
    M.bloodtype2,

    GROUP_CONCAT( DATE_FORMAT(M.bloodstockmaindate2,'%d/%m/%Y') SEPARATOR '<br/><hr/>')  AS bloodstockmaindate2,
    GROUP_CONCAT( M.bloodgroup2 SEPARATOR '<br/><hr/>')  AS bloodgroup2,
    GROUP_CONCAT( M.sum_bloodgroup2 SEPARATOR '<br/><hr/>')  AS sum_bloodgroup2,
    SUM( M.sum_bloodgroup2 )  AS sum_group_bloodgroup2,
    GROUP_CONCAT( M.bloodstocktypename2 SEPARATOR '<br/><hr/>') AS bloodstocktypename2,
    M.group_bloodstocktypename,
    M.group_bloodgroup,
    group_sum_bloodgroup


    FROM
    (SELECT M.* ,
    HP.hospitalname,
    GROUP_CONCAT(M.bloodtype) AS group_bloodtype,
    TY1.bloodstocktypename2 AS bloodstocktypename1,
    SK.bloodtype AS bloodtype2,
    MN.bloodstockmaindate AS bloodstockmaindate2,
        SK.bloodgroup AS bloodgroup2,
    SUM(CASE WHEN (IFNULL(SK.bloodgroup,'') != '') THEN 1 ElSE 0 END  ) AS sum_bloodgroup2,
    TY2.bloodstocktypename2 AS bloodstocktypename2
    FROM (SELECT 
    M.bloodstockpaymainid,
    M.bloodstockpaymaincode,
    M.formatbloodstockpaydatetime,
    M.hospitalid,
    M.bloodstockpaymainremark,
    M.bloodtype,
    M.bloodgroup,
    SUM(M.sum_bloodgroup) AS sum_bloodgroup,
    GROUP_CONCAT(DISTINCT CONCAT(TY.bloodstocktypename2,'<input hidden ',M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_bloodstocktypename,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodgroup,'<input hidden ',TY.bloodstocktypename2,' />') SEPARATOR '<br/><hr/>') AS group_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M.sum_bloodgroup,'<input hidden ',TY.bloodstocktypename2,M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_sum_bloodgroup

    FROM (SELECT 
    PY.bloodstockpaymainid,
    MN.bloodstockpaymaincode,
    DATE_FORMAT(PY.bloodstockpaydatetime,'%Y-%m-%d') AS formatbloodstockpaydatetime,
    MN.hospitalid,
    MN.bloodstockpaymainremark,
    PY.bloodtype,
    PY.bloodgroup,
    COUNT(*) AS sum_bloodgroup

    FROM bloodstock_pay PY
    LEFT JOIN bloodstock_pay_main MN ON PY.bloodstockpaymainid = MN.bloodstockpaymainid
    WHERE PY.bloodstockpaytypeid = '7'
    
    AND DATE_FORMAT(PY.bloodstockpaydatetime,'%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
    GROUP BY PY.bloodstockpaymainid,PY.bloodtype,PY.bloodgroup) M
    LEFT JOIN bloodstock_type TY ON M.bloodtype = TY.bloodstocktypeid
    GROUP BY M.bloodstockpaymainid ) M

    LEFT JOIN bloodstock_main  MN ON M.bloodstockpaymainid = MN.bloodstockpaymainid
    LEFT JOIN  bloodstock SK ON MN.bloodstockmainid = SK.bloodstockmainid
    LEFT JOIN bloodstock_type TY1 ON M.bloodtype = TY1.bloodstocktypeid
    LEFT JOIN bloodstock_type TY2 ON SK.bloodtype = TY2.bloodstocktypeid
    LEFT JOIN hospital HP ON M.hospitalid = HP.hospitalid
    WHERE SK.active = 1
    GROUP BY M.bloodstockpaymainid,SK.bloodgroup,SK.bloodtype,MN.bloodstockmaindate
    ORDER BY M.bloodstockpaymainid DESC) M
    GROUP BY M.bloodstockpaymainid
    ORDER BY M.bloodstockpaymainid DESC) M1
)) M2
ORDER BY DATE_FORMAT(STR_TO_DATE(get_date, '%d/%m/%Y'), '%Y-%m-%d') DESC
";
    
    $query = mysqli_query($conn,$sql);

    error_log($sql);

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