<?php
    include('../../connection.php');
    include('../../dateNow.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    
    $requestqueueblooddate = dateNowTMD();
    $requestqueuebloodtime = date("H:i");
    $dateMDY = date('m/d/Y');
    $dateHIS = intval(date('His'));
    $dateNowValue = date("Y-m-d H:i:s") ;
    $username = $_SESSION['username'];
    $status = true;

    $condition = '';
    $requestbloodid = $_GET['requestbloodid'];
    $requestbloodcancel = $_GET['requestbloodcancel'];
    $value = $_GET['value'];

    $sql = "SELECT * FROM request_blood WHERE requestbloodid = '$requestbloodid'";
                
    $query = mysqli_query($conn,$sql);

    $res = mysqli_fetch_assoc($query);
    $requestbloodstatusid = $res['requestbloodstatusid'];
    $apidatapayment = $res['apidatapayment'];
    $hn = replaceHNGet($res['hn']);
    if($requestbloodstatusid == 2)
    {
        $dataapi = json_decode($apidatapayment);
        $resultArray = array();
        foreach ($dataapi as $result) {
            $result->QTY = intval($result->QTY) * -1;
            $result->INCDATE = $dateMDY;
            $result->INCTIME = $dateHIS;

            error_log($result->QTY);

            array_push($resultArray,$result);
            
        }

        $datasendAPI = json_encode($resultArray);

        

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

         
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $rhis_api_apibb_config.'insicptdt?hn='.$hn,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $datasendAPI ,
            CURLOPT_HTTPHEADER => array(
                "X-Access-Token: $token",
                "Content-Type: application/json"
            ),
            ));

            $response = str_replace("'","`",curl_exec($curl));
            $datasendAPI = str_replace("'","`",$datasendAPI);

            curl_close($curl);
            


            mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$datasendAPI','$dateNowValue','$username','cencel datasend API','ยกเลิก datasendAPI')");
            mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$response','$dateNowValue','$username','cencel response API','ยกเลิก response')");

    }

    $sql = "UPDATE request_blood 
            SET requestbloodstatusid='4',
            requestqueueblooddate = '$requestqueueblooddate',
            requestqueuebloodtime = '$requestqueuebloodtime',
            requestbloodcancelother='$value' 
            WHERE requestbloodid = '$requestbloodid'";
    
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $sql = "INSERT INTO request_blood_cancel_item 
            (
                requestbloodid,
                requestbloodcancelid
            )
            VALUE
            (
                '$requestbloodid',
                '$requestbloodcancel'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;


    


    echo json_encode(
        array(
            'status' => $status,
        )
    );

    mysqli_close($conn);


function replaceHNGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[1].$arrayStr[0];
    return $newtext;
}

?>