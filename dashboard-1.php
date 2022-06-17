<?php



session_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

//include_once('common.php');

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


    <?php include'include/title.php' ?>
    <title>Dashboard</title>

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
        <?php include'setLocalUrl.php' ?>
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
                        <div id="mainform" class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Dashboard</h1>
                                <!-- <ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Home</li>
									<li class="breadcrumb-item active">บันทึกผู้มาบริจาคโลหิต</li>
								</ol> -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>


                </div>

                

                <div class="row">

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                        <a >
                            <div class="card-box noradius noborder bg-default">

                                <i class="fa fa-server float-right text-white"></i>

                                <h6 class="text-white text-uppercase m-b-20">จำนวนเลือดในตู้</h6>

                                <h1 class="m-b-20 text-white counter" id="gatetotal">0
                                </h1>

                                <span class="text-white">ถุง</span>

                            </div>
                        </a>

                    </div>



                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                        <a href="inventory-blood-bank.php">
                            <div class="card-box noradius noborder bg-warning">


                                <i class="fa fa-database bigfonts float-right text-white"></i>

                                <h6 class="text-white text-uppercase m-b-20">จำนวนเลือดพร้อมใช้</h6>

                                <h1 class="m-b-20 text-white counter" id="bagnumbertotal">0
                                </h1>

                                <span class="text-white">ถุง</span>

                            </div>
                        </a>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">

                            <div class="card-body">


                                <fieldset class="form-group" id="row_bug_number">



                                </fieldset>



                            </div>
                        </div><!-- end card-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <div class="card mb-3">

                            <div class="card-header">

                                <h3><i class="fa fa-refresh"></i> ตารางนัดหมายผู้บริจาค/การรักษา</h3>

                            </div>
                            <div class="card-body">
                                <div class="widget-messages nicescroll" style="height: 400px;">
                                    <table id="list_table_json_appointment" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:60px">No.</th>
                                                <th style="width:140px">วันที่นัดหมาย</th>
                                                <th style="width:120px">HN</th>
                                                <th style="width:260px">เลขบัตรประจำตัวประชาชน</th>
                                                <th>ชื่อ-สกุล</th>
                                                <th>ส่วนงาน</th>
                                                <th>รายละเอียดการนัดหมาย</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
												$dateNow = dateNowTMD();
												$dateMouth = dateNowYMDMonth1() ;
											
												$strSQL = "SELECT
                                                *
                                                FROM
                                                (SELECT 	
                                                'นัดเจาะซ้ำ' AS typename,
                                                'บริจาคโลหิต' AS pathname,
                                                'blood-donor-record.php' AS typepath,
                                                '1' AS typestatus,
                                                '' AS hn,
                                                RE.repeatinfectiondate1 AS YMD_repeatinfectiondate,
                                                DATE_FORMAT(RE.repeatinfectiondate1, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
                                                CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
                                                DR.donoridcard,
                                                RE.donateid
                                                FROM donate_repeatinfection RE
                                                LEFT JOIN donate DN ON RE.donateid = DN.donateid
                                                LEFT JOIN donor DR ON DN.donorid = DR.donorid
                                                WHERE RE.active <> 0
                                                AND RE.repeatinfectiondate1 >= '$dateNow'
                                                
                                                UNION 
                                                
                                                SELECT 	
                                                'นัดฟังผล' AS typename,
                                                'บริจาคโลหิต' AS pathname,
                                                'blood-donor-record.php' AS typepath,
                                                '1' AS typestatus,
                                                '' AS hn,
                                                RE.repeatinfectiondate3 AS YMD_repeatinfectiondate,
                                                DATE_FORMAT(RE.repeatinfectiondate3, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
                                                CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
                                                DR.donoridcard,
                                                RE.donateid
                                                FROM donate_repeatinfection RE
                                                LEFT JOIN donate DN ON RE.donateid = DN.donateid
                                                LEFT JOIN donor DR ON DN.donorid = DR.donorid
                                                WHERE RE.active <> 0
                                                AND DATE_FORMAT(RE.repeatinfectiondate3, '%Y-%m-%d') >= '$dateNow'
                                                
                                                UNION
                                                
                                                SELECT 
                                                BL.appointmentdetail AS typename,
                                                'Blood Letting' AS pathname,
                                                'blood-letting.php' AS typepath,
                                                '0' AS typestatus,
                                                PT.patienthn AS hn,
                                                BL.appointmentdate AS YMD_repeatinfectiondate,
                                                DATE_FORMAT(BL.appointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
                                                CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
                                                PT.patientidcard AS donoridcard,
                                                BL.bloodlettingid AS id
                                                 FROM blood_letting BL
                                                 LEFT JOIN patient PT ON BL.patientid = PT.patientid
                                                 WHERE DATE_FORMAT(BL.appointmentdate, '%Y-%m-%d') >= '$dateNow'
                                                 
                                                 UNION
                                                 
                                                 SELECT 
                                                EX.appoittext AS typename,
                                                'Blood Exchange' AS pathname,
                                                'blood-exchange.php' AS typepath,
                                                '0' AS typestatus,
                                                PT.patienthn AS hn,
                                                EX.appointment AS YMD_repeatinfectiondate,
                                                DATE_FORMAT(EX.appointment, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
                                                CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
                                                PT.patientidcard AS donoridcard,
                                                EX.bloodexchangeid AS id
                                                 FROM blood_exchange EX
                                                 LEFT JOIN patient PT ON EX.patientid = PT.patientid
                                                 WHERE DATE_FORMAT(EX.appointment, '%Y-%m-%d') >= '$dateNow'
                                                 
                                                 UNION
                                                 
                                                 SELECT 
                                                WR.appoittext AS typename,
                                                'Washed Red Cell' AS pathname,
                                                'blood-washed-red-cell.php' AS typepath,
                                                '0' AS typestatus,
                                                PT.patienthn AS hn,
                                                WR.appointment AS YMD_repeatinfectiondate,
                                                DATE_FORMAT(WR.appointment, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
                                                CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
                                                PT.patientidcard AS donoridcard,
                                                WR.bloodwashedredcellid AS id
                                                 FROM blood_washed_red_cell WR
                                                 LEFT JOIN patient PT ON WR.patientid = PT.patientid
                                                 WHERE DATE_FORMAT(WR.appointment, '%Y-%m-%d') >= '$dateNow'
                                                 
                                                 UNION
                                                 
                                                 SELECT 
                                                ST.appoittext AS typename,
                                                'Serum Tear' AS pathname,
                                                'blood-serum-tear.php' AS typepath,
                                                '0' AS typestatus,
                                                PT.patienthn AS hn,
                                                ST.appointment AS YMD_repeatinfectiondate,
                                                DATE_FORMAT(ST.appointment, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
                                                CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
                                                PT.patientidcard AS donoridcard,
                                                ST.serumtearid AS id
                                                 FROM serum_tear ST
                                                 LEFT JOIN patient PT ON ST.patientid = PT.patientid
                                                 WHERE DATE_FORMAT(ST.appointment, '%Y-%m-%d') >= '$dateNow'
                                                 ) M
                                                 ORDER BY M.YMD_repeatinfectiondate ASC";
												$objQuery = mysql_query($strSQL);

												$count = 1;
												$datedonate = "";
												while($objResuut = mysql_fetch_array($objQuery))
												{

											?>



                                            <tr>
                                                <td><?php echo $count ; ?></td>
                                                <td><?php echo $objResuut["DMY_repeatinfectiondate"];?></td>
                                                <td><?php echo $objResuut["hn"];?></td>
                                                <td><?php echo $objResuut["donoridcard"];?></td>
                                                <td><?php echo $objResuut["fullname"];?></td>
                                                <td><?php echo $objResuut["pathname"];?></td>
                                                <td><?php echo $objResuut["typename"];?></td>

                                            </tr>

                                            <?php
												$count++;
												}
											?>


                                        </tbody>
                                    </table>



                                </div>



                            </div><!-- end card-->

                        </div>



                    </div>



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

    <script src="assets/js/custom/dashboard/bloodstockrfid-event.js"></script>
    <script src="assets/js/menu.js"></script>

    <!-- BEGIN Java Script for this page -->

    <!-- END Java Script for this page -->

    <script>
        
        loadStockRFID();
        setInterval(function(){ loadStockRFID(); }, 1000 * 60 * 3);
        $(document).ready(function () {


        });

        function showDoc(id = "") {
            window.open(localurl + '/blood-donor-record.php?id=' + id);
        }

    </script>
    <!-- BEGIN Java Script for this page -->

    <script src="assets/plugins/select2/js/select2.min.js"></script>
</body>

</html>