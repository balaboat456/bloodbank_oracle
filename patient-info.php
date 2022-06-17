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

        <title>ค้นหาข้อมูลผู้ป่วย</title>
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

            .div-anti {
                background-color: #e9ecef;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                height: 40px;
                padding-top: 8px !important;
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
                                    <h1 class="main-title float-left">ค้นหาข้อมูลผู้ป่วย</h1>
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

                            <div class="form-group col-md-3">
                                <label for="inputCity">ค้นหาข้อมูลผู้ป่วย</label>
                                <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                <input type="text" name="hn" class="form-control" id="hn" autocomplete="off" onkeyup="setNewHN(this)" autofocus>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-3">


                                    <form role="form" id="myform" method="POST" action="blood-disconnectsave.php" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <img id="img_profile" src="assets/images/profile.png" class="img-profile" alt="Smiley face" height="170" width="160"><br /><br /><br />
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">ชื่อ - นามสกุล</label>
                                                    <input readonly type="text" name="patientfullname" class="form-control" id="patientfullname" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">รหัสบัตรประจำตัวประชาชน</label>
                                                    <input readonly type="text" name="patientidcard" class="form-control" id="patientidcard" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Blood Group</label>
                                                    <input readonly type="text" name="patientbloodgroup" class="form-control" id="patientbloodgroup" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Rh</label>
                                                    <input readonly type="text" name="patientrh" class="form-control" id="patientrh" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">HN</label>
                                                    <input readonly type="text" name="patienthn" class="form-control" id="patienthn" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">AN</label>
                                                    <input readonly type="text" name="patientan" class="form-control" id="patientan" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">เพศ</label>
                                                    <input readonly type="text" name="patientgender" class="form-control" id="patientgender" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">วัน/เดือน/ปี เกิด</label>
                                                    <input readonly type="text" name="patientanbirthday" class="form-control" id="patientanbirthday" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">อายุ</label>
                                                    <input readonly type="text" name="patientage" class="form-control" id="patientage" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">สิทธิ์การชำระเงิน</label>
                                                    <input readonly type="text" name="patientinsurance" class="form-control" id="patientinsurance" autocomplete="off">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">หน่วยงานที่แจ้งขอเลือด</label>
                                                    <input readonly type="text" name="wardname" class="form-control" id="wardname" autocomplete="off">
                                                </div>

                                                <!-- <div class="form-group col-md-6">
                                                    <label for="inputCity">Antibody</label>
                                                    <input readonly type="text" name="patientantibody" class="form-control" id="patientantibody" autocomplete="off">
                                                </div> -->

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Antibody</label>
                                                    <div class="col-md-12 div-anti">
                                                        <label id="patientantibody"></label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Phenotype</label>
                                                    <div class="col-md-12 div-anti">
                                                        <label id="patientphenotype"></label>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group col-md-6">
                                                    <label for="inputCity">Phenotype</label>
                                                    <input readonly type="text" name="patientphenotype" class="form-control" id="patientphenotype" autocomplete="off">
                                                </div> -->
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


        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>



        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/custom/patient/patient-loadtable.js"></script>
        <script src="assets/printJS/print.min.js"></script>
        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		
            $(document).ready(function() {
                dateBE('.date1');

                $("#hn").on('keydown', function(e) {
                    if (e.which == 13) {
                        scanBarcode();
                    }
                });

            });

            function scanBarcode() {
                var patient = document.getElementById('hn').value;

                if (patient.length > 0) {
                    spinnershow();

                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: 'api/get-patient-rajavithi.php?hn=' + patient,
                        timeout: 1000 * 60,
                        success: function(data) {

                            if (data.status) {
                                loadPatient(patient);
                            } else {

                                spinnerhide();

                                console.log(data);

                                if (data.data) {
                                    if (data.data.MessageCode == "400") {
                                        swal({
                                                title: "ไม่พบข้อมูล",
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
                                                    document.getElementById('hn').focus;
                                                }
                                            });
                                    } else {
                                        checkLoadPatient(patient);
                                    }
                                } else {
                                    checkLoadPatient(patient);
                                }


                            }


                        },
                        error: function(data) {

                            spinnerhide();
                            console.log("โหลดข้อมูลจาก RHIS ไม่สำเร็จ");

                            console.log('An error occurred.');
                            console.log(data);

                            checkLoadPatient(patient);

                        },
                    });
                } else {
                    clearPatient();
                }
            }

            function checkLoadPatient(patient) {
                swal({
                        title: "โหลดข้อมูลจาก RHIS ไม่สำเร็จ",
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

                            $.ajax({
                                type: 'GET',
                                dataType: 'json',
                                url: 'data/patient/patient.php?hn=' + patient,
                                complete: function() {
                                    var delayInMilliseconds = 200;
                                    setTimeout(function() {
                                        spinnerhide();
                                    }, delayInMilliseconds);
                                },
                                success: function(data) {
                                    if (data.data.length > 0) {

                                        swal({
                                                title: "ท่านต้องการใช้ข้อมูลเก่าใน RJ log ก่อนหรือไม่",
                                                type: "warning",
                                                showCloseButton: false,
                                                showCancelButton: true,
                                                // dangerMode: true,
                                                confirmButtonClass: "btn-success",
                                                confirmButtonClass: "",
                                                confirmButtonText: "ตกลง",
                                                closeOnConfirm: true
                                            },
                                            function(inputValue) {
                                                if (inputValue) {
                                                    loadPatient(patient);
                                                }
                                            });


                                    }

                                },
                                error: function(data) {

                                    console.log('An error occurred.');
                                    console.log(data);
                                },
                            });


                            document.getElementById('hn').focus;
                        }
                    });
            }

            function loadPatient(patient) {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/patient/patient.php?hn=' + patient,
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function(data) {
                        /// อันนี้นะ
                        if (data.data.length > 0) {
                            var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                            setPatient(obj);

                            console.log(obj.ispassedaway);

                        } else {
                            clearPatient();
                            swal({
                                    title: "ไม่พบข้อมูล ",
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
                                        document.getElementById('hn').focus;
                                    }
                                });
                        }
                        document.getElementById('hn').value = '';
                    },
                    error: function(data) {
                        clearPatient();
                        console.log('An error occurred.');
                        console.log(data);
                        document.getElementById('hn').value = '';
                    },
                });
            }

            function clearPatient() {
                document.getElementById('hn').value = '';

                document.getElementById('patientfullname').value = '';
                document.getElementById('patientidcard').value = '';
                document.getElementById('patientbloodgroup').value = '';
                document.getElementById('patientrh').value = '';
                document.getElementById('patienthn').value = '';
                document.getElementById('patientan').value = '';
                document.getElementById('patientgender').value = '';
                document.getElementById('patientage').value = '';
                document.getElementById('patientanbirthday').value = '';
                document.getElementById('patientinsurance').value = '';
                document.getElementById('wardname').value = '';
                document.getElementById('patientantibody').innerHTML = '';
                document.getElementById('patientphenotype').innerHTML = '';

                document.getElementById('img_profile').src = "assets/images/profile.png";
            }

            function setPatient(data) {
                data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));


                document.getElementById('patientfullname').value = data.patientfullname;
                document.getElementById('patientidcard').value = data.patientidcard;
                document.getElementById('patientbloodgroup').value = data.patientbloodgroup;
                if (data.patientrh == 'Rh+') {
                    document.getElementById('patientrh').value = 'Positive';
                } else if (data.patientrh == 'Rh-') {
                    document.getElementById('patientrh').value = 'Negative';
                }
                document.getElementById('patienthn').value = data.patienthn;
                document.getElementById('patientan').value = data.patientan;
                document.getElementById('patientgender').value = data.patientgender;
                document.getElementById('patientage').value = data.patientage;
                document.getElementById('patientanbirthday').value = getDMY(data.patientanbirthday) ;
                document.getElementById('patientinsurance').value = data.patientinsurance;
                document.getElementById('wardname').value = data.wardname;
                document.getElementById('patientantibody').innerHTML = data.patientantibody;
                document.getElementById('patientphenotype').innerHTML = data.patientphenotype;

                if (data.patientimage.replace('data:image/png;base64,', '') != "") {
                    document.getElementById('img_profile').src = data.patientimage;
                } else {
                    document.getElementById('img_profile').src = "assets/images/profile.png";
                }
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>