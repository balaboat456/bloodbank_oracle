<?php



session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    //include_once('common.php');

    require_once('connection.php');
    include('dateNow.php');


?>
    <?php echo "<script> var report = '" . $_GET['report'] . "'; </script>";   ?>
    <?php echo "<script> var reportsub = '" . $_GET['reportsub'] . "'; </script>";   ?>
    <?php

    date_default_timezone_set('Asia/Bangkok');


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <?php include 'include/title.php' ?>

        <title>RHIS รายงาน</title>

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
            .left_table {
                text-align: left;
            }

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

            .verticalText {
                text-align: center;
                vertical-align: middle;
                width: 20px;
                margin: 0px;
                padding: 0px;
                padding-left: 3px;
                padding-right: 3px;
                padding-top: 10px;
                white-space: nowrap;
                -webkit-transform: rotate(-90deg);
                -moz-transform: rotate(-90deg);
            }

            .input-group>.select2-container--bootstrap {
                display: table;
                table-layout: fixed;
                position: relative;
                z-index: 1;
                width: 100%;
                margin-bottom: 0;
            }
        </style>
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
                                    <h1 class="main-title float-left"><label id="reporttitle"> </label></h1>
                                    <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div style="display:none;" id="div_infectiousform">
                            <div>
                                <label class="form-check-label">
                                    รูปแบบรายงาน &emsp;&emsp;: &emsp;&emsp;
                                </label>
                                <label class="form-check-label">
                                    <input checked class="check3" type="radio" id="infected1" name="infected" value="1">
                                    รายชื่อผู้บริจาคติดเชื้อ
                                </label>&emsp;&emsp;
                                <label class="form-check-label">
                                    <input class="check3" type="radio" id="infected2" name="infected" value="2">
                                    รายชื่อผู้บริจาคติดเชื้อ(แบบแสดงรายละเอียด)
                                </label>

                            </div>
                            <hr />
                        </div>

                        <div style="display:none;" id="div_month_and_day_form">
                            <div>
                                <label class="form-check-label">
                                    รูปแบบรายงาน &emsp;&emsp;: &emsp;&emsp;
                                </label>
                                <label class="form-check-label">
                                    <input checked class="check3" type="radio" id="month_and_day1" name="month_and_day" value="1">
                                    รายงานสถิติการรับเลือดเข้าคลัง (ประจำวัน)
                                </label>&emsp;&emsp;
                                <label class="form-check-label">
                                    <input class="check3" type="radio" id="month_and_day2" name="month_and_day" value="2">
                                    รายงานสถิติการรับเลือดเข้าคลัง (ประจำเดือน)
                                </label>

                            </div>
                            <hr />
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2" style="display:none;" id="div_hn">
                                <label for="inputCity">HN</label>
                                <input autocomplete="off" type="text" name="hn" class="form-control" id="hn" onkeyup="setNewHN(this)">
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_namepatient">
                                <label for="inputCity">ชื่อผู้ป่วย</label>
                                <select name="namepatient" class="form-control" id="namepatient"></select>
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_unitofficeid_ward">
                                <label for="inputCity">หอผู้ป่วย</label>
                                <select name="unitofficeid_ward" class="form-control" id="unitofficeid_ward"></select>
                            </div>

                            <div class="form-group col-md-2" style="display:none;" id="div_fromdate">
                                <label for="inputCity">ตั้งแต่วันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="fromdate" class="form-control date1" id="fromdate">
                            </div>

                            <div class="form-group col-md-1" style="display:none;" id="div_fromtime">
                                <label for="inputCity">เวลา</label>
                                <input autocomplete="off" type="text" value="00:00" name="fromtime" class="form-control" id="fromtime">
                            </div>

                            <div class="form-group col-md-2" style="display:none;" id="div_todate">
                                <label for="inputCity">ถึงวันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="todate" class="form-control date1" id="todate">
                            </div>

                            <div class="form-group col-md-2" style="display:none;" id="div_type">
                                <label for="inputCity">ประเภท</label>
                                <select class="form-control" id="type" name="type"> </select>
                            </div>

                            <div class="form-group col-md-1" style="display:none;" id="div_totime">
                                <label for="inputCity">เวลา</label>
                                <input autocomplete="off" type="text" value="<?php echo date('H:i') ?>" name="totime" class="form-control" id="totime">
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_fromyear">
                                <label for="inputCity">ตั้งแต่ปีที่</label>
                                <input autocomplete="off" type="text" value="<?php echo yearNowDMY() ?>" name="fromyear" class="form-control" id="fromyear">
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_toyear">
                                <label for="inputCity">ถึงปีที่</label>
                                <input autocomplete="off" type="text" value="<?php echo yearNowDMY() ?>" name="toyear" class="form-control" id="toyear">
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_month">
                                <label for="inputCity">ประจำเดือน</label>
                                <select autofocus name="month" class="form-control month" id="month"></select>
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_year">
                                <label for="inputCity">ปี</label>
                                <input autocomplete="off" type="text" value="<?php echo yearNowDMY() ?>" name="year" class="form-control" id="year">
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_onedate">
                                <label for="inputCity">วันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="onedate" class="form-control date1" id="onedate">
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_bloodtypegroupid" >
                                <label for="inputCity">ประเภทเลือด</label>
                                <select autofocus name="bloodtypegroupid" class="form-control bloodtypegroupid" id="bloodtypegroupid"></select>
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_hospitalid" hidden>
                                <label for="inputCity">สาขา</label>
                                <select autofocus name="hospitalid" class="form-control hospitalid" id="hospitalid"></select>
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_unitofficeid"><label>หน่วยงาน</label>
                                <select id="unitofficeid" class="form-control" name="unitofficeid"></select>
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="div_departmentid"><label>หน่วยงาน</label>
                                <select id="departmentid" class="form-control" name="departmentid"></select>
                            </div>

                            <div class="form-group col-md-1" style="display:none;" id="div_bloodgroupid"><label>หมู่เลือด ABO</label>
                                <select id="bloodgroupid" class="form-control" name="bloodgroupid"></select>
                            </div>

                            <div class="form-group col-md-2" style="display:none;" id="div_patientcode">
                                <label for="inputCity">รหัสบัตรประชาชน</label>
                                <input autocomplete="off" type="text" name="patientcode" class="form-control" id="patientcode">
                            </div>
                            <!-- <div class="form-group col-md-2"  style="display:none;" id="div_categoryblood"><label>ประเภทการรักษา</label>
                                <select id="categoryblood" class="form-control" name="categoryblood"></select>
                            </div>
                            
                        -->
                            <div class="form-group col-md-2" style="display:none;" id="div_usercreate"><label>ผู้ทำ</label>
                                <select id="usercreate" class="form-control" name="usercreate"></select>
                            </div>
                            <div class="form-group col-md-3" style="display:none;" id="div_rhid"><label>หมู่เลือด Rh</label>
                                <select id="rhid" class="form-control" name="rhid"></select>
                            </div>

                            <div class="form-group col-md-1" style="display:none;" id="div_in_time">
                                <label class="form-check-label">
                                    <input autocomplete="off" onclick="" type="checkbox" id="in_time" name="in_time" value="1" onchange="set_time(1)">
                                    ในเวลา
                                </label>
                                <br>
                                <label class="form-check-label">
                                    <input autocomplete="off" onclick="" type="checkbox" id="out_time" name="out_time" value="1" onchange="set_time(2)">
                                    นอกเวลา
                                </label>
                            </div>



                            <div class="form-group col-md-2" style="display:none;" id="div_btn_search">
                                <a id="btn_search" style="margin-top: 25px;" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                            </div>

                            <div class="form-group col-md-3" id="div_table"><label></label><br>
                                <div id="report_every_thing"></div>
                            </div>

                        </div>


                        <hr />
                        <div id="div_place">
                            <div class="row">
                                <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                    <div>
                                        <label class="form-check-label">
                                            สถานที่ : &emsp;
                                        </label>
                                        <label class="form-check-label">
                                            <input checked class="check3" type="radio" id="placeid1" name="placeid" value="1" onclick="checkBox(this);placeidClick(1);">
                                            รพ.ราชวิถี
                                        </label>&emsp;
                                        <label class="form-check-label">
                                            <input class="check3" type="radio" id="placeid2" name="placeid" value="2" onclick="checkBox(this);placeidClick(2);">
                                            หน่วยเคลื่อนที่
                                        </label>&emsp;
                                        <label class="form-check-label">
                                            <input class="check3" type="radio" id="placeid3" name="placeid" value="3" onclick="checkBox(this);placeidClick(3);">
                                            กิจกรรม
                                        </label>


                                    </div>
                                </div>

                                <div class="form-group col-md-4" id="isunitofficeblock">
                                    <div class="input-group  mb-2 mr-sm-2 mb-sm-0">
                                        <select style="width: 50%;" id="unitnameid" name="unitnameid" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4" id="isactivityblock">
                                    <div class="input-group  mb-2 mr-sm-2 mb-sm-0">
                                        <select id="activityid" class="form-control" name="activityid">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3" style="display:none;" id="div_donation_status">
                                    &emsp;&emsp;&emsp;&emsp;<label>สถานะบริจาค</label>&emsp;
                                    <input type="radio" class="radio_donate" name="donation" id="donate1" value="1"> บริจาคได้&emsp;
                                    <input type="radio" class="radio_donate" name="donation" id="donate2" value="2"> ไม่ได้
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display:none;" id="div_donation_status2">
                            <div class="form-group col-md-3">
                                &emsp;<label>สถานะบริจาค</label>&emsp;
                                <input type="radio" class="radio_donate" name="donation" id="donate12" value="1"> บริจาคได้&emsp;
                                <input type="radio" class="radio_donate" name="donation" id="donate22" value="2"> ไม่ได้
                            </div>
                        </div>




                        <p>
                        <div class="row">

                        </div>

                        </p>

                    </div>

                    <div class="div-save">
                        <div class="save-bottom">
                            <div class="form-group text-right m-b-0">
                                <div>

                                    <button style="visibility:hidden;" id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
                                        <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                    </button>
                                    <button onclick="reportPrint()" id="reportPrintPdf" class="btn btn-success" type="button">
                                        <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="fetch_table"></div>
                    <!-- <label id="total" style="display:none;" style=" width: 100%;">
                        รวมทั้งหมด <b id="num_count"></b> ราย
                    </label> -->
                    <div class="table-stock-scroll" id="table_report" style="height: 60vh;" hidden>
                        <table id="list_table_json_cross">
                            <thead>
                                <tr id="table_head_report">
                                </tr>
                                <tr id="table_head_report_2">
                                </tr>
                            </thead>
                            <tbody id="table_body_report">
                            </tbody>
                        </table>
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

                <!-- App js -->
                <script src="assets/js/pikeadmin.js"></script>

                <script src="assets/js/EnterNext.js"></script>
                <script src="assets/js/FindData.js"></script>
                <script src="assets/js/DateTimeFormat.js"></script>
                <script src="assets/js/Replace.js"></script>
                <script src="assets/printJS/print.min.js"></script>
                <script src="assets/js/jquery.maskedinput.min.js"></script>

                <script src="assets/js/blood-report-form-select.js"></script>
                <script src="assets/js/blood-report-form-event.js"></script>
                <script src="assets/js/menu.js"></script>
                <!-- BEGIN Java Script for this page -->

                <!-- END Java Script for this page -->

                <script>
                    $(document).ready(function() {

                        $('#fromdate').mask('99/99/9999');
                        $('#todate').mask('99/99/9999');
                        $('#fromtime').mask('99:99');
                        $('#totime').mask('99:99');

                        setBtnExcel();
                        setBtnPdfHidden();
                        dateBE('.date1');
                        // document.getElementById("donation_detail_check").style.display = "block";
                        var titleText = "";

                        if (report == 1) {
                            document.getElementById('reporttitle').innerHTML = "1.ใบตอบรับการบริจาคโลหิต";

                        } else if (report == 2) {
                            titleText = "7.แบบฟอร์มส่ง/รายงานผลตัวอย่างส่งศูนย์บริการโลหิต";
                        } else if (report == 3) {
                            titleText = "8.รายงานการรับบริจาคโลหิตทดแทนญาติ";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report3()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">ลำดับ</th>' +
                                '<th class="td-table">วันที่เจาะ</th>' +
                                '<th class="td-table">Unit No</th>' +
                                '<th class="td-table">HN</th>' +
                                '<th class="td-table">ชื่อ-นามสกุล ผู้ป่วย</th>' +
                                '<th class="td-table">หมู่เลือด</th>' +
                                '<th class="td-table">ตึกผู้ป่วย</th>' +
                                '<th class="td-table">สถานะบริจาค</th>' +
                                '<th class="td-table">หมายเหตุ</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                            document.getElementById("reportPrintExCel").style.visibility = "visible";
                        } else if (report == 4) {
                            titleText = "9.รายงานรายชื่อผู้บริจาคโลหิตติดเชื้อ";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report4()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:10%">เบอร์โลหิต</th>' +
                                '<th class="td-table" style="width:8%">TPHA</th>' +
                                '<th class="td-table" style="width:8%">HBsAg</th>' +
                                '<th class="td-table" style="width:8%">HIV</th>' +
                                '<th class="td-table" style="width:8%">HCV</th>' +
                                '<th class="td-table" style="width:8%">HBVNAT</th>' +
                                '<th class="td-table" style="width:8%">HCVNAT</th>' +
                                '<th class="td-table" style="width:8%">HIVNAT</th>' +
                                '<th class="td-table" style="width:10%">วันที่บริจาค</th>' +
                                '<th class="td-table" style="width:30%">ชื่อผู้บริจาค</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 5) {
                            titleText = "12.รายงานขอบัตรแข็งของศูนย์บริการโลหิตแห่งชาติสภาชาดไทย";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report5()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:7%">ลำดับ</th>' +
                                '<th class="td-table" style="width:10%">เลขที่บัตรรับบริจาคโลหิต</th>' +
                                '<th class="td-table" style="width:30%">ชื่อ-นามสกุล ยศ และคำนำหน้านำ</th>' +
                                '<th class="td-table" style="width:6">หมู่โลหิต</th>' +
                                '<th class="td-table" style="width:10%">วัน/เดือน/ปี เกิด</th>' +
                                '<th class="td-table" style="width:40%">ที่อยู่</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                            document.getElementById("reportPrintExCel").style.visibility = "visible";
                        } else if (report == 6) {
                            titleText = "1.สถิติ Statistic Of Single Donor Platelet Process";
                            // document.getElementById('report_every_thing').innerHTML =
                            //     '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report6()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';

                        } else if (report == 7) {
                            document.getElementById('reporttitle').innerHTML =
                                "7.รายงาน Quality Control Of Single Donor Platelet(SDP)";

                        } else if (report == 8) {
                            document.getElementById('reporttitle').innerHTML =
                                "8.รายงานสรุปการยืม/คืนเลือดกับสถานพยาบาลอื่น";
                        } else if (report == 9) {
                            titleText = "2.รายงานสถิติห้องรับบริจาคเกล็ดโลหิต";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report9()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';

                        } else if (report == 10) {
                            titleText = "1.รายงานการรับเลือดเข้าคลังประจำวัน";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report10()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:10%">วันที่รับเลือด</th>' +
                                '<th class="td-table" style="width:20%">สาขา</th>' +
                                '<th class="td-table" style="width:30%">ประเภทการรับเลือด</th>' +
                                '<th class="td-table" style="width:30%">ชนืดเลือด</th>' +
                                '<th class="td-table" style="width:10%">จำนวน</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                            document.getElementById("reportPrintExCel").style.visibility = "visible";
                        } else if (report == 11) {
                            titleText = "1.รายงาน Blood Collection";

                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report11()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:3%">No.</th>' +
                                '<th class="td-table" style="width:5%">วันที่บริจาค</th>' +
                                '<th class="td-table" style="width:5%">วันที่ครบกำหนด</th>' +
                                '<th class="td-table" style="width:8%">Unit No.</th>' +
                                '<th class="td-table" style="width:20%">Name</th>' +
                                '<th class="td-table" style="width:4%">Age</th>' +
                                '<th class="td-table" style="width:4%">Bl.Gr.</th>' +
                                '<th class="td-table" style="width:8%">ประเภทการบริจาค</th>' +
                                '<th class="td-table" style="width:13%">ชนิดถุง</th>' +
                                '<th class="td-table" style="width:6%">ครั้งที่บริจาค</th>' +
                                '<th class="td-table" style="width:6%">สถานะบริจาค</th>' +
                                '<th class="td-table" >หมายเหตุ</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                            // document.getElementById('donation_status').hidden = false;
                            // document.getElementById('div_donation_status').hidden = false;
                        } else if (report == 12) {
                            document.getElementById('reporttitle').innerHTML =
                                "12.รายงานจำนวน Platelet conc. และ SDP. ที่จะผ่าน Lab.";
                        } else if (report == 13) {
                            titleText = "2.รายงานการรับเลือดเข้าคลังประจำเดือน";
                            document.getElementById('report_every_thing').innerHTML =
                                '<br><a  role="button" href="#" onclick="table_report13()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            document.getElementById("reportPrintExCel").style.visibility = "visible";
                        } else if (report == 14) {
                            titleText = "3.รายงานผู้ที่ไม่สามารถบริจาคเลือดได้";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report14()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" >No.</th>' +
                                '<th class="td-table" >เลขที่ผู้บริจาค</th>' +
                                '<th class="td-table" >ชื่อ-นามสกุล</th>' +
                                '<th class="td-table" style="width:50%">สาเหตุ</th>' +
                                '<th class="td-table" >วันที่บริจาค</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 15) {
                            titleText = "2.รายงานสถิติผู้ที่สามารถบริจาคเลือดได้";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report15()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:4%">ลำดับที่</th>' +
                                '<th class="td-table" style="width:7%">เลขประจำตัวผู้บริจาก</th>' +
                                '<th class="td-table" style="width:15%">รหัสบัตรประชาชน</th>' +
                                '<th class="td-table" style="width:20%">ชื่อ-นามสกุล</th>' +
                                '<th class="td-table" style="width:5%">อายุ</th>' +
                                '<th class="td-table" >ที่อยู่</th>' +
                                '<th class="td-table" style="width:9%">เบอร์โทรศัพท์</th>' +
                                '<th class="td-table" style="width:6%">หมู่เลือด</th>' +
                                '<th class="td-table" style="width:6%">Rh</th>' +
                                '<th class="td-table" style="width:7%">ครั้งที่บริจาค</th>' +
                                '<th class="td-table" style="width:9%">วันที่บริจาค</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 16) {
                            titleText = "5.รายงานสถิติเจ้าหน้าที่ที่มาบริจาคโลหิต";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report16()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">ลำดับ</th>' +
                                '<th class="td-table">เลขประจำตัวผู้บริจาค</th>' +
                                '<th class="td-table">หมายเลขถุง</th>' +
                                '<th class="td-table">ชื่อ-สกุล</th>' +
                                '<th class="td-table">อายุ</th>' +
                                '<th class="td-table">หน่วยงาน</th>' +
                                '<th class="td-table">ที่อยู่</th>' +
                                '<th class="td-table">เบอร์โทร</th>' +
                                '<th class="td-table">หมู่เลือด</th>' +
                                '<th class="td-table">Rh</th>' +
                                '<th class="td-table">ครั้งที่บริจาค</th>' +
                                '<th class="td-table">วันที่บริจาค</th>' +
                                '<th class="td-table">สถานะบริจาค</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 17) {
                            titleText = "4.รายงานสถิติสาเหตุที่ไม่สามารถบริจาคเลือดได้";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report17()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:80%">สาเหตุ</th>' +
                                '<th class="td-table" style="width:20%">จำนวน</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 18) {
                            titleText = "6.รายงานกิจกรรมการบริจาคโลหิต";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report18()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:10%">ลำดับที่</th>' +
                                '<th class="td-table" style="width:15%">วันที่บริจาค</th>' +
                                '<th class="td-table" style="width:25%">จำนวนผู้บริจาค (คน)</th>' +
                                '<th class="td-table" style="width:25%">จำนวนผู้บริจาคได้ (คน)</th>' +
                                '<th class="td-table" style="width:25%">จำนวนผู้บริจาคไม่ได้ (คน)</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                            document.getElementById("reportPrintExCel").style.visibility = "visible";
                        } else if (report == 19) {
                            titleText = "3.สถิติปัญหาแทรกซ้อนจากบริจาคเกล็ดโลหิต";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report19()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:10%">ลำดับที่</th>' +
                                '<th class="td-table" style="width:80%">สาเหตุ</th>' +
                                '<th class="td-table" style="width:10%">จำนวน (คน)</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 20) {
                            document.getElementById('reporttitle').innerHTML =
                                "17.รายงานผลปฏิกิริยาหลังการเจาะเก็บและปัญหาการรับบริจาค";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report20()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';

                        } else if (report == 21) {
                            document.getElementById('reporttitle').innerHTML =
                                "18.รายงานสถิตสรุปการปฎิเสธสิ่งส่งตรวจ";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report21()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table" style="width:10%">ลำดับที่</th>' +
                                '<th class="td-table" style="width:80%">รายการปฎิเสธสิ่งส่งตรวจ</th>' +
                                '<th class="td-table" style="width:10%">จำนวน</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 23) {
                            titleText = "4.รายงานสถิติเลือดหมดอายุในคลัง";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report23()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">ลำดับ</th>' +
                                '<th class="td-table">ชนิด</th>' +
                                '<th class="td-table">จำนวน</th>';
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 24) {
                            document.getElementById('reporttitle').innerHTML =
                                "รายงานสถิติการรักษา";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report24()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';

                        } else if (report == 25) {
                            titleText = "1.รายงานสรุปจำนวน crossmatch และจำนวนที่จ่ายจริง";

                        } else if (report == 26) {
                            if (reportsub == 1) {
                                titleText = "1.รายงานการทำ Blood Letting";
                                document.getElementById("reportPrintExCel").style.visibility = "visible";

                            } else if (reportsub == 2) {
                                titleText = "2.รายงานการทำ Exchange";
                            } else if (reportsub == 3) {
                                titleText = "3.รายงานการทำ Washed Red Cell";
                            } else if (reportsub == 4) {
                                titleText = "4.รายงานการทำ Serum Tear";
                            }

                            document.getElementById('table_report').hidden = false;

                            table_header_report26(reportsub);
                            document.getElementById("btn_search").setAttribute("onClick", "onclick_table_body_report26('" + reportsub + "')");


                        } else if (report == 27) {
                            titleText = "13.รายงานอุบัติการณ์";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report27()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">No.</th>' +
                                '<th class="td-table">วันที่บริจาค</th>' +
                                '<th class="td-table">เลขที่ผู้บริจาค</th>' +
                                '<th class="td-table">เลขบัตรประชาชน</th>' +
                                '<th class="td-table">ชื่อ-นามสกุล</th>' +
                                '<th class="td-table" style="width:40%">อุบัติการณ์</th>' +
                                '<th class="td-table" style="width:15%">พิมพ์</th>'

                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 28) {
                            titleText = "14.รายงานการขอใบรับรองการบริจาค";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report28()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">No.</th>' +
                                '<th class="td-table">วันที่บริจาค</th>' +
                                '<th class="td-table">เลขที่ผู้บริจาค</th>' +
                                '<th class="td-table">เลขบัตรประชาชน</th>' +
                                '<th class="td-table">ชื่อ-นามสกุล</th>' +
                                '<th class="td-table" style="width:30%">ขอใบรับรองการรับบริจาคสำหรับ</th>' +
                                '<th class="td-table">ผู้ออกใบรับรอง</th>'
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;
                        } else if (report == 29) {
                            titleText = "6.สถิติการจ่ายเลือด";
                            table_header_report29();
                            document.getElementById('table_report').hidden = false;
                            document.getElementById("btn_search").setAttribute("onClick", "onclick_table_body_report29()");

                        } else if (report == 30) {
                            titleText = "7.สถิติการขอใช้เลือด";
                            table_header_report30();
                            document.getElementById('table_report').hidden = false;
                            document.getElementById("btn_search").setAttribute("onClick", "onclick_table_body_report30()");

                        } else if (report == 31) {
                            titleText = "7.รายงานการขอเบิก-รับโลหิตพิเศษ";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report31()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">No.</th>' +
                                '<th class="td-table">วันที่ขอเบิก</th>' +
                                '<th class="td-table">ชื่อ – สกุล</th>' +
                                '<th class="td-table">HN</th>' +
                                '<th class="td-table">blood group</th>' +
                                '<th class="td-table">Ag ที่ต้องการ</th>' +
                                '<th class="td-table">จำนวนที่จอง</th>' +
                                '<th class="td-table">จำนวนที่ได้รับจากสภากาชาด</th>'
                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;

                        } else if (report == 32) {
                            titleText = "3.รายงานการแพ้เลือดประจำเดือน";
                            document.getElementById('report_every_thing').innerHTML =
                                '<a style="margin-top: 7px;" role="button" href="#" onclick="table_report32()" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>';
                            var head = '<th class="td-table">No.</th>' +
                                '<th class="td-table">วัน/เวลาที่เกิดอาการ</th>' +
                                '<th class="td-table">HN</th>' +
                                '<th class="td-table">ชื่อ- สกุล</th>' +
                                '<th class="td-table">ชนิดเลือดที่แพ้</th>' +
                                '<th class="td-table">รายละเอียดอาการข้างเคียง</th>' +
                                '<th class="td-table">พิมพ์</th>';


                            document.getElementById('table_head_report').innerHTML = head;
                            document.getElementById('table_report').hidden = false;

                        } else {
                            document.getElementById('reporttitle').innerHTML = "";
                        }

                        document.title = titleText;
                        document.getElementById('reporttitle').innerHTML = titleText;


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


                    function table_header_report26(reportsub = '') {

                        var event_data = '';
                        event_data += '<th >ลำดับ</th>';
                        event_data += '<th >วันที่-เวลา</th>';
                        event_data += '<th>HN</th>';
                        event_data += '<th>ชื่อ-สกุล</th>';
                        event_data += '<th>Diagnosis</th>';
                        event_data += '<th>Ward</th>';

                        if (reportsub == 2)
                            event_data += '<th>ประเภทการทำ</th>';

                        event_data += '<th>ผู้ทำ</th>';
                        $("#table_head_report").append(event_data);

                        if (reportsub == 1) {
                            var head = '<th class="td-table" rowspan="2">ลำดับ</th>' +
                                '<th class="td-table" rowspan="2">วัน/เดือน/ปี</th>' +
                                '<th class="td-table" colspan="4">ข้อมูลผู้ป่วย</th>' +
                                '<th class="td-table" rowspan="2">เวลา</th>' +
                                '<th class="td-table" rowspan="2">ผู้ทำ</th>'
                            document.getElementById('table_head_report').innerHTML = head;

                            var head2 = '<th class="td-table">ชื่อ - นามกสุล</th>' +
                                '<th class="td-table">HN</th>' +
                                '<th class="td-table">Diagnosis</th>' +
                                '<th class="td-table">หอผู้ป่วย</th>';
                            document.getElementById('table_head_report_2').innerHTML = head2;
                        }

                    }

                    function onclick_table_body_report26(reportsub = '') {

                        var fromdate = dmyToymd2($('#fromdate').val());
                        var todate = dmyToymd2($('#todate').val());

                        var fromtime = $('#fromtime').val();
                        var totime = $('#totime').val();

                        var usercreate = "";

                        var fromdatetime = fromdate + ' ' + fromtime;
                        var todatetime = todate + ' ' + totime;

                        // alert(fromdatetime);

                        if ($('#usercreate').val())
                            usercreate = $('#usercreate').val();


                        var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }

                        var reporturl = '';
                        if (reportsub == 1) {
                            reporturl = 'data/report_every_thing26_1.php?fromdatetime=' + fromdatetime + '&todatetime=' + todatetime + '&usercreate=' + usercreate;
                        } else if (reportsub == 2) {
                            reporturl = 'data/report_every_thing26_2.php?fromdatetime=' + fromdatetime + '&todatetime=' + todatetime + '&usercreate=' + usercreate;
                        } else if (reportsub == 3) {
                            reporturl = 'data/report_every_thing26_3.php?fromdatetime=' + fromdatetime + '&todatetime=' + todatetime + '&usercreate=' + usercreate;
                        } else if (reportsub == 4) {
                            reporturl = 'data/report_every_thing26_4.php?fromdatetime=' + fromdatetime + '&todatetime=' + todatetime + '&usercreate=' + usercreate;
                        }

                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: reporturl,
                            success: function(data) {

                                var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                                var event_data = '';

                                $.each(obj, function(index, value) {
                                    if (reportsub == 1) {
                                        event_data += table_data_report26_1(index, value, obj.length);
                                    } else if (reportsub == 2) {
                                        event_data += table_data_report26_2(index, value, obj.length);
                                    } else if (reportsub == 3) {
                                        event_data += table_data_report26_3(index, value, obj.length);
                                    } else if (reportsub == 4) {
                                        event_data += table_data_report26_4(index, value, obj.length);
                                    }


                                });


                                $("#list_table_json_cross").append(event_data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_data_report26_1(index, value = '', countreq) {
                        var event_data = '';
                        event_data += '';
                        event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + countreq + ')" >';
                        event_data += '<td  style="display:none;" >';
                        event_data += JSON.stringify(value);
                        event_data += '</td>';
                        event_data += '<td >' + value.num_row + '</td>';
                        event_data += '<td >' + value.datetimee + '</td>';
                        event_data += '<td >' + value.patientfullname + '</td>';
                        event_data += '<td >' + value.patienthn + '</td>';
                        event_data += '<td>' + value.diagnosis + ' ' + value.diagnosisdetail + '</td>';
                        event_data += '<td>' + value.unitofficename + '</td>';
                        event_data += '<td>' + value.timeedate + '</td>';
                        event_data += '<td>' + value.usercreatename + '</td>';

                        event_data += '</tr>';

                        return event_data;
                    }

                    function table_data_report26_2(index, value = '', countreq) {
                        var event_data = '';
                        event_data += '';
                        event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + countreq + ')" >';
                        event_data += '<td  style="display:none;" >';
                        event_data += JSON.stringify(value);
                        event_data += '</td>';
                        event_data += '<td >' + value.num_row + '</td>';
                        event_data += '<td >' + getDMY(value.bloodexchangedate) + ' ' + value.bloodexchangetime + '</td>';
                        event_data += '<td >' + value.patienthn + '</td>';
                        event_data += '<td >' + value.patientfullname + '</td>';
                        event_data += '<td>' + value.diagnosis + ' ' + value.diagnosisdetail + '</td>';
                        event_data += '<td>' + value.unitofficename + '</td>';
                        event_data += '<td>' + value.bloodexchangetypename + '</td>';
                        event_data += '<td>' + value.usercreatename + '</td>';

                        event_data += '</tr>';

                        return event_data;
                    }

                    function table_data_report26_3(index, value = '', countreq) {
                        var event_data = '';
                        event_data += '';
                        event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + countreq + ')" >';
                        event_data += '<td  style="display:none;" >';
                        event_data += JSON.stringify(value);
                        event_data += '</td>';
                        event_data += '<td >' + value.num_row + '</td>';
                        event_data += '<td >' + value.user_send_wash_date + '</td>';
                        event_data += '<td >' + value.patienthn + '</td>';
                        event_data += '<td >' + value.patientfullname + '</td>';
                        event_data += '<td>' + value.diagnosis + ' ' + value.diagnosisdetail + '</td>';
                        event_data += '<td>' + value.unitofficename + '</td>';
                        event_data += '<td>' + value.user_done_wash + '</td>';

                        event_data += '</tr>';

                        return event_data;
                    }

                    function table_data_report26_4(index, value = '', countreq) {
                        var event_data = '';
                        event_data += '';
                        event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + countreq + ')" >';
                        event_data += '<td  style="display:none;" >';
                        event_data += JSON.stringify(value);
                        event_data += '</td>';
                        event_data += '<td >' + value.num_row + '</td>';
                        event_data += '<td >' + getDMYHM(value.serumteardatetime) + '</td>';
                        event_data += '<td >' + value.patienthn + '</td>';
                        event_data += '<td >' + value.patientfullname + '</td>';
                        event_data += '<td>' + value.diagnosis + ' ' + value.diagnosisdetail + '</td>';
                        event_data += '<td>' + value.unitofficename + '</td>';
                        event_data += '<td>' + value.usercreatename + '</td>';

                        event_data += '</tr>';

                        return event_data;
                    }

                    function table_header_report29() {

                        var event_data = '';
                        event_data += '<th >เดือน</th>';
                        event_data += '<th style="width:160px;">จ่ายเพราะหมดอายุ</th>';
                        event_data += '<th style="width:160px;">จ่ายเพราะเสียหาย</th>';
                        event_data += '<th style="width:160px;">จ่ายให้ ER</th>';
                        event_data += '<th style="width:160px;">จ่ายคืนให้ รพ. อื่น</th>';
                        event_data += '<th style="width:160px;">จ่ายแลกให้ รพ. อื่น</th>';
                        event_data += '<th style="width:160px;">จ่ายให้ รพ. ยืม</th>';
                        event_data += '<th style="width:160px;">จ่ายให้ผู้ป่วยใน</th>';
                        event_data += '<th style="width:160px;">จ่ายให้ผู้ป่วยใน(Crossmatch)</th>';
                        $("#table_head_report").append(event_data);

                        document.getElementById("list_table_json_cross").style.width = "1300px";

                        onclick_table_body_report29();

                    }

                    function onclick_table_body_report29() {

                        var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }

                        var year = $("#year").val();
                        var bloodstocktypegroupid = $("#bloodtypegroupid").val();
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing29.php?year=' + year+'&bloodstocktypegroupid='+bloodstocktypegroupid,
                            success: function(data) {

                                var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                                var event_data = '';
                                var sum3 = sum9 = sum2 = sum5 = sum6 = sum7 = sum8 = sumcross = 0;
                                $.each(obj, function(index, value) {

                                    event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + obj.length + ')" >';
                                    event_data += '<td  style="display:none;" >';
                                    event_data += JSON.stringify(value);
                                    event_data += '</td>';
                                    event_data += '<td style="text-align: left;">' + value.monthname + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype3 + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype9 + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype2 + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype5 + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype6 + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype7 + '</td>';
                                    event_data += '<td>' + value.sum_bloodstockpaytype8 + '</td>';
                                    event_data += '<td>' + value.sum_crossmatch + '</td>';


                                    event_data += '</tr>';

                                    sum3 += parseInt(value.sum_bloodstockpaytype3);
                                    sum9 += parseInt(value.sum_bloodstockpaytype9);
                                    sum2 += parseInt(value.sum_bloodstockpaytype2);
                                    sum5 += parseInt(value.sum_bloodstockpaytype5);
                                    sum6 += parseInt(value.sum_bloodstockpaytype6);
                                    sum7 += parseInt(value.sum_bloodstockpaytype7);
                                    sum8 += parseInt(value.sum_bloodstockpaytype8);
                                    sumcross += parseInt(value.sum_crossmatch);

                                });
                                event_data += '<tr>';
                                event_data += '<td>รวมประจำปี</td>';
                                event_data += '<td>' + sum3 + '</td>';
                                event_data += '<td>' + sum9 + '</td>';
                                event_data += '<td>' + sum2 + '</td>';
                                event_data += '<td>' + sum5 + '</td>';
                                event_data += '<td>' + sum6 + '</td>';
                                event_data += '<td>' + sum7 + '</td>';
                                event_data += '<td>' + sum8 + '</td>';
                                event_data += '<td>' + sumcross + '</td>';
                                event_data += '</tr>';
                                $("#list_table_json_cross").append(event_data);



                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_header_report30() {

                        var event_data = '';
                        event_data += '<th >เดือน</th>';
                        event_data += '<th style="width:160px;">จำนวนที่ขอ</th>';
                        event_data += '<th style="width:160px;">จำนวนที่เตรียม</th>';
                        event_data += '<th style="width:160px;">จำนวนที่ใช้</th>';
                        event_data += '<th style="width:160px;">C/T ratio</th>';
                        event_data += '<th style="width:160px;">R/T ratio</th>';
                        $("#table_head_report").append(event_data);

                        document.getElementById("list_table_json_cross").style.width = "600px";

                        onclick_table_body_report30();

                    }

                    function onclick_table_body_report30() {

                        var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }

                        var year = $("#year").val();
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing30.php?year=' + year,
                            success: function(data) {

                                var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                                var event_data = '';
                                var sum1 = sum2 = sum3 = sum4 = sum5 = t = l = 0;
                                $.each(obj, function(index, value) {

                                    event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + obj.length + ')" >';
                                    event_data += '<td  style="display:none;" >';
                                    event_data += JSON.stringify(value);
                                    event_data += '</td>';
                                    event_data += '<td style="text-align: left;">' + value.monthname + '</td>';
                                    event_data += '<td>' + value.sum_requestblooditemqty + '</td>';
                                    event_data += '<td>' + value.sum_crossmacth + '</td>';
                                    event_data += '<td>' + value.sum_crossmacth_pay + '</td>';
                                    event_data += '<td id = "sum1' + index + '">' + ((parseInt(value.sum_crossmacth)) ? (parseFloat(parseInt(value.sum_crossmacth) / parseInt(value.sum_crossmacth_pay))).toFixed(2) : '0') + '</td>';
                                    event_data += '<td>' + ((parseInt(value.sum_requestblooditemqty)) ? (parseFloat(parseInt(value.sum_requestblooditemqty) / parseInt(value.sum_crossmacth_pay))).toFixed(2) : '0') + '</td>';


                                    event_data += '</tr>';
                                    t = ((parseInt(value.sum_crossmacth)) ? (parseFloat(parseInt(value.sum_crossmacth) / parseInt(value.sum_crossmacth_pay))).toFixed(2) : '0');
                                    l = ((parseInt(value.sum_requestblooditemqty)) ? (parseFloat(parseInt(value.sum_requestblooditemqty) / parseInt(value.sum_crossmacth_pay))).toFixed(2) : '0');
                                    sum1 = sum1 + parseInt(value.sum_requestblooditemqty);
                                    sum2 = sum2 + parseInt(value.sum_crossmacth);
                                    sum3 = sum3 + parseInt(value.sum_crossmacth_pay);
                                    sum4 = sum4 + parseFloat(t);
                                    sum5 = sum5 + parseFloat(l);

                                });
                                sum4 = sum4.toFixed(2);
                                sum5 = sum5.toFixed(2);
                                event_data += '<tr>';
                                event_data += '<td>รวมประจำปี</td>';
                                event_data += '<td>' + sum1 + '</td>';
                                event_data += '<td>' + sum2 + '</td>';
                                event_data += '<td>' + sum3 + '</td>';
                                event_data += '<td>' + parseFloat(sum2/sum3).toFixed(2)  + '</td>';
                                event_data += '<td>' + parseFloat(sum1/sum3).toFixed(2) + '</td>';
                                event_data += '</tr>';
                                $("#list_table_json_cross").append(event_data);

                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function chActive(id, countReq) {

                        for (i = 0; i < countReq; i++) {
                            document.getElementById("trblood" + i).style.background = "#FFF";
                        }
                        document.getElementById("trblood" + id).style.background = "#b7e4eb";

                    }

                    function table_report3() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var unitofficeid = document.getElementById("unitofficeid").value;
                        var bloodgroupid = document.getElementById("bloodgroupid").value;
                        var donation = $('input[name="donation"]:checked').val();

                        var namepatient = document.getElementById("namepatient").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(month);
                        // alert(year);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing3.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                unitofficeid: unitofficeid,
                                bloodgroupid: bloodgroupid,
                                namepatient: namepatient,
                                donation: donation
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;

                                document.getElementById('num_count').innerHTML = data.number;
                                // alert(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report4() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var placeid = document.getElementsByName("placeid");
                        var unitnameid = document.getElementById("unitnameid").value;

                        var placeid = "1";
                        if (document.getElementById("placeid2").checked) {
                            placeid = "2";
                        } else if (document.getElementById("placeid3").checked) {
                            placeid = "3";
                        }


                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(unitnameid);

                        // alert(year);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing4.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                placeid: placeid,
                                unitnameid: unitnameid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                // alert(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report5() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var placeid = document.getElementsByName("placeid");
                        var unitnameid = document.getElementById("unitnameid").value;
                        var activityid = document.getElementById("activityid").value;
                        var placeid = "1";
                        if (document.getElementById("placeid2").checked) {
                            placeid = "2";
                        } else if (document.getElementById("placeid3").checked) {
                            placeid = "3";
                        }



                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(unitnameid);

                        // alert(year);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing5.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                placeid: placeid,
                                unitnameid: unitnameid,
                                activityid: activityid
                            },
                            success: function(data) {
                                console.log(data)
                                document.getElementById('table_body_report').innerHTML = data.data;
                                // alert(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report6() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing6.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('fetch_table').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report9() {
                        var fromdate = document.getElementById("fromyear").value;
                        var todate = document.getElementById("toyear").value;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing9.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('fetch_table').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report10() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var hospitalid = document.getElementById("hospitalid").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing10.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                hospitalid: hospitalid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report11() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var donation_status1 = document.getElementById("donate1").checked;
                        var donation_status2 = document.getElementById("donate2").checked;

                        var donation_status = 0;
                        if (donation_status1 == true) {
                            donation_status = 1;
                        } else if (donation_status2 == true) {
                            donation_status = 2;
                        }



                        var unitnameid = document.getElementById("unitnameid").value;
                        if (unitnameid == '') {
                            unitnameid = 0;
                        }
                        var bloodgroupid = document.getElementById("bloodgroupid").value;
                        if (bloodgroupid == '') {
                            bloodgroupid = 0;
                        }
                        var rhid = document.getElementById("rhid").value;
                        if (rhid == '') {
                            rhid = 0;
                        }
                        var activityid = document.getElementById("activityid").value;
                        if (activityid == '') {
                            activityid = 0;
                        }

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        var placeid = "1";
                        if (document.getElementById("placeid2").checked) {
                            placeid = "2";
                        } else if (document.getElementById("placeid3").checked) {
                            placeid = "3";
                        }

                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing11.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                unitnameid: unitnameid,
                                donation_status: donation_status,
                                activityid: activityid,
                                placeid: placeid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report13() {
                        var month = document.getElementById("month").value;
                        var year = document.getElementById("year").value;
                        var hospitalid = document.getElementById("hospitalid").value;
                        // alert(month);
                        // alert(year);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing13.php',
                            data: {
                                month: month,
                                year: year,
                                hospitalid: hospitalid
                            },
                            success: function(data) {
                                document.getElementById('fetch_table').innerHTML = data.data;
                                console.log(data.query);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report14() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var unitnameid = document.getElementById("unitnameid").value;
                        if (unitnameid == '') {
                            unitnameid = 0;
                        }
                        var rhid = document.getElementById("rhid").value;
                        if (rhid == '') {
                            rhid = 0;
                        }
                        var activityid = document.getElementById("activityid").value;
                        if (activityid == '') {
                            activityid = 0;
                        }

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        var placeid = "1";
                        if (document.getElementById("placeid2").checked) {
                            placeid = "2";
                        } else if (document.getElementById("placeid3").checked) {
                            placeid = "3";
                        }

                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing14.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                unitnameid: unitnameid,
                                activityid: activityid,
                                placeid: placeid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report15() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var unitnameid = document.getElementById("unitnameid").value;
                        if (unitnameid == '') {
                            unitnameid = 0;
                        }
                        var bloodgroupid = document.getElementById("bloodgroupid").value;
                        if (bloodgroupid == '') {
                            bloodgroupid = 0;
                        }
                        var rhid = document.getElementById("rhid").value;
                        if (rhid == '') {
                            rhid = 0;
                        }
                        var activityid = document.getElementById("activityid").value;
                        if (activityid == '') {
                            activityid = 0;
                        }

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        var placeid = "1";
                        if (document.getElementById("placeid2").checked) {
                            placeid = "2";
                        } else if (document.getElementById("placeid3").checked) {
                            placeid = "3";
                        }

                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing15.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                unitnameid: unitnameid,
                                placeid: placeid,
                                bloodgroupid: bloodgroupid,
                                activityid: activityid,
                                rhid: rhid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report16() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var departmentid = document.getElementById("departmentid").value;
                        var bloodgroupid = document.getElementById("bloodgroupid").value;
                        var rhid = document.getElementById("rhid").value;
                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        var donation_status1 = document.getElementById("donate12").checked;
                        var donation_status2 = document.getElementById("donate22").checked;

                        var donation_status = 0;
                        if (donation_status1 == true) {
                            donation_status = 1;
                        } else if (donation_status2 == true) {
                            donation_status = 2;
                        }

                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing16.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                departmentid: departmentid,
                                bloodgroupid: bloodgroupid,
                                donation_status: donation_status,
                                rhid: rhid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report17() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing17.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report18() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing18.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report19() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing19.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report20() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing20.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('fetch_table').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report21() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing21.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data.data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report23() {
                        var month = document.getElementById("month").value;
                        var year = document.getElementById("year").value;
                        // alert(month);
                        // alert(year);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing23.php',
                            data: {
                                month: month,
                                year: year
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report24() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing24.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('fetch_table').innerHTML = data.data;
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }


                    function table_report26() {

                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing26.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                console.log(data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report27() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing27.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data);

                                // var body = document.getElementById("table_body_report").getElementsByTagName('tbody')[0];
                                // while (body.firstChild) {
                                //     body.removeChild(body.firstChild);
                                // }


                                // var event_data = '';


                                // // $("#blood-query").text(data.total);
                                // var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""'));

                                // $.each(obj, function(index, value) {

                                //     var arr = [value];
                                //     event_data += '<tr >';
                                //     event_data += '<td class="td-table">' + (index + 1) + '</td>';
                                //     event_data += '<td class="td-table">' + getDMYHM(value.donation_date) + '</td>';
                                //     event_data += '<td class="td-table" style="text-align:left;">' + value.donorcode + '</td>';
                                //     event_data += '<td class="td-table" style="text-align:left;">' + value.donoridcard + '</td>';
                                //     event_data += '<td class="td-table" style="text-align:left;">' + value.fullname + '</td>';
                                //     event_data += '<td class="td-table" style="text-align:left;">' + value.remarkaccident + '</td>';
                                //     event_data += '<td class="td-table" style="text-align:left;">' + '<button type = "button" onclick = "printreport()" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
                                //         // event_data += '<input type = "hidden" id="reportexchange" value = "'+value.bloodstockpaymainid+'">';   


                                //     event_data += '</tr>';
                                // });
                                // $("#table_body_report").append(event_data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report28() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var user_login = document.getElementById("name_login").innerHTML;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        var patientcode = document.getElementById("patientcode").value;
                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing28.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                user_login: user_login,
                                patientcode: patientcode,
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data);


                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report31() {
                        var fromdate2 = document.getElementById("fromdate").value;
                        var todate2 = document.getElementById("todate").value;
                        var hn = document.getElementById("hn").value;

                        var fromyear = fromdate2.substr(-4, 4);
                        var toyear = todate2.substr(-4, 4);

                        var frommouth = fromdate2.substr(-7, 2);
                        var tomouth = todate2.substr(-7, 2);

                        var fromday = fromdate2.substr(0, 2);
                        var today = todate2.substr(0, 2);

                        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                        var todate = toyear + '-' + tomouth + '-' + today;

                        var recid = document.getElementById("type").value;

                        // alert(fromdate);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing31.php',
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                hn: hn,
                                recid: recid
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                console.log(data);


                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function table_report32() {
                        var month = document.getElementById("month").value;
                        var year = document.getElementById("year").value;
                        //    console.log(month);
                        // alert(month+year);
                        $.ajax({
                            type: 'GET',
                            dataType: 'json',
                            url: 'data/report_every_thing32.php',
                            data: {
                                month: month,
                                year: year
                            },
                            success: function(data) {
                                document.getElementById('table_body_report').innerHTML = data.data;
                                // console.log(data);
                            },
                            error: function(data) {
                                console.log("errrrr");
                            },
                        });
                    }

                    function printAllergicBlood(id) {
                        printJS({
                            printable: localurl + "/report/blood-allergic-form.php?id=" + id,
                            type: 'pdf',
                            showModal: true
                        });
                    }

                    function set_time(val) {
                        if (val == 1) {
                            document.getElementById("out_time").checked = false;
                        } else if (val == 2) {
                            document.getElementById("in_time").checked = false;
                        }
                    }
                </script>
                <!-- BEGIN Java Script for this page -->

                <script src="assets/plugins/select2/js/select2.min.js"></script>

    </body>

    </html>