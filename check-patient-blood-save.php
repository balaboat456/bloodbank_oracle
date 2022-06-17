<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
include('data/running.php');
date_default_timezone_set('Asia/Bangkok');
session_start();


$requestbloodid = $_POST['requestbloodid'];

$logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$logtext','$dateNowValue','$username','check-patient-blood','บันทึกผลตรวจเลือดผู้ป่วย/ผลการ cross-match')");


$status = true;
mysqli_autocommit($conn, FALSE);

$hn = $_POST['hn'];


$inouttime = $_POST['inouttime'];
$antia = $_POST['antia'];
$antib = $_POST['antib'];
$antiab = $_POST['antiab'];
$acells = $_POST['acells'];
$bcells = $_POST['bcells'];
$ocells = $_POST['ocells'];
$antia1 = $_POST['antia1'];
$antih = $_POST['antih'];
$a2cells = $_POST['a2cells'];
$dat_poly = $_POST['dat_poly'];
$dat_igg = $_POST['dat_igg'];
$dat_c3d = $_POST['dat_c3d'];
$dat_ccc = $_POST['dat_ccc'];

$bloodgroup = $_POST['bloodgroup'];
$confirmbloodgroup = $_POST['confirmbloodgroup'];
$inouttime = $_POST['inouttime'];

$antibody = $_POST['antibody'];
$phenotype = $_POST['phenotype'];
$phenotypedisplay = $_POST['phenotypedisplay'];

$patientantibodyall = $_POST['patientantibodyall'];
$patientphenotypeall = $_POST['patientphenotypeall'];


$ischeckbloodremark = $_POST['ischeckbloodremark'];
$checkbloodremark = $_POST['checkbloodremark'];
$confirmrhid = $_POST['confirmrhid'];
$confirmsceen = $_POST['confirmsceen'];

$checkbloodremark2 = $_POST['checkbloodremark2'];

$checkpatientuser = $_POST['checkpatientuser'];
$checkpatientdate = $_POST['checkpatientdate'];
$checkpatienttime = $_POST['checkpatienttime'];

$crossmatchuserid = $_POST['crossmatchuserid'];
$crossmatchuser = $_POST['crossmatchuser'];
$crossmatchdate = $_POST['crossmatchdate'];
$crossmatchtime = $_POST['crossmatchtime'];


$autocontrol = $_POST['autocontrol'];

$arrChangeCrossMatchItemState = $_POST['arrChangeCrossMatchItemState'];

$fullname = $_SESSION["fullname"]; 
$staffid = $_SESSION["staffid"]; 


$iscrossmatch = '';
$isaddblood = '';

$date = dmyToymd(dateNowDMY());
$time = date("H:i");

$datetimenow = $date.' '.$time;

// เพื่อบุตร
$forchildren = $_POST['forchildren'];

$bloodsampletube = $_POST['bloodsampletube'];

// if(empty($confirmbloodgroup) || empty($confirmrhid) || empty($confirmsceen))
if(empty($bloodsampletube))
if(empty($confirmbloodgroup) || empty($confirmrhid) )
{
    $crossmatchtime = '';
    $crossmatchdate = '';
}else
{
    $iscrossmatch = '1';
    if(empty($crossmatchtime))
    $crossmatchtime = date("H:i");

    if(empty($crossmatchuser))
    {
        $crossmatchuserid = $staffid;
        $crossmatchuser = $fullname;
    }
    

    if(empty($crossmatchdate))
    {
        $crossmatchdate = dmyToymd(dateNowDMY());
    }else
    {
        $crossmatchdate = dmyToymd($crossmatchdate);
    }
}

