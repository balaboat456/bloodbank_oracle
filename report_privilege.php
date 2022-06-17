<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    include('checkPermission.php');

    require_once('connection.php');
    include('dateNow.php');


?>

    <?php

    date_default_timezone_set('Asia/Bangkok');


    $script_tz = date_default_timezone_get();



    if (strcmp($script_tz, ini_get('date.timezone'))) {

        echo '';
    } else {

        echo '';
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include 'include/title.php' ?>

        <title>12.รายงานขอบัตรแข็งของศูนย์บริการโลหิตแห่งชาติสภาชาดไทย</title>
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

        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/jquery-ui/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/jquery-ui/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css" />


        <!-- BEGIN CSS for this page -->
        <script src="assets/js/sweetalert-2.min.js"></script>
        <style>
            td.details-control {
                background: url('assets/plugins/datatables/img/details_open.png') no-repeat center center;
                cursor: pointer;
            }

            tr.shown td.details-control {
                background: url('assets/plugins/datatables/img/details_close.png') no-repeat center center;
            }

            .dataTables_filter {
                display: none;
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
        </style>
        <!-- END CSS for this page -->

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
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">12.รายงานขอบัตรแข็งของศูนย์บริการโลหิตแห่งชาติสภาชาดไทย</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"></li>
                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->





                        <div class="row">

                            <div class="form-group col-md-3" id="div_fromdate">
                                <label for="inputCity">ตั้งแต่วันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="fromdate" class="form-control date1" id="fromdate">
                            </div>

                            <div class="form-group col-md-3" id="div_todate">
                                <label for="inputCity">ถึงวันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="todate" class="form-control date1" id="todate">
                            </div>

                            <div hidden class="form-group col-md-3">
                                <label for="inputCity">whereid</label>
                                <input autocomplete="off" type="text" value="0" name="whereid" class="form-control" id="whereid">
                            </div>

                            <div hidden class="form-group col-md-3">
                                <label for="inputCity">whereid2</label>
                                <input autocomplete="off" type="text" value="0" name="whereid2" class="form-control" id="whereid2">
                            </div>




                            <div class="form-group col-md-6">
                                <a style="margin-top: 30px;" role="button" href="#" onclick="table_report5(); table_report5_2(); table_report5_3();" class="btn btn-info">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                            </div>

                            <div hidden class="form-group col-md-3">
                                <div>
                                    <label class="form-check-label">
                                        สถานที่ &emsp;&emsp;: &emsp;&emsp;
                                    </label>
                                    <label class="form-check-label">
                                        <input checked class="check3" type="radio" id="placeid1" name="placeid" value="1" onclick="checkBox(this);placeidClick(1);">
                                        รพ.ราชวิถี
                                    </label>&emsp;&emsp;
                                    <label class="form-check-label">
                                        <input class="check3" type="radio" id="placeid2" name="placeid" value="2" onclick="checkBox(this);placeidClick(2);">
                                        หน่วยเคลื่อนที่
                                    </label>
                                    <label class="form-check-label">
                                        <input class="check3" type="radio" id="placeid3" name="placeid" value="3" onclick="checkBox(this);placeidClick(3);">
                                        กิจกรรม
                                    </label>


                                </div>
                            </div>

                            <div class="div-save">
                                <div class="save-bottom">
                                    <div class="form-group text-right m-b-0">
                                        <div>
                                            <button id="save_getcard1" class="btn btn-success" onclick="save_getcard1()" type="button">
                                                <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                            </button>
                                            <button hidden id="save_getcard2" class="btn btn-success" onclick="save_getcard2()" type="button">
                                                <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                            </button>
                                            <button hidden id="save_getcard3" class="btn btn-success" onclick="save_getcard3()" type="button">
                                                <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                            </button>
                                            <button id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
                                                <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                            </button>
                                            <button id="reportPrintExCel2" class="btn btn-success" onclick="reportPrintExCel2()" type="button">
                                                <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                            </button>
                                            <button id="reportPrintExCel3" class="btn btn-success" onclick="reportPrintExCel3()" type="button">
                                                <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                            </button>
                                            <button onclick="reportPrint()" id="reportPrintPdf" class="btn btn-success" type="button">
                                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                            </button>
                                            <button onclick="reportPrint2()" id="reportPrintPdf2" class="btn btn-success" type="button">
                                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                            </button>
                                            <button onclick="reportPrint3()" id="reportPrintPdf3" class="btn btn-success" type="button">
                                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="tab">
                                    <button type="button" class="tablinks" onclick="openTab(event, '1')" id="defaultOpen">ทำเรื่องขอรับบัตรแข็ง</button>
                                    <button type="button" class="tablinks" id="btnTab2" onclick="openTab(event, '2')">รายชื่อบริจาคผู้รอรับบัตรแข็ง</button>
                                    <button type="button" class="tablinks" id="btnTab3" onclick="openTab(event, '3')">รายชื่อบริจาคผู้รับบัตรแข็งแล้ว</button>
                                </div>
                                <div id="1" class="tabcontent">
                                    <?php include('report_privilege_tab1.php'); ?>
                                </div>
                                <div id="2" class="tabcontent">
                                    <?php include('report_privilege_tab2.php'); ?>
                                </div>
                                <div id="3" class="tabcontent">
                                    <?php include('report_privilege_tab3.php'); ?>
                                </div>
                            </div>



                        </div>



                        </form>

                    </div>
                    <!-- END container-fluid -->

                </div>
                <!-- END content -->

            </div>
            <!-- END content-page -->

            <?php include 'footer.php'; ?>
        <?php } else {

        header('Location:index.php');
    }

        ?>

        </div>
        <!-- END main -->

        <script src="assets/js/modernizr.min.js"></script>
        <!-- <script src="assets/js/jquery.min.js"></script> -->
        <script src="assets/plugins/jquery-ui/jquery.js"></script>
        <script src="assets/js/moment.min.js"></script>

        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
        <script src="assets/js/datepickerFormat.js"></script>

        <script src="assets/js/DateTimeFormat.js"></script>
        <script src="assets/js/bloodlistdonor.js"></script>
        <script src="assets/js/pagination.js"></script>
        <script src="assets/js/Replace.js"></script>
        <script src="assets/js/spinner.js"></script>
        <script src="assets/js/menu.js"></script>
        <script src="assets/printJS/print.min.js"></script>


        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>



        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/custom/patient/patient-loadtable.js"></script>
        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		
            $(document).ready(function() {
                dateBE('.date1');
                table_report5();
                table_report5_2();
                table_report5_3();
                document.getElementById("defaultOpen").click();
                $("#appointmenttype").select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                });
            });

            var Array_id1 = [];
            var Array_id1 = [];
            var Array_id3 = [];

            function table_report5() {
                document.getElementById("whereid").value = '0';
                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;
                var placeid = document.getElementsByName("placeid");
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
                        placeid: placeid
                    },
                    success: function(data) {
                        console.log(data);
                        console.log(data.resultArray);

                        Array_id1 = data.Array_id1;
                        console.log(Array_id1);



                        var event_data = "";
                        var obj = JSON.parse(JSON.stringify(data.resultArray).replace(/null/g, '""').replace(/"\"\""/g, '""'));

                        $.each(obj, function(index, value) {
                            var arr = [value];
                            event_data += '';
                            event_data += '<tr onClick="chActiveBloodStockPay(this)">';
                            event_data += '<td  style="display:none;" >';
                            event_data += index + JSON.stringify(arr);
                            event_data += '</td>';
                            event_data += '<td><input type="checkbox" id="' + value.donateid + '" onchange="setBloodOutCheck(' + value.donateid + ')" ></td>';
                            event_data += '<td>' + value.donorcode + '</td>';
                            event_data += '<td>' + value.fullname + '</td>';
                            event_data += '<td>' + value.blood_group + '</td>';
                            event_data += '<td>' + value.donorbirthday + '</td>';
                            event_data += '<td>' + value.address + '</td>';
                            event_data += '<td>' + value.getcard + '</td>';
                            event_data += '<td>' + value.getcarddate + '</td>';
                            event_data += '<td>' + value.staffname + '</td>';
                            event_data += '</tr>';
                            // $count++;

                        });
                        // document.getElementById('table_body_report').innerHTML = data.data;
                        document.getElementById('table_body_report').innerHTML = event_data;

                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
            }

            function setBloodOutCheck(self) {

                var whereid = document.getElementById("whereid").value;
                var checked = document.getElementById(self).checked;
                if (checked == true) {
                    document.getElementById("whereid").value = whereid + ',' + self;
                } else {
                    document.getElementById("whereid").value = whereid.replace("," + self, "");
                }

            }

            function chActiveBloodStockPay(self) {

                var table = document.getElementById("list_table_json_out_refund");
                var r = 1;
                while (row = table.rows[r++]) {
                    row.style.background = "#FFF"
                }
                self.style.background = "#b7e4eb";


            }

            function reportPrint() {
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

                var fromtodate = fromdate2 + " - " + todate2;

                var placeid = "0";
                if (document.getElementById("placeid1").checked)
                    placeid = "1";
                else if (document.getElementById("placeid2").checked)
                    placeid = "2";
                else if (document.getElementById("placeid3").checked)
                    placeid = "3";

                printJS({
                    printable: localurl + "/report/report-danate-05-request-card-center.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&placeid=" + placeid,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrint2() {
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

                var fromtodate = fromdate2 + " - " + todate2;

                var placeid = "0";
                if (document.getElementById("placeid1").checked)
                    placeid = "1";
                else if (document.getElementById("placeid2").checked)
                    placeid = "2";
                else if (document.getElementById("placeid3").checked)
                    placeid = "3";

                printJS({
                    printable: localurl + "/report/report-danate-05-request-card-center2.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&placeid=" + placeid,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrint3() {
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

                var fromtodate = fromdate2 + " - " + todate2;

                var placeid = "0";
                if (document.getElementById("placeid1").checked)
                    placeid = "1";
                else if (document.getElementById("placeid2").checked)
                    placeid = "2";
                else if (document.getElementById("placeid3").checked)
                    placeid = "3";

                printJS({
                    printable: localurl + "/report/report-danate-05-request-card-center3.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&placeid=" + placeid,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrintExCel() {
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
                var fromtodate = $('#fromdate2').val() + " - " + $('#todate2').val();

                var fromtodate = fromdate2 + " - " + todate2;

                var placeid = "0";
                if (document.getElementById("placeid1").checked)
                    placeid = "1";
                else if (document.getElementById("placeid2").checked)
                    placeid = "2";
                else if (document.getElementById("placeid3").checked)
                    placeid = "3";

                window.open(localurl + "/report/report-danate-05-request-card-center-excel.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&placeid=" + placeid);
            }

            function reportPrintExCel2() {
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
                var fromtodate = $('#fromdate2').val() + " - " + $('#todate2').val();

                var fromtodate = fromdate2 + " - " + todate2;

                var placeid = "0";
                if (document.getElementById("placeid1").checked)
                    placeid = "1";
                else if (document.getElementById("placeid2").checked)
                    placeid = "2";
                else if (document.getElementById("placeid3").checked)
                    placeid = "3";

                window.open(localurl + "/report/report-danate-05-request-card-center-excel2.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&placeid=" + placeid);
            }

            function reportPrintExCel3() {
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
                var fromtodate = $('#fromdate2').val() + " - " + $('#todate2').val();

                var fromtodate = fromdate2 + " - " + todate2;

                var placeid = "0";
                if (document.getElementById("placeid1").checked)
                    placeid = "1";
                else if (document.getElementById("placeid2").checked)
                    placeid = "2";
                else if (document.getElementById("placeid3").checked)
                    placeid = "3";

                window.open(localurl + "/report/report-danate-05-request-card-center-excel3.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&placeid=" + placeid);
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

                if (cityName == 1) {
                    document.getElementById("save_getcard1").hidden = false;
                    document.getElementById("save_getcard2").hidden = true;
                    document.getElementById("save_getcard3").hidden = true;

                    document.getElementById("reportPrintExCel").hidden = false;
                    document.getElementById("reportPrintExCel2").hidden = true;
                    document.getElementById("reportPrintExCel3").hidden = true;

                    document.getElementById("reportPrintPdf").hidden = false;
                    document.getElementById("reportPrintPdf2").hidden = true;
                    document.getElementById("reportPrintPdf3").hidden = true;

                } else if (cityName == 2) {
                    document.getElementById("save_getcard1").hidden = true;
                    document.getElementById("save_getcard2").hidden = false;
                    document.getElementById("save_getcard3").hidden = true;

                    document.getElementById("reportPrintExCel").hidden = true;
                    document.getElementById("reportPrintExCel2").hidden = false;
                    document.getElementById("reportPrintExCel3").hidden = true;

                    document.getElementById("reportPrintPdf").hidden = true;
                    document.getElementById("reportPrintPdf2").hidden = false;
                    document.getElementById("reportPrintPdf3").hidden = true;

                } else if (cityName == 3) {
                    document.getElementById("save_getcard1").hidden = true;
                    document.getElementById("save_getcard2").hidden = true;
                    // document.getElementById("save_getcard3").hidden = false;

                    document.getElementById("reportPrintExCel").hidden = true;
                    document.getElementById("reportPrintExCel2").hidden = true;
                    document.getElementById("reportPrintExCel3").hidden = false;

                    document.getElementById("reportPrintPdf").hidden = true;
                    document.getElementById("reportPrintPdf2").hidden = true;
                    document.getElementById("reportPrintPdf3").hidden = false;

                }
            }

            function setUnChecked(checkedState) {
                var rows = document.getElementById("list_table_json_out_refund").rows;
                var all_click1 = document.getElementById("all_click1").checked;
                var whereid = document.getElementById("whereid").value;


                if (all_click1 == true) {
                    var data_arr = '';
                    for (var i = 1; i < rows.length; i++) {
                        rows[i].cells[1].children[0].checked = checkedState;
                        data_arr += ',' + rows[i].cells[1].children[0].id;
                        console.log(rows[i].cells[1].children[0].id);
                    }
                    document.getElementById("whereid").value = "0" + data_arr;
                } else {
                    for (var i = 1; i < rows.length; i++) {
                        rows[i].cells[1].children[0].checked = checkedState;
                    }
                    document.getElementById("whereid").value = "0";
                }

            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>