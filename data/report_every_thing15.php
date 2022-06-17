<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $unitnameid =$_GET['unitnameid'];
    $placeid =$_GET['placeid'];
    $bloodgroupid =$_GET['bloodgroupid'];
    $rhid =$_GET['rhid'];
    $activityid = $_GET['activityid'];
    
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
    ///////////////////////////////////////////////////////////////
    if($bloodgroupid == ''){
        $bloodgroup = '';
    }
    else{
        $bloodgroup = "AND DR.blood_group LIKE '$bloodgroupid'";
    }
    ///////////////////////////////////////////////////////////////
    if($rhid == ''){
    $rh = '';
    }
    else{
        $rh = "AND RH.rhid LIKE '$rhid'";
    }

        ///////////////////////////////////////////////////////////////
    if ($activityid == '') {
    $activity = '';
    } else {
    $activity = "AND DN.activityid LIKE '$activityid'";
    }
    
    
    $sql = "SELECT 	DN.placeid,
    PL.placename,
    MU.dmu_name,
    DR.donorcode,
    CASE WHEN DR.donoridcard = '' THEN DR.donorpassport
    ELSE DR.donoridcard END AS donoridcard ,
    CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    CASE WHEN CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,'')) = '' THEN CONCAT(IFNULL(DR.address_current,''),' ',IFNULL(DR.address2_current,''))
    ELSE  CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,'')) END AS address,  
    DR.donormobile,
    DR.donoremail,
    DR.donorage,
    DR.blood_group,
    RH.rhname3,
    DN.donation_qty,
    DN.donation_date
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit MU ON DN.unitnameid = MU.id
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN rh RH ON DR.rh = RH.rhid
WHERE DN.donation_status = 1
AND DN.donation_date BETWEEN '$fromdate' AND '$todate'

AND (CASE WHEN '$rhid'  != '0' THEN (DN.rh = '$rhid') ELSE true END)
AND (CASE WHEN '$placeid' = '1' THEN DN.placeid = '1' ELSE true END)
AND (CASE WHEN '$placeid' = '2' THEN (CASE WHEN '$unitnameid' != 0 THEN (DN.unitnameid = '$unitnameid' AND DN.placeid = 2)  ELSE DN.placeid = 2 END) ELSE true END)
AND (CASE WHEN '$placeid' = '3' THEN (CASE WHEN '$activityid' != 0 THEN (DN.activityid = '$activityid' AND DN.placeid = 3)  ELSE DN.placeid = 3 END) ELSE true END)
AND (CASE WHEN '$bloodgroupid'  != '0' THEN (DN.blood_group = '$bloodgroupid') ELSE true END)
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
        $data .= "<td>" . $row['donoridcard'] . "</td>";
        $data.= "<td $style_left>".$row['fullname']."</td>";
        $data.= "<td>".$row['donorage']."</td>";
        $data.= "<td $style_left>".$row['address']."</td>";
        $data.= "<td>".$row['donormobile']."</td>";
        $data.= "<td>".$row['blood_group']."</td>";
        $data.= "<td>".$row['rhname3']."</td>";
        $data.= "<td>".$row['donation_qty']."</td>";
        $data.= "<td>".$newDate."</td>";

        $data.= "</tr>";
	}
    echo json_encode(
        array(
            'status' => true,
        'sql' => $sql,
            'data' => $data
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
