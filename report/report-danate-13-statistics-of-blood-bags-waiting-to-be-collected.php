<?php

include('jasper-connection.php');

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');

 $fromdate = $_GET['fromdate'];
 $todate = $_GET['todate'];
 $fromtodate = $_GET['fromtodate'];
 $printdate = dateNowDMY();
 $printdatetime = dateNowDMY()." ".date("H:i");
 $fullname = $_SESSION['fullname'];
 $yearmonth = $_GET['yearmonth'];
 $yearmonthfull = $_GET['yearmonthfull'];
 $hospitalid = $_GET['hospitalid'];
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"yearmonth" => "$yearmonth",
	"yearmonthfull" => "$yearmonthfull",
	"hospitalid" => "$hospitalid",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_13_statistics_of_blood_bags_waiting_to_be_collected', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>