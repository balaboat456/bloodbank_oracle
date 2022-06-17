<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');

$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$requestunit = $_GET['requestunit'];
$requeststatus = $_GET['requeststatus'];
$fromdatee = $_GET['fromdatee'];
$todatee = $_GET['todatee'];

$fromtime = $_GET['fromtime'];
$totime = $_GET['totime'];

// if ($requestunit == '') {
// 	$requestunit = "";
// } else {
// 	$requestunit = "AND RB.requestunit = $requestunit";
// }

$out_time = $_GET['out_time'];
$in_time = $_GET['in_time'];
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"requeststatus" => "$requeststatus",
	"fromdatee" => "$fromdatee",
	"todatee" => "$todatee",
	"requestunit" => "$requestunit",

	"out_time" => "$out_time",
	"in_time" => "$in_time",

	"fromtime" => "$fromtime",
	"totime" => "$totime",
);
// $report = $client->reportService()->runReport("/reports/rajvithi/$report", 'pdf',null,null,$controls);
$report = $client->reportService()->runReport("$jasper_server_config_path" . "report_request_blood_reject_excel", 'xls', null, null, $controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายชื่อสรุปการปฎิเสธ-ยกเลิกสิ่งส่งตรวจ การขอจองเลือด.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');

echo $report;
