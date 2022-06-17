<?php
    include('../../connection.php');
    include('../../dateNow.php');
    

    $condition = '';
    $bag_number =$_GET['bag_number'];
    $bloodtype =$_GET['bloodtype'];
    $hospitalid =$_GET['hospitalid'];
    $receivingtypeid = $_GET['receivingtypeid'];
    $bloodstockpaytypeid = "";
    if($receivingtypeid == 6)
    {
        $bloodstockpaytypeid = 6;
    }else if($receivingtypeid == 5)
    {
        $bloodstockpaytypeid = 7;
    }

    $todate = dateNowTMD();
    $fromdate = dateNowYMDMonthDiff3();


$sql = "SELECT 
bloodstockpaymainid,
bloodstockpaymaincode,
formatbloodstockpaydatetime,
hospitalid,
bloodtype,
group_bloodtype,
bloodgroup,
sum_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodstocktypename1,'<input hidden ',M.bloodstocktypename2,M.sum_bloodgroup2,M.bloodgroup2,M.bloodstockmaindate2,' />')  SEPARATOR '<br/><hr/>') AS bloodstocktypename1,
M.bloodtype2,
GROUP_CONCAT(DISTINCT CONCAT(DATE_FORMAT(M.bloodstockmaindate2,'%d/%m/%Y'),'<input hidden ',M.bloodstocktypename2,M.sum_bloodgroup2,M.bloodgroup2,M.bloodstockmaindate2,' />') SEPARATOR '<br/><hr/>')  AS bloodstockmaindate2,
GROUP_CONCAT( CONCAT(M.bloodgroup2,'<input hidden ',M.bloodstocktypename2,M.sum_bloodgroup2,M.bloodgroup2,M.bloodstockmaindate2,' />') SEPARATOR '<br/><hr/>')  AS bloodgroup2,
GROUP_CONCAT(DISTINCT CONCAT(M.sum_bloodgroup2,'<input hidden ',M.bloodstocktypename2,M.sum_bloodgroup2,M.bloodgroup2,M.bloodstockmaindate2,' />') SEPARATOR '<br/><hr/>')  AS sum_bloodgroup2,
SUM( M.sum_bloodgroup2 )  AS sum_group_bloodgroup2,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodstocktypename2,'<input hidden ',M.bloodstocktypename2,M.sum_bloodgroup2,M.bloodgroup2,M.bloodstockmaindate2,' />') SEPARATOR '<br/><hr/>') AS bloodstocktypename2,
M.group_bloodstocktypename,
M.group_bloodgroup,
group_sum_bloodgroup


FROM
(SELECT M.* ,
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
M.bloodtype,
M.bloodgroup,
SUM(M.sum_bloodgroup) AS sum_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(TY.bloodstocktypename2,'<input hidden ',TY.bloodstocktypename2,M.sum_bloodgroup,M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_bloodstocktypename,
GROUP_CONCAT(DISTINCT CONCAT(M.bloodgroup,'<input hidden ',TY.bloodstocktypename2,M.sum_bloodgroup,M.bloodgroup,' />') SEPARATOR '<br/><hr/>') AS group_bloodgroup,
GROUP_CONCAT(DISTINCT CONCAT(M.sum_bloodgroup,'<input hidden ',TY.bloodstocktypename2,M.sum_bloodgroup,M.bloodgroup,' />') SEPARATOR '<hr/>') AS group_sum_bloodgroup

FROM (SELECT 
PY.bloodstockpaymainid,
MN.bloodstockpaymaincode,
DATE_FORMAT(PY.bloodstockpaydatetime,'%Y-%m-%d') AS formatbloodstockpaydatetime,
PY.hospitalid,
PY.bloodtype,
PY.bloodgroup,
COUNT(*) AS sum_bloodgroup

FROM bloodstock_pay PY
LEFT JOIN bloodstock_pay_main MN ON PY.bloodstockpaymainid = MN.bloodstockpaymainid
WHERE MN.hospitalid = '$hospitalid'
AND PY.bloodstockpaytypeid = '$bloodstockpaytypeid'
AND DATE_FORMAT(PY.bloodstockpaydatetime,'%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
GROUP BY PY.bloodstockpaymainid,PY.bloodtype,PY.bloodgroup) M
LEFT JOIN bloodstock_type TY ON M.bloodtype = TY.bloodstocktypeid
GROUP BY M.bloodstockpaymainid ) M

LEFT JOIN bloodstock_main  MN ON M.bloodstockpaymainid = MN.bloodstockpaymainid
LEFT JOIN  bloodstock SK ON MN.bloodstockmainid = SK.bloodstockmainid AND SK.active <> 0
LEFT JOIN bloodstock_type TY1 ON M.bloodtype = TY1.bloodstocktypeid
LEFT JOIN bloodstock_type TY2 ON SK.bloodtype = TY2.bloodstocktypeid

GROUP BY M.bloodstockpaymainid,SK.bloodgroup,SK.bloodtype,MN.bloodstockmaindate
ORDER BY M.bloodstockpaymainid DESC) M
GROUP BY M.bloodstockpaymainid
ORDER BY M.bloodstockpaymainid DESC


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