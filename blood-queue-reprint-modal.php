<!-- Modal -->
<div class="modal fade custom-modal" id="bloodReprintModal" tabindex="-1" role="dialog"
    aria-labelledby="bloodReprintModal" aria-hidden="true" style="width: 400px;height:400px;
">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">พิมพ์สติกเกอร์ผู้ป่วยซ้ำ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="min-height: 100px;">

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputCity">ระบุ HN เพื่อพิมพ์ซ้ำ</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="hnreprint" class="form-control" id="hnreprint" onkeyup="setNewHN(this)" autofocus="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="bloodReprintModalClose()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>