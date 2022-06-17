<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

    include('checkPermission.php');

    if (!checkPermission("BK_RECEIVE_LAB", "VW")) {
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

        <title>บันทึกรับสิ่งส่งตรวจจากการขอตรวจทางห้องปฏิบัติการ</title>

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
                text-align: left;
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
                                    <h1 class="main-title float-left"> บันทึกรับสิ่งส่งตรวจจากการขอตรวจทางห้องปฏิบัติการ</h1>
                                    <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <form role="form" id="myform" method="POST" action="get-request-blood-lab-save.php" enctype="multipart/form-data">

                            <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                            <div class=" message" align="center">

                            </div>


                            <!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->

                            <p>


                    </div>
                    </p>

                    <div class="form-group col-md-12">
                        <?php include('get-request-blood-lab-body.php'); ?>
                    </div>

                </div>

                <div class="div-save">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <div>
                                <button id="btnSave" class="btn btn-primary" type="submit">
                                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                                </button>

                            </div>


                        </div>

                    </div>


                </div>

                <!-- END content-page -->
                <?php include('request-blood-lab-modal.php'); ?>
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

            <script src="assets/js/custom/get-request-blood-lab/get-request-blood-lab-loadtable.js"></script>
            <script src="assets/js/custom/get-request-blood-lab/get-request-blood-lab-select.js"></script>
            <script src="assets/js/custom/get-request-blood-lab/get-request-blood-lab-event.js"></script>
            <script src="assets/js/menu.js"></script>
            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                $(document).ready(function() {

                    loadTable();

                    dateBE('.date1');
                    $('#myform').submit(function() {

                        var checkresultbloodstatusid = "";

                        if (document.getElementById("checkresultbloodstatusidR").checked) {
                            checkresultbloodstatusid = "2";
                        } else if (document.getElementById("checkresultbloodstatusidN").checked) {
                            checkresultbloodstatusid = "99";
                        }

                        console.log(checkresultbloodstatusid);

                        var data = getFormData($("#myform"));
                        data['checkresultbloodstatusid'] = checkresultbloodstatusid;

                        spinnershow();
                        $.ajax({
                            type: 'POST',
                            url: 'get-request-blood-lab-save.php',
                            data: data,
                            dataType: 'json',
                            complete: function() {
                                var delayInMilliseconds = 200;
                                setTimeout(function() {
                                    spinnerhide();
                                }, delayInMilliseconds);
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.status) {
                                    myAlertTop();
                                    loadTable();
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
                    $("#blankModalOut").modal('show');

                    setTimeout(function() {
                        // document.getElementById("rfidscancross").focus();
                    }, 1000);

                }

                function clickSearch() {
                    $('#requestbloodlabmodal').modal('show');
                }

                function closeSearch() {
                    $('#requestbloodlabmodal').modal('hide');
                }


                function addBloodBlank() {
                    $('#blankModalOut').modal('hide');
                }

                function closeBloodBlank() {
                    loadTableBloodPayStock();
                    $('#blankModalOut').modal('hide');
                }

                $("#hn").on('keydown', function(e) {
                    if (e.which == 13) {
                        loadTable();
                    }
                });
            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>

            </form>
    </body>

    </html>