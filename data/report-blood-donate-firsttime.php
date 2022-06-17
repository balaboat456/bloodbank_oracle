<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $bloodgroup =$_GET['bloodgroup'];
    $rh = $_GET['rh'];

    $donation_status = $_GET['donation_status'];

    if(!empty($bloodgroup))
    $condition = $condition."AND DR.blood_group = '$bloodgroup'";
    if(!empty($rh))
    $condition = $condition."AND DR.rh = '$rh'";

    if($donation_status != '0'){
    $condition = $condition . "AND DN.donation_status = '$donation_status'";
    }
    

    $sql = "SELECT
	DR.donorcode,
    DR.donoridcard,
	CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname, ''),' ',IFNULL(DR.lname,'') ) as fullname,
	DR.donoragetext,
CASE
		WHEN CONCAT( IFNULL( DR.address, '' ), ' ', IFNULL( DR.address2, '' ), ' ', DR.zipcode ) = '' 
		OR CONCAT( IFNULL( DR.address, '' ), ' ', IFNULL( DR.address2, '' ), ' ', DR.zipcode ) IS NULL THEN
			CONCAT( IFNULL( DR.address_current, '' ), ' ', IFNULL( DR.address2_current, '' ), ' ', DR.zipcode_current ) 
			ELSE CONCAT( IFNULL( DR.address, '' ), ' ', IFNULL( DR.address2, '' ), ' ', DR.zipcode ) 
			END AS address,
			DR.donormobile,
			DR.blood_group,
			RH.rhname,
			DN.donation_qty,
			DATE_FORMAT(DN.donation_date,'%d/%m/%Y') as donation_date,
		CASE WHEN DN.donation_status = '2' THEN 'ไม่ผ่าน'
			WHEN DN.donation_status = '1' THEN 'ผ่าน'
			ELSE '' END AS donation_status
	FROM
		donate DN
		LEFT JOIN donor DR ON DN.donorid = DR.donorid 
		LEFT JOIN rh RH ON RH.rhid = DR.rh
		LEFT JOIN prefix PF ON PF.prefixid = DR.prefixid
WHERE
	DN.isfirstblooddonation = 1
	AND DN.donation_date BETWEEN '$fromdate' AND '$todate'
    $condition 
GROUP BY 
	DN.donorid
ORDER BY
	DN.donation_date DESC , DN.bag_number ASC
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
                'sql' => $sql
            )
            
        );
    
        mysqli_close($conn);
    ?>