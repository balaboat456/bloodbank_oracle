<input type="text" value="" id="requestbloodid" name="requestbloodid" hidden>
<input type="text" value="" id="requestbloodcode" name="requestbloodcode" hidden>
<input type="text" value="" id="hn" name="hn" hidden>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">

        <div class="card-body">
            <div class="container-fluid">

                <div class="table-s-scroll" style="height:300px">
                    <table id="list_table_record_request_blood_lab">
                        <thead>
                            <tr>
                                <th style="width:20px"></th>
                                <th style="width:20px">V</th>
                                <th style="width:20px">A</th>
                                <th style="width:160px">LAB ID</th>
                                <th style="width:160px">วันที่ส่งตรวจ</th>
                                <th>ชื่อ-สกุล</th>
                                <th style="width:160px">หน่วยงานส่งตรวจ</th>
                                <th style="width:120px">HN</th>
                                <th style="width:120px">AN</th>
                                <th style="width:120px">สถานะใบชันสูตร</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <br />

                <div class="form-group col-md-12"><label>Comment By Order :</label>
                    <input type="text" autocomplete="off" value="" class="form-control " id="commentbyorder"
                        name="commentbyorder">
                </div>

                <div class="table-s-scroll" style="height:300px">
                    <table id="list_table_record_request_blood_lab_item">
                        <thead>
                            <tr>
                                <th>ชื่อรายการตรวจ</th>
                                <th style="width:200px">ผลตรวจ</th>
                                <th style="width:20px"></th>
                                <th style="width:100px">ปกติ</th>
                                <th style="width:160px">ค่าปกติ</th>
                                <th style="width:160px">หน่วย</th>
                                <th style="width:200px">สิ่งส่งตรวจ</th>
                                <th >Comment Analyze</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="div-save">
    <div class="save-bottom">
        <div class="form-group text-right m-b-0">
            <div>
                <button class="btn btn-primary" type="submit">
                    <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                </button>
            </div>

        </div>

    </div>
</div>