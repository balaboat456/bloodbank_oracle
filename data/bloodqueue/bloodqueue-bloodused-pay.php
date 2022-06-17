<?php
    include('../../connection.php');

    $condition = '';
    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    $payuser =$_GET['payuser'];

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
    

    

    
    

    // if(!empty($fromdate) && !empty($todate))
    // $condition = $condition." AND CM.payblooddate BETWEEN '$fromdate' AND '$todate' ";

    // if(!empty($hn))
    // $condition= $condition" AND RB.hn =  '$hn' ";

    if(!empty($requestunit) && $requestunit!='null')
    {
        $condition = $condition." AND RB.requestunit =  '$requestunit'  ";
        $condition = $condition." AND RB.requestunit =  '$requestunit'  ";
    }
    

    if(!empty($payuser) && $payuser!='null')
    $condition = $condition." AND SF.id  =  '$payuser'  ";


    $sql = "SELECT M1.*,
                group_concat(CONCAT(IM.bloodstocktypeid,'(',IM.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
                group_concat(CONCAT(IM.bloodstocktypeid,':',IM.requestblooditemqty) separator ';') bloodstocktypenamegroup_obj
            FROM (SELECT 
                        RB.*,
                        CM.grouppayid,
                        CM.payblooddate,
                        CM.paybloodtime,
                        CM.readyblooddate,
                        CM.readybloodtime,
                        PT.patientfullname,
                        RH2.rhname3 AS confirmrhname3,
                        CM.bloodtype,
                        UN1.unitofficename AS unitofficename1,
                        CONCAT(IFNULL(SF.fullname,'')) AS payuser_fullname,
                        COUNT(*) AS count_pay
                        
                                        
            FROM request_blood_crossmacth CM
            LEFT JOIN users SF ON CONCAT(CONVERT(CM.payuser USING utf8)) = CONCAT(CONVERT(SF.username USING utf8))
            LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN rh RH2 ON RB.confirmrhid = RH2.rhid
            LEFT JOIN unit_office UN1 ON RB.requestunit = UN1.unitofficeid
            WHERE  true $condition

            GROUP BY CM.grouppayid,CM.bloodtype

            ORDER BY CM.grouppayid,CM.bloodtype DESC) M1
            LEFT JOIN request_blood_item IM ON M1.requestbloodid = IM.requestbloodid
            GROUP BY M1.grouppayid,M1.bloodtype
            ORDER BY M1.grouppayid,M1.bloodtype DESC";

 
    $query = mysqli_query($conn,$sql);

    error_log($sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
        $requestbloodid = $result['requestbloodid'];
        $bloodtype = $result['bloodtype'];
        $payblooddatetime = $result['payblooddate'].' '.$result['paybloodtime'];

        $sql = "SELECT
                    count(*) AS countblood
                FROM
                    request_blood_crossmacth 
                WHERE
                    requestbloodid = '$requestbloodid' 
                    AND bloodtype = '$bloodtype'
                    GROUP BY requestbloodid";
        $queryItem = mysqli_query($conn,$sql);  
        $resultQueryItem = mysqli_fetch_array($queryItem);
        $result['count_make'] = $resultQueryItem['countblood'];

        $sql = "SELECT
                    count(*) AS countbloodpay
                FROM
                    request_blood_crossmacth 
                WHERE
                    requestbloodid = '$requestbloodid' 
                    AND bloodtype = '$bloodtype'
                    AND ispayblood = 1
                    AND CONCAT(payblooddate,' ',paybloodtime)  <= '$payblooddatetime'
        GROUP BY requestbloodid";


        $queryItemPay = mysqli_query($conn,$sql);  
        $resultQueryItemPay = mysqli_fetch_array($queryItemPay);
        $result['count_b'] = $resultQueryItemPay['countbloodpay'];


		array_push($resultArray,$result);
    }
    

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray),
        )
        
    );

    mysqli_close($conn);
?>