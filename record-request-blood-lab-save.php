<?php

include('connection.php');
include('dateNow.php');
include('data/dateFormat.php');
date_default_timezone_set('Asia/Bangkok');


$status = true;
mysqli_autocommit($conn, FALSE);

$record_request_blood_lab = json_decode($_POST['record_request_blood_lab'],true);
$commentbyorder = $_POST['commentbyorder'];

foreach($record_request_blood_lab as $obj) {

        $value = json_decode($obj,true);


        $labcheckrequestid = $value["labcheckrequestid"] ;
        $checkresultbloodstatusid = $value["checkresultbloodstatusid"] ;
        $labcheckrequest_v = $value["labcheckrequest_v"] ;
        $labcheckrequest_a = $value["labcheckrequest_a"] ;
        

        if($checkresultbloodstatusid == "15" || $checkresultbloodstatusid == "19")
        {
            $sql = "UPDATE lab_check_request 
                            SET checkresultbloodstatusid='$checkresultbloodstatusid',
                                labcheckrequest_v='$labcheckrequest_v',
                                labcheckrequest_a='$labcheckrequest_a',
                                commentbyorder='$commentbyorder'
                            WHERE labcheckrequestid = '$labcheckrequestid'";
                    $result = mysqli_query($conn, $sql);
                    if(empty($result))
                    $status = false;


        }



    }


    $record_request_blood_lab_item = json_decode($_POST['record_request_blood_lab_item'],true);
    foreach($record_request_blood_lab_item as $obj)
    {
        
        $value = json_decode($obj,true);

        $labcheckrequestitemid = $value["labcheckrequestitemid"] ;
        $labcheckresult = $value["labcheckresult"] ;
        $labchecknormal = $value["labchecknormal"] ;
        $labcheckvalue = $value["labcheckvalue"] ;
        $labcheckunit = $value["labcheckunit"] ;
        $labcheckcommentanalyze = $value["labcheckcommentanalyze"] ;

        $sql = "UPDATE lab_check_request_item 
                SET labcheckresult='$labcheckresult',
                    labchecknormal='$labchecknormal',
                    labcheckvalue='$labcheckvalue',
                    labcheckunit='$labcheckunit',
                    labcheckcommentanalyze='$labcheckcommentanalyze'
                WHERE labcheckrequestitemid = '$labcheckrequestitemid'";

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