<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
include('data/running.php');
date_default_timezone_set('Asia/Bangkok');
session_start();


$requestbloodid = $_POST['requestbloodid'];

$sql = "UPDATE request_blood_crossmacth SET requestbloodcrossmacthck = '' WHERE requestbloodid = '$requestbloodid'";
$result = mysqli_query($conn, $sql);

  

    echo json_encode(
        array(
            'status' => $status,
            'id' => $requestbloodid
        )
    );

?>