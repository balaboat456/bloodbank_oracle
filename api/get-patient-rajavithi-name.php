<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../connection.php');
include('../data/dateFormat.php');

$status = false;

$hn = replaceHNGet($_GET['hn']);
$patientid_hn = replaceHN($hn);

$responseArray = array();
$name = $_GET['name'];
$surname = $_GET['surname'];

if(!empty($env))
{

error_log("=======Load API=======");

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

error_log($response);

$responseArray = json_decode($response);
curl_close($curl);

$ResultToken = $responseArray->Result;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $rhis_api_absws_config1.'getdata/Lupt',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT =>  45,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
    "name":"' . $name . '",
    "surname":"' . $surname . '"
}',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "X-Access-Token: $ResultToken"
  ),
));

$response = curl_exec($curl);


curl_close($curl);


$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$patientid_hn','$response','$dateNowValue','$username','api-patient','API ผู้ป่วย')");

$responseArray = json_decode($response);

    


if($responseArray->MessageCode == "200")
{
    $qty = 0; //count($responseArray->Result)-1;

    $request = $responseArray->Result;

    foreach ($request as $data){
            $patientcode = $responseArray->Result[$qty]->HN;

            $patienthnext = $responseArray->Result[$qty]->HNEXT;

            $patientan = $responseArray->Result[$qty]->ANEXT;
            $patientidcard  = $responseArray->Result[$qty]->Personal_ID;

            $prefixid  = getPrefix($responseArray->Result[$qty]->Pname);
            $prefixname  = $responseArray->Result[$qty]->Pname;

            $genderid = getGender($prefixid)[$qty];
            $patientgender = getGender($prefixid)[1];

            $patientfname  = str_replace("'", "`", $responseArray->Result[$qty]->Name);
            $patientlname  = str_replace("'", "`", $responseArray->Result[$qty]->Surname);
            $patientfullname  = $prefixname . $patientfname . ' ' . $patientlname;

            $patientanbirthday  = $responseArray->Result[$qty]->Date_of_birth;

            $patientbloodgroup = replaceBloodgroup($responseArray->Result[$qty]->BLOODGRP);
            $patientrh = replaceRh($responseArray->Result[$qty]->BLOODGRP);

            $patientagetext = calAgeText($patientanbirthday);
            $patientage = getAge($patientanbirthday);
            $patientanbirthday  = date543year($patientanbirthday);

            $patienthn  = $hn;
            $patienthn = replaceHN($patienthn);

            $patientinsuranceid  = $responseArray->Result[$qty]->INSURANCE;
            $patientinsurance  = $responseArray->Result[$qty]->INSURANCE_NAME;

            $patientvn  = $responseArray->Result[$qty]->VN;
            $patientfn  = $responseArray->Result[$qty]->FN;
            $patientprvno  = $responseArray->Result[$qty]->PRVNO;


            $patientimage  = "data:image/png;base64," . $responseArray->Result[$qty]->Image;


            $patientimage = str_replace("null", "", $patientimage);
            $wardid  = $responseArray->Result[$qty]->WARDID;
            $wardname  = $responseArray->Result[$qty]->WARD;


            if (empty($patientan) || $patientan == 'null' || $patientan == '-') {
                $wardid  = '199';
                $wardname  = 'ห้องฉุกเฉิน';
            }

            $ispassedaway  = ($responseArray->Result[$qty]->DEADST == 'เสียชีวิต') ? '1' : '';


            $doctorcode2  = $responseArray->Result[$qty]->DCTID;
            $patientdoctorid = '';
            $patientdoctorname = '';

            $sql = "SELECT * FROM doctor WHERE doctorcode2 = '$doctorcode2'";

            $query = mysqli_query($conn, $sql);

            $query_row = mysqli_num_rows($query);

            if ($query_row > 0) {
                $result = mysqli_fetch_array($query);
                $patientdoctorid = $result["doctorid"];
                $patientdoctorname = $result["doctorname"];
            }



            $sql = "SELECT 	* FROM patient WHERE patienthn='$patienthnext'";

            $query = mysqli_query($conn, $sql);

            $query_row = mysqli_num_rows($query);

            if ($query_row > 0) {
                $sql = "
                        UPDATE patient SET
                        patientidcard='$patientidcard',
                        patientan='$patientan',
                        prefixid='$prefixid',
                        prefixname='$prefixname',
                        genderid='$genderid',
                        patientgender='$patientgender',
                        patientfullname='$patientfullname',
                        patientfname='$patientfname',
                        patientlname='$patientlname',
                        patientinsuranceid='$patientinsuranceid',
                        patientinsurance='$patientinsurance',
                        patientanbirthday='$patientanbirthday',
                        patientage = '$patientage',
                        patientagetext = '$patientagetext',
                        wardid='$wardid',
                        wardname='$wardname',
                        patientimage='$patientimage',
                        ispassedaway = '$ispassedaway',
                        patientvn='$patientvn',
                        patientfn='$patientfn',
                        patientprvno='$patientprvno',
                        patientdoctorid='$patientdoctorid',
                        patientdoctorname='$patientdoctorname'
                        WHERE patienthn = '$patienthnext'
                        ";

                $resultSel = mysqli_query($conn, $sql);
                if (!empty($resultSel))
                    $status = true;


                error_log($sql);
            } else {

                $sql = "INSERT INTO patient 
                    (
                        patientcode,
                        patientidcard,
                        prefixid,
                        prefixname,
                        genderid,
                        patientbloodgroup,
                        patientrh,
                        patientgender,
                        patientfullname,
                        patientfname,
                        patientlname,
                        patienthn,
                        patientan,
                        patientinsuranceid,
                        patientinsurance,
                        patientanbirthday,
                        patientage,
                        patientagetext,
                        wardid,
                        wardname,
                        patientvn,
                        patientfn,
                        patientprvno,
                        patientimage,
                        ispassedaway,
                        patientdoctorid,
                        patientdoctorname
                    )
                    VALUES
                    (
                        '$patientcode',
                        '$patientidcard',
                        '$prefixid',
                        '$prefixname',
                        '$genderid',
                        '$patientbloodgroup',
                        '$patientrh',
                        '$patientgender',
                        '$patientfullname',
                        '$patientfname',
                        '$patientlname',
                        '$patienthnext',
                        '$patientan',
                        '$patientinsuranceid',
                        '$patientinsurance',
                        '$patientanbirthday',
                        '$patientage',
                        '$patientagetext',
                        '$wardid',
                        '$wardname',
                        '$patientvn',
                        '$patientfn',
                        '$patientprvno',
                        '$patientimage',
                        '$ispassedaway',
                        '$patientdoctorid',
                        '$patientdoctorname'
                    )
                    ";

                $result = mysqli_query($conn, $sql);
                if (!empty($result))
                    $status = true;
            }
        $qty++;
    }

}else
{

}

}


