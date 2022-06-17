<?php
    include('../../connection.php');

    $condition = '';
    $donorid =$_GET['donorid'];
  

    $sql = "SELECT DN.*,
                DR.donorcode,
                DR.donoridcard,
                DR.donorbirthday,
                DR.donorage,
                DR.donoroccupation,
                DR.donortelhome,
                DR.donormobile,
                DR.genderid,
                DR.prefixid,
                DR.fname,
                DR.lname,
                DR.address,
                DR.countryid,
                DR.provinceid,
                DR.districtid,
                DR.subdistrictid,
                DR.zipcode,
                DR.souvenirid,
                DR.blood_group,
                DR.rh,
                DR.antibody,
                DR.phenotype,
                ST.donatestatusname,
                RHSC.rhname3,
                PD.donationproblemsname,
                RT.donatereactionname,
                GROUP_CONCAT(IFNULL(FI.donateinfectedfilepath,'') SEPARATOR ',') AS group_donateinfectedfilepath          
                FROM donate DN
                LEFT JOIN donate_infected_file FI ON DN.donateid = FI.donateid AND FI.active <> 0
                LEFT JOIN donor DR ON DN.donorid = DR.donorid
                LEFT JOIN donatestatus ST ON DN.donation_status = ST.donatestatusid
                LEFT JOIN rh RHSC ON DN.bloodrhsceen_cross = RHSC.rhid
                LEFT JOIN donation_problems PD ON DN.donationproblemsid = PD.donationproblemsid
                LEFT JOIN donate_reaction RT ON DN.donatereactionid = RT.donatereactionid
                WHERE DN.donorid = '$donorid'
                GROUP BY DN.donateid
                ORDER BY DR.donorid ASC";
 
    
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