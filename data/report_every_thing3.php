<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $unitofficeid =$_GET['unitofficeid'];
    $bloodgroupid =$_GET['bloodgroupid'];
    $donation=$_GET['donation'];

$namepatient = $_GET['namepatient'];

    if($unitofficeid == ''){
        $unitoffice = '';
    }
    else{
        $unitoffice = "AND DN.unitofficeid LIKE '$unitofficeid'";
    }

    if($bloodgroupid == ''){
        $bloodgroup = '';
    }
    else{
        $bloodgroup = "AND DN.blood_group LIKE '$bloodgroupid'";
    }
    if($donation == ''){
        $donation = '';
    }
    else{
        $donation = "AND DN.donation_status = '$donation'";
    }

if ($namepatient == '') {
    $namepatient = '';
} else {
    $namepatient = "AND DN.patientname = '$namepatient'";
}

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER By DN.donation_date, DN.hn , DN.donateid) AS num_row ,
    DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS donation_date,
    DN.bag_number,
    CASE 
		WHEN DN.donation_status = '1' THEN 'บริจาคได้'
		ELSE 'บริจาคไม่ได้' 
	END AS donation_status,
    DN.hn,DN.patientname,
    DN.blood_group,
    UF.unitofficename , 
    DN.unitofficeid
    FROM donate DN
    LEFT JOIN unit_office UF ON DN.unitofficeid = UF.unitofficeid
    WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
    AND DN.donation_get_type_id = 2
    $bloodgroup
    $unitoffice
    $donation
    $namepatient
    ORDER BY DN.donation_date,  DN.hn , DN.donateid
    ";
   
    
    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
	while($row = mysqli_fetch_array($query))
	{
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>" . $row['num_row'] . "</td>";
        $data.= "<td>" . $row['donation_date'] . "</td>";
        $data.= "<td>" . $row['bag_number'] . "</td>";
        $data.= "<td>" . $row['hn'] . "</td>";
        $data.= "<td class=".$text.">" . $row['patientname'] . "</td>";
        $data.= "<td>" . $row['blood_group'] . "</td>";
        $data.= "<td class=".$text.">" . $row['unitofficename'] . "</td>";
        $data.= "<td>" . $row['donation_status'] . "</td>";
        $data.= "<td></td>";
        $data.= "</tr>";
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
        'number' => $number
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
