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

        <title>5.สถิติการตรวจทางห้องปฏิบัติการ</title>
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

            .textAlignVer {
                display: block;
                filter: flipv fliph;
                -webkit-transform: rotate(-90deg);
                -moz-transform: rotate(-90deg);
                transform: rotate(-90deg);
                white-space: nowrap;
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
                                    <h1 class="main-title float-left">5.สถิติการตรวจทางห้องปฏิบัติการ</h1>
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
                                                <table cellspacing="0" cellpadding="0">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 150px" height="200">เดือน</th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">ABO</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Rh(D)</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">DAT</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">IAT</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">AbIden(gel)</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">AbIden(Tube)</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Cold agglutinin</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Saliva test</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Rh typing</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Ab titration</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Adsorption</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Elution</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">IgG</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">C3d</span></th>
                                                            <th style="width: 100px" height="200"><span class="textAlignVer">Ab screening (Tube)</span></th>
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
            $(document).ready(function() {
                dateBE('.date1');

                $(".inspector").select2({
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    allowClear: true
                });

                $('#labunitroomid').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/labunitroom.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.labunitroomid,
                                        text: item.labunitroomname,
                                    }
                                })
                            };
                        },

                    }
                });

                $('#labform').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/labformsearch.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.labformid,
                                        text: item.labformname,
                                    }
                                })
                            };
                        },

                    }
                });

                $('#procedure').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/procedure.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.procedureid,
                                        text: item.procedurename,
                                    }
                                })
                            };
                        },

                    }
                });


                $('#requestunit').select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: 'data/masterdata/unitoffice.php',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.unitofficeid,
                                        text: "[" + item.unitofficecode + "] " + item.unitofficename,
                                    }
                                })
                            };
                        },

                    }
                })

                search_query();
            });

            function reportPrintExCel() {
                var fromdate = dmyToymd2($('#fromdate').val());
                var todate = dmyToymd2($('#todate').val());


                printJS({
                    printable: localurl + "/report/blood-report-cure-lab-excel.php?year=" + year,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrint() {

                var year = document.getElementById("year").value;

                printJS({
                    printable: localurl + "/report/blood-report-request-cure-lab-year-form.php?year=" + year,
                    type: 'pdf',
                    showModal: true
                });

            }

            function search_query() {
                var year = document.getElementById("year").value;
                // alert(inspector);
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report-request-cure-lab-year-form.php',
                    data: {
                        year: year
                    },
                    success: function(data) {
                        var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                        var event_data = '';
                        var la1=la2=la3=la4=la5=la6=la7=la8=la9=la10=la11=la12=la13=la14=la15= 0;
                        $.each(obj, function(index, value) {

                            event_data += '<tr  id="trblood' + (index) + '" onClick="chActive(' + (index) + ',' + obj.length + ')" >';
                            event_data += '<td  style="display:none;" >';
                            event_data += JSON.stringify(value);
                            event_data += '</td>';
                            event_data += '<td style="text-align: left;">' + value.MO + '</td>';
                            event_data += '<td>' + value.lab1 + '</td>';
                            event_data += '<td>' + value.lab2 + '</td>';
                            event_data += '<td>' + value.lab3 + '</td>';
                            event_data += '<td>' + value.lab4 + '</td>';
                            event_data += '<td>' + value.lab5 + '</td>';
                            event_data += '<td>' + value.lab6 + '</td>';
                            event_data += '<td>' + value.lab7 + '</td>';
                            event_data += '<td>' + value.lab8 + '</td>';
                            event_data += '<td>' + value.lab9 + '</td>';
                            event_data += '<td>' + value.lab10 + '</td>';
                            event_data += '<td>' + value.lab11 + '</td>';
                            event_data += '<td>' + value.lab12 + '</td>';
                            event_data += '<td>' + value.lab13 + '</td>';
                            event_data += '<td>' + value.lab14 + '</td>';
                            event_data += '<td>' + value.lab15 + '</td>';
                            event_data += '</tr>';
                            
                            la1 += parseInt(value.lab1);
                            la2 += parseInt(value.lab2);
                            la3 += parseInt(value.lab3);
                            la4 += parseInt(value.lab4);
                            la5 += parseInt(value.lab5);
                            la6 += parseInt(value.lab6);
                            la7 += parseInt(value.lab7);
                            la8 += parseInt(value.lab8);
                            la9 += parseInt(value.lab9);
                            la10 += parseInt(value.lab10);
                            la11 += parseInt(value.lab11);
                            la12 += parseInt(value.lab12);
                            la13 += parseInt(value.lab13);
                            la14 += parseInt(value.lab14);
                            la15 += parseInt(value.lab15);

                            
                        });
                        event_data +='<tr>';
                        event_data += '<td>รวมประจำปี</td>';
                        event_data += '<td>'+la1+'</td>';
                        event_data += '<td>'+la2+'</td>';
                        event_data += '<td>'+la3+'</td>';
                        event_data += '<td>'+la4+'</td>';
                        event_data += '<td>'+la5+'</td>';
                        event_data += '<td>'+la6+'</td>';
                        event_data += '<td>'+la7+'</td>';
                        event_data += '<td>'+la8+'</td>';
                        event_data += '<td>'+la9+'</td>';
                        event_data += '<td>'+la10+'</td>';
                        event_data += '<td>'+la11+'</td>';
                        event_data += '<td>'+la12+'</td>';
                        event_data += '<td>'+la13+'</td>';
                        event_data += '<td>'+la14+'</td>';
                        event_data += '<td>'+la15+'</td>';
                        event_data +='</tr>';
                        document.getElementById('table_body_report').innerHTML = event_data;
                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
            }

            function chActive(id, countReq) {

                for (i = 0; i < countReq; i++) {
                    document.getElementById("trblood" + i).style.background = "#FFF";
                }
                document.getElementById("trblood" + id).style.background = "#b7e4eb";

            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>