<?php

// include '../include/database-config.php';

include('../connection.php');


$a = 0;
$b = 0;
$o = 0;
$ab = 0;

$curl = curl_init();

$responseArray = array();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://192.168.7.20:8089/refeg/4/close',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => '',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response);

$rfid = $responseArray[0]->tag_data;

$tag_str = $responseArray[0]->tag_str;

$count_tag = $responseArray[0]->count_tag; 

$rfid_text = "";



$number = 0;

foreach ($rfid as $data) {
    $rfid_text .= ",'" . $responseArray[0]->tag_data[$number]->tag_id . "'";
    $test = $responseArray[0]->tag_data[$number]->tag_id;
    $number++;
}

$rfid_query = substr($rfid_text, 1); 

$sql = "SELECT bloodgroup ,
SUM(CASE WHEN bloodgroup = 'A' THEN 1 ELSE 0 END) AS rfid_a,
SUM(CASE WHEN bloodgroup = 'B' THEN 1 ELSE 0 END) AS rfid_b,
SUM(CASE WHEN bloodgroup = 'O' THEN 1 ELSE 0 END) AS rfid_o,
SUM(CASE WHEN bloodgroup = 'AB' THEN 1 ELSE 0 END) AS rfid_ab
FROM bloodstock
WHERE bloodstockrfid IN ($rfid_query)
";
$query = mysqli_query($conn, $sql);

$resultArray = array();
while ($result = mysqli_fetch_array($query)) {
    array_push($resultArray, $result);
    $a = $result['rfid_a'];
    $b = $result['rfid_b'];
    $o = $result['rfid_o'];
    $ab = $result['rfid_ab'];
}





// return $responseArray;
echo json_encode(
    array(
        'data' => $responseArray,
        // 'tag_data' => $rfid,
        // '$tag_str'=> $tag_str,
        // '$rfid_query' => $rfid_query,
        '$query' => $resultArray,
        'rfid_a' => $a,
        'rfid_b' => $b,
        'rfid_o' => $o,
        'rfid_ab' => $ab,
        'sql'=> $sql,
        'count_tag' => $count_tag,
    )
);
