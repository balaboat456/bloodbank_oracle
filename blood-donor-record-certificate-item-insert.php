<?php

include('connection.php');
include('data/running.php');
include('dateNow.php');
date_default_timezone_set('Asia/Bangkok');
$status = true;
$state = '';

mysqli_autocommit($conn, FALSE);

    $donateprintcertificateitemid = $_GET['donateprintcertificateitemid'];
    $donateid = $_GET['donateid'];
    $donateprintcertificateitemdatetime = dateNowYMDHM();
    $donateprintcertificateid = $_GET['donateprintcertificateid'];
    $donateprintcertificateother = $_GET['donateprintcertificateother'];
    $donateprintcertificate_user_login =  $_GET['fullname'];


    if(empty($donateprintcertificateitemid))
    {
        $state = 'insert' ;
        $running = getRunningYM('DNCR');
        $donateprintcertificateitemid = $running['runn'];
        $donateprintcertificateitemcode = $running['code'];
        $donateprintcertificate_user_login =  $_GET['fullname'];
        $sql = "
        INSERT INTO donate_print_certificate_item
        (
            donateprintcertificateitemid,
            donateprintcertificateitemcode,
            donateid,
            donateprintcertificateitemdatetime,
            donateprintcertificateid,
            donateprintcertificateother,
            donateprintcertificate_user_login
        )
        VALUE
        (
            '$donateprintcertificateitemid',
            '$donateprintcertificateitemcode',
            '$donateid',
            '$donateprintcertificateitemdatetime',
            '$donateprintcertificateid',
            '$donateprintcertificateother',
            '$donateprintcertificate_user_login'

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
            'state' => $state,
            'chk' => $sql,
            'name'=>$donateprintcertificate_user_login
        )
    );

?>