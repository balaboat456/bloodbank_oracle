<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
//File สำหรับ Import

 
/** PHPExcel */
require_once 'PHPExcel/Classes/PHPExcel.php';
 
/** PHPExcel_IOFactory - Reader */
include 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$servername = '192.168.7.13';
$username = 'root';
$password = 'P@ssw0rd1168';
$dbname = 'bloodbank';
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// echo json_encode($conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_autocommit($conn, FALSE);
$status = true;

    $inputFileName="Phone_Anti/Phone-BB.xlsx";
    
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
    $objReader->setReadDataOnly(true);  
    $objPHPExcel = $objReader->load($inputFileName);  
    
    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
    $highestRow = $objWorksheet->getHighestRow();
    $highestColumn = $objWorksheet->getHighestColumn();
    
    $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
    $headingsArray = $headingsArray[1];
    
    $r = -1;
    $namedDataArray = array();
    for ($row = 2; $row <= $highestRow; ++$row) {
        $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
        if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
            ++$r;
            foreach($headingsArray as $columnKey => $columnHeading) {
                $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
            }
        }
    }
    
    foreach ($namedDataArray as $resx) {

        $bag_number = substr($resx['Bag_number'],0,3).".".substr($resx['Bag_number'],3,2).".".substr($resx['Bag_number'],5,1).".".substr($resx['Bag_number'],6);

        $phone1 =  $resx['phone1'];
        $phone2 =  $resx['phone2'];


        // Start donor //////////////////////////
        $sql = "SELECT * FROM donate WHERE bag_number = '$bag_number'";

        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) > 0) {

            echo "==========$bag_number============<br/>";

            $row = $result->fetch_assoc();
            $donorid = $row['donorid'];
        
            $sql = "UPDATE donate SET donatephenotype='$phone1',donatephenotypeshow='$phone2' WHERE bag_number = '$bag_number'";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            $sql = "UPDATE donor SET phenotype='$phone1',phenotypeshow='$phone2' WHERE donorid = '$donorid'";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;
            
        }

        error_log($bag_number." ".$status);
        
        // error_log($donorid.' '.$donoridcard.' '.$status);
        // // end donor

       
    }

// }

if ($status) {
    mysqli_commit($conn);
    echo 'successful';
}else
{
    mysqli_rollback($conn);
    echo 'error';
}

function getBloodStatus($v)
{
    $result = "";

    if($v == "พร้อมจ่าย")
    {
        $result = "3";
    }else if($v == "ไม่พร้อมจ่าย")
    {
        $result = "6";
    }else if($v == "Infect or Immuno")
    {
        $result = "4";
    }else
    {
        $result = "2";
    }

    return $result;
}

function getInf($v)
{
    $result = "";

    if($v == "0" || $v == "" || $v == "-")
    {
        $result = "-";
    }else
    {
        $result = "+";
    }

    return $result;
}

function getBloodUsed($v,$rem,$val)
{
    $result = "";

    if($v == "3" && empty($rem) && !empty($val))
    {
        $result = "1";
    }

    return $result;
}

function getBloodInf($v,$val)
{
    $result = "";

    if($v == "4" && !empty($val) )
    {
        $result = "1";
    }

    return $result;
}

function getBloodRemark($v,$rem)
{
    $result = "";

    if(!empty($rem) && $v != "4")
    {
        $result = "1";
    }

    return $result;
}

function getPlaceid($v)
{
    $result = "";

    if($v == "รพ.ราชวิถี")
    {
        $result = "1";
    }else if($v == "หน่วยเคลื่อนที่")
    {
        $result = "2";
    }else if($v == "กิจกรรม")
    {
        $result = "3";
    }

    return $result;
}

function getPlaceTime($v)
{
    $result = "";

    if(strpos($v,"ในเวลา") >= 0)
    {
        $result = "1";
    }else if(strpos($v,"นอกเวลา") >= 0)
    {
        $result = "2";
    }

    return $result;
}

function getUnitMobile($v)
{
    $result = "";

    if($v == "กรมควบคุมโรค")
    {
        $result = "46";
    }else if($v == "บริษัท ไลอ้อน (ประเทศไทย) จำกัด")
    {
        $result = "47";
    }else if($v == "ตำรวจตระเวนชายแดน")
    {
        $result = "48";
    }

    return $result;
}

function getRemarkID($v)
{
    $result = "";

    if($v == "แดง,ขุ่น,เขียว,ทิ้ง")
    {
        $result = "13";
    }else if($v == "น้ำหนักไม่ได้ตามเกณฑ์มาตรฐาน")
    {
        $result = "14";
    }else if($v == "DAT Positive")
    {
        $result = "22";
    }else if($v == "No Swirling")
    {
        $result = "11";
    }else if($v == "Short Bag")
    {
        $result = "15";
    }else if($v == "Risk")
    {
        $result = "21";
    }

    

    return $result;
}

