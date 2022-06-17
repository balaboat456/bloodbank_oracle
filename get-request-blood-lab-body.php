<input type="hidden" id="remarkcancelitem" name="remarkcancelitem" value="">
<input type="hidden" id="labcheckrequestid" name="labcheckrequestid" value="">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">


                        <div class="form-group col-md-2"><label>วันที่ส่งตรวจ</label>
                            <input type="text" autocomplete="off" value="<?php echo dateNowDMYDiff3(); ?>" class="form-control date1"
                                id="fromdate"  name="fromdate">
                        </div>

                        <div class="form-group col-md-2"><label>-</label>
                            <input type="text" autocomplete="off" value="<?php echo dateNowDMY(); ?>" class="form-control date1"
                                id="todate"  name="todate" >
                        </div>
                        
                        <div class="form-group col-md-3"><label>HN</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="hn" name="hn" onkeyup="setNewHN(this)">
                        </div>

                        <div class="form-group col-md-3"><label>AN</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="an" name="an">
                        </div>

                        <div class="form-group col-md-2"><label>Refno</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="refno"
                                name="refno">
                        </div>

                        <!-- <div class="form-group col-md-2"><label>หน่วยงานที่ส่งตรวจ</label>
                            <select id="requestunit" class="form-control" name="requestunit"></select>
                        </div> -->

                        <div class="form-group col-md-2"><label>สถานะสิ่งส่งตรวจ</label>
                            <select id="searchcheckresultbloodstatusid" class="form-control" name="searchcheckresultbloodstatusid">
                                <option selected value="1">รอรับสิ่งส่งตรวจ</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <br />
                            <a style="margin-top: 7px;" onclick="loadTable()" role="button" href="#"
                                class="btn btn-info"><span class="btn-label"><i
                                        class="fa fa-search"></i></span>ค้นหาข้อมูล</a>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">

                        <div class="table-s-scroll" style="height:600px;">
                            <table id="get_request_blood_lab_table" style="width:1200px;">
                                <thead>
                                    <tr>
                                        <th class="td-table" style="width:60px">No.</th>
                                        <th class="td-table">HN</th>
                                        <th class="td-table">AN</th>
                                        <th class="td-table" style="width:160px">วันที่-เวลา</th>
                                        <th class="td-table" style="width:160px">ชื่อ-สกุล</th>
                                        <th class="td-table" style="width:160px">หน่วยงาน</th>
                                        <th class="td-table" style="width:160px">สถานะสิ่งส่งตรวจ</th>
                                        <th class="td-table" >หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>


                    </div>

                    <div class="form-group col-md-6">

                        <div class="col-md-6 padding-top-top15">
                            สิ่งส่งตรวจ
                        </div>
                            
                        <div class="table-s-scroll" style="height:276px">
                        
                            <table id="get_request_blood_lab_right_table1">
                                <thead>
                                    <tr>
                                        <th class="td-table" style="width:60px">R</th>
                                        <th class="td-table" style="width:60px">N</th>
                                        <th class="td-table">LN</th>
                                        <th class="td-table">สิ่งส่งตรวจ</th>
                                        <th class="td-table">Validation Group</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 padding-top-top15">
                            รายการตรวจ
                        </div>

                        <div class="table-s-scroll" style="height:280px">
                            <table id="get_request_blood_lab_right_table2">
                                <thead>
                                    <tr>
                                        <th class="td-table">รหัส</th>
                                        <th class="td-table">รายการตรวจ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

                <div class="form-group col-md-12">
                    <i style="color: #FFFF00;"
                        class="fa fa-circle"></i>&nbsp;รอรับสิ่งส่งตรวจ&nbsp;&nbsp;
                    <i style="color: #6C0;"
                        class="fa fa-circle"></i>&nbsp;รับสิ่งส่งตรวจแล้ว&nbsp;&nbsp;
                    <i style="color: #C00;" class="fa fa-circle"></i>&nbsp;ปฏิเสธสิ่งส่งตรวจ&nbsp;&nbsp;
                </div>

            </div>
        </div><!-- end card-->
    </div>
</div>