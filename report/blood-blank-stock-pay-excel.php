<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
 $fromdate = $_GET['fromdate'].' 00:00';
 $todate = $_GET['todate'] . ' 23:59';
 $bloodstockpaytypeid = $_GET['bloodstockpaytypeid'];
 $hospital_pay = $_GET['hospital_pay'];
 $fromdatee = $_GET['fromdatee'];
 $todatee = $_GET['todatee'];


 
$controls = array(
	"fromdate" => "$fromdate",
	"todate" => "$todate",
	"bloodstockpaytypeid" => "$bloodstockpaytypeid",
	"hospital_pay" => "$hospital_pay",
    "fromdatee" => "$fromdatee",
	"todatee" => "$todatee",
);
if($bloodstockpaytypeid == 9){
	$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_blank_stock_pay_broken_excel', 'xls', null, null, $controls);
}else{
	$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_blank_stock_pay_excel', 'xls', null, null, $controls);
}
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=รายละเอียดการจ่ายเลือด.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report; 

?>