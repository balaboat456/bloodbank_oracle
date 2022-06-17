<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    $donation_get_type_id =$_GET['donation_get_type_id'];
    $sql = "";



    if($donation_get_type_id == 5)
    {
        $sql = "SELECT BS.*,
                        BT.bloodstocktypename2,
                        BS.patienthn AS hn,
                        '5' AS donation_get_type_id,
                        RH.rhname3,
                        RH.rhcode
                FROM bloodstock BS
                LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
                LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
                WHERE BS.patienthn = '$hn'
                AND BS.receivingtypeid = '2'
                AND BS.bloodstockstatusid = 1
                AND BT.bloodstocktypegroupid = 1";
    }else
    {
        $sql = "SELECT BS.*,BT.bloodstocktypename2,DN.hn,DN.donation_get_type_id,RH.rhname3,RH.rhcode
        FROM bloodstock BS
        LEFT JOIN donate DN ON BS.donateid = DN.donateid
        LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
        LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
        WHERE DN.hn = '$hn'
        AND DN.donation_get_type_id in ($donation_get_type_id)
        AND BS.bloodstockstatusid = 1
        AND BT.bloodstocktypegroupid = 1
        AND BS.active <> 0
            ";
    }
 
    $query = mysqli_query($conn,$sql);

    error_log($sql);



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