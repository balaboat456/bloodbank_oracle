<?php

include('connection.php');
include('data/running.php');
include('dateNow.php');
$status = true;
$state = '';
mysqli_autocommit($conn, FALSE);

$datenow = $_POST['datenow'];
$timenow = $_POST['timenow'];

$yy = substr($datenow,-4, 4);
$mm = substr($datenow, 3, 2);
$dd = substr($datenow, 0, 2);
$serumteardatetime = $yy.'-'.$mm.'-'.$dd.' '.$timenow.':00';
// $serumteardatetime = $datenow . ' ' . $timenow;
// $datedate = strtotime($serumteardatetime);



    $serumtearid = $_POST['serumtearid'];
    $patientid = $_POST['patientid'];

    $unitofficeid = $_POST['unitofficeid'];
    $doctorid = $_POST['doctorid'];
    $diagnosis = $_POST['diagnosis'];
    $diagnosisdetail = $_POST['diagnosisdetail'];
    $serumtearvolumeid = $_POST['serumtearvolumeid'];
    $clotted = $_POST['clotted'];
    $qty = $_POST['qty'];
$usercreate = $_POST['usercreate'];
    $staffid = $_POST['staffid'];
    $hemolysis = $_POST['hemolysis'];
    $remark = $_POST['remark'];
$report = $_POST['report'];
$appointment = $_POST['appointment'];
$appoittext = $_POST['appoittext'];
///เพิ่ม db ////
$anhn = (!empty($_POST['anhn']))?$_POST['anhn']:0; 
$slide = (!empty($_POST['slide']))?$_POST['slide']:0; 
$catheter = (!empty($_POST['catheter']))?$_POST['catheter']:0; 
$sticker = (!empty($_POST['sticker']))?$_POST['sticker']:0; 
$temp = (!empty($_POST['temp']))?$_POST['temp']:0; 
$fivecc = (!empty($_POST['fivecc']))?$_POST['fivecc']:0; 
$othertube = (!empty($_POST['othertube']))?$_POST['othertube']:0; 
$abnormal = (!empty($_POST['abnormal']))?$_POST['abnormal']:0; 

    if(empty($serumtearid))
    {
        $state = 'insert' ;
        $running = getRunningYM('STR');
        $serumtearid = $running['runn'];
        $serumtearcode = $running['code'];
        $sql = "INSERT INTO serum_tear
        (
            serumtearid,
            serumtearcode,
            patientid,
            serumteardatetime,
            unitofficeid,
            doctorid,
            diagnosis,
            diagnosisdetail,
            serumtearvolumeid,
            clotted,
            qty,
            staffid,
            usercreate,
            hemolysis,
            remark,
            report,
            appointment,
            appoittext,
            anhn,
            slide,
            catheter,
            sticker,
            temp,
            fivecc,
            othertube,
            abnormal
        )
        VALUES
        (
            '$serumtearid',
            '$serumtearcode',
            '$patientid',
            '$serumteardatetime',
            '$unitofficeid',
            '$doctorid',
            '$diagnosis',
            '$diagnosisdetail',
            '$serumtearvolumeid',
            '$clotted',
            '$qty',
            '$staffid',
            '$usercreate',
            '$hemolysis',
            '$remark',
            '$report',
            '$appointment',
            '$appoittext',
            '$anhn',
            '$slide',
            '$catheter',
            '$sticker',
            '$temp',
            '$fivecc',
            '$othertube',
            '$abnormal'
        )
        ";
        
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

    }else
    {
        $state = 'update' ;
        $sql = "UPDATE serum_tear SET
            patientid = '$patientid',
            serumteardatetime = '$serumteardatetime',
            unitofficeid = '$unitofficeid',
            doctorid = '$doctorid',
            diagnosis = '$diagnosis',
            diagnosisdetail = '$diagnosisdetail',
            serumtearvolumeid = '$serumtearvolumeid',
            clotted = '$clotted',
            qty = '$qty',
            staffid = '$staffid',
            hemolysis = '$hemolysis',
            remark = '$remark',
            report = '$report',
            appointment = '$appointment',
            appoittext = '$appoittext',
            anhn = '$anhn',
            slide = '$slide',
            catheter = '$catheter',
            sticker = '$sticker',
            temp = '$temp',
            fivecc = '$fivecc',
            othertube = '$othertube',
            abnormal = '$abnormal'
            WHERE serumtearid = '$serumtearid'
        
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
            'status' => $serumteardatetime,
            'state' => $state,
            'sql' => $sql
        )
    );

?>