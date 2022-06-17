<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
$todate = $_GET['todate'];
$fromdate = $_GET['fromdate'];

$printdate = dateNowDMY();
$printdatetime = dateNowDMY() . " " . date("H:i");
$fullname = $_SESSION['fullname'];
$controls = array(
    "fromdate" => "$fromdate",
    "todate" => "$todate",
    "printdate" => "$printdate",
    "printdatetime" => "$printdatetime",
    "fullname" => "$fullname",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_request_donation_certificate_excel', 'xls', null, null, $controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานการขอใบรับรองการบริจาค.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');

echo $report;
