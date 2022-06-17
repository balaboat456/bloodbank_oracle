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

                <div class="row vertical-bottom">
                    <div class="form-group col-md-1" align="right">
                        <label for="inputCity">วันที่แจ้งขอเลือด</label>

                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="fromdate" autocomplete="off" class="form-control date" onkeyup="getDate8('fromdate')" value="" id="fromdate" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <input type="text" name="todate" autocomplete="off" class="form-control date" onkeyup="getDate8('todate')" value="" id="todate" placeholder="">
                    </div>

                    <div class="form-group col-md-3">
                        <div>
                            <a role="button" href="#" class="btn btn-primary" onclick="loadTableReq()" data-toggle="modal"><span class="btn-label"><i class="fa fa-search"></i></span>ค้นหา</a>
                        </div>
                    </div>

                </div>

                <div class="table-s-scroll" style="height:40vh;">
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

                <div class="row">

                    <div class="form-group col-md-5">
                        ชนิดเลือดที่แจ้งขอ
                        <div class="table-s-scroll" style="height:30vh;">
                            <table id="list_request_blood_modal_2">
                                <thead>
                                    <tr>
                                        <th>ชนิดเลือด</th>
                                        <th>จำนวนจอง(Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        ชนิดเลือดที่ได้รับ
                        <div class="table-s-scroll" style="height:30vh;">
                            <table id="list_request_blood_modal_3">
                                <thead>
                                    <tr>
                                        <th>ชนิดเลือด</th>
                                        <th>จำนวนที่ได้รับ(Unit)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        ถุงเลือดที่ได้รับ
                        <div class="table-s-scroll" style="height:30vh;">
                            <table id="list_request_blood_modal_4">
                                <thead>
                                    <tr>
                                        <th>หมายเลขถุง</th>
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
                        <button onclick="setReOrder()" id="btnReOrderModal" class="btn btn-secondary" type="button">
                            <span class="btn-label"><i class="fa fa-refresh"></i></span>Re Order
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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