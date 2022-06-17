<?php

date_default_timezone_set('Asia/Bangkok');
include('jasper-connection.php');
include('../dateNow.php');


 $id = $_GET['id'];
 $datenow = dateNowDMY();
 $timenow = date("H:i") ;
$controls = array(
	"id" => "$id",
	"datenow" => "$datenow",
	"timenow" => "$timenow"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_request_patient_cancel', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>