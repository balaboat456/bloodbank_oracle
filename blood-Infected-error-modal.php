<!-- Modal -->
<div class="modal fade blank-modal" id="printError" role="dialog" aria-labelledby="printError" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รายงาน Import ไม่สำเร็จ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                    <div class="table-stock-scroll" style="height:65vh">
                        <table id="list_table_json_error" >
                            <thead>
                                <tr>
                                    <th style="width:120px" class="td-table">No.</th>
                                    <th class="td-table">หมายเลข</th>
                                    <th class="td-table">สเเหตุ</th>
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

                        <button type="button" onclick="closeErrorPrint()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
