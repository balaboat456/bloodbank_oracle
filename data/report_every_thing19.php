<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    
    

    $sql1 = "SELECT 'Useless' AS type,'Useless' AS subtype, COUNT(*) AS qty
        FROM donate
        WHERE IFNULL(useless,'') != ''
        AND (donation_date BETWEEN '$fromdate' AND '$todate' OR ISNULL(donation_date))
    ";
    $sql2 = "SELECT 'Lost Set' AS type,'Lost Set' AS subtype, COUNT(*) AS qty
        FROM donate
        WHERE IFNULL(lostset,'') != ''
        AND (donation_date BETWEEN '$fromdate' AND '$todate' OR ISNULL(donation_date))
    ";

 $replace1 = '["';
$replace2 = '"]';
$replace3 = '""';

$sql3 = "SELECT 'Machine' AS type,
    PM.problemmachinename,
    SUM(CASE WHEN IFNULL(DN.donateid,0) != 0 THEN 1 ELSE 0 END) AS qty
    FROM problem_machine PM
    LEFT JOIN (
			SELECT donateid , 
			donation_date ,
			REPLACE(REPLACE(problemmachineid,'$replace1',''),'$replace2','') AS problemmachineid
			FROM donate 
			WHERE  problemmachineid not like '$replace3' 
			AND problemmachineid not like '0'
			) DN
		ON PM.problemmachineid = DN.problemmachineid
    WHERE IFNULL(DN.problemmachineid,0) != 0 OR isnull(DN.donateid)
    AND (DN.donation_date BETWEEN '$fromdate' AND '$todate' OR ISNULL(DN.donation_date))
    GROUP BY PM.problemmachineid
";
    $sql4 = "SELECT 'Donor' AS type,
    PD.problemdonorname,
    SUM(CASE WHEN IFNULL(DN.donateid,0) != 0 THEN 1 ELSE 0 END) AS qty
    FROM problem_donor PD
    LEFT JOIN 
	  (
		SELECT donateid ,
		donation_date ,
		REPLACE(REPLACE(problemdonorid,'$replace1',''),'$replace2','') AS problemdonorid
		FROM donate 
		WHERE  problemdonorid not like '$replace3' 
		AND problemdonorid not like '0'
		)
		DN ON PD.problemdonorid = DN.problemdonorid
    WHERE IFNULL(DN.problemdonorid,0) != 0 OR isnull(DN.donateid)
    AND (DN.donation_date BETWEEN '$fromdate' AND '$todate' OR ISNULL(DN.donation_date))
    GROUP BY PD.problemdonorid
    ";
    $sql5 = "SELECT 'Product' AS type,
    PD.problemproductname,
    SUM(CASE WHEN IFNULL(DN.donateid,0) != 0 THEN 1 ELSE 0 END) AS qty
    FROM problem_product PD
    LEFT JOIN donate DN ON PD.problemproductid = DN.problemproductid
    WHERE IFNULL(DN.problemproductid,0) != 0 OR isnull(DN.donateid)
    AND (DN.donation_date BETWEEN '$fromdate' AND '$todate' OR ISNULL(DN.donation_date))
    GROUP BY PD.problemproductid
    ";

$sql6 = "SELECT 'ปัญหาของการรับบริจาค' AS type,
DP.donationproblemsname ,
IFNULL(M.qty,0) AS qty
FROM donation_problems DP 
LEFT JOIN
(
SELECT  PD.donationproblemsid,
				PD.donationproblemsname,
				COUNT(*) AS qty
FROM donation_problems PD
LEFT JOIN donate DN ON PD.donationproblemsid = DN.donationproblemsid
WHERE  DN.donation_date BETWEEN '$fromdate' AND '$todate'
GROUP BY PD.donationproblemsid
) M ON DP.donationproblemsid = M.donationproblemsid
    ";

$sql7 = "SELECT 'ปฏิกิริยาหลังเจาะ' AS type,
DR.donatereactionname,
IFNULL(M.qty,0) AS qty
FROM donate_reaction DR
LEFT JOIN
(
SELECT  PD.donatereactionid,
				PD.donatereactionname,
				COUNT(*) AS qty
FROM donate_reaction PD
LEFT JOIN donate DN ON PD.donatereactionid = DN.donatereactionid
WHERE IFNULL(DN.donatereactionid,0) != 0 
AND DN.donation_date BETWEEN '$fromdate' AND '$todate'
GROUP BY PD.donatereactionid
) M ON DR.donatereactionid = M.donatereactionid
    ";
   

    $query1 = mysqli_query($conn,$sql1);
    $query2 = mysqli_query($conn,$sql2);
    $query3 = mysqli_query($conn,$sql3);
    $query4 = mysqli_query($conn,$sql4);
    $query5 = mysqli_query($conn,$sql5);
