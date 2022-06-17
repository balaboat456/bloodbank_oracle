<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    
    $sql = "SELECT DNC.donatenocausename,
COUNT(DN.donatenocauseid) AS countdonatenocauseid
    FROM donate_no_cause DNC
    LEFT JOIN donate DN ON DNC.donatenocauseid = DN.donatenocauseid
    WHERE DN.donation_status = 2 AND DN.donation_date BETWEEN '$fromdate' AND '$todate'
    GROUP BY DNC.donatenocauseid
    ";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    $style_right = 'style="text-align: right;"';
	while($row = mysqli_fetch_array($query))
	{
        $number += $row['countdonatenocauseid'];
		$data.= "<tr>";
        $data.= "<td $style_left>".$row['donatenocausename']."</td>";
        $data.= "<td>".$row['countdonatenocauseid']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
        $data.= "<td $style_right>รวม</td>";
        $data.= "<td>".$number."</td>";
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
