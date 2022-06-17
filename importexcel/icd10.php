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

// mysqli_autocommit($conn, FALSE);
$status = true;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.rajavithi.go.th/PRODUCTION/API/Master_Data/icd10',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'utoken=bloodbank&ptoken=945adc28c78ec8d6ff1c2c27fba3c2cd&prj=VUhKcU1UZz0%3D',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$namedDataArray = json_decode($response);
    
    foreach ($namedDataArray->jsondata as $resx) {

        $diagnosiscode =  $resx->icd10;
        $name =  str_replace("'","`",$resx->name);
        $thainame =  str_replace("'","`",$resx->thainame);

        echo $diagnosiscode.'<br/>';

        $sql = "SELECT * FROM diagnosis WHERE diagnosiscode = '$diagnosiscode'";

        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) == 0) {
            $sql = "
            INSERT INTO 
            diagnosis
            (
                diagnosiscode,
                diagnosisname,
                diagnosisname2

            )
            VALUES
            (
                '$diagnosiscode',
                '$name',
                '$thainame'
            )

            ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            echo "=========$status========<br/>";
            echo($sql."<br/>");
            // 
        }
        
        
     
       
    }


if ($status) {
    // mysqli_commit($conn);
    echo 'successful';
}else
{
    // mysqli_rollback($conn);
    echo 'error';
}

?>