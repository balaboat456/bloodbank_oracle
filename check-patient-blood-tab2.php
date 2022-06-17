<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">


        <div class="card-body">
            <div class="container-fluid">
                <div class="form-group row">

                    <div class="form-group col-md-12">
                        <label for="inputEmail4"><b>ข้อมูลผลตรวจเลือดผู้ป่วย</b></label>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Blood Group</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm date1" id="confirmbloodgroupshow" aria-describedby="numberlHelp" onkeyup="" value="" name="confirmbloodgroupshow">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Rh</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm date1" id="confirmrhidshow" aria-describedby="numberlHelp" onkeyup="" value="" name="confirmrhidshow">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Ab Screening</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm date1" id="confirmabsreenshow" aria-describedby="numberlHelp" onkeyup="" value="" name="confirmabsreenshow">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Antibody</label>
                        <div class="col-md-12 div-anti">
                            <label id="antibodyshow"></label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <hr />
                    </div>

                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom">
                            <div class="col-md-6 padding-top-top15">
                                รายละเอียดเลือดที่ขอให้ผู้ป่วย
                            </div>

                        </div>

                        <div class="table-s-scroll">
                            <table id="list_table_tab2_1">
                                <thead>
                                    <tr>
                                        <th style="width:60px">No.</th>
                                        <th>TYPE OF REQUEST</th>
                                        <th style="width:160px">UNIT</th>
                                        <th style="width:160px">CC</th>
                                        <th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>



                    <div class="form-group col-md-12">
                        <div class="row vertical-bottom">
                            

                            <div class="col-md-12 padding-top-top15">
                                รายละเอียดเลือดที่ขอให้ผู้ป่วย
                            </div>

                            <div class="col-md-12 padding-top-top15" style="padding-top: 5px;margin-bottom: 5px;">
                                <button type="button" onclick="printCrossMatchSticker()" class="btn btn-light m-l-5">
                                    <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ใบคล้องเลือด
                                </button>
                            </div>
                            
                            <div class="form-group col-md-2" align="right">
                                <label for="inputCity">หมายเลขถุง</label>
                                <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>

                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="bag_number" autocomplete="off" class="form-control form-control-sm" onkeyup="bagNumberFormat()" id="bag_number" placeholder="หมายเลขถุง">
                            </div>

                            <div class="form-group col-md-8">
                                <div>
                                    <a role="button" href="#" class="btn btn-sm btn-success" onclick="addRowBlood()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>Auto Control</a>&nbsp;&nbsp;&nbsp;

                                    <a role="button" href="#" class="btn btn-sm btn-primary" onclick="showPageADR('3,4')" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>Autologous&Direct</a>

                                    <a role="button" href="#" class="btn btn-sm btn-primary" onclick="showPageADR(5)" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>Direct Ag</a>

                                    <a role="button" href="#" class="btn btn-sm btn-primary" onclick="showReplacement()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>Replacement</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <a role="button" href="#" class="btn btn-sm btn-primary" onclick="showPageLogCrossMtach()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>Log Cross-Match</a>
                                </div>

                            </div>

                        </div>


                        <div id="div_list_table_tab2_2" class="table-s-scroll" style="height:400px">
                            <table id="list_table_tab2_2" style="width:1680px">
                                <thead>
                                    <tr>
                                        <th class="td-table" rowspan="2" style="width:20px"><input id="idUnChecked" type="checkbox" onclick="setUnChecked(this.checked)" checked></th>
                                        <th class="td-table" rowspan="2" style="width:40px">No.</th>
                                        <!-- <th class="td-table" rowspan="2" style="width:10px">CK</th> -->
                                        <th class="td-table" rowspan="2" style="width:140px">หมายเลขถุง</th>
                                        <th class="td-table" rowspan="2" style="width:40px">Sub</th>
                                        <th class="td-table" rowspan="2" style="width:60px">ฉายแสง</th>
                                        <th class="td-table" rowspan="2" style="width:60px">HLA<br>match</th>
                                        <th class="td-table" rowspan="2" style="width:40px">ABO<br>Gr.</th>
                                        <th class="td-table" rowspan="2" style="width:40px">Rh</th>
                                        <th class="td-table" rowspan="2" style="width:80px">Type</th>
                                        <th class="td-table" colspan="4" style="width:240px">CTT</th>
                                        <th class="td-table" rowspan="2" style="width:60px">CAT</th>
                                        <th class="td-table" rowspan="2" style="width:40px">ROU</th>
                                        <th class="td-table" rowspan="2" style="width:140px">Result</th>
                                        <th class="td-table" rowspan="2">สถานะ</th>
                                        <th class="td-table" rowspan="2">แพทย์ผู้รับผิดชอบ</th>
                                        <th class="td-table" rowspan="2">ผู้เตรียมเลือด</th>
                                        <th class="td-table" rowspan="2">วัน/เวลาที่เตรียมเลือด</th>
                                        <th class="td-table" rowspan="2">หมายเหตุ</th>
                                        <th class="td-table" rowspan="2" style="width:40px">

                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="top:25px;width:60px;">RT</th>
                                        <th style="top:25px;width:60px;">37C</th>
                                        <th style="top:25px;width:60px;">IAT</th>
                                        <th style="top:25px;width:60px;">CCC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <i style="color: #FF8000;" class="fa fa-circle"></i>&nbsp;รอยืนยันจากแพทย์
                            <i style="color: #FFFF00;" class="fa fa-circle"></i>&nbsp;รอจ่าย&nbsp;&nbsp;
                            <i style="color: #6C0;" class="fa fa-circle"></i>&nbsp;จ่าย&nbsp;&nbsp;
                            <i style="color: #C00;" class="fa fa-circle"></i>&nbsp;ปลด&nbsp;&nbsp;
                            <i style="color: #0f9df7;" class="fa fa-circle"></i>&nbsp;คืน (warn)&nbsp;&nbsp;
                            <i style="color: #d935cb;" class="fa fa-circle"></i>&nbsp;คืน (ไม่ warn)&nbsp;&nbsp;
                        </div>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">หมายเหตุ</label>
                        <input type="text" autocomplete="off" class="form-control form-control-sm date1" id="checkbloodremark2" aria-describedby="numberlHelp" onkeyup="" value="" name="checkbloodremark2">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputEmail4">ผู้บันทึกผลตรวจสอบเลือดผู้ป่วย</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm" id="crossmatchuser_show" aria-describedby="numberlHelp" onkeyup="" value="" name="crossmatchuser_show">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4">วันที่บันทึก</label>

                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm date1" id="crossmatchdate_show" aria-describedby="numberlHelp" onkeyup="" value="" name="crossmatchdate_show">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="inputPassword4">เวลา</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm" id="crossmatchtime_show" aria-describedby="numberlHelp" onkeyup="" value="" name="crossmatchtime_show">
                    </div>

                    <input hidden type="text" autocomplete="off" class="form-control" id="checkpatientuser" aria-describedby="numberlHelp" onkeyup="" value="" name="checkpatientuser">
                    <input hidden type="text" autocomplete="off" class="form-control date1" id="checkpatientdate" aria-describedby="numberlHelp" onkeyup="" value="" name="checkpatientdate">
                    <input hidden type="text" autocomplete="off" class="form-control" id="checkpatienttime" aria-describedby="numberlHelp" onkeyup="" value="" name="checkpatienttime">



                    <div class="form-group col-md-6">

                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">ผู้ยืนยันผลเลือด</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm" id="userconfirmbloodgroupqueue" aria-describedby="numberlHelp" onkeyup="" value="" name="userconfirmbloodgroupqueue">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4">วันที่ยืนยัน</label>

                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm date1" id="confirmbloodgroupqueuedate" aria-describedby="numberlHelp" onkeyup="" value="" name="confirmbloodgroupqueuedate">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputPassword4">เวลา</label>
                        <input readonly type="text" autocomplete="off" class="form-control form-control-sm" id="confirmbloodgroupqueuetime" aria-describedby="numberlHelp" onkeyup="" value="" name="confirmbloodgroupqueuetime">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>