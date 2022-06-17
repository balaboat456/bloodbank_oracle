<div class="modal fade blood-invest-modal" id="bloodBorrowModal2" tabindex="-1" role="dialog"
    aria-labelledby="bloodModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label_borrow_receivingtypeid">ข้อมูลประวัติการเบิกโลหิตที่หายากกับสภากาชาดไทย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="table-s-scroll" class="table-s-scroll" style="height:80vh;">
                    <table id="list_blood_borrow_receivingtypeid_2">
                        <thead>
                            <tr>
                                <th style="width:160px">วันที่เบิก</th>
                                <th style="width:160px">HN</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ชนิดเลือด</th>
                                <th>Antigen</th>
                                <th style="width:60px">Bl.Gr.</th>
                                <th style="width:60px">จำนวนที่ขอ</th>
                                <th style="width:60px">จำนวนที่ได้รับ</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <div align="right" class="form-group col-md-6">
                    <button class="btn btn-success" onclick="confirmchReceivingTypeid_2()" type="button">
                        <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                    </button>
                    <button type="button" onclick="closeBloodBorrow2()" class="btn btn-warning m-l-5">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                    </button>
                </div>



            </div>
        </div>
    </div>
</div>