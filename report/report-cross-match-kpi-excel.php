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
 $unitofficeid = $_GET['unitofficeid'];
 $bloodgroupid = $_GET['bloodgroupid'];
 $infected = $_GET['infected'];
 $placeid = $_GET['placeid'];
 $unitnameid = $_GET['unitnameid'];

 $in_time = $_GET['in_time'];
 $out_time = $_GET['out_time'];

 $fromtime = $_GET['fromtime'];
 $totime = $_GET['totime'];
 

 
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",

	"in_time" => "$in_time",
	"out_time" => "$out_time",

	"fromtime" => "$fromtime",
	"totime" => "$totime",
);


$report = $client->reportService()->runReport($jasper_server_config_path . 'report_cross_match_kpi', 'xls',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานสรุปจำนวน crossmatch และจำนวนที่จ่ายจริง.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report; 

?>