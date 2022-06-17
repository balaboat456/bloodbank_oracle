<!-- Modal -->
<div class="modal fade custom-modal" id="bloodHistoryPrintPayFormModal" tabindex="-1" role="dialog"
    aria-labelledby="bloodHistoryPrintPayFormModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ข้อมูลเส้นทาง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-no-scroll999" style="height:60vh;">
                        <table id="list_blood_history_print_pay_modal" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:80px"></th>
                                    <th style="width:200px">วัน/เวลาที่ พิมพ์</th>
                                    <th >ผู้สั่งพิมพ์</th>
                    
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="closeBloodHistoryPrintPayFormModal()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>