<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');
include('data/running.php');


$status = true;
$duplicate = false;
mysqli_autocommit($conn, FALSE);

$bloodstocktypeagname = $_POST['bloodstocktypeagname'];
$bloodstocktypeagphon = $_POST['bloodstocktypeagphon'];


$sql = "SELECT * FROM bloodstock_type_ag WHERE bloodstocktypeagname = BINARY '$bloodstocktypeagname' AND active <> 0";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $status = false;
    $duplicate = true;
}else
{
    $running = getRunningYM('TYAG');
    $runn = $running['runn'];
    $code = $running['code'];

    $sql = "INSERT INTO 
        bloodstock_type_ag(
                    bloodstocktypeagid,
                    bloodstocktypeagcode,
                    bloodstocktypeagname,
                    bloodstocktypeagphon
                ) 
                VALUE 
                (   '$runn',
                    '$code',
                    '$bloodstocktypeagname',
                    '$bloodstocktypeagphon'
                ) ";

    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = false;
}



if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

    echo json_encode(
        array(
            'status' => $status,
            'duplicate' => $duplicate
        )
    );

?>