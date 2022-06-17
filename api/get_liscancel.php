<?php
include('../connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $rhis_api_absws_config1.'GetToken?user=abs&password=w,j%5Bvdot',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "user":"abs",
      "password":"w,j[vdot"
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response);

$token = $responseArray->Result;

// echo $result;

///////////////////////////////////////////////////

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://rhisapi.rajavithi.go.th/absWS/api/liscancel',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "hn": "55900490",
    "request_date": "20210713",
    "request_time": "154857",
    "labsection": "2",
    "labgrpno": "8"
}',
    CURLOPT_HTTPHEADER => array(
        'X-Access-Token: ' . $token,
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);

$sql = "SELECT LCR.patientid , PT.patienthn
        FROM lab_check_request LCR
        JOIN patient PT ON LCR.patientid = PT.patientid
        WHERE labcheckrequestid = 210800004";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {

    // echo $row['patientid'];
   
}
echo date("Ymd") . "<br>";
echo substr(date("hisa"),0,6);