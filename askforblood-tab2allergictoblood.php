<style>
</style>
<input id="ac_requestbloodcrossmacthid" name="ac_requestbloodcrossmacthid" hidden>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tabbody">
    <div class="card mb-12 tabbody-card">


        <div class="card-body">
            <div class="container-fluid">

                <div class="form-group col-md-12">

                    <div class="row">
                        <div class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">ชนิดเลือด</label>
                        </div>
                        <div class="form-group col-md-3" style="margin: 0px 0px 0px 0px">
                            <select id="findbloodstocktype2" class="form-control form-control-sm findbloodstocktype2" name="findbloodstocktype2">
                                <option value=""></option>
                                <?php
                                $strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
                                $objQuery = mysql_query($strSQL);
                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                ?>
                                    <option value="<?php echo $objResuut['bloodstocktypeid']; ?>">
                                        <?php echo $objResuut['bloodstocktypename2'] . "|" . $objResuut['bloodstocktypecode'] . "|" . $objResuut['bloodstocktypecodegroup']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-1" align="right" style="margin: 0px 0px 0px 0px">
                            <label style="margin: 10px 0px 0px 0px" align="right">หมายเลขถุง</label>
                        </div>
                        <div class="form-group col-md-2" style="margin: 0px 0px 0px 0px">
                            <input type="text" autocomplete="off" name="findbagnumber2" style="margin: 0px 0px 0px 0px" class="form-control" id="findbagnumber2" onkeyup="bagNumberScan(`findbagnumber2`)">
                        </div>

                    </div>
                    <hr />

                    <div class="row vertical-bottom" style="margin-top: 10px">
                        <div class="col-md-6 padding-top-top15">
                            รายละเอียดเลือดที่จ่ายให้ผู้ป่วย
                        </div>

                    </div>

                    <div class="table-s-scroll">
                        <table id="list_table_allergic_to_blood">
                            <thead>
                                <tr>
                                    <th class="td-table" style="width:60px"></th>
                                    <th class="td-table" style="width:60px">CK</th>
                                    <th class="td-table" style="width:60px">No.</th>
                                    <th class="td-table" style="width:250px">หมายเลขถุง</th>
                                    <th class="td-table" style="width:160px">ABO Group</th>
                                    <th class="td-table" style="width:200px">Rh</th>
                                    <th class="td-table">Type of Request</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab">
                    <button type="button" class="tablinks2" onclick="openTab2(event, '2_1')" id="defaultOpen2">สำหรับแพทย์/พยาบาล</button>
                    <button type="button" class="tablinks2" onclick="openTab2(event, '2_2')">ผลการทดสอบ</button>
                </div>
                <div id="2_1" class="tabcontent2">


                    <div onclick="chk_bagblood()" class="container-fluid">
                        <div class="form-group col-md-12">
                            <br>
                            <h5><b>รายละเอียดการแพ้เลือด</b></h5>
                        </div>
                        <div class="row">
                            <input type="text" id="requestbloodcrossmacthid" hidden name="requestbloodcrossmacthid">
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">วันที่ให้เลือด</label>
                                <input hidden type="text" autocomplete="off" class="form-control date1" id="payblooddate" onkeyup="" value="" name="payblooddate">
                                <input type="text" autocomplete="off" class="form-control date1" id="useblooddate" onkeyup="" value="" name="useblooddate">

                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputPassword4">เวลา</label>
                                <input hidden type="text" autocomplete="off" class="form-control" id="paybloodtime" onkeyup="" name="paybloodtime">
                                <input type="text" autocomplete="off" class="form-control" id="usebloodtime" onkeyup="" name="usebloodtime">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">วันที่หยุดให้เลือด</label>

                                <input type="text" autocomplete="off" class="form-control date1" id="stoppayblooddate_allergic" aria-describedby="numberlHelp" onkeyup="" value="" name="stoppayblooddate_allergic">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputPassword4">เวลา</label>
                                <input type="text" autocomplete="off" class="form-control" id="stoppaybloodtime_allergic" aria-describedby="numberlHelp" onkeyup="" name="stoppaybloodtime_allergic">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">ปริมาณ</label>
                                <input type="text" autocomplete="off" class="form-control" id="totalbloodrequestcc_allergic" aria-describedby="numberlHelp" onkeyup="" name="totalbloodrequestcc_allergic">
                            </div>
                            <div class="form-group col-md-2">

                            </div>
                            <div class="form-group col-md-4"><label>อาการข้างเคียง</label>
                                <!-- <input type="text" autocomplete="off" class="form-control" id="sideeffects_allergic" aria-describedby="numberlHelp" onkeyup="" name="sideeffects_allergic"> -->
                                <select autocomplete="off" class="form-control" id="sideeffects_allergic" aria-describedby="numberlHelp" onkeyup="" name="sideeffects_allergic">
                                    <option value="ไม่มีอาการ">ไม่มีอาการ</option>
                                    <option value="มีอาการ">มีอาการ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">วันที่เกิดอาการ</label>

                                <input type="text" autocomplete="off" class="form-control date1" id="sideeffectsdate_allergic" aria-describedby="numberlHelp" onkeyup="" value="" name="sideeffectsdate_allergic">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputPassword4">เวลา</label>
                                <input type="text" autocomplete="off" class="form-control" id="sideeffectstime_allergic" aria-describedby="numberlHelp" onkeyup="" name="sideeffectstime_allergic">
                            </div>
                        </div>


                        <div class="form-group col-md-12">
                            <h5><b>รายละเอียดอาการข้างเคียง</b></h5>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isincreasebodytemp_allergic" class="check" type="checkbox" name="isincreasebodytemp_allergic" value="1">increase body temp > 1 C
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="ischills_allergic" class="check" type="checkbox" name="ischills_allergic" value="1">chills
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isurticaria_allergic" class="check" type="checkbox" name="isurticaria_allergic" value="1">urticaria
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isitching_allergic" class="check" type="checkbox" name="isitching_allergic" value="1">itching
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isflushing_allergic" class="check" type="checkbox" name="isflushing_allergic" value="1">flushing
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="ismusclepain_allergic" class="check" type="checkbox" name="ismusclepain_allergic" value="1">muscle pain
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="ishypotension_allergic" class="check" type="checkbox" name="ishypotension_allergic" value="1">hypotension
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="ishypertension_allergic" class="check" type="checkbox" name="ishypertension_allergic" value="1">hypertension
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isanaphylaxis_allergic" class="check" type="checkbox" name="isanaphylaxis_allergic" value="1">anaphylaxis
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isdyspnea_allergic" class="check" type="checkbox" name="isdyspnea_allergic" value="1">dyspnea
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isdecreaseurineout_allergic" class="check" type="checkbox" name="isdecreaseurineout_allergic" value="1">Decrease urine out
                                </label>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-check-label">
                                    <input id="isdarkredurine_allergic" class="check" type="checkbox" name="isdarkredurine_allergic" value="1">dark/red urine
                                </label>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="form-check-label">
                                    <input id="isother_allergic" class="check" type="checkbox" name="isother_allergic" value="1">อาการอื่นๆ

                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" autocomplete="off" class="form-check-label form-control" id="othereffects_allergic" aria-describedby="numberlHelp" onkeyup="" name="othereffects_allergic">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <h5><b>ก่อนรับเลือด</b></h5>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Temp</label>

                                <input type="text" autocomplete="off" class="form-control" id="before_temp_allergic" aria-describedby="numberlHelp" onkeyup="" value="" name="before_temp_allergic">
                            </div>

                            <div class="form-group col-md-1">
                                <label for="inputPassword4">BP</label>
                                <input type="text" autocomplete="off" class="form-control" id="before_bpstart_allergic" aria-describedby="numberlHelp" onkeyup="" name="before_bpstart_allergic">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputEmail4">-</label>

                                <input type="text" autocomplete="off" class="form-control" id="before_bpend_allergic" aria-describedby="numberlHelp" onkeyup="" value="" name="before_bpend_allergic">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputPassword4">P (min)</label>
                                <input type="text" autocomplete="off" class="form-control" id="before_pmin_allergic" aria-describedby="numberlHelp" onkeyup="" name="before_pmin_allergic">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">R (min)</label>
                                <input type="text" autocomplete="off" class="form-control" id="before_rmin_allergic" aria-describedby="numberlHelp" onkeyup="" name="before_rmin_allergic">
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <h5><b>หลังรับเลือด</b></h5>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-2">
                                <label for="inputEmail4">Temp</label>

                                <input type="text" autocomplete="off" class="form-control" id="after_temp_allergic" aria-describedby="numberlHelp" onkeyup="" value="" name="after_temp_allergic">
                            </div>

                            <div class="form-group col-md-1">
                                <label for="inputPassword4">BP</label>
                                <input type="text" autocomplete="off" class="form-control" id="after_bpstart_allergic" aria-describedby="numberlHelp" onkeyup="" name="after_bpstart_allergic">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="inputEmail4">-</label>

                                <input type="text" autocomplete="off" class="form-control" id="after_bpend_allergic" aria-describedby="numberlHelp" onkeyup="" value="" name="after_bpend_allergic">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputPassword4">P (min)</label>
                                <input type="text" autocomplete="off" class="form-control" id="after_pmin_allergic" aria-describedby="numberlHelp" onkeyup="" name="after_pmin_allergic">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">R (min)</label>
                                <input type="text" autocomplete="off" class="form-control" id="after_rmin_allergic" aria-describedby="numberlHelp" onkeyup="" name="after_rmin_allergic">
                            </div>

                        </div>



                        <div class="form-group col-md-12">
                            <h5><b>Transfusion rection / clinical condition</b></h5>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label class="form-check-label">
                                    <input id="ishemolytictransfusionreation2_allergic" class="check" type="checkbox" name="ishemolytictransfusionreation2_allergic" value="1">hemolytic transfusion
                                    reaction
                                </label>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-check-label">
                                    <input id="isfebrilehemolytictransfusionreation2_allergic" class="check" type="checkbox" name="isfebrilehemolytictransfusionreation2_allergic" value="1">febrile non hemolytic transfusion reaction
                                </label>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-check-label">
                                    <input id="isallergicreation2_allergic" class="check" type="checkbox" name="isallergicreation2_allergic" value="1">allergic reaction
                                </label>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-check-label">
                                    <input id="isanaphylaxis2_allergic" class="check" type="checkbox" name="isanaphylaxis2_allergic" value="1">anaphylaxis
                                </label>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-check-label">
                                    <input id="isinfectionsepsisreatedtransfusion2_allergic" class="check" type="checkbox" name="isinfectionsepsisreatedtransfusion2_allergic" value="1">infection/sepsis related transfusion
                                </label>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-check-label">
                                    <input id="istransfusionreatedacutelunginjury2_allergic" class="check" type="checkbox" name="istransfusionreatedacutelunginjury2_allergic" value="1">transfusion related acute lung injury(TRALI)
                                </label>
                            </div>



                            <div class="form-group col-md-1">
                                <label class="form-check-label">
                                    <input id="isother2_allergic" class="check" type="checkbox" name="isother2_allergic" value="1">อื่นๆ

                                </label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" autocomplete="off" class="form-check-label form-control" id="othereffects2_allergic" aria-describedby="numberlHelp" onkeyup="" name="othereffects2_allergic">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-1">
                                หมายเหตุ
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" autocomplete="off" class="form-check-label form-control" id="requestbloodcrossmacthremark" aria-describedby="numberlHelp" onkeyup="" name="requestbloodcrossmacthremark">
                            </div>
                            <div class="form-group col-md-1">
                                ผู้บันทึกแพ้เลือด
                            </div>
                            <div class="form-group col-md-3">
                                <select id="bloodallergyrecorder" class="form-control bloodallergyrecorder" name="bloodallergyrecorder">
                                    <option value="<?php echo $_SESSION["id"]; ?>"><?php echo $_SESSION["fullname"]; ?></option>
                                    <?php
                                    $strSQL = "SELECT  * FROM nurse ";
                                    $objQuery = mysql_query($strSQL);
                                    while ($objResuut = mysql_fetch_array($objQuery)) {
                                    ?>
                                        <option value="<?php echo $objResuut['nurseid']; ?>">
                                            <?php echo $objResuut['nursename']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>


                    </div>


                </div>

                <div id="2_2" class="tabcontent2">
                    <label><b>รายละเอียดการตรวจเลือด</b></label>
                    <label>การตรวจสอบรายชื่อ-สกุล หมู่เลือดของผู้ป่วย
                        ตรงกับเลือด/ส่วนประกอบเลือดที่ให้[โดยตรวจใบขอจองเลือด ประวัติ
                        ทะเบียนสำเนาใบแจ้งการจ่ายใบคล้องยูนิต ฉลากชื่อผู้ป่วยบนหลอดเลือด]</label>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-check-label">
                                <input onclick="" type="radio" id="result_testblood1" name="result_testblood" value="1">
                                ถูกต้องตรงกัน
                            </label>
                            &emsp;&emsp;
                            <label class="form-check-label">
                                <input onclick="" type="radio" id="result_testblood2" name="result_testblood" value="2">
                                ไม่ถูกต้อง คือ
                            </label>
                        </div>

                        <div class="form-group col-md-4">
                            &emsp;<input type="text" autocomplete="off" value="" class="form-control" id="remark_testblood" name="remark_testblood">
                        </div>

                    </div>

                    <div class="table-s-scroll" style="height:850px">
                        <table id="list_table_test_blood">
                            <thead>
                                <tr>
                                    <th class="td-table" style="width:450px;">Lab Investigation</th>

                                    <th class="td-table" style="width:250px">Pre</th>
                                    <th class="td-table" style="width:250px">Post</th>
                                    <th class="td-table" style="width:250px">Unit</th>
                                    <th hidden class="td-table" style="width:200px">Other</th>
                                    <th class="td-table" style="width:400px">หมายเหตุ</th>
                                    <th hidden class="td-table" style="width:40px">
                                        <button type="button" onclick="addRowBloodTest()" class="btn btn-info btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Visual check of blood sample
                                        <input hidden type="text" name="bloodstocktypeid" value="12">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="visualcheckofbloodsample" class="form-control">
                                        <datalist id="visualcheckofbloodsample">
                                            <option value="Normal">Normal</option>
                                            <option value="Hemolysis">Hemolysis</option>
                                        </datalist>
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="visualcheckofbloodsample" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Free hemoglobin
                                        <input hidden type="text" name="bloodstocktypeid" value="17">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                        <datalist id="yesno">
                                            <option value="Yes">
                                            <option value="No">
                                        </datalist>
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Icteric
                                        <input hidden type="text" name="bloodstocktypeid" value="18">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Appearance of blood bag
                                        <input hidden type="text" name="bloodstocktypeid" value="4">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="appearance" class="form-control">
                                        <datalist id="appearance">
                                            <option value="Normal">Normal</option>
                                        </datalist>
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Appearance of blood set
                                        <input hidden type="text" name="bloodstocktypeid" value="5">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" readonly class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" readonly class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="appearance" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;ABO
                                        <input hidden type="text" name="bloodstocktypeid" value="1">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_datalist" class="form-control">
                                        <datalist id="blood_group_datalist">
                                            <?php
                                            $strSQL = "SELECT * FROM blood_group WHERE cordblood != 1 ORDER BY bloodgroupsort ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option value="<?php echo $objResuut['bloodgroupname']; ?>">
                                                <?php
                                            }
                                                ?>
                                        </datalist>
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_datalist" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_datalist" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Rh (D) Typing
                                        <input hidden type="text" name="bloodstocktypeid" value="10">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="rh_datalist" class="form-control">
                                        <datalist id="rh_datalist">
                                            <?php
                                            $strSQL = "SELECT * FROM rh_d WHERE rhdid NOT LIKE 'NT' ORDER BY sort ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option value="<?php echo $objResuut['rhdname']; ?>">
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="rh_datalist" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="rh_datalist" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Crossmatch (Major)
                                        <input hidden type="text" name="bloodstocktypeid" value="7">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="crossmatch" class="form-control">
                                        <datalist id="crossmatch">
                                            <option value="Compatible">
                                            <option value="Incompatible">
                                            <option value="Most compatible">
                                        </datalist>
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="crossmatch" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Crossmatch (Minor)
                                        <input hidden type="text" name="bloodstocktypeid" value="21">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="crossmatch" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="crossmatch" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Antibody screening
                                        <input hidden type="text" name="bloodstocktypeid" value="3">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_serum_crossmacth" class="form-control">
                                        <datalist id="blood_group_serum_crossmacth">
                                            <?php
                                            $strSQL = "SELECT * FROM blood_group_serum_crossmacth WHERE cordblood != 1 ORDER BY sort ASC";
                                            $objQuery = mysql_query($strSQL);
                                            while ($objResuut = mysql_fetch_array($objQuery)) {
                                            ?>
                                                <option value="<?php echo $objResuut['bloodgroupserumname']; ?>">
                                                    <?php echo $objResuut['bloodgroupserumname']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_serum_crossmacth" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_serum_crossmacth" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Antibody Identification
                                        <input hidden type="text" name="bloodstocktypeid" value="2">
                                    </td>
                                    <td class="td-table" style="text-align: left;">
                                        <input type="text" value="" class="form-control">
                                        <!-- <td class="td-table" onclick="antibodyModal1()"> -->
                                        <!-- <p id="anti1_val_label"></p> -->
                                        <!-- <input hidden type="text" value="" id="anti1_val" class="form-control"> -->
                                    </td>
                                    <td class="td-table" style="text-align: left;">
                                        <input type="text" value="" class="form-control">
                                        <!-- <td class="td-table" onclick="antibodyModal2()"> -->
                                        <!-- <p id="anti2_val_label"></p> -->
                                        <!-- <input hidden type="text" value="" id="anti2_val" class="form-control"> -->
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;DAT
                                        <input hidden type="text" name="bloodstocktypeid" value="8">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_serum_crossmacth" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_serum_crossmacth" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="blood_group_serum_crossmacth" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;MF Agglutination
                                        <input hidden type="text" name="bloodstocktypeid" value="16">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Urine free hemoglobin
                                        <input hidden type="text" name="bloodstocktypeid" value="19">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Serum Birilubin
                                        <input hidden type="text" name="bloodstocktypeid" value="11">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="search" list="yesno" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" readonly value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Gram stain
                                        <input hidden type="text" name="bloodstocktypeid" value="15">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Bacterial culture
                                        <input hidden type="text" name="bloodstocktypeid" value="14">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-table" style="text-align: left;">
                                        &nbsp;&nbsp;&nbsp;Other Testing
                                        <input hidden type="text" name="bloodstocktypeid" value="14">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td class="td-table">
                                        <input type="text" value="" class="form-control">
                                    </td>
                                    <td hidden>
                                        <button hidden type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-4">
                            Conclusion of investigation results
                            <input type="text" autocomplete="off" value="" class="form-control" id="conclusionofinvestigationresults" name="conclusionofinvestigationresults">
                        </div>
                        <div class="form-group col-md-4">
                            Interpretation
                            <input type="text" autocomplete="off" value="" class="form-control" id="interpretation" name="interpretation">
                        </div>

                        <div class="form-group col-md-3">
                            ผู้บันทึก
                            <select id="user_testblood" class="form-control user_testblood" name="user_testblood">
                                <option value="<?php echo $_SESSION["fullname"]; ?>"><?php echo $_SESSION["fullname"]; ?></option>
                                <?php
                                $strSQL = "SELECT  * FROM staff ";
                                $objQuery = mysql_query($strSQL);
                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                ?>
                                    <option value="<?php echo $objResuut['name']; ?>">
                                        <?php echo $objResuut['name']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>
            </div><!-- end card-->
        </div>
    </div>
</div>
<?php include('askforblood-tab2allergictoblood_modal_antibody.php'); ?>
<?php include('askforblood-tab2allergictoblood_modal_antibody2.php'); ?>
<script>
    // function dagon_test(){
    //     var dagon = document.getElementById("ddagon").value;
    //     alert(dagon);
    // }

    function chk_bagblood() {
        var ac_requestbloodcrossmacthid = $("#ac_requestbloodcrossmacthid").val();

        if (ac_requestbloodcrossmacthid == '') {
            swal({
                title: 'กรุณาเลือกถุงเลือดก่อน',
                // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
                type: 'warning',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            })
        }

    }
</script>