<?php

include('jasper-connection.php');

 $bloodgroup = $_GET['bloodgroup'];
 $rh = $_GET['rh'];
 $bloodtype = $_GET['bloodtype'];
 $volume = $_GET['volume'];
 $bag_number = $_GET['bag_number'];
 $datestart = $_GET['datestart'];
 $dateexp = $_GET['dateexp'];
 $donorcode = $_GET['donorcode'];
 $pheno = $_GET['pheno'];

 if ($bloodtype == "PRC") {
	$bloodtype_code = "103";
} else if ($bloodtype == "LPRC") {
    $bloodtype_code = "120";
} else if ($bloodtype == "LDPRC") {
    $bloodtype_code = "106";
} else if ($bloodtype == "FFP") {
    $bloodtype_code = "300";
} else if ($bloodtype == "PC") {
    $bloodtype_code = "200";
} else if ($bloodtype == "LPPC") {
    $bloodtype_code = "240";
} else if ($bloodtype == "LPPC_PAS") {
    $bloodtype_code = "240";
} else if ($bloodtype == "SDP") {
    $bloodtype_code = "223";
} else if ($bloodtype == "SDP_PAS") {
    $bloodtype_code = "228";
}else if ($bloodtype == "SDR") {
    $bloodtype_code = "224";
} else if ($bloodtype == "WB") {
    $bloodtype_code = "100";
}

if($rh == "Positive"){
	$test = "+";
	// $bloodgroup.='+';
 }
 else if($rh == "Negative"){
	$test = "-";
	// $bloodgroup.='-';
 }
 else{
	$test = "";
 }

 if($rh == "null"){
	$rh = "";
 }

$controls = array(
	"bloodgroup" => "$bloodgroup",
	"rh" => "$rh",
	"bloodtype" => "$bloodtype",
	"volume" => "$volume",
	"bag_number" => "$bag_number",
	"datestart" => "$datestart",
	"dateexp" => "$dateexp",
	"donorcode" => "$donorcode",
	"pheno" => "$pheno",
	"bloodtype_code" => "$bloodtype_code",
	"test" => "$test",
);

$report = $client->reportService()->runReport($jasper_server_config_path . 'blood_sticker_prc_lprc', 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>