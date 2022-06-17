<?php

session_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

//include_once('common.php');

require_once('connection.php');
include('dateNow.php');

?>

<?php date_default_timezone_set('Asia/Bangkok'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include'include/title.php' ?>
    <title>จัดการผู้ใช้งาน</title>
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
        <?php include'setLocalUrl.php' ?>
        <?php include'top-nav.php' ?>
        <?php include'side-menu.php' ?>
        <!-- End bar navigation -->

        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">


                    <div class="row">
                        <div id="mainform" class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">จัดการผู้ใช้งาน</h1>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                        <!--<div class="alert alert-danger" role="alert" align="center"><!-->
                        <div class=" message" align="center">

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">ค้นหา</label>
                                <input type="text" name="patientid" class="form-control" id="patientid" >
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <div class="table-s-scroll" style="height:73vh;">
                                <table id="list_table_test_blood">
                                    <thead>
                                        <tr>
                                            <th class="td-table" style="width:250px">User Name</th>
                                            <th class="td-table" style="width:250px">ชื่อ-สกุล</th>
                                            <th class="td-table">หอผู้ป่วย</th>
                                            <th class="td-table" style="width:40px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                     

                </div>

                <div class="div-save">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <div>
                                <button onclick="addBlood()" class="btn btn-success" type="submit">
                                    <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- END content-page -->
                <?php include('formprint.php'); ?>
                <?php include'footer.php';?>
                <?php }

				

else {

	header('Location:index.php');

}

?>

            </div>
            <!-- END main -->

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

            <script src="assets/js/askforblood.js"></script>
            <script src="assets/js/askforbloodtab1.js"></script>
            <script src="assets/js/askforbloodtab1tablereq.js"></script>
            <script src="assets/js/askforbloodtab2tablereq.js"></script>
            <script src="assets/js/askforbloodtab3tablereq.js"></script>
            <!-- BEGIN Java Script for this page -->

            <!-- END Java Script for this page -->

            <script>
                $(document).ready(function () {
                    $('#myform').submit(function () {

                        var data = getFormData($("#myform"));

                        spinnershow();
                        $.ajax({
                            type: 'POST',
                            url: 'askforbloodsave.php',
                            data: data,
                            complete: function () {
                                var delayInMilliseconds = 200;
                                setTimeout(function () {
                                    spinnerhide();
                                }, delayInMilliseconds);
                            },
                            success: function (data) {
                                if (data) {
                                    myAlertTop();
                                    // loadTable();
                                } else {
                                    myAlertTopError();
                                }

                            },
                            error: function (data) {
                                console.log('An error occurred.');
                                console.log(data);
                                myAlertTopError();
                            },
                        });
                        return false;
                    });

                    function myAlertTop() {
                        $(".myAlert-top").show();
                        setTimeout(function () {
                            $(".myAlert-top").hide();
                        }, 5000);
                    }

                    function myAlertTopError() {
                        $(".myAlert-top-error").show();
                        setTimeout(function () {
                            $(".myAlert-top-error").hide();
                        }, 5000);
                    }

                });


                function myAlertTopDelete() {
                    $(".myAlert-top-delete").show();
                    setTimeout(function () {
                        $(".myAlert-top-delete").hide();
                    }, 5000);
                }

                function myAlertTopErrorDelete() {
                    $(".myAlert-top-error-delete").show();
                    setTimeout(function () {
                        $(".myAlert-top-error-delete").hide();
                    }, 5000);
                }

            </script>
            <!-- BEGIN Java Script for this page -->

            <script src="assets/plugins/select2/js/select2.min.js"></script>

</body>

</html>