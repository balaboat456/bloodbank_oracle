<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    include('checkPermission.php');

    if (!checkPermission("BK_SERUM_TEAR", "VW")) {
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

        <title>บันทึกข้อมูลการทำ Serum Tear</title>
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
                                    <h1 class="main-title float-left"> บันทึกข้อมูลการทำ Serum Tear</h1>
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

                            <input id="patientid" name="patientid" type="text" hidden>
                            <input id="serumtearid" name="serumtearid" type="text" hidden>
                            <input id="hn" name="hn" type="text" hidden>

                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">HN</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="scanhn" class="form-control" id="scanhn" onkeyup="" placeholder="" autofocus onkeyup="setNewHN(this)">
                                </div>

                            </div>


                            <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->

                            <p>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <img src="assets/images/profile.png" alt="Smiley face" height="170" width="160">
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
                                    <label>HN</label> <label id="patienthn">-</label><br>
                                    <label>AN</label> <label id="patientan">-</label><br>
                                    <label>ID</label> <label id="patientidcard">-</label><br>
                                    <label>ประเภทผู้ป่วย <label id="patient_type">-</label></label><br>
                                    <label>Bl.Gr.</label> <label id="patientbloodgroup">-</label><br>
                                </div>
                                <div class="form-group col-md-6 font_patient">
                                    <label>ชื่อ-นามสกุล</label> <label id="patientfullname">-</label><br>
                                    <label>อายุ</label> <label id="patientage">-</label> <label>ปี</label><br>
                                    <label>เพศ</label> <label id="patientgender">-</label><br>
                                    <label>สิทธิการรักษา </label> <label id="patientinsurance">-</label><br>
                                </div>
                            </div>

                    </div>
                    </p>

                    <div class="form-group col-md-12">
                        <div class="table-s-scroll">
                            <table id="list_table_serum_tear_letting">
                                <thead>
                                    <tr>
                                        <th class="td-table" style="width:180px">วัน-เวลาที่ทำ</th>
                                        <th class="td-table" style="width:250px">แพทย์ผู้สั่งทำ</th>
                                        <th class="td-table">ผลการวินิจฉัย</th>
                                        <th class="td-table" style="width:250px">ผู้ทำ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> รายละเอียดการ Serum Tear</h3>

                            </div>

                            <div class="card-body">


                                <fieldset class="form-group">
                                    <div class="row">

                                        <div class="form-group col-md-1">
                                            <label for="inputEmail4">วันที่ทำ</label>
                                            <input type="text" autocomplete="off" value="<?php echo dateNowDMY(); ?>" class="form-control date1" id="datenow" name="datenow">
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label for="inputEmail4">เวลาที่ทำ</label>
                                            <input type="text" autocomplete="off" value="<?php echo date('H:i'); ?>" class="form-control " id="timenow" name="timenow">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">ผู้ทำ</label>
                                            <select required id="staffid" class="form-control" name="staffid">
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">หน่วยงานที่สั่งทำ</label>
                                            <select required id="unitofficeid" class="form-control" name="unitofficeid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">แพทย์ผู้สั่งทำ</label>
                                            <select required id="doctorid" class="form-control" name="doctorid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4"><label>Diagnosis</label>
                                            <input required type="text" autocomplete="off" value="" class="form-control" id="diagnosis" name="diagnosis">
                                        </div>

                                        <div class="form-group col-md-4"><label>-</label>
                                            <input type="text" autocomplete="off" value="" class="form-control" id="diagnosisdetail" name="diagnosisdetail">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">ปริมาณที่สั่ง</label>
                                            <select required id="serumtearvolumeid" class="form-control" name="serumtearvolumeid">
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3"><label>Clotted (Tube)</label>
                                            <input required type="number" step="any" autocomplete="off" value="" class="form-control" id="clotted" name="clotted">
                                        </div>

                                        <div class="form-group col-md-3"><label>จำนวนที่ได้ (ขวด)</label>
                                            <input required type="number" step="any" autocomplete="off" value="" class="form-control" id="qty" name="qty">
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade custom-modal" id="showbloodcancel" tabindex="-1" role="dialog" aria-labelledby="bloodCancelModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel2">รายละเอียดการปฏิเสธสิ่งส่งตรวจ</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="anhn" class="check" type="checkbox" name="anhn" value="1">
                                                                        1) สิ่งส่งตรวจและใบขอส่งตรวจ มีชื่อ-นามสกุลผู้ป่วย HN และ AN จำนวนสิ่งส่งตรวจ ไม่ตรงกัน
                                                                        ไม่ครบถ้วน ไม่ชัดเจน
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="hemolysis" class="check" type="checkbox" name="hemolysis" value="1">
                                                                        5) ตัวอย่างเลือดมี Hemolysis
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="slide" class="check" type="checkbox" name="slide" value="1">
                                                                        2) ไม่มีชื่อผู้ทำการเก็บเจาะเลือด บน slide tube
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="catheter" class="check" type="checkbox" name="catheter" value="1">
                                                                        6) เป็นตัวอย่างเลือดที่เก็บจากสาย Intravenous fluid หรือจาก Blood catheter ที่ปนสารน้ำ
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="sticker" class="check" type="checkbox" name="sticker" value="1">
                                                                        3) ติด Sticker แต่ไม่ได้ลงเวลาผู้เจาะเก็บ
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="temp" class="check" type="checkbox" name="temp" value="1">
                                                                        7) เป็นตัวอย่างเลือดที่เจาะเก็บไว้นานกว่า 24 ชั่วโมง และเก็บไว้ในอุณหภูมิที่ไม่เหมาะสม
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="fivecc" class="check" type="checkbox" name="fivecc" value="1">
                                                                        4) มีตัวอย่างเลือดผู้ป่วยน้อยกว่า 5 มล. (ซีซี) และมีก้อน clot
                                                                        ซึ่งจะรบกวนกระบวนการตรวจวิเคราะห์
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="othertube" class="check" type="checkbox" name="othertube" value="1">
                                                                        8) เป็นตัวอย่างเลือดที่แบ่งมาจากหลอดสิ่งส่งตรวจอื่นๆ
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input onclick="chk_remark_01()" type="checkbox" id="chk_remark" name="chk_remark" value="1">
                                                                        ระบุหมายเหตุ
                                                                    </label>
                                                                </div>
                                                                <textarea disabled id="remark" name="remark" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="abnormal" class="check" type="checkbox" name="abnormal" value="1">
                                                                        9) ความผิดปกติอื่นๆ ที่ธนาคารเลือดพิจารณาแล้วอาจมีความเสี่ยง
                                                                    </label>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="save-bottom">
                                                            <div class="form-group text-right m-b-0">
                                                                <button onclick="bloodCancelModalClose()" class="btn btn-warning" type="button">
                                                                    <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                                                                </button>



                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="inputCity">&nbsp;</label>
                                            <div>
                                                <a role="button" href="#" class="btn btn-primary" onclick="showbloodcancel()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>หมายเหตุ</a>
                                            </div>
                                        </div>


                                        <!-- <div class="form-group col-md-6">

                                            หมายเหตุ <br>
                                            <label class="form-check-label">
                                                <input onclick="chk_hemolysis()" type="checkbox" id="hemolysis" name="hemolysis" value="1">
                                                Hemolysis
                                            </label><br>

                                            <label class="form-check-label">
                                                <input onclick="chk_remark_01()" type="checkbox" id="chk_remark" name="chk_remark" value="1">
                                                อื่นๆ
                                            </label>

                                            <textarea disabled id="remark" name="remark" class="form-control"></textarea>

                                        </div> -->

                                        <div class="form-group col-md-6"><label>รายงานผล</label>
                                            <textarea id="report" name="report" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">นัดหมายครั้งต่อไป</label>
                                            <input type="text" name="appointment" autocomplete="off" class="form-control date1" id="appointment">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">ระบุการนัดหมาย</label>
                                            <input type="text" name="appoittext" class="form-control" id="appoittext" value="">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">ผู้บันทึก</label>
                                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="usercreate" name="usercreate">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">วันเวลาที่บันทึก</label>
                                            <input readonly type="text" autocomplete="off" class="form-control" id="serumteardatetime" value="<?php echo dateNowDMY(); ?> <?php echo date('H:i'); ?>" name="serumteardatetime">
                                        </div>

                                        <!-- <div class="form-group col-md-12"><label>หมายเหตุ</label>

                                        </div> -->


                                    </div>
                                </fieldset>



                            </div>
                        </div><!-- end card-->
                    </div>

                </div>

                <div class="div-save">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <div>
                                <button type="button" onclick="refreash()" class="btn btn-success m-l-5">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                                </button>
                                <button class="btn btn-primary" type="submit">
                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                </button>
                                <button onclick="Print_serum_tear()" id="reportPrintPdf" class="btn btn-success" type="button">
                                    <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                </button>
                                <button type="button" onclick="newBloodLetting()" class="btn btn-success m-l-5">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

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

            <!-- App js -->
            <script src="assets/js/pikeadmin.js"></script>

            <script src="assets/js/EnterNext.js"></script>
            <script src="assets/js/FindData.js"></script>
            <script src="assets/js/DateTimeFormat.js"></script>
            <script src="assets/js/Replace.js"></script>
            <script src="assets/printJS/print.min.js"></script>

            <script src="assets/js/custom/blood-serum-tear/blood-serum-tear-select.js"></script>
            <script src="assets/js/custom/blood-serum-tear/blood-serum-tear-loadtable.js"></script>
            <script src="assets/js/custom/blood-serum-tear/blood-serum-tear-event.js"></script>
            <script src="assets/js/menu.js"></script>
            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                $(document).ready(function() {
                    dateBE('.date1');
                    $("#usercreate").val(session_fullname);
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

                        spinnershow();
                        $.ajax({
                            type: 'POST',
                            url: 'blood-serum-tear-save.php',
                            data: data,
                            dataType: "json",
                            complete: function() {
                                var delayInMilliseconds = 200;
                                setTimeout(function() {
                                    spinnerhide();
                                }, delayInMilliseconds);
                            },
                            success: function(data) {

                                if (data.status) {
                                    myAlertTop();
                                    loadTable(document.getElementById('hn').value, data.state);
                                } else {
                                    myAlertTopError();
                                }
                                console.log(data.status);
                                console.log(data);

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

                function showbloodcancel() {
                    $('#showbloodcancel').modal('show');
                }

                function bloodCancelModalClose() {
                    $('#showbloodcancel').modal('hide');
                }

                function newPage() {
                    window.location.href = 'blood-serum-tear.php';
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

                function chk_hemolysis() {
                    document.getElementById("chk_remark").checked = false;
                    document.getElementById("remark").disabled = true;
                    document.getElementById("remark").value = "";
                }

                function chk_remark_01() {
                    document.getElementById("hemolysis").checked = false;
                    document.getElementById("remark").disabled = false;
                    // alert('hhh');
                }

                function Print_serum_tear() {
                    var id = document.getElementById("serumtearid").value;

                    printJS({
                        printable: localurl + "/report/serum_tear_report_a5.php?id=" + id,
                        type: 'pdf',
                        showModal: true
                    });
                }

                function refreash() {
                    window.location.href = 'blood-serum-tear.php';
                }
            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>

            </form>
    </body>

    </html>