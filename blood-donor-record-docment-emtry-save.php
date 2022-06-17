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

	$sql = "UPDATE donate_document SET active = 0  WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
	$status = 0;
	
	$donatedocumentitem = json_decode($_POST['donatedocumentitem']);
    foreach ($donatedocumentitem as $item) {

		$im = json_decode($item) ;

		$donatedocumentid = $im[0]->donatedocumentid ;
		$donatedocumentcode = $im[0]->donatedocumentcode ;
		$donateid = $im[0]->donateid ;

		$donatedocumentname = $im[0]->donatedocumentname ;
		$donatedocumentfile = $im[0]->donatedocumentfile ;
	$donatedocumentfilename = $im[0]->donatedocumentfilename;
		$donatedocumentpath = '' ;
		$donatedocumentdate = dateNowYMDHM() ;
		
		if(empty($donatedocumentid))
		{
			
			$running = getRunningYM('IM');
			$donatedocumentid = $running['runn'];
			$donatedocumentcode = $running['code'];

			if(!empty($donatedocumentfile))
			{
				$donatedocumentpath = do_upload($donatedocumentfile,$donatedocumentcode,"uploads/");
			}else
			{
				$donatedocumentpath = '';
			}

			$sql = "
			INSERT INTO donate_document
			(
				donatedocumentid,
				donatedocumentcode,
				donateid,
				donatedocumentname,
				donatedocumentpath,
				donatedocumentdate,
				donatedocumentfilename
			)
			VALUES
			(
				'$donatedocumentid',
				'$donatedocumentcode',
				'$donateid',
				'$donatedocumentname',
				'$donatedocumentpath',
				'$donatedocumentdate',
				'$donatedocumentfilename'
			)
			";

		}else
		{
			$condition = "";
			if(!empty($donatedocumentfile))
			{
				$donatedocumentpath = do_upload($donatedocumentfile,$donatedocumentcode,"uploads/");
				$condition = $condition."donatedocumentpath = '$donatedocumentpath'," ;
			}

			$sql = "
			UPDATE donate_document SET
			active = '1' ,
			donateid = '$donateid',
			$condition 
			donatedocumentdate = '$donatedocumentdate'
			
			WHERE donatedocumentid = '$donatedocumentid'
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