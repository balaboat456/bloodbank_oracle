<?php

include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$user_login = $_GET['user_login'];

$patientcode = $_GET['patientcode'];

if ($patientcode == '') {
}
else{
    $condition = "AND DR.donoridcard LIKE '$patientcode'";
}
$sql = "SELECT 	 DN.placeid,
PL.placename,
UN.dmu_name,
DN.donatenocauseid,
DNC.donatenocausename,
DR.donorcode,
DN.donorid,
CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    DR.donoridcard,
    SUBSTR(DN.remarkaccident,1,51) AS remarkaccident,
     DN.donation_date,
    DN.donateid,
    DPI.donateid,
    DP.donateprintcertificatename,
    DPI.donateprintcertificateother,
    DPI.donateprintcertificate_user_login,
    CASE WHEN DP.donateprintcertificateid = 99 THEN DPI.donateprintcertificateother
		ELSE DP.donateprintcertificatename END AS donateprintcertificatename
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
JOIN donate_print_certificate_item DPI ON DN.donateid = DPI.donateid
JOIN donate_print_certificate DP ON DPI.donateprintcertificateid = DP.donateprintcertificateid
WHERE DATE(DPI.donateprintcertificateitemdatetime) BETWEEN '$fromdate' AND '$todate'
$condition
GROUP BY DN.donation_date, DR.donorcode,  DR.donoridcard, fullname , DP.donateprintcertificatename
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
    $data .= "<td>" . $row['donateprintcertificatename'] . "</td>";
    $data .= "<td>" . $row['donateprintcertificate_user_login']. "</td>";
    $data .= "</tr>";

    // array_push($resultArray,$row);
}
// $result = mysqli_fetch_array($query);

echo json_encode(
    array(
        'status' => true,
        'data' => $data,
        'sql' => $sql,
    )

);

// echo $data;
mysqli_close($conn);
