<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    $sql = "SELECT 	ST.* ,
                UO.unitofficename,
                DT.doctorname,
                VOL.serumtearvolumename,
                PT.patientfullname,
                STF.name AS staffname
                
            FROM serum_tear ST
            LEFT JOIN patient PT ON ST.patientid = PT.patientid
            LEFT JOIN unit_office UO ON ST.unitofficeid = UO.unitofficeid
            LEFT JOIN doctor DT ON ST.doctorid = DT.doctorid
            LEFT JOIN staff STF ON ST.staffid = STF.id
            LEFT JOIN serum_tear_volume VOL ON ST.serumtearvolumeid = VOL.serumtearvolumeid
            WHERE ST.active <> 0
            AND PT.patienthn = '$hn'
            ORDER BY ST.serumtearid DESC";
 
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>