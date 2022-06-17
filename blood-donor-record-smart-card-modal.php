<!-- Modal -->
<div class="modal fade custom-modal" id="customSmartcardModal" tabindex="-1" role="dialog" 
    aria-hidden="true" >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Smart Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <div class="form-check">
                            <img id="smartcardprofile" src="assets/images/profile.png" alt="Smiley face" height="170" width="160">
                        </div>
                    </div>

                    <div class="form-group col-md-8">
                        <label>ชื่อ-นามสกุล : </label> <label class="smartcardlabel" id="smartcardfullname">-</label><br>
                        <label>เลขบัตรประชาชน : </label> <label class="smartcardlabel" id="smartcardcitizenid">-</label><br>
                        <label>วันเกิด : </label> <label class="smartcardlabel" id="smartcarddob">-</label><br>
                        <label>เพศ : </label> <label class="smartcardlabel" id="smartcardgender_th">-</label><br>
                        <label>ที่อยู่ : </label> <label class="smartcardlabel" id="smartcardaddress">-</label><br>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button type="button" onclick="loadSmartCard()" class="btn btn-secondary m-l-5">
                            <span class="btn-label"><i class="fa fa-refresh"></i></span>Re-Load
                        </button>
                        <button data-dismiss="modal" aria-label="Close" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>