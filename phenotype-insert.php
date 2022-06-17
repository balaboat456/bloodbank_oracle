<?php

include('connection.php');
include('data/running.php');
include('dateNow.php');
date_default_timezone_set('Asia/Bangkok');
$status = true;
$state = '';
mysqli_autocommit($conn, FALSE);

    $phenotypecode = $_GET['phenotypecode'];


        $sql = "INSERT INTO phenotype
                (
                    phenotypecode
                )
                VALUE
                (
                    '$phenotypecode'
                )
        ";
        
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

    

    

    if ($status) {
        mysqli_commit($conn);
    }else
    {
        mysqli_rollback($conn);
    }

    echo json_encode(
        array(
            'status' => $status
        )
    );

?>