<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');

$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$fromtime = $_GET['fromtime'];
$totime = $_GET['totime'];
$requestunit = $_GET['requestunit'];
$requeststatus = $_GET['requeststatus'];
$fromdatee = $_GET['fromdatee'];
$todatee = $_GET['todatee'];


$out_time = $_GET['out_time'];
$in_time = $_GET['in_time'];

 
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"unitofficeid" => "$unitofficeid",
	"bloodgroupid" => "$bloodgroupid",
	"infected" => "$infected",
	"placeid" => "$placeid",
	"unitnameid" => "$unitnameid",
	"yearmonth" => "$yearmonth",
	"yearmonthfull" => "$yearmonthfull",
    "requestunit" => "$requestunit",
    "requeststatus" => "$requeststatus",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_refuse_ask_blood_excel', 'xls',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายชื่อสรุปการปฎิเสธ-ยกเลิกสิ่งส่งตรวจ การขอจองเลือด.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report;
