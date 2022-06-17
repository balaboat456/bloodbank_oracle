<?php

include('../connection.php');

$condition = '';
$month = $_GET['month'];
$year = $_GET['year'];




$sql = "SELECT RB.requestbloodid , PT.patienthn , PT.patientfullname , 
RBC.requestbloodcrossmacthid,
RBC.isallergic , RBC.bag_number , RBC.bloodtype ,
CONCAT(
CASE WHEN RBC.isincreasebodytemp_allergic = 1 THEN ' increase body temp > C' ELSE '' END,
CASE WHEN RBC.ischills_allergic = 1 THEN ' chills' ELSE '' END,
CASE WHEN RBC.isurticaria_allergic = 1 THEN ' urticaria' ELSE '' END,
CASE WHEN RBC.isitching_allergic = 1 THEN ' itching' ELSE '' END,
CASE WHEN RBC.isflushing_allergic = 1 THEN ' flushing' ELSE '' END,
CASE WHEN RBC.ismusclepain_allergic = 1 THEN ' muscle pain' ELSE '' END,
CASE WHEN RBC.ishypotension_allergic = 1 THEN ' hypotension' ELSE '' END,
CASE WHEN RBC.ishypertension_allergic = 1 THEN ' hypertension' ELSE '' END,
CASE WHEN RBC.isanaphylaxis_allergic = 1 THEN ' anaphylaxis' ELSE '' END,
CASE WHEN RBC.isdyspnea_allergic = 1 THEN ' dyspnea' ELSE '' END,
CASE WHEN RBC.isdecreaseurineout_allergic = 1 THEN ' Decrease urine out' ELSE '' END,
CASE WHEN RBC.isdarkredurine_allergic = 1 THEN ' dark/red urine' ELSE '' END,
RBC.othereffects_allergic 
) AS argran ,
BT.bloodstocktypename2 ,
CONCAT(DATE_FORMAT(RBC.sideeffectsdate_allergic,'%d/%m/%Y'),' ',RBC.sideeffectstime_allergic) AS sideeffectsdate_allergic
FROM request_blood_crossmacth RBC
LEFT JOIN request_blood RB ON RB.requestbloodid = RBC.requestbloodid
LEFT JOIN patient PT ON RB.hn = PT.patienthn
LEFT JOIN bloodstock_type BT ON BT.bloodstocktypeid = RBC.bloodtype
WHERE RBC.isallergic = '1'
AND SUBSTRING(RBC.sideeffectsdate_allergic,1,7) = '$year-$month'
";

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
    $data .= "<td>" . $row['sideeffectsdate_allergic'] . "</td>";
    $data .= "<td>" . $row['patienthn'] . "</td>";
    $data .= "<td>" . $row['patientfullname'] . "</td>";
    $data .= "<td>" . $row['bloodstocktypename2'] . "</td>";
    $data .= "<td>" . $row['argran'] . "</td>";
    $data .= '<td><button type="button" onclick="printAllergicBlood('.$row['requestbloodcrossmacthid'].')" class="btn btn-success m-l-5"><i class="fa fa-print"></i></button></td>';
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
