<?php
    include('../../connection.php');

    $condition = '';
    $requestbloodid =$_GET['requestbloodid'];


    $sql = "SELECT 
    DATE_FORMAT(STR_TO_DATE(BWR.blood_wash_use_date, '%Y-%m-%d'),'%d/%m/%Y') AS blood_wash_use_date_2 ,
    DOC.doctorname,
    OFF.unitofficename,
    RH.rhname3,
    BWR.*
    FROM blood_washed_red_cell BWR
    LEFT JOIN doctor DOC ON DOC.doctorid = BWR.user_order
    LEFT JOIN unit_office OFF ON OFF.unitofficeid = BWR.unitofficeid
    LEFT JOIN rh RH ON RH.rhid = BWR.rhid
    WHERE BWR.requestbloodid = '$requestbloodid' ";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
    // $resultArray =[$hn, $requestbloodid];
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
