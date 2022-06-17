<?php

include('connection.php');
include('data/dateFormat.php');
include('dateNow.php');
include('checkPermission.php');

$status = true;

if(!checkPermission("BK_BLOOD_RESULT","ED")) 
{
    $status = false;
}
$donateid = $_POST['donateid'];
$logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$donateid','$logtext','$dateNowValue','$username','blood-investigate','บันทึกผลตรวจเลือดผู้มาบริจาค')");


mysqli_autocommit($conn, FALSE);
$fullname = $_POST['fullname'];


$antia1 = $_POST['antia1'];
$antih = $_POST['antih'];
$a2cells = $_POST['a2cells'];
$dat_poly = $_POST['dat_poly'];
$dat_igg = $_POST['dat_igg'];
$dat_c3d = $_POST['dat_c3d'];
$dat_ccc = $_POST['dat_ccc'];

$bloodgroupinvest = $_POST['bloodgroupinvest'];
$bloodrhinvest = $_POST['bloodrhinvest'];
$bloodrhsceen = $_POST['bloodrhsceen'];

$istube = (!empty($_POST['istube']))?$_POST['istube']:0 ;
$isblood_invest_remark = (!empty($_POST['isblood_invest_remark']))?$_POST['isblood_invest_remark']:0 ;
$blood_invest_remark = $_POST['blood_invest_remark'];
$blood_invest_other = $_POST['blood_invest_other'];
$rouleaux = (!empty($_POST['rouleaux']))?$_POST['rouleaux']:0 ;

$antibody = $_POST['antibody'];
$phenotype = $_POST['phenotype'];
$phenotypeshow = $_POST['phenotypeshow'];
$donorid = $_POST['donorid'];

$blood_group_cross = $_POST['blood_group_cross'];
$rh_cross = $_POST['rh_cross'];

$tpharpr = $_POST['tpharpr'];
$hbsag = $_POST['hbsag'];
$hivagab = $_POST['hivagab'];
$hcvab = $_POST['hcvab'];
$hbvdna = $_POST['hbvdna'];
$hcvrna = $_POST['hcvrna'];
$hivrna = $_POST['hivrna'];

$blood_invest_tube_edta = $_POST['blood_invest_tube_edta'];
$blood_invest_tube_clotted = $_POST['blood_invest_tube_clotted'];
$blood_invest_tube_acd = $_POST['blood_invest_tube_acd'];

// Antibody Screening tes
$tubeantibodyscreeningtest = $_POST['tubeantibodyscreeningtest'];
$dateantibodyscreeningtest = date_format_YMD($_POST['dateantibodyscreeningtest']);

