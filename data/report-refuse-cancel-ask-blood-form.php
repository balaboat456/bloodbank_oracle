<?php
include('../connection.php');
include('dateFormat.php');

$condition = '';
$condition_refuse = '';
$condition_cancel = '';
$condition_status = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$fromtime = $_GET['fromtime'];
$totime = $_GET['totime'];

$fromdatetime = $fromdate.' '.$fromtime;
$todatetime = $todate.' '.$totime;

$requestunit = $_GET['requestunit'];
$requeststatus = $_GET['requeststatus'];

$in_time = $_GET['in_time'];
$out_time = $_GET['out_time'];



if (!empty($requestunit) && $requestunit != 'null')
    $condition = $condition." AND RB.requestunit =  '$requestunit'  ";

// if (!empty($requeststatus) && $requeststatus != 'null')
//     $condition_status = "AND RB.requestbloodstatusid IN ($requeststatus)";

// if(!empty($in_time) && empty($out_time))
// {
//     $condition = $condition." AND DAYOFWEEK(RB.requestqueueblooddate) IN (1,4,5,6,7) AND RB.requestqueuebloodtime BETWEEN '08:00' AND '16:00'  ";
// }else if(!empty($out_time) && empty($in_time))
// {
//     $condition = $condition. " AND (DAYOFWEEK(RB.requestqueueblooddate) IN (1,4,5,6,7) AND (RB.requestqueuebloodtime < '08:00' OR RB.requestqueuebloodtime > '16:00' ) OR (DAYOFWEEK(RB.requestqueueblooddate) IN (2,3)))  ";
// }

if(!empty($fromtime) && !empty($todate))
{
    $condition = $condition." AND (CONCAT(RB.requestqueueblooddate,' ',RB.requestqueuebloodtime) BETWEEN '$fromdatetime' AND '$todatetime')  ";
}else
{
    $condition = $condition." AND (RB.requestqueueblooddate BETWEEN '$fromdate' AND '$todate')  ";
}



$sql = "SELECT RB.* ,
ST.requestbloodstatusname,
UT.unitofficename,
RI.bloodstocktypeid,
P.patientfullname,
RC.requestbloodcancelname,
RCI.requestbloodcancelitemid,
RCI.requestbloodid,
RCI.requestbloodcancelid,
GROUP_CONCAT(RC.requestbloodcancelname separator ' , ' ),
CONCAT(GROUP_CONCAT(RC.requestbloodcancelname separator ' , ' ),' , ',RB.requestbloodcancelother) AS cancelname,
RI.requestblooditemqty, 
group_concat(CONCAT(RI.bloodstocktypeid,'(',RI.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
RC.requestbloodcancelname,
RB.requestbloodcancelother
FROM request_blood RB
    LEFT JOIN  request_blood_status ST ON RB.requestbloodstatusid = ST.requestbloodstatusid
    LEFT JOIN  unit_office UT ON RB.requestunit = UT.unitofficeid 
    LEFT JOIN  request_blood_item RI ON RB.requestbloodid = RI.requestbloodid
    LEFT JOIN  patient P ON RB.hn = P.patienthn
    LEFT JOIN  request_blood_cancel_item RCI ON RB.requestbloodid =  RCI.requestbloodid
    LEFT JOIN  request_blood_cancel RC ON RCI.requestbloodcancelid = RC.requestbloodcancelid
    WHERE  true
    $condition 
    AND RB.requestbloodstatusid IN ($requeststatus)

    AND	CASE WHEN $in_time = 1 THEN  
		REPLACE(requestqueuebloodtime,':','.') BETWEEN 8 AND 16 
		AND DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Mon','Tue','Wed','Thu','Fri') 
	ELSE true END
	AND	CASE WHEN $out_time = 1 THEN  
		REPLACE(requestqueuebloodtime,':','.') < 8
		AND DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Mon','Tue','Wed','Thu','Fri') 
		OR REPLACE(requestqueuebloodtime,':','.') > 16
		AND DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Mon','Tue','Wed','Thu','Fri') 
		OR DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Sun','Sat') 
	ELSE true END
    GROUP BY RB.requestbloodid 
    ";



    $sql_sum = "SELECT *,COUNT(*) AS qty_text FROM (SELECT RB.* ,
    ST.requestbloodstatusname,
    UT.unitofficename,
    RI.bloodstocktypeid,
    P.patientfullname,
    RC.requestbloodcancelname,
    RCI.requestbloodcancelitemid,
    GROUP_CONCAT(RC.requestbloodcancelname separator ' , ' ),
    CONCAT(GROUP_CONCAT(RC.requestbloodcancelname separator ' , ' ),' , ',RB.requestbloodcancelother) AS cancelname,
    RI.requestblooditemqty, 
    group_concat(CONCAT(RI.bloodstocktypeid,'(',RI.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
    IFNULL(RC.requestbloodcancelname,'อื่นๆ') AS requestbloodcancelname_text,
    RB.requestbloodcancelother AS requestbloodcancelother_text
    FROM request_blood RB
        LEFT JOIN  request_blood_status ST ON RB.requestbloodstatusid = ST.requestbloodstatusid
        LEFT JOIN  unit_office UT ON RB.requestunit = UT.unitofficeid 
        LEFT JOIN  request_blood_item RI ON RB.requestbloodid = RI.requestbloodid
        LEFT JOIN  patient P ON RB.hn = P.patienthn
        LEFT JOIN  request_blood_cancel_item RCI ON RB.requestbloodid =  RCI.requestbloodid
        LEFT JOIN  request_blood_cancel RC ON RCI.requestbloodcancelid = RC.requestbloodcancelid
        WHERE  true
        $condition 
        AND RB.requestbloodstatusid IN ($requeststatus)
    
        AND	CASE WHEN $in_time = 1 THEN  
            REPLACE(requestqueuebloodtime,':','.') BETWEEN 8 AND 16 
            AND DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Mon','Tue','Wed','Thu','Fri') 
        ELSE true END
        AND	CASE WHEN $out_time = 1 THEN  
            REPLACE(requestqueuebloodtime,':','.') < 8
            AND DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Mon','Tue','Wed','Thu','Fri') 
            OR REPLACE(requestqueuebloodtime,':','.') > 16
            AND DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Mon','Tue','Wed','Thu','Fri') 
            OR DATE_FORMAT(DATE_ADD(requestqueueblooddate, INTERVAL 4 DAY),'%a') IN ('Sun','Sat') 
        ELSE true END
        GROUP BY RB.requestbloodid) M
            GROUP BY requestbloodcancelname_text
            ORDER BY FIND_IN_SET(requestbloodcancelname_text,'อื่นๆ') ASC";





$query = mysqli_query($conn, $sql);
$query_sum = mysqli_query($conn, $sql_sum);

error_log($sql);

$resultArray = array();
while ($result = mysqli_fetch_array($query)) {
    array_push($resultArray, $result);
}

$resultArraySum = array();
while ($result_sum = mysqli_fetch_array($query_sum)) {
    array_push($resultArraySum, $result_sum);
}



echo json_encode(
    array(
        'status' => true,
        'data' => $resultArray,
        'total' => count($resultArray),
        'data_sum' => $resultArraySum,
        'sql' => $sql

    )

);

mysqli_close($conn);
