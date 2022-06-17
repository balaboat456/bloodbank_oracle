<?php
    include('../../connection.php');

    $condition = '';
    $bloodgroupid =$_GET['bloodgroupid'];
    $donation_type_id =$_GET['donation_type_id'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $rhid =$_GET['rhid'];
    $day =$_GET['day'];

    if(!empty($bloodgroupid) && $bloodgroupid != 'null' )
    $condition = $condition." AND DR.blood_group = '$bloodgroupid' ";

    if(!empty($rhid) && $rhid != 'null' )
    {
        if($rhid == 'Rh ')
        $rhid = 'Rh+';

        $condition = $condition." AND DR.rh = '$rhid' ";
    }
    


    if(!empty($fromdate))
    {
        if(empty($todate))
        {
            $todate = $fromdate ;
        }
        $condition = $condition." AND DT.donation_date BETWEEN '$fromdate' AND '$todate' ";
    }
    

    $sql = "SELECT DT.*,
                DR.donorcode,
                CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
                PV.provinceth,
                DR.donoremail,
                DR.donormobile,
                DR.donorage,
                DR.blood_group,
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
                DR.issendletter,
                RH.rhname3
    FROM donate DT
    LEFT JOIN donor DR ON DT.donorid = DR.donorid
    LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
    LEFT JOIN provinces PV ON DR.provinceid = PV.provinceid
    LEFT JOIN rh RH ON DR.rh = RH.rhid
    WHERE DT.donation_type_id = '$donation_type_id'
    AND !(CONCAT(DT.tpharpr,DT.hbsag,DT.hivagab,DT.hcvab,DT.hbvdna,DT.hcvrna,DT.hivrna) LIKE '%+%')
	AND IFNULL(DT.donation_status,'1') != 2
    $condition
    ORDER BY DT.donateid"
    ;

    error_log($sql);
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