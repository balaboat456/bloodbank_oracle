<?php
date_default_timezone_set('Asia/Bangkok');
include('../connection.php');
include('../data/dateFormat.php');
$status = true;

$hn = replaceHNGet($_GET['hn']);
$hn_use = replaceHNGet($_GET['hn']);
$patientid_hn = replaceHN($hn);
// $date = dateNowYMD_no();

$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];

$start_date = date_format_YMD($fromdate);
$end_date = date_format_YMD($todate);

// $start_date = '2021-08-20';
// $end_date = '2021-08-30';

$responseArray = array();

                                                    while (strtotime($start_date) <= strtotime($end_date)) {
    $date = explode("-", $start_date);
    $date_use = $date[0] . $date[1] . $date[2];

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

    curl_close($curl);

    $responseArray = json_decode($response);

    $token = $responseArray->Result;

    ///////////////////////////////////////////////////
    // "hn":"'. $patientid_hn.'",
    //     "date":"'. $date.'"

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
            "hn":"'. $hn_use.'",
            "date":"'. $date_use.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'X-Access-Token: ' . $token,
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    error_log("===$hn_use======");
    error_log("===$date_use======");
    error_log($response);

    curl_close($curl);

    $data_request = json_decode($response);

    $number = 0;

    $hn = replaceHN($data_request->Result[0]->hn);
    $an = $data_request->Result[0]->an;
    $prefix = $data_request->Result[0]->prefix;
    $fname = $data_request->Result[0]->fname;
    $lname = $data_request->Result[0]->lname;
    $brthdate = $data_request->Result[0]->brthdate;
    $male = $data_request->Result[0]->male;
    $age = $data_request->Result[0]->age;

    if ($data_request->MessageCode == "200") {
        $request = $data_request->Result[0]->Labno;

        foreach ($request as $data) {

            $ln = $data_request->Result[0]->Labno[$number]->ln;
            $request_date = $data_request->Result[0]->Labno[$number]->request_date;
            $request_time = $data_request->Result[0]->Labno[$number]->request_time;
            $labsection = $data_request->Result[0]->Labno[$number]->labsection;
            $labgrpno = $data_request->Result[0]->Labno[$number]->labgrpno;
            $lct_code = $data_request->Result[0]->Labno[$number]->lct_code;
            $lct_name = $data_request->Result[0]->Labno[$number]->lct_name;
            $payst = $data_request->Result[0]->Labno[$number]->payst;
            $labst = $data_request->Result[0]->Labno[$number]->labst;
            $opdipd = $data_request->Result[0]->Labno[$number]->opdipd;
            $pttype_code = $data_request->Result[0]->Labno[$number]->pttype_code;
            $pttype_name = $data_request->Result[0]->Labno[$number]->pttype_name;
            $lvstst_code = $data_request->Result[0]->Labno[$number]->lvstst_code;
            $lvstst_name = $data_request->Result[0]->Labno[$number]->lvstst_name;
            $spcm_date = $data_request->Result[0]->Labno[$number]->spcm_date;
            $spcm_time = $data_request->Result[0]->Labno[$number]->spcm_time;
            $spcmstf = $data_request->Result[0]->Labno[$number]->spcmstf;
            $spcmstf_name = $data_request->Result[0]->Labno[$number]->spcmstf_name;
            $labstf = $data_request->Result[0]->Labno[$number]->labstf;
            $labstf_name = $data_request->Result[0]->Labno[$number]->labstf_name;
            $keep_date = $data_request->Result[0]->Labno[$number]->keep_date;
            $keep_time = $data_request->Result[0]->Labno[$number]->keep_time;
            $dct_code = $data_request->Result[0]->Labno[$number]->dct_code;
            $dct_name = $data_request->Result[0]->Labno[$number]->dct_name;
            $labrqtcs = $data_request->Result[0]->Labno[$number]->labrqtcs;
            $prediag = $data_request->Result[0]->Labno[$number]->prediag;
            $branch = $data_request->Result[0]->Labno[$number]->branch;
            $commentreq = $data_request->Result[0]->Labno[$number]->commentreq;

            $Test = $data_request->Result[0]->Labno[$number]->Test;

            $request_date2 = substr($request_date, 0, 4) + 543 . '-' . substr($request_date, 6, 2) . '-' . substr($request_date, 4, 2);
            $request_time2 = substr($request_time, 0, 2) . ':' . substr($request_time, 2, 2) . ':' . substr($request_time, 4, 2);
            $keep_date2 = substr($keep_date, 0, 4) + 543 . '-' . substr($keep_date, 6, 2) . '-' . substr($keep_date, 4, 2);
            $keep_time2 = substr($keep_time, 0, 2) . ':' . substr($keep_time, 2, 2) . ':' . substr($keep_time, 4, 2);

            $sql = "SELECT patientid
                        FROM patient
                        WHERE patienthn = '$hn'";

            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                $patientid = $row['patientid'];
            }

            $sql = "SELECT labcheckrequestid , labrequestdatetime , patientid
                    FROM lab_check_request
                    WHERE labrequestdatetime = '$request_date2 $request_time2'
                    AND patientid = '$patientid'";

            $query = mysqli_query($conn, $sql);
            $query_row = mysqli_num_rows($query);

            if ($query_row > 0) {
                $status = false;
            } else {
                $sql = "SELECT MAX(labcheckrequestid) AS maxnum
                        FROM lab_check_request";

                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    $labcheckrequestid = $row['maxnum'] + 1;
                    $labcheckrequestcode = 'LAB' . $labcheckrequestid;
                }

                // $sql = "INSERT INTO lab_check_request 
                //         (
                //             labcheckrequestid,
                //             labcheckrequestcode,
                //             patientid,
                //             labgetdatetime, 
                //             checkresultbloodstatusid,
                //             labkeepdatetime,
                //             labrequestdatetime,
                //             labsenddatetime,
                //             labunitid,
                //             labjobtypeid,
                //             maintenancerightid,
                //             ln
                //         )
                //         VALUES
                //         (
                //             '$labcheckrequestid',
                //             '$labcheckrequestcode',
                //             '$patientid',
                //             '$request_date2 $request_time2',
                //             '1',
                //             '$keep_date2 $keep_time2',
                //             '$request_date2 $request_time2',
                //             '$request_date2 $request_time2',
                //             '1',
                //             '1',
                //             '99',
                //             $ln
                //         )";
                // $result = mysqli_query($conn, $sql);

                $count = 0;
                foreach ($Test as $row) {
                    $test_code = $data_request->Result[0]->Labno[0]->Test[$count]->test_code;
                    $test_name = $data_request->Result[0]->Labno[0]->Test[$count]->test_name;
                    $labspcm = $data_request->Result[0]->Labno[0]->Test[$count]->labspcm;
                    $labspcm_name = $data_request->Result[0]->Labno[0]->Test[$count]->labspcm_name;

                    $sql = "SELECT *
                        FROM labform 
                        WHERE test_code = '$test_code'";

                    $query = mysqli_query($conn, $sql);
                    $query_row = mysqli_num_rows($query);

                    while ($row = mysqli_fetch_array($query)) {
                        $labformid = $row['labformid'];
                    }
                    if ($query_row > 0) {
                    //     $sql = "
                    //     INSERT INTO lab_check_request_item
                    //     (
                    //         labcheckrequestid,
                    //         labformid
                    //     )
                    //         value
                    //     (
                    //         '$labcheckrequestid',
                    //         '$labformid'
                    //     )
                    // ";

                    //     $result = mysqli_query($conn, $sql);
                    }
                    $count++;
                }
            }
            $number++;
        } // end foreach
    }


    $start_date = date("Y-m-d", strtotime("+1 days", strtotime($start_date)));
}
//////////////////////////////////////////////////////////////////////////////////////




