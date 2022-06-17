<?php

include('../include/database-config.php');

$curl = curl_init();

$Printtername = $_POST["Printtername"];
$Filename = $_POST["Filename"];
$Fileurl = $_POST["Fileurl"];
$username = $_POST["username"];
$Numberset = $_POST["Numberset"];

if(empty($Numberset))
$Numberset = '1';



curl_setopt_array($curl, array(
  CURLOPT_URL => $printer_api_config,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "Printtername": "'.$Printtername.'",
    "Filename": "'.$Filename.'",
    "Fileurl": "'.$Fileurl.'",
    "Numberset": "'.$Numberset.'",
    "username":"'.$username.'"

}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
