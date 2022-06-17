<!-- Modal -->
<div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ข้อมูลการเบิกเลือด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="list_table_json" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ชนิดเลือด</th>
                            <th style="width:60px">จำนวน(Unit)</th>
                            <th style="width:60px">จำนวน(CC)</th>
                            <th style="width:140px">วัน-เวลาที่ต้องการใช้เลือด</th>
                            <th style="width:140px">วัน-เวลาที่บันทึกเบิกเลือด</th>
                            <th style="width:240px">ผู้ยืนยันการใช้เลือด</th>
                            <th style="width:240px">สาเหตุการยกเลิก</th>
                            <th style="width:100px">ยกเลิก/พิมพ์</th>
                        </tr>
                    </thead>
                    <tbody>


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