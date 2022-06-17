<?php

include('jasper-connection.php');
include('../dateNow.php');
date_default_timezone_set('Asia/Bangkok');

 $id = $_GET['id'];
 $printdate = dateNowDMY();
 $printtime = date("H:i");

$controls = array(
	"id" => "$id",
	"printdate" => "$printdate",
	"printtime" => "$printtime"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_request_patient_sticker_auto', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>