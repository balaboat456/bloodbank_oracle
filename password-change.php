<?php 

header('Content-Type: text/plain; charset=utf-8');
//echo"<pre>";
//print_r($_POST);
session_start();
include('include/conn.php');

include('connection.php');

$u_name = $_POST['username'];
$pwd = $_POST['password'];
$newpassword = $_POST['newpassword'];
$comfirmpassword = $_POST['comfirmpassword'];
$password_api_config = 'http://192.168.7.13/telecorplogin/api_telecorp_change_password';
// $login_api_config
if ($newpassword != $comfirmpassword) {
	header('Location:change-password.php?status_pas=3');

	exit();
}else{
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $password_api_config,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => 'user=' . $u_name . '&password=' . $pwd . '&newpassword=' . $newpassword . '&comfirmpassword=' . $comfirmpassword,
		CURLOPT_HTTPHEADER => array(
			'Accept: application/json;charset=utf-8',
			'Content-Type: application/x-www-form-urlencoded;charset=utf-8'
		),
	));

}


$response = curl_exec($curl);

curl_close($curl);

$responseObj = json_decode($response);


if($responseObj->status)
{
	// echo $responseObj->status;
	// echo $responseObj->user;
	// echo $responseObj->password;
	// echo $newpassword->newpassword;
	// echo $comfirmpassword->comfirmpassword;

	$sql = "UPDATE users SET 
        password = '$newpassword'
		WHERE username = '$u_name'
		AND password = '$pwd'
		";

	$result = mysqli_query($conn, $sql);


	header('Location:change-password.php?status_pas=1');

}else
{

	header('Location:change-password.php?status_pas=2');
}

?>