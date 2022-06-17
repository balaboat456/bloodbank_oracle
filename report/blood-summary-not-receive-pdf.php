<?php

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
 $hospitalid = $_GET['hospitalid'];
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"hospitalid" => "$hospitalid",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_summary_not_receive_pdf', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>