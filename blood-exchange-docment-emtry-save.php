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

	$bloodexchangeid = $_POST['bloodexchangeid'] ;

	$sql = "UPDATE blood_exchange_document SET active = 0  WHERE bloodexchangeid = '$bloodexchangeid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
	$status = 0;
	
	$bloodexchangedocumentitem = json_decode($_POST['bloodexchangedocumentitem']);
    foreach ($bloodexchangedocumentitem as $item) {

		$im = json_decode($item) ;

		$bloodexchangedocumentid = $im[0]->bloodexchangedocumentid ;
		$bloodexchangedocumentcode = $im[0]->bloodexchangedocumentcode ;
		$bloodexchangeid = $im[0]->bloodexchangeid ;

		$bloodexchangedocumentname = $im[0]->bloodexchangedocumentname ;
		$bloodexchangedocumentfile = $im[0]->bloodexchangedocumentfile ;
		$bloodexchangedocumentpath = '' ;
		$bloodexchangedocumentdate = dateNowYMDHM() ;
		
		if(empty($bloodexchangedocumentid))
		{
			
			$running = getRunningYM('IM');
			$bloodexchangedocumentid = $running['runn'];
			$bloodexchangedocumentcode = $running['code'];

			if(!empty($bloodexchangedocumentfile))
			{
				$bloodexchangedocumentpath = do_upload($bloodexchangedocumentfile,$bloodexchangedocumentcode,"uploads/");
			}else
			{
				$bloodexchangedocumentpath = '';
			}

			$sql = "
			INSERT INTO blood_exchange_document
			(
				bloodexchangedocumentid,
				bloodexchangedocumentcode,
				bloodexchangeid,
				bloodexchangedocumentname,
				bloodexchangedocumentpath,
				bloodexchangedocumentdate
			)
			VALUES
			(
				'$bloodexchangedocumentid',
				'$bloodexchangedocumentcode',
				'$bloodexchangeid',
				'$bloodexchangedocumentname',
				'$bloodexchangedocumentpath',
				'$bloodexchangedocumentdate'
			)
			";

		}else
		{
			$condition = "";
			if(!empty($bloodexchangedocumentfile))
			{
				$bloodexchangedocumentpath = do_upload($bloodexchangedocumentfile,$bloodexchangedocumentcode,"uploads/");
				$condition = $condition."bloodexchangedocumentpath = '$bloodexchangedocumentpath'," ;
			}

			$sql = "
			UPDATE blood_exchange_document SET
			active = '1' ,
			bloodexchangeid = '$bloodexchangeid',
			$condition 
			bloodexchangedocumentdate = '$bloodexchangedocumentdate'
			
			WHERE bloodexchangedocumentid = '$bloodexchangedocumentid'
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
	$imageArr = str_replace("vnd.openxmlformats-officedocument.wordprocessingml.document","docx",$imageArr);
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