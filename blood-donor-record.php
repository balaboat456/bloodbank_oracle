<?php


session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    if (!checkPermission("BK_DONATE", "VW")) {
        header('Location:not-permission.php');
    }

    require_once('connection.php');
    include('dateNow.php');



?>


    <?php

    date_default_timezone_set('Asia/Bangkok');


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <?php include 'include/title.php' ?>

        <title>บันทึกผู้มาบริจาคโลหิต</title>

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/preload.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom-table.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/spinner.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/jquery-ui/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/jquery-ui/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />


        <link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />


        <!-- BEGIN CSS for this page -->

        <!-- END CSS for this page -->

        <script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>

        <style>
            input[type=checkbox] {
                width: 17px;
                height: 17px;
            }

            .select2-container--bootstrap .select2-selection--single {

                box-sizing: border-box;
            }

            .search-doner {
                margin-bottom: -30px;
            }

            .none-margin-bottom {
                margin-bottom: -10px !important;
            }

            .breadcrumb-holder {
                height: 50px !important;
            }

            .modal-dialog {
                max-width: 90% !important;
            }

            th,
            td {
                text-align: center;
            }

            .ui-datepicker {
                z-index: 10000 !important;
            }

            .margin-top-label-5 {
                margin-top: 5px;
            }

            .margin-top-bottom-label-10- {
                margin-top: -10px;
                margin-bottom: -10px;

            }

            .margin-top-bottom-label-10-5 {
                margin-top: -10px;
                margin-bottom: 2px;

            }

            label {
                margin: 0px;
            }

            .btn-label-sm {
                background: rgba(43, 61, 81, 0.1);
                display: inline-block;
                padding: 5px 14px;
                border-radius: 3px 0 0 3px;
                margin: -20px -9px;
                margin-right: 12px;
            }

            .card-header-custom {
                padding-top: 5px !important;
                height: 30px !important;
            }

            .imagePofile {
                position: absolute;
                top: 140px;
                right: 25px;
                border: 3px solid #73AD21;
                /* z-index: 999; */

            }

            .smartcardlabel {
                font-size: 20px;
                color: #000;
            }

            #blood_group+.select2 .select2-selection__rendered {
                font-weight: bold;
                color: #dc3545;
                font-size: 20px;
            }

            .table-td-header {
                text-align: center !important;
                vertical-align: middle !important;
            }


            #select2-unitnameid-container {
                color: blue !important;
                padding: 0;
            }

            #select2-activityid-container {
                color: blue !important;
                padding: 0;
            }

            #select2-addressselect-container {
                color: blue !important;
                padding: 0;
            }

            #select2-countryid-container {
                color: blue !important;
                padding: 0;
            }

            #select2-address2_current_select-container {
                color: blue !important;
                padding: 0;
            }

            #select2-countrycurrentid-container {
                color: blue !important;
                padding: 0;
            }

            #square {

                width: 100%;
                height: 100%;
                background: white;
                border-radius: 4px;

            }

            .select2-container--bootstrap .select2-dropdown {
                -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
                box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
                border-color: #66afe9;
                overflow-x: hidden;
                margin-top: -1px;
                z-index: 9999;
            }



            /* #blood_group{
                font-size: 20px !important; 
                color:red !important;
            } */
            /* #blood_group.select2-search { background-color: red; }
            #blood_group.select2-results { background-color: #00f; } */
        </style>

    </head>

    <body class="adminbody">

        <?php include 'preload.php' ?>
        <script>
            spinnershow();
        </script>



        <div class="myAlert-top alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> บันทึกข้อมูลสำเร็จ
        </div>
        <div class="myAlert-top-pofile alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> โหลดข้อมูลจาก Smart Cart สำเร็จ
        </div>
        <div class="myAlert-top-error alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> บันทึกข้อมูลล้มเหลว
        </div>
        <div class="myAlert-top-delete alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> ลบข้อมูลสำเร็จ
        </div>
        <div class="myAlert-top-error-delete alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> ลบข้อมูลล้มเหลว
        </div>
        <div class="myAlert-top-error-login alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> เข้าสู่ระบบล้มเหลว
        </div>
        <div id="main" class="">

            <!-- top bar navigation -->
            <?php include 'setLocalUrl.php' ?>
            <?php include 'top-nav.php' ?>

            <!-- End Navigation -->





            <!-- Left Sidebar -->

            <?php include 'side-menu.php' ?>

            <!-- End Sidebar -->


            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <div class="container-fluid">


                        <div class="row">
                            <div id="mainform" class="col-xl-12" style="margin-bottom:-15px;">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">บันทึกผู้มาบริจาคโลหิต</h1>
                                    <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                        <div class=" message" align="center">


                            <?php

                            if (isset($_GET['msg']) && isset($_GET['op'])) {

                                if ($_GET['msg'] == 1) {

                                    echo "<span class='msgp1' 

		style='padding:5px 20%; 

		color:green; 

		font-size:1.2em; 

		margin:0 5% 5px; 

		text-shadow: 1px 2px 3px #c8b4b4;

		letter-spacing: 1px;

		word-spacing: 1px;'>DATA has been " . $_GET['op'] . " !</span>";
                                } else {

                                    echo "<span class='msgp0' 

		style='padding:5px 20%;

		color:red;

		font-size:1.2em;

		margin:0 5% 5px;

		text-shadow: 1px 2px 3px #c8b4b4;

		letter-spacing: 1px;

		word-spacing: 1px;'>DATA has not " . $_GET['op'] . " .</span> ";
                                }
                            }

                            include('connection.php');

                            $id = $_GET['id'];
                            $edit = $_GET['edit'];

                            $sql = "SELECT DN.*,
						DR.donorcode,
						DR.isidcardpassport,
						DR.donoridcard,
						DR.donorpassport,
						DR.donorbirthday,
						DR.donorage,
                        DR.donoragetext,
						DR.donoroccupation,
						DR.donoroccupationother,
						DR.donortelhome,
						DR.donormobile,
						DR.genderid,
						DR.prefixid,
						DR.fname,
						DR.lname,
                        DR.donoremail,
                        DR.blood_group,

						DR.address,
						DR.address_moo,
						DR.address_alley,
						DR.address_street,
						DR.address2,
						DR.countryid,
						DR.provinceid,
						DR.districtid,
						DR.subdistrictid,
						DR.zipcode,

						DR.address_current,
						DR.address_moo_current,
						DR.address_alley_current,
						DR.address_street_current,
						DR.address2_current,
						DR.countrycurrentid,
						DR.provincecurrentid,
						DR.districtcurrentid,
						DR.subdistrictcurrentid,
						DR.zipcode_current,

                        DR.donor_isunitoffice,
                        DR.donor_departmentid,

						DR.issendletter,

						DR.souvenirid,
						DR.blood_group AS donor_blood_group,
						DR.rh,
						DR.donorimagepath,
                        DATE_FORMAT(DN.receivecarddate,'%d/%m/%Y') AS receivecarddate,
						IFNULL(AC.activityname,'') AS activityname,
						IFNULL(MU.dmu_name,'') AS unitname,
                        DN.donateid as did        
                        FROM donate DN
                        LEFT JOIN donor DR ON DN.donorid = DR.donorid
                        LEFT JOIN donate_activity AC ON DN.activityid = AC.activityid
                        LEFT JOIN donat_mobile_unit MU ON DN.unitnameid = MU.id
                        WHERE DN.donateid = '$id'";


                            $result = mysqli_query($conn, $sql);
                            $row;
                            if (mysqli_num_rows($result) > 0) {

                                $row = mysqli_fetch_assoc($result);
                                $donorid = $row['donorid'];
                            }

                            ?>

                            <script>
                                var activityid = "<?php echo $row['activityid']; ?>";
                                var activityname = "<?php echo $row['activityname']; ?>";
                                var unitnameid = "<?php echo $row['unitnameid']; ?>";
                                var unitname = "<?php echo $row['unitname']; ?>";
                                var editState = "<?php echo "$edit"; ?>";
                            </script>


                        </div>
                        <div id="printHeaderForm" style="display:none;margin-bottom:-10px;" class="form-group col-md-12">
                            <div class="row">
                                <div id="printCard2" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printCard2()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>บัตรประจำตัวผู้บริจาค</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printCard" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printCard()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>บัตรประจำตัวผู้บริจาค(ชั่วคราว)</a>
                                    <?php } ?>
                                </div>&emsp;

                                <div id="printAppointment" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printAppointment()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>ใบนัด</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printRegister" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printRegister()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>แบบฟอร์มการบริจาคเลือด</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printAccident" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printAccident()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>รายงานอุบัติเหตุ-อุบัติการณ์</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printSingleDonorPlatelet" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printSingleDonorPlatelet()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>Single Donor Platelet (SDP)</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printCertificate" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printCertificate()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>ใบรับรองการบริจาคโลหิต</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printConfirmBlood" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printConfirmBlood()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>เอกสารยืนยันรับบริจาคเลือดได้</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printFormAutologousBloodDonation" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printFormAutologousBloodDonation()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>แบบบันทึกการทำ Autologous</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printAutologousBloodDonation" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printAutologousBloodDonation()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>แบบฟอร์ม Autologous</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printAutologousBloodDonationSticker" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printAutologousBloodDonationSticker()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>สติกเกอร์ Autologous</a>
                                    <?php } ?>
                                </div>&emsp;
                                <div id="printDirectBloodDonation" style="display:none;">
                                    <?php if (checkPermission("BK_DONATE", "PDF1")) { ?>
                                        <a role="button" onclick="printDirectBloodDonation()" class="btn btn-light btn-sm"><span class="btn-label-sm">
                                                <i class="fa fa-print"></i></span>แบบฟอร์ม Direct</a>
                                    <?php } ?>
                                </div>&emsp;

                            </div>

                        </div>

                        <hr />

                        <div style="padding-right: 125px;">


                            <form role="form" id="myform" method="POST" action="blood-donor-record-save.php" enctype="multipart/form-data">
                                <?php $fullname = $_SESSION['fullname']; ?>
                                <input type="hidden" id="fullname" name="fullname" value="<?php echo $fullname ?>">
                                <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->

                                <?php echo "<script> var status = '" . $_SESSION['status'] . "'; </script>";
                                $_SESSION['status'] = '';  ?>

                                <div class="container-fluid">


                                    <div class="row">




                                        <div id="searchgroup" class="form-group col-md-12 margin-top-bottom-label-10-">
                                            <div class="row">

                                                <label class="form-check-label" style="margin-top: 5px;">ค้นหา</label>
                                                <div class="form-check">
                                                    <select class="search_focus" id="search" name="search"></select>
                                                </div>
                                                &nbsp;
                                                <div id="checkfalse" style="display:none;">
                                                    <div>
                                                        <a role="button" class="btn btn-warning btn-sm" data-toggle="modal"><span class="btn-label-sm"><i class="fa fa-info"></i></span>ยังไม่มีตรวจเลือดและผลเลือดติดเชื้อ</a>

                                                    </div>
                                                </div>
                                                &nbsp;
                                                <div id="checktrue" style="display:none;">
                                                    <div>
                                                        <a role="button" href="#" class="btn btn-primary btn-sm" onclick="loadTable()" data-toggle="modal"><span class="btn-label-sm"><i class="fa fa-check"></i></span>ดูตรวจเลือดและผลเลือดติดเชื้อ</a>

                                                    </div>
                                                </div>
                                                &nbsp;
                                                <div id="btnchangename" style="display:block;">
                                                    <div>
                                                        <a role="button" href="#" class="btn btn-primary btn-sm" onclick="loadTableChangeName()" data-toggle="modal"><span class="btn-label-sm"><i class="fa fa-check"></i></span>ดูประวัติการเปลี่ยนชื่อ-สกุล</a>

                                                    </div>
                                                </div>
                                                &nbsp;
                                                <div id="btnchangepassport" style="display:none;">
                                                    <div>
                                                        <a role="button" href="#" class="btn btn-primary btn-sm" onclick="loadTableChangePassport()" data-toggle="modal"><span class="btn-label-sm"><i class="fa fa-check"></i></span>ดูประวัติการเปลี่ยน
                                                            Passport</a>

                                                    </div>
                                                </div>
                                                &nbsp;
                                                <div id="btnchangebloodgroup" style="display:none;">
                                                    <div>
                                                        <a role="button" href="#" class="btn btn-primary btn-sm" onclick="loadTableChangeBloodGroup()" data-toggle="modal"><span class="btn-label-sm"><i class="fa fa-check"></i></span>ดูประวัติการเปลี่ยน
                                                            หมู่เลือด</a>

                                                    </div>
                                                </div>
                                                &nbsp;
                                                <div id="btngetcard" style="display:none;">
                                                    <div>
                                                        <a role="button" href="#" class="btn btn-primary btn-sm" onclick="loadTableGetCard()" data-toggle="modal"><span class="btn-label-sm"><i class="fa fa-check"></i></span>ดูประวัติการขอรับบัตร</a>

                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <hr />

                                <img class="imagePofile" id="imagePofile" name="imagePofile" src="<?php echo (!empty($row['donorimagepath'])) ? $row['donorimagepath'] : "assets/images/profile.png"; ?>" height="120" width="110">
                                <p style="top:267px;right:114px;position:absolute;">หมู่เลือด</p>
                                <input type="text" class="form-control form-control-md col-sm-1" style="width:70px;top:264px;right:32px;position:absolute;font-weight: bold;color:#dc3545;font-size: 20px;" id="showblood" name="showblood" value="<?php echo (!empty($row['donor_blood_group'])) ? $row['donor_blood_group'] : "" ?>" readonly>
                                <div class="form-group margin-top-bottom-label-10-">
                                    <div class="row">
                                        &emsp; <label class="form-check-label">
                                            <input id="donation_type_id1" class="check" type="radio" name="donation_type_id" value="1" onclick="setSDPShow(1)" <?php if ($row['donation_type_id'] == 1 || empty($row['donation_type_id'])) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                }  ?>>
                                            โลหิตทั่วไป
                                        </label>

                                        &emsp;
                                        <label class="form-check-label">
                                            <input id="donation_type_id2" class="check" type="radio" name="donation_type_id" value="2" onclick="clickSDPShow(2)" <?php if ($row['donation_type_id'] == 2) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }  ?>>
                                            Plateletpheresis (SDP)
                                        </label>
                                        &emsp;
                                        <label id="sdpdonatenocausetext" style="color: red;" class="form-check-label"></label>

                                        &emsp;
                                        <label class="form-check-label">
                                            <input id="donation_type_id3" class="check" type="radio" name="donation_type_id" value="3" onclick="setSDPShow(3)" <?php if ($row['donation_type_id'] == 3) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                }  ?>> Red Cell
                                            Apheresis
                                        </label>
                                        &emsp;
                                        <label class="form-check-label">
                                            <input id="donation_type_id4" class="check" type="radio" name="donation_type_id" value="4" onclick="setSDPShow(4)" <?php if ($row['donation_type_id'] == 4) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                }  ?>> Plasma
                                            Apheresis
                                            &emsp;
                                        </label>

                                        |&emsp;&emsp;&emsp;

                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" onclick="donorGetInformation(1)" name="donation_get_type_id" id="donation_get_type_id1" value="1" <?php if ($row['donation_get_type_id'] == 1 || empty($row['donation_get_type_id'])) {
                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                            }  ?> name="type_ofdn">
                                            Volunteer
                                        </label>
                                        &emsp;&emsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" onclick="donorGetInformation(2)" name="donation_get_type_id" id="donation_get_type_id2" value="2" <?php if ($row['donation_get_type_id'] == 2) {
                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                            }  ?> name="type_ofdn">
                                            Replacement
                                        </label>
                                        &emsp;&emsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" onclick="donorGetInformation(3)" name="donation_get_type_id" id="donation_get_type_id3" value="3" <?php if ($row['donation_get_type_id'] == 3) {
                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                            }  ?> name="type_ofdn">
                                            Autologous
                                        </label>
                                        &emsp;&emsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" onclick="donorGetInformation(4)" name="donation_get_type_id" id="donation_get_type_id4" value="4" <?php if ($row['donation_get_type_id'] == 4) {
                                                                                                                                                                                                echo 'checked';
                                                                                                                                                                                            }  ?> name="type_ofdn">
                                            Direct
                                        </label>
                                        &emsp;&emsp;|
                                        &emsp;&emsp;
                                        <label class="form-check-label">
                                            <input class="check2" type="checkbox" id="isfirstblooddonation" name="isfirstblooddonation" value="1" <?php if ((!empty($row['isfirstblooddonation']) || $row['isfirstblooddonation'] == 1)) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }  ?>>&nbsp;บริจาคโลหิตครั้งแรกที่รพ.ราชวิถี
                                        </label>


                                    </div>
                                </div>



                                <hr>

                                <div style="display:none;" id="donorgetinformation" style="margin-bottom: -20px !important;margin-top: -20px !important;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h3><i class="fa fa-check-square-o"></i> ข้อมูลผู้ป่วย</h3>
                                            ถ้าไม่ทราบ HN/AN ระบุเฉพาะ ชื่อ-สกุล
                                        </div>
                                        <div class="card-body">
                                            <fieldset class="form-check">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">HN</label>
                                                        <input type="text" autocomplete="off" class="form-control form-control-sm" id="hn" aria-describedby="numberlHelp" value="<?php echo $row["hn"]; ?>" name="hn" <?php echo (($row['donation_get_type_id'] == 2) ? 'required' : ''); ?> onkeyup="setNewHN(this)">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputPassword4">AN</label>
                                                        <input type="text" autocomplete="off" class="form-control form-control-sm" id="an" autocomplete="off" value="<?php echo $row["an"]; ?>" name="an">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">ชื่อ-นามสกุล</label>
                                                        <input type="text" autocomplete="off" class="form-control form-control-sm" id="patientname" aria-describedby="numberlHelp" value="<?php echo $row["patientname"]; ?>" name="patientname">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Diagnosis</label>
                                                        <select id="diagnosisid" class="form-control" name="diagnosisid"></select>
                                                        <input hidden type="text" autocomplete="off" class="form-control form-control-sm" value="<?php echo $row["diagnosis"]; ?>" id="diagnosis" aria-describedby="numberlHelp" name="diagnosis">
                                                        <input hidden type="text" autocomplete="off" class="form-control form-control-sm" value="<?php echo $row["diagnosisdetail"]; ?>" id="diagnosisdetail" aria-describedby="numberlHelp" name="diagnosisdetail">

                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputEmail4">วันที่ใช้เลือด</label>
                                                        <input type="text" autocomplete="off" class="form-control form-control-sm date2" id="blood_use_date" aria-describedby="numberlHelp" onkeyup="getBloodUseDate()" value="<?php echo (!empty($row["blood_use_date"]) && $row["blood_use_date"] != '0000-00-00') ? date_format(date_create($row["blood_use_date"]), "d/m/Y") : ''; ?>" name="blood_use_date">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">หอผู้ป่วย</label>
                                                        <select id="unitofficeid" class="form-control form-control-sm" name="unitofficeid">
                                                            <option value="0">โปรดระบุ</option>
                                                            <?php
                                                            $strSQL = "SELECT * FROM unit_office ORDER BY unitofficeid ASC";
                                                            $objQuery = mysql_query($strSQL);
                                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                                            ?>
                                                                <option <?php if ($objResuut["unitofficeid"] == $row['unitofficeid']) {
                                                                            echo 'selected';
                                                                        } ?> value="<?php echo $objResuut["unitofficeid"]; ?>">
                                                                    <?php echo $objResuut["unitofficename"]; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-check-label">
                                                            <input onclick="setCheckMarkAutologousAppointment()" class="check2" type="checkbox" id="autologousisappointment" name="autologousisappointment" value="1" <?php if (!empty($row['autologousisappointment'])) {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        }  ?>>&nbsp;นัดหมาย Autologous
                                                        </label>
                                                        <input onchange="getAutologousAppointmentDate8()" type="text" class="form-control date1" id="autologousappointmentdate" placeholder="" value="<?php echo (!empty($row["autologousappointmentdate"]) && $row["autologousappointmentdate"] != '0000-00-00') ? date_format(date_create($row["autologousappointmentdate"]), "d/m/Y") : ''; ?>" name="autologousappointmentdate">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="form-check-label">สาเหตุการนัดหมาย</label>
                                                        <input type="text" class="form-control" id="autologousappointmentremark" placeholder="" value="<?php echo $row["autologousappointmentremark"]; ?>" name="autologousappointmentremark">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <button type="button" onclick="open_patient_modal()" class="btn btn-success m-l-5">
                                                            <span class="btn-label"><i class="fa fa-plus"></i></span>ดูผู้ป่วย
                                                        </button>
                                                    </div>
                                                </div>
                                            </fieldset>



                                        </div>
                                    </div><!-- end card-->
                                </div>

                                <div class="form-group col-md-12 margin-top-bottom-label-10-">
                                    <div class="row">
                                        <label><b>สถานที่</b></label>
                                        &nbsp;

                                        <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                            <label class="form-check-label">
                                                <input class="check2" type="radio" id="checkplaceid1" name="placeid" value="1" onclick="placeidClick(1)" <?php if ($row['placeid'] == 1 || empty($row['placeid'])) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }  ?>>
                                                &nbsp;
                                            </label>รพ.ราชวิถี
                                        </div>
                                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                            <label class="form-check-label">
                                                <input class="check2" type="radio" id="checkplaceid2" name="placeid" value="2" onclick="placeidClick(2)" <?php if ($row['placeid'] == 2) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }  ?>>&nbsp;
                                            </label>หน่วยเคลื่อนที่
                                            <a href="#" onclick="showCustomMoblieUnit()"><small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มหน่วยเคลื่อนที่</small></a>
                                        </div>
                                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                            <label class="form-check-label">
                                                <input class="check2" type="radio" id="checkplaceid3" name="placeid" value="3" onclick="placeidClick(3)" <?php if ($row['placeid'] == 3) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }  ?>>&nbsp;
                                            </label>กิจกรรม
                                            <a href="#" onclick="showActivity()"><small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มกิจกรรม</small></a>
                                        </div>

                                        &emsp;&emsp;|&emsp;&nbsp;

                                        <div id="placeid1">
                                            <label class="form-check-label">
                                                <input class="check3" type="radio" name="placetime" value="1" <?php if ($row['placetime'] == 1 || (empty($row['placetime'])) && ($row['placeid'] == 1 || empty($row['placeid']))) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?>>
                                                ในเวลา
                                            </label>
                                            <label class="form-check-label">
                                                <input class="check3" type="radio" name="placetime" value="2" <?php if ($row['placetime'] == 2) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?>> นอกเวลา
                                            </label>


                                        </div>

                                        <div id="placeid2" class="row" style="display:none;">
                                            <div class="row">
                                                &emsp;

                                                <select id="unitnameid" class="form-control form-control-sm unitnameid" name="unitnameid">
                                                </select>

                                            </div>
                                        </div>

                                        <div id="placeid3" class="row" style="display:none;">
                                            <div class="row">
                                                &emsp;
                                                <select id="activityid" class="form-control form-control-sm activityid" name="activityid">
                                                </select>

                                            </div>
                                        </div>

                                        &emsp;&emsp;|
                                        &emsp;&emsp;
                                        <label class="form-check-label">
                                            <input class="check2" type="checkbox" id="islab" name="islab" value="1" <?php if (!empty($row['islab'])) {
                                                                                                                        echo 'checked';
                                                                                                                    }  ?>>&nbsp;ส่ง Lab
                                        </label>

                                        &emsp;&emsp;|&emsp;&nbsp;

                                        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                            <label class="form-check-label">
                                                <input class="check2" type="checkbox" id="isunitoffice" name="isunitoffice" value="1" onclick="setUnitOffice(this)" <?php if (!empty($row['donor_isunitoffice'])) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }  ?>>&nbsp;เจ้าหน้าที่หน่วยงาน
                                            </label>
                                        </div>

                                        <div class="form-inline">
                                            <div id="isunitofficeblock" style="display:none;" class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <select style="width:250px;" id="departmentid" name="departmentid" class="form-control form-control-sm" data-search="true">
                                                    <option value="0">ระบุหน่วยงาน</option>
                                                    <?php
                                                    $strSQL = "SELECT * FROM department_  ORDER BY departmentid ASC";
                                                    $objQuery = mysql_query($strSQL);
                                                    while ($objResuut = mysql_fetch_array($objQuery)) {
                                                    ?>
                                                        <option <?php if ($objResuut["departmentid"] == $row['donor_departmentid']) {
                                                                    echo 'selected';
                                                                } ?> value="<?php echo $objResuut['departmentid']; ?>">
                                                            <?php echo $objResuut["departmentname"]; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <hr />
                                <!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->
                                <div class="form-group col-md-12 margin-top-bottom-label-10-5">
                                    <div class="row">

                                        <a role="button" href="#" onclick="showPageGetNeedleAndCard1()" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>รับเข็มผู้บริจาค</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a role="button" href="#" onclick="showPageGetNeedleAndCard2()" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>รับบัตรผู้บริจาค</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <?php
                                        if ($row['receivecard'] == 1) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะบัตร : รับบัตรแล้ว</p>';
                                        } elseif ($row['getcard'] == 1) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะบัตร : ขอรับบัตร</p>';
                                        } elseif ($row['getcard'] == 2) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะบัตร : กำลังดำเนินการ</p>';
                                        } elseif ($row['getcard'] == 3) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะบัตร : รับบัตรแล้ว</p>';
                                        }

                                        ?>

                                        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;

                                        <?php
                                        if ($row['receiveneedle'] == 1) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะเข็ม : รับเข็มแล้ว</p>';
                                        } elseif ($row['getneedle'] == 1) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะเข็ม : ขอรับเข็ม</p>';
                                        } elseif ($row['getneedle'] == 2) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะเข็ม : กำลังดำเนินการ</p>';
                                        } elseif ($row['getneedle'] == 3) {
                                            echo '<p style="color: red; font-size: 15px;">สถานะเข็ม : รับเข็มแล้ว</p>';
                                        }

                                        ?>

                                        <!-- <label class="margin-top-label-5" for="inputState">เข็มที่ระลึก</label>&nbsp;
                                    <select id="souvenirid" class="form-control form-control-sm" name="souvenirid"
                                        style="width:150px;">
                                        <option <?php if (empty($row['souvenirid'])) {
                                                    echo 'selected';
                                                }  ?> value="0">
                                            โปรดระบุ</option>
                                        <option <?php if ($row['souvenirid'] == 1) {
                                                    echo 'selected';
                                                }  ?> value="1">
                                            รอรับเข็มที่ระลึก
                                        </option>
                                        <option <?php if ($row['souvenirid'] == 2) {
                                                    echo 'selected';
                                                }  ?> value="2">
                                            รับเข็มที่ระลึกแล้ว
                                        </option>
                                    </select>
                                    &emsp;
                                    <label class="margin-top-label-5" for="inputState">ครั้งที่รับเข็มที่ระลึก</label>
                                    &nbsp;
                                    <select style="width:80px;" id="souvenirnum" class="form-control form-control-sm"
                                        name="souvenirnum">
                                        <option <?php if (empty($row['souvenirnum'])) {
                                                    echo 'selected';
                                                }  ?> value="0">
                                        </option>
                                        <option <?php if ($row['souvenirnum'] == 1) {
                                                    echo ' selected ';
                                                }  ?>value="1">1
                                        </option>
                                        <option <?php if ($row['souvenirnum'] == 7) {
                                                    echo ' selected ';
                                                }  ?>value="7">7
                                        </option>
                                        <option <?php if ($row['souvenirnum'] == 16) {
                                                    echo ' selected ';
                                                }  ?>value="16">
                                            16</option>
                                        <option <?php if ($row['souvenirnum'] == 24) {
                                                    echo ' selected ';
                                                }  ?>value="24">
                                            24</option>
                                        <option <?php if ($row['souvenirnum'] == 48) {
                                                    echo ' selected ';
                                                }  ?>value="48">
                                            48</option>
                                        <option <?php if ($row['souvenirnum'] == 60) {
                                                    echo ' selected ';
                                                }  ?>value="60">
                                            60</option>
                                        <option <?php if ($row['souvenirnum'] == 72) {
                                                    echo ' selected ';
                                                }  ?>value="72">
                                            72</option>
                                        <option <?php if ($row['souvenirnum'] == 84) {
                                                    echo ' selected ';
                                                }  ?>value="84">
                                            84</option>
                                        <option <?php if ($row['souvenirnum'] == 96) {
                                                    echo ' selected ';
                                                }  ?>value="96">
                                            96</option>
                                        <option
                                            <?php if ($row['souvenirnum'] == 108) {
                                                echo ' selected ';
                                            }  ?>value="108">
                                            108</option>
                                    </select>
                                    &emsp;

                                    <label class="margin-top-label-5">วันที่รับเข็มที่ระลึก</label>&nbsp;
                                    <input style="width:110px;" type="text" autocomplete="off"
                                        class="form-control form-control-sm date1" id="souvenirdate"
                                        aria-describedby="numberlHelp" onkeyup="getSouvenirDate()"
                                        value="<?php if (!empty($row["souvenirdate"])) {
                                                    echo date_format(date_create($row["souvenirdate"]), "d/m/Y");
                                                }  ?>"
                                        name="souvenirdate">
                                    &emsp;&emsp;

                                    <label class="margin-top-label-5">เจ้าหน้าที่ผู้จ่ายเข็ม</label>&nbsp;
                                    <select id="staffsouvenirid" class="form-control form-control-sm staffsouvenirid"
                                        style="width:200px;" name="staffsouvenirid">
                                        <option value="" selected>โปรดระบุ</option>
                                        <?php
                                        $strSQL = "SELECT * FROM staff WHERE isstaffsouvenirid = 1 ORDER BY id ASC";
                                        $objQuery = mysql_query($strSQL);
                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                        ?>
                                        <option
                                            <?php if ($objResuut["id"] == $row['staffsouvenirid']) {
                                                echo 'selected';
                                            } ?>
                                            value="<?php echo $objResuut['id']; ?>">
                                            <?php echo $objResuut["name"]; ?>
                                            <?php echo $objResuut["surname"]; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>

                                    </select>

                                    &emsp;|&emsp;

                                    <label style="margin-top:3px;" class="form-check-label">
                                        <input class="check2" type="checkbox" id="getcard" name="getcard" value="1"
                                            <?php if (!empty($row['getcard'])) {
                                                echo 'checked';
                                            }  ?>>&nbsp;ขอรับบัตร
                                    </label>
                                    &emsp;
                                    <label class="margin-top-label-5">วันที่รับบัตร</label>&nbsp;
                                    <input style="width:110px;" type="text" autocomplete="off"
                                        class="form-control form-control-sm date1" id="getcarddate"
                                        aria-describedby="numberlHelp" onkeyup="getCardDate()"
                                        value="<?php if (!empty($row["getcarddate"])) {
                                                    echo date_format(date_create($row["getcarddate"]), "d/m/Y");
                                                }  ?>"
                                        name="getcarddate">
                                    &emsp;
                                    <label class="margin-top-label-5">เจ้าหน้าที่ผู้จ่ายบัตร</label>&nbsp;
                                    <select style="width:180px;" id="staffcardid"
                                        class="form-control form-control-sm staffcardid" name="staffcardid">
                                        <option value="" selected>โปรดระบุ</option>
                                        <?php
                                        $strSQL = "SELECT * FROM staff WHERE isstaffcardid = 1 ORDER BY id ASC";
                                        $objQuery = mysql_query($strSQL);
                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                        ?>
                                        <option <?php if ($objResuut["id"] == $row['staffcardid']) {
                                                    echo 'selected';
                                                } ?>
                                            value="<?php echo $objResuut['id']; ?>">
                                            <?php echo $objResuut["name"]; ?>
                                            <?php echo $objResuut["surname"]; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>

                                    </select> -->
                                    </div>

                                </div>

                        </div>
                    </div>


                    <input type="hidden" id="donorid" name="donorid" value="<?php echo $row['donorid']; ?>" />
                    <input type="hidden" id="donateid" name="donateid" value="<?php echo $row['donateid']; ?>" />
                    <input type="hidden" id="donationdetail" name="donationdetail" value="<?php echo $row['donatenocauseid']; ?>" />
                    <input type="hidden" id="donatecode" name="donatecode" value="<?php echo $row['donatecode']; ?>" />
                    <input type="hidden" id="donorfile" name="donorfile" value="" />

                    <input type="hidden" id="address2" name="address2" value="<?php echo $row['address2']; ?>" />
                    <input type="hidden" id="provinceid" name="provinceid" value="<?php echo $row['provinceid']; ?>" />
                    <input type="hidden" id="districtid" name="districtid" value="<?php echo $row['districtid']; ?>" />
                    <input type="hidden" id="subdistrictid" name="subdistrictid" value="<?php echo $row['subdistrictid']; ?>" />

                    <input type="hidden" id="address2_current" name="address2_current" value="<?php echo $row['address2_current']; ?>" />
                    <input type="hidden" id="provincecurrentid" name="provincecurrentid" value="<?php echo $row['provincecurrentid']; ?>" />
                    <input type="hidden" id="districtcurrentid" name="districtcurrentid" value="<?php echo $row['districtcurrentid']; ?>" />
                    <input type="hidden" id="subdistrictcurrentid" name="subdistrictcurrentid" value="<?php echo $row['subdistrictcurrentid']; ?>" />

                    <input type="hidden" id="istube_after" name="istube_after" value="<?php echo $row['istube_after']; ?>" />
                    <input type="hidden" id="blood_invest_tube_edta_after" name="blood_invest_tube_edta_after" value="<?php echo $row['blood_invest_tube_edta_after']; ?>" />
                    <input type="hidden" id="blood_invest_tube_clotted_after" name="blood_invest_tube_clotted_after" value="<?php echo $row['blood_invest_tube_clotted_after']; ?>" />
                    <input type="hidden" id="blood_invest_tube_acd_after" name="blood_invest_tube_acd_after" value="<?php echo $row['blood_invest_tube_acd_after']; ?>" />

                    <input type="hidden" id="nottimedonate" name="nottimedonate" value="<?php echo $row['nottimedonate']; ?>" />

                    <div class="row">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-12">


                                    <div class="card-body ">

                                        <div class="container-fluid">
                                            <div class="row" style="margin-top:-20px;">
                                                <label><b>ประวัติส่วนบุคคล</b></label>
                                            </div>
                                        </div>

                                        <div class="container-fluid" style="margin-top:-5px;">
                                            <div class="row">
                                                <div class="form-group col-md-2"><label for="inputCity">เลขที่ผู้บริจาค</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="donorcode" name="donorcode" style="font-weight: bold;color:#dc3545;font-size: 20px;" value="<?php echo $row['donorcode']; ?>">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label id="label_red_donoridcard" for="inputEmail4">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="exampleInputEmail1">
                                                        <input class="check5" <?php if ($row['isidcardpassport'] == 1 || empty($row['isidcardpassport'])) {
                                                                                    echo 'checked';
                                                                                }  ?> onclick="isIDcardPassport(1)" type="radio" id="isidcardpassport1" name="isidcardpassport" value="1">
                                                        เลขที่บัตรประชาชน
                                                    </label>
                                                    <input type="hidden" id="notdonoridcard" name="notdonoridcard" value="<?php echo $row['notdonoridcard']; ?>" />
                                                    <input required type="text" autocomplete="off" value="<?php echo $row["donoridcard"]; ?>" class="form-control form-control-sm" id="donoridcard" style="font-weight: bold;color:#dc3545;font-size: 20px;" aria-describedby="emailHelp" onkeyup=check_number(this); name="donoridcard" onfocusout="checkDonorIDCard()">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label id="label_red_donorpassport" for="inputEmail4">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="exampleInputEmail1">
                                                        <input class="check5" <?php if ($row['isidcardpassport'] == 2) {
                                                                                    echo 'checked';
                                                                                }  ?> onclick="isIDcardPassport(2)" type="radio" id="isidcardpassport2" name="isidcardpassport" value="2">
                                                        Passport / บัตรต่างด้าว
                                                    </label>
                                                    <input type="text" autocomplete="off" value="<?php echo $row["donorpassport"]; ?>" class="form-control form-control-sm" id="donorpassport" style="font-weight: bold;color:#dc3545;font-size: 20px;" aria-describedby="emailHelp" name="donorpassport">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="inputEmail4">
                                                        <font color="red">*</font>&nbsp;
                                                    </label><label for="inputEmail4">คำนำหน้าชื่อ</label>
                                                    <?php echo "<script> var prefixid = '" . $row['prefixid'] . "'; </script>"  ?>
                                                    <select required class="prefixid form-control form-control-sm-select form-control form-control-sm" id="prefixid" name="prefixid"></select>
                                                    <a href="#" onclick="showCustomPrefix()"><small id="emailHelp" class="form-text text-muted">เพิ่มคำนำหน้าชื่อ</small></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="inputEmail4">
                                                        <font color="red">*</font>&nbsp;
                                                    </label><label for="fname">&nbsp;ชื่อ</label>
                                                    <input required type="text" autocomplete="off" class="form-control form-control-sm" style="font-weight: bold;color:#dc3545;font-size: 20px;" value="<?php echo $row["fname"]; ?>" id="fname" autocomplete="off" name="fname">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="lname">
                                                        <font color="red">*</font>&nbsp;นามสกุล
                                                    </label>
                                                    <input required type="text" autocomplete="off" class="form-control form-control-sm" value="<?php echo $row["lname"]; ?>" id="lname" style="font-weight: bold;color:#dc3545;font-size: 20px;" name="lname">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <div class="form-group">
                                                        <label for="inputEmail4">
                                                            <font color="red">*</font>&nbsp;<label for="inputEmail4">เพศ</label>
                                                            <div class="form-group">
                                                                <label class="form-check-label">
                                                                    <input onclick="setGenderPrefix(1)" class="check5" <?php if ($row['genderid'] == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        }  ?> type="radio" id="genderid1" name="genderid" value="1">
                                                                    ชาย
                                                                </label>
                                                                &emsp;&emsp;
                                                                <label class="form-check-label">
                                                                    <input onclick="setGenderPrefix(2)" class="check5" <?php if ($row['genderid'] == 2) {
                                                                                                                            echo 'checked';
                                                                                                                        }  ?> type="radio" id="genderid2" name="genderid" value="2">
                                                                    หญิง
                                                                </label>
                                                            </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="container-fluid" style="margin-top:-20px;margin-bottom:-25px">
                                            <div class="row">
                                                <div id="dob" class="col-md-1">
                                                    <label for="exampleInputEmail1">
                                                        <font color="red">*</font>&nbsp;วัน/เดือน/ปีเกิด
                                                    </label>
                                                    <input required type="text" autocomplete="off" value="<?php echo (!empty($row["donorbirthday"]) && $row["donorbirthday"] != "0000-00-00") ? date_format(date_create($row["donorbirthday"]), "d/m/Y") : ''; ?>" onchange="convertBE(); getAge(this);" class="form-control form-control-sm date2" id="donorbirthday" style="font-weight: bold;color:#dc3545;font-size: 20px;" aria-describedby="numberlHelp" name="donorbirthday" requried>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="inputEmail4">อายุ</label>
                                                    <input hidden type="number" autocomplete="off" value="<?php echo $row["donorage"]; ?>" class="form-control form-control-sm" id="donorage" aria-describedby="numberlHelp" name="donorage">
                                                    <input readonly type="text" autocomplete="off" value="<?php echo $row["donoragetext"]; ?>" class="form-control form-control-sm" style="font-weight: bold;color:#dc3545;font-size: 20px;" id="donoragetext" aria-describedby="numberlHelp" name="donoragetext">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="inputEmail4">เบอร์บ้าน</label>
                                                    <input type="text" autocomplete="off" value="<?php echo $row["donortelhome"]; ?>" class="form-control form-control-sm" id="donortelhome" aria-describedby="numberlHelp" name="donortelhome">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="address">
                                                        <font color="red"><b id='red_mobile'>*</b></font>&nbsp;
                                                        เบอร์มือถือ
                                                    </label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" value="<?php echo $row["donormobile"]; ?>" id="donormobile" autocomplete="off" name="donormobile" onfocusout="checkMobile()" required>
                                                    <input type="hidden" id="notmobile" name="notmobile" value="<?php echo $row['notmobile']; ?>" />
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="inputPassword4">E-mail</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" value="<?php echo $row["donoremail"]; ?>" id="donoremail" autocomplete="off" name="donoremail">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="address">
                                                        <!-- <font color="red">*</font>&nbsp; -->
                                                        อาชีพ
                                                    </label>
                                                    <select value="<?php echo $row["donoroccupation"]; ?>" class="form-control form-control-sm donoroccupation" id="donoroccupation" autocomplete="off" name="donoroccupation"></select>
                                                </div>

                                                <div id="donoroccupationotherblock" style="display:none;" class="form-group col-md-2">
                                                    <label for="inputPassword4">อาชีพอื่นๆ โปรดระบุ</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" value="<?php echo $row["donoroccupationother"]; ?>" id="donoroccupationother" autocomplete="off" name="donoroccupationother">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <div class="form-group">
                                                        <label for="inputEmail4">ที่อยู่จัดส่งจดหมาย</label>
                                                        <div class="form-group">
                                                            <label class="form-check-label">
                                                                <input class="check5" <?php if ($row['issendletter'] == 1) {
                                                                                            echo ' checked';
                                                                                        }  ?> type="radio" name="issendletter" value="1">
                                                                ตามบัตรประชาชน
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="check5" <?php if ($row['issendletter'] == 2 || empty($row['issendletter'])) {
                                                                                            echo 'checked';
                                                                                        }  ?> type="radio" name="issendletter" value="2">
                                                                ที่อยู่ปัจจุบัน
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <hr />

                                        <div class="container-fluid" style="margin-top:-10px;margin-bottom:-25px;">
                                            <div class="row">
                                                <div class="form-group col-md-1" style="margin-top:5px;">
                                                    <label><b>ที่อยู่ตาม<br />บัตรประชาชน</b></label>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="address">
                                                        <font color="red"><b id='addr' hidden>*</b></font>&nbsp;บ้านเลขที่
                                                    </label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address"]; ?>" id="address" name="address">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="address_moo">หมู่</label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_moo"]; ?>" id="address_moo" name="address_moo">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="address_alley">ซอย</label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_alley"]; ?>" id="address_alley" name="address_alley">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="address_street">ถนน</label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_street"]; ?>" id="address_street" name="address_street">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="address">
                                                        <font color="red">
                                                            <b id="addr" hidden>*</b>
                                                        </font>ค้นหาที่อยู่
                                                    </label>
                                                    <select class="form-control form-control-sm address2" id="addressselect" name="addressselect">
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="zipcode">
                                                        <font color="red">
                                                            <b id="zip" hidden>*</b>
                                                        </font>รหัสไปรษณีย์
                                                    </label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["zipcode"]; ?>" id="zipcode" name="zipcode">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="inputEmail4">
                                                        <font color="red">
                                                            <b id="county" hidden>*</b>
                                                        </font>ประเทศ
                                                    </label>
                                                    <?php echo "<script> var countryid = '" . $row['countryid'] . "'; </script>"  ?>
                                                    <select class="countryid form-control form-control-sm-select form-control form-control-sm" id="countryid" name="countryid"></select>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="container-fluid" style="margin-top:-12px;margin-bottom:-25px;">
                                            <div class="row">

                                                <div class="form-group col-md-1" style="margin-top:5px;">
                                                    <label><b>ที่อยู่ปัจจุบัน</b></label><button onclick="copyAddress()" type="button">คัดลอกที่อยู่</button>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="address_current">

                                                        <font color="red"><b id='add_curr' hidden>*</b></font>

                                                        บ้านเลขที่
                                                    </label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_current"]; ?>" id="address_current" name="address_current">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="address_moo_current">หมู่</label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_moo_current"]; ?>" id="address_moo_current" name="address_moo_current">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="address_alley_current">ซอย</label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_alley_current"]; ?>" id="address_alley_current" name="address_alley_current">
                                                </div>

                                                <div class="form-group col-md-2">

                                                    <label for="address_street_current">
                                                        <font color="red">
                                                            <b id="add_curr_st" hidden>*</b>
                                                        </font>ถนน
                                                    </label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["address_street_current"]; ?>" id="address_street_current" name="address_street_current">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="address2_current">
                                                        <font color="red">
                                                            <b id="curr_dis" hidden>*</b>
                                                        </font>ค้นหาที่อยู่
                                                    </label>
                                                    <select class="form-control form-control-sm address2_current" id="address2_current_select" name="address2_currentselect">
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="zipcode_current">
                                                        <font color="red">
                                                            <b id="curr_zip" hidden>*</b>
                                                        </font>รหัสไปรษณีย์
                                                    </label>
                                                    <input type="text" autocomplete="off" style="font-weight: bold;color:blue;" class="form-control form-control-sm" value="<?php echo $row["zipcode_current"]; ?>" id="zipcode_current" name="zipcode_current">
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <label for="inputEmail4">
                                                        <font color="red">
                                                            <b id="curr_county" hidden>*</b>
                                                        </font>ประเทศ
                                                    </label>
                                                    <?php echo "<script> var countrycurrentid = '" . $row['countrycurrentid'] . "'; </script>"  ?>
                                                    <select class="countrycurrentid form-control form-control-sm-select form-control form-control-sm" id="countrycurrentid" name="countrycurrentid"></select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div><!-- end card-->
                            </div>




                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header card-header-custom">
                                        <i class="fa fa-check-square-o"></i> รายละเอียดการบริจาค

                                    </div>

                                    <div class="card-body">


                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-12" style="margin-top:-20px;">
                                                    <label id="label_red_bag_type_id">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label>ชนิดถุง</label>
                                                    <select id="bag_type_id" class="form-control form-control-sm" name="bag_type_id">
                                                        <option value="">เลือกชนิดถุง</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM bag_type ORDER BY bagtypeid ASC";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php
                                                                    if ($row["bag_type_id"] == $objResuut['bagtypeid'] || $objResuut["bagtypeid"] == 1) {
                                                                        echo 'selected';
                                                                    }
                                                                    ?> value="<?php echo $objResuut['bagtypeid']; ?>">
                                                                <?php echo $objResuut['bagtypename']; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label id="label_red_bag_number">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label>หมายเลขถุง</label>
                                                    <input type="text" autocomplete="off" onkeyup="bagNumber()" onkeypress='return event.charCode >= 40 && event.charCode <= 57' class="form-control form-control-sm" id="bag_number" aria-describedby="numberlHelp" style="font-weight: bold;color:#dc3545;font-size: 20px;border: 2px solid;" value="<?php echo $row["bag_number"]; ?>" name="bag_number" maxlength="14">
                                                </div>
                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputEmail4">วันที่บริจาคล่าสุด</label>

                                                    <input type="text" autocomplete="off" class="form-control form-control-sm date1" id="last_donation_date" aria-describedby="numberlHelp" onkeyup="getBloodLastDonationDate()" value="<?php if (!empty($row["last_donation_date"])) {
                                                                                                                                                                                                                                            echo (!empty($row["last_donation_date"]) && $row["last_donation_date"] != '0000-00-00') ? date_format(date_create($row["last_donation_date"]), "d/m/Y") : '';
                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                            echo '';
                                                                                                                                                                                                                                        } ?>" name="last_donation_date">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputPassword4">เวลา</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="last_donation_time" aria-describedby="numberlHelp" onkeyup="getBloodLastDonationTime()" value="<?php echo (!empty($row["last_donation_time"])) ? $row["last_donation_time"] : ''; ?>" name="last_donation_time">
                                                </div>
                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputEmail4">วันที่บริจาค</label>

                                                    <input type="text" autocomplete="off" class="form-control form-control-sm date1" id="donation_date" aria-describedby="numberlHelp" onkeyup="getBloodDonationDate()" onchange="getBloodDonationDate()" value="<?php if (!empty($row["donation_date"])) {
                                                                                                                                                                                                                                                                        echo date_format(date_create($row["donation_date"]), "d/m/Y");
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        echo dateNowDMY();
                                                                                                                                                                                                                                                                    } ?>" name="donation_date">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputPassword4">เวลา</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="donation_time" aria-describedby="numberlHelp" onkeyup="getBloodDonationTime()" value="<?php echo (!empty($row["donation_time"])) ? $row["donation_time"] : date('H:i'); ?>" name="donation_time">
                                                </div>
                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputEmail4">วันที่ครบกำหนดบริจาค</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm date2" id="expired_date" aria-describedby="numberlHelp" onkeyup="getBloodExpDate()" value="<?php echo (!empty($row["expired_date"]) && $row["expired_date"] != '0000-00-00') ? date_format(date_create($row["expired_date"]), "d/m/Y") : ''; ?>" name="expired_date">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label id="label_red_donation_qty">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label>ครั้งที่บริจาค</label>
                                                    <input type="number" autocomplete="off" class="form-control form-control-sm" id="donation_qty" aria-describedby="numberlHelp" value="<?php echo (!empty($row["donation_qty"])) ? $row["donation_qty"] : '0'; ?>" name="donation_qty">
                                                    <input type="hidden" id="qty" name="qty" value="<?php echo (!empty($row["donation_qty"])) ? $row["donation_qty"] : '0'; ?>">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label id="label_red_blood_group">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label><b>หมู่เลือด</b></label>
                                                    <b><select id="blood_group" class="form-control form-control-sm" name="blood_group">
                                                            <option value="">โปรดระบุ</option>
                                                            <?php
                                                            $strSQL = "SELECT * FROM blood_group WHERE bloodgroupid != '' AND cordblood != 1 ORDER BY bloodgroupsort";
                                                            $objQuery = mysql_query($strSQL);
                                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                                            ?>
                                                                <option <?php if ($objResuut["bloodgroupid"] == $row['donor_blood_group']) {
                                                                            echo 'selected';
                                                                        } ?> value="<?php echo $objResuut["bloodgroupid"]; ?>">
                                                                    <?php echo $objResuut["bloodgroupname"] ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select></b>
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputPassword4">Rh</label>
                                                    <select id="rh" class="form-control form-control-sm" name="rh">
                                                        <option value="">โปรดระบุ</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM rh WHERE cordblood != 1 ORDER BY FIND_IN_SET(rhid,'Rh+,Rh-,Rh(D)')";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php if ($objResuut["rhid"] == $row['rh']) {
                                                                        echo 'selected';
                                                                    } ?> value="<?php echo $objResuut["rhid"]; ?>">
                                                                <?php echo $objResuut["rhname3"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>










                                            </div>
                                        </fieldset>



                                    </div>
                                </div><!-- end card-->
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header card-header-custom">
                                        <i class="fa fa-check-square-o"></i> การคัดกรองและผลการตรวจร่างกาย

                                    </div>

                                    <div class="card-body">

                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="form-group col-md-3" style="margin-top:-20px;">
                                                    <label id="label_weight">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">น้ำหนัก</label>
                                                    <input type="number" autocomplete="off" step="any" class="form-control form-control-sm" id="weight" aria-describedby="numberlHelp" value="<?php echo $row["weight"]; ?>" name="weight">
                                                </div>


                                                <div class="form-group col-md-3" style="margin-top:-20px;">
                                                    <label id="label_red_height">
                                                        <font color="red">*</font>&nbsp;
                                                    </label><label for="inputPassword4">ส่วนสูง</label>

                                                    <input type="number" autocomplete="off" step="any" class="form-control form-control-sm" value="<?php echo $row["height"]; ?>" id="height" autocomplete="off" name="height">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-20px;">
                                                    <label id="label_temperature">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">Temperature</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="temperature" aria-describedby="numberlHelp" value="<?php echo $row["temperature"]; ?>" name="temperature">
                                                </div>


                                                <div class="form-group col-md-3" style="margin-top:-10px;">
                                                    <label id="label_prebp1">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4" style="margin-left:-5px;">Pre-BP</label>
                                                    <input type="number" autocomplete="off" step="any" class="form-control form-control-sm" id="prebp1" aria-describedby="numberlHelp" value="<?php echo $row["prebp1"]; ?>" name="prebp1">
                                                </div>


                                                <div class="form-group col-md-3" style="margin-top:-10px;">
                                                    <label for="inputPassword4" style="margin-top:25px;margin-left:-13px;">/</label>

                                                    <input type="number" style="margin-top:-25px;" autocomplete="off" step="any" class="form-control form-control-sm" id="prebp2" autocomplete="off" value="<?php echo $row["prebp2"]; ?>" name="prebp2">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputPassword4">Remark Pre-BP</label>

                                                    <input type="text" autocomplete="off" step="any" class="form-control form-control-sm" id="remarkprebp" autocomplete="off" value="<?php echo $row["remarkprebp"]; ?>" name="remarkprebp">
                                                </div>

                                                <div class="form-group col-md-3" style="margin-top:-10px;">
                                                    <label for="inputEmail4">Post-BP</label>
                                                    <input type="number" autocomplete="off" step="any" class="form-control form-control-sm" id="postbp1" aria-describedby="numberlHelp" value="<?php echo $row["postbp1"]; ?>" name="postbp1">
                                                </div>


                                                <div class="form-group col-md-3" style="margin-top:-10px;">
                                                    <label for="inputPassword4" style="margin-top:25px;margin-left:-13px;">/</label>

                                                    <input type="number" style="margin-top:-25px;" autocomplete="off" step="any" class="form-control form-control-sm" id="postbp2" autocomplete="off" value="<?php echo $row["postbp2"]; ?>" name="postbp2">
                                                </div>

                                                <div class="form-group col-md-6" style="margin-top:-10px;">
                                                    <label for="inputPassword4">Remark Post-BP</label>

                                                    <input type="text" autocomplete="off" step="any" class="form-control form-control-sm" id="remarkpostbp" autocomplete="off" value="<?php echo $row["remarkpostbp"]; ?>" name="remarkpostbp">
                                                </div>

                                                <div class="form-group col-md-3" style="margin-top:-10px;">
                                                    <label id="label_pulse">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">Pulse</label>
                                                    <input type="number" autocomplete="off" step="any" class="form-control form-control-sm" id="pulse" aria-describedby="numberlHelp" value="<?php echo $row["pulse"]; ?>" name="pulse">
                                                </div>

                                                <div class="form-group col-md-9" style="margin-top:-10px;">
                                                    <label for="inputEmail4">Remark Pulse</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="remarkpulse" aria-describedby="numberlHelp" value="<?php echo $row["remarkpulse"]; ?>" name="remarkpulse">
                                                </div>

                                                <div class="form-group col-md-4" style="margin-top:-10px;">
                                                    <label id="label_hemoglobin">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">Hemoglobin</label>
                                                    <input type="number" autocomplete="off" step="any" class="form-control form-control-sm" id="hemoglobin" aria-describedby="numberlHelp" value="<?php echo $row["hemoglobin"]; ?>" name="hemoglobin">
                                                </div>
                                                <div class="form-group col-md-8" style="margin-top:-10px;">
                                                    <label for="inputEmail4">Remark Hemoglobin</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="remarkhemoglobin" aria-describedby="numberlHelp" value="<?php echo $row["remarkhemoglobin"]; ?>" name="remarkhemoglobin">
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label for="inputEmail4">Drug</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="drug" aria-describedby="numberlHelp" value="<?php echo $row["drug"]; ?>" name="drug">
                                                </div>

                                            </div>
                                        </fieldset>



                                    </div>
                                </div><!-- end card-->
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header card-header-custom">
                                        <i class="fa fa-check-square-o"></i>การคัดกรองและผลการตรวจร่างกาย
                                    </div>

                                    <div class="card-body">


                                        <div class="form-group row" style="margin-top:-20px;">
                                            <div class="col-sm-5">
                                                <label id="label_pulse_status">
                                                    <font color="red">*</font>&nbsp;
                                                </label>&nbsp;ชีพจร
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input id="pulse_status_1" class="check6" type="radio" Onclick="uncheck6_1()" <?php if ($row['pulse_status'] == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        }  ?> name="pulse_status" value="1"> ปกติ
                                                    </label>
                                                    &emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input id="1_pulse_status" class="check6" type="radio" Onclick="uncheck6_2()" <?php if ($row['pulse_status'] == 2) {
                                                                                                                                            echo 'checked';
                                                                                                                                        }  ?> name="pulse_status" value="2"> ไม่ปกติ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-top:-10px;">
                                            <div class="col-sm-5">&nbsp;&nbsp;&nbsp;ปอด/หัวใจ</div>
                                            <div class="col-sm-7">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="check8" type="radio" id="check8_1" Onclick="uncheck8_1()" <?php if ($row['pain_heart_status'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?> name="pain_heart_status" value="1"> ปกติ
                                                    </label>
                                                    &emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input class="check8" type="radio" id="check8_2" Onclick="uncheck8_2()" <?php if ($row['pain_heart_status'] == 2) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?> name="pain_heart_status" value="2"> ไม่ปกติ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-top:-10px;">
                                            <div class="col-sm-5">
                                                <label id="label_physical_status">
                                                    <font color="red">*</font>&nbsp;
                                                </label>ผลตรวจร่างกาย
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input id="physical_status_1" class="check7" type="radio" onclick="physicalExamination(1); uncheck7_1();" <?php if ($row['physical_status'] == 1) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }  ?> name="physical_status" value="1"> ปกติ
                                                    </label>
                                                    &emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input class="check7" type="radio" onclick="physicalExamination(2); uncheck7_2();" <?php if ($row['physical_status'] == 2) {
                                                                                                                                                echo 'checked';
                                                                                                                                            }  ?> id="1_physical_status" name="physical_status" value="2"> ไม่ปกติ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="physical_detail_check" style="display:none;" class="form-group col-md-12">

                                            <input type="text" autocomplete="off" class="form-control form-control-sm" id="physical_detail" aria-describedby="numberlHelp" value="<?php echo $row["physical_detail"]; ?>" name="physical_detail">
                                        </div>

                                        <div class="form-group row" style="margin-top:-10px;">
                                            <div class="col-sm-5">
                                                <label id="label_donation_status">
                                                    <font color="red">*</font>&nbsp;
                                                </label>สถานะการบริจาค
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="check9" type="radio" onclick="donationStatus(1);clickDonateStatusRemark();" <?php if ($row['donation_status'] == 1) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }  ?> id="donation_status1" name="donation_status" value="1">
                                                        ได้
                                                    </label>
                                                    &emsp;&emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input class="check9" type="radio" onclick="donationStatus(2);" <?php if ($row['donation_status'] == 2) {
                                                                                                                            echo 'checked';
                                                                                                                        }  ?> id="donation_status2" name="donation_status" value="2"> ไม่ได้
                                                    </label>
                                                </div>
                                            </div>
                                        </div>



                                        <div id="donation_detail_check" style="display:none;" class="form-group col-md-12" style="margin-top:-10px;">

                                            <select id="donatenocauseid" value="<?php echo $row['donatenocauseid']; ?>" class="form-control form-control-sm donatenocauseidselect" name="donatenocauseid" oninvalid="this.setCustomValidity('กรุณาระบุสาเหตุ บริจาคเลือดไม่ได้')" style="width: 280px;">
                                                <option value="">โปรดระบุ</option>
                                                <?php
                                                $strSQL = "SELECT * FROM donate_no_cause ORDER BY sort";
                                                $objQuery = mysql_query($strSQL);
                                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                                ?>
                                                    <option <?php if ($objResuut["donatenocauseid"] == $row['donatenocauseid']) {
                                                                echo 'selected';
                                                            } ?> value="<?php echo $objResuut["donatenocauseid"]; ?>">
                                                        <?php echo $objResuut["donatenocausename"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="div_donatenocausedetail" style="display:none;" class="form-group col-md-12">
                                            <label id="lable_donatenocausedetail" class="form-check-label">ระบุ</label>
                                            <input type="text" class="form-control form-control-sm " id="donatenocausedetail" placeholder="" value="<?php echo $row["donatenocausedetail"]; ?>" name="donatenocausedetail">
                                        </div>

                                        <div class="form-group col-md-3" style="margin-top:-10px;">
                                            <a role="button" href="#" onclick="showPageCheckBlood()" class="btn btn-primary btn-sm"><span class="btn-label"><i class="fa fa-check"></i></span>ประวัติผลติดเชื้อ/ปลดล็อคเลือด</a>

                                        </div>


                                        <fieldset class="form-group">
                                            <div class="row">

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label id="label_bag_staff_id">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">เจ้าหน้าที่เตรียมถุง</label>
                                                    <select id="bag_staff_id" class="form-control form-control-sm bag_staff_id" name="bag_staff_id" onchange="focus_dropdown1(1)">
                                                        <option value="" selected>โปรดระบุ</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM staff WHERE isbaggagestaff = 1 ORDER BY id ASC";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php if ($objResuut["id"] == $row['bag_staff_id']) {
                                                                        echo 'selected';
                                                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                                                <?php echo $objResuut["name"] . '|' . $objResuut["code"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>


                                                    </select>
                                                </div>


                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label id="label_blood_driller_id">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">ผู้เจาะโลหิต</label>

                                                    <select id="blood_driller_id" class="form-control form-control-sm blood_driller_id" name="blood_driller_id" onchange="focus_dropdown1(2)">
                                                        <option value="" selected>โปรดระบุ</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM staff WHERE isblooddriller = 1 ORDER BY id ASC";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php if ($objResuut["id"] == $row['blood_driller_id']) {
                                                                        echo 'selected';
                                                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                                                <?php echo $objResuut["name"] . '|' . $objResuut["code"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label id="label_inspectorid">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">ลงชื่อผู้ตรวจ</label>
                                                    <select id="inspectorid" class="form-control form-control-sm inspectorid" name="inspectorid" onchange="focus_dropdown1(3)">
                                                        <option value="" selected>โปรดระบุ</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM staff WHERE isinspector = 1 ORDER BY id ASC";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php if ($objResuut["id"] == $row['inspectorid']) {
                                                                        echo 'selected';
                                                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                                                <?php echo $objResuut["name"] . '|' . $objResuut["code"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label id="label_staff_screening">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">เจ้าหน้าที่คัดกรอง</label>
                                                    <select id="staff_screening" class="form-control form-control-sm staff_screening" name="staff_screening">
                                                        <option value="" selected>โปรดระบุ</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM staff ORDER BY id ASC";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php if ($objResuut["id"] == $row['staff_screening']) {
                                                                        echo 'selected';
                                                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                                                <?php echo $objResuut["name"] . '|' . $objResuut["code"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label id="label_experienced_staff">
                                                        <font color="red">*</font>&nbsp;
                                                    </label>
                                                    <label for="inputEmail4">เจ้าหน้าที่ผู้ประสบณ์ปัญหา</label>
                                                    <select id="experienced_staff" class="form-control form-control-sm experienced_staff" name="experienced_staff">
                                                        <option value="" selected>โปรดระบุ</option>
                                                        <?php
                                                        $strSQL = "SELECT * FROM staff ORDER BY id ASC";
                                                        $objQuery = mysql_query($strSQL);
                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                        ?>
                                                            <option <?php if ($objResuut["id"] == $row['experienced_staff']) {
                                                                        echo 'selected';
                                                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                                                <?php echo $objResuut["name"] . '|' . $objResuut["code"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <?php
                                        $sql = "SELECT COUNT(donation_status) AS numbe  , donorid
                                        FROM donate
                                        WHERE donation_status = 1
                                        AND donorid = '$donorid'";


                                        $result = mysqli_query($conn, $sql);
                                        $check_first;
                                        if (mysqli_num_rows($result) > 0) {

                                            $check_first = mysqli_fetch_assoc($result);
                                        }

                                        ?>
                                        <input type="hidden" id="check_first" name="check_first" value="<?php echo $check_first['numbe']; ?>" />
                                    </div>
                                </div><!-- end card-->
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header card-header-custom">
                                        <i class="fa fa-check-square-o"></i>ปัญหาของการรับบริจาค

                                    </div>

                                    <div class="card-body">

                                        <fieldset class="form-group">
                                            <div class="row">


                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label for="inputEmail4">ปัญหาของการรับบริจาค</label>
                                                    <select id="donationproblemsid" class="form-control form-control-sm donationproblemsid" onchange="check_orther_problem(this)" name="donationproblemsid">
                                                    </select>

                                                </div>

                                                <div class="form-group col-md-12" id="donationproblemsdetail_div" style="margin-top:-10px;" hidden>
                                                    <input type="text" autocomplete="off" id="donationproblemsdetail" value="<?php echo $row["donationproblemsdetail"]; ?>" class="form-control form-control-sm donationproblemsdetail" name="donationproblemsdetail">
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label for="inputEmail4">ปฏิกิริยาหลังเจาะ</label>
                                                    <select id="donatereactionid" class="form-control form-control-sm donatereactionid" name="donatereactionid">
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label for="inputEmail4">งดรับบริจาค</label>
                                                    <select id="donatenostatusid" class="form-control form-control-sm donatenostatusid" name="donatenostatusid">
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label for="inputEmail4">สาเหตุการงดรับบริจาค</label>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="donatenocauseremark" aria-describedby="numberlHelp" value="<?php echo $row["donatenocauseremark"]; ?>" name="donatenocauseremark">
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">

                                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                        <label class="form-check-label" style="margin-bottom:20px">
                                                            <input hidden class="check2" type="checkbox" id="isdonateremark" name="isdonateremark" value="1" checked>
                                                            <input disabled class="check2" type="checkbox" id="isdonateremarkshow" name="isdonateremarkshow" value="1" checked>&nbsp;หมายเหตุ
                                                        </label>
                                                        &emsp;&emsp;

                                                    </div>
                                                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="donateremark" aria-describedby="numberlHelp" style="margin-top:-20px;" value="<?php echo $row["donateremark"]; ?>" name="donateremark">
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <label for="inputEmail4">รายงานอุบัติการณ์</label>
                                                    <textarea rows="7" cols="30" style="height:80px;resize:none;" id="remarkaccident" name="remarkaccident" class="form-control form-control-sm"><?php echo $row["remarkaccident"]; ?></textarea>
                                                </div>

                                                <div class="form-group col-md-12" style="margin-top:-10px;">
                                                    <a role="button" href="#" onclick="showCBC()" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>ลงผล CBC ล่วงหน้า</a>

                                                </div>


                                            </div>
                                        </fieldset>

                                    </div>
                                </div><!-- end card-->
                            </div>

                            <?php include("blood-donor-record-sdp-data.php"); ?>

                            <div class="div-save">
                                <div class="save-bottom">
                                    <div class="form-group text-right m-b-0">

                                        <?php if ((($row['prcused'] != 1)
                                                && ($row['lprcused'] != 1)
                                                && ($row['ffpused'] != 1)
                                                && ($row['pcused'] != 1)
                                                && ($row['lppcused'] != 1)
                                                && ($row['lppc_pasused'] != 1)
                                                && ($row['sdpused'] != 1)
                                                && ($row['sdp_pasused'] != 1)
                                                && ($row['wbused'] != 1)
                                                && ($row['ldprcused'] != 1)
                                                && ($row['sdrused'] != 1)
                                                && ($row['crpused'] != 1)
                                                && ($row['cryoused'] != 1))
                                            || checkPermission("EDIT_DONATE", "ED")

                                        ) { ?>
                                            <?php if ((checkPermission("BK_DONATE", "AD") && empty($id)) ||  (checkPermission("BK_DONATE", "ED") && !empty($id))) { ?>
                                                <button class="btn btn-primary" name="submit" type="submit">
                                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                                </button>
                                            <?php } ?>
                                        <?php } ?>

                                        <?php if (checkPermission("BK_DONATE", "AD")) { ?>
                                            <button type="button" onclick="newPage()" class="btn btn-success m-l-5">
                                                <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                                            </button>
                                        <?php } ?>
                                        <button type="button" onclick="listPage()" class="btn btn-info m-l-5">
                                            <span class="btn-label"><i class="fa fa-search"></i></span>รายการรับบริจาค
                                        </button>

                                        <button type="button" onclick="showDocument()" class="btn btn-info m-l-5">
                                            <span class="btn-label"><i class="fa fa fa-file-text-o"></i></span>แนบไฟล์
                                        </button>

                                        <button type="button" onclick="showSmartCardModal()" class="btn btn-info m-l-5">
                                            <span class="btn-label"><i class="fa fa-address-card"></i></span>เครื่องอ่านบัตร
                                        </button>

                                        <button type="button" onclick="delete_this_donate()" class="btn btn-danger m-l-5">
                                            <span class="btn-label"><i class="fa fa-trash"></i></span>ลบรายการ
                                        </button>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END container-fluid -->

                    </div>
                    <!-- END content -->

                </div>
                <!-- END content-page -->
                <?php include('blood-donor-record-modal.php'); ?>
                <?php include('blood-donor-record-list-patient.php'); ?>
                <?php include('blood-donor-record-change-name-modal.php'); ?>
                <?php include('blood-donor-record-change-passport-modal.php'); ?>
                <?php include('blood-donor-record-bloodgroup-modal.php'); ?>
                <?php include('blood-donor-record-get-card-modal.php'); ?>
                <?php include('blood-donor-record-prefix-modal.php'); ?>
                <?php include('blood-donor-record-moblie-unit-modal.php'); ?>
                <?php include('blood-donor-record-machine-modal.php'); ?>
                <?php include('blood-donor-record-lost-modal.php'); ?>
                <?php include('blood-donor-record-activity-modal.php'); ?>
                <?php include('blood-donor-record-check-modal.php'); ?>
                <?php include('blood-donor-record-document-modal.php'); ?>
                <?php include('blood-donor-record-cbc-modal.php'); ?>
                <?php include('blood-donor-record-smart-card-modal.php'); ?>



                <?php include('formprint.php'); ?>
                <?php include 'footer.php'; ?>
            <?php } else {

            header('Location:index.php');
        }

            ?>

            </div>
            <!-- END main -->
            <script>
                var placeid = <?php echo $row['placeid']; ?> + '';
                var donation_get_type_id = <?php echo $row['donation_get_type_id']; ?> + '';
                var physical_status = <?php echo $row['physical_status']; ?> + '';
                var donation_status = <?php echo $row['donation_status']; ?> + '';
                var genderid = <?php echo $row['genderid']; ?> + '';
                var donorbirthday = new Date(<?php echo $row['donorbirthday']; ?>);
                var subdistrictid = <?php echo $row['subdistrictid']; ?> + '';
                var subdistrictcurrentid = <?php echo $row['subdistrictcurrentid']; ?> + '';
                var donoroccupation = <?php echo $row['donoroccupation']; ?> + '';
                var donationproblemsid = <?php echo $row['donationproblemsid']; ?> + '';
                var donatereactionid = <?php echo $row['donatereactionid']; ?> + '';
                var donatenostatusid = <?php echo $row['donatenostatusid']; ?> + '';
                var machineid = "<?php echo $row['machineid']; ?>";
                var problemmachineid = <?php echo json_encode($row['problemmachineid']);  ?>;
                var problemdonorid = <?php echo json_encode($row['problemdonorid']); ?>;
                var problemproductid = <?php echo json_encode($row['problemproductid']); ?>;
                var problemhumanid = <?php echo json_encode($row['problemhumanid']); ?>;
                var isconfirmblooddonation = <?php echo $row['isconfirmblooddonation']; ?> + '';
                var docconfirmblooddonation = <?php echo "'" . $row['docconfirmblooddonation'] . "'"; ?> + '';
                var countryid = <?php echo "'" . $row['countryid'] . "'"; ?> + '';
                var countrycurrentid = <?php echo "'" . $row['countrycurrentid'] . "'"; ?> + '';
                var hpcount = 0;
                var donation_type_id = <?php echo $row['donation_type_id']; ?> + '';
                var isidcardpassport = <?php echo $row['isidcardpassport']; ?> + '';
                var sdpdonateisappointment = <?php echo $row['sdpdonateisappointment']; ?> + '';
                var autologousisappointment = <?php echo $row['autologousisappointment']; ?> + '';

                var diagnosisid = <?php echo json_encode($row['diagnosisid']); ?> + '';
                var diagnosis = <?php echo json_encode($row['diagnosis']); ?>;
                var diagnosisdetail = <?php echo json_encode($row['diagnosisdetail']); ?>;

                var cardreader_config = "<?php echo $cardreader_config; ?>";

                var chl_step2 = "<?php echo $id; ?>";
            </script>
            <script language="JavaScript">
                function check_number(v) {
                    var id_card = v.value.replace(/-/g, "");
                    id_card = id_card.replace(/_/g, "");
                    console.log(id_card);
                    if (id_card.length == 13) {
                        if (!checkID(id_card)) {
                            swal({
                                    title: 'ขออภัยค่ะ!',
                                    text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
                                    type: "warning",
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                    confirmButtonClass: "btn-danger",
                                    closeOnConfirm: true
                                },
                                function() {
                                    document.getElementById("donoridcard").value = "";
                                    document.getElementById("donoridcard").focus();
                                });
                        }

                    }
                }

                function delete_this_donate() {
                    var id = $('#donateid').val();
                    swal({
                            title: "ยืนยันจะลบรายการนี้ ใช่ หรือ ไม่",
                            html: true,
                            text: '',
                            type: "warning",
                            showCancelButton: true,
                            cancelButtonText: "ยกเลิก",
                            confirmButtonText: 'ยืนยัน',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function() {
                            // alert(id);
                            $.ajax({
                                type: 'GET',
                                dataType: 'json',
                                url: 'data/delete_this_donate.php',
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    myAlertTopDelete();

                                    var delayInMilliseconds = 2000;
                                    setTimeout(function() {
                                        reload_window();
                                    }, delayInMilliseconds);

                                },
                                error: function(data) {
                                    console.log("errrrr");
                                },
                            });
                        });

                }

                function reload_window() {
                    location.reload();
                }

                function checkID(id) {

                    if (id == "")
                        return false;

                    id = id.replace(/-/g, "");
                    id = id.replace(/_/g, "");
                    if (id.length != 13) return false;
                    for (i = 0, sum = 0; i < 12; i++)
                        sum += parseFloat(id.charAt(i)) * (13 - i);
                    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
                        return false;
                    return true;
                }

                function printCard() {
                    var id = $('#donorid').val();

                    printJS({
                        printable: localurl + "/report/blood-donor.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printCard2() {
                    var id = $('#donorid').val();

                    printJS({
                        printable: localurl + "/report/blood-donor2.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printAccident() {
                    var id = $('#donateid').val();
                    printJS({
                        printable: localurl + "/report/blood-donate-accident.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printAppointment() {
                    var id = $('#donateid').val();
                    printJS({
                        printable: localurl + "/report/blood-donor-appointment.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printRegister() {
                    var id = $('#donateid').val();
                    printJS({
                        printable: localurl + "/report/blood-donor-register.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function hiddenprintremark() {
                    if (document.getElementById("donateprintcertificateid99").checked == true) {
                        document.getElementById("donateprintcertificateother").hidden = false;
                    } else {
                        document.getElementById("donateprintcertificateother").hidden = true;

                    }
                }

                function printCertificate() {
                    var id = $('#donateid').val();
                    var user_login = document.getElementById("name_login").innerHTML;
                    swal({
                            title: "ต้องการขอใบรับรองการบริจาคเพื่อ",
                            html: true,
                            text: '<input type="radio" onchange="hiddenprintremark()" id="donateprintcertificateid1" name="donateprintcertificateid" value="1">&nbsp;' +
                                '<label ">จิตอาสา</label>&nbsp;&nbsp;' +
                                '<input type="radio" onchange="hiddenprintremark()" id="donateprintcertificateid2" name="donateprintcertificateid" value="2">&nbsp;' +
                                '<label ">ลางาน</label>&nbsp;&nbsp;' +
                                '<input  type="radio" onchange="hiddenprintremark()" id="donateprintcertificateid99" name="donateprintcertificateid" value="99">&nbsp;' +
                                '<label ">อื่นๆ</label>&nbsp;&nbsp;' +
                                '<input type="text" hidden autocomplete="off" value="" class="form-control" id="donateprintcertificateother" name="donateprintcertificateother">',
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: 'บันทึก',
                            cancelButtonText: "ปิด",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm) {

                            if (isConfirm) {

                                var donateprintcertificateid = ''
                                var donateprintcertificateother = $("#donateprintcertificateother").val();
                                var donateid = $('#donateid').val();
                                if (document.getElementById("donateprintcertificateid1").checked) {
                                    donateprintcertificateid = '1';
                                } else if (document.getElementById("donateprintcertificateid2").checked) {
                                    donateprintcertificateid = '2';
                                } else if (document.getElementById("donateprintcertificateid99").checked) {
                                    donateprintcertificateid = '99';
                                }

                                if (donateprintcertificateid == '99' && donateprintcertificateother == "") {
                                    setTimeout(function() {
                                        swal({
                                                title: "กรุณาระบุรายละเอียดด้วย",
                                                type: "warning",
                                                showCancelButton: false,
                                                confirmButtonText: 'ตกลง',
                                                // confirmButtonClass: "btn-danger",
                                                closeOnConfirm: true
                                            },
                                            function() {
                                                setTimeout(function() {
                                                    printCertificate();
                                                }, 500);

                                            });
                                    }, 500);

                                    return false;
                                }

                                if (donateprintcertificateid == '') {
                                    setTimeout(function() {
                                        swal({
                                                title: "กรุณาระบุรายละเอียดด้วย",
                                                type: "warning",
                                                showCancelButton: false,
                                                confirmButtonText: 'ตกลง',
                                                // confirmButtonClass: "btn-danger",
                                                closeOnConfirm: true
                                            },
                                            function() {
                                                setTimeout(function() {
                                                    printCertificate();
                                                }, 500);

                                            });
                                    }, 500);

                                    return false;
                                }

                                spinnershow();
                                $.ajax({
                                    url: 'blood-donor-record-certificate-item-insert.php?donateprintcertificateid=' +
                                        donateprintcertificateid + "&donateprintcertificateother=" +
                                        donateprintcertificateother + "&donateid=" + donateid + "&fullname=" + user_login,
                                    dataType: 'json',
                                    type: 'get',
                                    complete: function() {
                                        var delayInMilliseconds = 200;
                                        setTimeout(function() {
                                            spinnerhide();
                                        }, delayInMilliseconds);
                                    },
                                    success: function(data) {
                                        console.log(data)
                                        if (data.status == true) {
                                            printJS({
                                                printable: localurl + "/report/blood-donor-certificate.php?id=" + id + "&user_login=" + user_login,
                                                type: 'pdf',
                                                showModal: true
                                            });
                                        } else {
                                            myAlertTopError();
                                        }
                                    },
                                    error: function(d) {
                                        /*console.log("error");*/
                                        alert("404. Please wait until the File is Loaded.");
                                    }
                                });



                            }
                        });


                }

                function printConfirmBlood() {
                    // console.log(localurl+"/uploads/"+docconfirmblooddonation);
                    printJS({
                        printable: localurl + "/uploads/" + docconfirmblooddonation,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printSingleDonorPlatelet() {
                    var id = $('#donateid').val();

                    var sdpprodyltyield = "";
                    var sdpprodcount = "";
                    var sdpprodunit = "";
                    var sdpprodvolume = "";

                    var sdpprodyltyield1 = $("#sdpprodyltyield1").val();
                    var sdpprodyltyield2 = $("#sdpprodyltyield2").val();


                    var sdpprodcount1 = $("#sdpprodcount1").val();
                    var sdpprodcount2 = $("#sdpprodcount2").val();
                    var sdpprodunit1 = $("#sdpprodunit1").val();
                    var sdpprodunit2 = $("#sdpprodunit2").val();
                    var sdpresultvolume = $("#sdpresultvolume").val();
                    var sdpprodvolume1 = $("#sdpprodvolume1").val();
                    var sdpprodvolume2 = $("#sdpprodvolume2").val();

                    if (sdpresultvolume == "" || sdpresultvolume == "1" || sdpresultvolume == "0") {
                        sdpprodunit = sdpprodunit1;
                        sdpprodcount = sdpprodcount1;
                        sdpprodyltyield = sdpprodyltyield1;
                        sdpprodvolume = sdpprodvolume1;
                    } else {
                        sdpprodyltyield = sdpprodyltyield2;
                        sdpprodunit = sdpprodunit2;
                        sdpprodcount = sdpprodcount2;
                        sdpprodvolume = sdpprodvolume2;
                    }

                    printJS({
                        printable: localurl + "/report/blood-single-donor-platelet-sdp.php?id=" + id +
                            "&sdpprodyltyield=" + sdpprodyltyield + "&sdpprodunit=" + sdpprodunit +
                            "&sdpprodcount=" + sdpprodcount + "&sdpprodvolume=" + sdpprodvolume,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printFormAutologousBloodDonation() {
                    var id = $('#donateid').val();

                    printJS({
                        printable: localurl + "/report/blood-donation-autologous-blood-donation-transfusion.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printAutologousBloodDonation() {
                    var id = $('#donateid').val();
                    printJS({
                        printable: localurl + "/report/blood-donation-autologous-blood-donation-3.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printAutologousBloodDonationSticker() {
                    var id = $('#donateid').val();
                    printJS({
                        printable: localurl + "/report/blood-donation-autologous-sticker.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function printDirectBloodDonation() {
                    var id = $('#donateid').val();
                    printJS({
                        printable: localurl + "/report/blood-donation-autologous-blood-donor-3.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function editPage(id) {
                    window.location.href = 'blood-donor-record.php?id=' + id;
                }
            </script>
            <script src="assets/js/modernizr.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/plugins/jquery-ui/jquery.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/moment.min.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/popper.min.js?ref=<?php echo rand(); ?>"></script>


            <script src="assets/js/detect.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/fastclick.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.blockUI.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.nicescroll.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.scrollTo.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/plugins/switchery/switchery.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/bootstrap.min.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/sweetalert/sweetalert.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/sweetalert/sweetalert.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/datepickerFormat.js?ref=<?php echo rand(); ?>"></script>

            <!-- App js -->
            <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/EnterNext.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.maskedinput.min.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/mgs.js?ref=<?php echo rand(); ?>"></script>


            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                // $(document).ready(function() {
                //     donateid = $('input[name="donation_type_id"]').val();
                //     console.log(donateid)
                // });                                                                                                     

                $('.check5').click(function() {
                    v = $('input[name="isidcardpassport"]:checked').val()
                    if (v == '2') {
                        $('#donorpassport').prop('required', true)
                    } else {
                        $('#donorpassport').prop('required', false)
                    }
                    // console.log(v)
                })


                $('#sdpresultvolume').keyup(function() {
                    $("#volumesplit").css("display", "block");
                });

                $('#bag_type_id').change(function() {
                    v = $(this).val();
                    if (v == 8) {
                        setSDPShow(2)
                        $('#donation_type_id2').prop('checked', true)
                    }
                });

                $('#blood_group').change(function() {
                    $('#showblood').val($(this).val());
                });

                $('#donatenocauseid').on('select2:select', function(e) {
                    var data = e.params.data;
                    console.log('erere');
                    console.log(data);
                    console.log('erere');
                });


                function checkMobile() {
                    var mobile = document.getElementById("donormobile").value;
                    if (mobile.length != 11 && $("#notmobile").val() == "" && $("#donateid").val() != "") {

                        swal({
                                title: "เบอร์มือถือไม่ถูกต้อง",
                                type: "input",
                                inputPlaceholder: "หากไม่ทราบเบอร์โทรโปรดระบุสาเหตุ",
                                showCancelButton: true,
                                confirmButtonText: 'ไม่ทราบเบอร์โทร',
                                cancelButtonText: 'ระบุเบอร์โทร',
                                closeOnConfirm: true
                            },
                            function(v) {

                                if (v) {
                                    $("#donateremark").val(v);
                                    document.getElementById("donormobile").required = false;
                                    document.getElementById("notmobile").value = 1;
                                    document.getElementById("red_mobile").style.display = "none";

                                } else {
                                    console.log("-------");
                                    document.getElementById("donormobile").focus();
                                }

                            });
                    }
                }

                function checkDonorIDCard() {


                    setTimeout(function() {

                        var cardid = document.getElementById("donoridcard").value;
                        cardid = cardid.replace(/-/g, "");
                        cardid = cardid.replace(/_/g, "");
                        if (cardid.length != 13 && $("#notdonoridcard").val() == "" && $("#donateid").val() == "" && document.getElementById("isidcardpassport1").checked) {

                            swal({
                                    title: "รหัสประชาชนไม่ถูกต้อง",
                                    type: "input",
                                    inputPlaceholder: "หากไม่ทราบรหัสประชาชนโปรดระบุสาเหตุ",
                                    showCancelButton: true,
                                    confirmButtonText: 'ไม่ทราบรหัสประชาชน',
                                    cancelButtonText: 'ระบุรหัสประชาชน',
                                    closeOnConfirm: true
                                },
                                function(v) {
                                    if (v) {
                                        $("#donateremark").val(v);
                                        document.getElementById("donoridcard").required = false;
                                        document.getElementById("notdonoridcard").value = 1;
                                        document.getElementById("label_red_donoridcard").style.visibility = "hidden";

                                    } else {
                                        console.log("*********");
                                        document.getElementById("donoridcard").focus();
                                    }

                                });
                        }

                    }, 100);


                }



                $(document).ready(function() {

                    if (chl_step2 > 0) {
                        document.getElementById("donoroccupation").required = true;
                    }


                    // id = $('#donorid').val();
                    // if(id != ''){
                    //     console.log('required')
                    //     $('#bag_staff_id').prop('required',true)
                    //     $('#blood_driller_id').prop('required',true)
                    //     $('#inspectorid').prop('required',true)
                    // }


                    $('#donoridcard').mask('9-9999-99999-99-9');
                    $('#donormobile').mask('999-9999999');



                    if (isidcardpassport == 0) {
                        isidcardpassport = 1
                    }

                    isIDcardPassport(isidcardpassport);
                    setBtnChangeName();
                    setBtnGetCard();
                    setBtnChangePassport();
                    setBtnChangePassport();
                    dateTimeBE('.date1');
                    dateBE('.date2');
                    setPrintAutologousDirect(donation_get_type_id);

                    function myAlertTop() {
                        $(".myAlert-top").show();
                        setTimeout(function() {
                            $(".myAlert-top").hide();
                        }, 5000);
                    }

                    function myAlertTopError() {
                        $(".myAlert-top-error").show();
                        setTimeout(function() {
                            $(".myAlert-top-error").hide();
                        }, 5000);
                    }



                    if (status == 'successful') {
                        myAlertTop();
                    } else if (status == 'error') {
                        myAlertTopError();
                    }


                });



                function resetPage() {
                    location.reload();
                }

                function newPage() {
                    window.location.href = 'blood-donor-record.php';
                }

                function closePage() {
                    $("#customModal").modal("hide");
                    $("#patient_modal").modal('hide');

                }

                function closeChangeNamePage() {
                    $("#customChangeNameModal").modal("hide");
                }

                function closeChangePassportPage() {
                    $("#customChangePassportModal").modal("hide");
                }

                function showPageLost() {
                    loadTableLost();
                    $("#lostModal").modal("show");

                }


                function closePageLost() {
                    $("#lostModal").modal("hide");
                }

                function showPageCheckBlood() {
                    // loadTableLost();
                    document.getElementById("defaultOpen").click();
                    loadRepeatInfectionTable();
                    loadTableCheckBlood();
                    $("#bloodCheckModal").modal("show");

                }

                function closePageCheckBlood() {

                    $("#bloodCheckModal").modal("hide");

                }

                function showDocument() {
                    loadDocumentTable();
                    $("#bloodDocumentModal").modal("show");

                }

                function closeDocument() {
                    $("#bloodDocumentModal").modal("hide");
                }



                function showCustomPrefix() {
                    loadPrefixTable();
                    $("#customPrefixModal").modal("show");

                }

                function closeCustomPrefix() {
                    $("#customPrefixModal").modal("hide");
                }

                function showCustomMachine() {
                    loadMachineTable();
                    $("#customMachineModal").modal("show");

                }

                function closeCustomMachine() {
                    $("#customMachineModal").modal("hide");
                }

                function showCustomMoblieUnit() {
                    loadMoblieUnitTable();
                    $("#customMoblieUnitModal").modal("show");

                }

                function closeMoblieUnit() {
                    $("#customMoblieUnitModal").modal("hide");

                }

                function showActivity() {
                    loadActivityTable();
                    $("#customActivityModal").modal("show");

                }

                function closeActivity() {
                    $("#customActivityModal").modal("hide");

                }

                function showSmartCardModal() {
                    loadSmartCard();
                    $("#customSmartcardModal").modal("show");

                }

                function showCBC() {

                    $("#bloodCBCModal").modal("show");

                }

                function closeCBC() {
                    $("#bloodCBCModal").modal("hide");

                }

                function closeGetCard() {
                    $("#customGetCardModal").modal("hide");

                }


                function closePageReset() {
                    location.reload();

                }

                function listPage() {
                    window.location.href = 'blood-donor-record-list.php';
                }

                function openTab(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                function myAlertTopErrorLogin() {
                    $(".myAlert-top-error-login").show();
                    setTimeout(function() {
                        $(".myAlert-top-error-login").hide();
                    }, 5000);
                }

                function myAlertTopError() {
                    $(".myAlert-top-error").show();
                    setTimeout(function() {
                        $(".myAlert-top-error").hide();
                    }, 5000);
                }

                function myAlertTopPofile() {
                    $(".myAlert-top-pofile").show();
                    setTimeout(function() {
                        $(".myAlert-top-pofile").hide();
                    }, 5000);
                }

                /////////  radiobotton กดติ๊กออกได้
                var check6_1 = 0;
                var check6_2 = 0;

                function uncheck6_1() {
                    if (check6_1 % 2 == 0) {
                        document.getElementById("pulse_status_1").checked = true;
                        check6_1++;
                    } else {
                        document.getElementById("pulse_status_1").checked = false;
                        check6_1--;
                    }
                }

                function uncheck6_2() {
                    if (check6_2 % 2 == 0) {
                        document.getElementById("1_pulse_status").checked = true;
                        check6_2++;
                    } else {
                        document.getElementById("1_pulse_status").checked = false;
                        check6_2--;
                    }
                }

                var check8_1 = 0;
                var check8_2 = 0;

                function uncheck8_1() {
                    if (check8_1 % 2 == 0) {
                        document.getElementById("check8_1").checked = true;
                        check8_1++;
                    } else {
                        document.getElementById("check8_1").checked = false;
                        check8_1--;
                    }
                }

                function uncheck8_2() {
                    if (check8_2 % 2 == 0) {
                        document.getElementById("check8_2").checked = true;
                        check8_2++;
                    } else {
                        document.getElementById("check8_2").checked = false;
                        check8_2--;
                    }
                }

                var check7_1 = 0;
                var check7_2 = 0;

                function uncheck7_1() {
                    if (check7_1 % 2 == 0) {
                        document.getElementById("physical_status_1").checked = true;
                        check7_1++;
                    } else {
                        document.getElementById("physical_status_1").checked = false;
                        check7_1--;
                    }
                }

                function uncheck7_2() {
                    if (check7_2 % 2 == 0) {
                        document.getElementById("1_physical_status").checked = true;
                        check7_2++;
                    } else {
                        document.getElementById("1_physical_status").checked = false;
                        document.getElementById("physical_detail").required = false;
                        document.getElementById("physical_detail_check").style.display = "none";
                        check7_2--;
                    }
                }
                var check9_1 = 0;
                var check9_2 = 0;

                function uncheck9_1() {
                    if (check9_1 % 2 == 0) {
                        document.getElementById("donation_status1").checked = true;
                        check9_1++;
                    } else {
                        document.getElementById("donation_status1").checked = false;
                        check9_1--;
                    }
                }

                function uncheck9_2() {
                    if (check9_2 % 2 == 0) {
                        document.getElementById("donation_status2").checked = true;
                        check9_2++;
                    } else {
                        document.getElementById("donation_status2").checked = false;
                        document.getElementById("donatenocauseid").required = false;
                        document.getElementById("donation_detail_check").style.display = "none";
                        check9_2--;
                    }
                }

                function convertBE() {
                    var bdate = document.getElementById("donorbirthday").value;
                    var substr = bdate.substr(-4, 4);
                    var n = substr.includes("/");
                    var date = new Date();
                    // alert("data");

                    if (n == true) {
                        var substr2 = bdate.substr(-2, 2);
                        var test = "25" + substr2;
                        var daymounth = bdate.replace(substr2, "");
                        var data = daymounth + "" + "" + test;
                        document.getElementById("donorbirthday").value = data;
                        // alert(data);

                    } else {
                        var fullyear = date.getFullYear() + 543;
                        var daymounth = bdate.replace(substr, "");
                        var get = fullyear - substr;
                        if (get >= 543) {
                            var convert = parseInt(substr) + 543;

                            var data = daymounth + "" + "" + convert;
                            document.getElementById("donorbirthday").value = data;
                            // alert(data);
                        }
                    }



                }


                function showPageGetNeedleAndCard1() {
                    // loadTableLost();
                    document.getElementById("defaultOpen_needle").click();
                    // loadRepeatInfectionTable();
                    // loadTableCheckBlood();
                    $("#GetNeedleAndCardModal").modal("show");

                }

                function showPageGetNeedleAndCard2() {
                    // loadTableLost();
                    document.getElementById("defaultOpen_card").click();
                    // loadRepeatInfectionTable();
                    // loadTableCheckBlood();
                    $("#GetNeedleAndCardModal2").modal("show");

                }

                function closePageGetNeedleAndCardModal() {
                    var getcard = document.getElementById("getneedle").checked;
                    var staffcardid = document.getElementById("staffneedleid").value;

                    var receiveneedle = document.getElementById("receiveneedle").checked;
                    var receivestaffneedleid = document.getElementById("receivestaffneedleid").value;
                    if (getcard == true || receiveneedle == true) {
                        if (staffcardid == '' || staffcardid == 0) {
                            swal({
                                title: "โปรดระบุ เจ้าหน้าที่ทำการขอเข็มบริจาค",
                                type: 'warning',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            });

                            return false;
                        } else if (receiveneedle == true && receivestaffneedleid == '' || receiveneedle == true && receivestaffneedleid == 0) {
                            swal({
                                title: "โปรดระบุ เจ้าหน้าที่ทำการรับเข็มบริจาค",
                                type: 'warning',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            });

                            return false;
                        } else {
                            $("#GetNeedleAndCardModal").modal("hide");
                        }
                    } else {
                        $("#GetNeedleAndCardModal").modal("hide");

                    }




                }

                function closePageGetNeedleAndCardModal2(status) {
                    var getcard = document.getElementById("getcard").checked;
                    var staffcardid = document.getElementById("staffcardid").value;
                    if (getcard == true) {
                        if (staffcardid == '' || staffcardid == 0) {
                            swal({
                                title: "โปรดระบุ เจ้าหน้าที่ทำการขอบัตร",
                                type: 'warning',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            });
                        } else {
                            $("#GetNeedleAndCardModal2").modal("hide");
                        }
                    } else {
                        $("#GetNeedleAndCardModal2").modal("hide");

                    }
                }

                var Decimal_3 = 0;

                // function autoDecimal_3() {
                //     var integer = document.getElementById("hemoglobin").value;
                //     var float = parseFloat(integer) || 0;
                //     var decimal = float.toFixed(1);

                //     if (Decimal_3 == 0) {
                //         document.getElementById("hemoglobin").value = decimal;
                //         Decimal_3++;
                //     }
                // }

                $(document).ready(function() {
                    $("input,select").bind("keydown", function(event) {
                        if (event.which === 13) {
                            event.stopPropagation();
                            event.preventDefault();
                            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
                        }
                    });

                    $('#hemoglobin').keydown(function() {
                        var integer = $(this).val();
                        var float = parseFloat(integer) || 0;
                        var decimal = float.toFixed(1);


                        var keycode = (event.keyCode ? event.keyCode : event.which);
                        if (keycode == '13') {
                            document.getElementById("hemoglobin").value = decimal;
                            Decimal_3++;
                        }

                    });

                });



                $(document).ready(function() {


                    $("#donatenocauseid").select2({
                        width: "100%",
                        theme: "bootstrap",
                        allowClear: true,
                        placeholder: 'โปรดระบุ',
                    });
                    // $('.select2').select2({
                    //     allowClear: true,
                    //     width: "100%",
                    //     theme: "bootstrap",
                    //     tags:true,
                    //     placeholder:'โปรดระบุ',
                    // }).on('select2:close',function(){
                    //     var element = $(this);
                    //     var new_category = $.trim(element.val());
                    //     if(new_category != ''){
                    //         $.ajax({
                    //             url:"data/masterdata/addpatientcause.php",
                    //             method:"POST",
                    //             data:{donatenocausename:new_category},
                    //             success:function(data)
                    //             {
                    //                 console.log(data)
                    //                 if(data == 'yes'){
                    //                     element.append('<option value ="'+new_category+'">'+new_category+'</option>').val(new_category);

                    //                 }
                    //             }
                    //         })
                    //     }
                    // });
                    var loadsearch = 0;
                    var timers = setInterval(Timers, 100);
                    var donateid = $("#donateid").val();

                    function Timers() {
                        if (loadsearch == 0 && donateid == "") {
                            $('#search').select2('open');
                            loadsearch++;
                        }
                    }

                });


                if ($("#donateid").val() == "") {
                    document.getElementById("donormobile").required = false;
                    document.getElementById("red_mobile").style.display = "none";

                    // document.getElementById("donoridcard").required = true;
                    // document.getElementById("label_red_donoridcard").style.visibility = "visible";

                } else {
                    document.getElementById("donormobile").required = true;
                    document.getElementById("red_mobile").style.display = "block";

                    // document.getElementById("donoridcard").required = false;
                    // document.getElementById("label_red_donoridcard").style.visibility = "hidden";

                }
            </script>

            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-sdp.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event-prefixid.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event-machine.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event-repeat-infection.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event-moblie-unit.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event-activity.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-event-document.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/custom/donate/blood-donate-event.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/custom/donate/blood-donor-smartcard.js?ref=<?php echo rand(); ?>"></script>


            </form>


            <script>
                function focus_dropdown1(chk) {
                    // if (chk == 1) {
                    //     $('#blood_driller_id').select2('open');
                    // } else if (chk == 2) {
                    //     $('#inspectorid').select2('open');
                    // } else if (chk == 3) {
                    //     $('#staff_screening').select2('open');
                    // }
                }

                function check_orther_problem(html) {
                    var donationproblemsid = document.getElementById("donationproblemsid").value;
                    if (donationproblemsid == 99) {
                        document.getElementById("donationproblemsdetail_div").hidden = false;
                    } else {
                        document.getElementById("donationproblemsdetail_div").hidden = true;
                    }
                }
                /*
                $('.donatenocauseidselect').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    tags: true,
                    placeholder: 'โปรดระบุ',
                }).on('select2:close', function() {
                    var element = $(this);
                    var new_category = $.trim(element.val());
                    if (new_category != '') {
                        $.ajax({
                            url: "data/masterdata/addpatientcause.php",
                            method: "POST",
                            data: {
                                donatenocausename: new_category
                            },
                            success: function(data) {
                                console.log(data)
                                if (data == 'yes') {
                                    element.append('<option value ="' + new_category + '">' + new_category + '</option>').val(new_category);

                                }
                            }
                        })
                    }
                }).on("select2:selecting", function(e) {

                    setTimeout(function() {

                        setDonateNoCauseDetail();

                    }, 200);

                });
                */

                // $('.donatenocauseidselect').select2({
                //     allowClear: true,
                //     width: "100%",
                //     theme: "bootstrap",
                //     tags: true,
                //     placeholder: 'โปรดระบุ',
                // }).on("select2:selecting", function(e) {

                //     // setTimeout(function() {

                //     //     setDonateNoCauseDetail();

                //     // }, 200);

                // });

                spinnerhide();

                if (editState == 1) {
                    loadTable(stateDonate = true)
                }

                if (diagnosisid != 'null')
                    setDataModalSelectValue('diagnosisid', diagnosisid, diagnosisdetail + '|' + diagnosis);
            </script>
    </body>

    </html>