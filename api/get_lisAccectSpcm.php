<?php

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
  CURLOPT_URL => 'https://rhisapi.rajavithi.go.th/absWS/api/lisAccectSpcm',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "hn": "55900490",
    "request_date": "20210713",
    "request_time": "154857",
    "labsection": "1",
    "labgrpno": "1",
    "LN":null
}',
    CURLOPT_HTTPHEADER => array(
        'X-Access-Token: ' . $token,
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

