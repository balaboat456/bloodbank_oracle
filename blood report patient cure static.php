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

        <title>8.สถิติการรักษาผู้ป่วยประจำปี</title>
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
                                    <h1 class="main-title float-left">8.สถิติการรักษาผู้ป่วยประจำปี</h1>
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

                            <div class="form-group col-md-3" id="div_fromdate">
                                <label for="inputCity">ปี</label>
                                <input autocomplete="off" type="text" value="<?php echo yearNowDMY() ?>" name="year" class="form-control" id="year">
                            </div>

                            <div class="form-group col-md-3">
                                <a style="margin-top: 7px;" role="button" href="#" onclick="search_query()" class="btn btn-info">
                                    <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                            </div>

                            <div class="div-save">
                                <div class="save-bottom">
                                    <div class="form-group text-right m-b-0">
                                        <div>

                                        <button onclick="reportPrint()" id="reportPrintPdf" class="btn btn-success" type="button">
                                            <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                                        </button>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-3">


                                    <form role="form" id="myform" method="POST" action="blood-disconnectsave.php" enctype="multipart/form-data">

                                        <div class="card-body">
                                            <div class="table-no-scroll">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>เดือน</th>
                                                            <th>Blood Letting</th>
                                                            <th>Blood Exchange</th>
                                                            <th>Washed Red Cell</th>
                                                            <th>Serum Tear</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_body_report">

                                                    </tbody>
                                                </table>
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
            

            function reportPrint() {
                

                var year = document.getElementById("year").value;

                printJS({
                            printable: localurl + "/report/report-patient-cure-static.php?year=" + year,
                            type: 'pdf',
                            showModal: true
                        });
            }

            function search_query() {

                var year = $("#year").val();
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report-patient-cure-static.php',
                    data: {
                        year: year
                    },
                    success: function(data) {
                     
                        var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                                var event_data = '';
                                le=ec=wa=se= 0;
                                $.each(obj, function(index, value) {
                                   
                                    event_data += '<tr  id="trblood' + (index) + '">';
                                    event_data += '<td  style="display:none;" >';
                                    event_data += JSON.stringify(value);
                                    event_data += '</td>';
                                    event_data += '<td style="text-align: left;">'+value.monthname+'</td>';
                                    event_data += '<td>'+value.let+'</td>';
                                    event_data += '<td>'+value.ex+'</td>';
                                    event_data += '<td>'+value.wash+'</td>';
                                    event_data += '<td>'+value.serum+'</td>';
                                    

                                    event_data += '</tr>';

                                    le += parseInt(value.let);
                                    ec += parseInt(value.ex);
                                    wa += parseInt(value.wash);
                                    se += parseInt(value.serum);
                                });
                                event_data += '<tr>';
                                event_data += '<td>รวมประจำปี</td>';
                                event_data += '<td>'+le+'</td>';
                                event_data += '<td>'+ec+'</td>';
                                event_data += '<td>'+wa+'</td>';
                                event_data += '<td>'+se+'</td>';
                                event_data += '</tr>';
                                $("#table_body_report").append(event_data);


                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });

               
            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>