$query6 = mysqli_query($conn, $sql6);
$query7 = mysqli_query($conn, $sql7);

    $number = 0;
    $count1 = 0;
    $count2 = 0;
    $count3 = 0;
    $count4 = 0;
    $count5 = 0;
$count6 = 0;
$count7 = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    $style_right = 'style="text-align: right;"';
    $col2 = 'colspan="2"';
    $col3 = 'colspan="3"';
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
    $noborder = 'style="border: none; font-size:18px; font-weight: bold;"';


    $data.= "<tr>";
    $data.= "<td $col3>Useless</td>";
    $data.= "</tr>";
	while($row = mysqli_fetch_array($query1))
	{
        $number += 1;
        $count1 += $row['qty'];
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['subtype']."</td>";
        $data.= "<td>".$row['qty']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
    $data.= "<td $style_right $col2>รวม</td>";
    $data.= "<td>".$count1."</td>";
    $data.= "</tr>";

    $data.= "<tr>";
    $data.= "<td $col3>Lost Set</td>";
    $data.= "</tr>";
    while($row = mysqli_fetch_array($query2))
	{
        $number += 1;
        $count2 += $row['qty'];
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['subtype']."</td>";
        $data.= "<td>".$row['qty']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
    $data.= "<td $style_right $col2>รวม</td>";
    $data.= "<td>".$count2."</td>";
    $data.= "</tr>";

    $data.= "<tr>";
    $data.= "<td $col3>Machine</td>";
    $data.= "</tr>";
    while($row = mysqli_fetch_array($query3))
	{
        $number += 1;
        $count3 += $row['qty'];
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['problemmachinename']."</td>";
        $data.= "<td>".$row['qty']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
    $data.= "<td $style_right $col2>รวม</td>";
    $data.= "<td>".$count3."</td>";
    $data.= "</tr>";

    $data.= "<tr>";
    $data.= "<td $col3>Donor</td>";
    $data.= "</tr>";
    while($row = mysqli_fetch_array($query4))
	{
        $number += 1;
        $count4 += $row['qty'];
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['problemdonorname']."</td>";
        $data.= "<td>".$row['qty']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
    $data.= "<td $style_right $col2>รวม</td>";
    $data.= "<td>".$count4."</td>";
    $data.= "</tr>";

    $data.= "<tr>";
    $data.= "<td $col3>Product</td>";
    $data.= "</tr>";
    while($row = mysqli_fetch_array($query5))
	{
        $number += 1;
        $count5 += $row['qty'];
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['problemproductname']."</td>";
        $data.= "<td>".$row['qty']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
    $data.= "<td $style_right $col2>รวม</td>";
    $data.= "<td>".$count5."</td>";
    $data.= "</tr>";

    $data.= "<tr>";
    

$data .= "<tr>";
$data .= "<td $col3>ปัญหาของการรับบริจาค</td>";
$data .= "</tr>";
while ($row = mysqli_fetch_array($query6)) {
    $number += 1;
    $count6 += $row['qty'];
    $data .= "<tr>";
    $data .= "<td>" . $number . "</td>";
    $data .= "<td $style_left>" . $row['donationproblemsname'] . "</td>";
    $data .= "<td>" . $row['qty'] . "</td>";
    $data .= "</tr>";
}
$data .= "<tr>";
$data .= "<td $style_right $col2>รวม</td>";
$data .= "<td>" . $count6 . "</td>";
$data .= "</tr>";

$data .= "<tr>";
$data .= "<td $col3>ปฏิกิริยาหลังเจาะ</td>";
$data .= "</tr>";
while ($row = mysqli_fetch_array($query7)) {
    $number += 1;
    $count7 += $row['qty'];
    $data .= "<tr>";
    $data .= "<td>" . $number . "</td>";
    $data .= "<td $style_left>" . $row['donatereactionname'] . "</td>";
    $data .= "<td>" . $row['qty'] . "</td>";
    $data .= "</tr>";
}
$data .= "<tr>";
$data .= "<td $style_right $col2>รวม</td>";
$data .= "<td>" . $count7 . "</td>";
$data .= "</tr>";

    $count_all = $count1+$count2+$count3+$count4+ $count5 + $count6 + $count7;

    $data.= "<tr>";
    $data.= "<td $style_right $col2>รวมทั้งหมด</td>";
    $data.= "<td>".$count_all."</td>";
    $data.= "</tr>";
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    // echo $data;
    mysqli_close($conn);
