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

// for ($x = 1; $x <= 12; $x++) {

//     $m = "0".$x;
//     $y = substr($m,strlen($m)-2);

//     $inputFileName="inf/2559/$y-2559.xls";
    $inputFileName="inf/2564/09-2564.xls";
    
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

        $bag_number = substr($resx['หมายเลขถุงโลหิต'],0,3).".".substr($resx['หมายเลขถุงโลหิต'],3,2).".".substr($resx['หมายเลขถุงโลหิต'],5,1).".".substr($resx['หมายเลขถุงโลหิต'],6);

        $donate_date =  $resx['วันที่บริจาค'];
        $rubberbandnumber =  $resx['หมายเลขสาย'];
        
        $bloodstatusid =  getBloodStatus($resx['cmpnntst']);


        $blood_group_raj =  $resx['หมู่เลือด_การตรวจ'];
        $blood_group_cross =  $resx['หมู่เลือด_การตรวจ'];

        $rh_raj =  getRh2($resx['rh']);
        $rh_cross =  getRh2($resx['rh']);

        $bloodrhsceen_cross =  getRh2($resx['antinbc']);

        $tpharpr =  getInf($resx['syphilislv']);
        $tpharpr_grade =  $resx['syphilislv'];

        $hbsag =  getInf($resx['hbsaglv']);
        $hbsag_grade =  $resx['hbsaglv'];

        $hivagab =  getInf($resx['hivlv']);
        $hivagab_grade =  $resx['hivlv'];

        $hcvab =  getInf($resx['hcvablv']);
        $hcvab_grade =  $resx['hcvablv'];

        $hbvdna =  getInf($resx['hbvdnalv']);
        $hbvdna_grade =  $resx['hbvdnalv'];

        $hcvrna =  getInf($resx['hcvrnalv']);
        $hcvrna_grade =  $resx['hcvrnalv'];

        $hivrna =  getInf($resx['hivrnalv']);
        $hivrna_grade =  $resx['hivrnalv'];

        $importstatus =  "1";

        $prc =  $resx['prc'];
        $prcexp =  dmyToymd($resx['prc_exp']);
        $prcremark =  getRemarkID($resx['prc_หมายเหตุ']);
        $prcused =  getBloodUsed($bloodstatusid,$prcremark,$prc);
        $prcinfect =  getBloodInf($bloodstatusid,$prc);
        $prcisremark =  getBloodRemark($bloodstatusid,$prcremark);

        $lprc =  $resx['lprc'];
        $lprcexp =  dmyToymd($resx['lprc_exp']);
        $lprcremark =  getRemarkID($resx['lprc_หมายเหตุ']);
        $lprcused =  getBloodUsed($bloodstatusid,$lprcremark,$lprc);
        $lprcinfect =  getBloodInf($bloodstatusid,$lprc);
        $lprcisremark =  getBloodRemark($bloodstatusid,$lprcremark);

        $ldprc =  $resx['ldprc'];
        $ldprcexp =  dmyToymd($resx['ldprc_exp']);
        $ldprcremark =  getRemarkID($resx['ldprc_หมายเหตุ']);
        $ldprcused =  getBloodUsed($bloodstatusid,$ldprcremark,$ldprc);
        $ldprcinfect =  getBloodInf($bloodstatusid,$ldprc);
        $ldprcisremark =  getBloodRemark($bloodstatusid,$ldprcremark);

        $ffp =  $resx['ffpnat'];
        $ffpexp =  dmyToymd($resx['ffp_exp']);
        $ffpremark =  getRemarkID($resx['ffp_หมายเหตุ']);
        $ffpused =  getBloodUsed($bloodstatusid,$ffpremark,$ffp);
        $ffpinfect =  getBloodInf($bloodstatusid,$ffp);
        $ffpisremark =  getBloodRemark($bloodstatusid,$ffpremark);

        $pc =  $resx['pc'];
        $pcexp =  dmyToymd($resx['pc_exp']);
        $pcremark =  getRemarkID($resx['pc_หมายเหตุ']);
        $pcused =  getBloodUsed($bloodstatusid,$pcremark,$pc);
        $pcinfect =  getBloodInf($bloodstatusid,$pc);
        $pcisremark =  getBloodRemark($bloodstatusid,$pcremark);

        $lppc =  $resx['lppc'];
        $lppcexp =  dmyToymd($resx['lppc_exp']);
        $lppcremark =  getRemarkID($resx['lppc_หมายเหตุ']);
        $lppcused =  getBloodUsed($bloodstatusid,$lppcremark,$lppc);
        $lppcinfect =  getBloodInf($bloodstatusid,$lppc);
        $lppcisremark =  getBloodRemark($bloodstatusid,$lppcremark);

        $wb =  $resx['wb'];
        $wbexp =  dmyToymd($resx['wb_exp']);
        $wbremark =  getRemarkID($resx['wb_หมายเหตุ']);
        $wbused =  getBloodUsed($bloodstatusid,$wbremark,$wb);
        $wbinfect =  getBloodInf($bloodstatusid,$wb);
        $wbisremark =  getBloodRemark($bloodstatusid,$wbremark);

        $sdp =  $resx['sdp'];
        $sdpexp =  dmyToymd($resx['sdp_exp']);
        $sdpremark =  getRemarkID($resx['sdp_หมายเหตุ']);
        $sdpused =  getBloodUsed($bloodstatusid,$sdpremark,$sdp);
        $sdpinfect =  getBloodInf($bloodstatusid,$sdp);
        $sdpisremark =  getBloodRemark($bloodstatusid,$sdpremark);


        // Start donor //////////////////////////
        $sql = "SELECT * FROM donate WHERE bag_number = '$bag_number' AND bag_number != '' ";

        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) > 0) {

            echo "==========$bag_number============<br/>";
        
            $sql = "UPDATE donate SET
                    bloodstatusid = '$bloodstatusid',
                    rubberbandnumber = '$rubberbandnumber',

                    blood_group_raj =  '$blood_group_raj',
                    blood_group_cross =  '$blood_group_cross',

                    rh_raj =  '$rh_raj',
                    rh_cross =  '$rh_cross',

                    bloodrhsceen_cross =  '$bloodrhsceen_cross',

                    tpharpr =  '$tpharpr',
                    tpharpr_grade =  '$tpharpr_grade',

                    hbsag =  '$hbsag',
                    hbsag_grade =  '$hbsag_grade',

                    hivagab =  '$hivagab',
                    hivagab_grade =  '$hivagab_grade',

                    hcvab =  '$hcvab',
                    hcvab_grade =  '$hcvab_grade',

                    hbvdna =  '$hbvdna',
                    hbvdna_grade = '$hbvdna_grade',

                    hcvrna =  '$hcvrna',
                    hcvrna_grade =  '$hcvrna_grade',

                    hivrna =  '$hivrna',
                    hivrna_grade = '$hivrna_grade',

                    importstatus = '$importstatus',

                    prc =  '$prc',
                    prcexp =  '$prcexp',
                    prcremark =  '$prcremark',
                    prcused =  '$prcused',
                    prcinfect =  '$prcinfect',
                    prcisremark =  '$prcisremark',

                    lprc =  '$lprc',
                    lprcexp =  '$lprcexp',
                    lprcremark =  '$lprcremark',
                    lprcused =  '$lprcused',
                    lprcinfect =  '$lprcinfect',
                    lprcisremark =  '$lprcisremark',

                    ldprc =  '$ldprc',
                    ldprcexp =  '$ldprcexp',
                    ldprcremark =  '$ldprcremark',
                    ldprcused =  '$ldprcused',
                    ldprcinfect =  '$ldprcinfect',
                    ldprcisremark =  '$ldprcisremark',

                    ffp =  '$ffp',
                    ffpexp =  '$ffpexp',
                    ffpremark = '$ffpremark',
                    ffpused =  '$ffpused',
                    ffpinfect =  '$ffpinfect',
                    ffpisremark =  '$ffpisremark',

                    pc =  '$pc',
                    pcexp =  '$pcexp',
                    pcremark = '$pcremark',
                    pcused =  '$pcused',
                    pcinfect =  '$pcinfect',
                    pcisremark =  '$pcisremark',

                    lppc =  '$lppc',
                    lppcexp =  '$lppcexp',
                    lppcremark =  '$lppcremark',
                    lppcused =  '$lppcused',
                    lppcinfect =  '$lppcinfect',
                    lppcisremark =  '$lppcisremark',

                    wb =  '$wb',
                    wbexp =  '$wbexp',
                    wbremark = '$wbremark',
                    wbused = '$wbused',
                    wbinfect =  '$wbinfect',
                    wbisremark =  '$wbisremark',

                    sdp =  '$sdp',
                    sdpexp =  '$sdpexp',
                    sdpremark =  '$sdpremark',
                    sdpused = '$sdpused',
                    sdpinfect = '$sdpinfect',
                    sdpisremark = '$sdpisremark'
                WHERE bag_number = '$bag_number' AND bag_number != ''
           
            ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;
            
        }

        error_log($donate_date." ".$bag_number);
        
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