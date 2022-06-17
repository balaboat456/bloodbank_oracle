<?php



session_start();

if(isset($_SESSION['id']) && $_SESSION['id'] != '') { 

//include_once('common.php');

require_once('connection.php');



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

	<title>รายการรับบริจาคโลหิต</title>

	<!-- Switchery css -->
	<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

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

	<!-- BEGIN CSS for this page -->

	<!-- END CSS for this page -->

	<style>
		input[type=checkbox] {
			width: 17px;
			height: 17px;
		}

		.select2-container--bootstrap .select2-selection--single {

			box-sizing: border-box;
		}

		.paging-nav {
				text-align: right;
				padding-top: 2px;
			}

			.paging-nav a {
				margin: auto 1px;
				text-decoration: none;
				display: inline-block;
				padding: 1px 7px;
				background: #91b9e6;
				color: white;
				border-radius: 3px;
			}

			.paging-nav .selected-page {
				background: #187ed5;
				font-weight: bold;
			}
	</style>
</head>




<body class="adminbody">
				
	<form role="form" method="POST" action="blood-donor-record-save.php" enctype="multipart/form-data">
	<div class="myAlert-top alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success!</strong> บันทึกข้อมูลสำเร็จ
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
									<h1 class="main-title float-left">รายการรับบริจาคโลหิต</h1>
									<ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">รายการรับบริจาคโลหิต</li>
									</ol>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<!-- end row -->


						<!--<div class="alert alert-danger" role="alert" align="center"><!-->
						<div class=" message" align="center">


						</div>

						<!--
					  <h4 class="alert-heading">Forms</h4>
                      <!-->
						

						<div class="card mb-3">
							<div class="card-header">

								<h3><i class="fa fa-list"></i> รายการรับบริจาคโลหิต
										<span class="pull-right">
										<button type="button" class="btn btn-primary btn-sm" onclick="newPage()" data-toggle="modal" data-target="#addrh"><i class="fa fa-plus-circle"></i> Create New</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="list" class="table table-bordered table-hover display">
										<tr>
											<th>No.</th>
											<th>วันที่</th> 
											<th>เลขที่ผู้บริจาค</th>
											<th>เลขบัตรประชาชน</th>
											<th>ชื่อ-สกุล</th>
											<th>สถานะ</th>
											<th>Action</th>
										</tr>
										
										<?php
									$strSQL = "SELECT DN.*,
															DR.donorcode,
															DR.donoridcard,
															DR.donorbirthday,
															DR.donorage,
															DR.donoroccupation,
															DR.donortelhome,
															DR.donormobile,
															DR.genderid,
															DR.prefixid,
															DR.fname,
															DR.lname,
															DR.address,
															DR.countryid,
															DR.provinceid,
															DR.districtid,
															DR.subdistrictid,
															DR.zipcode,
															DR.souvenirid,
															DR.blood_group,
															DR.rh,
															ST.donatestatusname
												FROM donate DN
												LEFT JOIN donor DR ON DN.donorid = DR.donorid
												LEFT JOIN donatestatus ST ON DN.donatestatusid = ST.donatestatusid
												ORDER BY DR.donorid ASC";
									$objQuery = mysql_query($strSQL);
									$i = 1;
									while($objResuut = mysql_fetch_array($objQuery))
									{
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo date_format(date_create($objResuut['donation_date']),"d/m/Y"); ?></td> 
											<td><?php echo $objResuut['donorcode']; ?></td>
											<td><?php echo $objResuut['donoridcard']; ?></td>
											<td><?php echo $objResuut['fname'].' '.$objResuut['lname']; ?></td> 
											<td><?php echo $objResuut['donatestatusname']; ?></td>
											<td>
													<button type="button" onclick="editPage(<?php echo $objResuut['donateid']; ?>)"  class="btn btn-success m-l-5">
													    <i class="fa fa-edit"></i>
													</button>
											</td>
										</tr>
									<?php
									$i++;
									}
									?>
										
									</table>
								</div>
							</div>

						</div>


						</div>
						<!-- END container-fluid -->

					</div>
					<!-- END content -->

				</div>
				<!-- END content-page -->

				<?php include'footer.php';?>
				<?php }



else {

	header('Location:index.php');

}

?>

			</div>
			<!-- END main -->

			<script src="assets/js/modernizr.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/moment.min.js"></script>

			<script src="assets/js/popper.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>

			<script src="assets/js/detect.js"></script>
			<script src="assets/js/fastclick.js"></script>
			<script src="assets/js/jquery.blockUI.js"></script>
			<script src="assets/js/jquery.nicescroll.js"></script>
			<script src="assets/js/jquery.scrollTo.min.js"></script>
			<script src="assets/plugins/switchery/switchery.min.js"></script>

			<!-- App js -->
			<script src="assets/js/pikeadmin.js"></script>

			<script src="assets/js/EnterNext.js"></script>
			<script src="assets/js/FindData.js"></script>
		


			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	

			<!-- BEGIN Java Script for this page -->

			<!-- END Java Script for this page -->

			<script>
				$(document).ready(function () {
					
	

				});

				function newPage() {
					window.location.href = 'blood-donor-record.php';
				}

				function editPage(id) {
					window.location.href = 'blood-donor-record.php?id='+id;
				}

			</script>
			<!-- BEGIN Java Script for this page -->

			<script src="assets/plugins/select2/js/select2.min.js"></script>

	</form>
</body>

</html>