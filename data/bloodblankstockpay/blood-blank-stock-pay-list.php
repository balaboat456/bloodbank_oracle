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

    $sql = "SELECT MN.* ,
    PY.bag_number,
    PY.bloodtype,
    HP.hospitalname,
    PT.bloodstockpaytypename,
    GROUP_CONCAT(CONCAT(PY.bloodgroup) SEPARATOR '<br/>') AS bloodgroup,
    GROUP_CONCAT(CONCAT(PY.bloodtype) SEPARATOR '<br/>') AS bloodtype_bag_number,
    GROUP_CONCAT(CONCAT(PY.bag_number) SEPARATOR '<br/>') AS group_bag_number ,
    GROUP_CONCAT( DISTINCT URC.fullname SEPARATOR ' <br/>' ) AS fullname ,
    CASE WHEN MN.bloodstockpaytypeid = 8 THEN CONCAT_WS(' ',MN.hn_pay_out ,MN.patient_pay_out ,'<br>' ,DATE_FORMAT(MN.patient_pay_date,'%d/%m/%Y') ,MN.patient_pay_time ,MN.bloodstockpaymainremark) 
         WHEN MN.bloodstockpaytypeid = 9 THEN CONCAT_WS(' ',BRO.bloodbrokenname ,MN.bloodstockpaymainremark)
	ELSE MN.bloodstockpaymainremark END AS bloodstockpaymainremark
    FROM bloodstock_pay_main MN
    LEFT JOIN bloodstock_pay PY ON MN.bloodstockpaymainid = PY.bloodstockpaymainid
    LEFT JOIN hospital HP ON MN.hospitalid = HP.hospitalid
    LEFT JOIN bloodstock_pay_type PT ON MN.bloodstockpaytypeid = PT.bloodstockpaytypeid
    LEFT JOIN users URC ON URC.username = MN.bloodstockpaymainuser 
    LEFT JOIN blood_broken BRO ON BRO.bloodbrokenid = MN.bloodbrokenid
    WHERE MN.active <> 0
    AND DATE_FORMAT(MN.bloodstockpaymaindate, '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
    $condition
    GROUP BY MN.bloodstockpaymainid
    ORDER BY MN.bloodstockpaymainid DESC";
    
    
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