<?php

include('connection.php');
include('data/running.php');
include('dateNow.php');
$status = true;
$state = '';
date_default_timezone_set('Asia/Bangkok');
mysqli_autocommit($conn, FALSE);

$bloodwashedredcellid = $_POST['bloodwashedredcellid'];

// $blood_wash_use_date = format_YMD($_POST['blood_wash_use_date']);

$unitofficeid = $_POST['unitofficeid'];

$ckwash = $_POST['ckwash'];


$diagnosis = $_POST['diagnosis'];
$diagnosisdetail = $_POST['diagnosisdetail'];


$user_order = $_POST['user_order'];
$cc = $_POST['cc'];
$val_after = $_POST['val_after'];

$patientid = $_POST['patientid'];

$qty = $_POST['qty'];

$nss = $_POST['nss'];

$nss_lot1 = $_POST['nss_lot1'];
$nss_exp1 = $_POST['nss_exp1'];

$nss_lot2 = $_POST['nss_lot2'];
$nss_exp2 = $_POST['nss_exp2'];

$nss_lot3 = $_POST['nss_lot3'];
$nss_exp3 = $_POST['nss_exp3'];

$nss_lot4 = $_POST['nss_lot4'];
$nss_exp4 = $_POST['nss_exp4'];

$nss_lot5 = $_POST['nss_lot5'];
$nss_exp5 = $_POST['nss_exp5'];

$nss_lot6 = $_POST['nss_lot6'];
$nss_exp6 = $_POST['nss_exp6'];

$hb_before = $_POST['hb_before'];
$hct_before = $_POST['hct_before'];
$plt_before = $_POST['plt_before'];
$rbc_before = $_POST['rbc_before'];
$mcv_before = $_POST['mcv_before'];
$wbc_before = $_POST['wbc_before'];

$hb_after = $_POST['hb_after'];
$hct_after = $_POST['hct_after'];
$plt_after = $_POST['plt_after'];
$rbc_after = $_POST['rbc_after'];
$mcv_after = $_POST['mcv_after'];
$wbc_after = $_POST['wbc_after'];


$remark = $_POST['remark'];
$remarkreturn = $_POST['remarkreturn'];


$wash_cancel = $_POST['wash_cancel'];

$appointment = $_POST['appointment'];
$appoittext = $_POST['appoittext'];

/// table
$rhname3 = $_POST['rhname'];
$unitofficename = $_POST['unitofficename'];
$doctorname = $_POST['doctorname'];

//// ติ๊กพนักงาน
$usercreate = $_POST['usercreate'];
// $bloodwashedredcelldatetime = $_POST['bloodwashedredcelldatetime'];
$bloodwashedredcelldatetime = dateNowYMDHM();


$user_send_wash = $_POST['user_send_wash'];
$user_send_wash_date = $_POST['user_send_wash_date'];


$user_done_wash = $_POST['user_done_wash'];
$user_done_wash_date = $_POST['user_done_wash_date'];

$user_receive_wash = $_POST['user_receive_wash'];
$user_receive_wash_date = $_POST['user_receive_wash_date'];

$user_send_washed = $_POST['user_send_washed'];
$user_send_washed_date = $_POST['user_send_washed_date'];

$user_get_bag_washed = $_POST['user_get_bag_washed'];
$user_get_bag_washed_date = $_POST['user_get_bag_washed_date'];


$state = 'update';
$sql = "UPDATE blood_washed_red_cell SET
            patientid = '$patientid',
            unitofficeid = '$unitofficeid',
            diagnosis = '$diagnosis',
            diagnosisdetail = '$diagnosisdetail',
            user_order = '$user_order',
            cc = '$cc',
            val_after = '$val_after',
            qty = '$qty',
            nss = '$nss',
            
            nss_lot1 = '$nss_lot1',
            nss_exp1 = '$nss_exp1',

            nss_lot2 = '$nss_lot2',
            nss_exp2 = '$nss_exp2',

            nss_lot3 = '$nss_lot3',
            nss_exp3 = '$nss_exp3',

            nss_lot4 = '$nss_lot4',
            nss_exp4 = '$nss_exp4',

            nss_lot5 = '$nss_lot5',
            nss_exp5 = '$nss_exp5',

            nss_lot6 = '$nss_lot6',
            nss_exp6 = '$nss_exp6',

            hb_before = '$hb_before',
            hct_before = '$hct_before',
            plt_before = '$plt_before',
            rbc_before = '$rbc_before',
            mcv_before = '$mcv_before',
            wbc_before = '$wbc_before',
            hb_after = '$hb_after',
            hct_after = '$hct_after',
            plt_after = '$plt_after',
            rbc_after = '$rbc_after',
            mcv_after = '$mcv_after',
            wbc_after = '$wbc_after',
            remark = '$remark',
            remarkreturn = '$remarkreturn',
            bloodwashedredcelldate = '$datenow',
            bloodwashedredcelltime = '$timenow',
            wash_cancel = '$wash_cancel',
            appointment = '$appointment',
            appoittext = '$appoittext',
            ckwash = '$ckwash'
            WHERE bloodwashedredcellid = '$bloodwashedredcellid'
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

    error_log($sql);


