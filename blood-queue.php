	<?php

	session_start();
	include('checkPermission.php');
	if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

		if(!checkPermission("BK_BLOOD_QUEUE","VW"))
		{
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

			<title>ลำดับคิวขอเลือด</title>
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

				.CellWithComment {
					position: relative;
				}

				.CellComment {
					visibility: hidden;
					width: auto;
					position: absolute;
					z-index: 100;
					text-align: Left;
					/* opacity: 0.4;
					transition: opacity 2s; */
					border-radius: 6px;
					background-color: #808080;
					padding: 3px;
					top: -30px;
					left: 0px;
				}

				.CellWithComment:hover span.CellComment {
					visibility: visible;
					opacity: 1;
				}

				.position-bottom {
					/* position: absolute;
    				bottom: 0; */
				}

				.btn-info-1 {
					background-color: #ff9f40;
					border-color: #bd7228;
				}

				.btn-info-2 {
					background-color: #ff5370;
					border-color: #dc3545;
				}
			</style>
			<script>
				var session_staffid = "<?php echo $_SESSION['staffid']; ?>";
				var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
			</script>
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
										<h1 class="main-title float-left">ลำดับคิวขอเลือด</h1>
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
												<!-- <div class="form-group col-md-2">
												<label for="inputCity">HN</label>
												<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
												<input type="text" autocomplete="off" name="searchhn" class="form-control"
													id="searchhn" autofocus>
											</div> -->
												<div class="form-group col-md-2">
													<label for="inputCity">วันที่แจ้งขอวันที่</label>
													<input id="fromdate" name="fromdate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMYDiff7(); ?>" placeholder="วว/ดด/ปปปป">
												</div>
												<div class="form-group col-md-2">
													<label for="inputCity">-</label>
													<input id="todate" name="todate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
												</div>

												

												<div class="form-group col-md-3">
													<label for="inputState">หน่วยงานที่แจ้งขอเลือด</label>
													<select id="requestunit" name="requestunit" class="form-control "></select>
												</div>

												<div id="divpayuser" class="form-group col-md-3">
													<label for="inputEmail4">ผู้จ่ายเลือด</label>
													<select id="payuser" class="form-control payuser" name="payuser">
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
													<br />
													<a style="margin-top: 7px;" onclick="setBloodQueueCheckState();setBloodQueueConfirmState();setBloodQueueUsedWaitState();setBloodQueueUsedReadyState();loadTableAll();" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
												</div>

												<div id="div_fromwithdate"  class="form-group col-md-2">
													<label for="inputCity">วันที่พร้อมใช้</label>
													<input id="fromwithdate" name="fromwithdate" type="text" autocomplete="off" class="form-control date"  >
												</div>
												<div id="div_fromwithtime" class="form-group col-md-1">
													<label for="inputCity">เวลา</label>
													<input id="fromwithtime" name="fromwithtime" onkeyup="timeField(this)" autocomplete="off" class="form-control"  >
												</div>
												<div id="div_towithdate" class="form-group col-md-2">
													<label for="inputCity">-</label>
													<input id="towithdate" name="towithdate" type="text" autocomplete="off" class="form-control date"  >
												</div>
												<div id="div_towithtime" class="form-group col-md-1">
													<label for="inputCity">เวลา</label>
													<input id="towithtime" name="towithtime" onkeyup="timeField(this)" autocomplete="off" class="form-control"  >
												</div>


												<div id="div_frompaydate" class="form-group col-md-2">
													<label for="inputCity">วันที่จ่ายเลือด</label>
													<input id="frompaydate" name="frompaydate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>"  >
												</div>
												<div id="div_frompaytime" class="form-group col-md-1">
													<label for="inputCity">เวลา</label>
													<input id="frompaytime" name="frompaytime" onkeyup="timeField(this)"  autocomplete="off" class="form-control"   >
												</div>
												<div id="div_topaydate" class="form-group col-md-2">
													<label for="inputCity">-</label>
													<input id="topaydate" name="topaydate" type="text" autocomplete="off" class="form-control date" value="<?php echo dateNowDMY(); ?>"  >
												</div>
												<div id="div_topaytime" class="form-group col-md-1">
													<label for="inputCity">เวลา</label>
													<input id="topaytime" name="topaytime" onkeyup="timeField(this)" autocomplete="off" class="form-control"  >
												</div>


												
											</div>

										</div>

										<div class="card-body">
											<div class="form-group col-md-12">
												<div class="tab">
													<button type="button" class="tablinks" onclick="openTab(event, '1','tabcontent','tablinks')" id="defaultOpen">รายการขอเลือด</button>
													<button type="button" class="tablinks" onclick="openTab(event, '2','tabcontent','tablinks')">รายการเลือดพร้อมใช้</button>


													<div class="form-row" style="margin: 8px 0px 0px 0px">
														<div id="divfinghn1" class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
															<label style="margin: 10px 0px 0px 0px" align="right">HN 1</label>
														</div>
														<div id="divfinghn2" class="form-group col-md-1" style="margin: 0px 0px 0px 0px">
															<input type="text" autocomplete="off" name="findhn" style="margin: 0px 0px 0px 0px" class="form-control" id="finfhn" onkeyup="setNewHN(this)" autofocus>
														</div>

														<div id="divfinghn3" class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
															<label style="margin: 10px 0px 0px 0px" align="right">HN 2</label>
														</div>
														<div id="divfinghn4" class="form-group col-md-1" style="margin: 0px 0px 0px 0px">
															<input type="text" autocomplete="off" name="findhn2" style="margin: 0px 0px 0px 0px" class="form-control" id="findhn2" onkeyup="setNewHN(this)" >
														</div>

														<div id="divfinghn5" class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
															<label style="margin: 10px 0px 0px 0px" align="right">ชนิดเลือด</label>
														</div>
														<div id="divfinghn6" class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
															<select id="findbloodstocktype" class="form-control form-control-sm findbloodstocktype" name="findbloodstocktype">
																<option value=""></option>
																<?php
																$strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
																$objQuery = mysql_query($strSQL);
																while ($objResuut = mysql_fetch_array($objQuery)) {
																?>
																	<option  value="<?php echo $objResuut['bloodstocktypeid']; ?>">
																		<?php echo $objResuut['bloodstocktypename2']."|".$objResuut['bloodstocktypecode']. "|" . $objResuut['bloodstocktypecodegroup']; ?>
																	</option>
																<?php
																}
																?>
															</select>
														</div>

														<div id="divfingbagnumber1" class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
															<label style="margin: 10px 0px 0px 0px" align="right">หมายเลขถุง</label>
														</div>
														<div id="divfingbagnumber2" class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
															<input type="text" autocomplete="off" name="findbagnumber" style="margin: 0px 0px 0px 0px" class="form-control" id="findbagnumber" onkeyup="scanNumber(this)">
														</div>

														<div id="divprint1" class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
															<label style="margin: 10px 0px 0px 0px" align="right">ปริ้นฟอร์ม</label>
														</div>
														<div id="divprint2" class="form-group col-md-1" style="margin: 0px 0px 0px 0px">
															<input type="checkbox" autocomplete="off" name="autoprint" checked style="margin: 0px 0px 0px 0px" class="form-control" id="autoprint">
														</div>
													</div>

												</div>

												<div id="1" class="tabcontent">
													<?php include('blood-queue-tab1.php'); ?>
												</div>

												<div id="2" class="tabcontent">
													<?php include('blood-queue-tab2.php'); ?>
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

				<?php include 'blood-queue-cancel-modal.php'; ?>
				<?php include('blood-queue-nurse-doctor-modal.php'); ?>
				<?php include('blood-queue-reprint-modal.php'); ?>
				<?php include('blood-queue-reprint-no-history-modal.php'); ?>
				<?php include('blood-queue-beacon-timeline-modal.php'); ?>
				<?php include('blood-queue-history-print-pay-form.php'); ?>
				
				
				<?php include 'footer.php'; ?>
			<?php } else {

			header('Location:index.php');
		}

			?>

			</div>
			<!-- END main -->
			<script src="assets/js/printer-setting.js?ref=<?php echo rand(); ?>"></script>
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
			<script src="assets/js/mgs.js?ref=<?php echo rand(); ?>"></script>

			<script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/bloodlistdonor.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/bloodqueue.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>

			<!-- App js -->
			<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>



			<!-- BEGIN Java Script for this page -->
			<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>

			<script src="assets/js/bloodqueue-standby.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/js/bloodqueue-bloodused.js?ref=<?php echo rand(); ?>"></script>
			<script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
			<script>
				// START CODE Show / hide columns dynamically DATA TABLE 		

				// START CODE Individual column searching (text inputs) DATA TABLE 		
				var dataForm ;
				var count_data = 0;

				
				socket.on('askforblood', function(data) {
					console.log(data);
					loadTableAll();
				});

				socket.on('queue', function(data) {
					console.log(data);
					loadTableAll();
				});

				socket.on('crossmatch', function(data) {
					console.log(data);
					loadTableAll();
				});

				$(document).ready(function() {

					dateBE('.date');
					document.getElementById("defaultOpen").click();
					loadTableAll();

					$('#form-blood-queue-tab1').submit(function() {

						var v_getBloodQueueTab1_1 = getBloodQueueTab1_1();
						var data = getFormData($("#form-blood-queue-tab1"));
						data['bloodqueuetab1'] = JSON.stringify(v_getBloodQueueTab1_1);

						var id = getById(v_getBloodQueueTab1_1) ;

						spinnershow();
						$.ajax({
							type: 'POST',
							url: 'bloodqueuetabsave1.php',
							data: data,
							complete: function() {
								var delayInMilliseconds = 200;
								setTimeout(function() {
									spinnerhide();
								}, delayInMilliseconds);
							},
							success: function(data) {
								if (data) {

									setBloodQueueCheckState();

									socket.emit('queue', "");
									
									if (document.getElementById("autoprint").checked && id != "")
									printQueueSticker(id)
										

									myAlertTop();
									loadTableAll();

									document.getElementById("autoprint").checked = (tabNameActive != '2_1');

									
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

					function printQueueSticker(id) {
						
						
						var printer_url = localurl + "/report/blood-request-patient-sticker.php?id=" + id;
						var printer_url_auto = localurl + "/report/blood-request-patient-sticker-auto.php?id=" + id;
						var printqty = parseInt(document.getElementById("printqty").value);
						if(document.getElementById("printer_a").checked)
						{

							try {
								var n = Date.now();
								var filenameram = "stickerbag"+n+makeid(5);

								var printers = getPrintterSetting();

								var printernames = $("#printernames").val();
								var printernamesArr = printernames.split("|");

								var dataReport = {
										"Printtername": printernamesArr[0],
										"Filename": filenameram,
										"Fileurl": printer_url_auto,
										"username": printernamesArr[1],
										"Numberset": printqty
								};

								spinnershow();
								

                                $.ajax({
                                            type: 'POST',
                                            url: 'report/printering-auto.php',
                                            data: dataReport,
                                            dataType: 'json',
                                            complete: function() {
                                                var delayInMilliseconds = 200;
                                                setTimeout(function() {
                                                    spinnerhide();
                                                }, delayInMilliseconds);
                                            },
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log('An error occurred.');
                                                console.log(data);
                                                myAlertTopError();
                                            },
                                        });
							}
							catch(err) {
								console.log("error auto printer");
								console.log("printing preview");
								printJS(printer_url);
							}

							

						
						}else
						{
							printJS(printer_url);
						}


						
					}

					$('#form-blood-queue-tab4').submit(function() {

						var data = getFormData($("#form-blood-queue-tab4"));
						data['bloodqueuetab4'] = JSON.stringify(getBloodQueueTab1_4());

						// return false;
						spinnershow();
						$.ajax({
							type: 'POST',
							url: 'bloodqueuetabsave4.php',
							dataType: 'json',
							data: data,
							complete: function() {
								var delayInMilliseconds = 200;
								setTimeout(function() {
									spinnerhide();
								}, delayInMilliseconds);
							},
							success: function(data) {
								console.log(data);
								if (data.status) {
									myAlertTop();
									setBloodQueueConfirmState();
									// loadTableAll();

									

									socket.emit('queue', data.gid);
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

					$('#form-blood-queue-tab2_1').submit(function() {

						var data = getFormData($("#form-blood-queue-tab2_1"));
						

						var bloodQueueTab = getBloodQueueTab2_1() ;

						data['bloodqueuetab2_1'] = JSON.stringify(getBloodQueueTab2_1());

						dataForm = data;

						var bloodQueueTabArray = [];
						$.each(bloodQueueTab, function (ind, v) {
						
							var obj = JSON.parse(v);

							if(obj[0].isreadyblood == 1)
							{
								bloodQueueTabArray.push(obj[0]);
							}
						});

						spinnershow();

						$.ajax({
							type: 'POST',
							url: 'data/bloodqueue/bloodqueue-history-nurse-doctor.php',
							dataType: 'json',
							data: {parm:JSON.stringify(bloodQueueTabArray)},
							complete: function () {
								var delayInMilliseconds = 0;
								setTimeout(function () {
									spinnerhide();
								}, delayInMilliseconds);
							},
						success: function (data) {


							if(data.total > 0)
							{

								var body = document.getElementById("list_table_doctor_json").getElementsByTagName('tbody')[0];
								while (body.firstChild) {
									body.removeChild(body.firstChild);
								}

								var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
									count_data  = 0;
								var event_data = '';
								$.each(obj, function (index, value) {

									event_data = '';
									event_data += '<tr >';
									event_data += '<td  style="display:none;" >';
									event_data += JSON.stringify(value);
									event_data += '</td>';
									event_data += '<td>'+value.bag_number+'</td>';
									event_data += '<td>'+value.bloodtype+'</td>';
									event_data += '<td>'+value.crossmacthresultname+'</td>';
									event_data += '<td><select id="doctorid'+count_data+'" name="doctorid'+count_data+'"  autocomplete="off"  class="form-control" onchange="setDoctorid(this)"  style="width:100%"  ></select></td>';
									event_data += '<td><input  type="text" autocomplete="off"  class="form-control"  style="width:100%" onkeyup="setRemark(this)"  ></td>';
									event_data += '</tr>';

									$("#list_table_doctor_json").append(event_data);
									setDoctor(count_data);

									count_data++;

								});

								showDoctorModal('');
							}else
							{
								saveFormData();
							}
							

						}
					});


					function setDoctor(count='')
					{
						$('#doctorid'+count).select2({
							allowClear: true,
							width:"100%",
							theme: "bootstrap",
							placeholder: "",
							// tags: [],
							ajax: {
								url: 'data/masterdata/doctor.php',
								dataType: 'json',
								type: "GET",
								quietMillis: 50,
								data: function (keyword) {
									return {
										keyword: keyword.term
									};
								},
								processResults: function (data) {
									return {
										results: $.map(data.data, function (item) {
											return {
												id: item.doctorid,
												text: '['+item.doctorcode+'] '+item.doctorname,
											}
										})
									};
								},

							}
						}).on("select2:selecting", function (e) {

							var row = this.parentNode.parentNode;
							var item = JSON.parse(row.cells[0].innerHTML);

							item.doctorid = e.params.args.data.id;
							row.cells[0].innerHTML = JSON.stringify(item);

						});
					}

						
						return false;
					});



					function saveFormData() {

						dataForm['unitcomfirmused'] = localStorage.getItem("pointwardid",'');
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
										myAlertTop();
										// loadTableAll();

										setBloodQueueUsedWaitState();

										socket.emit('queue', data.gid);

										if (document.getElementById("autoprint").checked)
											printJS({
												printable: localurl + "/report/blood-receive-form.php?id=" + data.id,
												type: 'pdf',
												showModal: true
											});

											document.getElementById("autoprint").checked = (tabNameActive != '2_1');
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


					$('#form-blood-queue-tab2_2').submit(function() {

						var data = getFormData($("#form-blood-queue-tab2_2"));
						data['bloodqueuetab2_2'] = JSON.stringify(getBloodQueueTab2_2());

						spinnershow();
						$.ajax({
							type: 'POST',
							url: 'bloodqueuetabsave2_2.php',
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
									setBloodQueueUsedReadyState();
									myAlertTop();
									// loadTableAll();

									socket.emit('queue', data.gid);

									if (document.getElementById("autoprint").checked)
									{
										var printableurl = localurl + "/report/blood-pay-form.php?id=" + data.grouppayid;
										printJS({
												printable: printableurl,
												type: 'pdf',
												showModal: true
											});


											$.ajax({
												type: 'POST',
												url: 'report/blood-pay-download-form.php',
												data: {id:data.grouppayid,url:printableurl},
												dataType: 'json',
											});
									}
										

									document.getElementById("autoprint").checked = (tabNameActive != '2_1');
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

					function getById(formdata)
					{
						var str = "";
						$.each(formdata, function(index, value) {
							var obj = JSON.parse(value);
							if(obj[0].r)
							str += obj[0].requestbloodid+',';
							
						});
						return lastString(str);
					}

					function getFormData($form) {
						var unindexed_array = $form.serializeArray();
						var indexed_array = {};

						$.map(unindexed_array, function(n, i) {
							indexed_array[n['name']] = n['value'];
						});
						return indexed_array;
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



					document.getElementById("defaultOpen").click();

				});

				var tabNameActive = '';
				function openTab(evt, tabName, tabClass1, tabClass2) {
					console.log(evt);
					tabNameActive = tabName;
					console.log(tabName);
					tabactive = tabName;
					var i, tabcontent, tablinks;
					tabcontent = document.getElementsByClassName(tabClass1);
					for (i = 0; i < tabcontent.length; i++) {
						tabcontent[i].style.display = "none";
					}
					tablinks = document.getElementsByClassName(tabClass2);
					for (i = 0; i < tablinks.length; i++) {
						tablinks[i].className = tablinks[i].className.replace(" active", "");
					}
					document.getElementById(tabName).style.display = "block";
					evt.currentTarget.className += " active";

					if (tabName == '1')
						document.getElementById("defaultOpen1").click();

					if (tabName == '2')
						document.getElementById("defaultOpen2").click();


					setFind(tabactive);
					document.getElementById("autoprint").checked = (tabNameActive != '2_1');
				}

				function setFind(tab) {
					document.getElementById("divprint1").style.display = "none";
					document.getElementById("divprint2").style.display = "none";
					document.getElementById("divpayuser").style.display = "none";

					document.getElementById("div_fromwithdate").style.display = "none";
					document.getElementById("div_towithdate").style.display = "none";
					document.getElementById("div_fromwithtime").style.display = "none";
					document.getElementById("div_towithtime").style.display = "none";

					document.getElementById("div_frompaydate").style.display = "none";
					document.getElementById("div_topaydate").style.display = "none";
					document.getElementById("div_frompaytime").style.display = "none";
					document.getElementById("div_topaytime").style.display = "none";

					if (tab == "1_1" || tab == "1_4" || tab == "2_1") {
						document.getElementById("divfinghn1").style.display = "block";
						document.getElementById("divfinghn2").style.display = "block";
						document.getElementById("divfingbagnumber1").style.display = "none";
						document.getElementById("divfingbagnumber2").style.display = "none";


					} else if (tab == "2_2") {
						document.getElementById("divfinghn1").style.display = "block";
						document.getElementById("divfinghn2").style.display = "block";
						document.getElementById("divfingbagnumber1").style.display = "block";
						document.getElementById("divfingbagnumber2").style.display = "block";
					} else {
						document.getElementById("divfinghn1").style.display = "none";
						document.getElementById("divfinghn2").style.display = "none";
						document.getElementById("divfingbagnumber1").style.display = "none";
						document.getElementById("divfingbagnumber2").style.display = "none";
					}

					if (tab == "2_1" || tab == "2_2" || tab == "1_1") {
						document.getElementById("divprint1").style.display = "block";
						document.getElementById("divprint2").style.display = "block";
					}

					if (tab == "2_3" || tab == "2_5") {
						document.getElementById("divpayuser").style.display = "block";

						document.getElementById("div_fromwithdate").style.display = "block";
						document.getElementById("div_towithdate").style.display = "block";
						document.getElementById("div_fromwithtime").style.display = "block";
						document.getElementById("div_towithtime").style.display = "block";

						document.getElementById("div_frompaydate").style.display = "block";
						document.getElementById("div_topaydate").style.display = "block";
						document.getElementById("div_frompaytime").style.display = "block";
						document.getElementById("div_topaytime").style.display = "block";
						
						document.getElementById("divfinghn1").style.display = "block";
						document.getElementById("divfinghn2").style.display = "block";
					}

					if(tab == "2_2")
					{
						document.getElementById("divfinghn3").style.display = "block";
						document.getElementById("divfinghn4").style.display = "block";
						document.getElementById("divfinghn5").style.display = "block";
						document.getElementById("divfinghn6").style.display = "block";
					}else
					{
						document.getElementById("divfinghn3").style.display = "none";
						document.getElementById("divfinghn4").style.display = "none";
						document.getElementById("divfinghn5").style.display = "none";
						document.getElementById("divfinghn6").style.display = "none";
					}	

				}

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

				function showDoctorModal(id)
				{
					$("#customDoctorModal").modal('show');
				}

				function closeDoctorPage()
				{
					$("#customDoctorModal").modal('hide');
				}

				function showBeaconTimeLineModal(id,datetimestart)
				{
					setLoadBBTimeLine(id,datetimestart);
					$("#bloodBeaconTimeLineModal").modal('show');
				}

				

				function closeBeaconTimeLineModal()
				{
					$("#bloodBeaconTimeLineModal").modal('hide');
				}

				function showBloodHistoryPrintPayFormModal(id)
				{
					loadTableBloodHistoryPrintPay(id);
					$("#bloodHistoryPrintPayFormModal").modal('show');
				}

				function closeBloodHistoryPrintPayFormModal()
				{
					$("#bloodHistoryPrintPayFormModal").modal('hide');
				}


				function saveFormData() {

					checkBloodDoctor();
					dataForm['doctoritem'] = JSON.stringify(getBloodDoctor()); 
					dataForm['unitcomfirmused'] = localStorage.getItem("pointwardid",'');

						$.ajax({
							type: 'POST',
							url: 'bloodqueuetabsave2_1.php',
							data: dataForm,
							dataType: 'json',
							complete: function () {
								var delayInMilliseconds = 200;
								setTimeout(function () {
									spinnerhide();
								}, delayInMilliseconds);
							},
							success: function (data) {

								if (data.status) {

									setBloodQueueUsedWaitState();

									socket.emit('queue', data.gid);

									myAlertTop();
									
									closeDoctorPage();
									if (document.getElementById("autoprint").checked)
									printJS({
												printable: localurl + "/report/blood-receive-form.php?id=" + data.id,
												type: 'pdf',
												showModal: true
											});

											document.getElementById("autoprint").checked = (tabNameActive != '2_1');
								} else {
									myAlertTopError();
								}

							},
							error: function (data) {
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

					function setRemark(self)
					{
						var row = self.parentNode.parentNode;
						var item = JSON.parse(row.cells[0].innerHTML);

						item.requestbloodcrossmacthremark = self.value;
						row.cells[0].innerHTML = JSON.stringify(item);
					}

					function setDoctorid(self)
					{
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