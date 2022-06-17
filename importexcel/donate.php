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

// for ($x = 2; $x <= 12; $x++) {

//     $m = "0".$x;
//     $y = substr($m,strlen($m)-2);

    // $inputFileName="file/2559/$y-2559.xls";
    $inputFileName="file/2564/09-2564.xls";
    
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

        $donorid = $resx['รหัสผู้บริจาค'];
        $donorcode = '';
        $donoridcard = trim($resx['หมายเลขบัตรประชาชน'],' ');
        $isidcardpassport = ($resx['หมายเลขบัตรประชาชน'] != "")?"1":"2";
        $donorpassport = '';
        $donorbirthday = '';
        $donorage =  $resx['อายุ'];
        $donoragetext =  $resx['อายุ'];
        $donoroccupation = getDonorOccupation($resx['อาชีพ']);
        $donoroccupationother = '';
        $donortelhome = $resx['hometel'];
        $donormobile = $resx['mobile'];
        $genderid = getGender($resx['เพศ']);
        $prefixid = getPrefix($resx['คำนำหน้า']);
        $fname = $resx['ชื่อ'];
        $lname = $resx['นามสกุล'];
        $donoremail = $resx['email'];

        $blood_group = $resx['หมู่เลือด'];
        $rh = getRh($resx['rh']);
        $lastdate = dmyToymd($resx['วันที่บริจาค']);
        $lasttime = '';
        $donation_type_id_last  = getDonateType($resx['กลุ่มเลือดที่รับบริจาค'],$resx['ประเภทการบริจาค']);

        // Start donor //////////////////////////
        $sql = "SELECT * FROM donor WHERE (donoridcard = '$donoridcard' AND '$donoridcard' != '') OR  donorid = '$donorid'";

        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) > 0) {

            // echo '========UPDATE========<br/>';
            $row = $result->fetch_assoc();
            $donorid = $row['donorid'];

        }else
        {
            $sql = "
            INSERT INTO donor
            (
            donorid,
            isidcardpassport,
            donorcode,
            donoridcard,
            donorpassport,
            donorbirthday,
            donorage,
            donoragetext,
            donoroccupation,
            donoroccupationother,
            donortelhome,
            donormobile,
            genderid,
            prefixid,
            fname,
            lname,
            donoremail,

            blood_group,
            rh,
            lastdate,
            lasttime,
            donation_type_id_last
            )
            values
            (
            '$donorid',
            '$isidcardpassport',
            '$donorcode',
            '$donoridcard',
            '$donorpassport',
            '$donorbirthday',
            '$donorage',
            '$donoragetext',
            '$donoroccupation',
            '$donoroccupationother',
            '$donortelhome',
            '$donormobile',
            '$genderid',
            '$prefixid',
            '$fname',
            '$lname',
            '$donoremail',

            '$blood_group',
            '$rh',
            '$lastdate',
            '$lasttime',
            '$donation_type_id_last'
            )
            ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;


            echo "========INSERT===$status=====<br/>";
            echo $sql.'<br/>';


        }
        
        echo $donorid.' '.$donoridcard.' '.$status.'<br/>';
        error_log($donorid.' '.$donoridcard.' '.$status);
        // end donor

        $donation_type_id = $donation_type_id_last;
        $placeid = getPlaceid($resx['ประเภทสถานที่ที่รับบริจาค']);
        $placetime = getPlaceTime($resx['เวลาการบริจาค']);
        $isunitoffice = "";
        $unitnameid = getUnitMobile($resx['สถานที่รับบริจาค']);
        $departmentid = "";
        $activityid = "";
        $donation_get_type_id = getDonationGetTypeId($resx['ประเภทผู้ให้บริจาค']);
        $hn = "";
        $an = "";
        $patientname = "";
        $diagnosis = "";
        $blood_use_date = "";

        $wardid = $resx['ward'];
        $sql = "SELECT * FROM unit_office WHERE unitofficeid = '$wardid'  ";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $unitofficeid = $row['unitofficeid'];

        $bag_number = substr($resx['เลขถุง'],0,3).".".substr($resx['เลขถุง'],3,2).".".substr($resx['เลขถุง'],5,1).".".substr($resx['เลขถุง'],6);

        $bag_type_id = getBagTypeId($resx['ประเภทถุงเลือด']);

        $expired_date = ExpDate(dmyToymd($resx['วันที่บริจาค']),$donation_type_id);
        $donation_date = dmyToymd($resx['วันที่บริจาค']);

        $last_donation_date = "";
        $donation_time = "";
        $last_donation_time = "";
        $donation_qty = $resx['ครั้งที่บริจาค'];
        $autologous_qty = "";
        $souvenirid = "";
        $souvenirnum = "";
        $souvenirdate = "";
        $staffsouvenirid = "";
        $blood_group = $resx['หมู่เลือด'];
        $rh = getRh($resx['rh']);
        $hemoglobin = $resx['hbhmb'];
        $remarkhemoglobin = "";

        $pre_bp = explode("/",$resx['pre_bp']);
        $prebp1 = $pre_bp[0];
        $prebp2 = $pre_bp[1];
        $remarkprebp = "";

        $post_bp = explode("/",$resx['post_bp']);
        $postbp1 = $post_bp[0];
        $postbp2 = $post_bp[1];
        $remarkpostbp = "";

        $pulse = $resx['pulse'];
        $remarkpulse = "";
        $drug = $resx['drug'];
        $temperature = "";
        $blood_driller_id = "1";
        $weight = $resx['weight'];
        $height = $resx['height'];
        $pulse_status = "";
        $physical_status = "";
        $pain_heart_status = "";
        $donation_status = getDonateStatus($resx['การรับบริจาค']);
        $donatenocauseid = "";
        $donatenocauseremark = "หมายเหตุการงดรับบริจาค";
        $donatenocausedetail = "";
        $bag_staff_id = "1";
        $inspectorid = "1";
        
        $physical_detail = "";
        $donatestatusid = getDonateStatus($resx['การรับบริจาค']);
        $getcard = "";
        $staffcardid = "";
        $getcarddate = "";
        $islab = "";
        $donationproblemsid = "";

        $donatereactionname = $resx['ปฏิกิริยาหลังเจาะเก็บ'];
        $sql = "SELECT * FROM donate_reaction WHERE donatereactionname = '$donatereactionname'  ";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $donatereactionid = $row['donatereactionid'];

        $donateremark = $resx['หมายเหตุ'].$resx['ปฏิกิริยาหลังเจาะเก็บ'].$resx['ปฏิกิริยาหลังเจาะเก็บอื่น'].$resx['ปัญหาการรับบริจาค1'].$resx['ปัญหาการรับบริจาค2'].$resx['ปัญหาการรับบริจาค3'].$resx['ปัญหาการรับบริจาค4'].$resx['ปัญหาการรับบริจาค5'];
        $remarkaccident = "";
        $isdonateremark = "1";
        $isconfirmblooddonation = "1";

        $donatenostatusid = (!empty($resx['งดรับบริจาค']))?"1":"" ;


        $sql = "
            INSERT INTO 
            donate
            (
                donorid,
                donation_type_id,
                placeid,
                placetime,
                isunitoffice,
                unitnameid,
                departmentid,
                activityid,
                donation_get_type_id,
                hn,
                an,
                patientname,
                diagnosis,
                blood_use_date,
                unitofficeid,
                bag_number,
                bag_type_id,
                expired_date,
                donation_date,
                last_donation_date,
                donation_time,
                last_donation_time,
                donation_qty,
                autologous_qty,
                souvenirid,
                souvenirnum,
                souvenirdate,
                staffsouvenirid,
                blood_group,
                rh,
                hemoglobin,
                remarkhemoglobin,
                prebp1,
                prebp2,
                remarkprebp,
                postbp1,
                postbp2,
                remarkpostbp,
                pulse,
                remarkpulse,
                drug,
                temperature,
                blood_driller_id,
                weight,
                height,
                pulse_status,
                physical_status,
                pain_heart_status,
                donation_status,
                donatenocauseid,
                donatenocauseremark,
                donatenocausedetail,
                bag_staff_id,
                inspectorid,
                physical_detail,
                donatestatusid,
                getcard,
                staffcardid,
                getcarddate,
                islab,
                donationproblemsid,
                donatereactionid,
                donateremark,
                remarkaccident,
                isdonateremark,
                isconfirmblooddonation,
                donatenostatusid

                
            )
            VALUES
            (
                '$donorid',
                '$donation_type_id',
                '$placeid',
                '$placetime',
                '$isunitoffice',
                '$unitnameid',
                '$departmentid',
                '$activityid',
                '$donation_get_type_id',
                '$hn',
                '$an',
                '$patientname',
                '$diagnosis',
                '$blood_use_date',
                '$unitofficeid',
                '$bag_number',
                '$bag_type_id',
                '$expired_date',
                '$donation_date',
                '$last_donation_date',
                '$donation_time',
                '$last_donation_time',
                '$donation_qty',
                '$autologous_qty',
                '$souvenirid',
                '$souvenirnum',
                '$souvenirdate',
                '$staffsouvenirid',
                '$blood_group',
                '$rh',
                '$hemoglobin',
                '$remarkhemoglobin',
                '$prebp1',
                '$prebp2',
                '$remarkprebp',
                '$postbp1',
                '$postbp2',
                '$remarkpostbp',
                '$pulse',
                '$remarkpulse',
                '$drug',
                '$temperature',
                '$blood_driller_id',
                '$weight',
                '$height',
                '$pulse_status',
                '$physical_status',
                '$pain_heart_status',
                '$donation_status',
                '$donatenocauseid',
                '$donatenocauseremark',
                '$donatenocausedetail',
                '$bag_staff_id',
                '$inspectorid',
                '$physical_detail',
                '$donatestatusid',
                '$getcard',
                '$staffcardid',
                '$getcarddate',
                '$islab',
                '$donationproblemsid',
                '$donatereactionid',
                '$donateremark',
                '$remarkaccident',
                '$isdonateremark',
                '$isconfirmblooddonation',
                '$donatenostatusid'
            )

            ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            error_log($donation_date);
            // echo $donation_date.'<br/>';
    
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