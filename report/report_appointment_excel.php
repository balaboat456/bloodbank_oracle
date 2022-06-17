<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$fromtodate = $_GET['fromtodate'];
$printdate = dateNowDMY();
$printdatetime = dateNowDMY() . " " . date("H:i");
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
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 1) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel1', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 2) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel2', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 3) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel3', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 4) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel4', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 5) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel5', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 6) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel6', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 7) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel7', 'xls', null, null, $controls);

} 
else if ($appointmenttype == 8) {
    $report = $client->reportService()->runReport($jasper_server_config_path . 'report_appointment_excel8', 'xls', null, null, $controls);

}

 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานการนัดหมายผู้มาบริจาค.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report;
