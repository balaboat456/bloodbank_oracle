<?php

date_default_timezone_set('Asia/Bangkok');
include('../connection.php');

$curl = curl_init();

$hn = $_GET['hn'];

$date = date("Ymd");

$hnmd5 =  md5($hn.$date.'rjvt');

$hn_base64 = base64_encode(base64_encode( $hn ));

$status = true;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.rajavithi.go.th/PRODUCTION/API/BloodBank/pt_blood',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'utoken=bloodbank&ptoken=945adc28c78ec8d6ff1c2c27fba3c2cd&tmptoken='.$hnmd5.'&id='.$hn_base64.'&prj=VUhKcU1UZz0%3D',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$responseArray = json_decode($response);


if(!empty($responseArray->result))
{
    $hn = $responseArray->jsondata->hn ;

    $patientcode = $responseArray->jsondata->hn ;
    $patientidcard  = $responseArray->jsondata->cardno ;

    $prefixid  = getPrefix($responseArray->jsondata->thname->pname) ;
    $prefixname  = $responseArray->jsondata->thname->pname ;

    $genderid = getGender($prefixid)[0] ;
    $patientgender = getGender($prefixid)[1] ;
    
    $patientfname  = $responseArray->jsondata->thname->fname ;
    $patientlname  = $responseArray->jsondata->thname->lname ;
    $patientfullname  = $prefixname.$patientfname.' '.$patientlname ;

    $patienthn  = $responseArray->jsondata->hn ;

    $patientinsuranceid  = $responseArray->jsondata->pttype->pttype ;
    $patientinsurance  = $responseArray->jsondata->pttype->pttypename ;

    $wardid  = $responseArray->jsondata->lct->uselct ;
    $wardname  = $responseArray->jsondata->lct->name ;

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
        'data' => $responseArray
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