<?php

include('jasper-connection.php');
date_default_timezone_set('Asia/Bangkok');
 $id = $_GET['id'];

$controls = array(
	"id" => "$id"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_07_quality_control_of_sdp', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>