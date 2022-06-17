<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];


    $sql = "SELECT PT.* ,RH.rhname3
            FROM patient PT
            LEFT JOIN rh RH ON PT.patientrh = RH.rhid
            WHERE patienthn = '$hn' 
            AND patienthn != '' ";
    
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