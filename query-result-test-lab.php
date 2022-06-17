<?php

session_start();
if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

	include('checkPermission.php');
    
    if(!checkPermission("BK_ASK_RESULT_LAB","VW"))
    {
        header('Location:not-permission.php');
    }

require_once('connection.php');
include('dateNow.php');


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

	<title>สอบถามผลชันสูตรโรค</title>
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

		<?php include'top-nav.php' ?>

		<!-- End Navigation -->

		<!-- Left Sidebar -->
		<?php include'setLocalUrl.php' ?>
		<?php include'side-menu.php' ?>

		<!-- End Sidebar -->


		<div class="content-page">

			<!-- Start content -->
			<div class="content">

				<div class="container-fluid">



					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-holder">
								<h1 class="main-title float-left">สอบถามผลชันสูตรโรค</h1>
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
								<div class="card-header">

									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="inputCity">ระบุ HN เพื่อค้นหาข้อมูล</label>
											<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
											<input type="text" autocomplete="off" name="searchhn" class="form-control"
												id="searchhn" autofocus>
										</div>

										<div class="form-group col-md-3">
											<label for="inputCity">HN</label>
											<input type="text" autocomplete="off" name="patienthn" class="form-control"
												id="patienthn" readonly onkeyup="setNewHN(this)">
										</div>
										<div class="form-group col-md-3">
											<label for="inputCity">ชื่อ-สกุล</label>
											<input type="text" autocomplete="off" name="patientfullname"
												class="form-control" id="patientfullname" readonly>
										</div>

									</div>

									<div class="form-row">

										<div class="form-group col-md-2">
											<label for="inputCity">ตั้งแต่วันที่</label>
											<input id="fromdate" name="fromdate" type="text" autocomplete="off"
												class="form-control date" value="" placeholder="วว/ดด/ปปปป">
										</div>
										<div class="form-group col-md-2">
											<label for="inputCity">ถึงวันที่</label>
											<input id="todate" name="todate" type="text" autocomplete="off"
												class="form-control date" value="" placeholder="วว/ดด/ปปปป">
										</div>



										<div class="form-group col-md-2">
											<br />
											<a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#"
												class="btn btn-info"><span class="btn-label"><i
														class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
										</div>



									</div>

								</div>

								<div class="card-body">
									<label id="total"><b>รวมทั้งหมด <label id="blood-query">0</label>
											ราย</b></label>
									<div class="table-no-scroll" style="height:300px">
										<table id="list_table_query_result_test_lab">
											<thead>
												<tr>
													<th></th>
													<th>วัน-เวลาที่ขอตรจ</th>
													<th>AN</th>
													<th>LN</th>
													<th>สถานะสิ่งส่งตรวจ</th>
													<th>หน่วยงานที่ส่งตรวจ</th>
												</tr>
											</thead>
											<tbody>


											</tbody>
										</table>
									</div>

									<br />

									<div class="form-group col-md-12"><label>หมายเหตุ :</label>
										<input type="text" autocomplete="off" value="" class="form-control "
											id="commentbyorder" name="commentbyorder">
									</div>

									<div class="table-s-scroll" style="height:300px">
										<table id="list_table_query_result_test_lab_item">
											<thead>
												<tr>
													<th>รายการตรวจ</th>
													<th style="width:200px">ผลตรวจ</th>
													<th style="width:100px"></th>
													<th style="width:100px">ปกติ</th>
													<th style="width:160px">ค่าอ้างอิง</th>
													<th style="width:160px">หน่วย</th>
													<th style="width:200px">สิ่งส่งตรวจ</th>
													<th>Comment Analyze</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>

									<br/><br/>




								</div>
							</div><!-- end card-->
						</div>

					</div>

				</div>
				<!-- END container-fluid -->

			</div>
			<!-- END content -->

		</div>
		<!-- END content-page -->

		<?php include'query-result-test-lab-modal.php';?>
		<?php include'footer.php';?>
		<?php }



else {

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
	<script src="assets/printJS/print.min.js"></script>

	<script src="assets/js/custom/query-result-test-lab/query-result-test-lab-select.js"></script>
	<script src="assets/js/custom/query-result-test-lab/query-result-test-lab-loadtable.js"></script>
	<script src="assets/js/custom/query-result-test-lab/query-result-test-lab-event.js"></script>
	<script src="assets/js/menu.js"></script>
	<!-- App js -->
	<script src="assets/js/pikeadmin.js"></script>



	<!-- BEGIN Java Script for this page -->
	<script src="assets/plugins/select2/js/select2.min.js"></script>
	<script>
		// START CODE Show / hide columns dynamically DATA TABLE 		

		// START CODE Individual column searching (text inputs) DATA TABLE 		
		$(document).ready(function () {

			dateBE(".date");

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

		if (status == 'successful') {
			myAlertTop();
		} else if (status == 'error') {
			myAlertTopError();
		}

		function showModal(labformid="",labformname="") {
			
			loadTable_Item_Compare(labformid);
			document.getElementById('queryresulttestlabTitle').innerHTML = labformname ;
			$("#queryresulttestlabmodal").modal('show');

		}

		function printLabTestResultBloodBank(id="") {
                printJS({printable:localurl + "/report/test-result-blood-bank.php?id=" + id, showModal:true});
        }
		// END CODE Individual column searching (text inputs) DATA TABLE 	 	
	</script>
	<!-- END Java Script for this page -->

</body>

</html>