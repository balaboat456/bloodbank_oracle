<!-- Modal -->
<div class="modal fade custom-modal" id="bloodBlankHospitalModal" tabindex="-1" role="dialog" aria-hidden="true" style="width:800px;z-index: 1060 !important;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">[<label id="hospitalstate"></label>] สาขา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">รหัสสาขา</label>
                        <input type="text" autocomplete="off" class="form-control" id="hospitalcode" name="hospitalcode">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="inputEmail4">ชื่อสาขา</label>
                        <input hidden type="text" autocomplete="off" class="form-control" id="hospitalid" name="hospitalid">
                        <input type="text" autocomplete="off" class="form-control" id="hospitalname" name="hospitalname">
                    </div>
                    <div hidden class="form-group col-md-12">
                        <label for="inputEmail4">เช็ค</label>
                        <input type="text" autocomplete="off" class="form-control" id="hospitalcode_check" name="hospitalcode_check">
                    </div>
                </div>
                <div class="table-no-scroll" style="height:520px">
                    <table id="list_table_json_hospital" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:60px">No.</th>
                                <th>ชื่อสาขา</th>
                                <th style="width:100px">Action</th>
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

                        <button type="button" onclick="newHospital()" class="btn btn-success m-l-5">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                        </button>

                        <button onclick="saveHospital()" class="btn btn-primary" type="button">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                        </button>

                        <button onclick="closeCustomHospital()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

