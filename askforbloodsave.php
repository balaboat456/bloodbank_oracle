<?php
session_start();
include('connection.php');
include('data/running.php');
include('data/dateFormat.php');
include('dateNow.php');
date_default_timezone_set('Asia/Bangkok');

$status = 1;
mysqli_autocommit($conn, FALSE);

$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

$isbloodpreparation = $_SESSION['staffid'];

// start ผู้บริจาค
$requestbloodid = $_POST['requestbloodid'];
$requestbloodcode = $_POST['requestbloodcode'];
$hn = $_POST['hn'];
$an = $_POST['an'];
$fn = $_POST['fn'];
$vn = $_POST['vn'];
$prvno = $_POST['prvno'];
$insuranceid = $_POST['insuranceid'];
$insurancetext = $_POST['insurancetext'];
$anAPI = replaceANGet($an);

$requestunit = (!empty($_POST['requestunit']) && $_POST['requestunit'] != 'null') ? $_POST['requestunit'] : 0;
$usedunit = (!empty($_POST['usedunit']) && $_POST['usedunit'] != 'null') ? $_POST['usedunit'] : 0;
$bloodnotificationtypeid = (!empty($_POST['bloodnotificationtypeid']) && $_POST['bloodnotificationtypeid'] != 'null') ? $_POST['bloodnotificationtypeid'] : 0;
$durgicaldate = (!empty($_POST['durgicaldate'])) ? dmyToymd($_POST['durgicaldate']) : '0000-00-00';
$usedblooddatefrom = (!empty($_POST['usedblooddatefrom'])) ? dmyToymd($_POST['usedblooddatefrom']) : '0000-00-00';
$usedblooddateto = (!empty($_POST['usedblooddateto'])) ? dmyToymd($_POST['usedblooddateto']) : '0000-00-00';
$nurseid = (!empty($_POST['nurseid']) && $_POST['nurseid'] != 'null') ? $_POST['nurseid'] : 0;
$doctorid = (!empty($_POST['doctorid']) && $_POST['doctorid'] != 'null') ? $_POST['doctorid'] : 0;
$doctorcode2 = (!empty($_POST['doctorcode2']) && $_POST['doctorcode2'] != 'null') ? $_POST['doctorcode2'] : 0;
$blood_driller_id = (!empty($_POST['blood_driller_id']) && $_POST['blood_driller_id'] != 'null') ? $_POST['blood_driller_id'] : 0;
$blood_certifier_id = (!empty($_POST['blood_certifier_id']) && $_POST['blood_certifier_id'] != 'null') ? $_POST['blood_certifier_id'] : 0;
$diseasegroupid = (!empty($_POST['diseasegroupid']) && $_POST['diseasegroupid'] != 'null') ? $_POST['diseasegroupid'] : 0;
$diagnosisid = $_POST['diagnosisid'];
$diagnosis = $_POST['diagnosis'];
$diagnosisdetail = str_replace("'","`",$_POST['diagnosisdetail']);
$bloodsampletube = $_POST['bloodsampletube'];
$bloodgroupid = (!empty($_POST['bloodgroupid']) && $_POST['bloodgroupid'] != 'null') ? $_POST['bloodgroupid'] : '';
$rhid =  (!empty($_POST['rhid']) && $_POST['rhid'] != 'null') ? $_POST['rhid'] : '';
$forchildren = $_POST['forchildren'];
$pregnant = $_POST['pregnant'];
$pregnantdate = (!empty($_POST['pregnantdate'])) ? dmyToymd($_POST['pregnantdate']) : '0000-00-00';
$pregnantqty = (!empty($_POST['pregnantqty'])) ? $_POST['pregnantqty'] : 0;
$bloodtransfusion = $_POST['bloodtransfusion'];
$bloodtransfusionlast = (!empty($_POST['bloodtransfusionlast'])) ? dmyToymd($_POST['bloodtransfusionlast']) : '0000-00-00';
$plasmaexchange = $_POST['plasmaexchange'];
$screenforplateletantibody = $_POST['screenforplateletantibody'];
$hlacrossmatchsingledonorplatelet = $_POST['hlacrossmatchsingledonorplatelet'];
$washedredbloodcell = $_POST['washedredbloodcell'];
$light = $_POST['light'];

$requestblooddate = dmyToymd(dateNowDMY());
$requestbloodtime = date("H:i");

$payblooddate = dmyToymd($_POST['payblooddate']);
$paybloodtime = $_POST['paybloodtime'];

$user_testblood = $_POST['user_testblood'];

$conclusionofinvestigationresults = $_POST['conclusionofinvestigationresults'];
$interpretation = $_POST['interpretation'];

