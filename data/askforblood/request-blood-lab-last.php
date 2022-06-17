<?php
    include('../../connection.php');
    date_default_timezone_set('Asia/Bangkok');
    include('../../dateNow.php');

    $condition = '';
    $hn =$_GET['hn'];

    

    $sql = "SELECT RB.* ,
            BG.bloodgroupname,
            RH.rhname3,
            SC.rhname3 AS confirmsceenname,
            GROUP_CONCAT(RB.antibody) AS group_antibody_all,
            REPLACE(RB.phenotypedisplay,' ','') AS group_phenotypedisplay_all
            FROM request_blood RB
            LEFT JOIN blood_group BG ON RB.confirmbloodgroup = BG.bloodgroupid
            LEFT JOIN rh RH ON RB.confirmrhid = RH.rhid
            LEFT JOIN rh SC ON RB.confirmsceen = SC.rhid
            WHERE RB.hn = '$hn' 
            AND RB.iscrossmatch = 1
            ORDER BY RB.requestbloodid DESC
            LIMIT 1" ;
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
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