<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 

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


$sql = "SELECT DT.donorid,DN.donoridcard,DN.rh
        FROM donate DT
        LEFT JOIN donor DN ON DT.donorid = DN.donorid
        WHERE DT.donation_date < '2564-10-18' 
        AND IFNULL(DN.donoridcard,'') != ''
        AND IFNULL(DN.rh,'0') IN ('0','')
        GROUP BY DT.donorid";
    
$query = mysqli_query($conn,$sql);

$resultArray = array();
while($result = mysqli_fetch_array($query))
{
    
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

    $responseArray = json_decode(curl_exec($curl)) ;

    curl_close($curl);
    $token =  $responseArray->token;

    $id = base64_encode(base64_encode( $result['donoridcard'] ));

    echo $result['donoridcard'].'<br/>';
    $donorid =  $result['donorid'];

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
    CURLOPT_POSTFIELDS => "id=$id",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $token",
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $responseArray = json_decode(curl_exec($curl)) ;

    curl_close($curl);
   
    $rh = getRh($responseArray->jsondata[0]->RH);

    if($responseArray->result == true)
    {
        $sql = "UPDATE donor
        SET rh='$rh'
        WHERE donorid = '$donorid' 
        ";
    
        $result = mysqli_query($conn, $sql);
    
        if(empty($result))
        $status = false;
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


function getRh($v)
{
    $result = "";

    if($v == "Positive")
    {
        $result = "Rh+";
    }else if($v == "Negative")
    {
        $result = "Rh-";
    }

    return $result;
}

?>