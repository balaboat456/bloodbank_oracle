<?php
    include('../../connection.php');
    include('../replacestring.php');

    $condition = '';    

    $month = $_GET['month'];
    $year = $_GET['year'];

    $sql="SELECT COUNT(*) AS total FROM donate WHERE donation_date = DATE_ADD(CURDATE(), INTERVAL 543 YEAR) ";
    $result=mysqli_query($con,$sql);
    $data1=mysqli_fetch_assoc($result);

    $sql="SELECT COUNT(*) AS total FROM donate WHERE donation_date LIKE '%$year-$month%'";
    $result=mysqli_query($con,$sql);
    $data2=mysqli_fetch_assoc($result);


    $sql="SELECT 
                blood_group AS label,
                COUNT(*) AS `value`
            FROM donate 
            WHERE donation_date LIKE '%$year-$month%'
            AND blood_group in ('A','B','O','AB')
            AND rh NOT IN ('Rh-')
            GROUP BY blood_group

            UNION

            SELECT 
                    'Rh-' AS label,
                    COUNT(*) AS `value`
            FROM donate 
            WHERE donation_date  LIKE '%$year-$month%'
            AND rh IN ('Rh-')

            UNION

            SELECT 
                'Other' AS label,
                COUNT(*) AS `value`
            FROM donate 
            WHERE donation_date LIKE '%$year-$month%'
            AND blood_group not in ('A','B','O','AB')
            AND rh NOT IN ('Rh-')
            ORDER BY FIELD(label,'A') DESC,FIELD(label,'B') DESC,FIELD(label,'O') DESC,FIELD(label,'AB') DESC ,FIELD(label,'Rh-') DESC";
    $query = mysqli_query($conn,$sql);

    $resultArray1 = array();
    while($result = mysqli_fetch_array($query))
    {
        array_push($resultArray1,$result);
    }



    $sql="SELECT 
            IFNULL(SUM(CASE WHEN prc != '' THEN 1 ELSE 0 END),0) AS prc,
            IFNULL(SUM(CASE WHEN lprc != '' THEN 1 ELSE 0 END),0) AS lprc,
            IFNULL(SUM(CASE WHEN ldprc != '' THEN 1 ELSE 0 END),0) AS ldprc,
            IFNULL(SUM(CASE WHEN ffp != '' THEN 1 ELSE 0 END),0) AS ffp,
            IFNULL(SUM(CASE WHEN pc != '' THEN 1 ELSE 0 END),0) AS pc,
            IFNULL(SUM(CASE WHEN lppc != '' THEN 1 ELSE 0 END),0) AS lppc,
            IFNULL(SUM(CASE WHEN lppc_pas != '' THEN 1 ELSE 0 END),0) AS lppc_pas,
            IFNULL(SUM(CASE WHEN sdp != '' THEN 1 ELSE 0 END),0) AS sdp,
            IFNULL(SUM(CASE WHEN sdp_pas != '' THEN 1 ELSE 0 END),0) AS sdp_pas,
            IFNULL(SUM(CASE WHEN sdr != '' THEN 1 ELSE 0 END),0) AS sdr,
            IFNULL(SUM(CASE WHEN wb != '' THEN 1 ELSE 0 END),0) AS wb
        FROM donate 
        WHERE donation_date LIKE '%$year-$month%' ";
    $query = mysqli_query($conn,$sql);

    $resultArray2 = array();
    while($result = mysqli_fetch_array($query))
    {
        array_push($resultArray2,$result);
    }
    
    
    
    echo json_encode(
        array(
            'status' => true,
            'donatedatetotal' => $data1['total'],
            'donatemonthotal' => $data2['total'],
            'donatemonthcartotal' => $resultArray1,
            'donatemonthtypetotal' => $resultArray2
        )
    );

    mysqli_close($conn);


    function _group_by($array) {
        $return = array();
        foreach($array as $val) {
            if(!in_array($val->GateID,$return))
            array_push($return,$val->GateID);
        }
        return $return;
    }
?>