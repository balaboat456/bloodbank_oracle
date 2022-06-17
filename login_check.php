<?php 

header('Content-Type: text/plain; charset=utf-8');
//echo"<pre>";
//print_r($_POST);
session_start();
include('include/conn.php');

$u_name = $_POST['username'];
$pwd = $_POST['password'];


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
	$employeeid = $responseObj->user_data->employeeid;
	$wardid = $responseObj->user_data->wardid;

	$sql = "SELECT * FROM users WHERE username='".$u_name."' ";
	$query = mysqli_query($conn,$sql);
	

	if(mysqli_num_rows($query) > 0) {
		$sql = "UPDATE users 
				SET id='$userid',
					fullname='$fullname',
					`password`='$pwd',
					roleid='$roleid',
					rolename='$rolename',
					unitofficeid='$unitofficeid',
					staffid='$employeeid'
				WHERE username='$username'
		
				";

		$query = mysqli_query($conn,$sql);
	
	}else
	{
		$sql = "INSERT INTO users 
				 (
						id,
						fullname,
						roleid,
						rolename,
						username,
						`password`,
						staffid,
						unitofficeid
					)
					VALUES
					(
						'$userid',
						'$fullname',
						'$roleid',
						'$rolename',
						'$username',
						'$pwd',
						'$employeeid',
						'$wardid'
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
	$_SESSION['staffid'] = $employeeid;
	$_SESSION['unitofficeid'] = $wardid;
	$_SESSION['role_data'] = $responseObj->role_data;

	if ($dbname_config == 'bloodbank' && $rolename == 'Nurse') {
		header('Location:http://192.168.7.13/rajvithi-uat/askforblood.php');
	} 
	
	else if ($rolename == 'Nurse') {
		header('Location:askforblood.php');
	}
	else{
		header('Location:dashboard.php');
	}
}else
{

	$_SESSION['nologin'] = true;
	header('Location:index.php');
}

?>