<input type="text" value="" id="requestbloodid" name="requestbloodid" hidden>
<input type="text" value="" id="requestbloodstatusid" name="requestbloodstatusid" hidden>
<input type="text" value="" id="requestbloodcode" name="requestbloodcode" hidden>
<input type="text" value="" id="hn" name="hn" hidden>
<input type="text" value="" id="an" name="an" hidden>
<input type="text" value="" id="fn" name="fn" hidden>
<input type="text" value="" id="vn" name="vn" hidden>
<input type="text" value="" id="prvno" name="prvno" hidden>
<input type="text" value="" id="insuranceid" name="insuranceid" hidden>
<input type="text" value="" id="insurancetext" name="insurancetext" hidden>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="row">
                        <div id="tab1cencel" style="display:none;" align="center" class="form-group col-md-12">
                            <h1>
                                <font color="red"><label id="cancelnametext">ยกเลิกข้อมูลแล้ว</label></font>
                            </h1>
                            <font color="red"><label id="labcheckrequestcancelname">สาเหตุ : </label></font>
                        </div>
                        <div class="form-group col-md-6">
                            <i class="fa fa-star" style="color:red"></i><label>&nbsp;หน่วยงานที่แจ้งขอเลือด</label>
                            <select required id="requestunit" class="form-control" name="requestunit"></select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>&nbsp;หน่วยงานที่ใช้เลือด</label>
                            <select id="usedunit" class="form-control" name="usedunit"></select>
                        </div>

                        <div class="form-group col-md-4">
                            <i class="fa fa-star" style="color:red"></i><label>&nbsp;ประเภทการแจ้งขอเลือด</label>
                            <select required id="bloodnotificationtypeid" class="form-control" name="bloodnotificationtypeid"></select>
                        </div>
                        <div id="divOpenBloodBlank" class="form-group col-md-2" style="visibility:hidden;">
                            <br />
                            <a role="button" href="#" onclick="openBloodBlank()" style="margin-top:8px" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>....</a>

                        </div>


                        <div class="form-group col-md-2">
                            <i class="fa fa-star" style="color:red"></i><label>&nbsp;วันที่ต้องการใช้เลือด</label>
                            <input required type="text" autocomplete="off" value="" class="form-control date" id="usedblooddatefrom" onchange="getUsedblooddateFromToDate8('usedblooddatefrom')" name="usedblooddatefrom">
                        </div>

                        <div class="form-group col-md-2"><label>-</label>
                            <input required type="text" autocomplete="off" value="" class="form-control date" id="usedblooddateto" onchange="getUsedblooddateFromToDate8('usedblooddateto')" name="usedblooddateto">
                        </div>

                        <div class="form-group col-md-2">
                            <label><i style="color:red;visibility:hidden;" id="durgicaldateLableStar" class="fa fa-star"></i><label>&nbsp;กำหนดวันผ่าตัด</label>
                                <input required type="text" autocomplete="off" value="" class="form-control date" id="durgicaldate" onchange="getDurgicaldateDate8('durgicaldate')" name="durgicaldate">
                        </div>

                        <div class="form-group col-md-3">
                            <i class="fa fa-star" style="color:red"></i><label>&nbsp;พยาบาลผู้รับคำสั่ง</label>
                            <select required id="nurseid" class="form-control" name="nurseid"></select>
                        </div>

                        <div class="form-group col-md-3">
                            <i class="fa fa-star" style="color:red"></i><label>&nbsp;แพทย์ผู้สั่ง</label>
                            <select required id="doctorid" class="form-control" name="doctorid"></select>
                            <input hidden value="" id="doctorcode2" name="doctorcode2">
                        </div>

                        <div class="form-group col-md-3">
                            <i class="fa fa-star" style="color:red;visibility:hidden;" id="bloodDrillerLableStar"></i><label>&nbsp;ผู้เจาะเลือด</label>
                            <select required id="blood_driller_id" class="form-control" name="blood_driller_id"></select>
                        </div>

                        <div class="form-group col-md-3">
                            <i class="fa fa-star" style="color:red;visibility:hidden;" id="bloodCertifierLableStar"></i><label>&nbsp;ผู้ตรวจสอบ</label>
                            <select id="blood_certifier_id" class="form-control" name="blood_certifier_id"></select>
                        </div>

                        <div class="form-group col-md-2"><label>กลุ่มโรค</label>
                            <select id="diseasegroupid" class="form-control" name="diseasegroupid"></select>
                        </div>

                        <div class="form-group col-md-1">
                            <i class="fa fa-star" style="color:red"></i><label>&nbsp;Diagnosis</label>
                            <select id="diagnosisid" class="form-control" name="diagnosisid"></select>
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="diagnosis" name="diagnosis">
                        </div>

                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="diagnosisdetail" name="diagnosisdetail">
                        </div>


                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <i class="fa fa-star" style="color:red"></i><label>&nbsp;Blood Sample/Tube</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input required onclick="setBloodDrillerIdStar(true);setBloodCertifierLableStar(true);" type="radio" id="bloodsampletube1" name="bloodsampletube" value="1">
                                        มี Tube
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="setBloodDrillerIdStar(false);setBloodCertifierLableStar(false);" type="radio" id="bloodsampletube2" name="bloodsampletube" value="2">
                                        ไม่มี Tube (FFP,Platelet,Cryo.)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-1"><label>&nbsp;ABO</label>
                            <!-- <select  id="bloodgroupid" class="form-control" name="bloodgroupid"></select> -->
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="bloodgroupid" name="bloodgroupid">
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="bloodgroupname" name="bloodgroupname">
                        </div>

                        <div class="form-group col-md-2"><label>&nbsp;Rh(D)</label>
                            <!-- <select  id="rhid" class="form-control" name="rhid"></select> -->
                            <input hidden type="text" autocomplete="off" value="" class="form-control" id="rhid" name="rhid">
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="rhname" name="rhname">
                        </div>

                        <div class="form-group col-md-1">
                            <div class="form-group">
                                <label for="inputEmail4">เพื่อบุตร</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="checkbox" id="forchildren" name="forchildren" value="1">
                                        ใช่
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label for="inputEmail4">ประวัติการตั้งครรภ์</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="unchk_pregnant1(1)" type="radio" id="pregnant1" name="pregnant" value="1">
                                        ไม่เคย
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="unchk_pregnant2(2)" type="radio" id="pregnant2" name="pregnant" value="2">
                                        เคย
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2"><label>blood group ของบุตรในครรภ์</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="bloodgrouppregnant" name="bloodgrouppregnant">
                        </div>

                        <div class="form-group col-md-2"><label>คลอดบุตรคนสุดท้ายเมื่อวันที่</label>
                            <input type="text" autocomplete="off" value="" class="form-control date" id="pregnantdate" onkeyup="getDate8('pregnantdate')" name="pregnantdate">
                        </div>

                        <div class="form-group col-md-1"><label>จำนวนบุตร</label>
                            <input type="text" autocomplete="off" value="" class="form-control" id="pregnantqty" name="pregnantqty">
                        </div>

                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label for="inputEmail4">ประวัติการจองเลือดในอดีต</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="bloodtransfusion1" name="bloodtransfusion" value="1">
                                        ไม่เคย
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="radio" id="bloodtransfusion2" name="bloodtransfusion" value="2">
                                        เคย
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2"><label>จองเลือดครั้งล่าสุด</label>
                            <input readonly type="text" autocomplete="off" value="" class="form-control" id="bloodtransfusionlast" name="bloodtransfusionlast">
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="inputEmail4">คำสั่งพิเศษ</label>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input onclick="" type="checkbox" id="plasmaexchange" name="plasmaexchange" value="1">
                                        Plasma Exchange
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="checkbox" id="screenforplateletantibody" name="screenforplateletantibody" value="1">
                                        Screen for platelet antibody
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="checkbox" id="hlacrossmatchsingledonorplatelet" name="hlacrossmatchsingledonorplatelet" value="1">
                                        HLA Crossmatch Single donor platelet
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="requestBloodWashModalOpen(this)" type="checkbox" id="washedredbloodcell" name="washedredbloodcell" value="1">
                                        Washed Red Blood Cell
                                    </label>
                                    &emsp;&emsp;
                                    <label class="form-check-label">
                                        <input onclick="" type="checkbox" id="light" name="light" value="1">
                                        ฉายแสง
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

                <div class="form-group col-md-12">
                    <div class="form-group text-right m-b-0">
                        <button hidden onclick="toStock()" class="btn btn-success" type="button">
                            <span class="btn-label"><i class="fa fa-list-alt"></i></span>คลังเลือด
                        </button>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="row vertical-bottom">
                        <div class="col-md-6 padding-top-top15">
                            TYPE OF REQUEST
                        </div>

                    </div>

                    <div id="div_list_table_tab1" class="table-s-scroll">
                        <table id="list_table_tab1">
                            <thead>
                                <tr>
                                    <th class="td-table" style="width:60px">No.</th>
                                    <th class="td-table" style="z-index: 1000000;">TYPE OF REQUEST</th>
                                    <th class="td-table" style="width:160px">UNIT</th>
                                    <th class="td-table" style="width:160px">CC</th>
                                    <th class="td-table" style="width:200px">กำหนดวันที่ใช้เกล็ดเลือด</th>
                                    <th class="td-table" style="width:40px">
                                        <button id="btnAddRowReqTab1" type="button" onclick="addRowReqClick()" class="btn btn-info btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-12">
                        <i style="color: #F39;" class="fa fa-circle"></i>&nbsp;Red Cell
                        <i style="color: #FFFF00;" class="fa fa-circle"></i>&nbsp;Platelet&nbsp;&nbsp;
                        <i style="color: #6C0;" class="fa fa-circle"></i>&nbsp;Plasma&nbsp;&nbsp;
                        <i style="color: #00FFFF;" class="fa fa-circle"></i>&nbsp;CRYO&nbsp;&nbsp;
                        <i style="color: #8B0000;" class="fa ">หมายเหตุ :
                            หากต้องการแจ้งรายละเอียดอื่นๆเกี่ยวกับการขอเลือดกรุณาระบุในช่อง หมายเหตุ</i>

                    </div>
                </div>

                <div class="form-group col-md-12">
                    <b>ผลจากธนาคารเลือด</b>
                </div>
                <div class="row">
                    <div class="form-group col-md-3"><label>ABO Group</label>
                        <input readonly type="text" autocomplete="off" class="form-control" id="requestbloodgroupname" name="requestbloodgroupname">
                    </div>

                    <div class="form-group col-md-3"><label>Rh(D)</label>
                        <input readonly type="text" autocomplete="off" class="form-control" id="requestrhname" name="requestrhname">
                    </div>

                    <div class="form-group col-md-3">

                    </div>
                    <div class="form-group col-md-3"><label>DAT</label>
                        <input readonly type="text" autocomplete="off" class="form-control" id="requestdat" name="requestdat">
                    </div>
                    <div class="form-group col-md-3"><label>Antibody Screening</label>
                        <input readonly type="text" autocomplete="off" class="form-control" id="requestantibodyscreening" name="requestantibodyscreening">
                    </div>
                    <div class="form-group col-md-9"><label>Antibody</label>
                        <div class="col-md-12 div-anti">
                            <label id="requestantibody"></label>
                            <input hidden type="text" id="group_antibody" name="group_antibody">
                            <input hidden type="text" id="group_phenotypedisplay" name="group_phenotypedisplay">
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end card-->
    </div>
</div>

<script>
    var check7_1 = 0;
    var check7_2 = 0;

    function unchk_pregnant1() {
        if (check7_1 % 2 == 0) {
            document.getElementById("pregnant1").checked = true;
            check7_1++;
        } else {
            document.getElementById("pregnant1").checked = false;
            check7_1--;
        }
    }

    function unchk_pregnant2() {
        if (check7_2 % 2 == 0) {
            document.getElementById("pregnant2").checked = true;
            check7_2++;
        } else {
            document.getElementById("pregnant2").checked = false;
            check7_2--;
        }
    }
</script>