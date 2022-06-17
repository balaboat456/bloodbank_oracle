<?php
    include('../../connection.php');
    include('../dateFormat.php');

    $condition = '';
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];

    $bloodstockpaytypeid = $_GET['bloodstockpaytypeid'];
    $hospital_pay = $_GET['hospital_pay'];

    if(!empty($bloodstockpaytypeid) && $bloodstockpaytypeid != "null")
    $condition = $condition." AND MN.bloodstockpaytypeid = '$bloodstockpaytypeid' ";

    if(!empty($hospital_pay) && $hospital_pay != "null")
    $condition = $condition." AND MN.hospitalid = '$hospital_pay' ";

    $sql = "SELECT 
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'LPRC'
		THEN 1 ELSE 0 END) AS LPRC_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'LPRC'
		THEN 1 ELSE 0 END) AS LPRC_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'LPRC'
		THEN 1 ELSE 0 END) AS LPRC_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'LPRC'
		THEN 1 ELSE 0 END) AS LPRC_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'LDPRC'
		THEN 1 ELSE 0 END) AS LDPRC_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'LDPRC'
		THEN 1 ELSE 0 END) AS LDPRC_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'LDPRC'
		THEN 1 ELSE 0 END) AS LDPRC_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'LDPRC'
		THEN 1 ELSE 0 END) AS LDPRC_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'PRC'
		THEN 1 ELSE 0 END) AS PRC_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'PRC'
		THEN 1 ELSE 0 END) AS PRC_B ,
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'PRC'
		THEN 1 ELSE 0 END) AS PRC_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'PRC'
		THEN 1 ELSE 0 END) AS PRC_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'SDP'
		THEN 1 ELSE 0 END) AS SDP_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'SDP'
		THEN 1 ELSE 0 END) AS SDP_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'SDP'
		THEN 1 ELSE 0 END) AS SDP_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'SDP'
		THEN 1 ELSE 0 END) AS SDP_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'LPPC'
		THEN 1 ELSE 0 END) AS LPPC_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'LPPC'
		THEN 1 ELSE 0 END) AS LPPC_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'LPPC'
		THEN 1 ELSE 0 END) AS LPPC_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'LPPC'
		THEN 1 ELSE 0 END) AS LPPC_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'LDPPC'
		THEN 1 ELSE 0 END) AS LDPPC_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'LDPPC'
		THEN 1 ELSE 0 END) AS LDPPC_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'LDPPC'
		THEN 1 ELSE 0 END) AS LDPPC_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'LDPPC'
		THEN 1 ELSE 0 END) AS LDPPC_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'PC'
		THEN 1 ELSE 0 END) AS PC_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'PC'
		THEN 1 ELSE 0 END) AS PC_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'PC'
		THEN 1 ELSE 0 END) AS PC_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'PC'
		THEN 1 ELSE 0 END) AS PC_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'FFP'
		THEN 1 ELSE 0 END) AS FFP_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'FFP'
		THEN 1 ELSE 0 END) AS FFP_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'FFP'
		THEN 1 ELSE 0 END) AS FFP_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'FFP'
		THEN 1 ELSE 0 END) AS FFP_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'CRP'
		THEN 1 ELSE 0 END) AS CRP_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'CRP'
		THEN 1 ELSE 0 END) AS CRP_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'CRP'
		THEN 1 ELSE 0 END) AS CRP_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'CRP'
		THEN 1 ELSE 0 END) AS CRP_AB ,
		
		SUM(CASE WHEN PY.bloodgroup = 'A' AND PY.bloodtype = 'CRYO'
		THEN 1 ELSE 0 END) AS CAYO_A ,
		SUM(CASE WHEN PY.bloodgroup = 'B' AND PY.bloodtype = 'CRYO'
		THEN 1 ELSE 0 END) AS CAYO_B ,
		SUM(CASE WHEN PY.bloodgroup = 'O' AND PY.bloodtype = 'CRYO'
		THEN 1 ELSE 0 END) AS CAYO_O ,
		SUM(CASE WHEN PY.bloodgroup = 'AB' AND PY.bloodtype = 'CRYO'
		THEN 1 ELSE 0 END) AS CAYO_AB 
                               
    FROM bloodstock_pay_main MN
    LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
    LEFT JOIN hospital HP ON MN.hospitalid = HP.hospitalid
    LEFT JOIN bloodstock_pay_type PT ON MN.bloodstockpaytypeid = PT.bloodstockpaytypeid
    LEFT JOIN users URC ON URC.username = MN.bloodstockpaymainuser 
    WHERE MN.active <> 0
    AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
    $condition
    ORDER BY MN.bloodstockpaymainid DESC
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
