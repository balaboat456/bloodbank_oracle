<?php

include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];

$hospitalid = $_GET['hospitalid'];
$bloodstockpaytypeid = $_GET['bloodstockpaytypeid'];

if ($hospitalid == '') {
    $hospital = '';
} else {
    $hospital = "AND DN.placeid LIKE '$hospitalid'";
}

if ($bloodstockpaytypeid == '') {
    $bloodstockpaytype = '';
} else {
    $bloodstockpaytype = "AND DN.placeid LIKE '$bloodstockpaytypeid'";
}

$sql = "SELECT BR.* , 
                IM.bloodborrowitemid,
                IM.bloodstocktypeid,
                ST.bloodstocktypename2,
                IFNULL(IM.a_qty,0) AS a_qty,
                IFNULL(IM.b_qty,0) AS b_qty,
                IFNULL(IM.o_qty,0) AS o_qty,
                IFNULL(IM.ab_qty,0) AS ab_qty,

                IFNULL(IM.cryo_qty,0) AS cryo_qty,
                
                IFNULL(IM.a_qty_get,0) AS a_qty_get,
                IFNULL(IM.b_qty_get,0) AS b_qty_get,
                IFNULL(IM.o_qty_get,0) AS o_qty_get,
                IFNULL(IM.ab_qty_get,0) AS ab_qty_get,
                IFNULL(IM.cryo_qty_get,0) AS cryo_qty_get
            FROM blood_borrow BR 
            LEFT JOIN blood_borrow_item IM ON BR.bloodborrowid = IM.bloodborrowid
            LEFT JOIN bloodstock_type ST ON IM.bloodstocktypeid = ST.bloodstocktypeid
            WHERE true
            $hospital
            $bloodstockpaytype
            ORDER BY bloodborrowid DESC
            LIMIT 200";


$query = mysqli_query($conn, $sql);

$number = "";
$numm = 0;

$text_left_table = '"left_table"';
$text_table_no_scroll = '"table-no-scroll"';
$text_style = 'style="width:7000px"';
$text_table_list_borrow = '"table_list_borrow"';
$text_td_table = '"td-table"';
$text_2 = '"2"';
$text_13 = '"13"';
$text_width_35 = '"width:35%"';
$id_table = [];
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$data = "";
while ($row = mysqli_fetch_array($query)) {
    if ($row['bloodexchangetypeid'] == 1) {
        $bloodexchangetypeid = 'Plasma Exchange';
    } else if ($row['bloodexchangetypeid'] == 2) {
        $bloodexchangetypeid = 'Leukapheresis ';
    } else if ($row['bloodexchangetypeid'] == 3) {
        $bloodexchangetypeid = 'Blood Exchange';
    } else {
        $bloodexchangetypeid = '';
    }
    if ($row['exchangemachineid'] == 1) {
        $exchangemachineid = 'Haemonetic A';
    } else if ($row['exchangemachineid'] == 2) {
        $exchangemachineid = 'Amicus ';
    } else if ($row['exchangemachineid'] == 3) {
        $exchangemachineid = 'Trima';
    } else {
        $exchangemachineid = '';
    }
    $data .= "<tr>";
    $data .= "<td class=$text_td_table>" . $row['bloodexchangedatetime'] . "</td>";
    $data .= "<td class=$text_td_table>" . $row['patienthn'] . "</td>";
    $data .= "<td class=$text_td_table>" . $row['patientfullname'] . "</td>";
    $data .= "<td class=$text_td_table>" . $bloodexchangetypeid . "</td>";
    $data .= "<td class=$text_td_table>" . $exchangemachineid . "</td>";
    $data .= "<td class=$text_td_table>" . $row['diagnosis'] . "</td>";
    $data .= "</tr>";
}
echo json_encode(
    array(
        'status' => true,
        'data' => $data
    )

);

mysqli_close($conn);
