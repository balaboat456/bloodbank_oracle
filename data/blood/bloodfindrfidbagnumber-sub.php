<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    $bag_number = $_GET['bag_number'];
    $sub = $_GET['sub'];
    $bloodtype = $_GET['bloodtype'];
    

    $sql = "SELECT * FROM bloodstock WHERE bag_number = '$bag_number' AND sub = '$sub' AND bloodtype = '$bloodtype' AND active <> 0";

    $query = mysqli_query($conn,$sql);

    $resultArray = array();
    if (mysqli_num_rows($query) > 0) {
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
    }

    
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>