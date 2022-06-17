<?php

include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];




$sql = "SELECT 	 DN.placeid,
    PL.placename,
    UN.dmu_name,
    DN.donatenocauseid,
    DNC.donatenocausename,
    DR.donorcode,
    DN.donorid as donorid,
    CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
		DR.donoridcard,
        SUBSTR(DN.remarkaccident,1,51) AS remarkaccident,
        DN.donation_date,		DN.donateid
		
		
FROM donate DN
LEFT JOIN place PL ON DN.placeid = PL.placeid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN donate_no_cause DNC ON DN.donatenocauseid = DNC.donatenocauseid
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
WHERE (DN.donation_date BETWEEN '$fromdate' AND '$todate') AND  DN.remarkaccident <> ''
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
    $data .= "<td>" . $row['remarkaccident'] . "</td>";
    // $data .= "<td>" . '<button type = "button" onclick = "printreport2(' . $row['donorid'] . ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' . "</td>";
    
    $data .= "<td>" . '<button type = "button" onclick = "printreport2(' . $row['donateid'] . ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' . "</td>";
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