echo json_encode(
    array(
        'status' => $status,
        'sql' => $sql,
        'hn' => $hn_use,
        'patientid_hn' => $patientid_hn,
        'fromdate' => $start_date,
        'todate' => $end_date,
    )
);
function replaceHN($text)
{
    $newtext =  substr($text, 2, 6) . '-' . substr($text, 0, 2);
    return $newtext;
}

function replaceHNGet($text)
{
    $arrayStr = explode("-", $text);
    $newtext =  $arrayStr[1] . $arrayStr[0];
    return $newtext;
}

function getPrefix($v)
{
    $result = "";
    if ($v == 'นาย') {
        $result = "1";
    } else if ($v == 'นาง') {
        $result = "2";
    } else if ($v == 'น.ส.' || $v == 'นางสาว') {
        $result = "3";
    } else if ($v == 'เด็กชาย') {
        $result = "7";
    } else if ($v == 'เด็กหญิง') {
        $result = "8";
    }

    return $result;
}

function getGender($v)
{
    $result = ["", ""];
    if ($v == '1' || $v == '7') {
        $result = ["1", "ชาย"];
    } else if ($v == '2' || $v == '3' || $v == '8') {
        $result = ["2", "หญิง"];
    }

    return $result;
}

function getAge($birthday = "0000-00-00")
{
    $todaydate = date("Y-m-d");
    $age = $todaydate - $birthday;

    return $age;
}
function dateNowYMDHM_no()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $time = date("H:i");
    return ($original_year + 543) . $original_month . $original_wday . $time;
}

function dateNowYMD_no()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    return ($original_year + 543) . $original_month . $original_wday;
}

function date_format_YMD($date)
{
    $date_use = explode("/", $date);

    return ($date_use[2] - 543) .'-'. $date_use[1] . '-' . $date_use[0];
}