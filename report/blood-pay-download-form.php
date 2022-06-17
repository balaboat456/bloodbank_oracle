<?php
session_start();

include('../data/dateFormat.php');
include('../dateNow.php');
date_default_timezone_set('Asia/Bangkok');

include('../include/conn.php');

$host = $servername_config;
$username = $username_config;
$pass = $password_config;
$db_name = $dbname_config;


$conn = mysqli_connect($host,$username,$pass,$db_name);

mysqli_set_charset($conn,"utf8");

$id = $_POST['id'];
$url = $_POST['url'];

$status = true;
mysqli_autocommit($conn, FALSE);

$running = getRunningYM('HPM',$conn);
$runn = $running['runn'];
$code = $running['code'];
$filename = $running['code'].'.pdf';

$vdate = dmyToymd(dateNowDMY());
$vtime = date("H:i");
$vdatetime = $vdate.' '.$vtime ;
$username = $_SESSION['username'];

$path = $base_url_config.'/uploads/pdf_pay_form/'.$filename;

file_put_contents('/var/www/html/rajvithi/uploads/pdf_pay_form/'.$filename, fopen($url, 'r'));


$sql = "INSERT INTO request_blood_history_pay_print
            (
                requestbloodhistorypayid,
                requestbloodhistorypaycode,
                requestbloodhistorypaydate,
                requestbloodhistorypaypath,
                requestbloodhistorypayuser,
				grouppayid
            )
            VALUE
            (
                '$runn',
                '$code',
                '$vdatetime',
                '$path',
                '$username',
				'$id'
            )";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;


	error_log($sql);

if ($status) {
	mysqli_commit($conn);
	echo $status;
} else {
	mysqli_rollback($conn);
	echo $status;
}


function getRunningYM($modul = "",$conn) 
{ 
	date_default_timezone_set('Asia/Bangkok');
	
	$date = date("ym",strtotime("now"));
	$runn = 1;
	$key = '';
	$code = '';
	$running = '';

	$sql = "SELECT RN.*,IT.RUNLAST,IT.RUNNING
					FROM RUNNING RN
					LEFT JOIN RUNITEM IT ON RN.RUNID = IT.RUNID
					WHERE RN.MODULE = '$modul'
					AND IT.DATECODE = '$date'";
	
	$runnlast = mysqli_query($conn, $sql);
	if(mysqli_num_rows($runnlast) > 0)
	{

		$datarunning = mysqli_fetch_assoc($runnlast);

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
			mysqli_query($conn, $sql);
		}else
		{
			$runid = $datarunning['RUNID'];

			$runid = $datarunning['RUNID'];
			$sql = "INSERT INTO RUNITEM(RUNID,RUNNING,DATECODE,RUNLAST) VALUE ('$runid','$runn','$date','$runn')";
			mysqli_query($conn, $sql);
		}
		

	}else
	{
		
		$sql = "SELECT * FROM RUNNING WHERE MODULE = '$modul'";
		$runnlast = mysqli_query($conn, $sql);

		if(mysqli_num_rows($runnlast) > 0)
		{
			$datarunning = mysqli_fetch_assoc($runnlast);
			
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
			mysqli_query($conn, $sql);

		}
	}
	return array(
		'runn' =>  $running,
		'code' =>  $code
	);

}



?>