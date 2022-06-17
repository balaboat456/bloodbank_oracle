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

        <title>2.รายชื่อสรุปการปฎิเสธ-ยกเลิกสิ่งส่งตรวจ การขอจองเลือด</title>
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
                                    <h1 class="main-title float-left">2.รายชื่อสรุปการปฎิเสธ-ยกเลิกสิ่งส่งตรวจ การขอจองเลือด</h1>
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

                            <div id="div_frompaytime" class="form-group col-md-1" style="display: block;">
                                <label for="inputCity">เวลา</label>
                                <input id="fromtime" name="fromtime" onkeyup="timeField(this)" autocomplete="off" class="form-control" value="00:00">
                            </div>

                            <div class="form-group col-md-2" id="div_todate">
                                <label for="inputCity">ถึงวันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="todate" class="form-control date1" id="todate">
                            </div>

                            <div id="div_topaytime" class="form-group col-md-1" style="display: block;">
                                <label for="inputCity">เวลา</label>
                                <input id="totime" name="totime" onkeyup="timeField(this)" autocomplete="off" class="form-control" value="<?php echo date("H:i"); ?>">
                            </div>

                            <div class="form-group col-md-2" id="div_requestunit">
                                <label>&nbsp;หน่วยงานที่แจ้งขอเลือด</label>
                                <select id="requestunit" class="form-control" name="requestunit"></select>
                            </div>

                            <div class="form-group col-md-2" id="div_requeststatus">
                                <i class="fa fa-star" style="color:red"></i><label>&nbsp;สถานะ</label>
                                <select required id="requeststatus" class="form-control requeststatus" name="requeststatus">
                                </select>
                            </div>

                            <div class="form-group col-auto">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-check-label">
                                            <input autocomplete="off" onclick="" type="checkbox" id="in_time" name="in_time" value="1" onchange="set_time(1)">
                                            ในเวลา
                                        </label>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-check-label">
                                            <input autocomplete="off" onclick="" type="checkbox" id="out_time" name="out_time" value="1" onchange="set_time(2)">
                                            นอกเวลา
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-1">
                                <br>
                                <a style="margin-top: 6px;" role="button" href="#" onclick="search_query()" class="btn btn-info">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
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


                                    <form role="form" id="myform" method="POST" action="#" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <div class="table-no-scroll">

                                                <table id="list_table_json_out_refund">

                                                    <tbody>


                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>

                                        <div class="row" id="sum_html">
                                            
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

            function search_query() {
                // || document.getElementById("requestunit").value == ""
                if (document.getElementById("requeststatus").value == "") {

                    // console.log(0);
                    swal("กรุณาเลือกสถานะ!");
                    // document.getElementById("requeststatus").focus();

                } else {


                    var fromtime = document.getElementById("fromtime").value;
                    var totime = document.getElementById("totime").value;

                    var in_time = (document.getElementById("in_time").checked) ? 1 : 0;
                    var out_time = (document.getElementById("out_time").checked) ? 1 : 0;

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

                    var requestunit = document.getElementById("requestunit").value;
                    var requeststatus = document.getElementById("requeststatus").value;

                    // if ($('#refuse').is(":checked")) {
                    //     var refuse = document.getElementById("refuse").value;
                    // } else {
                    //     var refuse = null;
                    // }
                    // if ($('#cancel').is(":checked")) {
                    //     var cancel = document.getElementById("cancel").value;
                    // } else {
                    //     var cancel = null;
                    // }

                    // alert(refuse);
                    // alert(cancel);
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: 'data/report-refuse-cancel-ask-blood-form.php',
                        data: {
                            fromdate: fromdate,
                            todate: todate,
                            requeststatus: requeststatus,
                            requestunit: requestunit,
                            in_time: in_time,
                            out_time: out_time,
                            fromtime: fromtime,
                            totime: totime,
                        },
                        success: function(data) {
                            // document.getElementById('fetch_table').innerHTML = data.data;
                            console.log(data);

                            // var body = document.getElementById("list_table_json_out_refund").getElementsByTagName('tbody')[0];
                            // while (body.firstChild) {
                            //     body.removeChild(body.firstChild);
                            // }

                            // $("#tr_list").html(tr_data);

                            var event_data = "";
                            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                            var obj_sum = JSON.parse(JSON.stringify(data.data_sum).replace(/null/g, '""').replace(/"\"\""/g, '""'));


                            if (requeststatus == 4) {
                                // alert('ยกเลิก');
                                event_data += '<thead>';
                                event_data += ' <tr>';
                                event_data += ' <th style="width:100px" >วันที่/เวลา<br>ขอจองเลือด</th> ';
                                event_data += ' <th style="width:100px">วันที่/เวลา<br>ยกเลิก</th> ';
                                event_data += ' <th style="width:120px">HN</th> ';
                                event_data += ' <th style="width:120px">Diagnosis</th> ';
                                event_data += ' <th style="width:120px">ชื่อผู้ป่วย</th> ';
                                event_data += ' <th style="width:120px">หน่วยงานที่แจ้งขอเลือด</th>';
                                event_data += ' <th style="width:60px">Blood<br/>Group</th>';
                                event_data += ' <th style="width:60px">Rh</th>';
                                event_data += ' <th style="width:120px">ชนิดเลือดที่แจ้งขอ</th> ';
                                event_data += ' <th style="width:120px">สาเหตุยกเลิกการจองเลือด</th> ';
                                event_data += '   </tr>';
                                event_data += '</thead> ';
                            } else {
                                // alert('ปฎิเสธสิ่งส่งตรวจ');
                                event_data += '<thead>';
                                event_data += ' <tr>';
                                event_data += ' <th style="width:100px" >วันที่/เวลา<br>ขอจองเลือด</th> ';
                                event_data += ' <th style="width:100px">วันที่/เวลา<br>ปฎิเสธ</th> ';
                                event_data += ' <th style="width:120px">HN</th> ';
                                event_data += ' <th style="width:120px">Diagnosis</th> ';
                                event_data += ' <th style="width:120px">ชื่อผู้ป่วย</th> ';
                                event_data += ' <th style="width:120px">หน่วยงานที่แจ้งขอเลือด</th>';
                                event_data += ' <th style="width:60px">Blood<br/>Group</th>';
                                event_data += ' <th style="width:60px">Rh</th>';
                                event_data += ' <th style="width:120px">ชนิดเลือดที่แจ้งขอ</th> ';
                                event_data += ' <th style="width:120px">สาเหตุการปฎิเสธสิ่งส่งตรวจ</th> ';
                                event_data += '   </tr>';
                                event_data += '</thead> ';
                            }


                            // $("#list_table_json_out_refund").html(event_data);

                            $.each(obj, function(index, value) {


                                // if (value.hospitalid != hospitalid) {
                                //     hospitalid = value.hospitalid;
                                //     hospitalstate = true;
                                // } else {
                                //     hospitalstate = false;
                                // }


                                var arr = [value];

                                event_data += '<tr>';
                                event_data += '<td class="td-table"  style="display:none;" >';
                                event_data += JSON.stringify(arr);
                                event_data += '</td>';
                                if (value.requestblooddate == "") {
                                    event_data += '<td class="td-table">' + value.requestblooddate + '<br>' + value.requestbloodtime + '</td>';
                                    event_data += '<td class="td-table">' + value.requestqueueblooddate + '<br>' + value.requestqueuebloodtime + '</td>';

                                } else {
                                    event_data += '<td class="td-table">' + getDMY(value.requestblooddate) + '<br>' + value.requestbloodtime + '</td>';
                                    event_data += '<td class="td-table">' + getDMY(value.requestqueueblooddate) + '<br>' + value.requestqueuebloodtime + '</td>';
                                }


                                event_data += '<td class="td-table">' + value.hn + '</td>';
                                event_data += '<td class="td-table">' + value.diagnosisdetail + '</td>';
                                event_data += '<td class="td-table">' + value.patientfullname + '</td>';
                                event_data += '<td class="td-table">' + value.unitofficename + '</td>';

                                event_data += '<td class="td-table">' + value.bloodgroupid + '</td>';
                                event_data += '<td class="td-table">' + value.rhid.replace('Rh', ''); + '</td>';

                                event_data += '<td class="td-table">' + value.bloodstocktypenamegroup + '</td>';
                                event_data += '<td class="td-table">' + value.requestbloodcancelname + ' ' + value.requestbloodcancelother + '</td>';
                                event_data += '</tr>';

                            });
                            $("#list_table_json_out_refund").html(event_data);

                            event_sum_data = '';

                            if(obj_sum.length > 0)
                            {
                                event_sum_data += '<div class="col-xl-2">';
                                event_sum_data += '</div>';
                                event_sum_data += ' <div class="col-xl-4">';
                                event_sum_data += ' <label for="inputCity"><b>สาเหตุ</b></label>';
                                event_sum_data += '</div>';
                                event_sum_data += '<div class="col-xl-6">';
                                event_sum_data += '<label for="inputCity"><b>จำนวน</b></label>';
                                event_sum_data += '</div>';
                            }
                            

                            var sum_num = 0;
                            $.each(obj_sum, function(index, value) {
                                event_sum_data += '<div class="col-xl-2">';
                                event_sum_data += '</div>';
                                event_sum_data += ' <div class="col-xl-4">';
                                event_sum_data += ' <label for="inputCity">'+value.requestbloodcancelname_text+'</label>';
                                event_sum_data += '</div>';
                                event_sum_data += '<div class="col-xl-6">';
                                event_sum_data += '<label for="inputCity">'+value.qty_text+'</label>';
                                event_sum_data += '</div>';

                                sum_num += parseInt(value.qty_text);

                            });
                            if(obj_sum.length > 0)
                            {
                            event_sum_data += '<div class="col-xl-2">';
                            event_sum_data += '</div>';
                            event_sum_data += ' <div class="col-xl-4">';
                            event_sum_data += ' <label for="inputCity"><b>รวม</b></label>';
                            event_sum_data += '</div>';
                            event_sum_data += '<div class="col-xl-6">';
                            event_sum_data += '<label for="inputCity"><b>'+sum_num+'</b></label>';
                            event_sum_data += '</div>';
                            }

                            $("#sum_html").html(event_sum_data);

                        },
                        error: function(data) {
                            console.log("errrrr");
                        },
                    });
                }

            }

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
            });

            $('#requeststatus').select2({
                allowClear: true,
                width: "100%",
                theme: "bootstrap",
                placeholder: "",
                // tags: [],
                ajax: {
                    url: 'data/masterdata/requestbloodstatus.php',
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
                                    id: item.requestbloodstatusid,
                                    text: "[" + item.requestbloodstatuscode + "] " + item.requestbloodstatusname,
                                }
                            })
                        };
                    },

                }
            });

            function reportPrint() {

                var fromtime = document.getElementById("fromtime").value;
                var totime = document.getElementById("totime").value;

                var in_time = (document.getElementById("in_time").checked) ? 1 : 0;
                var out_time = (document.getElementById("out_time").checked) ? 1 : 0;


                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;


                var fromdatee = document.getElementById("fromdate").value;
                var todatee = document.getElementById("todate").value;

                var fromyear = fromdate2.substr(-4, 4);
                var toyear = todate2.substr(-4, 4);

                var frommouth = fromdate2.substr(-7, 2);
                var tomouth = todate2.substr(-7, 2);

                var fromday = fromdate2.substr(0, 2);
                var today = todate2.substr(0, 2);

                var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                var todate = toyear + '-' + tomouth + '-' + today;
                var requestunit = document.getElementById("requestunit").value;
                if (requestunit == '') {
                    requestunit = 0;
                }

                // var requeststatus = document.getElementById("requeststatus").value;
                val = $('#requeststatus').val();
                if (document.getElementById("requeststatus").value == "") {

                    // console.log(0);
                    swal("กรุณากรอกกดค้นหาข้อมูล!");
                    // document.getElementById("requeststatus").focus();

                } else {
                    // alert(requestunit);
                    if (val == 4) {
                        // alert('ยกเลิก');
                        printJS({
                            printable: localurl + "/report/report-cancel-form.php?fromdate=" +
                                fromdate + "&todate=" + todate + "&requestunit=" + requestunit + "&fromdatee=" + fromdatee + "&todatee=" + todatee +
                                "&requeststatus=" + val + '&in_time=' + in_time + '&out_time=' + out_time + '&fromtime=' + fromtime + '&totime=' + totime,
                            type: 'pdf',
                            showModal: true
                        });
                    } else {
                        // alert('ปฎิเสธ');
                        printJS({
                            printable: localurl + "/report/report-refuse-form.php?fromdate=" +
                                fromdate + "&todate=" + todate + "&requestunit=" + requestunit + "&fromdatee=" + fromdate2 + "&todatee=" + todate2 +
                                "&requeststatus=" + val + '&in_time=' + in_time + '&out_time=' + out_time + '&fromtime=' + fromtime + '&totime=' + totime,
                            type: 'pdf',
                            showModal: true
                        });
                    }
                    // printJS( localurl + "/report/report-cancel-form.php?fromdate=" +
                    //     fromdate + "&todate=" + todate + "&requestunit=" + requestunit +
                    //     "&requeststatus=" + requeststatus);


                }
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	

            function reportPrintExCel() {
                var fromtime = document.getElementById("fromtime").value;
                var totime = document.getElementById("totime").value;

                var in_time = (document.getElementById("in_time").checked) ? 1 : 0;
                var out_time = (document.getElementById("out_time").checked) ? 1 : 0;


                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;


                var fromdatee = document.getElementById("fromdate").value;
                var todatee = document.getElementById("todate").value;

                var fromyear = fromdate2.substr(-4, 4);
                var toyear = todate2.substr(-4, 4);

                var frommouth = fromdate2.substr(-7, 2);
                var tomouth = todate2.substr(-7, 2);

                var fromday = fromdate2.substr(0, 2);
                var today = todate2.substr(0, 2);

                var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                var todate = toyear + '-' + tomouth + '-' + today;
                var requestunit = document.getElementById("requestunit").value;
                if (requestunit == '') {
                    requestunit = 0;
                }

                // var requeststatus = document.getElementById("requeststatus").value;
                val = $('#requeststatus').val();

                var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
                if (document.getElementById("requeststatus").value == "") {

                    // console.log(0);
                    swal("กรุณากรอกกดค้นหาข้อมูล!");
                    // document.getElementById("requeststatus").focus();

                } else {
                    if (val == 4) {
                        window.open(localurl + "/report/report-cancel-form-excel.php?fromdate=" +
                            fromdate + "&todate=" + todate + "&requestunit=" + requestunit + "&fromdatee=" + fromdatee + "&todatee=" + todatee +
                            "&requeststatus=" + val + '&in_time=' + in_time + '&out_time=' + out_time + '&fromtime=' + fromtime + '&totime=' + totime);
                    } else {
                        window.open(localurl + "/report/report-refuse-form-excel.php?fromdate=" +
                            fromdate + "&todate=" + todate + "&requestunit=" + requestunit + "&fromdatee=" + fromdatee + "&todatee=" + todatee +
                            "&requeststatus=" + val + '&in_time=' + in_time + '&out_time=' + out_time + '&fromtime=' + fromtime + '&totime=' + totime);
                    }
                }


            }

            function set_time(val) {
                if (val == 1) {
                    document.getElementById("out_time").checked = false;
                } else if (val == 2) {
                    document.getElementById("in_time").checked = false;
                }
            }
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>