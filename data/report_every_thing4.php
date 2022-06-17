<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $placeid =$_GET['placeid'];
    $unitnameid =$_GET['unitnameid'];

    if($placeid == ''){
        $place = '';
    }
    else{
        $place = "AND DN.placeid LIKE '$placeid'";
    }
    ///////////////////////////////////////////////////////////////
    if($unitnameid == ''){
        $unitname = '';
    }
    else{
        $unitname = "AND DN.unitnameid LIKE '$unitnameid'";
    }
    
    $sql = "SELECT DN.donation_date,
    DN.bag_number,CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) fullname,
    DR.donorcode,
    DN.tpharpr,
    DN.hbsag,
    DN.hivagab,
    DN.hcvab,
    DN.hbvdna,
    DN.hcvrna,
    DN.hivrna,
    DN.placeid,
    UN.dmu_name
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
$place
$unitname
AND CONCAT(DR.donorcode,DN.tpharpr,DN.hbsag,DN.hivagab,DN.hcvab,DN.hbvdna,DN.hcvrna,DN.hivrna) LIKE '%+%'
";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
	while($row = mysqli_fetch_array($query))
	{
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>" . $row['bag_number'] . "</td>";
        $data.= "<td>" . $row['tpharpr'] . "</td>";
        $data.= "<td>" . $row['hbsag'] . "</td>";
        $data.= "<td>" . $row['hivagab'] . "</td>";
        $data.= "<td>" . $row['hcvab'] . "</td>";
        $data.= "<td>" . $row['hbvdna'] . "</td>";
        $data.= "<td>" . $row['hcvrna'] . "</td>";
        $data.= "<td>" . $row['hivrna'] . "</td>";
        $data.= "<td>" . $row['donation_date'] . "</td>";
        $data.= "<td class=".$text.">" . $row['fullname'] . "</td>";
        $data.= "</tr>";
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
