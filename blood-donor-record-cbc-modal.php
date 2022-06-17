<!-- Modal -->
<div class="modal fade custom-modal" id="bloodCBCModal" tabindex="-1" role="dialog" aria-labelledby="bloodCBCModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">ลงผล CBC ล่วงหน้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-1">
                        <label>Hb</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdpprehb_before_0"
                            placeholder=""  value="<?php echo $row["sdpprehb_before_0"];?>" onkeyup="replaceDecimal(this,4);beforePreHbColor0();"
                            name="sdpprehb_before_0">
                    </div>

                    <div class="form-group col-md-1">
                        <label>Hct</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdpprehct_before_0"
                            placeholder=""  value="<?php echo $row["sdpprehct_before_0"];?>" onkeyup="beforePreHctColor0()"
                            name="sdpprehct_before_0">
                    </div>

                    <div class="form-group col-md-1">
                        <label>RBC</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdpprerbc_before_0"
                            placeholder=""  value="<?php echo $row["sdpprerbc_before_0"];?>" onkeyup="beforePreRbcColor0()"
                            name="sdpprerbc_before_0">
                    </div>

                    <div class="form-group col-md-1">
                        <label>WBC</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdpprewbc_before_0"
                            placeholder=""  value="<?php echo $row["sdpprewbc_before_0"];?>" onkeyup="beforePreWbcColor0()"
                            name="sdpprewbc_before_0">
                    </div>
    
                    <!-- <div class="form-group col-md-1">
                        <label>PLT</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdppreplt_before_0"
                            placeholder=""  value="<?php echo $row["sdppreplt_before_0"];?>" onkeyup="beforePrePltColor0()"
                            name="sdppreplt_before_0">
                    </div> -->
                    <div class="form-group col-md-1">
                        <label>PLT</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdppreplt_before_0"
                            placeholder=""  value="<?php echo $row["sdppreplt_before_0"];?>" onkeyup="SetPtlColor()" onkeydown="beforePrePltColor0()"
                            name="sdppreplt_before_0">
                    </div>

                    <div class="form-group col-md-1">
                        <label>MCV</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdppremcv_before_0"
                            placeholder=""  value="<?php echo $row["sdppremcv_before_0"];?>" onkeyup="beforePreMcvColor0()"
                            name="sdppremcv_before_0">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Eosinophil</label>
                        <input type="number" step="any" class="sdp-number-center form-control" id="sdppreeosinophil_before_0"
                            placeholder=""  value="<?php echo $row["sdppreeosinophil_before_0"];?>" onkeyup="beforePreEosinophilColor0()"
                            name="sdppreeosinophil_before_0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button onclick="closeCBC()" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-check"></i></span>ตกลง
                        </button>

                        <button onclick="closeCBC()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var Decimal_4 = 0;

function autoDecimal_4() {
    var integer = document.getElementById("sdpprehb_before_0").value;
    var float = parseFloat(integer) || 0;
    var decimal = float.toFixed(1);

    if (Decimal_4 == 0) {
        document.getElementById("sdpprehb_before_0").value = decimal;
        Decimal_4++;
    }
    if (integer == "") {
        Decimal_4--;
    }
}
function SetPtlColor(){
    var val = document.getElementById("sdppreplt_before_0").value
    if(val > 200 && val < 400){
        document.getElementById("sdppreplt_before_0").style.color = "#000000"
    }
}
</script>