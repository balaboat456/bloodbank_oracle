<div class="modal fade blank-modal" id="checkbloodhistorymodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ประวัติการตรวจผลเลือดผู้ป่วย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="table-s-scroll" style="height:65vh;">
                    <table id="list_request_blood_history_modal">
                        <thead>
                            <tr>
                                <th style="width:140px;">วัน/เวลาที่ขอเลือด</th>
                                <th style="width:100px;">ABO</th>
                                <th style="width:100px;">Rh<br />Grouping</th>
                                <th style="width:100px;">Antibody<br />Screening</th>
                                <th>Antibody</th>
                                <th>Antigen</th>
                                <th>หมายเหตุ</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>

                <div class="col-md-12">
                    <div class="form-group  col-md-12">
                        <label for="inputEmail4">Antibody All</label>
                        <div class="col-md-12 div-anti">
                            <label id="antibodyAllLable"></label>
                        </div>
                    </div>
                    <div class="form-group  col-md-12">
                        <label for="inputEmail4">Antigen All</label>
                        <div class="col-md-12 div-anti">
                            <label id="phenotypeAllLable"></label>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button type="button" onclick="checkBloodModalHistoryClose()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>