<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$fromtodate = $_GET['fromtodate'];
$fullname = $_SESSION['fullname'];
$printdate = dateNowDMY();
$printdatetime = dateNowDMY()." ".date("H:i");
$bloodgroup =$_GET['bloodgroup'];
$rh = $_GET['rh'];
$donation_status = $_GET['donation_status'];

if(!empty($bloodgroup))
$condition = $condition."AND DR.blood_group = '$bloodgroup'";

if (!empty($donation_status))
$condition = $condition . "AND DN.donation_status = '$donation_status'";

if($rh == 'Rh '){
	$condition = $condition . "AND RH.rhcode2 = '01'";
} else if ($rh == 'Rh-') {
	$condition = $condition . "AND RH.rhcode2 = '02'";
} else if ($rh == 'Rh(D)') {
	$condition = $condition . "AND RH.rhcode2 = '03'";
}

$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"fromtodate" => "$fromtodate",
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
    "condition" => "$condition"
);



$report = $client->reportService()->runReport($jasper_server_config_path . 'report_blood_donate_firsttime_excel', 'xls',null,null,$controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานผู้มาบริจาคโลหิตครั้งแรกที่โรงพยาบาลราชวิถี.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report; 
?>