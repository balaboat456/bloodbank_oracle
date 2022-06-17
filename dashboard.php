<?php

session_start();
include('checkPermission.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != '') {

	if (!checkPermission("BK_DASHBOARD", "VW")) {
		header('Location:not-permission.php');
	}

	require_once('connection.php');
	include('dateNow.php');
} else {
	header('Location:index.php');
}


date_default_timezone_set('Asia/Bangkok');


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php include 'include/title.php' ?>
	<title>Dashboard</title>

	<link rel="stylesheet" href="assets/assets-dashboard/materialize/css/materialize.min.css" media="screen,projection" />
	<!-- Bootstrap Styles-->
	<link href="assets/assets-dashboard/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/assets-dashboard/css/font-awesome.css" rel="stylesheet" />
	<!-- Morris Chart Styles-->
	<link href="assets/assets-dashboard/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="assets/assets-dashboard/css/custom-styles.css" rel="stylesheet" />
	<link href="assets/css/custom-table.css" rel="stylesheet" />
	<link href="assets/css/preload.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/spinner.css" rel="stylesheet" type="text/css" />

	<link href="assets/css/style2.css" rel="stylesheet" type="text/css" />
	<link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

	<!-- Google Fonts-->
	<link rel="stylesheet" href="assets/assets-dashboard/js/Lightweight-Chart/cssCharts.css">

	<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

	<style>
		.modal-content {
			height: 100vh !important;
		}

		.modal.bottom-sheet {
			top: auto;
			bottom: -100%;
			margin: 0;
			width: 100%;
			max-height: 100%;
			border-radius: 0;
			will-change: bottom, opacity;
		}

		.btn-close {
			right: 10px;
			position: absolute;
			top: 30px;
			background: crimson;
		}

		.bag-redcell {
			background-color: #E56997;
			color: #333;
		}

		.bag-platelet {
			background-color: #FBC740;
			color: #333;
		}

		.bag-plasma {
			background-color: #2EC4B6;
			color: #333;
		}

		.bag-cryo {
			background-color: #66D2D6;
			color: #333;
		}

		.bag-wb {
			background-color: #BD97CB;
			color: #333;
		}

		th,
		td {
			text-align: center;
			vertical-align: middle !important;
			border-radius: 0px !important;
		}

		.td-table {
			padding: 1px !important;
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

		.select-wrapper input.select-dropdown {
			font-size: 20px;
		}

		.select-wrapper+label {
			position: absolute;
			top: -20px;
			font-size: 16px;
		}

		[type="radio"]:not(:checked),
		[type="radio"]:checked {
			position: unset;
			left: -9999px;
			opacity: unset;
			height: 24px;
			width: 24px;
		}

		.btn-group-lg>.btn,
		.btn-lg {
			padding: 0px 16px;
		}

		.simple-pagination ul {
			margin: 0 0 20px;
			padding: 0;
			list-style: none;
			text-align: center;
		}

		.simple-pagination li {
			display: inline-block;
			margin-right: 5px;
		}

		.simple-pagination li a,
		.simple-pagination li span {
			color: #666;
			padding: 5px 10px;
			text-decoration: none;
			border: 1px solid #EEE;
			background-color: #FFF;
			box-shadow: 0px 0px 10px 0px #EEE;
		}

		.simple-pagination .current {
			color: #FFF;
			background-color: #FF7182;
			border-color: #FF7182;
		}

		.simple-pagination .prev.current,
		.simple-pagination .next.current {
			background: #e04e60;
		}
	</style>

</head>

<body>
	<?php include 'top-nav.php' ?>
	<?php include 'preload.php' ?>
	<div id="wrapper">




		<div id="page-wrapper">
			<div class="header">
				<h1 class="page-header">
					Dashboard
				</h1>

			</div>
			<div id="page-inner">

				<div class="dashboard-cards">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3">

							<div class="card horizontal cardIcon waves-effect waves-dark" onclick="openModal1()">
								<div class="card-image red">
									<i class="material-icons dp48">favorite</i>
								</div>
								<div class="card-stacked red">
									<div class="card-content">
										<h3 id="donatedatetotal">0 คน</h3>
									</div>
									<div class="card-action">
										<strong>จำนวนผู้บริจาคโลหิตวันนี้</strong>
									</div>
								</div>
							</div>

						</div>

						<div class="col-xs-12 col-sm-6 col-md-3">

							<div class="card horizontal cardIcon waves-effect waves-dark" onclick="openModal2()">
								<div class="card-image orange">
									<i class="material-icons dp48">bloodtype</i>
								</div>
								<div class="card-stacked orange">
									<div class="card-content">
										<h3 id="bagnumbertotal">0 ยูนิต</h3>
									</div>
									<div class="card-action">
										<strong>จำนวนเลือดในคลังวันนี้</strong>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">

							<div class="card horizontal cardIcon waves-effect waves-dark" onclick="openModal3()">
								<div class="card-image blue">
									<i class="material-icons dp48">view_agenda</i>
								</div>
								<div class="card-stacked blue">
									<div class="card-content">
										<h3 id="gatetotal">0 ยูนิต</h3>
									</div>
									<div class="card-action">
										<strong>จำนวนเลือดแดงในตู้วันนี้</strong>
									</div>
								</div>
							</div>

						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">

							<div class="card horizontal cardIcon waves-effect waves-dark" onclick="openModal4()">
								<div class="card-image green">
									<i class="material-icons dp48">equalizer</i>
								</div>
								<div class="card-stacked green">
									<div class="card-content">
										<h3 id="crossmacthdatetotal">0 ยูนิต</h3>
									</div>
									<div class="card-action">
										<strong>จำนวนโลหิต crossmatch วันนี้</strong>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade custom-modal" id="customChangeNameModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel2">ประวัติการเปลี่ยนชื่อ-สกุล</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table id="list_table_json_chanhe_name" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>วัน-เวลา</th>
											<th>ชื่อ-สกุลเดิม</th>
											<th>ชื่อ-สกุลใหม่</th>
											<th>เจ้าหน้าที่</th>
										</tr>
									</thead>
									<tbody>


									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<div class="save-bottom">
									<div class="form-group text-right m-b-0">
										<button onclick="closeChangeNamePage()" class="btn btn-warning" type="button">
											<span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
										</button>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal Structure -->
				<div id="modal_appove" class="modal">
					<div class="modal-content">
						<h3><b>เพิ่มนัดหมาย</b></h3><br>
						<div class="row" id="add_approve1">
							<div class="form-group col-md-5">
								<label for="inputCity">ค้นหา</label>
								<select id="search" name="search" class="form-control"></select>
							</div>
							<div class="form-group col-md-3">
								<label for="inputCity">วันที่นัด</label>
								<input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="appointmentdate" class="form-control" id="appointmentdate">
							</div>
							<div class="form-group col-md-3">
								<label for="inputCity">ประเภทการนัด</label>
								<select name="appointmenttype" class="browser-default" id="appointmenttype">
									<option value="" selected>โปรดระบุ</option>
									<?php
									$strSQL = "SELECT * FROM appointment_type ORDER BY sort ASC";
									$objQuery = mysql_query($strSQL);
									while ($objResuut = mysql_fetch_array($objQuery)) {
									?>
										<option value="<?php echo $objResuut['appointment_typeid']; ?>">
											<?php echo $objResuut["appointment_typename"]; ?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="row" id="add_approve2">
							<div class="form-group col-md-5">
								<label for="inputCity">ชื่อ - นามสกุล</label>
								<input autocomplete="off" type="text" readonly name="appointmentname" class="form-control" id="appointmentname">
							</div>
							<div class="form-group col-md-3">
								<label for="inputCity">รหัสบัตรประชาชน</label>
								<input autocomplete="off" type="text" readonly name="donoridcard" class="form-control" id="donoridcard">
							</div>

							<div class="form-group col-md-3">
								<label for="inputCity">หมายเหตุ</label>
								<input autocomplete="off" type="text" name="appointmentremark" class="form-control" id="appointmentremark">
							</div>
						</div>
						<div class="row" id="add_approve3">
							<div class="form-group col-md-5">
								<label for="inputCity">ผู้ทำการนัด</label>
								<select id="appointment_usercreate" class="browser-default" name="appointment_usercreate">
									<option value="" selected>โปรดระบุ</option>
									<?php
									$strSQL = "SELECT * FROM staff";
									$objQuery = mysql_query($strSQL);
									while ($objResuut = mysql_fetch_array($objQuery)) {
									?>
										<option value="<?php echo $objResuut['id']; ?>">
											<?php echo $objResuut["name"]; ?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="inputCity">วันที่ทำนัด</label>
								<input autocomplete="off" type="text" value="<?php echo dateNowDMY() ?>" name="appointment_createdate" class="form-control" id="appointment_createdate" readonly>
							</div>
						</div>
						<div style="text-align: right;">
							<a href="#!" class="waves-effect waves-light btn" onclick="add_data_appove()">บันทึก</a>
							<a href="#!" class="waves-effect waves-light btn red" onclick="closeModal_app()">ปิด</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="card-action">
								<b>ตารางนัดหมายผู้บริจาค/การรักษา</b><br>
								<button type="button" style="margin-left: 1400px;" class="waves-effect waves-light btn" onclick="openModal_app()">เพิ่มนัด</button>

							</div>
							<div class="card-image">

								<div class="row" style="margin-left: 0px;margin-right: 0px;">
									<div class="col s12">
										<ul class="tabs">
											<li class="tab"><a class="active" href="#tab1">นัดหมายทั้งหมด</a></li>
											<li class="tab"><a href="#tab2">นัดเจาะซ้ำ</a></li>
											<li class="tab"><a href="#tab3">นัดฟังผล</a></li>
											<li class="tab"><a href="#tab4">นัด SDP</a></li>
											<li class="tab"><a href="#tab5">นัด Autologous</a></li>
											<li class="tab"><a href="#tab6">นัด Blood Letting</a></li>
											<li class="tab"><a href="#tab7">นัด Exchange</a></li>
											<li class="tab"><a href="#tab8">นัด Washed Red Cell</a></li>
											<li class="tab"><a href="#tab9">นัด Serum Tear</a></li>
										</ul>
									</div>

									<?php for ($x = 1; $x <= 9; $x++) { ?>



										<div id="tab<?php echo $x ?>" class="col s12">
											<table id="dashboardtable" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th style="width:180px">มา/ไม่มา</th>
														<th style="width:60px">No.</th>
														<th style="width:140px">วันที่นัดหมาย</th>
														<th style="width:120px">HN</th>
														<th style="width:260px">เลขบัตรประจำตัวประชาชน</th>
														<th>ชื่อ-สกุล</th>
														<th>ส่วนงาน</th>
														<th>รายละเอียดการนัดหมาย</th>
														<th>เจ้าหน้าที่</th>
														<th>วันที่ทำการนัด</th>
													</tr>
												</thead>
												<tbody>

													<?php
													$dateNow = dateNowTMD();
													$dateAlert = dateNowDMY();
													$dateMouth = dateNowYMDMonth1();
													$dateNowYMDPush7 = dateNowYMDPush7();



													$strSQL = "SELECT 
														M.*,
														DATE_FORMAT(STR_TO_DATE(M.DMY_repeatinfectiondate, '%d/%m/%Y' ), '%Y-%m-%d') AS repeatdate 
														FROM
														(
														
														";

													if ($x == 1 || $x == 2)
														$strSQL = $strSQL . "

														SELECT 	
														'นัดเจาะซ้ำ' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE_REP' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														RE.repeatinfectiondate1 AS YMD_repeatinfectiondate,
														DATE_FORMAT(RE.repeatinfectiondate1, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														RE.donateid,
														RE.repeatinfectionid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate
													  	
														FROM donate_repeatinfection RE
														LEFT JOIN donate DN ON RE.donateid = DN.donateid
														LEFT JOIN users US ON US.id = DN.confirmblooddonationid
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														WHERE RE.active <> 0 AND ifnull(RE.repeatinfectionappointmentstatus,'') NOT IN ('Y','N')
														AND RE.repeatinfectiondate1 >= '$dateNow'
														";

													if ($x == 1)
														$strSQL = $strSQL . "

														UNION

														";

													if ($x == 1 || $x == 3)
														$strSQL = $strSQL . "
														
														SELECT 	
														'นัดฟังผล' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE_REP' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														RE.repeatinfectiondate3 AS YMD_repeatinfectiondate,
														DATE_FORMAT(RE.repeatinfectiondate3, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														RE.donateid,
														RE.repeatinfectionid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate

														FROM donate_repeatinfection RE
														LEFT JOIN donate DN ON RE.donateid = DN.donateid
														LEFT JOIN users US ON US.id = DN.confirmblooddonationid
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														WHERE RE.active <> 0 AND ifnull(RE.repeatinfectionappointmentstatus,'') NOT IN ('Y','N')
														AND DATE_FORMAT(RE.repeatinfectiondate3, '%Y-%m-%d') >= '$dateNow' 
														
														";

													if ($x == 1)
														$strSQL = $strSQL . "
														UNION 

														";

													if ($x == 1 || $x == 4)
														$strSQL = $strSQL . "

														SELECT 	
														'นัดหมาย SDP' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														DN.sdpdonateappointmentdate AS YMD_repeatinfectiondate,
														DATE_FORMAT(DN.sdpdonateappointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														DN.donateid as id,
														DATE_FORMAT(DN.assignsdpdate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														STF.name AS usercreate
														FROM donate DN
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														LEFT JOIN staff STF ON STF.id = DN.assignsdp
														LEFT JOIN users US ON US.id = DN.inspectorid
														WHERE DN.sdpdonateisappointment = 1 AND ifnull(DN.appointmentstatus,'') NOT IN ('Y','N')
														AND DN.sdpdonateappointmentdate >= '$dateNow' 
														GROUP BY DN.sdpdonateappointmentdate , DR.donoridcard
														";

													if ($x == 1)
														$strSQL = $strSQL . "

														UNION 

														";

													if ($x == 1 || $x == 5)
														$strSQL = $strSQL . "

														SELECT 	
														'นัดหมาย Autologous' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														DN.hn AS hn,
														DN.autologousappointmentdate AS YMD_repeatinfectiondate,
														DATE_FORMAT(DN.autologousappointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														DN.donateid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate

														FROM donate DN
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														LEFT JOIN users US ON US.id = DN.inspectorid
														WHERE DN.autologousisappointment = 1 AND ifnull(DN.appointmentstatus,'') NOT IN ('Y','N')
														AND DN.autologousappointmentdate >= '$dateNow' 

														";


													if ($x == 1)
														$strSQL = $strSQL . "
														
														UNION

														";

													if ($x == 1 || $x == 6)
														$strSQL = $strSQL . "
														
														SELECT 
														BL.appointmentdetail AS typename,
														'Blood Letting' AS pathname,
														'BLOODLETTING' AS pathcode,
														'blood-letting.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														BL.appointment AS YMD_repeatinfectiondate,
														(BL.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														BL.bloodlettingid AS id,
														DATE_FORMAT(BL.bloodlettingdatetime,'%d/%m/%Y') AS datecreate,
													  US.fullname AS usercreate
														FROM blood_letting BL
														LEFT JOIN patient PT ON BL.patientid = PT.patientid
														LEFT JOIN users US ON US.id = BL.usercreate 
														WHERE DATE_FORMAT( STR_TO_DATE( BL.appointment, '%d/%m/%Y' ), '%Y-%m-%d')  >= '$dateNow'  
														 AND ifnull(BL.appointmentstatus,'') NOT IN ('Y','N')
														";

													if ($x == 1)
														$strSQL = $strSQL . "
														
														UNION

														";

													if ($x == 1 || $x == 7)
														$strSQL = $strSQL . "
														SELECT
														EX.appoittext AS typename,
														'Blood Exchange' AS pathname,
														'BLOODEXCHANGE' AS pathcode,
														'blood-exchange.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														EX.appointment AS YMD_repeatinfectiondate,
														(EX.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														EX.bloodexchangeid AS id ,
														DATE_FORMAT(bloodexchangedate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														EX.usercreate AS usercreate
														FROM blood_exchange EX
														LEFT JOIN patient PT ON EX.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( EX.appointment, '%d/%m/%Y' ), '%Y-%m-%d') >= '$dateNow' 
														 AND ifnull(EX.appointmentstatus,'') NOT IN ('Y','N')
														";

													if ($x == 1)
														$strSQL = $strSQL . "

														UNION

														";

													if ($x == 1 || $x == 8)
														$strSQL = $strSQL . "
														
														SELECT 
														WR.appoittext AS typename,
														'Washed Red Cell' AS pathname,
														'WASHEDREDCELL' AS pathcode,
														'blood-washed-red-cell.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														WR.appointment AS YMD_repeatinfectiondate,
														(WR.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														WR.bloodwashedredcellid AS id,
														DATE_FORMAT(WR.bloodwashedredcelldatetime,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														WR.usercreate AS usercreate 
														FROM blood_washed_red_cell WR
														LEFT JOIN patient PT ON WR.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( WR.appointment, '%d/%m/%Y' ), '%Y-%m-%d') >= '$dateNow' 
														 AND ifnull(WR.appointmentstatus,'') NOT IN ('Y','N')
														";

													if ($x == 1)
														$strSQL = $strSQL . "
														
														UNION

														";

													if ($x == 1 || $x == 9)
														$strSQL = $strSQL . "
														
														SELECT 
														ST.appoittext AS typename,
														'Serum Tear' AS pathname,
														'SERUMTEAR' AS pathcode,
														'blood-serum-tear.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														ST.appointment AS YMD_repeatinfectiondate,
														(ST.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														ST.serumtearid AS id,
														DATE_FORMAT(ST.serumteardatetime,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
													  ST.usercreate	AS usercreate
														FROM serum_tear ST
														LEFT JOIN patient PT ON ST.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( ST.appointment, '%d/%m/%Y' ), '%Y-%m-%d') >= '$dateNow' 
														 AND ifnull(ST.appointmentstatus,'') NOT IN ('Y','N')
														";

													if ($x == 1 || $x == 2 || $x == 3 || $x == 4 || $x == 5 || $x == 6 || $x == 7 || $x == 8 || $x == 9)
														$strSQL = $strSQL . "

														UNION
														SELECT APPT.appointment_typename AS typename,
														'บริจาคโลหิต' AS pathname,
														'APPOINTMENT' AS pathcode,
														'dashboard.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														'' AS YMD_repeatinfectiondate,
														DATE_FORMAT(APP.appointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,

														DN.donateid,
														APP.appointmentid as id,
														DATE_FORMAT(APP.appointment_createdate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด

														STF.name AS usercreate


														FROM appointment APP
														JOIN donor DR ON APP.donoridcard = DR.donoridcard
														JOIN appointment_type APPT ON APP.appointmenttype = APPT.appointment_typeid
														JOIN staff STF ON STF.id = APP.appointment_usercreate
														JOIN donate DN ON DN.donorid = DR.donorid
														WHERE APP.appointmentdate >= '$dateNow' 
														AND ifnull(APP.appointmentstatus,'') NOT IN ('Y','N')
														";

													if ($x == 2)
														$strSQL = $strSQL . "AND APP.appointmenttype = 1";

													if ($x == 3)
														$strSQL = $strSQL . "AND APP.appointmenttype = 2";

													if ($x == 4)
														$strSQL = $strSQL . "AND APP.appointmenttype = 3";

													if ($x == 5)
														$strSQL = $strSQL . "AND APP.appointmenttype = 4";

													if ($x == 6)
														$strSQL = $strSQL . "AND APP.appointmenttype = 5";

													if ($x == 7)
														$strSQL = $strSQL . "AND APP.appointmenttype = 6";

													if ($x == 8)
														$strSQL = $strSQL . "AND APP.appointmenttype = 7";

													if ($x == 9)
														$strSQL = $strSQL . "AND APP.appointmenttype = 8";

													$strSQL = $strSQL . "
													GROUP BY APP.appointmentid
														) M
														GROUP BY M.DMY_repeatinfectiondate ,  M.donoridcard
														ORDER BY  repeatdate ASC
														";

													error_log($strSQL);


													$objQuery = mysql_query($strSQL);

													$count = 1;
													$datedonate = "";
													while ($objResuut = mysql_fetch_array($objQuery)) {

													?>

														<tr <?php if ($dateAlert == $objResuut["DMY_repeatinfectiondate"]) {
																echo 'style="background: #ffe8e8;"';
															} ?>>
															<td style="text-align: center;"><a class="waves-effect waves-light btn" onclick="confirmAppointment(`<?php echo $objResuut['typename']; ?>`,`<?php echo $objResuut['pathcode']; ?>`,<?php echo $objResuut['id']; ?>)">มาแล้ว</a>&nbsp;<a class="waves-effect waves-light btn red lighten-2" onclick="cancelAppointment(`<?php echo $objResuut['typename']; ?>`,`<?php echo $objResuut['pathcode']; ?>`,<?php echo $objResuut['id']; ?>)">ไม่มา</a></td>
															<td style="text-align: center;"><?php echo $count; ?></td>
															<td><?php echo $objResuut["DMY_repeatinfectiondate"]; ?></td>
															<td><?php echo $objResuut["hn"]; ?></td>
															<td>
																<?php if ($objResuut["typestatus"] == 1) {
																	echo '<a href="blood-donor-record.php?id=' . $objResuut["donateid"] . '">' . $objResuut["donoridcard"] . '</a>';
																} else {
																	echo $objResuut["donoridcard"];
																}
																?>

															</td>
															<td><?php echo $objResuut["fullname"]; ?></td>
															<td><?php echo $objResuut["pathname"]; ?></td>
															<td><?php echo $objResuut["typename"]; ?></td>
															<td><?php echo $objResuut["usercreate"]; ?></td>
															<td><?php echo $objResuut["datecreate"]; ?></td>
														</tr>


													<?php
														$count++;
													}
													// var_dump($objQuery);
													?>


												</tbody>
											</table>

										</div>

									<?php } ?>

								</div>



							</div>

						</div>

					</div>
					<!-- /. ROW  -->

					<?php include('dashboard-modal-1.php'); ?>
					<?php include('dashboard-modal-2.php'); ?>
					<?php include('dashboard-modal-3.php'); ?>
					<?php include('dashboard-modal-4.php'); ?>

				</div>
				<!-- /. PAGE INNER  -->
			</div>
			<!-- /. PAGE WRAPPER  -->
		</div>
		<!-- /. WRAPPER  -->
		<!-- JS Scripts-->
		<!-- jQuery Js -->





		<script src="assets/js/spinner.js"></script>
		<!-- Bootstrap Js -->
		<script src="assets/assets-dashboard/js/jquery-1.10.2.js"></script>
		<script src="assets/assets-dashboard/js/bootstrap.min.js"></script>
		<script src="assets/assets-dashboard/materialize/js/materialize.min.js"></script>
		<!-- Metis Menu Js -->
		<script src="assets/assets-dashboard/js/jquery.metisMenu.js"></script>
		<!-- Morris Chart Js -->
		<script src="assets/assets-dashboard/js/morris/raphael-2.1.0.min.js"></script>
		<script src="assets/assets-dashboard/js/morris/morris.js"></script>
		<script src="assets/assets-dashboard/js/easypiechart.js"></script>
		<script src="assets/assets-dashboard/js/easypiechart-data.js"></script>
		<script src="assets/assets-dashboard/js/Lightweight-Chart/jquery.chart.js"></script>
		<script src="assets/sweetalert/sweetalert.min.js"></script>

		<!-- Custom Js -->
		<script src="assets/assets-dashboard/js/custom-scripts.js"></script>
		<script src="assets/js/custom/dashboard/bloodstockrfid-event.js"></script>
		<script src="assets/js/menu.js"></script>

		<script src="assets/js/custom/dashboard/bloodstockrfid-event-1.js"></script>
		<script src="assets/js/custom/dashboard/bloodstockrfid-event-2.js"></script>
		<script src="assets/js/custom/dashboard/bloodstockrfid-event-3.js"></script>
		<script src="assets/js/custom/dashboard/bloodstockrfid-event-4.js"></script>

		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<script src="assets/js/DateTimeFormat.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>





		<script language="javascript" type="text/javascript">
			var value = window.devicePixelRatio;
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#dashboardtable').DataTable({
					pageLength: 10,
					// "searching": false,
					"ordering": false,
					"lengthChange": false
				});
			});
		</script>
		<script>
			var myTimer3;
			$(document).ready(function() {
				$('#appointment_usercreate').select2({
					allowClear: true,
					width: "405px",
					theme: "bootstrap",
				});
				$('#search').select2({
					allowClear: true,
					width: "405px",
					theme: "bootstrap",
					minimumInputLength: 2,
					placeholder: "",
					// tags: [],
					ajax: {
						url: 'data/masterdata/donor.php',
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
										id: item.donorid,
										text: 'ชื่อ-สกุล : ' + item.fname + ' ' + item.lname + ' | ' +
											'เลขที่บัตรประชาชน : ' + item.donoridcard + ' | ' +
											'เลขที่ผู้บริจาค : ' + item.donorcode,
										item: item
									}
								})
							};
						},

					}
				}).on("select2:selecting", function(e) {
					// setDonorData(e.params.args.data.item);
					console.log(e.params.args.data.item.fname);
					console.log(e.params.args.data.item.lname);
					console.log(e.params.args.data.item.donoridcard);

					$("#appointmentname").val(e.params.args.data.item.fname + ' ' + e.params.args.data.item.lname);
					$("#donoridcard").val(e.params.args.data.item.donoridcard);

				});
			});

			function openModal1() {
				var d1 = new Date();
				var mm = ((d1.getMonth() + 1) >= 10) ? (d1.getMonth() + 1) : '0' + (d1.getMonth() + 1);
				var yyyy = (d1.getFullYear() + 543);
				$("#modal_month_1").val(mm);
				$("#modal_year_1").val(yyyy);

				loadModal1();
			}

			function openModal2() {

				$('#modal2').modal();
				$('#modal2').modal('open');
				loadModal2();

			}

			function openModal3() {
				$('#modal3').modal();
				$('#modal3').modal('open');

				spinnershow();

				$.ajax({
					url: 'api/api_open_fridge.php',
					dataType: 'json',
					type: 'get',
					complete: function() {
						// var delayInMilliseconds = 200;
						// setTimeout(function() {
						// 	spinnerhide();
						// }, delayInMilliseconds);
					},
					success: function(data) {
						console.log(data);

						const myTimeout = setTimeout(close_fridge, 10000);

					},
					error: function(d) {
						console.log("error_api_open_fridge");
					}
				});

				// loadModal3(true);


				// myTimer3 = setInterval(function() {
				// 	loadModal3();
				// }, 1000 * 30 * 1);

			}

			function close_fridge() {
				$.ajax({
					url: 'api/api_close_fridge.php',
					dataType: 'json',
					type: 'get',
					complete: function() {
						// var delayInMilliseconds = 200;
						// setTimeout(function() {
						// 	spinnerhide();
						// }, delayInMilliseconds);
					},
					success: function(data) {
						console.log(data);
						if (data.rfid_a == '' || data.rfid_a == null) {
							data.rfid_a = 0;
						}
						if (data.rfid_b == '' || data.rfid_a == null) {
							data.rfid_b = 0;
						}
						if (data.rfid_o == '' || data.rfid_a == null) {
							data.rfid_o = 0;
						}
						if (data.rfid_ab == '' || data.rfid_a == null) {
							data.rfid_ab = 0;
						}

						var order_4 = data.count_tag - data.rfid_a - data.rfid_b - data.rfid_o - data.rfid_ab;
						document.getElementById("modalgatetotal").innerHTML = data.count_tag + " ยูนิต";
						document.getElementById("gatetotal").innerHTML = data.count_tag + " ยูนิต";
						document.getElementById("a_4").innerHTML = data.rfid_a;
						document.getElementById("b_4").innerHTML = data.rfid_b;
						document.getElementById("o_4").innerHTML = data.rfid_o;
						document.getElementById("ab_4").innerHTML = data.rfid_ab;
						document.getElementById("order_4").innerHTML = order_4;
						// alert(order_4);



						spinnerhide();
						console.log("++++++++++++++++++++++++++++++++++");

						// const myTimeout = setTimeout(open_fridge, 30000);
					},
					error: function(d) {
						console.log("error_api_close_fridge");
					}
				});
			}

			// function open_fridge() {

			// 	console.log("++++++++++++++++++++++++++++++++++");
			// 	$.ajax({
			// 		url: 'api/api_open_fridge.php',
			// 		dataType: 'json',
			// 		type: 'get',
			// 		complete: function() {
			// 			// var delayInMilliseconds = 200;
			// 			// setTimeout(function() {
			// 			// 	spinnerhide();
			// 			// }, delayInMilliseconds);
			// 		},
			// 		success: function(data) {
			// 			console.log(data);

			// 			const myTimeout = setTimeout(close_fridge, 30000);

			// 		},
			// 		error: function(d) {
			// 			console.log("error_api_open_fridge");
			// 		}
			// 	});

			// loadModal3(true);


			// myTimer3 = setInterval(function() {
			// 	loadModal3();
			// }, 1000 * 30 * 1);

			// }

			function closeModal3() {
				clearInterval(myTimer3);
			}

			function openModal4() {
				var d1 = new Date();
				var mm = ((d1.getMonth() + 1) >= 10) ? (d1.getMonth() + 1) : '0' + (d1.getMonth() + 1);
				var yyyy = (d1.getFullYear() + 543);
				$("#modal_month_4").val(mm);
				$("#modal_year_4").val(yyyy);

				loadModal4();
			}

			function openModal_app() {
				$('#modal_appove').modal();
				$('#modal_appove').modal('open');
			}

			function closeModal_app() {
				$('#modal_appove').modal();
				$('#modal_appove').modal('close');
			}

			function add_data_appove() {
				var donoridcard = $("#donoridcard").val();
				var appointmenttype = $("#appointmenttype").val();
				var appointmentdate = dmyToymd2($("#appointmentdate").val());
				var appointment_usercreate = $("#appointment_usercreate").val();
				var appointment_createdate = dmyToymd2($("#appointment_createdate").val());
				var appointmentremark = $("#appointmentremark").val();

				if (donoridcard == '') {
					swal({
						title: 'กรุณาระบุคนไข้',
						type: 'warning',
						confirmButtonText: 'OK',
						allowOutsideClick: false
					});
				} else {
					$.ajax({
						type: 'POST',
						url: 'dashboard_appointment_save.php',
						data: {
							donoridcard: donoridcard,
							appointmenttype: appointmenttype,
							appointmentdate: appointmentdate,
							appointment_usercreate: appointment_usercreate,
							appointment_createdate: appointment_createdate,
							appointmentremark: appointmentremark
						},
						dataType: 'json',
						complete: function() {
							var delayInMilliseconds = 200;
							setTimeout(function() {
								spinnerhide();
							}, delayInMilliseconds);
						},
						success: function(data) {
							swal({
								title: 'บันทึกสำเร็จ',
								type: 'success',
								confirmButtonText: 'OK',
								allowOutsideClick: false
							})

							window.location.href = 'dashboard.php';
							// $("#donoridcard").val("");
							// $("#appointmenttype").val("");
							// $("#appointmentdate").val(getDMY543());
							// $("#appointment_usercreate").val("");
							// $("#appointment_createdate").val(getDMY543());
							// $("#appointmentremark").val("");
							// $("#appointmentname").val("");
							// $("#search").val("").trigger("change");
							// $("#appointment_usercreate").val("").trigger("change");

							// $('#modal_appove').modal();
							// $('#modal_appove').modal('close');

						},
						error: function(data) {
							console.log('An error occurred.');
							console.log(data);
							myAlertTopError();
						},
					});
				}

				// alert(appointmenttype);
			}

			loadStockRFID(true);
			loadStockRFID2(true);
			setInterval(function() {
				loadStockRFID();
				loadStockRFID2();
			}, 1000 * 60 * 3);
			// $(document).ready(function () {


			// });

			// function showDoc(id = "") {
			//     window.open(localurl + '/blood-donor-record.php?id=' + id);
			// }

			function confirmAppointment(type = "", code = "", id = "") {
				console.log(type);
				console.log(id);
				swal({
						title: type,
						text: 'ยืนยันมาตามนัดหมายใช่หรือไม่?',
						type: "warning",
						showCancelButton: true,
						confirmButtonText: 'ใช่',
						cancelButtonText: 'ไม่',
						closeOnConfirm: true
					},
					function(v) {

						if (v) {
							$.ajax({
								url: 'dashboard-appointment-save.php',
								data: {
									type: type,
									code: code,
									id: id,
									appointment: 'Y'
								},
								type: 'POST',
								dataType: 'json',
								success: function(obj) {
									console.log(obj);

									if (obj.status) {
										swal({
												title: "บันทึกข้อมูลสำเร็จ",
												type: "success",
												showCloseButton: false,
												showCancelButton: false,
												confirmButtonClass: "",
												confirmButtonText: "ตกลง",
												closeOnConfirm: true
											},
											function(inputValue) {});
									} else {
										swal({
											title: "เกิดข้อผิดพลาดบางประการ",
											type: "error",
											showCloseButton: false,
											showCancelButton: false,
											confirmButtonClass: "btn-danger",
											confirmButtonText: "ตกลง",
											closeOnConfirm: true
										});
									}
									window.location.href = 'dashboard.php';
								}
							});

						}
					});
			}

			function cancelAppointment(type = "", code = "", id = "") {
				console.log(type);
				console.log(id);
				swal({
						title: type,
						text: 'ยืนยันยกเลิกนัดหมายใช่หรือไม่?',
						type: "input",
						showCancelButton: true,
						confirmButtonText: 'ใช่',
						cancelButtonText: 'ไม่',
						closeOnConfirm: true
					},
					function(v) {

						cancelAppointmentMgs(type, code, id, v);

					});
			}


			function cancelAppointmentMgs(type = "", code = "", id = "", v = "") {
				console.log(v);
				if (v) {
					$.ajax({
						url: 'dashboard-appointment-save.php',
						data: {
							type: type,
							code: code,
							id: id,
							appointment: 'N',
							text: v
						},
						type: 'POST',
						dataType: 'json',
						success: function(obj) {
							console.log(obj);

							if (obj.status) {
								swal({
										title: "บันทึกข้อมูลสำเร็จ",
										type: "success",
										showCloseButton: false,
										showCancelButton: false,
										confirmButtonClass: "",
										confirmButtonText: "ตกลง",
										closeOnConfirm: true
									},
									function(inputValue) {});
							} else {
								swal({
									title: "เกิดข้อผิดพลาดบางประการ",
									type: "error",
									showCloseButton: false,
									showCancelButton: false,
									confirmButtonClass: "btn-danger",
									confirmButtonText: "ตกลง",
									closeOnConfirm: true
								});
							}
							window.location.href = 'dashboard.php';
						}
					});


				} else if (v === "") {
					setTimeout(function() {
						cancelAppointment(type, code, id);
					}, 200);

				}
			}
		</script>
		<!-- <script src="assets/js/menu.js"></script> -->

</body>

</html>