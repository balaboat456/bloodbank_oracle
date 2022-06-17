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
                    <table id="table_blood_exchange1">
                        <thead>
                            <tr>
                                <th class="td-table" style="width:180px">AN</th>
                                <th class="td-table" style="width:60px">ครั้งที่</th>
                                <th class="td-table" style="width:180px">วัน-เวลาที่ทำ</th>
                                <th class="td-table" style="width:250px">ประเภทการทำ</th>
                                <th class="td-table" style="width:160px">Machine</th>
                                <th class="td-table" style="width:200px">แพทย์</th>
                                <th class="td-table">ผลการวินิจฉัย</th>

                            </tr>
                        </thead>
                        <tbody id="exchange_data1">

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



<div class="modal fade blank-modal" id="exchangeBloodModalShow" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติการPlasma Exchange</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="table-s-scroll" style="height:70vh;">
                    <table id="table_blood_exchange">
                        <thead>
                            <tr>
                                <th class="td-table" style="width:180px">AN</th>
                                <th class="td-table" style="width:60px">ครั้งที่</th>
                                <th class="td-table" style="width:180px">วัน-เวลาที่ทำ</th>
                                <th class="td-table" style="width:250px">ประเภทการทำ</th>
                                <th class="td-table" style="width:160px">Machine</th>
                                <th class="td-table" style="width:200px">แพทย์</th>
                                <th class="td-table">ผลการวินิจฉัย</th>
                                <th class="td-table">Action</th>
                            </tr>
                        </thead>
                        <tbody id="exchange_data">

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