if(!empty($bloodsampletube))
if(empty($confirmbloodgroup) || empty($confirmrhid) || empty($confirmsceen))
{
    $crossmatchtime = '';
    $crossmatchdate = '';


}else
{
    $iscrossmatch = '1';
    if(empty($crossmatchtime))
    $crossmatchtime = date("H:i");

    if(empty($crossmatchuser))
    $crossmatchuser = $fullname;

    if(empty($crossmatchdate))
    {
        $crossmatchdate = dmyToymd(dateNowDMY());
    }else
    {
        $crossmatchdate = dmyToymd($crossmatchdate);
    }
}

$condition = "" ;

$arrCross = json_decode($_POST['arrCrossMatch']);
if(count($arrCross) == 0)
{
    $checkpatienttime = "";
    $checkpatientdate = "";
}else
{


    if(empty($checkpatientuser))
    $checkpatientuser = $fullname;


    if($bloodsampletube == 2)
    {
        $condition = $condition."confirmbloodgroupqueuedate = '$date',
                        confirmbloodgroupqueuetime = '$time',
                        isconfirmbloodgroupqueue = '1'," ;
    }


    $isaddblood = '1';
    if(empty($checkpatienttime))
    $checkpatienttime = date("H:i");

    if(empty($checkpatientdate))
    {
        $checkpatientdate = dmyToymd(dateNowDMY());
    }else
    {
        $checkpatientdate = dmyToymd($checkpatientdate);
    }
}

if(!empty($confirmbloodgroup) && $confirmbloodgroup != '0')
{
    $sql = "UPDATE patient SET patientbloodgroup='$confirmbloodgroup',isconfirmbloodgroup=1 WHERE patienthn = '$hn'";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;
}

if(!empty($confirmrhid) && $confirmrhid != '0')
{
    $sql = "UPDATE patient SET patientrh='$confirmrhid' WHERE patienthn = '$hn'";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;
}


$sql = "UPDATE patient SET patientantibody='$patientantibodyall',patientphenotype='$patientphenotypeall' WHERE patienthn = '$hn'";
$result = mysqli_query($conn, $sql);
if(empty($result))
$status = false;


