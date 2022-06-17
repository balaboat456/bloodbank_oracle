<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');
include('data/running.php');


$status = true;
$duplicate = false;
mysqli_autocommit($conn, FALSE);

$bloodstocktypeagitem = $_POST['bloodstocktypeagitem'];
$bloodstocktypeagid = $_POST['bloodstocktypeagid'];


$bloodstocktypeagitemData = json_decode($bloodstocktypeagitem);

foreach ($bloodstocktypeagitemData as $item) {

    $im = json_decode($item);
    $bloodstockid = (!empty($im->bloodstockid))?$im->bloodstockid:''; 


    $sql = "UPDATE bloodstock SET
            istypeag = '1'
            WHERE bloodstockid = '$bloodstockid'
        
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;


        $running = getRunningYM('TYAGI');
        $runn = $running['runn'];
        $code = $running['code'];

        $sql = "INSERT INTO 
        bloodstock_type_ag_item(
                        bloodstocktypeagitemid,
                        bloodstocktypeagitemcode,
                        bloodstocktypeagid,
                        bloodstockid
                    ) 
                    VALUE 
                    (   '$runn',
                        '$code',
                        '$bloodstocktypeagid',
                        '$bloodstockid'
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
        )
    );

?>