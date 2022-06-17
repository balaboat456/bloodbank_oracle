<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition = '';
    $bagnumber = $_GET['bagnumber'];


    $resultArray = array();
    if(!empty($bagnumber))
    {
        $sql = "SELECT DN.donorcode, 
                DN.isidcardpassport,
                DN.donoridcard,
                DN.donorpassport,
                CONCAT(PF.prefixname,DN.fname,' ',DN.lname) AS fullname,
                DT.bag_number
            FROM donate DT
            LEFT JOIN donor DN ON DT.donorid = DN.donorid
            LEFT JOIN prefix PF ON DN.prefixid = PF.prefixid
            WHERE DT.bag_number = '$bagnumber'" ;
                
            $query = mysqli_query($conn,$sql);


            while($result = mysqli_fetch_array($query))
            {
                array_push($resultArray,$result);
            }
    }
    

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>