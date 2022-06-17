<?php



session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    if (!checkPermission("BK_CROSSMATCH", "VW")) {
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

        <title>บันทึกผลตรวจเลือดผู้ป่วย/ผลการ cross-match</title>
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
            }

            .font_patient {
                font-size: 20px;
            }

            .form-control {
                font-size: 20px !important;
                padding: 2px !important;
            }

            .sticky {
                box-shadow: 0 5px 10px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
                background: #d7ecff;
                z-index: 990;
                position: fixed;
                top: 0px;
                padding-top: 30px;
                width: 100%;
                margin-left: -30px;
                height: 220px;
            }

            .stickyTab {
                padding-top: 40px;
            }
        </style>

        <script>
            var username = "<?php echo "$username"; ?>";
            var fullname = "<?php echo "$fullname"; ?>";
            var session_staffid = "<?php echo $_SESSION['staffid']; ?>";
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


                        <div id="titlleBox" class="row">
                            <div id="mainform" class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">บันทึกผลตรวจเลือดผู้ป่วย/ผลการ cross-match</h1>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                        <div class=" message" align="center">

                        </div>

                        <div class="form-group col-md-12">


                            <div id="searchBox" class="row">

                                <div class="form-group col-md-3">
                                    <label for="inputCity">ค้นหาข้อมูลผู้ป่วย</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="patientid" class="form-control" id="patientid" onkeyup="setNewHN(this)" autofocus>
                                </div>

                                <div class="form-group col-md-9">
                                    <label for="inputCity">&nbsp;</label>
                                    <div>
                                        <a role="button" href="#" class="btn btn-primary" onclick="checkBloodModalShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ดูประวัติผลการ cross-match</a>

                                        <a role="button" href="#" class="btn btn-primary" onclick="checkBloodModalHistoryShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ดูประวัติผลตรวจ</a>
                                    </div>
                                </div>
                            </div>

                            <input hidden type="text" id="chk_bloodgroup">



                            <form role="form" id="myform" method="POST" action="check-patient-blood-save.php" enctype="multipart/form-data">


                                <?php echo "<script> var status = '" . $_SESSION['status'] . "'; </script>";
                                $_SESSION['status'] = '';  ?>

                                <p>
                                <div id="prifileHeader" class="row" style="margin-bottom: -30px;margin-top: -20px;">
                                    <div class="form-group col-md-2">
                                        <div class="form-check">
                                            <img id="img_profile" src="assets/images/profile.png" class="img-profile" alt="Smiley face" height="100" width="90"><br />
                                            <label id="labelNameBlodIcon" class="label-name-blod-icon"><i class="fa fa-meh-o fa-2x"></i>&nbsp;</label><label class="label-name-blod-icon"><i class="fa fa-tint"></label></i><label>&nbsp;&nbsp;Bl.Gr. </label> &nbsp;&nbsp;<label id="patientbloodgroup" class="label-name-bloodgroup">-</label><br>
                                            <label id="patientdead" class="label-name"></label>
                                        </div>
                                    </div>

                                    <div hidden class="form-group col-md-1">
                                        <label class="label-name-black">WT -</label><br>
                                        <label class="label-name-black">BT -</label><br>
                                        <label class="label-name-black">HR -</label><br>
                                        <label class="label-name-black">Temp. -</label><br>
                                        <label class="label-name-black">BMI -</label><br>
                                        <label class="label-name-black">LOS - Days</label><br>
                                    </div>
                                    <div hidden class="form-group col-md-1">
                                        <label class="label-name-black">HT -</label><br>
                                        <label class="label-name-black"></label><br>
                                        <label class="label-name-black">RR -</label><br>
                                        <label class="label-name-black">Pain -</label><br>
                                        <label class="label-name-black">BSA -</label><br>
                                    </div>
                                    <div class="form-group col-md-3 font_patient">
                                        <label class="label-name-black">HN</label> <label id="patienthn" class="label-name">-</label><br>
                                        <label class="label-name-black">AN</label> <label id="patientan" class="label-name">-</label><br>
                                        <label class="label-name-black">ID</label> <label id="patientidcard" class="label-name">-</label><br>
                                        <label>ประเภทผู้ป่วย <label id="patient_type" class="label-name">-</label></label><br>

                                    </div>
                                    <div class="form-group col-md-6 font_patient">
                                        <label class="label-name-black">ชื่อ-นามสกุล</label> <label class="label-name" id="patientfullname">-</label><br>
                                        <label class="label-name-black">อายุ</label> <label id="patientage" class="label-name">-</label> <label class="label-name-black">ปี</label><br>
                                        <label class="label-name-black">เพศ</label> <label id="patientgender" class="label-name">-</label><br>
                                        <label class="label-name-black">สิทธิการรักษา </label> <label id="patientinsurance" class="label-name">-</label><br>
                                    </div>
                                </div>

                                </p>

                                <div id="tabBox" class="form-group col-md-12">
                                    <div class="tab">
                                        <button type="button" class="tablinks" onclick="openTab(event, '1')" id="defaultOpen">บันทึกผลตรวจสอบเลือดผู้ป่วย</button>
                                        <button type="button" class="tablinks" onclick="openTab(event, '2')">บันทึกผลการ
                                            Crossmatch</button>
                                    </div>

                                    <div id="1" class="tabcontent">
                                        <?php include('check-patient-blood-tab1.php'); ?>
                                    </div>

                                    <div id="2" class="tabcontent">
                                        <?php include('check-patient-blood-tab2.php'); ?>
                                    </div>
                                    <div class="row">

                                        <div class="m-4 footer-printer-setting" style="left: 200px">
                                            <div class="row">
                                                <div class="form-check-label">
                                                    <div class="input-group">
                                                        <span class="input-group-text input-group-text-0">
                                                            <input onclick="setDefaultRadioPrinter('printer_p')" type="radio" id="printer_p" name="printer" class="">
                                                        </span>
                                                        <span class="input-group-text input-group-text-0">Preview</span>
                                                        <span class="input-group-text input-group-text-0">
                                                            <input onclick="setDefaultRadioPrinter('printer_a')" type="radio" id="printer_a" name="printer" class="" checked>
                                                        </span>
                                                        <span class="input-group-text input-group-text-0">Auto Print</span>
                                                        <select id="printernames" name="printernames" onchange="setDefaultPrinter(this.value)" class="form-control" style="width: 180px;">
                                                        </select>
                                                        <span class="input-group-text input-group-text-0" style="background: lightblue;" onclick="showPrinterSettingModal()">
                                                            <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;
                                                            จัดการเครื่องปริ้น

                                                        </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br /><br />
                                </div>

                                <div id="divSaveBox" class="div-save">
                                    <div class="save-bottom">
                                        <div class="form-group text-right m-b-0">
                                            <div>

                                                <button type="button" onclick="newPage()" class="btn btn-success m-l-5">
                                                    <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                                                </button>
                                                <button class="btn btn-primary" type="submit">
                                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                        </div>
                        <!-- END content-page -->
                        <?php include('blood-investigate-modal2.php'); ?>
                        <?php include('check-patient-blood-modal.php'); ?>
                        <?php include('check-patient-blood-modal-a-d-r.php'); ?>
                        <?php include('check-patient-blood-modal-r.php'); ?>
                        <?php include('check-patient-blood-history-modal.php'); ?>
                        <?php include('check-patient-blood-abo-history-modal.php'); ?>
                        <?php include('check-patient-blood-cross-match-modal-log.php'); ?>


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
                    <script src="assets/js/printer-setting.js?ref=<?php echo rand(); ?>"></script>
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
                    <script src="assets/js/mgs.js?ref=<?php echo rand(); ?>"></script>

                    <!-- App js -->
                    <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>

                    <script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood-loadtable.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood-event.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood-event-auto-blood.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood-event2.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood-history.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/check-patient-blood-abo-history.js?ref=<?php echo rand(); ?>"></script>
                    <script src="assets/js/antibody-phenotype-event.js?ref=<?php echo rand(); ?>"></script>


                    <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>

                    <!-- BEGIN Java Script for this page -->

                    <!-- END Java Script for this page -->

                    <script>
                        socket.on('queue', function(data) {
                            console.log(data);
                            if (data && data != "") {
                                var myArr = data.split(",");

                                $.each(myArr, function(ind, v) {

                                    if (v != "")
                                        if (v == $("#requestbloodid").val()) {
                                            loadTableCheckBloodSign();
                                        }

                                })

                            }

                        });

                        $(document).ready(function() {

                            $("#confirmsceen").select2({
                                width: "100%",
                                theme: "bootstrap",
                            });

                            $("#confirmbloodgroup").select2({
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

                            $("#confirmrhid").select2({
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


                            $("#myform").bind("keypress", function(e) {
                                if (e.keyCode == 13) {
                                    return false;
                                }
                            });

                            $('#myform').submit(function(e) {

                                var data = getFormData($("#myform"));

                                var arr = findBloodABO(document.getElementById("list_table_abo"));
                                data['arrABO'] = JSON.stringify(arr);

                                console.log(arr);

                                var arr = findAntibodySceenTest(document.getElementById("list_table_anti_sceen"));
                                data['arrAnti'] = JSON.stringify(arr);

                                var arrIden = findAntibodyIdenTest(document.getElementById("list_table_anti_iden"));
                                data['arrIden'] = JSON.stringify(arrIden);

                                var arrRh = findRh(document.getElementById("list_table_rh"));
                                data['arrRh'] = JSON.stringify(arrRh);

                                var arrCrossMatch = findCrossMatchItem(document.getElementById("list_table_tab2_2"));
                                data['arrCrossMatch'] = JSON.stringify(arrCrossMatch);

                                data['arrChangeABO'] = JSON.stringify(getTableRequestBloodABOHistory());

                                data['arrChangeCrossMatchItemState'] = "";

                                var cancel = $('#requestbloodstatusid').val();

                                if (data['arrCrossMatch'] != crossmatchitemold) {
                                    data['arrChangeCrossMatchItemState'] = "1";
                                }

                                if (cancel == 4) {
                                    const callback = function(inputValue) {};
                                    mgsError("ขออภัยค่ะ!", "รายการนี้ ยกเลิก แล้ว", callback);

                                    return false;
                                }

                                if (checkResultCrossMatchItem(document.getElementById("list_table_tab2_2"))) {
                                    swal({
                                            title: "กรุณาลงผล Result หมายเลขถุง " + bag_number_error,
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

                                            }
                                        });
                                    return false;
                                }

                                // console.log(data);
                                // data['requestblooddetail'] = JSON.stringify(getTableRequestBlood());
                                // return false;
                                spinnershow();
                                $.ajax({
                                    type: 'POST',
                                    url: 'check-patient-blood-save.php',
                                    dataType: 'json',
                                    data: data,
                                    complete: function() {
                                        var delayInMilliseconds = 200;
                                        setTimeout(function() {
                                            spinnerhide();
                                        }, delayInMilliseconds);
                                    },
                                    success: function(data) {
                                        if (data.status) {
                                            myAlertTop();
                                            socket.emit('crossmatch', data.id);
                                            $("#requestbloodid").val(data.id);
                                            loadTableCheckBloodSign();
                                            scanBarcode(document.getElementById('hn').value);
                                            // setReadOnlyTable(document.getElementById("list_table_tab2_2"));
                                            // loadTable();
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

                            function getTableRequestBloodABOHistory() {

                                var arr = [];
                                var rows = document.getElementById("list_request_blood_abo_history_modal").rows;
                                for (var i = 1; i < rows.length; i++) {
                                    arr.push(rows[i].cells[0].innerHTML);

                                }

                                return arr;
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

                            document.getElementById("defaultOpen").click();

                        });

                        function printCrossMatchSticker() {
                            var id = findCrossMatchItemPrint(document.getElementById("list_table_tab2_2"));
                            var idCryo = findCrossMatchItemPrintCryo(document.getElementById("list_table_tab2_2"));
                            var name_login = document.getElementById("name_login").innerHTML

                            var idArray = id.split(",");
                            var idCryoArray = idCryo.split(",");

                            console.log(idArray);
                            console.log(idCryo);



                            if (document.getElementById("printer_a").checked) {

                                var printQty = 0;

                                if (id != '')
                                    idArray.forEach(function(value, i) {

                                        console.log("=============" + i + "==============");

                                        var printer_url_auto = localurl + "/report/cross-match-sticker-auto.php?id=" + value + "&name_login=";

                                        console.log(printer_url_auto);
                                        var n = Date.now();
                                        var filenameram = "stickerbag" + n + makeid(5);

                                        var printers = getPrintterSetting();

                                        var printernames = $("#printernames").val();
                                        var printernamesArr = printernames.split("|");

                                        var dataReport = {
                                            "Printtername": printernamesArr[0],
                                            "Filename": filenameram,
                                            "Fileurl": printer_url_auto,
                                            "Numberset": 1,
                                            "username": printernamesArr[1]
                                        };

                                        console.log(dataReport);

                                        $.ajax({
                                            type: 'POST',
                                            url: 'report/printering-auto.php',
                                            data: dataReport,
                                            dataType: 'json',
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log('An error occurred.');
                                                console.log(data);
                                                myAlertTopError();
                                            },
                                        });

                                        wait(500);

                                    });



                                for (let i = 0; i <= 1; i++) {
                                    var idValue = '';
                                    if (idCryo != '') {

                                        var printer_url_auto = localurl + "/report/cross-match-sticker-auto.php?id=" + idCryo + "&name_login=" + "&cryoqty=1";

                                        var n = Date.now();
                                        var filenameram = "stickerbag" + n + makeid(5);

                                        var printers = getPrintterSetting();

                                        var printernames = $("#printernames").val();
                                        var printernamesArr = printernames.split("|");

                                        var dataReport = {
                                            "Printtername": printernamesArr[0],
                                            "Filename": filenameram,
                                            "Fileurl": printer_url_auto,
                                            "Numberset": 1,
                                            "username": printernamesArr[1]
                                        };


                                        console.log(dataReport);

                                        $.ajax({
                                            type: 'POST',
                                            url: 'report/printering-auto.php',
                                            data: dataReport,
                                            dataType: 'json',
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log('An error occurred.');
                                                console.log(data);
                                                myAlertTopError();
                                            },
                                        });

                                        wait(500);


                                        idCryoArray.forEach(function(value, i) {

                                            idValue += value + ",";

                                            if ((i + 9) % 8 == 0 || i == (idCryoArray.length - 1)) {

                                                var idValueNew = lastString(idValue);
                                                var printer_url_auto = localurl + "/report/cross-match-sticker-auto.php?id=" + idValueNew + "&name_login=";

                                                var n = Date.now();
                                                var filenameram = "stickerbag" + n + makeid(5);

                                                var printers = getPrintterSetting();

                                                var printernames = $("#printernames").val();
                                                var printernamesArr = printernames.split("|");

                                                var dataReport = {
                                                    "Printtername": printernamesArr[0],
                                                    "Filename": filenameram,
                                                    "Fileurl": printer_url_auto,
                                                    "Numberset": 1,
                                                    "username": printernamesArr[1]
                                                };

                                                console.log(dataReport);

                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'report/printering-auto.php',
                                                    data: dataReport,
                                                    dataType: 'json',
                                                    success: function(data) {
                                                        console.log(data);
                                                    },
                                                    error: function(data) {
                                                        console.log('An error occurred.');
                                                        console.log(data);
                                                        myAlertTopError();
                                                    },
                                                });

                                                wait(500);

                                                idValue = '';
                                            }

                                        });
                                    }

                                }





                            } else {

                                var idView = findCrossMatchItemPrintView(document.getElementById("list_table_tab2_2"));

                                var printer_url = localurl + "/report/cross-match-sticker.php?id=" + idView + "&name_login=";


                                printJS({
                                    printable: printer_url,
                                    type: 'pdf',
                                    showModal: true
                                });
                            }

                            $.ajax({
                                type: 'POST',
                                url: 'check-patient-blood-clear-print-save.php',
                                data: {
                                    requestbloodid: $("#requestbloodid").val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    console.log(data);
                                },
                                error: function(data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                    myAlertTopError();
                                },
                            });
                            findCrossMatchItemPrintClear(document.getElementById("list_table_tab2_2"));



                        }

                        function wait(ms) {
                            var start = new Date().getTime();
                            var end = start;
                            while (end < start + ms) {
                                end = new Date().getTime();
                            }
                        }

                        function openTab(evt, cityName) {
                            console.log(evt);
                            // alert(cityName);
                            if (cityName == 2) {
                                var chk_bloodgroup = document.getElementById("chk_bloodgroup").value;
                                if (chk_bloodgroup == '' && false) {
                                    errorSwal("กรุณาระบุ ผลหมู่โลหิต Rh ของผู้ป่วย");
                                } else {
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

                                    // setRequiredTable(document.getElementById("list_table_tab2_2"), cityName);
                                }
                            } else {
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

                                // setRequiredTable(document.getElementById("list_table_tab2_2"), cityName);
                            }


                        }

                        function setRequiredTable(table, tab) {
                            var arrCell = [];
                            var arrRow = [];
                            var r = 2;
                            while (row = table.rows[r++]) {
                                var c = 0;
                                while (cell = row.cells[c++]) {
                                    if (c == 16)
                                        cell.children[0].required = (tab == 2);

                                }
                            }

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

                        function newPage() {
                            window.location.href = 'check-patient-blood.php';
                        }
                        loadPhenotype();
                        setEnableDisable(true);

                        window.onscroll = function() {
                            offsetTopSetting()
                        };

                        var prifileHeader = document.getElementById("prifileHeader");
                        var tabBox = document.getElementById("tabBox");

                        var sticky = prifileHeader.offsetTop;

                        function offsetTopSetting() {

                            if (window.pageYOffset >= sticky) {
                                prifileHeader.classList.add("sticky")
                                tabBox.classList.add("stickyTab")

                                document.getElementById("headerbarElement").style.display = 'none';
                                document.getElementById("searchBox").style.visibility = 'hidden';
                                document.getElementById("titlleBox").style.visibility = 'hidden';
                                document.getElementById("divSaveBox").style.top = '10px';

                            } else {
                                prifileHeader.classList.remove("sticky");
                                prifileHeader.classList.remove("stickyTab");
                                document.getElementById("headerbarElement").style.display = 'block';
                                document.getElementById("searchBox").style.visibility = 'visible';
                                document.getElementById("titlleBox").style.visibility = 'visible';
                                document.getElementById("divSaveBox").style.top = '55px';
                            }
                        }
                    </script>
                    <!-- BEGIN Java Script for this page -->

                    <script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>

                    </form>
    </body>

    </html>