$sql = "UPDATE request_blood SET
        $condition
        antia1 = '$antia1',
        antih = '$antih',
        a2cells = '$a2cells',
        dat_poly = '$dat_poly',
        dat_igg = '$dat_igg',
        dat_c3d = '$dat_c3d',
        dat_ccc = '$dat_ccc',
        bloodgroup = '$bloodgroup',
        confirmbloodgroup = '$confirmbloodgroup',
        antibody =  '$antibody',
        phenotype = '$phenotype',
        phenotypedisplay = '$phenotypedisplay',
        inouttime = '$inouttime',
        ischeckbloodremark = '$ischeckbloodremark',
        checkbloodremark = '$checkbloodremark',
        confirmrhid = '$confirmrhid',
        confirmsceen = '$confirmsceen',
        checkbloodremark2 = '$checkbloodremark2',
        crossmatchuserid = '$crossmatchuserid',
        checkpatientuser = '$checkpatientuser',
        checkpatientdate = '$checkpatientdate',
        checkpatienttime = '$checkpatienttime',
        iscrossmatch = '$iscrossmatch',
        crossmatchuser = '$crossmatchuser',
        crossmatchdate = '$crossmatchdate',
        crossmatchtime = '$crossmatchtime',
        autocontrol = '$autocontrol',
        isaddblood = '$isaddblood'
        WHERE requestbloodid = '$requestbloodid'

    ";

    error_log($sql);


    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;



    $sql = "DELETE FROM request_abo WHERE requestbloodid = '$requestbloodid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    
    $arrABO = json_decode($_POST['arrABO']);
    foreach ($arrABO as $item) {

        $reagent = $item[0]->reagent;
        $requestantia = $item[0]->requestantia;
        $requestantib = $item[0]->requestantib;
        $requestantiab = $item[0]->requestantiab;
        $requestacells = $item[0]->requestacells;
        $requestbcells = $item[0]->requestbcells;
        $requestocells = $item[0]->requestocells;
        $requestbloodgroup = $item[0]->requestbloodgroup;
        
        $sql = "INSERT INTO 
                request_abo(
                            reagent,
                            requestantia,
                            requestantib,
                            requestantiab,
                            requestacells,
                            requestbcells,
                            requestocells,
                            requestbloodgroup,
                            requestbloodid
                            ) 
                            VALUE 
                            (
                            '$reagent',    
                            '$requestantia',
                            '$requestantib',
                            '$requestantiab',
                            '$requestacells',
                            '$requestbcells',
                            '$requestocells',
                            '$requestbloodgroup',
                            '$requestbloodid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;


    }


    $sql = "DELETE FROM request_blood_rh WHERE requestbloodid = '$requestbloodid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $arrRh = json_decode($_POST['arrRh']);
    foreach ($arrRh as $item) {

        $requestbloodrhreagent = $item[0]->requestbloodrhreagent ;
        $requestbloodrhrt = $item[0]->requestbloodrhrt;
        $requestbloodrh37c = $item[0]->requestbloodrh37c;
        $requestbloodrhiat = $item[0]->requestbloodrhiat;
        $requestbloodrhccc = $item[0]->requestbloodrhccc;
        $requestbloodrhresult = $item[0]->requestbloodrhresult;
        

        $sql = "INSERT INTO 
                request_blood_rh(
                            requestbloodrhreagent,
                            requestbloodrhrt,
                            requestbloodrh37c,
                            requestbloodrhiat,
                            requestbloodrhccc,
                            requestbloodrhresult,
                            requestbloodid
                            ) 
                            VALUE 
                            ('$requestbloodrhreagent',
                            '$requestbloodrhrt',
                            '$requestbloodrh37c',
                            '$requestbloodrhiat',
                            '$requestbloodrhccc',
                            '$requestbloodrhresult',
                            '$requestbloodid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;


    }
    

    $sql = "DELETE FROM request_blood_anti_sceen WHERE requestbloodid = '$requestbloodid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $arrAnti = json_decode($_POST['arrAnti']);
    foreach ($arrAnti as $item) {

        $requestbloodantisceentest = $item[0]->requestbloodantisceentest ;
        $requestbloodantisceenp1mi = $item[0]->requestbloodantisceenp1mi;
        $requestbloodantisceeno = $item[0]->requestbloodantisceeno;
        $requestbloodantisceeno1 = $item[0]->requestbloodantisceeno1;
        $requestbloodantisceeno2 = $item[0]->requestbloodantisceeno2;
        $requestbloodantisceenenz = $item[0]->requestbloodantisceenenz;
        $requestbloodantisceenlotno = $item[0]->requestbloodantisceenlotno;

        $sql = "INSERT INTO 
                request_blood_anti_sceen(
                            requestbloodantisceentest,
                            requestbloodantisceenp1mi,
                            requestbloodantisceeno,
                            requestbloodantisceeno1,
                            requestbloodantisceeno2,
                            requestbloodantisceenenz,
                            requestbloodantisceenlotno,
                            requestbloodid
                            ) 
                            VALUE 
                            ('$requestbloodantisceentest',
                            '$requestbloodantisceenp1mi',
                            '$requestbloodantisceeno',
                            '$requestbloodantisceeno1',
                            '$requestbloodantisceeno2',
                            '$requestbloodantisceenenz',
                            '$requestbloodantisceenlotno',
                            '$requestbloodid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;


    }

    $sql = "DELETE FROM request_blood_anti_iden WHERE requestbloodid = '$requestbloodid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $arrIden = json_decode($_POST['arrIden']);
    foreach ($arrIden as $item) {

        $requestbloodantiidentest = $item[0]->requestbloodantiidentest ;
        $requestbloodantiiden1 = $item[0]->requestbloodantiiden1;
        $requestbloodantiiden2 = $item[0]->requestbloodantiiden2;
        $requestbloodantiiden3 = $item[0]->requestbloodantiiden3;
        $requestbloodantiiden4 = $item[0]->requestbloodantiiden4;
        $requestbloodantiiden5 = $item[0]->requestbloodantiiden5;
        $requestbloodantiiden6 = $item[0]->requestbloodantiiden6;
        $requestbloodantiiden7 = $item[0]->requestbloodantiiden7;
        $requestbloodantiiden8 = $item[0]->requestbloodantiiden8;
        $requestbloodantiiden9 = $item[0]->requestbloodantiiden9;
        $requestbloodantiiden10 = $item[0]->requestbloodantiiden10;
        $requestbloodantiiden11 = $item[0]->requestbloodantiiden11;
        $requestbloodantiidenauto = $item[0]->requestbloodantiidenauto;
        $requestbloodantiidenlotno = $item[0]->requestbloodantiidenlotno;

        $sql = "INSERT INTO 
                request_blood_anti_iden(
                            requestbloodantiidentest,
                            requestbloodantiiden1,
                            requestbloodantiiden2,
                            requestbloodantiiden3,
                            requestbloodantiiden4,
                            requestbloodantiiden5,
                            requestbloodantiiden6,
                            requestbloodantiiden7,
                            requestbloodantiiden8,
                            requestbloodantiiden9,
                            requestbloodantiiden10,
                            requestbloodantiiden11,
                            requestbloodantiidenauto,
                            requestbloodantiidenlotno,
                            requestbloodid
                            ) 
                            VALUE 
                            ('$requestbloodantiidentest',
                            '$requestbloodantiiden1',
                            '$requestbloodantiiden2',
                            '$requestbloodantiiden3',
                            '$requestbloodantiiden4',
                            '$requestbloodantiiden5',
                            '$requestbloodantiiden6',
                            '$requestbloodantiiden7',
                            '$requestbloodantiiden8',
                            '$requestbloodantiiden9',
                            '$requestbloodantiiden10',
                            '$requestbloodantiiden11',
                            '$requestbloodantiidenauto',
                            '$requestbloodantiidenlotno',
                            '$requestbloodid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;


    }

    $sql = "SELECT * FROM request_blood_crossmacth_cryo WHERE requestbloodid = '$requestbloodid' "; 
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }

    $cryoindex = 0;

    $arrCross = json_decode($_POST['arrCrossMatch']);
    $index = 1;
    foreach ($arrCross as $item) {

        $requestbloodcrossmacthck = $item[0]->requestbloodcrossmacthck ;
        $bag_number = $item[0]->bag_number;
        $sub = (!empty($item[0]->sub))?$item[0]->sub:0;
        $islight = $item[0]->islight;
        $hlamatch = $item[0]->hlamatch;
        $bloodgroupid = $item[0]->bloodgroupid;
        $rhid = $item[0]->rhid;
        $bloodtype = $item[0]->bloodtype;
        $ctt_rt = $item[0]->ctt_rt;
        $ctt_37c = $item[0]->ctt_37c;
        $ctt_iat = $item[0]->ctt_iat;
        $ctt_ccc = $item[0]->ctt_ccc;
        $cat = $item[0]->cat;
        $rou = $item[0]->rou;
        $crossmacthresultid = (!empty($item[0]->crossmacthresultid))?$item[0]->crossmacthresultid:0;
        $crossmacthstatusid = (!empty($item[0]->crossmacthstatusid))?$item[0]->crossmacthstatusid:0;

        $crossmacthstatus2id = (!empty($item[0]->crossmacthstatus2id) && $crossmacthstatusid != 2)?$item[0]->crossmacthstatus2id:$crossmacthstatusid;

        if($crossmacthstatusid == 2)
        {
            $crossmacthstatus2id = 2;
        }
        

        error_log("=====$crossmacthstatus2id========");

        $doctorid = (!empty($item[0]->doctorid))?$item[0]->doctorid:0;
        $isbloodpreparation =  (!empty($item[0]->isbloodpreparation))?$item[0]->isbloodpreparation:0;
        $requestbloodcrossmacthdatetime = $item[0]->requestbloodcrossmacthdatetime;
        $requestbloodcrossmacthremark = $item[0]->requestbloodcrossmacthremark;

        $ispayblood = $item[0]->ispayblood;
        $payblooddate = $item[0]->payblooddate;
        $paybloodtime = $item[0]->paybloodtime;
        $payuser = $item[0]->payuser;

        $isautocontrol = $item[0]->isautocontrol;

        

        $bloodstockid = $item[0]->bloodstockid;
        $requestbloodcrossmacthid = $item[0]->requestbloodcrossmacthid;

        if(empty($requestbloodcrossmacthdatetime))
        $requestbloodcrossmacthdatetime = dateNowDMY().' '.date("H:i");

        
       if(empty($requestbloodcrossmacthid))
       {
            $sql = "INSERT INTO 
                    request_blood_crossmacth(
                        seq,
                        requestbloodcrossmacthck,
                        bag_number,
                        sub,
                        islight,
                        hlamatch,
                        bloodgroupid,
                        rhid,
                        bloodtype,
                        ctt_rt,
                        ctt_37c,
                        ctt_iat,
                        ctt_ccc,
                        cat,
                        rou,
                        crossmacthresultid,
                        crossmacthstatusid,
                        crossmacthstatus2id,
                        doctorid,
                        isbloodpreparation,
                        requestbloodid,
                        requestbloodcrossmacthdatetime,
                        requestbloodcrossmacthremark,
                        ispayblood,
                        payblooddate,
                        paybloodtime,
                        payuser,
                        bloodstockid,
                        isautocontrol
                                ) 
                                VALUES
                                (
                                    '$index',
                                    '$requestbloodcrossmacthck',
                                    '$bag_number',
                                    '$sub',
                                    '$islight',
                                    '$hlamatch',
                                    '$bloodgroupid',
                                    '$rhid',
                                    '$bloodtype',
                                    '$ctt_rt',
                                    '$ctt_37c',
                                    '$ctt_iat',
                                    '$ctt_ccc',
                                    '$cat',
                                    '$rou',
                                    '$crossmacthresultid',
                                    '$crossmacthstatusid',
                                    '$crossmacthstatus2id',
                                    '$doctorid',
                                    '$isbloodpreparation',
                                    '$requestbloodid',
                                    '$requestbloodcrossmacthdatetime',
                                    '$requestbloodcrossmacthremark',
                                    '$ispayblood',
                                    '$payblooddate',
                                    '$paybloodtime',
                                    '$payuser',
                                    '$bloodstockid',
                                    '$isautocontrol'
                                ) ";

            $result = mysqli_query($conn, $sql);

            if(empty($result))
            $status = false;
       }else
       {
            $sql = "UPDATE request_blood_crossmacth
                    SET     seq='$index',
                            requestbloodcrossmacthck='$requestbloodcrossmacthck',
                            bag_number='$bag_number',
                            sub='$sub',
                            islight='$islight',
                            hlamatch='$hlamatch',
                            bloodgroupid='$bloodgroupid',
                            rhid='$rhid',
                            bloodtype='$bloodtype',
                            ctt_rt='$ctt_rt',
                            ctt_37c='$ctt_37c',
                            ctt_iat='$ctt_iat',
                            ctt_ccc='$ctt_ccc',
                            cat='$cat',
                            rou='$rou',
                            crossmacthresultid='$crossmacthresultid',
                            crossmacthstatusid='$crossmacthstatusid',
                            crossmacthstatus2id='$crossmacthstatus2id',
                            doctorid='$doctorid',
                            requestbloodid='$requestbloodid',
                            requestbloodcrossmacthdatetime='$requestbloodcrossmacthdatetime',
                            requestbloodcrossmacthremark='$requestbloodcrossmacthremark',
                            ispayblood='$ispayblood',
                            payblooddate='$payblooddate',
                            paybloodtime='$paybloodtime',
                            payuser='$payuser',
                            bloodstockid='$bloodstockid',
                            isautocontrol='$isautocontrol'
                    WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
            ";

                $result = mysqli_query($conn, $sql);

                if(empty($result))
                $status = false;
       }


        


        if($crossmacthresultid == "2" )
        {
            $sql = "UPDATE request_blood_crossmacth 
                    SET mostandunstatus='2' 
                    WHERE requestbloodid = '$requestbloodid'
                    AND bag_number = '$bag_number'
                    AND sub = '$sub'
                    AND bloodtype = '$bloodtype'
                    ";
        
            $result = mysqli_query($conn, $sql);

            if(empty($result))
            $status = false;
        }else if(($confirmbloodgroup != $bloodgroupid || ($confirmrhid != $rhid && $rhid == 'Rh+')  ))
        {
            $sql = "UPDATE request_blood_crossmacth 
                    SET mostandunstatus='3' 
                    WHERE requestbloodid = '$requestbloodid'
                    AND bag_number = '$bag_number'
                    AND sub = '$sub'
                    AND bloodtype = '$bloodtype'
                    ";
        
            $result = mysqli_query($conn, $sql);

            if(empty($result))
            $status = false;
        }

        $index++;

        $bloodstockstatusid = 4;
        if($crossmacthstatusid == 10)
        {
            $bloodstockstatusid = 1;
        }else if($crossmacthstatusid == 5 || $crossmacthstatusid == 6 || $crossmacthstatusid == 7 || $crossmacthstatusid == 8 || $crossmacthstatusid == 9)
        {
            $bloodstockstatusid = 2;
        }

        if($crossmacthstatusid != 11 && $crossmacthstatus2id != 10)
        {
            $sql = "UPDATE bloodstock SET bloodstockstatusid='$bloodstockstatusid' 
            WHERE bag_number = '$bag_number' AND sub = '$sub' AND bloodtype = '$bloodtype'";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;


            if($crossmacthstatusid == 10)
            {
                $sql = "UPDATE request_blood_crossmacth
                SET     crossmacthstatus2id='10'
                WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                ";

                $result = mysqli_query($conn, $sql);

                if(empty($result))
                $status = false;
            }

        }

        


        
        if($bloodtype == "CRYO")
        {

            $isreadyblood = $resultArray[$cryoindex]["isreadyblood"];
            $bloodrequestunit = $resultArray[$cryoindex]["bloodrequestunit"];
            $bloodrequestcc = $resultArray[$cryoindex]["bloodrequestcc"];
            $readyblooddate = $resultArray[$cryoindex]["readyblooddate"];
            $readybloodtime = $resultArray[$cryoindex]["readybloodtime"];
            $confirmbloodrequestdate = $resultArray[$cryoindex]["confirmbloodrequestdate"];
            $confirmbloodrequesttime = $resultArray[$cryoindex]["confirmbloodrequesttime"];


            if(!empty($isreadyblood)  )
            {
                $sql = "UPDATE request_blood_crossmacth SET
                isreadyblood = '$isreadyblood',
                bloodrequestunit = '$bloodrequestunit',
                bloodrequestcc = '$bloodrequestcc',
                readyblooddate = '$date',
                readybloodtime = '$time',
                crossmacthstatusid='4',
                crossmacthstatus2id='4',
                confirmbloodrequestdate = '$confirmbloodrequestdate',
                confirmbloodrequesttime = '$confirmbloodrequesttime'
                WHERE requestbloodid = '$requestbloodid'
                AND bloodtype = '$bloodtype'
                AND bag_number = '$bag_number'
                AND sub = '$sub'
                AND crossmacthstatusid IN (1,2,3,4)
        ";
        
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;
            }
            

            $cryoindex++;

        }


    }


    if(!empty($arrChangeCrossMatchItemState))
    {
        $running_log_main = getRunningYM('CML');
        $requestbloodcrossmacthlogmainid = $running_log_main['runn'];

        $sql = "INSERT INTO request_blood_crossmacth_log_main
                    (
                        requestbloodcrossmacthlogmainid,
                        requestbloodcrossmacthlogmaindate,
                        requestbloodcrossmacthlogmainuser,
                        requestbloodid
                    )
                    VALUES
                    (
                        '$requestbloodcrossmacthlogmainid',
                        '$datetimenow',
                        '$fullname',
                        '$requestbloodid'
                    )
            ";
            
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $sql = "INSERT INTO request_blood_crossmacth_log
                    (
                        `requestbloodcrossmacthlogmainid`,
                        `requestbloodcrossmacthck`, 
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
                        `ispayblood`, 
                        `payblooddate`, 
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
                        '$requestbloodcrossmacthlogmainid' AS requestbloodcrossmacthlogmainid,
                        `requestbloodcrossmacthck`, 
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
                        `ispayblood`, 
                        `payblooddate`, 
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
                        FROM request_blood_crossmacth WHERE requestbloodid = '$requestbloodid'
            ";
            
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;


    }


    $sql = "UPDATE request_blood_change_abo SET active=0 WHERE requestbloodid = '$requestbloodid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $arrChangeABO = json_decode($_POST['arrChangeABO']);
    foreach ($arrChangeABO as $item) {

        $im = json_decode($item);

        $requestbloodchangeaboid = $im->requestbloodchangeaboid ;
        $requestbloodchangeabocode = $im->requestbloodchangeabocode ;
        $requestbloodchangeaboold = $im->requestbloodchangeaboold ;
        $requestbloodchangeabnew = $im->requestbloodchangeabnew ;
        $requestbloodchangeabodatetime = dmyToymd(dateNowDMY()).' '.date("H:i") ;
        $requestbloodchangeabouser = $im->requestbloodchangeabouser ;
        $requestbloodchangeaboremark = $im->requestbloodchangeaboremark ;

        if(empty($requestbloodchangeaboid))
        {
            $sql = "INSERT INTO request_blood_change_abo
                    (
                        hn,
                        requestbloodid,
                        requestbloodchangeaboold,
                        requestbloodchangeabnew,
                        requestbloodchangeabodatetime,
                        requestbloodchangeabouser,
                        requestbloodchangeaboremark
                    )
                    VALUES
                    (
                        '$hn',
                        '$requestbloodid',
                        '$requestbloodchangeaboold',
                        '$requestbloodchangeabnew',
                        '$requestbloodchangeabodatetime',
                        '$requestbloodchangeabouser',
                        '$requestbloodchangeaboremark'
                    )
            ";
            
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;
        }



    }


    $sql = "SELECT * FROM blood_washed_red_cell WHERE requestbloodid = '$requestbloodid'";
    
    $query = mysqli_query($conn,$sql);

    $resultArrayWRC = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArrayWRC,$result);
	}

    $sql = "SELECT CM.* 
            FROM request_blood_crossmacth CM
            LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
            WHERE CM.requestbloodid = '$requestbloodid' AND  TY.bloodstocktypegroupid = 1";
    $query = mysqli_query($conn, $sql);

    $indexCM = 0;
    while ($row = mysqli_fetch_array($query)) {
        $bag_number = $row['bag_number'];
        $sub = $row['sub'];
        $bloodtype = $row['bloodtype'];
        $bloodgroupid = $row['bloodgroupid'];
        $rhid = $row['rhid'];
        
        $bloodwashedredcellid = $resultArrayWRC[$indexCM]["bloodwashedredcellid"];


        $sql = "UPDATE blood_washed_red_cell SET 
                bag_number='$bag_number',
                sub='$sub',
                bloodtype='$bloodtype',
                bloodgroupid='$bloodgroupid',
                rhid='$rhid'
                WHERE bloodwashedredcellid = '$bloodwashedredcellid' ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        error_log($sql);

        $indexCM++;
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

?>