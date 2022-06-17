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
 $hospitalid = $_GET['hospitalid'];
 $year = $_GET['year'];
 $bloodstocktypegroupid =$_GET['bloodstocktypegroupid'];
    
 if(!empty($bloodstocktypegroupid) && $bloodstocktypegroupid != 'null')
 $condition = " AND TY.bloodstocktypegroupid = '$bloodstocktypegroupid' ";


$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"year" => "$year",
	"condition" => "$condition"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'statistic_blood_pay_of_year', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>