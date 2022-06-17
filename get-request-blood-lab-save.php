<?php
session_start();
include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');


    $status = true;
    mysqli_autocommit($conn, FALSE);


    $labcheckrequestid = $_POST['labcheckrequestid'];
    $labgetdatetime = dateNowYMDHM();
    $checkresultbloodstatusid = $_POST['checkresultbloodstatusid'];
    $remarkcancelitem = $_POST['remarkcancelitem'];
    $fullname = $_SESSION['fullname'];

    if(empty($checkresultbloodstatusid))
    $status = false;

    $sql = "UPDATE lab_check_request 
            SET labgetdatetime='$labgetdatetime',
                checkresultbloodstatusid='$checkresultbloodstatusid',
                remarkcancelitem='$remarkcancelitem' ,
                labuserget = '$fullname'
                WHERE labcheckrequestid = '$labcheckrequestid'";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $sql = "SELECT LCR.patientid , PT.patienthn , LCR.labrequestdatetime , LCR.ln,
            CONCAT(DATE_FORMAT(LCR.labrequestdatetime,'%Y') -543,DATE_FORMAT(LCR.labrequestdatetime,'%m%d')) AS request_date  ,
            DATE_FORMAT(LCR.labrequestdatetime,'%H%i%s') AS request_time
            FROM lab_check_request LCR
            JOIN patient PT ON LCR.patientid = PT.patientid
            WHERE labcheckrequestid = '$labcheckrequestid'";

    $result = mysqli_query($conn, $sql);


    $patientid = "";
    $patienthn = "";
    $request_date = "";
    $request_time = "";
    $patienthn = "";
    $ln = "";
    while ($row = mysqli_fetch_array($result)) {

        $patientid = $row['patientid'];
        $patienthn = $row['patienthn'];
        $request_date = $row['request_date'];
        $request_time = $row['request_time'];
        $patienthn = $row['patienthn'];
        $ln = $row['ln'];
    }


    if($env)
    {
    //////////////////////////////////////////////////////////////////////////////////////////////////
    /// รับ
        if($checkresultbloodstatusid == '2'){
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

                // echo $result;

                ///////////////////////////////////////////////////

                $curl = curl_init();

                $dataaccectspcmtext = '{
                    "hn": "'. replaceHNGet($patienthn).'",
                    "request_date": "'.$request_date.'",
                    "request_time": "'.$request_time.'",
                    "labsection": "89",
                    "labgrpno": "1",
                    "LN":"'.$ln.'"
                }';

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://rhisapi.rajavithi.go.th/'. $rhis_api_absws_config3.'/api/lisAccectSpcm',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>$dataaccectspcmtext,
                CURLOPT_HTTPHEADER => array(
                    'X-Access-Token:'. $token,
                    'Content-Type: application/json'
                ),
                ));

                $response = curl_exec($curl);

                $sql = "UPDATE lab_check_request 
                            SET dataaccectspcmtext='$dataaccectspcmtext',
                                apiaccectspcmtext='$response'
                                WHERE labcheckrequestid = '$labcheckrequestid'";
                    $result = mysqli_query($conn, $sql);
                

                curl_close($curl);

                $decode = json_decode($response);
                $stat_api = $decode->Result;

                
        }

    //////////////////////////////////////////////////////////////////////////////
    /// ยกเลิก
        if($checkresultbloodstatusid == '99'){
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

            // echo $result;

            ///////////////////////////////////////////////////

            $curl = curl_init();
            $datacanceltext = '{
                "hn": "'. replaceHNGet($patienthn).'",
                "request_date": "'.$request_date.'",
                "request_time": "'.$request_time.'",
                "labsection": "89",
                "labgrpno": "1"
            }';

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://rhisapi.rajavithi.go.th/' . $rhis_api_absws_config3 . '/api/liscancel',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $datacanceltext,
                CURLOPT_HTTPHEADER => array(
                    'X-Access-Token: ' .$token,
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            $sql = "UPDATE lab_check_request 
                            SET datacanceltext='$datacanceltext',
                                apicanceltext='$response'
                                WHERE labcheckrequestid = '$labcheckrequestid'";
                    $result = mysqli_query($conn, $sql);

            curl_close($curl);

            $decode = json_decode($response);
            $stat_api = $decode->Result;

        }
    }
    

    //////////////////////////////////////////////////////////////////////////////
    

    if ($status) {
        mysqli_commit($conn);
    }else
    {
        mysqli_rollback($conn);
    }

    echo json_encode(
        array(
            'status' => $status,
            'stat_api' => $stat_api,
            'patienthn' => $patienthn,
            'date' => $request_date,
            'time' => $request_time
        )
    );

function replaceHNGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[1].$arrayStr[0];
    return $newtext;
}

?>