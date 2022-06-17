<?php
session_start();
include('connection.php');
include('data/running.php');
include('data/dateFormat.php');
include('data/numberFormat.php');
include('dateNow.php');
date_default_timezone_set('Asia/Bangkok');

$status = 1;
mysqli_autocommit($conn, FALSE);

$labcheckrequestid = $_POST['labcheckrequestid'];

$logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$labcheckrequestid','$logtext','$dateNowValue','$username','test-result-blood-bank','บันทึกผลการตรวจทางห้องปฏิบัติการ')");


$checkresultbloodstatusid = $_POST['checkresultbloodstatusid'];


$labconfirmbloodgroupid_0 = $_POST['labconfirmbloodgroupid_0'];
$labantia1_0 = $_POST['labantia1_0'];
$labantih_0 = $_POST['labantih_0'];
$laba2cells_0 = $_POST['laba2cells_0'];
$labconfirmrhid_0 = $_POST['labconfirmrhid_0'];
$labconfirmantibodysceentestid_0 = $_POST['labconfirmantibodysceentestid_0'];
$labconfirmantibodyidentificationtest_0 = $_POST['labconfirmantibodyidentificationtest_0'];
$antibodyidentificationtestTubeMethod0 = $_POST['antibodyidentificationtestTubeMethod0'];
$lab_dat_poly_0 = $_POST['lab_dat_poly_0'];
$lab_dat_igg_0 = $_POST['lab_dat_igg_0'];
$lab_dat_c3d_0 = $_POST['lab_dat_c3d_0'];
$lab_dat_ccc_0 = $_POST['lab_dat_ccc_0'];

$lab_dat_poly_modal_0 = $_POST['lab_dat_poly_modal_0'];
$lab_dat_igg_modal_0 = $_POST['lab_dat_igg_modal_0'];
$lab_dat_c3d_modal_0 = $_POST['lab_dat_c3d_modal_0'];
$lab_dat_ccc_modal_0 = $_POST['lab_dat_ccc_modal_0'];

$lab_rhtype_d_0 = $_POST['lab_rhtype_d_0'];
$lab_rhtype_c_0 = $_POST['lab_rhtype_c_0'];
$lab_rhtype_e_0 = $_POST['lab_rhtype_e_0'];
$lab_rhtype_c2_0 = $_POST['lab_rhtype_c2_0'];
$lab_rhtype_e2_0 = $_POST['lab_rhtype_e2_0'];
$lab_rhtype_result_id_0 = $_POST['lab_rhtype_result_id_0'];
$labconfirmsalivaid_0 = $_POST['labconfirmsalivaid_0'];
$labconfirmtitrationid_0 = $_POST['labconfirmtitrationid_0'];
$labconfirmcoldagglutininid_0 = $_POST['labconfirmcoldagglutininid_0'];
$labconfirmantibodysceentestgetmethodid_0 = $_POST['labconfirmantibodysceentestgetmethodid_0'];
$adsorption0 = $_POST['adsorption0'];
$elution0 = $_POST['elution0'];
$antibody0 = $_POST['antibody0'];
$phenotype0 = $_POST['phenotype0'];
$phenotypedisplay0 = $_POST['phenotypedisplay0'];
$labremark0 = $_POST['labremark0'];

// Tab 1
$labconfirmbloodgroupid_1 = $_POST['labconfirmbloodgroupid_1'];
$labantia1_1 = $_POST['labantia1_1'];
$labantih_1 = $_POST['labantih_1'];
$laba2cells_1 = $_POST['laba2cells_1'];
$labconfirmrhid_1 = $_POST['labconfirmrhid_1'];
$labconfirmantibodysceentestid_1 = $_POST['labconfirmantibodysceentestid_1'];
$lab_dat_poly_1 = $_POST['lab_dat_poly_1'];
$lab_dat_igg_1 = $_POST['lab_dat_igg_1'];
$lab_dat_c3d_1 = $_POST['lab_dat_c3d_1'];
$lab_dat_ccc_1 = $_POST['lab_dat_ccc_1'];
$lab_rhtype_d_1 = $_POST['lab_rhtype_d_1'];
$lab_rhtype_c_1 = $_POST['lab_rhtype_c_1'];
$lab_rhtype_e_1 = $_POST['lab_rhtype_e_1'];
$lab_rhtype_c2_1 = $_POST['lab_rhtype_c2_1'];
$lab_rhtype_e2_1 = $_POST['lab_rhtype_e2_1'];
$lab_rhtype_result_id_1 = $_POST['lab_rhtype_result_id_1'];
$labconfirmsalivaid_1 = $_POST['labconfirmsalivaid_1'];
$labconfirmtitrationid_1 = $_POST['labconfirmtitrationid_1'];
$labconfirmcoldagglutininid_1 = $_POST['labconfirmcoldagglutininid_1'];
$labconfirmantibodysceentestgetmethodid_1 = $_POST['labconfirmantibodysceentestgetmethodid_1'];
$adsorption1 = $_POST['adsorption1'];
$elution1 = $_POST['elution1'];
$antibody1 = $_POST['antibody1'];
$phenotype1 = $_POST['phenotype1'];
$phenotypedisplay1 = $_POST['phenotypedisplay1'];
$labremark1 = $_POST['labremark1'];

// Tab 2
$labconfirmbloodgroupid_2 = $_POST['labconfirmbloodgroupid_2'];
$labantia1_2 = $_POST['labantia1_2'];
$labantih_2 = $_POST['labantih_2'];
$laba2cells_2 = $_POST['laba2cells_2'];
$labconfirmrhid_2 = $_POST['labconfirmrhid_2'];
$labconfirmantibodysceentestid_2 = $_POST['labconfirmantibodysceentestid_2'];
$lab_dat_poly_2 = $_POST['lab_dat_poly_2'];
$lab_dat_igg_2 = $_POST['lab_dat_igg_2'];
$lab_dat_c3d_2 = $_POST['lab_dat_c3d_2'];
$lab_dat_ccc_2 = $_POST['lab_dat_ccc_2'];
$lab_rhtype_d_2 = $_POST['lab_rhtype_d_2'];
$lab_rhtype_c_2 = $_POST['lab_rhtype_c_2'];
$lab_rhtype_e_2 = $_POST['lab_rhtype_e_2'];
$lab_rhtype_c2_2 = $_POST['lab_rhtype_c2_2'];
$lab_rhtype_e2_2 = $_POST['lab_rhtype_e2_2'];
$lab_rhtype_result_id_2 = $_POST['lab_rhtype_result_id_2'];
$labconfirmsalivaid_2 = $_POST['labconfirmsalivaid_2'];
$labconfirmtitrationid_2 = $_POST['labconfirmtitrationid_2'];
$labconfirmcoldagglutininid_2 = $_POST['labconfirmcoldagglutininid_2'];
$labconfirmantibodysceentestgetmethodid_2 = $_POST['labconfirmantibodysceentestgetmethodid_2'];
$adsorption2 = $_POST['adsorption2'];
$elution2 = $_POST['elution2'];
$antibody2 = $_POST['antibody2'];
$phenotype2 = $_POST['phenotype2'];
$phenotypedisplay2 = $_POST['phenotypedisplay2'];
$labremark2 = $_POST['labremark2'];

// Tab 3
$labconfirmbloodgroupid_3 = $_POST['labconfirmbloodgroupid_3'];
$labantia1_3 = $_POST['labantia1_3'];
$labantih_3 = $_POST['labantih_3'];
$laba2cells_3 = $_POST['laba2cells_3'];
$labconfirmrhid_3 = $_POST['labconfirmrhid_3'];
$labconfirmantibodysceentestid_3 = $_POST['labconfirmantibodysceentestid_3'];
$lab_dat_poly_3 = $_POST['lab_dat_poly_3'];
$lab_dat_igg_3 = $_POST['lab_dat_igg_3'];
$lab_dat_c3d_3 = $_POST['lab_dat_c3d_3'];
$lab_dat_ccc_3 = $_POST['lab_dat_ccc_3'];
$lab_rhtype_d_3 = $_POST['lab_rhtype_d_3'];
$lab_rhtype_c_3 = $_POST['lab_rhtype_c_3'];
$lab_rhtype_e_3 = $_POST['lab_rhtype_e_3'];
$lab_rhtype_c2_3 = $_POST['lab_rhtype_c2_3'];
$lab_rhtype_e2_3 = $_POST['lab_rhtype_e2_3'];
$lab_rhtype_result_id_3 = $_POST['lab_rhtype_result_id_3'];
$labconfirmsalivaid_3 = $_POST['labconfirmsalivaid_3'];
$labconfirmtitrationid_3 = $_POST['labconfirmtitrationid_3'];
$labconfirmcoldagglutininid_3 = $_POST['labconfirmcoldagglutininid_3'];
$labconfirmantibodysceentestgetmethodid_3 = $_POST['labconfirmantibodysceentestgetmethodid_3'];
$adsorption3 = $_POST['adsorption3'];
$elution3 = $_POST['elution3'];
$antibody3 = $_POST['antibody3'];
$phenotype3 = $_POST['phenotype3'];
$phenotypedisplay3 = $_POST['phenotypedisplay3'];
$labremark3 = $_POST['labremark3'];

//ลูก
$antia_child = $_POST['antia_child'];
$antib_child = $_POST['antib_child'];
$antiab_child = $_POST['antiab_child'];
$acells_child = $_POST['acells_child'];
$bcells_child = $_POST['bcells_child'];
$ocells_child = $_POST['ocells_child'];
$bloodgroup_child = $_POST['bloodgroup_child'];
$antia1_child = $_POST['antia1_child'];
$antih_child = $_POST['antih_child'];
$a2cells_child = $_POST['a2cells_child'];
$confirmbloodgroup_child = $_POST['confirmbloodgroup_child'];
$labrhreagent_child = $_POST['labrhreagent_child'];
$labrhrt_child = $_POST['labrhrt_child'];
$lab37c_child = $_POST['lab37c_child'];
$labiat_child = $_POST['labiat_child'];
$labccc_child = $_POST['labccc_child'];
$labresult_child = $_POST['labresult_child'];
$confirmrh_child = $_POST['confirmrh_child'];
$dat_poly_child = $_POST['dat_poly_child'];
$dat_igg_child = $_POST['dat_igg_child'];
$dat_c3d_child = $_POST['dat_c3d_child'];
$dat_ccc_child = $_POST['dat_ccc_child'];

//พ่อ
$antia_father = $_POST['antia_father'];
$antib_father = $_POST['antib_father'];
$antiab_father = $_POST['antiab_father'];
$acells_father = $_POST['acells_father'];
$bcells_father = $_POST['bcells_father'];
$ocells_father = $_POST['ocells_father'];
$bloodgroup_father = $_POST['bloodgroup_father'];
$antia1_father = $_POST['antia1_father'];
$antih_father = $_POST['antih_father'];
$a2cells_father = $_POST['a2cells_father'];
$confirmbloodgroup_father = $_POST['confirmbloodgroup_father'];
$labrhreagent_father = $_POST['labrhreagent_father'];
$labrhrt_father = $_POST['labrhrt_father'];
$lab37c_father = $_POST['lab37c_father'];
$labiat_father = $_POST['labiat_father'];
$labccc_father = $_POST['labccc_father'];
$labresult_father = $_POST['labresult_father'];
$confirmrh_father = $_POST['confirmrh_father'];
$dat_poly_father = $_POST['dat_poly_father'];
$dat_igg_father = $_POST['dat_igg_father'];
$dat_c3d_father = $_POST['dat_c3d_father'];
$dat_ccc_father = $_POST['dat_ccc_father'];


// Start TYPE OF REQUEST
$lab_type_of_request = json_decode($_POST['lab_type_of_request']);


$labcheckrequest_v = "";
$labcheckrequest_v_datetime = "";
$labcheckrequest_v_user = "";

$labcheckrequest_a = "";
$labcheckrequest_a_datetime = "";
$labcheckrequest_a_user = "";

$labcheckrequestitem_state_1_a = false;
$labcheckrequestitem_state_2_a = false;

$labcheckrequestitem_state_1_v = false;
$labcheckrequestitem_state_2_v = false;

$condition = "";

$resultArray=array();
foreach ($lab_type_of_request as $item) {

    $im = json_decode($item);
    $labcheckrequestitemid =   (!empty($im->labcheckrequestitemid)) ? $im->labcheckrequestitemid : '';
    $labcheckrequestitem_v =   (!empty($im->labcheckrequestitem_v)) ? $im->labcheckrequestitem_v : '';
    $labcheckrequestitem_a =   (!empty($im->labcheckrequestitem_a)) ? $im->labcheckrequestitem_a : '';
    $labcheckresult =   (!empty($im->labcheckresult)) ? $im->labcheckresult : '';
    $labcheckresultshow =   (!empty($im->labcheckresultshow)) ? $im->labcheckresultshow : '';

    $item_remark =   (!empty($im->item_remark)) ? $im->item_remark : '';

    if ($labcheckrequestitem_a == '1') {
        $lab_user_a = $_SESSION['fullname'];
        $staffid_a = $_SESSION['staffid'];
        $a_date_time = date("Y") + 543 . '-' . date("m") . '-' . date("d") . ' ' . date("H:i");
        $aa_date = date("d") . '/' . date("m") . '/' . date("Y") + 543 . ' ' . date("H:i");

        $sql = "UPDATE lab_check_request_item SET
                labcheckrequestitem_a='$labcheckrequestitem_a',
                lab_user_a='$lab_user_a',
                a_date_time='$a_date_time'
                WHERE labcheckrequestitemid = '$labcheckrequestitemid'
                AND IFNULL(labcheckrequestitem_a,'') = ''
            ";
        $result = mysqli_query($conn, $sql);

        $sql = "UPDATE lab_check_request SET
                    labcheckrequest_a_staffid = '$staffid_a',
                    labcheckrequest_a_datetime = '$a_date_time',
                    labcheckrequest_a_user = '$lab_user_a'
                    WHERE labcheckrequestid = '$labcheckrequestid'
                    AND IFNULL(labcheckrequest_a_user,'') = ''
                    
                ";

        $result = mysqli_query($conn, $sql);
    } else {
        $lab_user_a = '';
        $a_date_time = '';
    }

    if ($labcheckrequestitem_v == '1') {
        $lab_user_v = $_SESSION['fullname'];
        $staffid_v = $_SESSION['staffid'];
        $v_date_time = date("Y") + 543 . '-' . date("m") . '-' . date("d") . ' ' . date("H:i");
        $vv_date = date("d") . '/' . date("m") . '/' . date("Y") + 543 . ' ' . date("H:i");

        $sql = "UPDATE lab_check_request_item SET
                labcheckrequestitem_v='$labcheckrequestitem_v',
                lab_user_v='$lab_user_v',
                v_date_time='$v_date_time'
                WHERE labcheckrequestitemid = '$labcheckrequestitemid'
                AND IFNULL(labcheckrequestitem_v,'') = ''
            ";
        $result = mysqli_query($conn, $sql);

        $sql = "UPDATE lab_check_request SET
                    labcheckrequest_v_staffid = '$staffid_v',
                    labcheckrequest_v_datetime = '$v_date_time',
                    labcheckrequest_v_user = '$lab_user_v'
                    WHERE labcheckrequestid = '$labcheckrequestid'
                    AND IFNULL(labcheckrequest_v_user,'') = ''
                    
                ";

        $result = mysqli_query($conn, $sql);
    } else {
        $lab_user_v = '';
        $v_date_time = '';
    }


    if (!empty($labcheckrequestitemid)) {
        $sql = "UPDATE lab_check_request_item SET
                labcheckrequestitem_a='$labcheckrequestitem_a',
                labcheckrequestitem_v='$labcheckrequestitem_v',
                labcheckresult='$labcheckresult',
                labcheckresultshow='$labcheckresultshow',
                /* lab_user_a='$lab_user_a',
                a_date_time='$a_date_time',
                lab_user_v='$lab_user_v',
                v_date_time='$v_date_time', */
                item_remark='$item_remark'
                WHERE labcheckrequestitemid = '$labcheckrequestitemid'
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;



        if ($labcheckrequestitem_v == 1) {
            $labcheckrequestitem_state_1_v = true;
        } else {
            $labcheckrequestitem_state_2_v = true;
        }

        if ($labcheckrequestitem_a == 1) {
            $labcheckrequestitem_state_1_a = true;
        } else {
            $labcheckrequestitem_state_2_a = true;
        }
    }
    ///////////////////////////////////////////////////// API
    $sql = "SELECT PT.patientid , PT.patienthn ,
        LCR.labgetdatetime , 
        DATE_FORMAT(LCR.labgetdatetime,'%Y%m%d') AS labgetdate , 
        DATE_FORMAT(LCR.labgetdatetime,'%H%i%s') AS labgettime ,
        LCR.labkeepdatetime ,
        DATE_FORMAT(LCR.labkeepdatetime,'%Y%m%d') AS labkeepdate , 
        DATE_FORMAT(LCR.labkeepdatetime,'%H%i%s') AS labkeeptime ,
        LCR.labrequestdatetime , 
        CONCAT(DATE_FORMAT(LCR.labrequestdatetime,'%Y') -543,DATE_FORMAT(LCR.labrequestdatetime,'%m%d')) AS request_date  ,
        DATE_FORMAT(LCR.labrequestdatetime,'%H%i%s') AS request_time
        FROM lab_check_request LCR
        JOIN patient PT ON PT.patientid = LCR.patientid
        WHERE LCR.labcheckrequestid = '$labcheckrequestid' ";

    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        $patientid = $row['patientid'];
        $patienthn = $row['patienthn'];
        $patientan = replaceHNGet($patienthn);
        $labgetdatetime = $row['labgetdatetime'];
        $labgetdate = $row['labgetdate'];
        $labgettime = $row['labgettime'];
        // $result_staff = $_SESSION['staffid'];
        $result_staff = '-2^-2';

        $request_date = $row['request_date'];
        $request_time = $row['request_time'];
    }

    $sql2 = "SELECT LCRI.labcheckrequestitemid , LF.labformid , LF.labformname , LF.test_code ,
            LCRI.labcheckresultshow
            FROM lab_check_request_item LCRI
            JOIN labform LF ON LF.labformid = LCRI.labformid
            WHERE LCRI.labcheckrequestitemid = '$labcheckrequestitemid' ";

    $query2 = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_array($query2)) {
        $labcheckrequestitemid = $row['labcheckrequestitemid'];
        $test_code = $row['test_code'];
        $labcheckresultshow = $row['labcheckresultshow'];
        $datetimenow = dateNowYMDHMS_AD_NO();
        $datetimenow = $datetimenow . '^' . $datetimenow;
    }

    $labcheckresultshow_replace1 = str_replace("<sup>", "", $labcheckresultshow);
    $labcheckresultshow_replace2 = str_replace("</sup>", "", $labcheckresultshow_replace1);
    $labcheckresultshow_replace3 = str_replace(",", ", ", $labcheckresultshow_replace2);


    array_push($resultArray, array("test_code" => "$test_code","test_result"=> "$labcheckresultshow_replace2","comment_test"=> "$item_remark","result_date"=>"","result_staff"=>"","approve_date"=>"","approve_staff"=>"" ));
    

    
    //////////////////////////////////////////////////////////// END API

}
// End TYPE OF REQUEST
if ($labcheckrequestitem_state_1_v && !$labcheckrequestitem_state_2_v) {
    $labcheckrequest_v = "1";
}

if ($labcheckrequestitem_state_1_a && !$labcheckrequestitem_state_2_a) {
    $labcheckrequest_a = "1";
}

if ($labcheckrequest_v == "1" && $labcheckrequest_a == "1") {
    $checkresultbloodstatusid = "15";
    $labcheckrequest_a_datetime = dateNowYMDHM();
    $labcheckrequest_a_user = $_SESSION['fullname'];
    $labcheckrequest_v_datetime = dateNowYMDHM();
    $labcheckrequest_v_user = $_SESSION['fullname'];
} else if ($labcheckrequest_v == "1" && $labcheckrequest_a == "") {
    $checkresultbloodstatusid = "19";
    $labcheckrequest_v_datetime = dateNowYMDHM();
    $labcheckrequest_v_user = $_SESSION['fullname'];
} else if ($labcheckrequestitem_state_1_v && $labcheckrequestitem_state_2_v && $labcheckrequest_a == "") {
    $checkresultbloodstatusid = "11";
}

if (!empty($checkresultbloodstatusid))
    $condition = " checkresultbloodstatusid = '$checkresultbloodstatusid',";


