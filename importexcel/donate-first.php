<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
//File สำหรับ Import


$servername = '192.168.7.13';
$username = 'root';
$password = 'P@ssw0rd1168';
$dbname = 'bloodbank';
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// echo json_encode($conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// mysqli_autocommit($conn, FALSE);
$status = true;


$sql = "SELECT * FROM donor WHERE IFNULL(donatefirstupdate,'') != 1 " ;
    
$query = mysqli_query($conn,$sql);

$resultArray = array();
while($result = mysqli_fetch_array($query))
{
    $donorid = $result['donorid'];
    $sql = "SELECT * FROM donate WHERE donorid = '$donorid' AND donation_status = 1 ORDER BY donation_date ASC,donateid ASC LIMIT 1";
    $result2 = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result2) > 0) {
        $result3 = mysqli_fetch_array($result2);
        $donateid = $result3['donateid'];

        echo "=========$donateid========<br/>";

        $sql = "UPDATE donate SET isfirstblooddonation=1 WHERE donateid = '$donateid'";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;

            echo "=========$status========<br/>";
            echo($sql."<br/>");

    }

    $sql = "UPDATE donor SET donatefirstupdate=1 WHERE donorid = '$donorid'";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;
}

// if ($status) {
//     mysqli_commit($conn);
//     echo 'successful';
// }else
// {
//     mysqli_rollback($conn);
//     echo 'error';
// }


?>