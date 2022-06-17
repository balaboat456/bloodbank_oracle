<?php

include('jasper-connection.php');

 $id = $_GET['id'];

 $sdpprodyltyield = $_GET['sdpprodyltyield'];
 $sdpprodcount = $_GET['sdpprodcount'];
 $sdpprodunit = $_GET['sdpprodunit'];
 $sdpprodvolume = $_GET['sdpprodvolume'];

$controls = array(
	"id" => "$id",
	"sdpprodyltyield" => "$sdpprodyltyield",
	"sdpprodcount" => "$sdpprodcount",
	"sdpprodunit" => "$sdpprodunit",
	"sdpprodvolume" => "$sdpprodvolume",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_single_donor_platelet_sdp', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>