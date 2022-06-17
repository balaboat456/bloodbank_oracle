<div class="modal fade blank-modal" id="customLogCrossMatchModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customLogCrossMatchModal">Log Cross-Match</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">

                <div class="table-s-scroll" style="height:30vh;">
                    <table id="list_table__cross_match_log_main_json" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="td-table" style="width:200px">วัน-เวลาที่แก้ไข</th>
                                <th class="td-table" >ผู้แก้ไข</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
                <br />

                <div class="table-s-scroll" style="height:40vh;">
                    <table id="list_table__cross_match_log_json" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="td-table" rowspan="2" style="width:60px">No.</th>
                                <th class="td-table" rowspan="2" style="width:200px">หมายเลขถุง</th>
                                <th class="td-table" rowspan="2" style="width:40px">Sub</th>
                                <th class="td-table" rowspan="2" style="width:60px">ฉายแสง</th>
                                <th class="td-table" rowspan="2" style="width:60px">HLA<br>match</th>
                                <th class="td-table" rowspan="2" style="width:40px">ABO<br>Gr.</th>
                                <th class="td-table" rowspan="2" style="width:40px">Rh</th>
                                <th class="td-table" rowspan="2" style="width:80px">Type</th>
                                <th class="td-table" colspan="4" style="width:160px">CTT</th>
                                <th class="td-table" rowspan="2" style="width:80px">CAT</th>
                                <th class="td-table" rowspan="2" style="width:80px">ROU</th>
                                <th class="td-table" rowspan="2" style="width:140px">Result</th>
                                <th class="td-table" rowspan="2">สถานะ</th>
                                <th class="td-table" rowspan="2">แพทย์ผู้รับผิดชอบ</th>
                                <th class="td-table" rowspan="2">ผู้เตรียมเลือด</th>
                                <th class="td-table" rowspan="2">วัน/เวลาที่เตรียมเลือด</th>
                                <th class="td-table" rowspan="2">หมายเหตุ</th>
                            </tr>
                            <tr>
                                <th style="top:25px">RT</th>
                                <th style="top:25px">37C</th>
                                <th style="top:25px">IAT</th>
                                <th style="top:25px">CCC</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>

                <div class="modal-footer">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning m-l-5">
                                <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>