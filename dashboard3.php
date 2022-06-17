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
<?php include'setLocalUrl.php' ?>
<?php include'dateNow.php' ?>
<?php include'include/conn.php'; ?>



<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<?php include'include/title.php' ?>



	<!-- Bootstrap CSS -->

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />



	<!-- Font Awesome CSS -->

	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />



	<!-- Custom CSS -->

	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />



	<!-- BEGIN CSS for this page -->

	<!-- END CSS for this page -->



</head>



<body class="adminbody">

	<?php include('connection.php'); ?>

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

								<h1 class="main-title float-left">Dashboard</h1>

								<ol class="breadcrumb float-right">

									<li class="breadcrumb-item">Home</li>

									<li class="breadcrumb-item">Dashboard</li>

								</ol>

								<div class="clearfix"></div>

							</div>

						</div>

					</div>

					<!-- end row -->





					<div class="row">

						<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
							<a href="#">
								<div class="card-box noradius noborder bg-default">

									<i class="fa fa-file-text-o float-right text-white"></i>

									<h6 class="text-white text-uppercase m-b-20">จำนวนผู้รับบริจาค</h6>

									<h1 class="m-b-20 text-white counter"><?php echo number_format($status_Member); ?>
									</h1>

									<span class="text-white"><?php echo number_format($status_Member); ?> New
										Doner</span>

								</div>
							</a>

						</div>



						<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
							<a href="#">
								<div class="card-box noradius noborder bg-warning">



									<i class="fa fa-list-ol bigfonts float-right text-white"></i>

									<h6 class="text-white text-uppercase m-b-20">รายการสต๊อกเลือด </h6>

									<h1 class="m-b-20 text-white counter"><?php echo number_format($package_list); ?>
									</h1>

									<span class="text-white"><?php echo number_format($package_list); ?> All
										Inventory</span>

								</div>
							</a>

						</div>



						<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
							<a href="#">
								<div class="card-box noradius noborder bg-info">

									<i class="fa fa-th-list float-right text-white"></i>

									<h6 class="text-white text-uppercase m-b-20">Product</h6>

									<h1 class="m-b-20 text-white counter"><?php echo number_format($customer); ?></h1>

									<span class="text-white"><?php echo number_format($customer); ?> Product</span>

								</div>
							</a>

						</div>

						<!--

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">

											<div class="card-box noradius noborder bg-danger">

													<i class="fa fa-bell-o float-right text-white"></i>

													<h6 class="text-white text-uppercase m-b-20">Alerts</h6>

													<h1 class="m-b-20 text-white counter">58</h1>

													<span class="text-white">5 New Alerts</span>

											</div>

									</div>

                                    <!-->

					</div>

					<!-- end row -->



					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="card mb-3">
								<div class="card-header">
									<i class="fa fa-table"></i> สถิติการรับบริจาค
								</div>

								<div class="card-body">
									<canvas id="barChart"></canvas>
								</div>
								<div class="card-footer small text-muted">Updated 11:59 PM</div>
							</div><!-- end card-->
						</div>

						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="card mb-3">
								<div class="card-header">
									<i class="fa fa-table"></i> สถิติการรับบริจาค
								</div>

								<div class="card-body">
									<canvas id="comboBarLineChart"></canvas>
								</div>
								<div class="card-footer small text-muted">Updated 11:59 PM</div>
							</div><!-- end card-->
						</div>

					</div>








					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

							<div class="card mb-3">

								<div class="card-header">

									<h3><i class="fa fa-refresh"></i> ตารางนัดฟังผลเลือด</h3>

								</div>
								<div class="card-body">
									<div class="widget-messages nicescroll" style="height: 400px;">
										<table id="list_table_json_appointment"
											class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="width:60px">No.</th>
													<th style="width:260px">เลขบัตรประจำตัวประชาชน</th>
													<th>ชื่อ-สกุล</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$dateNow = dateNowTMD();
												$dateMouth = dateNowYMDMonth1() ;
											
												$strSQL = "SELECT 	RE.repeatinfectiondate3 ,
															DATE_FORMAT(RE.repeatinfectiondate3, '%d/%m/%Y') dmyrepeatinfectiondate3, 
															CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
															DR.donoridcard,
															RE.donateid
												FROM donate_repeatinfection RE
												LEFT JOIN donate DN ON RE.donateid = DN.donateid
												LEFT JOIN donor DR ON DN.donorid = DR.donorid
												WHERE RE.active <> 0
												AND RE.repeatinfectiondate3 BETWEEN '$dateNow' AND '$dateMouth'
												ORDER BY RE.repeatinfectiondate3 ASC";
												$objQuery = mysql_query($strSQL);

												$count = 1;
												$datedonate = "";
												while($objResuut = mysql_fetch_array($objQuery))
												{

													if($datedonate != $objResuut["repeatinfectiondate3"])
													{
														$count = 1;
														$datedonate = $objResuut["repeatinfectiondate3"] ;

														echo '<tr><td colspan="4">'.$objResuut["dmyrepeatinfectiondate3"].'</td></tr>';

													}


											?>



												<tr>
													<td><?php echo $count ; ?></td>
													<td><?php echo $objResuut["donoridcard"];?></td>
													<td><?php echo $objResuut["fullname"];?></td>
													<td>
														<button type="button"
															onclick=showDoc(<?php echo $objResuut["donateid"];?>)
															class="btn btn-info m-l-5">
															<i class="fa fa-search"> ดูเอกสาร</i>
														</button>
													</td>

												</tr>

												<?php
												$count++;
												}
											?>


											</tbody>
										</table>



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



			<?php include'footer.php' ?>

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



		<!-- App js -->

		<script src="assets/js/pikeadmin.js"></script>



		<!-- BEGIN Java Script for this page -->



		<!-- Counter-Up-->

		<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>

		<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>



		<script>
			$(document).ready(function () {

				// data-tables

				$('#example1').DataTable();



				// counter-up

				$('.counter').counterUp({

					delay: 10,

					time: 600

				});

			});
		</script>


		<!-- END Java Script for this page -->

		<script>
			function showDoc(id = "") {
				window.open(localurl + '/blood-donor-record.php?id=' + id);
			}

			// barChart
			var ctx1 = document.getElementById("barChart").getContext('2d');
			var barChart = new Chart(ctx1, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{

						data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)',
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});

			// comboBarLineChart
			var ctx2 = document.getElementById("comboBarLineChart").getContext('2d');
			var comboBarLineChart = new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						type: 'line',
						label: 'Dataset 1',
						borderColor: '#484c4f',
						borderWidth: 3,
						fill: false,
						data: [12, 19, 3, 5, 2, 3, 13, 17, 11, 8, 11, 9],
					}, {
						type: 'bar',
						label: 'Dataset 2',
						backgroundColor: '#FF6B8A',
						data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
						borderColor: 'white',
						borderWidth: 0
					}, {
						type: 'bar',
						label: 'Dataset 3',
						backgroundColor: '#059BFF',
						data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
					}],
					borderWidth: 1
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		</script>




</body>

</html>