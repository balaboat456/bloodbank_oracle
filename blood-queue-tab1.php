<div class="tab_table">
	<button type="button" class="tablinks1_1" onclick="openTab(event, '1_1','tabcontent1','tablinks1_1')" id="defaultOpen1">รอรับสิ่งส่งตรวจ[<label id="blood-queue-tab-1">0</label>]</button>
	<button type="button" class="tablinks1_1" onclick="openTab(event, '1_2','tabcontent1','tablinks1_1')">ปฎิเสธสิ่งส่งตรวจ[<label id="blood-queue-tab-2">0</label>]</button>
	<button type="button" class="tablinks1_1" onclick="openTab(event, '1_3_1','tabcontent1','tablinks1_1')">รอผลตรวจเลือด[<label id="blood-queue-tab-3-1">0</label>]</button>
	<button type="button" class="tablinks1_1" onclick="openTab(event, '1_3','tabcontent1','tablinks1_1')">รอผล
		Crossmatch[<label id="blood-queue-tab-3">0</label>]</button>
	<button type="button" class="tablinks1_1" onclick="openTab(event, '1_4','tabcontent1','tablinks1_1')">รอยืนยันผลเลือด[<label id="blood-queue-tab-4">0</label>]</button>
</div>
<div id="1_1" class="tabcontent1">
	<form role="form" id="form-blood-queue-tab1" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">
		<div class="table-no-scroll999" style="height:60vh;">
			<table id="blood-queue-tab1" class="table table-striped" style="width:1680px">
				<thead>
					<tr>
						<th style="display:none;"></th>
						<th style="width:40px"></th>
						<th style="width:40px">No.</th>
						<th style="width:20px">R</th>
						<th style="width:20px">N</th>
						<th style="width:140px">วันที่/เวลา แจ้งขอเลือด</th>
						<th style="width:100px">HN</th>
						<th style="width:190px">ชื่อผู้ป่วย</th>
						<th style="width:40px">ABO</th>
						<th style="width:100px">Rh(D)</th>
						<th>Tube</th>
						<th style="width:260px">ความเร่งด่วน</th>
						<th>เพื่อบุตร</th>
						<th style="width:180px">หน่วยงานที่แจ้งขอเลือด</th>
						<th>ชนิดเลือดที่แจ้งขอ</th>
						<th style="width:200px">วันที่ต้องการใช้เลือด</th>
						<th style="width:120px">ผู้รับสิ่งส่งตรวจ</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			
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
	<div class="m-4 footer-printer-setting" style="width: 1000px;" >
		<div class="row">
			<div class="form-check-label">
				<div class="input-group">
					<span class="input-group-text input-group-text-0">
					<input onclick="setDefaultRadioPrinter('printer_p')" type="radio" id="printer_p" name="printer" class="">
				</span>
				<span class="input-group-text input-group-text-0">Preview</span>
					<span class="input-group-text input-group-text-0">
						<input onclick="setDefaultRadioPrinter('printer_a')" type="radio"
							id="printer_a" name="printer" class="" checked>
					</span>
					<span class="input-group-text input-group-text-0">Auto Print</span>
					<select id="printernames" name="printernames"
						onchange="setDefaultQty(this.value)" class="form-control"
						style="width: 130px;">
					</select>
					<select id="printqty" name="printqty"
						onchange="setDefaultQty(this.value)" class="form-control"
						style="width: 70px;">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="4">4</option>
						<option value="6">6</option>
						<option value="8">8</option>
						<option value="10">10</option>
						<option value="10">12</option>
					</select>
					<span class="input-group-text input-group-text-0" style="background: lightblue;"
						onclick="showPrinterSettingModal()">
						<i class="fa fa-cog" aria-hidden="true"></i>&nbsp;
						จัดการเครื่องปริ้น

					</span>
					<span class="input-group-text input-group-text-0" style="background: cornsilk;"
						onclick="bloodReprintModalShow()">
						<i class="fa fa-history" aria-hidden="true"></i>&nbsp;
						สติกเกอร์ HN
					</span>
					<span class="input-group-text input-group-text-0" style="background: #f77f93;"
						onclick="bloodReprintNoHistoryModalShow()">
						<i class="fa fa-sticky-note-o" aria-hidden="true"></i>&nbsp;
						สติกเกอร์ HN (ไม่ประวัติ)
					</span>

				</div>
			</div>
		</div>
	</div>
</div>

