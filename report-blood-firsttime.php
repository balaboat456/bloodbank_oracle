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

        <title>19.รายงานผู้มาบริจาคโลหิตครั้งแรกที่โรงพยาบาลราชวิถี</title>
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
                                    <h1 class="main-title float-left">19.รายงานผู้มาบริจาคโลหิตครั้งแรกที่โรงพยาบาลราชวิถี</h1>
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

                            <div class="form-group col-md-2" id="div_hospitalid">
                                <label for="inputCity">หมู่เลือด ABO</label>
                                <select autofocus name="bloodgroup" class="form-control bloodgroup" id="bloodgroup"></select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">หมู่เลือด Rh</label>
                                <select id="rh" class="form-control rh" name="rh">
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">สถานะบริจาค</label>
                                <select id="donation_status" class="form-control donation_status" name="donation_status">
                                    <option value="0"></option>
                                    <option value="1">ผ่าน</option>
                                    <option value="2">ไม่ผ่าน</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
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
                                            <div class="table-no-scroll">
                                                <table id="list_table_json_firsttime">
                                                    <thead>
                                                        <tr>
                                                            <th>ลำดับที่</th>
                                                            <th>เลขประจำตัวผู้บริจาค</th>
                                                            <th>เลขบัตรประชาชน</th>
                                                            <th>ชื่อ-นามสกุล</th>
                                                            <th>อายุ</th>
                                                            <th>ที่อยู่</th>
                                                            <th>เบอร์โทรศัพท์</th>
                                                            <th>หมู่เลือด</th>
                                                            <th>Rh</th>
                                                            <th>ครั้งที่บริจาค</th>
                                                            <th>วันที่บริจาค</th>
                                                            <th>สถานะ</th>
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
        <script src="assets/printJS/print.min.js"></script>
        <link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />

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

                $('#bloodgroup').select2({
                    allowClear: true,
                    theme: "bootstrap",
                    placeholder: "หมู่เลือด",
                    width: "100%",
                    ajax: {
                        url: 'data/masterdata/bloodgroup.php',
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
                                        id: item.bloodgroupid,
                                        text: item.bloodgroupname
                                    }
                                })
                            };
                        },

                    }
                });

                $('#rh').select2({
                    allowClear: true,
                    theme: "bootstrap",
                    placeholder: "Rh",
                    width: "100%",
                    ajax: {
                        url: 'data/masterdata/bloodrh.php',
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
                                        id: item.rhid,
                                        text: item.rhname3,
                                        item: item
                                    }
                                })
                            };
                        },

                    }
                })

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

                var bloodgroup = document.getElementById("bloodgroup").value;
                var rh = document.getElementById("rh").value;
                var donation_status = document.getElementById("donation_status").value;


                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report-blood-donate-firsttime.php',
                    data: {
                        bloodgroup: bloodgroup,
                        rh: rh,
                        fromdate: fromdate,
                        todate: todate,
                        donation_status: donation_status
                    },
                    success: function(data) {
                        var body = document.getElementById("list_table_json_firsttime").getElementsByTagName('tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }


                        var event_data = '';



                        var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                        var num = '';
                        $.each(obj, function(index, value) {

                            var arr = [value];
                            event_data += '<tr>';
                            event_data += '<td class="td-table" style="text-align:center;">' + (index + 1) + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.donorcode + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.donoridcard + '</td>';
                            event_data += '<td class="td-table" style="text-align:left;">' + value.fullname + '</td>';
                            event_data += '<td class="td-table" style="text-align:left;">' + value.donoragetext + '</td>';
                            event_data += '<td class="td-table" style="text-align:left;">' + value.address + '</td>';
                            event_data += '<td class="td-table" style="text-align:left;">' + value.donormobile + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.blood_group + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.rhname + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.donation_qty + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.donation_date + '</td>';
                            event_data += '<td class="td-table" style="text-align:center;">' + value.donation_status + '</td>';
                            event_data += '</tr>';
                        });
                        $("#list_table_json_firsttime").append(event_data);
                        // console.log(data)
                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
            }

            function reportPrint() {
                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());
                var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
                var fromtodate2 = ($('#fromdate').val() == $('#todate').val()) ? $('#todate').val() : $('#fromdate').val() + " - " + $('#todate').val();

                var bloodgroup = document.getElementById("bloodgroup").value;
                var rh = document.getElementById("rh").value;
                var donation_status = document.getElementById("donation_status").value;


                printJS({
                    printable: localurl + "/report/report-blood-donate-firsttime.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&bloodgroup=" + bloodgroup + "&rh=" + rh + "&donation_status=" + donation_status,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrintExCel() {
                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());
                var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
                var fromtodate2 = ($('#fromdate').val() == $('#todate').val()) ? $('#todate').val() : $('#fromdate').val() + " - " + $('#todate').val();

                var bloodgroup = document.getElementById("bloodgroup").value;
                var rh = document.getElementById("rh").value;
                var donation_status = document.getElementById("donation_status").value;

                window.open(localurl + "/report/report-blood-donate-firsttime-excel.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&bloodgroup=" + bloodgroup + "&rh=" + rh + "&donation_status=" + donation_status);
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>