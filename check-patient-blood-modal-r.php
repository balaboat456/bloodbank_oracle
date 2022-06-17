<!-- Modal -->
<div class="modal fade custom-modal" id="customModalReplacement" role="dialog" aria-labelledby="customModalReplacement"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalReplacementLabel">จำนวน Replacement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="list_table_replacement_json" class="table table-bordered table-hover" style="width:300px">
                    <thead>
                        <tr>
                            <th style="width:120px">หมู่เลือด</th>
                            <th style="width:120px">Rh</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="closeReplacement()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>