<?php

date_default_timezone_set('Asia/Bangkok');
include('../connection.php');

$status = true;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.225/apibb/api/bloodbank/GetToken',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'   {
    "user" : "rapi",
    "password" : "1234"
   }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$responseArray = json_decode($response);
curl_close($curl);

$ResultToken = $responseArray->Result;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rhisapi.rajavithi.go.th/absWS/api/Getdata/Patient',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "hn":"46062532"
}',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "X-Access-Token: $ResultToken"
  ),
));

$response = curl_exec($curl);

curl_close($curl);


$responseArray = json_decode($response);


if($responseArray->MessageCode == "200")
{
    $hn = $responseArray->Result[0]->HN ;

    $patientcode = $responseArray->Result[0]->HN ;
    $patientidcard  = $responseArray->Result[0]->Personal_ID ;

    $prefixid  = getPrefix($responseArray->Result[0]->Pname) ;
    $prefixname  = $responseArray->Result[0]->Pname ;

    $genderid = getGender($prefixid)[0] ;
    $patientgender = getGender($prefixid)[1] ;
    
    $patientfname  = $responseArray->Result[0]->Name ;
    $patientlname  = $responseArray->Result[0]->Surname ;
    $patientfullname  = $prefixname.$patientfname.' '.$patientlname ;

    $patienthn  = $hn ;

    $patientinsuranceid  = "" ;
    $patientinsurance  = $responseArray->Result[0]->LAST_INSURANCE_NAME  ;

    $wardid  = "" ;
    $wardname  = "" ;

    $sql = "SELECT 	* FROM patient WHERE patienthn='$patienthn'";
    
    $query = mysqli_query($conn,$sql);

    $query_row = mysqli_num_rows($query);

    if($query_row > 0)
    {
        $sql = "
                        UPDATE patient SET
                        patientidcard='$patientidcard',
                        prefixid='$prefixid',
                        prefixname='$prefixname',
                        genderid='$genderid',
                        patientgender='$patientgender',
                        patientfullname='$patientfullname',
                        patientfname='$patientfname',
                        patientlname='$patientlname',
                        patientinsuranceid='$patientinsuranceid',
                        patientinsurance='$patientinsurance',
                        wardid='$wardid',
                        wardname='$wardname'
                        WHERE patienthn = '$patienthn'
                        ";
                        
                        $resultSel = mysqli_query($conn, $sql);
                        if(empty($resultSel))
                        $status = false;
    }else
    {
        $sql = "INSERT INTO patient 
                    (
                        patientcode,
                        patientidcard,
                        prefixid,
                        prefixname,
                        genderid,
                        patientgender,
                        patientfullname,
                        patientfname,
                        patientlname,
                        patienthn,
                        patientinsuranceid,
                        patientinsurance,
                        wardid,
                        wardname
                    )
                    VALUES
                    (
                        '$patientcode',
                        '$patientidcard',
                        '$prefixid',
                        '$prefixname',
                        '$genderid',
                        '$patientgender',
                        '$patientfullname',
                        '$patientfname',
                        '$patientlname',
                        '$patienthn',
                        '$patientinsuranceid',
                        '$patientinsurance',
                        '$wardid',
                        '$wardname'
                    )
                    ";

                    $result = mysqli_query($conn, $sql);
                    if(empty($result))
                    $status = false;
    }


}

echo json_encode(
    array(
        'status' => $status,
        'data' => $responseArray,
    )
    
);

function getPrefix($v)
{
    $result = "";
    if($v == 'นาย')
    {
        $result = "1";
    }else if($v == 'นาง')
    {
        $result = "2";
    }else if($v == 'น.ส.' || $v == 'นางสาว')
    {
        $result = "3";
    }else if($v == 'เด็กชาย')
    {
        $result = "7";
    }else if($v == 'เด็กหญิง')
    {
        $result = "8";
    } 

    return $result;
}

function getGender($v)
{
    $result = ["",""];
    if($v == '1' || $v == '7')
    {
        $result = ["1","ชาย"];
    }else if($v == '2' || $v == '3' || $v == '8')
    {
        $result = ["2","หญิง"];
    }

    return $result;
}

?>
