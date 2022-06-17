<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];


    $sql = "SELECT SUM(1) total ,
    SUM(CASE WHEN machineid not in (1,3) THEN 1 ELSE 0 END) AS notmachine,
    SUM(CASE WHEN machineid = 1 THEN 1 ELSE 0 END) AS haemonetic,
    SUM(CASE WHEN machineid = 3 THEN 1 ELSE 0 END) AS trima,
    SUM(CASE WHEN blood_group = 'A' THEN 1 ELSE 0 END) AS blood_group_a,
    SUM(CASE WHEN blood_group = 'B' THEN 1 ELSE 0 END) AS blood_group_b,
    SUM(CASE WHEN blood_group = 'O' THEN 1 ELSE 0 END) AS blood_group_o,
    SUM(CASE WHEN blood_group = 'AB' THEN 1 ELSE 0 END) AS blood_group_ab,
    SUM(CASE WHEN blood_group in ('A','B','O','AB') THEN 1 ELSE 0 END) AS blood_group_total,
    
    SUM(CASE WHEN blood_group = 'A' AND IFNULL(sdpresultvolume,'') != '' THEN 1 ELSE 0 END) AS blood_group_2xd_a,
    SUM(CASE WHEN blood_group = 'B' AND IFNULL(sdpresultvolume,'') != '' THEN 1 ELSE 0 END) AS blood_group_2xd_b,
    SUM(CASE WHEN blood_group = 'O' AND IFNULL(sdpresultvolume,'') != '' THEN 1 ELSE 0 END) AS blood_group_2xd_o,
    SUM(CASE WHEN blood_group = 'AB' AND IFNULL(sdpresultvolume,'') != '' THEN 1 ELSE 0 END) AS blood_group_2xd_ab,
    SUM(CASE WHEN blood_group in ('A','B','O','AB') AND IFNULL(sdpresultvolume,'') != '' THEN 1 ELSE 0 END) AS blood_group_2xd_total,
    
    SUM(CASE WHEN blood_group = 'A' AND IFNULL(useless,'') != '' THEN 1 ELSE 0 END) AS blood_group_useless_a,
    SUM(CASE WHEN blood_group = 'B' AND IFNULL(useless,'') != '' THEN 1 ELSE 0 END) AS blood_group_useless_b,
    SUM(CASE WHEN blood_group = 'O' AND IFNULL(useless,'') != '' THEN 1 ELSE 0 END) AS blood_group_useless_o,
    SUM(CASE WHEN blood_group = 'AB' AND IFNULL(useless,'') != '' THEN 1 ELSE 0 END) AS blood_group_useless_ab,
    SUM(CASE WHEN blood_group in ('A','B','O','AB') AND IFNULL(useless,'') != '' THEN 1 ELSE 0 END) AS blood_group_useless_total,
    
    SUM(CASE WHEN blood_group = 'A' AND IFNULL(lostset,'') != '' THEN 1 ELSE 0 END) AS blood_group_lostset_a,
    SUM(CASE WHEN blood_group = 'B' AND IFNULL(lostset,'') != '' THEN 1 ELSE 0 END) AS blood_group_lostset_b,
    SUM(CASE WHEN blood_group = 'O' AND IFNULL(lostset,'') != '' THEN 1 ELSE 0 END) AS blood_group_lostset_o,
    SUM(CASE WHEN blood_group = 'AB' AND IFNULL(lostset,'') != '' THEN 1 ELSE 0 END) AS blood_group_lostset_ab,
    SUM(CASE WHEN blood_group in ('A','B','O','AB') AND IFNULL(lostset,'') != '' THEN 1 ELSE 0 END) AS blood_group_lostset_total,
    
    SUM(CASE WHEN blood_group = 'A' AND IFNULL(sdpresulttype,'2') = 1 THEN 1 ELSE 0 END) AS blood_group_sdpresulttype_a,
    SUM(CASE WHEN blood_group = 'B' AND IFNULL(sdpresulttype,'2') = 1 THEN 1 ELSE 0 END) AS blood_group_sdpresulttype_b,
    SUM(CASE WHEN blood_group = 'O' AND IFNULL(sdpresulttype,'2') = 1 THEN 1 ELSE 0 END) AS blood_group_sdpresulttype_o,
    SUM(CASE WHEN blood_group = 'AB' AND IFNULL(sdpresulttype,'2') = 1 THEN 1 ELSE 0 END) AS blood_group_sdpresulttype_ab,
    SUM(CASE WHEN blood_group in ('A','B','O','AB') AND IFNULL(sdpresulttype,'2') = 1 THEN 1 ELSE 0 END) AS blood_group_sdpresulttype_total,
    
    SUM(CASE WHEN IFNULL(problemmachineid,0) != 0 THEN 1 ELSE 0 END) AS problemmachine_qty,
    SUM(CASE WHEN IFNULL(problemdonorid,0) != 0 THEN 1 ELSE 0 END) AS problemdonor_qty,
    SUM(CASE WHEN IFNULL(problemproductid,0) != 0 THEN 1 ELSE 0 END) AS problemproduct_qty,
    SUM(CASE WHEN IFNULL(problemhumanid,0) != 0 THEN 1 ELSE 0 END) AS problemhuman_qty
    
