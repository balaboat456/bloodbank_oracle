<?php

include('jasper-connection.php');
date_default_timezone_set('Asia/Bangkok');
$fromyear = $_GET['fromyear'];
 $toyear = $_GET['toyear'];
 $fromtoyear = $_GET['fromtoyear'];

 $fromyear = $fromyear."-01-01";
 $toyear = $toyear."-12-31";
$controls = array(
	"fromyear" => "$fromyear",
	"toyear" => "$toyear",
	"fromtoyear" => "$fromtoyear",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_09_platelet_donation_room_statistics', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>