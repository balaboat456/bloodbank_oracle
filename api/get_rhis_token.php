<?php

function get_token_rhis()
{
    include '../include/database-config.php';

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $rhis_api_apibb_config.'gettoken',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "user":"'.$rhis_api_apibb_user.'",
        "password":"'.$rhis_api_apibb_password.'"
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $responseArray = json_decode($response);
    
    return $token = $responseArray->Result;
}

?>