<?php
    include('../../connection.php');

    $condition = '';
    $donorid =$_GET['donorid'];
  

    $sql = "SELECT * FROM (SELECT DN.*,
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
                DR.souvenirid AS donor_souvenirid,
                DR.blood_group AS donor_blood_group,
                DR.rh AS donor_rh,
                DR.antibody,
                DR.phenotype,
                ST.donatestatusname,
                RHSC.rhname3,
                PD.donationproblemsname,
                RT.donatereactionname,
                DNC.donatenocausename,
                GROUP_CONCAT(IFNULL(FI.donateinfectedfilepath,'') SEPARATOR ',') AS group_donateinfectedfilepath  ,
                CONCAT(IFNULL(SF.name,''),' ',IFNULL(SF.surname,'')) AS  confirmblooddonationname     ,
                BT.bagtypename  ,
                DNT.donation_type_name,
                IFNULL(PF.prefixname,'') AS prefixname 
                FROM donate DN
                LEFT JOIN donate_infected_file FI ON DN.donateid = FI.donateid AND FI.active <> 0
                LEFT JOIN donor DR ON DN.donorid = DR.donorid
                LEFT JOIN donatestatus ST ON DN.donation_status = ST.donatestatusid
                LEFT JOIN rh RHSC ON DN.bloodrhsceen_cross = RHSC.rhid
                LEFT JOIN donation_problems PD ON DN.donationproblemsid = PD.donationproblemsid
                LEFT JOIN donate_reaction RT ON DN.donatereactionid = RT.donatereactionid
                LEFT JOIN staff SF ON DN.confirmblooddonationid = SF.id
                LEFT JOIN bag_type BT ON DN.bag_type_id =   BT.bagtypeid
                LEFT JOIN donation_type DNT ON DN.donation_type_id =   DNT.donation_type_id
                LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
                LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
                WHERE DN.donorid = '$donorid'
                GROUP BY DN.donateid) M
                GROUP BY M.donation_date , M.donation_time
                ORDER BY M.donation_date DESC";
 
    
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