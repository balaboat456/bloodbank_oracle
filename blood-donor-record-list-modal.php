<!-- Modal -->
<div class="modal fade custom-modal" id="bloodListModal" role="dialog" aria-labelledby="bloodListModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">พิมพ์แบบฟอร์มส่งตรวจ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="form-group col-md-9">

                        <div id="div_display0" class="form-row">
                            <div class="form-group col-md-3">
                                &nbsp;&nbsp;
                                <label class="form-check-label">
                                    <input class="check2" type="radio" id="formtype1" name="formtype" checked onclick="setFormType(1)">&nbsp;ส่งตรวจปกติ
                                </label>
                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                <label class="form-check-label">
                                    <input class="check2" type="radio" id="formtype2" name="formtype" onclick="setFormType(2)">&nbsp;ส่งตรวจซ้ำ
                                </label>
                                &nbsp;&nbsp;|&nbsp;วันที่ส่งตรวจ
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="datecheck" class="form-control date1" id="datecheck" value="<?php echo dateNowDMY(); ?>" onkeyup="">
                            </div>
                            <div class="form-group col-md-9">
                            </div>

                        </div>
                        <hr />
                        <div id="div_display1" class="form-row">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity"><input class="check2" type="checkbox" id="issend1" checked>&nbsp;1. จากหมายเลขถุง</label>
                                <input type="text" name="bagnumberfrom1" class="form-control form-control-sm" id="bagnumberfrom1" onkeyup="bagNumber('bagnumberfrom1');setTableNumber();">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">ถึงหมายเลขถุง</label>
                                <input type="text" name="bagnumberto1" class="form-control form-control-sm" id="bagnumberto1" onkeyup="bagNumber('bagnumberto1');setTableNumber();">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputCity">จำนวนสาย</label>
                                <input type="number" name="rubberbandnumber1" class="form-control form-control-sm" id="rubberbandnumber1">
                                <input hidden type="text" name="rubberoldbandnumber1" class="form-control form-control-sm" id="rubberoldbandnumber1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเหตุ</label>
                                <input type="text" name="remarkbandnumber1" class="form-control form-control-sm" id="remarkbandnumber1">
                            </div>
                            <div class="form-group col-md-4">
                            </div>

                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-6" style="margin-top: -10px;">
                                <label style="font-size: 12px; color: #e60000;"><b><u>หมายเหตุ</u> : กรณีมีหมายเลขถุงในระบบ (บริจาคใน รพ.)</b></label>
                            </div>
                        </div>
                        <div id="div_display2" class="form-row">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity"><input class="check2" type="checkbox" id="issend2" checked>&nbsp;2. จากหมายเลขถุง</label>

                                <input type="text" name="bagnumberfrom2" class="form-control form-control-sm" id="bagnumberfrom2" onkeyup="bagNumber('bagnumberfrom2')">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">ถึงหมายเลขถุง</label>

                                <input type="text" name="bagnumberto2" class="form-control form-control-sm" id="bagnumberto2" onkeyup="bagNumber('bagnumberto2')">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputCity">จำนวนสาย</label>
                                <input type="number" name="rubberbandnumber2" class="form-control form-control-sm" id="rubberbandnumber2">
                                <input hidden type="text" name="rubberoldbandnumber2" class="form-control form-control-sm" id="rubberoldbandnumber2">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเหตุ</label>
                                <input type="text" name="remarkbandnumber2" class="form-control form-control-sm" id="remarkbandnumber2">
                            </div>
                            <div class="form-group col-md-4">
                            </div>

                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-6" style="margin-top: -10px;">
                                <label style="font-size: 12px; color: #e60000;"><b><u>หมายเหตุ :</u> กรณีมีหมายเลขถุงในระบบ (ออกหน่วย)</b></label>
                            </div>
                        </div>
                        <div id="div_display3" class="form-row">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity"><input class="check2" type="checkbox" id="issend3">&nbsp;3. จากหมายเลขถุง</label>

                                <input type="text" name="bagnumberfrom3" class="form-control form-control-sm" id="bagnumberfrom3" onkeyup="bagNumber('bagnumberfrom3');calRubberbandnumberQtyAll();">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">ถึงหมายเลขถุง </label>

                                <input type="text" name="bagnumberto3" class="form-control form-control-sm" id="bagnumberto3" onkeyup="bagNumber('bagnumberto3');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเลขข้าม (1) </label>
                                <input type="text" name="bagnumber_skip3_1" class="form-control form-control-sm" id="bagnumber_skip3_1" onkeyup="bagNumber('bagnumber_skip3_1');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเลขข้าม (2) </label>
                                <input type="text" name="bagnumber_skip3_2" class="form-control form-control-sm" id="bagnumber_skip3_2" onkeyup="bagNumber('bagnumber_skip3_2');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-1">
                                <label for="inputCity">จำนวนสาย</label>
                                <input type="number" name="rubberbandnumber3" class="form-control form-control-sm" id="rubberbandnumber3">
                                <input hidden type="text" name="rubberoldbandnumber3" class="form-control form-control-sm" id="rubberoldbandnumber3">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเหตุ</label>
                                <input type="text" name="remarkbandnumber3" class="form-control form-control-sm" id="remarkbandnumber3">
                            </div>

                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-6" style="margin-top: -10px;">
                                <label style="font-size: 12px; color: #e60000;"><b><u> หมายเหตุ :</u> กรณีไม่มีหมายเลขถุงในระบบ และค้างส่ง</b></label>
                            </div>
                        </div>
                        <div id="div_display6" class="form-row">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity"><input class="check2" type="checkbox" id="issend6">&nbsp;4. จากหมายเลขถุง</label>

                                <input type="text" name="bagnumberfrom6" class="form-control form-control-sm" id="bagnumberfrom6" onkeyup="bagNumber('bagnumberfrom6');calRubberbandnumberQtyAll();">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">ถึงหมายเลขถุง </label>

                                <input type="text" name="bagnumberto6" class="form-control form-control-sm" id="bagnumberto6" onkeyup="bagNumber('bagnumberto6');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเลขข้าม (1) </label>
                                <input type="text" name="bagnumber_skip6_1" class="form-control form-control-sm" id="bagnumber_skip6_1" onkeyup="bagNumber('bagnumber_skip6_1');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเลขข้าม (2) </label>
                                <input type="text" name="bagnumber_skip6_2" class="form-control form-control-sm" id="bagnumber_skip6_2" onkeyup="bagNumber('bagnumber_skip6_2');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-1">
                                <label for="inputCity">จำนวนสาย</label>
                                <input type="number" name="rubberbandnumber6" class="form-control form-control-sm" id="rubberbandnumber6">
                                <input hidden type="text" name="rubberoldbandnumber6" class="form-control form-control-sm" id="rubberoldbandnumber6">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเหตุ</label>
                                <input type="text" name="remarkbandnumber6" class="form-control form-control-sm" id="remarkbandnumber6">
                            </div>

                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-6" style="margin-top: -10px;">
                                <label style="font-size: 12px; color: #e60000;"><b><u>หมายเหตุ :</u> กรณีไม่มีหมายเลขถุงในระบบ และค้างส่ง</b></label>
                            </div>
                        </div>
                        <div id="div_display7" class="form-row">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity"><input class="check2" type="checkbox" id="issend7">&nbsp;5. จากหมายเลขถุง</label>

                                <input type="text" name="bagnumberfrom7" class="form-control form-control-sm" id="bagnumberfrom7" onkeyup="bagNumber('bagnumberfrom7');calRubberbandnumberQtyAll();">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputCity">ถึงหมายเลขถุง </label>

                                <input type="text" name="bagnumberto7" class="form-control form-control-sm" id="bagnumberto7" onkeyup="bagNumber('bagnumberto7');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเลขข้าม (1) </label>
                                <input type="text" name="bagnumber_skip7_1" class="form-control form-control-sm" id="bagnumber_skip7_1" onkeyup="bagNumber('bagnumber_skip7_1');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเลขข้าม (2) </label>
                                <input type="text" name="bagnumber_skip7_2" class="form-control form-control-sm" id="bagnumber_skip7_2" onkeyup="bagNumber('bagnumber_skip7_2');calRubberbandnumberQtyAll();">
                            </div>

                            <div class="form-group col-md-1">
                                <label for="inputCity">จำนวนสาย</label>
                                <input type="number" name="rubberbandnumber7" class="form-control form-control-sm" id="rubberbandnumber7">
                                <input hidden type="text" name="rubberoldbandnumber7" class="form-control form-control-sm" id="rubberoldbandnumber7">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">หมายเหตุ</label>
                                <input type="text" name="remarkbandnumber7" class="form-control form-control-sm" id="remarkbandnumber7">
                            </div>

                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-6" style="margin-top: -10px;">
                                <label style="font-size: 12px; color: #e60000;"><b><u>หมายเหตุ :</u> กรณีไม่มีหมายเลขถุงในระบบ และค้างส่ง</b></label>
                            </div>
                        </div>
                        <div id="div_display4" class="form-row" style="margin-bottom: -30px;">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity"><input class="check2" type="checkbox" id="issend4">&nbsp;6. หมายเลขถุง</label>

                                <input type="text" name="bagnumberfrom4" class="form-control form-control-sm" id="bagnumberfrom4" onkeyup="bagNumber('bagnumberfrom4')">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">หมายเหตุ</label>
                                <select id="donateformremarktypeid4" name="donateformremarktypeid4" class="form-control form-control-sm donateformremarktypeid4"></select>
                            </div>
                        </div>

                        <div id="div_display5" class="form-row" style="visibility:hidden;position: absolute;top: 105px;">
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">หมายเลข Tube</label>

                                <input type="text" name="bagnumberfrom5" class="form-control form-control-sm" id="bagnumberfrom5" onkeyup="bagNumber('bagnumberfrom5')">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">หมายเหตุ</label>
                                <select id="donateformremarktypeid5" name="donateformremarktypeid5" class="form-control form-control-sm donateformremarktypeid5"></select>
                            </div>
                            <div class="form-group col-md-5">
                            </div>

                            <div class="form-group col-md-1">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCity">ค้นหาผู้บริจาค</label>

                                <select id="search" name="search" class="form-control form-control-sm search"></select>
                            </div>

                            <div class="form-group col-md-5">
                            </div>

                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">ชื่อ-สกุล</label>
                                <input readonly type="text" name="donorname5" class="form-control form-control-sm" id="donorname5">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputCity">เลขที่บัตรประชาชน</label>
                                <input readonly type="text" name="donoridcard5" class="form-control form-control-sm" id="donoridcard5">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">Passport</label>
                                <input readonly type="text" name="donorpassport5" class="form-control form-control-sm" id="donorpassport5">
                            </div>
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCity">เลขที่ผู้บริจาค</label>
                                <input readonly type="text" name="donorcode5" class="form-control form-control-sm" id="donorcode5">
                            </div>
                        </div>
                        <hr />
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="inputCity"><b>ขอส่งตัวอย่างเพื่อตรวจ</b></label>
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input checked class="check2" type="checkbox" id="isttis1" name="isttis1">&nbsp;Blood Grouping
                                and TTls
                                Testing
                                (ABO grouping , Rh Typing ,Antibody Screening and Syphilis , HIV Ag / Ab , Anti-HCV , HBsAg)
                            </label>
                            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input checked class="check2" type="checkbox" id="isttis2" name="isttis2">&nbsp;
                                Blood Grouping, TTIs Testing and NAT (HIV/HCV/HBV)
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input class="check2" type="checkbox" id="isonly" name="isonly">&nbsp;
                                NAT Only
                            </label>
                            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input class="check2" type="checkbox" id="isothers" name="isothers">&nbsp;
                                Others
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input style="width:300px;" type="text" name="textothers" class="form-control form-control-sm" id="textothers">
                            </label>
                        </div>
                        <hr />
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="inputCity"><b>ชนิดของหลอดเลือดตัวอย่างที่ส่งตรวจ</b></label>
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input checked class="check2" type="checkbox" id="isclottedblood" name="isclottedblood">&nbsp;Clotted
                                Blood
                            </label>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input checked class="check2" type="checkbox" id="iscpdaacdblood" name="iscpdaacdblood">&nbsp;CPDA / ACD
                                Blood
                            </label>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input checked class="check2" type="checkbox" id="isedtablood" name="isedtablood">&nbsp;EDTA
                                Blood
                            </label>
                        </div>
                        <hr />
                        <div style="margin-bottom: -20px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input class="check2" type="radio" id="isexpress1" name="isexpress">&nbsp;ขอผลด่วน
                                Standard
                                Turn-
                                Around time (1 Business days)
                            </label>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <label class="form-check-label">
                                <input class="check2" type="radio" id="isexpress2" name="isexpress">&nbsp;ขอผลด่วนที่สุด
                                Rush
                                (24 Hours)
                            </label>
                        </div>


                    </div>


                    <div class="form-group col-md-3" id="div_table_skip">
                        <div class="table-no-scroll" style="height:30vh;">
                            <table id="list_table_blood_number" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="40px"><input class="big-checkbox-20" type="checkbox" onclick="setUnChecked(this.checked);calRubberbandnumberQtyAll();" checked></th>
                                        <th>หมายเลขข้าม</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>








            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">
                        <button onclick="reportPrint()" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์
                        </button>
                        <button onclick="closeBloodList()" class="btn btn-warning" type="button">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>