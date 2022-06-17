<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
//File สำหรับ Import

ini_set('memory_limit','-1');
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

$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

mysqli_autocommit($conn, FALSE);
$status = true;

    $inputFileName="request-blood/request_blood2.xlsx";
    
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
    // for ($row = 2; $row <= 10; ++$row) {
    for ($row = 2; $row <= $highestRow; ++$row) {
        $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
        if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
            ++$r;
            foreach($headingsArray as $columnKey => $columnHeading) {
                $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
            }
        }
    }
    



    $requestbloodid = '';
    foreach ($namedDataArray as $resx) {

        $status = 1;

        
        $hn =  $resx['hn'];
        $an =  $resx['an'];

        $hn_new = replaceHN($hn);

        $requestblooddate =  dmyToymd2($resx['วันที่เวลาบันทึกการจอง2']);
        $requestbloodtime =  getTime($resx['เวลาบันทึกการจอง']);

        $requestunit =  $resx['รหัสหน่วยงานที่แจ้งขอเลือด'];
        $usedunit =  $resx['รหัสหน่วยงานที่ใช้เลือด'];

        $bloodnotificationtypeid =  getBloodnotificationtypeid($resx['รหัสประเภทการแจ้งขอเลือด']);

        $usedblooddatefrom =  dmyToymd2($resx['วันที่ต้องการใช้เลือด 1']);
        $usedblooddateto =  dmyToymd2($resx['วันที่ต้องการใช้เลือด 2']);
        $durgicaldate =  dmyToymd2($resx['กำหนดวันผ่าตัด']);
        $nurseid =  '2';//$resx['รหัสพยาบาลผู้รับคำสั่ง'];
        $doctorid =  '2929';//$resx['ชื่อแพทย์ผู้สั่ง'];
        $blood_driller_id =  '1';//$resx['รหัสผู้เจาะเลือด'];

        $diseasegroupid =  getDiseasegroupid($resx['กลุ่มโรค']);
        $diagnosisdetail =  str_replace("'","`",$resx['diagnosis']);
        $bloodsampletube =  getTube($resx['มี Tube/ไม่มี Tube']);
        $bloodgroupid =  $resx['หมู่เลือดที่ขอ'];

        $confirmbloodgroup =  $resx['bdgrpresult'];
        $confirmrhid =  getRh($resx['rhresult']);
        $confirmsceen =  getRh($resx['abscnrst']);
        $dat_poly =  $resx['dat_poly'];
        $dat_igg =  $resx['dat_igg'];
        $dat_c3d =  $resx['dat_c3d'];
        $dat_ccc =  $resx['dat_ccc'];
        $antibody =  $resx['antibody'];
        $phenotype =  $resx['phenotype'];

        $bloodtype =  getBloodType($resx['ชนิดเลือดที่ขอ']);
        $blood_qty =  $resx['จำนวนที่ขอ'];

        $blood_cc =  $resx['จำนวน CC ที่ขอ'];
        $blood_date =  dmyToymd2($resx['กำหนดใช้เกล็ดเลือด']);
        

        $refOld = '';
        $refid = str_replace('-','',$requestblooddate).str_replace(':','',$requestbloodtime).$hn;

        if(empty($usedblooddateto) || $usedblooddateto == '0000-00-00')
        {
            $usedblooddateto = $requestblooddate;
        }

        if(empty($usedblooddatefrom) || $usedblooddatefrom == '0000-00-00')
        {
            $usedblooddatefrom = $usedblooddateto;
        }

        $sql = "SELECT * FROM request_blood WHERE refimportdata = '$refid'";

        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) == 0) {
            if($refOld != $refid)
            {
                $status = 1;
                $running = getRunningYM('RQBM',$con);
                $requestbloodid = $running['runn'];
                $requestbloodcode = $running['code'];
    
                $sql ="INSERT INTO `request_blood` (
                    `requestbloodid`,
                    `requestbloodcode`,
                    `requestblooddate`,
                    `requestbloodtime`,
                    `hn`,
                    `an`,
                    `requestunit`,
                    `usedunit`,
                    `bloodnotificationtypeid`,
                    `durgicaldate`,
                    `usedblooddatefrom`,
                    `usedblooddateto`,
                    `nurseid`,
                    `doctorid`,
                    `blood_driller_id`,
                    `diseasegroupid`,
                    `diagnosisid`,
                    `diagnosis`,
                    `diagnosisdetail`,
                    `bloodsampletube`,
                    `bloodgroupid`,
                    `rhid`,
                    `requestbloodstatusid`,
                    `requestqueueblooddate`,
                    `requestqueuebloodtime`,
                    `requestbloodusersave`,
                    `isbloodblank`,
                    `checkbloodstatusid`,
                    `bloodgroup`,
                    `confirmbloodgroup`,
                    `confirmrhid`,
                    `confirmsceen`,
                    `iscrossmatch`,
                    `isaddblood`,
                    `isreadybloodstatus`,
                    `ispaybloodstatus`,
                    `refimportdata`
                )
                VALUES
                    (
                        '$requestbloodid',
                        '$requestbloodcode',
                        '$requestblooddate',
                        '$requestbloodtime',
                        '$hn_new',
                        '$an',
                        '$requestunit',
                        '$usedunit',
                        '$bloodnotificationtypeid',
                        '$durgicaldate',
                        '$usedblooddatefrom',
                        '$usedblooddateto',
                        '$nurseid',
                        '$doctorid',
                        '$blood_driller_id',
                        '$diseasegroupid',
                        '',
                        '',
                        '$diagnosisdetail',
                        '$bloodsampletube',
                        '$bloodgroupid',
                        '',
                        '2',
                        '$requestblooddate',
                        '$requestbloodtime',
                        '1',
                        '1',
                        '1',
                        '$confirmbloodgroup',
                        '$confirmbloodgroup',
                        '$confirmrhid',
                        '$confirmsceen',
                        '1',
                        '1',
                        '1',
                        '1',
                        '$refid'
                    )";
    
                $refOld = $refid;
    
                $result = mysqli_query($conn, $sql);
              
                if(empty($result))
                $status = 0;

                // echo "=====main====$status========<br/>";

                echo $sql.';<br/>';
                // echo $refid.'<br/>';
                
            }
    
    
            

        }

        $status = 1;
        $sql = "INSERT INTO `request_blood_item`(
                                `bloodstocktypeid`, 
                                `requestblooditemqty`, 
                                `requestblooditemcc`, 
                                `requestblooditemdate`, 
                                `requestbloodid`) 
                                VALUES 
                                ('$bloodtype', 
                                '$blood_qty', 
                                '$blood_cc', 
                                '$blood_date', 
                                '$requestbloodid')";

        $result = mysqli_query($conn, $sql);
                    
        if(empty($result))
        $status = 0;

        echo "=====item====$status========<br/>";
        echo $sql.';<br/>';
        // echo $refid.'<br/>';

        

    
       
    }


