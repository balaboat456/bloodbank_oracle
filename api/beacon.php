<?php

date_default_timezone_set('Asia/Bangkok');

header('Content-Type: application/json');

include('../connection.php');
$getallheaders = getallheaders();
$API_KEY = $getallheaders['api_key'];

$entityBody = json_decode(file_get_contents('php://input')) ;

$status = true;
$message = 'บันทึกข้อมูลสำเร็จ';


foreach ($entityBody as $value) {
   
    $readerId = $value->readerId;
    $tagId = $value->tagId;
    // $tagId = $value->tagId[0];
    $readDateTime = $value->readDateTime;
    $createtime = date('Y-m-d H:i:s');

    // if($API_KEY != "P@ssGGIuwhToKHFTRUJFFE")
    // {
    //     $status = false;
    //     $message = 'api_key ไม่ถูกต้อง';  
    // }else 
    
    if(!isset($readerId) || empty($readerId))
    {
        $status = false;
        $message = 'กรุณาระบุ readerId';  
    }else if(!isset($tagId) || empty($tagId))
    {
        $status = false;
        $message = 'กรุณาระบุ tagId';  
    }else if(!isset($readDateTime) || empty($readDateTime))
    {
        $status = false;
        $message = 'กรุณาระบุ readDateTime';  
    }

    if($status)
    {

        $dateDiffHour = date('Y-m-d H:i:s',strtotime('+2 hour',strtotime($start)));

        $sql = "SELECT * FROM request_beacon WHERE beaconid = '$readerId' AND beaconname = '$tagId' AND requestbeacontime >= '$dateDiffHour'";
        $query = mysqli_query($conn,$sql);

        $query_row = mysqli_num_rows($query);

        if($query_row > 0)
        {
            $status = false;
            $message = 'tagId ซ้ำ';  
        }else
        {

            $sql = "SELECT * FROM bloodstock WHERE bloodstockrfid = '$tagId'";
            $result = mysqli_query($conn,$sql);

            $bloodtype = '';
            $bag_number = '';
            $sub = '';

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $bloodtype = $row['bloodtype'];
                $bag_number = $row['bag_number'];
                $sub = $row['sub'];
            }
            

            $sql = "
            INSERT INTO request_beacon
                (
                    beaconid,
                    beaconname,
                    requestbeacontime,
                    createtime,
                    bloodtype,
                    bag_number,
                    sub,
                    beacon_tag
                )
                value
                (
                    '$readerId',
                    '$tagId',
                    '$readDateTime',
                    '$createtime',
                    '$bloodtype',
                    '$bag_number',
                    '$sub',
                    'E8BB0002'
                )
            ";

            $result = mysqli_query($conn, $sql);
            if (empty($result))
                $status = false;


            if(!$status)
            {
                $message = 'เกิดข้อผิดพลาดบางประการ'; 
            }
        }


        

    }


}







echo json_encode(
    array(
        'status' => $status,
        'message' => $message,
    )
    
);



?>
