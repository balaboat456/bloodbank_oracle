<?php

include('connection.php');
include('data/running.php');
include('dateNow.php');
$status = true;
$state = '';
date_default_timezone_set('Asia/Bangkok');
// mysqli_autocommit($conn, FALSE);

$whereid = $_GET['whereid'];

$string = '';
foreach (explode(",", $whereid) as $letter) {
    $sql = "UPDATE donate SET
            getneedle = '2'
            WHERE donateid = '$letter'
        ";
    $string = $string.' '. $letter;
    $result = mysqli_query($conn, $sql);
}



echo json_encode(
    array(
        'status' => $sql,
        'state' => $string,
        'data' => $whereid,
        'result' => $result,
    )
);

