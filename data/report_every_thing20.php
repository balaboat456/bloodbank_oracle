<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    
    $sql1 = "SELECT 
    SUM(CASE WHEN  donation_type_id = 1 THEN 1 ELSE 0 END) AS P1,
    SUM(CASE WHEN donatereactionid = 6 AND donation_type_id = 1 THEN 1 ELSE 0 END) AS PA01,
    SUM(CASE WHEN donatereactionid = 9 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA02,
    SUM(CASE WHEN donatereactionid = 7 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA03,
    SUM(CASE WHEN donatereactionid = 1 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA04,
    SUM(CASE WHEN donatereactionid = 10 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA05,
    SUM(CASE WHEN donatereactionid = 5 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA06,
    SUM(CASE WHEN donatereactionid = 2 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA07,
    SUM(CASE WHEN donatereactionid = 8 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA08,
    SUM(CASE WHEN donatereactionid = 4 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PA09,
    SUM(CASE WHEN donatereactionid = 3  AND donation_type_id = 1 THEN 1 ELSE 0 END) AS PA10,
    SUM(CASE WHEN donationproblemsid = 1 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PB01,
    SUM(CASE WHEN donationproblemsid = 2 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PB02,
    SUM(CASE WHEN donationproblemsid = 3 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PB03,
    SUM(CASE WHEN donationproblemsid = 4 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PB04,
    SUM(CASE WHEN donationproblemsid = 5 AND donation_type_id = 1  THEN 1 ELSE 0 END) AS PB05
    FROM donate
    ";

$sql2 = "SELECT 
SUM(CASE WHEN  donation_type_id != 1 THEN 1 ELSE 0 END) AS P2,
SUM(CASE WHEN donatereactionid = 6 AND donation_type_id != 1 THEN 1 ELSE 0 END) AS PC01,
SUM(CASE WHEN donatereactionid = 9 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC02,
SUM(CASE WHEN donatereactionid = 7 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC03,
SUM(CASE WHEN donatereactionid = 1 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC04,
SUM(CASE WHEN donatereactionid = 10 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC05,
SUM(CASE WHEN donatereactionid = 5 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC06,
SUM(CASE WHEN donatereactionid = 2 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC07,
SUM(CASE WHEN donatereactionid = 8 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC08,
SUM(CASE WHEN donatereactionid = 4 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PC09,
SUM(CASE WHEN donatereactionid = 3  AND donation_type_id != 1 THEN 1 ELSE 0 END) AS PC10,
SUM(CASE WHEN donationproblemsid = 1 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PD01,
SUM(CASE WHEN donationproblemsid = 2 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PD02,
SUM(CASE WHEN donationproblemsid = 3 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PD03,
SUM(CASE WHEN donationproblemsid = 4 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PD04,
SUM(CASE WHEN donationproblemsid = 5 AND donation_type_id != 1  THEN 1 ELSE 0 END) AS PD05
FROM donate
";
   

   $query1 = mysqli_query($conn,$sql1);
   $query2 = mysqli_query($conn,$sql2);

   $number = 0;
   $count1 = 0;
   $count2 = 0;

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

   $text_width_23 = 'style="width:23%; text-align: left;"';
   $text_width_10 = 'style="width:10%;"';

   $div = '<div class="table-stock-scroll" style="height: 350px;">';
	while($row = mysqli_fetch_array($query1))
	{
        $data.= $div;
        $data.= "<table id=$text_table_list_borrow>";
        $data.= "<tr>";
        $data.= "<td $col2>ประเภทการบริจาค</td>";
        $data.= "<td $col2>ประเภทการบริจาค</td>";
        $data.= "<td $col2>ประเภทการบริจาค</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23>1. โลหิตทั่วไป</td>";
        $data.= "<td>".$row['P1']."</td>";
        $data.= "<td $text_width_23>1. มีเหงื่อออก</td>";
        $data.= "<td>".$row['PA01']."</td>";
        $data.= "<td $text_width_23>1. เจาะเก็บมากกว่า 1 ครั้ง</td>";
        $data.= "<td>".$row['PB01']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>2. อ่อนเพลีย</td>";
        $data.= "<td>".$row['PA02']."</td>";
        $data.= "<td $text_width_23>2. Low Volume</td>";
        $data.= "<td>".$row['PB02']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>3. เวียนศีรษะ</td>";
        $data.= "<td>".$row['PA03']."</td>";
        $data.= "<td $text_width_23>3. Over Volme</td>";
        $data.= "<td>".$row['PB03']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>4. คลื่นไส้</td>";
        $data.= "<td>".$row['PA04']."</td>";
        $data.= "<td $text_width_23>4. Lost Set</td>";
        $data.= "<td>".$row['PB04']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>5. อาเจียน</td>";
        $data.= "<td>".$row['PA05']."</td>";
        $data.= "<td $text_width_23>5. Other</td>";
        $data.= "<td>".$row['PB05']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>6. เป็นลม</td>";
        $data.= "<td>".$row['PA06']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>7. ชัก</td>";
        $data.= "<td>".$row['PA07']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>8. หมดสติ</td>";
        $data.= "<td>".$row['PA08']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>9. ปวดแขน</td>";
        $data.= "<td>".$row['PA09']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>10. บวม</td>";
        $data.= "<td>".$row['PA10']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";

        $co1 = $row['PA10']+$row['PA09']+$row['PA08']+$row['PA07']+$row['PA06']+$row['PA05']+$row['PA04']+$row['PA03']+$row['PA02']+$row['PA01'];
        $co2 = $row['PB05']+$row['PB04']+$row['PB03']+$row['PB02']+$row['PB01'];
        $data.= "<tr>";
        $data.= "<td>รวม</td>";
        $data.= "<td>".$row['P1']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td>".$co1."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td>".$co1."</td>";
        $data.= "</tr>";
        $data.= "</table>";
        $data.= "</div>";
	}

    while($row = mysqli_fetch_array($query2))
	{
        $data.= $div;
        $data.= "<table id=$text_table_list_borrow>";
        $data.= "<tr>";
        $data.= "<td $col2>ประเภทการบริจาค</td>";
        $data.= "<td $col2>ประเภทการบริจาค</td>";
        $data.= "<td $col2>ประเภทการบริจาค</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23>1. โลหิตเฉพาะส่วน</td>";
        $data.= "<td>".$row['P2']."</td>";
        $data.= "<td $text_width_23>1. มีเหงื่อออก</td>";
        $data.= "<td>".$row['PC01']."</td>";
        $data.= "<td $text_width_23>1. เจาะเก็บมากกว่า 1 ครั้ง</td>";
        $data.= "<td>".$row['PD01']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>2. อ่อนเพลีย</td>";
        $data.= "<td>".$row['PC02']."</td>";
        $data.= "<td $text_width_23>2. Low Volume</td>";
        $data.= "<td>".$row['PD02']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>3. เวียนศีรษะ</td>";
        $data.= "<td>".$row['PC03']."</td>";
        $data.= "<td $text_width_23>3. Over Volme</td>";
        $data.= "<td>".$row['PD03']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>4. คลื่นไส้</td>";
        $data.= "<td>".$row['PC04']."</td>";
        $data.= "<td $text_width_23>4. Lost Set</td>";
        $data.= "<td>".$row['PD04']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>5. อาเจียน</td>";
        $data.= "<td>".$row['PC05']."</td>";
        $data.= "<td $text_width_23>5. Other</td>";
        $data.= "<td>".$row['PD05']."</td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>6. เป็นลม</td>";
        $data.= "<td>".$row['PC06']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>7. ชัก</td>";
        $data.= "<td>".$row['PC07']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>8. หมดสติ</td>";
        $data.= "<td>".$row['PC08']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>9. ปวดแขน</td>";
        $data.= "<td>".$row['PC09']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";
        $data.= "<tr>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "<td $text_width_23>10. บวม</td>";
        $data.= "<td>".$row['PC10']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td></td>";
        $data.= "</tr>";

        $co1 = $row['PC10']+$row['PC09']+$row['PC08']+$row['PC07']+$row['PC06']+$row['PC05']+$row['PC04']+$row['PC03']+$row['PC02']+$row['PC01'];
        $co2 = $row['PD05']+$row['PD04']+$row['PD03']+$row['PD02']+$row['PD01'];
        $data.= "<tr>";
        $data.= "<td>รวม</td>";
        $data.= "<td>".$row['P2']."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td>".$co1."</td>";
        $data.= "<td $text_width_23></td>";
        $data.= "<td>".$co1."</td>";
        $data.= "</tr>";
        $data.= "</table>";
        $data.= "</div>";
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
