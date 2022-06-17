<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    $donation_get_type_id =$_GET['donation_get_type_id'];
    $sql = "";



    $sql = "SELECT BG.bloodgroupname,M.*,SUM(CASE WHEN IFNULL(M.bloodgroup,'') != '' THEN 1 ELSE 0 END ) AS blood_qty
            FROM blood_group BG
            LEFT JOIN 
            (SELECT BS.*,BT.bloodstocktypename2,DN.hn,DN.donation_get_type_id,RH.rhname3,RH.rhcode
            FROM bloodstock BS
            LEFT JOIN donate DN ON BS.donateid = DN.donateid
            LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
            LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
            WHERE DN.hn = '$hn'
            AND DN.donation_get_type_id = 2
            AND BS.bloodstockstatusid = 1
            AND BT.bloodstocktypegroupid = 1
            AND BS.active <> 0) M ON BG.bloodgroupid = M.bloodgroup
            WHERE BG.bloodgroupid IN ('A','B','O','AB')
            GROUP BY BG.bloodgroupid
            
            UNION
            
            SELECT BG.bloodgroupname,M.*,SUM(CASE WHEN IFNULL(M.bloodgroup,'') != '' THEN 1 ELSE 0 END ) AS blood_qty
            FROM blood_group BG
            LEFT JOIN 
            (SELECT BS.*,BT.bloodstocktypename2,DN.hn,DN.donation_get_type_id,RH.rhname3,RH.rhcode
            FROM bloodstock BS
            LEFT JOIN donate DN ON BS.donateid = DN.donateid
            LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
            LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
            WHERE DN.hn = '$hn'
            AND DN.donation_get_type_id = 2
            AND BS.bloodstockstatusid = 1
            AND BT.bloodstocktypegroupid = 1
            AND BS.active <> 0) M ON BG.bloodgroupid = M.bloodgroup
            WHERE BG.bloodgroupid NOT IN ('A','B','O','AB')
            GROUP BY BG.bloodgroupid
            HAVING blood_qty > 0
            
            ORDER BY FIELD(bloodgroupname, 'A', 'B', 'O', 'AB')
            ";
 
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