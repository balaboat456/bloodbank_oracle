<!-- Modal -->
<div id="searchAgPhenotypeModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="searchAgPhenotypeTitleModal">ค้นหา Phenotype</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<input hidden id="searchAgPhenotypeTitle" value="" />
				<input hidden id="searchbloodstocktypeagid" value="" />
			</div>
			<div class="modal-body">

				<div class="table-stock-scroll" style="height:75vh">
					<table id="list_table_json_type_ag_search" >
						<thead>
							<tr>
								<th style="width:40px" class="td-table">No.</th>
								<th class="td-table">ชนิดเลือด</th>
								<th class="td-table">หมายเลขถุง</th>
								<th class="td-table">sub</th>
								<th class="td-table">Bl.Gr.</th>
								<th class="td-table">Rh</th>
								<th class="td-table">Volume</th>
								<th class="td-table">Phenotype</th>
								<th class="td-table">วันหมดอายุ</th>
								<th style="width:140px" class="td-table">Action</th>
							</tr>
						</thead>
						<tbody>


						</tbody>
					</table>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-warning m-l-5">
					<span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
				</button>
			</div>
		</div>

	</div>
</div>