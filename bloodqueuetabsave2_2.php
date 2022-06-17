<?php
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    include('data/replacestring.php');
    date_default_timezone_set('Asia/Bangkok');

    session_start();

    $logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
    $dateNowValue = date("Y-m-d H:i:s") ;
    $username = $_SESSION['username'];

    mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('','$logtext','$dateNowValue','$username','blood-queue-payment','ลำดับคิวขอเลือด-จ่ายเลือด')");


    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $date = trim(dmyToymd(dateNowDMY()));
    $time = date("H:i");
    $dateMDY = date('m/d/Y');
    $dateHIS = intval(date('His'));
    $bloodqueuetab2_2 = json_decode($_POST['bloodqueuetab2_2']);
    $username = $_SESSION['username'];
    $requestbloodid = "";
  
    $grouprequestbloodid = "";

    $running = getRunningYM('RQB22');
    $grouppayid = $running['runn'];

    $group_requestbloodid = "";

    $transet = false;


    $requestbloodcrossmacthid = ''; 
    $ispayblood = ''; 
    $bag_number = ''; 
    $bloodtype = ''; 
    $mostandunstatus = ''; 
    $crossmacthresultid = '';
    $crossmacthstatusid = ''; 
    $bloodstockrfid = ''; 
    $bloodstockid = ''; 
    $beaconid = ''; 
    $hn = '';
    $vn = ''; 
    $fn = ''; 
    $prvno = ''; 
    $anAPI = '';
    $insuranceid = ''; 
    $insurancetext = ''; 
    $requestunit = ''; 
    $doctorcode2 = ''; 
    $username2_2 = '';

    $conditionAPI = '';

    $resultArrayAPI = array();
    
    foreach ($bloodqueuetab2_2 as $item) {
       
        $im = json_decode($item);
        
        $requestbloodcrossmacthid = $im[0]->requestbloodcrossmacthid; 
        $ispayblood = $im[0]->ispayblood; 
        $bag_number = $im[0]->cm_bag_number; 
        $bloodtype = $im[0]->cm_bloodtype; 
        $mostandunstatus = $im[0]->mostandunstatus; 
        $crossmacthresultid = $im[0]->crossmacthresultid;
        $crossmacthstatusid = $im[0]->crossmacthstatusid; 
        $bloodstockrfid = $im[0]->bloodstockrfid; 
        $bloodstockid = $im[0]->bloodstockid; 
        $beaconid = $im[0]->beaconid; 


        $hn = replaceHNGet($im[0]->hn);
        $vn = $im[0]->vn; 
        $fn = $im[0]->fn; 
        $prvno = $im[0]->prvno; 
        $anAPI = replaceANGet($im[0]->an);
        $insuranceid = $im[0]->insuranceid; 
        $insurancetext = $im[0]->insurancetext; 
        $requestunit = $im[0]->requestunit; 
        $doctorcode2 = $im[0]->doctorcode2; 
        

        $username2_2 = $im[0]->username2_2;

       
        if(!empty($username2_2))
        {
            
            $sql = "SELECT * FROM users WHERE staffid = '$username2_2' ";

            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_array($query);

            $username = $result["username"];
        }
      
        
        $sub = $im[0]->cm_sub; 
        
        $conditionAPI = '"VN": '.$vn.',
                        "FN": '.$fn.',';


        if(!empty($anAPI))
        {
            $conditionAPI = '"AN": '.$anAPI.',';
        }

        if($ispayblood)
        {

            $group_requestbloodid = $group_requestbloodid.$im[0]->requestbloodid.','; 

            $requestbloodid = $im[0]->requestbloodid; 

            $grouprequestbloodid = $grouprequestbloodid.$requestbloodid.",";

            $condition = "crossmacthstatusid = '5',crossmacthstatus2id = '5', ";

            if($crossmacthresultid == "3")
            {
                $condition = "crossmacthstatusid = '8',";
            }
            // else if($mostandunstatus == '3')
            // {
            //     $condition = "crossmacthstatusid = '8', ";
            // }
            else if($crossmacthstatusid == '6' 
            || $crossmacthstatusid == '7' 
            || $crossmacthstatusid == '10' 
            || $crossmacthstatusid == '9' )
            {
                $condition =  "";
            }


            $sql = "
            UPDATE request_blood SET
            ispaybloodstatus = '1'
            WHERE requestbloodid = '$requestbloodid'
            ";
            
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $sql = "
            UPDATE request_blood_crossmacth SET
            $condition
            ispayblood = '$ispayblood',
            payuser = '$username',
            payblooddate = '$date',
            paybloodtime = '$time',
            grouppayid = '$grouppayid',
            beaconid    = '$beaconid'
            WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
            ";
            
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $sql = "UPDATE  bloodstock SET 
                bloodstockrfid = ''
                WHERE bloodstockrfid = '$bloodstockrfid' AND bloodstockrfid != ''
                ";

                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;
                

            $sql = "UPDATE  bloodstock SET 
                bloodstockrfid = '$bloodstockrfid',
                bloodstockstatusid = '2',
                bloodstockpaytypeid = '4'
                WHERE bloodstockid = '$bloodstockid' 
                ";

                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;



                if($bloodtype == 'CRYO')
                $transet = true;

            
                array_push($resultArrayAPI,$bloodtype);
              

        }

     
    }


    $arr_group = array_count_values($resultArrayAPI);
    $resultArrayAPISendData = array();
    $datasendAPI = '';
    $itemno = 0;
    foreach ($arr_group as $key => $qty)
    {

        $itemno++;

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
                "QTY": '.$qty.',
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

        $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$grouprequestbloodid','$datasendAPI','$dateNowValue','$username','payblood datasend API','จ่ายเลือด datasendAPI')";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$grouprequestbloodid','$response','$dateNowValue','$username','payblood response API','จ่ายเลือด response')";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

    }

    if($transet)
    {
            $datasendAPI = '[
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B40",
                        "INCOMENM": "Plasma Transfer Set",
                        "ITEMNO": 1,
                        "PRVNO": '.$prvno.',
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": 1,
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":1,
                        "CLINICLCT":'.$requestunit.'
                    }
                ]
                ';


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

                $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$grouppayid','$datasendAPI','$dateNowValue','$username','payblood Plasma Transfer Set datasend API','จ่ายเลือด Plasma Transfer Set datasendAPI')";
                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;

                $sql = "INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$grouppayid','$response','$dateNowValue','$username','payblood Plasma Transfer Set response API','จ่ายเลือด Plasma Transfer Set response')";
                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;
    }

    if(!empty($group_requestbloodid))
    {
        $group_requestbloodid = laststring($group_requestbloodid);

        $sql = "SELECT 
                        requestbloodid,
                        bloodtype,
                        bloodgroupid,
                        SUM(CASE WHEN ispayblood = 1 THEN 1 ELSE 0 END) AS count_pay,
                        SUM(CASE WHEN crossmacthstatus2id = 4 THEN 1 ELSE 0 END) AS count_not_pay
                FROM request_blood_crossmacth 
                WHERE requestbloodid IN ($group_requestbloodid)
                AND bloodtype != 'CRYO'
                AND crossmacthstatusid NOT IN (10,11)
                GROUP BY requestbloodid,bloodtype,bloodgroupid
                HAVING count_pay > 0
                -- HAVING (count_pay = count_not_pay)
                "; 
                $query = mysqli_query($conn,$sql);

                while($result = mysqli_fetch_array($query))
                {
                    
                    $requestbloodid = $result['requestbloodid'];
                    $bloodtype = $result['bloodtype'];
                    $bloodgroupid = $result['bloodgroupid'];

                    $count_pay = $result['count_pay'];
                    $count_not_pay = $result['count_not_pay'];

                    if($count_pay >= $count_not_pay)
                    {
                        

                        $sql = "UPDATE request_blood_crossmacth SET
                            crossmacthstatusid = CASE WHEN IFNULL(mostandunstatus,'') IN (2,3) THEN 3 ELSE 2 END,
                            crossmacthstatus2id=CASE WHEN IFNULL(mostandunstatus,'') IN (2,3) THEN 3 ELSE 2 END
                            WHERE requestbloodid = '$requestbloodid'
                            AND bloodtype = '$bloodtype'
                            -- AND bloodgroupid = '$bloodgroupid'
                            AND ispayblood <> 1
                            AND crossmacthstatusid NOT IN (10,11)
                            ";

                            error_log($sql);

                        $result = mysqli_query($conn, $sql);
                        if(empty($result))
                        $status = false;

                    }

                    

                }
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
        'id' => $requestbloodid ,
        'grouppayid' => $grouppayid,
        'gid' => $grouprequestbloodid
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