<?php 

header('Content-Type: text/plain; charset=utf-8');

session_start();
include('include/conn.php');

$u_name = $_SESSION['username'];
$pwd = $_SESSION['password'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $login_api_config,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'user='.$u_name.'&password='.$pwd,
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json;charset=utf-8',
    'Content-Type: application/x-www-form-urlencoded;charset=utf-8'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$responseObj = json_decode($response);

if($responseObj->status)
{
	$userid = $responseObj->user_data->userid;
	$username = $responseObj->user_data->username;
	$fullname = $responseObj->user_data->fullname;
	$roleid = $responseObj->user_data->roleid;
	$rolename = $responseObj->user_data->rolename;
	$staffid = $responseOb->user_data->employeeid;


	$sql = "SELECT * FROM users WHERE username='".$u_name."' ";
	$query = mysqli_query($conn,$sql);

	if(mysqli_num_rows($query) > 0) {
		$sql = "UPDATE users 
				SET id='$userid',
					fullname='$fullname',
					roleid='$roleid',
					rolename='$rolename',
					staffid = '$staffid'
				WHERE username='$username'
		
				";

		$query = mysqli_query($conn,$sql);
	}else
	{
		$sql = "INSERT INTO users 
				SET (
						id,
						fullname,
						roleid,
						rolename,
						username,
						staffid
					)
					VALUES
					(
						'$userid',
						'$fullname',
						'$roleid',
						'$rolename',
						'$username',
						'$staffid'
					)
		
				";

		$query = mysqli_query($conn,$sql);
	}

	$_SESSION['id'] = $userid;
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $pwd;
	$_SESSION['fullname'] = $fullname;
	$_SESSION['roleid'] = $roleid;
	$_SESSION['rolename'] = $rolename;
	$_SESSION['staffid'] = $staffid;
	$_SESSION['unitofficeid'] = '';
	$_SESSION['role_data'] = $responseObj->role_data;
	
}

?>