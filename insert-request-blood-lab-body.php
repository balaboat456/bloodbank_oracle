<input type="text" value="" id="labcheckrequestid" name="labcheckrequestid" hidden>
<input type="text" value="" id="labcheckrequestcode" name="labcheckrequestcode" hidden>
<input type="text" value="" id="hn" name="hn" hidden>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">

                        <div class="form-group col-md-6"><label>ผู้ป่วย</label>
                            <select required id="patientid" class="form-control" name="patientid"></select>
                        </div>

                        <div class="form-group col-md-3"><label>FN</label>
                            <input required type="text" autocomplete="off" value="" class="form-control" id="fn" name="fn">
                        </div>

                        <div class="form-group col-md-3"><label>VN</label>
                            <input required type="text" autocomplete="off" value="" class="form-control" id="vn" name="vn">
                        </div>

                        <div class="form-group col-md-3"><label>หน่วยงานรับตรวจ</label>
                            <input hidden type="text" autocomplete="off" value="1" class="form-control" id="labunitid" name="labunitid">
                            <input type="text" autocomplete="off" value="Blood Bank" class="form-control" id="labunitname" name="labunitname">
                        </div>

                        <div class="form-group col-md-3"><label>หน่วยงานรับตรวจ</label>
                            <input hidden type="text" autocomplete="off" value="1" class="form-control" id="labunitid" name="labunitid">
                            <input type="text" autocomplete="off" value="Blood Bank" class="form-control" id="labunitname" name="labunitname">
                        </div>

                        <div class="form-group col-md-3"><label>สถานะใบชันสูตร</label>
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="checkresultbloodstatusid" name="checkresultbloodstatusid">
                            <input type="text" autocomplete="off" value="รอสิ่งส่งตรวจ" class="form-control" id="checkresultbloodstatusname" name="checkresultbloodstatusname">
                        </div>

                        <div class="form-group col-md-2"><label>ประเภทงาน</label>
                            <input hidden type="text" autocomplete="off" value="1" class="form-control" id="labjobtypeid" name="labjobtypeid">
                            <input type="text" autocomplete="off" value="Blood Bank" class="form-control" id="labjobtypename" name="labjobtypename">
                        </div>

                        <div class="form-group col-md-2"><label>หน่วยงานที่ส่งตรวจ</label>
                            <select required id="labunitroomid" class="form-control" name="labunitroomid"></select>
                        </div>

                        <div class="form-group col-md-2"><label>ผู้ส่งตรวจ</label>
                            <input required type="text" autocomplete="off" value="" class="form-control" id="labusersend" name="labusersend">
                        </div>

                        <div class="form-group col-md-2"><label>แพทย์ผู้ส่งตรวจ</label>
                            <select required id="doctorid" class="form-control" name="doctorid"></select>
                        </div>


                        <div class="form-group col-md-2"><label>ผู้รับสิ่งส่งตรวจ</label>
                            <input required type="text" autocomplete="off" value="" class="form-control date" id="labuserget" name="labuserget">
                        </div>

                        <div class="form-group col-md-4"><label>เหตุผลที่ส่งซ้ำ</label>
                            <select required id="reasonsendingid" class="form-control" name="reasonsendingid"></select>
                        </div>

                        <div class="form-group col-md-3"><label>สิทธิการรักษา</label>
                            <select required id="maintenancerightid" class="form-control" name="maintenancerightid"></select>
                        </div>



                        <div class="form-group col-md-3"><label>Lab ID</label>
                            <input required type="text" autocomplete="off" value="" class="form-control date" id="labid" name="labid">
                        </div>

                        <div class="form-group col-md-4"><label>REQ. BY</label>
                            <input required type="text" autocomplete="off" value="" class="form-control date" id="reqby" name="reqby">
                        </div>


                        <div class="form-group col-md-2">
                            <div class="form-group"><br />
                                <label for="inputEmail4"> </label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input checked onclick="" type="radio" id="labexpress1" name="labexpress" value="2">
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
                            <input required type="text" autocomplete="off" value="" class="form-control date" id="labdiagnosis" name="labdiagnosis">
                        </div>

                        <div class="form-group col-md-3"><label>เลือกจุดส่ง</label>
                            <select required id="labdeliveryid" class="form-control" name="labdeliveryid"></select>
                        </div>

                        <div class="form-group col-md-3"><label>หมายเหตุ</label>
                            <input type="text" autocomplete="off" value="" class="form-control date" id="labremark" name="labremark">
                        </div>

                    </div>
                </div>


            </div>
        </div><!-- end card-->
    </div>
</div>