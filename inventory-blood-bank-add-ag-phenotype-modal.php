<!-- Modal -->
<div id="addAgPhenotypeModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addAgPhenotypeTitleModal">สร้างตาราง Phenotype</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<input hidden id="addAgPhenotypeTitle" value="" />
				<input hidden id="bloodstocktypeagid" value="" />
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="form-group col-md-3">
						<label for="inputEmail4">ชนิดเลือด</label>
						<select id="ag_bloodstocktypecross1" class="form-control agbloodstocktype"
							name="ag_bloodstocktypecross1">
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputCity">หมายเลขถุง</label>
						<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
						<input type="text" name="ag_bag_number" autocomplete="off" class="form-control" id="ag_bag_number"
							onkeyup="scanBarcodeAddBloodStockInTypeAg()" placeholder="หมายเลขถุง" autofocus>
					</div>

					<div class="form-group col-md-2">
						<label for="inputCity">RFID</label>
						<i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
						<input type="text" name="ag_rfidscan" class="form-control" value="<?php echo $barcode; ?>"
							id="ag_rfidscan"  placeholder="Scan RFID" autofocus>
					</div>

				
				</div>

				<div class="table-stock-scroll" style="height:75vh">
					<table id="list_table_json_type_ag" >
						<thead>
							<tr>
								<th style="width:40px" class="td-table">No.</th>
								<th class="td-table">ชนิดเลือด</th>
								<th class="td-table">หมายเลขถุง</th>
								<th class="td-table">Phenotype</th>
								<th style="width:140px" class="td-table">Action</th>
							</tr>
						</thead>
						<tbody>


						</tbody>
					</table>
				</div>
				
			</div>
			<div class="modal-footer">
				<button onclick="PhenotypeAgInItemSave()" class="btn btn-primary" type="submit">
					<span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
				</button>
				<button type="button" data-dismiss="modal" class="btn btn-warning m-l-5">
					<span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
				</button>
			</div>
		</div>

	</div>
</div>