<?php



session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    //include_once('common.php');

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

        <title>1.รายงานการขอตรวจทางห้องปฏิบัติการ</title>
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
        <link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />

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
                                    <h1 class="main-title float-left">1.รายงานการขอตรวจทางห้องปฏิบัติการ</h1>
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

                            <div class="form-group col-md-1" id="div_fromdate">
                                <label for="inputCity">ตั้งแต่วันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="fromdate" class="form-control date1" id="fromdate">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputPassword4">ตั้งแต่เวลา</label>
                                <input type="text" autocomplete="off" class="form-control" id="fromtime" aria-describedby="numberlHelp" value="<?php echo  date('H:i'); ?>" name="fromtime" onkeyup="timeField(this)">
                            </div>
                            <div class="form-group col-md-1" id="div_todate">
                                <label for="inputCity">ถึงวันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="todate" class="form-control date1" id="todate">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputPassword4">ถึงเวลา</label>
                                <input type="text" autocomplete="off" class="form-control" id="totime" aria-describedby="numberlHelp" value="<?php echo  date('H:i'); ?>" name="totime" onkeyup="timeField(this)">
                            </div>
                            <div class="form-group col-md-2" id="div_requestunit">
                                <label for="inputCity">หน่วยงานที่ส่งตรวจ</label>
                                <select autofocus name="requestunit" class="form-control requestunit" id="requestunit"></select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">รายการตรวจ</label>
                                <select id="labform" class="form-control labform" name="labform">
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">ขั้นตอน</label>
                                <select id="procedure" class="form-control procedure" name="procedure">
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">ผู้ปฏิบัติงาน</label>
                                <select id="inspector" class="form-control inspector" name="inspector">
                                    <option value="" selected>โปรดระบุ</option>
                                    <?php
                                    $strSQL = "SELECT * FROM staff WHERE isbaggagestaff = 1 ORDER BY id ASC";
                                    $objQuery = mysql_query($strSQL);
                                    while ($objResuut = mysql_fetch_array($objQuery)) {
                                    ?>
                                        <option <?php if ($objResuut["id"] == $row['bag_staff_id']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $objResuut['name'] . ' ' . $objResuut["surname"]; ?>">
                                            <?php echo $objResuut["name"]; ?>
                                            <?php echo $objResuut["surname"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>


                                </select>

                            </div>

                            <div class="form-group col-md-3">
                                <a style="margin-top: 7px;" role="button" href="#" onclick="search_query()" class="btn btn-info">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                            </div>

                            <div class="div-save">
                                <div class="save-bottom">
                                    <div class="form-group text-right m-b-0">
                                        <div>
                                            <button id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
                                                <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                            </button>
                                            <button id="reportPrint" class="btn btn-success" onclick="reportPrint()" type="button">
                                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-3">


                                    <form role="form" id="myform" method="POST" action="blood-disconnectsave.php" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <div class="table-no-scroll">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">วันที่/เวลาที่รับสิ่งส่งตรวจ</th>
                                                            <th rowspan="2">HN</th>
                                                            <th rowspan="2">ชื่อ นามสกุล</th>
                                                            <th rowspan="2">Diagnosis</th>
                                                            <th rowspan="2">หน่วยงานที่ส่งตรวจ</th>
                                                            <th rowspan="2">รายการตรวจ</th>
                                                            <th rowspan="2">ชนิด Ab ที่พบ</th>
                                                            <th rowspan="2">สาเหตุการปฎิเสธ/ยกเลิก</th>
                                                            <th colspan="5">ระยะเวลาในแต่ละขั้นตอน (ชั่วโมง:นาที) Turn around time แบบละเอียด</th>
                                                            <th colspan="4">ผู้ทำการ</th>

                                                        </tr>
                                                        <tr>
                                                            <th>บันทึกขอตรวจ ถึงรับสิ่งส่งตรวจ</th>
                                                            <th>รับสิ่งส่งตรวจ ถึงValidate</th>
                                                            <th>Validate ถึงApprove</th>
                                                            <th>บันทึกขอตรวจ ถึงApprove</th>
                                                            <th>รับสิ่งส่งตรวจ ถึงApprove</th>

                                                            <th>ผู้ขอตรวจ</th>
                                                            <th>ผู้รับสิ่งส่งตรวจ</th>
                                                            <th>ผู้ Validate</th>
                                                            <th>ผู้ Approve</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_body_report">

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                </div><!-- end card-->
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
            <?php include 'setLocalUrl.php' ?>
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


        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>



        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/custom/patient/patient-loadtable.js"></script>
        <script src="assets/printJS/print.min.js"></script>
        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		
            $(document).ready(function() {
                dateBE('.date1');

                $(".inspector").select2({
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    allowClear: true
                });

                $('#labunitroomid').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/labunitroom.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.labunitroomid,
                                        text: item.labunitroomname,
                                    }
                                })
                            };
                        },

                    }
                });

                $('#labform').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/labformsearch.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.labformid,
                                        text: item.labformname,
                                    }
                                })
                            };
                        },

                    }
                });

                $('#procedure').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/procedure.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.procedureid,
                                        text: item.procedurename,
                                    }
                                })
                            };
                        },

                    }
                });


                $('#requestunit').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/unitoffice.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.unitofficeid,
                                        text: "[" + item.unitofficecode + "] " + item.unitofficename,
                                    }
                                })
                            };
                        },

                    }
                })


            });

            function reportPrintExCel() {
                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());

                var fromtime = document.getElementById("fromtime").value;
                var totime = document.getElementById("totime").value;

                var requestunit = document.getElementById("requestunit").value;
                if (requestunit == "") {
                    requestunit = "0";
                }
                var labform = document.getElementById("labform").value;
                if (labform == "") {
                    labform = "0";
                }
                var procedure = document.getElementById("procedure").value;
                if (procedure == "") {
                    procedure = "0";
                }
                var inspector = document.getElementById("inspector").value;
                if (inspector == "") {
                    inspector = "0";
                }

                // printJS( localurl + "/report/blood-report-cure-lab-excel.php?fromdate=" + fromdate + "&todate=" + todate +
                //     "&fromtime=" + fromtime + "&totime=" + totime + "&requestunit=" + requestunit + "&labform=" + labform +
                //     "&procedure=" + procedure + "&inspector=" + inspector);

                window.open(localurl + "/report/blood-report-cure-lab-excel.php?fromdate=" + fromdate + "&todate=" + todate +
                    "&fromtime=" + fromtime + "&totime=" + totime + "&requestunit=" + requestunit + "&labform=" + labform +
                    "&procedure=" + procedure + "&inspector=" + inspector);
            }

            function search_query() {
                var fromdate2 = document.getElementById("fromdate").value;
                var fromtime = document.getElementById("fromtime").value;
                var todate2 = document.getElementById("todate").value;
                var totime = document.getElementById("totime").value;
                var requestunit = document.getElementById("requestunit").value;
                var labform = document.getElementById("labform").value;
                var procedure = document.getElementById("procedure").value;
                var inspector = document.getElementById("inspector").value;

                var fromyear = fromdate2.substr(-4, 4);
                var toyear = todate2.substr(-4, 4);

                var frommouth = fromdate2.substr(-7, 2);
                var tomouth = todate2.substr(-7, 2);

                var fromday = fromdate2.substr(0, 2);
                var today = todate2.substr(0, 2);

                var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                var todate = toyear + '-' + tomouth + '-' + today;
                // alert(inspector);
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report-request-cure-lab-form.php',
                    data: {
                        fromdate: fromdate,
                        fromtime: fromtime,
                        todate: todate,
                        totime: totime,
                        requestunit: requestunit,
                        labform: labform,
                        procedure: procedure,
                        inspector: inspector
                    },
                    success: function(data) {
                        document.getElementById('table_body_report').innerHTML = data.data;
                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
            }

            function reportPrint() {
                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());

                var fromdate2 = $('#fromdate').val();
                var todate2 = $('#todate').val();

                var fromtime = document.getElementById("fromtime").value;
                var totime = document.getElementById("totime").value;


                var fromtodate = fromdate2+' '+fromtime+' - '+todate2+' '+totime;

                var requestunit = document.getElementById("requestunit").value;
                if (requestunit == "") {
                    requestunit = "0";
                }
                var labform = document.getElementById("labform").value;
                if (labform == "") {
                    labform = "0";
                }
                var procedure = document.getElementById("procedure").value;
                if (procedure == "") {
                    procedure = "0";
                }
                var inspector = document.getElementById("inspector").value;
                if (inspector == "") {
                    inspector = "0";
                }


                printJS({
                    printable: localurl + "/report/blood-report-cure-lab.php?fromdate=" + fromdate + "&todate=" + todate +
                        "&fromtime=" + fromtime + "&totime=" + totime + "&requestunit=" + requestunit + "&labform=" + labform +
                        "&procedure=" + procedure + "&inspector=" + inspector+'&fromtodate='+fromtodate,
                    type: 'pdf',
                    showModal: true
                });
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>