function getBagTypeId($v)
{
    $result = "";

    if($v == "CPD-A1 Double 450")
    {
        $result = "1";
    }else if($v == "Quadruple - 450")
    {
        $result = "2";
    }else if($v == "CPD-A1 Double 350")
    {
        $result = "3";
    }else if($v == "CPD-A1 Single 450")
    {
        $result = "4";
    }else if($v == "CPD-A1 Single 350")
    {
        $result = "5";
    }else if($v == "Triple 450")
    {
        $result = "6";
    }else if($v == "Quadruple - 450 + Filter")
    {
        $result = "7";
    }else if($v == "Single Donor Platelet (SDP)")
    {
        $result = "8";
    }else if($v == "Single Donor Red cells (SDR)")
    {
        $result = "9";
    }

    return $result;
}

function getDonateStatus($v)
{
    $result = "";
    if($v == "ปกติ")
    {
        $result = "1";
    }else
    {
        $result = "2";
    }

    return $result;
}

function ExpDate($date,$type)
{
    $result = $date;
    if($type == 1)
    {
        $newdate = date_create("$date");
        $result =  $newdate->modify('+90 day')->format('Y-m-d');
    }else if($type == 2)
    {
        $newdate = date_create("$date");
        $result =  $newdate->modify('+15 day')->format('Y-m-d');
    }
    return $result;
}

function getDonationGetTypeId($v)
{
    $result = "";

    if($v == "Volumteer")
    {
        $result = "1";
    }else if($v == "Replacement")
    {
        $result = "2";
    }else if($v == "Autologous")
    {
        $result = "3";
    }else if($v == "Direct")
    {
        $result = "4";
    }

    return $result;
}



function getRh($v)
{
    $result = "";

    if($v == "Positive")
    {
        $result = "Rh+";
    }else if($v == "")
    {
        $result = "";
    }else
    {
        $result = "Rh-";
    }

    return $result;
}

function getRh2($v)
{
    $result = "";

    if($v == "+")
    {
        $result = "Rh+";
    }else if($v == "-")
    {
        $result = "Rh-";
    }

    return $result;
}

function getDonorOccupation($v)
{
    $result = "";

    if($v == "นักเรียน,นักศึกษา")
    {
        $result = "1";
    }else if($v == "ข้าราชการ,ทหาร,ตำรวจ" || $v == 'พนักงานรัฐวิสาหกิจ')
    {
        $result = "2";
    }else if($v == "พนักงานบริษัท" || $v == 'รับจ้าง')
    {
        $result = "3";
    }else if($v == "พระภิกษุ,แม่ชี,สามเณร")
    {
        $result = "4";
    }else if($v == "เกษตรกร")
    {
        $result = "5";
    }else if($v == "ค้าขาย" || $v == "")
    {
        $result = "6";
    }else if($v == "ว่างงาน")
    {
        $result = "7";
    }else
    {
        $result = "99";
    }
    return $result;
}

function getPrefix($v)
{
    $result = "";

    if($v == "นาย")
    {
        $result = "1";
    }else if($v == "นาง")
    {
        $result = "2";
    }else if($v == "น.ส.")
    {
        $result = "3";
    }else if($v == "Mr.")
    {
        $result = "4";
    }else if($v == "Mrs.")
    {
        $result = "5";
    }else if($v == "Miss.")
    {
        $result = "6";
    }else
    {
        $result = "";
    }

    return $result;
}

function getGender($v)
{
    $result = "";

    if($v == "ชาย")
    {
        $result = "1";
    }else if($v == "หญิง")
    {
        $result = "2";
    }else
    {
        $result = "";
    }

    return $result;
}

function getDonateType($v1,$v2)
{
    $result = "";

    if($v1 == "โลหิตเฉพาะส่วน")
    {
        if($v2 == "SDP")
        {
            $result = "2";
        }else
        {
            $result = "";
        }
        
    }else
    {
        $result = "1";
    }

    return $result;
}

function dmyToymd($date='')
{
    if(empty($date))
    return '';

    $date = str_replace("/",",",$date);
    $date = str_replace(" ",",",$date);
    $array = explode(',',$date);

    if(empty(empty($array[0]) || $array[1]) || empty($array[2]))
    return '0000-00-00';
  
    $result = (intval($array[2])+543)."-".$array[1]."-".$array[0]." ".$array[3];

    return $result;
}

?>