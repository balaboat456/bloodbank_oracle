<?php

include('jasper-connection.php');

 $id = $_GET['id'];

$controls = array(
	"id" => "$id"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_donation_tracking_letter_excel', 'xls',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=พิมพ์จดหมายติดตามผู้บริจาคโลหิต.xls');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/xls; charset=utf-8;');
 
echo $report; 

?>