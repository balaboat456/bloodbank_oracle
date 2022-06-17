<?php

include('jasper-connection.php');
include('../dateNow.php');


session_start();
date_default_timezone_set('Asia/Bangkok');
$id = $_GET['id'];
 $printdate = dateNowDMY();
 $printdatetime = dateNowDMY()." ".date("H:i");
 $fullname = $_SESSION['fullname'];
$controls = array(
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"id" => "$id"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_donation_tracking_gift_needle_excel', 'xlsx',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานการรับเข็มที่ระลึกตามจำนวนครั้งของการบริจาค.xlsx');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8;');


// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.xls');
// header('Content-Transfer-Encoding: binary');
// header('Content-Length: ' . strlen($report));
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8;');
 
echo $report;

?>