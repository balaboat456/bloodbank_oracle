<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../connection.php');
include('../data/dateFormat.php');
$status = true;

$fromdate = dmyToymdInt($_GET["fromdate"]);
$todate = dmyToymdInt($_GET["todate"]);

// error_log("====$todate=======");
// error_log("====$fromdate=======");
$x = $todate;
while ($x >= $fromdate) {
    $date_use = $x;



    // $date_use = date('Ymd');
    // $date_use = '20211109';

    $responseArray = array();
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $rhis_api_absws_config1 . 'GetToken?user=abs&password=w,j%5Bvdot',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
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

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://rhisapi.rajavithi.go.th/absWS/api/lisrequest",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "labsection":"89",
        "date":"' . $date_use . '"
    }',
        CURLOPT_HTTPHEADER => array(
            'X-Access-Token: ' . $token,
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    $dateNowValue = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];

    mysqli_query($conn, "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$date_use','$response','$dateNowValue','$username','api-lab-request','API lab request')");


    curl_close($curl);

    $data_request = json_decode($response);


    if ($data_request->MessageCode == "200") {
        $state1 = true;
        $resultObj = $data_request->Result;
        foreach ($resultObj as $resultItem) {

            $hn = replaceHN($resultItem->hn);

            $an =  $resultItem->an;
            $prefix = $resultItem->prefix;
            $fname = $resultItem->fname;
            $lname = $resultItem->lname;
            $brthdate = $resultItem->brthdate;
            $male = $resultItem->male;
            $age = $resultItem->age;
            $request = $resultItem->Labno;

            $fullname = $prefix . $fname . ' ' . $lname;


            $sql = "SELECT 	* FROM patient WHERE patienthn='$hn'";

            $query = mysqli_query($conn, $sql);

            $query_row = mysqli_num_rows($query);

            if ($query_row == 0) {
                $sql = "INSERT INTO patient 
                    (
                        patientcode,
                        prefixname,
                        patientgender,
                        patientfullname,
                        patientfname,
                        patientlname,
                        patientage,
                        patienthn,
                        patientan
                    )
                    VALUES
                    (
                        '$hn',
                        '$prefix',
                        '$male',
                        '$fullname',
                        '$fname',
                        '$lname',
                        '$age',
                        '$hn',
                        '$an'
                    )
                    ";

                $result = mysqli_query($conn, $sql);
                if (empty($result))
                    $status = false;
            }

            foreach ($request as $data) {
                //// ข้างใน Labno

                $rawjsondata = json_encode($data);

                $labid = $resultItem->hn . $data->request_dat . $data->request_time;

                $ln = $data->ln;
                $request_date = $data->request_date;
                $request_time = $data->request_time;
                $labsection = $data->labsection;
                $labgrpno = $data->labgrpno;
                $lct_code = $data->lct_code;
                $lct_name = $data->lct_name;
                $payst = $data->payst;
                $labst = $data->labst;
                $opdipd = $data->opdipd;
                $pttype_code = $data->pttype_code;
                $pttype_name = $data->pttype_name;
                $lvstst_code = $data->lvstst_code;
                $lvstst_name = $data->lvstst_name;
                $spcm_date = $data->spcm_date;
                $spcm_time = $data->spcm_time;
                $spcmstf = $data->spcmstf;
                $spcmstf_name = $data->spcmstf_name;
                $labstf = $data->labstf;
                $labstf_name = $data->labstf_name;
                $keep_date = $data->keep_date;
                $keep_time = $data->keep_time;
                $dct_code = $data->dct_code;
                $dct_name = $data->dct_name;
                $labrqtcs = $data->labrqtcs;
                $prediag = $data->prediag;
                $branch = $data->branch;
                $commentreq = $data->commentreq;

                $Test = $data->Test;

                $request_date2 = substr($request_date, 0, 4) + 543 . '-' . substr($request_date, 6, 2) . '-' . substr($request_date, 4, 2);
                $request_time2 = timeFormat($request_time);
                $keep_date2 = substr($keep_date, 0, 4) + 543 . '-' . substr($keep_date, 6, 2) . '-' . substr($keep_date, 4, 2);
                $keep_time2 = timeFormat($keep_time);


                $patientid = "";
                $sql = "SELECT patientid
                        FROM patient
                        WHERE patienthn = '$hn'";

                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    $patientid = $row['patientid'];
                }

                $sql = "SELECT labcheckrequestid , labrequestdatetime , patientid
                    FROM lab_check_request
                    WHERE labcheckrequestid = '$labid'";

                $query = mysqli_query($conn, $sql);
                $query_row = mysqli_num_rows($query);



                if ($query_row == 0) {

                    $sql = "INSERT INTO lab_check_request 
                (
                    labcheckrequestid,
                    labcheckrequestcode,
                    patientid,
                    labgetdatetime, 
                    checkresultbloodstatusid,
                    labkeepdatetime,
                    labrequestdatetime,
                    labsenddatetime,
                    labunitid,
                    labjobtypeid,
                    maintenancerightid,
                    ln,
                    doctorid,  
                    labusersend,
                    labunitroomid
                )
                VALUES
                (
                    '$labid',
                    '$labcheckrequestcode',
                    '$patientid',
                    '$request_date2 $request_time2',
                    '1',
                    '$keep_date2 $keep_time2',
                    '$request_date2 $request_time2',
                    '$request_date2 $request_time2',
                    '1',
                    '1',
                    '99',
                    '$ln',
                    '$dct_code',
                    '$labstf_name',
                    '$lct_code'
                )";



                    $result = mysqli_query($conn, $sql);
                    if (empty($result))
                        $status = false;

                    foreach ($Test as $row) {
                        $test_code = $row->test_code;
                        $test_name = $row->test_name;
                        $labspcm = $row->labspcm;
                        $labspcm_name = $row->labspcm_name;

                        $sql = "SELECT *
                        FROM labform 
                        WHERE test_code = '$test_code'";

                        $query = mysqli_query($conn, $sql);
                        $query_row = mysqli_num_rows($query);

                        while ($row = mysqli_fetch_array($query)) {
                            $labformid = $row['labformid'];
                        }

                        if ($query_row > 0) {
                            $sql = "INSERT INTO lab_check_request_item
                                (
                                    labcheckrequestid,
                                    labformid
                                )
                                    value
                                (
                                    '$labid',
                                    '$labformid'
                                )
                            ";


                            $result = mysqli_query($conn, $sql);
                            if (empty($result))
                                $status = false;
                        }
                    }
                }
            }
        }
    } else {
        $state1 = false;
    }



    $ymd = DateTime::createFromFormat('Ymd', $date_use);
    $x =  intval($ymd->modify('-1 day')->format('Ymd'));
}


echo json_encode(
    array(
        'status' => $status,
        'state1' => $state1,
        'state2' => $state2,
        'hn' => $hn,
        'data' => $data_request
    )
);

function replaceHN($text)
{
    $newtext =  substr($text, 2, 6) . '-' . substr($text, 0, 2);
    return $newtext;
}

function timeFormat($v)
{
    $request_time = substr('000000' . $v, -6);
    $time = substr($request_time, 0, 2) . ':' . substr($request_time, 2, 2) . ':' . substr($request_time, 4, 2);
    return $time;
}
