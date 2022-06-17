<?php



session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
	include('checkPermission.php');
	if (!checkPermission("BK_BLOOD_RETURN", "VW")) {
		header('Location:not-permission.php');
	}

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

		<title>บันทึกการรับคืนเลือด</title>
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
									<h1 class="main-title float-left">บันทึกการรับคืนเลือด</h1>
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
											<!-- <div class="form-group col-md-3">
											<label for="inputCity">HN</label>
											<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
											<input type="text" name="searchhn" class="form-control" id="searchhn"
												onkeyup="loadTableGetReturnBlood()" autofocus>
										</div> -->
											<input hidden type="text" name="searchhn" class="form-control" id="searchhn" onkeyup="loadTableGetReturnBlood(this)" autofocus>
											<div class="form-group col-md-3">
												<label for="inputCity">ตั้งแต่วันที่</label>
												<input id="fromdate" name="fromdate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>
											<div class="form-group col-md-3">
												<label for="inputCity">ถึงวันที่</label>
												<input id="todate" name="todate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>


											<div class="form-group col-md-3">
												<br />
												<a style="margin-top: 7px;" onclick="loadTableGetReturnBlood()" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
											</div>
										</div>

									</div>



									<div class="card-body">


										<div class="form-row" style="margin: -10px 0px 5px 0px">
											<label style="margin: 10px 0px 0px 0px" id="total"><b>รวมทั้งหมด <label id="blood-return">0</label>
													ราย</b></label>

											<div id="divfinghn1" class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
												<label style="margin: 10px 0px 0px 0px" align="right">HN</label>
											</div>
											<div id="divfinghn2" class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
												<input type="text" autocomplete="off" name="findhn" style="margin: 0px 0px 0px 0px" class="form-control" id="finfhn" onkeyup="setNewHN(this)" autofocus>
											</div>

											<div id="divfingbagnumber1" class="form-group col-md-2" align="right" style="margin: 0px 0px 0px 0px">
												<label style="margin: 10px 0px 0px 0px" align="right">หมายเลขถุง</label>
											</div>
											<div id="divfingbagnumber2" class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
												<input type="text" autocomplete="off" name="findbagnumber" style="margin: 0px 0px 0px 0px" class="form-control" id="findbagnumber" onkeyup="scanNumber(this)">
											</div>
											<div id="divprint1" class="form-group col-md-2" align="right" style="margin: 0px 0px 0px 0px">
												<label style="margin: 10px 0px 0px 0px" align="right">ปริ้นฟอร์ม</label>
											</div>
											<div id="divprint2" class="form-group col-md-1" style="margin: 0px 0px 0px 0px">
												<input type="checkbox" autocomplete="off" name="autoprint" style="margin: 0px 0px 0px 0px" class="form-control" id="autoprint">
											</div>
										</div>

										<form role="form" id="myform" method="POST" action="blood-returnsave.php" enctype="multipart/form-data">
											<div class="table-no-scroll" style="height:65vh">
												<table id="list_table_blood_return" style="width:2200px">
													<thead>
														<tr>
															<th style="width: 100px;">รับคืน</th>
															<th style="width: 90px;">No.</th>
															<th style="width: 250px;">วันที่/เวลาที่ คีย์คืนเลือด</th>
															<th style="width: 250px;">วันที่/เวลาที่คืน</th>
															<th style="width: 250px;">วันที่/เวลาที่จ่ายเลือด</th>
															<th style="width: 120px;">HN</th>
															<th style="width: 350px;">ชื่อ - นามสกุล</th>
															<th style="width: 250px;">หมายเลขถุง</th>
															<th style="width: 130px;">ชนิดเลือด</th>
															<th style="width: 130px;">ABO Gr.</th>
															<th style="width: 130px;">Rh(D)</th>
															<th style="width: 170px;">ลักษณะของเลือด</th>
															<th style="width: 450px;">หน่วยงานที่คืน</th>
															<th style="width: 350px;">ผู้คืนเลือด</th>
														</tr>
													</thead>
													<tbody>


													</tbody>
												</table>

											</div>
											<div class="form-group col-md-12">
												<!-- <i style="color: #0f9df7;" class="fa fa-circle"></i>&nbsp;คืน (warn)&nbsp;&nbsp;
												<i style="color: #d935cb;" class="fa fa-circle"></i>&nbsp;คืน (ไม่ warn)&nbsp;&nbsp; -->
												<i style="color: #ea9999;" class="fa fa-circle"></i>&nbsp;คืน (warn)&nbsp;&nbsp;
												<i style="color: #ffffff;" class="fa fa-circle"></i>&nbsp;คืน (ไม่ warn)&nbsp;&nbsp;
											</div>

											<div id="pagination" class="pagination">
											</div>

											<div class="div-save">
												<div class="save-bottom">
													<div class="form-group text-right m-b-0">
														<button class="btn btn-primary" type="submit">
															<span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
														</button>

													</div>
												</div>
											</div>
										</form>


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

			<?php include 'blood-blank-modal.php'; ?>
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

		<script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodlistdonor.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
		<!-- App js -->
		<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>

		<!-- BEGIN Java Script for this page -->
		<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/js/bloodconfirmreturn.js?ref=<?php echo rand(); ?>"></script>
		<script>
			// START CODE Individual column searching (text inputs) DATA TABLE 		
			$(document).ready(function() {

				dateBE(".date1");
				loadTableGetReturnBlood();

				$('#myform').submit(function() {

					var data = getFormData($("#myform"));
					data['returnblood'] = JSON.stringify(getReturnBlood());

					spinnershow();
					$.ajax({
						type: 'POST',
						url: 'blood-returnsave.php',
						data: data,
						dataType: 'json',
						complete: function() {
							var delayInMilliseconds = 200;
							setTimeout(function() {
								spinnerhide();
							}, delayInMilliseconds);
						},
						success: function(data) {
							if (data.status) {
								myAlertTop();
								loadTableGetReturnBlood();

								console.log(data.id);
								socket.emit('queue', data.id);

								if (document.getElementById("autoprint").checked) {
									var report = "blood_get_return_form";
									printJS({
										printable: localurl + "/report/report-form.php?id=" + data.id + "&report=" + report,
										type: 'pdf',
										showModal: true
									});
								}

							} else {
								myAlertTopError();
							}

						},
						error: function(data) {
							console.log('An error occurred.');
							console.log(data);
							myAlertTopError();
						},
					});
					return false;
				});

				function getFormData($form) {
					var unindexed_array = $form.serializeArray();
					var indexed_array = {};

					$.map(unindexed_array, function(n, i) {
						indexed_array[n['name']] = n['value'];
					});
					return indexed_array;
				}

				function getReturnBlood() {
					var arr = [];
					var rows = document.getElementById("list_table_blood_return").rows;
					for (var i = 1; i < rows.length; i++) {
						arr.push(rows[i].cells[0].innerHTML);
					}
					return arr;

				}

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
			// END CODE Individual column searching (text inputs) DATA TABLE 	 	
		</script>
		<!-- END Java Script for this page -->

	</body>

	</html>