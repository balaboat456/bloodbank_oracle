<!-- Modal -->
<div class="modal fade custom-modal" id="bloodReprintNoHistoryModal" tabindex="-1" role="dialog"
    aria-labelledby="bloodReprintNoHistoryModal" aria-hidden="true" style="width: 400px;height:600px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">พิมพ์สติกเกอร์ผู้ป่วย (กรณีไม่มีประวัติ)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="min-height: 100px;">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">ระบุ HN</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="hnnoprint" class="form-control" id="hnnoprint" onkeyup="setNewHN(this)" autofocus="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">HN</label>
                        <input readonly type="text" name="no_hn" class="form-control" id="no_hn" onkeyup="setNewHN(this)" autofocus="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">ชื่อผู้ป่วย</label>
                        <input readonly type="text" name="no_fullname" class="form-control" id="no_fullname" onkeyup="setNewHN(this)" autofocus="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">หอผู้ป่วย</label>
                        <select name="no_wardid" class="form-control" id="no_wardid" ></select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button onclick="printQueueStickerNoHistory()" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                        </button>

                        <button onclick="bloodReprintNoHistoryModalClose()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>