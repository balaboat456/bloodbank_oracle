<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
    include('checkPermission.php');

    if (!checkPermission("BK_REQUEST_LAB", "VW")) {
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

        <title>บันทึกขอตรวจทางห้องปฏิบัติการ</title>
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

            .text-muted {
                text-align: left;
            }

            .select2-container--open {
                z-index: 99999999999999;
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


            /* .sweet-alert
        {
            z-index: 1000 ;
        }

        .sweet-overlay
        {
            z-index: 900 ;
        } */
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
                                    <h1 class="main-title float-left"> บันทึกขอตรวจทางห้องปฏิบัติการ</h1>
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
                                    <a role="button" onclick="printLabRequestBloodSticker()" class="btn btn-light"><span class="btn-label">
                                            <i class="fa fa-print"></i></span>สติ๊กเกอร์ติดใบขอตรวจ</a>
                                </div>&emsp;
                                <div id="printCard2">
                                    <a role="button" onclick="printLabRequestBlood()" class="btn btn-light"><span class="btn-label">
                                            <i class="fa fa-print"></i></span>ใบขอตรวจ</a>
                                </div>&emsp;

                                <div class="m-4 footer-printer-setting" style="left: 400px">
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
                            <hr />
                        </div>


                        <!-- end row -->
                        <form role="form" id="myform" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">

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
                                    <input type="text" name="patientid" class="form-control" id="patientid" placeholder="HN" onkeyup="setNewHN(this)" autofocus>
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
                                <?php include('request-blood-lab-body.php'); ?>
                            </div>



                    </div>

                    <div id="divSaveBox" class="div-save">
                        <div class="save-bottom">
                            <div class="form-group text-right m-b-0">
                                <div>
                                    <button class="btn btn-primary" type="submit" id="btnSave" style="visibility:hidden;">
                                        <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                    </button>
                                    <button type="button" onclick="newPage()" class="btn btn-success m-l-5">
                                        <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                                    </button>
                                    <button type="button" onclick="deleteRequestBloodLab(this)" class="btn btn-danger m-l-5" id="btnCancel" style="visibility:hidden;">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span>ยกเลิกการตรวจ
                                    </button>

                                </div>


                            </div>

                        </div>


                    </div>

                    <!-- END content-page -->
                    <?php include('request-blood-lab-modal.php'); ?>
                    <?php include('request-blood-lab-form-modal.php'); ?>
                    <?php include('askforblood-tab1detailmodal.php'); ?>
                    <?php include('askforblood-tab1detail-bloodstock-modal.php'); ?>
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
                <script src="assets/js/printer-setting.js"></script>
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


                <script src="assets/js/custom/request-blood-lab/request-blood-lab-loadtable.js"></script>
                <script src="assets/js/custom/request-blood-lab/request-blood-lab-select.js"></script>
                <script src="assets/js/custom/request-blood-lab/request-blood-lab-event.js"></script>


                <!-- BEGIN Java Script for this page -->

                <!-- END Java Script for this page -->

                <script>
                    $(document).ready(function() {
                        dateBE('.date1');
                        dateBE('.date');
                        $('#myform').submit(function() {

                            var data = getFormData($("#myform"));
                            data['requestbloodlabitem'] = JSON.stringify(getTableRequestBloodLab());

                            spinnershow();
                            $.ajax({
                                type: 'POST',
                                url: 'request-blood-lab-save.php',
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
                                        console.log(data.id);
                                        document.getElementById("labcheckrequestid").value = data.id;
                                        saveSuccessLoadData(data.id);


                                    } else {
                                        myAlertTopError();
                                    }
                                    ttest = 0;
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

                        function getTableRequestBloodLab() {
                            var arr = [];
                            var rows = document.getElementById("request_blood_lab").rows;
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

                        document.getElementById("defaultOpen").click();

                    });


                    function newPage() {
                        window.location.href = 'request-blood-lab.php';
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

                        if (cityName == 2) {
                            document.getElementById("btnAddData").hidden = true;
                            document.getElementById("btnEditData").hidden = false;
                        } else {
                            document.getElementById("btnAddData").hidden = false;
                            document.getElementById("btnEditData").hidden = true;
                        }

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

                    function labFormModalShow(id = "1") {

                        document.getElementById("defaultOpenLabForm").click();
                        loadLabForm(id);
                        $('#labformmodal').modal('show');
                    }

                    function labFormModalClose() {
                        $('#labformmodal').modal('hide');
                    }

                    function printLabRequestBloodSticker() {
                        var id = $('#labcheckrequestid').val();

                        var printer_url = localurl + "/report/lab-record-request-blood-sticker.php?id=" + id;

                        if (document.getElementById("printer_a").checked) {
                            var n = Date.now();
                            var filenameram = "stickerbag" + n + makeid(5);

                            var printers = getPrintterSetting();

                            var printernames = $("#printernames").val();
                            var printernamesArr = printernames.split("|");

                            var dataReport = {
                                "Printtername": printernamesArr[0],
                                "Filename": filenameram,
                                "Fileurl": printer_url,
                                "username": printernamesArr[1]
                            };

                            spinnershow();
                            $.ajax({
                                type: 'POST',
                                url: 'report/printering-auto.php',
                                data: dataReport,
                                dataType: 'json',
                                complete: function() {
                                    var delayInMilliseconds = 200;
                                    setTimeout(function() {
                                        spinnerhide();
                                    }, delayInMilliseconds);
                                },
                                success: function(data) {
                                    console.log(data);
                                },
                                error: function(data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                    myAlertTopError();
                                },
                            });


                        } else {
                            printJS({
                                printable: printer_url,
                                type: 'pdf',
                                showModal: true
                            });
                        }


                    }



                    function printLabRequestBlood() {
                        var id = $('#labcheckrequestid').val();
                        printJS({
                            printable: localurl + "/report/lab-record-request-blood.php?id=" + id,
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