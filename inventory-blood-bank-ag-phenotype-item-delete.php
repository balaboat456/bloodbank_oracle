<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');
include('data/running.php');


$status = true;
mysqli_autocommit($conn, FALSE);

    $bloodstocktypeagitemid = $_POST['id'];

    $sql = "UPDATE bloodstock SET istypeag = 0 WHERE bloodstockid in (SELECT 	bloodstockid FROM bloodstock_type_ag_item WHERE active <> 0 AND bloodstocktypeagitemid = '$bloodstocktypeagitemid')";
    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = false;

    $sql = "UPDATE bloodstock_type_ag_item SET active = 0 WHERE active  <> 0 AND bloodstocktypeagitemid = '$bloodstocktypeagitemid' ";
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

?>