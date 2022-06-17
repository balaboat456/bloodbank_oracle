<?php
    include('connection.php');
	date_default_timezone_set('Asia/Bangkok');
	include('data/dateFormat.php');
	include('data/running.php');
	include('dateNow.php');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

	$sql = "";

	$donateid = $_POST['donateid'] ;
	$isconfirmblooddonation = $_POST['isconfirmblooddonation'] ;
	$isconfirmdonorblooddonation = $_POST['isconfirmdonorblooddonation'] ;
	$isconfirmdonorsdp = $_POST['isconfirmdonorsdp'] ;
	$confirmblooddonationremark = $_POST['confirmblooddonationremark'] ;
	$confirmblooddonationid = $_POST['confirmblooddonationid'] ;
	$confirmblooddonationdatetime = dateNowYMDHM() ;

$isconfirmblooddonation_user = $_POST['isconfirmblooddonation_user'];
$isconfirmdonorblooddonation_user = $_POST['isconfirmdonorblooddonation_user'];
$isconfirmdonorsdp_user = $_POST['isconfirmdonorsdp_user'];

$isconfirmblooddonation_datetime = $_POST['isconfirmblooddonation_datetime'];
$isconfirmdonorblooddonation_datetime = $_POST['isconfirmdonorblooddonation_datetime'];
$isconfirmdonorsdp_datetime = $_POST['isconfirmdonorsdp_datetime'];

	$sql = "UPDATE donate SET   
					isconfirmblooddonation = '$isconfirmblooddonation',
					isconfirmdonorblooddonation = '$isconfirmdonorblooddonation',
					isconfirmdonorsdp = '$isconfirmdonorsdp',
					confirmblooddonationremark = '$confirmblooddonationremark',
					confirmblooddonationdatetime = '$confirmblooddonationdatetime',
					confirmblooddonationid = '$confirmblooddonationid',
					isconfirmblooddonation_user = '$isconfirmblooddonation_user',
					isconfirmdonorblooddonation_user = '$isconfirmdonorblooddonation_user',
					isconfirmdonorsdp_user = '$isconfirmdonorsdp_user',
					isconfirmblooddonation_datetime = '$isconfirmblooddonation_datetime',
					isconfirmdonorblooddonation_datetime = '$isconfirmdonorblooddonation_datetime',
					isconfirmdonorsdp_datetime = '$isconfirmdonorsdp_datetime'
	WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
	$status = 0;

	$sql = "UPDATE donate_repeatinfection SET active = 0  WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
	$status = 0;
	

	
	$repeatinfectionitem = json_decode($_POST['repeatinfectionitem']);
    foreach ($repeatinfectionitem as $item) {

		$im = json_decode($item) ;

		$repeatinfectionid = $im[0]->repeatinfectionid ;
		$repeatinfectioncode = $im[0]->repeatinfectioncode ;
		
		$donateid = $im[0]->donateid ;
		$repeatinfectiondate1 = (!empty($im[0]->repeatinfectiondate1))?(dmyToymd($im[0]->repeatinfectiondate1)):'0000-00-00' ;  
		$repeatinfectiondate2 = (!empty($im[0]->repeatinfectiondate2))?(dmyToymd($im[0]->repeatinfectiondate2)):'0000-00-00' ;
		$repeatinfectiondate3 = (!empty($im[0]->repeatinfectiondate3))?(dmyToymd($im[0]->repeatinfectiondate3)):'0000-00-00' ;

		$repeatinfectionqty = $im[0]->repeatinfectionqty ;
		$repeatinfectionreason = $im[0]->repeatinfectionreason ;
		$repeatinfectionresult = $im[0]->repeatinfectionresult ;
		$repeatinfectionfile = $im[0]->repeatinfectionfile ;
		$repeatinfectionpath = '' ;
		$repeatinfectioncreatedatetime = dateNowYMDHM() ;
		
		

		if(empty($repeatinfectionid))
		{
			
			$running = getRunningYM('IM');
			$repeatinfectionid = $running['runn'];
			$repeatinfectioncode = $running['code'];

			if(!empty($repeatinfectionfile))
			{
				$repeatinfectionpath = do_upload($repeatinfectionfile,$repeatinfectioncode,"uploads/");
			}else
			{
				$repeatinfectionpath = '';
			}

			$sql = "
			INSERT INTO donate_repeatinfection
			(
				repeatinfectionid,
				repeatinfectioncode,
				donateid,
				repeatinfectiondate1,
				repeatinfectiondate2,
				repeatinfectiondate3,
				repeatinfectionqty,
				repeatinfectionreason,
				repeatinfectionresult,
				repeatinfectionpath,
				repeatinfectioncreatedatetime
			)
			VALUES
			(
				'$repeatinfectionid',
				'$repeatinfectioncode',
				'$donateid',
				'$repeatinfectiondate1',
				'$repeatinfectiondate2',
				'$repeatinfectiondate3',
				'$repeatinfectionqty',
				'$repeatinfectionreason',
				'$repeatinfectionresult',
				'$repeatinfectionpath',
				'$repeatinfectioncreatedatetime'
			)
			";

		}else
		{
			$condition = "";
			if(!empty($repeatinfectionfile))
			{
				$repeatinfectionpath = do_upload($repeatinfectionfile,$repeatinfectioncode,"uploads/");
				$condition = $condition."repeatinfectionpath = '$repeatinfectionpath'," ;
			}

			$sql = "
			UPDATE donate_repeatinfection SET
			active = '1' ,
			donateid = '$donateid',
			repeatinfectiondate1 = '$repeatinfectiondate1',
			repeatinfectiondate2 = '$repeatinfectiondate2',
			repeatinfectiondate3 = '$repeatinfectiondate3',
			repeatinfectionqty = '$repeatinfectionqty',
			repeatinfectionreason = '$repeatinfectionreason',
			repeatinfectionresult = '$repeatinfectionresult',
			$condition 
			repeatinfectioncreatedatetime = '$repeatinfectioncreatedatetime'
			
			WHERE repeatinfectionid = '$repeatinfectionid'
			";

		}

		$result = mysqli_query($conn, $sql);
		if(empty($result))
		$status = 0;

    }

    


if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
    )
);


function do_upload($image,$name,$path) {
	
	$random_string = substr(str_shuffle("_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length ? $length : 10);
	$imageArr = explode(",",$image);
	$imageDoc1 = explode("/",$imageArr[0]);
	$imageDoc2 = explode(";",$imageDoc1[1]);
    $data = base64_decode($imageArr[1]);
   
    $file ;
	if($imageDoc2[0] == "vnd.openxmlformats-officedocument.wordprocessingml.document")
	{
		$file = $path.$name.$random_string.'.'.'docx';
	}else
	{
		$file = $path.$name.$random_string.'.'.$imageDoc2[0];
	}
	
    file_put_contents($file, $data);
    
    return $file;
 
}

    // end การบริจาค


?>