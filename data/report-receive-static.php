<?php
    include('../connection.php');

    $condition = '';
    $year =$_GET['year'];

    $sql = "SELECT          'มกราคม  $year' AS monthname,
    'ม.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-01'
            UNION
SELECT          'กุมภาพันธ์  $year' AS monthname,
    'ก.พ. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-02'						
            UNION
SELECT          'มีนาคม  $year' AS monthname,
    'มี.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-03'						
            UNION
SELECT          'เมษายน  $year' AS monthname,
    'เม.ย. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-04'						
            UNION
SELECT          'พฤษภาคม  $year' AS monthname,
    'พ.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-05'						
            UNION
SELECT          'มิถุนายน  $year' AS monthname,
    'มิ.ย. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-06'						
            UNION
SELECT          'กรกฎาคม  $year' AS monthname,
    'ก.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-07'						
            UNION
SELECT          'สิงหาคม  $year' AS monthname,
    'ส.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-08'						
            UNION
SELECT          'กันยายน  $year' AS monthname,
    'ก.ย. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-09'						
            UNION
SELECT          'ตุลาคม  $year' AS monthname,
    'ต.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-10'						
            UNION
SELECT          'พฤศจิกายน  $year' AS monthname,
    'พ.ย. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-11'						
            UNION
SELECT          'ธันวาคม  $year' AS monthname,
    'ธ.ค. $year' AS monthcode,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 1 THEN 1 ELSE 0 END),0) AS stock,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 2 THEN 1 ELSE 0 END),0) AS hayak,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 3 THEN 1 ELSE 0 END),0) AS ap,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 4 THEN 1 ELSE 0 END),0) AS rh,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 5 THEN 1 ELSE 0 END),0) AS 'return',
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 6 THEN 1 ELSE 0 END),0) AS ex,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 10 THEN 1 ELSE 0 END),0) AS donate,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 11 THEN 1 ELSE 0 END),0) AS lend,
                    IFNULL(SUM(CASE WHEN bs.receivingtypeid = 12 THEN 1 ELSE 0 END),0) AS per
FROM bloodstock bs
            LEFT JOIN bloodstock_main bm ON bs.bloodstockmainid = bm.bloodstockmainid
            WHERE DATE_FORMAT(bm.bloodstockmaindate, '%Y-%m') = '$year-12'	";

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
                'sql' => $sql
            )
            
        );
    
        mysqli_close($conn);
    ?>