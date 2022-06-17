<?php

include('connection2.php');
include 'Classes/PHPExcel.php';
include 'excelcreate.php';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="blood-donation-tracking-letter-excel.xlsx"');
header('Cache-Control: max-age=0');




$sql = "SELECT * FROM users";

$query = mysqli_query($conn, $sql);

$resultArray = array();
while ($result = mysqli_fetch_array($query)) {
    array_push($resultArray, $result);
}


$array = array(
    array('title' => "ลำดับที่", "field" => ""),
    array('title' => "ชื่อ-นามสกุล", "field" => ""),
    array('title' => "เลขประจำตัวประชาชน", "field" => ""),
    array('title' => "เลขประจำตัวผู้มาบริจาค", "field" => ""),
    array('title' => "ครั้งที่", "field" => ""),
    array('title' => "วันที่บริจาค", "field" => ""),
    array('title' => "สถานที่", "field" => ""),
    array('title' => "รหัสไปรษณีย์", "field" => ""),
    array('title' => "เบอร์โทร", "field" => ""),
);

$objPHPExcel = createExcel($array, $resultArray);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
