<?php
    include('../../connection.php');

    $sql = "SELECT * FROM bloodstock_type_ag WHERE active <> 0";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
        $id = $result["bloodstocktypeagid"];
        $sql = "SELECT  
                        bg.bloodgroupname,
                        SUM(CASE WHEN bs.bloodtype = 'PRC' AND tagi.bloodstocktypeagid = '$id' THEN 1 ELSE 0 END) prc,
                        SUM(CASE WHEN bs.bloodtype = 'LPRC' AND tagi.bloodstocktypeagid = '$id' THEN 1 ELSE 0 END) lprc,
                        SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND tagi.bloodstocktypeagid = '$id' THEN 1 ELSE 0 END) ldprc

                FROM blood_group bg
                LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup  AND bs.istypeag = 1 AND bs.bloodstockstatusid = 1 AND bs.active <> 0
                LEFT JOIN bloodstock_type_ag_item tagi ON tagi.bloodstockid  = bs.bloodstockid  AND tagi.active <> 0
                LEFT JOIN bloodstock_type_ag tag ON tagi.bloodstocktypeagid = tag.bloodstocktypeagid 
                WHERE bg.bloodgroupid in ('A','B','O','AB') 
                GROUP BY bg.bloodgroupid 
                ORDER BY bg.bloodgroupid";
    
        $queryItem = mysqli_query($conn,$sql);

        $resultArrayItem = array();
        while($resultItem = mysqli_fetch_array($queryItem))
        {
            array_push($resultArrayItem,$resultItem);
        }


        $result["item"] = $resultArrayItem;

		array_push($resultArray,$result);
    }

    
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray ,
        )
        
    );

    mysqli_close($conn);

   

?>