<?php

include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$hn = $_GET['hn'];
$recid = $_GET['recid'];

if (!empty($hn))
    $condition = "AND PT.patienthn = '$hn'";
if (!empty($recid))
    $condition = "AND BBR.receivingtypeid = '$recid'";


$sql = "SELECT PT.patientfullname , 
PT.patienthn , 
RT.receivingtypename2 ,
BBR.bloodborrowantigen , 
PT.patientbloodgroup , 
BBR.bloodborrowid , 
BI.bloodborrowid ,
DATE_FORMAT(BBR.bloodborrowdate,'%d/%m/%Y') as bloodborrowdate,
BI.a_qty + BI.b_qty + BI.o_qty + BI.ab_qty AS request_val , 
COUNT(BS.bloodtype) AS volume 
   FROM blood_borrow BBR
   LEFT JOIN receiving_type RT ON BBR.receivingtypeid = RT.receivingtypeid
   LEFT JOIN hospital HT ON BBR.hospitalid = HT.hospitalid
   LEFT JOIN patient PT ON BBR.bloodborrowhn = PT.patienthn
	 LEFT JOIN blood_borrow_item BI ON BBR.bloodborrowid = BI.bloodborrowid
	 LEFT JOIN bloodstock BS ON BS.bloodborrowitemid = BI.bloodborrowitemid
    WHERE true
		$condition
		AND BBR.bloodborrowdate BETWEEN '$fromdate' AND '$todate'
        AND IFNULL(PT.patienthn,'') != ''  
        
        GROUP BY BBR.bloodborrowid
    ORDER BY BBR.bloodborrowid DESC
";
// GROUP BY PT.patientfullname , PT.patienthn
$query = mysqli_query($conn, $sql);

$number = 0;
$data = "";
$text = '"left_table"';
$style_left = 'style="text-align: left;"';
while ($row = mysqli_fetch_array($query)) {
    $oldDate = $row['donation_date'];
    $arr = explode('-', $oldDate);
    $newDate = $arr[2] . '/' . $arr[1] . '/' . $arr[0];
    $number += 1;
    $data .= "<tr>";
    $data .= "<td>" . $number . "</td>";
    $data .= "<td>" . $row['bloodborrowdate'] . "</td>";
    $data .= "<td>" . $row['patientfullname'] . "</td>";
    $data .= "<td>" . $row['patienthn'] . "</td>";
    $data .= "<td>" . $row['patientbloodgroup'] . "</td>";
    $data .= "<td>" . $row['bloodborrowantigen'] . "</td>";
    $data .= "<td>" . $row['request_val'] . "</td>";
    $data .= "<td>" . $row['volume'] . "</td>";
    // $data .= "<td>" . '<button type = "button" onclick = "printreport3()" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' . "</td>";
    // $data .= "<td>" . '<button type = "button" onclick = "" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' . "</td>";
    $data .= "</tr>";

    // array_push($resultArray,$row);
}
// $result = mysqli_fetch_array($query);

echo json_encode(
    array(
        'status' => true,
        'data' => $data,
        'sql' => $sql,
    )

);

// echo $data;
mysqli_close($conn);
