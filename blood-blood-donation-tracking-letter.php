<?php



session_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

	include('checkPermission.php');

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

	<title>15.พิมพ์จดหมายติดตามผู้บริจาคโลหิต</title>
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
		<?php include'setLocalUrl.php' ?>
		<?php include'top-nav.php' ?>

		<!-- End Navigation -->

		<!-- Left Sidebar -->

		<?php include'side-menu.php' ?>

		<!-- End Sidebar -->


		<div class="content-page">

			<!-- Start content -->
			<div class="content">

				<div class="container-fluid">



					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-holder">
								<h1 class="main-title float-left">15.พิมพ์จดหมายติดตามผู้บริจาคโลหิต</h1>
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
											<label for="inputCity">วันที่มาบริจาค</label>
											<input id="fromdate" name="fromdate" type="text" autocomplete="off"
												class="form-control date" value="<?php echo dateNowDMY(); ?>"
												placeholder="วว/ดด/ปปปป">
										</div>

										<div class="form-group col-md-2">
											<label for="inputCity">-</label>
											<input id="todate" name="todate" type="text" autocomplete="off"
												class="form-control date" value=""
												placeholder="วว/ดด/ปปปป">
										</div>

										<div class="form-group col-md-1" ><label>หมู่เลือด ABO</label>
											<select id="bloodgroupid" class="form-control" name="bloodgroupid"></select>
										</div>

										<div class="form-group col-md-1" ><label>Rh</label>
											<select id="rhid" class="form-control" name="rhid"></select>
										</div>

										<div class="form-group col-md-2">
											<br><br>
											<div class="form-check">
												<label class="form-check-label">
													<input checked id="donation_type_id1" class="check" type="radio"
														name="donation_type_id" value="1" >
													โลหิตทั่วไป
												</label>

												&emsp;&emsp;
												<label class="form-check-label">
													<input id="donation_type_id2" class="check" type="radio"
														name="donation_type_id" value="2" >
														เกล็ดโลหิต
												</label>
											</div>
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
										<label id="total"><b>รวมทั้งหมด <label id="blood-tracking-letter">0</label>
												ราย</b></label>
										<div class="table-no-scroll">
											<table id="list_table_blood_tracking_letter" >
												<thead>
													<tr>
														<th class="td-table" style="width:30px"><input type="checkbox" onclick="setUnChecked(this.checked)" checked></th>
														<th class="td-table" style="width:80px">วันที่บริจาค</th>
														<th class="td-table" style="width:80px">วันที่ครบกำหนด</th>
														<th class="td-table" style="width:100px">เลขที่ผู้บริจาค</th>
														<th class="td-table" style="width:200px">ชื่อ-นามสกุล</th>
														<th class="td-table" style="width:40px">อายุ</th>
														<th class="td-table" style="width:60px">หมู่เลือด</th>
														<th class="td-table" style="width:60px">Rh</th>
														<th class="td-table" style="width:60px">ครั้งที่</th>
														<th class="td-table">ที่อยู่</th>
														<th class="td-table" style="width:100px">เบอร์โทร</th>
														<th class="td-table" style="width:140px">E-mail</th>
													</tr>
												</thead>
												<tbody>


												</tbody>
											</table>
										</div>


									</div>
							</div><!-- end card-->
						</div>

					</div>

					<div class="div-save">
						<div class="save-bottom">
							<div class="form-group text-right m-b-0">
								<button class="btn btn-success" type="button" onclick="print01()">
									<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์จดหมายเชิญชวน
								</button>

								<button class="btn btn-success" type="button" onclick="printExcel()">
									<span class="btn-label"><i class="fa fa-print"></i></span>Export Excel
								</button>

								<button class="btn btn-success" type="button" onclick="print02()">
									<span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ซองจดหมาย
								</button>

								<button class="btn btn-info" type="button" onclick="sendSMS()">
									<span class="btn-label"><i class="fa fa-send"></i></span>ส่ง SMS
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

		<?php include'blood-blank-modal.php';?>
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
	<script src="assets/js/menu.js"></script>

	<script src="assets/js/blood-tracking-letter.js"></script>

	<!-- App js -->
	<script src="assets/js/pikeadmin.js"></script>

	<script src="assets/printJS/print.min.js"></script>

	<!-- BEGIN Java Script for this page -->
	
	<script src="assets/plugins/select2/js/select2.min.js"></script>
	<script>
		// START CODE Show / hide columns dynamically DATA TABLE 		

		// START CODE Individual column searching (text inputs) DATA TABLE 		
		$(document).ready(function () {

			
			dateBE(".date");
			loadTable();



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

		function sendSMS()
		{
			alert("ยังไม่สามารถส่ง SMS ได้ อยู่ระหว่างดำเนินการเชื่อมต่อ!!!");
		}
		// END CODE Individual column searching (text inputs) DATA TABLE 	 	
	</script>
	<!-- END Java Script for this page -->

</body>

</html>