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


$sql = "SELECT * FROM donor WHERE IFNULL(donorbirthday,'0000-00-00') = '0000-00-00' AND donoridcard != '' LIMIT 10000";
    
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
   
    $donorbirthday = dmyToymd($responseArray->jsondata->birthdate);
    $donoridcard = $responseArray->jsondata->CARDNO;

    if($responseArray->result == true)
    {
        $sql = "UPDATE donor
        SET donorbirthday='$donorbirthday'
        WHERE donoridcard = '$donoridcard' 
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


function dmyToymd($date='')
{
    if(empty($date))
    return '';

    $date = str_replace("/",",",$date);
    $date = str_replace(" ",",",$date);
    $array = explode(',',$date);

    if(empty(empty($array[0]) || $array[1]) || empty($array[2]))
    return '0000-00-00';
  
    $result = (intval($array[2]))."-".$array[1]."-".$array[0]." ".$array[3];

    return $result;
}

?>