$sql = "UPDATE lab_check_request SET
                    $condition
                    labcheckrequest_v = '$labcheckrequest_v',
                    labcheckrequest_a = '$labcheckrequest_a',
                    labconfirmbloodgroupid_0 = '$labconfirmbloodgroupid_0',
                    labantia1_0 = '$labantia1_0',
                    labantih_0 = '$labantih_0',
                    laba2cells_0 = '$laba2cells_0',
                    labconfirmrhid_0 = '$labconfirmrhid_0',
                    labconfirmantibodysceentestid_0 = '$labconfirmantibodysceentestid_0',
                    labconfirmantibodyidentificationtest_0 = '$labconfirmantibodyidentificationtest_0', /* antibody */
                    antibodyidentificationtestTubeMethod0 = '$antibodyidentificationtestTubeMethod0',/* antibody */
                    lab_dat_poly_0 = '$lab_dat_poly_0',
                    lab_dat_igg_0 = '$lab_dat_igg_0',
                    lab_dat_c3d_0 = '$lab_dat_c3d_0',
                    lab_dat_ccc_0 = '$lab_dat_ccc_0',

                    lab_dat_poly_modal_0 = '$lab_dat_poly_modal_0',
                    lab_dat_igg_modal_0 = '$lab_dat_igg_modal_0',
                    lab_dat_c3d_modal_0 = '$lab_dat_c3d_modal_0',
                    lab_dat_ccc_modal_0 = '$lab_dat_ccc_modal_0',

                    lab_rhtype_d_0 = '$lab_rhtype_d_0',
                    lab_rhtype_c_0 = '$lab_rhtype_c_0',
                    lab_rhtype_e_0 = '$lab_rhtype_e_0',
                    lab_rhtype_c2_0 = '$lab_rhtype_c2_0',
                    lab_rhtype_e2_0 = '$lab_rhtype_e2_0',
                    lab_rhtype_result_id_0 = '$lab_rhtype_result_id_0',
                    labconfirmsalivaid_0 = '$labconfirmsalivaid_0',
                    labconfirmtitrationid_0 = '$labconfirmtitrationid_0',
                    labconfirmcoldagglutininid_0 = '$labconfirmcoldagglutininid_0',
                    labconfirmantibodysceentestgetmethodid_0 = '$labconfirmantibodysceentestgetmethodid_0',
                    adsorption0 = '$adsorption0',
                    elution0 = '$elution0',
                    antibody0 = '$antibody0',
                    phenotype0 = '$phenotype0',
                    phenotypedisplay0 = '$phenotypedisplay0',
                    labremark0 = '$labremark0',


                    labconfirmbloodgroupid_1 = '$labconfirmbloodgroupid_1',
                    labantia1_1 = '$labantia1_1',
                    labantih_1 = '$labantih_1',
                    laba2cells_1 = '$laba2cells_1',
                    labconfirmrhid_1 = '$labconfirmrhid_1',
                    labconfirmantibodysceentestid_1 = '$labconfirmantibodysceentestid_1',
                    lab_dat_poly_1 = '$lab_dat_poly_1',
                    lab_dat_igg_1 = '$lab_dat_igg_1',
                    lab_dat_c3d_1 = '$lab_dat_c3d_1',
                    lab_dat_ccc_1 = '$lab_dat_ccc_1',
                    lab_rhtype_d_1 = '$lab_rhtype_d_1',
                    lab_rhtype_c_1 = '$lab_rhtype_c_1',
                    lab_rhtype_e_1 = '$lab_rhtype_e_1',
                    lab_rhtype_c2_1 = '$lab_rhtype_c2_1',
                    lab_rhtype_e2_1 = '$lab_rhtype_e2_1',
                    lab_rhtype_result_id_1 = '$lab_rhtype_result_id_1',
                    labconfirmsalivaid_1 = '$labconfirmsalivaid_1',
                    labconfirmtitrationid_1 = '$labconfirmtitrationid_1',
                    labconfirmcoldagglutininid_1 = '$labconfirmcoldagglutininid_1',
                    labconfirmantibodysceentestgetmethodid_1 = '$labconfirmantibodysceentestgetmethodid_1',
                    adsorption1 = '$adsorption1',
                    elution1 = '$elution1',
                    antibody1 = '$antibody1',
                    phenotype1 = '$phenotype1',
                    phenotypedisplay1 = '$phenotypedisplay1',
                    labremark1 = '$labremark1',

                    labconfirmbloodgroupid_2 = '$labconfirmbloodgroupid_2',
                    labantia1_2 = '$labantia1_2',
                    labantih_2 = '$labantih_2',
                    laba2cells_2 = '$laba2cells_2',
                    labconfirmrhid_2 = '$labconfirmrhid_2',
                    labconfirmantibodysceentestid_2 = '$labconfirmantibodysceentestid_2',
                    lab_dat_poly_2 = '$lab_dat_poly_2',
                    lab_dat_igg_2 = '$lab_dat_igg_2',
                    lab_dat_c3d_2 = '$lab_dat_c3d_2',
                    lab_dat_ccc_2 = '$lab_dat_ccc_2',
                    lab_rhtype_d_2 = '$lab_rhtype_d_2',
                    lab_rhtype_c_2 = '$lab_rhtype_c_2',
                    lab_rhtype_e_2 = '$lab_rhtype_e_2',
                    lab_rhtype_c2_2 = '$lab_rhtype_c2_2',
                    lab_rhtype_e2_2 = '$lab_rhtype_e2_2',
                    lab_rhtype_result_id_2 = '$lab_rhtype_result_id_2',
                    labconfirmsalivaid_2 = '$labconfirmsalivaid_2',
                    labconfirmtitrationid_2 = '$labconfirmtitrationid_2',
                    labconfirmcoldagglutininid_2 = '$labconfirmcoldagglutininid_2',
                    labconfirmantibodysceentestgetmethodid_2 = '$labconfirmantibodysceentestgetmethodid_2',
                    adsorption2 = '$adsorption2',
                    elution2 = '$elution2',
                    antibody2 = '$antibody2',
                    phenotype2 = '$phenotype2',
                    phenotypedisplay2 = '$phenotypedisplay2',
                    labremark2 = '$labremark2',

                    labconfirmbloodgroupid_3 = '$labconfirmbloodgroupid_3',
                    labantia1_3 = '$labantia1_3',
                    labantih_3 = '$labantih_3',
                    laba2cells_3 = '$laba2cells_3',
                    labconfirmrhid_3 = '$labconfirmrhid_3',
                    labconfirmantibodysceentestid_3 = '$labconfirmantibodysceentestid_3',
                    lab_dat_poly_3 = '$lab_dat_poly_3',
                    lab_dat_igg_3 = '$lab_dat_igg_3',
                    lab_dat_c3d_3 = '$lab_dat_c3d_3',
                    lab_dat_ccc_3 = '$lab_dat_ccc_3',
                    lab_rhtype_d_3 = '$lab_rhtype_d_3',
                    lab_rhtype_c_3 = '$lab_rhtype_c_3',
                    lab_rhtype_e_3 = '$lab_rhtype_e_3',
                    lab_rhtype_c2_3 = '$lab_rhtype_c2_3',
                    lab_rhtype_e2_3 = '$lab_rhtype_e2_3',
                    lab_rhtype_result_id_3 = '$lab_rhtype_result_id_3',
                    labconfirmsalivaid_3 = '$labconfirmsalivaid_3',
                    labconfirmtitrationid_3 = '$labconfirmtitrationid_3',
                    labconfirmcoldagglutininid_3 = '$labconfirmcoldagglutininid_3',
                    labconfirmantibodysceentestgetmethodid_3 = '$labconfirmantibodysceentestgetmethodid_3',
                    adsorption3 = '$adsorption3',
                    elution3 = '$elution3',
                    antibody3 = '$antibody3',
                    phenotype3 = '$phenotype3',
                    phenotypedisplay3 = '$phenotypedisplay3',
                    labremark3 = '$labremark3',

                    antia_child = '$antia_child',
                    antib_child = '$antib_child',
                    antiab_child = '$antiab_child',
                    acells_child = '$acells_child',
                    bcells_child = '$bcells_child',
                    ocells_child = '$ocells_child',
                    bloodgroup_child = '$bloodgroup_child',
                    antia1_child = '$antia1_child',
                    antih_child = '$antih_child',
                    a2cells_child = '$a2cells_child',
                    confirmbloodgroup_child = '$confirmbloodgroup_child',
                    labrhreagent_child = '$labrhreagent_child',
                    labrhrt_child = '$labrhrt_child',
                    lab37c_child = '$lab37c_child',
                    labiat_child = '$labiat_child',
                    labccc_child = '$labccc_child',
                    labresult_child = '$labresult_child',
                    confirmrh_child = '$confirmrh_child',
                    dat_poly_child = '$dat_poly_child',
                    dat_igg_child = '$dat_igg_child',
                    dat_c3d_child = '$dat_c3d_child',
                    dat_ccc_child = '$dat_ccc_child',

                    antia_father = '$antia_father',
                    antib_father = '$antib_father',
                    antiab_father = '$antiab_father',
                    acells_father = '$acells_father',
                    bcells_father = '$bcells_father',
                    ocells_father = '$ocells_father',
                    bloodgroup_father = '$bloodgroup_father',
                    antia1_father = '$antia1_father',
                    antih_father = '$antih_father',
                    a2cells_father = '$a2cells_father',
                    confirmbloodgroup_father = '$confirmbloodgroup_father',
                    labrhreagent_father = '$labrhreagent_father',
                    labrhrt_father = '$labrhrt_father',
                    lab37c_father = '$lab37c_father',
                    labiat_father = '$labiat_father',
                    labccc_father = '$labccc_father',
                    labresult_father = '$labresult_father',
                    confirmrh_father = '$confirmrh_father',
                    dat_poly_father = '$dat_poly_father',
                    dat_igg_father = '$dat_igg_father',
                    dat_c3d_father = '$dat_c3d_father',
                    dat_ccc_father = '$dat_ccc_father'

                    WHERE labcheckrequestid = '$labcheckrequestid'
                    
                ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;





// Start Tab 0 ABO
$lab_abo_0_item = json_decode($_POST['lab_abo_0_item']);

