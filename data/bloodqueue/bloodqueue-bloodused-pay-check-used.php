<?php
    include('../../connection.php');

    $condition = '';
    $group_requestbloodid =$_GET['group_requestbloodid'];
    $sql = "SELECT requestbloodid,
                bloodtype,
                bloodgroupid,
                (count_pay - count_not_pay) AS diff
            FROM (SELECT 
                requestbloodid,
                bloodtype,
                bloodgroupid,
                SUM(CASE WHEN ispayblood = 1 THEN 1 ELSE 0 END) AS count_pay,
                SUM(CASE WHEN crossmacthstatus2id = 4 THEN 1 ELSE 0 END) AS count_not_pay
            FROM request_blood_crossmacth 
            WHERE requestbloodid IN ($group_requestbloodid)
            GROUP BY requestbloodid,bloodtype,bloodgroupid) M ";
 
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