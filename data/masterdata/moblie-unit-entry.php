<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $moblieunitid =  $_POST['emtrymoblieunitid'];
    $moblieunitname =  $_POST['emtrymoblieunitname'];

    $sql = "";

    if(empty($moblieunitid))
    {
        $sql = "
        INSERT INTO donat_mobile_unit
        (
            dmu_name
        )
        VALUES
        (
            '$moblieunitname'
        )
        ";
    }else
    {
        $sql = "
        UPDATE donat_mobile_unit SET
        dmu_name = '$moblieunitname'
        WHERE id = '$moblieunitid'
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