if ($usercreate != '') {
    $sql = "UPDATE blood_washed_red_cell SET
                usercreate = '$usercreate',
                bloodwashedredcelldatetime = '$bloodwashedredcelldatetime'
                WHERE bloodwashedredcellid = '$bloodwashedredcellid'
            ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
    $status = 0;
}

if ($user_done_wash != '' ) {
    $sql = "UPDATE blood_washed_red_cell SET
                user_done_wash = '$user_done_wash',
                user_done_wash_date = '$bloodwashedredcelldatetime'
                WHERE bloodwashedredcellid = '$bloodwashedredcellid'
                AND IFNULL(user_done_wash_date,'') = ''
            ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
    $status = 0;
} 

if ($user_send_wash != '' ) {
    $sql = "UPDATE blood_washed_red_cell SET
                    user_send_wash = '$user_send_wash',
                    user_send_wash_date = '$bloodwashedredcelldatetime'
                    WHERE bloodwashedredcellid = '$bloodwashedredcellid'
                    AND IFNULL(user_send_wash_date,'') = ''
                ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
    $status = 0;

    error_log($sql);
}

if ($user_receive_wash != '') {
    $sql = "UPDATE blood_washed_red_cell SET
                        user_receive_wash = '$user_receive_wash',
                        user_receive_wash_date = '$bloodwashedredcelldatetime'
                        WHERE bloodwashedredcellid = '$bloodwashedredcellid'
                        AND IFNULL(user_receive_wash_date,'') = ''
                    ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
    $status = 0;
}

if ($user_send_washed != '') {
    $sql = "UPDATE blood_washed_red_cell SET
                            user_send_washed = '$user_send_washed',
                            user_send_washed_date = '$bloodwashedredcelldatetime'
                            WHERE bloodwashedredcellid = '$bloodwashedredcellid'
                            AND IFNULL(user_send_washed_date,'') = ''
                        ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
    $status = 0;
}

if ($user_get_bag_washed != '') {
    $sql = "UPDATE blood_washed_red_cell SET
                                user_get_bag_washed = '$user_get_bag_washed',
                                user_get_bag_washed_date = '$bloodwashedredcelldatetime'
                                WHERE bloodwashedredcellid = '$bloodwashedredcellid'
                                AND IFNULL(user_get_bag_washed_date,'') = ''
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
        'state' => $state,
        'bloodwashedredcellid' => $bloodwashedredcellid,
        'bloodwashedredcellcode' => $bloodwashedredcellcode,
        'patientid' => $patientid,
        'bloodwashedredcelldatetime' => $bloodwashedredcelldatetime,
        'unitofficeid' => $unitofficeid,
        'diagnosis' => $diagnosis,
        'diagnosisdetail' => $diagnosisdetail,
        'usercreate' => $usercreate,
        'user_order' => $user_order,
        'cc' => $cc,
        'val_after' => $val_after,
        'qty' => $qty,
        'nss' => $nss,
        'nss_value' => $nss_value,
        'nss_lot' => $nss_lot,
        'nss_exp' => $nss_exp,
        'hb_before' => $hb_before,
        'hct_before' => $hct_before,
        'plt_before' => $plt_before,
        'rbc_before' => $rbc_before,
        'mcv_before' => $mcv_before,
        'wbc_before' => $wbc_before,
        'hb_after' => $hb_after,
        'hct_after' => $hct_after,
        'plt_after' => $plt_after,
        'rbc_after' => $rbc_after,
        'mcv_after' => $mcv_after,
        'wbc_after' => $wbc_after,
        'remark' => $remark,
        'remarkreturn' => $remarkreturn,
        'bloodwashedredcelldate' => $bloodwashedredcelldate,
        'bloodwashedredcelltime' => $bloodwashedredcelltime,
        'wash_cancel' => $wash_cancel,
        'appointment' => $appointment,
        'appoittext' => $appoittext,
        'rhname3' => $rhname3,
        'unitofficename' => $unitofficename,
        'doctorname' => $doctorname,
        'user_send_wash' => $user_send_wash

    )
);

function format_YMD($date)
{
    $date_use = explode("/", $date);

    if ($date_use[1] < 10) {
        $date_use[1] = '0' . $date_use[1];
    }
    if ($date_use[0] < 10) {
        $date_use[0] = '0' . $date_use[0];
    }

    return $date_use[2] . '-' . $date_use[1] . '-' . $date_use[0];
}
