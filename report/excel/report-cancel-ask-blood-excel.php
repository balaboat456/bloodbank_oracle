<?php

require('../../include/database-config.php');
include('connection2.php');
include 'Classes/PHPExcel.php';
include 'excelcreate.php';


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="รายชื่อสรุปการปฎิเสธ-ยกเลิกสิ่งส่งตรวจ การขอจองเลือด.xlsx"');
header('Cache-Control: max-age=0');

$condition = '';
$condition_refuse = '';
$condition_cancel = '';
$condition_status = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$requestunit = $_GET['requestunit'];
$requeststatus = $_GET['requeststatus'];



if (!empty($requestunit) && $requestunit != 'null')
    $condition = " AND RB.requestunit =  '$requestunit'  ";

if (!empty($requeststatus) && $requeststatus != 'null')
    $condition_status = "AND RB.requestbloodstatusid IN ($requeststatus)";





$sql = "SELECT RB.* ,ST.requestbloodstatusname,UT.unitofficename,RI.bloodstocktypeid,P.patientfullname,RC.requestbloodcancelname,RCI.requestbloodcancelitemid,
RCI.requestbloodid,RCI.requestbloodcancelid
,GROUP_CONCAT(RC.requestbloodcancelname separator ' , ' )
,CONCAT(GROUP_CONCAT(RC.requestbloodcancelname separator ' , ' ),' , ',RB.requestbloodcancelother) as cancelname,RI.requestblooditemqty
, group_concat(CONCAT(RI.bloodstocktypeid,'(',RI.requestblooditemqty,')') separator ',') bloodstocktypenamegroup,
CONCAT(DATE_FORMAT(RB.requestblooddate,'%d-%m-%Y'),' ',RB.requestqueuebloodtime)as blooddate,
CONCAT(DATE_FORMAT(RB.requestqueueblooddate,'%d-%m-%Y'),' ',RB.requestqueuebloodtime)as queueblooddate
FROM request_blood RB
     LEFT JOIN  request_blood_status ST ON RB.requestbloodstatusid = ST.requestbloodstatusid
     LEFT JOIN  unit_office UT ON RB.requestunit = UT.unitofficeid 
     LEFT JOIN  request_blood_item RI ON RB.requestbloodid = RI.requestbloodid
     LEFT JOIN  patient P ON RB.hn = P.patienthn
		 LEFT JOIN  request_blood_cancel_item RCI ON RB.requestbloodid =  RCI.requestbloodid
		 LEFT JOIN  request_blood_cancel RC ON RCI.requestbloodcancelid = RC.requestbloodcancelid
         WHERE  ((RB.requestblooddate BETWEEN '$fromdate' AND '$todate'))
    $condition 
    $condition_status
    GROUP BY RB.requestbloodid 
    ";

$query = mysqli_query($conn, $sql);

$resultArray = array();
while ($result = mysqli_fetch_array($query)) {
    array_push($resultArray, $result);
}


$array = array(
    array('title' => "วันที่/เวลาขอจองเลือด", "field" => "blooddate"),
    array('title' => "วันที่/เวลายกเลิก", "field" => "queueblooddate"),
    array('title' => "HN", "field" => "hn"),
    array('title' => "ชื่อผู้ป่วย", "field" => "patientfullname"),
    array('title' => "หน่วยงานที่แจ้งขอเลือด", "field" => "unitofficename"),
    array('title' => "ชนิดเลือดที่แจ้งขอ", "field" => "bloodstocktypenamegroup"),
    array('title' => "สาเหตุยกเลิกการจองเลือด", "field" => "cancelname"),
    // array('title' => "วันเกิด","field" => "donorbirthday"),
);

$objPHPExcel = createExcel($array, $resultArray);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
