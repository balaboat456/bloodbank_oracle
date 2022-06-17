<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $companypasid =  $_POST['emtrycompanypasid'];
    $companypasname =  $_POST['emtrycompanypasname'];
   

    $sql = "";

    if(empty($companypasid))
    {
        $sql = "
        INSERT INTO company_pas
      
            SELECT MAX(companypasid)+1,
			MAX(companypascode)+1,
            '$companypasname'
			FROM company_pas
        ";
    }else
    {
        $sql = "
        UPDATE company_pas SET
        companypasname = '$companypasname'
        WHERE companypasid = '$companypasid'
        ";
    }
  
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'data' =>$sql
    )
);
    


?>