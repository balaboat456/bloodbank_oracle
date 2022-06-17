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
 $rhid = $_GET['rhid'];
 $placeid = $_GET['placeid'];
 $unitnameid = $_GET['unitnameid'];
 $activityid = $_GET['activityid'];

 
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"unitofficeid" => "$unitofficeid",
	"bloodgroupid" => "$bloodgroupid",
	"rhid" => "$rhid",
	"placeid" => "$placeid",
	"unitnameid" => "$unitnameid",
	"activityid" => "$activityid"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_15_people_who_donate_blood_excel', 'xls',null,null,$controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานสถิติผู้ที่สามารถบริจาคเลือดได้.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report;
