<!-- Modal -->
<div class="modal fade custom-modal" id="bloodFileModal" tabindex="-1" role="dialog" aria-labelledby="bloodFileModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติเลือดติดเชื้อ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >

            <input hidden type="text" value="" id="donateid"  name="donateid">

                <div class="table-s-scroll" style="height:65vh;">
                                
                    <table id="list_table_json_blood_infected_file" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px;">No</th>
                                <th style="width:300px;">ชื่อเอกสาร</th>
                                <th style="width:300px;">อัพโหลด</th>
                                <th >เอกสาร</th>
                                <th class="td-table" style="width:40px">
                                    <button type="button" onclick="clickAddRowRepeatInfectionItem()" class="btn btn-info btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </th>
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

                        <button onclick="saveInfectedFile()" class="btn btn-primary" name="submit" type="button">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                        </button>

                        <button onclick="closePageFile()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>