FROM donate 
WHERE donation_type_id =2
AND donation_date BETWEEN '$fromdate' AND '$todate'
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

        $mistakee = $row['blood_group_useless_total']+$row['blood_group_lostset_total']+$row['blood_group_sdpresulttype_total'];

        $data.= "<div class=$row>";
        $data.= "<div class=$col_sm_2 $font_18>";
        $data.= "<b>Total ".$row['total']." sets</b>";
        $data.= "</div>";
        $data.= "</div>";
        $data.= "<div class=$row>";
        $data.= "<div class=$col_sm_2 $style_right>";
        $data.= "<b>ไม่ระบุ ".$row['notmachine']." sets</b>";
        $data.= "</div>";
        $data.= "<div class=$col_sm_2 $style_right>";
        $data.= "<b>Haemonetic ".$row['haemonetic']." sets</b>";
        $data.= "</div>";
        $data.= "<div class=$col_sm_2 $style_right>";
        $data.= "<b>Trima ".$row['trima']." sets</b>";
        $data.= "</div>";
        $data.= "</div>";
        $data.= "<div class=$text_table_no_scroll>";
        $data.= "<table id=$text_table_list_borrow>";
        $data.= "<thead>";
	    $data.= "<tr>";
	    $data.= "<th class=$text_td_table rowspan=$text_2 >Blood Group</th>";
        $data.= "<th class=$text_td_table rowspan=$text_2 >Donor</th>";
        $data.= "<th class=$text_td_table rowspan=$text_2 >Double doses</th>";
	    $data.= "<th class=$text_td_table colspan=$text_13>Process mistakee</th>";
        $data.= "</tr>";
	    $data.= "<tr>";
	    $data.= "<th class=$text_td_table>Useless Product</th>";
		$data.= "<th class=$text_td_table>Lost set</th>";
	    $data.= "<th class=$text_td_table>Pc Used</th>";
        $data.= "</tr>";
        $data.= "</thead>";
        $data.= "<tr>";
        $data.= "<td>A</td>";

        $data.= "<td>".$row['blood_group_a']."</td>";
        $data.= "<td>".$row['blood_group_2xd_a']."</td>";
        $data.= "<td>".$row['blood_group_useless_a']."</td>";
        $data.= "<td>".$row['blood_group_lostset_a']."</td>";
        $data.= "<td>".$row['blood_group_sdpresulttype_a']."</td>";

        $data.= "</td>";
        $data.= "<tr>";
        $data.= "<td>B</td>";

        $data.= "<td>".$row['blood_group_b']."</td>";
        $data.= "<td>".$row['blood_group_2xd_b']."</td>";
        $data.= "<td>".$row['blood_group_useless_b']."</td>";
        $data.= "<td>".$row['blood_group_lostset_b']."</td>";
        $data.= "<td>".$row['blood_group_sdpresulttype_b']."</td>";

        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td>O</td>";

        $data.= "<td>".$row['blood_group_o']."</td>";
        $data.= "<td>".$row['blood_group_2xd_o']."</td>";
        $data.= "<td>".$row['blood_group_useless_o']."</td>";
        $data.= "<td>".$row['blood_group_lostset_o']."</td>";
        $data.= "<td>".$row['blood_group_sdpresulttype_o']."</td>";

        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td>AB</td>";

        $data.= "<td>".$row['blood_group_ab']."</td>";
        $data.= "<td>".$row['blood_group_2xd_ab']."</td>";
        $data.= "<td>".$row['blood_group_useless_ab']."</td>";
        $data.= "<td>".$row['blood_group_lostset_ab']."</td>";
        $data.= "<td>".$row['blood_group_sdpresulttype_ab']."</td>";

        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td>SUM</td>";

        $data.= "<td>".$row['blood_group_total']."</td>";
        $data.= "<td>".$row['blood_group_2xd_total']."</td>";
        $data.= "<td>".$row['blood_group_useless_total']."</td>";
        $data.= "<td>".$row['blood_group_lostset_total']."</td>";
        $data.= "<td>".$row['blood_group_sdpresulttype_total']."</td>";

        $data.= "</tr>";
        $data.= "</table>";
	    $data.= "</div>";

        $data.= "<div class=$col_sm_2 $font_18>";
        $data.= "<b>Total of :</b>";
        $data.= "</div>";
        
        $data.= "<table $noborder>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Apheresis set</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>";
        $data.= "<td>".$row['total']."</td>";
        $data.= "<td $td_ag_left>sets</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Donor</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>";
        $data.= "<td>".$row['blood_group_total']."</td>";
        $data.= "<td $td_ag_left>persons</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Double doses</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>";
        $data.= "<td>".$row['blood_group_2xd_total']."</td>";
        $data.= "<td $td_ag_left>units</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Process mistakee</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>";
        $data.= "<td>".$mistakee."</td>";
        $data.= "<td $td_ag_left>units</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Profit in this month</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td>";
        $data.= "<td>".$row['haemonetic']."</td>";
        $data.= "<td $td_ag_left>units</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "</tr>";
        $data.= "</table>";
        $data.= "<br>";


        $data.= "<div class=$col_sm_2 $font_18>";
        $data.= "<b>Problem remarks :</b>";
        $data.= "</div>";

        $data.= "<table $noborder>";
        $data.= "<tr>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Machine</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['total']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Donor</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['blood_group_total']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Product</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$row['blood_group_2xd_total']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Human</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>".$mistakee."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $td_ag_left>Claim</td>";
        $data.= "<td $td_ag_left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
        $data.= "<td $td_ag_right>Return</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "</tr>";
        $data.= "</table>";
        $data.= "<br>";
        $data.= "<br>";
        $data.= "<br>";
        $data.= "<br>";
        $data.= "<br>";
	}
    
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    mysqli_close($conn);
?>