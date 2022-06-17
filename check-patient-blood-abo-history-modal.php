<div class="modal fade blank-modal" id="checkblooABOdhistorymodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติการเปลี่ยนแปลงผลเลือดผู้ป่วย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="table-s-scroll" style="height:75vh;">
                    <table id="list_request_blood_abo_history_modal">
                        <thead>
                            <tr>
                                <th style="width:140px;">วัน/เวลาที่บันทึกผล</th>
                                <th style="width:100px;">ABO เดิม</th>
                                <th style="width:100px;">ABO ใหม่</th>
                                <th style="width:300px;">ผู้บันทึกการเปลี่ยน</th>
                                <th >สาเหตุ</th>
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
                        <button type="button" onclick="checkBloodABOModalHistoryClose()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>