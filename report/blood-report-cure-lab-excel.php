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

$fromtime = $_GET['fromtime'];
$totime = $_GET['totime'];
$requestunit_id = $_GET['requestunit'];
$labform_id = $_GET['labform'];
$procedure_id = $_GET['procedure'];
$inspector_id = $_GET['inspector'];

///////////////////////////////////////////////////////////////
$from_date = $fromdate . ' ' . $fromtime;
$to_date = $todate . ' ' . $totime;


 
$controls = array(
	"fromdate" => "$from_date",
	"todate" => "$to_date",
	"requestunit_id" => "$requestunit_id",
	"labform_id" => "$labform_id",
	"procedure_id" => "$procedure_id",
	"inspector_id" => "$inspector_id",

);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_report_cure_lab_form_excel', 'xls',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานการขอตรวจทางห้องปฏิบัติการ.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report; 

?>