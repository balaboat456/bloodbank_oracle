<?php
    include('connection.php');
	date_default_timezone_set('Asia/Bangkok');
	include('data/dateFormat.php');
	include('data/running.php');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

	$sql = "";

	$donateid = $_POST['donateid'] ;

	$sql = "UPDATE donate_infected_file SET active = 0  WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
	$status = 0;
	

	
	$repeatinfectionitem = json_decode($_POST['repeatinfectionitem']);
    foreach ($repeatinfectionitem as $item) {

		$im = json_decode($item) ;

		$donateinfectedfileid = $im[0]->donateinfectedfileid ;
		$donateinfectedfilecode = $im[0]->donateinfectedfilecode ;
		$donateid = $im[0]->donateid ;
		$donateinfectedfilename = $im[0]->donateinfectedfilename ;
		$donateinfectedfilepath = $im[0]->donateinfectedfilepath ;
		$donateinfectedfile = $im[0]->donateinfectedfile ;
		$donateinfectedfilepath = '' ;
		// $donateinfectedcreatetime = dateNowYMDHM() ;
		
		

		if(empty($donateinfectedfileid))
		{
			
			$running = getRunningYM('IM');
			$donateinfectedfileid = $running['runn'];
			$donateinfectedfilecode = $running['code'];

			if(!empty($donateinfectedfile))
			{
				$donateinfectedfilepath = do_upload($donateinfectedfile,$donateinfectedfilecode,"uploads/");
			}else
			{
				$donateinfectedfilepath = '';
			}

			$sql = "
			INSERT INTO donate_infected_file
			(
				donateinfectedfileid,
				donateinfectedfilecode,
				donateid,
				donateinfectedfilename,
				donateinfectedfilepath
			)
			VALUES
			(
				'$donateinfectedfileid',
				'$donateinfectedfilecode',
				'$donateid',
				'$donateinfectedfilename',
				'$donateinfectedfilepath'
			)
			";

		}else
		{
			$condition = "";
			if(!empty($donateinfectedfile))
			{
				$donateinfectedfilepath = do_upload($donateinfectedfile,$donateinfectedfilecode,"uploads/");
				$condition = $condition."donateinfectedfilepath = '$donateinfectedfilepath'," ;
			}

			$sql = "
			UPDATE donate_infected_file SET
			active = '1' ,
            donateid = '$donateid',
            donateinfectedfilename = '$donateinfectedfilename',
			$condition 
			donateinfectedupdatetime = '$donateinfectedupdatetime'
			
			WHERE donateinfectedfileid = '$donateinfectedfileid'
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
        'id' => $donateid
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