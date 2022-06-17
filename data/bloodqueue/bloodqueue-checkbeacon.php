<?php
    include('../../connection.php');
    include('../dateFormat.php');
    
    $condition = '';
  
    $fromdate = dateDiff543year($_GET['fromdate']);
    $todate = dateDiff543year($_GET['todate']);

// $sql = "SELECT * FROM request_beacon WHERE DATE_FORMAT(requestbeacontime,'%Y-%m-%d') 
// BETWEEN '$fromdate' AND '$todate' AND IFNULL(bag_number,'') != '' ORDER BY requestbeacontime DESC";

$sql = "SELECT RBC.beaconid , RBC.bag_number , RBC.bloodtype ,
BEA.beaconid , -- เลข reader ID
BEA.beaconname , -- rfid
BEA.requestbeacontime
FROM request_beacon BEA
JOIN request_blood_crossmacth RBC ON RBC.beaconid = BEA.beacon_tag 
JOIN request_blood RB ON RB.requestbloodid = RBC.requestbloodid
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
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>