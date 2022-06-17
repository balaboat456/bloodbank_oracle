<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('data/numberFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $labcheckrequestid = $_POST['labcheckrequestid'];
    $patientid = $_POST['labpatientid'];
    $fn = $_POST['fn'];
    $vn = $_POST['vn'];

    $condition_labgetdatetime = '';
    $labgetdatetime = $_POST['labgetdatetime'];
    if(empty($labgetdatetime))
    {
        $labgetdatetime = dateNowYMDHM() ;
        $condition_labgetdatetime = "labgetdatetime = '$labgetdatetime'," ;
    }
        

    $labunitid = $_POST['labunitid'];
    $checkresultbloodstatusid = $_POST['checkresultbloodstatusid'];
    $labjobtypeid = $_POST['labjobtypeid'];
    
    $labunitroomid = $_POST['labunitroomid'];
    $labsenddatetime = dateNowYMDHM();
    $labusersend = $_POST['labusersend'];
    $labkeepdatetime = dateNowYMDHM();
    $doctorid = $_POST['doctorid'];
    $labcheckrequestdatetime = dateNowYMDHM();
    $labrequestdatetime = dateNowYMDHM();
    $labuserget = $_POST['labuserget'];
    $reasonsendingid = $_POST['reasonsendingid'];
    $labid = $_POST['labid'];
    $reqby = $_POST['reqby'];
    $labexpress = $_POST['labexpress'];
    $labdiagnosis = $_POST['labdiagnosis'];
    $labremark = $_POST['labremark'];
    $labdeliveryid = $_POST['labdeliveryid'];
    $maintenancerightid = $_POST['maintenancerightid'];
    $labamount = replace_comma($_POST['labamount']);
    

    $labbloodgroupid = $_POST['labbloodgroupid'];
    $labrhid = $_POST['labrhid'];
    $labdaignosis = $_POST['labdaignosis'];
    $pregnant = $_POST['pregnant'];
    $pregnantdate = dmyToymd($_POST['pregnantdate']);
    $patienttype = $_POST['patienttype'];
    $antenataldate = dmyToymd($_POST['antenataldate']);
    $birthdate = dmyToymd($_POST['birthdate']);
    $bloodhistory = $_POST['bloodhistory'];
    $bloodgetdate = dmyToymd($_POST['bloodgetdate']);
    $motherbloodgroup = $_POST['motherbloodgroup'];
    $motherrh = $_POST['motherrh'];

    
    if(!empty($labcheckrequestid))
    {
        $sql = "UPDATE lab_check_request SET
            maintenancerightid = '$maintenancerightid',
            $condition_labgetdatetime
            labunitid = '$labunitid',
            checkresultbloodstatusid = '1',
            labjobtypeid = '$labjobtypeid',
            labunitroomid = '$labunitroomid',
            labsenddatetime = '$labsenddatetime',
            labusersend = '$labusersend',
            labkeepdatetime = '$labkeepdatetime',
            doctorid = '$doctorid',
            labcheckrequestdatetime = '$labcheckrequestdatetime',
            labrequestdatetime = '$labrequestdatetime',
            labuserget = '$labuserget',
            reasonsendingid = '$reasonsendingid',
            labid = '$labid',
            reqby = '$reqby',
            labexpress = '$labexpress',
            labdiagnosis = '$labdiagnosis',
            labremark = '$labremark',
            labdeliveryid = '$labdeliveryid',
            labamount = '$labamount',
            labbloodgroupid = '$labbloodgroupid',
            labrhid = '$labrhid',
            labdaignosis = '$labdaignosis',
            pregnant = '$pregnant',
            pregnantdate = '$pregnantdate',
            patienttype = '$patienttype',
            antenataldate = '$antenataldate',
            birthdate = '$birthdate',
            bloodhistory = '$bloodhistory',
            bloodgetdate = '$bloodgetdate',
            motherbloodgroup = '$motherbloodgroup',
            motherrh = '$motherrh'

            WHERE labcheckrequestid = '$labcheckrequestid'
        
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;
    }else
    {

        $running = getRunningYM('LAB');
        $labcheckrequestid = $running['runn'];
        $labcheckrequestcode = $running['code'];

        $sql = "INSERT INTO 
        lab_check_request(
                        labcheckrequestid,
                        labcheckrequestcode,
                        patientid,
                        maintenancerightid,
                        labunitid,
                        checkresultbloodstatusid,
                        labjobtypeid,
                        labunitroomid,
                        labsenddatetime,
                        labusersend,
                        labkeepdatetime,
                        doctorid,
                        labcheckrequestdatetime,
                        labrequestdatetime,
                        labuserget,
                        reasonsendingid,
                        labid,
                        reqby,
                        labexpress,
                        labdiagnosis,
                        labremark,
                        labdeliveryid,
                        labamount,
                        labbloodgroupid,
                        labrhid,
                        labdaignosis,
                        pregnant,
                        pregnantdate,
                        patienttype,
                        antenataldate,
                        birthdate,
                        bloodhistory,
                        bloodgetdate,
                        motherbloodgroup,
                        motherrh
                    ) 
                    VALUE 
                    (   
                        '$labcheckrequestid',
                        '$labcheckrequestcode',
                        '$patientid',
                        '$maintenancerightid',
                        '$labunitid',
                        '1',
                        '$labjobtypeid',
                        '$labunitroomid',
                        '$labsenddatetime',
                        '$labusersend',
                        '$labkeepdatetime',
                        '$doctorid',
                        '$labcheckrequestdatetime',
                        '$labrequestdatetime',
                        '$labuserget',
                        '$reasonsendingid',
                        '$labid',
                        '$reqby',
                        '$labexpress',
                        '$labdiagnosis',
                        '$labremark',
                        '$labdeliveryid',
                        '$labamount',
                        '$labbloodgroupid',
                        '$labrhid',
                        '$labdaignosis',
                        '$pregnant',
                        '$pregnantdate',
                        '$patienttype',
                        '$antenataldate',
                        '$birthdate',
                        '$bloodhistory',
                        '$bloodgetdate',
                        '$motherbloodgroup',
                        '$motherrh'
                    ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = 0;
    }
    
    $sql = "UPDATE lab_check_request_item SET active = '0' WHERE labcheckrequestid = '$labcheckrequestid' ";
    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = 0;


    $requestbloodlabitem = json_decode($_POST['requestbloodlabitem']);
    
    foreach ($requestbloodlabitem as $item) {

        $im = json_decode($item);
        
        $labformid = (!empty($im->labformid))?$im->labformid:0; 
        $labcheckrequestitemprice =   (!empty($im->labcheckrequestitemprice))?$im->labcheckrequestitemprice:0;
        $labcheckrequestitemwiden =   (!empty($im->labcheckrequestitemwiden))?$im->labcheckrequestitemwiden:0;  

        $sql = "
                INSERT INTO lab_check_request_item
                (
                    labcheckrequestid,
                    labformid,
                    labcheckrequestitemprice,
                    labcheckrequestitemwiden
                )
                value
                (
                    '$labcheckrequestid',
                    '$labformid',
                    '$labcheckrequestitemprice',
                    '$labcheckrequestitemwiden'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;


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
        'id' => $labcheckrequestid
    )
);

    // end การบริจาค


?>