<div id="1_2" class="tabcontent1">
	<div class="table-no-scroll999" style="height:60vh;">
		<table id="blood-queue-tab2" class="table table-striped" style="width:1500px">
			<thead>
				<tr>
					<th style="display:none;"></th>
					<th style="width:40px"></th>
					<th style="width:40px">No.</th>
					<th style="width:120px">วันที่/เวลา ที่ปฏิเสธ</th>
					<th style="width:120px">วันที่/เวลา แจ้งขอเลือด</th>
					<th style="width:100px">HN</th>
					<th style="width:190px">ชื่อผู้ป่วย</th>
					<th style="width:180px">หน่วยงานที่แจ้งขอเลือด</th>
					<th style="width:190px">ชนิดเลือดที่แจ้งขอ</th>
					<th style="width:190px">สาเหตุการปฏิเสธสิ่งส่งตรวจ</th>
				</tr>
			</thead>
			<tbody>


			</tbody>
		</table>
	</div>
</div>

<div id="1_3_1" class="tabcontent1">
	<div class="table-no-scroll999" style="height:60vh;">
		<table id="blood-queue-tab3-1" class="table table-striped" style="width:1700px">
			<thead>
				<tr>
					<th style="width:40px">No.</th>
					<th style="width:120px">วันที่/เวลา ตรวจเลือดผู้ป่วย</th>
					<th style="width:120px">วันที่/เวลา แจ้งขอเลือด</th>
					<th style="width:120px">วันที่/เวลา รับสิ่งส่งตรวจ</th>
					<th style="width:100px">HN</th>
					<th style="width:190px">ชื่อผู้ป่วย</th>
					<th style="width:100px">Bl.Gr.</th>
					<th style="width:100px">Rh(D)</th>
					<th style="width:300px">ความเร่งด่วน</th>
					<th style="width:180px">หน่วยงานที่แจ้งขอเลือด</th>
					<th style="width:120px">ชนิดเลือดที่แจ้งขอ</th>
				</tr>
			</thead>
			<tbody>


			</tbody>
		</table>

	</div>
	<div id="table_1_3_1">
	</div>

</div>

<div id="1_3" class="tabcontent1">
	<div class="table-no-scroll999" style="height:60vh;">
		<table id="blood-queue-tab3" class="table table-striped" style="width:1700px">
			<thead>
				<tr>
					<th style="width:40px">No.</th>
					<th style="width:140px">วันที่/เวลา ตรวจเลือดผู้ป่วย</th>
					<th style="width:140px">วันที่/เวลา แจ้งขอเลือด</th>
					<th style="width:140px">วันที่/เวลา รับสิ่งส่งตรวจ</th>
					<th style="width:100px">HN</th>
					<th style="width:190px">ชื่อผู้ป่วย</th>
					<th style="width:100px">Bl.Gr.</th>
					<th style="width:100px">Rh(D)</th>
					<th style="width:300px">ความเร่งด่วน</th>
					<th style="width:180px">หน่วยงานที่แจ้งขอเลือด</th>
					<th style="width:120px">ชนิดเลือดที่แจ้งขอ</th>
				</tr>
			</thead>
			<tbody>


			</tbody>
		</table>

	</div>
	<div id="table_3_1">
	</div>

</div>

<div id="1_4" class="tabcontent1">
	<form role="form" id="form-blood-queue-tab4" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">
		<div class="table-no-scroll999">
			<table id="blood-queue-tab4" class="table table-striped" style="width:1700px">
				<thead>
					<tr>
						<th style="width:40px">CK</th>
						<th style="width:40px">No.</th>
						<th style="width:140px">วันที่/เวลา บันทึก Crossmatch</th>
						<th style="width:140px">วันที่/เวลา แจ้งขอเลือด</th>
						<th style="width:100px">HN</th>
						<th style="width:190px">ชื่อผู้ป่วย</th>
						<th style="width:100px">Bl.Gr.</th>
						<th style="width:100px">Rh(D)</th>
						<th>หน่วยงานที่แจ้งขอเลือด</th>
						<th style="width:120px">ชนิดเลือดที่แจ้งขอ</th>
						<th width="width:80px">ยืนยัน ABO</th>
						<th width="width:80px">ยืนยัน Rh</th>
						<th style="width:120px">ผู้ยืนยันผลเลือด</th>
					</tr>
				</thead>
				<tbody id="blood-queue-tab4-tr">


				</tbody>
			</table>
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