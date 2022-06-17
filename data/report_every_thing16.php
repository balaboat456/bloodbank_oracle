<?php

include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$departmentid = $_GET['departmentid'];
$bloodgroupid = $_GET['bloodgroupid'];
$rhid = $_GET['rhid'];

$donation_status = $_GET['donation_status'];

if ($departmentid == '') {
    $department = '';
} else {
    $department = "AND DN.departmentid = '$departmentid'";
}
///////////////////////////////////////////////////////////////
if ($bloodgroupid == '') {
    $bloodgroup = '';
} else {
    $bloodgroup = "AND DR.blood_group LIKE '$bloodgroupid'";
}
///////////////////////////////////////////////////////////////
if ($rhid == '') {
    $unitname = '';
} else {
    $rh = "AND RH.rhid LIKE '$rhid'";
}

$sql = "SELECT 	IFNULL(DN.departmentid,'') AS departmentid,
DM.departmentname,
DR.donorcode,
CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
CASE WHEN CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,'')) = '' THEN CONCAT(IFNULL(DR.address_current,''),' ',IFNULL(DR.address2_current,''))
ELSE  CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,'')) END AS address,  
DR.donormobile,
DR.donoremail,
DR.blood_group,
RH.rhname3,
DN.donation_qty,
DN.bag_number ,
DATE_FORMAT(DN.donation_date,'%d/%m/%Y') as donation_date,donorage ,
CASE WHEN DN.donation_status = 1 THEN 'ได้'
    WHEN DN.donation_status = 2 THEN 'ไม่ได้'
    ELSE 'ไม่ได้ระบุสถานะ' END AS donation_status 
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN rh RH ON DR.rh = RH.rhid
LEFT JOIN department_ DM ON DN.departmentid = DM.departmentid
WHERE DN.isunitoffice = 1 
AND DN.donation_date BETWEEN '$fromdate' AND '$todate'
AND (CASE WHEN '$donation_status' = '1' THEN DN.donation_status = '1' ELSE true END)
AND (CASE WHEN '$donation_status' = '2' THEN DN.donation_status = '2' ELSE true END)
$department
$bloodgroup
$rh
ORDER BY DN.bag_number ASC
";


$query = mysqli_query($conn, $sql);

$number = "";
$numm = 0;
$data = "";
$text_left_table = '"left_table"';
$text_table_no_scroll = '"table-no-scroll"';
$text_table_list_borrow = '"table_list_borrow"';
$text_td_table = '"td-table"';
$text_2 = '"2"';
$text_13 = '"13"';
$text_width_35 = '"width:35%"';
$id_table = [];
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
while ($row = mysqli_fetch_array($query)) {
    $numm += 1;
    if ($number != $row['departmentid']) {
        // $data.= "</table>";
        // $data.= "</div>";
        // $data.= "<br>";
        // $data.= "<br>";
        // $number = "";
        // $number.= $row['hospitalid'];
        // $data.= $row['hospitalname'];
        // $data.= "<div class=$text_table_no_scroll>";
        // $data.= "<table id=$text_table_list_borrow>";
        // $data.= "<thead>";
        // $data.= "<tr>";
        // $data.= "<th class=$text_td_table>ลำดับ $departmentid</th>";
        // $data.= "<th class=$text_td_table>เลขประจำตัวผู้ป่วย</th>";
        // $data.= "<th class=$text_td_table>ชื่อ-สกุล</th>";
        // $data.= "<th class=$text_td_table>ที่อยู่</th>";
        // $data.= "<th class=$text_td_table>เบอร์โทร</th>";
        // $data.= "<th class=$text_td_table>หมู่เลือด</th>";
        // $data.= "<th class=$text_td_table>Rh</th>";
        // $data.= "<th class=$text_td_table>ครั้งที่บริจาค</th>";
        // $data.= "<th class=$text_td_table>วันที่บริจาค</th>";
        // $data.= "</tr>";
        // $data.= "</thead>";
        $data .= "<tr>";
        $data .= "<th class=$text_td_table>" . $numm . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donorcode'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['bag_number'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['fullname'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donorage'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['departmentname'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['address'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donormobile'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['blood_group'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['rhname3'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donation_qty'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donation_date'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donation_status'] . "</th>";
        $data .= "</tr>";
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    } else {
        $data .= "<tr>";
        $data .= "<th class=$text_td_table>" . $row['donorcode'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['bag_number'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['fullname'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donorage'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['departmentname'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['address'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donormobile'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donoremail'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['blood_group'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['rhname3'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donation_qty'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donation_date'] . "</th>";
        $data .= "<th class=$text_td_table>" . $row['donation_status'] . "</th>";
        $data .= "</tr>";
    }
}
echo json_encode(
    array(
        'status' => true,
        'data' => $data,
        'sql' => $sql
    )

);

mysqli_close($conn);
