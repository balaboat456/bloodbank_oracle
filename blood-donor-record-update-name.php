<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    include('checkPermission.php');
    date_default_timezone_set('Asia/Bangkok');
    $status = 1;

    
    $sql = "SELECT *,count(*) AS donate_qty FROM donor GROUP BY CONCAT(fname,lname) HAVING donate_qty > 1";
 
    $query = mysqli_query($conn,$sql);

	while($result = mysqli_fetch_array($query))
	{
        $fname = $result["fname"] ;
        $lname = $result["lname"] ;


        $sql = "SELECT * FROM donor WHERE fname = '$fname' AND lname = '$lname' AND IFNULL(donoridcard,'') != '' ";
 
        $query_donor_2 = mysqli_query($conn,$sql);

        $donorid_main = "";
        while($result_donor_2 = mysqli_fetch_array($query_donor_2))
        {
            $donorid = $result_donor_2["donorid"] ;
            $donorid_main = $donorid;

            error_log("======1=====");
            
        }

        
        $sql = "SELECT * FROM donor WHERE fname = '$fname' AND lname = '$lname' AND IFNULL(donoridcard,'') = '' ";
 
        $query_donor_1 = mysqli_query($conn,$sql);

        while($result_donor_1 = mysqli_fetch_array($query_donor_1))
        {
            $donorid = $result_donor_1["donorid"] ;

            $sql = "UPDATE donate SET donorid = '$donorid_main' WHERE donorid = '$donorid' ";
            $result_update = mysqli_query($conn, $sql);
            if(empty($result_update))
            $status = 0;


            $sql = "DELETE FROM donor WHERE donorid = '$donorid' ";
            $result_delete = mysqli_query($conn, $sql);
            if(empty($result_delete))
            $status = 0;

            echo $sql."<br/>";

            error_log("======2=====");
            
        }

        error_log($donorid_main);
        
	}

    echo $status;


    

?>