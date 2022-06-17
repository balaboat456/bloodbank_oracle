<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $hospitalid =  $_POST['hospitalid'];
    $hospitalname =  $_POST['hospitalname'];
$hospitalcode =  $_POST['hospitalcode'];

    $sql = "";

    if(empty($hospitalid))
    {
        $sql = "
        INSERT INTO hospital
        (
            hospitalname,
            hospitalcode
        )
        VALUES
        (
            '$hospitalname',
            '$hospitalcode'

        )
        ";
    }else
    {
        $sql = "
        UPDATE hospital SET
        hospitalname = '$hospitalname',
        hospitalcode = '$hospitalcode'
        WHERE hospitalid = '$hospitalid'
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