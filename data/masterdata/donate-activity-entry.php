<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $activityid =  $_POST['emtryactivityid'];
    $activityname =  $_POST['emtryactivityname'];

    $sql = "";

    if(empty($activityid))
    {
        $sql = "
        INSERT INTO donate_activity
        (
            activityname
        )
        VALUES
        (
            '$activityname'
        )
        ";
    }else
    {
        $sql = "
        UPDATE donate_activity SET
        activityname = '$activityname'
        WHERE id = '$activityid'
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