<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');

$printdate = dateNowDMY();
$printdatetime = dateNowDMY() . " " . date("H:i");
$fullname = $_SESSION['fullname'];
$id = $_GET['id'];
$controls = array(
    "fromdate" => "$fromdate",
    "todate" => "$todate",
    "fromtodate" => "$fromtodate",
    "printdate" => "$printdate",
    "printdatetime" => "$printdatetime",
    "fullname" => "$fullname",
    "id" => "$id"
);



$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_pay_to_er4', 'pdf', null, null, $controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');

echo $report;
