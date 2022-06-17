<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $donoridcard = $_POST['donoridcard'];
    $donatelogtext = $_POST['donatelogtext'];

    $username = $_SESSION['username'];
    $dateNowValue = dateNowYMDHM() ;

    $sql = "
                INSERT INTO donate_log
                (
                    donoridcard,
                    donatelogdatetime,
                    donatelogtext,
                    usercreate
                )
                values
                (
                    '$donoridcard',
                    '$dateNowValue',
                    '$donatelogtext',
                    '$username'
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
            'status' => $status,
        )
    );
    


?>