<div id="modal1" class="modal bottom-sheet">

	<div class="modal-content">
		<a href="#!" class="modal-action modal-close waves-effect waves-light btn btn-close">ปิด</a>
		<h4>การรับบริจาคโลหิต</h4>
		<br/>
		<div class="row">

			<div class="container">
				<div class="input-field col s6">
					<select id="modal_month_1">
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
					<select id="modal_year_1">
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
					<a href="#!" class="waves-effect waves-light btn" onclick="loadModal1()">ค้นหา</a>
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-7">
				<div class="cirStats">
					<div class="row">

						<div class="col-xs-12 col-sm-6 col-md-6">

							<div class="card horizontal cardIcon waves-effect waves-dark">
								<div class="card-image red">
									<i class="material-icons dp48">favorite</i>
								</div>
								<div class="card-stacked red">
									<div class="card-content">
										<h3 id="modaldonatedatetotal">0 คน</h3>
									</div>
									<div class="card-action">
										<strong>จำนวนผู้บริจาคโลหิตวันนี้</strong>
									</div>
								</div>
							</div>

						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">

							<div class="card horizontal cardIcon waves-effect waves-dark">
								<div class="card-image pink lighten-1">
									<i class="material-icons dp48">favorite</i>
								</div>
								<div class="card-stacked pink lighten-1">
									<div class="card-content">
										<h3 id="modaldonatemonthtotal">0 คน</h3>
									</div>
									<div class="card-action">
										<strong>จำนวนผู้บริจาคโลหิตสะสมของเดือน</strong>
									</div>
								</div>
							</div>

						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-redcell">
								<h4>PRC</h4>
								<h3 id="modal1_prc">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-redcell">
								<h4>LPRC</h4>
								<h3 id="modal1_lprc">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-redcell">
								<h4>LDPRC</h4>
								<h3 id="modal1_ldprc">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-redcell">
								<h4>SDR</h4>
								<h3 id="modal1_sdr">0 ยูนิต</h4>
							</div>
						</div>

						

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-platelet">
								<h4>PC</h4>
								<h3 id="modal1_pc">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-platelet">
								<h4>LPPC</h4>
								<h3 id="modal1_lppc">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-platelet">
								<h4>LPPC(PAS)</h4>
								<h3 id="modal1_lppc_pas">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-platelet">
								<h4>SDP</h4>
								<h3 id="modal1_sdp">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-platelet">
								<h4>SDP(PAS)</h4>
								<h3 id="modal1_sdp_pas">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-plasma">
								<h4>FFP</h4>
								<h3 id="modal1_ffp">0 ยูนิต</h4>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="card-panel text-center bag-wb">
								<h4>WB</h4>
								<h3 id="modal1_wb">0 ยูนิต</h4>
							</div>
						</div>

						

						
						
					</div>
				</div>
			</div>

			<!--/.row-->
			<div class="col-xs-12 col-sm-12 col-md-5">
				<div class="row">
					<div class="col-xs-12">
						<div class="card">
							<div class="card-action">
								<b></b>
							</div>
							<div class="card-image donutpad">
								<div id="legend" class="donut-legend" style="position: absolute;margin-top: -80px;">
								</div>
								<div id="morris-donut-chart"></div>

							</div>


						</div>
					</div>
				</div>
			</div>
			<!--/.row-->

		</div>
	</div>
</div>