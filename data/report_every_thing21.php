<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    
    $sql1 = "SELECT ICN.requestbloodcancelitemid,CN.requestbloodcancelname,COUNT(CN.requestbloodcancelname) AS countcancel
        FROM request_blood_cancel_item ICN
        LEFT JOIN request_blood_cancel CN ON ICN.requestbloodcancelid = CN.requestbloodcancelid
        LEFT JOIN request_blood RB ON ICN.requestbloodid = RB.requestbloodid
        WHERE RB.requestqueueblooddate BETWEEN '$fromdate' AND '$todate'
        GROUP BY CN.requestbloodcancelname
        ORDER BY 1
    ";

    $sql2 = "SELECT requestbloodcancelother AS requestbloodcancelname,COUNT(requestbloodcancelname) AS countcancel
    FROM request_blood
    WHERE requestqueueblooddate BETWEEN $fromdate' AND '$todate'
    GROUP BY requestbloodcancelname
    ORDER BY 1
    ";
   

    $query1 = mysqli_query($conn,$sql1);
    $query2 = mysqli_query($conn,$sql2);

    $number = 0;
    $count = 0;
    $data = "";
    $text = '"left_table"';
    $style_left = 'style="text-align: left;"';
    $style_right = 'style="text-align: right;"';
    $col = 'colspan="2"';
	while($row = mysqli_fetch_array($query1))
	{
        $count += $row['countcancel'];
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['requestbloodcancelname']."</td>";
        $data.= "<td>".$row['countcancel']."</td>";
        $data.= "</tr>";
	}
    while($row = mysqli_fetch_array($query2))
	{
        $count += $row['countcancel'];
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td $style_left>".$row['requestbloodcancelname']."</td>";
        $data.= "<td>".$row['countcancel']."</td>";
        $data.= "</tr>";
	}
    $data.= "<tr>";
    $data.= "<td></td>";
    $data.= "<td $style_right>รวม</td>";
    $data.= "<td>".$count."</td>";
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
