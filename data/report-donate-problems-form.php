<?php

include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$donationproblemsreportid = $_GET['donationproblemsreportid'];
$unitnameid = $_GET['unitnameid'];
$placeid = $_GET['placeid'];
$activityid = $_GET['activityid'];

if ($placeid == 1) {
    $place = "AND DN.placeid LIKE '1'";
} else if ($placeid == 2) {
    $place = "AND DN.placeid LIKE '2'";
    if ($unitnameid != '') {
        $unitname = "AND DN.unitnameid LIKE '$unitnameid'";
    } else {
        $unitname = '';
    }
} else if ($placeid == 3) {
    $place = "AND DN.placeid LIKE '3'";
    if ($activityid != '') {
        $activityname = "AND DN.activityid LIKE '$activityid'";
    } else {
        $activityname = '';
    }
} else {
    $place = '';
    $activityname = '';
}

if ($donationproblemsreportid == 1) {
    $sql = "SELECT 	 DN.placeid,
    PL.placename,
    UN.dmu_name,
    DN.donatenocauseid,
    DNC.donatenocausename,
    DR.donorcode,
    CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    DN.donation_date,
	CASE WHEN DP.donationproblemsname = 'Other' THEN CONCAT(DP.donationproblemsname,' ',DN.donationproblemsdetail)
    ELSE DP.donationproblemsname END AS donationproblemsname ,
		DP.donationproblemsid,
		DR.donoridcard
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
JOIN donation_problems DP ON DN.donationproblemsid = DP.donationproblemsid
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
$place
$unitname
$activityname
ORDER BY DN.placeid,DN.donatenocauseid,DN.donation_date
";

    $query = mysqli_query($conn, $sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    while ($row = mysqli_fetch_array($query)) {
        $oldDate = $row['donation_date'];
        $arr = explode('-', $oldDate);
        $newDate = $arr[2] . '/' . $arr[1] . '/' . $arr[0];
        $number += 1;
        $data .= "<tr>";
        $data .= "<td>" . $number . "</td>";
        $data .= "<td>" . $newDate . "</td>";
        $data .= "<td>" . $row['donorcode'] . "</td>";
        $data .= "<td>" . $row['donoridcard'] . "</td>";
        $data .= "<td>" . $row['fullname'] . "</td>";
        $data .= "<td>" . $row['donationproblemsname'] . "</td>";
        $data .= "</tr>";
    }
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
            'sql' => $sql,
        )

    );

    // echo $data;
    mysqli_close($conn);
} else if ($donationproblemsreportid == 2) {
    $sql = "SELECT 		DN.placeid,
    PL.placename,
    UN.dmu_name,
    DN.donatenocauseid,
    DNC.donatenocausename,
    DR.donorcode,
    CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    DN.donation_date,
		DRT.donatereactionname,
		DRT.donatereactionid,
		DR.donoridcard
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
JOIN donate_reaction DRT ON DRT.donatereactionid = DN.donatereactionid
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
$place
$unitname
$activityname
ORDER BY DN.placeid,DN.donatenocauseid,DN.donation_date
";

    $query = mysqli_query($conn, $sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    while ($row = mysqli_fetch_array($query)) {
        $oldDate = $row['donation_date'];
        $arr = explode('-', $oldDate);
        $newDate = $arr[2] . '/' . $arr[1] . '/' . $arr[0];
        $number += 1;
        $data .= "<tr>";
        $data .= "<td>" . $number . "</td>";
        $data .= "<td>" . $newDate . "</td>";
        $data .= "<td>" . $row['donorcode'] . "</td>";
        $data .= "<td>" . $row['donoridcard'] . "</td>";
        $data .= "<td>" . $row['fullname'] . "</td>";
        $data .= "<td>" . $row['donatereactionname'] . "</td>";
        $data .= "</tr>";
    }
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
            'sql' => $sql,
        )

    );

    // echo $data;
    mysqli_close($conn);
} else if ($donationproblemsreportid == 3) {
    $sql = "SELECT 		DN.placeid,
    PL.placename,
    UN.dmu_name,
    DN.donatenocauseid,
    DNC.donatenocausename,
    DR.donorcode,
    CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    DN.donation_date,
		DNS.donatenostatusname,
		DNS.donatenostatusid,
		DR.donoridcard,
		DN.donatenocauseremark,
		CONCAT(IFNULL(DNS.donatenostatusname,''),' ',IFNULL(DN.donatenocauseremark,''))AS remark
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
JOIN donate_no_status DNS ON DNS.donatenostatusid = DN.donatenostatusid
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
$place
$unitname
$activityname
ORDER BY DN.placeid,DN.donatenocauseid,DN.donation_date
";

    $query = mysqli_query($conn, $sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    while ($row = mysqli_fetch_array($query)) {
        $oldDate = $row['donation_date'];
        $arr = explode('-', $oldDate);
        $newDate = $arr[2] . '/' . $arr[1] . '/' . $arr[0];
        $number += 1;
        $data .= "<tr>";
        $data .= "<td>" . $number . "</td>";
        $data .= "<td>" . $newDate . "</td>";
        $data .= "<td>" . $row['donorcode'] . "</td>";
        $data .= "<td>" . $row['donoridcard'] . "</td>";
        $data .= "<td>" . $row['fullname'] . "</td>";
        $data .= "<td>" . $row['remark'] . "</td>";
        $data .= "</tr>";
    }
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
            'sql' => $sql,
        )

    );

    // echo $data;
    mysqli_close($conn);
}
