<?php 
   session_start();
   include('connection.php');
   include('dateNow.php');
   date_default_timezone_set('Asia/Bangkok');

   $sid = $_GET['sid'];
   $status = $_GET['status'];


   $sql = "UPDATE blood_borrow SET status = '1' WHERE bloodBorrowid = '".$sid."'";

   $result = mysqli_query($conn,$sql);

   if($result){
      echo json_encode(
         array(
            'succ' => true,
            'data' => $sid,
         )
      ) ;
   }else{
      echo json_encode(
         array(
            'succ' => false,
        
         )
      ) ;
   }
