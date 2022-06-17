<?php
    include('../connection.php');

    $status = false;
    $confirmusername =$_GET['confirmusername'];
    $confirmpassword =$_GET['confirmpassword'];

    $sql = "SELECT * FROM users WHERE username = '$confirmusername' AND `password` = '$confirmpassword'";
 
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
        $status = true;
    }
    
    error_log($sql);
    echo json_encode(
        array(
            'status' => $status,
        )
        
    );

    mysqli_close($conn);
?>