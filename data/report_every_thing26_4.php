<?php
    include('../connection.php');

    $condition = '';
    $fromdatetime =$_GET['fromdatetime'];
    $todatetime =$_GET['todatetime'];
    $usercreate =$_GET['usercreate'];

    if(!empty($usercreate))
    $condition = " AND ST.staffid = '$usercreate' ";

    $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER By ST.serumteardatetime) AS num_row ,
    	ST.* ,
                UO.unitofficename,
                DT.doctorname,
                VOL.serumtearvolumename,
                PT.patientfullname,
                PT.patienthn,
                CONCAT(S.name,' ',S.surname) AS usercreatename
                
            FROM serum_tear ST
            LEFT JOIN patient PT ON ST.patientid = PT.patientid
            LEFT JOIN unit_office UO ON ST.unitofficeid = UO.unitofficeid
            LEFT JOIN doctor DT ON ST.doctorid = DT.doctorid
            LEFT JOIN serum_tear_volume VOL ON ST.serumtearvolumeid = VOL.serumtearvolumeid
            LEFT JOIN staff S ON ST.staffid = S.id
            WHERE ST.active <> 0
            AND ST.serumteardatetime BETWEEN '$fromdatetime' AND '$todatetime'
            $condition
            ORDER BY ST.serumteardatetime";
 
    
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