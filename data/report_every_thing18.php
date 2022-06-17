<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    
    $sql = "SELECT DATE_FORMAT(donation_date,'%d/%m/%Y') AS donation_date ,
    COUNT(*) AS countdonate,
     SUM(CASE WHEN donation_status = 1 THEN 1 ELSE 0 END) AS donation_status1,
     SUM(CASE WHEN donation_status = 2 THEN 1 ELSE 0 END) AS donation_status2
FROM donate
WHERE donation_date BETWEEN '$fromdate' AND '$todate'
GROUP BY donation_date
ORDER BY donation_date
    ";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $count1 = 0;
    $count2 = 0;
    $count3 = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    $style_right = 'style="text-align: right;"';
    $col = 'colspan="2"';
	while($row = mysqli_fetch_array($query))
	{
        $count1 += $row['countdonate'];
        $count2 += $row['donation_status1'];
        $count3 += $row['donation_status2'];
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td>".$row['donation_date']."</td>";
        $data.= "<td>".$row['countdonate']."</td>";
        $data.= "<td>".$row['donation_status1']."</td>";
        $data.= "<td>".$row['donation_status2']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
        $data.= "<td $style_right $col>รวม</td>";
        $data.= "<td>".$count1."</td>";
        $data.= "<td>".$count2."</td>";
        $data.= "<td>".$count3."</td>";
        $data.= "</tr>";
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
