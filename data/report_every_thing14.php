<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $unitnameid =$_GET['unitnameid'];
    $placeid =$_GET['placeid'];
    $activityid = $_GET['activityid'];
    
    $sql = "SELECT 	DN.placeid,
    PL.placename,
    UN.dmu_name,
    DN.donatenocauseid,
    DNC.donatenocausename,
    DR.donorcode,
    CASE WHEN DR.fname = '' THEN DN.patientname 
	ELSE CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) END AS fullname,
    DN.donation_date
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
WHERE DN.donation_status = 2
AND DN.donation_date BETWEEN '$fromdate' AND '$todate'
AND (CASE WHEN '$placeid' = '1' THEN DN.placeid = '1' ELSE true END)
AND (CASE WHEN '$placeid' = '2' THEN (CASE WHEN '$unitnameid' != 0 THEN (DN.unitnameid = '$unitnameid' AND DN.placeid = 2)  ELSE DN.placeid = 2 END) ELSE true END)
AND (CASE WHEN '$placeid' = '3' THEN (CASE WHEN '$activityid' != 0 THEN (DN.activityid = '$activityid' AND DN.placeid = 3)  ELSE DN.placeid = 3 END) ELSE true END)
ORDER BY DN.placeid,DN.donation_date,DN.donateid
";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
	while($row = mysqli_fetch_array($query))
	{
        $oldDate = $row['donation_date'];
        $arr = explode('-', $oldDate);
        $newDate = $arr[2].'/'.$arr[1].'/'.$arr[0];
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td>".$row['donorcode']."</td>";
        $data.= "<td $style_left>".$row['fullname']."</td>";
        $data.= "<td $style_left>".$row['donatenocausename']."</td>";
        $data.= "<td>".$newDate."</td>";
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
