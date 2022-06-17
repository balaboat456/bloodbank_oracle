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

        <title>1.รายงาน Blood Collection</title>
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
                                    <h1 class="main-title float-left">1.รายงาน Blood Collection</h1>
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

                            <div class="form-group col-md-2" id="div_fromdate">
                                <label for="inputCity">ตั้งแต่วันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="fromdate" class="form-control date1" id="fromdate">
                            </div>

                            <div class="form-group col-md-2" id="div_todate">
                                <label for="inputCity">ถึงวันที่</label>
                                <input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="todate" class="form-control date1" id="todate">
                            </div>

                            <div class="form-group col-md-8">
                                <div class="form-group col-md-3">
                                    <a style="margin-top: 7px;" role="button" href="#" onclick="search_query()" class="btn btn-info">
                                        <span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                                </div>
                            </div>

                            <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                <div>
                                    <label class="form-check-label">
                                        สถานที่ : &emsp;
                                    </label>
                                    <label class="form-check-label">
                                        <input checked class="check3" type="radio" id="placeid1" name="placeid" value="1" onclick="checkBox(this);placeidClick(1);">
                                        รพ.ราชวิถี
                                    </label>&emsp;
                                    <label class="form-check-label">
                                        <input class="check3" type="radio" id="placeid2" name="placeid" value="2" onclick="checkBox(this);placeidClick(2);">
                                        หน่วยเคลื่อนที่
                                    </label>&emsp;
                                    <label class="form-check-label">
                                        <input class="check3" type="radio" id="placeid3" name="placeid" value="3" onclick="checkBox(this);placeidClick(3);">
                                        กิจกรรม
                                    </label>


                                </div>
                            </div>

                            <div class="form-group col-md-3" style="display:none;" id="isunitofficeblock">
                                <div class="input-group  mb-2 mr-sm-2 mb-sm-0">
                                    <select style="width: 50%;" id="unitnameid" name="unitnameid" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3" style="display:none;" id="isactivityblock">
                                <div class="input-group  mb-2 mr-sm-2 mb-sm-0">
                                    <select id="activityid" class="form-control" name="activityid">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3" id="div_donation_status">
                                &emsp;&emsp;&emsp;&emsp;<label>สถานะบริจาค</label>&emsp;
                                <input type="radio" class="radio_donate" name="donation" id="donate1" value="1"> บริจาคได้&emsp;
                                <input type="radio" class="radio_donate" name="donation" id="donate2" value="2"> ไม่ได้
                            </div>



                            <div class="div-save">
                                <div class="save-bottom">
                                    <div class="form-group text-right m-b-0">
                                        <div>
                                            <button id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
                                                <span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
                                            </button>
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
                                                <table id="list_table_json_out_stock">
                                                    <thead id="tr_collection">
                                                        <tr>
                                                            <th class="td-table" style="width:3%">No.</th>
                                                            <th class="td-table" style="width:5%">วันที่บริจาค</th>
                                                            <th class="td-table" style="width:8%">Unit No.</th>
                                                            <th class="td-table" style="width:20%">Name</th>
                                                            <th class="td-table" style="width:4%">Age</th>
                                                            <th class="td-table" style="width:4%">Bl.Gr.</th>
                                                            <th class="td-table" style="width:8%">ประเภทการบริจาค</th>
                                                            <th class="td-table" style="width:13%">ชนิดถุง</th>
                                                            <th class="td-table" style="width:6%">ครั้งที่บริจาค</th>
                                                            <th class="td-table" style="width:6%">สถานะบริจาค</th>
                                                            <th class="td-table">หมายเหตุ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="td_collection">


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
        <script src="assets/printJS/print.min.js"></script>
        <link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />

        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>



        <!-- BEGIN Java Script for this page -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/custom/patient/patient-loadtable.js"></script>
        <script>
            // START CODE Show / hide columns dynamically DATA TABLE 		

            // START CODE Individual column searching (text inputs) DATA TABLE 		
            $(document).ready(function() {
                dateBE('.date1');

                $("#unitnameid").select2({
                    allowClear: true,
                    width: "100%",
                    theme: "bootstrap",
                    placeholder: "",
                    // tags: [],
                    ajax: {
                        url: "data/masterdata/donatmobileunit.php",
                        dataType: "json",
                        type: "GET",
                        quietMillis: 50,
                        data: function(keyword) {
                            return {
                                keyword: keyword.term,
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data.data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.dmu_name,
                                    };
                                }),
                            };
                        },
                    },
                });

                $('#activityid').select2({
                    allowClear: true,
                    width: "250px",
                    theme: "bootstrap",
                    placeholder: "",
                    ajax: {
                        cache: true,
                        url: 'data/masterdata/donate-activity.php',
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
                                        id: item.activityid,
                                        text: item.activityname,
                                        item: item
                                    }
                                })
                            };
                        },
                    }
                });
            });

            function search_query() {
                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;
                var donation_status1 = document.getElementById("donate1").checked;
                var donation_status2 = document.getElementById("donate2").checked;

                var donation_status = 0;
                if (donation_status1 == true) {
                    donation_status = 1;
                } else if (donation_status2 == true) {
                    donation_status = 2;
                }



                var unitnameid = document.getElementById("unitnameid").value;
                if (unitnameid == '') {
                    unitnameid = 0;
                }
                var activityid = document.getElementById("activityid").value;
                if (activityid == '') {
                    activityid = 0;
                }

                var fromyear = fromdate2.substr(-4, 4);
                var toyear = todate2.substr(-4, 4);

                var frommouth = fromdate2.substr(-7, 2);
                var tomouth = todate2.substr(-7, 2);

                var fromday = fromdate2.substr(0, 2);
                var today = todate2.substr(0, 2);

                var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                var todate = toyear + '-' + tomouth + '-' + today;

                var placeid = "1";
                if (document.getElementById("placeid2").checked) {
                    placeid = "2";
                } else if (document.getElementById("placeid3").checked) {
                    placeid = "3";
                }

                var fetch_th = '';

                // alert(fromdate);
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/report_every_thing11.php',
                    data: {
                        fromdate: fromdate,
                        todate: todate,
                        unitnameid: unitnameid,
                        donation_status: donation_status,
                        activityid: activityid,
                        placeid: placeid
                    },
                    success: function(data) {
                        document.getElementById('td_collection').innerHTML = data.data;
                        console.log(data.data);
                        if (placeid == '2') {
                            fetch_th += '<th class = "td-table" style = "width:3%" > No. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:5%" > วันที่บริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:8%" > Unit No. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:20%" > Name </th> ';
                            fetch_th += '<th class = "td-table" style = "width:4%" > Age </th> ';
                            fetch_th += '<th class = "td-table" style = "width:4%" > Bl.Gr. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:8%" > ประเภทการบริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:10%" > ชนิดถุง </th> ';
                            fetch_th += '<th class = "td-table" style = "width:6%" > ครั้งที่บริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:6%" > สถานะบริจาค </th> ';
                            fetch_th += '<th class = "td-table"> หน่วยเคลื่อนที่ </th> ';
                            fetch_th += '<th class = "td-table"> หมายเหตุ </th>';
                        } else if (placeid == '3') {
                            fetch_th += '<th class = "td-table" style = "width:3%" > No. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:5%" > วันที่บริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:8%" > Unit No. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:20%" > Name </th> ';
                            fetch_th += '<th class = "td-table" style = "width:4%" > Age </th> ';
                            fetch_th += '<th class = "td-table" style = "width:4%" > Bl.Gr. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:8%" > ประเภทการบริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:10%" > ชนิดถุง </th> ';
                            fetch_th += '<th class = "td-table" style = "width:6%" > ครั้งที่บริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:6%" > สถานะบริจาค </th> ';
                            fetch_th += '<th class = "td-table"> กิจกรรม </th> ';
                            fetch_th += '<th class = "td-table"> หมายเหตุ </th>';
                        } else {
                            fetch_th += '<th class = "td-table" style = "width:3%" > No. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:5%" > วันที่บริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:8%" > Unit No. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:20%" > Name </th> ';
                            fetch_th += '<th class = "td-table" style = "width:4%" > Age </th> ';
                            fetch_th += '<th class = "td-table" style = "width:4%" > Bl.Gr. </th> ';
                            fetch_th += '<th class = "td-table" style = "width:8%" > ประเภทการบริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:10%" > ชนิดถุง </th> ';
                            fetch_th += '<th class = "td-table" style = "width:6%" > ครั้งที่บริจาค </th> ';
                            fetch_th += '<th class = "td-table" style = "width:6%" > สถานะบริจาค </th> ';
                            fetch_th += '<th class = "td-table"> หมายเหตุ </th>';
                        }
                        document.getElementById('tr_collection').innerHTML = fetch_th;
                    },
                    error: function(data) {
                        console.log("errrrr");
                    },
                });
            }

            function reportPrint() {
                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;
                var donation_status1 = document.getElementById("donate1").checked;
                var donation_status2 = document.getElementById("donate2").checked;

                var donation_status = 0;
                if (donation_status1 == true) {
                    donation_status = 1;
                } else if (donation_status2 == true) {
                    donation_status = 2;
                }



                var unitnameid = document.getElementById("unitnameid").value;
                if (unitnameid == '') {
                    unitnameid = 0;
                }
                var activityid = document.getElementById("activityid").value;
                if (activityid == '') {
                    activityid = 0;
                }

                var fromyear = fromdate2.substr(-4, 4);
                var toyear = todate2.substr(-4, 4);

                var frommouth = fromdate2.substr(-7, 2);
                var tomouth = todate2.substr(-7, 2);

                var fromday = fromdate2.substr(0, 2);
                var today = todate2.substr(0, 2);

                var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                var todate = toyear + '-' + tomouth + '-' + today;

                var placeid = "1";
                if (document.getElementById("placeid2").checked) {
                    placeid = "2";
                } else if (document.getElementById("placeid3").checked) {
                    placeid = "3";
                }

                var fromtodate2 = ($('#fromdate').val() == $('#todate').val()) ? $('#todate').val() : $('#fromdate').val() + " - " + $('#todate').val();
                printJS({
                    printable: localurl + "/report/report-danate-11-blood-collection.php?fromdate=" +
                        fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 +
                        "&placeid=" + placeid +
                        "&unitnameid=" + unitnameid + "&activityid=" + activityid + "&donation_status=" + donation_status,
                    type: 'pdf',
                    showModal: true
                });
            }

            function reportPrintExCel() {
                var fromdate2 = document.getElementById("fromdate").value;
                var todate2 = document.getElementById("todate").value;
                var donation_status1 = document.getElementById("donate1").checked;
                var donation_status2 = document.getElementById("donate2").checked;

                var donation_status = 0;
                if (donation_status1 == true) {
                    donation_status = 1;
                } else if (donation_status2 == true) {
                    donation_status = 2;
                }



                var unitnameid = document.getElementById("unitnameid").value;
                if (unitnameid == '') {
                    unitnameid = 0;
                }
                var activityid = document.getElementById("activityid").value;
                if (activityid == '') {
                    activityid = 0;
                }

                var fromyear = fromdate2.substr(-4, 4);
                var toyear = todate2.substr(-4, 4);

                var frommouth = fromdate2.substr(-7, 2);
                var tomouth = todate2.substr(-7, 2);

                var fromday = fromdate2.substr(0, 2);
                var today = todate2.substr(0, 2);

                var fromdate = fromyear + '-' + frommouth + '-' + fromday;
                var todate = toyear + '-' + tomouth + '-' + today;

                var placeid = "1";
                if (document.getElementById("placeid2").checked) {
                    placeid = "2";
                } else if (document.getElementById("placeid3").checked) {
                    placeid = "3";
                }

                var fromtodate2 = ($('#fromdate').val() == $('#todate').val()) ? $('#todate').val() : $('#fromdate').val() + " - " + $('#todate').val();

                window.open(localurl + "/report/report-danate-11-blood-collection-excel.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 +
                    "&placeid=" + placeid +
                    "&donation_status=" + donation_status + "&unitnameid=" + unitnameid + "&activityid=" + activityid);
            }

            function checkBox(v) {
                if (v.previous) {
                    v.checked = false;
                }
                v.previous = v.checked;
            }

            function placeidClick(id = 1) {

                if (id == 1) {
                    // document.getElementById("placeid1").style.display = "block";
                    // document.getElementById("placeid2").style.display = "none";
                    // document.getElementById("placeid3").style.display = "none";
                    document.getElementById("isunitofficeblock").style.display = "none";
                    document.getElementById("isactivityblock").style.display = "none";
                    console.log(id);
                } else if (id == 2) {
                    document.getElementById("isunitofficeblock").style.display = "block";
                    document.getElementById("isactivityblock").style.display = "none";
                    document.getElementById("isunitofficeblock").hidden = false;
                    // document.getElementById("placeid1").style.display = "none";
                    // document.getElementById("placeid2").style.display = "block";
                    // document.getElementById("placeid3").style.display = "none";
                    console.log(id);
                    // document.getElementById("unitnameid").focus();
                } else if (id == 3) {
                    document.getElementById("isunitofficeblock").hidden = true;
                    document.getElementById("isactivityblock").style.display = "block";
                    // document.getElementById("placeid1").style.display = "none";
                    // document.getElementById("placeid2").style.display = "none";
                    // document.getElementById("placeid3").style.display = "block"
                    console.log(id);;
                    // document.getElementById("activityid").focus();

                } else {
                    document.getElementById("placeid1").style.display = "block";
                    document.getElementById("placeid2").style.display = "none";
                    document.getElementById("placeid3").style.display = "none";
                }


                localStorage.setItem("placeid", id);

            }
            // END CODE Individual column searching (text inputs) DATA TABLE 	 	
        </script>
        <!-- END Java Script for this page -->

    </body>

    </html>