<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    $fromwithdate =$_GET['fromwithdate'];
    $towithdate =$_GET['towithdate'];
    $fromwithtime =$_GET['fromwithtime'];
    $timewithtime =$_GET['timewithtime'];

    $frompaydate =$_GET['frompaydate'];
    $topaydate =$_GET['topaydate'];
    $frompaytime =$_GET['frompaytime'];
    $timepaytime =$_GET['timepaytime'];

    if(!empty($frompaydate) && !empty($topaydate))
    {
        if(!empty($frompaytime) && !empty($timepaytime))
        {
            $frompaydatetime = $frompaydate.' '.$frompaytime;
            $topaydatetime = $topaydate.' '.$timepaytime;
            $condition = $condition." AND CONCAT(CM.payblooddate,' ',CM.paybloodtime) BETWEEN '$frompaydatetime' AND '$topaydatetime' ";
        }else
        {
            $condition = $condition." AND CM.payblooddate BETWEEN '$frompaydate' AND '$topaydate' ";
        }
        
    }else if(!empty($fromwithdate) && !empty($towithdate))
    {
        if(!empty($fromwithtime) && !empty($timewithtime))
        {
            $fromwithdatetime = $fromwithdate.' '.$fromwithtime;
            $towithdatetime = $towithdate.' '.$timewithtime;
            $condition = $condition." AND CONCAT(CM.readyblooddate,' ',CM.readybloodtime) BETWEEN '$fromwithdatetime' AND '$towithdatetime' ";
        }else
        {
            $condition = $condition." AND CM.readyblooddate BETWEEN '$fromwithdate' AND '$towithdate' ";
        }
        
    }else if(!empty($fromdate) && !empty($todate))
    {
        $condition = $condition." AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";
        $condition = $condition." AND RB.requestblooddate BETWEEN '$fromdate' AND '$todate' ";
    }

    if(!empty($requestunit) && $requestunit!='null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

    $sql = "SELECT RB.* ,
                CM.bag_number as cm_bag_number,
                CM.sub as cm_sub,
                CM.bloodtype,
                CM.requestbloodcrossmacthid,
                CS.crossmacthresultname,
                CM.seq,
                CM.bloodrequestunit,
                CM.bloodrequestcc,
                CM.confirmbloodrequestdate,
                CM.confirmbloodrequesttime,
                CM.mostandunstatus,
                CM.beaconid,
                PT.patientfullname,
                RH.rhname3,
                CM.payblooddate,
                CM.paybloodtime,
                UN1.unitofficename AS unitofficename1
            FROM request_blood RB
            LEFT JOIN request_blood_crossmacth CM ON RB.requestbloodid = CM.requestbloodid
            LEFT JOIN crossmacth_result CS ON CM.crossmacthresultid = CS.crossmacthresultid
            LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
            LEFT JOIN rh RH ON RB.rhid = RH.rhid
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            WHERE ifnull(CM.ispayblood,'') = 1
          
            $condition

            ORDER BY CM.grouppayid DESC
             "
    ;

    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }

    $seq = 1;
    $idmain = '';
    $i = 0;
    for ($x = 0; $x < count($resultArray); $x++) {
        if($resultArray[$x]['requestbloodid'] != $idmain)
        {
            $i = $x;
            $seq = 1;
        }else
        {
            $seq = $seq+1;
        }
        $resultArray[$x]['seq'] = $seq;
        $idmain = $resultArray[$x]['requestbloodid'];
    }
    

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>