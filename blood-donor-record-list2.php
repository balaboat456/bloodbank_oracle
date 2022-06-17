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

    if (!checkPermission("BK_COMPONENTS", "VW")) {
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

        <title>บันทึกแยกส่วนประกอบเลือด</title>

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

        <script src="assets/js/sweetalert-2.min.js"></script>
        <script src="assets/js/spinner.js"></script>


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



            .td-line-number {
                text-align: center;
                vertical-align: top !important;
            }

            .table-s-blood-scroll th,
            td {
                border: 1px solid #000000 !important;
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
                text-align: center !important;
            }

            .td-bg {
                background-color: #cccccc !important;
            }

            .td-select {
                border-radius: 0px !important;
                text-align: center !important;
            }

            .form-control {
                color: #000;
            }


            /* .select2-container--default.select2-container--disabled .select2-selection--single {
                background-color: #0000FF;
                cursor: default;
            } */

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #000;
                line-height: 28px;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 0px solid #aaa;
                border-radius: 0px;
            }

            /* .select2-dropdown select2-dropdown--below
        {
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            width: 300px !important;
        }

        .select2-container--open .select2-dropdown--above {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        } */

            .select2-dropdown--below {
                width: 300px !important;
            }

            .select2-dropdown--above {
                width: 300px !important;
            }

            /* .form-control::-webkit-input-placeholder { color: white; } */

            .table-s-blood-scroll {
                position: relative;
                width: 100%;
                z-index: 1;
                margin: auto;
                overflow: scroll;
                height: 180px;
                font-size: 70%;

            }

            .table-s-blood-scroll table {
                width: 100%;
                /* min-width: 1280px; */
                margin: auto;


            }

            .table-wrap {
                position: relative;
            }

            .table-s-blood-scroll th,
            td {
                border: 1px solid #ced4da;

            }



            /* safari and ios need the tfoot itself to be position:sticky also */
            .table-s-blood-scroll tfoot,
            .table-s-blood-scroll tfoot th,
            .table-s-blood-scroll tfoot td {
                position: -webkit-sticky;
                position: sticky;
                bottom: 0;
                z-index: 4;
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
                top: 50px !important;
                background: #272361;
                color: #fff;
                border: 1px solid #ced4da !important;
                z-index: 10000;
            }

            .table-s-blood-scroll-thead-th3 {
                position: -webkit-sticky;
                position: sticky;
                top: 80px !important;
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
                left: 20px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th1-2 {
                position: -webkit-sticky;
                position: sticky;
                left: 215px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th1-3 {
                position: -webkit-sticky;
                position: sticky;
                left: 255px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-1 {
                position: -webkit-sticky;
                position: sticky;
                left: 20px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-2 {
                position: -webkit-sticky;
                position: sticky;
                left: 100px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-3 {
                position: -webkit-sticky;
                position: sticky;
                left: 215px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-4 {
                position: -webkit-sticky;
                position: sticky;
                left: 255px !important;
                background: #272361;
                color: #fff;
                z-index: 100000 !important;
                border: 1px solid #ced4da !important;
            }

            .table-s-blood-scroll-left-thead-th2-5 {
                position: -webkit-sticky;
                position: sticky;
                left: 295px !important;
                background: #272361;
                color: #fff;
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
            }

            .table-s-blood-scroll-left-thead-th3-1 {
                position: -webkit-sticky;
                position: sticky;
                left: 20px !important;
                background: #FFF;
                z-index: 1000 !important;
                border: 1px solid #ced4da !important;
            }


            .swal-button--cancel {
                position: absolute;
                left: -370px;
                top: -20px;
                color: #fff;
                background-color: #dc3545;
            }
        </style>
    </head>




    <body class="adminbody">

        <?php include 'preload.php' ?>
        <script>
            var edit_permission = <?php echo (checkPermission("EDIT_DONATE", "ED")) ? 1 : 0; ?>;
            spinnershow();
        </script>


        <div class="myAlert-top alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> บันทึกข้อมูลสำเร็จ
        </div>

        <div class="myAlert-top-error alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> บันทึกข้อมูลล้มเหลว
        </div>
        <div id="main" class="enlarged forced">

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
                            <div id="mainform" class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">บันทึกแยกส่วนประกอบเลือด</h1>
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

                        <?php echo "<script> var status = '" . $_SESSION['status'] . "'; </script>";
                        $_SESSION['status'] = '';  ?>

                        <p>


                    </div>
                    </p>

                    <form autocomplete="off" role="form" id="myform" method="POST" action="bloodsave.php" enctype="multipart/form-data">

                        <div class="row">
                            <input hidden type="text" id="countblood2" name="countblood2" value="0">
                            <input hidden type="text" id="stockConfirmArr" name="stockConfirmArr" value="[]">
                            <input hidden type="text" id="stockInfectArr" name="stockInfectArr" value="[]">
                            <input hidden type="text" id="stockRemarkArr" name="stockRemarkArr" value="[]">

                            <div style="margin-top: -30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div class="card-header">
                                    <div class="form-row">
                                        <div hidden class="form-group col-md-1">
                                            <label for="inputCity">ผู้บันทึก</label>
                                            <input id="bloodstockmaincreate" name="bloodstockmaincreate" type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['username']; ?>">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputCity">ตั้งแต่วันที่</label>
                                            <input id="fromdate" name="fromdate" type="text" class="form-control form-control-sm date1" value="<?php echo (!empty($fromdate)) ? $fromdate : dateNowDMY(); ?>" onkeyup="fromdatekey()">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputCity">ถึงวันที่</label>
                                            <input id="todate" name="todate" type="text" class="form-control form-control-sm date1" value="<?php echo (!empty($todate)) ? $todate : dateNowDMY(); ?>" onkeyup="todatekey()">
                                        </div>
                                        <!-- <div class="form-group col-md-1">
                                            <label for="inputState">สถานะ</label>
                                            <select id="bloodstatus" name="bloodstatus" class="form-control form-control-sm bloodstatus"></select>
                                        </div> -->
                                        <input type="hidden" id="bloodstatus" name="bloodstatus">
                                        <div class="form-group col-md-1">
                                            <label for="inputCity">หมายเลขถุง</label>
                                            <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                            <input type="text" name="barcode" class="form-control form-control-sm" value="<?php echo $barcode; ?>" id="barcode" onkeyup="scanBarcode()" autofocus>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputCity">จากหมายเลขถุง</label>
                                            <input type="text" onkeyup="fromNumber()" value="<?php echo $fromnumber; ?>" name="fromnumber" class="form-control form-control-sm" id="fromnumber">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="inputCity">ถึงหมายเลขถุง</label>
                                            <input type="text" onkeyup="toNumber()" value="<?php echo $tonumber; ?>" name="tonumber" class="form-control form-control-sm" id="tonumber">
                                        </div>

                                        <div class="form-group col-md-1">
                                            <br />
                                            <a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#" class="btn btn-info btn-sm"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <br />
                                            <a style="margin-top: 7px;" onclick="resetPage()" role="button" href="#" class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-refresh"></i></span> รีเฟรช</a>
                                        </div>
                                        <!-- <div class="form-group col-md-1">
                                            <br />
                                            <a style="margin-top: 7px;" onclick="resetPage()" role="button" href="#" class="btn btn-success btn-sm"><span class="btn-label"><i class="fa fa-plus"></i></span> เพิ่มหมายเหตุ</a>
                                        </div> -->
                                        <div class="form-group col-md-2">
                                            <br />
                                            <input style="margin-top: 12px;" type="checkbox" id="isstock" name="isstock" onclick="checkSetIsStock(this)" value="1"><label> &nbsp;รับเข้าคลัง</label>
                                        </div>

                                    </div>

                                </div>

                                <div class="card mb-12">
                                    <div class="card-header" style="padding-bottom: 0px;">
                                        <div class="row">

                                            <div style="margin-bottom:0px;" class="form-group col-md-3">
                                                <div class="row">

                                                    รายละเอียดการแยกส่วนประกอบเลือด
                                                    </h3>&nbsp;&nbsp;<label id="countblood" for="countblood">0</label>&nbsp;&nbsp;รายการ&nbsp;&nbsp;


                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <i style="color: #00FFFF;" class="fa fa-circle"></i>&nbsp;รับเลือด&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i style="color: #FFFF00;" class="fa fa-circle"></i>&nbsp;แยกส่วนประกอบเลือด&nbsp;&nbsp;
                                                <i style="color: #6C0;" class="fa fa-circle"></i>&nbsp;พร้อมจ่าย&nbsp;&nbsp;<br />
                                                <i style="color: #0000FF;" class="fa fa-circle"></i>&nbsp;ไม่พร้อมจ่าย&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i style="color: #C00;" class="fa fa-circle"></i>&nbsp;ติดเชื้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i style="color: #F39;" class="fa fa-circle"></i>&nbsp;Screen Positive&nbsp;&nbsp;
                                            </div>
                                            <div class="form-group col-md-2" style="margin-top: -10px;">
                                                <label for="inputCity">

                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    ชนิดเลือด
                                                </label>
                                                <select id="bloodstocktypecross" class="form-control form-control-sm bloodstocktypecross" name="bloodstocktypecross">
                                                    <option value=""></option>
                                                    <?php
                                                    $strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
                                                    $objQuery = mysql_query($strSQL);
                                                    while ($objResuut = mysql_fetch_array($objQuery)) {
                                                    ?>
                                                        <option value="<?php echo $objResuut['bloodstocktypeid']; ?>">
                                                            <?php echo $objResuut['bloodstocktypename2'] . "|" . $objResuut['bloodstocktypecode'] . "|" . $objResuut['bloodstocktypecodegroup']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-2" style="margin-top: -10px;">
                                                <label for="inputCity">หมายเลขถุงกาชาด</label>
                                                <input type="text" id="barcodecross" name="barcodecross" onkeyup="scanBarcodeCross()" class="form-control form-control-sm">
                                            </div>
                                            <div class="form-group col-md-2" style="margin-top: -10px;">
                                                <label for="inputCity">หมายเลขถุงราชวิถี</label>
                                                <input type="text" id="barcodecross2" name="barcodecross2" onkeyup="scanBarcodePointBC(this.value)" class="form-control form-control-sm">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card-body ">
                                        <div class="table-s-blood-scroll" style="height:70vh;margin-top: -15px;">

                                            <div class="">
                                            </div>


                                            <table id="list_table_json" style="width:2395px !important;">
                                                <thead>
                                                    <tr>
                                                        <th class="table-s-blood-scroll-thead-th1 table-s-blood-scroll-left-thead-th1-0" rowspan="3" style="width: 20px; font-size:12px;"></th>
                                                        <th class="table-s-blood-scroll-thead-th1 table-s-blood-scroll-left-thead-th1-1" style="height:50px; font-size:15px;" colspan="2">ประเภทถุง</th>
                                                        <th class="table-s-blood-scroll-thead-th1 table-s-blood-scroll-left-thead-th1-2 td-input" style="width:40px !important; font-size:15px;">การ<br>บริจาค</th>
                                                        <th class="table-s-blood-scroll-thead-th1 table-s-blood-scroll-left-thead-th1-3 td-input" style="width:80px !important; font-size:15px;" colspan="2">การตรวจ<br>Raj</th>
                                                        <th class="table-s-blood-scroll-thead-th1" rowspan="3" style="font-size:15px; width: 100px;">หมายเลขสาย</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">PRC</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">LPRC</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">FFP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">PC</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">LPPC</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">LPPC(PAS)</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">SDP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">SDP(PAS)</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">WB</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">LDPRC</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">SDR</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">CRP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">CRYO</th>
                                                        <th class="table-s-blood-scroll-thead-th1" style="width: 70px; font-size:16px;">EXP</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="table-s-blood-scroll-thead-th2 table-s-blood-scroll-left-thead-th2-1" style="width:80px !important;height:60px; font-size:15px;" rowspan="2">วันที่บริจาค</th>
                                                        <th class="table-s-blood-scroll-thead-th2 table-s-blood-scroll-left-thead-th2-2" style="width:115px !important; font-size:15px;" rowspan="2">หมายเลขถุง</th>
                                                        <th class="table-s-blood-scroll-thead-th2 table-s-blood-scroll-left-thead-th2-3" style="width:40px !important; font-size:15px;" rowspan="2">Gr.</th>
                                                        <th class="table-s-blood-scroll-thead-th2 table-s-blood-scroll-left-thead-th2-4" style="width:40px !important; font-size:15px;" rowspan="2">Gr.</th>
                                                        <th class="table-s-blood-scroll-thead-th2 table-s-blood-scroll-left-thead-th2-5" style="width:40px !important; font-size:15px;" rowspan="2">Rh</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                        <th class="table-s-blood-scroll-thead-th2" style="height:30px; font-size:15px;" colspan="2">RFID</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                        <th class="table-s-blood-scroll-thead-th3" style="height:30px; font-size:15px;" colspan="2">หมายเหตุ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- end card-->



                                <div class="div-save" style="width:200px !important;">
                                    <div class="save-bottom">
                                        <div class="form-group text-right m-b-0">
                                            <?php if (checkPermission("BK_COMPONENTS", "ED")) { ?>
                                                <button class="btn btn-primary" name="submit" type="submit">
                                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
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
                <?php include('blood-donor-record-list2-lppc-modal.php'); ?>
                <?php include('blood-donor-record-list2-lppc-pas-modal.php'); ?>
                <?php include('blood-donor-record-list2-sdp-pas-modal.php'); ?>
                <?php include('blood-add-company-modal.php'); ?>
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
            <script src="assets/js/bloodlist.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/bloodlistsearch.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/bloodlist-event.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/bloodlist-confirm-event.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/blood-add-company.js?ref=<?php echo rand(); ?>"></script>

            <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
            <script src="assets/js/KeyNext.js?ref=<?php echo rand(); ?>"></script>
            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                $(document).ready(function() {

                    $("#barcode").on('keydown', function(e) {
                        if (e.which == 13) {
                            loadTable(this.value, '', true);

                            /*
                            setTimeout(function() {
                                document.getElementById("bloodstocktypecross").focus();
                                // $("#bloodstocktypecross").select2("open");
                            }, 1000);
                            */

                        }
                    });

                    $('#myform').submit(function() {

                        var data = getFormData($("#myform"));
                        spinnershow();
                        $.ajax({
                            type: 'POST',
                            url: 'bloodsave.php',
                            data: data,
                            dataType: "json",
                            complete: function() {
                                var delayInMilliseconds = 200;
                                setTimeout(function() {
                                    spinnerhide();
                                }, delayInMilliseconds);
                            },
                            success: function(data) {

                                if (data.status == true) {
                                    window.location.href = data.url;
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



                    $(window).keydown(function(event) {
                        if (event.keyCode == 13) {
                            event.preventDefault();
                            return false;
                        }
                    });

                    dateBE('.date1');

                    var barcode = $('#barcode').val();
                    var rfid = $('#rfid').val();
                    loadTable(barcode, rfid);


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

                function showCustomCompany() {
                    loadCompanyTable();
                    $("#customCompanyModal").modal("show");

                }

                function closeCustomCompany() {
                    $("#customCompanyModal").modal("hide");
                }

                document.getElementById("isstock").checked = (checkGetIsStock() == 'true');
            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>
            </form>

    </body>

    </html>