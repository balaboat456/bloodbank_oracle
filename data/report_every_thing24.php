<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];


    $sql = "SELECT 	BEX.* ,
    PT.patientfullname,
    PT.patientan,
    PT.patienthn,
    BG.bloodgroupname,
    RH.rhname3,
    DT.doctorname,
    MAC.exchangemachinename,
    TY.bloodexchangetypename,
    UF.unitofficename
    
FROM blood_exchange BEX
LEFT JOIN patient PT ON BEX.patientid = PT.patientid
LEFT JOIN blood_group BG ON BEX.bloodgroupid = BG.bloodgroupid
LEFT JOIN unit_office UF ON BEX.unitofficeid = UF.unitofficeid
LEFT JOIN rh RH ON BEX.rhid = RH.rhid
LEFT JOIN doctor DT ON BEX.doctorid = DT.doctorid
LEFT JOIN blood_exchange_machine MAC ON BEX.exchangemachineid = MAC.exchangemachineid
LEFT JOIN blood_exchange_type TY ON BEX.bloodexchangetypeid = TY.bloodexchangetypeid
WHERE BEX.active <> 0
AND  DATE_FORMAT(BEX.bloodexchangedatetime, '%Y-%m-%d')  BETWEEN '$fromdate' AND '$todate'";
   
    
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
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $data = "";
    $data.= "<div class=$text_table_no_scroll>";
    // $data.= "<h1>5555555555555555555555555</h1>";
	$data.= "<table id=$text_table_list_borrow>";
	$data.= "<thead>";
    $data.= "<tr>";
	$data.= "<th class=$text_td_table>วันที่/เวลา</th>";
    $data.= "<th class=$text_td_table>HN</th>";
    $data.= "<th class=$text_td_table>ชื่อ-นามสกุล</th>";
    $data.= "<th class=$text_td_table>diagnosis</th>";
    $data.= "<th class=$text_td_table>ward</th>";
    $data.= "<th class=$text_td_table>ประเภทการรักษา</th>";
    $data.= "<th class=$text_td_table>ผู้ทำ</th>";
    $data.= "</tr>";
	$data.= "</thead>";
	while($row = mysqli_fetch_array($query)){
        if($row['bloodexchangetypeid'] == 1){
            $bloodexchangetypeid = 'Plasma Exchange';
        }else if($row['bloodexchangetypeid'] == 2){
            $bloodexchangetypeid = 'Leukapheresis ';
        }else if($row['bloodexchangetypeid'] == 3){
            $bloodexchangetypeid = 'Blood Exchange';
        }else{
            $bloodexchangetypeid = '';
        }
        if($row['exchangemachineid'] == 1){
            $exchangemachineid = 'Haemonetic A';
        }else if($row['exchangemachineid'] == 2){
            $exchangemachineid = 'Amicus ';
        }else if($row['exchangemachineid'] == 3){
            $exchangemachineid = 'Trima';
        }else{
            $exchangemachineid = '';
        }
        $data.= "<tr>";
        $data.= "<td class=$text_td_table>".$row['bloodexchangedatetime']."</td>";
        $data.= "<td class=$text_td_table>".$row['patienthn']."</td>";
        $data.= "<td class=$text_td_table>".$row['patientfullname']."</td>";
        $data.= "<td class=$text_td_table>".$bloodexchangetypeid."</td>";
        $data.= "<td class=$text_td_table>".$exchangemachineid."</td>";
        $data.= "<td class=$text_td_table>".$row['diagnosis']."</td>";
        $data.= "</tr>";
	}
    $data.= "</table>";
	$data.= "</div>";
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    mysqli_close($conn);
?>