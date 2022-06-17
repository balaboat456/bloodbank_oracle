<?php

    include('../connection.php');

    $condition = '';
    $month =$_GET['month'];
    $year =$_GET['year'];
    $hospitalid = $_GET['hospitalid'];

    if ($hospitalid == '') {
        $hospital = '';
    } else {
        $hospital = "AND HT.hospitalid LIKE '$hospitalid'";
    }
    // $hospital = "AND HT.hospitalid LIKE '$hospitalid'";

    $sql = "SELECT 	BS.hospitalid,
    HT.hospitalname,
    RT.receivingtypeid,
    RT.receivingtypename
		FROM bloodstock BS
LEFT JOIN bloodstock_main BM ON BS.bloodstockmainid = BM.bloodstockmainid
LEFT JOIN receiving_type RT ON BS.receivingtypeid = RT.receivingtypeid
LEFT JOIN hospital HT ON BS.hospitalid = HT.hospitalid
WHERE  DATE_FORMAT(BM.bloodstockmaindate, '%Y-%m')  = '$year-$month'
$hospital
GROUP BY HT.hospitalid
ORDER BY HT.hospitalid,RT.receivingtypeid";
   
    
    $query = mysqli_query($conn,$sql);


    $number = "";
    $data = "";
    $text_left_table = '"left_table"';
    $text_table_no_scroll = '"table-no-scroll"';
    $text_table_list_borrow = '"table_list_borrow"';
    $text_td_table = '"td-table"';
    $text_2 = '"2"';
    $text_13 = '"16"';
    $text_width_35 = '"width:35%"';
    $id_table = [];
    $noborder = 'style="border: none; font-size:18px; font-weight: bold;"';
    $style_right = 'style="text-align: left;"';
	while($row = mysqli_fetch_array($query)){
        $data.= $row['hospitalname'];
        $sql1 = "SELECT 	BS.hospitalid,
        HT.hospitalname,
        RT.receivingtypeid,
        RT.receivingtypename,
        SUM(CASE WHEN BS.bloodtype = 'PRC'  THEN 1 ELSE 0 END) AS prc,
        SUM(CASE WHEN BS.bloodtype = 'LPRC' || BS.bloodtype = 'LPRC-O'  THEN 1 ELSE 0 END) AS lprc,
        SUM(CASE WHEN BS.bloodtype = 'LDPRC'  THEN 1 ELSE 0 END) AS ldprc,
        SUM(CASE WHEN BS.bloodtype = 'FFP'  THEN 1 ELSE 0 END) AS ffp,
        SUM(CASE WHEN BS.bloodtype = 'PC'  THEN 1 ELSE 0 END) AS pc,
        SUM(CASE WHEN BS.bloodtype = 'LPPC'  THEN 1 ELSE 0 END) AS lppc,
        SUM(CASE WHEN BS.bloodtype = 'WB'  THEN 1 ELSE 0 END) AS wb,
        SUM(CASE WHEN BS.bloodtype = 'SDP'  THEN 1 ELSE 0 END) AS sdp,
        SUM(CASE WHEN BS.bloodtype = 'SDR'  THEN 1 ELSE 0 END) AS sdr,
        SUM(CASE WHEN BS.bloodtype = 'CRYO'  THEN 1 ELSE 0 END) AS crto,
        SUM(CASE WHEN BS.bloodtype = 'LDSDR'  THEN 1 ELSE 0 END) AS ldsdr,
        SUM(CASE WHEN BS.bloodtype = 'HTFDC'  THEN 1 ELSE 0 END) AS htfdc,
        SUM(CASE WHEN BS.bloodtype = 'LPPC_PAS'  THEN 1 ELSE 0 END) AS lppc_pas,
        SUM(CASE WHEN BS.bloodtype = 'LDPPC'  THEN 1 ELSE 0 END) AS ldppc,
        SUM(CASE WHEN BS.bloodtype = 'LDPPC_PAS'  THEN 1 ELSE 0 END) AS ldppc_pas,
        SUM(CASE WHEN BS.bloodtype in ('PRC','LPRC','LPRC-O','LDPRC','FFP','PC','LPPC','WB','SDP','SDR','CRYO','LDSDR','HTFDC','LPPC_PAS','LDPPC','LDPPC_PAS') THEN 1 ELSE 0 END) AS tatol
        FROM bloodstock BS
        LEFT JOIN bloodstock_main BM ON BS.bloodstockmainid = BM.bloodstockmainid
        LEFT JOIN receiving_type RT ON BS.receivingtypeid = RT.receivingtypeid
        LEFT JOIN hospital HT ON BS.hospitalid = HT.hospitalid
        WHERE  BS.active = 1 AND DATE_FORMAT(BM.bloodstockmaindate, '%Y-%m')  = '$year-$month'
        AND BS.hospitalid = '".$row['hospitalid']."'
        GROUP BY HT.hospitalid,RT.receivingtypeid
        ORDER BY HT.hospitalid,RT.receivingtypeid";

        $prc = 0;
        $lprc = 0;
        $ldprc = 0;
        $ffp = 0;
        $pc = 0;
        $lppc = 0;
        $wb = 0;
        $sdp = 0;
        $sdr = 0;
        $crto = 0;
        $ldsdr = 0;
        $htfdc = 0;
        $tatol = 0;
    $lppc_pas = 0;
    $ldppc = 0;
    $ldppc_pas = 0;

        $query1 = mysqli_query($conn,$sql1);
        
        
        $data.= "<div class=$text_table_no_scroll>";
	    $data.= "<table id=$text_table_list_borrow>";
	    $data.= "<thead>";
        $data.= "<tr>";
		$data.= "<th class=$text_td_table rowspan=$text_2 style=$text_width_35>ประเภทการรับเลือด</th>";
	    $data.= "<th class=$text_td_table colspan=$text_13>ชนิดเลือด(จำนวน Units)</th>";
        $data.= "</tr>";
		$data.= "<tr>";
	    $data.= "<th class=$text_td_table>PRC</th>";
	    $data.= "<th class=$text_td_table>LPRC</th>";
		$data.= "<th class=$text_td_table>LDPRC</th>";
	    $data.= "<th class=$text_td_table>FFP</th>";
	    $data.= "<th class=$text_td_table>PC</th>";
		$data.= "<th class=$text_td_table>LPPC</th>";
    $data .= "<th class=$text_td_table>LPPC_PAS</th>";
	    $data.= "<th class=$text_td_table>WB</th>";
	    $data.= "<th class=$text_td_table>SDP</th>";
        $data.= "<th class=$text_td_table>SDR</th>";
	    $data.= "<th class=$text_td_table>CRYO</th>";
        $data.= "<th class=$text_td_table>LDSDR</th>";
        $data.= "<th class=$text_td_table>HTFDC</th>";
    $data .= "<th class=$text_td_table>LDPPC</th>";
    $data .= "<th class=$text_td_table>LDPPC_PAS</th>";
        $data.= "<th class=$text_td_table>".$number."</th>";
		$data.= "</tr>";
	    $data.= "</thead>";

        while($raw = mysqli_fetch_array($query1)){
            $prc += $raw['prc'];
            $lprc += $raw['lprc'];
            $ldprc += $raw['ldprc'];
            $ffp += $raw['ffp'];
            $pc += $raw['pc'];
            $lppc += $raw['lppc'];
            $wb += $raw['wb'];
            $sdp += $raw['sdp'];
            $sdr += $raw['sdr'];
            $crto += $raw['crto'];
            $ldsdr += $raw['ldsdr'];
            $htfdc += $raw['htfdc'];
            $tatol += $raw['tatol'];

        $lppc_pas += $raw['lppc_pas'];
        $ldppc += $raw['ldppc'];
        $ldppc_pas += $raw['ldppc_pas'];

            $data.= "<tr>";
            $data.= "<td class=".$text_left_table.">" . $raw['receivingtypename'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['prc'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['lprc'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['ldprc'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['ffp'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['pc'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['lppc'] . "</td>";
        $data .= "<td class=" . $text . ">" . $raw['lppc_pas'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['wb'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['sdp'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['sdr'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['crto'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['ldsdr'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['htfdc'] . "</td>";
        $data .= "<td class=" . $text . ">" . $raw['ldppc'] . "</td>";
        $data .= "<td class=" . $text . ">" . $raw['ldppc_pas'] . "</td>";
            $data.= "<td class=".$text.">" . $raw['tatol'] . "</td>";
            
            $data.= "</tr>";
        }
        $data.= "<tr>";
        $data.= "<td class=".$text_left_table.">รวม</td>";
        $data.= "<td class=".$text.">" . $prc . "</td>";
        $data.= "<td class=".$text.">" . $lprc . "</td>";
        $data.= "<td class=".$text.">" . $ldprc . "</td>";
        $data.= "<td class=".$text.">" . $ffp . "</td>";
        $data.= "<td class=".$text.">" . $pc . "</td>";
        $data.= "<td class=".$text.">" . $lppc . "</td>";
    $data .= "<td class=" . $text . ">" . $lppc_pas . "</td>";
        $data.= "<td class=".$text.">" . $wb . "</td>";
        $data.= "<td class=".$text.">" . $sdp . "</td>";
        $data.= "<td class=".$text.">" . $sdr . "</td>";
        $data.= "<td class=".$text.">" . $crto . "</td>";
        $data.= "<td class=".$text.">" . $ldsdr . "</td>";
        $data.= "<td class=".$text.">" . $htfdc . "</td>";
    $data .= "<td class=" . $text . ">" . $ldppc . "</td>";
    $data .= "<td class=" . $text . ">" . $ldppc_pas . "</td>";
        $data.= "<td class=".$text.">" . $tatol . "</td>";
        $data.= "</tr>";
        $data.= "</table>";
        $data.= "</div>";
        $data.= "<br>";
        $data.= "<table $noborder>";

        $data.= "<tr>";
        $data.= "<td>จำนวนรวม</td>";
        $data.= "<td $style_right>PRC </td>";
        $data.= "<td>".$prc."</td>";
        $data.= "<td $style_right>LPRC </td>";
        $data.= "<td>".$lprc."</td>";
        $data.= "<td $style_right>LDPRC </td>";
        $data.= "<td>".$ldprc."</td>";
        $data.= "<td $style_right>WB </td>";
        $data.= "<td>".$wb."</td>";
        $data.= "<td $style_right></td>";
        $data.= "</tr>";

        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $style_right>PC </td>";
        $data.= "<td>".$pc."</td>";
        $data.= "<td $style_right>LPPC </td>";
        $data.= "<td>".$lppc."</td>";
    $data .= "<td $style_right>LPPC_PAS </td>";
    $data .= "<td>" . $lppc_pas . "</td>";
        $data.= "<td $style_right>SDP </td>";
        $data.= "<td>".$sdp."</td>";
        $data.= "<td $style_right>SDR </td>";
        $data.= "<td>".$sdr."</td>";
        $data.= "<td $style_right></td>";
        $data.= "</tr>";

        $data.= "<tr>";
        $data.= "<td></td>";
        $data.= "<td $style_right>CRYO </td>";
        $data.= "<td>".$crto."</td>";
        $data.= "<td $style_right>FFP </td>";
        $data.= "<td>".$ffp."</td>";
        $data.= "<td $style_right>HTFDC </td>";
        $data.= "<td>".$htfdc."</td>";
        $data.= "<td $style_right>LDSDR </td>";
        $data.= "<td>".$ldsdr."</td>";
    $data .= "<td $style_right>LDPPC </td>";
    $data .= "<td>" . $ldppc . "</td>";
    $data .= "<td $style_right>LDPPC_PAS </td>";
    $data .= "<td>" . $ldppc_pas . "</td>";
        $data.= "</tr>";

    $data .= "<tr>";
    $data .= "<td $style_right>รวมทั้งหมด " . $tatol . "</td>";
    $data .= "</tr>";
        $data.= "</table>";
        $data.= "<br>";
	}
    $data.= "<br>";
    $data.= "<br>";
    $data.= "<br>";
    $data.= "<br>";
    $id = array_unique($id_table);
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
            'query' => $id
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
