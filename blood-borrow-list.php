<?php



session_start();
include('checkPermission.php');
if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

	if(!checkPermission("BK_WITHDRAW","VW"))
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

	<title>รายการเบิก/ยืม</title>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Font Awesome CSS -->
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/preload.css" rel="stylesheet" type="text/css" />

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
	</style>
	<!-- END CSS for this page -->

</head>

<body class="adminbody">

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

		<?php include'side-menu.php' ?>

		<!-- End Sidebar -->


		<div class="content-page">

			<!-- Start content -->
			<div class="content">

				<div class="container-fluid">



					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-holder">
								<h1 class="main-title float-left">รายการเบิก/ยืม</h1>
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
											<label for="inputState">สาขา</label>
											<select id="hospitalid" name="hospitalid"
												class="form-control hospitalid"></select>
                                        </div>
										<div class="form-group col-md-3">
											<label for="inputCity">ตั้งแต่วันที่</label>
											<input id="fromdate" name="fromdate" type="text" class="form-control date1" 
												value="<?php echo dateNowDMY(); ?>"
												placeholder="วว/ดด/ปปปป">
										</div>
										<div class="form-group col-md-3">
											<label for="inputCity">ถึงวันที่</label>
											<input id="todate" name="todate" type="text" class="form-control date1"
												value="<?php echo dateNowDMY(); ?>"
												placeholder="วว/ดด/ปปปป">
										</div>

                                        <div class="form-group col-md-3">
											<label for="inputState">เงื่อนไขการเบิกยืม</label>
											<select id="receivingtypeid" name="receivingtypeid"
												class="form-control receivingtypeid"></select>
                                        </div>

										<div class="form-group col-md-3">
											<label for="inputCity">HN</label>
											<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
											<input type="text" name="bloodborrowhn" class="form-control"
												 id="bloodborrowhn" onkeyup="scanBarcode(this)"
												placeholder="" autofocus>
										</div>

										<div class="form-group col-md-3">
											<br />
											<a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#"
												class="btn btn-info"><span class="btn-label"><i
														class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
										</div>
									</div>

								</div>

								<div class="card-body">
									<label id="total"><b>รวมทั้งหมด 0 ราย</b></label>
									<div class="table-responsive">
										<table id="list_table_blood" class="table table-bordered table-hover display">
											<thead>
                                                <tr>
                                            <th>วันที่เบิก/ยืม</th> 
											<th>เงื่อนไขการเบิกยืม</th>
											<th>สาขา</th>
                                            <th>HN</th>
                                            <th>ชื่อ-สกุล</th>
											<th>Action</th>
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
    <script src="assets/js/blood-borrow-list-event.js"></script>
    <script src="assets/js/blood-borrow-list-select.js"></script>
	<script src="assets/js/pagination.js"></script>
	<script src="assets/js/Replace.js"></script>
	<script src="assets/js/menu.js"></script>

	<!-- App js -->
	<script src="assets/js/pikeadmin.js"></script>

	

	<!-- BEGIN Java Script for this page -->

	<script src="assets/plugins/select2/js/select2.min.js"></script>
	<script>
		// START CODE Show / hide columns dynamically DATA TABLE 		

		// START CODE Individual column searching (text inputs) DATA TABLE 		
		$(document).ready(function () {
		
			dateBE(".date1");
			
			loadTable();
			// reloadAuto();
		});

		function addBlood() {
            window.location.href = 'blood-borrow.php';
		}

		function reloadAuto() {
			loadTable();
			setTimeout(function () {
				reloadAuto();
			}, 60000);

        }
        
        function editPage(id) {
					window.location.href = 'blood-borrow.php?id='+id;
		}


		function resetPage() {
			location.reload();
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