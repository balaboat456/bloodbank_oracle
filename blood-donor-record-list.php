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

		<title>รายการรับบริจาค</title>
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
		<link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
		<!-- BEGIN CSS for this page -->

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
									<h1 class="main-title float-left">รายการรับบริจาค</h1>
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
											<div class="form-group col-md-6">
												<label for="inputCity">คำค้นหา</label>
												<input type="text" name="keyword" class="form-control" value="<?php echo $keyword; ?>" id="keyword" placeholder="ใส่คำค้นหา เช่น เลขที่บัตรประชาชน , ที่ผู้บริจาค ,ชื่อ-สกุล , หมายเลขถุง" autofocus>
											</div>
											<div class="form-group col-md-2">
												<label for="inputCity">หมายเลขถุง</label>
												<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
												<input type="text" name="barcode" class="form-control" id="barcode" onkeyup="scanBarcode()" placeholder="Barcode" autofocus>
											</div>
											<div class="form-group col-md-2">
												<label for="inputCity">ตั้งแต่วันที่</label>
												<input id="fromdate" name="fromdate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>
											<div class="form-group col-md-2">
												<label for="inputCity">ถึงวันที่</label>
												<input id="todate" name="todate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>




											<div class="form-group col-md-2">
												<label for="inputState">หมู่เลือด</label>
												<select id="bloodgroup" name="bloodgroup" class="form-control bloodgroup"></select>
											</div>

											<div class="form-group col-md-3">
												<label for="inputState">ประเภทการบริจาค</label>
												<select id="donation_type_id" name="donation_type_id" class="form-control donation_type_id"></select>
											</div>

											<div class="form-group col-md-3">
												<label for="inputEmail4">ผู้ปฏิบัติงาน</label>
												<select id="inspectorid" class="form-control inspectorid" name="inspectorid">
													<option value="" selected></option>
													<?php
													$strSQL = "SELECT * FROM staff WHERE isinspector = 1 ORDER BY id ASC";
													$objQuery = mysql_query($strSQL);
													while ($objResuut = mysql_fetch_array($objQuery)) {
													?>
														<option <?php if ($objResuut["id"] == $row['inspectorid']) {
																	echo 'selected';
																} ?> value="<?php echo $objResuut['id']; ?>">
															<?php echo $objResuut["name"]; ?>
															<?php echo $objResuut["surname"]; ?>
														</option>
													<?php
													}
													?>
												</select>
											</div>

											<div class="form-group col-md-2">
												<label for="inputState">สถานะ</label>
												<select id="donatestatus" name="donatestatus" class="form-control donatestatus"></select>
											</div>

											<div class="form-group col-md-2">
												<br />
												<a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
											</div>
										</div>

									</div>

									<div class="card-body">
										<label id="total"><b>รวมทั้งหมด 0 ราย</b></label>
										<div class="table-no-scroll" style="height:60vh;">
											<table id="list_table_blood" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th width="5%" style="font-size: smaller;">วันที่</th>
														<th width="7%" style="font-size: smaller;">เลขที่ผู้บริจาค</th>
														<th width="9%" style="font-size: smaller;">เลขบัตรประชาชน</th>
														<th style="font-size: smaller;">ชื่อ-สกุล</th>
														<th width="9%" style="font-size: smaller;">หมายเลขถุง</th>
														<th width="3%" style="font-size: smaller;">หมู่เลือด</th>
														<th width="3%" style="font-size: smaller;">ครั้งที่บริจาค</th>
														<th width="3%" style="font-size: smaller;">ครั้งที่มา</th>
														<th width="10%" style="font-size: smaller;">ประเภทการบริจาค</th>
														<th style="font-size: smaller;">ผู้ปฏิบัติงาน</th>
														<th width="5%" style="font-size: smaller;">สถานะ</th>
														<th width="5%" style="font-size: smaller;">Action</th>
													</tr>
												</thead>
												<tbody>


												</tbody>
											</table>
										</div>

										<div id="pagination" class="pagination">
										</div>


									</div>
								</div><!-- end card-->
							</div>

						</div>

						<div class="div-save">
							<div class="save-bottom">
								<div class="form-group text-right m-b-0">

									<button onclick="showBloodList()" class="btn btn-success" type="button">
										<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์แบบฟอร์มส่งตรวจ
									</button>
									<button onclick="printbloodDonorCertificateCausePrint()" class="btn btn-success" type="button">
										<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์สรุปสาเหตุการขอใบรับรอง
									</button>
									<button onclick="addBlood()" class="btn btn-success" type="submit">
										<span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
									</button>
									<!-- <button type="button" onclick="resetPage()" class="btn btn-warning m-l-5">
									<span class="btn-label"><i class="fa fa-refresh"></i></span>รีเฟซ
								</button> -->

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
			<?php include 'blood-donor-record-list-modal.php'; ?>
			<?php include 'footer.php'; ?>
		<?php } else {

		header('Location:index.php');
	}

		?>

		</div>
		<!-- END main -->

		<script src="assets/js/modernizr.min.js?ref=<?php echo rand(); ?>"></script>
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
		<script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodlist-list-print.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodlistdonor.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodlist2.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/sweetalert/sweetalert.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/sweetalert/sweetalert.min.js?ref=<?php echo rand(); ?>"></script>

		<!-- App js -->
		<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/jquery.maskedinput.min.js?ref=<?php echo rand(); ?>"></script>



		<!-- BEGIN Java Script for this page -->

		<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>
		<script>
			// START CODE Show / hide columns dynamically DATA TABLE 		

			// START CODE Individual column searching (text inputs) DATA TABLE 		
			$(document).ready(function() {

				dateBE(".date1");

				loadTable();
				// reloadAuto();
			});

			function addBlood() {
				window.location.href = 'blood-donor-record.php';
			}

			function reloadAuto() {
				loadTable();
				setTimeout(function() {
					reloadAuto();
				}, 60000);

			}

			function editPage(id) {
				window.location.href = 'blood-donor-record.php?id=' + id;
			}


			function resetPage() {
				location.reload();
			}

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

			function printbloodDonorCertificateCausePrint() {
				var fromdate = dmyToymd2($('#fromdate').val());
				var todate = dmyToymd2($('#todate').val());
				var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();

				printJS({
					printable: localurl + "/report/blood-donor-certificate-cause-print.php?fromdate=" + fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
					type: 'pdf',
					showModal: true
				});
			}

			function showBloodList() {
				clearFormPrint();
				$("#bloodListModal").modal("show");
			}

			function closeBloodList() {
				$("#bloodListModal").modal("hide");
			}

			
			// END CODE Individual column searching (text inputs) DATA TABLE 	 	
		</script>
		<!-- END Java Script for this page -->

	</body>

	</html>