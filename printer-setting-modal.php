<!-- Modal -->
<div class="modal fade custom-modal" id="customPrinterSettingModal" tabindex="-1" role="dialog" 
    aria-hidden="true" style="width:800px;z-index: 1000000;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Printer Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-no-scroll" style="height:520px">
                    <table id="list_table_printer_setting_activity"  class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th style="width:60px">No.</th>
                                <th >ชื่อเครื่อง Client</th>
                                <th >ชื่อเครื่องปริ้น</th>
                                <th style="width:40px">
                                    <button type="button" onclick="addPrinterSetting()" class="btn btn-info btn-sm">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </th>
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

                        <button onclick="savePrinterSetting()" class="btn btn-primary" type="button">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
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