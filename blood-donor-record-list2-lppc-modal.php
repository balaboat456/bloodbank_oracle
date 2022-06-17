<!-- Modal -->
<div class="modal fade custom-modal" id="lppcModal" tabindex="-1" role="dialog" aria-labelledby="lppcModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">บันทึก PC & FFP เป็น LPPC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">1. หมายเลขถุง PC</label>

                        <input type="text" autocomplete="off" class="form-control" value="" id="pc_1" placeholder="" name="pc_1" onkeyup="set_bag_number('pc_1')">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">2. หมายเลขถุง PC</label>

                        <input type="text" autocomplete="off" class="form-control" value="" id="pc_2" placeholder="" name="pc_2" onkeyup="set_bag_number('pc_2')">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">3. หมายเลขถุง PC</label>

                        <input type="text" autocomplete="off" class="form-control" value="" id="pc_3" placeholder="" name="pc_3" onkeyup="set_bag_number('pc_3')">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">4. หมายเลขถุง PC</label>

                        <input type="text" autocomplete="off" class="form-control" value="" id="pc_4" placeholder="" name="pc_4" onkeyup="set_bag_number('pc_4')">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">5. หมายเลขถุง FFP</label>

                        <input type="text" autocomplete="off" class="form-control" value="" id="ffp_5" placeholder="" name="ffp_5" onkeyup="set_bag_number('ffp_5')">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Volume LPPC</label>

                        <input type="number" autocomplete="off" class="form-control" value="" id="volume_lppc" placeholder="" name="volume_lppc" onkeyup="setVolume_decimal2(this)">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button onclick="setLppcModal()" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>ตกลง
                        </button>
                        <button type="button" onclick="closeLppcModal()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ยกเลิก
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function setVolume_decimal2(self) {
        console.log('******');
        var v = $(self).val();
        var c = Math.round(v);
        $(self).val(c);
        console.log(c);
    }
</script>