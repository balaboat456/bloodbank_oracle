<?php
session_start();
include('connection.php');
include('data/running.php');
include('dateNow.php');
$status = true;
$state = '';
mysqli_autocommit($conn, FALSE);

$bloodlettingid = $_POST['bloodlettingid'];
$patientid = $_POST['patientid'];
$bloodlettingdatetime = $_POST['bloodlettingdatetime'];
$bloodlettingtime = $_POST['bloodlettingtime'];

$datetime = explode("/",$bloodlettingdatetime);
$bloodlettingdate = $datetime[2].'-'.$datetime[1].'-'.$datetime[0].' '.$bloodlettingtime.':00';

$unitofficeid = $_POST['unitofficeid'];
$doctorid = $_POST['doctorid'];
$diagnosis = $_POST['diagnosis'];
$diagnosisdetail = $_POST['diagnosisdetail'];
$bagtypeid = $_POST['bagtypeid'];
$volume = $_POST['volume'];
$volumeunit = $_POST['volumeunit'];

$lettingproblemid = $_POST['lettingproblemid'];
$lettingproblemother = $_POST['lettingproblemother'];

$user_before = $_POST['user_before'];
$user_before2 = $_POST['user_before2'];

$user_after = $_POST['user_after'];
$user_after2 = $_POST['user_after2'];

$usercreate = $_POST['usercreate'];
$volumeml = $_POST['volume_ml'];
$forward = $_POST['forward'];
$remark = $_POST['remark'];


$usersave = $_SESSION['fullname'];
$bloodlettingdatetimesave = $_POST['bloodlettingdatetimesave'];
$appointment = $_POST['appointment'];
$appoittext = $_POST['appoittext'];
// pulse_before_1
// pulse_after_1
$pressure_before = $_POST['pressure_before'];
$pulse_before = $_POST['pulse_before_1'];
$symptom_before = $_POST['symptom_before'];
$symptom_detail_before = $_POST['symptom_detail_before'];
$pressure_after = $_POST['pressure_after'];
$pulse_after = $_POST['pulse_after_1'];
$symptom_after = $_POST['symptom_after'];
$symptom_detail_after = $_POST['symptom_detail_after'];
$remark2 = $_POST['remark2'];

if(empty($bloodlettingid))
if (empty($bloodlettingid)) {
    $state = 'insert';
    $running = getRunningYM('BLL');
    $bloodlettingid = $running['runn'];
    $bloodlettingcode = $running['code'];

    $condition1 = "";
    $condition2 = "";
    $condition3 = "";
    $condition4 = "";

    if (!empty($pressure_before) || !empty($pulse_before) || !empty($symptom_before)) {
        $condition1 = $condition1 . "user_before,";
        $condition2 = $condition2 . "'$user_before',";
    }

    if (!empty($pressure_after) || !empty($pulse_after) || !empty($symptom_after)) {
        $condition1 = $condition1 . "user_after,";
        $condition2 = $condition2 . "'$user_after',";
    }

    if (!empty($user_before2) || !empty($user_before2)) {
        $condition1 = $condition1 . "user_before2,";
        $condition2 = $condition2 . "'$user_before2',";
    }
    if (!empty($user_before2) || !empty($user_before2)) {
        $condition1 = $condition1 . "user_after2,";
        $condition2 = $condition2 . "'$user_after2',";
    }
    $sql = "
        INSERT INTO blood_letting
        (
            user_before,
            user_after,
            
            bloodlettingid,
            bloodlettingcode,
            patientid,
            bloodlettingdatetime,
            bloodlettingtime,
            unitofficeid,
            doctorid,
            diagnosis,
            diagnosisdetail,
            bagtypeid,
            volume,
            volumeunit,
            usercreate,
            remark,
            
            pressure_before,
            pulse_before,
            symptom_before,
            symptom_detail_before,
            pressure_after,
            pulse_after,
            symptom_after,
            symptom_detail_after,
            remark2,
            lettingproblemid,
            lettingproblemcause,
            volumeml,
            forward,
            usersave,
            bloodlettingdatetimesave,
            appointment,
            appoittext
        )
        VALUE
        (
            '$user_before',
            '$user_after',

            '$bloodlettingid',
            '$bloodlettingcode',
            '$patientid',
            '$bloodlettingdate',
            '$bloodlettingtime',
            '$unitofficeid',
            '$doctorid',
            '$diagnosis',
            '$diagnosisdetail',
            '$bagtypeid',
            '$volume',
            '$volumeunit',
            '$usercreate',
            '$remark',

            '$pressure_before',
            '$pulse_before',
            '$symptom_before',
            '$symptom_detail_before',
            '$pressure_after',
            '$pulse_after',
            '$symptom_after',
            '$symptom_detail_after',
            '$remark2',
            '$lettingproblemid',
            '$lettingproblemother',
            '$volumeml',
            '$forward',
            '$usersave',
            '$bloodlettingdatetimesave',
            '$appointment',
            '$appoittext'
        )
        ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = 0;
} else {
    $condition = "";

    if (!empty($pressure_before) || !empty($pulse_before) || !empty($symptom_before)) {
        $condition = $condition . "user_before = '$usercreate',";
    }

    if (!empty($pressure_after) || !empty($pulse_after) || !empty($symptom_after)) {
        $condition = $condition . "user_after = '$usercreate',";
    }

    if (!empty($user_before2) || !empty($user_before2)) {
        $condition = $condition . "user_before2 = '$user_before2',";
    }
    if (!empty($user_before2) || !empty($user_before2)) {
        $condition = $condition . "user_after2 = '$user_after2',";
    }

    $state = 'update';
    $sql = "UPDATE blood_letting SET
            $condition
            patientid = '$patientid',
            unitofficeid = '$unitofficeid',
            doctorid = '$doctorid',
            diagnosis = '$diagnosis',
            diagnosisdetail = '$diagnosisdetail',
            bagtypeid = '$bagtypeid',
            volume = '$volume',
            volumeunit = '$volumeunit',
            remark = '$remark',

            pressure_before = '$pressure_before',
            pulse_before = '$pulse_before',
            symptom_before = '$symptom_before',
            symptom_detail_before = '$symptom_detail_before',
            pressure_after = '$pressure_after',
            pulse_after = '$pulse_after',
            symptom_after = '$symptom_after',
            symptom_detail_after = '$symptom_detail_after',
            remark2 = '$remark2',

            lettingproblemid = '$lettingproblemid',
            lettingproblemcause = '$lettingproblemother',
            volumeml = '$volumeml',
            forward = '$forward',
            usersave = '$usersave',
            bloodlettingdatetime = '$bloodlettingdate',
            bloodlettingtime = '$bloodlettingtime',
            bloodlettingdatetimesave = '$bloodlettingdatetimesave',
            appointment = '$appointment',
            appoittext = '$appoittext'

            WHERE bloodlettingid = '$bloodlettingid'
        
        ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = 0;
}



if ($status) {
    mysqli_commit($conn);
} else {
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'state' => $state
    )
);
