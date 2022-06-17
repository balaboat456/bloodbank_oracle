<?php
    include('../../connection.php');

$condition = '';
$patientfname =$_GET['patientfname'];
$patientlname = $_GET['patientlname'];

// patienthn , patientan , patientfullname , wardname , wardid
    $sql = "SELECT *
            FROM patient
            WHERE patientfname like '%$patientfname%'
            AND patientlname like '%$patientlname%'";
    
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
