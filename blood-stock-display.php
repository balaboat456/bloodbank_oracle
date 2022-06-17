<?php



session_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

//include_once('common.php');

require_once('connection.php');



?>

<?php

date_default_timezone_set('Asia/Bangkok');


$script_tz = date_default_timezone_get();



if (strcmp($script_tz, ini_get('date.timezone'))){

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

    <?php include'include/title.php' ?>

    <title>คลังเลือด</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/preload.css" rel="stylesheet" type="text/css" />

    <link href="assets/ninenik/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/ninenik/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css" />
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

        th {
            text-align: center;
            font-size: 30px;
            width: 13%;
        }

        td {
            text-align: center;
            font-size: 50px;
        }
    </style>
    <!-- END CSS for this page -->

</head>

<body class="adminbody">

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

        <?php include'top-nav.php' ?>

        <!-- End Navigation -->

        <!-- Left Sidebar -->

        <?php include'side-menu.php' ?>

        <!-- End Sidebar -->


        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">



                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">คลังเลือด</h1>
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

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="list_table_stock" class="table table-bordered table-hover display">
                                            <thead>
                                                <tr>
                                                    <th>หมู่เลือด</th>
                                                    <th>PRC</th>
                                                    <th>LPRC</th>
                                                    <th>LDPRC</th>
                                                    <th>FFP</th>
                                                    <th>PC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>A</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>AB</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>B</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                    <td>O</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div><!-- end card-->
                        </div>

                    </div>

                    <div class="div-save">
                        <div class="save-bottom">
                            <div class="form-group text-right m-b-0">
                                <button type="button" onclick="resetPage()" class="btn btn-warning m-l-5">
                                    <span class="btn-label"><i class="fa fa-refresh"></i></span>รีเฟซ
                                </button>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        <?php include'blood-blank-modal.php';?>
        <?php include'footer.php';?>
        <?php }



else {

	header('Location:index.php');

}

?>

    </div>
    <!-- END main -->

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>

    <script src="assets/js/DateTimeFormat.js"></script>


    <!-- App js -->
    <script src="assets/js/pikeadmin.js"></script>

    <!-- BEGIN Java Script for this page -->

    <script src="assets/ninenik/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/ninenik/jquery.datetimepicker.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/js/bloodstock.js"></script>
    

    <script>
        // START CODE Show / hide columns dynamically DATA TABLE 		

        // START CODE Individual column searching (text inputs) DATA TABLE 		
        $(document).ready(function () {

            loadTable();

            function loadTable() {

                $.ajax({
                    url: 'data/blood/bloodstockdisplay.php',
                    dataType: 'json',
                    type: 'get',
                    success: function (data) {

                        var body = document.getElementById("list_table_stock").getElementsByTagName(
                            'tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }

                        var event_data = '';
                        var prc = 0;
                        var lprc = 0;
                        var ldprc = 0;
                        var ffp = 0;
                        var pc = 0;
                        $.each(data.data, function (index, value) {
                            event_data += '<tr>';
                            event_data += '<td>' + value.bloodgroupid + '</td>';
                            event_data += '<td>' + ((value.prc > 0)?value.prc:'-') + '</td>';
                            event_data += '<td>' + ((value.lprc > 0)?value.lprc:'-') + '</td>';
                            event_data += '<td>' + ((value.ldprc > 0 )?value.ldprc:'-') + '</td>';
                            event_data += '<td>' + ((value.ffp > 0)?value.ffp:'-') + '</td>';
                            event_data += '<td>' + ((value.pc > 0)?value.pc:'-') + '</td>';
                            event_data += '</tr>';

                            prc += parseInt(value.prc);
                            lprc += parseInt(value.lprc);
                            ldprc += parseInt(value.ldprc);
                            ffp += parseInt(value.ffp);
                            pc += parseInt(value.pc);

                        });
                        event_data += '<tr>';
                        event_data += '<td><b>' + 'Total' + '</b></td>';
                        event_data += '<td><b>' + prc + '</b></td>';
                        event_data += '<td><b>' + lprc + '</b></td>';
                        event_data += '<td><b>' + ldprc + '</b></td>';
                        event_data += '<td><b>' + ffp + '</b></td>';
                        event_data += '<td><b>' + pc + '</b></td>';
                        event_data += '</tr>';
                        $("#list_table_stock").append(event_data);

                    },
                    error: function (d) {
                        /*console.log("error");*/
                        alert("404. Please wait until the File is Loaded.");
                    }
                });

            }

        });



        function resetPage() {
            location.reload();
        }

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

        if (status == 'successful') {
            myAlertTop();
        } else if (status == 'error') {
            myAlertTopError();
        }
        // END CODE Individual column searching (text inputs) DATA TABLE 	 	
    </script>
    <!-- END Java Script for this page -->

</body>

</html>