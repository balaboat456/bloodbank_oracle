<?php

include('jasper-connection.php');

 $id = $_GET['id'];
 $report = $_GET['report'];
 $hn = $_GET['hn'];

$controls = array(
	"id" => "$id",
	"hn" => "$hn"
);

$report = $client->reportService()->runReport($jasper_server_config_path .$report, 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>