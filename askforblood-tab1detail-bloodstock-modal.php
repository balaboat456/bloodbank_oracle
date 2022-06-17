<div class="modal fade blank-modal" id="requestbloodmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติการขอจองเลือด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="table-s-scroll" style="height:70vh;">
                    <table id="list_request_blood_modal">
                        <thead>
                            <tr>
                                <th>วัน/เวลาที่ขอเลือด</th>
                                <th>หน่วยงานที่ขอเลือด</th>
                                <th>แพทย์ผู้สั่ง</th>
                                <th>ประเภทการแจ้งขอ</th>
                                <th>สถานะ</th>
                                <th>Action</th>
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
                        <button onclick="selectTableReq('0'); setEnableDisable(false); setnew_request();" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                        </button>
                        <button type="button" onclick="requestBloodModalClose()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>