$bloodwash_date1 = $_POST['bloodwash_date1'];
$bloodwash_round1 = $_POST['bloodwash_round1'];
$bloodwash_unit1 = $_POST['bloodwash_unit1'];
$bloodwash_ml1 = $_POST['bloodwash_ml1'];
$bloodwash_intense1 = $_POST['bloodwash_intense1'];

$bloodwash_date2 = $_POST['bloodwash_date2'];
$bloodwash_round2 = $_POST['bloodwash_round2'];
$bloodwash_unit2 = $_POST['bloodwash_unit2'];
$bloodwash_ml2 = $_POST['bloodwash_ml2'];
$bloodwash_intense2 = $_POST['bloodwash_intense2'];

$bloodwash_date3 = $_POST['bloodwash_date3'];
$bloodwash_round3 = $_POST['bloodwash_round3'];
$bloodwash_unit3 = $_POST['bloodwash_unit3'];
$bloodwash_ml3 = $_POST['bloodwash_ml3'];
$bloodwash_intense3 = $_POST['bloodwash_intense3'];

$bloodwash_date4 = $_POST['bloodwash_date4'];
$bloodwash_round4 = $_POST['bloodwash_round4'];
$bloodwash_unit4 = $_POST['bloodwash_unit4'];
$bloodwash_ml4 = $_POST['bloodwash_ml4'];
$bloodwash_intense4 = $_POST['bloodwash_intense4'];

$bloodwash_user = $_POST['bloodwash_user'];
$bloodwash_tel = $_POST['bloodwash_tel'];

$bloodwash_id1 = $_POST['bloodwash_id1'];
$bloodwash_id2 = $_POST['bloodwash_id2'];
$bloodwash_id3 = $_POST['bloodwash_id3'];
$bloodwash_id4 = $_POST['bloodwash_id4'];

$bloodgrouppregnant = $_POST['bloodgrouppregnant'];

$group_antibody = $_POST['group_antibody'];
$group_phenotypedisplay = $_POST['group_phenotypedisplay'];

if (empty($hn))
    $status = false;


if (empty($requestbloodid)) {
    $running = getRunningYM('RQB');
    $requestbloodid = $running['runn'];
    $requestbloodcode = $running['code'];
    $sql = "
        INSERT INTO request_blood
        (
            requestbloodid,
            requestbloodcode,
            hn,
            an,
            fn,
            vn,
            prvno,
            insuranceid,
            insurancetext,
            requestunit,
            usedunit,
            bloodnotificationtypeid,
            durgicaldate,
            usedblooddatefrom,
            usedblooddateto,
            nurseid,
            doctorid,
            blood_driller_id,
            blood_certifier_id,
            diseasegroupid,
            diagnosisid,
            diagnosis,
            diagnosisdetail,
            bloodsampletube,
            bloodgroupid,
            rhid,
            forchildren,
            pregnant,
            pregnantdate,
            pregnantqty,
            bloodtransfusion,
            bloodtransfusionlast,
            plasmaexchange,
            screenforplateletantibody,
            hlacrossmatchsingledonorplatelet,
            washedredbloodcell,
            light,
            requestblooddate,
            requestbloodtime,
            group_antibody,
            group_phenotypedisplay,
            bloodgrouppregnant
        )
        VALUE
        (
            '$requestbloodid',
            '$requestbloodcode',
            '$hn',
            '$an',
            '$fn',
            '$vn',
            '$prvno',
            '$insuranceid',
            '$insurancetext',
            '$requestunit',
            '$usedunit',
            '$bloodnotificationtypeid',
            '$durgicaldate',
            '$usedblooddatefrom',
            '$usedblooddateto',
            '$nurseid',
            '$doctorid',
            '$blood_driller_id',
            '$blood_certifier_id',
            '$diseasegroupid',
            '$diagnosisid',
            '$diagnosis',
            '$diagnosisdetail',
            '$bloodsampletube',
            '$bloodgroupid',
            '$rhid',
            '$forchildren',
            '$pregnant',
            '$pregnantdate',
            '$pregnantqty',
            '$bloodtransfusion',
            '$bloodtransfusionlast',
            '$plasmaexchange',
            '$screenforplateletantibody',
            '$hlacrossmatchsingledonorplatelet',
            '$washedredbloodcell',
            '$light',
            '$requestblooddate',
            '$requestbloodtime',
            '$group_antibody',
            '$group_phenotypedisplay',
            '$bloodgrouppregnant'
        )
        ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
} else {
    $sql = "UPDATE request_blood SET
            hn = '$hn',
            requestunit = '$requestunit',
            usedunit = '$usedunit',
            bloodnotificationtypeid = '$bloodnotificationtypeid',
            durgicaldate = '$durgicaldate',
            usedblooddatefrom = '$usedblooddatefrom',
            usedblooddateto = '$usedblooddateto',
            nurseid = '$nurseid',
            doctorid = '$doctorid',
            blood_driller_id = '$blood_driller_id',
            blood_certifier_id = '$blood_certifier_id',
            diseasegroupid = '$diseasegroupid',
            diagnosisid = '$diagnosisid',
            diagnosis = '$diagnosis',
            diagnosisdetail = '$diagnosisdetail',
            bloodsampletube = '$bloodsampletube',
            bloodgroupid = '$bloodgroupid',
            rhid = '$rhid',
            forchildren = '$forchildren',
            pregnant = '$pregnant',
            pregnantdate = '$pregnantdate',
            pregnantqty = '$pregnantqty',
            bloodtransfusion = '$bloodtransfusion',
            bloodtransfusionlast = '$bloodtransfusionlast',
            plasmaexchange = '$plasmaexchange',
            screenforplateletantibody = '$screenforplateletantibody',
            hlacrossmatchsingledonorplatelet = '$hlacrossmatchsingledonorplatelet',
            washedredbloodcell = '$washedredbloodcell',
            light = '$light',

            bloodwash_user = '$bloodwash_user',
            bloodgrouppregnant = '$bloodgrouppregnant',
            bloodwash_tel = '$bloodwash_tel'

            WHERE requestbloodid = '$requestbloodid'
        ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}


