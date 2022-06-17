<?php
    include('../../connection.php');
    include('../replacestring.php');

    $month = $_GET['month'];
    $year = $_GET['year'];
    
    $sql="SELECT 
            CM.bloodtype AS y,
            COUNT(*) AS a,
            SUM(CASE WHEN CM.ispayblood = 1 THEN 1 ELSE 0 END) AS b
        FROM request_blood_crossmacth CM
        LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
        LEFT JOIN bloodstock_type TY ON CM.bloodtype = TY.bloodstocktypeid
        WHERE RB.requestblooddate  LIKE  '%$year-$month%'
        GROUP BY CM.bloodtype
        ORDER BY TY.bloodstocktypegroupid,CM.bloodtype
        ";
    $query = mysqli_query($conn,$sql);

    $resultArray1 = array();
    while($result = mysqli_fetch_array($query))
    {
        array_push($resultArray1,$result);
    }

    $sql="SELECT 	bg.bloodgroupid AS label ,
    COUNT(*) AS `value`
    FROM blood_group bg
    LEFT JOIN request_blood_crossmacth cm ON bg.bloodgroupid = cm.bloodgroupid AND cm.bloodgroupid in ('A','B','O','AB') AND cm.rhid NOT IN ('Rh-') 
    LEFT JOIN request_blood rb ON cm.requestbloodid = rb.requestbloodid AND rb.requestblooddate LIKE  '%$year-$month%'
		WHERE bg.bloodgroupid in ('A','B','O','AB')
    GROUP BY bg.bloodgroupid
    
    UNION
    
    SELECT 	'Rh-' AS label ,
    COUNT(*) AS `value`
    FROM blood_group bg
    LEFT JOIN request_blood_crossmacth cm ON bg.bloodgroupid = cm.bloodgroupid
    LEFT JOIN request_blood rb ON cm.requestbloodid = rb.requestbloodid
    WHERE  cm.rhid IN ('Rh-')
    AND rb.requestblooddate LIKE  '%$year-$month%'
    
    UNION
    
    SELECT 	'CRYO' AS label ,
    COUNT(*) AS `value`
    FROM blood_group bg
    LEFT JOIN request_blood_crossmacth cm ON bg.bloodgroupid = cm.bloodgroupid
    LEFT JOIN request_blood rb ON cm.requestbloodid = rb.requestbloodid
    WHERE  cm.bloodtype = 'CRYO'
    AND rb.requestblooddate LIKE  '%$year-$month%'
    
    UNION
    
    SELECT 	'Other' AS label ,
    COUNT(*) AS `value`
    FROM blood_group bg
    LEFT JOIN request_blood_crossmacth cm ON bg.bloodgroupid = cm.bloodgroupid
    LEFT JOIN request_blood rb ON cm.requestbloodid = rb.requestbloodid
    WHERE  cm.bloodgroupid not in ('A','B','O','AB') AND cm.rhid NOT IN ('Rh-') AND cm.bloodtype = 'CRYO'
    AND rb.requestblooddate LIKE  '%$year-$month%'
        ";
    $query = mysqli_query($conn,$sql);

    $resultArray2 = array();
    while($result = mysqli_fetch_array($query))
    {
        array_push($resultArray2,$result);
    }

    error_log($sql);

    $sql="SELECT COUNT(* ) AS total1,
                IFNULL(SUM(CASE WHEN CM.ispayblood = 1 THEN 1 ELSE 0 END),0) AS total2
            FROM request_blood_crossmacth CM
            LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
            WHERE RB.requestblooddate = DATE_ADD(CURDATE(), INTERVAL 543 YEAR)  ";
    $result=mysqli_query($con,$sql);
    $data1=mysqli_fetch_assoc($result);

    $sql="SELECT COUNT(* ) AS total1,
                IFNULL(SUM(CASE WHEN CM.ispayblood = 1 THEN 1 ELSE 0 END),0) AS total2
            FROM request_blood_crossmacth CM
            LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
            WHERE RB.requestblooddate LIKE  '%$year-$month%'  ";
    $result=mysqli_query($con,$sql);
    $data2=mysqli_fetch_assoc($result);

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray1,
            'data2' => $resultArray2,
            'total1' => $data1['total1'],
            'total2' => $data1['total2'],
            'total3' => $data2['total1'],
            'total4' => $data2['total2']
            
        )
    );

    mysqli_close($conn);

?>