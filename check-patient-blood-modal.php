<div class="modal fade blank-modal" id="checkbloodmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ผลตรวจเลือดผู้ป่วย/ผลการ cross-match</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="table-s-scroll" style="height:40vh;">
                    <table id="list_request_blood_modal2">
                        <thead>
                            <tr>
                                <th>วัน/เวลาที่ขอเลือด</th>
                                <th>HN</th>
                                <th>AN</th>
                                <th>ประเภทการแจ้งขอ</th>
                                <th>เพื่อบุตร</th>
                                <th>หน่วยงานที่ขอเลือด</th>
                                <th>แพทย์ผู้สั่ง</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
                <br/>
                <div class="row">

                    <div class="form-group col-md-6">
                        รายละเอียดเลือดที่ขอให้ผู้ป่วย
                        <div class="table-s-scroll" style="height:30vh;">
                            <table id="list_table_blood_req">
                                <thead>
                                    <tr>
                                        <th>ชนิดเลือด</th>
                                        <th>จำนวน/Unit</th>
                                        <th>ปริมาณ(CC.)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                  
                    <div class="form-group col-md-6">
                        รายละเอียดเลือดที่เตรียมให้ผู้ป่วย
                        <div class="table-s-scroll" style="height:30vh;">
                            <table id="list_table_blood_req_crossmatch">
                                <thead>
                                    <tr>
                                        <th>หมายเลขถุง</th>
                                        <th>ชนิดเลือด</th>
                                        <th>กลุ่มโลหิต</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button type="button" onclick="checkBloodModalClose()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>