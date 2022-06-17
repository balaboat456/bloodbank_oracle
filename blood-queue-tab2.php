<style>
	.thicker {
		font-weight: 900;
	}
</style>

<div class="tab_table">
	<button type="button" class="tablinks2_1" onclick="openTab(event, '2_1','tabcontent2','tablinks2_1')" id="defaultOpen2">รอยืนยันการใช้เลือด[<label id="blood-queue-tab-2-1">0</label>]</button>
	<button type="button" class="tablinks2_1" onclick="openTab(event, '2_2','tabcontent2','tablinks2_1')">รายการเลือดพร้อมจ่าย[<label id="blood-queue-tab-2-2">0</label>]</button>
	<button type="button" class="tablinks2_1" onclick="openTab(event, '2_3','tabcontent2','tablinks2_1')">รายการจ่ายเลือด[<label id="blood-queue-tab-2-3">0</label>]</button>
	<button type="button" class="tablinks2_1" onclick="openTab(event, '2_5','tabcontent2','tablinks2_1')">กระติกจ่ายเลือด[<label id="blood-queue-tab-2-5">0</label>]</button>
	<button type="button" id="openTab2_4" class="tablinks2_1" onclick="openTab(event, '2_4','tabcontent2','tablinks2_1')">ติดตามกระติกเลือด</button>
	<button type="button" class="tablinks2_1" onclick="openTab(event, '2_6','tabcontent2','tablinks2_1')">ติดตาม RFID [<label id="blood-queue-tab-2-6">0</label>]</button>
</div>
<div id="2_1" class="tabcontent2">
	<form role="form" id="form-blood-queue-tab2_1" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">
		<div class="table-no-scroll999" style="height:50vh;">
			<table id="blood-queue-tab2-1" class="table table-striped" style="width:1720px">
				<thead>
					<tr>

						<th class="td-table" rowspan="2" style="width:40px">CK</th>
						<th class="td-table" rowspan="2" style="width:140px">วันที่/เวลา ยืนยันผลเลือด</th>
						<th class="td-table" rowspan="2" style="width:140px;display:none;">วันที่/เวลา แจ้งขอเลือด</th>
						<th class="td-table" rowspan="2" style="width:100px">HN</th>
						<th class="td-table" rowspan="2" style="width:190px">ชื่อผู้ป่วย</th>
						<th class="td-table" rowspan="2" style="width:180px">หน่วยงานที่แจ้งขอเลือด</th>
						<th class="td-table" rowspan="2" style="width:120px">ชนิดเลือดที่แจ้งขอ</th>
						<th class="td-table" rowspan="2" style="width:120px">Bl.Gr.</th>
						<th class="td-table" rowspan="2" style="width:220px">วันที่เวลาแจ้งใช้เลือด</th>
						<th class="td-table" colspan="2" style="min-width:100px;">เลือดพร้อมใช้</th>
						<th class="td-table" colspan="2">จำนวนขอเบิก</th>
						<th class="td-table" colspan="2">วันที่/เวลาต้องการใช้เลือด</th>
						<th class="td-table" rowspan="2" style="width:140px;">วันที่/เวลา แจ้งขอเลือด</th>
						<th class="td-table" rowspan="2" style="width:120px">ผู้ยืนยันใช้เลือด</th>
					</tr>
					<tr>
						<th class="td-table" style="top: 25px;">TYPE</th>
						<th class="td-table" style="top: 25px;">Unit</th>
						<th class="td-table" style="display:none;">cc</th>
						<th class="td-table" style="top: 25px;">Unit</th>
						<th class="td-table" style="top: 25px;">cc</th>
						<th class="td-table" style="top: 25px;">วันที่</th>
						<th class="td-table" style="top: 25px;">เวลา</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
		<div id="tab2-1">

		</div>
		<div class="form-group col-md-12">
			<i style="color: #F39;" class="fa fa-circle"></i>&nbsp;Most compatible
			<i style="color: #FFFF00;" class="fa fa-circle"></i>&nbsp;เลือดต่างหมู่&nbsp;&nbsp;



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

