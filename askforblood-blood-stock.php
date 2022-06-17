<!-- Modal -->
  
<input type="hidden" id="bloodstockmainid3" name="bloodstockmainid3">
<div class="modal fade blank-modal" id="blankModalOut" role="dialog" aria-labelledby="blankModalOut" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">คลังเลือดห้องฉุกเฉิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">

                    <div class="row">
                       

                        <div  class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">หมายเลขถุง</label>
                        </div>
                        <div  class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
                            <input type="text" autocomplete="off" name="findbagnumber_o1" style="margin: 0px 0px 0px 0px" class="form-control" id="findbagnumber_o1" onkeyup="bagNumberScan(`findbagnumber_o1`)" >
                        </div>

                    </div>
                    <hr/>
              
                    <div class="table-stock-scroll" style="height:60vh">
                        <table id="list_table_json_out" style="width:1620px">
                            <thead>
                                <tr>
                                    <th class="td-table">CK</th>
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

                        <button onclick="addBloodBlank()"  class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                        </button>
                        <button type="button" onclick="closeBloodBlank()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


