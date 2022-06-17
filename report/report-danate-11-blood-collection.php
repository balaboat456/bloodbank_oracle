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

 $placeid = $_GET['placeid']; //////////////

 $unitnameid = $_GET['unitnameid'];
$donation_status = $_GET['donation_status'];
$activityid = $_GET['activityid'];




if ($donation_status == 1) {
	$print_status = "สถานะบริจาค: ได้";
}else if($donation_status == 2){
	$print_status = "สถานะบริจาค: ไม่ได้";
}else{
	$print_status = "";
}

 
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
	"print_status" => "$print_status",
	"activityid" => "$activityid"
);


if ($placeid == 2) {
	$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_11_blood_collection2', 'pdf', null, null, $controls);
} 
else if ($placeid == 3) {
	$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_11_blood_collection3', 'pdf', null, null, $controls);
}
else{
	$report = $client->reportService()->runReport($jasper_server_config_path . 'report_danate_11_blood_collection1', 'pdf', null, null, $controls);
}
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>