<div id="2_2" class="tabcontent2">
	<form role="form" id="form-blood-queue-tab2_2" method="POST" action="askforbloodsave.php" enctype="multipart/form-data">
		<div class="table-no-scroll999" style="height:60vh;">
			<table id="blood-queue-tab2-2" class="table table-striped" style="width:1970px">
				<thead>
					<tr>
						<th class="td-table" rowspan="2" style="width:140px">วันที่/เวลาต้องการใช้เลือด</th>
						<th class="td-table" rowspan="2" style="width:140px;display:none;">วันที่/เวลา แจ้งขอเลือด</th>
						<th class="td-table" rowspan="2" style="width:100px">HN</th>
						<th class="td-table" rowspan="2" style="width:180px">ชื่อผู้ป่วย</th>
						<th class="td-table" rowspan="2" style="width:200px">หน่วยงานที่แจ้งขอเลือด</th>
						<th class="td-table" rowspan="2" style="width:160px">ชนิดเลือดที่แจ้งขอ</th>
						<th class="td-table" rowspan="2" style="width:80px">ชนิดเลือด<br />พร้อมจ่าย</th>
						<th class="td-table" colspan="2" style="width:110px">ขอเบิก</th>
						<th class="td-table" rowspan="2" style="width:120px">หมายเลขถุง</th>
						<th class="td-table" rowspan="2" style="width:100px">Result</th>
						<th class="td-table" rowspan="2" style="width:20px">จ่าย</th>
						<th class="td-table" rowspan="2" style="width:80px">Beacon ID กระติก</th>
						<th class="td-table" rowspan="2" style="width:80px">RFID</th>
						<th class="td-table" rowspan="2" style="width:140px">วันที่/เวลา แจ้งขอเลือด</th>
						<th class="td-table" rowspan="2" style="width:120px">ผู้ยืนยันใช้เลือด</th>
					</tr>
					<tr>
						<th class="td-table" style="top: 25px;">Unit</th>
						<th class="td-table" style="top: 25px;">cc</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
		<div id="tab2-2">

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

<div id="2_3" class="tabcontent2">
	<div class="table-no-scroll999" style="height:50vh;">
		<table id="blood-queue-tab2-3" class="table table-striped" style="width:1890px">
			<thead>
				<tr>
					<th class="td-table" style="width:60px"></th>
					<th class="td-table" style="width:140px">วันที่/เวลา<br />แจ้งขอเลือด</th>
					<th class="td-table" style="width:140px">วันที่/เวลาที่<br />พร้อมใช้เลือด</th>
					<th class="td-table" style="width:140px">วันที่/เวลาที่<br />จ่ายเลือด</th>
					<th class="td-table" style="width:80px">HN</th>
					<th class="td-table" style="width:190px">ชื่อผู้ป่วย</th>
					<th class="td-table" style="width:40px">Bl.Gr.</th>
					<th class="td-table" style="width:100px">Rh(D)</th>
					<th class="td-table">หน่วยงานที่แจ้งขอเลือด</th>
					<th class="td-table" style="width:190px">ผู้จ่ายเลือด</th>
					<th class="td-table" style="width:100px">ชนิดเลือด<br />ที่แจ้งขอ</th>
					<th class="td-table" style="width:60px">เลือดที่<br />เตรียม</th>
					<th class="td-table" style="width:60px">จำนวน<br />ที่เตรียม</th>
					<th class="td-table" style="width:60px">เลือดที่<br />จ่าย</th>
					<th class="td-table" style="width:60px">จำนวน<br />ที่จ่าย</th>
					<th class="td-table" style="width:60px">จำนวน<br />คงเหลือ</th>
					<th class="td-table" style="width:80px"></th>

				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>
	<div id="event_data2">
	</div>
</div>

<div id="2_5" class="tabcontent2">
	<div class="table-no-scroll999" style="height:60vh;">
		<table id="blood-queue-tab2-5" class="table table-striped" style="width:1650px">
			<thead>
				<tr>
					<th class="td-table" style="width:120px">วันที่/เวลาจ่ายเลือด</th>
					<th class="td-table" style="width:140px">วันที่/เวลา แจ้งขอเลือด</th>
					<th class="td-table" style="width:100px">HN</th>
					<th class="td-table" style="width:190px">ชื่อผู้ป่วย</th>
					<th class="td-table" style="width:180px">หน่วยงานที่แจ้งขอเลือด</th>
					<th class="td-table" style="width:200px">ชนิดเลือด</th>
					<th class="td-table" style="width:120px">หมายเลขถุง</th>
					<th class="td-table" style="width:100px">Result</th>
					<th class="td-table" style="width:100px">Beacon ID กระติก</th>
					<th class="td-table">ติดตามกระติก</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>


<div id="2_4" class="tabcontent2">
	<iframe id="dashboardMap" src="http://192.168.7.14/#/dashboard/map" style="width:77vw;height:120vh"></iframe>
</div>

<div id="2_6" class="tabcontent2">
	<div class="table-no-scroll999" style="height:60vh;">
		<table id="blood-queue-tab2-6" class="table table-striped" style="width:1650px">
			<thead>
				<tr>
					<th class="td-table" style="width:180px">วันที่/เวลา</th>
					<th class="td-table" style="width:200px">Reader ID</th>
					<th class="td-table" style="width:240px">RFID</th>
					<th class="td-table" style="width:100px">ชนิดเลือด</th>
					<th class="td-table" style="width:200px">หมายเลขถุง</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>