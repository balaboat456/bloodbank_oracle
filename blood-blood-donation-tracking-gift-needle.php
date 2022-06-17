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

		<title>11.รายงานการรับเข็มที่ระลึกตามจำนวนครั้งของการบริจาค</title>
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
							<div class="col-xl-12">
								<div class="breadcrumb-holder">
									<h1 class="main-title float-left">11.รายงานการรับเข็มที่ระลึกตามจำนวนครั้งของการบริจาค</h1>
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

											<div hidden class="form-group col-md-3">
												<label for="inputCity">whereid</label>
												<input autocomplete="off" type="text" value="0" name="whereid" class="form-control" id="whereid">
											</div>

											<div hidden class="form-group col-md-3">
												<label for="inputCity">whereid2</label>
												<input autocomplete="off" type="text" value="0" name="whereid2" class="form-control" id="whereid2">
											</div>

											<div class="form-group col-md-3">
												<label for="inputCity">ตั้งแต่วันที่</label>
												<input id="fromdate" name="fromdate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>

											<div class="form-group col-md-3">
												<label for="inputCity">ถึงวันที่</label>
												<input id="todate" name="todate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>

											<div class="form-group col-md-1">
												<label for="inputCity">ครั้งที่บริจาค</label>
												<select style="width:80px;" id="donation_qty" class="form-control" name="donation_qty">
													<option value="0"></option>
													<option selected value="1">1</option>
													<option value="7">7</option>
													<option value="16">16</option>
													<option value="24">24</option>
													<option value="48">48</option>
													<option value="60">60</option>
													<option value="72">72</option>
													<option value="84">84</option>
													<option value="96">96</option>
													<option value="108">108</option>
												</select>
											</div>

											<div class="form-group col-md-2">
												<br />
												<a style="margin-top: 7px;" onclick="loadTable(); loadTable2(); loadTable3();" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
											</div>
										</div>
									</div>

									<div class="card-body">
										<div class="form-group col-md-12">
											<div class="tab">
												<button type="button" class="tablinks" onclick="openTab(event, '1')" id="defaultOpen">ทำเรื่องขอรับเข็มบริจาค</button>
												<button type="button" class="tablinks" id="btnTab2" onclick="openTab(event, '2')">รายชื่อบริจาคผู้รอรับเข็มบริจาค</button>
												<button type="button" class="tablinks" id="btnTab3" onclick="openTab(event, '3')">รายชื่อบริจาคผู้รับเข็มบริจาคแล้ว</button>
											</div>
											<div id="1" class="tabcontent">
												<?php include('blood-blood-donation-tracking-gift-needle_tab1.php'); ?>
											</div>
											<div id="2" class="tabcontent">
												<?php include('blood-blood-donation-tracking-gift-needle_tab2.php'); ?>
											</div>
											<div id="3" class="tabcontent">
												<?php include('blood-blood-donation-tracking-gift-needle_tab3.php'); ?>
											</div>
										</div>


									</div>
								</div><!-- end card-->
							</div>

						</div>

						<div class="div-save">
							<div class="save-bottom">
								<div class="form-group text-right m-b-0">
									<button id="save_getcard1" class="btn btn-success" onclick="save_getneedle1()" type="button">
										<span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
									</button>
									<button hidden id="save_getcard2" class="btn btn-success" onclick="save_getneedle2()" type="button">
										<span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
									</button>
									<button hidden id="save_getcard3" class="btn btn-success" onclick="save_getneedle3()" type="button">
										<span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
									</button>
									<button id="reportPrintExCel" class="btn btn-success" onclick="reportPrintExCel()" type="button">
										<span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
									</button>
									<button id="reportPrintExCel2" class="btn btn-success" onclick="reportPrintExCel2()" type="button">
										<span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
									</button>
									<button id="reportPrintExCel3" class="btn btn-success" onclick="reportPrintExCel3()" type="button">
										<span class="btn-label"><i class="fa fa-download"></i></span>Export Excel
									</button>
									<button onclick="reportPrint()" id="reportPrintPdf" class="btn btn-success" type="button">
										<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
									</button>
									<button onclick="reportPrint2()" id="reportPrintPdf2" class="btn btn-success" type="button">
										<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
									</button>
									<button onclick="reportPrint3()" id="reportPrintPdf3" class="btn btn-success" type="button">
										<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
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

			<?php include 'blood-blank-modal.php'; ?>
			<?php include 'footer.php'; ?>
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

		<script src="assets/js/blood-tracking-gift-needle.js"></script>

		<!-- App js -->
		<script src="assets/js/pikeadmin.js"></script>

		<script src="assets/printJS/print.min.js"></script>

		<!-- BEGIN Java Script for this page -->

		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<script>
			// START CODE Show / hide columns dynamically DATA TABLE 		

			// START CODE Individual column searching (text inputs) DATA TABLE 		
			$(document).ready(function() {

				dateBE(".date");
				document.getElementById("defaultOpen").click();
				loadTable();
				loadTable2();
				loadTable3();

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

			function reportPrintExCel() {
				window.location.href = "report/excel/blood-donation-tracking-letter-excel.php";
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

				if (cityName == 1) {
					document.getElementById("save_getcard1").hidden = false;
					document.getElementById("save_getcard2").hidden = true;
					document.getElementById("save_getcard3").hidden = true;

					document.getElementById("reportPrintExCel").hidden = false;
					document.getElementById("reportPrintExCel2").hidden = true;
					document.getElementById("reportPrintExCel3").hidden = true;

					document.getElementById("reportPrintPdf").hidden = false;
					document.getElementById("reportPrintPdf2").hidden = true;
					document.getElementById("reportPrintPdf3").hidden = true;

				} else if (cityName == 2) {
					document.getElementById("save_getcard1").hidden = true;
					document.getElementById("save_getcard2").hidden = false;
					document.getElementById("save_getcard3").hidden = true;

					document.getElementById("reportPrintExCel").hidden = true;
					document.getElementById("reportPrintExCel2").hidden = false;
					document.getElementById("reportPrintExCel3").hidden = true;

					document.getElementById("reportPrintPdf").hidden = true;
					document.getElementById("reportPrintPdf2").hidden = false;
					document.getElementById("reportPrintPdf3").hidden = true;

				} else if (cityName == 3) {
					document.getElementById("save_getcard1").hidden = true;
					document.getElementById("save_getcard2").hidden = true;
					// document.getElementById("save_getcard3").hidden = false;

					document.getElementById("reportPrintExCel").hidden = true;
					document.getElementById("reportPrintExCel2").hidden = true;
					document.getElementById("reportPrintExCel3").hidden = false;

					document.getElementById("reportPrintPdf").hidden = true;
					document.getElementById("reportPrintPdf2").hidden = true;
					document.getElementById("reportPrintPdf3").hidden = false;

				}
			}

			function setBloodOutCheck(self) {

				var whereid = document.getElementById("whereid").value;
				var checked = document.getElementById(self).checked;
				if (checked == true) {
					document.getElementById("whereid").value = whereid + ',' + self;
				} else {
					document.getElementById("whereid").value = whereid.replace("," + self, "");
				}

			}

			function setUnChecked(checkedState) {
				var rows = document.getElementById("list_table_json_out_refund").rows;
				var all_click1 = document.getElementById("all_click1").checked;
				var whereid = document.getElementById("whereid").value;


				if (all_click1 == true) {
					var data_arr = '';
					for (var i = 1; i < rows.length; i++) {
						rows[i].cells[1].children[0].checked = checkedState;
						data_arr += ',' + rows[i].cells[1].children[0].id;
						console.log(rows[i].cells[1].children[0].id);
					}
					document.getElementById("whereid").value = "0" + data_arr;
				} else {
					for (var i = 1; i < rows.length; i++) {
						rows[i].cells[1].children[0].checked = checkedState;
					}
					document.getElementById("whereid").value = "0";
				}

			}


			// END CODE Individual column searching (text inputs) DATA TABLE 	 	
		</script>
		<!-- END Java Script for this page -->

	</body>

	</html>