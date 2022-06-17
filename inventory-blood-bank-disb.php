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

		<title>รายการสต็อคผลิตภัณฑ์</title>
		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />		
		
		<!-- BEGIN CSS for this page -->
	
		<style>	
		td.details-control {
		background: url('assets/plugins/datatables/img/details_open.png') no-repeat center center;
		cursor: pointer;
		}
		tr.shown td.details-control {
		background: url('assets/plugins/datatables/img/details_close.png') no-repeat center center;
		}
		</style>		
		<!-- END CSS for this page -->
				
</head>

<body class="adminbody">
		
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
										<h1 class="main-title float-left">รายการสต็อคผลิตภัณฑ์</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Home</li>
											<li class="breadcrumb-item active">Inventory Blood Bank</li>
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
									<h3><i class="fa fa-table"></i> เบิก-จ่ายเลือด</h3>
                                    <br>
									<div class="form-row">
									<div class="form-group col-md-4">
									  <label for="inputCity">หมายเลขถุง</label>
                                      <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
									  <input type="text" class="form-control is-invalid" id="validationServer03" required autofocus>
									</div>
									<div class="form-group col-md-3">
									  <label for="inputState">ชนิดเลือด</label>
									  <select id="inputState" class="form-control">
										<option selected>Choose...</option>
										<option>...</option>
                                        <option>...</option>
									  </select>
									</div>
									<div class="form-group col-md-3">
									  <label for="inputZip">ข้อมูลเพิ่มเติม</label>
									  <a role="button" href="#" class="btn btn-info"><span class="btn-label"><i class="fa fa-exclamation"></i></span>ค้นหาข้อมูลเพิ่มเติม</a>

									</div>
								  </div>
                                  <hr>
								</div>
									
								<div class="card-body">
									
									<div class="table-responsive">
									<table id="example4" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>ชื่อผลิตภัณฑ์</th>
                                            <th>หมายเลขถุง</th>
                                            <th>ชนิดเลือด</th>
											<th>จำนวนรวม</th>
											<th>จำนวนเบิก</th>
											<th>จำนวนรับ</th>
                                            <th>Action</th>
										</tr>
									</thead>									
									<tbody>
										<tr>
											<td>Product-A</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>40</td>
											<td>50</td>
											<td>170</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-A</td>
											<td>991.62.0.00971</td>
                                            <td>[CRYO]Cryoprecipitate</td>
											<td>61</td>
											<td>40</td>
											<td>150</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-A</td>
											<td>991.62.0.00971</td>
                                            <td>[CRP]Cryoprecipitate Removed Plasma</td>
											<td>20</td>
											<td>80</td>
											<td>150</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-A</td>
											<td>991.62.0.00971</td>
                                            <td>[CRP]Cryoprecipitate Removed Plasma</td>
											<td>120</td>
											<td>40</td>
											<td>100</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-B</td>
											<td>991.62.0.00971</td>
                                            <td>[CRP]Cryoprecipitate Removed Plasma</td>
											<td>41</td>
											<td>30</td>
											<td>80</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-B</td>
											<td>991.62.0.00971</td>
                                            <td>[FFP]Fresh Frozen Plasma</td>
											<td>50</td>
											<td>30</td>
											<td>90</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-B</td>
											<td>991.62.0.00971</td>
                                            <td>[FFP]Fresh Frozen Plasma</td>
											<td>70</td>
											<td>40</td>
											<td>80</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-C</td>
											<td>991.62.0.00971</td>
                                            <td>[FFP]Fresh Frozen Plasma</td>
											<td>90</td>
											<td>20</td>
											<td>120</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-C</td>
											<td>991.62.0.00971</td>
                                            <td>[FFP]Fresh Frozen Plasma</td>
											<td>75</td>
											<td>30</td>
											<td>140</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-C</td>
											<td>991.62.0.00971</td>
                                            <td>[FFP]Fresh Frozen Plasma</td>
											<td>60</td>
											<td>40</td>
											<td>180</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-C</td>
											<td>991.62.0.00971</td>
                                            <td>[FFP]Fresh Frozen Plasma</td>
											<td>70</td>
											<td>50</td>
											<td>200</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-D</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>100</td>
											<td>30</td>
											<td>140</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-D</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>90</td>
											<td>10</td>
											<td>60</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-E</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>65</td>
											<td>41</td>
											<td>190</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-E</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>50</td>
											<td>10</td>
											<td>40</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-E</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>90</td>
											<td>30</td>
											<td>40</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-E</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>80</td>
											<td>50</td>
											<td>130</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>80</td>
											<td>30</td>
											<td>140</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>75</td>
											<td>12</td>
											<td>200</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>45</td>
											<td>10</td>
											<td>30</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>70</td>
											<td>20</td>
											<td>60</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>120</td>
											<td>35</td>
											<td>20</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>90</td>
											<td>30</td>
											<td>20</td>
                                            <td></td>
										</tr>
										<tr>
											<td>Product-F</td>
											<td>991.62.0.00971</td>
                                            <td>Aged Plasma/cryo-removed plasma</td>
											<td>120</td>
											<td>10</td>
											<td>40</td>
                                            <td></td>
										</tr>
									</tbody>
									</table>
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

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->

	<script>
	// START CODE FOR BASIC DATA TABLE 
	$(document).ready(function() {
		$('#example1').DataTable();
	} );
	// END CODE FOR BASIC DATA TABLE 
	
	
	// START CODE FOR Child rows (show extra / detailed information) DATA TABLE 
	function format ( d ) {
		// `d` is the original data object for the row
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
			'<tr>'+
				'<td>Full name:</td>'+
				'<td>'+d.name+'</td>'+
			'</tr>'+
			'<tr>'+
				'<td>Extension number:</td>'+
				'<td>'+d.extn+'</td>'+
			'</tr>'+
			'<tr>'+
				'<td>Extra info:</td>'+
				'<td>And any further details here (images etc)...</td>'+
			'</tr>'+
		'</table>';
	}
 
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				"ajax": "assets/data/dataTablesObjects.txt",
				"columns": [
					{
						"className":      'details-control',
						"orderable":      false,
						"data":           null,
						"defaultContent": ''
					},
					{ "data": "name" },
					{ "data": "position" },
					{ "data": "office" },
					{ "data": "salary" }
				],
				"order": [[1, 'asc']]
			} );
			 
			// Add event listener for opening and closing details
			$('#example2 tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row( tr );
		 
				if ( row.child.isShown() ) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				}
				else {
					// Open this row
					row.child( format(row.data()) ).show();
					tr.addClass('shown');
				}
			} );
		} );
		// END CODE FOR Child rows (show extra / detailed information) DATA TABLE 		
		
				
		
		// START CODE Show / hide columns dynamically DATA TABLE 		
		$(document).ready(function() {
			var table = $('#example3').DataTable( {
				"scrollY": "350px",
				"paging": false
			} );
		 
			$('a.toggle-vis').on( 'click', function (e) {
				e.preventDefault();
		 
				// Get the column API object
				var column = table.column( $(this).attr('data-column') );
		 
				// Toggle the visibility
				column.visible( ! column.visible() );
			} );
		} );
		// END CODE Show / hide columns dynamically DATA TABLE 	
		
		
		// START CODE Individual column searching (text inputs) DATA TABLE 		
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
			$('#example4 thead th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" />' );
			} );
		 
			// DataTable
			var table = $('#example4').DataTable();
		 
			// Apply the search
			table.columns().every( function () {
				var that = this;
		 
				$( 'input', this.header() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) {
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
		// END CODE Individual column searching (text inputs) DATA TABLE 	 	
	</script>	
<!-- END Java Script for this page -->

</body>
</html>