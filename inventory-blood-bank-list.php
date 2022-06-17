<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
	include('checkPermission.php');
	if (!checkPermission("BK_BLOOD_STOCK", "VW")) {
		header('Location:not-permission.php');
	}

	require_once('connection.php');
	include('dateNow.php');
	$username = $_SESSION['username'];
	$fullname = $_SESSION['fullname'];

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

		<title>รายละเอียดคลังเลือด</title>
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
				z-index: 1;

			}

			.td-table-17 {
				padding: 1px !important;
				width: 5.88% !important;
			}

			.vertical-bottom {
				vertical-align: bottom !important;
				margin-bottom: 5px;
			}

			.vertical-top5 {
				margin-top: 5px !important;
			}

			.padding-top-top15 {
				padding-top: 15px;
			}

			.label-model {
				color: #272361;
				font-size: 14px;
			}

			.div-anti {
				background-color: #f8f9fa;
				border: 1px solid #ced4da;
				border-radius: .25rem;
				padding-top: 5px !important;
			}
		</style>
		<script>
			var username = "<?php echo "$username"; ?>";
			var fullname = "<?php echo "$fullname"; ?>";
			var session_staffid = "<?php echo $_SESSION['staffid']; ?>";
			var session_fullname = "<?php echo $_SESSION['fullname']; ?>";
		</script>

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
									<h1 class="main-title float-left">รายละเอียดคลังเลือด</h1>
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
												<input id="fromdate" name="fromdate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>
											<div class="form-group col-md-2">
												<label for="inputCity">ถึงวันที่</label>
												<input id="todate" name="todate" type="text" class="form-control date1" value="<?php echo dateNowDMY(); ?>" placeholder="วว/ดด/ปปปป">
											</div>
											<div class="form-group col-md-3">
												<label for="inputEmail4">ประเภทการรับ</label>
												<select id="receivingtypeid2" class="form-control receivingtypeid2" name="receivingtypeid2">
												</select>
											</div>

											<div class="form-group col-md-3">
												<label for="inputEmail4">ชนิดเลือด</label>
												<select id="bloodstocktypecross2" class="form-control bloodstocktypecross2" name="bloodstocktypecross2">
												</select>
											</div>

											<div class="form-group col-md-2">
												<label for="inputCity">หมายเลขถุง</label>
												<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
												<input type="text" name="bag_number_list" autocomplete="off" class="form-control" id="bag_number_list" onkeyup="scanBarcode2()" placeholder="หมายเลขถุง" autofocus>
											</div>

											<div class="form-group col-md-4">
												<label for="inputCity">RFID</label>
												<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
												<input type="text" onkeyup="scanRfid()" autocomplete="off" name="rfidcode_list" class="form-control" id="rfidcode_list" placeholder="RFID">
											</div>

											<div class="form-group col-md-2">
												<label for="inputCity">HN</label>
												<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
												<input type="text" name="hn" class="form-control" id="hn" placeholder="" autofocus>
											</div>

											<div class="form-group col-md-3">
												<br />
												<a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
											</div>

										</div>

									</div>

									<div class="card-body">

										<div class="table-no-scroll1" style="margin-top:12px;height:65vh;">
											<table id="list_table_stock" style="width:1680px">
												<thead>
													<tr>
														<th style="width:40px">No.</th>

														<th>วันที่-เวลารับเข้า</th>
														<th style="width:120px !important">ประเภทการรับเข้า</th>
														<th>No.</th>
														<th>ชนิดเลือด</th>
														<th>หมายเลขถุง</th>
														<th>RFID</th>
														<th>หมายเลขสาย</th>
														<th>Bl.Gr.</th>
														<th>Rh</th>
														<th>Volume</th>
														<th>วันที่เจาะ</th>
														<th>วันที่หมดอายุ</th>
														<th style="width:200px !important">Antibody</th>
														<th style="width:200px !important">Phenotype</th>
														<th style="width:200px !important">เจ้าหน้าที่รับเข้า</th>
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

										<div id="pagination" class="pagination">
										</div>


									</div>
								</div><!-- end card-->
							</div>

						</div>

						<div class="div-save">
							<div class="save-bottom">
								<div class="form-group text-right m-b-0">
									<button onclick="toStock()" class="btn btn-success" type="button">
										<span class="btn-label"><i class="fa fa-list-alt"></i></span>คลังเลือด
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
			<?php include 'blood-blank-modal2.php'; ?>
			<?php include('blood-investigate-modal.php'); ?>
			<?php include 'blood-blank-borrow-modal-1.php'; ?>
			<?php include 'blood-blank-borrow-modal-2.php'; ?>
			<?php include 'blood-blank-borrow-modal-5.php'; ?>
			<?php include 'blood-blank-borrow-modal-6.php'; ?>
			<?php include 'blood-blank-refund-modal-11.php'; ?>
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
		<script src="assets/js/spinner.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/EnterNext.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/FindData.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/DateTimeFormat.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/Replace.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/pagination.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodstock.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodstock-event.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodstock-in-out-ag-display.js?ref=<?php echo rand(); ?>"></script>

		<script src="assets/js/custom/blood-stock/borrow-event-1.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/custom/blood-stock/borrow-event-2.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/custom/blood-stock/borrow-event-5.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/custom/blood-stock/borrow-event-6.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/custom/blood-stock/refund-event-11.js?ref=<?php echo rand(); ?>"></script>


		<!-- App js -->
		<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>


		<script src="assets/printJS/print.min.js?ref=<?php echo rand(); ?>"></script>
		<!-- BEGIN Java Script for this page -->
		<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodliststock.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodliststock2.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodliststock-event.js?ref=<?php echo rand(); ?>"></script>
		<script src="assets/js/bloodliststock-event-hn.js?ref=<?php echo rand(); ?>"></script>
		<script>
			// START CODE Show / hide columns dynamically DATA TABLE 		

			// START CODE Individual column searching (text inputs) DATA TABLE 		
			$(document).ready(function() {

				dateBE(".date1");
				loadTable();

				$("#bag_number1").on('keydown', function(e) {
					if (e.which == 13) {
						scanBarcode1();
					}
				});

				$('#formBlood2').submit(function() {
					saveCross();
					return false;
				});

				$('.bloodbagtype2').select2({
					allowClear: true,
					theme: "bootstrap",
					placeholder: "ชนิดถุง",
					width: "100%",
					ajax: {
						url: 'data/masterdata/bagtype.php',
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
										id: item.bagtypeid,
										text: item.bagtypename
									}
								})
							};
						},

					}
				});


				$('.bloodstocktypecross2').select2({
					allowClear: true,
					theme: "bootstrap",
					placeholder: "ชนิดเลือด",
					width: "100%",
					ajax: {
						url: 'data/masterdata/bloodstocktype.php',
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
										id: item.bloodstocktypeid,
										text: item.bloodstocktypename2
									}
								})
							};
						},

					}
				});

				$('.bloodstocktypecross').select2({
					allowClear: true,
					theme: "bootstrap",
					placeholder: "ชนิดเลือด",
					width: "100%",
					ajax: {
						url: 'data/masterdata/bloodstocktype.php',
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
										id: item.bloodstocktypeid,
										text: item.bloodstocktypename2
									}
								})
							};
						},

					}
				});

				$('.receivingtypeid2').select2({
					allowClear: true,
					theme: "bootstrap",
					placeholder: "ประเภทการรับ",
					width: "100%",
					ajax: {
						url: 'data/masterdata/receivingtype.php',
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
										id: item.receivingtypeid,
										text: item.receivingtypename
									}
								})
							};
						},

					}
				});

			});

			function toStock() {
				window.location.href = 'inventory-blood-bank.php';
			}

			function addBloodBlank2(index) {

				document.getElementById("formBlood2").reset();

				$("#blankModal2").modal('show');
				count = 0;

				var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
				while (body.firstChild) {
					body.removeChild(body.firstChild);
				}

				$("#bloodstockmainid").val(dataObj[index].bloodstockmainid);

				setBloodStockRemarkEditOther2(dataObj[index].bloodstockremarkeditid)

				console.log("===============");
				console.log(dataObj[index]);

				document.getElementById("divbloodstockfloor2").style.visibility = "visible";

				if (dataObj[index].bloodstockeditusername != "") {
					$("#bloodstockeditusername2").val(dataObj[index].bloodstockeditusername);
					$("#bloodstockeditfullname2").val(dataObj[index].bloodstockeditfullname);
					var $newOption = $("<option selected='selected'></option>").val(dataObj[index].bloodstockremarkeditid).text(dataObj[index].bloodstockremarkedittext)
					$("#bloodstockremarkeditid2").append($newOption).trigger('change');
					$("#bloodstockotherremark2").val(dataObj[index].bloodstockotherremark);
				} else {
					$("#bloodstockeditusername2").val(username);
					$("#bloodstockeditfullname2").val(fullname);
					var $newOption = $("<option selected='selected'></option>").val("").text("")
					$("#bloodstockremarkeditid2").append($newOption).trigger('change');
					$("#bloodstockotherremark2").val("");
				}



				$('#hospital').val(null);
				$('#hospital').trigger('change');
				$('#bloodbagtype').val(null);
				$('#bloodbagtype').trigger('change');
				$('#bloodstocktypecross').val(null);
				$('#bloodstocktypecross').trigger('change');
				$('#receivingtypeid').val(null);
				$('#receivingtypeid').trigger('change');
				$('#bloodgroupcross').val(null);
				$('#bloodgroupcross').trigger('change');
				$('#bloodrhcross').val(null);
				$('#bloodrhcross').trigger('change');
				$('#donation_date_cross').val('');
				$('#donation_exp_cross').val('');
				$('#volume').val('');
				$('#bag_number').val('');
				$('#rfidcode').val('');
				setValueHospital();
				setValueReceivingType();
				$("#sub").select2("val", "1");

				// document.getElementById('antibody').value = '';
				// document.getElementById('antibodyLable').innerHTML = '';
				// document.getElementById('phenotype').value = '';
				// document.getElementById('phenotypeLable').innerHTML = '';

				$.each(dataObj[index].item, function(ind, v) {
					if (v.active == 1)
						addBlood("EDIT", v, dataObj[index], 1);
				});

				chk_bag_icon++;
			}

			function addBloodBlankDonate(index) {

				deleteArr = [];
				$("#blankModal").modal('show');
				count = 0;

				var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
				while (body.firstChild) {
					body.removeChild(body.firstChild);
				}
				$("#bloodstockmainid2").val(dataObj[index].bloodstockmainid);
				$('#bloodstocktypecross1').val("").change();
				$("#bag_number1").val('');
				$("#rfidscan").val('');

				document.getElementById("divbloodstockfloor1").style.visibility = "visible";


				setBloodStockRemarkEditOther(dataObj[index].bloodstockremarkeditid)


				if (dataObj[index].bloodstockeditusername != "") {
					$("#bloodstockeditusername").val(dataObj[index].bloodstockeditusername);
					$("#bloodstockeditfullname").val(dataObj[index].bloodstockeditfullname);
					var $newOption = $("<option selected='selected'></option>").val(dataObj[index].bloodstockremarkeditid).text(dataObj[index].bloodstockremarkedittext)
					$("#bloodstockremarkeditid").append($newOption).trigger('change');
					$("#bloodstockotherremark").val(dataObj[index].bloodstockotherremark);
				} else {
					$("#bloodstockeditusername").val(username);
					$("#bloodstockeditfullname").val(fullname);
					var $newOption = $("<option selected='selected'></option>").val("").text("")
					$("#bloodstockremarkeditid").append($newOption).trigger('change');
					$("#bloodstockotherremark").val("");
				}

				$.each(dataObj[index].item, function(ind, v) {
					addBloodTableDonate(v, dataObj[index]);
				});
			}

			function setBloodStockRemarkEditOther(v = "") {
				if (v == 99) {
					document.getElementById("divbloodstockotherremark1").style.visibility = "visible";
				} else {
					document.getElementById("divbloodstockotherremark1").style.visibility = "hidden";
				}
			}

			function setBloodStockRemarkEditOther2(v = "") {
				if (v == 99) {
					document.getElementById("divbloodstockotherremark2").style.visibility = "visible";
				} else {
					document.getElementById("divbloodstockotherremark2").style.visibility = "hidden";
				}
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

			function scanBarcode2() {
				var bag_number_list = $('#bag_number_list').val();
				var bag_number_list_new = numnerPoint(bag_number_list);
				$('#bag_number_list').val(bag_number_list_new);

				if ($("#bag_number_list").val().length == 14) {
					loadTable(1, $("#bag_number_list").val(), "");
				}

			}

			var counterrfid_code;

			function scanRfid() {

				if ($("#rfidcode_list").val().length > 0) {


					var count = 20;
					if (counterrfid_code)
						clearInterval(counterrfid_code);

					counterrfid_code = setInterval(timer, 100); //1000 will  run it every 1 second

					function timer() {
						count = count - 1;

						if (count <= 0) {

							clearInterval(counterrfid_code);
							loadTable(1, "", $("#rfidcode_list").val());
							return;
						}

						//Do code for showing the number of seconds here
					}
				}

			}

			function showBloodBorrow() {

				$('#bloodstockmainid').val("");

				var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
				while (body.firstChild) {
					body.removeChild(body.firstChild);
				}
				$('#patienthn').val('');
				$('#patientfullname').val('');
				$('#phenotype').val('');
				var receivingtypeid = $("#receivingtypeid").val();


				setReceivingTypeID(receivingtypeid);
				if (receivingtypeid == 1) {
					loadTableBloodBorrowReceivingtypeid1(receivingtypeid);
					$('#bloodBorrowModal1').modal('show');
				} else if (receivingtypeid == 2 || receivingtypeid == 3 || receivingtypeid == 4 || receivingtypeid == 12 ) {

					if (receivingtypeid == 2) {
						document.getElementById('label_borrow_receivingtypeid').innerHTML =
							"ข้อมูลประวัติการเบิกโลหิตที่หายากกับสภากาชาดไทย";
					} else if (receivingtypeid == 3) {
						document.getElementById('label_borrow_receivingtypeid').innerHTML =
							"ข้อมูลประวัติการรับเลือดจากการเบิก Apheresis Product";
					} else if (receivingtypeid == 4) {
						document.getElementById('label_borrow_receivingtypeid').innerHTML =
							"ข้อมูลประวัติการรับเลือดรับจากการเบิก Rh Negative";
					} else if (receivingtypeid == 12) {
						document.getElementById('label_borrow_receivingtypeid').innerHTML =
							"ข้อมูลประวัติการเบิกโลหิตเฉพาะรายกับสภากาชาดไทย";
					}

					loadTableBloodBorrowReceivingtypeid2(receivingtypeid);
					$('#bloodBorrowModal2').modal('show');
				} else if (receivingtypeid == 5) {

					document.getElementById('label_stock_pay').innerHTML = "ข้อมูลประวัติการให้ยืมเลือดกับ" + hospitalname;
					loadTableBloodStockPay(receivingtypeid);
					$('#bloodBloodStockPay').modal('show');

					document.getElementById('label_stock_pay_title_1').innerHTML = "จำนวนที่ให้ยืม";
					document.getElementById('label_stock_pay_title_2').innerHTML = "จำนวนที่รับคืน";

				} else if (receivingtypeid == 6) {
					document.getElementById('label_stock_pay').innerHTML = "ข้อมูลประวัติการแลกเลือดกับ" + hospitalname;
					loadTableBloodStockPay(receivingtypeid);
					$('#bloodBloodStockPay').modal('show');

					document.getElementById('label_stock_pay_title_1').innerHTML = "จำนวนที่ให้แลก";
					document.getElementById('label_stock_pay_title_2').innerHTML = "จำนวนที่รับแลก";
				} else if (receivingtypeid == 11 || receivingtypeid == 13) {

					if(receivingtypeid == 13)
                    {
                        document.getElementById('label_borrow_receivingtypeid_5').innerHTML = "ข้อมูลประวัติการแลกเลือดกับ" +
						hospitalname + ' (กรณีรับเลือดมาก่อน)';
                        loadTableBloodBorrowReceivingtypeid5(13);
                    }else
                    {
                        document.getElementById('label_borrow_receivingtypeid_5').innerHTML = "ข้อมูลประวัติการยืมเลือดกับ" +
                        hospitalname;
                        loadTableBloodBorrowReceivingtypeid5();
                    }
					
              
                    
                    $('#bloodBorrowModal5').modal('show');

				}

			}

			function closeBloodBorrow1() {
				$('#bloodBorrowModal1').modal('hide');
			}

			function closeBloodBorrow2() {
				$('#bloodBorrowModal2').modal('hide');

			}

			function closeBloodBorrow5() {
				$('#bloodBorrowModal5').modal('hide');
			}

			function closeBloodBorrow6() {
				$('#bloodBorrowModal6').modal('hide');
			}

			function showBloodRefund() {
				loadTableBloodrefundReceivingtypeid5();
				$('#bloodRefundModal5').modal('show');
			}

			function closeBloodRefund5() {
				$('#bloodRefundModal5').modal('hide');
			}

			function closeBloodStockPay() {
				$('#bloodBloodStockPay').modal('hide');
			}


			// END CODE Individual column searching (text inputs) DATA TABLE 	 	
		</script>
		<!-- END Java Script for this page -->

	</body>

	</html>