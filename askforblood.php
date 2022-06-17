<?php

header('Access-Control-Allow-Origin: *');

session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    $isbloodpreparation = $_SESSION['staffid'];

    error_log("=====$isbloodpreparation=======");


    if (!checkPermission("BK_BLOOD_REQUEST", "VW")) {
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

        <title>บันทึกขอเลือด/แพ้เลือด/คืนเลือด</title>

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/font-awesome.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/css/style.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/css/preload.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom-table.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/css/spinner.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/jquery-ui/css/jquery-ui.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/jquery-ui/css/jquery-ui.structure.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/select2/css/select2.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2-bootstrap.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
        <link href="assets/sweetalert/sweetalert.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />


        <link href="assets/printJS/print.min.css?ref=<?php echo rand(); ?>" rel="stylesheet" type="text/css" />

        <!-- <script src="assets/js/socket-io.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script> -->



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
                background-color: #e9ecef;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                height: 40px;
                padding-top: 8px !important;
            }

            .font-star-label {
                font-size: 20px;
            }

            .font_patient {
                font-size: 20px;
            }

            .select2-dropdown--below {
                z-index: 10000;
            }
        </style>
        <script>
            var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
            var reject_permission = <?php echo (checkPermission("BK_BLOOD_REQUEST", "REJ")) ? 1 : 0; ?>;
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

            <form role="form" id="myform" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">


                <div class="content-page">

                    <!-- Start content -->
                    <div class="content">

                        <div class="container-fluid">




                            <div class="row">
                                <div id="mainform" class="col-xl-12">
                                    <div class="breadcrumb-holder">
                                        <h1 class="main-title float-left"> บันทึกขอเลือด/แพ้เลือด/คืนเลือด</h1>
                                        <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->


                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>
                            <div class="row">


                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div id="printCard1">
                                            <?php if (checkPermission("BK_BLOOD_REQUEST", "PDF1")) { ?>
                                                <a role="button" onclick="printRequestBlood()" class="btn btn-light"><span class="btn-label">
                                                        <i class="fa fa-print"></i></span>ใบขอจองเลือด</a>
                                            <?php } ?>
                                        </div>&emsp;
                                        <div id="printCard2">
                                            <?php if (checkPermission("BK_BLOOD_REQUEST", "PDF1")) { ?>
                                                <a role="button" onclick="printRequestBloodViewForm()" class="btn btn-light"><span class="btn-label">
                                                        <i class="fa fa-print"></i></span>ใบ Crossmatch</a>
                                            <?php } ?>
                                        </div>&emsp;
                                        <div id="printCard4">
                                            <?php if (checkPermission("BK_BLOOD_REQUEST", "PDF1")) { ?>
                                                <a role="button" onclick="printBloodCancelViewForm()" class="btn btn-light"><span class="btn-label">
                                                        <i class="fa fa-print"></i></span>ใบยกเลิกการจองเลือด</a>
                                            <?php } ?>
                                        </div>&emsp;
                                        <div id="printCard3">
                                            <?php if (checkPermission("BK_BLOOD_REQUEST", "PDF1")) { ?>
                                                <a role="button" onclick="printReturnBloodViewForm()" class="btn btn-light"><span class="btn-label">
                                                        <i class="fa fa-print"></i></span>ใบคืนเลือด</a>
                                            <?php } ?>
                                        </div>&emsp;

                                    </div>
                                    <hr />
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputCity">ค้นหาข้อมูลผู้ป่วย</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="patientid" class="form-control" id="patientid" onkeyup="setNewHN(this)" autofocus>
                                </div>

                                <div class="form-group col-md-1">
                                    <label for="inputCity">&nbsp;</label>
                                    <div>
                                        <a role="button" href="#" class="btn btn-primary" onclick="scanBarcode()" data-toggle="modal"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>

                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputCity">&nbsp;</label>
                                    <div>
                                        <a role="button" href="#" class="btn btn-primary" onclick="requestBloodModalShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ดูตรวจประวัติการขอเลือด</a>

                                    </div>
                                </div>
                            </div>


                            <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->

                            <p>
                            <div class="row" style="margin-bottom: -30px;margin-top: -20px;">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <img id="img_profile" src="assets/images/profile.png" class="img-profile" alt="Smiley face" height="170" width="160"><br />
                                        <label id="labelNameBlodIcon" class="label-name-blod-icon"><i class="fa fa-meh-o fa-2x"></i>&nbsp;</label><label class="label-name-blod-icon"><i class="fa fa-tint"></label></i><label>&nbsp;&nbsp;Bl.Gr. </label> &nbsp;&nbsp;<label id="patientbloodgroup" class="label-name-bloodgroup">-</label><br>
                                        <label id="patientdead" class="label-name"></label>
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
                                    <label>อายุ</label> <label id="patientage" class="label-name">-</label> <label>ปี</label><br>
                                    <label>เพศ</label> <label id="patientgender" class="label-name">-</label><br>
                                    <label>สิทธิการรักษา </label> <label id="patientinsurance" class="label-name">-</label><br>
                                </div>
                            </div>

                        </div>
                        </p>

                        <div class="form-group col-md-12">
                            <div class="tab">
                                <button type="button" class="tablinks" onclick="openTab(event, '1')" id="defaultOpen">รายละเอียดแจ้งขอเลือด</button>
                                <button type="button" class="tablinks" id="btnTab2" onclick="openTab(event, '2')">รายละเอียดการแพ้เลือด</button>
                                <button type="button" class="tablinks" id="btnTab3" onclick="openTab(event, '3')">รายละเอียดการคืนเลือด</button>
                            </div>

                            <div id="1" class="tabcontent">
                                <?php include('askforblood-tab1detail.php'); ?>
                            </div>

                            <div id="2" class="tabcontent">
                                <?php include('askforblood-tab2allergictoblood.php'); ?>
                            </div>

                            <div id="3" class="tabcontent">
                                <?php include('askforblood-tab3returnblood.php'); ?>
                            </div>
                        </div>




                    </div>

                    <div class="div-save col-xs-12">
                        <div class="save-bottom">
                            <div class="form-group text-right m-b-0">
                                <div>
                                    <button id="btnSave" class="btn btn-primary" type="submit">
                                        <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                    </button>
                                    <?php if (checkPermission("BK_BLOOD_REQUEST", "AD")) { ?>
                                        <button type="button" onclick="newPage()" class="btn btn-success m-l-5">
                                            <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                                        </button>
                                    <?php } ?>
                                    <?php if (checkPermission("BK_BLOOD_REQUEST", "DE")) { ?>
                                        <button id="btnReject" type="button" onclick="deleteRowReqBlood(this)" class="btn btn-danger m-l-5">
                                            <span class="btn-label"><i class="fa fa-trash"></i></span>ยกเลิกการขอจองเลือด
                                        </button>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- END content-page -->
                    <?php include('blood-antibody-modal.php'); ?>
                    <?php include('askforblood-tab1detailmodal.php'); ?>
                    <?php include('askforblood-tab1detail-bloodstock-modal.php'); ?>
                    <?php include('askforblood-tab1detail-wash-modal.php'); ?>
                    <?php include('askforblood-blood-stock.php'); ?>
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
                <script src="assets/js/modernizr.min.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/plugins/jquery-ui/jquery.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/moment.min.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/js/popper.min.js?ref=<?php echo rand(); ?>"></script>


                <script src="assets/js/detect.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/fastclick.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/jquery.blockUI.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/jquery.nicescroll.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/jquery.scrollTo.min.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/plugins/switchery/switchery.min.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/bootstrap.min.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/sweetalert/sweetalert.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/sweetalert/sweetalert.min.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/datepickerFormat.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/mgs.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/moment.min.js?ref=<?php echo rand(); ?>"></script>

                <!-- App js -->
                <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/js/EnterNext.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/js/askforblood.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/askforbloodtab1.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/askforbloodtab1tablereq.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/askforbloodtab2tablereq.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/askforbloodtab3tablereq.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
                <!-- BEGIN Java Script for this page -->

                <!-- END Java Script for this page -->

                <script>
                    socket.on('askforblood', function(data) {
                        console.log(data);
                        if (data && data != "") {
                            var myArr = data.split(",");

                            $.each(myArr, function(ind, v) {

                                if (v != "")
                                    if (v == $("#requestbloodid").val()) {
                                        loadDataReqSinger(v);
                                    }

                            })

                        }

                    });

                    $(document).ready(function() {
                        dateBE('.date1');
                        dateBE('.date99');
                        $('#bloodallergyrecorder').select2({
                            allowClear: true,
                            theme: "bootstrap",
                            width: "100%"
                        });
                        $('#user_testblood').select2({
                            allowClear: true,
                            theme: "bootstrap",
                            width: "100%"
                        });


                        $('#myform').submit(function() {

                            if (checkDateRequestBlood()) {
                                const callback = function(inputValue) {};
                                mgsError("ขออภัยค่ะ!", "กรุณาระบุวันที่ใช้เกล็ดเลือด", callback);

                                return false;
                            }
                            var cancel = $('#requestbloodstatusid').val();
                            var data = getFormData($("#myform"));
                            data['requestblooddetail'] = JSON.stringify(getTableRequestBlood());
                            data['allergictoblood'] = JSON.stringify(getAllergicToBlood());
                            data['returnblood'] = JSON.stringify(getReturnBlood());
                            data['testblood'] = JSON.stringify(getTestBlood());
                            data['formbloodemergency'] = JSON.stringify(getEmergencyRoom());

                            if (cancel == 4) {
                                const callback = function(inputValue) {};
                                mgsError("ขออภัยค่ะ!", "รายการนี้ ยกเลิก แล้ว", callback);

                                return false;
                            }

                            if (!checkTableRequestBlood()) {
                                const callback = function(inputValue) {};
                                mgsError("ขออภัยค่ะ!", "กรุณาเพิ่ม TYPE OF REQUEST", callback);

                                return false;
                            }

                            spinnershow();
                            $.ajax({
                                type: 'POST',
                                url: 'askforbloodsave.php',
                                data: data,
                                dataType: 'json',
                                complete: function() {
                                    var delayInMilliseconds = 200;
                                    setTimeout(function() {
                                        spinnerhide();
                                    }, delayInMilliseconds);
                                },
                                success: function(data) {
                                    console.log(data.requestbloodcrossmacthid);
                                    if (data.status == 1) {

                                        if (getReturnBloodCK())
                                            printReturnBloodViewForm();

                                        myAlertTop();
                                        loadDataReqSinger(data.id);
                                        socket.emit('askforblood', data.id);
                                        clearEmergencyRoom();




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

                        function getAllergicToBlood() {
                            var arr = [];
                            var rows = document.getElementById("list_table_allergic_to_blood").rows;
                            for (var i = 1; i < rows.length; i++) {
                                arr.push(rows[i].cells[0].innerHTML);
                            }
                            return arr;

                        }

                        function getReturnBlood() {
                            var arr = [];
                            var rows = document.getElementById("list_table_return_blood").rows;
                            for (var i = 2; i < rows.length; i++) {
                                arr.push(rows[i].cells[0].innerHTML);
                            }
                            return arr;

                        }




                        function getReturnBloodCK() {
                            var status = false;
                            var rows = document.getElementById("list_table_return_blood").rows;
                            for (var i = 2; i < rows.length; i++) {
                                var dataArray = JSON.parse(JSON.parse(JSON.stringify(rows[i].cells[0].innerHTML).replace(/null/g, '""').replace(/"\"\""/g, '""')));

                                if (dataArray.ischeck_return) {
                                    status = true;
                                }
                            }
                            return status;

                        }

                        function getTestBlood() {
                            var arr = [];
                            var rows = document.getElementById("list_table_test_blood").rows;
                            for (var i = 1; i < rows.length; i++) {
                                arr.push(rows[i].cells[0].innerHTML);
                            }
                            return arr;

                        }

                        function getEmergencyRoom() {
                            var arr = [];
                            var rows = document.getElementById("list_table_json_out").rows;
                            for (var i = 1; i < rows.length; i++) {
                                arr.push(rows[i].cells[0].innerHTML);
                            }
                            return arr;

                        }

                        function clearEmergencyRoom() {
                            var body = document.getElementById("list_table_json_out").getElementsByTagName('tbody')[0];
                            while (body.firstChild) {
                                body.removeChild(body.firstChild);
                            }

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



                        document.getElementById("defaultOpen").click();

                    });

                    function printRequestBlood() {
                        var id = $('#requestbloodid').val();
                        var hn = $('#hn').val();
                        var report = "blood_request_form_bk";
                        var bloodnotificationtypeid = $("#bloodnotificationtypeid").val();
                        var bloodsampletube1 = document.getElementById("bloodsampletube1").checked;
                        var bloodsampletube2 = document.getElementById("bloodsampletube2").checked;
                        if (bloodnotificationtypeid == 2 && bloodsampletube1) {
                            report = "blood_request_form_1"
                        } else if (bloodnotificationtypeid == 2 && bloodsampletube2) {
                            report = "blood_request_form_2"
                        } else if (getTableRequestBloodRedCell() && bloodsampletube1) {
                            report = "blood_request_form_3"
                        } else if (getTableRequestBloodRedCell() && bloodsampletube2) {
                            report = "blood_request_form_4"
                        } else if (bloodsampletube1) {
                            report = "blood_request_form_5"
                        } else if (bloodsampletube2) {
                            report = "blood_request_form_6"
                        }

                        printJS({
                            printable: localurl + "/report/requestblood.php?id=" + id + "&report=" + report + "&hn=" + hn,
                            type: 'pdf',
                            showModal: true
                        });

                    }

                    function getTableRequestBloodRedCell() {

                        var status = false;
                        var rows = document.getElementById("list_table_tab1").rows;
                        for (var i = 1; i < rows.length; i++) {
                            var v = rows[i].cells[2].children[0].value;
                            if (v == "LDPRC" || v == "LDSDR" || v == "LPRC" || v == "PRC" || v == "SDR") {
                                status = true;
                            }
                        }
                        return status;

                    }

                    function printRequestBloodViewForm() {


                        printJS({
                            printable: localurl + "/report/requestbloodviewform.php",
                            type: 'pdf',
                            showModal: true
                        });
                    }

                    function printBloodCancelViewForm() {
                        var id = $('#requestbloodid').val();
                        var report = "blood_request_patient_cancel_allergic";
                        var name_login = document.getElementById("name_login").innerHTML

                        printJS({
                            printable: localurl + "/report/report-form.php?id=" + id + "&report=" + report + "&name_login=" + name_login,
                            type: 'pdf',
                            showModal: true
                        });

                    }


                    function printReturnBloodViewForm() {

                        var id = getReturnBloodItemId();
                        printJS({
                            printable: localurl + "/report/blood-return-form.php?id=" + id,
                            type: 'pdf',
                            showModal: true
                        });
                    }

                    function newPage() {
                        window.location.href = 'askforblood.php';
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

                    function openTab(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";

                        setFind(cityName);

                        // if (document.getElementById("hn").value != "")
                        //     if (cityName == '1') {
                        //         document.getElementById("btnSave").style.visibility = "hidden"
                        //     } else if (cityName == '2') {
                        //     document.getElementById("btnSave").style.visibility = "visible"
                        // } else if (cityName == '3') {
                        //     document.getElementById("btnSave").style.visibility = "visible"
                        // }

                        if (cityName == '2')
                            document.getElementById("defaultOpen2").click();
                    }

                    function openTab2(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent2");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks2");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";

                        // if(cityName == '2')
                        // document.getElementById("defaultOpen2").click();
                    }

                    function setFind(tab) {
                        document.getElementById("printCard1").style.display = "none";
                        document.getElementById("printCard2").style.display = "none";
                        document.getElementById("printCard3").style.display = "none";
                        document.getElementById("printCard4").style.display = "none";

                        if (tab == "1") {
                            document.getElementById("printCard1").style.display = "block";
                            document.getElementById("printCard2").style.display = "block";
                            document.getElementById("printCard4").style.display = "block";

                        } else if (tab == "3") {
                            document.getElementById("printCard3").style.display = "block";
                        }
                    }

                    function openBloodBlank() {

                        count = 0;
                        var state = true;
                        $("#blankModalOut").modal('show');

                        var rows = document.getElementById("list_table_json_out").rows;
                        for (var i = 1; i < rows.length; i++) {
                            if (rows[i].cells[1].children[0].checked)
                                state = false;
                        }

                        if (false)
                            loadTableBloodPayStock();

                        setTimeout(function() {
                            // document.getElementById("rfidscancross").focus();
                        }, 1000);

                    }


                    function addBloodBlank() {
                        countAdsol();
                        $('#blankModalOut').modal('hide');
                    }

                    function closeBloodBlank() {
                        loadTableBloodPayStock();
                        $('#blankModalOut').modal('hide');
                    }

                    function getReturnBloodItemId() {
                        var id = '';
                        var rows = document.getElementById("list_table_return_blood").rows;
                        for (var i = 2; i < rows.length; i++) {
                            console.log(rows[i].cells[1].children[0]);
                            if (rows[i].cells[1].children[0])
                                if (rows[i].cells[1].children[0].checked) {
                                    var obj = JSON.parse(rows[i].cells[0].innerHTML);
                                    id += obj.requestbloodcrossmacthid + ',';
                                }

                        }
                        return lastString(id);

                    }

                    setEnableDisable(true);
                    setBloodDrillerIdStar(true);
                    setBloodCertifierLableStar(true);

                    function toStock() {
                        window.location.href = 'inventory-blood-bank.php';
                    }
                </script>
                <!-- BEGIN Java Script for this page -->



            </form>
    </body>

    </html>