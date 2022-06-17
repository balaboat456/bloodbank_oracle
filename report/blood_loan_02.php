<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
$id = $_GET['id'];
$report = $_GET['report'];
$name_login = $_GET['name_login'];

$patientfullname = $_GET['patientfullname'];
 
 $printdate = dateNowDMY();
 $printdatetime = dateNowDMY()." ".date("H:i");

$printdatetime2 = dateNowYMDNOspit() . "_" . date("Hi");
 $fullname = $_SESSION['fullname'];
$controls = array(
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"id" => "$id",
	"name_login" => "$name_login"
);

// $report = $client->reportService()->runReport("/reports/rajvithi/$report", 'pdf',null,null,$controls);
$report = $client->reportService()->runReport("$jasper_server_config_path" . "blood_loan_02", 'pdf', null, null, $controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=เบิกโลหิตหายาก_'. $patientfullname.'_'. $printdatetime2.'.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');

 
echo $report;
