<?php
    include('../../connection.php');

    $condition = '';
    
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND DT.donation_date BETWEEN '$fromdate' AND '$todate' ";

    $sql = "SELECT 	DT.*,
                    DR.donorcode,CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
                    PV.provinceth,
                    DR.donoremail,
                    DR.donorage,
                    DR.blood_group AS blood_group2,
                    DR.donormobile,
                    DR.address,
                    DR.address_moo,
                    DR.address_alley,
                    DR.address_street,
                    DR.address2,
                    DR.address_current,
                    DR.address_moo_current,
                    DR.address_alley_current,
                    DR.address_street_current,
                    DR.address2_current,
                    DR.issendletter
            FROM donate DT
            LEFT JOIN donor DR ON DT.donorid = DR.donorid
            LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
            LEFT JOIN provinces PV ON DR.provinceid = PV.provinceid
            WHERE IFNULL(DT.donation_status,'1') != 2
    AND !(CONCAT(IFNULL(DT.tpharpr,''),IFNULL(DT.hbsag,''),IFNULL(DT.hivagab,''),
                        IFNULL(DT.hcvab,''),IFNULL(DT.hbvdna,''),IFNULL(DT.hcvrna,''),IFNULL(DT.hivrna,'')) LIKE '%+%')
    $condition
    ORDER BY DT.donateid"
    ;
    $number = 0;
    $num = [];
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