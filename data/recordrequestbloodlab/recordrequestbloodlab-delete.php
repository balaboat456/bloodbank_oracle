<?php
    include('../../connection.php');
    include('../../dateNow.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $labcheckrequestcanceldatetime = dateNowTMD()." ".date("H:i");

    $condition = '';
    $labcheckrequestid = $_GET['labcheckrequestid'];
    $usercancel = $_GET['usercancel'];
    $labcheckrequestcancelid = $_GET['labcheckrequestcancelid'];
    $labcheckrequestcancelremark = $_GET['labcheckrequestcancelremark'];

    $sql = "UPDATE lab_check_request 
            SET checkresultbloodstatusid='99',
            labcheckrequestcanceldatetime = '$labcheckrequestcanceldatetime',
            usercancel = '$usercancel',
            labcheckrequestcancelid='$labcheckrequestcancelid' ,
            labcheckrequestcancelremark = '$labcheckrequestcancelremark'
            WHERE labcheckrequestid = '$labcheckrequestid'";
    
    mysqli_query($conn,$sql);

    echo json_encode(
        array(
            'status' => true,
        )
    );

    mysqli_close($conn);


?>