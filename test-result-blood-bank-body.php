<input type="text" value="" id="labcheckrequestid" name="labcheckrequestid" >
<input type="text" value="" id="labcheckrequestcode" name="labcheckrequestcode" hidden>
<input type="text" value="" id="labpatientid" name="labpatientid" hidden>
<input type="text" value="" id="hn" name="hn" hidden>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">

                        <div class="form-group col-md-4"><label>หน่วยงานรับตรวจ</label>
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="labunitid" name="labunitid">
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="labunitname" name="labunitname">
                        </div>

                        <div class="form-group col-md-3"><label>สถานะใบชันสูตร</label>
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="checkresultbloodstatusid" name="checkresultbloodstatusid">
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="checkresultbloodstatusname" name="checkresultbloodstatusname">
                        </div>

                        <div class="form-group col-md-3"><label>ประเภทงาน</label>
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="labjobtypeid" name="labjobtypeid">
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="labjobtypename" name="labjobtypename">
                        </div>

                        <div class="form-group col-md-2"><label>วันที่รับสิ่งส่งตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control date" id="labgetdatetime" name="labgetdatetime">
                        </div>


                        <div class="form-group col-md-4"><label>หน่วยงานที่ส่งตรวจ</label>
                            <select required id="labunitroomid" class="form-control" name="labunitroomid"></select>
                        </div>

                        <div class="form-group col-md-2"><label>วันที่ส่งตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control date" id="labsenddate" name="labsenddate">
                        </div>

                        <div class="form-group col-md-4"><label>ผู้ส่งตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="labusersend" name="labusersend">
                        </div>

                        <div class="form-group col-md-2"><label>วันที่เก็บสิ่งส่งตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control date" id="labkeepdatetime" name="labkeepdatetime">
                        </div>

                        <div class="form-group col-md-4"><label>แพทย์ผู้ส่งตรวจ</label>
                            <select required id="doctorid" class="form-control" name="doctorid"></select>
                        </div>

                        <div class="form-group col-md-2"><label>วันที่ขอตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control date" id="labrequestdatetime" name="labrequestdatetime">
                        </div>

                        <div class="form-group col-md-2"><label>ผู้รับสิ่งส่งตรวจ</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="labuserget" name="labuserget">
                        </div>

                        <div class="form-group col-md-4"><label>เหตุผลที่ส่งซ้ำ</label>
                            <select id="reasonsendingid" class="form-control" name="reasonsendingid"></select>
                        </div>

                        <div class="form-group col-md-4"><label>สิทธิ์การรักษา</label>
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="maintenancerightid" name="maintenancerightid">
                            <input readonly type="text" autocomplete="off" value="" class="form-control date" id="maintenancerightname" name="maintenancerightname">
                        </div>

                        <div class="form-group col-md-3"><label>Lab ID</label>
                            <input required type="text" autocomplete="off" value="" class="form-control" id="labid" name="labid">
                        </div>

                        <div class="form-group col-md-3"><label>REQ. BY</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="reqby" name="reqby">
                        </div>


                        <div class="form-group col-md-2">
                            <div class="form-group"><br />
                                <label for="inputEmail4"> </label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="labexpress1" name="labexpress" value="2">
                                        ไม่ด่วน
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="labexpress2" name="labexpress" value="1">
                                        ด่วน
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6"><label>การวินิฉัยเบื้องต้น</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="labdiagnosis" name="labdiagnosis">
                        </div>

                        <div class="form-group col-md-3"><label>เลือกจุดส่ง</label>
                            <select id="labdeliveryid" class="form-control" name="labdeliveryid"></select>
                        </div>

                        <div class="form-group col-md-3"><label>หมายเหตุ</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="labremark" name="labremark">
                        </div>

                        <div class="form-group col-md-2"><label>หมู่เลือด</label>
                            <select id="labbloodgroupid" name="labbloodgroupid" class="form-control"></select>
                        </div>

                        <div class="form-group col-md-2"><label>Rh</label>
                            <select id="labrhid" name="labrhid" class="form-control"></select>
                        </div>

                        <div class="form-group col-md-8"><label>Daignosis</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="labdaignosis" name="labdaignosis">
                        </div>

                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label for="inputEmail4">ประวัติการตั้งครรภ์</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="pregnant2" name="pregnant" value="2">
                                        ไม่เคย
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="pregnant1" name="pregnant" value="1">
                                        เคย
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2"><label>คลอดบุตรคนสุดท้ายเมื่อวันที่</label>
                            <input type="text" autocomplete="off" value="" class="form-control date" id="pregnantdate" onkeyup="getDate8('pregnantdate')" name="pregnantdate">
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <label for="inputEmail4">ประเภทผู้ป่วย</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="patienttype1" name="patienttype" value="1">
                                        ทั่วไป
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="patienttype2" name="patienttype" value="2">
                                        แรงงานต่างประเทศ
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="patienttype3" name="patienttype" value="3">
                                        ฝากครรภ์
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2"><label>วันที่ฝากครรภ์</label>
                            <input type="text" autocomplete="off" value="" class="form-control date" id="antenataldate" onkeyup="getDate8('antenataldate')" name="antenataldate">
                        </div>

                        <div class="form-group col-md-2"><label>กำหนดคลอดบุตร</label>
                            <input type="text" autocomplete="off" value="" class="form-control date" id="birthdate" onkeyup="getDate8('birthdate')" name="birthdate">
                        </div>

                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label for="inputEmail4">ประวัติการรับเลือด</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="bloodhistory2" name="bloodhistory" value="2">
                                        ไม่เคย
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="bloodhistory1" name="bloodhistory" value="1">
                                        เคย
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2"><label>วันที่รับเลือด</label>
                            <input type="text" autocomplete="off" value="" class="form-control date" id="bloodgetdate" onkeyup="getDate8('bloodgetdate')" name="bloodgetdate">
                        </div>

                        <div class="form-group col-md-2"><label>หมู่เลือดมารดา</label>
                            <select id="motherbloodgroup" name="motherbloodgroup" class="form-control"></select>
                        </div>

                        <div class="form-group col-md-2"><label>Rh มารดา</label>
                            <select id="motherrh" name="motherrh" class="form-control"></select>
                        </div>

                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="row vertical-bottom">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div>
                            <a role="button" href="#" class="btn btn-primary" onclick="labFormModalShow()" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>รายการตรวจ</a>
                        </div>
                        &nbsp;
                        <div>
                            <a role="button" href="#" class="btn btn-primary" onclick="labFormModalShow(2)" data-toggle="modal"><span class="btn-label"><i class="fa fa-check"></i></span>ชุดตรวจพิเศษ</a>
                        </div>
                        &nbsp;

                    </div>
                    <br />


                    <div class="table-s-scroll" style="height:300px">
                        <table id="request_blood_lab">
                            <thead>
                                <tr>
                                    <th class="td-table" style="width:60px">No.</th>
                                    <th class="td-table">รายการตรวจ</th>
                                    <th class="td-table">สิ่งส่งตรวจ</th>
                                    <th class="td-table" style="width:160px">ราคา</th>
                                    <th class="td-table" style="width:160px">เบิกได้</th>
                                    <th class="td-table" style="width:200px">ประเภทงาน</th>
                                    <th style="width:40px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3"><label>สถานะการชำระเงิน</label>
                        <input type="text" autocomplete="off" value="" class="form-control" id="donoridcard" name="donoridcard">
                    </div>

                    <div class="form-group col-md-3"><label>จำนวนเงินค่าตรวจ(บาท)</label>
                        <input type="text" autocomplete="off" value="0.00" class="form-control" id="labamount" name="labamount">
                    </div>
                </div>

            </div>
        </div><!-- end card-->
    </div>
</div>