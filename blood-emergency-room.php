<?php



session_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

	include('checkPermission.php');
	if(!checkPermission("BK_BLOOD_EM_DISCHARG","VW"))
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

	<title>บันทึกปลดเลือด (ห้องฉุกเฉิน)</title>
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
								<h1 class="main-title float-left">บันทึกปลดเลือด (ห้องฉุกเฉิน)</h1>
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
											<label for="inputCity">หมายเลขถุง</label>
											<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
											<input type="text" onkeyup="scanBarcode()" name="barcode"
												class="form-control" id="barcode" autocomplete="off" autofocus>
										</div>

										<div class="form-group col-md-3">
											<label for="inputCity">RFID</label>
											<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
											<input type="text" name="rfidscan" class="form-control"
												value="<?php echo $barcode; ?>" id="rfidscan" autocomplete="off">
										</div>
									</div>

								</div>

								<form role="form" id="myform" method="POST" action="blood-disconnectsave.php"
									enctype="multipart/form-data">

									<div class="card-body">
										<label id="total"><b>รวมทั้งหมด <label id="blood-release">0</label>
												รายการ</b></label>
										<div class="table-no-scroll">
											<table id="list_table_json_out" style="width:1620px">
												<thead>
													<tr>
														<th class="td-table">CK</th>
														<th style="width:120px" class="td-table">หมายเลขถุง</th>
														<th style="width:120px" class="td-table">RFID</th>
														<th style="width:30px" class="td-table">sub</th>
														<th style="width:100px" class="td-table">ชนิดเลือด</th>
														<th style="width:120px" class="td-table">หมายเลขสาย</th>
														<th class="td-table">Bl.Gr.</th>
														<th class="td-table">Rh</th>
														<th class="td-table" style="width:80px">Volume</th>
														<th style="width:120px" class="td-table">วันที่เจาะ</th>
														<th style="width:120px" class="td-table">วันที่หมดอายุ</th>
														<th class="td-table">Antibody</th>
														<th class="td-table">Phenotype</th>
													</tr>
												</thead>
												<tbody>


												</tbody>
											</table>
										</div>

										<!-- <div class="table-no-scroll">
											<table id="list_table_json_out_sum" >
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
														<th style="width:120px" class="td-table">CAYO(A) = 0</th>

													</tr>

												</tbody>
											</table>
										</div> -->
									</div>





							</div><!-- end card-->


						</div>

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

	<script src="assets/js/mgs.js?ref=<?php echo rand(); ?>"></script>
	<script src="assets/js/blood-emergency-room.js?ref=<?php echo rand(); ?>"></script>
	<script src="assets/js/menu.js?ref=<?php echo rand(); ?>"></script>
	<!-- App js -->
	<script src="assets/js/pikeadmin.js?ref=<?php echo rand(); ?>"></script>



	<!-- BEGIN Java Script for this page -->
	<script src="assets/plugins/select2/js/select2.min.js?ref=<?php echo rand(); ?>"></script>
	<script>
		// START CODE Show / hide columns dynamically DATA TABLE 		

		// START CODE Individual column searching (text inputs) DATA TABLE 		
		$(document).ready(function () {

			$("#barcode").keyup(function (event) {

				if (event.keyCode === 13) {
					var barcode = $("#barcode").val();
					barcode = barcode.trim();
					if (barcode.length == 0) {
						return false;
					}
					searchBagNumber(barcode);

					document.getElementById("barcode").value = "";
					document.getElementById("barcode").focus();
				}
			});

			$("#rfidscan").keyup(function (event) {

				if (event.keyCode === 13) {
					var barcode = $("#rfidscan").val();
					barcode = barcode.trim();
					if (barcode.length == 0) {
						return false;
					}
					searchRfid(barcode);

					document.getElementById("rfidscan").value = "";
					document.getElementById("rfidscan").focus();
				}
			});


			setBagStockType();


			dateBE(".date");
			loadTable();

			$('#myform').submit(function () {

				var data = getFormData($("#myform"));
				data['getoutblood'] = JSON.stringify(getOutBlood());

				spinnershow();
				$.ajax({
					type: 'POST',
					url: 'blood-emergency-roomsave.php',
					data: data,
					complete: function () {
						var delayInMilliseconds = 200;
						setTimeout(function () {
							spinnerhide();
						}, delayInMilliseconds);
					},
					success: function (data) {
						if (data) {
							myAlertTop();
							loadTable();
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
				return false;
			});

			function getFormData($form) {
				var unindexed_array = $form.serializeArray();
				var indexed_array = {};

				$.map(unindexed_array, function (n, i) {
					indexed_array[n['name']] = n['value'];
				});
				return indexed_array;
			}

			function getOutBlood() {
				var arr = [];
				var rows = document.getElementById("list_table_json_out").rows;
				for (var i = 1; i < rows.length; i++) {
					arr.push(rows[i].cells[0].innerHTML);
				}
				return arr;

			}



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

		function setBagStockType() {
			$('#bloodstocktypecross').select2({
				allowClear: true,
				theme: "bootstrap",
				placeholder: "ชนิดเลือด",
				width: "100%",
				ajax: {
					url: 'data/masterdata/bloodstocktype.php',
					dataType: 'json',
					type: "GET",
					quietMillis: 50,
					data: function (keyword) {
						return {
							keyword: keyword.term,
						};
					},
					processResults: function (data) {
						return {
							results: $.map(data.data, function (item) {
								return {
									id: item.bloodstocktypeid,
									text: item.bloodstocktypename2
								}
							})
						};
					},

				}
			});

		}
		// END CODE Individual column searching (text inputs) DATA TABLE 	 	
	</script>
	<!-- END Java Script for this page -->

</body>

</html>