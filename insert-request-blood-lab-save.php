<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');


$status = true;
mysqli_autocommit($conn, FALSE);

$patientid = $_POST['patientid'];
$fn = $_POST['fn'];
$vn = $_POST['vn'];
$maintenancerightid = $_POST['maintenancerightid'];
$labunitid = $_POST['labunitid'];
$checkresultbloodstatusid = $_POST['checkresultbloodstatusid'];
$labjobtypeid = $_POST['labjobtypeid'];
$labgetdatetime = $_POST['labgetdatetime'];
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


$sql = "INSERT INTO 
        lab_check_request(
                        patientid,
                        fn,
                        vn,
                        maintenancerightid,
                        labunitid,
                        checkresultbloodstatusid,
                        labjobtypeid,
                        labgetdatetime,
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
                        labdeliveryid
                    ) 
                    VALUE 
                    (   '$patientid',
                        '$fn',
                        '$vn',
                        '$maintenancerightid',
                        '$labunitid',
                        '0',
                        '$labjobtypeid',
                        '$labgetdatetime',
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
                        '$labdeliveryid'
                    ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;


   

    if ($status) {
        mysqli_commit($conn);
    }else
    {
        mysqli_rollback($conn);
    }

    echo json_encode(
        array(
            'status' => $status,
        )
    );

?>