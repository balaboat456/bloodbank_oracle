<?php

    // include '../include/database-config.php';

    $curl = curl_init();

$responseArray = array();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://192.168.7.20:8089/refeg/4/open',
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

    // return $responseArray;
    echo json_encode(
        array(
            'data' => $responseArray,
        )
    );
