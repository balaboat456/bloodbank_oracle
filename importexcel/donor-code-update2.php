<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
//File สำหรับ Import

$status = true;

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

$sql = "SELECT * FROM donor WHERE donorcode = '' AND apiupdate != 1";


$query = mysqli_query($conn,$sql);

while($result = mysqli_fetch_array($query))
{

    echo "*";

    $donorid = $result['donorid'];
    $donoridcard = $result['donoridcard'];

    $donoridcard_v = base64_encode(base64_encode( $donoridcard ));



    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => '192.168.1.115/PRODUCTION/API/Get_Token/get_Token_logistic',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $responseObj = json_decode($response) ;
    $token = $responseObj->token;


    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => '192.168.1.115/PRODUCTION/API/MasterData/donateblood',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'id='.$donoridcard_v,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$token,
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $response = curl_exec($curl);

    $responseObj = json_decode($response) ;

    $donorcode = $responseObj->jsondata[0]->dnrid;

    $sql = "UPDATE donor
            SET  donorcode = '$donorcode',
                    apiupdate = 1
            WHERE donoridcard = '$donoridcard'
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;


}

echo "============$status==========";




?>