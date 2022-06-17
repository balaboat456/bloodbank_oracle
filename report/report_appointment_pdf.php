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
$appointmenttype = $_GET['appointmenttype'];

 
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
    "appointmenttype" => "$appointmenttype",
	"fullname" => "$fullname"
);


if ($appointmenttype == 0) {
	$report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 1) {
	$report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf1', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 2) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf2', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 3) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf3', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 4) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf4', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 5) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf5', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 6) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf6', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 7) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf7', 'pdf', null, null, $controls);
} 
else if ($appointmenttype == 8) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_pdf8', 'pdf', null, null, $controls);
}
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report;