$sql = "UPDATE lab_abo_0 SET
                    active = '0'
                    WHERE labcheckrequestid = '$labcheckrequestid'
                    AND active <> 0
                ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_abo_0_item as $item) {

    $im = json_decode($item);
    $labreagent0 = (!empty($im->labreagent0)) ? $im->labreagent0 : '';
    $lababoid0 =   (!empty($im->lababoid0)) ? $im->lababoid0 : '';
    $lababocode0 =   (!empty($im->lababocode0)) ? $im->lababocode0 : '';
    $lababoantia0 =   (!empty($im->lababoantia0)) ? $im->lababoantia0 : '';
    $lababoantib0 =   (!empty($im->lababoantib0)) ? $im->lababoantib0 : '';
    $lababoantiab0 =   (!empty($im->lababoantiab0)) ? $im->lababoantiab0 : '';
    $lababoacells0 =   (!empty($im->lababoacells0)) ? $im->lababoacells0 : '';
    $lababobcells0 =   (!empty($im->lababobcells0)) ? $im->lababobcells0 : '';
    $lababoocells0 =   (!empty($im->lababoocells0)) ? $im->lababoocells0 : '';
    $lababobloodgroup0 =   (!empty($im->lababobloodgroup0)) ? $im->lababobloodgroup0 : '';

    if (empty($lababoid0)) {
        $running = getRunningYM('TABO0');
        $lababoid0 = $running['runn'];
        $lababocode0 = $running['code'];
        $sql = "
                    INSERT INTO lab_abo_0
                    (
                        labreagent0,
                        lababoid0,
                        lababocode0,
                        lababoantia0,
                        lababoantib0,
                        lababoantiab0,
                        lababoacells0,
                        lababobcells0,
                        lababoocells0,
                        lababobloodgroup0,
                        labcheckrequestid
                    )
                    value
                    (
                        '$labreagent0',
                        '$lababoid0',
                        '$lababocode0',
                        '$lababoantia0',
                        '$lababoantib0',
                        '$lababoantiab0',
                        '$lababoacells0',
                        '$lababobcells0',
                        '$lababoocells0',
                        '$lababobloodgroup0',
                        '$labcheckrequestid'
                    )
                ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_abo_0 SET
                    labreagent0='$labreagent0',
                    lababoantia0='$lababoantia0',
                    lababoantib0='$lababoantib0',
                    lababoantiab0='$lababoantiab0',
                    lababoacells0='$lababoacells0',
                    lababobcells0='$lababobcells0',
                    lababoocells0='$lababoocells0',
                    lababobloodgroup0='$lababobloodgroup0',
                    active='1'
                    WHERE lababoid0 = '$lababoid0'
                    
                ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 ABO

// Start Tab 0 Rh
$lab_rh_0_item = json_decode($_POST['lab_rh_0_item']);

$sql = "UPDATE lab_rh_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_rh_0_item as $item) {

    $im = json_decode($item);
    $labrhid0 =   (!empty($im->labrhid0)) ? $im->labrhid0 : '';
    $labrhcode0 =   (!empty($im->labrhcode0)) ? $im->labrhcode0 : '';
    $labrhreagent0 =   (!empty($im->labrhreagent0)) ? $im->labrhreagent0 : '';
    $labrhrt0 =   (!empty($im->labrhrt0)) ? $im->labrhrt0 : '';
    $lab37c0 =   (!empty($im->lab37c0)) ? $im->lab37c0 : '';
    $labiat0 =   (!empty($im->labiat0)) ? $im->labiat0 : '';
    $labccc0 =   (!empty($im->labccc0)) ? $im->labccc0 : '';
    $labresult0 =   (!empty($im->labresult0)) ? $im->labresult0 : '';

    if (empty($labrhid0)) {
        $running = getRunningYM('TRH0');
        $labrhid0 = $running['runn'];
        $labrhcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_rh_0
                (
                    labrhid0,
                    labrhcode0,
                    labrhreagent0,
                    labrhrt0,
                    lab37c0,
                    labiat0,
                    labccc0,
                    labresult0,
                    labcheckrequestid
                )
                value
                (
                    '$labrhid0',
                    '$labrhcode0',
                    '$labrhreagent0',
                    '$labrhrt0',
                    '$lab37c0',
                    '$labiat0',
                    '$labccc0',
                    '$labresult0',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_rh_0 SET
                labrhreagent0='$labrhreagent0',
                labrhrt0='$labrhrt0',
                lab37c0='$lab37c0',
                labiat0='$labiat0',
                labccc0='$labccc0',
                labresult0='$labresult0',
                active='1'
                WHERE labrhid0 = '$labrhid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Rh


// Start Tab 0 Antibody Sceening test
$lab_antibodysceentest_0_item = json_decode($_POST['lab_antibodysceentest_0_item']);

$sql = "UPDATE lab_antibodysceentest_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentest_0_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestid0 =   (!empty($im->labantibodysceentestid0)) ? $im->labantibodysceentestid0 : '';
    $labantibodysceentestcode0 =   (!empty($im->labantibodysceentestcode0)) ? $im->labantibodysceentestcode0 : '';
    $labantibodysceentestpimi0 =   (!empty($im->labantibodysceentestpimi0)) ? $im->labantibodysceentestpimi0 : '';
    $labantibodysceentest0 =   (!empty($im->labantibodysceentest0)) ? $im->labantibodysceentest0 : '';
    $labantibodysceentesto10 =   (!empty($im->labantibodysceentesto10)) ? $im->labantibodysceentesto10 : '';
    $labantibodysceentesto20 =   (!empty($im->labantibodysceentesto20)) ? $im->labantibodysceentesto20 : '';
    $labantibodysceentesto30 =   (!empty($im->labantibodysceentesto30)) ? $im->labantibodysceentesto30 : '';
    $labantibodysceentestlotno0 =   (!empty($im->labantibodysceentestlotno0)) ? $im->labantibodysceentestlotno0 : '';

    if (empty($labantibodysceentestid0)) {
        $running = getRunningYM('ABT');
        $labantibodysceentestid0 = $running['runn'];
        $labantibodysceentestcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_antibodysceentest_0
                (
                    labantibodysceentestid0,
                    labantibodysceentestcode0,
                    labantibodysceentestpimi0,
                    labantibodysceentest0,
                    labantibodysceentestp1mi0,
                    labantibodysceentesto10,
                    labantibodysceentesto20,
                    labantibodysceentesto30,
                    labantibodysceentestlotno0,
                    labcheckrequestid
                )
                value
                (
                    '$labantibodysceentestid0',
                    '$labantibodysceentestcode0',
                    '$labantibodysceentestpimi0',
                    '$labantibodysceentest0',
                    '$labantibodysceentestp1mi0',
                    '$labantibodysceentesto10',
                    '$labantibodysceentesto20',
                    '$labantibodysceentesto30',
                    '$labantibodysceentestlotno0',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentest_0 SET
                labantibodysceentestpimi0='$labantibodysceentestpimi0',
                labantibodysceentest0='$labantibodysceentest0',
                labantibodysceentestp1mi0='$labantibodysceentestp1mi0',
                labantibodysceentesto10='$labantibodysceentesto10',
                labantibodysceentesto20='$labantibodysceentesto20',
                labantibodysceentesto30='$labantibodysceentesto30',
                labantibodysceentestlotno0='$labantibodysceentestlotno0',
                active='1'
                WHERE labantibodysceentestid0 = '$labantibodysceentestid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Antibody Sceening test

// Start Tab 0 Antibody identification Test
$lab_antibodyidentificationtest_0_item = json_decode($_POST['lab_antibodyidentificationtest_0_item']);

$sql = "UPDATE lab_antibodyidentificationtest_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtest_0_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestid0 =   (!empty($im->labantibodyidentificationtestid0)) ? $im->labantibodyidentificationtestid0 : '';
    $labantibodyidentificationtestcode0 =   (!empty($im->labantibodyidentificationtestcode0)) ? $im->labantibodyidentificationtestcode0 : '';
    $labantibodyidentificationtest0 =   (!empty($im->labantibodyidentificationtest0)) ? $im->labantibodyidentificationtest0 : '';
    $labantibodyidentificationtest10 =   (!empty($im->labantibodyidentificationtest10)) ? $im->labantibodyidentificationtest10 : '';
    $labantibodyidentificationtest20 =   (!empty($im->labantibodyidentificationtest20)) ? $im->labantibodyidentificationtest20 : '';
    $labantibodyidentificationtest30 =   (!empty($im->labantibodyidentificationtest30)) ? $im->labantibodyidentificationtest30 : '';
    $labantibodyidentificationtest40 =   (!empty($im->labantibodyidentificationtest40)) ? $im->labantibodyidentificationtest40 : '';
    $labantibodyidentificationtest50 =   (!empty($im->labantibodyidentificationtest50)) ? $im->labantibodyidentificationtest50 : '';
    $labantibodyidentificationtest60 =   (!empty($im->labantibodyidentificationtest60)) ? $im->labantibodyidentificationtest60 : '';
    $labantibodyidentificationtest70 =   (!empty($im->labantibodyidentificationtest70)) ? $im->labantibodyidentificationtest70 : '';
    $labantibodyidentificationtest80 =   (!empty($im->labantibodyidentificationtest80)) ? $im->labantibodyidentificationtest80 : '';
    $labantibodyidentificationtest90 =   (!empty($im->labantibodyidentificationtest90)) ? $im->labantibodyidentificationtest90 : '';
    $labantibodyidentificationtest100 =   (!empty($im->labantibodyidentificationtest100)) ? $im->labantibodyidentificationtest100 : '';
    $labantibodyidentificationtest110 =   (!empty($im->labantibodyidentificationtest110)) ? $im->labantibodyidentificationtest110 : '';
    $labantibodyidentificationtestauto0 =   (!empty($im->labantibodyidentificationtestauto0)) ? $im->labantibodyidentificationtestauto0 : '';
    $labantibodyidentificationtestlotno0 =   (!empty($im->labantibodyidentificationtestlotno0)) ? $im->labantibodyidentificationtestlotno0 : '';

    if (empty($labantibodyidentificationtestid0)) {
        $running = getRunningYM('ABID');
        $labantibodyidentificationtestid0 = $running['runn'];
        $labantibodyidentificationtestcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_antibodyidentificationtest_0
                (
                    labantibodyidentificationtestid0,
                    labantibodyidentificationtestcode0,
                    labantibodyidentificationtest0,
                    labantibodyidentificationtest10,
                    labantibodyidentificationtest20,
                    labantibodyidentificationtest30,
                    labantibodyidentificationtest40,
                    labantibodyidentificationtest50,
                    labantibodyidentificationtest60,
                    labantibodyidentificationtest70,
                    labantibodyidentificationtest80,
                    labantibodyidentificationtest90,
                    labantibodyidentificationtest100,
                    labantibodyidentificationtest110,
                    labantibodyidentificationtestauto0,
                    labantibodyidentificationtestlotno0,
                    labcheckrequestid
                )
                value
                (
                    '$labantibodyidentificationtestid0',
                    '$labantibodyidentificationtestcode0',
                    '$labantibodyidentificationtest0',
                    '$labantibodyidentificationtest10',
                    '$labantibodyidentificationtest20',
                    '$labantibodyidentificationtest30',
                    '$labantibodyidentificationtest40',
                    '$labantibodyidentificationtest50',
                    '$labantibodyidentificationtest60',
                    '$labantibodyidentificationtest70',
                    '$labantibodyidentificationtest80',
                    '$labantibodyidentificationtest90',
                    '$labantibodyidentificationtest100',
                    '$labantibodyidentificationtest110',
                    '$labantibodyidentificationtestauto0',
                    '$labantibodyidentificationtestlotno0',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtest_0 SET
                    labantibodyidentificationtest0='$labantibodyidentificationtest0',
                    labantibodyidentificationtest10='$labantibodyidentificationtest10',
                    labantibodyidentificationtest20='$labantibodyidentificationtest20',
                    labantibodyidentificationtest30='$labantibodyidentificationtest30',
                    labantibodyidentificationtest40='$labantibodyidentificationtest40',
                    labantibodyidentificationtest50='$labantibodyidentificationtest50',
                    labantibodyidentificationtest60='$labantibodyidentificationtest60',
                    labantibodyidentificationtest70='$labantibodyidentificationtest70',
                    labantibodyidentificationtest80='$labantibodyidentificationtest80',
                    labantibodyidentificationtest90='$labantibodyidentificationtest90',
                    labantibodyidentificationtest100='$labantibodyidentificationtest100',
                    labantibodyidentificationtest110='$labantibodyidentificationtest110',
                    labantibodyidentificationtestauto0='$labantibodyidentificationtestauto0',
                    labantibodyidentificationtestlotno0='$labantibodyidentificationtestlotno0',
                    active='1'
                WHERE labantibodyidentificationtestid0 = '$labantibodyidentificationtestid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Antibody identification Test

// Start Tab 0 Saliva
$lab_salivatest_0_item = json_decode($_POST['lab_salivatest_0_item']);

$sql = "UPDATE lab_salivatest_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_salivatest_0_item as $item) {

    $im = json_decode($item);
    $labsalivatestid0 =   (!empty($im->labsalivatestid0)) ? $im->labsalivatestid0 : '';
    $labsalivatestcode0 =   (!empty($im->labsalivatestcode0)) ? $im->labsalivatestcode0 : '';
    $labsalivatest0 =   (!empty($im->labsalivatest0)) ? $im->labsalivatest0 : '';
    $labsalivatestacells0 =   (!empty($im->labsalivatestacells0)) ? $im->labsalivatestacells0 : '';
    $labsalivatestbcells0 =   (!empty($im->labsalivatestbcells0)) ? $im->labsalivatestbcells0 : '';
    $labsalivatesotcells0 =   (!empty($im->labsalivatesotcells0)) ? $im->labsalivatesotcells0 : '';

    if (empty($labsalivatestid0)) {
        $running = getRunningYM('SLT0');
        $labsalivatestid0 = $running['runn'];
        $labsalivatestcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_salivatest_0
                (
                    labsalivatestid0,
                    labsalivatestcode0,
                    labsalivatest0,
                    labsalivatestacells0,
                    labsalivatestbcells0,
                    labsalivatesotcells0,
                    labcheckrequestid
                )
                value
                (
                    '$labsalivatestid0',
                    '$labsalivatestcode0',
                    '$labsalivatest0',
                    '$labsalivatestacells0',
                    '$labsalivatestbcells0',
                    '$labsalivatesotcells0',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_salivatest_0 SET
                labsalivatest0='$labsalivatest0',
                labsalivatestacells0='$labsalivatestacells0',
                labsalivatestbcells0='$labsalivatestbcells0',
                labsalivatesotcells0='$labsalivatesotcells0',
                active='1'
                WHERE labsalivatestid0 = '$labsalivatestid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Saliva

// Start Tab 0 Titration
$lab_titration_0_item = json_decode($_POST['lab_titration_0_item']);

$sql = "UPDATE lab_titration_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_titration_0_item as $item) {

    $im = json_decode($item);
    $labtitrationid0 =   (!empty($im->labtitrationid0)) ? $im->labtitrationid0 : '';
    $labtitrationcode0 =   (!empty($im->labtitrationcode0)) ? $im->labtitrationcode0 : '';
    $labtitrationantiserum0 =   (!empty($im->labtitrationantiserum0)) ? $im->labtitrationantiserum0 : '';
    $labtitrationcell0 =   (!empty($im->labtitrationcell0)) ? $im->labtitrationcell0 : '';
    $labtitration10 =   (!empty($im->labtitration10)) ? $im->labtitration10 : '';
    $labtitration20 =   (!empty($im->labtitration20)) ? $im->labtitration20 : '';
    $labtitration40 =   (!empty($im->labtitration40)) ? $im->labtitration40 : '';
    $labtitration80 =   (!empty($im->labtitration80)) ? $im->labtitration80 : '';
    $labtitration160 =   (!empty($im->labtitration160)) ? $im->labtitration160 : '';
    $labtitration320 =   (!empty($im->labtitration320)) ? $im->labtitration320 : '';
    $labtitration640 =   (!empty($im->labtitration640)) ? $im->labtitration640 : '';
    $labtitration1280 =   (!empty($im->labtitration1280)) ? $im->labtitration1280 : '';
    $labtitration2560 =   (!empty($im->labtitration2560)) ? $im->labtitration2560 : '';
    $labtitration5120 =   (!empty($im->labtitration5120)) ? $im->labtitration5120 : '';
    $labtitration10240 =   (!empty($im->labtitration10240)) ? $im->labtitration10240 : '';
    $labtitration20480 =   (!empty($im->labtitration20480)) ? $im->labtitration20480 : '';
    $labtitrationtiter0 =   (!empty($im->labtitrationtiter0)) ? $im->labtitrationtiter0 : '';

    if (empty($labtitrationid0)) {
        $running = getRunningYM('TTT0');
        $labtitrationid0 = $running['runn'];
        $labtitrationcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_titration_0
                (
                    labtitrationid0,
                    labtitrationcode0,
                    labtitrationantiserum0,
                    labtitrationcell0,
                    labtitration10,
                    labtitration20,
                    labtitration40,
                    labtitration80,
                    labtitration160,
                    labtitration320,
                    labtitration640,
                    labtitration1280,
                    labtitration2560,
                    labtitration5120,
                    labtitration10240,
                    labtitration20480,
                    labtitrationtiter0,
                    labcheckrequestid
                )
                value
                (
                    '$labtitrationid0',
                    '$labtitrationcode0',
                    '$labtitrationantiserum0',
                    '$labtitrationcell0',
                    '$labtitration10',
                    '$labtitration20',
                    '$labtitration40',
                    '$labtitration80',
                    '$labtitration160',
                    '$labtitration320',
                    '$labtitration640',
                    '$labtitration1280',
                    '$labtitration2560',
                    '$labtitration5120',
                    '$labtitration10240',
                    '$labtitration20480',
                    '$labtitrationtiter0',
                    '$labcheckrequestid'
                )
            ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_titration_0 SET
                    labtitrationantiserum0='$labtitrationantiserum0',
                    labtitrationcell0='$labtitrationcell0',
                    labtitration10='$labtitration10',
                    labtitration20='$labtitration20',
                    labtitration40='$labtitration40',
                    labtitration80='$labtitration80',
                    labtitration160='$labtitration160',
                    labtitration320='$labtitration320',
                    labtitration640='$labtitration640',
                    labtitration1280='$labtitration1280',
                    labtitration2560='$labtitration2560',
                    labtitration5120='$labtitration5120',
                    labtitration10240='$labtitration10240',
                    labtitration20480='$labtitration20480',
                    labtitrationtiter0='$labtitrationtiter0',
                    active='1'
                WHERE labtitrationid0 = '$labtitrationid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Titration

// Start Tab 0 Cold Agglutinin
$lab_coldagglutinin_0_item = json_decode($_POST['lab_coldagglutinin_0_item']);

$sql = "UPDATE lab_coldagglutinin_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_coldagglutinin_0_item as $item) {

    $im = json_decode($item);
    $labcoldagglutininid0 =   (!empty($im->labcoldagglutininid0)) ? $im->labcoldagglutininid0 : '';
    $labcoldagglutinincode0 =   (!empty($im->labcoldagglutinincode0)) ? $im->labcoldagglutinincode0 : '';
    $labcoldagglutinino0 =   (!empty($im->labcoldagglutinino0)) ? $im->labcoldagglutinino0 : '';
    $labcoldagglutinintime0 =   (!empty($im->labcoldagglutinintime0)) ? $im->labcoldagglutinintime0 : '';
    $labcoldagglutinin10 =   (!empty($im->labcoldagglutinin10)) ? $im->labcoldagglutinin10 : '';
    $labcoldagglutinin20 =   (!empty($im->labcoldagglutinin20)) ? $im->labcoldagglutinin20 : '';
    $labcoldagglutinin40 =   (!empty($im->labcoldagglutinin40)) ? $im->labcoldagglutinin40 : '';
    $labcoldagglutinin80 =   (!empty($im->labcoldagglutinin80)) ? $im->labcoldagglutinin80 : '';
    $labcoldagglutinin160 =   (!empty($im->labcoldagglutinin160)) ? $im->labcoldagglutinin160 : '';
    $labcoldagglutinin320 =   (!empty($im->labcoldagglutinin320)) ? $im->labcoldagglutinin320 : '';
    $labcoldagglutinin640 =   (!empty($im->labcoldagglutinin640)) ? $im->labcoldagglutinin640 : '';
    $labcoldagglutinin1280 =   (!empty($im->labcoldagglutinin1280)) ? $im->labcoldagglutinin1280 : '';
    $labcoldagglutinin2560 =   (!empty($im->labcoldagglutinin2560)) ? $im->labcoldagglutinin2560 : '';
    $labcoldagglutinin5120 =   (!empty($im->labcoldagglutinin5120)) ? $im->labcoldagglutinin5120 : '';
    $labcoldagglutinin10240 =   (!empty($im->labcoldagglutinin10240)) ? $im->labcoldagglutinin10240 : '';
    $labcoldagglutinin20480 =   (!empty($im->labcoldagglutinin20480)) ? $im->labcoldagglutinin20480 : '';

    if (empty($labcoldagglutininid0)) {
        $running = getRunningYM('CAGG0');
        $labcoldagglutininid0 = $running['runn'];
        $labcoldagglutinincode0 = $running['code'];
        $sql = "
                INSERT INTO lab_coldagglutinin_0
                (
                    labcoldagglutininid0,
                    labcoldagglutinincode0,
                    labcoldagglutinino0,
                    labcoldagglutinintime0,
                    labcoldagglutinin10,
                    labcoldagglutinin20,
                    labcoldagglutinin40,
                    labcoldagglutinin80,
                    labcoldagglutinin160,
                    labcoldagglutinin320,
                    labcoldagglutinin640,
                    labcoldagglutinin1280,
                    labcoldagglutinin2560,
                    labcoldagglutinin5120,
                    labcoldagglutinin10240,
                    labcoldagglutinin20480,
                    labcheckrequestid
                )
                value
                (
                    '$labcoldagglutininid0',
                    '$labcoldagglutinincode0',
                    '$labcoldagglutinino0',
                    '$labcoldagglutinintime0',
                    '$labcoldagglutinin10',
                    '$labcoldagglutinin20',
                    '$labcoldagglutinin40',
                    '$labcoldagglutinin80',
                    '$labcoldagglutinin160',
                    '$labcoldagglutinin320',
                    '$labcoldagglutinin640',
                    '$labcoldagglutinin1280',
                    '$labcoldagglutinin2560',
                    '$labcoldagglutinin5120',
                    '$labcoldagglutinin10240',
                    '$labcoldagglutinin20480',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_coldagglutinin_0 SET
                    labcoldagglutinino0='$labcoldagglutinino0',
                    labcoldagglutinintime0='$labcoldagglutinintime0',
                    labcoldagglutinin10='$labcoldagglutinin10',
                    labcoldagglutinin20='$labcoldagglutinin20',
                    labcoldagglutinin40='$labcoldagglutinin40',
                    labcoldagglutinin80='$labcoldagglutinin80',
                    labcoldagglutinin160='$labcoldagglutinin160',
                    labcoldagglutinin320='$labcoldagglutinin320',
                    labcoldagglutinin640='$labcoldagglutinin640',
                    labcoldagglutinin1280='$labcoldagglutinin1280',
                    labcoldagglutinin2560='$labcoldagglutinin2560',
                    labcoldagglutinin5120='$labcoldagglutinin5120',
                    labcoldagglutinin10240='$labcoldagglutinin10240',
                    labcoldagglutinin20480='$labcoldagglutinin20480',
                    active='1'
                WHERE labcoldagglutininid0 = '$labcoldagglutininid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Cold Agglutinin


// Start Tab 0 Antibody identification Test
$lab_antibodyidentificationtestgetmethod_0_item = json_decode($_POST['lab_antibodyidentificationtestgetmethod_0_item']);

$sql = "UPDATE lab_antibodyidentificationtestgetmethod_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtestgetmethod_0_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestgetmethodid0 =   (!empty($im->labantibodyidentificationtestgetmethodid0)) ? $im->labantibodyidentificationtestgetmethodid0 : '';
    $labantibodyidentificationtestgetmethodcode0 =   (!empty($im->labantibodyidentificationtestgetmethodcode0)) ? $im->labantibodyidentificationtestgetmethodcode0 : '';
    $labantibodyidentificationtestgetmethod0 =   (!empty($im->labantibodyidentificationtestgetmethod0)) ? $im->labantibodyidentificationtestgetmethod0 : '';
    $labantibodyidentificationtestgetmethod10 =   (!empty($im->labantibodyidentificationtestgetmethod10)) ? $im->labantibodyidentificationtestgetmethod10 : '';
    $labantibodyidentificationtestgetmethod20 =   (!empty($im->labantibodyidentificationtestgetmethod20)) ? $im->labantibodyidentificationtestgetmethod20 : '';
    $labantibodyidentificationtestgetmethod30 =   (!empty($im->labantibodyidentificationtestgetmethod30)) ? $im->labantibodyidentificationtestgetmethod30 : '';
    $labantibodyidentificationtestgetmethod40 =   (!empty($im->labantibodyidentificationtestgetmethod40)) ? $im->labantibodyidentificationtestgetmethod40 : '';
    $labantibodyidentificationtestgetmethod50 =   (!empty($im->labantibodyidentificationtestgetmethod50)) ? $im->labantibodyidentificationtestgetmethod50 : '';
    $labantibodyidentificationtestgetmethod60 =   (!empty($im->labantibodyidentificationtestgetmethod60)) ? $im->labantibodyidentificationtestgetmethod60 : '';
    $labantibodyidentificationtestgetmethod70 =   (!empty($im->labantibodyidentificationtestgetmethod70)) ? $im->labantibodyidentificationtestgetmethod70 : '';
    $labantibodyidentificationtestgetmethod80 =   (!empty($im->labantibodyidentificationtestgetmethod80)) ? $im->labantibodyidentificationtestgetmethod80 : '';
    $labantibodyidentificationtestgetmethod90 =   (!empty($im->labantibodyidentificationtestgetmethod90)) ? $im->labantibodyidentificationtestgetmethod90 : '';
    $labantibodyidentificationtestgetmethod100 =   (!empty($im->labantibodyidentificationtestgetmethod100)) ? $im->labantibodyidentificationtestgetmethod100 : '';
    $labantibodyidentificationtestgetmethod110 =   (!empty($im->labantibodyidentificationtestgetmethod110)) ? $im->labantibodyidentificationtestgetmethod110 : '';
    $labantibodyidentificationtestgetmethodauto0 =   (!empty($im->labantibodyidentificationtestgetmethodauto0)) ? $im->labantibodyidentificationtestgetmethodauto0 : '';
    $labantibodyidentificationtestgetmethodantibody0 =   (!empty($im->labantibodyidentificationtestgetmethodantibody0)) ? $im->labantibodyidentificationtestgetmethodantibody0 : '';
    $labantibodyidentificationtestgetmethodlotno0 =   (!empty($im->labantibodyidentificationtestgetmethodlotno0)) ? $im->labantibodyidentificationtestgetmethodlotno0 : '';


    if (empty($labantibodyidentificationtestgetmethodid0)) {
        $running = getRunningYM('ABIDG0');
        $labantibodyidentificationtestgetmethodid0 = $running['runn'];
        $labantibodyidentificationtestgetmethodcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_antibodyidentificationtestgetmethod_0
                (
                    labantibodyidentificationtestgetmethodid0,
                    labantibodyidentificationtestgetmethodcode0,
                    labantibodyidentificationtestgetmethod0,
                    labantibodyidentificationtestgetmethod10,
                    labantibodyidentificationtestgetmethod20,
                    labantibodyidentificationtestgetmethod30,
                    labantibodyidentificationtestgetmethod40,
                    labantibodyidentificationtestgetmethod50,
                    labantibodyidentificationtestgetmethod60,
                    labantibodyidentificationtestgetmethod70,
                    labantibodyidentificationtestgetmethod80,
                    labantibodyidentificationtestgetmethod90,
                    labantibodyidentificationtestgetmethod100,
                    labantibodyidentificationtestgetmethod110,
                    labantibodyidentificationtestgetmethodauto0,
                    labantibodyidentificationtestgetmethodantibody0,
                    labantibodyidentificationtestgetmethodlotno0,
                    labcheckrequestid
                )
                value
                (
                    '$labantibodyidentificationtestgetmethodid0',
                    '$labantibodyidentificationtestgetmethodcode0',
                    '$labantibodyidentificationtestgetmethod0',
                    '$labantibodyidentificationtestgetmethod10',
                    '$labantibodyidentificationtestgetmethod20',
                    '$labantibodyidentificationtestgetmethod30',
                    '$labantibodyidentificationtestgetmethod40',
                    '$labantibodyidentificationtestgetmethod50',
                    '$labantibodyidentificationtestgetmethod60',
                    '$labantibodyidentificationtestgetmethod70',
                    '$labantibodyidentificationtestgetmethod80',
                    '$labantibodyidentificationtestgetmethod90',
                    '$labantibodyidentificationtestgetmethod100',
                    '$labantibodyidentificationtestgetmethod110',
                    '$labantibodyidentificationtestgetmethodauto0',
                    '$labantibodyidentificationtestgetmethodantibody0',
                    '$labantibodyidentificationtestgetmethodlotno0',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtestgetmethod_0 SET
                    labantibodyidentificationtestgetmethod0='$labantibodyidentificationtestgetmethod0',
                    labantibodyidentificationtestgetmethod10='$labantibodyidentificationtestgetmethod10',
                    labantibodyidentificationtestgetmethod20='$labantibodyidentificationtestgetmethod20',
                    labantibodyidentificationtestgetmethod30='$labantibodyidentificationtestgetmethod30',
                    labantibodyidentificationtestgetmethod40='$labantibodyidentificationtestgetmethod40',
                    labantibodyidentificationtestgetmethod50='$labantibodyidentificationtestgetmethod50',
                    labantibodyidentificationtestgetmethod60='$labantibodyidentificationtestgetmethod60',
                    labantibodyidentificationtestgetmethod70='$labantibodyidentificationtestgetmethod70',
                    labantibodyidentificationtestgetmethod80='$labantibodyidentificationtestgetmethod80',
                    labantibodyidentificationtestgetmethod90='$labantibodyidentificationtestgetmethod90',
                    labantibodyidentificationtestgetmethod100='$labantibodyidentificationtestgetmethod100',
                    labantibodyidentificationtestgetmethod110='$labantibodyidentificationtestgetmethod110',
                    labantibodyidentificationtestgetmethodauto0='$labantibodyidentificationtestgetmethodauto0',
                    labantibodyidentificationtestgetmethodantibody0='$labantibodyidentificationtestgetmethodantibody0',
                    labantibodyidentificationtestgetmethodlotno0='$labantibodyidentificationtestgetmethodlotno0',
                    active='1'
                WHERE labantibodyidentificationtestgetmethodid0 = '$labantibodyidentificationtestgetmethodid0'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Antibody identification Test


// Start Tab 0 Antibody Sceening test Get Method
$lab_antibodysceentestgetmethod_0_item = json_decode($_POST['lab_antibodysceentestgetmethod_0_item']);

$sql = "UPDATE lab_antibodysceentestgetmethod_0 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentestgetmethod_0_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestgetmethodid0 =   (!empty($im->labantibodysceentestgetmethodid0)) ? $im->labantibodysceentestgetmethodid0 : '';
    $labantibodysceentestgetmethodcode0 =   (!empty($im->labantibodysceentestgetmethodcode0)) ? $im->labantibodysceentestgetmethodcode0 : '';
    $labantibodysceentestgetmethodtest0 =   (!empty($im->labantibodysceentestgetmethodtest0)) ? $im->labantibodysceentestgetmethodtest0 : '';
    $labantibodysceentestgetmethodp1mi0 =   (!empty($im->labantibodysceentestgetmethodp1mi0)) ? $im->labantibodysceentestgetmethodp1mi0 : '';

    $labantibodysceentestgetmethodo10 =   (!empty($im->labantibodysceentestgetmethodo10)) ? $im->labantibodysceentestgetmethodo10 : '';
    $labantibodysceentestgetmethodo20 =   (!empty($im->labantibodysceentestgetmethodo20)) ? $im->labantibodysceentestgetmethodo20 : '';
    $labantibodysceentestgetmethodo30 =   (!empty($im->labantibodysceentestgetmethodo30)) ? $im->labantibodysceentestgetmethodo30 : '';
    $labantibodysceentestgetmethodenz0 =   (!empty($im->labantibodysceentestgetmethodenz0)) ? $im->labantibodysceentestgetmethodenz0 : '';
    $labantibodysceentestgetmethodlotno0 =   (!empty($im->labantibodysceentestgetmethodlotno0)) ? $im->labantibodysceentestgetmethodlotno0 : '';

    if (empty($labantibodysceentestgetmethodid0)) {
        $running = getRunningYM('ABTGM0');
        $labantibodysceentestgetmethodid0 = $running['runn'];
        $labantibodysceentestgetmethodcode0 = $running['code'];
        $sql = "
                INSERT INTO lab_antibodysceentestgetmethod_0
                (
                    labantibodysceentestgetmethodid0,
                    labantibodysceentestgetmethodcode0,
                    labantibodysceentestgetmethodtest0,
                    labantibodysceentestgetmethodp1mi0,
                    labantibodysceentestgetmethodo10,
                    labantibodysceentestgetmethodo20,
                    labantibodysceentestgetmethodo30,
                    labantibodysceentestgetmethodenz0,
                    labantibodysceentestgetmethodlotno0,
                    labcheckrequestid
                )
                value
                (
                    '$labantibodysceentestgetmethodid0',
                    '$labantibodysceentestgetmethodcode0',
                    '$labantibodysceentestgetmethodtest0',
                    '$labantibodysceentestgetmethodp1mi0',
                    '$labantibodysceentestgetmethodo10',
                    '$labantibodysceentestgetmethodo20',
                    '$labantibodysceentestgetmethodo30',
                    '$labantibodysceentestgetmethodenz0',
                    '$labantibodysceentestgetmethodlotno0',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentestgetmethod_0 SET
                labantibodysceentestgetmethodtest0='$labantibodysceentestgetmethodtest0',
                labantibodysceentestgetmethodp1mi0='$labantibodysceentestgetmethodp1mi0',
                labantibodysceentestgetmethodo10='$labantibodysceentestgetmethodo10',
                labantibodysceentestgetmethodo20='$labantibodysceentestgetmethodo20',
                labantibodysceentestgetmethodo30='$labantibodysceentestgetmethodo30',
                labantibodysceentestgetmethodenz0='$labantibodysceentestgetmethodenz0',
                labantibodysceentestgetmethodlotno0='$labantibodysceentestgetmethodlotno0',
                active='1'
                WHERE labantibodysceentestgetmethodid0 = '$labantibodysceentestgetmethodid0'
                
            ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 0 Antibody Sceening test Get Method


// Tab 1===========================================

// Start Tab 1 ABO
$lab_abo_1_item = json_decode($_POST['lab_abo_1_item']);

$sql = "UPDATE lab_abo_1 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_abo_1_item as $item) {

    $im = json_decode($item);
    $labreagent1 = (!empty($im->labreagent1)) ? $im->labreagent1 : '';
    $lababoid1 =   (!empty($im->lababoid1)) ? $im->lababoid1 : '';
    $lababocode1 =   (!empty($im->lababocode1)) ? $im->lababocode1 : '';
    $lababoantia1 =   (!empty($im->lababoantia1)) ? $im->lababoantia1 : '';
    $lababoantib1 =   (!empty($im->lababoantib1)) ? $im->lababoantib1 : '';
    $lababoantiab1 =   (!empty($im->lababoantiab1)) ? $im->lababoantiab1 : '';
    $lababoacells1 =   (!empty($im->lababoacells1)) ? $im->lababoacells1 : '';
    $lababobcells1 =   (!empty($im->lababobcells1)) ? $im->lababobcells1 : '';
    $lababoocells1 =   (!empty($im->lababoocells1)) ? $im->lababoocells1 : '';
    $lababobloodgroup1 =   (!empty($im->lababobloodgroup1)) ? $im->lababobloodgroup1 : '';

    

    if (empty($lababoid1)) {
        $running = getRunningYM('TABO0');
        $lababoid1 = $running['runn'];
        $lababocode1 = $running['code'];
        $sql = "
                INSERT INTO lab_abo_1
                (
                    labreagent1,
                    lababoid1,
                    lababocode1,
                    lababoantia1,
                    lababoantib1,
                    lababoantiab1,
                    lababoacells1,
                    lababobcells1,
                    lababoocells1,
                    lababobloodgroup1,
                    labcheckrequestid
                )
                value
                (
                    '$labreagent1',
                    '$lababoid1',
                    '$lababocode1',
                    '$lababoantia1',
                    '$lababoantib1',
                    '$lababoantiab1',
                    '$lababoacells1',
                    '$lababobcells1',
                    '$lababoocells1',
                    '$lababobloodgroup1',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_abo_1 SET
                labreagent1='$labreagent1',
                lababoantia1='$lababoantia1',
                lababoantib1='$lababoantib1',
                lababoantiab1='$lababoantiab1',
                lababoacells1='$lababoacells1',
                lababobcells1='$lababobcells1',
                lababoocells1='$lababoocells1',
                lababobloodgroup1='$lababobloodgroup1',
                active='1'
                WHERE lababoid1 = '$lababoid1'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 ABO

// Start Tab 1 Rh
$lab_rh_1_item = json_decode($_POST['lab_rh_1_item']);

$sql = "UPDATE lab_rh_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_rh_1_item as $item) {

    $im = json_decode($item);
    $labrhid1 =   (!empty($im->labrhid1)) ? $im->labrhid1 : '';
    $labrhcode1 =   (!empty($im->labrhcode1)) ? $im->labrhcode1 : '';
    $labrhreagent1 =   (!empty($im->labrhreagent1)) ? $im->labrhreagent1 : '';
    $labrhrt1 =   (!empty($im->labrhrt1)) ? $im->labrhrt1 : '';
    $lab37c1 =   (!empty($im->lab37c1)) ? $im->lab37c1 : '';
    $labiat1 =   (!empty($im->labiat1)) ? $im->labiat1 : '';
    $labccc1 =   (!empty($im->labccc1)) ? $im->labccc1 : '';
    $labresult1 =   (!empty($im->labresult1)) ? $im->labresult1 : '';

    if (empty($labrhid1)) {
        $running = getRunningYM('TRH0');
        $labrhid1 = $running['runn'];
        $labrhcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_rh_1
            (
                labrhid1,
                labrhcode1,
                labrhreagent1,
                labrhrt1,
                lab37c1,
                labiat1,
                labccc1,
                labresult1,
                labcheckrequestid
            )
            value
            (
                '$labrhid1',
                '$labrhcode1',
                '$labrhreagent1',
                '$labrhrt1',
                '$lab37c1',
                '$labiat1',
                '$labccc1',
                '$labresult1',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_rh_1 SET
            labrhreagent1='$labrhreagent1',
            labrhrt1='$labrhrt1',
            lab37c1='$lab37c1',
            labiat1='$labiat1',
            labccc1='$labccc1',
            labresult1='$labresult1',
            active='1'
            WHERE labrhid1 = '$labrhid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Rh


// Start Tab 1 Antibody Sceening test
$lab_antibodysceentest_1_item = json_decode($_POST['lab_antibodysceentest_1_item']);

$sql = "UPDATE lab_antibodysceentest_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentest_1_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestid1 =   (!empty($im->labantibodysceentestid1)) ? $im->labantibodysceentestid1 : '';
    $labantibodysceentestcode1 =   (!empty($im->labantibodysceentestcode1)) ? $im->labantibodysceentestcode1 : '';
    $labantibodysceentest1 =   (!empty($im->labantibodysceentest1)) ? $im->labantibodysceentest1 : '';
    $labantibodysceentestp1mi1 =   (!empty($im->labantibodysceentestp1mi1)) ? $im->labantibodysceentestp1mi1 : '';
    $labantibodysceentesto11 =   (!empty($im->labantibodysceentesto11)) ? $im->labantibodysceentesto11 : '';
    $labantibodysceentesto21 =   (!empty($im->labantibodysceentesto21)) ? $im->labantibodysceentesto21 : '';
    $labantibodysceentesto31 =   (!empty($im->labantibodysceentesto31)) ? $im->labantibodysceentesto31 : '';
    $labantibodysceentestlotno1 =   (!empty($im->labantibodysceentestlotno1)) ? $im->labantibodysceentestlotno1 : '';

    if (empty($labantibodysceentestid1)) {
        $running = getRunningYM('ABT');
        $labantibodysceentestid1 = $running['runn'];
        $labantibodysceentestcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodysceentest_1
            (
                labantibodysceentestid1,
                labantibodysceentestcode1,
                labantibodysceentest1,
                labantibodysceentestp1mi1,
                labantibodysceentesto11,
                labantibodysceentesto21,
                labantibodysceentesto31,
                labantibodysceentestlotno1,
                labcheckrequestid
            )
            value
            (
                '$labantibodysceentestid1',
                '$labantibodysceentestcode1',
                '$labantibodysceentest1',
                '$labantibodysceentestp1mi1',
                '$labantibodysceentesto11',
                '$labantibodysceentesto21',
                '$labantibodysceentesto31',
                '$labantibodysceentestlotno1',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentest_1 SET
            labantibodysceentest1='$labantibodysceentest1',
            labantibodysceentestp1mi1='$labantibodysceentestp1mi1',
            labantibodysceentesto11='$labantibodysceentesto11',
            labantibodysceentesto21='$labantibodysceentesto21',
            labantibodysceentesto31='$labantibodysceentesto31',
            labantibodysceentestlotno1='$labantibodysceentestlotno1',
            active='1'
            WHERE labantibodysceentestid1 = '$labantibodysceentestid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Antibody Sceening test

// Start Tab 1 Antibody identification Test
$lab_antibodyidentificationtest_1_item = json_decode($_POST['lab_antibodyidentificationtest_1_item']);

$sql = "UPDATE lab_antibodyidentificationtest_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtest_1_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestid1 =   (!empty($im->labantibodyidentificationtestid1)) ? $im->labantibodyidentificationtestid1 : '';
    $labantibodyidentificationtestcode1 =   (!empty($im->labantibodyidentificationtestcode1)) ? $im->labantibodyidentificationtestcode1 : '';
    $labantibodyidentificationtest1 =   (!empty($im->labantibodyidentificationtest1)) ? $im->labantibodyidentificationtest1 : '';
    $labantibodyidentificationtest11 =   (!empty($im->labantibodyidentificationtest11)) ? $im->labantibodyidentificationtest11 : '';
    $labantibodyidentificationtest21 =   (!empty($im->labantibodyidentificationtest21)) ? $im->labantibodyidentificationtest21 : '';
    $labantibodyidentificationtest31 =   (!empty($im->labantibodyidentificationtest31)) ? $im->labantibodyidentificationtest31 : '';
    $labantibodyidentificationtest41 =   (!empty($im->labantibodyidentificationtest41)) ? $im->labantibodyidentificationtest41 : '';
    $labantibodyidentificationtest51 =   (!empty($im->labantibodyidentificationtest51)) ? $im->labantibodyidentificationtest51 : '';
    $labantibodyidentificationtest61 =   (!empty($im->labantibodyidentificationtest61)) ? $im->labantibodyidentificationtest61 : '';
    $labantibodyidentificationtest71 =   (!empty($im->labantibodyidentificationtest71)) ? $im->labantibodyidentificationtest71 : '';
    $labantibodyidentificationtest81 =   (!empty($im->labantibodyidentificationtest81)) ? $im->labantibodyidentificationtest81 : '';
    $labantibodyidentificationtest91 =   (!empty($im->labantibodyidentificationtest91)) ? $im->labantibodyidentificationtest91 : '';
    $labantibodyidentificationtest101 =   (!empty($im->labantibodyidentificationtest101)) ? $im->labantibodyidentificationtest101 : '';
    $labantibodyidentificationtest111 =   (!empty($im->labantibodyidentificationtest111)) ? $im->labantibodyidentificationtest111 : '';
    $labantibodyidentificationtestauto1 =   (!empty($im->labantibodyidentificationtestauto1)) ? $im->labantibodyidentificationtestauto1 : '';
    $labantibodyidentificationtestlotno1 =   (!empty($im->labantibodyidentificationtestlotno1)) ? $im->labantibodyidentificationtestlotno1 : '';

    if (empty($labantibodyidentificationtestid1)) {
        $running = getRunningYM('ABID');
        $labantibodyidentificationtestid1 = $running['runn'];
        $labantibodyidentificationtestcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodyidentificationtest_1
            (
                labantibodyidentificationtestid1,
                labantibodyidentificationtestcode1,
                labantibodyidentificationtest1,
                labantibodyidentificationtest11,
                labantibodyidentificationtest21,
                labantibodyidentificationtest31,
                labantibodyidentificationtest41,
                labantibodyidentificationtest51,
                labantibodyidentificationtest61,
                labantibodyidentificationtest71,
                labantibodyidentificationtest81,
                labantibodyidentificationtest91,
                labantibodyidentificationtest101,
                labantibodyidentificationtest111,
                labantibodyidentificationtestauto1,
                labantibodyidentificationtestlotno1,
                labcheckrequestid
            )
            value
            (
                '$labantibodyidentificationtestid1',
                '$labantibodyidentificationtestcode1',
                '$labantibodyidentificationtest1',
                '$labantibodyidentificationtest11',
                '$labantibodyidentificationtest21',
                '$labantibodyidentificationtest31',
                '$labantibodyidentificationtest41',
                '$labantibodyidentificationtest51',
                '$labantibodyidentificationtest61',
                '$labantibodyidentificationtest71',
                '$labantibodyidentificationtest81',
                '$labantibodyidentificationtest91',
                '$labantibodyidentificationtest101',
                '$labantibodyidentificationtest111',
                '$labantibodyidentificationtestauto1',
                '$labantibodyidentificationtestlotno1',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtest_1 SET
                labantibodyidentificationtest1='$labantibodyidentificationtest1',
                labantibodyidentificationtest11='$labantibodyidentificationtest11',
                labantibodyidentificationtest21='$labantibodyidentificationtest21',
                labantibodyidentificationtest31='$labantibodyidentificationtest31',
                labantibodyidentificationtest41='$labantibodyidentificationtest41',
                labantibodyidentificationtest51='$labantibodyidentificationtest51',
                labantibodyidentificationtest61='$labantibodyidentificationtest61',
                labantibodyidentificationtest71='$labantibodyidentificationtest71',
                labantibodyidentificationtest81='$labantibodyidentificationtest81',
                labantibodyidentificationtest91='$labantibodyidentificationtest91',
                labantibodyidentificationtest101='$labantibodyidentificationtest101',
                labantibodyidentificationtest111='$labantibodyidentificationtest111',
                labantibodyidentificationtestauto1='$labantibodyidentificationtestauto1',
                labantibodyidentificationtestlotno1='$labantibodyidentificationtestlotno1',
                active='1'
            WHERE labantibodyidentificationtestid1 = '$labantibodyidentificationtestid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Antibody identification Test

// Start Tab 1 Saliva
$lab_salivatest_1_item = json_decode($_POST['lab_salivatest_1_item']);

$sql = "UPDATE lab_salivatest_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_salivatest_1_item as $item) {

    $im = json_decode($item);
    $labsalivatestid1 =   (!empty($im->labsalivatestid1)) ? $im->labsalivatestid1 : '';
    $labsalivatestcode1 =   (!empty($im->labsalivatestcode1)) ? $im->labsalivatestcode1 : '';
    $labsalivatest1 =   (!empty($im->labsalivatest1)) ? $im->labsalivatest1 : '';
    $labsalivatestacells1 =   (!empty($im->labsalivatestacells1)) ? $im->labsalivatestacells1 : '';
    $labsalivatestbcells1 =   (!empty($im->labsalivatestbcells1)) ? $im->labsalivatestbcells1 : '';
    $labsalivatesotcells1 =   (!empty($im->labsalivatesotcells1)) ? $im->labsalivatesotcells1 : '';

    if (empty($labsalivatestid1)) {
        $running = getRunningYM('SLT0');
        $labsalivatestid1 = $running['runn'];
        $labsalivatestcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_salivatest_1
            (
                labsalivatestid1,
                labsalivatestcode1,
                labsalivatest1,
                labsalivatestacells1,
                labsalivatestbcells1,
                labsalivatesotcells1,
                labcheckrequestid
            )
            value
            (
                '$labsalivatestid1',
                '$labsalivatestcode1',
                '$labsalivatest1',
                '$labsalivatestacells1',
                '$labsalivatestbcells1',
                '$labsalivatesotcells1',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_salivatest_1 SET
            labsalivatest1='$labsalivatest1',
            labsalivatestacells1='$labsalivatestacells1',
            labsalivatestbcells1='$labsalivatestbcells1',
            labsalivatesotcells1='$labsalivatesotcells1',
            active='1'
            WHERE labsalivatestid1 = '$labsalivatestid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Saliva

// Start Tab 1 Titration
$lab_titration_1_item = json_decode($_POST['lab_titration_1_item']);

$sql = "UPDATE lab_titration_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_titration_1_item as $item) {

    $im = json_decode($item);
    $labtitrationid1 =   (!empty($im->labtitrationid1)) ? $im->labtitrationid1 : '';
    $labtitrationcode1 =   (!empty($im->labtitrationcode1)) ? $im->labtitrationcode1 : '';
    $labtitrationantiserum1 =   (!empty($im->labtitrationantiserum1)) ? $im->labtitrationantiserum1 : '';
    $labtitrationcell1 =   (!empty($im->labtitrationcell1)) ? $im->labtitrationcell1 : '';
    $labtitration11 =   (!empty($im->labtitration11)) ? $im->labtitration11 : '';
    $labtitration21 =   (!empty($im->labtitration21)) ? $im->labtitration21 : '';
    $labtitration41 =   (!empty($im->labtitration41)) ? $im->labtitration41 : '';
    $labtitration81 =   (!empty($im->labtitration81)) ? $im->labtitration81 : '';
    $labtitration161 =   (!empty($im->labtitration161)) ? $im->labtitration161 : '';
    $labtitration321 =   (!empty($im->labtitration321)) ? $im->labtitration321 : '';
    $labtitration641 =   (!empty($im->labtitration641)) ? $im->labtitration641 : '';
    $labtitration1281 =   (!empty($im->labtitration1281)) ? $im->labtitration1281 : '';
    $labtitration2561 =   (!empty($im->labtitration2561)) ? $im->labtitration2561 : '';
    $labtitration5121 =   (!empty($im->labtitration5121)) ? $im->labtitration5121 : '';
    $labtitration10241 =   (!empty($im->labtitration10241)) ? $im->labtitration10241 : '';
    $labtitration20481 =   (!empty($im->labtitration20481)) ? $im->labtitration20481 : '';
    $labtitrationtiter1 =   (!empty($im->labtitrationtiter1)) ? $im->labtitrationtiter1 : '';

    if (empty($labtitrationid1)) {
        $running = getRunningYM('TTT0');
        $labtitrationid1 = $running['runn'];
        $labtitrationcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_titration_1
            (
                labtitrationid1,
                labtitrationcode1,
                labtitrationantiserum1,
                labtitrationcell1,
                labtitration11,
                labtitration21,
                labtitration41,
                labtitration81,
                labtitration161,
                labtitration321,
                labtitration641,
                labtitration1281,
                labtitration2561,
                labtitration5121,
                labtitration10241,
                labtitration20481,
                labtitrationtiter1,
                labcheckrequestid
            )
            value
            (
                '$labtitrationid1',
                '$labtitrationcode1',
                '$labtitrationantiserum1',
                '$labtitrationcell1',
                '$labtitration11',
                '$labtitration21',
                '$labtitration41',
                '$labtitration81',
                '$labtitration161',
                '$labtitration321',
                '$labtitration641',
                '$labtitration1281',
                '$labtitration2561',
                '$labtitration5121',
                '$labtitration10241',
                '$labtitration20481',
                '$labtitrationtiter1',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_titration_1 SET
                labtitrationantiserum1='$labtitrationantiserum1',
                labtitrationcell1='$labtitrationcell1',
                labtitration11='$labtitration11',
                labtitration21='$labtitration21',
                labtitration41='$labtitration41',
                labtitration81='$labtitration81',
                labtitration161='$labtitration161',
                labtitration321='$labtitration321',
                labtitration641='$labtitration641',
                labtitration1281='$labtitration1281',
                labtitration2561='$labtitration2561',
                labtitration5121='$labtitration5121',
                labtitration10241='$labtitration10241',
                labtitration20481='$labtitration20481',
                labtitrationtiter1='$labtitrationtiter1',
                active='1'
            WHERE labtitrationid1 = '$labtitrationid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Titration

// Start Tab 1 Cold Agglutinin
$lab_coldagglutinin_1_item = json_decode($_POST['lab_coldagglutinin_1_item']);

$sql = "UPDATE lab_coldagglutinin_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_coldagglutinin_1_item as $item) {

    $im = json_decode($item);
    $labcoldagglutininid1 =   (!empty($im->labcoldagglutininid1)) ? $im->labcoldagglutininid1 : '';
    $labcoldagglutinincode1 =   (!empty($im->labcoldagglutinincode1)) ? $im->labcoldagglutinincode1 : '';
    $labcoldagglutinino1 =   (!empty($im->labcoldagglutinino1)) ? $im->labcoldagglutinino1 : '';
    $labcoldagglutinintime1 =   (!empty($im->labcoldagglutinintime1)) ? $im->labcoldagglutinintime1 : '';
    $labcoldagglutinin11 =   (!empty($im->labcoldagglutinin11)) ? $im->labcoldagglutinin11 : '';
    $labcoldagglutinin21 =   (!empty($im->labcoldagglutinin21)) ? $im->labcoldagglutinin21 : '';
    $labcoldagglutinin41 =   (!empty($im->labcoldagglutinin41)) ? $im->labcoldagglutinin41 : '';
    $labcoldagglutinin81 =   (!empty($im->labcoldagglutinin81)) ? $im->labcoldagglutinin81 : '';
    $labcoldagglutinin161 =   (!empty($im->labcoldagglutinin161)) ? $im->labcoldagglutinin161 : '';
    $labcoldagglutinin321 =   (!empty($im->labcoldagglutinin321)) ? $im->labcoldagglutinin321 : '';
    $labcoldagglutinin641 =   (!empty($im->labcoldagglutinin641)) ? $im->labcoldagglutinin641 : '';
    $labcoldagglutinin1281 =   (!empty($im->labcoldagglutinin1281)) ? $im->labcoldagglutinin1281 : '';
    $labcoldagglutinin2561 =   (!empty($im->labcoldagglutinin2561)) ? $im->labcoldagglutinin2561 : '';
    $labcoldagglutinin5121 =   (!empty($im->labcoldagglutinin5121)) ? $im->labcoldagglutinin5121 : '';
    $labcoldagglutinin10241 =   (!empty($im->labcoldagglutinin10241)) ? $im->labcoldagglutinin10241 : '';
    $labcoldagglutinin20481 =   (!empty($im->labcoldagglutinin20481)) ? $im->labcoldagglutinin20481 : '';

    if (empty($labcoldagglutininid1)) {
        $running = getRunningYM('CAGG0');
        $labcoldagglutininid1 = $running['runn'];
        $labcoldagglutinincode1 = $running['code'];
        $sql = "
            INSERT INTO lab_coldagglutinin_1
            (
                labcoldagglutininid1,
                labcoldagglutinincode1,
                labcoldagglutinino1,
                labcoldagglutinintime1,
                labcoldagglutinin11,
                labcoldagglutinin21,
                labcoldagglutinin41,
                labcoldagglutinin81,
                labcoldagglutinin161,
                labcoldagglutinin321,
                labcoldagglutinin641,
                labcoldagglutinin1281,
                labcoldagglutinin2561,
                labcoldagglutinin5121,
                labcoldagglutinin10241,
                labcoldagglutinin20481,
                labcheckrequestid
            )
            value
            (
                '$labcoldagglutininid1',
                '$labcoldagglutinincode1',
                '$labcoldagglutinino1',
                '$labcoldagglutinintime1',
                '$labcoldagglutinin11',
                '$labcoldagglutinin21',
                '$labcoldagglutinin41',
                '$labcoldagglutinin81',
                '$labcoldagglutinin161',
                '$labcoldagglutinin321',
                '$labcoldagglutinin641',
                '$labcoldagglutinin1281',
                '$labcoldagglutinin2561',
                '$labcoldagglutinin5121',
                '$labcoldagglutinin10241',
                '$labcoldagglutinin20481',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_coldagglutinin_1 SET
                labcoldagglutinino1='$labcoldagglutinino1',
                labcoldagglutinintime1='$labcoldagglutinintime1',
                labcoldagglutinin11='$labcoldagglutinin11',
                labcoldagglutinin21='$labcoldagglutinin21',
                labcoldagglutinin41='$labcoldagglutinin41',
                labcoldagglutinin81='$labcoldagglutinin81',
                labcoldagglutinin161='$labcoldagglutinin161',
                labcoldagglutinin321='$labcoldagglutinin321',
                labcoldagglutinin641='$labcoldagglutinin641',
                labcoldagglutinin1281='$labcoldagglutinin1281',
                labcoldagglutinin2561='$labcoldagglutinin2561',
                labcoldagglutinin5121='$labcoldagglutinin5121',
                labcoldagglutinin10241='$labcoldagglutinin10241',
                labcoldagglutinin20481='$labcoldagglutinin20481',
                active='1'
            WHERE labcoldagglutininid1 = '$labcoldagglutininid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Cold Agglutinin


// Start Tab 1 Antibody identification Test
$lab_antibodyidentificationtestgetmethod_1_item = json_decode($_POST['lab_antibodyidentificationtestgetmethod_1_item']);

$sql = "UPDATE lab_antibodyidentificationtestgetmethod_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtestgetmethod_1_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestgetmethodid1 =   (!empty($im->labantibodyidentificationtestgetmethodid1)) ? $im->labantibodyidentificationtestgetmethodid1 : '';
    $labantibodyidentificationtestgetmethodcode1 =   (!empty($im->labantibodyidentificationtestgetmethodcode1)) ? $im->labantibodyidentificationtestgetmethodcode1 : '';
    $labantibodyidentificationtestgetmethod1 =   (!empty($im->labantibodyidentificationtestgetmethod1)) ? $im->labantibodyidentificationtestgetmethod1 : '';
    $labantibodyidentificationtestgetmethod11 =   (!empty($im->labantibodyidentificationtestgetmethod11)) ? $im->labantibodyidentificationtestgetmethod11 : '';
    $labantibodyidentificationtestgetmethod21 =   (!empty($im->labantibodyidentificationtestgetmethod21)) ? $im->labantibodyidentificationtestgetmethod21 : '';
    $labantibodyidentificationtestgetmethod31 =   (!empty($im->labantibodyidentificationtestgetmethod31)) ? $im->labantibodyidentificationtestgetmethod31 : '';
    $labantibodyidentificationtestgetmethod41 =   (!empty($im->labantibodyidentificationtestgetmethod41)) ? $im->labantibodyidentificationtestgetmethod41 : '';
    $labantibodyidentificationtestgetmethod51 =   (!empty($im->labantibodyidentificationtestgetmethod51)) ? $im->labantibodyidentificationtestgetmethod51 : '';
    $labantibodyidentificationtestgetmethod61 =   (!empty($im->labantibodyidentificationtestgetmethod61)) ? $im->labantibodyidentificationtestgetmethod61 : '';
    $labantibodyidentificationtestgetmethod71 =   (!empty($im->labantibodyidentificationtestgetmethod71)) ? $im->labantibodyidentificationtestgetmethod71 : '';
    $labantibodyidentificationtestgetmethod81 =   (!empty($im->labantibodyidentificationtestgetmethod81)) ? $im->labantibodyidentificationtestgetmethod81 : '';
    $labantibodyidentificationtestgetmethod91 =   (!empty($im->labantibodyidentificationtestgetmethod91)) ? $im->labantibodyidentificationtestgetmethod91 : '';
    $labantibodyidentificationtestgetmethod101 =   (!empty($im->labantibodyidentificationtestgetmethod101)) ? $im->labantibodyidentificationtestgetmethod101 : '';
    $labantibodyidentificationtestgetmethod111 =   (!empty($im->labantibodyidentificationtestgetmethod111)) ? $im->labantibodyidentificationtestgetmethod111 : '';
    $labantibodyidentificationtestgetmethodauto1 =   (!empty($im->labantibodyidentificationtestgetmethodauto1)) ? $im->labantibodyidentificationtestgetmethodauto1 : '';
    $labantibodyidentificationtestgetmethodantibody1 =   (!empty($im->labantibodyidentificationtestgetmethodantibody1)) ? $im->labantibodyidentificationtestgetmethodantibody1 : '';
    $labantibodyidentificationtestgetmethodlotno1 =   (!empty($im->labantibodyidentificationtestgetmethodlotno1)) ? $im->labantibodyidentificationtestgetmethodlotno1 : '';


    if (empty($labantibodyidentificationtestgetmethodid1)) {
        $running = getRunningYM('ABIDG0');
        $labantibodyidentificationtestgetmethodid1 = $running['runn'];
        $labantibodyidentificationtestgetmethodcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodyidentificationtestgetmethod_1
            (
                labantibodyidentificationtestgetmethodid1,
                labantibodyidentificationtestgetmethodcode1,
                labantibodyidentificationtestgetmethod1,
                labantibodyidentificationtestgetmethod11,
                labantibodyidentificationtestgetmethod21,
                labantibodyidentificationtestgetmethod31,
                labantibodyidentificationtestgetmethod41,
                labantibodyidentificationtestgetmethod51,
                labantibodyidentificationtestgetmethod61,
                labantibodyidentificationtestgetmethod71,
                labantibodyidentificationtestgetmethod81,
                labantibodyidentificationtestgetmethod91,
                labantibodyidentificationtestgetmethod101,
                labantibodyidentificationtestgetmethod111,
                labantibodyidentificationtestgetmethodauto1,
                labantibodyidentificationtestgetmethodantibody1,
                labantibodyidentificationtestgetmethodlotno1,
                labcheckrequestid
            )
            value
            (
                '$labantibodyidentificationtestgetmethodid1',
                '$labantibodyidentificationtestgetmethodcode1',
                '$labantibodyidentificationtestgetmethod1',
                '$labantibodyidentificationtestgetmethod11',
                '$labantibodyidentificationtestgetmethod21',
                '$labantibodyidentificationtestgetmethod31',
                '$labantibodyidentificationtestgetmethod41',
                '$labantibodyidentificationtestgetmethod51',
                '$labantibodyidentificationtestgetmethod61',
                '$labantibodyidentificationtestgetmethod71',
                '$labantibodyidentificationtestgetmethod81',
                '$labantibodyidentificationtestgetmethod91',
                '$labantibodyidentificationtestgetmethod101',
                '$labantibodyidentificationtestgetmethod111',
                '$labantibodyidentificationtestgetmethodauto1',
                '$labantibodyidentificationtestgetmethodantibody1',
                '$labantibodyidentificationtestgetmethodlotno1',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtestgetmethod_1 SET
                labantibodyidentificationtestgetmethod1='$labantibodyidentificationtestgetmethod1',
                labantibodyidentificationtestgetmethod11='$labantibodyidentificationtestgetmethod11',
                labantibodyidentificationtestgetmethod21='$labantibodyidentificationtestgetmethod21',
                labantibodyidentificationtestgetmethod31='$labantibodyidentificationtestgetmethod31',
                labantibodyidentificationtestgetmethod41='$labantibodyidentificationtestgetmethod41',
                labantibodyidentificationtestgetmethod51='$labantibodyidentificationtestgetmethod51',
                labantibodyidentificationtestgetmethod61='$labantibodyidentificationtestgetmethod61',
                labantibodyidentificationtestgetmethod71='$labantibodyidentificationtestgetmethod71',
                labantibodyidentificationtestgetmethod81='$labantibodyidentificationtestgetmethod81',
                labantibodyidentificationtestgetmethod91='$labantibodyidentificationtestgetmethod91',
                labantibodyidentificationtestgetmethod101='$labantibodyidentificationtestgetmethod101',
                labantibodyidentificationtestgetmethod111='$labantibodyidentificationtestgetmethod111',
                labantibodyidentificationtestgetmethodauto1='$labantibodyidentificationtestgetmethodauto1',
                labantibodyidentificationtestgetmethodantibody1='$labantibodyidentificationtestgetmethodantibody1',
                labantibodyidentificationtestgetmethodlotno1='$labantibodyidentificationtestgetmethodlotno1',
                active='1'
            WHERE labantibodyidentificationtestgetmethodid1 = '$labantibodyidentificationtestgetmethodid1'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Antibody identification Test


// Start Tab 1 Antibody Sceening test Get Method
$lab_antibodysceentestgetmethod_1_item = json_decode($_POST['lab_antibodysceentestgetmethod_1_item']);

$sql = "UPDATE lab_antibodysceentestgetmethod_1 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentestgetmethod_1_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestgetmethodid1 =   (!empty($im->labantibodysceentestgetmethodid1)) ? $im->labantibodysceentestgetmethodid1 : '';
    $labantibodysceentestgetmethodcode1 =   (!empty($im->labantibodysceentestgetmethodcode1)) ? $im->labantibodysceentestgetmethodcode1 : '';
    $labantibodysceentestgetmethodp1mi1 =   (!empty($im->labantibodysceentestgetmethodp1mi1)) ? $im->labantibodysceentestgetmethodp1mi1 : '';
    $labantibodysceentestgetmethodtest1 =   (!empty($im->labantibodysceentestgetmethodtest1)) ? $im->labantibodysceentestgetmethodtest1 : '';
    $labantibodysceentestgetmethodo11 =   (!empty($im->labantibodysceentestgetmethodo11)) ? $im->labantibodysceentestgetmethodo11 : '';
    $labantibodysceentestgetmethodo21 =   (!empty($im->labantibodysceentestgetmethodo21)) ? $im->labantibodysceentestgetmethodo21 : '';
    $labantibodysceentestgetmethodo31 =   (!empty($im->labantibodysceentestgetmethodo31)) ? $im->labantibodysceentestgetmethodo31 : '';
    $labantibodysceentestgetmethodenz1 =   (!empty($im->labantibodysceentestgetmethodenz1)) ? $im->labantibodysceentestgetmethodenz1 : '';
    $labantibodysceentestgetmethodlotno1 =   (!empty($im->labantibodysceentestgetmethodlotno1)) ? $im->labantibodysceentestgetmethodlotno1 : '';

    if (empty($labantibodysceentestgetmethodid1)) {
        $running = getRunningYM('ABTGM0');
        $labantibodysceentestgetmethodid1 = $running['runn'];
        $labantibodysceentestgetmethodcode1 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodysceentestgetmethod_1
            (
                labantibodysceentestgetmethodid1,
                labantibodysceentestgetmethodcode1,
                labantibodysceentestgetmethodtest1,
                labantibodysceentestgetmethodp1mi1,
                labantibodysceentestgetmethodo11,
                labantibodysceentestgetmethodo21,
                labantibodysceentestgetmethodo31,
                labantibodysceentestgetmethodenz1,
                labantibodysceentestgetmethodlotno1,
                labcheckrequestid
            )
            value
            (
                '$labantibodysceentestgetmethodid1',
                '$labantibodysceentestgetmethodcode1',
                '$labantibodysceentestgetmethodtest1',
                '$labantibodysceentestgetmethodp1mi1',
                '$labantibodysceentestgetmethodo11',
                '$labantibodysceentestgetmethodo21',
                '$labantibodysceentestgetmethodo31',
                '$labantibodysceentestgetmethodenz1',
                '$labantibodysceentestgetmethodlotno1',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentestgetmethod_1 SET
            labantibodysceentestgetmethodtest1='$labantibodysceentestgetmethodtest1',
            labantibodysceentestgetmethodp1mi1='$labantibodysceentestgetmethodp1mi1',
            labantibodysceentestgetmethodo11='$labantibodysceentestgetmethodo11',
            labantibodysceentestgetmethodo21='$labantibodysceentestgetmethodo21',
            labantibodysceentestgetmethodo31='$labantibodysceentestgetmethodo31',
            labantibodysceentestgetmethodenz1='$labantibodysceentestgetmethodenz1',
            labantibodysceentestgetmethodlotno1='$labantibodysceentestgetmethodlotno1',
            active='1'
            WHERE labantibodysceentestgetmethodid1 = '$labantibodysceentestgetmethodid1'
            
        ";


        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 1 Antibody Sceening test Get Method



// Tab 2===========================================

// Start Tab 2 ABO
$lab_abo_2_item = json_decode($_POST['lab_abo_2_item']);

$sql = "UPDATE lab_abo_2 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_abo_2_item as $item) {

    $im = json_decode($item);
    $labreagent2 = (!empty($im->labreagent2)) ? $im->labreagent2 : '';
    $lababoid2 =   (!empty($im->lababoid2)) ? $im->lababoid2 : '';
    $lababocode2 =   (!empty($im->lababocode2)) ? $im->lababocode2 : '';
    $lababoantia2 =   (!empty($im->lababoantia2)) ? $im->lababoantia2 : '';
    $lababoantib2 =   (!empty($im->lababoantib2)) ? $im->lababoantib2 : '';
    $lababoantiab2 =   (!empty($im->lababoantiab2)) ? $im->lababoantiab2 : '';
    $lababoacells2 =   (!empty($im->lababoacells2)) ? $im->lababoacells2 : '';
    $lababobcells2 =   (!empty($im->lababobcells2)) ? $im->lababobcells2 : '';
    $lababoocells2 =   (!empty($im->lababoocells2)) ? $im->lababoocells2 : '';
    $lababobloodgroup2 =   (!empty($im->lababobloodgroup2)) ? $im->lababobloodgroup2 : '';

    if (empty($lababoid2)) {
        $running = getRunningYM('TABO0');
        $lababoid2 = $running['runn'];
        $lababocode2 = $running['code'];
        $sql = "
                INSERT INTO lab_abo_2
                (
                    labreagent2,
                    lababoid2,
                    lababocode2,
                    lababoantia2,
                    lababoantib2,
                    lababoantiab2,
                    lababoacells2,
                    lababobcells2,
                    lababoocells2,
                    lababobloodgroup2,
                    labcheckrequestid
                )
                value
                (
                    '$labreagent2',
                    '$lababoid2',
                    '$lababocode2',
                    '$lababoantia2',
                    '$lababoantib2',
                    '$lababoantiab2',
                    '$lababoacells2',
                    '$lababobcells2',
                    '$lababoocells2',
                    '$lababobloodgroup2',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_abo_2 SET
                labreagent2='$labreagent2',
                lababoantia2='$lababoantia2',
                lababoantib2='$lababoantib2',
                lababoantiab2='$lababoantiab2',
                lababoacells2='$lababoacells2',
                lababobcells2='$lababobcells2',
                lababoocells2='$lababoocells2',
                lababobloodgroup2='$lababobloodgroup2',
                active='1'
                WHERE lababoid2 = '$lababoid2'
                
            ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 ABO

// Start Tab 2 Rh
$lab_rh_2_item = json_decode($_POST['lab_rh_2_item']);

$sql = "UPDATE lab_rh_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_rh_2_item as $item) {

    $im = json_decode($item);
    $labrhid2 =   (!empty($im->labrhid2)) ? $im->labrhid2 : '';
    $labrhcode2 =   (!empty($im->labrhcode2)) ? $im->labrhcode2 : '';
    $labrhreagent2 =   (!empty($im->labrhreagent2)) ? $im->labrhreagent2 : '';
    $labrhrt2 =   (!empty($im->labrhrt2)) ? $im->labrhrt2 : '';
    $lab37c2 =   (!empty($im->lab37c2)) ? $im->lab37c2 : '';
    $labiat2 =   (!empty($im->labiat2)) ? $im->labiat2 : '';
    $labccc2 =   (!empty($im->labccc2)) ? $im->labccc2 : '';
    $labresult2 =   (!empty($im->labresult2)) ? $im->labresult2 : '';

    if (empty($labrhid2)) {
        $running = getRunningYM('TRH0');
        $labrhid2 = $running['runn'];
        $labrhcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_rh_2
            (
                labrhid2,
                labrhcode2,
                labrhreagent2,
                labrhrt2,
                lab37c2,
                labiat2,
                labccc2,
                labresult2,
                labcheckrequestid
            )
            value
            (
                '$labrhid2',
                '$labrhcode2',
                '$labrhreagent2',
                '$labrhrt2',
                '$lab37c2',
                '$labiat2',
                '$labccc2',
                '$labresult2',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_rh_2 SET
            labrhreagent2='$labrhreagent2',
            labrhrt2='$labrhrt2',
            lab37c2='$lab37c2',
            labiat2='$labiat2',
            labccc2='$labccc2',
            labresult2='$labresult2',
            active='1'
            WHERE labrhid2 = '$labrhid2'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Rh


// Start Tab 2 Antibody Sceening test
$lab_antibodysceentest_2_item = json_decode($_POST['lab_antibodysceentest_2_item']);

$sql = "UPDATE lab_antibodysceentest_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentest_2_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestid2 =   (!empty($im->labantibodysceentestid2)) ? $im->labantibodysceentestid2 : '';
    $labantibodysceentestcode2 =   (!empty($im->labantibodysceentestcode2)) ? $im->labantibodysceentestcode2 : '';
    $labantibodysceentest2 =   (!empty($im->labantibodysceentest2)) ? $im->labantibodysceentest2 : '';
    $labantibodysceentestp1mi2 =   (!empty($im->labantibodysceentestp1mi2)) ? $im->labantibodysceentestp1mi2 : '';
    $labantibodysceentesto12 =   (!empty($im->labantibodysceentesto12)) ? $im->labantibodysceentesto12 : '';
    $labantibodysceentesto22 =   (!empty($im->labantibodysceentesto22)) ? $im->labantibodysceentesto22 : '';
    $labantibodysceentesto32 =   (!empty($im->labantibodysceentesto32)) ? $im->labantibodysceentesto32 : '';
    $labantibodysceentestlotno2 =   (!empty($im->labantibodysceentestlotno2)) ? $im->labantibodysceentestlotno2 : '';

    if (empty($labantibodysceentestid2)) {
        $running = getRunningYM('ABT');
        $labantibodysceentestid2 = $running['runn'];
        $labantibodysceentestcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodysceentest_2
            (
                labantibodysceentestid2,
                labantibodysceentestcode2,
                labantibodysceentest2,
                labantibodysceentestp1mi2,
                labantibodysceentesto12,
                labantibodysceentesto22,
                labantibodysceentesto32,
                labantibodysceentestlotno2,
                labcheckrequestid
            )
            value
            (
                '$labantibodysceentestid2',
                '$labantibodysceentestcode2',
                '$labantibodysceentest2',
                '$labantibodysceentestp1mi2',
                '$labantibodysceentesto12',
                '$labantibodysceentesto22',
                '$labantibodysceentesto32',
                '$labantibodysceentestlotno2',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentest_2 SET
            labantibodysceentest2='$labantibodysceentest2',
            labantibodysceentestp1mi2='$labantibodysceentestp1mi2',
            labantibodysceentesto12='$labantibodysceentesto12',
            labantibodysceentesto22='$labantibodysceentesto22',
            labantibodysceentesto32='$labantibodysceentesto32',
            labantibodysceentestlotno2='$labantibodysceentestlotno2',
            active='1'
            WHERE labantibodysceentestid2 = '$labantibodysceentestid2'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Antibody Sceening test

// Start Tab 2 Antibody identification Test
$lab_antibodyidentificationtest_2_item = json_decode($_POST['lab_antibodyidentificationtest_2_item']);

$sql = "UPDATE lab_antibodyidentificationtest_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtest_2_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestid2 =   (!empty($im->labantibodyidentificationtestid2)) ? $im->labantibodyidentificationtestid2 : '';
    $labantibodyidentificationtestcode2 =   (!empty($im->labantibodyidentificationtestcode2)) ? $im->labantibodyidentificationtestcode2 : '';
    $labantibodyidentificationtest2 =   (!empty($im->labantibodyidentificationtest2)) ? $im->labantibodyidentificationtest2 : '';
    $labantibodyidentificationtest12 =   (!empty($im->labantibodyidentificationtest12)) ? $im->labantibodyidentificationtest12 : '';
    $labantibodyidentificationtest22 =   (!empty($im->labantibodyidentificationtest22)) ? $im->labantibodyidentificationtest22 : '';
    $labantibodyidentificationtest32 =   (!empty($im->labantibodyidentificationtest32)) ? $im->labantibodyidentificationtest32 : '';
    $labantibodyidentificationtest42 =   (!empty($im->labantibodyidentificationtest42)) ? $im->labantibodyidentificationtest42 : '';
    $labantibodyidentificationtest52 =   (!empty($im->labantibodyidentificationtest52)) ? $im->labantibodyidentificationtest52 : '';
    $labantibodyidentificationtest62 =   (!empty($im->labantibodyidentificationtest62)) ? $im->labantibodyidentificationtest62 : '';
    $labantibodyidentificationtest72 =   (!empty($im->labantibodyidentificationtest72)) ? $im->labantibodyidentificationtest72 : '';
    $labantibodyidentificationtest82 =   (!empty($im->labantibodyidentificationtest82)) ? $im->labantibodyidentificationtest82 : '';
    $labantibodyidentificationtest92 =   (!empty($im->labantibodyidentificationtest92)) ? $im->labantibodyidentificationtest92 : '';
    $labantibodyidentificationtest102 =   (!empty($im->labantibodyidentificationtest102)) ? $im->labantibodyidentificationtest102 : '';
    $labantibodyidentificationtest112 =   (!empty($im->labantibodyidentificationtest112)) ? $im->labantibodyidentificationtest112 : '';
    $labantibodyidentificationtestauto2 =   (!empty($im->labantibodyidentificationtestauto2)) ? $im->labantibodyidentificationtestauto2 : '';
    $labantibodyidentificationtestlotno2 =   (!empty($im->labantibodyidentificationtestlotno2)) ? $im->labantibodyidentificationtestlotno2 : '';

    if (empty($labantibodyidentificationtestid2)) {
        $running = getRunningYM('ABID');
        $labantibodyidentificationtestid2 = $running['runn'];
        $labantibodyidentificationtestcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodyidentificationtest_2
            (
                labantibodyidentificationtestid2,
                labantibodyidentificationtestcode2,
                labantibodyidentificationtest2,
                labantibodyidentificationtest12,
                labantibodyidentificationtest22,
                labantibodyidentificationtest32,
                labantibodyidentificationtest42,
                labantibodyidentificationtest52,
                labantibodyidentificationtest62,
                labantibodyidentificationtest72,
                labantibodyidentificationtest82,
                labantibodyidentificationtest92,
                labantibodyidentificationtest102,
                labantibodyidentificationtest112,
                labantibodyidentificationtestauto2,
                labantibodyidentificationtestlotno2,
                labcheckrequestid
            )
            value
            (
                '$labantibodyidentificationtestid2',
                '$labantibodyidentificationtestcode2',
                '$labantibodyidentificationtest2',
                '$labantibodyidentificationtest12',
                '$labantibodyidentificationtest22',
                '$labantibodyidentificationtest32',
                '$labantibodyidentificationtest42',
                '$labantibodyidentificationtest52',
                '$labantibodyidentificationtest62',
                '$labantibodyidentificationtest72',
                '$labantibodyidentificationtest82',
                '$labantibodyidentificationtest92',
                '$labantibodyidentificationtest102',
                '$labantibodyidentificationtest112',
                '$labantibodyidentificationtestauto2',
                '$labantibodyidentificationtestlotno2',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtest_2 SET
                labantibodyidentificationtest2='$labantibodyidentificationtest2',
                labantibodyidentificationtest12='$labantibodyidentificationtest12',
                labantibodyidentificationtest22='$labantibodyidentificationtest22',
                labantibodyidentificationtest32='$labantibodyidentificationtest32',
                labantibodyidentificationtest42='$labantibodyidentificationtest42',
                labantibodyidentificationtest52='$labantibodyidentificationtest52',
                labantibodyidentificationtest62='$labantibodyidentificationtest62',
                labantibodyidentificationtest72='$labantibodyidentificationtest72',
                labantibodyidentificationtest82='$labantibodyidentificationtest82',
                labantibodyidentificationtest92='$labantibodyidentificationtest92',
                labantibodyidentificationtest102='$labantibodyidentificationtest102',
                labantibodyidentificationtest112='$labantibodyidentificationtest112',
                labantibodyidentificationtestauto2='$labantibodyidentificationtestauto2',
                labantibodyidentificationtestlotno2='$labantibodyidentificationtestlotno2',
                active='1'
            WHERE labantibodyidentificationtestid2 = '$labantibodyidentificationtestid2'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Antibody identification Test

// Start Tab 2 Saliva
$lab_salivatest_2_item = json_decode($_POST['lab_salivatest_2_item']);

$sql = "UPDATE lab_salivatest_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_salivatest_2_item as $item) {

    $im = json_decode($item);
    $labsalivatestid2 =   (!empty($im->labsalivatestid2)) ? $im->labsalivatestid2 : '';
    $labsalivatestcode2 =   (!empty($im->labsalivatestcode2)) ? $im->labsalivatestcode2 : '';
    $labsalivatest2 =   (!empty($im->labsalivatest2)) ? $im->labsalivatest2 : '';
    $labsalivatestacells2 =   (!empty($im->labsalivatestacells2)) ? $im->labsalivatestacells2 : '';
    $labsalivatestbcells2 =   (!empty($im->labsalivatestbcells2)) ? $im->labsalivatestbcells2 : '';
    $labsalivatesotcells2 =   (!empty($im->labsalivatesotcells2)) ? $im->labsalivatesotcells2 : '';

    if (empty($labsalivatestid2)) {
        $running = getRunningYM('SLT0');
        $labsalivatestid2 = $running['runn'];
        $labsalivatestcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_salivatest_2
            (
                labsalivatestid2,
                labsalivatestcode2,
                labsalivatest2,
                labsalivatestacells2,
                labsalivatestbcells2,
                labsalivatesotcells2,
                labcheckrequestid
            )
            value
            (
                '$labsalivatestid2',
                '$labsalivatestcode2',
                '$labsalivatest2',
                '$labsalivatestacells2',
                '$labsalivatestbcells2',
                '$labsalivatesotcells2',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_salivatest_2 SET
            labsalivatest2='$labsalivatest2',
            labsalivatestacells2='$labsalivatestacells2',
            labsalivatestbcells2='$labsalivatestbcells2',
            labsalivatesotcells2='$labsalivatesotcells2',
            active='1'
            WHERE labsalivatestid2 = '$labsalivatestid2'
            
        ";


        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Saliva

// Start Tab 2 Titration
$lab_titration_2_item = json_decode($_POST['lab_titration_2_item']);

$sql = "UPDATE lab_titration_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_titration_2_item as $item) {

    $im = json_decode($item);
    $labtitrationid2 =   (!empty($im->labtitrationid2)) ? $im->labtitrationid2 : '';
    $labtitrationcode2 =   (!empty($im->labtitrationcode2)) ? $im->labtitrationcode2 : '';
    $labtitrationantiserum2 =   (!empty($im->labtitrationantiserum2)) ? $im->labtitrationantiserum2 : '';
    $labtitrationcell2 =   (!empty($im->labtitrationcell2)) ? $im->labtitrationcell2 : '';
    $labtitration12 =   (!empty($im->labtitration12)) ? $im->labtitration12 : '';
    $labtitration22 =   (!empty($im->labtitration22)) ? $im->labtitration22 : '';
    $labtitration42 =   (!empty($im->labtitration42)) ? $im->labtitration42 : '';
    $labtitration82 =   (!empty($im->labtitration82)) ? $im->labtitration82 : '';
    $labtitration162 =   (!empty($im->labtitration162)) ? $im->labtitration162 : '';
    $labtitration322 =   (!empty($im->labtitration322)) ? $im->labtitration322 : '';
    $labtitration642 =   (!empty($im->labtitration642)) ? $im->labtitration642 : '';
    $labtitration1282 =   (!empty($im->labtitration1282)) ? $im->labtitration1282 : '';
    $labtitration2562 =   (!empty($im->labtitration2562)) ? $im->labtitration2562 : '';
    $labtitration5122 =   (!empty($im->labtitration5122)) ? $im->labtitration5122 : '';
    $labtitration10242 =   (!empty($im->labtitration10242)) ? $im->labtitration10242 : '';
    $labtitration20482 =   (!empty($im->labtitration20482)) ? $im->labtitration20482 : '';
    $labtitrationtiter2 =   (!empty($im->labtitrationtiter2)) ? $im->labtitrationtiter2 : '';

    if (empty($labtitrationid2)) {
        $running = getRunningYM('TTT0');
        $labtitrationid2 = $running['runn'];
        $labtitrationcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_titration_2
            (
                labtitrationid2,
                labtitrationcode2,
                labtitrationantiserum2,
                labtitrationcell2,
                labtitration12,
                labtitration22,
                labtitration42,
                labtitration82,
                labtitration162,
                labtitration322,
                labtitration642,
                labtitration1282,
                labtitration2562,
                labtitration5122,
                labtitration10242,
                labtitration20482,
                labtitrationtiter2,
                labcheckrequestid
            )
            value
            (
                '$labtitrationid2',
                '$labtitrationcode2',
                '$labtitrationantiserum2',
                '$labtitrationcell2',
                '$labtitration12',
                '$labtitration22',
                '$labtitration42',
                '$labtitration82',
                '$labtitration162',
                '$labtitration322',
                '$labtitration642',
                '$labtitration1282',
                '$labtitration2562',
                '$labtitration5122',
                '$labtitration10242',
                '$labtitration20482',
                '$labtitrationtiter2',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_titration_2 SET
                labtitrationantiserum2='$labtitrationantiserum2',
                labtitrationcell2='$labtitrationcell2',
                labtitration12='$labtitration12',
                labtitration22='$labtitration22',
                labtitration42='$labtitration42',
                labtitration82='$labtitration82',
                labtitration162='$labtitration162',
                labtitration322='$labtitration322',
                labtitration642='$labtitration642',
                labtitration1282='$labtitration1282',
                labtitration2562='$labtitration2562',
                labtitration5122='$labtitration5122',
                labtitration10242='$labtitration10242',
                labtitration20482='$labtitration20482',
                labtitrationtiter2='$labtitrationtiter2',
                active='1'
            WHERE labtitrationid2 = '$labtitrationid2'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Titration

// Start Tab 2 Cold Agglutinin
$lab_coldagglutinin_2_item = json_decode($_POST['lab_coldagglutinin_2_item']);

$sql = "UPDATE lab_coldagglutinin_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_coldagglutinin_2_item as $item) {

    $im = json_decode($item);
    $labcoldagglutininid2 =   (!empty($im->labcoldagglutininid2)) ? $im->labcoldagglutininid2 : '';
    $labcoldagglutinincode2 =   (!empty($im->labcoldagglutinincode2)) ? $im->labcoldagglutinincode2 : '';
    $labcoldagglutinino2 =   (!empty($im->labcoldagglutinino2)) ? $im->labcoldagglutinino2 : '';
    $labcoldagglutinintime2 =   (!empty($im->labcoldagglutinintime2)) ? $im->labcoldagglutinintime2 : '';
    $labcoldagglutinin12 =   (!empty($im->labcoldagglutinin12)) ? $im->labcoldagglutinin12 : '';
    $labcoldagglutinin22 =   (!empty($im->labcoldagglutinin22)) ? $im->labcoldagglutinin22 : '';
    $labcoldagglutinin42 =   (!empty($im->labcoldagglutinin42)) ? $im->labcoldagglutinin42 : '';
    $labcoldagglutinin82 =   (!empty($im->labcoldagglutinin82)) ? $im->labcoldagglutinin82 : '';
    $labcoldagglutinin162 =   (!empty($im->labcoldagglutinin162)) ? $im->labcoldagglutinin162 : '';
    $labcoldagglutinin322 =   (!empty($im->labcoldagglutinin322)) ? $im->labcoldagglutinin322 : '';
    $labcoldagglutinin642 =   (!empty($im->labcoldagglutinin642)) ? $im->labcoldagglutinin642 : '';
    $labcoldagglutinin1282 =   (!empty($im->labcoldagglutinin1282)) ? $im->labcoldagglutinin1282 : '';
    $labcoldagglutinin2562 =   (!empty($im->labcoldagglutinin2562)) ? $im->labcoldagglutinin2562 : '';
    $labcoldagglutinin5122 =   (!empty($im->labcoldagglutinin5122)) ? $im->labcoldagglutinin5122 : '';
    $labcoldagglutinin10242 =   (!empty($im->labcoldagglutinin10242)) ? $im->labcoldagglutinin10242 : '';
    $labcoldagglutinin20482 =   (!empty($im->labcoldagglutinin20482)) ? $im->labcoldagglutinin20482 : '';

    if (empty($labcoldagglutininid2)) {
        $running = getRunningYM('CAGG0');
        $labcoldagglutininid2 = $running['runn'];
        $labcoldagglutinincode2 = $running['code'];
        $sql = "
            INSERT INTO lab_coldagglutinin_2
            (
                labcoldagglutininid2,
                labcoldagglutinincode2,
                labcoldagglutinino2,
                labcoldagglutinintime2,
                labcoldagglutinin12,
                labcoldagglutinin22,
                labcoldagglutinin42,
                labcoldagglutinin82,
                labcoldagglutinin162,
                labcoldagglutinin322,
                labcoldagglutinin642,
                labcoldagglutinin1282,
                labcoldagglutinin2562,
                labcoldagglutinin5122,
                labcoldagglutinin10242,
                labcoldagglutinin20482,
                labcheckrequestid
            )
            value
            (
                '$labcoldagglutininid2',
                '$labcoldagglutinincode2',
                '$labcoldagglutinino2',
                '$labcoldagglutinintime2',
                '$labcoldagglutinin12',
                '$labcoldagglutinin22',
                '$labcoldagglutinin42',
                '$labcoldagglutinin82',
                '$labcoldagglutinin162',
                '$labcoldagglutinin322',
                '$labcoldagglutinin642',
                '$labcoldagglutinin1282',
                '$labcoldagglutinin2562',
                '$labcoldagglutinin5122',
                '$labcoldagglutinin10242',
                '$labcoldagglutinin20482',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_coldagglutinin_2 SET
                labcoldagglutinino2='$labcoldagglutinino2',
                labcoldagglutinintime2='$labcoldagglutinintime2',
                labcoldagglutinin12='$labcoldagglutinin12',
                labcoldagglutinin22='$labcoldagglutinin22',
                labcoldagglutinin42='$labcoldagglutinin42',
                labcoldagglutinin82='$labcoldagglutinin82',
                labcoldagglutinin162='$labcoldagglutinin162',
                labcoldagglutinin322='$labcoldagglutinin322',
                labcoldagglutinin642='$labcoldagglutinin642',
                labcoldagglutinin1282='$labcoldagglutinin1282',
                labcoldagglutinin2562='$labcoldagglutinin2562',
                labcoldagglutinin5122='$labcoldagglutinin5122',
                labcoldagglutinin10242='$labcoldagglutinin10242',
                labcoldagglutinin20482='$labcoldagglutinin20482',
                active='1'
            WHERE labcoldagglutininid2 = '$labcoldagglutininid2'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Cold Agglutinin


// Start Tab 2 Antibody identification Test
$lab_antibodyidentificationtestgetmethod_2_item = json_decode($_POST['lab_antibodyidentificationtestgetmethod_2_item']);

$sql = "UPDATE lab_antibodyidentificationtestgetmethod_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtestgetmethod_2_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestgetmethodid2 =   (!empty($im->labantibodyidentificationtestgetmethodid2)) ? $im->labantibodyidentificationtestgetmethodid2 : '';
    $labantibodyidentificationtestgetmethodcode2 =   (!empty($im->labantibodyidentificationtestgetmethodcode2)) ? $im->labantibodyidentificationtestgetmethodcode2 : '';
    $labantibodyidentificationtestgetmethod2 =   (!empty($im->labantibodyidentificationtestgetmethod2)) ? $im->labantibodyidentificationtestgetmethod2 : '';
    $labantibodyidentificationtestgetmethod12 =   (!empty($im->labantibodyidentificationtestgetmethod12)) ? $im->labantibodyidentificationtestgetmethod12 : '';
    $labantibodyidentificationtestgetmethod22 =   (!empty($im->labantibodyidentificationtestgetmethod22)) ? $im->labantibodyidentificationtestgetmethod22 : '';
    $labantibodyidentificationtestgetmethod32 =   (!empty($im->labantibodyidentificationtestgetmethod32)) ? $im->labantibodyidentificationtestgetmethod32 : '';
    $labantibodyidentificationtestgetmethod42 =   (!empty($im->labantibodyidentificationtestgetmethod42)) ? $im->labantibodyidentificationtestgetmethod42 : '';
    $labantibodyidentificationtestgetmethod52 =   (!empty($im->labantibodyidentificationtestgetmethod52)) ? $im->labantibodyidentificationtestgetmethod52 : '';
    $labantibodyidentificationtestgetmethod62 =   (!empty($im->labantibodyidentificationtestgetmethod62)) ? $im->labantibodyidentificationtestgetmethod62 : '';
    $labantibodyidentificationtestgetmethod72 =   (!empty($im->labantibodyidentificationtestgetmethod72)) ? $im->labantibodyidentificationtestgetmethod72 : '';
    $labantibodyidentificationtestgetmethod82 =   (!empty($im->labantibodyidentificationtestgetmethod82)) ? $im->labantibodyidentificationtestgetmethod82 : '';
    $labantibodyidentificationtestgetmethod92 =   (!empty($im->labantibodyidentificationtestgetmethod92)) ? $im->labantibodyidentificationtestgetmethod92 : '';
    $labantibodyidentificationtestgetmethod102 =   (!empty($im->labantibodyidentificationtestgetmethod102)) ? $im->labantibodyidentificationtestgetmethod102 : '';
    $labantibodyidentificationtestgetmethod112 =   (!empty($im->labantibodyidentificationtestgetmethod112)) ? $im->labantibodyidentificationtestgetmethod112 : '';
    $labantibodyidentificationtestgetmethodauto2 =   (!empty($im->labantibodyidentificationtestgetmethodauto2)) ? $im->labantibodyidentificationtestgetmethodauto2 : '';
    $labantibodyidentificationtestgetmethodantibody2 =   (!empty($im->labantibodyidentificationtestgetmethodantibody2)) ? $im->labantibodyidentificationtestgetmethodantibody2 : '';
    $labantibodyidentificationtestgetmethodlotno2 =   (!empty($im->labantibodyidentificationtestgetmethodlotno2)) ? $im->labantibodyidentificationtestgetmethodlotno2 : '';


    if (empty($labantibodyidentificationtestgetmethodid2)) {
        $running = getRunningYM('ABIDG0');
        $labantibodyidentificationtestgetmethodid2 = $running['runn'];
        $labantibodyidentificationtestgetmethodcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodyidentificationtestgetmethod_2
            (
                labantibodyidentificationtestgetmethodid2,
                labantibodyidentificationtestgetmethodcode2,
                labantibodyidentificationtestgetmethod2,
                labantibodyidentificationtestgetmethod12,
                labantibodyidentificationtestgetmethod22,
                labantibodyidentificationtestgetmethod32,
                labantibodyidentificationtestgetmethod42,
                labantibodyidentificationtestgetmethod52,
                labantibodyidentificationtestgetmethod62,
                labantibodyidentificationtestgetmethod72,
                labantibodyidentificationtestgetmethod82,
                labantibodyidentificationtestgetmethod92,
                labantibodyidentificationtestgetmethod102,
                labantibodyidentificationtestgetmethod112,
                labantibodyidentificationtestgetmethodauto2,
                labantibodyidentificationtestgetmethodantibody2,
                labantibodyidentificationtestgetmethodlotno2,
                labcheckrequestid
            )
            value
            (
                '$labantibodyidentificationtestgetmethodid2',
                '$labantibodyidentificationtestgetmethodcode2',
                '$labantibodyidentificationtestgetmethod2',
                '$labantibodyidentificationtestgetmethod12',
                '$labantibodyidentificationtestgetmethod22',
                '$labantibodyidentificationtestgetmethod32',
                '$labantibodyidentificationtestgetmethod42',
                '$labantibodyidentificationtestgetmethod52',
                '$labantibodyidentificationtestgetmethod62',
                '$labantibodyidentificationtestgetmethod72',
                '$labantibodyidentificationtestgetmethod82',
                '$labantibodyidentificationtestgetmethod92',
                '$labantibodyidentificationtestgetmethod102',
                '$labantibodyidentificationtestgetmethod112',
                '$labantibodyidentificationtestgetmethodauto2',
                '$labantibodyidentificationtestgetmethodantibody2',
                '$labantibodyidentificationtestgetmethodlotno2',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtestgetmethod_2 SET
                labantibodyidentificationtestgetmethod2='$labantibodyidentificationtestgetmethod2',
                labantibodyidentificationtestgetmethod12='$labantibodyidentificationtestgetmethod12',
                labantibodyidentificationtestgetmethod22='$labantibodyidentificationtestgetmethod22',
                labantibodyidentificationtestgetmethod32='$labantibodyidentificationtestgetmethod32',
                labantibodyidentificationtestgetmethod42='$labantibodyidentificationtestgetmethod42',
                labantibodyidentificationtestgetmethod52='$labantibodyidentificationtestgetmethod52',
                labantibodyidentificationtestgetmethod62='$labantibodyidentificationtestgetmethod62',
                labantibodyidentificationtestgetmethod72='$labantibodyidentificationtestgetmethod72',
                labantibodyidentificationtestgetmethod82='$labantibodyidentificationtestgetmethod82',
                labantibodyidentificationtestgetmethod92='$labantibodyidentificationtestgetmethod92',
                labantibodyidentificationtestgetmethod102='$labantibodyidentificationtestgetmethod102',
                labantibodyidentificationtestgetmethod112='$labantibodyidentificationtestgetmethod112',
                labantibodyidentificationtestgetmethodauto2='$labantibodyidentificationtestgetmethodauto2',
                labantibodyidentificationtestgetmethodantibody2='$labantibodyidentificationtestgetmethodantibody2',
                labantibodyidentificationtestgetmethodlotno2='$labantibodyidentificationtestgetmethodlotno2',
                active='1'
            WHERE labantibodyidentificationtestgetmethodid2 = '$labantibodyidentificationtestgetmethodid2'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Antibody identification Test


// Start Tab 2 Antibody Sceening test Get Method
$lab_antibodysceentestgetmethod_2_item = json_decode($_POST['lab_antibodysceentestgetmethod_2_item']);

$sql = "UPDATE lab_antibodysceentestgetmethod_2 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentestgetmethod_2_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestgetmethodid2 =   (!empty($im->labantibodysceentestgetmethodid2)) ? $im->labantibodysceentestgetmethodid2 : '';
    $labantibodysceentestgetmethodcode2 =   (!empty($im->labantibodysceentestgetmethodcode2)) ? $im->labantibodysceentestgetmethodcode2 : '';
    $labantibodysceentestgetmethodp1mi2 =   (!empty($im->labantibodysceentestgetmethodp1mi2)) ? $im->labantibodysceentestgetmethodp1mi2 : '';
    $labantibodysceentestgetmethodtest2 =   (!empty($im->labantibodysceentestgetmethodtest2)) ? $im->labantibodysceentestgetmethodtest2 : '';
    $labantibodysceentestgetmethodo12 =   (!empty($im->labantibodysceentestgetmethodo12)) ? $im->labantibodysceentestgetmethodo12 : '';
    $labantibodysceentestgetmethodo22 =   (!empty($im->labantibodysceentestgetmethodo22)) ? $im->labantibodysceentestgetmethodo22 : '';
    $labantibodysceentestgetmethodo32 =   (!empty($im->labantibodysceentestgetmethodo32)) ? $im->labantibodysceentestgetmethodo32 : '';
    $labantibodysceentestgetmethodenz2 =   (!empty($im->labantibodysceentestgetmethodenz2)) ? $im->labantibodysceentestgetmethodenz2 : '';
    $labantibodysceentestgetmethodlotno2 =   (!empty($im->labantibodysceentestgetmethodlotno2)) ? $im->labantibodysceentestgetmethodlotno2 : '';

    if (empty($labantibodysceentestgetmethodid2)) {
        $running = getRunningYM('ABTGM0');
        $labantibodysceentestgetmethodid2 = $running['runn'];
        $labantibodysceentestgetmethodcode2 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodysceentestgetmethod_2
            (
                labantibodysceentestgetmethodid2,
                labantibodysceentestgetmethodcode2,
                labantibodysceentestgetmethodtest2,
                labantibodysceentestgetmethodp1mi2,
                labantibodysceentestgetmethodo12,
                labantibodysceentestgetmethodo22,
                labantibodysceentestgetmethodo32,
                labantibodysceentestgetmethodenz2,
                labantibodysceentestgetmethodlotno2,
                labcheckrequestid
            )
            value
            (
                '$labantibodysceentestgetmethodid2',
                '$labantibodysceentestgetmethodcode2',
                '$labantibodysceentestgetmethodtest2',
                '$labantibodysceentestgetmethodp1mi2',
                '$labantibodysceentestgetmethodo12',
                '$labantibodysceentestgetmethodo22',
                '$labantibodysceentestgetmethodo32',
                '$labantibodysceentestgetmethodenz2',
                '$labantibodysceentestgetmethodlotno2',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentestgetmethod_2 SET
            labantibodysceentestgetmethodtest2='$labantibodysceentestgetmethodtest2',
            labantibodysceentestgetmethodp1mi2='$labantibodysceentestgetmethodp1mi2',
            labantibodysceentestgetmethodo12='$labantibodysceentestgetmethodo12',
            labantibodysceentestgetmethodo22='$labantibodysceentestgetmethodo22',
            labantibodysceentestgetmethodo32='$labantibodysceentestgetmethodo32',
            labantibodysceentestgetmethodenz2='$labantibodysceentestgetmethodenz2',
            labantibodysceentestgetmethodlotno2='$labantibodysceentestgetmethodlotno2',
            active='1'
            WHERE labantibodysceentestgetmethodid2 = '$labantibodysceentestgetmethodid2'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 2 Antibody Sceening test Get Method



// Tab 3===========================================

// Start Tab 3 ABO
$lab_abo_3_item = json_decode($_POST['lab_abo_3_item']);

$sql = "UPDATE lab_abo_3 SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_abo_3_item as $item) {

    $im = json_decode($item);
    $labreagent3 = (!empty($im->labreagent3)) ? $im->labreagent3 : '';
    $lababoid3 =   (!empty($im->lababoid3)) ? $im->lababoid3 : '';
    $lababocode3 =   (!empty($im->lababocode3)) ? $im->lababocode3 : '';
    $lababoantia3 =   (!empty($im->lababoantia3)) ? $im->lababoantia3 : '';
    $lababoantib3 =   (!empty($im->lababoantib3)) ? $im->lababoantib3 : '';
    $lababoantiab3 =   (!empty($im->lababoantiab3)) ? $im->lababoantiab3 : '';
    $lababoacells3 =   (!empty($im->lababoacells3)) ? $im->lababoacells3 : '';
    $lababobcells3 =   (!empty($im->lababobcells3)) ? $im->lababobcells3 : '';
    $lababoocells3 =   (!empty($im->lababoocells3)) ? $im->lababoocells3 : '';
    $lababobloodgroup3 =   (!empty($im->lababobloodgroup3)) ? $im->lababobloodgroup3 : '';

    if (empty($lababoid3)) {
        $running = getRunningYM('TABO0');
        $lababoid3 = $running['runn'];
        $lababocode3 = $running['code'];
        $sql = "
                INSERT INTO lab_abo_3
                (
                    labreagent3,
                    lababoid3,
                    lababocode3,
                    lababoantia3,
                    lababoantib3,
                    lababoantiab3,
                    lababoacells3,
                    lababobcells3,
                    lababoocells3,
                    lababobloodgroup3,
                    labcheckrequestid
                )
                value
                (
                    '$labreagent3',
                    '$lababoid3',
                    '$lababocode3',
                    '$lababoantia3',
                    '$lababoantib3',
                    '$lababoantiab3',
                    '$lababoacells3',
                    '$lababobcells3',
                    '$lababoocells3',
                    '$lababobloodgroup3',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_abo_3 SET
                labreagent3='$labreagent3',
                lababoantia3='$lababoantia3',
                lababoantib3='$lababoantib3',
                lababoantiab3='$lababoantiab3',
                lababoacells3='$lababoacells3',
                lababobcells3='$lababobcells3',
                lababoocells3='$lababoocells3',
                lababobloodgroup3='$lababobloodgroup3',
                active='1'
                WHERE lababoid3 = '$lababoid3'
                
            ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 ABO

// Start Tab 3 Rh
$lab_rh_3_item = json_decode($_POST['lab_rh_3_item']);

$sql = "UPDATE lab_rh_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_rh_3_item as $item) {

    $im = json_decode($item);
    $labrhid3 =   (!empty($im->labrhid3)) ? $im->labrhid3 : '';
    $labrhcode3 =   (!empty($im->labrhcode3)) ? $im->labrhcode3 : '';
    $labrhreagent3 =   (!empty($im->labrhreagent3)) ? $im->labrhreagent3 : '';
    $labrhrt3 =   (!empty($im->labrhrt3)) ? $im->labrhrt3 : '';
    $lab37c3 =   (!empty($im->lab37c3)) ? $im->lab37c3 : '';
    $labiat3 =   (!empty($im->labiat3)) ? $im->labiat3 : '';
    $labccc3 =   (!empty($im->labccc3)) ? $im->labccc3 : '';
    $labresult3 =   (!empty($im->labresult3)) ? $im->labresult3 : '';

    if (empty($labrhid3)) {
        $running = getRunningYM('TRH0');
        $labrhid3 = $running['runn'];
        $labrhcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_rh_3
            (
                labrhid3,
                labrhcode3,
                labrhreagent3,
                labrhrt3,
                lab37c3,
                labiat3,
                labccc3,
                labresult3,
                labcheckrequestid
            )
            value
            (
                '$labrhid3',
                '$labrhcode3',
                '$labrhreagent3',
                '$labrhrt3',
                '$lab37c3',
                '$labiat3',
                '$labccc3',
                '$labresult3',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_rh_3 SET
            labrhreagent3='$labrhreagent3',
            labrhrt3='$labrhrt3',
            lab37c3='$lab37c3',
            labiat3='$labiat3',
            labccc3='$labccc3',
            labresult3='$labresult3',
            active='1'
            WHERE labrhid3 = '$labrhid3'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Rh


// Start Tab 3 Antibody Sceening test
$lab_antibodysceentest_3_item = json_decode($_POST['lab_antibodysceentest_3_item']);

$sql = "UPDATE lab_antibodysceentest_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentest_3_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestid3 =   (!empty($im->labantibodysceentestid3)) ? $im->labantibodysceentestid3 : '';
    $labantibodysceentestcode3 =   (!empty($im->labantibodysceentestcode3)) ? $im->labantibodysceentestcode3 : '';
    $labantibodysceentest3 =   (!empty($im->labantibodysceentest3)) ? $im->labantibodysceentest3 : '';
    $labantibodysceentestp1mi3 =   (!empty($im->labantibodysceentestp1mi3)) ? $im->labantibodysceentestp1mi3 : '';
    $labantibodysceentesto13 =   (!empty($im->labantibodysceentesto13)) ? $im->labantibodysceentesto13 : '';
    $labantibodysceentesto23 =   (!empty($im->labantibodysceentesto23)) ? $im->labantibodysceentesto23 : '';
    $labantibodysceentesto33 =   (!empty($im->labantibodysceentesto33)) ? $im->labantibodysceentesto33 : '';
    $labantibodysceentestlotno3 =   (!empty($im->labantibodysceentestlotno3)) ? $im->labantibodysceentestlotno3 : '';

    if (empty($labantibodysceentestid3)) {
        $running = getRunningYM('ABT');
        $labantibodysceentestid3 = $running['runn'];
        $labantibodysceentestcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodysceentest_3
            (
                labantibodysceentestid3,
                labantibodysceentestcode3,
                labantibodysceentest3,
                labantibodysceentestp1mi3,
                labantibodysceentesto13,
                labantibodysceentesto23,
                labantibodysceentesto33,
                labantibodysceentestlotno3,
                labcheckrequestid
            )
            value
            (
                '$labantibodysceentestid3',
                '$labantibodysceentestcode3',
                '$labantibodysceentest3',
                '$labantibodysceentestp1mi3',
                '$labantibodysceentesto13',
                '$labantibodysceentesto23',
                '$labantibodysceentesto33',
                '$labantibodysceentestlotno3',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentest_3 SET
            labantibodysceentest3='$labantibodysceentest3',
            labantibodysceentestp1mi3='$labantibodysceentestp1mi3',
            labantibodysceentesto13='$labantibodysceentesto13',
            labantibodysceentesto23='$labantibodysceentesto23',
            labantibodysceentesto33='$labantibodysceentesto33',
            labantibodysceentestlotno3='$labantibodysceentestlotno3',
            active='1'
            WHERE labantibodysceentestid3 = '$labantibodysceentestid3'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Antibody Sceening test

// Start Tab 3 Antibody identification Test
$lab_antibodyidentificationtest_3_item = json_decode($_POST['lab_antibodyidentificationtest_3_item']);

$sql = "UPDATE lab_antibodyidentificationtest_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtest_3_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestid3 =   (!empty($im->labantibodyidentificationtestid3)) ? $im->labantibodyidentificationtestid3 : '';
    $labantibodyidentificationtestcode3 =   (!empty($im->labantibodyidentificationtestcode3)) ? $im->labantibodyidentificationtestcode3 : '';
    $labantibodyidentificationtest3 =   (!empty($im->labantibodyidentificationtest3)) ? $im->labantibodyidentificationtest3 : '';
    $labantibodyidentificationtest13 =   (!empty($im->labantibodyidentificationtest13)) ? $im->labantibodyidentificationtest13 : '';
    $labantibodyidentificationtest23 =   (!empty($im->labantibodyidentificationtest23)) ? $im->labantibodyidentificationtest23 : '';
    $labantibodyidentificationtest33 =   (!empty($im->labantibodyidentificationtest33)) ? $im->labantibodyidentificationtest33 : '';
    $labantibodyidentificationtest43 =   (!empty($im->labantibodyidentificationtest43)) ? $im->labantibodyidentificationtest43 : '';
    $labantibodyidentificationtest53 =   (!empty($im->labantibodyidentificationtest53)) ? $im->labantibodyidentificationtest53 : '';
    $labantibodyidentificationtest63 =   (!empty($im->labantibodyidentificationtest63)) ? $im->labantibodyidentificationtest63 : '';
    $labantibodyidentificationtest73 =   (!empty($im->labantibodyidentificationtest73)) ? $im->labantibodyidentificationtest73 : '';
    $labantibodyidentificationtest83 =   (!empty($im->labantibodyidentificationtest83)) ? $im->labantibodyidentificationtest83 : '';
    $labantibodyidentificationtest93 =   (!empty($im->labantibodyidentificationtest93)) ? $im->labantibodyidentificationtest93 : '';
    $labantibodyidentificationtest103 =   (!empty($im->labantibodyidentificationtest103)) ? $im->labantibodyidentificationtest103 : '';
    $labantibodyidentificationtest113 =   (!empty($im->labantibodyidentificationtest113)) ? $im->labantibodyidentificationtest113 : '';
    $labantibodyidentificationtestauto3 =   (!empty($im->labantibodyidentificationtestauto3)) ? $im->labantibodyidentificationtestauto3 : '';
    $labantibodyidentificationtestlotno3 =   (!empty($im->labantibodyidentificationtestlotno3)) ? $im->labantibodyidentificationtestlotno3 : '';

    if (empty($labantibodyidentificationtestid3)) {
        $running = getRunningYM('ABID');
        $labantibodyidentificationtestid3 = $running['runn'];
        $labantibodyidentificationtestcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodyidentificationtest_3
            (
                labantibodyidentificationtestid3,
                labantibodyidentificationtestcode3,
                labantibodyidentificationtest3,
                labantibodyidentificationtest13,
                labantibodyidentificationtest23,
                labantibodyidentificationtest33,
                labantibodyidentificationtest43,
                labantibodyidentificationtest53,
                labantibodyidentificationtest63,
                labantibodyidentificationtest73,
                labantibodyidentificationtest83,
                labantibodyidentificationtest93,
                labantibodyidentificationtest103,
                labantibodyidentificationtest113,
                labantibodyidentificationtestauto3,
                labantibodyidentificationtestlotno3,
                labcheckrequestid
            )
            value
            (
                '$labantibodyidentificationtestid3',
                '$labantibodyidentificationtestcode3',
                '$labantibodyidentificationtest3',
                '$labantibodyidentificationtest13',
                '$labantibodyidentificationtest23',
                '$labantibodyidentificationtest33',
                '$labantibodyidentificationtest43',
                '$labantibodyidentificationtest53',
                '$labantibodyidentificationtest63',
                '$labantibodyidentificationtest73',
                '$labantibodyidentificationtest83',
                '$labantibodyidentificationtest93',
                '$labantibodyidentificationtest103',
                '$labantibodyidentificationtest113',
                '$labantibodyidentificationtestauto3',
                '$labantibodyidentificationtestlotno3',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtest_3 SET
                labantibodyidentificationtest3='$labantibodyidentificationtest3',
                labantibodyidentificationtest13='$labantibodyidentificationtest13',
                labantibodyidentificationtest23='$labantibodyidentificationtest23',
                labantibodyidentificationtest33='$labantibodyidentificationtest33',
                labantibodyidentificationtest43='$labantibodyidentificationtest43',
                labantibodyidentificationtest53='$labantibodyidentificationtest53',
                labantibodyidentificationtest63='$labantibodyidentificationtest63',
                labantibodyidentificationtest73='$labantibodyidentificationtest73',
                labantibodyidentificationtest83='$labantibodyidentificationtest83',
                labantibodyidentificationtest93='$labantibodyidentificationtest93',
                labantibodyidentificationtest103='$labantibodyidentificationtest103',
                labantibodyidentificationtest113='$labantibodyidentificationtest113',
                labantibodyidentificationtestauto3='$labantibodyidentificationtestauto3',
                labantibodyidentificationtestlotno3='$labantibodyidentificationtestlotno3',
                active='1'
            WHERE labantibodyidentificationtestid3 = '$labantibodyidentificationtestid3'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Antibody identification Test

// Start Tab 3 Saliva
$lab_salivatest_3_item = json_decode($_POST['lab_salivatest_3_item']);

$sql = "UPDATE lab_salivatest_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_salivatest_3_item as $item) {

    $im = json_decode($item);
    $labsalivatestid3 =   (!empty($im->labsalivatestid3)) ? $im->labsalivatestid3 : '';
    $labsalivatestcode3 =   (!empty($im->labsalivatestcode3)) ? $im->labsalivatestcode3 : '';
    $labsalivatest3 =   (!empty($im->labsalivatest3)) ? $im->labsalivatest3 : '';
    $labsalivatestacells3 =   (!empty($im->labsalivatestacells3)) ? $im->labsalivatestacells3 : '';
    $labsalivatestbcells3 =   (!empty($im->labsalivatestbcells3)) ? $im->labsalivatestbcells3 : '';
    $labsalivatesotcells3 =   (!empty($im->labsalivatesotcells3)) ? $im->labsalivatesotcells3 : '';

    if (empty($labsalivatestid3)) {
        $running = getRunningYM('SLT0');
        $labsalivatestid3 = $running['runn'];
        $labsalivatestcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_salivatest_3
            (
                labsalivatestid3,
                labsalivatestcode3,
                labsalivatest3,
                labsalivatestacells3,
                labsalivatestbcells3,
                labsalivatesotcells3,
                labcheckrequestid
            )
            value
            (
                '$labsalivatestid3',
                '$labsalivatestcode3',
                '$labsalivatest3',
                '$labsalivatestacells3',
                '$labsalivatestbcells3',
                '$labsalivatesotcells3',
                '$labcheckrequestid'
            )
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_salivatest_3 SET
            labsalivatest3='$labsalivatest3',
            labsalivatestacells3='$labsalivatestacells3',
            labsalivatestbcells3='$labsalivatestbcells3',
            labsalivatesotcells3='$labsalivatesotcells3',
            active='1'
            WHERE labsalivatestid3 = '$labsalivatestid3'
            
        ";


        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Saliva

// Start Tab 3 Titration
$lab_titration_3_item = json_decode($_POST['lab_titration_3_item']);

$sql = "UPDATE lab_titration_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_titration_3_item as $item) {

    $im = json_decode($item);
    $labtitrationid3 =   (!empty($im->labtitrationid3)) ? $im->labtitrationid3 : '';
    $labtitrationcode3 =   (!empty($im->labtitrationcode3)) ? $im->labtitrationcode3 : '';
    $labtitrationantiserum3 =   (!empty($im->labtitrationantiserum3)) ? $im->labtitrationantiserum3 : '';
    $labtitrationcell3 =   (!empty($im->labtitrationcell3)) ? $im->labtitrationcell3 : '';
    $labtitration13 =   (!empty($im->labtitration13)) ? $im->labtitration13 : '';
    $labtitration23 =   (!empty($im->labtitration23)) ? $im->labtitration23 : '';
    $labtitration43 =   (!empty($im->labtitration43)) ? $im->labtitration43 : '';
    $labtitration83 =   (!empty($im->labtitration83)) ? $im->labtitration83 : '';
    $labtitration163 =   (!empty($im->labtitration163)) ? $im->labtitration163 : '';
    $labtitration323 =   (!empty($im->labtitration323)) ? $im->labtitration323 : '';
    $labtitration643 =   (!empty($im->labtitration643)) ? $im->labtitration643 : '';
    $labtitration1283 =   (!empty($im->labtitration1283)) ? $im->labtitration1283 : '';
    $labtitration2563 =   (!empty($im->labtitration2563)) ? $im->labtitration2563 : '';
    $labtitration5123 =   (!empty($im->labtitration5123)) ? $im->labtitration5123 : '';
    $labtitration10243 =   (!empty($im->labtitration10243)) ? $im->labtitration10243 : '';
    $labtitration20483 =   (!empty($im->labtitration20483)) ? $im->labtitration20483 : '';
    $labtitrationtiter3 =   (!empty($im->labtitrationtiter3)) ? $im->labtitrationtiter3 : '';

    if (empty($labtitrationid3)) {
        $running = getRunningYM('TTT0');
        $labtitrationid3 = $running['runn'];
        $labtitrationcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_titration_3
            (
                labtitrationid3,
                labtitrationcode3,
                labtitrationantiserum3,
                labtitrationcell3,
                labtitration13,
                labtitration23,
                labtitration43,
                labtitration83,
                labtitration163,
                labtitration323,
                labtitration643,
                labtitration1283,
                labtitration2563,
                labtitration5123,
                labtitration10243,
                labtitration20483,
                labtitrationtiter3,
                labcheckrequestid
            )
            value
            (
                '$labtitrationid3',
                '$labtitrationcode3',
                '$labtitrationantiserum3',
                '$labtitrationcell3',
                '$labtitration13',
                '$labtitration23',
                '$labtitration43',
                '$labtitration83',
                '$labtitration163',
                '$labtitration323',
                '$labtitration643',
                '$labtitration1283',
                '$labtitration2563',
                '$labtitration5123',
                '$labtitration10243',
                '$labtitration20483',
                '$labtitrationtiter3',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_titration_3 SET
                labtitrationantiserum3='$labtitrationantiserum3',
                labtitrationcell3='$labtitrationcell3',
                labtitration13='$labtitration13',
                labtitration23='$labtitration23',
                labtitration43='$labtitration43',
                labtitration83='$labtitration83',
                labtitration163='$labtitration163',
                labtitration323='$labtitration323',
                labtitration643='$labtitration643',
                labtitration1283='$labtitration1283',
                labtitration2563='$labtitration2563',
                labtitration5123='$labtitration5123',
                labtitration10243='$labtitration10243',
                labtitration20483='$labtitration20483',
                labtitrationtiter3='$labtitrationtiter3',
                active='1'
            WHERE labtitrationid3 = '$labtitrationid3'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Titration

// Start Tab 3 Cold Agglutinin
$lab_coldagglutinin_3_item = json_decode($_POST['lab_coldagglutinin_3_item']);

$sql = "UPDATE lab_coldagglutinin_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_coldagglutinin_3_item as $item) {

    $im = json_decode($item);
    $labcoldagglutininid3 =   (!empty($im->labcoldagglutininid3)) ? $im->labcoldagglutininid3 : '';
    $labcoldagglutinincode3 =   (!empty($im->labcoldagglutinincode3)) ? $im->labcoldagglutinincode3 : '';
    $labcoldagglutinino3 =   (!empty($im->labcoldagglutinino3)) ? $im->labcoldagglutinino3 : '';
    $labcoldagglutinintime3 =   (!empty($im->labcoldagglutinintime3)) ? $im->labcoldagglutinintime3 : '';
    $labcoldagglutinin13 =   (!empty($im->labcoldagglutinin13)) ? $im->labcoldagglutinin13 : '';
    $labcoldagglutinin23 =   (!empty($im->labcoldagglutinin23)) ? $im->labcoldagglutinin23 : '';
    $labcoldagglutinin43 =   (!empty($im->labcoldagglutinin43)) ? $im->labcoldagglutinin43 : '';
    $labcoldagglutinin83 =   (!empty($im->labcoldagglutinin83)) ? $im->labcoldagglutinin83 : '';
    $labcoldagglutinin163 =   (!empty($im->labcoldagglutinin163)) ? $im->labcoldagglutinin163 : '';
    $labcoldagglutinin323 =   (!empty($im->labcoldagglutinin323)) ? $im->labcoldagglutinin323 : '';
    $labcoldagglutinin643 =   (!empty($im->labcoldagglutinin643)) ? $im->labcoldagglutinin643 : '';
    $labcoldagglutinin1283 =   (!empty($im->labcoldagglutinin1283)) ? $im->labcoldagglutinin1283 : '';
    $labcoldagglutinin2563 =   (!empty($im->labcoldagglutinin2563)) ? $im->labcoldagglutinin2563 : '';
    $labcoldagglutinin5123 =   (!empty($im->labcoldagglutinin5123)) ? $im->labcoldagglutinin5123 : '';
    $labcoldagglutinin10243 =   (!empty($im->labcoldagglutinin10243)) ? $im->labcoldagglutinin10243 : '';
    $labcoldagglutinin20483 =   (!empty($im->labcoldagglutinin20483)) ? $im->labcoldagglutinin20483 : '';

    if (empty($labcoldagglutininid3)) {
        $running = getRunningYM('CAGG0');
        $labcoldagglutininid3 = $running['runn'];
        $labcoldagglutinincode3 = $running['code'];
        $sql = "
            INSERT INTO lab_coldagglutinin_3
            (
                labcoldagglutininid3,
                labcoldagglutinincode3,
                labcoldagglutinino3,
                labcoldagglutinintime3,
                labcoldagglutinin13,
                labcoldagglutinin23,
                labcoldagglutinin43,
                labcoldagglutinin83,
                labcoldagglutinin163,
                labcoldagglutinin323,
                labcoldagglutinin643,
                labcoldagglutinin1283,
                labcoldagglutinin2563,
                labcoldagglutinin5123,
                labcoldagglutinin10243,
                labcoldagglutinin20483,
                labcheckrequestid
            )
            value
            (
                '$labcoldagglutininid3',
                '$labcoldagglutinincode3',
                '$labcoldagglutinino3',
                '$labcoldagglutinintime3',
                '$labcoldagglutinin13',
                '$labcoldagglutinin23',
                '$labcoldagglutinin43',
                '$labcoldagglutinin83',
                '$labcoldagglutinin163',
                '$labcoldagglutinin323',
                '$labcoldagglutinin643',
                '$labcoldagglutinin1283',
                '$labcoldagglutinin2563',
                '$labcoldagglutinin5123',
                '$labcoldagglutinin10243',
                '$labcoldagglutinin20483',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_coldagglutinin_3 SET
                labcoldagglutinino3='$labcoldagglutinino3',
                labcoldagglutinintime3='$labcoldagglutinintime3',
                labcoldagglutinin13='$labcoldagglutinin13',
                labcoldagglutinin23='$labcoldagglutinin23',
                labcoldagglutinin43='$labcoldagglutinin43',
                labcoldagglutinin83='$labcoldagglutinin83',
                labcoldagglutinin163='$labcoldagglutinin163',
                labcoldagglutinin323='$labcoldagglutinin323',
                labcoldagglutinin643='$labcoldagglutinin643',
                labcoldagglutinin1283='$labcoldagglutinin1283',
                labcoldagglutinin2563='$labcoldagglutinin2563',
                labcoldagglutinin5123='$labcoldagglutinin5123',
                labcoldagglutinin10243='$labcoldagglutinin10243',
                labcoldagglutinin20483='$labcoldagglutinin20483',
                active='1'
            WHERE labcoldagglutininid3 = '$labcoldagglutininid3'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Cold Agglutinin


// Start Tab 3 Antibody identification Test
$lab_antibodyidentificationtestgetmethod_3_item = json_decode($_POST['lab_antibodyidentificationtestgetmethod_3_item']);

$sql = "UPDATE lab_antibodyidentificationtestgetmethod_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodyidentificationtestgetmethod_3_item as $item) {

    $im = json_decode($item);
    $labantibodyidentificationtestgetmethodid3 =   (!empty($im->labantibodyidentificationtestgetmethodid3)) ? $im->labantibodyidentificationtestgetmethodid3 : '';
    $labantibodyidentificationtestgetmethodcode3 =   (!empty($im->labantibodyidentificationtestgetmethodcode3)) ? $im->labantibodyidentificationtestgetmethodcode3 : '';
    $labantibodyidentificationtestgetmethod3 =   (!empty($im->labantibodyidentificationtestgetmethod3)) ? $im->labantibodyidentificationtestgetmethod3 : '';
    $labantibodyidentificationtestgetmethod13 =   (!empty($im->labantibodyidentificationtestgetmethod13)) ? $im->labantibodyidentificationtestgetmethod13 : '';
    $labantibodyidentificationtestgetmethod23 =   (!empty($im->labantibodyidentificationtestgetmethod23)) ? $im->labantibodyidentificationtestgetmethod23 : '';
    $labantibodyidentificationtestgetmethod33 =   (!empty($im->labantibodyidentificationtestgetmethod33)) ? $im->labantibodyidentificationtestgetmethod33 : '';
    $labantibodyidentificationtestgetmethod43 =   (!empty($im->labantibodyidentificationtestgetmethod43)) ? $im->labantibodyidentificationtestgetmethod43 : '';
    $labantibodyidentificationtestgetmethod53 =   (!empty($im->labantibodyidentificationtestgetmethod53)) ? $im->labantibodyidentificationtestgetmethod53 : '';
    $labantibodyidentificationtestgetmethod63 =   (!empty($im->labantibodyidentificationtestgetmethod63)) ? $im->labantibodyidentificationtestgetmethod63 : '';
    $labantibodyidentificationtestgetmethod73 =   (!empty($im->labantibodyidentificationtestgetmethod73)) ? $im->labantibodyidentificationtestgetmethod73 : '';
    $labantibodyidentificationtestgetmethod83 =   (!empty($im->labantibodyidentificationtestgetmethod83)) ? $im->labantibodyidentificationtestgetmethod83 : '';
    $labantibodyidentificationtestgetmethod93 =   (!empty($im->labantibodyidentificationtestgetmethod93)) ? $im->labantibodyidentificationtestgetmethod93 : '';
    $labantibodyidentificationtestgetmethod103 =   (!empty($im->labantibodyidentificationtestgetmethod103)) ? $im->labantibodyidentificationtestgetmethod103 : '';
    $labantibodyidentificationtestgetmethod113 =   (!empty($im->labantibodyidentificationtestgetmethod113)) ? $im->labantibodyidentificationtestgetmethod113 : '';
    $labantibodyidentificationtestgetmethodauto3 =   (!empty($im->labantibodyidentificationtestgetmethodauto3)) ? $im->labantibodyidentificationtestgetmethodauto3 : '';
    $labantibodyidentificationtestgetmethodantibody3 =   (!empty($im->labantibodyidentificationtestgetmethodantibody3)) ? $im->labantibodyidentificationtestgetmethodantibody3 : '';
    $labantibodyidentificationtestgetmethodlotno3 =   (!empty($im->labantibodyidentificationtestgetmethodlotno3)) ? $im->labantibodyidentificationtestgetmethodlotno3 : '';


    if (empty($labantibodyidentificationtestgetmethodid3)) {
        $running = getRunningYM('ABIDG0');
        $labantibodyidentificationtestgetmethodid3 = $running['runn'];
        $labantibodyidentificationtestgetmethodcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodyidentificationtestgetmethod_3
            (
                labantibodyidentificationtestgetmethodid3,
                labantibodyidentificationtestgetmethodcode3,
                labantibodyidentificationtestgetmethod3,
                labantibodyidentificationtestgetmethod13,
                labantibodyidentificationtestgetmethod23,
                labantibodyidentificationtestgetmethod33,
                labantibodyidentificationtestgetmethod43,
                labantibodyidentificationtestgetmethod53,
                labantibodyidentificationtestgetmethod63,
                labantibodyidentificationtestgetmethod73,
                labantibodyidentificationtestgetmethod83,
                labantibodyidentificationtestgetmethod93,
                labantibodyidentificationtestgetmethod103,
                labantibodyidentificationtestgetmethod113,
                labantibodyidentificationtestgetmethodauto3,
                labantibodyidentificationtestgetmethodantibody3,
                labantibodyidentificationtestgetmethodlotno3,
                labcheckrequestid
            )
            value
            (
                '$labantibodyidentificationtestgetmethodid3',
                '$labantibodyidentificationtestgetmethodcode3',
                '$labantibodyidentificationtestgetmethod3',
                '$labantibodyidentificationtestgetmethod13',
                '$labantibodyidentificationtestgetmethod23',
                '$labantibodyidentificationtestgetmethod33',
                '$labantibodyidentificationtestgetmethod43',
                '$labantibodyidentificationtestgetmethod53',
                '$labantibodyidentificationtestgetmethod63',
                '$labantibodyidentificationtestgetmethod73',
                '$labantibodyidentificationtestgetmethod83',
                '$labantibodyidentificationtestgetmethod93',
                '$labantibodyidentificationtestgetmethod103',
                '$labantibodyidentificationtestgetmethod113',
                '$labantibodyidentificationtestgetmethodauto3',
                '$labantibodyidentificationtestgetmethodantibody3',
                '$labantibodyidentificationtestgetmethodlotno3',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodyidentificationtestgetmethod_3 SET
                labantibodyidentificationtestgetmethod3='$labantibodyidentificationtestgetmethod3',
                labantibodyidentificationtestgetmethod13='$labantibodyidentificationtestgetmethod13',
                labantibodyidentificationtestgetmethod23='$labantibodyidentificationtestgetmethod23',
                labantibodyidentificationtestgetmethod33='$labantibodyidentificationtestgetmethod33',
                labantibodyidentificationtestgetmethod43='$labantibodyidentificationtestgetmethod43',
                labantibodyidentificationtestgetmethod53='$labantibodyidentificationtestgetmethod53',
                labantibodyidentificationtestgetmethod63='$labantibodyidentificationtestgetmethod63',
                labantibodyidentificationtestgetmethod73='$labantibodyidentificationtestgetmethod73',
                labantibodyidentificationtestgetmethod83='$labantibodyidentificationtestgetmethod83',
                labantibodyidentificationtestgetmethod93='$labantibodyidentificationtestgetmethod93',
                labantibodyidentificationtestgetmethod103='$labantibodyidentificationtestgetmethod103',
                labantibodyidentificationtestgetmethod113='$labantibodyidentificationtestgetmethod113',
                labantibodyidentificationtestgetmethodauto3='$labantibodyidentificationtestgetmethodauto3',
                labantibodyidentificationtestgetmethodantibody3='$labantibodyidentificationtestgetmethodantibody3',
                labantibodyidentificationtestgetmethodlotno3='$labantibodyidentificationtestgetmethodlotno3',
                active='1'
            WHERE labantibodyidentificationtestgetmethodid3 = '$labantibodyidentificationtestgetmethodid3'
            
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Antibody identification Test


// Start Tab 3 Antibody Sceening test Get Method
$lab_antibodysceentestgetmethod_3_item = json_decode($_POST['lab_antibodysceentestgetmethod_3_item']);

$sql = "UPDATE lab_antibodysceentestgetmethod_3 SET
            active = '0'
            WHERE labcheckrequestid = '$labcheckrequestid'
            AND active <> 0
        ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_antibodysceentestgetmethod_3_item as $item) {

    $im = json_decode($item);
    $labantibodysceentestgetmethodid3 =   (!empty($im->labantibodysceentestgetmethodid3)) ? $im->labantibodysceentestgetmethodid3 : '';
    $labantibodysceentestgetmethodcode3 =   (!empty($im->labantibodysceentestgetmethodcode3)) ? $im->labantibodysceentestgetmethodcode3 : '';
    $labantibodysceentestgetmethodp1mi3 =   (!empty($im->labantibodysceentestgetmethodp1mi3)) ? $im->labantibodysceentestgetmethodp1mi3 : '';
    $labantibodysceentestgetmethodtest3 =   (!empty($im->labantibodysceentestgetmethodtest3)) ? $im->labantibodysceentestgetmethodtest3 : '';
    $labantibodysceentestgetmethodo13 =   (!empty($im->labantibodysceentestgetmethodo13)) ? $im->labantibodysceentestgetmethodo13 : '';
    $labantibodysceentestgetmethodo23 =   (!empty($im->labantibodysceentestgetmethodo23)) ? $im->labantibodysceentestgetmethodo23 : '';
    $labantibodysceentestgetmethodo33 =   (!empty($im->labantibodysceentestgetmethodo33)) ? $im->labantibodysceentestgetmethodo33 : '';
    $labantibodysceentestgetmethodenz3 =   (!empty($im->labantibodysceentestgetmethodenz3)) ? $im->labantibodysceentestgetmethodenz3 : '';
    $labantibodysceentestgetmethodlotno3 =   (!empty($im->labantibodysceentestgetmethodlotno3)) ? $im->labantibodysceentestgetmethodlotno3 : '';

    if (empty($labantibodysceentestgetmethodid3)) {
        $running = getRunningYM('ABTGM0');
        $labantibodysceentestgetmethodid3 = $running['runn'];
        $labantibodysceentestgetmethodcode3 = $running['code'];
        $sql = "
            INSERT INTO lab_antibodysceentestgetmethod_3
            (
                labantibodysceentestgetmethodid3,
                labantibodysceentestgetmethodcode3,
                labantibodysceentestgetmethodtest3,
                labantibodysceentestgetmethodp1mi3,
                labantibodysceentestgetmethodo13,
                labantibodysceentestgetmethodo23,
                labantibodysceentestgetmethodo33,
                labantibodysceentestgetmethodenz3,
                labantibodysceentestgetmethodlotno3,
                labcheckrequestid
            )
            value
            (
                '$labantibodysceentestgetmethodid3',
                '$labantibodysceentestgetmethodcode3',
                '$labantibodysceentestgetmethodtest3',
                '$labantibodysceentestgetmethodp1mi3',
                '$labantibodysceentestgetmethodo13',
                '$labantibodysceentestgetmethodo23',
                '$labantibodysceentestgetmethodo33',
                '$labantibodysceentestgetmethodenz3',
                '$labantibodysceentestgetmethodlotno3',
                '$labcheckrequestid'
            )
        ";



        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_antibodysceentestgetmethod_3 SET
            labantibodysceentestgetmethodtest3='$labantibodysceentestgetmethodtest3',
            labantibodysceentestgetmethodp1mi3='$labantibodysceentestgetmethodp1mi3',
            labantibodysceentestgetmethodo13='$labantibodysceentestgetmethodo13',
            labantibodysceentestgetmethodo23='$labantibodysceentestgetmethodo23',
            labantibodysceentestgetmethodo33='$labantibodysceentestgetmethodo33',
            labantibodysceentestgetmethodenz3='$labantibodysceentestgetmethodenz3',
            labantibodysceentestgetmethodlotno3='$labantibodysceentestgetmethodlotno3',
            active='1'
            WHERE labantibodysceentestgetmethodid3 = '$labantibodysceentestgetmethodid3'
            
        ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab 3 Antibody Sceening test Get Method



// Start Tab ลูก ABO
$lab_abo_child = json_decode($_POST['lab_abo_child']);

$sql = "UPDATE lab_abo_child SET
                    active = '0'
                    WHERE labcheckrequestid = '$labcheckrequestid'
                    AND active <> 0
                ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_abo_child as $item) {

    $im = json_decode($item);
    $labreagent_child = (!empty($im->labreagent_child)) ? $im->labreagent_child : '';
    $lababoid_child =   (!empty($im->lababoid_child)) ? $im->lababoid_child : '';
    $lababocode_child =   (!empty($im->lababocode_child)) ? $im->lababocode_child : '';
    $lababoantia_child =   (!empty($im->lababoantia_child)) ? $im->lababoantia_child : '';
    $lababoantib_child =   (!empty($im->lababoantib_child)) ? $im->lababoantib_child : '';
    $lababoantiab_child =   (!empty($im->lababoantiab_child)) ? $im->lababoantiab_child : '';
    $lababoacells_child =   (!empty($im->lababoacells_child)) ? $im->lababoacells_child : '';
    $lababobcells_child =   (!empty($im->lababobcells_child)) ? $im->lababobcells_child : '';
    $lababoocells_child =   (!empty($im->lababoocells_child)) ? $im->lababoocells_child : '';
    $lababobloodgroup_child =   (!empty($im->lababobloodgroup_child)) ? $im->lababobloodgroup_child : '';

    if (empty($lababoid_child)) {
        $running = getRunningYM('TABO0');
        $lababoid_child = $running['runn'];
        $lababocode_child = $running['code'];
        $sql = "
                    INSERT INTO lab_abo_child
                    (
                        labreagent_child,
                        lababoid_child,
                        lababocode_child,
                        lababoantia_child,
                        lababoantib_child,
                        lababoantiab_child,
                        lababoacells_child,
                        lababobcells_child,
                        lababoocells_child,
                        lababobloodgroup_child,
                        labcheckrequestid
                    )
                    value
                    (
                        '$labreagent_child',
                        '$lababoid_child',
                        '$lababocode_child',
                        '$lababoantia_child',
                        '$lababoantib_child',
                        '$lababoantiab_child',
                        '$lababoacells_child',
                        '$lababobcells_child',
                        '$lababoocells_child',
                        '$lababobloodgroup_child',
                        '$labcheckrequestid'
                    )
                ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_abo_child SET
                    labreagent_child='$labreagent_child',
                    lababoantia_child='$lababoantia_child',
                    lababoantib_child='$lababoantib_child',
                    lababoantiab_child='$lababoantiab_child',
                    lababoacells_child='$lababoacells_child',
                    lababobcells_child='$lababobcells_child',
                    lababoocells_child='$lababoocells_child',
                    lababobloodgroup_child='$lababobloodgroup_child',
                    active='1'
                    WHERE lababoid_child = '$lababoid_child'
                    
                ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab ลูก ABO


// Start Tab พ่อ ABO
$lab_abo_father = json_decode($_POST['lab_abo_father']);

$sql = "UPDATE lab_abo_father SET
                    active = '0'
                    WHERE labcheckrequestid = '$labcheckrequestid'
                    AND active <> 0
                ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_abo_father as $item) {

    $im = json_decode($item);
    $labreagent_father = (!empty($im->labreagent_father)) ? $im->labreagent_father : '';
    $lababoid_father =   (!empty($im->lababoid_father)) ? $im->lababoid_father : '';
    $lababocode_father =   (!empty($im->lababocode_father)) ? $im->lababocode_father : '';
    $lababoantia_father =   (!empty($im->lababoantia_father)) ? $im->lababoantia_father : '';
    $lababoantib_father =   (!empty($im->lababoantib_father)) ? $im->lababoantib_father : '';
    $lababoantiab_father =   (!empty($im->lababoantiab_father)) ? $im->lababoantiab_father : '';
    $lababoacells_father =   (!empty($im->lababoacells_father)) ? $im->lababoacells_father : '';
    $lababobcells_father =   (!empty($im->lababobcells_father)) ? $im->lababobcells_father : '';
    $lababoocells_father =   (!empty($im->lababoocells_father)) ? $im->lababoocells_father : '';
    $lababobloodgroup_father =   (!empty($im->lababobloodgroup_father)) ? $im->lababobloodgroup_father : '';

    if (empty($lababoid_father)) {
        $running = getRunningYM('TABO0');
        $lababoid_father = $running['runn'];
        $lababocode_father = $running['code'];
        $sql = "
                    INSERT INTO lab_abo_father
                    (
                        labreagent_father,
                        lababoid_father,
                        lababocode_father,
                        lababoantia_father,
                        lababoantib_father,
                        lababoantiab_father,
                        lababoacells_father,
                        lababobcells_father,
                        lababoocells_father,
                        lababobloodgroup_father,
                        labcheckrequestid
                    )
                    value
                    (
                        '$labreagent_father',
                        '$lababoid_father',
                        '$lababocode_father',
                        '$lababoantia_father',
                        '$lababoantib_father',
                        '$lababoantiab_father',
                        '$lababoacells_father',
                        '$lababobcells_father',
                        '$lababoocells_father',
                        '$lababobloodgroup_father',
                        '$labcheckrequestid'
                    )
                ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_abo_father SET
                    labreagent_father='$labreagent_father',
                    lababoantia_father='$lababoantia_father',
                    lababoantib_father='$lababoantib_father',
                    lababoantiab_father='$lababoantiab_father',
                    lababoacells_father='$lababoacells_father',
                    lababobcells_father='$lababobcells_father',
                    lababoocells_father='$lababoocells_father',
                    lababobloodgroup_father='$lababobloodgroup_father',
                    active='1'
                    WHERE lababoid_father = '$lababoid_father'
                    
                ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab พ่อ ABO


// Start Tab ลูก Rh
$lab_rh_child = json_decode($_POST['lab_rh_child']);

$sql = "UPDATE lab_rh_child SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_rh_child as $item) {

    $im = json_decode($item);
    $labrhid_child =   (!empty($im->labrhid_child)) ? $im->labrhid_child : '';
    $labrhcode_child =   (!empty($im->labrhcode_child)) ? $im->labrhcode_child : '';
    $labrhreagent_child =   (!empty($im->labrhreagent_child)) ? $im->labrhreagent_child : '';
    $labrhrt_child =   (!empty($im->labrhrt_child)) ? $im->labrhrt_child : '';
    $lab37c_child =   (!empty($im->lab37c_child)) ? $im->lab37c_child : '';
    $labiat_child =   (!empty($im->labiat_child)) ? $im->labiat_child : '';
    $labccc_child =   (!empty($im->labccc_child)) ? $im->labccc_child : '';
    $labresult_child =   (!empty($im->labresult_child)) ? $im->labresult_child : '';

    if (empty($labrhid_child)) {
        $running = getRunningYM('TRH0');
        $labrhid_child = $running['runn'];
        $labrhcode_child = $running['code'];
        $sql = "
                INSERT INTO lab_rh_child
                (
                    labrhid_child,
                    labrhcode_child,
                    labrhreagent_child,
                    labrhrt_child,
                    lab37c_child,
                    labiat_child,
                    labccc_child,
                    labresult_child,
                    labcheckrequestid
                )
                value
                (
                    '$labrhid_child',
                    '$labrhcode_child',
                    '$labrhreagent_child',
                    '$labrhrt_child',
                    '$lab37c_child',
                    '$labiat_child',
                    '$labccc_child',
                    '$labresult_child',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_rh_child SET
                labrhreagent_child='$labrhreagent_child',
                labrhrt_child='$labrhrt_child',
                lab37c_child='$lab37c_child',
                labiat_child='$labiat_child',
                labccc_child='$labccc_child',
                labresult_child='$labresult_child',
                active='1'
                WHERE labrhid_child = '$labrhid_child'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab ลูก Rh


// Start Tab พ่อ Rh
$lab_rh_father = json_decode($_POST['lab_rh_father']);

$sql = "UPDATE lab_rh_father SET
                active = '0'
                WHERE labcheckrequestid = '$labcheckrequestid'
                AND active <> 0
            ";

$result = mysqli_query($conn, $sql);
if (empty($result))
    $status = 0;

foreach ($lab_rh_father as $item) {

    $im = json_decode($item);
    $labrhid_father =   (!empty($im->labrhid_father)) ? $im->labrhid_father : '';
    $labrhcode_father =   (!empty($im->labrhcode_father)) ? $im->labrhcode_father : '';
    $labrhreagent_father =   (!empty($im->labrhreagent_father)) ? $im->labrhreagent_father : '';
    $labrhrt_father =   (!empty($im->labrhrt_father)) ? $im->labrhrt_father : '';
    $lab37c_father =   (!empty($im->lab37c_father)) ? $im->lab37c_father : '';
    $labiat_father =   (!empty($im->labiat_father)) ? $im->labiat_father : '';
    $labccc_father =   (!empty($im->labccc_father)) ? $im->labccc_father : '';
    $labresult_father =   (!empty($im->labresult_father)) ? $im->labresult_father : '';

    if (empty($labrhid_father)) {
        $running = getRunningYM('TRH0');
        $labrhid_father = $running['runn'];
        $labrhcode_father = $running['code'];
        $sql = "
                INSERT INTO lab_rh_father
                (
                    labrhid_father,
                    labrhcode_father,
                    labrhreagent_father,
                    labrhrt_father,
                    lab37c_father,
                    labiat_father,
                    labccc_father,
                    labresult_father,
                    labcheckrequestid
                )
                value
                (
                    '$labrhid_father',
                    '$labrhcode_father',
                    '$labrhreagent_father',
                    '$labrhrt_father',
                    '$lab37c_father',
                    '$labiat_father',
                    '$labccc_father',
                    '$labresult_father',
                    '$labcheckrequestid'
                )
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    } else {
        $sql = "UPDATE lab_rh_father SET
                labrhreagent_father='$labrhreagent_father',
                labrhrt_father='$labrhrt_father',
                lab37c_father='$lab37c_father',
                labiat_father='$labiat_father',
                labccc_father='$labccc_father',
                labresult_father='$labresult_father',
                active='1'
                WHERE labrhid_father = '$labrhid_father'
                
            ";

        $result = mysqli_query($conn, $sql);
        if (empty($result))
            $status = 0;
    }
}
// End Tab พ่อ Rh






if ($status) {
    mysqli_commit($conn);


    $sql2 = "SELECT * FROM lab_check_request WHERE labcheckrequestid = '$labcheckrequestid' ";

    $labcheckrequest_v_staffid = "";
    $v_labcheckrequest_a_staffid = "";

    $labcheckrequest_v_datetime = "";
    $v_labcheckrequest_a_datetime = "";

    $v_labcheckrequest_v = "";
    $a_labcheckrequest_a = "";

    $query2 = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_array($query2)) {

        $labcheckrequest_v_staffid = (!empty($row['labcheckrequest_v_staffid'])) ? $row['labcheckrequest_v_staffid'] : '';
        $v_labcheckrequest_a_staffid = (!empty($row['labcheckrequest_a_staffid'])) ? $row['labcheckrequest_a_staffid'] : '';

        $v_labcheckrequest_v = $row['labcheckrequest_v'];
        $a_labcheckrequest_a = $row['labcheckrequest_a'];


        if (!empty($row['labcheckrequest_v_datetime']))
            $labcheckrequest_v_datetime = dateYMDHMDiff543yearInt($row['labcheckrequest_v_datetime']);

        if (!empty($row['labcheckrequest_a_datetime']))
            $v_labcheckrequest_a_datetime = dateYMDHMDiff543yearInt($row['labcheckrequest_a_datetime']);
    }


    error_log("===v=========$v_labcheckrequest_v=========");
    error_log("====a=======$a_labcheckrequest_a==========");
    error_log(json_encode($resultArray));

    if ($env) {
        // if (!empty($v_labcheckrequest_v) && !empty($a_labcheckrequest_a)) {

            error_log("+++++++++++++++++++++++");

            // $datetimenow =  $labcheckrequest_v_datetime.'^'.$v_labcheckrequest_a_datetime ;
            // $result_staff = $v_labcheckrequest_a_staffid . '^' .$labcheckrequest_v_staffid ;

            $datetimenow =  $labcheckrequest_v_datetime;
            $result_staff = $labcheckrequest_v_staffid ;

            $a_datetimenow =  $v_labcheckrequest_a_datetime;
            $a_result_staff = $v_labcheckrequest_a_staffid ;

            for ($x = 0; $x < count($resultArray); $x++) {
                if($datetimenow != ''){
                    $resultArray[$x]['result_date'] = $datetimenow;
                }
                if ($result_staff != '') {
                    $resultArray[$x]['result_staff'] = $result_staff;
                }
                if ($a_datetimenow != '') {
                    $resultArray[$x]['approve_date'] = $a_datetimenow;
                }
                if ($a_result_staff != '') {
                    $resultArray[$x]['approve_staff'] = $a_result_staff;
                }
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
            ///////////////////////////////////////////////////


            ///////////////////////////////////////////////////

            $curl = curl_init();


            $objData = '{
                "hn": "' . $patientan . '",
                "request_date": "' . $request_date . '",
                "request_time": "' . $request_time . '",
                "labsection": "89",
                "labgrpno": "1",
                "lab_detail": '.json_encode($resultArray).'
            }';

            error_log(json_encode(($objData)));

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://rhisapi.rajavithi.go.th/' . $rhis_api_absws_config3 . '/api/lisresult',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $objData,
                CURLOPT_HTTPHEADER => array(
                    'X-Access-Token: ' . $token,
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $responseArray = json_decode($response);

            $stat_api = $responseArray->Result;

            $sql = "UPDATE lab_check_request SET
                        apisendresult='$response',
                        datasendresult = '$objData'
                        WHERE labcheckrequestid = '$labcheckrequestid'
                        
                    ";

            error_log($sql);

            $result = mysqli_query($conn, $sql);
            if (empty($result))
                $status = 0;

                
            mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$labcheckrequestid','$objData','$dateNowValue','$username','test-result-blood-bank-data','บันทึกผลการตรวจทางห้องปฏิบัติการ data')");
            mysqli_query($conn,"INSERT INTO log_data(logkeyid,logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$labcheckrequestid','$response','$dateNowValue','$username','test-result-blood-bank-result','บันทึกผลการตรวจทางห้องปฏิบัติการ result')");


            mysqli_commit($conn);
        // }
    }


} else {
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'stat_api' => $stat_api,
        'id' => $labcheckrequestid,
        'lab_abo_0_item' => $lab_abo_0_item,
        'lab_abo_1_item' => $lab_abo_1_item
    )
);

// end การบริจาค

function replaceHNGet($text)
{
    $arrayStr = explode("-", $text);
    $newtext =  $arrayStr[1] . $arrayStr[0];
    return $newtext;
}
