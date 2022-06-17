<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];


    $sql = "SELECT (
        SELECT COUNT(*)  FROM donate 
        WHERE donation_type_id = 2
            AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS donationcount,
        (
        SELECT COUNT(*)  
        FROM donate DN
        LEFT JOIN donor DR ON DN.donorid = DR.donorid
        WHERE DN.donation_type_id = 2 AND DR.prefixid =  1
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS donationman,
        (
        SELECT COUNT(*)  
        FROM donate DN
        LEFT JOIN donor DR ON DN.donorid = DR.donorid
        WHERE DN.donation_type_id = 2 AND DR.prefixid =  2
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS donationwoman,
        (
        SELECT COUNT(*)  FROM donate  WHERE donation_type_id = 2 AND donation_qty = 1
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS newqty,
        (
        SELECT COUNT(*)  FROM donate  WHERE donation_type_id = 2 AND donation_qty != 1
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS oldqty,
        (
        SELECT COUNT(*)  FROM donate  WHERE donation_type_id = 2 AND blood_group = 'A'
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS bloodgroup_a,
        (
        SELECT COUNT(*)  FROM donate  WHERE donation_type_id = 2 AND blood_group = 'B'
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS bloodgroup_b,
        (
        SELECT COUNT(*)  FROM donate  WHERE donation_type_id = 2 AND blood_group = 'O'
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS bloodgroup_o,
        (
        SELECT COUNT(*)  FROM donate  WHERE donation_type_id = 2 AND blood_group = 'AB'
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS bloodgroup_ab,
        (
        SELECT count(*) FROM bloodstock WHERE bloodtype = 'SDP' AND bloodstockid = 1
        ) AS sdp_qty,
        (
        SELECT COUNT(*) FROM donate WHERE IFNULL(problemmachineid,0) != 0
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS problemmachine_qty,
        (
        SELECT COUNT(*) FROM donate WHERE IFNULL(problemdonorid,0) != 0
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS problemdonor_qty,
        (
        SELECT COUNT(*) FROM donate WHERE IFNULL(problemproductid,0) != 0
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS problemproduct_qty,
        (
        SELECT COUNT(*) FROM donate WHERE IFNULL(problemhumanid,0) != 0
        AND YEAR(donation_date) BETWEEN '$fromdate' AND '$todate'
        ) AS problemhuman_qty
";
   
    
    $query = mysqli_query($conn,$sql);

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
    $row = '"row"';
    $col_sm_2 = '"col-sm-2"';
    $col_sm_4 = '"col-sm-4"';
    $col_sm_6 = '"col-sm-6"';
    $font_18 = 'style="font-size:18px"';
    $style_right = 'style="text-align: right; font-size:18px;"';
    $noborder = 'style="border: none; font-size:18px; font-weight: bold;"';

    $td_ag_right = 'style="text-align:right"';
    $td_ag_left = 'style="text-align:left"';


	while($row = mysqli_fetch_array($query)){
        
        // $data.= "<center><h4><b>รายงานสถิติห้องรับบริจาคเกล็ดโลหิต ปี ".$fromdate." - ".$todate."</b></h4></center>";
        $data.= "<h4><b>ข้อมูลจำนวนผู้บริจาคเกล็ดโลหิตและผลิตภัณฑ์เกล็ดโลหิต</b></h4><br>";

        $data.= "<table $noborder>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>1. จำนวนผู้บริจาคเกล็ดโลหิตทั้งหมด</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['donationcount']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>2. จำแนกตามเพศ</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;2.1 ชาย</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['donationman']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;2.2 หญิง</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['donationwoman']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>3. จำแนกตามประเภทผู้บริจาคเกล็ดโลหิต</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;3.1 ผู้บริจาคเกล็ดโลหิตรายใหม่</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['newqty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;3.2 ผู้บริเกล็ดโลหิตเก่า</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['oldqty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>4. จำแนกตามหมู่โลหิต</td>";
        $data.= "</tr>";

        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;4.1 หมู่โลหิต A</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['bloodgroup_a']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;4.2 หมู่โลหิต B</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['bloodgroup_b']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;4.3 หมู่โลหิต O</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['bloodgroup_o']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;4.4 หมู่โลหิต AB</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['bloodgroup_ab']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";

        $data.= "<tr>";
        $data.= "<td $td_ag_left>5. จำนวนผลิตภัณฑ์โลหิตทั้งหมด</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['sdp_qty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ยูนิต</td>";
        $data.= "</tr>";

        $data.= "<tr>";
        $data.= "<td $td_ag_left>6. ปัญหาที่พบ</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;6.1 เครื่องมือและอุปกรณ์</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['problemmachine_qty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;6.2 ผู้บริจาคโลหิต</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['problemdonor_qty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;6.3 ผลิตภัณฑ์</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['problemproduct_qty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;6.4 บุคคลากร</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['problemhuman_qty']."</td>";
        $data.= "<td $td_ag_right>&nbsp;&nbsp;&nbsp;ราย</td>";
        $data.= "</tr>";
        $data.= "</table>";
        $data.= "<br>";
        $data.= "<br>";
        $data.= "<br>";
        $data.= "<br>";
        $data.= "<br>";

	}
    
    $data.= "<tr>";
    $data.= "</tr>";  
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    mysqli_close($conn);
?>