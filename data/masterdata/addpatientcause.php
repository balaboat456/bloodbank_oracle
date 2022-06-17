<?php 

include('../../connection.php');
$donatenocausename = $_POST['donatenocausename'];
if(isset($donatenocausename)){
    
    // echo 'in';
    $donatenocausename = preg_replace('/\s+/','', $donatenocausename);

    $sql = "SELECT * FROM donate_no_cause WHERE donatenocausename = '$donatenocausename' ";


    $result = $conn->query($sql);
    if(is_numeric($donatenocausename) != '1'){
    if($result->num_rows == 0)
    {
        $sql = "INSERT INTO donate_no_cause (donatenocausename) VALUES ('$donatenocausename')";


        $query = mysqli_query($conn,$sql);
        echo 'yes';
    }
}
}



?>