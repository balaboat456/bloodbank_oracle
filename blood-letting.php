<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    include('checkPermission.php');

    if (!checkPermission("BK_BLOOD_LETTING", "VW")) {
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

        <title>บันทึกข้อมูลการทำ Blood Letting</title>

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

        <style>
            input[type=checkbox] {
                width: 17px;
                height: 17px;
            }

            .select2-container.select2-container-disabled .select2-choice {
                background-color: #ddd;
                border-color: #a8a8a8;
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

            .modal {
                padding: 0px !important;
            }

            .modal-header {
                background-color: #272361;
                color: #fff;
                border-top-left-radius: 0px;
                border-top-right-radius: 0px;
            }

            .modal-dialog {
                margin: 0px;
                padding-right: 0px !important;
                max-width: 100% !important;
                height: 100% !important;
            }

            .modal-body {
                height: 100% !important;
                min-height: 80vh;
            }

            .modal-content {
                border-radius: 0px;
            }

            th,
            td {
                text-align: center;
                vertical-align: middle !important;
            }

            .td-table {
                padding: 1px !important;
            }

            .div-anti {
                background-color: #f8f9fa;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                height: 40px;
            }

            .font_patient {
                font-size: 20px;
            }
        </style>
        <script>
            var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
        </script>
    </head>




    <body class="adminbody">

        <?php include 'preload.php' ?>


        <div class="myAlert-top alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> บันทึกข้อมูลสำเร็จ
        </div>
        <div class="myAlert-top-error alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> บันทึกข้อมูลล้มเหลว
        </div>
        <div class="myAlert-top-delete alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> ยกเลิกข้อมูลสำเร็จ
        </div>
        <div class="myAlert-top-error-delete alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> ยกเลิกข้อมูลล้มเหลว
        </div>
        <div id="main">

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
                            <div id="mainform" class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left"> บันทึกข้อมูลการทำ Blood Letting</h1>
                                    <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <form role="form" id="myform" method="POST" action="" enctype="multipart/form-data">

                            <input id="patientid" name="patientid" type="text" hidden>
                            <input id="bloodlettingid" name="bloodlettingid" type="text" hidden>
                            <input id="hn" name="hn" type="text" hidden>

                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">HN</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="scanhn" class="form-control" id="scanhn" onkeyup="setNewHN(this)" autofocus>
                                </div>

                            </div>


                            <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->

                            <p>
                            <div class="row" style="margin-bottom: -30px;margin-top: -20px;">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <img id="img_profile" src="assets/images/profile.png" class="img-profile" alt="Smiley face" height="170" width="160"><br />
                                        <label class="label-name-blod-icon"><i class="fa fa-tint"></label></i><label>&nbsp;&nbsp;Bl.Gr. </label>
                                        &nbsp;&nbsp;<label id="patientbloodgroup" class="label-name-bloodgroup">-</label>
                                    </div>
                                </div>

                                <div hidden class="form-group col-md-1">
                                    <label>WT -</label><br>
                                    <label>BT -</label><br>
                                    <label>HR -</label><br>
                                    <label>Temp. -</label><br>
                                    <label>BMI -</label><br>
                                    <label>LOS - Days</label><br>
                                </div>
                                <div hidden class="form-group col-md-1">
                                    <label>HT -</label><br>
                                    <label></label><br>
                                    <label>RR -</label><br>
                                    <label>Pain -</label><br>
                                    <label>BSA -</label><br>
                                </div>
                                <div class="form-group col-md-3 font_patient">
                                    <label>HN</label> <label id="patienthn" class="label-name">-</label><br>
                                    <label>AN</label> <label id="patientan" class="label-name">-</label><br>
                                    <label>ID</label> <label id="patientidcard" class="label-name">-</label><br>
                                    <label>ประเภทผู้ป่วย <label id="patient_type" class="label-name">-</label></label><br>

                                </div>
                                <div class="form-group col-md-6 font_patient">
                                    <label>ชื่อ-นามสกุล</label> <label class="label-name" id="patientfullname">-</label><br>
                                    <label>อายุ</label> <label id="patientage" class="label-name">-</label>
                                    <label>ปี</label><br>
                                    <label>เพศ</label> <label id="patientgender" class="label-name">-</label><br>
                                    <label>สิทธิการรักษา </label> <label id="patientinsurance" class="label-name">-</label><br>
                                </div>
                            </div>

                    </div>
                    </p>

                    <div class="form-group col-md-12">
                        <h4>ประวัติการทำ Blood Letting</h4>
                        <div class="table-s-scroll">

                            <table id="list_table_blood_letting">

                                <thead>
                                    <tr>
                                        <th class="td-table" style="width:180px">วัน-เวลาที่ทำ</th>
                                        <th class="td-table" style="width:250px">แพทย์ผู้สั่งทำ</th>
                                        <th class="td-table">รายงานผล</th>
                                        <th class="td-table" style="width:250px">ผู้ทำ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> รายละเอียดการ Blood letting</h3>

                            </div>

                            <div class="card-body">

                                <fieldset class="form-group">
                                    <div class="row">



                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">หน่วยงานที่สั่งทำ</label>
                                            <select required id="unitofficeid" class="form-control" name="unitofficeid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">แพทย์ผู้สั่งทำ</label>
                                            <select required id="doctorid" class="form-control" name="doctorid">
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">

                                        </div>
                                        <div class="form-group col-md-3"><label>Diagnosis</label>
                                            <input required type="text" autocomplete="off" value="" class="form-control" id="diagnosis" name="diagnosis">
                                        </div>

                                        <div class="form-group col-md-7"><label>-</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="diagnosisdetail" name="diagnosisdetail">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ชนิดถุง</label>
                                            <select required id="bagtypeid" class="form-control" name="bagtypeid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2"><label>Volume</label>
                                            <div class="input-group ">
                                                <select selected name="volume" id="volume" class="form-control">
                                                    <option selected value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Unit</span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group col-md-1"><label>-</label>
                                            <div class="input-group ">
                                                <input type="number" class="form-control" id="volume_ml" name="volume_ml">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">ml</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group col-md-1">
                                            <!-- <select name="volumeunit" id="volumeunit" class="form-control">
                                                <option value="unit">Unit</option>
                                                <option value="cc">cc</option>
                                            </select> -->
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">ปัญหาการเจาะเก็บ</label>
                                            <select id="lettingproblemid" class="form-control" name="lettingproblemid">
                                            </select>
                                        </div>
                                        <div id="lettingproblemotherblock" style="display:none;" class="form-group col-md-2">
                                            <label for="inputPassword4">สาเหตุโปรดระบุ</label>
                                            <input type="text" autocomplete="off" class="form-control form-control" value="" id="lettingproblemother" autocomplete="off" name="lettingproblemother">
                                        </div>
                                        <div class="form-group col-md-3"><label>ส่งต่อ</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="forward" name="forward">
                                        </div>
                                        <div class="form-group col-md-3" id="lettingproblemotheremply_1" style="display:none;">

                                        </div>
                                        <div class="form-group col-md-6" id="lettingproblemotheremply_2" style="display:block;">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">ผู้ทำ</label>
                                            <select id="usercreate" class="form-control" name="usercreate" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputEmail4">วันที่ทำ</label>
                                            <input type="text" autocomplete="off" class="form-control date1" id="bloodlettingdatetime" value="<?php echo dateNowDMY(); ?>" name="bloodlettingdatetime">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputEmail4">เวลาที่ทำ</label>
                                            <input type="text" autocomplete="off" class="form-control" id="bloodlettingtime" value="<?php echo date('H:i'); ?>" name="bloodlettingtime">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">ผู้บันทึก</label>
                                            <input readonly type="text" autocomplete="off" value="<?php echo $_SESSION["fullname"]; ?>" class="form-control" id="usersave" name="usersave">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">วันที่บันทึก</label>

                                            <input readonly type="text" autocomplete="off" class="form-control " id="bloodlettingdatetimesave" value="<?php echo (!empty($fromdate)) ? $fromdate : dateNowDMY(); ?>" name="bloodlettingdatetimesave">
                                        </div>
                                        <!-- <div class="form-group col-md-12"><label>หมายเหตุ</label>
                                            <textarea id="remark" name="remark" class="form-control"></textarea>
                                        </div> -->


                                    </div>
                                </fieldset>



                            </div>
                        </div><!-- end card-->
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> แบบประเมินความดันโลหิตผู้ป่วยทำ Blood Letting</h3>

                            </div>

                            <div class="card-body">

                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>รายการ</th>
                                                        <th>ก่อน</th>
                                                        <th>หลัง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>ความดันโลหิต</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" autocomplete="off" value="" class="form-control form-control-md" id="pressure_before_1" name="pressure_before_1">
                                                                </div>
                                                                <h5 style="padding-top: 7px;">/</h5>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" autocomplete="off" value="" class="form-control form-control-md" id="pressure_before_2" name="pressure_before_2">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label style="padding-top: 7px;">
                                                                        mmHg
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <input type="text" autocomplete="off" value="" class="form-control form-control-sm" id="pressure_before" name="pressure_before" hidden>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" autocomplete="off" value="" class="form-control form-control-md" id="pressure_after_1" name="pressure_after_1">
                                                                </div>
                                                                <h5 style="padding-top: 7px;">/</h5>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" autocomplete="off" value="" class="form-control form-control-md" id="pressure_after_2" name="pressure_after_2">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label style="padding-top: 7px;">
                                                                        mmHg
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <input type="text" autocomplete="off" value="" class="form-control" id="pressure_after" name="pressure_after" hidden>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ชีพจร</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" autocomplete="off" value="" class="form-control form-control-md" id="pulse_before_1" name="pulse_before_1">
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label style="padding-top: 7px;">
                                                                        ครั้ง/นาที
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <input type="text" autocomplete="off" value="" class="form-control" id="pulse_before" name="pulse_before" hidden>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" autocomplete="off" value="" class="form-control form-control-md" id="pulse_after_1" name="pulse_after_1">
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label style="padding-top: 7px;">
                                                                        ครั้ง/นาที
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <input type="text" autocomplete="off" value="" class="form-control" id="pulse_after" name="pulse_after" hidden>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>อาการ</td>
                                                        <td>
                                                            <input type="radio" id="symptom_before1" name="symptom_before" value="1">&nbsp;ปกติ&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" id="symptom_before2" name="symptom_before" value="2">&nbsp;ผิดปกติ
                                                            <input type="text" autocomplete="off" value="" class="form-control" id="symptom_detail_before" name="symptom_detail_before">
                                                        </td>
                                                        <td>
                                                            <input type="radio" id="symptom_after1" name="symptom_after" value="1">&nbsp;ปกติ&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" id="symptom_after2" name="symptom_after" value="2">&nbsp;ผิดปกติ
                                                            <input type="text" autocomplete="off" value="" class="form-control" id="symptom_detail_after" name="symptom_detail_after">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ผู้ประเมิน</td>
                                                        <td>
                                                            <!-- <select id="user_before" class="form-control form-control-sm user_before" name="user_before">
                                                                <option value="" selected>โปรดระบุ</option>
                                                            </select> -->
                                                            <select required id="user_before" class="form-control" name="user_before">
                                                            </select>
                                                            <!-- <input type="text" autocomplete="off" value="" class="form-control" id="user_before" name="user_before"> -->
                                                        </td>
                                                        <td>
                                                            <select required id="user_after" class="form-control" name="user_after">
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr hidden id="user_opd">
                                                        <td>ผู้ประเมิน 2</td>
                                                        <td>
                                                            <select id="user_before2" class="form-control" name="user_before2">
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select id="user_after2" class="form-control" name="user_after2">
                                                            </select>

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group col-md-6"><label>รายงานผล</label>
                                            <textarea id="remark2" name="remark2" class="form-control"></textarea>
                                            <br>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">นัดหมายครั้งถัดไป</label>

                                                    <input type="text" autocomplete="off" class="form-control date1" id="appointment" value="" name="appointment">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">ระบุการนัดหมาย</label>

                                                    <input type="text" autocomplete="off" class="form-control " id="appoittext" value="" name="appoittext">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </fieldset>



                            </div>
                        </div><!-- end card-->
                    </div>

                </div>

                <div class="div-save">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <div>
                                <button class="btn btn-primary" type="submit">
                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                </button>
                                <button hidden id="editbloodletting" class="btn btn-warning" type="button" onclick="editBloodLetting()">
                                    <span class="btn-label"><i class="fa fa-save"></i></span>แก้ไข
                                </button>
                                <button type="button" onclick="newBloodLetting()" class="btn btn-success m-l-5">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                                </button>
                                <button onclick="reportPrintletting()" class="btn btn-light" type="button">
                                    <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์รายงาน
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- END content-page -->
                <?php include('formprint.php'); ?>
                <?php include 'footer.php'; ?>
            <?php } else {

            header('Location:index.php');
        }

            ?>

            </div>
            <!-- END main -->

            <script language="JavaScript">



            </script>
            <script src="assets/js/modernizr.min.js"></script>
            <script src="assets/plugins/jquery-ui/jquery.js"></script>
            <script src="assets/js/moment.min.js"></script>

            <script src="assets/js/popper.min.js"></script>


            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/jquery.nicescroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="assets/plugins/switchery/switchery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>

            <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
            <script src="assets/sweetalert/sweetalert.js"></script>
            <script src="assets/sweetalert/sweetalert.min.js"></script>
            <script src="assets/js/datepickerFormat.js"></script>
            <script src="assets/js/spinner.js"></script>
            <script src="assets/js/menu.js"></script>
            <!-- App js -->
            <script src="assets/js/pikeadmin.js"></script>

            <script src="assets/js/EnterNext.js"></script>
            <script src="assets/js/FindData.js"></script>
            <script src="assets/js/DateTimeFormat.js"></script>
            <script src="assets/js/Replace.js"></script>
            <script src="assets/printJS/print.min.js"></script>
            <script src="assets/js/jquery.maskedinput.min.js"></script>

            <script src="assets/js/custom/blood-letting/blood-letting-select.js"></script>
            <script src="assets/js/custom/blood-letting/blood-letting-loadtable.js"></script>
            <script src="assets/js/custom/blood-letting/blood-letting-event.js"></script>

            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                function reportPrintletting() {
                    // var id = $("#bloodlettingid").val();
                    // alert(id);
                    var id = document.getElementById("bloodlettingid").value;

                    printJS({
                        printable: localurl + "/report/blood-letting-report.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });

                }

                $(document).ready(function() {
                    dateBE('.date1');

                    $('#bloodlettingdatetime').mask('99/99/9999');
                    $('#bloodlettingtime').mask('99:99');

                    $("#volume_ml").change(function() {

                        var volume_ml = $(this).val();
                        // console.log(volume_ml);
                        if (volume_ml < 300) {
                            document.getElementById("lettingproblemid").required = true;
                            // console.log("น้อยกว่า");
                            // alert('น้อยกว่า');
                        } else {
                            document.getElementById("lettingproblemid").required = false;
                            // console.log("มากกว่า");
                            // alert('มากกว่า');
                        }

                    });
                    $('#myform').submit(function() {

                        if (document.getElementById('patientid').value == "") {
                            swal({
                                    title: "กรุณาระบุผู้ป่วยก่อน",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        document.getElementById('scanhn').focus;
                                    }
                                });

                            return false;
                        }

                        var data = getFormData($("#myform"));
                        // console.log(data);


                        var ml = document.getElementById("volume_ml").value;
                        var problemid = document.getElementById("lettingproblemid").value;
                        var volume = document.getElementById("volume").value;
                        // console.log(ml);

                        if (ml < 300 && problemid == "" && volume == "") {
                            // console.log(problemid);
                            swal({
                                    title: "กรุณาปัญหาการเจาะเก็บ",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        document.getElementById('lettingproblemid').focus;
                                    }
                                });

                            return false;

                        } else {
                            spinnershow();
                            document.getElementById("lettingproblemid").required = false;
                            $.ajax({
                                type: 'POST',
                                url: 'blood-letting-save.php',
                                data: data,
                                dataType: "json",
                                complete: function() {
                                    var delayInMilliseconds = 200;
                                    setTimeout(function() {
                                        spinnerhide();
                                    }, delayInMilliseconds);
                                },
                                success: function(data) {

                                    if (data.status) {
                                        myAlertTop();
                                        loadTable(document.getElementById('hn').value, data.state);
                                        document.getElementById("bloodlettingdatetime").value = getDMY543();
                                    } else {
                                        myAlertTopError();
                                    }

                                },
                                error: function(data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                    spinnerhide();
                                    myAlertTopError();
                                },
                            });
                            return false;
                        }

                    });

                    function getFormData($form) {
                        var unindexed_array = $form.serializeArray();
                        var indexed_array = {};

                        $.map(unindexed_array, function(n, i) {
                            indexed_array[n['name']] = n['value'];
                        });
                        return indexed_array;
                    }


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


                });

                function newPage() {
                    window.location.href = 'blood-letting.php';
                }

                function myAlertTopDelete() {
                    $(".myAlert-top-delete").show();
                    setTimeout(function() {
                        $(".myAlert-top-delete").hide();
                    }, 5000);
                }

                function myAlertTopErrorDelete() {
                    $(".myAlert-top-error-delete").show();
                    setTimeout(function() {
                        $(".myAlert-top-error-delete").hide();
                    }, 5000);
                }

                //////////////////////////////////
                $("#pressure_before_1").keyup(function() {
                    var pressure_before_1 = document.getElementById("pressure_before_1").value;
                    var pressure_before_2 = document.getElementById("pressure_before_2").value;
                    var data = pressure_before_1 + "/" + pressure_before_2;
                    document.getElementById("pressure_before").value = data;
                });
                $("#pressure_before_2").keyup(function() {
                    var pressure_before_1 = document.getElementById("pressure_before_1").value;
                    var pressure_before_2 = document.getElementById("pressure_before_2").value;
                    var data = pressure_before_1 + "/" + pressure_before_2;
                    document.getElementById("pressure_before").value = data;
                });
                ////////////////////////////////////
                $("#pressure_after_1").keyup(function() {
                    var pressure_after_1 = document.getElementById("pressure_after_1").value;
                    var pressure_after_2 = document.getElementById("pressure_after_2").value;
                    var data = pressure_after_1 + "/" + pressure_after_2;
                    document.getElementById("pressure_after").value = data;
                });
                $("#pressure_after_2").keyup(function() {
                    var pressure_after_1 = document.getElementById("pressure_after_1").value;
                    var pressure_after_2 = document.getElementById("pressure_after_2").value;
                    var data = pressure_after_1 + "/" + pressure_after_2;
                    document.getElementById("pressure_after").value = data;
                });
                ////////////////////////////////////
                $("#pulse_before_1").keyup(function() {
                    var pulse_before_1 = document.getElementById("pulse_before_1").value;
                    // var pulse_before_2 = document.getElementById("pulse_before_2").value;
                    // var data = pulse_before_1 + "/" + pulse_before_2;
                    var data = pulse_before_1 + "/นาที";
                    document.getElementById("pulse_before").value = data;
                });
                $("#pulse_before_2").keyup(function() {
                    var pulse_before_1 = document.getElementById("pulse_before_1").value;
                    var pulse_before_2 = document.getElementById("pulse_before_2").value;
                    var data = pulse_before_1 + "/" + pulse_before_2;
                    document.getElementById("pulse_before").value = data;
                });
                ////////////////////////////////////
                $("#pulse_after_1").keyup(function() {
                    var pulse_after_1 = document.getElementById("pulse_after_1").value;
                    // var pulse_after_2 = document.getElementById("pulse_after_2").value;
                    // var data = pulse_after_1 + "/" + pulse_after_2;
                    var data = pulse_after_1 + "/นาที";
                    document.getElementById("pulse_after").value = data;
                });
                $("#pulse_after_2").keyup(function() {
                    var pulse_after_1 = document.getElementById("pulse_after_1").value;
                    var pulse_after_2 = document.getElementById("pulse_after_2").value;
                    var data = pulse_after_1 + "/" + pulse_after_2;
                    document.getElementById("pulse_after").value = data;
                });
            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>

            </form>

    </body>

    </html>