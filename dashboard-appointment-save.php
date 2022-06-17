<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('data/numberFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $type = $_POST['type'];
    $code = $_POST['code']; // pathcode
    $id = $_POST['id'];
    $appointment = $_POST['appointment'];
	$text = $_POST['text'];

	if($code == 'DONATE_REP')
	{
		$sql = "UPDATE donate_repeatinfection SET repeatinfectionappointmentstatus = '$appointment',repeatinfectionappointmentremark = '$text' WHERE repeatinfectionid = '$id'  ";
		$result = mysqli_query($conn, $sql);

		if(empty($result))
		$status = 0;

		error_log($sql);
	}else if($code == 'DONATE')
	{
		$sql = "UPDATE donate SET appointmentstatus = '$appointment',appointmentremark = '$text' WHERE donateid = '$id' ";
		$result = mysqli_query($conn, $sql);

		if(empty($result))
		$status = 0;

		error_log($sql);
	}else if($code == 'BLOODLETTING')
	{
		$sql = "UPDATE blood_letting SET appointmentstatus = '$appointment',appointmentremark = '$text' WHERE bloodlettingid = '$id' ";
		$result = mysqli_query($conn, $sql);

		if(empty($result))
		$status = 0;

		error_log($sql);
	}else if($code == 'BLOODEXCHANGE')
	{
		$sql = "UPDATE blood_exchange SET appointmentstatus = '$appointment',appointmentremark = '$text' WHERE bloodexchangeid = '$id' ";
		$result = mysqli_query($conn, $sql);

		if(empty($result))
		$status = 0;

		error_log($sql);
	}else if($code == 'WASHEDREDCELL')
	{
		$sql = "UPDATE blood_washed_red_cell SET appointmentstatus = '$appointment',appointmentremark = '$text' WHERE bloodwashedredcellid = '$id' ";
		$result = mysqli_query($conn, $sql);

		if(empty($result))
		$status = 0;

		error_log($sql);
	}else if($code == 'SERUMTEAR')
	{
		$sql = "UPDATE serum_tear SET appointmentstatus = '$appointment',appointmentremark = '$text' WHERE serumtearid = '$id' ";
		$result = mysqli_query($conn, $sql);

		if(empty($result))
		$status = 0;

		error_log($sql);
	} else if ($code == 'APPOINTMENT') {
	$sql = "UPDATE appointment SET appointmentstatus = '$appointment',appointmentstatusremark = '$text' WHERE appointmentid = '$id' ";
	$result = mysqli_query($conn, $sql);

	if (empty($result))
		$status = 0;

	error_log($sql);
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

?>