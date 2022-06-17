<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
    include('checkPermission.php');
    if (!checkPermission("BK_EXCHANGE", "VW")) {
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
        <title>บันทึกข้อมูลการทำ Blood Exchange</title>

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
                                    <h1 class="main-title float-left"> บันทึกข้อมูลการทำ Blood Exchange</h1>
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
                            <input id="bloodexchangeid" name="bloodexchangeid" type="text" hidden>
                            <input id="hn" name="hn" type="text" hidden>
                            <input id="gender" name="gender" type="text" hidden>

                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">HN</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="scanhn" class="form-control" id="scanhn" onkeyup="" placeholder="Barcode" onkeyup="setNewHN(this)" autofocus>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity">&nbsp;</label>
                                    <div>
                                        <a role="button" href="#" class="btn btn-primary" onclick="exchangeBloodModalShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ดูตรวจประวัติการ Blood Exchange</a>
                                    </div>
                                </div>


                            </div>


                            <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->

                            <p>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <img src="assets/images/profile.png" alt="Smiley face" height="170" width="160">
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
                                    <label>HN</label> <label id="patienthn">-</label><br>
                                    <label>AN</label> <label id="patientan">-</label><br>
                                    <label>ID</label> <label id="patientidcard">-</label><br>
                                    <label>ประเภทผู้ป่วย <label id="patient_type">-</label></label><br>
                                    <label>Bl.Gr.</label> <label id="patientbloodgroup">-</label><br>
                                </div>
                                <div class="form-group col-md-6 font_patient">
                                    <label>ชื่อ-นามสกุล</label> <label id="patientfullname">-</label><br>
                                    <label>อายุ</label> <label id="patientage">-</label> <label>ปี</label><br>
                                    <label>เพศ</label> <label id="patientgender">-</label><br>
                                    <label>สิทธิการรักษา </label> <label id="patientinsurance">-</label><br>
                                </div>
                            </div>

                    </div>
                    </p>
                    <!-- <input type="checkbox" onclick="setUnChecked(this.checked)"> -->
                    <div class="form-group col-md-12">
                        <div class="table-s-scroll">
                            <table id="table_blood_exchange_cross">
                                <thead>
                                    <tr>
                                        <th class="td-table"></th>
                                        <th class="td-table">No.</th>
                                        <th class="td-table">หมายเลขถุง</th>
                                        <th class="td-table">Blood-Group</th>
                                        <th class="td-table">Rh</th>
                                        <th class="td-table">Type</th>
                                        <th class="td-table">Volume</th>
                                        <th class="td-table">วัน-เวลาที่ทำ</th>
                                        <th class="td-table">สถานะ</th>
                                        <th class="td-table">ผู้เตรียมเลือด</th>

                                    </tr>
                                </thead>
                                <tbody id="data_exchange_cross">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> ข้อมูลทั่วไป</h3>

                            </div>

                            <div class="card-body">


                                <fieldset class="form-group">
                                    <div class="row">

                                        <div class="form-group col-md-2">
                                            <label for="inputEmail4">AN</label>

                                            <input readonly type="text" autocomplete="off" class="form-control" id="an" value="" name="an">
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label for="inputPassword4">ครั้งที่</label>
                                            <input readonly type="text" autocomplete="off" class="form-control" id="terms" value="" name="terms">
                                        </div>

                                        <div class="form-group col-md-5">
                                            <div class="form-group">
                                                <label for="inputEmail4">ประเภทการทำ</label>
                                                <div class="form-group">
                                                    <label class="form-check-label">
                                                        <input required onclick="clickshow(1)" type="radio" id="bloodexchangetypeid1" name="bloodexchangetypeid" value="1" checked>
                                                        Plasma Exchange
                                                    </label>
                                                    &emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input onclick="" type="radio" id="bloodexchangetypeid2" name="bloodexchangetypeid" value="2">
                                                        Leukapheresis
                                                    </label>
                                                    &emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input onclick="setshow(3)" type="radio" id="bloodexchangetypeid3" name="bloodexchangetypeid" value="3">
                                                        Plateletpheresis
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>หน่วยงาน</label>
                                            <select required id="unitofficeid" class="form-control" name="unitofficeid"></select>
                                        </div>

                                        <div class="form-group col-md-2"><label>วันที่</label>

                                            <input type="text" autocomplete="off" value="<?php echo (!empty($fromdate)) ? $fromdate : dateNowDMY(); ?>" class="form-control  date1" id="bloodexchangedatetime" name="bloodexchangedatetime">

                                        </div>
                                        <div class="form-group col-md-1"><label>เวลาทำการ</label>

                                            <input type="text" autocomplete="off" value="<?php echo date('H:i'); ?>" class="form-control " id="bloodexchangetime" name="bloodexchangetime">
                                        </div>

                                        <div class="form-group col-md-2"><label>น้ำหนัก</label>
                                            <input type="number" step="any" autocomplete="off" value="" class="form-control" id="weight" name="weight">
                                        </div>

                                        <div class="form-group col-md-2"><label>ส่วนสูง</label>
                                            <input type="number" step="any" autocomplete="off" value="" class="form-control" id="height" name="height">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputEmail4">ABO</label>
                                            <select required id="bloodgroupid" class="form-control" name="bloodgroupid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Rh</label>
                                            <select id="rhid" class="form-control" name="rhid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2"><label>Diagnosis</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="diagnosis" name="diagnosis">
                                        </div>

                                        <div class="form-group col-md-7"><label>-</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="diagnosisdetail" name="diagnosisdetail">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">แพทย์ผู้สั่งทำ</label>
                                            <select id="doctorid" class="form-control" name="doctorid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Machine</label>
                                            <select required id="exchangemachineid" class="form-control" name="exchangemachineid">
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="inputCity">&nbsp;</label>
                                            <div>
                                                <a role="button" href="#" class="btn btn-primary" onclick="lot()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>เลขLot</a>
                                            </div>
                                        </div>

                                        <div class="modal fade blank-modal" id="lotnumber" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel2">เลข Lot </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div id="modalbody" class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-3">
                                                                <label for="inputEmail4">Set Lot No.</label>
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="setlotno" name="setlotno">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="inputEmail4">ACD-A Lot No.</label>
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="acdalotno" name="acdalotno">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="inputEmail4">0.9% NSS Lot No.</label>
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="nsslotno" name="nsslotno">
                                                            </div>
                                                            <div class="form-group col-md-3"><label>Albumin Lot No</label>
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="albuminelotno" name="albuminelotno">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="save-bottom">
                                                            <div class="form-group text-right m-b-0">
                                                                <button type="button" onclick="closelotno()" class="btn btn-warning m-l-5">
                                                                    <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>







                                        <div class="form-group col-md-4"><label>Other</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="other" name="other">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <div class="form-group">
                                                <label for="inputEmail4">Blood warmer</label>
                                                <br>
                                                <div class="form-group">
                                                    <label class="form-check-label">
                                                        <input onclick="uncheck6_1()" type="radio" id="bloodwarmer1" name="bloodwarmer" value="1">
                                                        Yes
                                                    </label>
                                                    &emsp;&emsp;
                                                    <label class="form-check-label">
                                                        <input onclick="uncheck6_2()" type="radio" id="bloodwarmer" name="bloodwarmer2" value="2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="inputEmail4">หมายเลขถุงที่ใช้</label>
                                            <!-- <input type="text" autocomplete="off" class="form-control" id="bag_number1" name="bag_number" value="" readonly> -->
                                            <div>
                                                <a role="button" href="#" class="btn btn-primary" onclick="bagnum()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>หมายเลขถุง</a>
                                            </div>
                                        </div>



                                        <div class="modal fade blank-modal" id="bagnumbermodal" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel2">หมายเลขถุง</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div id="modalbody" class="modal-body">
                                                        <div class="form-group col-md-12"><label>หมายเลขถุงที่ใช้</label>
                                                            <textarea class="form-control" id="bag_number" name="bag_number" rows="9" cols="50" readonly></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="save-bottom">
                                                            <div class="form-group text-right m-b-0">

                                                                <button type="button" onclick="bagclose()" class="btn btn-warning m-l-5">
                                                                    <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </fieldset>


                            </div>

                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Test</h3>

                            </div>

                            <div class="card-body">

                                <fieldset class="form-group">
                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <div class="row vertical-bottom">
                                                <div class="col-md-12">
                                                    <div class="row">

                                                        <div class="padding-top-top15">
                                                            <!-- &nbsp;&nbsp;&nbsp;Antibody identification test -->
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="table-no-scroll">
                                                <table id="list_table_anti_iden" style="margin-bottom:0px">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:80px"></th>
                                                            <th style="width:120px">Sys</th>
                                                            <th style="width:120px">Dia</th>
                                                            <th style="width:120px">Pulse</th>
                                                            <th style="width:120px">SPO2</th>
                                                            <th style="width:120px">Hb</th>
                                                            <th style="width:120px">Hct</th>
                                                            <th style="width:120px">RBC</th>
                                                            <th style="width:120px">WBC</th>
                                                            <th style="width:120px">PLT</th>
                                                            <th style="width:120px">Calcium</th>

                                                            <th>Other</th>
                                                            <th>หมายเหตุ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:100px">Pre-Test</th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="pretest_sys" name="pretest_sys" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="pretest_dia" name="pretest_dia" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="pretest_pulse" name="pretest_pulse" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="pretest_spo2" name="pretest_spo2" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="preHbColor()" id="pretest_hb" name="pretest_hb" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="preHctColor()" id="pretest_hct" name="pretest_hct" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="preRbcColor()" id="pretest_rbc" name="pretest_rbc" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="preWbcColor()" id="pretest_wbc" name="pretest_wbc" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="prePltColor()" id="pretest_plt" name="pretest_plt" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="pretest_calcium" name="pretest_calcium" style="text-align: center;">
                                                            </th>

                                                            <th class="td-table">
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="pretest_other" name="pretest_other">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="pretest_remark" name="pretest_remark">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style="width:100px">Post-Test</th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="posttest_sys" name="posttest_sys" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="posttest_dia" name="posttest_dia" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="posttest_pulse" name="posttest_pulse" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="posttest_spo2" name="posttest_spo2" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="postHbColor()" id="posttest_hb" name="posttest_hb" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="postHctColor()" id="posttest_hct" name="posttest_hct" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="postRbcColor()" id="posttest_rbc" name="posttest_rbc" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="postWbcColor()" id="posttest_wbc" name="posttest_wbc" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" onkeyup="postPltColor()" id="posttest_plt" name="posttest_plt" style="text-align: center;">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="number" step="any" autocomplete="off" value="" class="form-control" id="posttest_calcium" name="posttest_calcium" style="text-align: center;">
                                                            </th>

                                                            <th class="td-table">
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="posttest_other" name="posttest_other">
                                                            </th>
                                                            <th class="td-table">
                                                                <input type="text" autocomplete="off" value="" class="form-control" id="posttest_remark" name="posttest_remark">
                                                            </th>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>


                                    </div>
                                </fieldset>

                            </div>

                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Procedure</h3>

                            </div>

                            <div class="card-body">

                                <fieldset class="form-group">
                                    <div id="show1" class="show1" style="display:none;">
                                        <div class="row">

                                            <div class="form-group col-md-7">
                                                <div class="form-group">
                                                    <label for="inputEmail4">Replacement Fluid</label>
                                                    <div class="form-group">
                                                        <label class="form-check-label">
                                                            <input onclick="" type="checkbox" id="crp" name="crp" value="1">
                                                            CRP
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input style="width:80px" type="text" id="crpqty" name="crpqty" value="">
                                                            Units
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input onclick="" type="checkbox" id="ffp" name="ffp" value="1">
                                                            FFP
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input style="width:80px" type="text" id="ffpqty" name="ffpqty" value="">
                                                            Unit
                                                        </label>
                                                        <label class="form-check-label" style="margin-top:38px;">
                                                            <input onclick="" type="checkbox" id="nss" name="nss" value="1">
                                                            NSS
                                                        </label>
                                                        <label class="form-check-label" style="margin-top:38px;">
                                                            <input style="width:80px;" type="text" id="nssqty" name="nssqty" value="">
                                                            ML
                                                        </label>


                                                        <label class="form-check-label" style="margin-top:38px;">
                                                            <input onclick="" type="checkbox" id="albumin" name="albumin" value="1">
                                                            Albumin
                                                        </label>
                                                        <label class="form-check-label" style="margin-top:38px;">
                                                            <input style="width:40px" type="text" id="albuminqty" name="albuminqty" value="">
                                                            ขวด
                                                        </label>
                                                        <label class="form-check-label" style="margin-top:38px;">
                                                            <input style="width:40px" type="text" id="albuminpercent" name="albuminpercent" value="">
                                                            %
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input onclick="" type="checkbox" id="calcium" name="calcium" value="1">
                                                            10 % calcium gluconate
                                                        </label>
                                                        <label class="form-check-label">
                                                            <input style="width:80px" type="text" id="dose" name="dose" value="">
                                                            Dose
                                                        </label>
                                                        <label class="form-check-label">
                                                            <br>
                                                            <input onclick="" style="margin-left:10px;" type="checkbox" id="other2" name="other2" value="1">
                                                            Other
                                                        </label>
                                                        <label class="form-check-label" style="margin-top:38px;">
                                                            <input type="text" autocomplete="off" value="" class="form-control" id="other2detail" name="other2detail">
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group col-md-3">
                                                <!-- <br />
                                            <br />
                                            <input type="text" autocomplete="off" value="" class="form-control" id="other2detail" name="other2detail"> -->
                                            </div>
                                            <!-- <div class="form-group col-md-4">
                                            <label for="inputEmail4">หมายเลขถุง</label>
                                            <input type="text" autocomplete="off" onkeyup="" onkeyup="scanblood(this)" class="form-control" id="bgnum" name="bgnum" placeholder="Bag number">
                                        </div> -->

                                            <br>
                                            <div class="form-group col-md-3"><label>TBV</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="tbv" name="tbv">
                                            </div>

                                            <div class="form-group col-md-3"><label>TBP</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="tpv" name="tpv">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <br />
                                                    <label for="inputEmail4"></label>
                                                    <div class="form-group">
                                                        <label class="form-check-label">
                                                            <input onclick="" type="radio" id="tpvtype1" name="tpvtype" value="1">
                                                            1 TPV
                                                        </label>
                                                        &emsp;&emsp;
                                                        <label class="form-check-label">
                                                            <input onclick="" type="radio" id="tpvtype1_5" name="tpvtype" value="1.5">
                                                            1.5 TPV
                                                        </label>
                                                        &emsp;&emsp;
                                                        <label class="form-check-label">
                                                            <input onclick="" type="radio" id="tpvtype2" name="tpvtype" value="2">
                                                            2 TPV
                                                        </label>
                                                        &emsp;&emsp;
                                                        <label class="form-check-label">
                                                            <input onclick="" type="radio" id="tpvtype3" name="tpvtype" value="3">
                                                            3 TPV
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3"><label>Fluid balance (%)</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="fluidbalance" name="fluidbalance">
                                            </div>

                                            <div class="form-group col-md-3"><label>Volume Exchange</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="volumeexchange" name="volumeexchange">
                                            </div>

                                            <div class="form-group col-md-3"><label>AC used</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="acused" name="acused">
                                            </div>

                                            <div class="form-group col-md-3"><label>Ac to patient</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="actopatient" name="actopatient">
                                            </div>

                                            <div class="form-group col-md-3"><label>Remove bag</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="removebag" name="removebag">
                                            </div>

                                            <div class="form-group col-md-3"><label>Replacement used</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="replacementused" name="replacementused">
                                            </div>

                                            <div class="form-group col-md-3"><label>Bolus</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="bolus" name="bolus">
                                            </div>

                                            <div class="form-group col-md-3"><label>Buffy coat volume</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="buffycoatvolume" name="buffycoatvolume">
                                            </div>

                                            <div class="form-group col-md-3"><label>Additional Fluid</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="additionalfluid" name="additionalfluid">
                                            </div>

                                            <div class="form-group col-md-6"><label>-</label>
                                                <input type="text" autocomplete="off" value="" class="form-control" id="additionalfluiddetail" name="additionalfluiddetail">
                                            </div>

                                            <!-- <div class="form-group col-md-3"><label>Time</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="time" name="time">
                                        </div>

                                        <div class="form-group col-md-12"><label>หมายเหตุ</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="remark" name="remark">
                                        </div>

                                        <div class="form-group col-md-12"><label>สรุปรายงานผล</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="bloodexchangeresult" name="bloodexchangeresult">
                                        </div> -->
                                        </div>
                                    </div>
                                    <div id="show2" class="show2" style="display: none;">
                                        <div class="row">
                                            <div class="form-group col-md-1">
                                                <label>Vol.Process</label>
                                                <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultvolproc" placeholder="" value="<?php echo $row["sdpresultvolproc"]; ?>" name="sdpresultvolproc">
                                            </div>

                                            <div class="form-group col-md-1">
                                                <label>AC Vol.</label>
                                                <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultacvol" placeholder="" value="<?php echo $row["sdpresultacvol"]; ?>" name="sdpresultacvol">
                                            </div>

                                            <div class="form-group col-md-1">
                                                <label>Time</label>
                                                <input type="number" step="any" class="sdp-number-center form-control" id="sdpresulttime" placeholder="" value="<?php echo $row["sdpresulttime"]; ?>" name="sdpresulttime">
                                            </div>

                                            <div class="form-group col-md-1">
                                                <label>Plt Weight</label>
                                                <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultpltweight" placeholder="" value="<?php echo $row["sdpresultpltweight"]; ?>" name="sdpresultpltweight">
                                            </div>

                                            <div class="form-group col-md-1">
                                                <label>Machine Yield</label>
                                                <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultmachineyield" placeholder="" value="<?php echo $row["sdpresultmachineyield"]; ?>" name="sdpresultmachineyield">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class="row">


                                                <div class="form-group col-md-3">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="form-check-label">
                                                                <input <?php if ($row['sdpresulttype'] == 1) {
                                                                            echo 'checked';
                                                                        }  ?> type="radio" id="sdpresulttype1" name="sdpresulttype" value="1">
                                                                <b><label id="titleBloodUsed">PC Used</label></b>
                                                            </label>
                                                            &emsp;
                                                            <label class="form-check-label">
                                                                <input <?php if ($row['sdpresulttype'] == 2 || !$row['sdpresulttype']) {
                                                                            echo 'checked';
                                                                        }  ?> type="radio" id="sdpresulttype2" name="sdpresulttype" value="2">
                                                                <b><label id="titleBloodSDP">SDP</label></b>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-9">
                                                    <label><b>Volume รวม</b></label>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 25%">Product Volume</th>
                                                                <th style="width: 25%">Product Count</th>
                                                                <th id="plt_yield_td1" style="width: 25%">Plt Yield</th>
                                                                <th style="width: 25%">Unit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="number" step="any" onkeyup="setSdpprodvolume1(this.value)" class="sdp-number-center form-control" id="sdpprodvolume1" placeholder="" value="<?php echo $row["sdpprodvolume1"]; ?>" name="sdpprodvolume1">
                                                                </td>
                                                                <td>
                                                                    <input type="number" step="any" onkeyup="setSdpprodcount1(this)" class="sdp-number-center form-control" id="sdpprodcount1" placeholder="" value="<?php echo $row["sdpprodcount1"]; ?>" name="sdpprodcount1">
                                                                </td>
                                                                <td>
                                                                    <input type="number" step="any" onkeyup="setSdpprodyltyield1(this.value)" class="sdp-number-center form-control" id="sdpprodyltyield1" placeholder="" value="<?php echo $row["sdpprodyltyield1"]; ?>" name="sdpprodyltyield1">
                                                                </td>
                                                                <td>
                                                                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodunit1" placeholder="" value="<?php echo $row["sdpprodunit1"]; ?>" name="sdpprodunit1">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3"></div>
                                    <div class="row">
                                        <br>
                                        <div class="form-group col-md-2 tital-card" style="margin-top:2px;">
                                            <label><b>Problem</b></label>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <label class="form-check-label">
                                                    <input class="check2" type="checkbox" id="isuseless" name="isuseless" value="1" <?php if (!empty($row['isuseless'])) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }  ?>>&nbsp;Useless
                                                </label>
                                                &emsp;&emsp;

                                            </div>
                                            <input type="text" class="form-control" id="useless" placeholder="" value="<?php echo $row["useless"]; ?>" name="useless">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <label class="form-check-label">
                                                    <input class="check2" type="checkbox" id="islostset" name="islostset" value="1" <?php if (!empty($row['islostset'])) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }  ?>>&nbsp;Lost Set
                                                </label>
                                                &emsp;&emsp;

                                            </div>
                                            <input type="text" class="form-control" id="lostset" placeholder="" value="<?php echo $row["lostset"]; ?>" name="lostset">
                                        </div>
                                        <div class="form-group col-md-2" style="margin-top:20px">
                                            <a role="button" onclick="showPageLost()" href="#" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>ประวัติ</a>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Machine</label>
                                            <select multiple="multiple" id="problemmachineid" class="form-control problemmachineid" name="problemmachineid[]">
                                                <?php
                                                $strSQL = "SELECT * FROM problem_machine  ORDER BY problemmachineid ASC";
                                                $objQuery = mysql_query($strSQL);
                                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                                ?>
                                                    <option <?php
                                                            $problemmachineidArr = json_decode($row['problemmachineid']);
                                                            foreach ($problemmachineidArr as $valueid) {
                                                                if ($objResuut["problemmachineid"] == $valueid)
                                                                    echo 'selected';
                                                            }
                                                            ?> value="<?php echo $objResuut['problemmachineid']; ?>">
                                                        <?php echo $objResuut["problemmachinename"]; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="otherproblemmachine_div" class="form-group col-md-3">
                                            <label>Other Machine</label>
                                            <input type="text" class="form-control" id="problemmachineother" placeholder="" value="<?php echo $row["problemmachineother"]; ?>" name="problemmachineother">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Patient</label>
                                            <select multiple="multiple" id="problemdonorid" class="form-control problemdonorid" name="problemdonorid[]">
                                                <?php
                                                $strSQL = "SELECT * FROM problem_donor  ORDER BY problemdonorid ASC";
                                                $objQuery = mysql_query($strSQL);
                                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                                ?>
                                                    <option <?php
                                                            $problemdonoridArr = json_decode($row['problemdonorid']);
                                                            foreach ($problemdonoridArr as $valueid) {
                                                                if ($objResuut["problemdonorid"] == $valueid)
                                                                    echo 'selected';
                                                            }
                                                            ?> value="<?php echo $objResuut['problemdonorid']; ?>">
                                                        <?php echo $objResuut["problemdonorname"]; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="otherproblemdonor_div" class="form-group col-md-3">
                                            <label>Other Patient</label>
                                            <input type="text" class="form-control" id="problemdonorremark" placeholder="" value="<?php echo $row["problemdonorremark"]; ?>" name="problemdonorremark">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Product</label>
                                            <select multiple="multiple" id="problemproductid" class="form-control problemproductid" name="problemproductid[]">
                                                <?php
                                                $strSQL = "SELECT * FROM problem_product  ORDER BY problemproductid ASC";
                                                $objQuery = mysql_query($strSQL);
                                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                                ?>
                                                    <option <?php
                                                            $problemproductidArr = json_decode($row['problemproductid']);
                                                            foreach ($problemproductidArr as $valueid) {
                                                                if ($objResuut["problemproductid"] == $valueid)
                                                                    echo 'selected';
                                                            }
                                                            ?> value="<?php echo $objResuut['problemproductid']; ?>">
                                                        <?php echo $objResuut["problemproductname"]; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="otherproblemproduct_div" class="form-group col-md-3">
                                            <label>Other Product</label>
                                            <input type="text" class="form-control" id="problemproductremark" placeholder="" value="<?php echo $row["problemproductremark"]; ?>" name="problemproductremark">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Human</label>
                                            <select multiple="multiple" id="problemhumanid" class="form-control problemhumanid" name="problemhumanid[]">
                                                <?php
                                                $strSQL = "SELECT * FROM problem_human  ORDER BY problemhumanid ASC";
                                                $objQuery = mysql_query($strSQL);
                                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                                ?>
                                                    <option <?php
                                                            $problemhumanidArr = json_decode($row['problemhumanid']);
                                                            foreach ($problemhumanidArr as $valueid) {
                                                                if ($objResuut["problemhumanid"] == $valueid)
                                                                    echo 'selected';
                                                            }
                                                            ?> value="<?php echo $objResuut['problemhumanid']; ?>">
                                                        <?php echo $objResuut["problemhumanname"]; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="otherproblemhuman_div" class="form-group col-md-3">
                                            <label>Other Human</label>
                                            <input type="text" class="form-control" id="problemhumanremark" placeholder="" value="<?php echo $row["problemhumanremark"]; ?>" name="problemhumanremark">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6"><label>รายงานสรุปผล</label>
                                        <textarea class="form-control" id="result" name="result" rows="9" cols="50"></textarea>
                                    </div>



                            </div>

                            <div class="row">
                                <div class="form-group col-md-4"><label>เวลาเริ่มต้น</label>

                                    <input type="datetime-local" autocomplete="off" value="" class="form-control" id="starttime" name="starttime">
                                </div>
                                <div class="form-group col-md-4"><label>เวลาสิ้นสุด</label>

                                    <input type="datetime-local" autocomplete="off" value="" class="form-control" id="endtime" name="endtime">
                                </div>

                                <div class="form-group col-md-2"><label>จำนวนชั่วโมงที่ใช้</label>
                                    <input type="text" class="form-control" id="timeuse" name="timeuse" value="" readonly>
                                    <!-- <input type = "text" class="form-control" id ="timeuse" name = "timeuse" value = "" hidden> -->
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity">ผู้ทำ</label>
                                    <select id="staff" class="form-control" name="staff">
                                        <option value="" selected>โปรดระบุ</option>
                                        <?php
                                        $strSQL = "SELECT * FROM staff WHERE isbaggagestaff = 1 ORDER BY id ASC";
                                        $objQuery = mysql_query($strSQL);
                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                        ?>
                                            <option <?php if ($objResuut["id"] == $row['bag_staff_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                                <?php echo $objResuut["name"]; ?>
                                                <?php echo $objResuut["surname"]; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputCity">ผู้บันทึก</label>
                                    <input type="text" name="nurse" class="form-control" id="nurse" value="<?php echo $_SESSION["fullname"]; ?> " readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity">นัดหมายครั้งถัดไป</label>
                                    <input type="text" autocomplete="off" name="appointment" value="" class="form-control date1" id="appointment">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity">ระบุการนัดหมาย</label>
                                    <input type="text" name="appoittext" class="form-control" id="appoittext" value="">
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
                            <button type="button" onclick="newBloodLetting()" class="btn btn-success m-l-5">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                            </button>
                            <button type="button" onclick="showDocument()" class="btn btn-info m-l-5">
                                <span class="btn-label"><i class="fa fa fa-file-text-o"></i></span>แนบไฟล์
                            </button>
                            <button onclick="reportPrintexchange()" class="btn btn-light" type="button">
                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์รายงาน
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- END content-page -->
            <?php include 'blood-exchange-modal.php'; ?>
            <?php include 'blood-donor-record-lost-modal.php'; ?>
            <?php include('blood-exchange-modal-hn.php'); ?>
            <?php include 'formprint.php'; ?>
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

        <script src="assets/js/custom/blood-exchange/blood-exchange-select.js"></script>
        <script src="assets/js/custom/blood-exchange/blood-exchange-loadtable.js"></script>
        <script src="assets/js/custom/blood-exchange/blood-exchange-event.js"></script>
        <script src="assets/js/custom/blood-exchange/blood-exchange-event-document.js"></script>


        <!-- BEGIN Java Script for this page -->

        <!-- END Java Script for this page -->
        <script>
            var problemmachineid = <?php echo json_encode($row['problemmachineid']);  ?>;
            var problemdonorid = <?php echo json_encode($row['problemdonorid']); ?>;
            var problemproductid = <?php echo json_encode($row['problemproductid']); ?>;
            var problemhumanid = <?php echo json_encode($row['problemhumanid']); ?>;
        </script>

        <script>
            function lot() {
                $("#lotnumber").modal('show');
            }

            function bagnum() {
                $("#bagnumbermodal").modal('show');
            }

            function bagclose() {
                $("#bagnumbermodal").modal('hide');
            }

            function closelotno() {
                $("#lotnumber").modal('hide');
            }

            function requestBloodModalClose() {
                $("#exchangeBloodModalShow").modal('hide');
            }

            function exchangeBloodModalShow(state = '') {

                $("#exchangeBloodModalShow").modal('show');
                hn = $('#hn').val();
                // console.log(hn)
                $.ajax({
                    url: 'data/bloodexchange/blood-exchange.php?hn=' + hn,
                    dataType: 'json',
                    type: 'get',
                    success: function(data) {

                        var count = 0;
                        var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                        dataObj = obj;
                        count = obj.length;
                        var event_data = '';
                        $.each(obj, function(index, value) {
                            count++;
                            event_data += '';
                            event_data += '<tr class="tr_color_1" style="background:' + count + '"  id="trblood' + (count) + '" onClick="blood_color(' + (count) + ',this)" >';
                            event_data += '<td  style="display:none;" >';
                            event_data += JSON.stringify(value);
                            event_data += '</td>';
                            event_data += '<td>' + value.patientan + '</td>';
                            event_data += '<td>' + value.terms + '</td>';
                            event_data += '<td >' + getDMYHM(value.bloodexchangedatetime) + '</td>';
                            event_data += '<td>' + value.bloodexchangetypename + '</td>';
                            event_data += '<td>' + value.exchangemachinename + '</td>';
                            event_data += '<td>' + value.doctorname + '</td>';
                            event_data += '<td>' + value.diagnosis + '</td>';
                            event_data += '<td hidden>' + value.bloodexchangeid + '</td>';
                            event_data += '<td>';
                            event_data += '<button type="button" onclick="chActive(' + index + ')"  class="btn btn-success m-l-5">';
                            event_data += '<span class="btn-label"><i class="fa fa-search"></i></span>ดูข้อมูล';
                            event_data += '</button>&nbsp;&nbsp;';
                            event_data += '</td>';
                            event_data += '</tr>';
                            // event_data += '<td hidden id = ""></td>'
                        });
                        $("#exchange_data").html(event_data);
                        // if(state == "insert")
                        //     {
                        //         chActive(0);
                        //     }else if(state == "update")
                        //     {
                        //         chActive(indexActive);
                        //     }
                        // console.log(data);

                    },
                    error: function(d) {
                        /*console.log("error");*/
                        alert("404. Please wait until the File is Loaded.");
                    }
                });
            }

            var check6_1 = 0;
            var check6_2 = 0;

            function uncheck6_1() {
                if (check6_1 % 2 == 0) {
                    document.getElementById("bloodwarmer1").checked = true;
                    check6_1++;
                } else {
                    document.getElementById("bloodwarmer1").checked = false;
                    check6_1--;
                }
            }

            function uncheck6_2() {
                if (check6_2 % 2 == 0) {
                    document.getElementById("bloodwarmer").checked = true;
                    check6_2++;
                } else {
                    document.getElementById("bloodwarmer").checked = false;
                    check6_2--;
                }
            }

            function setUnChecked(checkedState) {
                var rows = document.getElementById("table_blood_exchange_cross").rows;
                for (var i = 1; i < rows.length; i++) {
                    rows[i].cells[1].children[0].checked = checkedState;
                }
            }

            function setBloodOutCheck(count) {
                allbn = '';

                $('.setblood').each(function() {
                    if ($(this).prop('checked') == true) {
                        trid = $(this).parents('tr').attr('id');
                        bn = $(`#${trid} td:nth-child(4)`).html();
                        allbn += bn + '\r\n'

                    }
                });

                $('#bag_number').val(allbn);

            }

            function exchangebloodclose() {
                $("#exchangeBloodModalShow").modal('hide');
            }

            function blood_color(record) {
                var galleries = document.getElementsByClassName("tr_color_1");
                var len = galleries.length;

                for (var i = 0; i < len; i++) {
                    galleries[i].style.backgroundColor = "#FFF";
                }
                document.getElementById("trblood" + record).style.background = "#b7e4eb";
                // var item = dataObj[id];
                // setDataBloodLetting(item);
            }



            function showdatacount(record) {
                var item = dataObj[record];
                // setDataBloodLetting1(item);
                console.log(item);
            }



            function setDataBloodLetting1(data) {
                document.getElementById('patientid').value = data.patientid;
                document.getElementById('bloodexchangeid').value = data.bloodexchangeid;
                document.getElementById('bloodexchangedatetime').value = getDMYHM(data.bloodexchangedatetime);

                document.getElementById('terms').value = data.terms;
                document.getElementById('weight').value = data.weight;
                document.getElementById('height').value = data.height;
                document.getElementById('diagnosis').value = data.diagnosis;
                document.getElementById('diagnosisdetail').value = data.diagnosisdetail;

                document.getElementById('setlotno').value = data.setlotno;
                document.getElementById('acdalotno').value = data.acdalotno;
                document.getElementById('nsslotno').value = data.nsslotno;
                document.getElementById('albuminelotno').value = data.albuminelotno;
                document.getElementById('other').value = data.other;



                document.getElementById('pretest_sys').value = data.pretest_sys;
                document.getElementById('pretest_dia').value = data.pretest_dia;
                document.getElementById('pretest_pulse').value = data.pretest_pulse;
                document.getElementById('pretest_hb').value = data.pretest_hb;
                document.getElementById('pretest_hct').value = data.pretest_hct;
                document.getElementById('pretest_rbc').value = data.pretest_rbc;
                document.getElementById('pretest_wbc').value = data.pretest_wbc;
                document.getElementById('pretest_plt').value = data.pretest_plt;
                document.getElementById('pretest_calcium').value = data.pretest_calcium;
                document.getElementById('pretest_spo2').value = data.pretest_spo2;
                document.getElementById('pretest_other').value = data.pretest_other;
                document.getElementById('pretest_remark').value = data.pretest_remark;

                document.getElementById('posttest_sys').value = data.posttest_sys;
                document.getElementById('posttest_dia').value = data.posttest_dia;
                document.getElementById('posttest_pulse').value = data.posttest_pulse;
                document.getElementById('posttest_hb').value = data.posttest_hb;
                document.getElementById('posttest_hct').value = data.posttest_hct;
                document.getElementById('posttest_rbc').value = data.posttest_rbc;
                document.getElementById('posttest_wbc').value = data.posttest_wbc;
                document.getElementById('posttest_plt').value = data.posttest_plt;
                document.getElementById('posttest_calcium').value = data.posttest_calcium;
                document.getElementById('posttest_spo2').value = data.posttest_spo2;
                document.getElementById('posttest_other').value = data.posttest_other;
                document.getElementById('posttest_remark').value = data.posttest_remark;

                document.getElementById('other2detail').value = data.other2detail;
                document.getElementById('tbv').value = data.tbv;
                document.getElementById('tpv').value = data.tpv;
                document.getElementById('fluidbalance').value = data.fluidbalance;
                document.getElementById('volumeexchange').value = data.volumeexchange;
                document.getElementById('acused').value = data.acused;
                document.getElementById('actopatient').value = data.actopatient;
                document.getElementById('removebag').value = data.removebag;
                document.getElementById('replacementused').value = data.replacementused;
                document.getElementById('bolus').value = data.bolus;
                document.getElementById('buffycoatvolume').value = data.buffycoatvolume;
                document.getElementById('additionalfluid').value = data.additionalfluid;

                document.getElementById('additionalfluiddetail').value = data.additionalfluiddetail;
                document.getElementById('time').value = data.time;
                document.getElementById('remark').value = data.remark;
                document.getElementById('bloodexchangeresult').value = data.bloodexchangeresult;
                document.getElementById('bag_number').value = data.bag_number;
                document.getElementById('starttime').value = data.starttime;
                document.getElementById('endtime').value = data.endtime;
                document.getElementById('timeuse').value = data.timeuse;
                document.getElementById('patientcause').value = data.patientcause;
                document.getElementById('machinecause').value = data.machinecause;
                document.getElementById('humancause').value = data.humancause;
                document.getElementById('nurse').value = data.usercreate;

                // Select Value
                setDataModalSelectValue('unitofficeid', data.unitofficeid, data.unitofficename);
                setDataModalSelectValue('doctorid', data.doctorid, data.doctorname);

                setDataModalSelectValue('bloodgroupid', data.bloodgroupid, data.bloodgroupname);
                setDataModalSelectValue('rhid', data.rhid, data.rhname3);
                setDataModalSelectValue('exchangemachineid', data.exchangemachineid, data.exchangemachinename);
                setDataModalSelectValue('staff', data.staff, data.name);

                // Radio
                document.getElementById('bloodexchangetypeid1').checked = (data.bloodexchangetypeid == 1);
                document.getElementById('bloodexchangetypeid2').checked = (data.bloodexchangetypeid == 2);
                document.getElementById('bloodexchangetypeid3').checked = (data.bloodexchangetypeid == 3);

                document.getElementById('tpvtype1').checked = (data.tpvtype == 1);
                document.getElementById('tpvtype1_5').checked = (data.tpvtype == 1.5);
                document.getElementById('tpvtype2').checked = (data.tpvtype == 2);
                document.getElementById('tpvtype3').checked = (data.tpvtype == 3);

                // Check Box
                document.getElementById('ffp').checked = (data.ffp == 1);
                document.getElementById('albumin').checked = (data.albumin == 1);
                document.getElementById('nss').checked = (data.nss == 1);

                document.getElementById('ffpqty').value = data.ffpqty;
                document.getElementById('albuminqty').value = data.albuminqty;
                document.getElementById('nssqty').value = data.nssqty;

                document.getElementById('other2').checked = (data.other2 == 1);

            }

            function reportPrintexchange() {
                var id = $("#bloodexchangeid").val();

                printJS({
                    printable: localurl + "/report/blood-exchange-report.php?id=" + id,
                    type: 'pdf',
                    showModal: true
                });
            }

            $(document).ready(function() {
                dateBE('.date1');
                // moment(date).format("d/m/YYYYTkk:mm")
                // console.log(date);

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

                    spinnershow();
                    $.ajax({
                        type: 'POST',
                        url: 'blood-exchange-save.php',
                        data: data,
                        dataType: "json",
                        complete: function() {
                            var delayInMilliseconds = 200;
                            setTimeout(function() {
                                spinnerhide();
                            }, delayInMilliseconds);
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status) {
                                myAlertTop();
                                // loadTable(document.getElementById('hn').value);
                                arr = [];
                                $('.setblood').each(function() {
                                    if ($(this).prop('checked') == true) {
                                        trid = $(this).parents('tr').attr('id');


                                        arr.push(trid);
                                    }
                                });
                                // console.log(arr);
                                $.each(arr, function(key, value) {
                                    $(`#${value}`).remove();
                                });
                            } else {
                                myAlertTopError();
                            }

                        },
                        error: function(data) {
                            console.log('An error occurred.');
                            console.log(data);
                            myAlertTopError();
                        },
                    });
                    return false;
                });

                function getFormData($form) {
                    var unindexed_array = $form.serializeArray();
                    var indexed_array = {};

                    $.map(unindexed_array, function(n, i) {
                        indexed_array[n['name']] = n['value'];
                    });
                    return indexed_array;
                }
                $('#endtime').change(function() {
                    now = new Date($('#starttime').val());
                    then = new Date($('#endtime').val());

                    var ms = moment(then, "DD/MM/YYYY HH:mm:ss").diff(moment(now, "DD/MM/YYYY HH:mm:ss"));
                    var d = moment.duration(ms);
                    var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm");
                    $('#timeuse').val(s);
                    // $('#timeuse').val(s);
                    // console.log(s);

                });

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

            function showPageLost() {
                loadTableLost();
                $("#lostModal").modal("show");

            }

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

            function showDocument() {
                loadDocumentTable();
                $("#bloodDocumentModal").modal("show");

            }

            function closeDocument() {
                $("#bloodDocumentModal").modal("hide");
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
        </script>
        <!-- BEGIN Java Script for this page -->

        <script src="assets/plugins/select2/js/select2.min.js"></script>

        </form>
    </body>

    </html>