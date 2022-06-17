<?php

// include '../include/database-config.php';

include('../connection.php');

date_default_timezone_set('Asia/Bangkok');

header('Content-Type: application/json');

$getallheaders = getallheaders();

$API_KEY = $getallheaders['api_key'];

$entityBody = json_decode(file_get_contents('php://input'));

// $responseArray = json_decode($response);







// return $responseArray;
echo json_encode(
    array(
        'getallheaders' => $getallheaders,
        'API_KEY' => $API_KEY,
        'entityBody' => $entityBody,
        'text' => '5555555555555',
    )
);