$sql = "SELECT patientid
        FROM patient
        WHERE patienthn = '$hn'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $patientid = $row['patientid'];
}

if(empty($bloodwash_id1))
if ($bloodwash_date1 != '') {

    $running = getRunningYM('WRC');
    $bloodwashedredcellid = $running['runn'];
    $bloodwashedredcellcode = $running['code'];

    $sql = "UPDATE request_blood SET
                bloodwash_id1 = '$bloodwashedredcellid',
                bloodwash_date1 = '$bloodwash_date1',
                bloodwash_round1 = '$bloodwash_round1',
                bloodwash_unit1 = '$bloodwash_unit1',
                bloodwash_ml1 = '$bloodwash_ml1',
                bloodwash_intense1 = '$bloodwash_intense1'
                WHERE requestbloodid = '$requestbloodid'
            ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
    

    $sql = "INSERT INTO blood_washed_red_cell
            (
                bloodwashedredcellid,
                bloodwashedredcellcode,
                blood_wash_use_date,
                bloodwash_round,
                bloodwash_unit,
                bloodwash_ml,
                bloodwash_intense,
                patientid,
                unitofficeid,
                bloodgroupid,
                rhid,
                diagnosis,
                diagnosisdetail,
                user_order,
                bloodwash_user,
                bloodwash_tel,
                requestbloodid
            )
            VALUE
            (
                '$bloodwashedredcellid',
                '$bloodwashedredcellcode',
                '$bloodwash_date1',
                '$bloodwash_round1',
                '$bloodwash_unit1',
                '$bloodwash_ml1',
                '$bloodwash_intense1',
                '$patientid',
                '$requestunit',
                '$bloodgroupid',
                '$rhid',
                '$diagnosis',
                '$diagnosisdetail',
                '$doctorid',
                '$bloodwash_user',
                '$bloodwash_tel',
                '$requestbloodid'
            )";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}

if(empty($bloodwash_id2))
if ($bloodwash_date2 != '') {

    $running = getRunningYM('WRC');
    $bloodwashedredcellid = $running['runn'];
    $bloodwashedredcellcode = $running['code'];

    $sql = "UPDATE request_blood SET
                bloodwash_id2 = '$bloodwashedredcellid',
                bloodwash_date2 = '$bloodwash_date2',
                bloodwash_round2 = '$bloodwash_round2',
                bloodwash_unit2 = '$bloodwash_unit2',
                bloodwash_ml2 = '$bloodwash_ml2',
                bloodwash_intense2 = '$bloodwash_intense2'
                WHERE requestbloodid = '$requestbloodid'
            ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;

    

    $sql = "INSERT INTO blood_washed_red_cell
            (
                bloodwashedredcellid,
                bloodwashedredcellcode,
                blood_wash_use_date,
                bloodwash_round,
                bloodwash_unit,
                bloodwash_ml,
                bloodwash_intense,
                patientid,
                unitofficeid,
                bloodgroupid,
                rhid,
                diagnosis,
                diagnosisdetail,
                user_order,
                bloodwash_user,
                bloodwash_tel,
                requestbloodid
            )
            VALUE
            (
                '$bloodwashedredcellid',
                '$bloodwashedredcellcode',
                '$bloodwash_date2',
                '$bloodwash_round2',
                '$bloodwash_unit2',
                '$bloodwash_ml2',
                '$bloodwash_intense2',
                '$patientid',
                '$requestunit',
                '$bloodgroupid',
                '$rhid',
                '$diagnosis',
                '$diagnosisdetail',
                '$doctorid',
                '$bloodwash_user',
                '$bloodwash_tel',
                '$requestbloodid'
            )";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}

if(empty($bloodwash_id3))
if ($bloodwash_date3 != '') {

    $running = getRunningYM('WRC');
    $bloodwashedredcellid = $running['runn'];
    $bloodwashedredcellcode = $running['code'];

    $sql = "UPDATE request_blood SET
                bloodwash_id3 = '$bloodwashedredcellid',
                bloodwash_date3 = '$bloodwash_date3',
                bloodwash_round3 = '$bloodwash_round3',
                bloodwash_unit3 = '$bloodwash_unit3',
                bloodwash_ml3 = '$bloodwash_ml3',
                bloodwash_intense3 = '$bloodwash_intense3'
                WHERE requestbloodid = '$requestbloodid'
            ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;


    $sql = "INSERT INTO blood_washed_red_cell
            (
                bloodwashedredcellid,
                bloodwashedredcellcode,
                blood_wash_use_date,
                bloodwash_round,
                bloodwash_unit,
                bloodwash_ml,
                bloodwash_intense,
                patientid,
                unitofficeid,
                bloodgroupid,
                rhid,
                diagnosis,
                diagnosisdetail,
                user_order,
                bloodwash_user,
                bloodwash_tel,
                requestbloodid
            )
            VALUE
            (
                '$bloodwashedredcellid',
                '$bloodwashedredcellcode',
                '$bloodwash_date3',
                '$bloodwash_round3',
                '$bloodwash_unit3',
                '$bloodwash_ml3',
                '$bloodwash_intense3',
                '$patientid',
                '$requestunit',
                '$bloodgroupid',
                '$rhid',
                '$diagnosis',
                '$diagnosisdetail',
                '$doctorid',
                '$bloodwash_user',
                '$bloodwash_tel',
                '$requestbloodid'
            )";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}


if(empty($bloodwash_id4))
if ($bloodwash_date4 != '') {

    $running = getRunningYM('WRC');
    $bloodwashedredcellid = $running['runn'];
    $bloodwashedredcellcode = $running['code'];

    $sql = "UPDATE request_blood SET
                bloodwash_id4 = '$bloodwashedredcellid',
                bloodwash_date4 = '$bloodwash_date4',
                bloodwash_round4 = '$bloodwash_round4',
                bloodwash_unit4 = '$bloodwash_unit4',
                bloodwash_ml4 = '$bloodwash_ml4',
                bloodwash_intense4 = '$bloodwash_intense4'
                WHERE requestbloodid = '$requestbloodid'
            ";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;


    $sql = "INSERT INTO blood_washed_red_cell
            (
                bloodwashedredcellid,
                bloodwashedredcellcode,
                blood_wash_use_date,
                bloodwash_round,
                bloodwash_unit,
                bloodwash_ml,
                bloodwash_intense,
                patientid,
                unitofficeid,
                bloodgroupid,
                rhid,
                diagnosis,
                diagnosisdetail,
                user_order,
                bloodwash_user,
                bloodwash_tel,
                requestbloodid

            )
            VALUE
            (
                '$bloodwashedredcellid',
                '$bloodwashedredcellcode',
                '$bloodwash_date4',
                '$bloodwash_round4',
                '$bloodwash_unit4',
                '$bloodwash_ml4',
                '$bloodwash_intense4',
                '$patientid',
                '$requestunit',
                '$bloodgroupid',
                '$rhid',
                '$diagnosis',
                '$diagnosisdetail',
                '$doctorid',
                '$bloodwash_user',
                '$bloodwash_tel',
                '$requestbloodid'
            )";
    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}

if ($bloodnotificationtypeid == 2) {
    $sql = "
            UPDATE request_blood SET
            ispaybloodstatus = '1'
            WHERE requestbloodid = '$requestbloodid'
            ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}



$sql = "DELETE FROM request_blood_item WHERE requestbloodid = '$requestbloodid' ";
$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = false;


$requestblooddetail = json_decode($_POST['requestblooddetail']);

foreach ($requestblooddetail as $item) {


    $im = json_decode($item);

    $bloodstocktypeid = (!empty($im[0]->bloodstocktypeid)) ? $im[0]->bloodstocktypeid : 0;
    $requestblooditemqty =   (!empty($im[0]->requestblooditemqty)) ? $im[0]->requestblooditemqty : "";
    $requestblooditemcc =   (!empty($im[0]->requestblooditemcc)) ? $im[0]->requestblooditemcc : "";
    $requestblooditemdate = (!empty($im[0]->requestblooditemdate)) ? dmyToymd($im[0]->requestblooditemdate) : '0000-00-00';

    $sql = "
                INSERT INTO request_blood_item
                (
                    bloodstocktypeid,
                    requestblooditemqty,
                    requestblooditemcc,
                    requestblooditemdate,
                    requestbloodid
                )
                value
                (
                    '$bloodstocktypeid',
                    '$requestblooditemqty',
                    '$requestblooditemcc',
                    '$requestblooditemdate',
                    '$requestbloodid'
                )
            ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}


$requestbloodcrossmacthid = $_POST['requestbloodcrossmacthid'];
if (!empty($requestbloodcrossmacthid)) {

    $stoppayblooddate_allergic = (!empty($_POST['stoppayblooddate_allergic'])) ? dmyToymd($_POST['stoppayblooddate_allergic']) : '0000-00-00';
    $stoppaybloodtime_allergic = $_POST['stoppaybloodtime_allergic'];
    $totalbloodrequestcc_allergic = (!empty($_POST['totalbloodrequestcc_allergic'])) ? $_POST['totalbloodrequestcc_allergic'] : 0;
    $sideeffects_allergic = $_POST['sideeffects_allergic'];
    $sideeffectsdate_allergic = (!empty($_POST['sideeffectsdate_allergic'])) ? dmyToymd($_POST['sideeffectsdate_allergic']) : '0000-00-00';
    $sideeffectstime_allergic = $_POST['sideeffectstime_allergic'];

    $isincreasebodytemp_allergic = $_POST['isincreasebodytemp_allergic'];
    $ischills_allergic = $_POST['ischills_allergic'];
    $isurticaria_allergic = $_POST['isurticaria_allergic'];
    $isitching_allergic = $_POST['isitching_allergic'];
    $isflushing_allergic = $_POST['isflushing_allergic'];
    $ismusclepain_allergic = $_POST['ismusclepain_allergic'];
    $ishypotension_allergic = $_POST['ishypotension_allergic'];
    $ishypertension_allergic = $_POST['ishypertension_allergic'];
    $isanaphylaxis_allergic = $_POST['isanaphylaxis_allergic'];
    $isdyspnea_allergic = $_POST['isdyspnea_allergic'];
    $isdecreaseurineout_allergic = $_POST['isdecreaseurineout_allergic'];
    $isdarkredurine_allergic = $_POST['isdarkredurine_allergic'];
    $isother_allergic = $_POST['isother_allergic'];
    $othereffects_allergic = $_POST['othereffects_allergic'];

    $before_temp_allergic = $_POST['before_temp_allergic'];
    $before_bpstart_allergic = $_POST['before_bpstart_allergic'];
    $before_bpend_allergic = $_POST['before_bpend_allergic'];
    $before_pmin_allergic = $_POST['before_pmin_allergic'];
    $before_rmin_allergic = $_POST['before_rmin_allergic'];
    $after_temp_allergic = $_POST['after_temp_allergic'];
    $after_bpstart_allergic = $_POST['after_bpstart_allergic'];
    $after_bpend_allergic = $_POST['after_bpend_allergic'];
    $after_pmin_allergic = $_POST['after_pmin_allergic'];
    $after_rmin_allergic = $_POST['after_rmin_allergic'];

    $ishemolytictransfusionreation2_allergic = $_POST['ishemolytictransfusionreation2_allergic'];
    $isfebrilehemolytictransfusionreation2_allergic = $_POST['isfebrilehemolytictransfusionreation2_allergic'];
    $isallergicreation2_allergic = $_POST['isallergicreation2_allergic'];
    $isanaphylaxis2_allergic = $_POST['isanaphylaxis2_allergic'];
    $isinfectionsepsisreatedtransfusion2_allergic = $_POST['isinfectionsepsisreatedtransfusion2_allergic'];
    $istransfusionreatedacutelunginjury2_allergic = $_POST['istransfusionreatedacutelunginjury2_allergic'];
    $isother2_allergic = $_POST['isother2_allergic'];
    $othereffects2_allergic = $_POST['othereffects2_allergic'];

    $requestbloodcrossmacthremark = $_POST['requestbloodcrossmacthremark'];

    $bloodallergyrecorder = $_POST['bloodallergyrecorder'];

    $useblooddate = dmyToymd($_POST['useblooddate']);
    $usebloodtime = $_POST['usebloodtime'];


    $result_testblood = (!empty($_POST['result_testblood'])) ? $_POST['result_testblood'] : 0;
    $remark_testblood = $_POST['remark_testblood'];


    $sql = "UPDATE  request_blood_crossmacth SET 
                stoppayblooddate_allergic = '$stoppayblooddate_allergic' ,
                stoppaybloodtime_allergic = '$stoppaybloodtime_allergic' ,
                totalbloodrequestcc_allergic = '$totalbloodrequestcc_allergic' ,
                sideeffects_allergic = '$sideeffects_allergic' ,
                sideeffectsdate_allergic = '$sideeffectsdate_allergic' ,
                sideeffectstime_allergic = '$sideeffectstime_allergic' ,
                isincreasebodytemp_allergic = '$isincreasebodytemp_allergic' ,
                ischills_allergic = '$ischills_allergic' ,
                isurticaria_allergic = '$isurticaria_allergic' ,
                isitching_allergic = '$isitching_allergic' ,
                isflushing_allergic = '$isflushing_allergic' ,
                ismusclepain_allergic = '$ismusclepain_allergic' ,
                ishypotension_allergic = '$ishypotension_allergic' ,
                ishypertension_allergic = '$ishypertension_allergic' ,
                isanaphylaxis_allergic = '$isanaphylaxis_allergic' ,
                isdyspnea_allergic = '$isdyspnea_allergic' ,
                isdecreaseurineout_allergic = '$isdecreaseurineout_allergic' ,
                isdarkredurine_allergic = '$isdarkredurine_allergic' ,
                isother_allergic = '$isother_allergic' ,
                othereffects_allergic = '$othereffects_allergic' ,

                before_temp_allergic = '$before_temp_allergic' ,
                before_bpstart_allergic = '$before_bpstart_allergic' ,
                before_bpend_allergic = '$before_bpend_allergic' ,
                before_pmin_allergic = '$before_pmin_allergic' ,
                before_rmin_allergic = '$before_rmin_allergic' ,
                after_temp_allergic = '$after_temp_allergic' ,
                after_bpstart_allergic = '$after_bpstart_allergic' ,
                after_bpend_allergic = '$after_bpend_allergic' ,
                after_pmin_allergic = '$after_pmin_allergic' ,
                after_rmin_allergic = '$after_rmin_allergic' ,

                ishemolytictransfusionreation2_allergic = '$ishemolytictransfusionreation2_allergic' ,
                isfebrilehemolytictransfusionreation2_allergic = '$isfebrilehemolytictransfusionreation2_allergic' ,
                isallergicreation2_allergic = '$isallergicreation2_allergic' ,
                isanaphylaxis2_allergic = '$isanaphylaxis2_allergic' ,
                isinfectionsepsisreatedtransfusion2_allergic = '$isinfectionsepsisreatedtransfusion2_allergic' ,
                istransfusionreatedacutelunginjury2_allergic = '$istransfusionreatedacutelunginjury2_allergic' ,
                isother2_allergic = '$isother2_allergic' ,
                othereffects2_allergic = '$othereffects2_allergic',
                requestbloodcrossmacthremark = '$requestbloodcrossmacthremark',
                bloodallergyrecorder = '$bloodallergyrecorder',
                result_testblood = '$result_testblood',
                user_testblood = '$user_testblood',
                conclusionofinvestigationresults = '$conclusionofinvestigationresults',
                interpretation = '$interpretation',
                remark_testblood = '$remark_testblood',
                useblooddate = '$useblooddate',
                usebloodtime = '$usebloodtime'
                WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                
            ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}

$allergictoblood = json_decode($_POST['allergictoblood']);
foreach ($allergictoblood as $item) {


    $im = json_decode($item);

    $isallergic = (!empty($im->isallergic)) ? $im->isallergic : 0;
    $requestbloodcrossmacthid =   $im->requestbloodcrossmacthid;

    $sql = "UPDATE  request_blood_crossmacth SET 
                isallergic = '$isallergic'
                WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
            ";


    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}

$returnblood = json_decode($_POST['returnblood']);
foreach ($returnblood as $item) {

    $im = json_decode($item);

    $requestbloodcrossmacthid =   $im->requestbloodcrossmacthid;
    $requestbloodreturnstatusid =   $im->requestbloodreturnstatusid;


    $blooddate_return =   $im->blooddate_return;
    $bloodtime_return =   $im->bloodtime_return;
    $bloodsavedate_return =   (!empty($im->bloodsavedate_return) && $im->bloodsavedate_return != "0000-00-00") ? ($im->bloodsavedate_return) : '0000-00-00';
    $bloodsavetime_return =   $im->bloodsavetime_return;
    $bloodcc_return =   $im->bloodcc_return;
    $warm_retuen =   $im->warm_retuen;
    $ischeck_return =   $im->ischeck_return;

    if ($requestbloodreturnstatusid == 2 && (empty($bloodsavedate_return) || $bloodsavedate_return == "0000-00-00")) {
        $bloodsavedate_return = dmyToymd(dateNowDMY());
        $bloodsavetime_return = date("H:i");
    }

    $username = '';
    if (!empty($ischeck_return))
        $username = $_SESSION['username'];

    $sql = "UPDATE  request_blood_crossmacth SET 
                requestbloodreturnstatusid = '$requestbloodreturnstatusid',
                blooddate_return = '$blooddate_return',
                bloodtime_return = '$bloodtime_return',
                bloodsavedate_return = '$bloodsavedate_return',
                bloodsavetime_return = '$bloodsavetime_return',
                bloodcc_return = '$bloodcc_return',
                warm_retuen = '$warm_retuen',
                ischeck_return = '$ischeck_return',
                username_return = '$username'
                WHERE requestbloodcrossmacthid = '$requestbloodcrossmacthid'
                AND crossmacthstatusid NOT IN (10,11)
            ";

    $result = mysqli_query($conn, $sql);
    if (empty($result))
        $status = false;
}

$ac_requestbloodcrossmacthid = $_POST['ac_requestbloodcrossmacthid'];

$sql = "DELETE FROM request_blood_crossmacth_lab_test WHERE requestbloodcrossmacthid = '$ac_requestbloodcrossmacthid' ";
$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = false;

if (!empty($ac_requestbloodcrossmacthid)) {
    $testblood = json_decode($_POST['testblood']);

    foreach ($testblood as $item) {


        $im = json_decode($item);

        $labinvestigationid = (!empty($im[0]->labinvestigationid)) ? $im[0]->labinvestigationid : 0;
        $requestbloodcrossmacthlabtestpre = $im[0]->requestbloodcrossmacthlabtestpre;
        $requestbloodcrossmacthlabtestpost = $im[0]->requestbloodcrossmacthlabtestpost;
        $requestbloodcrossmacthlabtestunit = $im[0]->requestbloodcrossmacthlabtestunit;
        $requestbloodcrossmacthlabtestother = $im[0]->requestbloodcrossmacthlabtestother;
        $inspector = (!empty($im[0]->inspector)) ? $im[0]->inspector : '';

        $sql = "
                    INSERT INTO request_blood_crossmacth_lab_test
                    (
                        labinvestigationid,
                        requestbloodcrossmacthlabtestpre,
                        requestbloodcrossmacthlabtestpost,
                        requestbloodcrossmacthlabtestunit,
                        requestbloodcrossmacthlabtestother,
                        inspector,
                        requestbloodcrossmacthid
                    )
                    value
                    (
                        '$labinvestigationid',
                        '$requestbloodcrossmacthlabtestpre',
                        '$requestbloodcrossmacthlabtestpost',
                        '$requestbloodcrossmacthlabtestunit',
                        '$requestbloodcrossmacthlabtestother',
                        '$inspector',
                        '$ac_requestbloodcrossmacthid'
                    )
                ";
        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = false;
    }
}


$formbloodout = json_decode($_POST['formbloodemergency']);

$running = getRunningYM('RQB22');
$grouppayid = $running['runn'];

$countcheckout = 0;
foreach ($formbloodout as $item) {
    $im = json_decode($item);
    $ischeckout = $im[0]->ischeckout;
    $bag_number = $im[0]->bag_number;
    $sub = $im[0]->sub;
    $bloodtype = $im[0]->bloodtype;
    $bloodgroup = $im[0]->bloodgroup;
    $bloodrh = $im[0]->bloodrh;
    $bloodstockid = $im[0]->bloodstockid;


    $requestbloodcrossmacthid = $im[0]->requestbloodcrossmacthid;
    
    if ($ischeckout) {
        $username = $_SESSION['username'];
        $sql = "INSERT INTO request_blood_crossmacth
                    (
                        bag_number,
                        sub,
                        bloodgroupid,
                        rhid,
                        bloodtype,
                        bloodstockid,
                        crossmacthstatusid,
                        requestbloodid,
                        ispayblood,
                        payblooddate,
                        paybloodtime,
                        payuser,
                        grouppayid,
                        isbloodpreparation
                    )
                    VALUES
                    (
                        '$bag_number',
                        '$sub',
                        '$bloodgroup',
                        '$bloodrh',
                        '$bloodtype',
                        '$bloodstockid',
                        '9',
                        '$requestbloodid',
                        '1',
                        '$payblooddate',
                        '$paybloodtime',
                        '$username',
                        '$grouppayid',
                        '$isbloodpreparation'
                    )
            ";


        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = false;


        $sql = "
            UPDATE bloodstock SET
            bloodstockpaytypeid = '4'
            WHERE bloodstockid = '$bloodstockid'
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = false;


            $countcheckout++;
    }

}

if($countcheckout > 0)
{

    $dateMDY = date('m/d/Y');
    $dateHIS = intval(date('His'));
    $hn_his = replaceHNGet($hn);

    $conditionAPI = '"VN": '.$vn.',
                        "FN": '.$fn.',';
    if(!empty($anAPI))
    {
        $conditionAPI = '"AN": '.$anAPI.',';
    }

    $datasendAPI = [];
    if($bloodsampletube == '2')
    {
        $datasendAPI = '[
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B01",
                "INCOMENM": "Cross matching  (gel test)",
                "ITEMNO": 1,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": '.$countcheckout.',
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            },
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B26",
                "INCOMENM": "Leukodepleted Packed Red Cells",
                "ITEMNO": 2,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": '.$countcheckout.',
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            }
        ]
        ';
    }else
    {
        $datasendAPI = '[
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B02",
                "INCOMENM": "Blood group (ABO) - Tube method",
                "ITEMNO": 1,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": 1,
                "DCT":'.$doctorcode2.',
                "OVERTIME":2,
                "CLINICLCT":'.$requestunit.'
            },
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B03",
                "INCOMENM": "Rh. (D) Typing",
                "ITEMNO": 2,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": 1,
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            },
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B04",
                "INCOMENM": "Antibody screening, (Indirect antiglobulin) (gel test)",
                "ITEMNO": 3,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": 1,
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            },
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B01",
                "INCOMENM": "Cross matching  (gel test)",
                "ITEMNO": 4,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": '.$countcheckout.',
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            },
            {
                "HN": '.$hn_his.',
                "INCDATE": "'.$dateMDY.'",
                "INCTIME": '.$dateHIS.',
                "INCOME": "B26",
                "INCOMENM": "Leukodepleted Packed Red Cells",
                "ITEMNO": 5,
                "PRVNO": 1,
                "PTTYPE": '.$insuranceid.',
                "PTTYPENM": "'.$insurancetext.'",
                '.$conditionAPI.'
                "QTY": '.$countcheckout.',
                "DCT":'.$doctorcode2.',
                "OVERTIME":1,
                "CLINICLCT":'.$requestunit.'
            }
        ]
        ';
    }

    


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $rhis_api_absws_config1.'GetToken?user=abs&password=w,j%5Bvdot',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "user":"abs",
            "password":"w,j[vdot"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

        $responseArray = json_decode($response);

        $token = $responseArray->Result;



        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $rhis_api_apibb_config.'insicptdt?hn='.$hn_his,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $datasendAPI ,
        CURLOPT_HTTPHEADER => array(
            "X-Access-Token: $token",
            "Content-Type: application/json"
        ),
        ));

        $response = str_replace("'","`",curl_exec($curl));
        $datasendAPI = str_replace("'","`",$datasendAPI);

        curl_close($curl);

        $sql = "UPDATE request_blood SET apidatapayment='$datasendAPI' WHERE requestbloodid ='$requestbloodid'";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$datasendAPI','$dateNowValue','$username','askforblood datasend API','บันทึกขอเลือด/แพ้เลือด/คืนเลือด datasendAPI')");
        mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$response','$dateNowValue','$username','askforblood response API','บันทึกขอเลือด/แพ้เลือด/คืนเลือด response')");


    }

$logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);

mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$requestbloodid','$logtext','$dateNowValue','$username','askforblood','บันทึกขอเลือด/แพ้เลือด/คืนเลือด')");


if ($status) {
    mysqli_commit($conn);
} else {
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'id' => $requestbloodid,
        'requestbloodcrossmacthid' => $requestbloodcrossmacthid
    )
);

function replaceHNGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[1].$arrayStr[0];
    return $newtext;
}

function replaceANGet($text)
{
    $arrayStr = explode("-",$text);
    $newtext =  $arrayStr[0];
    return $newtext;
}


    // end การบริจาค
