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

		<title>รายละเอียดการจ่ายเลือด</title>
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
				z-index: 1;
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
									<h1 class="main-title float-left">รายละเอียดการจ่ายเลือด</h1>
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

											<div class="form-group col-md-2">
												<label for="inputCity">ตั้งแต่วันที่</label>
												<input id="fromdate" name="fromdate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>">
											</div>
											<div class="form-group col-md-2">
												<label for="inputCity">ถึงวันที่</label>
												<input id="todate" name="todate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>">
											</div>

											<!-- <div class="form-group col-md-2" >
											<label for="inputCity">หมายเลขถุง</label>
											<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
											<input type="text" onkeyup="scanBarcode()" name="barcode"
												class="form-control" id="barcode" autocomplete="off" autofocus>
										</div> -->

											<div class="form-group col-md-2">
												<label for="inputEmail4">ประเภทการจ่าย</label>
												<select id="bloodstockpaytypeid" class="form-control bloodstockpaytypeid" name="bloodstockpaytypeid">
												</select>
											</div>

											<div id="div_hospital_pay" class="form-group col-md-2">
												<label for="inputCity">สาขา</label>
												<select autofocus name="hospital_pay" class="form-control hospital_pay" id="hospital_pay"></select>
											</div>


											<div class="form-group col-md-2">
												<br />
												<a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
											</div>



										</div>

									</div>

									<div class="card-body">
										<label id="total"><b>รวมทั้งหมด <label id="blood-query">0</label>
												ราย</b></label>
										<div class="table-no-scroll">
											<table id="list_table_blood_pay">
												<thead>
													<tr>
														<th>No</th>
														<th>วันที่จ่ายเลือด</th>
														<th>ประเภทการรับ</th>
														<th>สาขา</th>
														<th>ชนิดเลือด</th>
														<th>หมู่เลือด</th>
														<th>หมายเลขถุง</th>
														<th>หมายเหตุ</th>
														<th>ผู้จ่ายเลือด</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>


												</tbody>
											</table>
										</div>

										<div class="table-no-scroll">
											<table id="list_table_json_sum">
												<tbody>
													<tr>
														<th style="width:120px" class="td-table">LPRC(A) = 0</th>
														<th style="width:120px" class="td-table">LDPRC(A) = 0</th>
														<th style="width:120px" class="td-table">PRC(A) = 0</th>
														<th style="width:120px" class="td-table">SDP(A) = 0</th>
														<th style="width:120px" class="td-table">LPPC(A) = 0</th>
														<th style="width:120px" class="td-table">LDPPC(A) = 0</th>
														<th style="width:120px" class="td-table">PC(A) = 0</th>
														<th style="width:120px" class="td-table">FFP(A) = 0</th>
														<th style="width:120px" class="td-table">CRP(A) = 0</th>
														<th style="width:120px" class="td-table">CRYO(A) = 0</th>

													</tr>
													<tr>
														<th style="width:120px" class="td-table">LPRC(B) = 0</th>
														<th style="width:120px" class="td-table">LDPRC(B) = 0</th>
														<th style="width:120px" class="td-table">PRC(B) = 0</th>
														<th style="width:120px" class="td-table">SDP(B) = 0</th>
														<th style="width:120px" class="td-table">LPPC(B) = 0</th>
														<th style="width:120px" class="td-table">LDPPC(B) = 0</th>
														<th style="width:120px" class="td-table">PC(B) = 0</th>
														<th style="width:120px" class="td-table">FFP(B) = 0</th>
														<th style="width:120px" class="td-table">CRP(B) = 0</th>
														<th style="width:120px" class="td-table">CRYO(B) = 0</th>

													</tr>
													<tr>
														<th style="width:120px" class="td-table">LPRC(O) = 0</th>
														<th style="width:120px" class="td-table">LDPRC(O) = 0</th>
														<th style="width:120px" class="td-table">PRC(O) = 0</th>
														<th style="width:120px" class="td-table">SDP(O) = 0</th>
														<th style="width:120px" class="td-table">LPPC(O) = 0</th>
														<th style="width:120px" class="td-table">LDPPC(O) = 0</th>
														<th style="width:120px" class="td-table">PC(O) = 0</th>
														<th style="width:120px" class="td-table">FFP(O) = 0</th>
														<th style="width:120px" class="td-table">CRP(O) = 0</th>
														<th style="width:120px" class="td-table">CRYO(O) = 0</th>

													</tr>
													<tr>
														<th style="width:120px" class="td-table">LPRC(AB) = 0</th>
														<th style="width:120px" class="td-table">LDPRC(AB) = 0</th>
														<th style="width:120px" class="td-table">PRC(AB) = 0</th>
														<th style="width:120px" class="td-table">SDP(AB) = 0</th>
														<th style="width:120px" class="td-table">LPPC(AB) = 0</th>
														<th style="width:120px" class="td-table">LDPPC(AB) = 0</th>
														<th style="width:120px" class="td-table">PC(AB) = 0</th>
														<th style="width:120px" class="td-table">FFP(AB) = 0</th>
														<th style="width:120px" class="td-table">CRP(AB) = 0</th>
														<th style="width:120px" class="td-table">CRYO(AB) = 0</th>

													</tr>

												</tbody>
											</table>
										</div>


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

			<div class="div-save">
				<div class="save-bottom">
					<div class="form-group text-right m-b-0">
						<button id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
							<span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
						</button>
						<button onclick="toStock()" class="btn btn-success" type="button">
							<span class="btn-label"><i class="fa fa-list-alt"></i></span>คลังเลือด
						</button>


					</div>

				</div>
			</div>

			<?php include 'blood-blank-modal.php'; ?>
			<?php include 'setLocalUrl.php' ?>
			<?php include 'footer.php'; ?>
		<?php } else {

		header('Location:index.php');
	}

		?>

		</div>
		<!-- END main -->

		<script src="assets/js/modernizr.min.js?ref=<?php echo rand(); ?>"></script>
		<!-- <script src="assets/js/jquery.min.js"></script> -->
		<script src="assets/plugins/jquery-ui/jquery.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/moment.min.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/js/popper.min.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bootstrap.min.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/js/detect.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/fastclick.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/jquery.blockUI.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/jquery.nicescroll.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/plugins/jquery-ui/jquery-ui-1.8.10.offset.datepicker.min.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/datepickerFormat.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodlistdonor.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/js/custom/blood-blank-stock-pay/blood-blank-stock-pay-event.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
		<!-- App js -->
		<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
		<link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />



		<!-- BEGIN Java Script for this page -->
		<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>
		<script>
			// START CODE Show / hide columns dynamically DATA TABLE 		

			// START CODE Individual column searching (text inputs) DATA TABLE 		
			$(document).ready(function() {

				dateBE(".date");
				loadTable();

			});

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

			if (status == 'successful') {
				myAlertTop();
			} else if (status == 'error') {
				myAlertTopError();
			}

			function toStock() {
				window.location.href = 'inventory-blood-bank.php';
			}

			function printreport(id) {
				// var id = $(this).val();
				// console.log(id) 
				printJS({
					printable: localurl + "/report/blood-exchange-with-institutions.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function printreport1(id) {
				// var id = $("#bloodstockmainid").val();
				printJS({
					printable: localurl + "/report/blood-lend-to-institutions.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function printreport2(id) {
				// var id = $("#bloodstockmainid").val();
				printJS({
					printable: localurl + "/report/return-blood-to-institutions.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function printreport3(id) {
				// var id = $("#bloodstockmainid").val();
				printJS({
					printable: localurl + "/report/blood-pay-to-er.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function printreport4(id) {
				// var id = $("#bloodstockmainid").val();
				printJS({
					printable: localurl + "/report/blood-pay-to-er2.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function printreport5(id) {
				// var id = $("#bloodstockmainid").val();
				printJS({
					printable: localurl + "/report/blood-pay-to-er3.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function printreport6(id) {
				// var id = $("#bloodstockmainid").val();
				printJS({
					printable: localurl + "/report/blood-pay-to-er4.php?id=" + id,
					type: 'pdf',
					showModal: true
				});
			}

			function reportPrintExCel() {
				var fromdate = dmyToymd2($('#fromdate').val());
				var todate = dmyToymd2($('#todate').val());

				var fromdatee = $('#fromdate').val();
				var todatee = $('#todate').val();


				if (document.getElementById("bloodstockpaytypeid").value == "") {
					var bloodstockpaytypeid = 0;
				} else {
					var bloodstockpaytypeid = document.getElementById("bloodstockpaytypeid").value;
				}
				if (document.getElementById("hospital_pay").value == "") {
					var hospital_pay = 0;
				} else {
					var hospital_pay = document.getElementById("hospital_pay").value;
				}

				window.open(localurl + "/report/blood-blank-stock-pay-excel.php?fromdate=" + fromdate + "&todate=" + todate +
					"&bloodstockpaytypeid=" + bloodstockpaytypeid + "&hospital_pay=" + hospital_pay +
					"&fromdatee=" + fromdatee + "&todatee=" + todatee
				);
			}
			// END CODE Individual column searching (text inputs) DATA TABLE 	 	
		</script>
		<!-- END Java Script for this page -->

	</body>

	</html>