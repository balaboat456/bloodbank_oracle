<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    include('checkPermission.php');

    if (!checkPermission("BK_BLOOD_RESULT", "VW")) {
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

        <title>บันทึกผลตรวจเลือดผู้มาบริจาค</title>
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

        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
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

            #bloodgroupinvest+.select2 .select2-selection__rendered {
                font-weight: bold;
                color: #dc3545
            }
        </style>
        <script>
            var session_staffid = "<?php echo $_SESSION['staffid']; ?>";
            var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
        </script>
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
                                    <h1 class="main-title float-left">บันทึกผลตรวจเลือดผู้มาบริจาค</h1>
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
                                    <div class="card-header">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="inputCity">ตั้งแต่วันที่</label>
                                                <input id="fromdate" name="fromdate" type="text" autocomplete="off" class="form-control date1" value="<?php echo dateNowDMY(); ?>">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputCity">ถึงวันที่</label>
                                                <input id="todate" name="todate" type="text" autocomplete="off" class="form-control date1" value="<?php echo dateNowDMY(); ?>">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="inputCity">หมายเลขถุง</label>
                                                <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                                <input type="text" autocomplete="off" name="barcode" class="form-control" id="barcode" onkeyup="scanBarcode()" autofocus>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="inputCity">จากหมายเลขถุง</label>
                                                <input type="text" autocomplete="off" onkeyup="fromNumber()" value="<?php echo $fromnumber; ?>" name="fromnumber" class="form-control" id="fromnumber">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputCity">ถึงหมายเลขถุง</label>
                                                <input type="text" autocomplete="off" onkeyup="toNumber()" value="<?php echo $tonumber; ?>" name="tonumber" class="form-control" id="tonumber">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <br />
                                                <a style="margin-top: 7px;" onclick="loadTable('search')" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div>รายละเอียดผู้มาบริจาคเลือด
                                                &nbsp;&nbsp;<b>รวมทั้งหมด&nbsp;<label id="countblood" for="countblood">0</label>&nbsp;ถุง</b></div>
                                        </div>

                                        <div id="table-scroll" class="table-scroll">
                                            <table id="list_table_invest" class="main-table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:40px !important"></th>
                                                        <th style="width:60px !important">No.</th>
                                                        <th style="width:150px !important">วันที่/เวลาบริจาค</th>
                                                        <th style="width:140px !important">หมายเลขถุง</th>
                                                        <th style="width:200px !important">ชนิดถุง</th>
                                                        <th style="width:60px !important">หมู่เลือด</th>
                                                        <th style="width:60px !important">Rh</th>
                                                        <th>ชื่อ-นามสกุล ผู้บริจาค</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    </tfoot>
                                            </table>
                                        </div>


                                        <br />
                                        <?php $fullname = $_SESSION['fullname']; ?>
                                        <form role="form" id="myform" method="POST" action="blood-investigate-save.php" enctype="multipart/form-data">
                                            <input type="hidden" id="fullname" name="fullname" value="<?php echo $fullname ?>">
                                            <input type="hidden" class="form-control" id="donateid" name="donateid" value="">
                                            <input type="hidden" class="form-control" id="donorid" name="donorid" value="">

                                            <input type="hidden" class="form-control" id="arrAnti" name="arrAnti" value="">

                                            <input type="hidden" class="form-control" id="arrIden" name="arrIden" value="">

                                            <input type="hidden" class="form-control" id="arrRh" name="arrRh" value="">

                                            <input type="hidden" class="form-control" id="arrABO" name="arrABO" value="">

                                            <input type="hidden" class="form-control" id="arrABOModal" name="arrABOModal" value="">

                                            <input type="hidden" class="form-control" id="bloodstatusid" name="bloodstatusid" value="">

                                            <input type="hidden" class="form-control" id="blood_group_cross" name="blood_group_cross" value="">

                                            <input type="hidden" class="form-control" id="rh_cross" name="rh_cross" value="">

                                            <input type="hidden" class="form-control" id="tpharpr" name="tpharpr" value="">
                                            <input type="hidden" class="form-control" id="hbsag" name="hbsag" value="">
                                            <input type="hidden" class="form-control" id="hivagab" name="hivagab" value="">
                                            <input type="hidden" class="form-control" id="hcvab" name="hcvab" value="">
                                            <input type="hidden" class="form-control" id="hbvdna" name="hbvdna" value="">
                                            <input type="hidden" class="form-control" id="hcvrna" name="hcvrna" value="">
                                            <input type="hidden" class="form-control" id="hivrna" name="hivrna" value="">


                                            <div class="form-group row">

                                                <div class="form-group col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            ตารางหมู่โลหิต ABO
                                                        </div>

                                                    </div>

                                                    <div class="table-no-scroll" style="height:220px !important">
                                                        <table id="list_table_abo" class="main-table">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2" style="width:80px !important">Reagent</th>
                                                                    <th colspan="3">Cell Grouping</th>
                                                                    <th colspan="3">Serum Grouping</th>
                                                                    <th style="width:80px !important" rowspan="2">
                                                                        Blood<br />Group
                                                                    </th>
                                                                    <th style="width:40px" rowspan="2">
                                                                        <button type="button" onclick="addABOTest()" class="btn btn-info btn-sm">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>

                                                                </tr>
                                                                <tr>
                                                                    <th style="width:80px !important">Anti-A</th>
                                                                    <th style="width:80px !important">Anti-B</th>
                                                                    <th style="width:80px !important">Anti-AB</th>
                                                                    <th style="width:80px !important">A Cells</th>
                                                                    <th style="width:80px !important">B Cells</th>
                                                                    <th style="width:80px !important">O Cells</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="row" style="margin-top:5px">
                                                        <div class="col-md-5" align="left">
                                                            Blood Group (กาชาด) :<font color="red">
                                                                <b>&nbsp;<label id="bloodgroupcross" for="bloodgroupcross"></label>&nbsp;</b>
                                                                <input type="hidden" id="bgcross" name="bgcross" value="">
                                                            </font>
                                                        </div>

                                                        <div class="col-md-3" align="right">
                                                            <font color="red">Confirm Blood Group</font> :
                                                        </div>

                                                        <div class="col-md-3" align="left">
                                                            <select id="bloodgroupinvest" required onchange="checkBloodGroup2(this.value,this)" name="bloodgroupinvest" class="form-control"></select>
                                                        </div>

                                                        <div class="col-md-1" align="left">
                                                            <a role="button" href="#" onclick="showBloodBlankModal()" style="margin-top:0px" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span><i class="fa fa-calendar-o" aria-hidden="true"></i></a>
                                                        </div>

                                                    </div>




                                                </div>

                                                <div class="form-group col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <br />
                                                        </div>

                                                    </div>

                                                    <div class="table-no-scroll">
                                                        <table class="main-table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:80px !important">Anti-A1
                                                                    </th>
                                                                    <th style="width:80px !important">Anti-H
                                                                    </th>
                                                                    <th style="width:80px !important">A2cells
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="td-table">
                                                                        <select id="anti-a1" name="antia1" class="form-control"></select>
                                                                    </td>
                                                                    <td class="td-table">
                                                                        <select id="anti-h" name="antih" class="form-control"></select>
                                                                    </td>
                                                                    <td class="td-table">
                                                                        <select id="a2cells" name="a2cells" class="form-control"></select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="row vertical-bottom">
                                                        <div class="col-md-6 padding-top-top15">
                                                            ตารางหมู่โลหิต Rh
                                                        </div>

                                                    </div>

                                                    <div class="table-s-scroll">
                                                        <table id="list_table_rh">
                                                            <thead>
                                                                <tr>
                                                                    <th>Reagent</th>
                                                                    <th style="width:160px">RT</th>
                                                                    <th style="width:160px">37C</th>
                                                                    <th style="width:160px">IAT</th>
                                                                    <th style="width:160px">CCC</th>
                                                                    <th style="width:160px">Result</th>
                                                                    <th style="width:40px">
                                                                        <button type="button" onclick="addRhTest()" class="btn btn-info btn-sm">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="row" style="margin-top:5px">
                                                        <div class="col-md-8">
                                                            Rh (กาชาด) :<font color="red">
                                                                <b>&nbsp;<label id="rhcross" for="rhcross"></label>&nbsp;</b>
                                                            </font>
                                                        </div>

                                                        <div class="col-md-4" align="left">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    Rh :
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <select id="bloodrhinvest" name="bloodrhinvest" class="form-control"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group col-md-8">
                                                    <div class="row vertical-bottom ">
                                                        <div class="col-md-2">
                                                            <div class="row">

                                                                <div class="padding-top-top15">
                                                                    &nbsp;&nbsp;&nbsp;Antibody Screening test
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div class="row">
                                                                <div class="padding-top-top15">
                                                                    <input type="checkbox" onclick="require_tube()" id="tubeantibodyscreeningtest" name="tubeantibodyscreeningtest" value="1">
                                                                    <label>Tube</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div class="row">
                                                                <div class="padding-top-top15">
                                                                    <i id="required1" hidden class="fa fa-star" style="color:red"></i><label>&nbsp;วันที่ตรวจ</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="row">
                                                                <div class="padding-top-top15">
                                                                    <input id="dateantibodyscreeningtest" name="dateantibodyscreeningtest" type="text" autocomplete="off" class="form-control date1" value="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div class="row">
                                                                <div class="padding-top-top15">
                                                                    <i id="required2" hidden class="fa fa-star" style="color:red"></i><label>&nbsp;ผู้ตรวจ</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="padding-top-top15">
                                                                    <select id="staffantibodyscreeningtest" name="staffantibodyscreeningtest" class="form-control">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        $strSQL = "SELECT * FROM staff ORDER BY id ASC";
                                                                        $objQuery = mysql_query($strSQL);
                                                                        while ($objResuut = mysql_fetch_array($objQuery)) {
                                                                        ?>
                                                                            <option value="<?php echo $objResuut['id']; ?>">
                                                                                <?php echo $objResuut["name"] ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="table-s-scroll">
                                                        <table id="list_table_anti_sceen" class="main-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Test</th>
                                                                    <th style="width:100px">P1Mi(a+)</th>
                                                                    <th style="width:80px">O1</th>
                                                                    <th style="width:80px">O2</th>
                                                                    <th style="width:80px">O3</th>
                                                                    <th style="width:120px">Lotno</th>
                                                                    <th style="width:40px">
                                                                        <button type="button" onclick="addAntiSceeningTest()" class="btn btn-info btn-sm">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>

                                                        </table>
                                                    </div>


                                                    <div class="row" style="margin-top:5px">
                                                        <div class="col-md-8">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    ผล Antibody Screening (กาชาด) :
                                                                    <font color="red">
                                                                        <b>&nbsp;<label id="bloodrhsceencross" for="bloodrhsceencross"></label>&nbsp;</b>
                                                                    </font>
                                                                </div>
                                                                S<div class="col-md-1">
                                                                    <input style="padding-left:0px;padding-right:0px;text-align:center;" readonly id="bloodrhsceen_cross_s" class="form-control" />
                                                                </div>
                                                                P<div class="col-md-1">
                                                                    <input style="padding-left:0px;padding-right:0px;text-align:center;" readonly id="bloodrhsceen_cross_p" class="form-control" />
                                                                </div>
                                                                C<div class="col-md-1">
                                                                    <input style="padding-left:0px;padding-right:0px;text-align:center;" readonly id="bloodrhsceen_cross_c" class="form-control" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" align="right">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    Result :
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <select id="bloodrhsceen" name="bloodrhsceen" class="form-control"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="form-group col-md-4">
                                                    <div class="row">

                                                        <div class="col-md-12" align="right">
                                                            <font color="#fff">
                                                                <b>&nbsp;<label id="bloodgroup" for="bloodgroup">A</label>&nbsp;</b>
                                                            </font>
                                                        </div>
                                                    </div>
                                                    <div class="table-no-scroll" style="margin-top:12px">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="4">DAT</th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:25%">Poly</th>
                                                                    <th style="width:25%">IgG</th>
                                                                    <th style="width:25%">C3d</th>
                                                                    <th style="width:25%">CCC</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="td-table">
                                                                        <select id="dat_poly" name="dat_poly" class="form-control"></select>
                                                                    </td>
                                                                    <td class="td-table">
                                                                        <select id="dat_igg" name="dat_igg" class="form-control"></select>
                                                                    </td>
                                                                    <td class="td-table">
                                                                        <select id="dat_c3d" name="dat_c3d" class="form-control"></select>
                                                                    </td>
                                                                    <td class="td-table">
                                                                        <select id="dat_ccc" name="dat_ccc" class="form-control"></select>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <br />
                                                    <label class="form-check-label">
                                                        &emsp;<input class="check2" type="checkbox" onclick="gotoAntibody()" id="rouleaux" name="rouleaux" value="1">&nbsp;<b>Rouleaux formation</b>
                                                        <input type="hidden" id="ROU" name="ROU" value="">
                                                    </label>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="row vertical-bottom">
                                                        <div class="col-md-12">
                                                            <div class="row">

                                                                <div class="padding-top-top15">
                                                                    &nbsp;&nbsp;&nbsp;Antibody identification test
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="table-s-scroll">
                                                        <table id="list_table_anti_iden" style="margin-bottom:0px">
                                                            <thead>
                                                                <tr>
                                                                    <th>Test</th>
                                                                    <th>1</th>
                                                                    <th>2</th>
                                                                    <th>3</th>
                                                                    <th>4</th>
                                                                    <th>5</th>
                                                                    <th>6</th>
                                                                    <th>7</th>
                                                                    <th>8</th>
                                                                    <th>9</th>
                                                                    <th>10</th>
                                                                    <th>11</th>
                                                                    <th>Auto</th>
                                                                    <th style="width:120px">Lotno</th>
                                                                    <th style="width:40px">
                                                                        <button type="button" onclick="addAntiIdenTest()" class="btn btn-info btn-sm">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>

                                                        </table>
                                                    </div>

                                                </div>


                                                <div class="col-md-8">
                                                    <div class="form-group col-md-12">
                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <label class="form-check-label">
                                                                &emsp;<input class="check2" type="checkbox" id="istube" name="istube" value="1">&nbsp;เจาะ Tube เพิ่ม
                                                            </label>
                                                            &emsp;&emsp;
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="form-check-label">
                                                                    EDTA
                                                                </label>
                                                                <input type="number" autocomplete="off" value="" class="form-control" id="blood_invest_tube_edta" name="blood_invest_tube_edta">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-check-label">
                                                                    Clotted
                                                                </label>
                                                                <input type="number" autocomplete="off" value="" class="form-control" id="blood_invest_tube_clotted" name="blood_invest_tube_clotted">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label class="form-check-label">
                                                                    ACD
                                                                </label>
                                                                <input type="number" autocomplete="off" value="" class="form-control" id="blood_invest_tube_acd" name="blood_invest_tube_acd">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label for="inputEmail4">Antibody</label>
                                                        <div class="col-md-12 div-anti">
                                                            <label id="antibodyLable" style="color: blue;">
                                                                <div id="douvalue"></div>
                                                            </label>
                                                        </div>
                                                        <input hidden type="text" autocomplete="off" value="" class="form-control" id="antibody" name="antibody">
                                                        <input hidden type="text" autocomplete="off" value="" class="form-control" id="patientantibodyall" name="patientantibodyall">
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label for="inputEmail4">Phenotype</label>
                                                        <div class="col-md-12 div-anti">
                                                            <label id="phenotypeLable" style="color: blue;"></label>
                                                        </div>
                                                        <input hidden type="text" autocomplete="off" value="" class="form-control" id="phenotype" name="phenotype">
                                                        <input hidden type="text" autocomplete="off" value="" class="form-control" id="phenotypeshow" name="phenotypeshow">
                                                        <input hidden type="text" autocomplete="off" value="" class="form-control" id="patientphenotypeall" name="patientphenotypeall">
                                                    </div>
                                                    <div class="form-group col-md-12">

                                                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                            <label class="form-check-label">
                                                                <input class="check2" type="checkbox" id="isblood_invest_remark" name="isblood_invest_remark" value="1">&nbsp;หมายเหตุ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font-size: 14px;">*ติ๊กถูกเพื่อให้แสดงหมายเหตุในประวัติการบริจาคโลหิต</label>
                                                            </label>
                                                            &emsp;&emsp;

                                                        </div>
                                                        <input type="text" autocomplete="off" value="" class="form-control" id="blood_invest_remark" name="blood_invest_remark">
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group col-md-12">
                                                        <br /><br /><br /><br /><br /><br />
                                                        <a role="button" onclick="antibodyModal()" style="margin-top:0px" href="#" class="btn btn-primary" onclick=""><span class="btn-label"><i class="fa fa-check"></i></span>Antibody
                                                            and
                                                            Phenotype</a>
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <!-- <label for="inputEmail4">Other</label>
                                                    <input type="text" autocomplete="off" value="" class="form-control"
                                                        id="blood_invest_other" name="blood_invest_other"> -->
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <!-- <br />
                                                    <div class="form-group row">
                                                        &nbsp;&nbsp;<label class="form-check-label">
                                                            <input type="checkbox" value="1" id="rouleaux"
                                                                name="rouleaux">&nbsp;&nbsp;Rouleaux formation
                                                        </label>
                                                    </div> -->
                                                    </div>

                                                </div>


                                            </div>
                                    </div>
                                </div> <!-- endcard-->

                            </div>


                        </div>


                        <div class="div-save">
                            <div class="save-bottom">
                                <div class="form-group text-right m-b-0">
                                    <?php if (checkPermission("BK_BLOOD_RESULT", "ED")) { ?>
                                        <button class="btn btn-primary" type="submit">
                                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                        </button>
                                    <?php } ?>
                                    <!-- <button type="button" onclick="resetPage()" class="btn btn-warning m-l-5">
									<span class="btn-label"><i class="fa fa-refresh"></i></span>รีเฟซ
								</button> -->

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
            <?php include('blood-investigate-modal.php'); ?>
            <?php include('blood-investigate-bloodgroup-modal.php'); ?>
            <?php include 'blood-blank-modal.php'; ?>
            <?php include 'footer.php'; ?>
        <?php } else {

        header('Location:index.php');
    }

        ?>

        </div>
        <!-- END main -->

        <script src="assets/js/modernizr.min.js?ref=<?php echo rand(); ?>"></script>
        <!-- <script src="assets/js/jquery.min.js"></script> -->
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
        <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/blood-investigate.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/blood-investigate-event.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/sweetalert/sweetalert.js?ref=<?php echo rand(); ?>"></script>
        <script src="assets/sweetalert/sweetalert.min.js?ref=<?php echo rand(); ?>"></script>
        <!-- App js -->
        <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>



        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>

        <script src="assets/js/antibody-phenotype-event.js?ref=<?php echo rand(); ?>"></script>
        <!-- <script src="assets/js/bloodstock.js"></script> -->
        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		
            $(document).ready(function() {

                $("#barcode").on('keydown', function(e) {
                    if (e.which == 13) {
                        loadTable('search');

                        $("#barcode").val("");
                        document.getElementById("barcode").focus();
                    }
                });

                $("#bloodgroupinvest").select2({
                    width: "100%",
                    theme: "bootstrap",
                    templateResult: function(state) {
                        if (!state.id) {
                            return state.text;
                        }

                        var strState = state.text.split("|");

                        var $state = $(
                            '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                        );
                        return $state;
                    },
                    templateSelection: function(state) {
                        if (!state.id) {
                            return state.text;
                        }

                        var strState = state.text.split("|");

                        var $state = $(
                            '<span >' + strState[0] + '</span>'
                        );
                        return $state;
                    },
                });

                $('#staffantibodyscreeningtest').select2();

                $("#bloodrhinvest").select2({
                    width: "100%",
                    theme: "bootstrap",
                    templateResult: function(state) {
                        if (!state.id) {
                            return state.text;
                        }

                        var strState = state.text.split("|");

                        var $state = $(
                            '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                        );
                        return $state;
                    },
                    templateSelection: function(state) {
                        if (!state.id) {
                            return state.text;
                        }

                        var strState = state.text.split("|");

                        var $state = $(
                            '<span >' + strState[0] + '</span>'
                        );
                        return $state;
                    },
                });

                dateBE(".date1");

                loadTable();

            });

            function addBloodBlank() {
                $("#blankModal").modal('show');

                var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
                while (body.firstChild) {
                    body.removeChild(body.firstChild);
                }

                setTimeout(function() {
                    document.getElementById("rfidscan").focus();
                }, 1000);

            }

            function showBloodBlankModal() {
                $("#bloodinvestBloodGroupModal").modal('show');
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
            loadPhenotype();

            var dou = 0;

            function gotoAntibody() {
                if (dou == 0) {
                    document.getElementById('antibodyLable').innerHTML = 'ROU';
                    $('#ROU').val('ROU');
                    dou++;
                } else {
                    document.getElementById('antibodyLable').innerHTML = '';
                    dou--;
                }
            }

            function require_tube() {
                var tubeantibodyscreeningtest = document.getElementById("tubeantibodyscreeningtest").checked;

                if (tubeantibodyscreeningtest == true) {
                    document.getElementById("dateantibodyscreeningtest").required = true;
                    document.getElementById("staffantibodyscreeningtest").required = true;
                    document.getElementById("required1").hidden = false;
                    document.getElementById("required2").hidden = false;
                    document.getElementById("dateantibodyscreeningtest").value = getDMY();
                    // getDMY

                } else {
                    document.getElementById("dateantibodyscreeningtest").required = false;
                    document.getElementById("staffantibodyscreeningtest").required = false;
                    document.getElementById("required1").hidden = true;
                    document.getElementById("required2").hidden = true;
                    document.getElementById("dateantibodyscreeningtest").value = "";
                }

                // alert(tubeantibodyscreeningtest);
            }

            function autoclick_tube() {
                var tubeantibodyscreeningtest = document.getElementById("tubeantibodyscreeningtest").checked;

                if (tubeantibodyscreeningtest == false) {
                    document.getElementById("tubeantibodyscreeningtest").checked = true;
                    document.getElementById("dateantibodyscreeningtest").required = true;
                    document.getElementById("staffantibodyscreeningtest").required = true;
                    document.getElementById("required1").hidden = false;
                    document.getElementById("required2").hidden = false;
                    document.getElementById("dateantibodyscreeningtest").value = getDMY();
                }
                // else {
                //     document.getElementById("tubeantibodyscreeningtest").checked = false;
                //     document.getElementById("dateantibodyscreeningtest").required = false;
                //     document.getElementById("staffantibodyscreeningtest").required = false;
                //     document.getElementById("required1").hidden = true;
                //     document.getElementById("required2").hidden = true;
                // }
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>