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

        <title>10.รายงานปัญหาของการรับบริจาคทั่วไป</title>
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
                                    <h1 class="main-title float-left">10.รายงานปัญหาของการรับบริจาคทั่วไป</h1>
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

                            <div class="form-group col-md-2" id="div_fromdate">
                                <label for="inputCity">ตั้งแต่วันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="fromdate" class="form-control date1" id="fromdate">
                            </div>

                            <div class="form-group col-md-2" id="div_todate">
                                <label for="inputCity">ถึงวันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="todate" class="form-control date1" id="todate">
                            </div>

                            <div class="form-group col-md-2" id="div_donationproblemsreportid">
                                <i class="fa fa-star" style="color:red"></i><label>&nbsp;ปัญหาการรับบริจาค</label>
                                <select required id="donationproblemsreportid" class="form-control " name="donationproblemsreportid">
                                    <option value=""></option>
                                    <option value="1">ปัญหาของการรับบริจาค</option>
                                    <option value="2">ปฏิกิริยาหลังเจาะ</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <br>
                                <a style="margin-top: 6px;" role="button" href="#" onclick="search_query()" class="btn btn-info">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                            </div>

                            <!-- <div class="form-group col-auto">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-check-label">
                                            <input autocomplete="off" onclick="" type="checkbox" id="in_time" name="in_time" value="1">
                                            ในเวลา
                                        </label>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-check-label">
                                            <input autocomplete="off" onclick="" type="checkbox" id="out_time" name="out_time" value="2">
                                            นอกเวลา
                                        </label>
                                    </div>
                                </div>
                            </div> -->


                            <div class="form-group col-md-2">

                            </div>

                            <div class="form-group col-md-12 margin-top-bottom-label-10-">
                                <div class="row">
                                    &nbsp;&nbsp;<label><b>สถานที่</b></label>
                                    &nbsp;

                                    <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                        <label class="form-check-label">
                                            <input class="check2" type="radio" id="checkplaceid1" name="placeid" value="1" onclick="placeidClick(1)" checked>
                                            &nbsp;รพ.ราชวิถี
                                        </label>
                                    </div>
                                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                        <label class="form-check-label">
                                            <input class="check2" type="radio" id="checkplaceid2" name="placeid" value="2" onclick="placeidClick(2)">&nbsp;หน่วยเคลื่อนที่
                                        </label>
                                        <!-- <a href="#" onclick="showCustomMoblieUnit()"><small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มหน่วยเคลื่อนที่</small></a> -->
                                    </div>
                                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                        <label class="form-check-label">
                                            <input class="check2" type="radio" id="checkplaceid3" name="placeid" value="3" onclick="placeidClick(3)">&nbsp;กิจกรรม
                                        </label>
                                        <!-- <a href="#" onclick="showActivity()"><small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มกิจกรรม</small></a> -->
                                    </div>

                                    &emsp;&emsp;|&emsp;&nbsp;

                                    <div id="placeid1" style="display:none;">

                                        <!-- <label class="form-check-label">
                                            <input class="check3" type="radio" name="placetime" value="1">
                                            ในเวลา
                                        </label>
                                        <label class="form-check-label">
                                            <input class="check3" type="radio" name="placetime" value="2"> นอกเวลา
                                        </label> -->
                                    </div>

                                    <div id="placeid2" class="col-md-2" style="display:none;">
                                        <div class="row">
                                            &emsp;
                                            <div class="col-md-10">
                                                <select id="unitnameid" class="form-control form-control unitnameid" name="unitnameid">
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="placeid3" class="col-md-2" style="display:none;">
                                        <div class="row">
                                            &emsp;
                                            <div class="col-md-3">
                                                <select id="activityid" class="form-control form-control activityid" name="activityid">
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    &emsp;&emsp;|




                                </div>
                            </div>



                            <div class="div-save">
                                <div class="save-bottom">
                                    <div class="form-group text-right m-b-0">
                                        <div>

                                            <button id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
                                                <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                            </button>
                                            <button onclick="reportPrint()" id="reportPrintPdf" class="btn btn-success" type="button">
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
                                            <div class="table-stock-scroll" style="height: 350px;">

                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="td-table">No.</th>
                                                            <th class="td-table">วันที่บริจาค</th>
                                                            <th class="td-table">เลขที่ผู้บริจาค</th>
                                                            <th class="td-table">เลขบัตรประชาชน</th>
                                                            <th class="td-table">ชื่อ-นามสกุล</th>
                                                            <th class="td-table" style="width:40%">สาเหตุ</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="list_table_json_out_refund">


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
            <?php include 'setLocalUrl.php' ?>
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


        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>


        <script src="assets/printJS/print.min.js"></script>
        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/custom/patient/patient-loadtable.js"></script>
        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		
            $(document).ready(function() {
                dateBE('.date1');

            });
            $("#placeid1").change(function() {

            });


            function search_query() {
                // || document.getElementById("requestunit").value == ""
                if (document.getElementById("donationproblemsreportid").value == "") {

                    // console.log(0);
                    swal("กรุณากรอกข้อมูลให้ครบถ้วน!");
                    // document.getElementById("requeststatus").focus();

                } else {
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

                    var donationproblemsreportid = document.getElementById("donationproblemsreportid").value;
                    console.log(donationproblemsreportid);
                    var unitnameid = document.getElementById("unitnameid").value;

                    var activityid = document.getElementById("activityid").value;

                    var placeid = 1;
                    if (document.getElementById("checkplaceid2").checked) {
                        placeid = 2;
                    } else if (document.getElementById("checkplaceid3").checked) {
                        placeid = 3;
                    }
                    // console.log(placeid);

                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: 'data/report-donate-problems-form.php',
                        data: {
                            fromdate: fromdate,
                            todate: todate,
                            donationproblemsreportid: donationproblemsreportid,
                            placeid: placeid,
                            activityid: activityid,
                            unitnameid: unitnameid,
                        },
                        success: function(data) {

                            // alert(data);
                            document.getElementById('list_table_json_out_refund').innerHTML = data.data;
                            // console.log(data);
                            // var event_data = "";
                            // var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""'));
                            // var number = 0;

                            // $.each(obj, function(index, value) {

                            //     var arr = [value];
                            //     number += 1;
                            //     event_data += '<tr>';
                            //     event_data += '<td class="td-table"  style="display:none;" >';
                            //     event_data += JSON.stringify(arr);
                            //     event_data += '</td>';

                            //     event_data += '<td class="td-table">' + number + '</td>';

                            //     event_data += '</tr>';

                            // });
                            // $("#list_table_json_out_refund").html(data);


                        },
                        error: function(data) {
                            console.log("errrrr");
                        },
                    });
                }

            }

            $('#donationproblemsreportid').select2({
                allowClear: true,
                width: "100%",
                theme: "bootstrap",
                placeholder: ""
            });

            function placeidClick(id = 1) {

                if (id == 1) {
                    document.getElementById("placeid1").style.display = "block";
                    document.getElementById("placeid2").style.display = "none";
                    document.getElementById("placeid3").style.display = "none";
                } else if (id == 2) {
                    document.getElementById("placeid1").style.display = "none";
                    document.getElementById("placeid2").style.display = "block";
                    document.getElementById("placeid3").style.display = "none";
                    document.getElementById("unitnameid").focus();
                } else if (id == 3) {
                    document.getElementById("placeid1").style.display = "none";
                    document.getElementById("placeid2").style.display = "none";
                    document.getElementById("placeid3").style.display = "block";
                    document.getElementById("activityid").focus();

                } else {
                    document.getElementById("placeid1").style.display = "block";
                    document.getElementById("placeid2").style.display = "none";
                    document.getElementById("placeid3").style.display = "none";
                }


                localStorage.setItem("placeid", id);

            }


            $('#unitnameid').select2({
                allowClear: true,
                width: "100%",
                theme: "bootstrap",
                placeholder: "",
                // tags: [],
                ajax: {
                    url: 'data/masterdata/donatmobileunit.php',
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
                                    id: item.id,
                                    text: item.dmu_name,
                                }
                            })
                        };
                    },

                }
            });
            $('#activityid').select2({
                allowClear: true,
                width: "250px",
                theme: "bootstrap",
                placeholder: "",
                ajax: {
                    cache: true,
                    url: 'data/masterdata/donate-activity.php',
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
                                    id: item.activityid,
                                    text: item.activityname,
                                    item: item
                                }
                            })
                        };
                    },
                }
            });


            function table_report14() {
                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;
                var unitnameid = document.getElementById("unitnameid").value;

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
            }

            function reportPrint() {
                if (document.getElementById("donationproblemsreportid").value == "") {

                    // console.log(0);
                    swal("กรุณากรอกข้อมูลให้ครบถ้วน!");
                    // document.getElementById("requeststatus").focus();

                } else {
                    var fromdate2 = document.getElementById("fromdate").value;
                    var todate2 = document.getElementById("todate").value;

                    var fromtodate = fromdate2 + ' - ' + todate2;

                    var fromyear = fromdate2.substr(-4, 4);
                    var toyear = todate2.substr(-4, 4);

                    var frommouth = fromdate2.substr(-7, 2);
                    var tomouth = todate2.substr(-7, 2);

                    var fromday = fromdate2.substr(0, 2);
                    var today = todate2.substr(0, 2);

                    var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                    var todate = toyear + '-' + tomouth + '-' + today;

                    var donationproblemsreportid = document.getElementById("donationproblemsreportid").value;
                    console.log(donationproblemsreportid);
                    var unitnameid = ($('#unitnameid').val()) ? $('#unitnameid').val() : "0";
                    var activityid = ($('#activityid').val()) ? $('#activityid').val() : "0";

                    var placeid = 1;
                    if (document.getElementById("checkplaceid2").checked) {
                        placeid = 2;
                    } else if (document.getElementById("checkplaceid3").checked) {
                        placeid = 3;
                    }
                    printJS({
                        printable: localurl + "/report/blood-report-donate-problems-form.php?fromdate=" +
                            fromdate + "&todate=" + todate + "&placeid=" + placeid + "&fromtodate=" + fromtodate +
                            "&unitnameid=" + unitnameid + "&activityid=" + activityid + "&donationproblemsreportid=" + donationproblemsreportid,
                        type: 'pdf',
                        showModal: true
                    });
                }
            }


            function reportPrintExCel() {
                if (document.getElementById("donationproblemsreportid").value == "") {

                    // console.log(0);
                    swal("กรุณากรอกข้อมูลให้ครบถ้วน!");
                    // document.getElementById("requeststatus").focus();

                } else {
                    var fromdate2 = document.getElementById("fromdate").value;
                    var todate2 = document.getElementById("todate").value;

                    var fromtodate = fromdate2 + ' - ' + todate2;

                    var fromyear = fromdate2.substr(-4, 4);
                    var toyear = todate2.substr(-4, 4);

                    var frommouth = fromdate2.substr(-7, 2);
                    var tomouth = todate2.substr(-7, 2);

                    var fromday = fromdate2.substr(0, 2);
                    var today = todate2.substr(0, 2);

                    var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                    var todate = toyear + '-' + tomouth + '-' + today;

                    var donationproblemsreportid = document.getElementById("donationproblemsreportid").value;
                    console.log(donationproblemsreportid);
                    var unitnameid = ($('#unitnameid').val()) ? $('#unitnameid').val() : "0";
                    var activityid = ($('#activityid').val()) ? $('#activityid').val() : "0";

                    var placeid = 1;
                    if (document.getElementById("checkplaceid2").checked) {
                        placeid = 2;
                    } else if (document.getElementById("checkplaceid3").checked) {
                        placeid = 3;
                    }
                    window.open(localurl + "/report/blood-report-donate-problems-form-excel.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&placeid=" + placeid + "&fromtodate=" + fromtodate +
                        "&unitnameid=" + unitnameid + "&activityid=" + activityid + "&donationproblemsreportid=" + donationproblemsreportid);
                }
            }

            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>