<?php
    include('../connection.php');
    include('dateFormat.php');

    $condition = '';
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];

    

    $sql = "SELECT M3.*,
 
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
    GROUP_CONCAT(DISTINCT CONCAT(M.bloodstocktypename2,'<input hidden ',M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_bloodstocktypename,
    GROUP_CONCAT(DISTINCT CONCAT(M.bloodgroup,'<input hidden ',M.bloodstocktypename2,' />') SEPARATOR '<br/><hr/>') AS group_bloodgroup,
    GROUP_CONCAT(DISTINCT CONCAT(M.qty,'<input hidden ',M.bloodstocktypename2,M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_sum_bloodgroup,
    SUM(M.qty) AS sum_qty
FROM  (SELECT 
IM.bloodborrowid,
BW.bloodborrowdate,
BW.bloodborrowtime,
BW.hospitalid,
HP.hospitalname,
BW.receivingtypeid,
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'A' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.a_qty,0) > 0 THEN IM.a_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
            LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
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
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'B' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.b_qty,0) > 0 THEN IM.b_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
            LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
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
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'O' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.o_qty,0) > 0 THEN IM.o_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
            LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
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
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'AB' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.ab_qty,0) > 0 THEN IM.ab_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
            LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
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
IM.bloodborrowitemid,
IM.bloodstocktypeid,
TY.bloodstocktypename2,
'' AS bloodgroup,
SUM(CASE WHEN  IFNULL(IM.cryo_qty,0) > 0 THEN IM.cryo_qty ELSE '' END) AS qty
FROM blood_borrow_item IM
LEFT JOIN blood_borrow BW ON IM.bloodborrowid = BW.bloodborrowid
LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
            LEFT JOIN hospital HP ON BW.hospitalid = HP.hospitalid
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
ORDER BY M3.bloodborrowid DESC";
    
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