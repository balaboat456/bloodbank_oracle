<?php

include('database-config.php');

$servername = $servername_config;
$username = $username_config;
$password = $password_config;
$dbname = $dbname_config;


$ebits = ini_get('error_reporting');
error_reporting($ebits ^ E_NOTICE);

//27.254.59.20
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// echo json_encode($conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>