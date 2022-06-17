<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
	$fromtime =$_GET['fromtime'];
	$todate = $_GET['todate'];
	$totime = $_GET['totime'];
	$requestunit = $_GET['requestunit'];
	$labform = $_GET['labform'];
	$procedure = $_GET['procedure'];
	$inspector = $_GET['inspector'];



if ($requestunit == '') {
	$requestunit_id = '';
} else {
	$requestunit_id = "AND LCR.labunitid = $requestunit";
}
///////////////////////////////////////////////////////////////
if ($labform == '') {
	$labform_id = '';
} else {
	$labform_id = "AND LF.labformid = $labform";
}
///////////////////////////////////////////////////////////////
if ($procedure == '') {
	$procedure_id = '';
} else {
	$procedure_id = "AND LCR.checkresultbloodstatusid = $procedure";
}
///////////////////////////////////////////////////////////////
if ($inspector == '') {
	$inspector_id = '';
} else {
	$inspector_id = "AND LCR.labcheckrequest_v_user = $inspector";
}
///////////////////////////////////////////////////////////////
$from_date = $fromdate.' '. $fromtime;
$to_date = $todate .' '. $totime;

    $sql = "SELECT 
LCR.labcheckrequestid , DATE_FORMAT(LCR.labrequestdatetime,'%d/%m/%Y %H:%I') AS labrequestdatetime, PT.patienthn ,
PT.patientfullname , LCR.labdaignosis , LCR.labunitid , UO.unitofficename ,
LF.labformid , LF.labformname , LCR.antibody0 , LCR.remarkcancelitem ,  

LCR.labusersend,
LCR.labcheckrequest_v_user,
LCR.labcheckrequest_a_user,
LCR.labuserget,
DATE_FORMAT(LCR.labgetdatetime,'%d/%m/%Y %H:%I') AS labgetdatetime,

DATE_FORMAT(TIMEDIFF(LCR.labgetdatetime , LCR.labrequestdatetime),'%H:%I') AS check_get ,

DATE_FORMAT(TIMEDIFF(LCRI.v_date_time , LCR.labgetdatetime),'%H:%I') AS get_v ,
DATE_FORMAT(TIMEDIFF(LCRI.a_date_time , LCRI.v_date_time),'%H:%I') AS v_a ,
DATE_FORMAT(TIMEDIFF(LCRI.a_date_time , LCR.labrequestdatetime),'%H:%I') AS request_a ,
DATE_FORMAT(TIMEDIFF(LCR.labgetdatetime , LCRI.a_date_time),'%H:%I') AS get_a ,

GROUP_CONCAT(CONCAT(LF.labformname) SEPARATOR ' <br> ') AS labformname

FROM    lab_check_request_item LCRI 
LEFT JOIN lab_check_request LCR ON LCR.labcheckrequestid = LCRI.labcheckrequestid 
LEFT JOIN patient PT ON LCR.patientid = PT.patientid
LEFT JOIN unit_office UO ON UO.unitofficeid = LCR.labunitid
LEFT JOIN labform LF ON LF.labformid = LCRI.labformid

WHERE LCR.labgetdatetime BETWEEN '$from_date' AND '$to_date'
AND LCR.checkresultbloodstatusid != 1
$requestunit_id
$labform_id
$procedure_id
$inspector_id

GROUP BY LCR.labcheckrequestid
ORDER BY LCR.labgetdatetime
    ";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    $style_right = 'style="text-align: right;"';
	while($row = mysqli_fetch_array($query))
	{
		$data.= "<tr>";
        $data.= "<td>".$row['labgetdatetime']."</td>";
        $data.= "<td>".$row['patienthn']."</td>";
		$data .= "<td>" . $row['patientfullname'] . "</td>";
		$data .= "<td>" . $row['labdaignosis'] . "</td>";
		$data .= "<td>" . $row['unitofficename'] . "</td>";
		$data .= "<td>" . $row['labformname'] . "</td>";
		$data .= "<td>" . $row['antibody0'] . "</td>";
		$data .= "<td>" . $row['remarkcancelitem'] . "</td>";

		$data .= "<td>" . $row['check_get'] . "</td>";
		$data .= "<td>" . $row['get_v'] . "</td>";	
		$data .= "<td>" . $row['v_a'] . "</td>";
		$data .= "<td>" . $row['request_a'] . "</td>";
		$data .= "<td>" . $row['get_a'] . "</td>";

		$data .= "<td>" . $row['labusersend'] . "</td>";
		$data .= "<td>" . $row['labuserget'] . "</td>";
		$data .= "<td>" . $row['labcheckrequest_v_user'] . "</td>";
		$data .= "<td>" . $row['labcheckrequest_a_user'] . "</td>";
        $data.= "</tr>";
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
		'from_date' => $from_date,
		'to_date' => $to_date
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
