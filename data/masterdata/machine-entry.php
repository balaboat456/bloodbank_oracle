<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $machineid =  $_POST['emtrymachineid'];
    $machinename =  $_POST['emtrymachinename'];

    $sql = "";

    if(empty($machineid))
    {
        $sql = "
        INSERT INTO machine
        (
            machinename
        )
        VALUES
        (
            '$machinename'
        )
        ";
    }else
    {
        $sql = "
        UPDATE machine SET
        machinename = '$machinename'
        WHERE machineid = '$machineid'
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