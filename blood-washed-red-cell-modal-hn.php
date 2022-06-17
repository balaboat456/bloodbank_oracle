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
                    <table hidden id="list_request_blood_modal">
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
                    <table  id="table_blood_washed_red_cell">
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
                        <tbody id="table_cross_body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button hidden onclick="selectTableReq('0')" id="btnAddModal" class="btn btn-success" type="button">
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

<div class="modal fade blank-modal" id="requestbloodmodal_status" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">สาเหตุที่ยกเลิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="form-group col-md-12"><label>หมายเหตุ</label>
                    <textarea id="wash_status_remark" name="wash_status_remark" class="form-control"></textarea>
                </div>
                <input hidden type="text" id="bag_number_where" name="bag_number_where">
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="cancelwash_confirm('0')" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>ยืนยัน
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

<div class="modal fade blank-modal" id="washBloodModalShow" role="dialog" aria-hidden="true">
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


                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button hidden onclick="selectTableReq('0')" id="btnAddModal" class="btn btn-success" type="button">
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