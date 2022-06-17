<!-- Modal -->
<div class="modal fade custom-modal" id="patient_modal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2patient_modal">ประวัติการบริจาค</h5>
                <!-- <button type="button" class="close" onclick="customModalMaxMin()"> -->
                    <span aria-hidden="true" id="btnIconMaxMinpatient_modal"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <table id="list_table_jsonpatient_modal" class="table table-bordered table-hover">
                    <thead id="list_table_header_jsonpatient_modal">
                        <tr>
                            <th class="table-td-header">HN</th>
                            <th class="table-td-header">AN</th>
                            <th class="table-td-header">ชื่อ - นามสกุล</th>
                            <th class="table-td-header">หอผู้ป่วย</th>
                            <th class="table-td-header">Action</th>
                        </tr>
                    </thead>
                        <tbody id="body_patient_modal">


                        </tbody>
                    </table>
                </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="closePage()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>