$staffantibodyscreeningtest = $_POST['staffantibodyscreeningtest'];


    $sql = "UPDATE donate SET
        antia1 = '$antia1',
        antih = '$antih',
        a2cells = '$a2cells',
        dat_poly = '$dat_poly',
        dat_igg = '$dat_igg',
        dat_c3d = '$dat_c3d',
        dat_ccc = '$dat_ccc',
        blood_group_raj = '$bloodgroupinvest',
        rh_raj = '$bloodrhinvest',
        bloodrh_sceen = '$bloodrhsceen',
        istube = '$istube',
        isblood_invest_remark = '$isblood_invest_remark',
        blood_invest_remark = '$blood_invest_remark',
        blood_invest_other = '$blood_invest_other',
        blood_invest_tube_edta = '$blood_invest_tube_edta',
        blood_invest_tube_clotted = '$blood_invest_tube_clotted',
        blood_invest_tube_acd = '$blood_invest_tube_acd',
        rouleaux = '$rouleaux',
        donateantibody = '$antibody',
        donatephenotype = '$phenotype',
        donatephenotypeshow = '$phenotypeshow',
        tubeantibodyscreeningtest = '$tubeantibodyscreeningtest',
        dateantibodyscreeningtest = '$dateantibodyscreeningtest',
        staffantibodyscreeningtest = '$staffantibodyscreeningtest'
        WHERE donateid = '$donateid'

    ";

    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $sql = "SELECT * FROM donor WHERE donorid = '$donorid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $donorid_data = $donorid ;
        $blood_group_data = $row['blood_group'] ;
        $updatetime_data = dateNowYMDHM() ;
        
        if($blood_group_data != $bloodgroupinvest && !empty($blood_group_data) && !empty($bloodgroupinvest))
        {
            
            $sql = "INSERT INTO blood_group_history
                    (   donorid,
                        donorblood_group,
                        donorblood_group_new,
                        updatetime,
                        fullname
                    )
                    VALUES
                    (
                        '$donorid_data',
                        '$blood_group_data',
                        '$bloodgroupinvest',
                        '$updatetime_data',
                        '$fullname'
                    )
                    ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = 0;
        }
    }
    
    // if(!empty($bloodgroupinvest))
    // {
    //     $sql = "UPDATE donor SET
    //         blood_group = '$bloodgroupinvest'
    //         WHERE donorid = '$donorid'
    //     ";

    //     $result = mysqli_query($conn, $sql);
    //     if(empty($result))
    //     $status = false;
    // }

   
    
    /*
    $bloodstatusid = '5';
    if(!empty($bloodgroupinvest) && !empty($bloodrhinvest) )
    {
        
        if(!empty($blood_group_cross) || !empty($rh_cross))
        {
            if(($blood_group_cross == $bloodgroupinvest) && ($bloodrhinvest == $rh_cross))
            {
                $bloodstatusid = '3';
            }else
            {
                $bloodstatusid = '7';
            }
        }

        if(
            $tpharpr == '+' ||
            $hbsag == '+' ||
            $hivagab == '+' ||
            $hcvab == '+' ||
            $hbvdna == '+' ||
            $hcvrna == '+' ||
            $hivrna == '+'
        )
        {
            $bloodstatusid = '4';
        }

        $sql = "UPDATE donate SET
        bloodstatusid = '$bloodstatusid'
        WHERE donateid = '$donateid'

        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;
    }
    */

    $condition = '';
    if(!empty($bloodrhsceen))
    $condition = $condition." antibodysceening = '$bloodrhsceen',";

    $sql = "UPDATE donor SET
        $condition
        antibody = '$antibody',
        phenotype = '$phenotype',
        phenotypeshow = '$phenotypeshow'
        WHERE donorid = '$donorid'

    ";
   
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $sql = "DELETE FROM donate_anti_sceen WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $arrAnti = json_decode($_POST['arrAnti']);
    foreach ($arrAnti as $item) {

        $donateantisceentest = $item[0]->donateantisceentest ;
        $donateantisceenp1mi = $item[0]->donateantisceenp1mi;
        $donateantisceeno = $item[0]->donateantisceeno;
        $donateantisceeno1 = $item[0]->donateantisceeno1;
        $donateantisceeno2 = $item[0]->donateantisceeno2;
        $donateantisceenenz = $item[0]->donateantisceenenz;
        $donateantisceenlotno = $item[0]->donateantisceenlotno;

        $sql = "INSERT INTO 
                donate_anti_sceen(
                            donateantisceentest,
                            donateantisceenp1mi,
                            donateantisceeno,
                            donateantisceeno1,
                            donateantisceeno2,
                            donateantisceenenz,
                            donateantisceenlotno,
                            donateid
                            ) 
                            VALUE 
                            ('$donateantisceentest',
                            '$donateantisceenp1mi',
                            '$donateantisceeno',
                            '$donateantisceeno1',
                            '$donateantisceeno2',
                            '$donateantisceenenz',
                            '$donateantisceenlotno',
                            '$donateid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

    }


    $sql = "DELETE FROM donate_anti_iden WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $arrIden = json_decode($_POST['arrIden']);
    foreach ($arrIden as $item) {

        $donateantiidentest = $item[0]->donateantiidentest ;
        $donateantiiden1 = $item[0]->donateantiiden1;
        $donateantiiden2 = $item[0]->donateantiiden2;
        $donateantiiden3 = $item[0]->donateantiiden3;
        $donateantiiden4 = $item[0]->donateantiiden4;
        $donateantiiden5 = $item[0]->donateantiiden5;
        $donateantiiden6 = $item[0]->donateantiiden6;
        $donateantiiden7 = $item[0]->donateantiiden7;
        $donateantiiden8 = $item[0]->donateantiiden8;
        $donateantiiden9 = $item[0]->donateantiiden9;
        $donateantiiden10 = $item[0]->donateantiiden10;
        $donateantiiden11 = $item[0]->donateantiiden11;
        $donateantiidenauto = $item[0]->donateantiidenauto;
        $donateantiidenlotno = $item[0]->donateantiidenlotno;
        

        $sql = "INSERT INTO 
                donate_anti_iden(
                            donateantiidentest,
                            donateantiiden1,
                            donateantiiden2,
                            donateantiiden3,
                            donateantiiden4,
                            donateantiiden5,
                            donateantiiden6,
                            donateantiiden7,
                            donateantiiden8,
                            donateantiiden9,
                            donateantiiden10,
                            donateantiiden11,
                            donateantiidenauto,
                            donateantiidenlotno,
                            donateid
                            ) 
                            VALUE 
                            ('$donateantiidentest',
                            '$donateantiiden1',
                            '$donateantiiden2',
                            '$donateantiiden3',
                            '$donateantiiden4',
                            '$donateantiiden5',
                            '$donateantiiden6',
                            '$donateantiiden7',
                            '$donateantiiden8',
                            '$donateantiiden9',
                            '$donateantiiden10',
                            '$donateantiiden11',
                            '$donateantiidenauto',
                            '$donateantiidenlotno',
                            '$donateid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

    }

    $sql = "DELETE FROM donate_rh WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $arrRh = json_decode($_POST['arrRh']);
    foreach ($arrRh as $item) {

        $donaterhreagent = $item[0]->donaterhreagent ;
        $donaterhrt = $item[0]->donaterhrt;
        $donaterh37c = $item[0]->donaterh37c;
        $donaterhiat = $item[0]->donaterhiat;
        $donaterhccc = $item[0]->donaterhccc;
        $donaterhresult = $item[0]->donaterhresult;
        

        $sql = "INSERT INTO 
                donate_rh(
                            donaterhreagent,
                            donaterhrt,
                            donaterh37c,
                            donaterhiat,
                            donaterhccc,
                            donaterhresult,
                            donateid
                            ) 
                            VALUE 
                            ('$donaterhreagent',
                            '$donaterhrt',
                            '$donaterh37c',
                            '$donaterhiat',
                            '$donaterhccc',
                            '$donaterhresult',
                            '$donateid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

    }

    
    $sql = "DELETE FROM donate_abo WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;
    
    $arrABO = json_decode($_POST['arrABO']);
    foreach ($arrABO as $item) {

        
        $donatereagent = $item[0]->donatereagent;
        $donateantia = $item[0]->donateantia;
        $donateantib = $item[0]->donateantib;
        $donateantiab = $item[0]->donateantiab;
        $donateacells = $item[0]->donateacells;
        $donatebcells = $item[0]->donatebcells;
        $donateocells = $item[0]->donateocells;
        $donatebloodgroup = $item[0]->donatebloodgroup;
        
        $sql = "INSERT INTO 
                donate_abo(
                            donatereagent,
                            donateantia,
                            donateantib,
                            donateantiab,
                            donateacells,
                            donatebcells,
                            donateocells,
                            donatebloodgroup,
                            donateid
                            ) 
                            VALUE 
                            (
                            '$donatereagent',
                            '$donateantia',
                            '$donateantib',
                            '$donateantiab',
                            '$donateacells',
                            '$donatebcells',
                            '$donateocells',
                            '$donatebloodgroup',
                            '$donateid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

    }


    $sql = "DELETE FROM donate_abo_modal WHERE donateid = '$donateid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;
    
    $arrABOModal = json_decode($_POST['arrABOModal']);
    foreach ($arrABOModal as $item) {

        $donatemodalreagent = $item[0]->donatemodalreagent;
        $donatemodalantia = $item[0]->donatemodalantia;
        $donatemodalantib = $item[0]->donatemodalantib;
        $donatemodalantiab = $item[0]->donatemodalantiab;
        $donatemodalacells = $item[0]->donatemodalacells;
        $donatemodalbcells = $item[0]->donatemodalbcells;
        $donatemodalocells = $item[0]->donatemodalocells;
        $donatemodalbloodgroup = $item[0]->donatemodalbloodgroup;
        $donatemodalaboremark = $item[0]->donatemodalaboremark;

        $donatemodalstaff = $item[0]->donatemodalstaff;
        $donatemodaldatetime = $item[0]->donatemodaldatetime;
        
        $sql = "INSERT INTO 
                donate_abo_modal(
                            donatemodalreagent,
                            donatemodalantia,
                            donatemodalantib,
                            donatemodalantiab,
                            donatemodalacells,
                            donatemodalbcells,
                            donatemodalocells,
                            donatemodalbloodgroup,
                            donatemodalaboremark,
                            donatemodalstaff,
                            donatemodaldatetime,
                            donateid
                            ) 
                            VALUE 
                            (
                            '$donatemodalreagent',
                            '$donatemodalantia',
                            '$donatemodalantib',
                            '$donatemodalantiab',
                            '$donatemodalacells',
                            '$donatemodalbcells',
                            '$donatemodalocells',
                            '$donatemodalbloodgroup',
                            '$donatemodalaboremark',
                            '$donatemodalstaff',
                            '$donatemodaldatetime',
                            '$donateid'
                            ) ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

    }
    


    $sql = "UPDATE bloodstock SET
    antibody = '$antibody',
    phenotype = '$phenotype',
    phenotypeshow = '$phenotypeshow'
    WHERE donorid = '$donorid'

    ";

    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


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

function date_format_YMD($date)
{
    $date_use = explode("/", $date);

    return ($date_use[2] - 543) . '-' . $date_use[1] . '-' . $date_use[0];
}

?>