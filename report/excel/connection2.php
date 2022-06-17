<?php

include('../../include/database-config.php');


$host = $servername_config;
$username = $username_config;
$password = $password_config;
$dbname = $dbname_config;


$conn = new mysqli($host, $username_config, $password, $dbname);
// mysqli_set_charset($conn,"utf8");
// echo json_encode($conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>