if ($status) {
    mysqli_commit($conn);
    echo 'successful';
}else
{
    mysqli_rollback($conn);
    echo 'error';
}

function replaceHN($text)
{
    $newtext =  substr($text, 2, 6) . '-' . substr($text, 0, 2);
    return $newtext;
}

function getBloodnotificationtypeid($v)
{
    $result = "";

    if($v == "10")
    {
        $result = "1";
    }else if($v == "20")
    {
        $result = "2";
    }else if($v == "30")
    {
        $result = "3";
    }else if($v == "40")
    {
        $result = "4";
    }else if($v == "50")
    {
        $result = "5";
    }else if($v == "60")
    {
        $result = "6";
    }

    return $result;
}

function getDiseasegroupid($v)
{
    $result = "";

    if($v == "อายุรกรรม")
    {
        $result = "1";
    }else if($v == "โรคทั่วไป")
    {
        $result = "2";
    }else if($v == "สูติศาสตร์")
    {
        $result = "3";
    }else if($v == "นรีเวชศาสตร์")
    {
        $result = "4";
    }else if($v == "กุมารเวชกรรม")
    {
        $result = "5";
    }else if($v == "โสต ศอ นาสิก")
    {
        $result = "6";
    }else if($v == "จักษุวิทยา")
    {
        $result = "7";
    }else if($v == "ออร์โธปิดิกส์")
    {
        $result = "8";
    }else if($v == "ทันตกรรม")
    {
        $result = "9";
    }else if($v == "รังสีรักษา")
    {
        $result = "10";
    }else if($v == "ศัลยกรรมตกแต่ง")
    {
        $result = "21";
    }else if($v == "ศัลยกรรมประสาท")
    {
        $result = "22";
    }else if($v == "ศัลยกรรมทางเดินปัสสาวะ")
    {
        $result = "23";
    }else if($v == "ศัลยกรรมทวารหนัก")
    {
        $result = "24";
    }else if($v == "ศัลยกรรมทรวงอกและหลอดเลือด")
    {
        $result = "25";
    }else if($v == "ศัลยกรรมช่องท้อง")
    {
        $result = "26";
    }else if($v == "เวชศาสตร์ฟื้นฟู")
    {
        $result = "27";
    }else if($v == "จิตเวช")
    {
        $result = "28";
    }else if($v == "ศัลยกรรมเด็ก")
    {
        $result = "29";
    }else if($v == "ศัลยกรรม หู คอ จมูก")
    {
        $result = "30";
    }else if($v == "ฉุกเฉิน")
    {
        $result = "31";
    }else if($v == "หัวใจ")
    {
        $result = "32";
    }else if($v == "ส่งเสริมสุขภาพ")
    {
        $result = "33";
    }else if($v == "รังสีวิทยา")
    {
        $result = "34";
    }else if($v == "เวชศาสตร์ครอบครัว")
    {
        $result = "35";
    }else if($v == "พยาธิวิทยา")
    {
        $result = "36";
    }else if($v == "ตรวจสุขภาพ")
    {
        $result = "37";
    }else if($v == "อื่นๆ")
    {
        $result = "99";
    }

    return $result;
}

