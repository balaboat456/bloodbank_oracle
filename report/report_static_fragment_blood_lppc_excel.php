<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$controls = array(
    "fromdate" => "$fromdate",
    "todate" => "$todate",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_static_fragment_blood_lppc', 'xls', null, null, $controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานสถิติการเตรียม LPPC / LPPC(PAS).xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');

echo $report;
