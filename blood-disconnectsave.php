<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = true;
    mysqli_autocommit($conn, FALSE);

    $date = trim(dmyToymd(dateNowDMY()));
    $time = date("H:i");
    $releaseblood = json_decode($_POST['releaseblood']);

    $grouprequestbloodid = "";

    foreach ($releaseblood as $item) {

        $im = json_decode($item);
        

        $requestbloodid =   $im[0]->requestbloodid; 
        $requestbloodcrossmacthid =   $im[0]->requestbloodcrossmacthid; 
        $crossmacthstatusid =   $im[0]->crossmacthstatusid; 
        $causereleaseremark = $im[0]->causereleaseremark; 
        $username = $_SESSION['username'];

        $bag_number =   $im[0]->cm_bag_number; 
        $sub =   $im[0]->cm_sub; 
        $cm_bloodtype =   $im[0]->cm_bloodtype; 


		if($crossmacthstatusid == 10)
		{
			$sql = "UPDATE  request_blood_crossmacth SET 
					date_bloodrelease = '$date',
					time_bloodrelease = '$time',
					crossmacthstatusid = '$crossmacthstatusid',
                    crossmacthstatus2id = '$crossmacthstatusid',
                    causereleaseremark = '$causereleaseremark',
					username_confirmreturn = '$username'
					WHERE bag_number = '$bag_number' AND sub = '$sub' AND bloodtype = '$cm_bloodtype' AND requestbloodid = '$requestbloodid'
				";

			
			$result = mysqli_query($conn, $sql);
			if(empty($result))
            $status = false;
            

            $sql = "UPDATE  bloodstock SET 
            bloodstockstatusid = '1'
            WHERE bag_number = '$bag_number' AND sub = '$sub' AND bloodtype = '$cm_bloodtype'
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;


            $grouprequestbloodid = $grouprequestbloodid.$requestbloodid.",";
            
		}


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
        'gid' => $grouprequestbloodid
    )
);
    

    // end การบริจาค


?>