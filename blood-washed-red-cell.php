<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
    include('checkPermission.php');

    if (!checkPermission("BK_WA_RED_CELL", "VW")) {
        header('Location:not-permission.php');
    }

    require_once('connection.php');
    include('dateNow.php');


?>

    <?php

    date_default_timezone_set('Asia/Bangkok');


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <?php include 'include/title.php' ?>

        <title>บันทึกข้อมูลการทำ Washed Red Cell</title>
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
        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />


        <link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />


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

            .div-anti {
                background-color: #f8f9fa;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                height: 40px;
            }

            .font_patient {
                font-size: 20px;
            }

            #ui-datepicker-div {
                position: absolute !important;
            }

            input[type=radio] {
                border: 0px;
                width: 40px;
                height: 2em;
            }
        </style>
        <script>
            var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
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
        <div class="myAlert-top-delete alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> ยกเลิกข้อมูลสำเร็จ
        </div>
        <div class="myAlert-top-error-delete alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> ยกเลิกข้อมูลล้มเหลว
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
                                    <h1 class="main-title float-left"> บันทึกข้อมูลการทำ Washed Red Cell</h1>
                                    <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <form role="form" id="myform" method="POST" action="" enctype="multipart/form-data">


                            <div hidden id="datatest">
                                patientid<input id="patientid" name="patientid" type="text">
                                bloodwashedredcellid<input id="bloodwashedredcellid" name="bloodwashedredcellid" type="text">
                                hn<input id="hn" name="hn" type="text">
                                washedredbloodcell<input value="1" id="washedredbloodcell" name="washedredbloodcell" type="text">
                                requestbloodid<input id="requestbloodid" name="requestbloodid" type="text">
                            </div>


                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">HN</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="scanhn" class="form-control" id="scanhn" onkeyup="setNewHN(this)" placeholder="" autofocus onkeyup="setNewHN(this)">
                                </div>
                                <div hidden class="form-group col-md-2">
                                    <label for="inputCity">&nbsp;</label>
                                    <div>
                                        <a role="button" href="#" class="btn btn-primary" onclick="requestBloodModalShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ดูตรวจประวัติการขอเลือด</a>
                                    </div>
                                </div>
                                <div hidden class="form-group col-md-3">
                                    <label for="inputCity">&nbsp;</label>
                                    <div>
                                        <a role="button" href="#" class="btn btn-primary" onclick="washBloodModalShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ดูตรวจประวัติการ Washed Red Cell</a>
                                    </div>
                                </div>
                            </div>


                            <p>
                            <div class="row" style="margin-bottom: -30px;margin-top: -20px;">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <img id="img_profile" src="assets/images/profile.png" class="img-profile" alt="Smiley face" height="170" width="160"><br />
                                        <label class="label-name-blod-icon"><i class="fa fa-tint"></label></i><label>&nbsp;&nbsp;Bl.Gr. </label>
                                        &nbsp;&nbsp;<label id="patientbloodgroup" class="label-name-bloodgroup">-</label>
                                    </div>
                                </div>

                                <div hidden class="form-group col-md-1">
                                    <label>WT -</label><br>
                                    <label>BT -</label><br>
                                    <label>HR -</label><br>
                                    <label>Temp. -</label><br>
                                    <label>BMI -</label><br>
                                    <label>LOS - Days</label><br>
                                </div>
                                <div hidden class="form-group col-md-1">
                                    <label>HT -</label><br>
                                    <label></label><br>
                                    <label>RR -</label><br>
                                    <label>Pain -</label><br>
                                    <label>BSA -</label><br>
                                </div>
                                <div class="form-group col-md-3 font_patient">
                                    <label>HN</label> <label id="patienthn" class="label-name">-</label><br>
                                    <label>AN</label> <label id="patientan" class="label-name">-</label><br>
                                    <label>ID</label> <label id="patientidcard" class="label-name">-</label><br>
                                    <label>ประเภทผู้ป่วย <label id="patient_type" class="label-name">-</label></label><br>

                                </div>
                                <div class="form-group col-md-6 font_patient">
                                    <label>ชื่อ-นามสกุล</label> <label class="label-name" id="patientfullname">-</label><br>
                                    <label>อายุ</label> <label id="patientage" class="label-name">-</label>
                                    <label>ปี</label><br>
                                    <label>เพศ</label> <label id="patientgender" class="label-name">-</label><br>
                                    <label>สิทธิการรักษา </label> <label id="patientinsurance" class="label-name">-</label><br>
                                </div>
                            </div>

                    </div>
                    </p>

                    <div class="row" style="margin-left:10px">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">หมายเลขถุง</label>
                            <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                            <input type="text" autocomplete="off" class="form-control" id="bgnum" name="bgnum" onkeyup="scanNumber(this)" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="table-s-scroll">

                            <table hidden id="list_wash_blood_modalzz">
                                <thead>
                                    <tr>
                                        <th>วันที่ต้องใช้</th>
                                        <th>หน่วยงานที่ขอเลือด</th>
                                        <th>แพทย์ผู้สั่ง</th>
                                        <th>ถุงเลือด</th>
                                        <th>Blood Group</th>
                                        <th>Rh</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="wash_data">

                                </tbody>
                            </table>

                            <table id="list_wash_blood_modal">
                                <thead>
                                    <tr>
                                        <th>CK</th>
                                        <th>Reject</th>
                                        <th>วันที่ใช้เลือด</th>
                                        <th>หน่วยงานที่ขอเลือด</th>
                                        <th>แพทย์ผู้สั่ง</th>
                                        <th>ชนิดเลือด</th>
                                        <th>หมายเลขถุง</th>
                                        <th>วันที่ washed</th>
                                        <th>เจ้าหน้าที่ washed</th>
                                        <th>หมายเหตุ</th>
                                        <th>พิมพ์</th>
                                    </tr>
                                </thead>
                                <tbody id="wash_data_2">

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row" style="margin-right: 0px;margin-left: 0px;">
                        <div class="col-8">
                            <div class="col-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fa fa-check-square-o"></i> รายละเอียดการ Washed Red Cell</h3>

                                    </div>

                                    <div class="card-body" style="margin-bottom: -40px;">


                                        <fieldset class="form-group">

                                            <div class="row">

                                                <div class="form-group col-md-3"><label>Diagnosis</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="diagnosis" name="diagnosis">
                                                </div>

                                                <div class="form-group col-md-3"><label>-</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="diagnosisdetail" name="diagnosisdetail">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">หน่วยงานที่สั่งทำ</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="unitofficename" name="unitofficename">
                                                    <input hidden type="text" autocomplete="off" value="" class="form-control" id="unitofficeid" name="unitofficeid">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">ผู้สั่งทำ</label>
                                                    <input hidden type="text" autocomplete="off" value="" class="form-control" id="user_order" name="user_order">
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="doctorname" name="doctorname">
                                                </div>


                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="card-header">
                                        <h3><i class="fa fa-check-square-o"></i> รายละเอียดเพิ่มเติม</h3>

                                    </div>
                                    <div class="card-body" style="margin-bottom: -40px;">
                                        <fieldset class="form-group">

                                            <div class="row">

                                                <div class="form-group col-md-3">
                                                    <label for="inputEmail4">นัดรับเลือดวันที่</label>
                                                    <input type="text" readonly autocomplete="off" class="form-control" id="blood_wash_use_date" value="" name="blood_wash_use_date">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4">เวลา</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="bloodwash_round" name="bloodwash_round">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4">ปริมาณ (unit)</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="bloodwash_unit" name="bloodwash_unit">
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4">ปริมาณ (ml)</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="bloodwash_ml" name="bloodwash_ml">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4">ความเข้มข้น %</label>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="bloodwash_intense" name="bloodwash_intense">
                                                </div>


                                            </div>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>

                            <div id="div_recode_washed_red_cell" class="col-12" style="padding-left: 0px;padding-right: 0px;display:none;">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fa fa-check-square-o"></i> บันทึกผล Washed Red Cell</h3>

                                    </div>

                                    <div class="card-body">


                                        <fieldset class="form-group">

                                            <div class="row">

                                                <input hidden type="text" id="ckwash" name="ckwash">

                                                <div hidden class="form-group col-md-1">
                                                    <label for="inputEmail4">วันที่ทำ</label>
                                                    <input type="text" autocomplete="off" value="<?php echo dateNowDMY(); ?>" class="form-control date1" id="datenow" name="datenow">
                                                </div>

                                                <div hidden class="form-group col-md-1">
                                                    <label for="inputEmail4">เวลาที่ทำ</label>
                                                    <input type="text" autocomplete="off" value="<?php echo date('H:i'); ?>" class="form-control " id="timenow" name="timenow">
                                                </div>

                                                <div class="form-group col-md-3"><label>0.9% NSS(IV) (ขวด) </label>
                                                    <input type="text" autocomplete="off" value="" class="form-control" id="nss" name="nss">
                                                </div>


                                                <div class="form-group col-sm-1">
                                                    <div style="margin-top: 29px;">
                                                        <a role="button" href="#" class="btn btn-primary" onclick="lot()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>เลขLot</a>
                                                    </div>
                                                </div>




                                                <div class="table-no-scroll">
                                                    <table id="list_table_anti_iden" style=" margin-bottom:0px;">
                                                        <thead>
                                                            <tr>
                                                                <th>CBC</th>
                                                                <th>Hb</th>
                                                                <th>Hct</th>
                                                                <th>Plt</th>
                                                                <th>RBC</th>
                                                                <th>MCV</th>
                                                                <th>WBC</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th style="width:100px">PRE</th>
                                                                <!-- HB -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="hb_before" name="hb_before" style="color:#dc3545;">
                                                                </th>
                                                                <!-- HB -->

                                                                <!-- HCT -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="hct_before" name="hct_before" style="color:#dc3545;">
                                                                </th>
                                                                <!-- HCT -->

                                                                <!-- PLT -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="plt_before" name="plt_before" style="color:#dc3545;">
                                                                </th>
                                                                <!-- PLT -->

                                                                <!-- RBC -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="rbc_before" name="rbc_before" style="color:#dc3545;">
                                                                </th>
                                                                <!-- RBC -->

                                                                <!-- MCV -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="mcv_before" name="mcv_before" style="color:#dc3545;">
                                                                </th>
                                                                <!-- MCV -->

                                                                <!-- WBC -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="wbc_before" name="wbc_before">
                                                                </th>
                                                                <!-- WBC -->
                                                            </tr>
                                                            <tr>
                                                                <th style="width:100px">POST</th>
                                                                <!-- HB -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="hb_after" name="hb_after" style="color:#dc3545;">
                                                                </th>
                                                                <!-- HB -->

                                                                <!-- HCT -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="hct_after" name="hct_after" style="color:#dc3545;">
                                                                </th>
                                                                <!-- HCT -->

                                                                <!-- PLT -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="plt_after" name="plt_after">
                                                                </th>
                                                                <!-- PLT -->

                                                                <!-- RBC -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="rbc_after" name="rbc_after" style="color:#dc3545;">
                                                                </th>
                                                                <!-- RBC -->

                                                                <!-- MCV -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="mcv_after" name="mcv_after" style="color:#dc3545;">
                                                                </th>
                                                                <!-- MCV -->

                                                                <!-- WBC -->
                                                                <th class="td-table">
                                                                    <input type="number" step="any" autocomplete="off" value="" class="form-control" id="wbc_after" name="wbc_after" style="color:#dc3545;">
                                                                </th>
                                                                <!-- WBC -->
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>



                                            </div>

                                        </fieldset>



                                    </div>
                                </div><!-- end card-->
                            </div>


                            <div class="col-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="card mb-3">

                                    <div class="card-body">


                                        <fieldset class="form-group">

                                            <div class="row">

                                                <div class="form-group col-md-12"><label>หมายเหตุ</label>
                                                    <textarea id="remark" name="remark" class="form-control"></textarea>
                                                </div>

                                                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />



                                            </div>

                                        </fieldset>



                                    </div>
                                </div><!-- end card-->
                            </div>
                        </div>


                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="col-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fa fa-check-square-o"></i>ผู้ทำรายการ wash</h3>

                                    </div>

                                    <div class="card-body" style="background: bisque;">


                                        <fieldset class="form-group">

                                            <div class="row">

                                                <!-- ติ๊กพนักงานนนน -->

                                                <div id="div_ck_1_1" class="form-group col-md-6">
                                                    <input type="checkbox" id="checkbox1" name="checkbox1" value="1" onclick="chkbox1()">
                                                    <label>เจ้าหน้าที่ส่งทำ wash</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_send_wash1" name="user_send_wash1">
                                                    <div id="user_send_wash2" hidden>
                                                        <select id="user_send_wash" class="form-control form-control-sm user_send_wash" name="user_send_wash"></select>
                                                    </div>
                                                </div>

                                                <div id="div_ck_1_2" class="form-group col-md-6">
                                                    <label>วันที่/เวลาส่ง</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_send_wash_date" name="user_send_wash_date">
                                                </div>

                                                <div id="div_ck_2_1" style="display:none;" class="form-group col-md-6">
                                                    <input type="checkbox" id="checkbox2" name="checkbox2" value="1" onclick="chkbox2()">
                                                    <label>เจ้าหน้าที่รับ wash</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_receive_wash1" name="user_receive_wash1">
                                                    <div id="user_receive_wash2" hidden>
                                                        <select id="user_receive_wash" class="form-control form-control-sm user_receive_wash" name="user_receive_wash"></select>
                                                    </div>
                                                </div>

                                                <div id="div_ck_2_2" style="display:none;" class="form-group col-md-6">
                                                    <label>วันที่/เวลารับ</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_receive_wash_date" name="user_receive_wash_date">
                                                </div>

                                                <div id="div_ck_3_1" style="display:none;" class="form-group col-md-6">
                                                    <input type="checkbox" id="checkbox3" name="checkbox3" value="1" onclick="chkbox3()">
                                                    <label>เจ้าหน้าที่ทำ wash</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_done_wash1" name="user_done_wash1">
                                                    <div id="user_done_wash2" hidden>
                                                        <select id="user_done_wash" class="form-control form-control-sm user_done_wash" name="user_done_wash"></select>
                                                    </div>
                                                </div>

                                                <div id="div_ck_3_2" style="display:none;" class="form-group col-md-6">
                                                    <label>วันที่/เวลาทำ</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_done_wash_date" name="user_done_wash_date">
                                                </div>




                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div id="div_return" class="col-12" style="padding-left: 0px;padding-right: 0px;display:none;">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fa fa-check-square-o"></i>ผู้ทำรายการส่งกลับ-รับคืน</h3>

                                    </div>

                                    <div class="card-body" style="background: bisque;">


                                        <fieldset class="form-group">

                                            <div class="row">

                                                <div id="div_ck_4_1" style="display:none;" class="form-group col-md-6">
                                                    <input type="checkbox" id="checkbox4" name="checkbox4" value="1" onclick="chkbox4()">
                                                    <label>เจ้าหน้าที่ส่งกลับถุงเลือด</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_send_washed1" name="user_send_washed1">
                                                    <div id="user_send_washed2" hidden>
                                                        <select id="user_send_washed" class="form-control form-control-sm user_send_washed" name="user_send_washed"></select>
                                                    </div>
                                                </div>

                                                <div id="div_ck_4_2" style="display:none;" class="form-group col-md-6">
                                                    <label>วันที่/เวลาส่ง</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_send_washed_date" name="user_send_washed_date">
                                                </div>

                                                <div id="div_ck_5_1" style="display:none;" class="form-group col-md-6">
                                                    <input type="checkbox" id="checkbox5" name="checkbox5" value="1" onclick="chkbox5()">
                                                    <label>เจ้าหน้าที่รับถุงเลือดคืน </label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_get_bag_washed1" name="user_get_bag_washed1">
                                                    <div id="user_get_bag_washed2" hidden>
                                                        <select id="user_get_bag_washed" class="form-control form-control-sm user_get_bag_washed" name="user_get_bag_washed"></select>
                                                    </div>
                                                </div>

                                                <div id="div_ck_5_2" style="display:none;" class="form-group col-md-6">
                                                    <label>วันที่/เวลาส่ง</label> <br>
                                                    <input readonly type="text" autocomplete="off" value="" class="form-control" id="user_get_bag_washed_date" name="user_get_bag_washed_date">
                                                </div>

                                                <div class="form-group col-md-12"><label>หมายเหตุ</label>
                                                    <textarea id="remarkreturn" name="remarkreturn" class="form-control"></textarea>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>


                            <div id="div_appointment" class="col-12" style="padding-left: 0px;padding-right: 0px;display:none;">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fa fa-check-square-o"></i>นัดหมาย</h3>

                                    </div>

                                    <div class="card-body">


                                        <fieldset class="form-group">

                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">นัดหมายครั้งต่อไป</label>
                                                    <input type="text" name="appointment" autocomplete="off" class="form-control date1" id="appointment">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">ระบุการนัดหมาย</label>
                                                    <input type="text" name="appoittext" class="form-control" id="appoittext" value="">
                                                </div>


                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="div-save">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <div>
                                <button hidden class="btn btn-danger">
                                    <span class="btn-label"><i class="fa fa-save"></i></span>ยกเลิก
                                </button>
                                <button class="btn btn-primary" type="submit">
                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                </button>
                                <button hidden onclick="Print_wash_red_cell()" id="reportPrintPdf" class="btn btn-success" type="button">
                                    <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                </button>
                                <button hidden type="button" onclick="newBloodLetting()" class="btn btn-success m-l-5">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
                <?php include('blood-washed-red-cell-modal-hn.php'); ?>
                <?php include('blood-washed-red-cell-modal-nss.php'); ?>
                <!-- END content-page -->
                <?php include('formprint.php'); ?>
                <?php include 'footer.php'; ?>
            <?php } else {

            header('Location:index.php');
        }

            ?>

            </div>
            <!-- END main -->

            <script language="JavaScript">



            </script>
            <script src="assets/js/modernizr.min.js"></script>
            <script src="assets/plugins/jquery-ui/jquery.js"></script>
            <script src="assets/js/moment.min.js"></script>

            <script src="assets/js/popper.min.js"></script>


            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/jquery.nicescroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="assets/plugins/switchery/switchery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>

            <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
            <script src="assets/sweetalert/sweetalert.js"></script>
            <script src="assets/sweetalert/sweetalert.min.js"></script>
            <script src="assets/js/datepickerFormat.js"></script>
            <script src="assets/js/spinner.js"></script>
            <script src="assets/js/menu.js"></script>
            <!-- App js -->
            <script src="assets/js/pikeadmin.js"></script>

            <script src="assets/js/EnterNext.js"></script>
            <script src="assets/js/FindData.js"></script>
            <script src="assets/js/DateTimeFormat.js"></script>
            <script src="assets/js/Replace.js"></script>
            <script src="assets/printJS/print.min.js"></script>


            <!-- ดูฟังชั่น ตรงนี้ -->
            <script src="assets/js/custom/washed-red-cel/washed-red-cel-select.js"></script>
            <script src="assets/js/custom/washed-red-cel/washed-red-cel-loadtable.js"></script>
            <script src="assets/js/custom/washed-red-cel/washed-red-cel-event.js"></script>

            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                var countReq = 0;
                var countReq_2 = 0;
                var count_cross = 0;
                var count_wash_data = 0;
                $(document).ready(function() {
                    dateBE('.date1');
                    $('#myform').submit(function() {

                        if (document.getElementById('patientid').value == "") {
                            swal({
                                    title: "กรุณาระบุผู้ป่วยก่อน",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        document.getElementById('scanhn').focus;
                                    }
                                });

                            return false;
                        }

                        var data = getFormData($("#myform"));
                        console.log(data);
                        // alert('ggghh');
                        spinnershow();

                        $.ajax({
                            type: 'POST',
                            url: 'blood-washed-red-cell-save.php',
                            data: data,
                            dataType: "json",
                            complete: function() {
                                var delayInMilliseconds = 200;
                                setTimeout(function() {
                                    spinnerhide();
                                }, delayInMilliseconds);
                            },
                            success: function(data) {

                                // alert(data.user_send_wash);

                                if (data.status) {
                                    count_wash_data = 0;
                                    myAlertTop();
                                    // loadTable(document.getElementById('hn').value, data.state);
                                    washBloodModalShow(true);

                                } else {
                                    myAlertTopError();
                                }

                                document.getElementById("bloodwashedredcellid").value = data
                                    .bloodwashedredcellid;


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


                });

                function newPage() {
                    window.location.href = 'blood-letting.php';
                }

                function myAlertTopDelete() {
                    $(".myAlert-top-delete").show();
                    setTimeout(function() {
                        $(".myAlert-top-delete").hide();
                    }, 5000);
                }

                function myAlertTopErrorDelete() {
                    $(".myAlert-top-error-delete").show();
                    setTimeout(function() {
                        $(".myAlert-top-error-delete").hide();
                    }, 5000);
                }

                function requestBloodModalClose() {
                    $("#requestbloodmodal").modal('hide');
                    $("#requestbloodmodal_status").modal('hide');
                    $("#washBloodModalShow").modal('hide');
                }

                function requestBloodModalShow() {
                    $("#requestbloodmodal").modal('show');
                    loadTableReq();
                }

                function loadTableReq() {

                    var body = document.getElementById("table_blood_washed_red_cell").getElementsByTagName('tbody')[0];
                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }

                    var body = document.getElementById("list_wash_blood_modal").getElementsByTagName('tbody')[0];
                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }


                    var hn = document.getElementById("hn").value;
                    var washedredbloodcell = document.getElementById("washedredbloodcell").value;
                    $.ajax({
                        // url: 'data/requestblood/requestblooddetail.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate,
                        url: 'data/requestblood/requestblooddetail.php?hn=' + hn + '&washedredbloodcell=' +
                            washedredbloodcell,
                        dataType: 'json',
                        type: 'get',
                        success: function(data) {

                            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(
                                /"\"\""/g, '""'));
                            countReq = obj.length;
                            var event_data = '';
                            $.each(obj, function(index, value) {

                                if (value.bloodnotificationtypeid == 2) {
                                    value.requestbloodstatusname = 'จ่ายเลือดด่วน O Adsol';
                                } else if (value.ispaybloodstatus == 1 && (!(value
                                        .requestbloodstatusid == 3 || value.requestbloodstatusid ==
                                        4)))
                                    value.requestbloodstatusname = 'จ่ายเลือดแล้ว';

                                var color = '#000';
                                if (value.requestbloodstatusid == 3 || value.requestbloodstatusid == 4)
                                    color = 'red';

                                event_data += '';
                                event_data += '<tr id="trbloodReq' + (index) +
                                    '" onClick="chActiveReq(' + (index) + ',this,' + value
                                    .requestbloodstatusid + ')" class="' + value.requestbloodid + '">';
                                event_data += '<td><font color="' + color + '">' + getDMY(value
                                        .requestblooddate) + ' ' + value.requestbloodtime +
                                    '</font></td>';
                                event_data += '<td><font color="' + color + '">' + value
                                    .unitofficename1 + '</font></td>';
                                event_data += '<td ><font color="' + color + '">' + value.doctorname +
                                    '</font></td>';
                                event_data += '<td><font color="' + color + '">' + value
                                    .bloodnotificationtypename + '</font></td>';
                                event_data += '<td><font color="' + color + '">' + getStatusBloodReq(
                                    value) + '</font></td>';
                                event_data += '<td>';
                                // event_data += value.requestbloodid;
                                if (value.isaddblood == 1) {
                                    event_data += '<button type="button" onclick="selectTableReq(' +
                                        value.requestbloodid + ')"  class="btn btn-success m-l-5">';
                                    event_data +=
                                        '<span class="btn-label"><i class="fa fa-search"></i></span>ดูข้อมูล';
                                    event_data += '</button>';
                                }

                                event_data += '</td>';
                                event_data += '<td  style="display:none;" >';
                                event_data += JSON.stringify(value);
                                event_data += '</td>';
                                event_data += '</tr>';

                            });
                            $("#table_blood_washed_red_cell").append(event_data);
                        },
                        error: function(d) {
                            /*console.log("error");*/
                            alert("404. Please wait until the File is Loaded.");
                        }
                    });
                    // settablecrossmatch();
                }

                function getStatusBloodReq(data) {

                    var status = '';

                    if (data.requestbloodstatusid == 1) {
                        status = 'รอรับสิ่งส่งตรวจ';
                    } else if (data.requestbloodstatusid == 2) {
                        status = 'รับสิ่งส่งตรวจแล้ว';

                        if (data.bloodnotificationtypeid == 2) {
                            status = 'จ่ายเลือดด่วน O Adsol';
                        } else if (data.wait_refund > 0) {
                            status = 'เกินวันที่ต้องการใช้เลือด';
                        } else if ((data.cross_qty - data.pay_success) > 0 && data.pay_success > 0) {
                            status = 'จ่ายเลือดบางส่วน';
                        } else if (data.ispaybloodstatus == 1) {
                            status = 'จ่ายเลือดแล้ว';
                        } else if (data.isreadybloodstatus == 1) {
                            status = 'รอจ่ายเลือด';
                        } else if (data.isconfirmbloodgroupqueue == 1) {
                            status = 'รอยืนยันการใช้เลือด';
                        } else if (data.iscrossmatch == 1) {
                            status = 'รอยืนยันผลเลือด';
                        }


                    } else if (data.requestbloodstatusid == 3) {
                        status = 'ปฏิเสธสิ่งส่งตรวจ';
                    } else if (data.requestbloodstatusid == 4) {
                        status = 'ยกเลิก';
                    }

                    return status;

                }

                function chActiveReq(id, self, status) {


                    for (i = 0; i < countReq; i++) {
                        document.getElementById("trbloodReq" + i).style.background = "#FFF";
                    }
                    document.getElementById("trbloodReq" + id).style.background = "#b7e4eb";
                    // var item = JSON.parse(self.cells[6].innerHTML);

                }

                var countid = 0;

                function chActiveReq_2(id, self, status) {

                    for (i = 0; i < countReq_2; i++) {
                        if (document.getElementById("trbloodReqx" + i))
                            document.getElementById("trbloodReqx" + i).style.background = "#FFF";
                    }
                    document.getElementById("trbloodReqx" + id).style.background = "#b7e4eb";
                    // var item = JSON.parse(self.cells[6].innerHTML);
                    countid = id;

                }

                function blood_color(record) {
                    var galleries = document.getElementsByClassName("tr_color_1");
                    var len = galleries.length;

                    for (var i = 0; i < len; i++) {
                        galleries[i].style.backgroundColor = "#FFF";
                    }
                    document.getElementById("tr_cross_req" + record).style.background = "#b7e4eb";
                    setdatatoinsert(record);
                }

                function selectTableReq(requestbloodid) {
                    document.getElementById("requestbloodid").value = requestbloodid;
                    washBloodModalShow();
                    requestBloodModalClose();
                }

                function cancelwash(record) {
                    var bag_number = document.getElementById("bag_number" + record).innerHTML;
                    $("#requestbloodmodal_status").modal('show');
                    document.getElementById("bag_number_where").value = bag_number;

                }

                function cancelwash_confirm() {
                    var bag_number = document.getElementById("bag_number_where").value;

                    var wash_status_remark = document.getElementById("wash_status_remark").value;

                    $.ajax({
                        url: 'data/washedredcell/updatecross_status.php?bag_number=' + bag_number +
                            '&wash_status_remark=' + wash_status_remark,
                        dataType: 'json',
                        type: 'get',
                        success: function(data) {
                            settablecrossmatch();
                            $("#requestbloodmodal_status").modal('hide');
                        },
                        error: function(d) {
                            /*console.log("error");*/
                            alert("404. Please wait until the File is Loaded.");
                        }
                    });
                }


                function setdatatoinsert(record) {
                    var bag_number = document.getElementById("bag_number" + record).innerHTML;
                    var bloodgroupid = document.getElementById("bloodgroupid" + record).innerHTML;
                    var rhid = document.getElementById("rhid" + record).innerHTML;
                    var rhname3 = document.getElementById("rhname3" + record).innerHTML;

                    var requestunit = document.getElementById("requestunit" + record).innerHTML;
                    var unitofficename = document.getElementById("unitofficename" + record).innerHTML;

                    var doctorid = document.getElementById("doctorid" + record).innerHTML;
                    var doctorname = document.getElementById("doctorname" + record).innerHTML;

                    var diagnosis = document.getElementById("diagnosis" + record).innerHTML;
                    var diagnosisdetail = document.getElementById("diagnosisdetail" + record).innerHTML;

                    var requestbloodtime = document.getElementById("requestbloodtime" + record).innerHTML;
                    var requestblooddate = document.getElementById("requestblooddate" + record).innerHTML;

                    // var patientid = document.getElementById("patientid" + record).innerHTML;

                    var hn = document.getElementById("hn").value;
                    var requestbloodid = document.getElementById("requestbloodid").value;


                    document.getElementById("blood_wash_use_date").value = requestblooddate + ' ' + requestbloodtime;



                    document.getElementById("diagnosis").value = diagnosis;
                    document.getElementById("diagnosisdetail").value = diagnosisdetail;

                    document.getElementById("unitofficeid").value = requestunit;
                    document.getElementById("unitofficename").value = unitofficename;


                    document.getElementById("user_order").value = doctorid;
                    document.getElementById("doctorname").value = doctorname;
                    // document.getElementById("blood_wash_use_date").value = patientid;
                }

                function washBloodModalShow(stateCk = false) {

                    var requestbloodid = document.getElementById("requestbloodid").value
                    $.ajax({
                        url: 'data/washedredcell/blood_wash_red_cell.php?requestbloodid=' + requestbloodid,
                        dataType: 'json',
                        type: 'get',
                        success: function(data) {
                            console.log(data.data);
                            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(
                                /"\"\""/g, '""'));
                            // var count = 0;
                            countReq_2 = obj.length;
                            event_data = '';
                            $.each(obj, function(index, value) {

                                var start_reject = "";
                                var end_reject = "";
                                if (value.ckwash == 2) {
                                    start_reject = '<s>';
                                    end_reject = '</s>';
                                }


                                event_data += '<tr id="trbloodReqx' + count_wash_data +
                                    '" onclick="showdatacount(' + count_wash_data +
                                    '); chActiveReq_2(' + count_wash_data + ');" >';
                                event_data += '<td class="td-table"  style="display:none;" >';
                                event_data += JSON.stringify(value);
                                event_data += '</td>';
                                event_data +=
                                    '<td><input type="radio" onclick="setCKwash(1,this.checked);uncheckBox(this)" id="ckwash' +
                                    count_wash_data + '" name="ckwash' + count_wash_data +
                                    '" value="1" ' + ((value.ckwash == '1') ? 'checked' : '') +
                                    '  "></td>';
                                event_data +=
                                    '<td><input type="radio" onclick="setCKwash(2,this.checked);uncheckBox(this)" id="ckwash_cn_' +
                                    count_wash_data + '" name="ckwash' + count_wash_data +
                                    '" value="2" ' + ((value.ckwash == '2') ? 'checked' : '') +
                                    '  "></td>';
                                event_data += '<td id="1blood_wash_use_date' + count_wash_data + '">' +
                                    start_reject + value.blood_wash_use_date_2 + end_reject + '</td>';
                                event_data += '<td id="1unitofficename' + count_wash_data + '">' +
                                    start_reject + value.unitofficename + end_reject + '</td>';
                                event_data += '<td id="1doctorname' + count_wash_data + '">' +
                                    start_reject + value.doctorname + end_reject + '</td>';
                                event_data += '<td id="1bloodtype' + count_wash_data + '">' +
                                    start_reject + value.bloodtype + end_reject + '</td>';
                                event_data += '<td id="1bag_number' + count_wash_data + '">' +
                                    start_reject + value.bag_number + end_reject + '</td>';

                                event_data += '<td id="1bloodwashedredcelldatetime' + count_wash_data +
                                    '">' + start_reject + getDMYHM(value.user_done_wash_date) +
                                    end_reject + '</td>';
                                event_data += '<td id="1usercreate' + count_wash_data + '">' +
                                    start_reject + value.user_done_wash + end_reject + '</td>';
                                event_data += '<td id="1remark' + count_wash_data + '">' + value
                                    .remark + '</td>'; //


                                event_data += '<td>';
                                event_data += '<button onclick="Print_wash_red_cell_full(' + value
                                    .bloodwashedredcellid +
                                    ')" type="button"  class="btn btn-success m-l-5">';
                                event_data +=
                                    '<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์';
                                event_data += '</button>&nbsp;&nbsp;';
                                event_data += '</td>';

                                event_data += '<td hidden id="1bloodgroupid' + count_wash_data + '">' +
                                    value.bloodgroupid + '</td>';
                                event_data += '<td hidden id="1rhname3' + count_wash_data + '">' + value
                                    .rhname3 + '</td>';
                                event_data += '<td hidden id="1bloodwashedredcellid' + count_wash_data +
                                    '">' + value.bloodwashedredcellid + '</td>'; //รหัส

                                event_data += '<td hidden id="1unitofficeid' + count_wash_data + '">' +
                                    value.unitofficeid + '</td>'; //ชื่อหน่วยงาน
                                event_data += '<td hidden id="1rhid' + count_wash_data + '">' + value
                                    .rhid + '</td>'; //
                                event_data += '<td hidden id="1diagnosis' + count_wash_data + '">' +
                                    value.diagnosis + '</td>'; //
                                event_data += '<td hidden id="1diagnosisdetail' + count_wash_data +
                                    '">' + value.diagnosisdetail + '</td>'; //
                                event_data += '<td hidden id="1cc' + count_wash_data + '">' + value.cc +
                                    '</td>'; //
                                event_data += '<td hidden id="1qty' + count_wash_data + '">' + value
                                    .qty + '</td>'; //
                                event_data += '<td hidden id="1hb_before' + count_wash_data + '">' +
                                    value.hb_before + '</td>'; //
                                event_data += '<td hidden id="1hb_after' + count_wash_data + '">' +
                                    value.hb_after + '</td>'; //
                                event_data += '<td hidden id="1hct_before' + count_wash_data + '">' +
                                    value.hct_before + '</td>'; //
                                event_data += '<td hidden id="1hct_after' + count_wash_data + '">' +
                                    value.hct_after + '</td>'; //
                                event_data += '<td hidden id="1plt_before' + count_wash_data + '">' +
                                    value.plt_before + '</td>'; //
                                event_data += '<td hidden id="1plt_after' + count_wash_data + '">' +
                                    value.plt_after + '</td>'; //
                                event_data += '<td hidden id="1rbc_before' + count_wash_data + '">' +
                                    value.rbc_before + '</td>'; //
                                event_data += '<td hidden id="1rbc_after' + count_wash_data + '">' +
                                    value.rbc_after + '</td>'; //
                                event_data += '<td hidden id="1mcv_before' + count_wash_data + '">' +
                                    value.mcv_before + '</td>'; //
                                event_data += '<td hidden id="1mcv_after' + count_wash_data + '">' +
                                    value.mcv_after + '</td>'; //
                                event_data += '<td hidden id="1wbc_before' + count_wash_data + '">' +
                                    value.wbc_before + '</td>'; //
                                event_data += '<td hidden id="1wbc_after' + count_wash_data + '">' +
                                    value.wbc_after + '</td>'; //

                                event_data += '<td hidden id="1report' + count_wash_data + '">' + value
                                    .report + '</td>'; //
                                event_data += '<td hidden id="1nss' + count_wash_data + '">' + value
                                    .nss + '</td>'; //
                                event_data += '<td hidden id="1nss_value' + count_wash_data + '">' +
                                    value.nss_value + '</td>'; //
                                event_data += '<td hidden id="1nss_lot' + count_wash_data + '">' + value
                                    .nss_lot + '</td>'; //
                                event_data += '<td hidden id="1nss_exp' + count_wash_data + '">' + value
                                    .nss_exp + '</td>'; //
                                event_data += '<td hidden id="1user_order' + count_wash_data + '">' +
                                    value.user_order + '</td>'; //
                                event_data += '<td hidden id="1val_after' + count_wash_data + '">' +
                                    value.val_after + '</td>'; //
                                event_data += '<td hidden id="1val_before' + count_wash_data + '">' +
                                    value.val_before + '</td>'; //
                                event_data += '<td hidden id="bloodwashedredcelldate' +
                                    count_wash_data + '">' + value.bloodwashedredcelldate + '</td>'; //
                                event_data += '<td hidden id="bloodwashedredcelltime' +
                                    count_wash_data + '">' + value.bloodwashedredcelltime + '</td>'; //
                                event_data += '<td hidden id="appointment' + count_wash_data + '">' +
                                    value.appointment + '</td>'; //
                                event_data += '<td hidden id="appoittext' + count_wash_data + '">' +
                                    value.appoittext + '</td>'; //

                                event_data += '<td hidden id="nss_lot1' + count_wash_data + '">' + value
                                    .nss_lot1 + '</td>'; //
                                event_data += '<td hidden id="nss_exp1' + count_wash_data + '">' + value
                                    .nss_exp1 + '</td>'; //

                                event_data += '<td hidden id="nss_lot2' + count_wash_data + '">' + value
                                    .nss_lot2 + '</td>'; //
                                event_data += '<td hidden id="nss_exp2' + count_wash_data + '">' + value
                                    .nss_exp2 + '</td>'; //

                                event_data += '<td hidden id="nss_lot3' + count_wash_data + '">' + value
                                    .nss_lot3 + '</td>'; //
                                event_data += '<td hidden id="nss_exp3' + count_wash_data + '">' + value
                                    .nss_exp3 + '</td>'; //

                                event_data += '<td hidden id="nss_lot4' + count_wash_data + '">' + value
                                    .nss_lot4 + '</td>'; //
                                event_data += '<td hidden id="nss_exp4' + count_wash_data + '">' + value
                                    .nss_exp4 + '</td>'; //

                                event_data += '<td hidden id="1bloodwash_round' + count_wash_data +
                                    '">' + value.bloodwash_round + '</td>'; //
                                event_data += '<td hidden id="1bloodwash_unit' + count_wash_data +
                                    '">' + value.bloodwash_unit + '</td>'; //
                                event_data += '<td hidden id="1bloodwash_ml' + count_wash_data + '">' +
                                    value.bloodwash_ml + '</td>'; //
                                event_data += '<td hidden id="1bloodwash_intense' + count_wash_data +
                                    '">' + value.bloodwash_intense + '</td>'; //

                                event_data += '<td hidden id="1user_send_washed' + count_wash_data +
                                    '">' + value.user_send_washed + '</td>'; //
                                event_data += '<td hidden id="1user_send_washed_date' +
                                    count_wash_data + '">' + value.user_send_washed_date + '</td>'; //

                                event_data += '<td hidden id="1user_get_bag_washed' + count_wash_data +
                                    '">' + value.user_get_bag_washed + '</td>'; //
                                event_data += '<td hidden id="1user_get_bag_washed_date' +
                                    count_wash_data + '">' + value.user_get_bag_washed_date +
                                    '</td>'; //

                                event_data += '<td hidden id="1user_send_wash' + count_wash_data +
                                    '">' + value.user_send_wash + '</td>'; //
                                event_data += '<td hidden id="1user_send_wash_date' + count_wash_data +
                                    '">' + value.user_send_wash_date + '</td>'; //

                                event_data += '<td hidden id="1user_receive_wash' + count_wash_data +
                                    '">' + value.user_receive_wash + '</td>'; //
                                event_data += '<td hidden id="1user_receive_wash_date' +
                                    count_wash_data + '">' + value.user_receive_wash_date + '</td>'; //

                                event_data += '<td hidden id="user_done_wash' + count_wash_data + '">' +
                                    value.user_done_wash + '</td>'; //
                                event_data += '<td hidden id="user_done_wash_date' + count_wash_data +
                                    '">' + value.user_done_wash_date + '</td>'; //

                                event_data += '<td hidden id="remarkreturn' + count_wash_data + '">' +
                                    value.remarkreturn + '</td>';
                                event_data += '</tr>';

                                count_wash_data++;
                            });
                            $("#wash_data_2").html(event_data);

                            if (stateCk) {
                                chActiveReq_2(countid, null, null);
                                showdatacount(countid)
                            }

                        },
                        error: function(d) {
                            /*console.log("error");*/
                            alert("404. Please wait until the File is Loaded.");
                        }
                    });
                }

                function showdatacount(record) {


                    var bag_number = document.getElementById("1bag_number" + record).innerHTML;
                    var bloodgroupid = document.getElementById("1bloodgroupid" + record).innerHTML;
                    var rhid = document.getElementById("1rhid" + record).innerHTML;
                    var rhname3 = document.getElementById("1rhname3" + record).innerHTML;

                    var diagnosis = document.getElementById("1diagnosis" + record).innerHTML;
                    var diagnosisdetail = document.getElementById("1diagnosisdetail" + record).innerHTML;

                    var blood_wash_use_date = replaceS(document.getElementById("1blood_wash_use_date" + record).innerHTML);

                    var doctorname = replaceS(document.getElementById("1doctorname" + record).innerHTML);

                    var unitofficename = replaceS(document.getElementById("1unitofficename" + record).innerHTML);

                    document.getElementById("nss_lot1").value = document.getElementById("nss_lot1" + record).innerHTML;
                    document.getElementById("nss_exp1").value = document.getElementById("nss_exp1" + record).innerHTML;

                    document.getElementById("nss_lot2").value = document.getElementById("nss_lot2" + record).innerHTML;
                    document.getElementById("nss_exp2").value = document.getElementById("nss_exp2" + record).innerHTML;

                    document.getElementById("nss_lot3").value = document.getElementById("nss_lot3" + record).innerHTML;
                    document.getElementById("nss_exp3").value = document.getElementById("nss_exp3" + record).innerHTML;

                    document.getElementById("nss_lot4").value = document.getElementById("nss_lot4" + record).innerHTML;
                    document.getElementById("nss_exp4").value = document.getElementById("nss_exp4" + record).innerHTML;

                    var cc = document.getElementById("1cc" + record).innerHTML;
                    var val_after = document.getElementById("1val_after" + record).innerHTML;
                    var val_before = document.getElementById("1val_before" + record).innerHTML;
                    var qty = document.getElementById("1qty" + record).innerHTML;
                    var nss = document.getElementById("1nss" + record).innerHTML;
                    var nss_value = document.getElementById("1nss_value" + record).innerHTML;
                    var nss_lot = document.getElementById("1nss_lot" + record).innerHTML;
                    var nss_exp = document.getElementById("1nss_exp" + record).innerHTML;

                    var hb_before = document.getElementById("1hb_before" + record).innerHTML;
                    var hb_after = document.getElementById("1hb_after" + record).innerHTML;
                    var hct_before = document.getElementById("1hct_before" + record).innerHTML;
                    var hct_after = document.getElementById("1hct_after" + record).innerHTML;
                    var plt_before = document.getElementById("1plt_before" + record).innerHTML;
                    var plt_after = document.getElementById("1plt_after" + record).innerHTML;
                    var rbc_before = document.getElementById("1rbc_before" + record).innerHTML;
                    var rbc_after = document.getElementById("1rbc_after" + record).innerHTML;
                    var mcv_before = document.getElementById("1mcv_before" + record).innerHTML;
                    var mcv_after = document.getElementById("1mcv_after" + record).innerHTML;
                    var wbc_before = document.getElementById("1wbc_before" + record).innerHTML;
                    var wbc_after = document.getElementById("1wbc_after" + record).innerHTML;

                    var remark = replaceS(document.getElementById("1remark" + record).innerHTML);
                    var report = document.getElementById("1report" + record).innerHTML;
                    document.getElementById("remarkreturn").value = document.getElementById("remarkreturn" + record)
                        .innerHTML;



                    var user_order = document.getElementById("1user_order" + record).innerHTML;
                    var unitofficeid = document.getElementById("1unitofficeid" + record).innerHTML;

                    var bloodwashedredcellid = document.getElementById("1bloodwashedredcellid" + record).innerHTML;

                    var bloodwashedredcelldate = document.getElementById("bloodwashedredcelldate" + record).innerHTML;
                    var bloodwashedredcelltime = document.getElementById("bloodwashedredcelltime" + record).innerHTML;

                    var appointment = document.getElementById("appointment" + record).innerHTML;
                    var appoittext = document.getElementById("appoittext" + record).innerHTML;

                    var bloodwash_round = document.getElementById("1bloodwash_round" + record).innerHTML;
                    var bloodwash_unit = document.getElementById("1bloodwash_unit" + record).innerHTML;
                    var bloodwash_ml = document.getElementById("1bloodwash_ml" + record).innerHTML;
                    var bloodwash_intense = document.getElementById("1bloodwash_intense" + record).innerHTML;

                    var user_send_washed = document.getElementById("1user_send_washed" + record).innerHTML;
                    var user_send_washed_date = document.getElementById("1user_send_washed_date" + record).innerHTML;

                    var user_get_bag_washed = document.getElementById("1user_get_bag_washed" + record).innerHTML;
                    var user_get_bag_washed_date = document.getElementById("1user_get_bag_washed_date" + record).innerHTML;

                    var user_send_wash = document.getElementById("1user_send_wash" + record).innerHTML;
                    var user_send_wash_date = document.getElementById("1user_send_wash_date" + record).innerHTML;

                    var user_receive_wash = document.getElementById("1user_receive_wash" + record).innerHTML;
                    var user_receive_wash_date = document.getElementById("1user_receive_wash_date" + record).innerHTML;

                    var user_done_wash = document.getElementById("user_done_wash" + record).innerHTML;
                    var user_done_wash_date = document.getElementById("user_done_wash_date" + record).innerHTML;

                    var ckwash = "";
                    if (document.getElementById("ckwash" + record).checked) {
                        document.getElementById("ckwash").value = "1";
                        ckwash = "1";
                    } else if (document.getElementById("ckwash_cn_" + record).checked) {
                        document.getElementById("ckwash").value = "2";
                        ckwash = "2";
                    } else {
                        document.getElementById("ckwash").value = "";
                        ckwash = "";
                    }


                    document.getElementById("blood_wash_use_date").value = blood_wash_use_date;

                    document.getElementById("diagnosis").value = diagnosis;
                    document.getElementById("diagnosisdetail").value = diagnosisdetail;

                    document.getElementById("doctorname").value = doctorname;

                    document.getElementById("unitofficename").value = unitofficename;

                    document.getElementById("nss").value = nss;

                    // document.getElementById("nss_lot1").value = nss_lot1;
                    // document.getElementById("nss_exp1").value = nss_exp1;
                    // document.getElementById("nss_lot1").value = nss_lot1;
                    // document.getElementById("nss_exp1").value = nss_exp1;

                    document.getElementById("bloodwash_round").value = bloodwash_round;

                    document.getElementById("hb_before").value = hb_before;
                    document.getElementById("hb_after").value = hb_after;
                    document.getElementById("hct_before").value = hct_before;
                    document.getElementById("hct_after").value = hct_after;
                    document.getElementById("plt_before").value = plt_before;
                    document.getElementById("plt_after").value = plt_after;
                    document.getElementById("rbc_before").value = rbc_before;
                    document.getElementById("rbc_after").value = rbc_after;
                    document.getElementById("mcv_before").value = mcv_before;
                    document.getElementById("mcv_after").value = mcv_after;
                    document.getElementById("wbc_before").value = wbc_before;
                    document.getElementById("wbc_after").value = wbc_after;

                    document.getElementById("bloodwashedredcellid").value = bloodwashedredcellid;
                    document.getElementById("remark").value = remark;
                    // document.getElementById("report").value = report;

                    document.getElementById("user_order").value = user_order;
                    document.getElementById("unitofficeid").value = unitofficeid;

                    document.getElementById("datenow").value = bloodwashedredcelldate;
                    document.getElementById("timenow").value = bloodwashedredcelltime;

                    document.getElementById("appointment").value = appointment;
                    document.getElementById("appoittext").value = appoittext;

                    //////////////////////////////////ใหม่

                    document.getElementById("bloodwash_unit").value = bloodwash_unit;
                    document.getElementById("bloodwash_ml").value = bloodwash_ml;
                    document.getElementById("bloodwash_intense").value = bloodwash_intense;

                    document.getElementById("user_send_wash1").value = user_send_wash;

                    var user_send_wash_data = new Option(user_send_wash, user_send_wash, false, false);
                    $('#user_send_wash').append(user_send_wash_data).trigger('change');


                    if (user_send_wash != '') {
                        document.getElementById("checkbox1").checked = true;
                        document.getElementById("user_send_wash1").hidden = true;
                        document.getElementById("user_send_wash2").hidden = false;
                    } else {
                        document.getElementById("checkbox1").checked = false;
                    }
                    document.getElementById("user_send_wash_date").value = getDMYHM(user_send_wash_date);

                    document.getElementById("user_receive_wash1").value = user_receive_wash;

                    var user_receive_wash_data = new Option(user_receive_wash, user_receive_wash, false, false);
                    $('#user_receive_wash').append(user_receive_wash_data).trigger('change');


                    if (user_receive_wash != '') {
                        document.getElementById("checkbox2").checked = true;
                        document.getElementById("user_receive_wash1").hidden = true;
                        document.getElementById("user_receive_wash2").hidden = false;
                    } else {
                        document.getElementById("checkbox2").checked = false;
                    }
                    document.getElementById("user_receive_wash_date").value = getDMYHM(user_receive_wash_date);

                    document.getElementById("user_done_wash1").value = user_done_wash;

                    var user_done_wash_data = new Option(user_done_wash, user_done_wash, false, false);
                    $('#user_done_wash').append(user_done_wash_data).trigger('change');


                    if (user_done_wash != '') {
                        document.getElementById("checkbox3").checked = true;
                        document.getElementById("user_done_wash1").hidden = true;
                        document.getElementById("user_done_wash2").hidden = false;
                    } else {
                        document.getElementById("checkbox3").checked = false;
                    }
                    document.getElementById("user_done_wash_date").value = getDMYHM(user_done_wash_date);

                    document.getElementById("user_send_washed1").value = user_send_washed;

                    var user_send_washed_data = new Option(user_send_washed, user_send_washed, false, false);
                    $('#user_send_washed').append(user_send_washed_data).trigger('change');


                    if (user_send_washed != '') {
                        document.getElementById("checkbox4").checked = true;
                        document.getElementById("user_send_washed1").hidden = true;
                        document.getElementById("user_send_washed2").hidden = false;
                    } else {
                        document.getElementById("checkbox4").checked = false;
                    }
                    document.getElementById("user_send_washed_date").value = getDMYHM(user_send_washed_date);

                    document.getElementById("user_get_bag_washed1").value = user_get_bag_washed;

                    var user_get_bag_washed_data = new Option(user_get_bag_washed, user_get_bag_washed, false, false);
                    $('#user_get_bag_washed').append(user_get_bag_washed_data).trigger('change');


                    if (user_get_bag_washed != '') {
                        document.getElementById("checkbox5").checked = true;
                        document.getElementById("user_get_bag_washed1").hidden = true;
                        document.getElementById("user_get_bag_washed2").hidden = false;
                    } else {
                        document.getElementById("checkbox5").checked = false;
                    }
                    document.getElementById("user_get_bag_washed_date").value = getDMYHM(user_get_bag_washed_date);
                    document.getElementById("remark").required = false;
                    setBox(user_send_wash, user_receive_wash, user_done_wash, user_send_washed, ckwash);
                    requestBloodModalClose();
                    setCKwash(ckwash, true)
                }

                function setBox(user_send_wash, user_receive_wash, user_done_wash, user_send_washed, ckwash) {
                    document.getElementById("div_recode_washed_red_cell").style.display = (user_receive_wash != "") ?
                        "block" : "none";
                    document.getElementById("div_appointment").style.display = (user_done_wash != "") ? "block" : "none";
                    // document.getElementById("hct_after").required = (user_receive_wash != ""); set hct_after required

                    document.getElementById("div_ck_2_1").style.display = (user_send_wash != "") ? "block" : "none";
                    document.getElementById("div_ck_2_2").style.display = (user_send_wash != "") ? "block" : "none";

                    document.getElementById("div_ck_3_1").style.display = (user_receive_wash != "") ? "block" : "none";
                    document.getElementById("div_ck_3_2").style.display = (user_receive_wash != "") ? "block" : "none";

                    document.getElementById("div_return").style.display = (user_done_wash != "" || ckwash == 2) ? "block" : "none";
                    document.getElementById("div_ck_4_1").style.display = (user_done_wash != "" || ckwash == 2) ? "block" : "none";
                    document.getElementById("div_ck_4_2").style.display = (user_done_wash != "" || ckwash == 2) ? "block" : "none";

                    document.getElementById("div_ck_5_1").style.display = (user_send_washed != "" || ckwash == 2) ? "block" : "none";
                    document.getElementById("div_ck_5_2").style.display = (user_send_washed != "" || ckwash == 2) ? "block" : "none";

                }

                function setCKwash(v, status) {
                    if (status) {
                        document.getElementById("ckwash").value = v;
                        document.getElementById("remark").required = (v == "2");
                    } else {
                        document.getElementById("remark").required = false;
                    }

                }

                function replaceS(str = "") {
                    return str.replace("<s>", "").replace("</s>", "");
                }

                function Print_wash_red_cell() {
                    // var id = document.getElementById("bloodwashedredcellid").value;


                    var array = findCrossMatchItemPrint(document.getElementById("list_wash_blood_modal"));

                    printJS({
                        printable: localurl + "/report/wash_red_cell_report.php?id=" + array,
                        type: 'pdf',
                        showModal: true
                    });

                    // printJS({
                    //     printable: localurl + "/report/wash_red_cell_report_a5.php?id=" + id,
                    //     type: 'pdf',
                    //     showModal: true
                    // });
                }

                function findCrossMatchItemPrint(table) {

                    var bag_number_gr = "";
                    var r = 1;
                    var count = 0;
                    while (row = table.rows[r++]) {

                        if (row.children[1].children[0].checked) {
                            var item = JSON.parse(row.children[0].innerHTML);
                            bag_number_gr += item.bloodwashedredcellid + ",";
                        }

                    }

                    return lastString(bag_number_gr);

                }

                function Print_wash_red_cell_full(id) {

                    printJS({
                        printable: localurl + "/report/wash_red_cell_report.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function lot() {
                    $("#lotnumber").modal('show');
                }

                function closelotno() {
                    $("#lotnumber").modal('hide');
                }
            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>

            </form>
    </body>

    </html>