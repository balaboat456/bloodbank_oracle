<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $prefixid =  $_POST['emtryprefixid'];
    $prefixname =  $_POST['emtryprefixname'];
    $genderid =  $_POST['emtrygenderid'];

    $sql = "";

    if(empty($prefixid))
    {
        $sql = "
        INSERT INTO prefix
        (
            prefixname,
            genderid
        )
        VALUES
        (
            '$prefixname',
            '$genderid'
        )
        ";
    }else
    {
        $sql = "
        UPDATE prefix SET
        prefixname = '$prefixname',
        genderid = '$genderid'
        WHERE prefixid = '$prefixid'
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


?>