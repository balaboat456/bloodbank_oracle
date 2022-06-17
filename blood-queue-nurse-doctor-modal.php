<!-- Modal -->
<div class="modal fade custom-modal" id="customDoctorModal"  role="dialog" aria-labelledby="customDoctorModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ยืนยันการใช้เลือด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="list_table_doctor_json" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:250px">หมายเลขถุง</th>
                            <th style="width:250px">ชนิดเลือด</th>
                            <th style="width:150px">Result</th>
                            <th style="width:350px">รหัสแพทย์</th>
                            <th>หมายเหตุ</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-success" onclick="saveFormData()" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                        </button>
                        <button onclick="closeDoctorPage()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>