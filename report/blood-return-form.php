<?php

include('jasper-connection.php');
include('../include/conn.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
 $id = $_GET['id'];
 $printdatetime = dateNowDMY()." ".date("H:i");
 $fullname = '';

 $sql = "SELECT GROUP_CONCAT(DISTINCT US.fullname SEPARATOR ' / ') AS fullname
 FROM request_blood_crossmacth CM
 LEFT JOIN users US ON CM.username_return = US.username
 WHERE CM.requestbloodcrossmacthid in ($id)"
;

$query = mysqli_query($conn,$sql);

while($result = mysqli_fetch_array($query))
{
	$fullname = $result['fullname'];
}


$controls = array(
	"id" => "$id",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
);



$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_return_form', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>