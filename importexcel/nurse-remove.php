<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
//File สำหรับ Import

 
/** PHPExcel */
require_once 'PHPExcel/Classes/PHPExcel.php';
 
/** PHPExcel_IOFactory - Reader */
include 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$servername = '192.168.7.13';
$username = 'root';
$password = 'P@ssw0rd1168';
$dbname = 'bloodbank';
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// echo json_encode($conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_autocommit($conn, FALSE);
$status = true;


$sql = "SELECT *,COUNT(*) AS countnurse,MAX(nurseid) AS  maxnurseid
FROM nurse 
GROUP BY nursecode
HAVING countnurse > 1" ;
    
$query = mysqli_query($conn,$sql);

$resultArray = array();
while($result = mysqli_fetch_array($query))
{
    $id = $result['maxnurseid'];
    $sql = "DELETE FROM nurse WHERE nurseid = '$id'";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

        echo $sql.'<br/>';
}

if ($status) {
    mysqli_commit($conn);
    echo 'successful';
}else
{
    mysqli_rollback($conn);
    echo 'error';
}


?>