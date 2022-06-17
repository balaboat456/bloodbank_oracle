<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');

 $id = $_GET['id'];

$hn = $_GET['hn'];
if($hn == ''){
	$hn = 0;
}

 $fromdate = $_GET['fromdate'];
 $todate = $_GET['todate'];
 $fromtodate = $_GET['fromtodate'];
 $printdate = dateNowDMY();
 $printdatetime = dateNowDMY()." ".date("H:i");
 $fullname = $_GET['user_login'];
 $unitofficeid = $_GET['unitofficeid'];
 $bloodgroupid = $_GET['bloodgroupid'];
$controls = array(
	"id" => "$id",
	"hn" => "$hn",
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"unitofficeid" => "$unitofficeid",
	"bloodgroupid" => "$bloodgroupid",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_blood_compensate', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>