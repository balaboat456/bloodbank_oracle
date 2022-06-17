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
$unitofficeid = $_GET['unitofficeid'];
$bloodgroupid = $_GET['bloodgroupid'];
$infected = $_GET['infected'];
$placeid = $_GET['placeid'];
$unitnameid = $_GET['unitnameid'];
$donation_status = $_GET['donation_status'];
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
	"infected" => "$infected",
	"placeid" => "$placeid",
	"unitnameid" => "$unitnameid",
	"donation_status" => "$donation_status",
	"activityid" => "$activityid"
);


$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_11_blood_collection_excel', 'xls',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงาน Blood Collection.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report; 

?>