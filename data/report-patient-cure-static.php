<?php
    include('../connection.php');

    $condition = '';
    $year =$_GET['year'];

    $sql = "SELECT M.monthname,M.count as ex,L.count as let,N.count as wash , O.count as serum
    FROM (
    SELECT 'มกราคม $year' as monthname,
    'ม.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-01'
    UNION
    SELECT 'กุมภาพันธ์ $year' as monthname,
    'ก.พ. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-02'
    UNION
    SELECT 'มีนาคม $year' as monthname,
    'มี.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-03'
    UNION
    SELECT 'เมษายน $year' as monthname,
    'เม.ย. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-04'
    UNION
    SELECT 'พฤษภาคม $year' as monthname,
    'พ.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-05'
    UNION
    SELECT 'มิถุนายน $year' as monthname,
    'มิ.ย. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-06'
    UNION
    SELECT 'กรกฎาคม $year' as monthname,
    'ก.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-07'
    UNION
    SELECT 'สิงหาคม $year' as monthname,
    'ส.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-08'
    UNION
    SELECT 'กันยายน $year' as monthname,
    'ก.ย. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-09'
    UNION
    SELECT 'ตุลาคม $year' as monthname,
    'ต.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-10'
    UNION
    SELECT 'พฤศจิกายน $year' as monthname,
    'พ.ย. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-11'
    UNION
    SELECT 'ธันวาคม $year' as monthname,
    'ธ.ค. $year' as monthcode,
    count(*) as count
    FROM blood_exchange
    WHERE DATE_FORMAT(bloodexchangedate, '%Y-%m') = '$year-12'
    )M 
    JOIN (
    SELECT 'มกราคม $year' as monthname,
    'ม.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-01'
    UNION
    SELECT 'กุมภาพันธ์ $year' as monthname,
    'ก.พ. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-02'
    UNION
    SELECT 'มีนาคม $year' as monthname,
    'มี.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-03'
    UNION
    SELECT 'เมษายน $year' as monthname,
    'เม.ย. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-04'
    UNION
    SELECT 'พฤษภาคม $year' as monthname,
    'พ.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-05'
    UNION
    SELECT 'มิถุนายน $year' as monthname,
    'มิ.ย. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-06'
    UNION
    SELECT 'กรกฎาคม $year' as monthname,
    'ก.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-07'
    UNION
    SELECT 'สิงหาคม $year' as monthname,
    'ส.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-08'
    UNION
    SELECT 'กันยายน $year' as monthname,
    'ก.ย. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-09'
    UNION
    SELECT 'ตุลาคม $year' as monthname,
    'ต.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-10'
    UNION
    SELECT 'พฤศจิกายน $year' as monthname,
    'พ.ย. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-11'
    UNION
    SELECT 'ธันวาคม $year' as monthname,
    'ธ.ค. $year' as monthcode,
    count(*) as count
    FROM blood_letting
    WHERE DATE_FORMAT(bloodlettingdatetime, '%Y-%m') = '$year-12'
    ) L ON M.monthname = L.monthname
    JOIN ( 
    SELECT 'มกราคม $year' as monthname,
    'ม.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-01'
    UNION
    SELECT 'กุมภาพันธ์ $year' as monthname,
    'ก.พ. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-02'
    UNION
    SELECT 'มีนาคม $year' as monthname,
    'มี.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-03'
    UNION
    SELECT 'เมษายน $year' as monthname,
    'เม.ย. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-04'
    UNION
    SELECT 'พฤษภาคม $year' as monthname,
    'พ.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-05'
    UNION
    SELECT 'มิถุนายน $year' as monthname,
    'มิ.ย. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-06'
    UNION
    SELECT 'กรกฎาคม $year' as monthname,
    'ก.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-07'
    UNION
    SELECT 'สิงหาคม $year' as monthname,
    'ส.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-08'
    UNION
    SELECT 'กันยายน $year' as monthname,
    'ก.ย. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-09'
    UNION
    SELECT 'ตุลาคม $year' as monthname,
    'ต.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-10'
    UNION
    SELECT 'พฤศจิกายน $year' as monthname,
    'พ.ย. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-11'
    UNION
    SELECT 'ธันวาคม $year' as monthname,
    'ธ.ค. $year' as monthcode,
    count(*) as count
    FROM blood_washed_red_cell
    WHERE DATE_FORMAT(bloodwashedredcelldatetime, '%Y-%m') = '$year-12'
    )N ON L.monthname = N.monthname
    JOIN (
    SELECT 'มกราคม $year' as monthname,
    'ม.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-01'
    UNION
    SELECT 'กุมภาพันธ์ $year' as monthname,
    'ก.พ. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-02'
    UNION
    SELECT 'มีนาคม $year' as monthname,
    'มี.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-03'
    UNION
    SELECT 'เมษายน $year' as monthname,
    'เม.ย. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-04'
    UNION
    SELECT 'พฤษภาคม $year' as monthname,
    'พ.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-05'
    UNION
    SELECT 'มิถุนายน $year' as monthname,
    'มิ.ย. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-06'
    UNION
    SELECT 'กรกฎาคม $year' as monthname,
    'ก.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-07'
    UNION
    SELECT 'สิงหาคม $year' as monthname,
    'ส.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-08'
    UNION
    SELECT 'กันยายน $year' as monthname,
    'ก.ย. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-09'
    UNION
    SELECT 'ตุลาคม $year' as monthname,
    'ต.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-10'
    UNION
    SELECT 'พฤศจิกายน $year' as monthname,
    'พ.ย. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-11'
    UNION
    SELECT 'ธันวาคม $year' as monthname,
    'ธ.ค. $year' as monthcode,
    count(*) as count
    FROM serum_tear
    WHERE DATE_FORMAT(serumteardatetime, '%Y-%m') = '$year-12'
    )O ON O.monthname = N.monthname
    ";
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