<?php
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $date = trim(dmyToymd(dateNowDMY()));
    $time = date("H:i");
    $bloodqueuetab2_1 = json_decode($_POST['bloodqueuetab2_1']);
    $unitcomfirmused = $_POST['unitcomfirmused'];

    $running = getRunningYM('RQB21');
    $groupid = $running['runn'];

    $username = $_SESSION['username'];

    $grouprequestbloodid = "";
    foreach ($bloodqueuetab2_1 as $item) {

        $im = json_decode($item);

        $username2_1 = $im[0]->username2_1;
        error_log("=======$username2_1=========");
        if(!empty($username2_1))
        {
            
            $sql = "SELECT * FROM users WHERE staffid = '$username2_1' ";

            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_array($query);

            $username = $result["username"];
        }
        

        if(!empty($im[0]->bloodrequestunit) || !empty($im[0]->bloodrequestcc))
        {
            $requestbloodid = $im[0]->requestbloodid; 
            $cm_bloodgroup = $im[0]->cm_bloodgroup; 
            $cm_bloodtype = $im[0]->cm_bloodtype; 
            $isreadyblood = $im[0]->isreadyblood; 
            $bloodrequestunit = (!empty($im[0]->bloodrequestunit))?$im[0]->bloodrequestunit:1; 
            $bloodrequestcc = (!empty($im[0]->bloodrequestcc))?$im[0]->bloodrequestcc:0; 
            $volume = (!empty($im[0]->volume))?$im[0]->volume:0; 
            $crossmacthstatusid = (!empty($im[0]->crossmacthstatusid))?$im[0]->crossmacthstatusid:0; 

            $confirmbloodrequestdate = (!empty($im[0]->confirmbloodrequestdate))?dmyToymd($im[0]->confirmbloodrequestdate):'0000-00-00';
            $confirmbloodrequesttime = $im[0]->confirmbloodrequesttime; 

            $bag_number = $im[0]->cm_bag_number; 
            $bloodtype = $im[0]->cm_bloodtype; 
            $sub = $im[0]->sub; 
        

            $condition = "crossmacthstatusid = '4', ";
            if($crossmacthstatusid == '6' 
            || $crossmacthstatusid == '7' 
            || $crossmacthstatusid == '10' 
            || $crossmacthstatusid == '9' )
            {
                $condition =  "";
            }

            $requestbloodcrossmacthid = $im[0]->requestbloodcrossmacthid; 
            if($isreadyblood)
            {

                $grouprequestbloodid = $grouprequestbloodid.$requestbloodid.",";

                $sql = "
                UPDATE request_blood SET
                isreadybloodstatus = '1'
                WHERE requestbloodid = '$requestbloodid'
                ";
                
                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;

                if(!empty($bloodrequestcc))
                {
                    $sql = "INSERT INTO requestblood_crossmacth_confirm 
                    (
                        requestbloodcrossmacthconfirmdate,
                        requestbloodcrossmacthconfirmtime,
                        requestbloodcrossmacthconfirmqty,
                        requestbloodcrossmacthconfirmsavedate,
                        requestbloodcrossmacthconfirmsavetime,
                        bloodgroupid,
                        bloodtype,
                        requestbloodid,
                        groupid,
                        volume,
                        requestbloodcrossmacthconfirmsaveuserid,
                        unitcomfirmused
                    )
                    VALUES
                    (
                        '$confirmbloodrequestdate',
                        '$confirmbloodrequesttime',
                        '1',
                        '$date',
                        '$time',
                        '$cm_bloodgroup',
                        '$cm_bloodtype',
                        '$requestbloodid',
                        '$groupid',
                        '$bloodrequestcc',
                        '$username',
                        '$unitcomfirmused'
                    )
                    ";

                    $result = mysqli_query($conn, $sql);
                    if(empty($result))
                    $status = false;

                    error_log("========$status==========");
                    error_log($sql);
                }else
                {

                    $sql = "INSERT INTO requestblood_crossmacth_confirm 
                    (
                        requestbloodcrossmacthconfirmdate,
                        requestbloodcrossmacthconfirmtime,
                        requestbloodcrossmacthconfirmqty,
                        requestbloodcrossmacthconfirmsavedate,
                        requestbloodcrossmacthconfirmsavetime,
                        bloodgroupid,
                        bloodtype,
                        requestbloodid,
                        groupid,
                        volume,
                        requestbloodcrossmacthconfirmsaveuserid,
                        unitcomfirmused
                    )
                    VALUES
                    (
                        '$confirmbloodrequestdate',
                        '$confirmbloodrequesttime',
                        '$bloodrequestunit',
                        '$date',
                        '$time',
                        '$cm_bloodgroup',
                        '$cm_bloodtype',
                        '$requestbloodid',
                        '$groupid',
                        '$bloodrequestcc',
                        '$username',
                        '$unitcomfirmused'
                    )
                    ";

                    $result = mysqli_query($conn, $sql);
                    if(empty($result))
                    $status = false;

                    error_log("========$status==========");
                    error_log($sql);
                }
                


                

         
                $sql = "SELECT CM.* ,SK.bloodexp FROM request_blood_crossmacth CM
                LEFT JOIN bloodstock SK ON CM.bloodstockid = SK.bloodstockid 
                WHERE CM.requestbloodid = '$requestbloodid' 
                AND CM.bloodtype = '$bloodtype' 
                AND CM.bloodgroupid = '$cm_bloodgroup'
                AND CM.crossmacthstatus2id IN (2,3) 
                AND CM.crossmacthstatus2id != '10' 
                ORDER BY SK.bloodexp,CM.bag_number,CM.bloodtype ASC, CM.sub DESC,CM.crossmacthstatus2id  ASC
                LIMIT $bloodrequestunit"; 
                $query = mysqli_query($conn,$sql);
                error_log("==========_---");
                error_log($sql);

                $requestbloodcrossmacthid_group = "";
                $resultArray = array();
                while($result = mysqli_fetch_array($query))
                {
                    array_push($resultArray,$result);

                    $requestbloodcrossmacthid = $result['requestbloodcrossmacthid'];

                    $requestbloodcrossmacthid_group = $requestbloodcrossmacthid_group.$requestbloodcrossmacthid.",";

                    $sql = "UPDATE request_blood_crossmacth SET
                            crossmacthstatus2id = '4',
                            isreadyblood = '$isreadyblood',
                            bloodrequestunit = '$bloodrequestunit',
                            bloodrequestcc = '$bloodrequestcc',
                            readyblooddate = '$date',
                            readybloodtime = '$time',
                            confirmbloodrequestdate = '$confirmbloodrequestdate',
                            confirmbloodrequesttime = '$confirmbloodrequesttime',
                            groupid = '$groupid'
                            WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                            AND crossmacthstatus2id != '10'
                            ";
                            
                            $result = mysqli_query($conn, $sql);
                            if(empty($result))
                            $status = false;

                            error_log("========$status==========");
                            error_log($sql);

                }

                $sql = "UPDATE requestblood_crossmacth_confirm SET
                    requestbloodcrossmacthid_group = '$requestbloodcrossmacthid_group'
                    WHERE groupid = '$groupid'
                ";

                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;
                
                
                $sql = "SELECT CM.* ,SK.bloodexp FROM request_blood_crossmacth CM
                LEFT JOIN bloodstock SK ON CM.bloodstockid = SK.bloodstockid 
                WHERE CM.requestbloodid = '$requestbloodid' 
                AND CM.bloodtype = '$bloodtype' 
                AND CM.bloodgroupid = '$cm_bloodgroup'
                AND CM.crossmacthstatusid IN (1,2,3) 
                AND CM.crossmacthstatusid != '10' 
                ORDER BY SK.bloodexp,CM.bag_number,CM.bloodtype ASC, CM.sub DESC,CM.crossmacthstatusid  ASC"; 
                $query = mysqli_query($conn,$sql);

                error_log($sql);

                $requestbloodcrossmacthid_group = "";
                $resultArray = array();
                while($result = mysqli_fetch_array($query))
                {
                    array_push($resultArray,$result);

                    $requestbloodcrossmacthid = $result['requestbloodcrossmacthid'];

                    $requestbloodcrossmacthid_group = $requestbloodcrossmacthid_group.$requestbloodcrossmacthid.",";

                    $sql = "UPDATE request_blood_crossmacth SET
                            crossmacthstatusid = '4',
                            isreadyblood = '$isreadyblood',
                            bloodrequestunit = '$bloodrequestunit',
                            bloodrequestcc = '$bloodrequestcc',
                            readyblooddate = '$date',
                            readybloodtime = '$time',
                            confirmbloodrequestdate = '$confirmbloodrequestdate',
                            confirmbloodrequesttime = '$confirmbloodrequesttime',
                            groupid = '$groupid'
                            WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                            AND crossmacthstatusid != '10'
                            AND crossmacthstatusid IN (1,2,3) 
                            ";
                            
                            $result = mysqli_query($conn, $sql);
                            if(empty($result))
                            $status = false;

                            error_log("========$status==========");
                            error_log($sql);
                }

                    
        

                

                if($cm_bloodtype == "CRYO")
                {

                    for ($x = 1; $x <= intval($bloodrequestunit) ; $x++) {
                        
                        $sql = "INSERT INTO request_blood_crossmacth_cryo
                        (
                            seq,
                            isreadyblood,
                            bloodrequestunit,
                            bloodrequestcc,
                            readyblooddate,
                            readybloodtime,
                            confirmbloodrequestdate,
                            confirmbloodrequesttime,
                            requestbloodid,
                            bloodtype,
                            sub
                        )
                        VALUES
                        (
                            '$x',
                            '$isreadyblood',
                            '$bloodrequestunit',
                            '$bloodrequestcc',
                            '$date',
                            '$time',
                            '$confirmbloodrequestdate',
                            '$confirmbloodrequesttime',
                            '$requestbloodid',
                            '$cm_bloodtype',
                            '1'
                        )

                        ";

                        $result = mysqli_query($conn, $sql);
                        if(empty($result))
                        $status = false;

                        error_log("========$status==========");
                        error_log($sql);

                    }

                    
                    
                }


                if(!empty($bloodrequestcc))
                {
                            $sqlselect = "SELECT * 
                            FROM bloodstock 
                            WHERE bag_number = '$bag_number' 
                            AND bloodtype = '$bloodtype' 
                            
                            AND bloodstockstatusid = '4'
                            ORDER BY sub DESC
                            LIMIT 1"
                            ;
                            $query = mysqli_query($conn,$sqlselect);
                            $result = mysqli_fetch_array($query);
        
                            $bloodstockmainid   = $result['bloodstockmainid'];
                            $bloodstockrfid     = $result['bloodstockrfid'];
                            $bloodtype          = $result['bloodtype'];
                            $bloodgroup         = $result['bloodgroup'];
                            $bloodgroupconfirm  = $result['bloodgroupconfirm'];
                            $bloodrh            = $result['bloodrh'];
                            $bloodrhconfirm     = $result['bloodrhconfirm'];
                            $bloodstart         = $result['bloodstart'];
                            $bloodexp           = $result['bloodexp'];
                            $bloodstockstatusid = $result['bloodstockstatusid'];
                            $bloodstockpaydatetime  = $result['bloodstockpaydatetime'];
                            $userpay            = $result['userpay'];
                            $bloodstockpaytypeid = $result['bloodstockpaytypeid'];
                            $donateid           = (!empty($result['donateid']))?$result['donateid']:0;
                            $donorid            = (!empty($result['donorid']))?$result['donorid']:0;
                            $donatebloodtypeid  = (!empty($result['donatebloodtypeid']))?$result['donatebloodtypeid']:0;
                            $hospitalid         = $result['hospitalid'];
                            $bagtypeid          = $result['bagtypeid'];
                            $receivingtypeid    = $result['receivingtypeid'];
                            $bag_number         = $result['bag_number'];
                            $sub_max                = $result['sub'];
                            $rubberbandnumber   = $result['rubberbandnumber'];
                            $volume             = $result['volume'];
                            $antibody           = $result['antibody'];
                            $phenotype          = $result['phenotype'];



                            $volume = intval($volume) - intval($bloodrequestcc);
                        
                            $sql = "UPDATE bloodstock SET
                            volume = '$bloodrequestcc'
                            WHERE bag_number = '$bag_number' 
                            AND bloodtype = '$bloodtype' 
                            AND sub = '$sub' 
                            AND bloodstockstatusid = '4'
                            ";
                            
                            $result = mysqli_query($conn, $sql);
                            if(empty($result))
                            $status = false;

                            $running = getRunningYM('ST');
                            $bloodstockid = $running['runn'];
                            $bloodstockcode = $running['code'];
                            $sub_max_new = intval($sub_max)+1;
                            

                            if($volume > 0)
                            {
                                $sql = "INSERT INTO bloodstock
                                (
                                    bloodstockid,
                                    bloodstockcode,
                                    bloodstockmainid,
                                    bloodstockrfid,
                                    bloodtype,
                                    bloodgroup,
                                    bloodgroupconfirm,
                                    bloodrh,
                                    bloodrhconfirm,
                                    bloodstart,
                                    bloodexp,
                                    bloodstockstatusid,
                                    userpay,
                                    donateid,
                                    donorid,
                                    hospitalid,
                                    bagtypeid,
                                    receivingtypeid,
                                    bag_number,
                                    sub,
                                    rubberbandnumber,
                                    volume,
                                    antibody,
                                    phenotype
                                ) 
                                VALUES
                                (
                                    '$bloodstockid',
                                    '$bloodstockcode',
                                    '$bloodstockmainid',
                                    '$bloodstockrfid',
                                    '$bloodtype',
                                    '$bloodgroup',
                                    '$bloodgroupconfirm',
                                    '$bloodrh',
                                    '$bloodrhconfirm',
                                    '$bloodstart',
                                    '$bloodexp',
                                    '$bloodstockstatusid',
                                    '$userpay',
                                    '$donateid',
                                    '$donorid',
                                    '$hospitalid',
                                    '$bagtypeid',
                                    '$receivingtypeid',
                                    '$bag_number',
                                    '$sub_max_new',
                                    '$rubberbandnumber',
                                    '$volume',
                                    '$antibody',
                                    '$phenotype'
                                )
                                ";
                        
                                $result = mysqli_query($conn, $sql);
                                if(empty($result))
                                $status = false;

                                $sql = "INSERT INTO `request_blood_crossmacth`
                                ( 	    `requestbloodcrossmacthck`, 
                                        `seq`, 
                                        `bloodstockid`,
                                        `bag_number`, 
                                        `sub`, 
                                        `islight`, 
                                        `hlamatch`, 
                                        `bloodgroupid`, 
                                        `rhid`, 
                                        `bloodtype`, 
                                        `ctt_rt`, 
                                        `ctt_37c`, 
                                        `ctt_iat`, 
                                        `ctt_ccc`, 
                                        `cat`, 
                                        `rou`, 
                                        `crossmacthresultid`, 
                                        `crossmacthstatusid`, 
                                        `crossmacthstatus2id`,
                                        `doctorid`, 
                                        `isbloodpreparation`, 
                                        `requestbloodcrossmacthdatetime`, 
                                        `requestbloodid`, 
                                        `isreadyblood`, 
                                        `bloodrequestunit`, 
                                        `bloodrequestunitqty`, 
                                        `bloodrequestcc`, 
                                        `readyblooddate`, 
                                        `readybloodtime`, 
                                        `confirmbloodrequestdate`, 
                                        `confirmbloodrequesttime`, 
                                        `ispayblood`, `payblooddate`, 
                                        `paybloodtime`, 
                                        `payuser`, 
                                        `isallergic`, 
                                        `stoppayblooddate_allergic`, 
                                        `stoppaybloodtime_allergic`, 
                                        `totalbloodrequestcc_allergic`, 
                                        `sideeffects_allergic`, 
                                        `sideeffectsdate_allergic`, 
                                        `sideeffectstime_allergic`, 
                                        `isincreasebodytemp_allergic`, 
                                        `ischills_allergic`, 
                                        `isurticaria_allergic`, 
                                        `isitching_allergic`, 
                                        `isflushing_allergic`, 
                                        `ismusclepain_allergic`, 
                                        `ishypotension_allergic`, 
                                        `ishypertension_allergic`, 
                                        `isanaphylaxis_allergic`, 
                                        `isdyspnea_allergic`, 
                                        `isdecreaseurineout_allergic`, 
                                        `isdarkredurine_allergic`, 
                                        `isother_allergic`, 
                                        `othereffects_allergic`, 
                                        `before_temp_allergic`, 
                                        `before_bpstart_allergic`, 
                                        `before_bpend_allergic`, 
                                        `before_pmin_allergic`, 
                                        `before_rmin_allergic`, 
                                        `after_temp_allergic`, 
                                        `after_bpstart_allergic`, 
                                        `after_bpend_allergic`, 
                                        `after_pmin_allergic`, 
                                        `after_rmin_allergic`, 
                                        `ishemolytictransfusionreation2_allergic`, 
                                        `isfebrilehemolytictransfusionreation2_allergic`, 
                                        `isallergicreation2_allergic`, 
                                        `isanaphylaxis2_allergic`, 
                                        `isinfectionsepsisreatedtransfusion2_allergic`, 
                                        `istransfusionreatedacutelunginjury2_allergic`, 
                                        `isother2_allergic`, 
                                        `othereffects2_allergic`, 
                                        `ischeck_return`, 
                                        `bloodsavedate_return`, 
                                        `bloodsavetime_return`, 
                                        `blooddate_return`, 
                                        `bloodtime_return`, 
                                        `bloodcc_return`, 
                                        `warm_retuen`, 
                                        `requestbloodreturnstatusid`, 
                                        `username_return`, 
                                        `username_confirmreturn`, 
                                        `date_confirmreturn`, 
                                        `time_confirmreturn`, 
                                        `date_bloodrelease`, 
                                        `time_bloodrelease`, 
                                        `result_testblood`, 
                                        `remark_testblood`, 
                                        `mostandunstatus`, 
                                        `causereleaseremark`
                                        ) 
                                        SELECT 
                                        `requestbloodcrossmacthck`, 
                                        `seq`, 
                                        $bloodstockid AS bloodstockid,
                                        `bag_number`, 
                                        '$sub_max_new', 
                                        `islight`, 
                                        `hlamatch`, 
                                        `bloodgroupid`, 
                                        `rhid`, 
                                        `bloodtype`, 
                                        `ctt_rt`, 
                                        `ctt_37c`, 
                                        `ctt_iat`, 
                                        `ctt_ccc`, 
                                        `cat`, 
                                        `rou`, 
                                        `crossmacthresultid`, 
                                        '2', 
                                        '2', 
                                        '', 
                                        `isbloodpreparation`, 
                                        `requestbloodcrossmacthdatetime`, 
                                        `requestbloodid`, 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        '', 
                                        `payuser`, 
                                        `isallergic`, 
                                        `stoppayblooddate_allergic`, 
                                        `stoppaybloodtime_allergic`, 
                                        `totalbloodrequestcc_allergic`, 
                                        `sideeffects_allergic`, 
                                        `sideeffectsdate_allergic`, 
                                        `sideeffectstime_allergic`, 
                                        `isincreasebodytemp_allergic`, 
                                        `ischills_allergic`, 
                                        `isurticaria_allergic`, 
                                        `isitching_allergic`, 
                                        `isflushing_allergic`, 
                                        `ismusclepain_allergic`, 
                                        `ishypotension_allergic`, 
                                        `ishypertension_allergic`, 
                                        `isanaphylaxis_allergic`, 
                                        `isdyspnea_allergic`, 
                                        `isdecreaseurineout_allergic`, 
                                        `isdarkredurine_allergic`, 
                                        `isother_allergic`, 
                                        `othereffects_allergic`, 
                                        `before_temp_allergic`, 
                                        `before_bpstart_allergic`, 
                                        `before_bpend_allergic`, 
                                        `before_pmin_allergic`, 
                                        `before_rmin_allergic`, 
                                        `after_temp_allergic`, 
                                        `after_bpstart_allergic`, 
                                        `after_bpend_allergic`, 
                                        `after_pmin_allergic`, 
                                        `after_rmin_allergic`, 
                                        `ishemolytictransfusionreation2_allergic`, 
                                        `isfebrilehemolytictransfusionreation2_allergic`, 
                                        `isallergicreation2_allergic`, 
                                        `isanaphylaxis2_allergic`, 
                                        `isinfectionsepsisreatedtransfusion2_allergic`, 
                                        `istransfusionreatedacutelunginjury2_allergic`, 
                                        `isother2_allergic`, 
                                        `othereffects2_allergic`, 
                                        `ischeck_return`, 
                                        `bloodsavedate_return`, 
                                        `bloodsavetime_return`, 
                                        `blooddate_return`, 
                                        `bloodtime_return`, 
                                        `bloodcc_return`, 
                                        `warm_retuen`, 
                                        `requestbloodreturnstatusid`, 
                                        `username_return`, 
                                        `username_confirmreturn`, 
                                        `date_confirmreturn`, 
                                        `time_confirmreturn`, 
                                        `date_bloodrelease`, 
                                        `time_bloodrelease`, 
                                        `result_testblood`, 
                                        `remark_testblood`, 
                                        `mostandunstatus`, 
                                        `causereleaseremark`
                                        FROM request_blood_crossmacth 
                                        WHERE requestbloodcrossmacthid =  '$requestbloodcrossmacthid'
                                        
                                ";

                                $result = mysqli_query($conn, $sql);
                                if(empty($result))
                                $status = false;

                                error_log("========$status==========");
                                error_log($sql);
                                    

                            }
                            
        
                }

                

            }

        }
        
            
    }

    if(isset($_POST['doctoritem']))
    {
        $doctoritem = json_decode($_POST['doctoritem']);
        foreach ($doctoritem as $item) {

            $im = json_decode($item);
            $requestbloodcrossmacthid = $im->requestbloodcrossmacthid; 
            $doctorid = $im->doctorid; 
            $requestbloodcrossmacthremark = $im->requestbloodcrossmacthremark; 

            $sql = "UPDATE request_blood_crossmacth SET
                doctorid='$doctorid',
                requestbloodcrossmacthremark='$requestbloodcrossmacthremark'
                WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                ";
                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;

                error_log("========$status==========");
                error_log($sql);

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
        'id' => $groupid,
        'gid' => $grouprequestbloodid,
        'doctor' => $doctoritem
    )
);
    

    // end การบริจาค


?>