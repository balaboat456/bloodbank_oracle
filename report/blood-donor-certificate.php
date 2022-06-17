<?php

include('jasper-connection.php');

 $id = $_GET['id'];
$user_login = $_GET['user_login'];

$controls = array(
	"id" => "$id",
	"user_login" => "$user_login"
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_donor_certificate', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>