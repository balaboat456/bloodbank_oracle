<?php
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $date = dmyToymd(dateNowDMY());
    $time = date("H:i");
    $bloodqueuetab4 = json_decode($_POST['bloodqueuetab4']);
    
    $grouprequestbloodid = "";
    foreach ($bloodqueuetab4 as $item) {
       
        $im = json_decode($item);
        
        $requestbloodid = $im[0]->requestbloodid; 
        $mostandunstatus = $im[0]->mostandunstatus; 
        $crossmacthstatusid = $im[0]->crossmacthstatusid; 
        $confirmbloodgroupqueue = $im[0]->confirmbloodgroupqueue; 
        $confirmrhqueue = $im[0]->confirmrhqueue; 
        $userconfirmbloodgroupqueue = $im[0]->userconfirmbloodgroupqueue; 
        $requestbloodcancelid = $im[0]->requestbloodcancelid; 
        $requestbloodcancelother = $im[0]->requestbloodcancelother; 
        $hn = $im[0]->hn; 
        

        $condition = "";
        if( $mostandunstatus != '2' 
            && $mostandunstatus != '3' 
            && $crossmacthstatusid != '6' 
            && $crossmacthstatusid != '7' 
            && $crossmacthstatusid != '9' 
            )
        $condition = "crossmacthstatusid = '2',crossmacthstatus2id = '2', ";

        $ck = $im[0]->ck; 
        if($ck)
        {

            $grouprequestbloodid = $grouprequestbloodid.$requestbloodid.",";

            $sql = "
            UPDATE request_blood SET
            confirmbloodgroupqueue = '$confirmbloodgroupqueue',
            confirmrhqueue = '$confirmrhqueue',
            userconfirmbloodgroupqueue = '$userconfirmbloodgroupqueue',
            confirmbloodgroupqueuedate = '$date',
            confirmbloodgroupqueuetime = '$time',
            isconfirmbloodgroupqueue = '1'
            WHERE requestbloodid = '$requestbloodid'
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;




                $sql = "SELECT CM.* ,SK.bloodexp 
                        FROM request_blood_crossmacth CM
                        LEFT JOIN bloodstock SK ON CM.bloodstockid = SK.bloodstockid 
                        WHERE CM.requestbloodid = '$requestbloodid' 
                        AND CM.crossmacthstatusid IN (1,2,3)
                        ORDER BY SK.bloodexp,CM.bloodtype,CM.bag_number ASC
                        ";
                    
                $query = mysqli_query($conn,$sql);

                while($res = mysqli_fetch_assoc($query)) {

                    $requestbloodcrossmacthid = $res['requestbloodcrossmacthid'];
                    $bloodgroupid = $res['bloodgroupid'];
                    $rhid = $res['rhid'];
                    $crossmacthresultid = $res['crossmacthresultid'];
                    $bloodtype = $res['bloodtype'];
                    

                    if( (($confirmbloodgroupqueue != $bloodgroupid || ($confirmrhqueue != $rhid && $rhid == 'Rh+')) && ($bloodtype != "CRYO")) || $crossmacthresultid == 2 || $crossmacthresultid == 3)
                    {
                        $condition = "crossmacthstatusid = '3',crossmacthstatus2id = '3', ";
                    }else
                    {
                        if( $mostandunstatus != '2' 
                            && $mostandunstatus != '3' 
                            && $crossmacthstatusid != '6' 
                            && $crossmacthstatusid != '7' 
                            && $crossmacthstatusid != '9' 
                            )
                            {
                                $condition = "crossmacthstatusid = '2',crossmacthstatus2id = '2', ";
                            }else if($bloodtype == "CRYO")
                            {
                                $condition = "crossmacthstatusid = '2',crossmacthstatus2id = '2', ";
                            }else
                            {
                                if(intval($crossmacthstatusid) <= 3 )
                                $condition = "crossmacthstatusid = '2',crossmacthstatus2id = '2',";
                            }
                        
                    }
                    

                    $sql = "
                            UPDATE request_blood_crossmacth SET
                            $condition
                            requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                            
                            WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                            AND IFNULL(crossmacthstatusid,'1') IN (1)
                            ";

                            $result = mysqli_query($conn, $sql);
                            if(empty($result))
                            $status = false;

                            error_log($sql);

                }


            


        }
        
            
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
        'gid' => $grouprequestbloodid
    )
);
    

    // end การบริจาค


?>