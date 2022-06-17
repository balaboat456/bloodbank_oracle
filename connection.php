<?php
include('include/conn.php');

$host = $servername_config;
$username = $username_config;
$pass = $password_config;
$db_name = $dbname_config;


$conn = mysqli_connect($host,$username,$pass,$db_name);

mysqli_set_charset($conn,"utf8");
require __DIR__ . '/vendor/autoload.php';

Mattbit\MysqlCompat\Mysql::defineGlobals();
mysql_connect("$host","$username","$pass") or die(mysql_error());
mysql_query("SET NAMES utf8");
mysql_select_db("$db_name");

// Create connection
$con = new mysqli($host, $username, $pass, $db_name);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
	

?>