<!-- Modal -->
<div class="modal fade custom-modal" id="customChangeBloodModal" tabindex="-1" role="dialog" aria-labelledby="customModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติการเปลี่ยน Blood</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="list_table_json_chanhe_Blood" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>วัน-เวลา</th>
                            <th>หมู่เลือดเดิม</th>
                            <th>หมู่เลือดใหม่</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="closeChangeBloodPage()" class="btn btn-warning" type="button">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>