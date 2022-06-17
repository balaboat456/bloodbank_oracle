<?php

    include('../connection.php');

    $condition = '';
    $id =$_GET['id'];

$sql = "DELETE FROM donate 
        WHERE donateid = '$id'
        ";
   
    
    $query = mysqli_query($conn,$sql);

    echo json_encode(
        array(
            'status' => true
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
