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

        <title>4.รายงานสรุปการแลกเลือดกับสถานพยาบาลอื่น</title>
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

            /* .modal-dialog {
                margin: 0px;
                padding-right: 0px !important;
                max-width: 30% !important;
                max-height: 30% !important;
              
                margin-left: 30% !important;

            } */

            /* .modal-body {
                height: 40% !important;
                min-height: 80vh;
            }

            .modal-content {
                border-radius: 0px;
            } */

            th,
            td {
                text-align: center;
                vertical-align: middle !important;
            }

            .td-table {
                padding: 1px !important;
            }

            hr {
                margin-top: 0px;
                margin-bottom: 0px;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, .1);
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
                                    <h1 class="main-title float-left">4.รายงานสรุปการแลกเลือดกับสถานพยาบาลอื่น</h1>
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

                            <div class="form-group col-md-3">
                                <label for="inputCity">สถานพยาบาล</label>
                                <select name="hospitalid" id="hospitalid" class="form-control" autofocus require>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <a style="margin-top: 30px;" role="button" href="#" onclick="search_query()" class="btn btn-info">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมายเหตุ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input autocomplete="off" type="text" hidden value="" name="bloodstockpaymainid" class="form-control" id="bloodstockpaymainid">
                                            หมายเหตุ
                                            <textarea id="bloodstockpaymainremark" name="bloodstockpaymainremark" class="form-control" rows="4" cols="50"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" onclick="saveremark()" data-dismiss="modal">บันทึก</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                        </div>
                                    </div>
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
                                            <div class="table-no-scroll" style="height:75vh;">


                                                <table id="list_table_json_out_refund">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" style="width:120px">เลขที่จ่ายเลือด</th>
                                                            <th rowspan="2" style="width:140px">สถานพยาบาล</th>
                                                            <th colspan="5" id="label_stock_pay_title_1">จำนวนให้แลก</th>
                                                            <th colspan="5" id="label_stock_pay_title_2" style="background:#404040">จำนวนรับแลก</th>
                                                            <th rowspan="2" style="width:60px">จำนวนคงค้าง</th>
                                                            <th rowspan="2" style="width:200px">หมายเหตุ</th>
                                                            <th rowspan="2" style="width:60px">เพิ่มหมายเหตุ</th>

                                                        </tr>
                                                        <tr>
                                                            <th style="top:33px;position: sticky;">ชนิดเลือด</th>
                                                            <th style="top:33px;position: sticky;width:60px">Bl.Gr.</th>
                                                            <th style="top:33px;position: sticky;width:60px">จำนวน</th>
                                                            <th style="top:33px;position: sticky;width:60px">รวม</th>
                                                            <th style="top:33px;position: sticky;width:100px">วันที่</th>
                                                            <th style="background:#404040;top:33px;position: sticky;">ชนิดเลือด</th>
                                                            <th style="width:60px;background:#404040;top:33px;position: sticky;">Bl.Gr.</th>
                                                            <th style="width:60px;background:#404040;top:33px;position: sticky;">จำนวน</th>
                                                            <th style="width:60px;background:#404040;top:33px;position: sticky;">รวม</th>
                                                            <th style="width:100px;background:#404040;top:33px;position: sticky;">วันที่</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


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
                search_query();

                $('#hospitalid').select2({
                    allowClear: true,
                    theme: "bootstrap",
                    placeholder: "",
                    width: "100%",
                    ajax: {
                        url: 'data/masterdata/hospital.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term,
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.hospitalid,
                                        text: item.hospitalname
                                    }
                                })
                            };
                        },

                    }
                });
            });

            function search_query() {
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

                var hospitalid = document.getElementById("hospitalid").value;

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report-pay-return-exchange.php',
                    data: {
                        fromdate: fromdate,
                        todate: todate,
                        bloodstockpaytypeid: 6,
                        hospitalid: hospitalid
                    },
                    success: function(data) {
                        // document.getElementById('fetch_table').innerHTML = data.data;
                        console.log(data);

                        var body = document.getElementById("list_table_json_out_refund").getElementsByTagName('tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }

                        var event_data = "";
                        var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                        var hospitalid = "hospitalid";
                        var hospitalstate = true;
                        $.each(obj, function(index, value) {


                            if (value.hospitalid != hospitalid) {
                                hospitalid = value.hospitalid;
                                hospitalstate = true;
                            } else {
                                hospitalstate = false;
                            }


                            var sum_bloodgroup2 = value.sum_bloodgroup2.replaceAll("<br/><hr/>", ",");
                            var sum_bloodgroup2_array = sum_bloodgroup2.split(",");
                            var sum_get = 0;
                            $.each(sum_bloodgroup2_array, function(idx, v) {
                                sum_get += parseInt(v);
                            });

                            event_data += '';
                            event_data += '<tr onClick="chActiveBloodStockPay(this)" >';
                            event_data += '<td  style="display:none;" >';
                            event_data += JSON.stringify(value);
                            event_data += '</td>';
                            event_data += '<td>' + value.bloodstockpaymaincode + '</td>';
                            event_data += '<td style="text-align:left;">' + value.hospitalname + '</td>';
                            event_data += '<td style="text-align:left;">' + value.group_bloodstocktypename + '</td>';
                            event_data += '<td>' + value.group_bloodgroup + '</td>';
                            event_data += '<td>' + value.group_sum_bloodgroup + '</td>';
                            event_data += '<td>' + value.sum_bloodgroup + '</td>';
                            event_data += '<td >' + (value.formatbloodstockpaydatetime) + '</td>';


                            event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
                            event_data += '<td>' + value.bloodgroup2 + '</td>';
                            event_data += '<td>' + value.sum_bloodgroup2 + '</td>';
                            event_data += '<td>' + value.sum_group_bloodgroup2 + '</td>';
                            event_data += '<td >' + value.bloodstockmaindate2 + '</td>';

                            event_data += '<td>' + (value.sum_bloodgroup - sum_get) + '</td>';
                            event_data += '<td>' + (value.bloodstockpaymainremark) + '</td>';
                            event_data += '<td><button type="button" onclick="addtheremark(' + value.bloodstockpaymainid + ')" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">+</button></td>';
                            event_data += '</tr>';


                        });
                        $("#list_table_json_out_refund").append(event_data);


                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
            }

            function addtheremark(id) {
                console.log(id);
                $("#bloodstockpaymainid").val(id);
            }

            function saveremark() {
                var bloodstockpaymainremark = $("#bloodstockpaymainremark").val();
                var bloodstockpaymainid = $("#bloodstockpaymainid").val();

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report-pay-return-exchange-add-remark.php',
                    data: {
                        bloodstockpaymainremark: bloodstockpaymainremark,
                        bloodstockpaymainid: bloodstockpaymainid
                    },
                    success: function(data) {
                        console.log(data);
                        search_query();
                        $("#bloodstockpaymainremark").val("");
                        $("#bloodstockpaymainid").val("");
                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
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

                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());
                var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
                var hospitalid = document.getElementById("hospitalid").value;

                printJS({
                    printable: localurl + "/report/report-pay-return-exchange.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&hospitalid=" + hospitalid,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrintExCel() {
                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());
                var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
                var hospitalid = document.getElementById("hospitalid").value;

                // printJS({
                //     printable: localurl + "/report/report-pay-return-exchange.php?fromdate=" +
                //         fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&hospitalid=" + hospitalid,
                //     type: 'pdf',
                //     showModal: true
                // });
                window.open(localurl + "/report/report-pay-return-exchange-excel.php?fromdate=" + fromdate +
                    "&todate=" + todate +
                    "&fromtodate=" + fromtodate + "&hospitalid=" + hospitalid
                );
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>