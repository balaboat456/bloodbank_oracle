<!-- Modal -->
<div class="modal fade custom-modal" id="customModalADR"  role="dialog" aria-labelledby="customModalADR"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalADRLabel">ประวัติการรับเลือด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div  class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">ชนิดเลือด</label>
                        </div>
                        <div  class="form-group col-md-3" style="margin: 0px 0px 0px 0px">
                            <select id="findbloodstocktype34" class="form-control form-control-sm findbloodstocktype34" name="findbloodstocktype34">
                                <option value=""></option>
                                <?php
                                $strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
                                $objQuery = mysql_query($strSQL);
                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                ?>
                                    <option  value="<?php echo $objResuut['bloodstocktypeid']; ?>">
                                        <?php echo $objResuut['bloodstocktypename2']."|".$objResuut['bloodstocktypecode']. "|" . $objResuut['bloodstocktypecodegroup']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div  class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">หมายเลขถุง</label>
                        </div>
                        <div  class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
                            <input type="text" autocomplete="off" name="findbagnumber34" style="margin: 0px 0px 0px 0px" class="form-control" id="findbagnumber34" onkeyup="bagNumberScan(`findbagnumber34`)" >
                        </div>

                    </div>
                    <br/>
                <table id="list_table_json" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width:20px">CK</th>
                            <th style="width:200px">หมายเลขถุง</th>
                            <th style="width:120px">หมู่เลือด</th>
                            <th style="width:120px">Rh</th>
                            <th>ชนิดเลือด</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="adrToBloodRow()" id="btnAddModal" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม
                        </button>
                        <button onclick="closePageADR()" class="btn btn-warning" type="button">
                        <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>