echo json_encode(
    array(
        'status' => $status,
        'data' => $responseArray,
        'patienthnext' => $patienthnext,
        'name' => $name,
        'surname'=> $surname,
        'qty' => $qty
    )
    
);

function replaceHN($text)
{
    $newtext =  substr($text,2,6).'-'.substr($text,0,2);
    return $newtext;
}


function replaceBloodgroup($text)
{
    $newtext = str_replace("+","",$text);
    $newtext = str_replace("-","",$newtext);
    return $newtext;
}

function replaceRh($text)
{
    $newtext = '';
    if(!empty(strpos($text,'+'))  )
    {
        $newtext = 'Rh+';
    }else if(!empty(strpos($text,'-'))  )
    {
        $newtext = 'Rh-';
    }
    return $newtext;
}


function replaceHNGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[1].$arrayStr[0];
    return $newtext;
}

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

function getAge($birthday="0000-00-00")
{

    if(empty($birthday) || $birthday == 'null')
    return '';

    $todaydate=date("Y-m-d");
    $todaydate_year = date("Y");
    $todaydate_mouth = date("m");
    $todaydate_day = date("d");


    $array_birthday = explode("-",$birthday);


    // $age= $todaydate - $birthday;

    $age3= $todaydate_day - $array_birthday[2];
    if($age3 < 0){
        $age2= $todaydate_mouth - $array_birthday[1] - 1; 
    }
    else{
        $age2= $todaydate_mouth - $array_birthday[1]; 
    }

    if($age2 < 0){
        $age= $todaydate_year - $array_birthday[0] - 1;
    }
    else{
        $age= $todaydate_year - $array_birthday[0];
    }


    return $age;

}



?>