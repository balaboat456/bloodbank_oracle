<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
$servername = '192.168.7.13';
$username = 'root';
$password = 'P@ssw0rd1168';
$dbname = 'bloodbank';

$dbname2 = 'bloodbank_test';
$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname2);
mysqli_set_charset($conn,"utf8");
// echo json_encode($conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysqli_autocommit($conn, FALSE);
$status = true;


$sql = "SELECT * 
FROM bloodbank_test.donate 
WHERE donation_date BETWEEN '2564-09-01' AND '2564-10-30' AND bag_number != ''";
    
$query2 = mysqli_query($conn2,$sql);

$resultArray2 = array();
while($result2 = mysqli_fetch_array($query2))
{
    $pulse_status = $result2['pulse_status'] ;
    $pain_heart_status = $result2['pain_heart_status'] ;
    $physical_status = $result2['physical_status'] ;
    $bag_staff_id = $result2['bag_staff_id'] ;
    $blood_driller_id = $result2['blood_driller_id'] ;
    $inspectorid = $result2['inspectorid'] ;
    $bag_number = $result2['bag_number'] ;

    $sql = "UPDATE donate
            SET     pulse_status='$pulse_status',
                    pain_heart_status='$pain_heart_status',
                    physical_status='$physical_status',
                    bag_staff_id='$bag_staff_id',
                    blood_driller_id='$blood_driller_id',
                    inspectorid='$inspectorid'
                WHERE  bag_number = '$bag_number'";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}



if($status) {
    mysqli_commit($conn);
    echo 'successful';
}else
{
    mysqli_rollback($conn);
    echo 'error';
}

?>