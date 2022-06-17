<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
    include('checkPermission.php');
    if (!checkPermission("BK_BLOOD_STOCK", "VW")) {
        header('Location:not-permission.php');
    }

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

        <title>รายการสต็อคผลิตภัณฑ์</title>
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
                z-index: 1;
            }

            .td-table-17 {
                padding: 1px !important;
                width: 5.88% !important;
            }

            .vertical-bottom {
                vertical-align: bottom !important;
                margin-bottom: 5px;
            }

            .vertical-top5 {
                margin-top: 5px !important;
            }

            .padding-top-top15 {
                padding-top: 15px;
            }

            .label-model {
                color: #272361;
                font-size: 14px;
            }

            .div-anti {
                background-color: #f8f9fa;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                padding-top: 5px !important;
            }

            hr {
                margin-top: 0px;
                margin-bottom: 0px;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, .1);
            }

            .select2-dropdown--below {
                min-width: 300px !important;
            }

            .select2-dropdown--above {
                min-width: 300px !important;
            }
        </style>
        <!-- END CSS for this page -->

        <script>
            var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
            var session_staffid = "<?php echo $_SESSION['staffid']; ?>";
            var modal2 = "<?php echo $_GET['modal2']; ?>";
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

        <div class="myAlert-top-error-delete alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> Type Antigen นี้ถูกสร้างไว้แล้ว
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
                                    <h1 class="main-title float-left">รายการสต็อคผลิตภัณฑ์</h1>
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


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-3">
                                    <div class="card-body">

                                        <div class="table-no-scroll">
                                            <table id="list_table_stock1">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">หมู่เลือด</th>
                                                        <th colspan="12">จำนวนโลหิต รอผล Lab (Unit)</th>
                                                    </tr>
                                                    <tr>
                                                        <th>PRC</th>
                                                        <th>LPRC</th>
                                                        <th>FFP</th>
                                                        <th>PC</th>
                                                        <th>LPPC</th>
                                                        <th>LPPC<br />(PAS)</th>
                                                        <th>SDP</th>
                                                        <th>SDP<br />(PAS)</th>
                                                        <th>WB</th>
                                                        <th>LDPRC</th>
                                                        <th>SDR</th>
                                                        <th>รวม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <div class="card-body">

                                        <div class="table-no-scroll">
                                            <table id="list_table_stock2">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">หมู่เลือด</th>
                                                        <th colspan="12">จำนวน Stock โลหิต Rh Positive ( Unit)</th>
                                                        <th rowspan="2" style="width:1px;border: #FFF;background: #272361;">
                                                        </th>
                                                        <th colspan="12">จำนวนโลหิตเตรียมผ่าตัด Rh Positive ( Unit)</th>
                                                    </tr>
                                                    <tr>
                                                        <th>PRC</th>
                                                        <th>LPRC</th>
                                                        <th>FFP</th>
                                                        <th>PC</th>
                                                        <th>LPPC</th>
                                                        <th>LPPC<br />(PAS)</th>
                                                        <th>SDP</th>
                                                        <th>SDP<br />(PAS)</th>
                                                        <th>WB</th>
                                                        <th>LDPRC</th>
                                                        <th>SDR</th>
                                                        <th>รวม</th>
                                                        <th>PRC</th>
                                                        <th>LPRC</th>
                                                        <th>FFP</th>
                                                        <th>PC</th>
                                                        <th>LPPC</th>
                                                        <th>LPPC<br />(PAS)</th>
                                                        <th>SDP</th>
                                                        <th>SDP<br />(PAS)</th>
                                                        <th>WB</th>
                                                        <th>LDPRC</th>
                                                        <th>SDR</th>
                                                        <th>รวม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <div class="card-body">

                                        <div class="table-no-scroll">
                                            <table id="list_table_stock3">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">หมู่เลือด</th>
                                                        <th colspan="12">จำนวน Stock โลหิต Rh Negative ( Unit)</th>
                                                        <th rowspan="2" style="width:1px;border: #FFF;background: #272361;">
                                                        </th>
                                                        <th colspan="12">จำนวนโลหิตเตรียมผ่าตัด Rh Negative ( Unit)</th>
                                                    </tr>
                                                    <tr>
                                                        <th>PRC</th>
                                                        <th>LPRC</th>
                                                        <th>FFP</th>
                                                        <th>PC</th>
                                                        <th>LPPC</th>
                                                        <th>LPPC<br />(PAS)</th>
                                                        <th>SDP</th>
                                                        <th>SDP<br />(PAS)</th>
                                                        <th>WB</th>
                                                        <th>LDPRC</th>
                                                        <th>SDR</th>
                                                        <th>รวม</th>
                                                        <th>PRC</th>
                                                        <th>LPRC</th>
                                                        <th>FFP</th>
                                                        <th>PC</th>
                                                        <th>LPPC</th>
                                                        <th>LPPC<br />(PAS)</th>
                                                        <th>SDP</th>
                                                        <th>SDP<br />(PAS)</th>
                                                        <th>WB</th>
                                                        <th>LDPRC</th>
                                                        <th>SDR</th>
                                                        <th>รวม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <div class="card-body">

                                        <div class="table-no-scroll" style="width:600px">
                                            <table id="list_table_stock4">
                                                <thead>
                                                    <tr>
                                                        <th>จำนวน Stock CRYO ( Unit)</th>
                                                        <th></th>
                                                        <th>จำนวน CRYO เตรียมผ่าตัด ( Unit)</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <!-- <hr />
								<div class="card-body">

									<div class="table-no-scroll">
										<table id="list_table_stock_locker">
											<thead>
												<tr>
													<th rowspan="2">หมู่เลือด</th>
													<th colspan="13">จำนวนในตู้จัดเก็บ ( Unit)</th>
												</tr>
												<tr>
													<th>PRC</th>
													<th>LPRC</th>
													<th>FFP</th>
													<th>PC</th>
													<th>LPPC</th>
													<th>LPPC<br />(PAS)</th>
													<th>SDP</th>
													<th>SDP<br />(PAS)</th>
													<th>WB</th>
													<th>LDPRC</th>
													<th>SDR</th>
													<th>Cryo</th>
													<th>รวม</th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>


								</div> -->

                                    <hr />

                                    <div class="card-body">

                                        <div class="table-no-scroll" style="width:600px">
                                            <table id="list_table_stock5">
                                                <thead>

                                                    <tr>
                                                        <th rowspan="2">หมู่เลือด</th>
                                                        <th colspan="3">จำนวนเลือดพร้อมใช้ในคลัง</th>
                                                        <th rowspan="2" style="width:1px;border: #FFF;background: #272361;"></th>
                                                        <th rowspan="2">จำนวนเลือดขั้นต่ำ</th>
                                                        <th rowspan="2" style="width:1px;border: #FFF;background: #272361;"></th>
                                                        <th colspan="3">จำนวนเลือดที่ต้องขอเบิก</th>

                                                    </tr>
                                                    <tr>
                                                        <th>LPRC</th>
                                                        <th>PRC</th>
                                                        <th>รวม</th>
                                                        <th>LPRC</th>
                                                        <th>PRC</th>
                                                        <th>รวม</th>

                                                    </tr>

                                                </thead>
                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>
                                        <center>
                                            <a class="btn btn-success" onclick="gobloodborrow()">บันทึกเบิกยืมเลือด</a>
                                        </center>
                                    </div>


                                    <hr />

                                    <div class="card-body">

                                        <label>ตาราง Type Ag</label>

                                        <div class="form-group col-md-2" style="margin-top:-20px">
                                            <br />
                                            <a role="button" onclick="showAgStockPhenotype()" href="#" class="btn btn-primary" onclick=""><span class="btn-label">
                                                    <i class="fa fa-check"></i></span>สร้างตาราง</a>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">ชนิดเลือด</label>
                                                <select id="ag_bloodstocktypecross_search" class="form-control ag_bloodstocktypecross_search" name="ag_bloodstocktypecross_search">
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputCity">หมายเลขถุง</label>
                                                <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                                <input type="text" name="ag_bag_number_search" autocomplete="off" class="form-control" id="ag_bag_number_search" onkeyup="scanBarcodeAddBloodStockInTypeAgSearch()">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="inputCity">RFID</label>
                                                <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                                <input type="text" name="ag_rfidscan_search" class="form-control" value="" id="ag_rfidscan_search">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <br />
                                                <a style="margin-top: 7px;" onclick="bloodStockInTypeAgSearch()" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                                            </div>


                                        </div>



                                        <div id="row_type_ag" class="row">


                                        </div>




                                    </div>


                                </div><!-- end card-->
                            </div>

                        </div>

                        <div class="div-save">
                            <div class="save-bottom">
                                <div class="form-group text-right m-b-0">
                                    <?php if (checkPermission("BK_BLOOD_STOCK", "AD")) { ?>
                                        <button onclick="addBloodBlank2()" class="btn btn-success" type="button">
                                            <span class="btn-label"><i class="fa fa-plus"></i></span>รับเลือดจากสถานที่อื่น
                                        </button>
                                        <button onclick="addBloodBlank3()" class="btn btn-warning" type="button">
                                            <span class="btn-label"><i class="fa fa-minus"></i></span>จ่ายเลือดจากคลัง
                                        </button>
                                    <?php } ?>
                                    <button onclick="listPage()" class="btn btn-info" type="button">
                                        <span class="btn-label"><i class="fa fa-search"></i></span>รายละเอียดการรับเลือด
                                    </button>
                                    <button onclick="listPayPage()" class="btn btn-info" type="button">
                                        <span class="btn-label"><i class="fa fa-search"></i></span>รายละเอียดการจ่ายเลือด
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

            <?php include 'blood-blank-modal.php'; ?>
            <?php include 'blood-blank-modal2.php'; ?>
            <?php include 'inventory-blood-bank-ag-phenotype-modal.php'; ?>
            <?php include 'inventory-blood-bank-add-ag-phenotype-modal.php'; ?>
            <?php include 'inventory-blood-bank-add-ag-phenotype-search-modal.php'; ?>
            <?php include 'blood-blank-borrow-modal-1.php'; ?>
            <?php include 'blood-blank-borrow-modal-2.php'; ?>
            <?php include 'blood-blank-borrow-modal-5.php'; ?>
            <?php include 'blood-blank-borrow-modal-6.php'; ?>
            <?php include 'blood-blank-refund-modal-11.php'; ?>
            <?php include('blood-blank-modal2-hospital.php'); ?>
            <?php include('blood-blank-modal2-cause-broken.php'); ?>

            <?php include 'blood-blank-stock-pay-modal.php'; ?>
            <?php include 'blood-blank-modal-out.php'; ?>
            <?php include 'askforblood-blood-stock2.php'; ?>
            <?php include('blood-investigate-modal.php'); ?>





            <?php include 'footer.php'; ?>
        <?php } else {

        header('Location:index.php');
    }

        ?>

        </div>
        <!-- END main -->

        <script src="assets/js/modernizr.min.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/plugins/jquery-ui/jquery.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/moment.min.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/js/popper.min.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bootstrap.min.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/js/detect.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/fastclick.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/jquery.blockUI.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/jquery.nicescroll.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/datepickerFormat.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/mgs.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/EnterNext.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/setData.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
        <!-- App js -->
        <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>



        <script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock-event.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodliststock-event.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock-out.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock-in-out-ag.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock-in-out-ag-display.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock-in-out-ag-event.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodstock-in-out-ag-search-event.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/bloodliststock-event-hn.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/borrow-event-1.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/borrow-event-2.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/borrow-event-5.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/borrow-event-6.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/refund-event-11.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/blood-stock-event.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/custom/blood-stock/blood-stock-event-hospital.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/js/custom/blood-stock/blood-stock-event-broken.js?ref=<?php echo rand(); ?>"></script>


        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		

            socket.on('queue', function(data) {
                console.log(data);
                loadTable();
                loadTableInOutAg();
            });

            socket.on('crossmatch', function(data) {
                console.log(data);
                loadTable();
                loadTableInOutAg();
            });

            $(document).ready(function() {

                $("#hn_pay_out").on('keydown', function(e) {
                    if (e.which == 13) {
                        scanBarcodeHnPay();
                    }
                });



                /*
                $('#formBlood2').on('keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                
                    console.log(e);

                    if (keyCode === 13) { 
                        

                        e.preventDefault();
                        return false;
                    }
                });
                */

                dateBE(".date1");
                $('#formBlood2').submit(function() {
                    saveCross();
                    return false;
                });

                $("#bag_number1").on('keydown', function(e) {
                    if (e.which == 13) {
                        scanBarcode1();
                    }
                });
                dateBE('.date2');

                $('#bloodstockpaytypeid').change(function() {
                    val = $(this).val();
                    console.log(val);
                    if (val == '6') {
                        document.getElementById("loader3").style.display = "block";
                        document.getElementById("loader5").style.display = "none";
                        document.getElementById("loader4").style.display = "none";
                        document.getElementById("loader6").style.display = "none";
                    } else if (val == '5') {
                        document.getElementById("loader4").style.display = "block";
                        document.getElementById("loader3").style.display = "none";
                        document.getElementById("loader5").style.display = "none";
                        document.getElementById("loader6").style.display = "none";
                    } else if (val == '7') {
                        document.getElementById("loader5").style.display = "block";
                        document.getElementById("loader3").style.display = "none";
                        document.getElementById("loader4").style.display = "none";
                        document.getElementById("loader6").style.display = "none";
                        // } else if (val == '2' || val == '3' || val == '8' || val == '9') {
                    } else if (val == '2') {
                        document.getElementById("loader3").style.display = "none";
                        document.getElementById("loader5").style.display = "none";
                        document.getElementById("loader4").style.display = "none";
                        document.getElementById("loader6").style.display = "block";

                    } else {
                        document.getElementById("loader3").style.display = "none";
                        document.getElementById("loader5").style.display = "none";
                        document.getElementById("loader4").style.display = "none";
                        document.getElementById("loader6").style.display = "none";
                    }
                });


                $('#formBloodOut').submit(function() {

                    var data = getFormData($("#formBloodOut"));

                    data['outbloodborrowid'] = $("#outbloodborrowid").val();
                    data['outbloodborrowitemid'] = $("#outbloodborrowitemid").val();
                    data['outbloodstockpaytypeid'] = $("#bloodstockpaytypeid").val();
                    data['outbloodgroup'] = $("#outbloodgroup").val();
                    data['outhospitalid'] = $("#hospital_pay").val();
                    data['bloodstockpaymainremark'] = $("#bloodstockpaymainremark").val();

                    data['hn_pay_out'] = $("#hn_pay_out").val();
                    data['patient_pay_out'] = $("#patient_pay_out").val();

                    data['patient_pay_date'] = $("#patient_pay_date").val();
                    data['patient_pay_time'] = $("#patient_pay_time").val();

                    data['bloodbrokenid'] = $("#bloodbrokenid").val();

                    data['formbloodout'] = JSON.stringify(getFormBloodOut());

                    console.log(data);

                    var bloodstockpaytypeid = $("#bloodstockpaytypeid").val();
                    var hospital_pay = $("#hospital_pay").val();
                    var bloodbrokenid = $("#bloodbrokenid").val();


                    if ($("#bloodstockpaytypeid").val() == "5" && $("#outbloodborrowid").val() == "") {
                        errorSwal2('กรุณาเลือกรายการที่ต้องการคืนเลือด');
                        return false;
                    }


                    if (bloodstockpaytypeid == "5" ||
                        bloodstockpaytypeid == "6" ||
                        bloodstockpaytypeid == "7" ||
                        bloodstockpaytypeid == "10") {
                        if (hospital_pay == "" || hospital_pay == "null" || hospital_pay == null) {
                            errorSwal2('กรุณาระบุสาขาที่จะจ่ายเลือด');
                            return false;
                        }
                    }

                    if (bloodstockpaytypeid == "9") {
                        if (bloodbrokenid == "" || bloodbrokenid == "null" || bloodbrokenid == null) {
                            errorSwal2('กรุณาระบุสาเหตุ');
                            return false;
                        }
                    }

                    // let test_Data = JSON.parse(data.formbloodout);
                    // test_Data = JSON.parse(test_Data);
                    // console.log('checkdataBeforeAjax',test_Data );
                    spinnershow();
                    $.ajax({
                        type: 'POST',
                        url: 'blood-blank-out-save.php',
                        data: data,
                        dataType: 'json',
                        complete: function() {
                            var delayInMilliseconds = 200;
                            setTimeout(function() {
                                spinnerhide();

                            }, delayInMilliseconds);
                        },
                        success: function(data) {
                            console.log('checkdata', data);
                            if (data.status) {
                                myAlertTop();
                                loadTableBloodPayStock($("#bloodstockpaytypeid").val());

                                $('#bloodstockmainid').val(data.id);

                                if (document.getElementById("printsticker").checked); {
                                    if (val == '6') {
                                        reportPrintGetBlood1();
                                    } else if (val == '5') {
                                        reportPrintGetBlood2();
                                    } else if (val == '2') {
                                        reportPrintGetBlood4();
                                    } else if (val == '3') {
                                        reportPrintGetBlood5();
                                    } else if (val == '9') {
                                        reportPrintGetBlood6();
                                    } else if (val == '7') {
                                        reportPrintGetBlood3();
                                    } else if (val == '8') {
                                        reportPrintGetBlood7();
                                    }
                                }

                                $("#list_table_json_out_show_body").html('');
                                // reportPrintGetBlood1();
                                document.getElementById("bag_number_pay_out_check").value = '';

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

                function getFormBloodOut() {
                    var arr = [];
                    var rows = document.getElementById("list_table_json_out").rows;
                    for (var i = 1; i < rows.length; i++) {
                        if (rows[i].cells[1].children[0].checked)
                            arr.push(rows[i].cells[0].innerHTML);
                    }
                    return arr;

                }

                if (modal2 == 1) {
                    addBloodBlank2();
                }


            });



            function addBloodBlank() {
                deleteArr = [];
                $("#blankModal").modal('show');
                $("#bloodstockmainid2").val("");
                $('#bloodstocktypecross1').val("").change();
                $("#bag_number1").val('');
                $("#rfidscan").val('');
                var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
                while (body.firstChild) {
                    body.removeChild(body.firstChild);
                }

                setTimeout(function() {
                    document.getElementById("rfidscan").focus();
                }, 1000);

            }

            function addBloodBlank2() {
                count = 0;
                $("#blankModal2").modal('show');
                $("#bloodstockmainid").val("");
                $('#hospital').val(null);
                $('#hospital').trigger('change');
                $('#bloodbagtype').val(null);
                $('#bloodbagtype').trigger('change');
                $('#bloodstocktypecross').val(null);
                $('#bloodstocktypecross').trigger('change');
                $('#receivingtypeid').val(null);
                $('#receivingtypeid').trigger('change');
                $('#bloodgroupcross').val(null);
                $('#bloodgroupcross').trigger('change');
                $('#bloodrhcross').val(null);
                $('#bloodrhcross').trigger('change');
                $('#donation_date_cross').val('');
                $('#donation_exp_cross').val('');
                $('#volume').val('');
                $('#bag_number').val('');
                $('#rfidcode').val('');
                setValueHospital();
                setValueReceivingType();



                var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
                while (body.firstChild) {
                    body.removeChild(body.firstChild);
                }

                setTimeout(function() {
                    // document.getElementById("rfidscancross").focus();
                }, 1000);

            }

            function addBloodBlank3() {
                count = 0;
                $("#blankModalOut").modal('show');


                setTimeout(function() {
                    // document.getElementById("rfidscancross").focus();
                }, 1000);

            }

            function showBloodOutRoom() {
                loadTableBloodPayStockEmRoom();
                $('#blankModalOutRoom').modal('show');
            }

            function showAddAgPhenotypeModal(bloodstocktypeagid = "", bloodstocktypeagname = "", bloodstocktypeagphon = "") {
                clearAddAgPhenotype();
                $("#addAgPhenotypeTitle").val(bloodstocktypeagphon);
                $("#bloodstocktypeagid").val(bloodstocktypeagid);

                document.getElementById('addAgPhenotypeTitleModal').innerHTML = "เพิ่ม " + bloodstocktypeagname;
                $('#addAgPhenotypeModal').modal('show');
            }

            function closeAddAgPhenotypeModal() {
                $('#addAgPhenotypeModal').modal('hide');
            }

            function showSearchAgPhenotypeModal(bloodstocktypeagid = "", bloodstocktypeagname = "", bloodstocktypeagphon = "",
                bloodstocktypeagitemid = "") {


                $("#searchAgPhenotypeTitle").val(bloodstocktypeagphon);
                $("#searchbloodstocktypeagid").val(bloodstocktypeagid);

                document.getElementById('searchAgPhenotypeTitleModal').innerHTML = "ค้นหา " + bloodstocktypeagname;
                BloodStockInTypeSearchItemAg(bloodstocktypeagitemid);

                $('#searchAgPhenotypeModal').modal('show');
            }

            function closeSearchAgPhenotypeModal() {
                $('#searchAgPhenotypeTitleModal').modal('hide');
            }

            function closeBloodBlankOutRoom() {
                $('#blankModalOutRoom').modal('hide');
            }

            function showAgStockPhenotype() {
                PhenotypeAgInOutGroupingRemove();
                $('#stock-ag-modal').modal('show');
            }

            function closeAgStockPhenotype() {
                $('#stock-ag-modal').modal('hide');
            }


            function closeBloodBlank() {
                $('#blankModalOut').modal('hide');
            }

            function setbloodgroup(vbg) {
                console.log(vbg)
            }

            function showBloodBorrow() {

                $('#bloodstockmainid').val("");

                var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
                while (body.firstChild) {
                    body.removeChild(body.firstChild);
                }
                $('#patienthn').val('');
                $('#patientfullname').val('');
                $('#phenotype').val('');
                var receivingtypeid = $("#receivingtypeid").val();


                setReceivingTypeID(receivingtypeid);
                if (receivingtypeid == 1) {
                    loadTableBloodBorrowReceivingtypeid1(receivingtypeid);
                    $('#bloodBorrowModal1').modal('show');
                } else if (receivingtypeid == 2 || receivingtypeid == 3 || receivingtypeid == 4 || receivingtypeid == 12) {

                    if (receivingtypeid == 2) {
                        document.getElementById('label_borrow_receivingtypeid').innerHTML =
                            "ข้อมูลประวัติการเบิกโลหิตที่หายากกับสภากาชาดไทย";
                    } else if (receivingtypeid == 3) {
                        document.getElementById('label_borrow_receivingtypeid').innerHTML =
                            "ข้อมูลประวัติการรับเลือดจากการเบิก Apheresis Product";
                    } else if (receivingtypeid == 4) {
                        document.getElementById('label_borrow_receivingtypeid').innerHTML =
                            "ข้อมูลประวัติการรับเลือดรับจากการเบิก Rh Negative";
                    } else if (receivingtypeid == 12) {
                        document.getElementById('label_borrow_receivingtypeid').innerHTML =
                            "ข้อมูลประวัติการเบิกโลหิตเฉพาะรายกับสภากาชาดไทย";
                    }

                    loadTableBloodBorrowReceivingtypeid2(receivingtypeid);
                    $('#bloodBorrowModal2').modal('show');
                } else if (receivingtypeid == 5) {

                    document.getElementById('label_stock_pay').innerHTML = "ข้อมูลประวัติการให้ยืมเลือดกับ" + hospitalname;
                    loadTableBloodStockPay(receivingtypeid);
                    $('#bloodBloodStockPay').modal('show');

                    document.getElementById('label_stock_pay_title_1').innerHTML = "จำนวนที่ให้ยืม";
                    document.getElementById('label_stock_pay_title_2').innerHTML = "จำนวนที่รับคืน";

                } else if (receivingtypeid == 6) {
                    document.getElementById('label_stock_pay').innerHTML = "ข้อมูลประวัติการแลกเลือดกับ" + hospitalname;
                    loadTableBloodStockPay(receivingtypeid);
                    $('#bloodBloodStockPay').modal('show');

                    document.getElementById('label_stock_pay_title_1').innerHTML = "จำนวนที่ให้แลก";
                    document.getElementById('label_stock_pay_title_2').innerHTML = "จำนวนที่รับแลก";
                } else if (receivingtypeid == 11 || receivingtypeid == 13) {



                    if (receivingtypeid == 13) {
                        document.getElementById('label_borrow_receivingtypeid_5').innerHTML = "ข้อมูลประวัติการแลกเลือดกับ" +
                            hospitalname + ' (กรณีรับเลือดมาก่อน)';
                        loadTableBloodBorrowReceivingtypeid5(13);
                    } else {
                        document.getElementById('label_borrow_receivingtypeid_5').innerHTML = "ข้อมูลประวัติการยืมเลือดกับ" +
                            hospitalname;
                        loadTableBloodBorrowReceivingtypeid5();
                    }



                    $('#bloodBorrowModal5').modal('show');

                }

            }

            function showCustomHospital() {
                $('#bloodBlankHospitalModal').modal('show');
                loadHospitalTable();
            }

            function showCustomBloodBroken() {
                $('#bloodBlankBrokenModal').modal('show');
                loadBrokenTable();
            }

            function closeCustomHospital() {
                $('#bloodBlankHospitalModal').modal('hide');
            }

            function closeCustomBloodBroken() {
                $('#bloodBlankBrokenModal').modal('hide');
            }


            function closeBloodBorrow1() {
                $('#bloodBorrowModal1').modal('hide');
            }

            function closeBloodBorrow2() {
                $('#bloodBorrowModal2').modal('hide');

            }

            function closeBloodBorrow5() {
                $('#bloodBorrowModal5').modal('hide');
            }

            function closeBloodBorrow6() {
                $('#bloodBorrowModal6').modal('hide');
            }

            function showBloodRefund() {
                loadTableBloodrefundReceivingtypeid5();
                $('#bloodRefundModal5').modal('show');
            }

            function closeBloodRefund5() {
                $('#bloodRefundModal5').modal('hide');
            }

            function closeBloodStockPay() {
                $('#bloodBloodStockPay').modal('hide');
            }

            function listPage() {
                window.location.href = 'inventory-blood-bank-list.php';
            }

            function listPayPage() {
                window.location.href = 'blood-blank-stock-pay.php';
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

            function myAlertTopErrorDelete() {
                $(".myAlert-top-error-delete").show();
                setTimeout(function() {
                    $(".myAlert-top-error-delete").hide();
                }, 5000);
            }

            function clearAddAgPhenotype() {
                var body = document.getElementById("list_table_json_type_ag").getElementsByTagName('tbody')[0];
                while (body.firstChild) {
                    body.removeChild(body.firstChild);
                }

                $("#ag_bag_number").val("");
                $("#ag_rfidscan").val("");
            }

            if (status == 'successful') {
                myAlertTop();
            } else if (status == 'error') {
                myAlertTopError();
            }

            function gobloodborrow() {
                var lprc_a = document.getElementById("diff_lprc1").innerHTML;
                var lprc_b = document.getElementById("diff_lprc2").innerHTML;
                var lprc_o = document.getElementById("diff_lprc3").innerHTML;
                var lprc_ab = document.getElementById("diff_lprc4").innerHTML;

                var prc_a = document.getElementById("diff_prc1").innerHTML;
                var prc_b = document.getElementById("diff_prc2").innerHTML;
                var prc_o = document.getElementById("diff_prc3").innerHTML;
                var prc_ab = document.getElementById("diff_prc4").innerHTML;


                window.location.href = "blood-borrow2.php?lprc_a=" + lprc_a + "&lprc_b=" + lprc_b +
                    "&lprc_o=" + lprc_o + "&lprc_ab=" + lprc_ab + "&prc_a=" + prc_a + "&prc_b=" + prc_b +
                    "&prc_o=" + prc_o + "&prc_ab=" + prc_ab;
            }



            setReceivingTypeID(1)

            /*
            $("input,select").bind("keydown", function(event) {
                if (event.which === 13) {
                    event.stopPropagation();
                    event.preventDefault();
                    $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
                    return false;
                }
            });
            */
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->


    </body>

    </html>