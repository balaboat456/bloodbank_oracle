<!-- Modal -->
<div class="modal fade custom-modal" id="sdppasModal" tabindex="-1" role="dialog" aria-labelledby="sdppasModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">บันทึก SDP & PAS เป็น SDP(PAS)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">1. หมายเลขถุง SDP</label>

                        <input type="text" autocomplete="off"  class="form-control" value="" id="sdp_sdp_pas_1"
                            placeholder=""  name="sdp_sdp_pas_1" onkeyup="set_bag_number('sdp_sdp_pas_1')">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">2. PAS</label>

                        <input type="text" autocomplete="off"  class="form-control" value="" id="sdp_pas_pas_2"
                            placeholder=""  name="sdp_pas_pas_2" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">บริษัทน้ำยา PAS</label>

                            <select  id="pas_sdp_companypasid" class="form-control form-control-sm" name="pas_sdp_companypasid">
                                <option value="0"></option>
                                        <?php
                                            $strSQL = "SELECT * FROM company_pas ORDER BY companypasid";
                                            $objQuery = mysql_query($strSQL);
                                            while($objResuut = mysql_fetch_array($objQuery))
                                            {
                                        ?>
                                <option value="<?php echo $objResuut["companypasid"];?>">
                                    <?php echo $objResuut["companypasname"];?></option>
                                        <?php } ?>
                            </select>


                    </div>
                    <a href="#" onclick="showCustomCompany()"><medium id="emailHelp" class="form-text text-muted">เพิ่มบริษัทน้ำยา</medium></a>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Lot.no.</label>

                        <input type="text" autocomplete="off"  class="form-control" value="" id="pas_sdp_lot_no"
                            placeholder=""  name="pas_sdp_lot_no" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">วันที่น้ำยาหมดอายุ</label>

                        <input type="text" autocomplete="off"  class="form-control date1" value="" id="pas_sdp_exp"
                            placeholder=""  name="pas_sdp_exp" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button onclick="setSdpPasModal()" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>ตกลง
                        </button>
                        <button type="button" onclick="closeSdpPasModal()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ยกเลิก
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>