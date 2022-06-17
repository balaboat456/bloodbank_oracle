<!-- Modal -->
<div class="modal fade blank-modal" id="blankModalOutRoom" role="dialog" aria-labelledby="blankModalOutRoom"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">คลังเลือดห้องฉุกเฉิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">

                <div class="table-stock-scroll" style="height:520px">
                    <table id="list_table_json_out_room" style="width:1620px">
                        <thead>
                            <tr>

                                <th style="width:120px" class="td-table">หมายเลขถุง</th>
                                <th style="width:120px" class="td-table">RFID</th>
                                <th style="width:30px" class="td-table">sub</th>
                                <th style="width:100px" class="td-table">ชนิดเลือด</th>
                                <th style="width:120px" class="td-table">หมายเลขสาย</th>
                                <th class="td-table">Bl.Gr.</th>
                                <th class="td-table">Rh</th>
                                <th class="td-table" style="width:80px">Volume</th>
                                <th style="width:120px" class="td-table">วันที่เจาะ</th>
                                <th style="width:120px" class="td-table">วันที่หมดอายุ</th>
                                <th class="td-table">Antibody</th>
                                <th class="td-table">Phenotype</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <button type="button" onclick="closeBloodBlankOutRoom()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>