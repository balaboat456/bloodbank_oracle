<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $unitnameid =$_GET['unitnameid'];
    $placeid =$_GET['placeid'];
    $donation_status = $_GET['donation_status'];
$activityid = $_GET['activityid'];
    
    $sql = "SELECT 	
DN.activityid,
DN.placeid,
DNA.activityname,
    PL.placename,
    UN.dmu_name,
    DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS  donation_date,
    CASE WHEN DATE_FORMAT(DN.expired_date,'%d/%m/%Y') = '00/00/0000' THEN ''
	ELSE DATE_FORMAT(DN.expired_date,'%d/%m/%Y') END  AS expired_date ,
    DN.bag_number,
    CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    DR.donorage,
    DR.blood_group,
    DGT.donation_get_type_name,
    UO.unitofficename,
    BT.bagtypename,
    DN.donation_qty,
    CONCAT_WS(' ',CAU.donatenocausename,DN.donateremark) AS donateremark ,
    CASE WHEN DN.donation_status = 1 THEN 'ได้'
		WHEN DN.donation_status = 2 THEN 'ไม่ได้'
		ELSE 'ไม่ได้ระบุสถานะ' END AS donation_status
FROM donate DN
LEFT JOIN unit_office UO ON DN.unitofficeid = UO.unitofficeid
LEFT JOIN donate_no_cause CAU ON DN.donatenocauseid = CAU.donatenocauseid
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN donation_get_type DGT ON DN.donation_get_type_id = DGT.donation_get_type_id
LEFT JOIN bag_type BT ON DN.bag_type_id = BT.bagtypeid
LEFT JOIN donate_activity DNA ON DN.activityid = DNA.activityid
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
AND (CASE WHEN '$donation_status' = '1' THEN DN.donation_status = '1' ELSE true END)
AND (CASE WHEN '$donation_status' = '2' THEN DN.donation_status = '2' ELSE true END)

AND (CASE WHEN '$placeid' = '1' THEN DN.placeid = '1' ELSE true END)
AND (CASE WHEN '$placeid' = '2' THEN (CASE WHEN '$unitnameid' != 0 THEN (DN.unitnameid = '$unitnameid' AND DN.placeid = 2)  ELSE DN.placeid = 2 END) ELSE true END)
AND (CASE WHEN '$placeid' = '3' THEN (CASE WHEN '$activityid' != 0 THEN (DN.activityid = '$activityid' AND DN.placeid = 3)  ELSE DN.placeid = 3 END) ELSE true END)
GROUP BY DN.donateid
ORDER BY DN.donation_date , DN.bag_number
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
        $data.= "<td>" . $number . "</td>";
        $data .= "<td>" . $row['donation_date'] . "</td>";
        // $data .= "<td>" . $row['expired_date'] . "</td>";
        $data.= "<td>" . $row['bag_number'] . "</td>";
        $data.= "<td $style_left>" . $row['fullname'] . "</td>";
        $data.= "<td>" . $row['donorage'] . "</td>";
        $data.= "<td>" . $row['blood_group'] . "</td>";
        $data.= "<td $style_left>" . $row['donation_get_type_name'] ." ". $row['unitofficename'] . "</td>";
        $data.= "<td $style_left>" . $row['bagtypename'] . "</td>";
        $data.= "<td>" . $row['donation_qty'] . "</td>";
        $data .= "<td>" . $row['donation_status'] . "</td>";
        if($placeid == '2'){
        $data .= "<td>" . $row['dmu_name'] . "</td>";
        }
        else if($placeid == '3'){
        $data .= "<td>" . $row['activityname'] . "</td>";
        }
        else{

        }
        $data.= "<td>" . $row['donateremark'] . "</td>";
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
