<br/>
<div class="row vertical-bottom">
    <div class="form-group col-md-1" align="right">
        <label for="inputCity">วันขอตรวจ</label>

    </div>
    <div class="form-group col-md-2">
        <input type="text" name="fromdate" autocomplete="off" class="form-control date"
            onkeyup="getDate8('fromdate')" value="<?php echo dateNowDMYDiff7(); ?>" id="fromdate" placeholder="">
    </div>

    <div class="form-group col-md-2">
        <input type="text" name="todate" autocomplete="off" class="form-control date"
            onkeyup="getDate8('todate')" value="<?php echo dateNowDMY(); ?>" id="todate" placeholder="">
    </div>

    <div class="form-group col-md-3">
        <div>
            <a role="button" href="#" class="btn btn-primary" onclick="loadCheckRequestTab2()"
                data-toggle="modal"><span class="btn-label"><i
                        class="fa fa-search"></i></span>ค้นหา</a>
        </div>
    </div>

</div>

<div class="row vertical-bottom">
    <div class="col-md-8">
        <div class="table-s-scroll" style="height:70vh;">
            <table id="lab_check_request_modal_tab2">
                <thead>
                    <tr>
                        <th>วัน/เวลาที่ส่งตรวจ</th>
                        <th>An</th>
                        <th>สถานะใบชันสูตร</th>
                        <th>หน่วยงานส่งตรวจ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
    <div class="col-md-4">
        <div class="table-s-scroll" style="height:35vh;">
            <table id="lab_check_request_modal_tab2_item1">
                <thead>
                    <tr>
                        <th>สิ่งสิ่งตรวจ</th>
                        <th>LN</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

        <div class="table-s-scroll" style="height:35vh;">
            <table id="lab_check_request_modal_tab2_item2">
                <thead>
                    <tr>
                        <th>รายการ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div>