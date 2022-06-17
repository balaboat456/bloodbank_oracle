<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
 $fromdatetime = $_GET['fromdatetime'];
 $todatetime = $_GET['todatetime'];
 $fromtodate = $_GET['fromtodate'];
 $fromtodatetime = $_GET['fromtodatetime'];
 $usercreate = $_GET['usercreate'];
 
 $printdate = dateNowDMY();
 $printdatetime = dateNowDMY()." ".date("H:i");
 $fullname = $_SESSION['fullname'];
 $hospitalid = $_GET['hospitalid'];
$controls = array(
	"fromdatetime" => "$fromdatetime",
	"todatetime" => "$todatetime",
	"fromtodatetime" => "$fromtodatetime",
	"usercreate" => "$usercreate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_summarize_blood_letting', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>