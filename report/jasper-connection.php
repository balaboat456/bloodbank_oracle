<?php

include('../include/database-config.php');
require_once  "../jasperlib/autoload.dist.php";
// require_once "Jaspersoft/Client/Client.php";
use Jaspersoft\Client\Client;
 
$client = new Client(
				// "http://27.254.59.19:8080/jasperserver",
				"$jasper_server_config",
				// "http://localhost:8080/jasperserver",
				"$jasper_username_config",
				"$jasper_password_config"
			);

?>