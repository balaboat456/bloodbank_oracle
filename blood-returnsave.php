<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    include('data/replacestring.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $dateNowValue = date("Y-m-d H:i:s") ;

    $date = trim(dmyToymd(dateNowDMY()));
    $time = date("H:i");
    $returnblood = json_decode($_POST['returnblood']);
    $requestbloodid = '';

    $dateMDY = date('m/d/Y');
    $dateHIS = intval(date('His'));

    $itemno = 0;
    $resultArrayAPI = array();

    $requestbloodcrossmacthid = ''; 
    
    $bag_number = ''; 
    $bloodtype = ''; 
    $hn = '';
    $vn = ''; 
    $fn = ''; 
    $prvno = '';
    $anAPI = '';
    $insuranceid = ''; 
    $insurancetext = ''; 
    $requestunit = ''; 
    $doctorcode2 = ''; 

    $conditionAPI = '';

    foreach ($returnblood as $item) {

        $im = json_decode($item);
        
        
        $requestbloodreturnstatusid =   $im[0]->requestbloodreturnstatusid; 
       

        if($requestbloodreturnstatusid == 3)
        {
            $requestbloodcrossmacthid =   $im[0]->requestbloodcrossmacthid; 
            $warm_retuen =   $im[0]->warm_retuen; 
            $bag_number =   $im[0]->bag_number; 
            $bloodtype =   $im[0]->bloodtype; 
    
            $hn = replaceHNGet($im[0]->hn);
    
            
            
            $paymentincomedate = $im[0]->paymentincomedate; 
            $paymentincometime = $im[0]->paymentincometime; 
            $paymentincomecode = $im[0]->paymentincomecode; 
            $paymentitem = $im[0]->paymentitem; 
            $v_requestbloodid  =   $im[0]->requestbloodid; 
    
            $sub =   $im[0]->sub; 
            $username = $_SESSION['username'];


            $requestbloodid  =   $requestbloodid.$im[0]->requestbloodid.','; 
            $sql = "UPDATE  request_blood_crossmacth SET 
                date_confirmreturn = '$date',
                time_confirmreturn = '$time',
                crossmacthstatusid = '11',
                requestbloodreturnstatusid = '3',
                username_confirmreturn = '$username'
                WHERE bag_number = '$bag_number' AND bloodtype = '$bloodtype' AND sub = '$sub' AND requestbloodid = '$v_requestbloodid'
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            if($warm_retuen == "2" && $bloodtype != 'FFP' && $bloodtype != 'CRYO' && $bloodtype != 'CRP')
            {
                $itemno++;
                $sql = "UPDATE  bloodstock SET 
                bloodstockstatusid = '1',
                bloodstockpaytypeid = ''
                WHERE bag_number = '$bag_number' AND bloodtype = '$bloodtype' AND sub = '$sub'
                ";

                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;

                $vn = $im[0]->vn; 
                $fn = $im[0]->fn; 
                
                $insuranceid = $im[0]->insuranceid; 
                $insurancetext = $im[0]->insurancetext; 
                $requestunit = $im[0]->requestunit; 
                $doctorcode2 = $im[0]->doctorcode2; 
                $anAPI = replaceANGet($im[0]->an);
                $prvno = $im[0]->prvno; 
                $conditionAPI = '"VN": '.$vn.',
                        "FN": '.$fn.',';

                if(!empty($anAPI))
                {
                    $conditionAPI = '"AN": '.$anAPI.',';
                }

                array_push($resultArrayAPI,$bloodtype);

            }else
            {
                $sql = "UPDATE  bloodstock SET 
                bloodstockstatusid = '6',
                bloodstockpaytypeid = ''
                WHERE bag_number = '$bag_number' AND bloodtype = '$bloodtype' AND sub = '$sub'
                ";

                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;
            }

            
            
        }
        


    }

    $arr_group = array_count_values($resultArrayAPI);
    $resultArrayAPISendData = array();
    $datasendAPI = '';
    $itemno = 0;
    foreach ($arr_group as $key => $qty)
    {

        $itemno++;

        $diff_qty = intval($qty) * -1;

        $sql = "SELECT * FROM bloodstock_type WHERE bloodstocktypeid = '$key'";

        $query = mysqli_query($conn,$sql);

        $result = mysqli_fetch_array($query);

        $abscode = $result["abscode"];
        $bloodstocktypename2 = $result["bloodstocktypename2"];

        $datasendAPI = $datasendAPI.'
            {
                "HN": '.$hn.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "'.$abscode.'",
                "INCOMENM": "'.$bloodstocktypename2.'",
                "ITEMNO": 1,
                "PRVNO": '.$prvno.',
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": '.$diff_qty.',
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            },';
            
    }

    if(!empty($datasendAPI))
    {
        $datasendAPI = laststring($datasendAPI);
        $datasendAPI = '['.$datasendAPI.']';

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


        $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$datasendAPI','$dateNowValue','$username','blood-return datasend API','บันทึกการรับคืนเลือด datasendAPI')";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$response','$dateNowValue','$username','blood-return response API','บันทึกการรับคืนเลือด response')";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        
        

    }
    

   

if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'id' => $requestbloodid
    )
);


function replaceHNGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[1].$arrayStr[0];
    return $newtext;
}

function replaceANGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[0];
    return $newtext;
}
    

    // end การบริจาค


?>