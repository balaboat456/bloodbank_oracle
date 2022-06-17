<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $date = trim(dmyToymd(dateNowDMY()));
    $time = date("H:i");
    $getoutblood = json_decode($_POST['getoutblood']);
    foreach ($getoutblood as $item) {

        $im = json_decode($item);
        
        $bloodstockid =   $im[0]->bloodstockid; 
        $ck =   $im[0]->ck; 
		if($ck)
		{
			$sql = "UPDATE  bloodstock SET 
                    bloodtype = 'LPRC',
					bloodstockstatusid = '1',
                    bloodstockpaytypeid = ''
					WHERE bloodstockid = '$bloodstockid'
				";

			
			$result = mysqli_query($conn, $sql);
			if(empty($result))
            $status = false;
            
		}


    }

   

if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo $status;
    

    // end การบริจาค


?>