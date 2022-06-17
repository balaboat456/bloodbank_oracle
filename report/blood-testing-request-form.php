<?php
include('../connection.php');
include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
$bagnumberfrom1 = $_GET['bagnumberfrom1'];
$bagnumberto1 = $_GET['bagnumberto1'];
$bagnumberfrom2 = $_GET['bagnumberfrom2'];
$bagnumberto2 = $_GET['bagnumberto2'];
$textothers = $_GET['textothers'];
$isttis1 = $_GET['isttis1'];
$isttis2 = $_GET['isttis2'];
$isonly = $_GET['isonly'];
$isothers = $_GET['isothers'];
$isclottedblood = $_GET['isclottedblood'];
$iscpdaacdblood = $_GET['iscpdaacdblood'];
$isedtablood = $_GET['isedtablood'];
$isexpress1 = $_GET['isexpress1'];
$isexpress2 = $_GET['isexpress2'];

$group_obj = $_GET['group_obj'];

$datecheck = $_GET['datecheck'];		////////////

$fullname = $_SESSION['fullname'];


$obj =  explode("|",$group_obj);

$number_num = "";
$number_obj = "";
$number_obj_skip = "";
$number_obj_remark = "";
$number_obj_rubberbandnumber = "";
$number_obj_qty = "";

$countSkip = 0;
$numRow = 1;
$total = 0;
$totalRubberbandnumber = 0;

$arrayNew = array();
foreach ($obj as $value) {
	if(!empty($value))
	{
		$obj_v =  explode(";",$value);
		array_push($arrayNew,$obj_v[4]);
	}
	
}

sort($arrayNew);
$arrayNewObj = array();
foreach ($arrayNew as $v) {

	foreach ($obj as $value) {
		$obj_v =  explode(";",$value);

		if($v == $obj_v[4])
		{
			array_push($arrayNewObj,$value);
		}	
	}
	
}


foreach ($arrayNewObj as $value) {
	
	$obj_v =  explode(";",$value);

	for ($x = 0; $x < $countSkip-1; $x++) {

		$number_num = $number_num.'<br/>';
		$number_obj = $number_obj.'<br/>';
		$number_obj_remark = $number_obj_remark.'<br/>';
		$number_obj_rubberbandnumber = $number_obj_rubberbandnumber.'<br/>';
		$number_obj_qty = $number_obj_qty.'<br/>';

		
	}
	
	$number_num = $number_num.strval($numRow).'<br/>';
	$number_obj = $number_obj.$obj_v[0].'<br/>';
	$number_obj_remark = $number_obj_remark.$obj_v[2].'<br/>';
	$number_obj_rubberbandnumber = $number_obj_rubberbandnumber.$obj_v[5].'<br/>';

	$totalRubberbandnumber += (!empty($obj_v[5]))?intval($obj_v[5]):0;
	
	$obj_j =  explode(",",$obj_v[1]);


	$qty = intval($obj_v[3]) - (($obj_j[0] != "")?count($obj_j):0);
	$total = $total+$qty;
	$number_obj_qty = $number_obj_qty.(($qty != 0)?$qty:'').'<br/>';

	if(count($obj_j) > 0)
	{
		foreach ($obj_j as $v) {
			$number_obj_skip = $number_obj_skip.$v.'<br/>';
		}
	}else
	{
		$number_obj_skip = $v.'<br/>';
	}

	$countSkip = count($obj_j);
	$numRow++;
	
}

$controls = array(
	"fullbagnumber1" => "$fullbagnumber1",
	"fullbagnumber2" => "$fullbagnumber2",
	"notbagnumber1" => "$notbagnumber1",
	"notbagnumber2" => "$notbagnumber2",
	"textothers" => "$textothers",
	"isttis1" => "$isttis1",
	"isttis2" => "$isttis2",
	"isonly" => "$isonly",
	"isothers" => "$isothers",
	"isclottedblood" => "$isclottedblood",
	"iscpdaacdblood" => "$iscpdaacdblood",
	"isedtablood" => "$isedtablood",
	"isexpress1" => "$isexpress1",
	"isexpress2" => "$isexpress2",
	"qty1" => "$qty1",
	"qty2" => "$qty2",
	"notqty1" => "$notqty1",
	"code" => "$code",
	"code2" => "$code2",
	"number_num" => "$number_num",
	"number_obj" => "$number_obj",
	"number_obj_skip" => "$number_obj_skip",
	"number_obj_remark" => "$number_obj_remark",
	"number_obj_rubberbandnumber" => "$number_obj_rubberbandnumber",
	"number_obj_qty" => "$number_obj_qty",
	"total" => "$total",
	"totalRubberbandnumber" => "$totalRubberbandnumber",
	"datecheck" => "$datecheck",
	"fullname" => "$fullname"
);



$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_testing_request_form3', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 


function numnerPoint($str) {
   
	$str = str_split($str);
    $str2 = '';
    for ($i = 0; $i < count($str) && $i < 11; $i++) {

        if($i==3 || $i==5 || $i==6 )
        {
            $str2 = $str2+".";
        }
		$str2 = $str2 . $str[$i];
		
    }
    
   return $str2;

}

?>