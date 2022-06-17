<?php
set_time_limit(0); 
session_start();
header('Content-Type: text/html; charset=utf-8');
 
//File สำหรับ Import

 
/** PHPExcel */
require_once 'PHPExcel/Classes/PHPExcel.php';
 
/** PHPExcel_IOFactory - Reader */
include 'PHPExcel/Classes/PHPExcel/IOFactory.php';

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


$files = glob("donor-import/labNBC-61.txt/*txt");
if(count($files) > 0)
{
    foreach($files as $key=>$value) {
       

        //  if($key >= 0 && $key < 50)
        //  {
            $handle = fopen($value, "r") or die('{ "status": false}');
            if ($handle) {
    
                $status = false;
                while (($line = fgets($handle)) !== false) {
                    
                    $donorcode = str_replace(" ","",substr($line,0,10)) ;
                    $donoridcard = str_replace(" ","",substr($line,strpos($line,"991")-63,13));
    
                    if(!empty($donorcode) && !empty($donoridcard))
                    {
                        $sql = "UPDATE donor
                        SET  donorcode = '$donorcode'
                        WHERE donoridcard = '$donoridcard'
                        ";
        
                        // $result = mysqli_query($conn, $sql);
                        // if(empty($result))
                        // $status = 0;

                       echo $sql.';<br/>';
                    }
    
                    
                    
                }
    
             
                fclose($handle);
            } else {
                // error opening the file.
                echo json_encode(array(
                    "status" => false
                ))  ;
            } 
        //  }
       
        

    }

    
   
}else
{
    echo json_encode(array(
        "status" => false
    ))  ;
}





?>