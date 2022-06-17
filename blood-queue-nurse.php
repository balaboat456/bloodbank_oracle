	<?php



	session_start();

	if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
		include('checkPermission.php');

		if (!checkPermission("BK_CONFIRM_USE", "VW")) {
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

			<title>บันทึกการยืนยันการใช้เลือด(สำหรับพยาบาล)</title>
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
			<link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

			<!-- BEGIN CSS for this page -->
			<!-- <script src="assets/js/sweetalert-2.min.js"></script> -->

			<link href="assets/printJS/print.min.css" rel="stylesheet" type="text/css" />
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
					min-height: 40vh;
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

				.td-table-17 {
					padding: 1px !important;
					width: 5.88% !important;
				}
			</style>
			<!-- END CSS for this page -->

		</head>

		<body class="adminbody">
			<?php include 'setLocalUrl.php' ?>
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
										<h1 class="main-title float-left">บันทึกการยืนยันการใช้เลือด(สำหรับพยาบาล)</h1>
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
													<input type="text" autocomplete="off" name="searchhn" class="form-control" id="searchhn" autofocus onkeyup="setNewHN(this)">
												</div>

												<div class="form-group col-md-1">
													<label for="inputCity">&nbsp;</label>
													<div>
														<a role="button" href="#" class="btn btn-primary" onclick="scanBarcode()" data-toggle="modal"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>

													</div>
												</div>

												<div class="form-group col-md-2">
													<label for="inputCity">HN</label>
													<input type="text" autocomplete="off" name="patienthn" class="form-control" id="patienthn" readonly>
												</div>
												<div class="form-group col-md-3">
													<label for="inputCity">ชื่อ-สกุล</label>
													<input type="text" autocomplete="off" name="patientfullname" class="form-control" id="patientfullname" readonly>
												</div>
												<div class="form-group col-md-3">
													<br>

													<!-- <div><p style = "margin-top:10px;font-size:20px;text-align:center;color:red;background-color:#ffff99;border-style:solid; border-color:black;" id = 'have' hidden>มีเลือดพร้อมสำหรับยืนยันการใช้เลือด</p><p style = "margin-top:10px;font-size:20px;text-align:center;color:red;background-color:#ffff99;border-style:solid; border-color:black;" id = 'no' hidden>ไม่มีเลือดพร้อมสำหรับยืนยันการใช้เลือด</b></div> -->
													<div>
														<p style="margin-top:10px;font-size:20px;text-align:center;color:red;background-color:#ffff99;border-style:solid; border-color:black;" id='have'>ยังไม่ระบุ HN</p>
													</div>

												</div>
											</div>

										</div>

										<div class="card-body">
											<div class="form-group col-md-12">
												<form role="form" id="form-blood-queue-tab2_1" method="POST" action="" enctype="multipart/form-data">
													<label for="inputCity">ข้อมูลรายการเลือดพร้อมใช้</label>
													&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
													<label style="margin: 10px 0px 0px 0px" align="right">ปริ้นฟอร์ม</label>

													<input type="checkbox" autocomplete="off" name="autoprint" checked style="margin: 0px 0px 0px 0px" id="autoprint">


													<div class="table-no-scroll" style="height:200px">

														<table id="blood-queue-tab2-1" style="width:1400px">
															<thead>
																<tr>
																	<th class="td-table" rowspan="2" style="width:40px">CK</th>
																	<th class="td-table" rowspan="2" style="width:140px">วันที่/เวลา ขอจองเลือด
																	</th>
																	<th class="td-table" rowspan="2">หน่วยงานที่แจ้งขอเลือด
																	</th>
																	<th class="td-table" rowspan="2">เพื่อบุตร
																	</th>
																	<th class="td-table" rowspan="2">ชนิดเลือดที่แจ้งขอ</th>
																	<th class="td-table" rowspan="2">Bl.Gr.</th>
																	<th class="td-table" rowspan="2" style="width:200px">วันที่เวลาแจ้งใช้เลือด
																	</th>
																	<th class="td-table" colspan="3">เลือดพร้อมใช้</th>
																	<th class="td-table" colspan="2">จำนวนขอเบิก</th>
																	<th class="td-table" colspan="2">วันที่/เวลาต้องการใช้เลือด
																	</th>
																</tr>
																<tr>
																	<th class="td-table">TYPE</th>
																	<th class="td-table">Unit</th>
																	<th class="td-table">cc</th>
																	<th class="td-table">Unit</th>
																	<th class="td-table">cc</th>
																	<th class="td-table">วันที่</th>
																	<th class="td-table">เวลา</th>
																</tr>
															</thead>
															<tbody>

															</tbody>
														</table>
													</div>
													<div class="form-group col-md-12">
														<i style="color: #F39;" class="fa fa-circle"></i>&nbsp;Most compatible
														<i style="color: #FFFF00;" class="fa fa-circle"></i>&nbsp;เลือดต่างหมู่&nbsp;&nbsp;

														<i style="color: #8B0000;" class="fa ">*** ถ้าผลเลือดเป็น Most Compatible/เลือดต่างหมู่ กรุณาโทรประสานธนาคารเลือด เพื่อระบุแพทย์ผู้รับผิดชอบ ***</i>

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

												<br /><br />
												<label for="inputCity">ประวัติการขอจองเลือด</label>
												<div class="table-no-scroll" style="height:300px">
													<table id="blood-queue-tab2-2" style="width:1600px">
														<thead>
															<tr>
																<th class="td-table" style="width:160px">วันที่/เวลา<br>ขอจองเลือด</th>
																<th class="td-table" style="width:140px">วันที่/เวลา<br>ที่รับสิ่งส่งตรวจ</th>
																<th class="td-table" style="width:180px">วันที่/เวลา<br>แจ้งพร้อมใช้</th>
																<th class="td-table">หน่วยงานที่<br>แจ้งขอจองเลือด</th>
																<th class="td-table">ประเภทการแจ้งขอ</th>
																<th class="td-table">เพื่อ<br>บุตร</th>
																<th class="td-table">ชนิดเลือดที่ขอจอง</th>
																<th class="td-table">สถานะการขอจองเลือด</th>
																<th class="td-table">สาเหตุการปฏิเสธสิ่งส่งตรวจ</th>
																<th class="td-table" style="width:40px"></th>
															</tr>
														</thead>
														<tbody>


														</tbody>
													</table>
												</div>

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
				<?php include('blood-queue-nurse-modal.php'); ?>
				<?php include('blood-queue-nurse-doctor-modal.php'); ?>
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
			<script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>

			<script src="assets/sweetalert/sweetalert.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/sweetalert/sweetalert.min.js?ref=<?php echo rand(); ?>"></script>

			<script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/bloodlistdonor.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>

			<!-- App js -->
			<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>



			<!-- BEGIN Java Script for this page -->
			<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>

			<script src="assets/js/bloodqueue-nurse.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/bloodqueue-nurse-event.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
			<script>
				// START CODE Show / hide columns dynamically DATA TABLE 		

				// START CODE Individual column searching (text inputs) DATA TABLE 

				var doctor_Arr;

				$(document).ready(function() {
					function getBloodAntiTest() {
						return $.ajax({
							url: 'data/masterdata/doctor.php',
							dataType: 'json',
							type: 'get',
						});
					}

					getBloodAntiTest().then(function success(data) {
						doctor_Arr = data.data;

					});

				});



				var dataForm;
				var count_data = 0;

				socket.on('queue', function(data) {
					console.log(data);
					if (data && data != "") {
						var myArr = data.split(",");

						$.each(myArr, function(ind, v) {

							if (v != "")
								if (checkBloodQueueTabID(v)) {
									loadTableBloodQueueWaitUsedNurse();
									loadTableBloodQueueHistoryUsedNurse();
								}

						})

					}

				});

				socket.on('crossmatch', function(data) {
					console.log(data);
					if (data && data != "") {
						var myArr = data.split(",");

						$.each(myArr, function(ind, v) {

							if (v != "")
								if (checkBloodQueueTabID(v)) {
									loadTableBloodQueueWaitUsedNurse();
									loadTableBloodQueueHistoryUsedNurse();
								}

						})

					}
				});

				$(document).ready(function() {

					$("#searchhn").on('keydown', function(e) {
						if (e.which == 13) {
							scanBarcode();
						}
					});

					dateBE('.date');

					$('#form-blood-queue-tab2_1').submit(function() {

						dataForm = getFormData($("#form-blood-queue-tab2_1"));

						var bloodQueueTab = getBloodQueueTab2_1();

						dataForm['bloodqueuetab2_1'] = JSON.stringify(bloodQueueTab);

						var bloodQueueTabArray = [];
						$.each(bloodQueueTab, function(ind, v) {

							var obj = JSON.parse(v);

							if (obj[0].isreadyblood == 1) {
								bloodQueueTabArray.push(obj[0]);
							}
						});


						spinnershow();


						$.ajax({
							type: 'POST',
							url: 'data/bloodqueue/bloodqueue-history-nurse-doctor.php',
							dataType: 'json',
							data: {
								parm: JSON.stringify(bloodQueueTabArray)
							},
							complete: function() {
								var delayInMilliseconds = 0;
								setTimeout(function() {
									spinnerhide();
								}, delayInMilliseconds);
							},
							success: function(data) {


								if (data.total > 0) {

									var body = document.getElementById("list_table_doctor_json").getElementsByTagName('tbody')[0];
									while (body.firstChild) {
										body.removeChild(body.firstChild);
									}

									var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
									count_data = 0;
									var event_data = '';
									$.each(obj, function(index, value) {

										event_data = '';
										event_data += '<tr >';
										event_data += '<td  style="display:none;" >';
										event_data += JSON.stringify(value);
										event_data += '</td>';
										event_data += '<td>' + value.bag_number + '</td>';
										event_data += '<td>' + value.bloodtype + '</td>';
										event_data += '<td>' + value.crossmacthresultname + '</td>';
										event_data += '<td><select id="doctorid' + count_data + '" name="doctorid' + count_data + '" onchange="setDoctorid(this)"  class="form-control"></select></td>';
										event_data += '<td><input  type="text" autocomplete="off"  class="form-control"  style="width:100%" onkeyup="setRemark(this)"  ></td>';
										event_data += '</tr>';

										$("#list_table_doctor_json").append(event_data);
										setDoctor(count_data);



										count_data++;

									});

									showDoctorModal('');
								} else {
									saveFormData();
								}


							}
						});

						return false;

					});

					function setDoctor(count = '') {
						$('#doctorid' + count).select2({
							allowClear: true,
							width: "100%",
							theme: "bootstrap",
							placeholder: "",
							// tags: [],
							ajax: {
								url: 'data/masterdata/doctor.php',
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
												id: item.doctorid,
												text: '[' + item.doctorcode + '] ' + item.doctorname,
											}
										})
									};
								},

							}
						}).on("select2:selecting", function(e) {

							var row = this.parentNode.parentNode;
							var item = JSON.parse(row.cells[0].innerHTML);

							item.doctorid = e.params.args.data.id;
							row.cells[0].innerHTML = JSON.stringify(item);

						});
					}


					function saveFormData() {

						spinnershow();

						dataForm['unitcomfirmused'] = localStorage.getItem("pointwardid", '');
						$.ajax({
							type: 'POST',
							url: 'bloodqueuetabsave2_1.php',
							data: dataForm,
							dataType: 'json',
							complete: function() {
								var delayInMilliseconds = 200;
								setTimeout(function() {
									spinnerhide();
								}, delayInMilliseconds);
							},
							success: function(data) {

								if (data.status) {

									socket.emit('queue', data.gid);

									myAlertTop();
									// loadTableBloodQueueWaitUsedNurse();
									// loadTableBloodQueueHistoryUsedNurse();

									if (document.getElementById("autoprint").checked)
										printForm(data.id);
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
					}



					function getFormData($form) {
						var unindexed_array = $form.serializeArray();
						var indexed_array = {};

						$.map(unindexed_array, function(n, i) {
							indexed_array[n['name']] = n['value'];
						});
						return indexed_array;
					}

					function getBloodQueueTab2_1() {
						var arr = [];
						var rows = document.getElementById("blood-queue-tab2-1").rows;
						for (var i = 2; i < rows.length; i++) {
							arr.push(rows[i].cells[0].innerHTML);
						}
						return arr;

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

				});


				function checkBloodQueueTabID(v = '') {
					console.log("vvv == " + v);
					var arr = [];
					var status = false;
					var rows = document.getElementById("blood-queue-tab2-1").rows;
					for (var i = 2; i < rows.length; i++) {
						var item = JSON.parse(rows[i].cells[0].innerHTML);
						console.log(item);
						if (item[0].requestbloodid == v) {
							status = true;
						}
					}
					return status;

				}

				function showModal(id) {
					loadTable(id);
					$("#customModal").modal('show');
				}

				function closePage() {
					$("#customModal").modal('hide');
				}

				function showDoctorModal(id) {
					// loadTable(id);
					console.log("******");
					$("#customDoctorModal").modal('show');
				}

				function closeDoctorPage() {
					$("#customDoctorModal").modal('hide');
				}

				function printForm(id) {
					printJS({
						printable: localurl + "/report/blood-receive-form.php?id=" + id,
						type: 'pdf',
						showModal: true
					});
				}

				function saveFormData() {

					checkBloodDoctor();
					spinnershow();
					dataForm['doctoritem'] = JSON.stringify(getBloodDoctor());
					dataForm['unitcomfirmused'] = localStorage.getItem("pointwardid", '');

					$.ajax({
						type: 'POST',
						url: 'bloodqueuetabsave2_1.php',
						data: dataForm,
						dataType: 'json',
						complete: function() {
							var delayInMilliseconds = 200;
							setTimeout(function() {
								spinnerhide();
							}, delayInMilliseconds);
						},
						success: function(data) {

							if (data.status) {

								socket.emit('queue', data.gid);

								myAlertTop();
								// loadTableBloodQueueWaitUsedNurse();
								// loadTableBloodQueueHistoryUsedNurse();
								closeDoctorPage();
								if (document.getElementById("autoprint").checked)
									printForm(data.id);
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
				}

				function checkBloodDoctor() {
					var arr = [];
					var rows = document.getElementById("list_table_doctor_json").rows;
					for (var i = 1; i < rows.length; i++) {
						console.log(rows[i].cells[4].children[0].value);
					}

				}

				function getBloodDoctor() {
					var arr = [];
					var rows = document.getElementById("list_table_doctor_json").rows;
					for (var i = 1; i < rows.length; i++) {
						arr.push(rows[i].cells[0].innerHTML);
					}
					return arr;

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

				function setRemark(self) {
					var row = self.parentNode.parentNode;
					var item = JSON.parse(row.cells[0].innerHTML);

					item.requestbloodcrossmacthremark = self.value;
					row.cells[0].innerHTML = JSON.stringify(item);
				}

				function setDoctorid(self) {
					var row = self.parentNode.parentNode;
					var item = JSON.parse(row.cells[0].innerHTML);

					item.doctorid = self.value;
					row.cells[0].innerHTML = JSON.stringify(item);
				}




				// END CODE Individual column searching (text inputs) DATA TABLE 	 	
			</script>
			<!-- END Java Script for this page -->

		</body>

		</html>