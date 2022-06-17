<?php

include('connection.php');
include('checkPermission.php');
$status = true;
if(!checkPermission("BK_BLOOD_INFECT","ED")) 
{
    $status = false;
}

$logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

mysqli_query($conn,"INSERT INTO log_data(logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$logtext','$dateNowValue','$username','blood-Infected','บันทึกเลือดติดเชื้อ')");





mysqli_autocommit($conn, FALSE);

    $arr = json_decode($_POST['arrInfected']);

    foreach ($arr as $item) {

        $tpharpr = $item[0]->tpharpr ;
        $hbsag = $item[0]->hbsag;
        $hivagab = $item[0]->hivagab;
        $hcvab = $item[0]->hcvab;
        $hbvdna = $item[0]->hbvdna;
        $hcvrna = $item[0]->hcvrna;
        $hivrna = $item[0]->hivrna;


        $tpharpr_grade = $item[0]->tpharpr_grade ;
        $hbsag_grade = $item[0]->hbsag_grade;
        $hivagab_grade = $item[0]->hivagab_grade;
        $hcvab_grade = $item[0]->hcvab_grade;
        $hbvdna_grade = $item[0]->hbvdna_grade;
        $hcvrna_grade = $item[0]->hcvrna_grade;
        $hivrna_grade = $item[0]->hivrna_grade;

        $cross_remark = $item[0]->cross_remark;
        $iscross_remark = $item[0]->iscross_remark;
        
        $donateid = $item[0]->donateid;
        $bloodstatusid = $item[0]->bloodstatusid;

        $donorid = $item[0]->donorid;
        $donorcode = $item[0]->donorcode;
        $importstatus = $item[0]->importstatus;

        
        $blood_group_cross = $item[0]->blood_group_cross;
        $rh_cross = "Rh".$item[0]->rh_cross;
        $bloodrhsceen_cross = "Rh".$item[0]->bloodrhsceen_cross;
        $bloodrhsceen_cross_s = $item[0]->bloodrhsceen_cross_s;
        $bloodrhsceen_cross_p = $item[0]->bloodrhsceen_cross_p;
        $bloodrhsceen_cross_c = $item[0]->bloodrhsceen_cross_c;
        $bloodrhsceen = $item[0]->bloodrhsceen;

        $donation_qty = $item[0]->donation_qty;
        

        $condition = '';

        if(!empty($blood_group_cross))
        $condition = $condition."blood_group = '$blood_group_cross',";

        if(!empty($rh_cross))
        $condition = $condition."rh = '".getRh($rh_cross)."',";

        if($bloodrhsceen_cross == "Rh+")
        {
            $condition = $condition."ffpremark = '20',";
            $condition = $condition."pcremark = '20',";
        }

        $sql = "UPDATE donate SET 
        $condition
        tpharpr = '$tpharpr',
        hbsag = '$hbsag',
        hivagab = '$hivagab',
        hcvab = '$hcvab',
        hbvdna = '$hbvdna',
        hcvrna = '$hcvrna',
        hivrna = '$hivrna',
        
        tpharpr_grade = '$tpharpr_grade',
        hbsag_grade = '$hbsag_grade',
        hivagab_grade = '$hivagab_grade',
        hcvab_grade = '$hcvab_grade',
        hbvdna_grade = '$hbvdna_grade',
        hcvrna_grade = '$hcvrna_grade',
        hivrna_grade = '$hivrna_grade',

        cross_remark = '$cross_remark',
        iscross_remark = '$iscross_remark',
        bloodstatusid = '$bloodstatusid',
        blood_group_cross = '$blood_group_cross',
        rh_cross = '".getRh($rh_cross)."',
        bloodrhsceen_cross = '".getRh($bloodrhsceen_cross)."',
        bloodrhsceen_cross_s = '".$bloodrhsceen_cross_s."',
        bloodrhsceen_cross_p = '".$bloodrhsceen_cross_p."',
        bloodrhsceen_cross_c = '".$bloodrhsceen_cross_c."',
        bloodrh_sceen = '$bloodrhsceen',
        importstatus = '$importstatus',
        donation_qty = '$donation_qty'
        
        WHERE donateid = '$donateid'
        ";

        

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        $condition = '';

        if(!empty($blood_group_cross))
        $condition = $condition."blood_group = '$blood_group_cross',";

        if(!empty($rh_cross))
        $condition = $condition."rh = '".getRh($rh_cross)."',";

        $sql = "UPDATE donor SET 
        $condition
        donorcode = '$donorcode'
        
        WHERE donorid = '$donorid'
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        $condition = '';

        if(!empty($blood_group_cross))
        $condition = $condition."bloodgroup = '$blood_group_cross',";

        if(!empty($rh_cross))
        $condition = $condition."bloodrh = '".getRh($rh_cross)."',";


        $sql = "UPDATE bloodstock SET 
        $condition
        donorid = '$donorid'
        
        WHERE donorid = '$donorid'
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

    }

    if ($status) {
        mysqli_commit($conn);
    }else
    {
        mysqli_rollback($conn);
    }

    echo json_encode(
        array(
            'status' => $status,
        )
    );

    function getRh($v="")
    {
        $v = str_replace("Rh","",$v);
        $v = str_replace("Rh","",$v);
        $v = str_replace("Rh","",$v);

        if($v == "+" || $v == "-")
        {
            return  "Rh".$v ;
        }else if($v == "W")
        {
            return  "Rh(D)" ;
        }else
        {
            return  $v ;
        }

        
    }

?>