function getTube($v)
{
    $result = "";

    if($v == "มี")
    {
        $result = "1";
    }else if($v == "ไม่มี")
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

function getBloodType($v)
{
    $result = "";

    if($v == "Cryoprecipitate Removed Plasma")
    {
        $result = "CRP";
    }else if($v == "Cryoprecipitate")
    {
        $result = "CRYO";
    }else if($v == "Fresh Frozen Plasma")
    {
        $result = "FFP";
    }else if($v == "Freeze dried Cryoprecipitate")
    {
        $result = "HTFDC";
    }else if($v == "Leukodepleted Packed Red Cells")
    {
        $result = "LDPRC";
    }else if($v == "Pooled Leukocyte Poor Platelet Concentrates")
    {
        $result = "LPPC";
    }else if($v == "Leukocyte-Poor Packed Red Cells")
    {
        $result = "LPRC";
    }else if($v == "Packed Red Cells")
    {
        $result = "PRC";
    }else if($v == "Platelet Concentrate")
    {
        $result = "PC";
    }else if($v == "Single Donor Platelet")
    {
        $result = "SDR";
    }else if($v == "Whole blood")
    {
        $result = "WB";
    }else if($v == "Pediatric Leukodepleted Platelet Concentrate")
    {
        $result = "PLDPC";
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

function dmyToymd2($date='')
{

    error_log("date : ".$date);

    if(empty($date))
    return '';

    $date = str_replace(" 00:00:00","",$date);
    $date = str_replace("/",",",$date);
    $date = str_replace(" ",",",$date);
    $array = explode(',',$date);

    if(empty($array[0]) || empty($array[1]) || empty($array[2]))
    return '0000-00-00';
  
    $result = (intval(substr($array[2],0,4))+543)."-".dmSub($array[1])."-".dmSub($array[0]);

    return $result;
}

function getTime($v)
{
    $timenew = substr('0000000'.$v,-6);
    $result = substr($timenew,0,2).":".substr($timenew,2,2).":".substr($timenew,4,2); 
    return $result;
}

function dmSub($v)
{
    $result = substr('00'.$v,-2);

    return $result;
}


function getRunningYM($modul = "",$con) 
{ 
    date_default_timezone_set('Asia/Bangkok');
   
    $date = '';
    $runn = 1;
    $key = '';
    $code = '';
    $running = '';

    $sql = "SELECT RN.*,IT.RUNLAST,IT.RUNNING
                    FROM RUNNING RN
                    LEFT JOIN RUNITEM IT ON RN.RUNID = IT.RUNID
                    WHERE RN.MODULE = '$modul'
                    AND IT.DATECODE = '$date'";
  
    $runnlast = $con->query($sql);
    if($runnlast->num_rows > 0)
    {

        $datarunning = $runnlast->fetch_assoc();

        if(!empty($datarunning['RUNLAST']))
        {
            $key = $datarunning['RUNKEY'];
            $runn = $runn + $datarunning['RUNLAST'];
            $size =  $datarunning['RUNSIZE'] - strlen($runn);
            $zero = '0';
            $sh = '';
            for($i=1;$i<=$size;$i++)
            {
                $sh = $sh.$zero;
                
            }
            $running = $date.$sh.$runn;
            $code = $key.$date.$sh.$runn;

            $runid = $datarunning['RUNID'];
            
            $sql = "UPDATE RUNITEM SET RUNNING='$runn',RUNLAST='$runn' WHERE RUNID='$runid' AND DATECODE = '$date'";
            // echo $sql;
            $con->query($sql);
        }else
        {
            $runid = $datarunning['RUNID'];

            $runid = $datarunning['RUNID'];
            $sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
            $con->query($sql);
        }
       

    }else
    {
        
        $sql = "SELECT * FROM RUNNING WHERE MODULE = '$modul'";
        $runnlast = $con->query($sql);

        if($runnlast->num_rows > 0)
        {
            $datarunning = $runnlast->fetch_assoc();
           
            $key = $datarunning['RUNKEY'];
            $size =  $datarunning['RUNSIZE'] - strlen($runn);
            $zero = '0';
            $sh = '';
            for($i=1;$i<=$size;$i++)
            {
                $sh = $sh.$zero;
                
            }

            $running = $date.$sh.$runn;
            $code = $key.$date.$sh.$runn;


            $runid = $datarunning['RUNID'];
            $sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
            $con->query($sql);

        }
    }
    return array(
        'runn' =>  $running,
        'code' =>  $code
    );

}


?>