<?php

include('../include/database-config.php');
require_once  "../jrs-rest-php-client-master/autoload.dist.php";
// require_once "Jaspersoft/Client/Client.php";
use Jaspersoft\Client\Client;
$client = new Client(
				// "http://27.254.59.19:8080/jasperserver",
				"$jasper_server_config",
				// "http://localhost:8080/jasperserver",
				"$jasper_username_config",
				"$jasper_password_config"
			);

$controls = array(
	"test1" => 'ทดสอบ',
	"test2" => 'สุทธิพงศ์'
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'test_02', 'csv',null,null,$controls);
 
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.csv');
// header('Content-Transfer-Encoding: binary');
// header('Content-Length: ' . strlen($report));
header('Content-Type: charset=utf-8\n\n;');
 
echo mb_convert_encoding($report, "utf-8", "windows-1251");; 

?>