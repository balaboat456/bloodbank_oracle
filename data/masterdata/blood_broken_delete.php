<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $id =  $_POST['id'];

    $sql = "UPDATE blood_broken SET active = 1 WHERE bloodbrokenid = '$id' ";

    error_log($sql);
  
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
    

    // end การบริจาค
