<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $date = dmyToymd(dateNowDMY());
    $time = date("H:i");
    $bloodqueuetab1 = json_decode($_POST['bloodqueuetab1']);
    $dateNowValue = date("Y-m-d H:i:s") ;
    $username = $_SESSION['username'];

    $dateMDY = date('m/d/Y');
    $dateHIS = intval(date('His'));
  
    foreach ($bloodqueuetab1 as $item) {
       
        $im = json_decode($item);
        
        $requestbloodid = $im[0]->requestbloodid; 
        $isbloodblank = $im[0]->isbloodblank; 
        $requestbloodcancelid = $im[0]->requestbloodcancelid; 
        $requestbloodcancelother = $im[0]->requestbloodcancelother; 
        $bloodnotificationtypeid = $im[0]->bloodnotificationtypeid; 
        $userbloodqueuebloodgroup = $im[0]->userbloodqueuebloodgroup; 
        $bloodsampletube = $im[0]->bloodsampletube; 
        $hn = replaceHNGet($im[0]->hn);

        $fn = $im[0]->fn;
        $vn = $im[0]->vn;
        $an = replaceANGet($im[0]->an);
        $insuranceid = $im[0]->insuranceid;
        $insurancetext = $im[0]->insurancetext;

        
        $doctorcode2 = $im[0]->doctorcode2; 

        $requestunit = $im[0]->requestunit; 

        $requestbloodusersave = '';
        if(!empty($userbloodqueuebloodgroup))
        {
            $sql = "SELECT * FROM users WHERE staffid = '$userbloodqueuebloodgroup' ";

            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_array($query);

            $requestbloodusersave = $result["username"];
        }


        $s = '';
        $r = $im[0]->r; 
        $n = $im[0]->n;
       
        if(!empty($r))
        {
            $s = 2;
        }else if(!empty($n))
        {
            $s = 3;
        }


        if((!empty($requestbloodid)) && (!empty($s)))
        {
            $condition = "";
            if($s == 3)
            {
                if(!empty($isbloodblank) && $isbloodblank != 'null')
                $condition = $condition." isbloodblank='$isbloodblank',";

                if(!empty($requestbloodcancelid))
                $condition = $condition." requestbloodcancelid='$requestbloodcancelid',";

                if(!empty($requestbloodcancelother))
                $condition = $condition." requestbloodcancelother='$requestbloodcancelother',";

                $array = explode(',', $requestbloodcancelid);
                foreach ($array as $v) {
                    if(!empty($v))
                    {
                        $sql = "
                            INSERT INTO request_blood_cancel_item 
                            (
                                requestbloodid,
                                requestbloodcancelid
                            )
                            VALUE
                            (
                                '$requestbloodid',
                                '$v'
                            )
                        ";

                        $result = mysqli_query($conn, $sql);
                        if(empty($result))
                        $status = false;
                    }
                }

            }

            $sql = "
                UPDATE request_blood SET
                $condition
                requestbloodstatusid = '$s',
                requestqueueblooddate = '$date',
                requestqueuebloodtime = '$time',
                requestbloodusersave = '$requestbloodusersave'
                WHERE requestbloodid = '$requestbloodid'
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            if($bloodnotificationtypeid == 2)
            {
                $sql = "SELECT CS.* ,RB.requestblooddate,RB.requestbloodtime
                FROM request_blood_crossmacth CS
                LEFT JOIN request_blood RB ON CS.requestbloodid = RB.requestbloodid
                WHERE RB.requestbloodid = '$requestbloodid'";
                    
                $query = mysqli_query($conn,$sql);

                $running_gp = getRunningYM('RQB21');
                $groupid = $running_gp['runn'];
                $bloodrequestunit = mysqli_num_rows($query);

                if($bloodrequestunit > 0)
                {
                    $result = mysqli_fetch_array($query);

                    while($res = mysqli_fetch_assoc($query)) {

                        $requestbloodcrossmacthid = $res['requestbloodcrossmacthid'];

                        $sql = "
                        UPDATE request_blood_crossmacth SET
                        ispayblood = '1',
                        bloodrequestunit = '$bloodrequestunit',
                        bloodrequestunitqty = '$bloodrequestunit',
                        payuser = '$username',
                        payblooddate = '$date',
                        paybloodtime = '$time'
                        WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                        ";
                        
                        $resultSel = mysqli_query($conn, $sql);
                        if(empty($resultSel))
                        $status = false;
                    }

                    $confirmbloodrequestdate = $result['requestblooddate'];
                    $confirmbloodrequesttime = $result['requestbloodtime'];

                    $sql = "INSERT INTO requestblood_crossmacth_confirm 
                    (
                        requestbloodcrossmacthconfirmdate,
                        requestbloodcrossmacthconfirmtime,
                        requestbloodcrossmacthconfirmqty,
                        requestbloodcrossmacthconfirmsavedate,
                        requestbloodcrossmacthconfirmsavetime,
                        bloodtype,
                        requestbloodid,
                        groupid,
                        volume,
                        requestbloodcrossmacthconfirmsaveuserid
                    )
                    VALUES
                    (
                        '$confirmbloodrequestdate',
                        '$confirmbloodrequesttime',
                        '$bloodrequestunit',
                        '$date',
                        '$time',
                        'LPRC-O',
                        '$requestbloodid',
                        '$groupid',
                        '',
                        '$username'
                    )
                    ";

                    $result = mysqli_query($conn, $sql);
                    if(empty($result))
                    $status = false;
                }
                
            }


        }

        if($s == 2)
        {
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

            $datasendAPI = '[]';

            $conditionAPI = '"VN": '.$vn.',"FN": '.$fn.',';
            if(!empty($an))
            {
                $conditionAPI = '"AN": '.$an.',';
            }

            error_log('=======AN=======');
            error_log($an);
            error_log('=======error_log(conditionAPI);=======');
            error_log($conditionAPI);


            if ($bloodnotificationtypeid == 2 && $bloodsampletube == 1) { //1
                
            } else if ($bloodnotificationtypeid == 2 && $bloodsampletube == 2) { //2
                
            } else if (getTableRequestBloodRedCell($requestbloodid) && $bloodsampletube == 1) { //3

                

                $datasendAPI = '[
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B02",
                        "INCOMENM": "Blood group (ABO) - Tube method",
                        "ITEMNO": 1,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": 1,
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":2,
                        "CLINICLCT":'.$requestunit.'
                    },
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B03",
                        "INCOMENM": "Rh. (D) Typing",
                        "ITEMNO": 2,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": 1,
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":1,
                        "CLINICLCT":'.$requestunit.'
                    },
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B04",
                        "INCOMENM": "Antibody screening, (Indirect antiglobulin) (gel test)",
                        "ITEMNO": 3,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": 1,
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":1,
                        "CLINICLCT":'.$requestunit.'
                    },
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B01",
                        "INCOMENM": "Cross matching  (gel test)",
                        "ITEMNO": 4,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": '.getTableRequestBloodRedQty($requestbloodid).',
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":1,
                        "CLINICLCT":'.$requestunit.'
                    }
                ]
                ';
        
                
            } else if (getTableRequestBloodRedCell($requestbloodid) && $bloodsampletube == 2) { //4
                $datasendAPI = '[
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B01",
                        "INCOMENM": "Cross matching  (gel test)",
                        "ITEMNO": 1,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": '.getTableRequestBloodRedQty($requestbloodid).',
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":1,
                        "CLINICLCT":'.$requestunit.'
                    }
                ]
                ';
                
            } else if ($bloodsampletube == 1) { // 5
                $datasendAPI = '[
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B02",
                        "INCOMENM": "Blood group (ABO) - Tube method",
                        "ITEMNO": 1,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": 1,
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":2,
                        "CLINICLCT":'.$requestunit.'
                    },
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B03",
                        "INCOMENM": "Rh. (D) Typing",
                        "ITEMNO": 2,
                        "PRVNO": 1,
                        "PTTYPE": '.$insuranceid.',
                        "PTTYPENM": "'.$insurancetext.'",
                        '.$conditionAPI.'
                        "QTY": 1,
                        "DCT":'.$doctorcode2.',
                        "OVERTIME":1,
                        "CLINICLCT":'.$requestunit.'
                    },
                    {
                        "HN": '.$hn.',
                        "INCDATE": "'.$dateMDY.'",
                        "INCTIME": '.$dateHIS.',
                        "INCOME": "B04",
                        "INCOMENM": "Antibody screening, (Indirect antiglobulin) (gel test)",
                        "ITEMNO": 3,
                        "PRVNO": 1,
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
                
            } else if ($bloodsampletube == 2) { //6
                
            }

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

            $sql = "UPDATE request_blood SET apidatapayment='$datasendAPI' WHERE requestbloodid ='$requestbloodid'";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;


            mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$datasendAPI','$dateNowValue','$username','blood-queue datasend API','ลำดับคิวขอเลือด datasendAPI')");
            mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$response','$dateNowValue','$username','blood-queue response API','ลำดับคิวขอเลือด response')");


        }
        
    }


if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo $status;
    
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

function getTableRequestBloodRedCell($id) {

    include('connection.php');
  
    $status = false;
    $sql = "SELECT IM.* ,TY.bloodstocktypegroupid
    FROM request_blood_item IM
    LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
    WHERE TY.bloodstocktypegroupid = 1
    AND IM.requestbloodid = '$id'";
 

    $query = mysqli_query($conn,$sql);

	while($result = mysqli_fetch_array($query))
	{
		$status = true;
    }


    return $status;

}

function getTableRequestBloodRedQty($id) {

    include('connection.php');
  
    $sql = "SELECT IM.* ,TY.bloodstocktypegroupid
    FROM request_blood_item IM
    LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
    WHERE TY.bloodstocktypegroupid = 1
    AND IM.requestbloodid = '$id'";

    $query = mysqli_query($conn,$sql);
    $qty = 0;
	while($result = mysqli_fetch_array($query))
	{
		$qty = intval($result['requestblooditemqty']) ;
    }


    return $qty;

}

    // end การบริจาค


?>