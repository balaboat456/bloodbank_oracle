<?php
    include('connection.php');
	date_default_timezone_set('Asia/Bangkok');
	include('data/dateFormat.php');
	include('data/running.php');
	include('dateNow.php');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

	$running = getRunningYM('LSP');
	$donateprintid = $running['runn'];
	$donateprintcode = $running['code'];

	$running2 = getRunning('LSP2');
	$donateprint2id = $running2['runn'];
	$donateprint2code = $running2['code'];

$formtype = $_GET['formtype'];
$datecheck = $_GET['datecheck'];
$bagnumberfrom1 = $_GET['bagnumberfrom1'];
$bagnumberto1 = $_GET['bagnumberto1'];
$rubberbandnumber1 = $_GET['rubberbandnumber1'];
$remarkbandnumber1 = $_GET['remarkbandnumber1'];
//
$bagnumberfrom2 = $_GET['bagnumberfrom2'];
$bagnumberto2 = $_GET['bagnumberto2'];
$rubberbandnumber2 = $_GET['rubberbandnumber2'];
$remarkbandnumber2 = $_GET['remarkbandnumber2'];

$bagnumberfrom3 = $_GET['bagnumberfrom3'];
$bagnumberto3 = $_GET['bagnumberto3'];
$bagnumber_skip3_1 = $_GET['bagnumber_skip3_1'];
$bagnumber_skip3_2 = $_GET['bagnumber_skip3_2'];
$rubberbandnumber3 = $_GET['rubberbandnumber3'];
$remarkbandnumber3 = $_GET['remarkbandnumber3'];

$bagnumberfrom6 = $_GET['bagnumberfrom6'];
$bagnumberto6 = $_GET['bagnumberto6'];
$bagnumber_skip6_1 = $_GET['bagnumber_skip6_1'];
$bagnumber_skip6_2 = $_GET['bagnumber_skip6_2'];
$rubberbandnumber6 = $_GET['rubberbandnumber6'];
$remarkbandnumber6 = $_GET['remarkbandnumber6'];

$bagnumberfrom7 = $_GET['bagnumberfrom7'];
$bagnumberto7 = $_GET['bagnumberto7'];
$bagnumber_skip7_1 = $_GET['bagnumber_skip7_1'];
$bagnumber_skip7_2 = $_GET['bagnumber_skip7_2'];
$rubberbandnumber7 = $_GET['rubberbandnumber7'];
$remarkbandnumber7 = $_GET['remarkbandnumber7'];

$bagnumberfrom4 = $_GET['bagnumberfrom4'];
$donateformremarktypeid4 = $_GET['donateformremarktypeid4'];

$isttis1 = $_GET['isttis1'];
$isttis2 = $_GET['isttis2'];
$isonly = $_GET['isonly'];
$isothers = $_GET['isothers'];
$textothers = $_GET['textothers'];
$isclottedblood = $_GET['isclottedblood'];

$iscpdaacdblood = $_GET['iscpdaacdblood'];
$isedtablood = $_GET['isedtablood'];
$isexpress = $_GET['isexpress'];

$bagnumberfrom5 = $_GET['bagnumberfrom5'];
$donateformremarktypeid5 = $_GET['donateformremarktypeid5'];
$donorname5 = $_GET['donorname5'];
$donoridcard5 = $_GET['donoridcard5'];
$donorpassport5 = $_GET['donorpassport5'];
$donorcode5 = $_GET['donorcode5'];

$usercreate = $_SESSION['username'];
$datereport = dateNowTMD();

//////////////////////// ต่อ string ไปแสดงใน report

$group_obj = $_GET['group_obj'];
$obj =  explode("|", $group_obj);

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
	if (!empty($value)) {
		$obj_v =  explode(";", $value);
		array_push($arrayNew, $obj_v[4]);
	}
}

sort($arrayNew);
$arrayNewObj = array();
foreach ($arrayNew as $v) {

	foreach ($obj as $value) {
		$obj_v =  explode(";", $value);

		if ($v == $obj_v[4]) {
			array_push($arrayNewObj, $value);
		}
	}
}

