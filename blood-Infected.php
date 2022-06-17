<?php

$barcode = $_GET['barcode'];
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$fromnumber = $_GET['fromnumber'];
$tonumber = $_GET['tonumber'];
$bloodstatus = $_GET['bloodstatus'];
$rfid = $_GET['rfid'];

session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    if (!checkPermission("BK_BLOOD_INFECT", "VW")) {
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <?php include 'include/title.php' ?>

        <title>บันทึกเลือดติดเชื้อ</title>

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
        <link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/sweetalert-2.min.js"></script>
        <script src="assets/js/printer-setting.js"></script>


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

            .modal-dialog {
                max-width: 90% !important;
            }

            th,
            td {
                text-align: center;
                vertical-align: middle !important;
            }

            .card-body {
                padding: 0px;
            }

            .td0 {
                padding: 0px !important;
            }

            .td-input {
                padding: 0px !important;
                border-radius: 0px !important;
                text-align: center;
            }

            .td-bg {
                background-color: #cccccc !important;
            }

            .td-select {
                border-radius: 0px !important;
                text-align: center !important;
            }

            .td-table {
                padding: 1px !important;
            }

            select:disabled {
                color: #000 !important;
            }

            .table-s-blood-scroll-thead-th1 {
                position: -webkit-sticky;
                position: sticky;
                top: 0px !important;
                background: #272361;
                color: #fff;
                z-index: 10000;
                border: 1px solid #ced4da !important;

            }

            .table-s-blood-scroll-thead-th2 {
                position: -webkit-sticky;
                position: sticky;
                top: 40px !important;
                background: #272361;
                color: #fff;
                border: 1px solid #ced4da !important;
                z-index: 10000;
            }

            .table-s-blood-scroll-left-thead-th1-0 {
                position: -webkit-sticky;
                position: sticky;
                left: 0px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th1-1 {
                position: -webkit-sticky;
                position: sticky;
                left: 40px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th1-2 {
                position: -webkit-sticky;
                position: sticky;
                left: 100px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th1-3 {
                position: -webkit-sticky;
                position: sticky;
                left: 180px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-0 {
                position: -webkit-sticky;
                position: sticky;
                left: 0px !important;
                background: #FFF;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-1 {
                position: -webkit-sticky;
                position: sticky;
                left: 40px !important;
                background: #FFF;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-2 {
                position: -webkit-sticky;
                position: sticky;
                left: 100px !important;
                background: #FFF;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-3 {
                position: -webkit-sticky;
                position: sticky;
                left: 180px !important;
                background: #FFF;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }


            .table-s-blood-scroll-left-thead-th3-0 {
                position: -webkit-sticky;
                position: sticky;
                left: 0px !important;
                background: #FFF;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th3-1 {
                position: -webkit-sticky;
                position: sticky;
                left: 40px !important;
                background: #FFF;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th3-2 {
                position: -webkit-sticky;
                position: sticky;
                left: 100px !important;
                background: #FFF;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th3-3 {
                position: -webkit-sticky;
                position: sticky;
                left: 180px !important;
                background: #FFF;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th4-0 {
                position: -webkit-sticky;
                position: sticky;
                left: 0px !important;
                background: #b7e4eb;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th4-1 {
                position: -webkit-sticky;
                position: sticky;
                left: 40px !important;
                background: #b7e4eb;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th4-2 {
                position: -webkit-sticky;
                position: sticky;
                left: 100px !important;
                background: #b7e4eb;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
            }

            .table-s-blood-scroll-left-thead-th4-3 {
                position: -webkit-sticky;
                position: sticky;
                left: 180px !important;
                background: #b7e4eb;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
                opacity: 1.4;
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
            <strong>Success!</strong> ลบข้อมูลสำเร็จ
        </div>
        <div class="myAlert-top-error-delete alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> ลบข้อมูลล้มเหลว
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
                                    <h1 class="main-title float-left">บันทึกเลือดติดเชื้อ</h1>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                        <div class=" message" align="center">


                            <?php

                            if (isset($_GET['msg']) && isset($_GET['op'])) {

                                if ($_GET['msg'] == 1) {

                                    echo "<span class='msgp1' 

		style='padding:5px 20%; 

		color:green; 

		font-size:1.2em; 

		margin:0 5% 5px; 

		text-shadow: 1px 2px 3px #c8b4b4;

		letter-spacing: 1px;

		word-spacing: 1px;'>DATA has been " . $_GET['op'] . " !</span>";
                                } else {

                                    echo "<span class='msgp0' 

		style='padding:5px 20%;

		color:red;

		font-size:1.2em;

		margin:0 5% 5px;

		text-shadow: 1px 2px 3px #c8b4b4;

		letter-spacing: 1px;

		word-spacing: 1px;'>DATA has not " . $_GET['op'] . " .</span> ";
                                }
                            }




                            ?>
                        </div>

                        <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->
                        <?php $bagnumber = $_GET['bagnumber']; ?>
                        <?php echo "<script> var status = '" . $_SESSION['status'] . "'; </script>";
                        $_SESSION['status'] = '';  ?>

                        <p>


                    </div>
                    </p>

                    <form role="form" autocomplete="off" id="myform" method="POST" action="bloodsave.php" enctype="multipart/form-data">

                        <div class="row">
                            <input hidden type="text" id="countblood2" name="countblood2" value="0">
                            <input type="hidden" class="form-control" id="arrInfected" name="arrInfected" value="">
                            <div style="margin-top: -30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div class="card-header">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="inputCity">ตั้งแต่วันที่</label>
                                            <input id="fromdate" name="fromdate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputCity">ถึงวันที่</label>
                                            <input id="todate" name="todate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputCity">หมายเลขถุง</label>
                                            <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                            <input type="text" name="barcode" class="form-control" id="barcode" value="<?php echo $bagnumber; ?>" autofocus>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputCity">จากหมายเลขถุง</label>
                                            <input type="text" onkeyup="fromNumber()" value="<?php echo $fromnumber; ?>" name="fromnumber" class="form-control" id="fromnumber">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputCity">ถึงหมายเลขถุง</label>
                                            <input type="text" onkeyup="toNumber()" value="<?php echo $tonumber; ?>" name="tonumber" class="form-control" id="tonumber">
                                        </div>



                                        <div class="form-group col-md-2">
                                            <br />
                                            <a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="card mb-12">


                                    <div class="card-header" style="padding-bottom: 0px;">
                                        <div class="row">
                                            <div style="margin-bottom:0px;" class="form-group col-md-4">
                                                <div class="row">
                                                    <h3><i class="fa fa-check-square-o"></i>รายละเอียดเลือดที่รับ
                                                    </h3>&nbsp;&nbsp;<label id="countblood" for="countblood">0</label>&nbsp;&nbsp;รายการ
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <i style="color: #00FFFF;" class="fa fa-circle"></i>&nbsp;รับเลือด&nbsp;&nbsp;
                                                <i style="color: #FFFF00;" class="fa fa-circle"></i>&nbsp;แยกส่วนประกอบเลือด&nbsp;&nbsp;
                                                <i style="color: #6C0;" class="fa fa-circle"></i>&nbsp;พร้อมจ่าย&nbsp;&nbsp;
                                                <!-- <i style="color: #0000FF;" class="fa fa-circle"></i>&nbsp;ไม่พร้อมจ่าย&nbsp;&nbsp; -->
                                                <i style="color: #C00;" class="fa fa-circle"></i>&nbsp;ติดเชื้อ&nbsp;&nbsp;
                                                <i style="color: #F39;" class="fa fa-circle"></i>&nbsp;Screen Positive&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body ">

                                        <div class="table-stock-scroll" style="height: 70vh;">

                                            <table id="infectedTable" style="width:2000px;margin-bottom:0px;font-size: 16px;">
                                                <thead>
                                                    <tr>
                                                        <th class="table-s-blood-scroll-thead-th1 td-table table-s-blood-scroll-left-thead-th1-0" rowspan="2" style="width:40px"></th>
                                                        <th class="table-s-blood-scroll-thead-th1 td-table table-s-blood-scroll-left-thead-th1-1" rowspan="2" style="width:60px">No.</th>
                                                        <th class="table-s-blood-scroll-thead-th1 td-table table-s-blood-scroll-left-thead-th1-2" rowspan="2" style="width:80px">วันที่บริจาค</th>
                                                        <th class="table-s-blood-scroll-thead-th1 td-table table-s-blood-scroll-left-thead-th1-3" rowspan="2" style="width:140px">หมายเลขถุง</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:160px">ABO</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:160px">Rh</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:160px;font-size:14px">Antibody<br>Screening</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">SYPHILIS<br>TPHA/RPR</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">HBs<br>Ag</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">HIV<br>Ag/Ab</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">HCV<br>Ab</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">HBV<br>DNA</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">HCV<br>RNA</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" colspan="2" style="width:0px;font-size:14px">HIV<br>RNA</th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" rowspan="2">หมายเหตุ<br /><label style="font-size: 14px;">*ติ๊กถูกเพื่อให้แสดงหมายเหตุในประวัติการบริจาคโลหิต</label></th>
                                                        <th class="td-table table-s-blood-scroll-thead-th1" rowspan="2" style="width:100px;">แนบไฟล์</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:80px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">Raj</th>
                                                        <th style="width:80px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">NBC</th>
                                                        <th style="width:80px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">Raj</th>
                                                        <th style="width:80px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">NBC</th>
                                                        <th style="width:80px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">Raj</th>
                                                        <th style="width:80px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">NBC</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">ผล</th>
                                                        <th style="width:50px;font-size:14px" class="td-table table-s-blood-scroll-thead-th2">เกรด</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <div id="text"></div>
                                        </div>

                                    </div>
                                </div><!-- end card-->



                                <div class="div-save">
                                    <div class="save-bottom">
                                        <div class="form-group text-right m-b-0">
                                            <?php if (checkPermission("BK_BLOOD_INFECT", "ED")) { ?>
                                                <button class="btn btn-primary" type="submit">
                                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                                </button>
                                                <input id="fileInput" type="file" style="display:none;" />
                                                <button class="btn btn-success" onclick="document.getElementById('fileInput').click();" type="button">
                                                    <span class="btn-label"><i class="fa fa-upload"></i></span>Import File
                                                </button>
                                            <?php } ?>
                                            <?php if (checkPermission("BK_BLOOD_INFECT", "PDF1")) { ?>
                                                <button onclick="showPrint()" class="btn btn-success" type="button">
                                                    <span class="btn-label"><i class="fa fa-print"></i></span>Print Sticker
                                                </button>
                                            <?php } ?>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END container-fluid -->

                        </div>
                        <!-- END content -->

                </div>
                <!-- END content-page -->
                <?php include('blood-donor-record-modal.php'); ?>
                <?php include('blood-Infected-file-modal.php'); ?>
                <?php include('blood-blank-modal-print-sticker.php'); ?>
                <?php include('blood-Infected-error-modal.php'); ?>


                <!-- <?php // include'footer.php';
                        ?> -->
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

            <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/datepickerFormat.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/detect.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/fastclick.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.blockUI.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.nicescroll.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/jquery.scrollTo.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/plugins/switchery/switchery.min.js?ref=<?php echo rand(); ?>"></script>

            <!-- App js -->
            <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/EnterNext.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-infected.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-infected-event.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-donor-infected-file.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>

            <!-- BEGIN Java Script for this page -->
            <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
            <!-- END Java Script for this page -->

            <script>
                $(document).ready(function() {
                    $(window).keydown(function(event) {
                        if (event.keyCode == 13) {
                            event.preventDefault();
                            return false;
                        }
                    });


                    $("#bag_number1").on('keydown', function(e) {
                        if (e.which == 13) {
                            scanBarcode1();
                        }
                    });

                    $("#barcode").on('keydown', function(e) {
                        if (e.which == 13) {
                            loadTable();

                            $("#barcode").val("");
                            document.getElementById("barcode").focus();
                        }
                    });

                    setBagType();
                    dateBE('.date1');
                    loadTable();

                    $('.bloodstocktypecross').select2({
                        allowClear: true,
                        theme: "bootstrap",
                        placeholder: "",
                        width: "100%",
                        templateResult: function(state) {
                            if (!state.id) {
                                return state.text;
                            }

                            var strState = state.text.split("|");

                            var $state = $(
                                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                            );
                            return $state;
                        },
                        templateSelection: function(state) {
                            if (!state.id) {
                                return state.text;
                            }

                            var strState = state.text.split("|");

                            var $state = $(
                                '<span class="select2-span3">' + strState[0] + '</span>'
                            );
                            return $state;
                        },
                    }).on("select2:selecting", function(e) {
                        setTimeout(function() {
                            document.getElementById("bag_number1").focus();
                        }, 200);

                    });

                });

                function fromdatekey() {
                    date8('#fromdate');
                }

                function todatekey() {
                    date8('#todate');
                }


                function resetPage() {
                    location.reload();
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

                if (status == 'successful') {
                    myAlertTop();
                } else if (status == 'error') {
                    myAlertTopError();
                }


                function showPageFile(id = "") {
                    loadRepeatInfectionTable(id);
                    $("#bloodFileModal").modal("show");

                }

                function closePageFile() {
                    $("#bloodFileModal").modal("hide");
                }


                function showErrorPrint(obj) {
                    $("#printError").modal("show");

                    var body = document.getElementById("list_table_json_error").getElementsByTagName('tbody')[0];
                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }

                    var event_data = '';

                    $.each(obj, function(index, value) {
                        event_data += '<tr >';
                        event_data += '<td >' + (index + 1) + '</td>';
                        event_data += '<td >' + numnerPoint(value.bag_number) + '</td>';
                        event_data += '<td >' + value.text + '</td>';
                        event_data += '</tr>';
                    });

                    $("#list_table_json_error").append(event_data);



                }

                function closeErrorPrint() {
                    $("#printError").modal("hide");
                }
            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>
            </form>

    </body>

    </html>