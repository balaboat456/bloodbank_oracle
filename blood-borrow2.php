	<?php



	session_start();
	include('checkPermission.php');
	if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

		if (!checkPermission("BK_WITHDRAW", "VW")) {
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

			<title>บันทึกการเบิก/ยืมเลือด</title>
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

				.div-anti {
					background-color: #f8f9fa;
					border: 1px solid #ced4da;
					border-radius: .25rem;
					padding-top: 5px !important;
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
										<h1 class="main-title float-left">บันทึกการเบิก/ยืมเลือด</h1>
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
										<form role="form" id="myform" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">
											<div class="card-header">
												<div class="form-row">
													<input autocomplete="off" type="text" name="bloodborrowid" class="form-control" id="bloodborrowid" hidden>

													<input autocomplete="off" type="text" name="bloodborrowcode" class="form-control" id="bloodborrowcode" hidden>

													<div class="form-group col-md-3">
														<label for="inputCity"><b>
																<font color="black">สาขา</font>
															</b></label>
														<select name="hospitalid" id="hospitalid" class="form-control" onchange="requireSatrt_1()" autofocus require>
															<option value="1" selected>[100] สภากาชาดไทย</option>
														</select>
													</div>

													<div class="form-group col-md-3">
														<label for="inputCity">ประเภทการขอ</label>
														<select name="receivingtypeid" id="receivingtypeid" onchange="requireSatrt_2()" class="form-control" require>
															<option value="1" selected>สำหรับ Stock</option>
														</select>
													</div>

													<div class="form-group col-md-2">
														<label for="inputCity"><b>
																<font color="black">วันที่แจ้งขอ</font>
															</b></label>
														<input autocomplete="off" type="text" name="bloodborrowdate" class="form-control date" id="bloodborrowdate" value="<?php echo dateNowDMY(); ?>">
													</div>

													<div class="form-group col-md-1">
														<label for="inputCity"><b>
																<font color="black">เวลาที่แจ้งขอ</font>
															</b></label>
														<input autocomplete="off" type="text" name="bloodborrowtime" class="form-control" id="bloodborrowtime" value="<?php echo date("H:i"); ?>">
													</div>

													<div class="form-group col-md-3" id="divbloodborrowurgencyid">
														<label for="inputCity">ความเร่งด่วน</label>
														<select name="bloodborrowurgencyid" id="bloodborrowurgencyid" class="form-control">
														</select>
													</div>

													<div class="form-group col-md-3" id="divbloodborrowhn">
														<label for="inputCity"><b>
																<font color="black">HN</font>
															</b></label>
														<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
														<input autocomplete="off" type="text" name="bloodborrowhn" class="form-control" id="bloodborrowhn" onkeyup="setNewHN(this)">
													</div>

													<div class="form-group col-md-3" id="divpatientfullname">
														<label for="inputCity">ชื่อ-สกุล (ผู้ป่วย)</label>
														<input autocomplete="off" type="text" name="patientfullname" class="form-control" id="patientfullname" readonly>
													</div>

													<div class="form-group col-md-1" id="divpatientgender">
														<label for="inputCity">เพศ</label>
														<input autocomplete="off" type="text" name="patientgender" class="form-control" id="patientgender" readonly>
													</div>

													<div class="form-group col-md-1" id="divpatientage">
														<label for="inputCity">อายุ</label>
														<input autocomplete="off" type="text" name="patientage" class="form-control" id="patientage" readonly>
													</div>

													<div class="form-group col-md-1" id="divpatientbloodgroup">
														<label for="inputCity">Bl.Gr.</label>
														<input autocomplete="off" type="text" value=" " name="patientbloodgroup" class="form-control" id="patientbloodgroup" readonly>
													</div>
													<div hidden class="form-group col-md-1" id="divbloodborrowdiagnosis">
														<label for="inputCity">RH</label>
														<select name="rh" id="rh" class="form-control">
														</select>
													</div>

													<div class="form-group col-md-2" id="divbloodborrowdiagnosis">
														<label for="inputCity">Diagnosis</label>
														<input autocomplete="off" type="text" name="bloodborrowdiagnosis" class="form-control" id="bloodborrowdiagnosis">
													</div>

													<div class="form-group col-md-3" id="divbloodborrowirradiated">
														<div class="form-group">
															<label for="inputEmail4">คำสั่งพิเศษ</label>
															<div class="form-group">
																<label class="form-check-label">
																	<input autocomplete="off" onclick="" type="checkbox" id="bloodborrowirradiated" name="bloodborrowirradiated" value="1">
																	IRRADIATES
																</label>
																&emsp;&emsp;
																<label class="form-check-label">
																	<input autocomplete="off" onclick="" type="checkbox" id="bloodborrowhlacrossmatch" name="bloodborrowhlacrossmatch" value="1">
																	HLA Crossmatch
																</label>
																&emsp;&emsp;
																<label class="form-check-label">
																	<input autocomplete="off" onclick="" type="checkbox" id="bloodborrowhlamatch" name="bloodborrowhlamatch" value="1">
																	HLA Match
																</label>
															</div>
														</div>
													</div>

													<div class="form-group col-md-1" id="divbloodborrowhct">
														<label for="inputCity">Hct (%)</label>
														<input autocomplete="off" type="text" name="bloodborrowhct" class="form-control" id="bloodborrowhct">
													</div>

													<div class="form-group col-md-1" id="divbloodborrowhb">
														<label for="inputCity">Hb (g/dl)</label>
														<input autocomplete="off" type="text" name="bloodborrowhb" class="form-control" id="bloodborrowhb">
													</div>

													<div class="form-group col-md-2" id="divbloodborrowdateused">
														<label for="inputCity">วันที่ต้องการใช้เลือด</label>
														<input autocomplete="off" type="text" name="bloodborrowdateused" class="form-control date" id="bloodborrowdateused">
													</div>

													<div class="form-group col-md-5" id="divbloodborrowfor">
														<label for="inputCity">ขอเบิกโลหิตเพื่อ</label>
														<input autocomplete="off" type="text" name="bloodborrowfor" class="form-control" id="bloodborrowfor">
													</div>




													<div class="form-group col-md-6" id="divbloodborrowantigen">
														<div class="row">
															<div class="form-group col-md-8">
																<label for="inputCity">Antigen</label>
																<div class="col-md-12 div-anti">
																	<label id="phenotypeLable"></label>
																</div>
																<input autocomplete="off" type="text" name="bloodborrowantigen" hidden class="form-control" id="bloodborrowantigen">
															</div>

															<div class="form-group col-md-4">
																<br />
																<a role="button" onclick="antibodyModal()" style="margin-top:8px" href="#" class="btn btn-primary" onclick=""><span class="btn-label"><i class="fa fa-check"></i></span>Phenotype</a>
															</div>
														</div>
													</div>

													<div class="form-group col-md-3" id="divblooddeliveryid">
														<label for="inputCity">การจัดส่งโลหิต</label>
														<select name="blooddeliveryid" class="form-control" id="blooddeliveryid">
														</select>
													</div>
													<div class="form-group col-md-3" id="divbloodborrowremark">
														<label for="inputCity">หมายเหตุ</label>
														<input autocomplete="off" type="text" name="bloodborrowremark" class="form-control" id="bloodborrowremark">
													</div>
												</div>

											</div>

											<div class="card-body">
												<div class="form-group col-md-12">

													<label for="inputCity">รายละเอียดการเบิก / ยืมเลือด</label>
													<div class="table-no-scroll" style="height:450px">

														<table id="table_list_borrow">
															<thead>
																<tr>
																	<th class="td-table" rowspan="2" style="width:40px">No.
																	</th>
																	<th class="td-table" rowspan="2">ชนิดส่วนประกอบโลหิต
																	</th>
																	<th class="td-table" style="width:400px" colspan="9">Group
																		(จำนวน Units)
																	</th>
																	<th class="td-table" rowspan="2" style="width:40px">
																		<button type="button" onclick="addRowReq()" class="btn btn-info btn-sm" id="disabledReq">
																			<i class="fa fa-plus"></i>
																		</button>
																	</th>

																</tr>
																<tr>
																	<th class="td-table" style="width:50px">A</th>
																	<th class="td-table" style="width:50px">Rh</th>
																	<th class="td-table" style="width:50px">B</th>
																	<th class="td-table" style="width:50px">Rh</th>
																	<th class="td-table" style="width:50px">O</th>
																	<th class="td-table" style="width:50px">Rh</th>
																	<th class="td-table" style="width:50px">AB</th>
																	<th class="td-table" style="width:50px">Rh</th>
																	<th class="td-table" style="width:50px">Cryo</th>
																</tr>
															</thead>
															<tbody id="tbd_list_borrow">

															</tbody>
														</table>

													</div>

													<div class="div-save">
														<div class="save-bottom">
															<div class="form-group text-right m-b-0">
																<?php if ($_GET['id']) {	?>
																	<?php if (checkPermission("BK_WITHDRAW", "DE")) { ?>
																		<button class="btn btn-danger" type="button" onclick="cancelOrder()">
																			<span class="btn-label"><i class="fa fa-trash"></i></span>ลบ
																		</button>
																	<?php } ?>
																<?php } ?>

																<?php if ((checkPermission("BK_WITHDRAW", "AD") && empty($_GET['id'])) || (checkPermission("BK_WITHDRAW", "ED") && !empty($_GET['id']))) { ?>
																	<button class="btn btn-primary" type="submit">
																		<span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
																	</button>
																<?php } ?>
																<?php if (checkPermission("BK_WITHDRAW", "AD")) { ?>
																	<button type="button" onclick="newPage()" class="btn btn-success m-l-5">
																		<span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
																	</button>
																<?php } ?>
																<button type="button" onclick="listPage()" class="btn btn-info m-l-5">
																	<span class="btn-label"><i class="fa fa-search"></i></span>รายการเบิก /
																	ยืมเลือด
																</button>
																<?php if (checkPermission("BK_WITHDRAW", "PDF1")) { ?>
																	<button onclick="reportPrint()" class="btn btn-success" type="button">
																		<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
																	</button>
																<?php } ?>
															</div>
														</div>
													</div>




												</div>
											</div>
										</form>
									</div><!-- end card-->
								</div>


							</div>


						</div>
						<!-- END container-fluid -->

					</div>
					<!-- END content -->

				</div>
				<!-- END content-page -->

				<?php include 'blood-phenotype-modal.php'; ?>
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
			<script src="assets/js/spinner.js"></script>
			<script src="assets/js/menu.js"></script>
			<script src="assets/sweetalert/sweetalert.js"></script>
			<script src="assets/sweetalert/sweetalert.min.js"></script>

			<script src="assets/js/DateTimeFormat.js"></script>
			<script src="assets/js/bloodlistdonor.js"></script>
			<script src="assets/js/pagination.js"></script>
			<script src="assets/js/Replace.js"></script>


			<!-- App js -->
			<script src="assets/js/pikeadmin.js"></script>



			<!-- BEGIN Java Script for this page -->

			<script src="assets/plugins/select2/js/select2.min.js"></script>

			<script src="assets/js/blood-borrow-event.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/blood-borrow-event2.js"></script>
			<script src="assets/printJS/print.min.js"></script>

			<script src="assets/js/antibody-phenotype-event.js"></script>
			<script>
				var sid = <?php echo $_GET['id']; ?> + '';

				var lprc_a = <?php echo $_GET['lprc_a']; ?> + '';
				var lprc_b = <?php echo $_GET['lprc_b']; ?> + '';
				var lprc_o = <?php echo $_GET['lprc_o']; ?> + '';
				var lprc_ab = <?php echo $_GET['lprc_ab']; ?> + '';

				var prc_a = <?php echo $_GET['prc_a']; ?> + '';
				var prc_b = <?php echo $_GET['prc_b']; ?> + '';
				var prc_o = <?php echo $_GET['prc_o']; ?> + '';
				var prc_ab = <?php echo $_GET['prc_ab']; ?> + '';
			</script>
			<script>
				// START CODE Show / hide columns dynamically DATA TABLE 		

				// START CODE Individual column searching (text inputs) DATA TABLE 		


				$(document).ready(function() {
					$(window).keydown(function(event) {
						if (event.keyCode == 13) {
							event.preventDefault();
							return false;
						}
					});

					dateBE('.date');

					if (sid) {
						loadData(sid);
					} else {
						setHiddenInput();
					}
					$('#rh').select2({
						allowClear: true,
						theme: "bootstrap",
						width: "100%",
						ajax: {
							url: 'data/masterdata/bloodrh.php',
							dataType: 'json',
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
											id: item.rhid,
											text: item.rhname3,
											item: item
										}
									})
								};
							},

						}
					})

					if (lprc_a > 0 || lprc_b > 0 || lprc_o > 0 || lprc_ab > 0) {
						addRowReq_1();
					}
					if (prc_a > 0 || prc_b > 0 || prc_o > 0 || prc_ab > 0) {
						addRowReq_2();
					}



					$('#myform').submit(function() {

						var data = getFormData($("#myform"));

						var hospitalid = document.getElementById("hospitalid").value;

						var receivingtypeid = document.getElementById("receivingtypeid").value;



						data['bloodborrow'] = JSON.stringify(getBloodBorrow());


						if (hospitalid != '' && receivingtypeid != '') {
							spinnershow();
							$.ajax({
								type: 'POST',
								url: 'blood-borrowsave.php',
								data: data,
								dataType: 'json',
								complete: function() {
									spinnerhide();
								},
								success: function(data) {
									if (data.status == 1) {
										loadData(data.id);
										myAlertTop();
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
						} else {
							swal("กรุณาใส่ข้อมูลให้ถูกต้อง");
						}

						return false;
					});



					$(document).on('change', '.bloodstocktypeid', function() {
						bs = $(this).val();
						trid = $(this).parents('tr').attr('id');
						state = true
						$('#tbd_list_borrow tr').each(function() {
							if ($(this).attr('id') != trid) {
								var t = $(this).find('select').val();
								if (bs == t) {
									swal('กรุณาอย่าเลือกซ้ำ');
									state = false;
									return false;
								}
							}
						});
						if (state == false) {
							$(this).val(null).trigger('change');
						}
					})




					function getFormData($form) {
						var unindexed_array = $form.serializeArray();
						var indexed_array = {};

						$.map(unindexed_array, function(n, i) {
							indexed_array[n['name']] = n['value'];
						});
						return indexed_array;
					}

					function getBloodBorrow() {
						var arr = [];
						var rows = document.getElementById("table_list_borrow").rows;
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

				function cancelOrder() {
					swal({
							title: "ต้องการลบข้อมูลหรือไม่",
							// text: "ข้อมูลที่อยู่เก่า: ",
							type: "warning",
							showCancelButton: true,
							html: true,
							confirmButtonClass: "btn-danger",
							confirmButtonText: "ยืนยัน",
							cancelButtonText: "ยกเลิก",
							closeOnConfirm: false
						},
						function() {

							var data = sid;

							$.ajax({
								type: 'GET',
								url: 'blood-borrow-cancel.php',
								data: {
									sid: data,
								},
								dataType: 'json',
								success: function(data) {
									swal({
										title: "ลบสำเร็จ",
										type: "success",
										html: true,
										confirmButtonClass: "btn-info",
										confirmButtonText: "ยืนยัน",
										closeOnConfirm: false
									}, function() {
										window.location.href = 'blood-borrow-list.php';

									})
									// swal("ลบสำเร็จ!", "ข้อมูลถูกลบแล้ว.", "success");เร็วไปจนไม่ทันกด

								},
								error: function(data) {
									console.log('An error cancel.');
									console.log(data);
									myAlertTopError();
								},
							});

						})




				}

				function listPage() {
					window.location.href = 'blood-borrow-list.php';
				}

				function newPage() {
					window.location.href = 'blood-borrow.php';
				}



				function reportPrint() {
					var report = "";
					var receivingtypeid = $("#receivingtypeid").val();
					var id = $("#bloodborrowid").val();
					var patientfullname = $("#patientfullname").val();
					if (receivingtypeid == 1) {
						report = "blood_loan_01";
					} else if (receivingtypeid == 2) {
						report = "blood_loan_02";
						window.open(localurl + "/report/blood_loan_02.php?report=" + report + "&id=" + id + "&patientfullname=" + patientfullname);
					} else if (receivingtypeid == 3) {
						report = "blood_loan_03";
					} else if (receivingtypeid == 4) {
						report = "blood_loan_04";
					} else if (receivingtypeid == 11) {
						report = "blood_loan_061";
					} else if (receivingtypeid == 12) {
						report = "blood_loan_07";
					} else if (receivingtypeid == 13) {
						report = "blood_loan_062";
					}


					printJS({
						printable: localurl + "/report/report-form.php?report=" + report + "&id=" + id,
						type: 'pdf',
						showModal: true
					});


				}
				// END CODE Individual column searching (text inputs) DATA TABLE 	
				loadPhenotype();


				var branch = 0;
				var category = 0;

				function requireSatrt_1() {
					branch++;
					if (branch > 0 && category > 0) {
						document.getElementById("disabledReq").disabled = false;
					}

					$("#tbd_list_borrow").html("");
				}

				function requireSatrt_2() {
					category++;
					if (branch > 0 && category > 0) {
						document.getElementById("disabledReq").disabled = false;
					}

					$("#tbd_list_borrow").html("");
				}
				$(document).ready(function() {
					$("input,select").bind("keydown", function(event) {
						if (event.which === 13) {
							event.stopPropagation();
							event.preventDefault();
							$(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
						}
					});

				});

				function addPhenotype_New() {
					var phe = document.getElementById("phenotypecode").value;
					var full = document.getElementById("phenoLabel").innerHTML;
					document.getElementById("phenoLabel").innerHTML = full + ',' + phe;
					document.getElementById("phenotypecode").value = '';
				}
			</script>
			<!-- END Java Script for this page -->

		</body>

		</html>