foreach ($arrayNewObj as $value) {

	$obj_v =  explode(";", $value);

	for ($x = 0; $x < $countSkip - 1; $x++) {

		$number_num = $number_num . '<br/>';
		$number_obj = $number_obj . '<br/>';
		$number_obj_remark = $number_obj_remark . '<br/>';
		$number_obj_rubberbandnumber = $number_obj_rubberbandnumber . '<br/>';
		$number_obj_qty = $number_obj_qty . '<br/>';
	}

	$number_num = $number_num . strval($numRow) . '<br/>';
	$number_obj = $number_obj . $obj_v[0] . '<br/>';
	$number_obj_remark = $number_obj_remark . $obj_v[2] . '<br/>';
	$number_obj_rubberbandnumber = $number_obj_rubberbandnumber . $obj_v[5] . '<br/>';

	$totalRubberbandnumber += (!empty($obj_v[5])) ? intval($obj_v[5]) : 0;

	$obj_j =  explode(",", $obj_v[1]);


	$qty = intval($obj_v[3]) - (($obj_j[0] != "") ? count($obj_j) : 0);
	$total = $total + $qty;
	$number_obj_qty = $number_obj_qty . $qty . '<br/>';

	if (count($obj_j) > 0) {
		foreach ($obj_j as $v) {
			$number_obj_skip = $number_obj_skip . $v . '<br/>';
		}
	} else {
		$number_obj_skip = $v . '<br/>';
	}

	$countSkip = count($obj_j);
	$numRow++;
}

$sql = "INSERT INTO donor_form_emtry 
        (
        formtype,
		datecheck,
		bagnumberfrom1,
		bagnumberto1,
		rubberbandnumber1,
		remarkbandnumber1,
		bagnumberfrom2,
		bagnumberto2,
		rubberbandnumber2,
		remarkbandnumber2,
		bagnumberfrom3,
		bagnumberto3,
		bagnumber_skip3_1,
		bagnumber_skip3_2,
		rubberbandnumber3,
		remarkbandnumber3,

		bagnumberfrom6,
		bagnumberto6,
		bagnumber_skip6_1,
		bagnumber_skip6_2,
		rubberbandnumber6,
		remarkbandnumber6,

		bagnumberfrom7,
		bagnumberto7,
		bagnumber_skip7_1,
		bagnumber_skip7_2,
		rubberbandnumber7,
		remarkbandnumber7,

		bagnumberfrom4,
		donateformremarktypeid4,

		isttis1,
		isttis2,
		isonly,
		isothers,
		textothers,
		isclottedblood,

		iscpdaacdblood,
		isedtablood,
		isexpress,

		bagnumberfrom5,
		donateformremarktypeid5,
		donorname5,
		donoridcard5,
		donorpassport5,
		donorcode5,
		datereport,
		usercreate,

		number_num,
		number_obj,
		number_obj_skip,
		number_obj_remark,
		number_obj_rubberbandnumber,
		number_obj_qty,
		total,
		totalRubberbandnumber
        )
        VALUES
        (
        '$formtype',
		'$datecheck',
		'$bagnumberfrom1',
		'$bagnumberto1',
		'$rubberbandnumber1',
		'$remarkbandnumber1',
		'$bagnumberfrom2',
		'$bagnumberto2',
		'$rubberbandnumber2',
		'$remarkbandnumber2',

		'$bagnumberfrom3',
		'$bagnumberto3',
		'$bagnumber_skip3_1',
		'$bagnumber_skip3_2',
		'$rubberbandnumber3',
		'$remarkbandnumber3',

		'$bagnumberfrom6',
		'$bagnumberto6',
		'$bagnumber_skip6_1',
		'$bagnumber_skip6_2',
		'$rubberbandnumber6',
		'$remarkbandnumber6',

		'$bagnumberfrom7',
		'$bagnumberto7',
		'$bagnumber_skip7_1',
		'$bagnumber_skip7_2',
		'$rubberbandnumber7',
		'$remarkbandnumber7',

		'$bagnumberfrom4',
		'$donateformremarktypeid4',

		'$isttis1',
		'$isttis2',
		'$isonly',
		'$isothers',
		'$textothers',
		'$isclottedblood',

		'$iscpdaacdblood',
		'$isedtablood',
		'$isexpress',

		'$bagnumberfrom5',
		'$donateformremarktypeid5',
		'$donorname5',
		'$donoridcard5',
		'$donorpassport5',
		'$donorcode5',
		'$datereport',
		'$usercreate',

		'$number_num',
		'$number_obj',
		'$number_obj_skip',
		'$number_obj_remark',
		'$number_obj_rubberbandnumber',
		'$number_obj_qty',
		'$total',
		'$totalRubberbandnumber'
        )";
$result = mysqli_query($conn, $sql);


if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
		'status' => $status,
		'data' => "$usercreate",
		'data2' => "$datereport",
		'runn' => "$donateprintcode",
		'runn2' => "$donateprint2code"
    )
);



?>