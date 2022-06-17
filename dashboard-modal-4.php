<div id="modal4" class="modal bottom-sheet">

	<div class="modal-content">
		<a href="#!" class="modal-action modal-close waves-effect waves-light btn btn-close">ปิด</a>
		<h4>การ crossmatch - จ่ายโลหิต</h4>

		<br />
		<div class="row">

			<div class="container">
				<div class="input-field col s6">
					<select id="modal_month_4">
						<option value="" disabled selected>--- เลือกเดือน ---</option>
						<option value="01">มกราคม</option>
						<option value="02">กุมภาพันธ์</option>
						<option value="03">มีนาคม</option>
						<option value="04">เมษายน</option>
						<option value="05">พฤษภาคม</option>
						<option value="06">มิถุนายน</option>
						<option value="07">กรกฎาคม</option>
						<option value="08">สิงหาคม</option>
						<option value="09">กันยายน</option>
						<option value="10">ตุลาคม</option>
						<option value="11">พฤศจิกายน</option>
						<option value="12">ธันวาคม</option>
					</select>
					<label>เดือน</label>
				</div>

				<div class="input-field col s3">
					<select id="modal_year_4">
						<option value="" disabled selected>--- เลือกปี ---</option>
						<option value="2560">2560</option>
						<option value="2561">2561</option>
						<option value="2562">2562</option>
						<option value="2563">2563</option>
						<option value="2564">2564</option>
						<option value="2565">2565</option>
						<option value="2566">2566</option>
						<option value="2567">2567</option>
						<option value="2568">2568</option>
						<option value="2569">2569</option>
						<option value="2570">2579</option>
						<option value="2571">2571</option>
						<option value="2572">2572</option>
						<option value="2573">2573</option>
						<option value="2574">2574</option>
						<option value="2575">2575</option>
						<option value="2576">2576</option>
					</select>
					<label>ปี</label>
				</div>
				<div class="input-field col s3">
					<a href="#!" class="waves-effect waves-light btn" onclick="loadModal4()">ค้นหา</a>
				</div>
			</div>
		</div>

		<div style="overflow:auto; width:100%; height: 80vh;">
			<div class="row">

				<!--/.row-->
				<div class="col-xs-12 col-sm-12 col-md-5">
					<div class="row">
						<div class="col-xs-12">
							<div class="card">
								<div class="card-action">
									<b></b>
								</div>
								<div class="card-image donutpad">
									<div id="modal4_legend" class="donut-legend"
										style="position: absolute;margin-top: -80px;">
									</div>
									<br /><br /><br />
									<div id="modal4-morris-donut-chart"></div>



								</div>


							</div>
						</div>
					</div>
				</div>
				<!--/.row-->

				<div class="col-xs-12 col-sm-12 col-md-7">
					<div class="cirStats">
						<div class="row">

							<div class="col-xs-12 col-sm-6 col-md-6">

								<div class="card horizontal cardIcon waves-effect waves-dark">
									<div class="card-image green lighten-1">
										<i class="material-icons dp48">equalizer</i>
									</div>
									<div class="card-stacked green lighten-1">
										<div class="card-content">
											<h3 id="modal4total1">0 ยูนิต</h3>
										</div>
										<div class="card-action">
											<strong>จำนวน crossmatch วันนี้</strong>
										</div>
									</div>
								</div>

							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">

								<div class="card horizontal cardIcon waves-effect waves-dark">
									<div class="card-image pink lighten-2">
										<i class="material-icons dp48">water_drop</i>
									</div>
									<div class="card-stacked pink lighten-2">
										<div class="card-content">
											<h3 id="modal4total2">0 ยูนิต</h3>
										</div>
										<div class="card-action">
											<strong>จำนวนจ่ายโลหิตวันนี้</strong>
										</div>
									</div>
								</div>

							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">

								<div class="card horizontal cardIcon waves-effect waves-dark">
									<div class="card-image green">
										<i class="material-icons dp48">insert_chart_outlined</i>
									</div>
									<div class="card-stacked green">
										<div class="card-content">
											<h3 id="modal4total3">0 ยูนิต</h3>
										</div>
										<div class="card-action">
											<strong>จำนวน crossmatch สะสมของเดือน</strong>
										</div>
									</div>
								</div>

							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">

								<div class="card horizontal cardIcon waves-effect waves-dark">
									<div class="card-image pink lighten-1">
										<i class="material-icons dp48">invert_colors</i>
									</div>
									<div class="card-stacked pink lighten-1">
										<div class="card-content">
											<h3 id="modal4total4">0 ยูนิต</h3>
										</div>
										<div class="card-action">
											<strong>จำนวนจ่ายโลหิตสะสมของเดือน</strong>
										</div>
									</div>
								</div>

							</div>


						</div>
					</div>
				</div>

				


			</div>



			<!-- /. ROW  -->
			<div class="row">

				<div class="col-md-12">
					<div class="card">
						<div class="card-image">
							<span><br><span
									style="background-color: #e91e63; width: 20px; display: inline-block; margin: 5px;">&nbsp;</span>จำนวน
								Crossmatch</span>
							<span><br><span
									style="background-color: #30cc7b; width: 20px; display: inline-block; margin: 5px;">&nbsp;</span>จำนวนจ่ายโลหิต</span>
							<div id="morris-bar-chart"></div>
						</div>

					</div>
				</div>


			</div>

		</div>



		<!-- /. ROW  -->
	</div>
</div>