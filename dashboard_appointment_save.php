<?php

include('connection.php');
include('data/running.php');
include('dateNow.php');
$status = true;
$state = '';
mysqli_autocommit($conn, FALSE);




$donoridcard = $_POST['donoridcard'];
$appointmenttype = $_POST['appointmenttype'];
$appointmentdate = $_POST['appointmentdate'];
$appointment_usercreate = $_POST['appointment_usercreate'];
$appointment_createdate = $_POST['appointment_createdate'];
$appointmentremark = $_POST['appointmentremark'];


        $sql = "INSERT INTO appointment
        (
            donoridcard,
            appointmenttype,
            appointmentdate,
            appointment_usercreate,
            appointment_createdate,
            appointmentremark
        )
        VALUES
        (
            '$donoridcard',
            '$appointmenttype',
            '$appointmentdate',
            '$appointment_usercreate',
            '$appointment_createdate',
            '$appointmentremark'
        )
        ";
        
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

    

    

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
