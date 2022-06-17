<?php

    include('../connection.php');

    $condition = '';
    $month =$_GET['month'];
    $year =$_GET['year'];

    $sql = "SELECT BS.* ,COUNT(*) AS count_item,BT.bloodstocktypename2
    FROM bloodstock BS
    LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
    LEFT JOIN bloodstock_pay PY ON BS.bloodstockid = PY.bloodstockid
    WHERE DATE_FORMAT(BS.bloodstockpaydatetime, '%Y-%m')  LIKE '$year-$month'
    AND (BS.bloodstockstatusid = 2 AND BS.bloodstockpaytypeid = 3)
    GROUP BY BS.bloodtype";
   
    
    $query = mysqli_query($conn,$sql);

    $number = 0;
    $sum = 0;
    $data = "";
    $text = '"left_table"';
	while($row = mysqli_fetch_array($query))
	{
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>".$number."</td>";
        $data.= "<td class=".$text.">" . $row['bloodstocktypename2'] . "</td>";
        $data.= "<td>" . $row['count_item'] . "</td>";
        $data.= "</tr>";

        $sum += intval($row['count_item']);
	}

    $data.= "<tr>";
    $data.= "<td></td>";
    $data.= "<td class=".$text."><b>รวม</b></td>";
    $data.= "<td><b>" . $sum . "</b></td>";
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
