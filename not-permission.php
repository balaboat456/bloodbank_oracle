<?php



session_start();
include('checkPermission.php');

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

   


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

        <title>Error - 403</title>

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

            




            .left_table {
                text-align: left;
            }

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

            .verticalText
            {
                text-align: center;
                vertical-align: middle;
                width: 20px;
                margin: 0px;
                padding: 0px;
                padding-left: 3px;
                padding-right: 3px;
                padding-top: 10px;
                white-space: nowrap;
                -webkit-transform: rotate(-90deg); 
                -moz-transform: rotate(-90deg);                 
            }

            
        </style>
    </head>




    <body class="adminbody">

    <?php include 'top-nav.php' ?>
    <br/> <br/><br/><br/><br/><br/>

    <div class="container py-5">
          <div class="row">
               <div class="col-md-2 text-center">
                    <p><i class="fa fa-exclamation-triangle fa-5x"></i><br/>Status Code: 403</p>
               </div>
               <div class="col-md-10">
                    <h3>เกิดข้อผิดพลาดเกี่ยวกับสิทธิ์การเข้าถึง</h3>
                    <p>ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้กรุณาติดต่อผู้ดูแลระบบ</p>
                    <a class="btn btn-danger" href="javascript:history.back()">Go Back</a>
               </div>
          </div>
     </div>




        
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
                <script src="assets/js/jquery.maskedinput.min.js"></script>

                <script src="assets/js/menu.js"></script>
                <!-- BEGIN Java Script for this page -->

          

                <script src="assets/plugins/select2/js/select2.min.js"></script>
              

    </body>

    </html>