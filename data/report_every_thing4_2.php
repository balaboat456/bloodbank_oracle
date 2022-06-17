<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $placeid =$_GET['placeid'];
    $unitnameid =$_GET['unitnameid'];
$activityid = $_GET['activityid'];

    // if($placeid == ''){
    //     $place = '';
    // }
    // else{
    //     $place = "AND DN.placeid LIKE '$placeid'";
    // }
    // ///////////////////////////////////////////////////////////////
    // if($unitnameid == ''){
    //     $unitname = '';
    // }
    // else{
    //     $unitname = "AND DN.unitnameid LIKE '$unitnameid'";
    // }
    
    

$sql = "SELECT 
ROW_NUMBER() OVER(ORDER BY donation_date ASC) AS number_row,
DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS donation_date,
				PF.prefixname,
				DN.bag_number,CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) fullname,
				DR.donoridcard,
				DR.donorcode,
				CASE WHEN (
				DN.tpharpr_grade = '' OR DN.tpharpr_grade IS NULL
				)THEN 0 ELSE DN.tpharpr_grade END as tpharpr_grade,
				DN.hbsag_grade,
				DN.hivagab_grade,
				DN.hcvab_grade,
				DN.hbvdna_grade,
				DN.hcvrna_grade,
				DN.hivrna_grade,
				DN.placeid,
				UN.dmu_name,
				DN.prc,
				RM.bloodremarktext as prcremark1,
				DN.prcremark as prc1,
				DN.lprc,
				RM1.bloodremarktext as lprcremark1,
				DN.lprcremark as lprc1,
				DN.ffp,
				RM2.bloodremarktext as ffpremark1,
				DN.ffpremark as fpp1,
				DN.pc,
				RM3.bloodremarktext as pcremark1,
				DN.pcremark as pc1,
				DN.lppc,
				RM4.bloodremarktext as lppcremark1,
				DN.lppcremark as lppc1,
				DN.lppc_pas,
				RM5.bloodremarktext as lppc_pasremark1,
				DN.lppc_pasremark as lppc_pas1,
				DN.sdp,
				RM6.bloodremarktext as sdpremark1,
				DN.sdpremark as sdp1,
				DN.sdp_pas,
				RM7.bloodremarktext as sdp_pasremark1,
				DN.sdp_pasremark as sdp_pas1,
				DN.wb,
				RM8.bloodremarktext as wbremark1,
				DN.wbremark as wb1,
				DN.ldprc,
				RM9.bloodremarktext as ldprcremark1,
				DN.ldprcremark as ldprc1,
				DN.sdr,
				RM10.bloodremarktext as sdrremark1,
				DN.sdrremark as sdr1
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN blood_remark RM ON RM.bloodremarkid = DN.prcremark
LEFT JOIN blood_remark RM1 ON RM1.bloodremarkid = DN.lprcremark
LEFT JOIN blood_remark RM2 ON RM2.bloodremarkid = DN.ffpremark
LEFT JOIN blood_remark RM3 ON RM3.bloodremarkid = DN.pcremark
LEFT JOIN blood_remark RM4 ON RM4.bloodremarkid = DN.lppcremark
LEFT JOIN blood_remark RM5 ON RM5.bloodremarkid = DN.lppc_pasremark
LEFT JOIN blood_remark RM6 ON RM6.bloodremarkid = DN.sdpremark
LEFT JOIN blood_remark RM7 ON RM7.bloodremarkid = DN.sdp_pasremark
LEFT JOIN blood_remark RM8 ON RM8.bloodremarkid = DN.wbremark
LEFT JOIN blood_remark RM9 ON RM9.bloodremarkid = DN.ldprcremark
LEFT JOIN blood_remark RM10 ON RM10.bloodremarkid = DN.sdrremark
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
AND CONCAT(DR.donorcode,DN.tpharpr,DN.hbsag,DN.hivagab,DN.hcvab,DN.hbvdna,DN.hcvrna,DN.hivrna) LIKE '%+%'
AND (CASE WHEN '$placeid' = 1 THEN DN.placeid = 1 ELSE true END)
AND (CASE WHEN '$placeid' = 2 THEN (CASE WHEN '$unitnameid' != 0 THEN (DN.unitnameid = '$unitnameid')  ELSE DN.placeid = 2 END) ELSE true END)
AND (CASE WHEN '$placeid' = 3 THEN (CASE WHEN '$activityid' != 0 THEN (DN.activityid = '$activityid')  ELSE DN.placeid = 3 END) ELSE true END)
ORDER BY DN.donation_date ASC
";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
	while($row = mysqli_fetch_array($query))
	{
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>" . $row['bag_number'] . "</td>";
        $data.= "<td>" . $row['tpharpr_grade'] . "</td>";
        $data.= "<td>" . $row['hbsag_grade'] . "</td>";
        $data.= "<td>" . $row['hivagab_grade'] . "</td>";
        $data.= "<td>" . $row['hcvab_grade'] . "</td>";
        $data.= "<td>" . $row['hbvdna_grade'] . "</td>";
        $data.= "<td>" . $row['hcvrna_grade'] . "</td>";
        $data.= "<td>" . $row['hivrna_grade'] . "</td>";
        $data.= "<td>" . $row['donation_date'] . "</td>";
        $data.= "<td class=".$text.">" . $row['fullname'] ." " . $row['donorcode'] . "</td>";
        if($row['prc'] > 0){
        $data .= '<td><input type="checkbox" checked><p>' . $row['prcremark1'] . "</p></td>";
        } else{
        $data .= '<td><input type="checkbox"><p>' . $row['prcremark1'] . "</p></td>";
        }
    if ($row['lprc'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['lprcremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['lprcremark1'] . "</p></td>";
    }
    if ($row['ffp'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['ffpremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['ffpremark1'] . "</p></td>";
    }
    if ($row['pc'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['pcremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['pcremark1'] . "</p></td>";
    }
    if ($row['lppc'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['lppcremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['lppcremark1'] . "</p></td>";
    }
    if ($row['lppc_pas'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['lppc_pasremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['lppc_pasremark1'] . "</p></td>";
    }
    if ($row['sdp'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['sdpremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['sdpremark1'] . "</p></td>";
    }
    if ($row['sdp_pas'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['sdp_pasremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['sdp_pasremark1'] . "</p></td>";
    }
    if ($row['wb'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['wbremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['wbremark1'] . "</p></td>";
    }
    if ($row['ldprc'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['ldprcremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['ldprcremark1'] . "</p></td>";
    }
    if ($row['sdr'] > 0) {
        $data .= '<td><input type="checkbox" checked><p>' . $row['sdrremark1'] . "</p></td>";
    } else {
        $data .= '<td><input type="checkbox"><p>' . $row['sdrremark1'] . "</p></td>";
    }
        $data.= "</tr>";
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
