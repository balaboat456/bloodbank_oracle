<?php



session_start();
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    include('checkPermission.php');

    if (!checkPermission("BK_RESULT_RECODE_LAB", "VW")) {
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
        <title>บันทึกผลการตรวจทางห้องปฏิบัติการ</title>
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

            .sticky {
                box-shadow: 0 5px 10px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
                background: #d7ecff;
                z-index: 990;
                position: fixed;
                top: 0px;
                padding-top: 30px;
                width: 100%;
                margin-left: -30px;
                height: 200px;
            }

            .stickyTab {
                padding-top: 40px;
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
                                    <h1 class="main-title float-left"> บันทึกผลการตรวจทางห้องปฏิบัติการ</h1>
                                    <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="row">
                                <div id="printCard1">
                                    <a role="button" onclick="printLabTestResultBloodBank()" class="btn btn-light"><span class="btn-label">
                                            <i class="fa fa-print"></i></span>รายงานรับรองผลตรวจ</a>
                                </div>

                            </div>
                        </div>

                        <!-- end row -->
                        <form role="form" id="myform" method="POST" action="" enctype="multipart/form-data">
                            <input hidden name="labcheckrequestid" id="labcheckrequestid">

                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>


                            <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->
                            <div id="searchBox" class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">ค้นหาข้อมูล</label>
                                    <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                                    <input type="text" name="patientid" onkeyup="setNewHN(this)" class="form-control" id="patientid" placeholder="HN" autofocus>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputCity">&nbsp;</label>
                                    <!-- <div>
                                    <a role="button" href="#" class="btn btn-primary" onclick="requestBloodLabModalShow()"
                                        data-toggle="modal"><span class="btn-label"><i
                                                class="fa fa-check"></i></span>ดูตรวจประวัติ</a>

                                </div> -->
                                </div>
                            </div>

                            <p>
                            <div id="prifileHeader" class="row" style="margin-bottom: -30px;margin-top: -20px;">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <img id="img_profile" src="assets/images/profile.png" class="img-profile" alt="Smiley face" height="120" width="110"><br />
                                        <label class="label-name-blod-icon"><i class="fa fa-tint"></label></i><label>&nbsp;&nbsp;Bl.Gr. </label> &nbsp;&nbsp;<label id="patientbloodgroup" class="label-name-bloodgroup">-</label>
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
                            </p>

                            <div class="form-group col-md-12">
                                <div class="tab">
                                    <button type="button" class="tablinks" onclick="openTab(event, '1')" id="defaultOpen">ข้อมูลขอตรวจ</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, '2')">ผลการทดสอบ</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, '3')">Follow 1</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, '4')">Follow 2</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, '5')">Follow 3</button>
                                    <button type="button" class="tablinks" onclick="openTab(event, '6')">ลูก&สามี</button>
                                </div>

                                <div id="1" class="tabcontent">
                                    <?php include('test-result-blood-bank-tab1.php'); ?>
                                </div>

                                <div id="2" class="tabcontent">
                                    <?php include('test-result-blood-bank-tab2.php'); ?>
                                </div>

                                <div id="3" class="tabcontent">
                                    <?php include('test-result-blood-bank-tab3.php'); ?>
                                </div>

                                <div id="4" class="tabcontent">
                                    <?php include('test-result-blood-bank-tab4.php'); ?>
                                </div>

                                <div id="5" class="tabcontent">
                                    <?php include('test-result-blood-bank-tab5.php'); ?>
                                </div>

                                <div id="6" class="tabcontent">
                                    <?php include('test-result-blood-bank-tab6.php'); ?>
                                </div>
                            </div>




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

                    <!-- END content-page -->
                    <?php include('test-result-blood-bank-antibody-phenotype.php'); ?>
                    <?php include('test-result-blood-bank-modal.php'); ?>
                    <?php include('test-result-blood-bank-form-modal.php'); ?>

                    <?php include('test-result-blood-bank-tab-2-modal.php'); ?>
                    <?php include('test-result-blood-bank-tab-3-modal.php'); ?>
                    <?php include('test-result-blood-bank-tab-4-modal.php'); ?>
                    <?php include('test-result-blood-bank-tab-5-modal.php'); ?>

                    <?php include('test-result-blood-bank-tab2-modal-antibody.php'); ?>
                    <?php include('test-result-blood-bank-tab2-modal-antibody2.php'); ?>

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
                <script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
                <!-- App js -->
                <script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/js/EnterNext.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>


                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-loadtable.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-select.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-tab0.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-value-tab0.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-tab1.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-value-tab1.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-tab2.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-value-tab2.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-tab3.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-value-tab3.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-antibody-phenotype.js?ref=<?php echo rand(); ?>"></script>

                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-tab4.js?ref=<?php echo rand(); ?>"></script>
                <script src="assets/js/custom/test-result-blood-bank/test-result-blood-bank-event-value-tab4.js?ref=<?php echo rand(); ?>"></script>


                <!-- BEGIN Java Script for this page -->

                <!-- END Java Script for this page -->

                <script>
                    $(document).ready(function() {

                        $("#labconfirmbloodgroupid_0").select2({
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

                        $("#labconfirmbloodgroupid_1").select2({
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

                        $("#labconfirmbloodgroupid_2").select2({
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

                        $("#labconfirmbloodgroupid_3").select2({
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


                        $("#confirmbloodgroup_child").select2({
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

                        $("#confirmbloodgroup_child").select2({
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

                        $("#bloodgroup_child").select2({
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


                        $("#bloodgroup_father").select2({
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

                        $("#confirmbloodgroup_father").select2({
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


                        $("#labconfirmrhid_0").select2({
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

                        $("#labconfirmrhid_1").select2({
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

                        $("#labconfirmrhid_2").select2({
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

                        $("#labconfirmrhid_3").select2({
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

                        $("#labresult_child").select2({
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

                        $("#confirmrh_child").select2({
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


                        $("#labresult_father").select2({
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


                        $("#confirmrh_father").select2({
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

                        $("#labconfirmsalivaid_0").select2({
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

                        dateBE('.date1');
                        dateBE('.date');
                        $('#myform').submit(function() {

                            var data = getFormData($("#myform"));

                            var user_login = document.getElementById("name_login").innerHTML;

                            data['lab_type_of_request'] = JSON.stringify(getTableData("list_table_test_item", 1));

                            data['lab_abo_0_item'] = JSON.stringify(getTableData("list_table_abo_0", 2));
                            data['lab_rh_0_item'] = JSON.stringify(getTableData("list_table_rh_0", 1));
                            data['lab_antibodysceentest_0_item'] = JSON.stringify(getTableData("list_table_anti_sceen_0", 1));
                            data['lab_antibodyidentificationtest_0_item'] = JSON.stringify(getTableData("list_table_anti_iden_0", 1));
                            data['lab_salivatest_0_item'] = JSON.stringify(getTableData("list_table_saliva_0", 1));
                            data['lab_titration_0_item'] = JSON.stringify(getTableData("list_table_titration_0", 1));
                            data['lab_coldagglutinin_0_item'] = JSON.stringify(getTableData("list_table_coldagglutinin_0", 1));
                            data['lab_antibodyidentificationtestgetmethod_0_item'] = JSON.stringify(getTableData("list_table_anti_iden_get_method_0", 1));
                            data['lab_antibodysceentestgetmethod_0_item'] = JSON.stringify(getTableData("list_table_anti_sceen_get_method_0", 1));

                            data['lab_abo_1_item'] = JSON.stringify(getTableData("list_table_abo_1", 2));
                            data['lab_rh_1_item'] = JSON.stringify(getTableData("list_table_rh_1", 1));
                            data['lab_antibodysceentest_1_item'] = JSON.stringify(getTableData("list_table_anti_sceen_1", 1));
                            data['lab_antibodyidentificationtest_1_item'] = JSON.stringify(getTableData("list_table_anti_iden_1", 1));
                            data['lab_salivatest_1_item'] = JSON.stringify(getTableData("list_table_saliva_1", 1));
                            data['lab_titration_1_item'] = JSON.stringify(getTableData("list_table_titration_1", 1));
                            data['lab_coldagglutinin_1_item'] = JSON.stringify(getTableData("list_table_coldagglutinin_1", 1));
                            data['lab_antibodyidentificationtestgetmethod_1_item'] = JSON.stringify(getTableData("list_table_anti_iden_get_method_1", 1));
                            data['lab_antibodysceentestgetmethod_1_item'] = JSON.stringify(getTableData("list_table_anti_sceen_get_method_1", 1));

                            data['lab_abo_2_item'] = JSON.stringify(getTableData("list_table_abo_2", 2));
                            data['lab_rh_2_item'] = JSON.stringify(getTableData("list_table_rh_2", 1));
                            data['lab_antibodysceentest_2_item'] = JSON.stringify(getTableData("list_table_anti_sceen_2", 1));
                            data['lab_antibodyidentificationtest_2_item'] = JSON.stringify(getTableData("list_table_anti_iden_2", 1));
                            data['lab_salivatest_2_item'] = JSON.stringify(getTableData("list_table_saliva_2", 1));
                            data['lab_titration_2_item'] = JSON.stringify(getTableData("list_table_titration_2", 1));
                            data['lab_coldagglutinin_2_item'] = JSON.stringify(getTableData("list_table_coldagglutinin_2", 1));
                            data['lab_antibodyidentificationtestgetmethod_2_item'] = JSON.stringify(getTableData("list_table_anti_iden_get_method_2", 1));
                            data['lab_antibodysceentestgetmethod_2_item'] = JSON.stringify(getTableData("list_table_anti_sceen_get_method_2", 1));

                            data['lab_abo_3_item'] = JSON.stringify(getTableData("list_table_abo_3", 2));
                            data['lab_rh_3_item'] = JSON.stringify(getTableData("list_table_rh_3", 1));
                            data['lab_antibodysceentest_3_item'] = JSON.stringify(getTableData("list_table_anti_sceen_3", 1));
                            data['lab_antibodyidentificationtest_3_item'] = JSON.stringify(getTableData("list_table_anti_iden_3", 1));
                            data['lab_salivatest_3_item'] = JSON.stringify(getTableData("list_table_saliva_3", 1));
                            data['lab_titration_3_item'] = JSON.stringify(getTableData("list_table_titration_3", 1));
                            data['lab_coldagglutinin_3_item'] = JSON.stringify(getTableData("list_table_coldagglutinin_3", 1));
                            data['lab_antibodyidentificationtestgetmethod_3_item'] = JSON.stringify(getTableData("list_table_anti_iden_get_method_3", 1));
                            data['lab_antibodysceentestgetmethod_3_item'] = JSON.stringify(getTableData("list_table_anti_sceen_get_method_3", 1));

                            data['lab_abo_child'] = JSON.stringify(getTableData("list_table_abo_child", 2));
                            data['lab_rh_child'] = JSON.stringify(getTableData("list_table_rh_child", 1));


                            data['lab_abo_father'] = JSON.stringify(getTableData("list_table_abo_father", 2));
                            data['lab_rh_father'] = JSON.stringify(getTableData("list_table_rh_father", 1));

                            console.log(data);

                            var ele = document.getElementsByName('validation_tik');
                            var chk_v = 0;
                            for (var i = 0; i < ele.length; i++) {
                                if (ele[i].type == 'checkbox') {
                                    if (ele[i].checked == false) {
                                        chk_v = 1;
                                    }
                                }

                            }
                            if (chk_v == 0) {
                                spinnershow();
                                $.ajax({
                                    type: 'POST',
                                    url: 'test-result-blood-bank-save.php',
                                    data: data,
                                    dataType: 'json',
                                    complete: function() {
                                        var delayInMilliseconds = 200;
                                        setTimeout(function() {
                                            spinnerhide();
                                        }, delayInMilliseconds);
                                    },
                                    success: function(data) {
                                        if (data.status == 1) {
                                            myAlertTop();

                                            loadCheckRequestSingle(data.id)
                                            // document.getElementById("reportedby").value = data.v_user;
                                            // document.getElementById("reportedby_date").value = data.v_date;
                                            // document.getElementById("approvedby").value = data.a_user;
                                            // document.getElementById("approvedby_date").value = data.a_date;
                                            // saveSuccessLoadData(data.id);
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
                            } else {
                                chk_v = 0;
                                errorSwal_validate();

                            }

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

                        function getTableData(table = '', rFirst = 1) {
                            var arr = [];
                            var rows = document.getElementById(table).rows;
                            for (var i = rFirst; i < rows.length; i++) {

                                if (rows[i].cells[0])
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

                        document.getElementById("defaultOpen").click();

                    });

                    function errorSwal_validate($msg = "") {
                        swal({
                                title: "มีรายการที่ไม่ Validate",
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


                    function newPage() {
                        window.location.href = 'test-result-blood-bank.php';
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

                    }

                    function openTabLabForm(evt, cityName) {
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

                    }


                    function requestBloodLabModalShow() {
                        document.getElementById("defaultOpen").click();
                        $('#requestbloodlabmodal').modal('show');
                    }



                    function requestBloodLabModalClose() {
                        $('#requestbloodlabmodal').modal('hide');
                    }

                    function openSpecialTest(tab = "") {
                        $('#testrequestbloodlabmodal_' + tab).modal('show');
                    }

                    function labFormModalShow(id = "1") {

                        document.getElementById("defaultOpenLabForm").click();
                        loadLabForm(id);
                        $('#labformmodal').modal('show');
                    }

                    function labFormModalClose() {
                        $('#labformmodal').modal('hide');
                    }

                    function printLabTestResultBloodBank() {
                        var id = $('#labcheckrequestid').val();
                        printJS({
                            printable: localurl + "/report/test-result-blood-bank.php?id=" + id,
                            showModal: true
                        });
                    }

                    window.onscroll = function() {
                        offsetTopSetting()
                    };

                    var prifileHeader = document.getElementById("prifileHeader");

                    var sticky = prifileHeader.offsetTop;

                    function offsetTopSetting() {

                        if (window.pageYOffset >= sticky) {
                            prifileHeader.classList.add("sticky")

                            document.getElementById("headerbarElement").style.display = 'none';
                            document.getElementById("searchBox").style.visibility = 'hidden';
                            // document.getElementById("titlleBox").style.visibility = 'hidden';
                            document.getElementById("divSaveBox").style.top = '10px';

                        } else {
                            prifileHeader.classList.remove("sticky");
                            prifileHeader.classList.remove("stickyTab");
                            document.getElementById("headerbarElement").style.display = 'block';
                            document.getElementById("searchBox").style.visibility = 'visible';
                            // document.getElementById("titlleBox").style.visibility = 'visible';
                            document.getElementById("divSaveBox").style.top = '55px';
                        }
                    }
                </script>
                <!-- BEGIN Java Script for this page -->

                <script src="assets/plugins/select2/js/select2.min.js"></script>

                </form>
    </body>

    </html>