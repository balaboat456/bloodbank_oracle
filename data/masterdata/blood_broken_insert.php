<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

$bloodbrokenid =  $_POST['bloodbrokenid'];
$bloodbrokenname =  $_POST['bloodbrokenname'];
    $sql = "";

    if(empty($bloodbrokenid))
    {
        $sql = "
        INSERT INTO blood_broken
        (
            bloodbrokenname,
            sort
        )
        VALUES
        (
            '$bloodbrokenname',
            '20'
        )
        ";
    }else
    {
        $sql = "
        UPDATE blood_broken SET
        bloodbrokenname = '$bloodbrokenname'
        WHERE bloodbrokenid = '$bloodbrokenid'
        ";
    }
  
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
