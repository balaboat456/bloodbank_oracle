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
$activityid = $_GET['activityid'];

$donationproblemsreportid = $_GET['donationproblemsreportid'];

// if ($placeid == '1') {
//     $activityid = "0";
//     $unitnameid = "0";
// } else if ($placeid == '2') {
//     $placeid = "2";
//     $activityid = "0";
// } else if ($placeid == '3') {
//     $placeid = "3";
//     $unitnameid = "0";
//     // $activityid = "6";
// }
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
    "activityid" => "$activityid",
    "donationproblemsreportid" => "$donationproblemsreportid"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'report_blood_donate_problems_form_excel', 'xls', null, null, $controls);

header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายงานปัญหาของการรับบริจาค.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');

echo $report;
