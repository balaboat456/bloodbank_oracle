<input type="hidden" id="hpcount" name="hpcount" value="0">
<input type="hidden" id="hparr" name="hparr" value="">
<div style="display:none;" id="sdp" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i><label id="titleSDP">รายละเอียด SDP</label></h3>

        </div>

        <div class="card-body">

            <div class="row">
                <div class="form-group col-md-2">
                    <div class="form-group">
                        <label for="inputEmail4">First Time</label>
                        <div class="form-group">
                            <label class="form-check-label">
                                <input onclick="setShow()" <?php if ($row['sdpfirsttime'] == 1 || $row['sdpprehb_before_0'] != '') {
                                                                echo 'checked';
                                                            }  ?> type="radio" id="sdpfirsttime1" name="sdpfirsttime" value="1">
                                Yes
                            </label>
                            &emsp;
                            <label class="form-check-label">
                                <input onclick="offShow()" <?php if ($row['sdpfirsttime'] == 2) {
                                                                echo 'checked';
                                                            }  ?> type="radio" id="sdpfirsttime2" name="sdpfirsttime" value="2">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label>Machine</label>
                    <select id="machineid" class="form-control machineid" name="machineid"></select>
                    <a href="#" onclick="showCustomMachine()"><small id="emailHelp" class="form-text text-muted">เพิ่ม
                            Machine</small></a>
                </div>

                <div class="form-group col-md-2">
                    <label>No.</label>
                    <input type="text" class="form-control" id="sdpno" placeholder="" value="<?php echo $row["sdpno"]; ?>" name="sdpno">
                </div>

                <div class="form-group col-md-2">
                    <label>Code No.</label>

                    <select id="sdpcodeno" class="form-control form-control-sm sdpcodeno" name="sdpcodeno">
                        <option value=""></option>
                        <option <?php echo ($row["sdpcodeno"] == '997CF-E') ? 'selected' : '' ?> value="997CF-E">997CF-E</option>
                        <option <?php echo ($row["sdpcodeno"] == '80410') ? 'selected' : '' ?> value="80410">80410</option>
                        <option <?php echo ($row["8030"] == '997CF-E') ? 'selected' : '' ?> value="8030">8030</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label>Lot No.</label>
                    <input type="text" class="form-control" id="sdplotno" placeholder="" value="<?php echo $row["sdplotno"]; ?>" name="sdplotno">
                </div>


            </div>

            <hr />
            <div id="firsttimedonate" style="<?php if ($row['sdpfirsttime'] != 1) {
                                                    echo 'display:none;';
                                                } ?>">
                <div class="row">
                    <div class="form-group col-md-2 tital-card">
                        <label><b>ก่อนได้รับบริจาค</b></label>
                    </div>

                </div>
                <div class="row">



                    <div class="form-group col-md-1">
                        <label>Hb</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdpprehb_before" placeholder="" onkeyup="beforePreHbColor()" value="<?php echo $row["sdpprehb_before_0"]; ?>" name="sdpprehb_before">
                    </div>

                    <div class="form-group col-md-1">
                        <label>Hct</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdpprehct_before" placeholder="" onkeyup="beforePreHctColor()" value="<?php echo $row["sdpprehct_before_0"]; ?>" name="sdpprehct_before">
                    </div>

                    <div class="form-group col-md-1">
                        <label>RBC</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdpprerbc_before" placeholder="" onkeyup="beforePreRbcColor()" value="<?php echo $row["sdpprerbc_before_0"]; ?>" name="sdpprerbc_before">
                    </div>

                    <div class="form-group col-md-1">
                        <label>WBC</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdpprewbc_before" placeholder="" onkeyup="beforePreWbcColor()" value="<?php echo $row["sdpprewbc_before_0"]; ?>" name="sdpprewbc_before">
                    </div>

                    <div class="form-group col-md-1">
                        <label>PLT</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdppreplt_before" placeholder="" onkeyup="SetPtlColor_00()" onkeydown="beforePrePltColor()" value="<?php echo $row["sdppreplt_before_0"]; ?>" name="sdppreplt_before">
                    </div>

                    <div class="form-group col-md-1">
                        <label>MCV</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdppremcv_before" placeholder="" onkeyup="beforePreMcvColor()" value="<?php echo $row["sdppremcv_before_0"]; ?>" name="sdppremcv_before">
                    </div>

                    <div class="form-group col-md-1">
                        <label>Eosinophil</label>
                        <input readonly type="number" step="any" class="sdp-number-center form-control" id="sdppreeosinophil_before" placeholder="" onkeyup="beforePreEosinophilColor()" value="<?php echo $row["sdppreeosinophil_before_0"]; ?>" name="sdppreeosinophil_before">
                    </div>

                </div>
            </div>

            <hr />
            <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>Pre-Test Post-Test</b></label>
                </div>


            </div>
            <div class="row">
                <!-- <button onclick="copyBeforePreTest()" type="button">คัดลอกก่อนได้รับบริจาค</button><br /> -->
            </div>

            <div class="row">



                <!-- <div class="form-group col-md-1">
                    <label>Hb</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprehb" placeholder=""

                    onkeydown="preHbColor()" onkeyup="autoDecimal_1()" value="<?php // echo $row["sdpprehb"];
                                                                                ?>" name="sdpprehb">

                </div>

                <div class="form-group col-md-1">
                    <label>Hct</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprehct" placeholder=""
                        onkeyup="preHctColor()" value="<?php // echo $row["sdpprehct"];
                                                        ?>" name="sdpprehct">
                </div>

                <div class="form-group col-md-1">
                    <label>RBC</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprerbc" placeholder=""
                        onkeyup="preRbcColor()" value="<?php // echo $row["sdpprerbc"];
                                                        ?>" name="sdpprerbc">
                </div>

                <div class="form-group col-md-1">
                    <label>WBC</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprewbc" placeholder=""
                        onkeyup="preWbcColor()" value="<?php // echo $row["sdpprewbc"];
                                                        ?>" name="sdpprewbc">
                </div>

                <div class="form-group col-md-1">
                    <label>PLT</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppreplt" placeholder=""
                        onkeyup="SetPtlColor_0()" onkeydown="prePltColor()" value="<?php // echo $row["sdppreplt"];
                                                                                    ?>" name="sdppreplt">
                </div>

                <div class="form-group col-md-1">
                    <label>MCV</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppremcv" placeholder=""
                        onkeyup="preMcvColor()" value="<?php // echo $row["sdppremcv"];
                                                        ?>" name="sdppremcv">
                </div>

                <div class="form-group col-md-1">
                    <label>Eosinophil</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppreeosinophil"
                        placeholder="" onkeyup="preEosinophilColor()" value="<?php // echo $row["sdppreeosinophil"];
                                                                                ?>"
                        name="sdppreeosinophil">
                </div> -->

                <div class="table-no-scroll">
                    <table id="list_table_anti_iden" style="margin-bottom:0px">
                        <thead>
                            <tr>
                                <th style="width:80px"></th>
                                <th style="width:120px">Sys</th>
                                <th style="width:120px">Dia</th>
                                <th style="width:120px">Hb</th>
                                <th style="width:120px">Hct</th>
                                <th style="width:120px">RBC</th>
                                <th style="width:120px">WBC</th>
                                <th style="width:120px">PLT</th>
                                <th style="width:120px">MCV</th>
                                <th style="width:120px">Eosinophil</th>
                                <th>หมายเหตุ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="width:100px">Pre-Test</th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppretsys"]; ?>" class="form-control" id="sdppretsys" name="sdppretsys" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppretdia"]; ?>" class="form-control" id="sdppretdia" name="sdppretdia" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdpprehb"]; ?>" class="form-control" onkeyup="preHbColor()" id="sdpprehb" name="sdpprehb" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdpprehct"]; ?>" class="form-control" onkeyup="preHctColor()" id="sdpprehct" name="sdpprehct" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdpprerbc"]; ?>" class="form-control" onkeyup="preRbcColor()" id="sdpprerbc" name="sdpprerbc" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdpprewbc"]; ?>" class="form-control" onkeyup="preWbcColor()" id="sdpprewbc" name="sdpprewbc" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppreplt"]; ?>" class="form-control" onkeyup="prePltColor()" id="sdppreplt" name="sdppreplt" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppremcv"]; ?>" class="form-control" onkeyup="preMcvColor();" id="sdppremcv" name="sdppremcv" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo (!empty($row["sdppreeosinophil"])) ? round($row["sdppreeosinophil"], 2) : ""; ?>" class="form-control" onkeyup="postEosinophilColor();" id="sdppreeosinophil" name="sdppreeosinophil" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="text" autocomplete="off" value="<?php echo $row["sdppretremark"]; ?>" class="form-control" id="sdppretremark" name="sdppretremark">
                                </th>
                            </tr>
                            <tr>
                                <th style="width:100px">Post-Test</th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppostsys"]; ?>" class="form-control" id="sdppostsys" name="sdppostsys" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppostdia"]; ?>" class="form-control" id="sdppostdia" name="sdppostdia" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdpposthb"]; ?>" class="form-control" onkeyup="postHbColor()" id="sdpposthb" name="sdpposthb" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdpposthct"]; ?>" class="form-control" onkeyup="postHctColor()" id="sdpposthct" name="sdpposthct" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppostrbc"]; ?>" class="form-control" onkeyup="postRbcColor()" id="sdppostrbc" name="sdppostrbc" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppostwbc"]; ?>" class="form-control" onkeyup="postWbcColor()" id="sdppostwbc" name="sdppostwbc" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppostplt"]; ?>" class="form-control" onkeyup="postPltColor()" id="sdppostplt" name="sdppostplt" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo $row["sdppostmcv"]; ?>" class="form-control" onkeyup="postMcvColor();" id="sdppostmcv" name="sdppostmcv" style="text-align: center;">
                                </th>
                                <th class="td-table">
                                    <input type="number" step="any" autocomplete="off" value="<?php echo (!empty($row["sdpposteosinophil"])) ? round($row["sdpposteosinophil"], 2) : ""; ?>" class="form-control" onkeyup="postEosinophilColor();" id="sdpposteosinophil" name="sdpposteosinophil" style="text-align: center;">
                                </th>

                                <th class="td-table">
                                    <input type="text" autocomplete="off" value="<?php echo $row["sdppostremark"]; ?>" class="form-control" id="sdppostremark" name="sdppostremark">
                                </th>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>

            <hr />
            <!-- <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>Post-Test</b></label>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-2">
                    <label>Systolic</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppostsys"
                        placeholder="" value="<?php echo $row["sdppostsys"]; ?>" name="sdppostsys">
                </div>

                <div class="form-group col-md-2">
                    <label>Diastolic</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppostdia"
                        placeholder="" value="<?php echo $row["sdppostdia"]; ?>" name="sdppostdia">
                </div>

                <div class="form-group col-md-3">
                    <label>หมายเหตุ</label>
                    <input type="text" class="form-control" id="sdppostremark" placeholder=""
                        value="<?php echo $row["sdppostremark"]; ?>" name="sdppostremark">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-1">
                    <label>Hb</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpposthb" placeholder=""

                        onkeydown="postHbColor()" onkeyup="autoDecimal_2()" value="<?php echo $row["sdpposthb"]; ?>"
                        name="sdpposthb">

                </div>

                <div class="form-group col-md-1">
                    <label>Hct</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpposthct"
                        placeholder="" onkeyup="postHctColor()" value="<?php echo $row["sdpposthct"]; ?>"
                        name="sdpposthct">
                </div>

                <div class="form-group col-md-1">
                    <label>RBC</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppostrbc"
                        placeholder="" onkeyup="postRbcColor()" value="<?php echo $row["sdppostrbc"]; ?>"
                        name="sdppostrbc">
                </div>

                <div class="form-group col-md-1">
                    <label>WBC</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppostwbc"
                        placeholder="" onkeyup="postWbcColor()" value="<?php echo $row["sdppostwbc"]; ?>"
                        name="sdppostwbc">
                </div>

                <div class="form-group col-md-1">
                    <label>PLT</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppostplt"
                        placeholder="" onkeyup="postPltColor()" value="<?php echo $row["sdppostplt"]; ?>"
                        name="sdppostplt">
                </div>

                <div class="form-group col-md-1">
                    <label>MCV</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdppostmcv"
                        placeholder="" onkeyup="postMcvColor()" value="<?php echo $row["sdppostmcv"]; ?>"
                        name="sdppostmcv">
                </div>

                <div class="form-group col-md-1">
                    <label>Eosinophil</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpposteosinophil"
                        placeholder="" onkeyup="postEosinophilColor()" value="<?php echo $row["sdpposteosinophil"]; ?>"
                        name="sdpposteosinophil">
                </div>


            </div> -->


            <hr />
            <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>Procedure</b></label>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-1">
                    <label>Hct</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodhct" placeholder="" value="<?php echo $row["sdpprodhct"]; ?>" name="sdpprodhct">
                </div>

                <div class="form-group col-md-1">
                    <label id="plt_pre_count">Plt Pre Count</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodpltcount" placeholder="" value="<?php echo $row["sdpprodpltcount"]; ?>" name="sdpprodpltcount">
                </div>

                <div class="form-group col-md-1">
                    <label id="plt_yield">Plt Yield</label>
                    <input type="number" step="any" class="sdp-number-center form-control " id="sdpprodpltyield" onkeyup="replaceDecimal(this,1)" placeholder="" value="<?php echo (!empty($row["sdpprodpltyield"])) ? round($row["sdpprodpltyield"], 1) : ""; ?>" name="sdpprodpltyield">
                </div>

                <div class="form-group col-md-1">
                    <label>Vol. Process</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodvol" placeholder="" value="<?php echo $row["sdpprodvol"]; ?>" name="sdpprodvol">
                </div>

                <div class="form-group col-md-1">
                    <label>Cycle</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodcycle" placeholder="" value="<?php echo $row["sdpprodcycle"]; ?>" name="sdpprodcycle">
                </div>

                <div class="form-group col-md-1">
                    <label>Time</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodtime" placeholder="" value="<?php echo $row["sdpprodtime"]; ?>" name="sdpprodtime">
                </div>


            </div>

            <hr />
            <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>Result</b></label>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-1">
                    <label>Vol.Process</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultvolproc" placeholder="" value="<?php echo $row["sdpresultvolproc"]; ?>" name="sdpresultvolproc">
                </div>

                <div class="form-group col-md-1">
                    <label>AC Vol.</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultacvol" placeholder="" value="<?php echo $row["sdpresultacvol"]; ?>" name="sdpresultacvol">
                </div>

                <div class="form-group col-md-1">
                    <label>Time</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpresulttime" placeholder="" value="<?php echo $row["sdpresulttime"]; ?>" name="sdpresulttime">
                </div>

                <div class="form-group col-md-1">
                    <label>Plt Weight</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultpltweight" placeholder="" value="<?php echo $row["sdpresultpltweight"]; ?>" name="sdpresultpltweight">
                </div>

                <div class="form-group col-md-1">
                    <label>Machine Yield</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultmachineyield" onkeyup="" placeholder="" value="<?php echo (!empty($row["sdpresultmachineyield"])) ? round($row["sdpresultmachineyield"], 1) : ""; ?>" name="sdpresultmachineyield">
                </div>

                <div class="form-group col-md-1">
                    <label>Plt post</label>
                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultpltpost" placeholder="" value="<?php echo $row["sdpresultpltpost"]; ?>" name="sdpresultpltpost">
                </div>

                <div class="form-group col-md-12" style="margin-bottom:-30px">
                    <div class="row">

                        <div class="form-group col-md-8">
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-check-label">
                                                <input <?php if ($row['sdpresulttype'] == 1) {
                                                            echo 'checked';
                                                        }  ?> type="radio" id="sdpresulttype1" name="sdpresulttype" value="1">
                                                <b><label id="titleBloodUsed">PC Used</label></b>
                                            </label>
                                            &emsp;
                                            <label class="form-check-label">
                                                <input <?php if ($row['sdpresulttype'] == 2 || !$row['sdpresulttype']) {
                                                            echo 'checked';
                                                        }  ?> type="radio" id="sdpresulttype2" name="sdpresulttype" value="2">
                                                <b><label id="titleBloodSDP">SDP</label></b>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-9">
                                    <label><b>Volume รวม</b></label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Product Volume</th>
                                                <th style="width: 25%">Product Count</th>
                                                <th id="plt_yield_td1" style="width: 25%">Plt Yield</th>
                                                <th style="width: 25%">Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodvolume1(this.value)" class="sdp-number-center form-control" id="sdpprodvolume1" placeholder="" value="<?php echo $row["sdpprodvolume1"]; ?>" name="sdpprodvolume1">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodcount1(this)" class="sdp-number-center form-control" id="sdpprodcount1" placeholder="" value="<?php echo $row["sdpprodcount1"]; ?>" name="sdpprodcount1">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodyltyield1(this.value);" class="sdp-number-center form-control" id="sdpprodyltyield1" placeholder="" value="<?php echo (!empty($row["sdpprodyltyield1"])) ? round($row["sdpprodyltyield1"], 2) : ""; ?>" name="sdpprodyltyield1">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodunit1" placeholder="" value="<?php echo $row["sdpprodunit1"]; ?>" name="sdpprodunit1">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Volume แบ่งได้(Dose)</label>
                                            <input type="number" step="any" class="sdp-number-center form-control" id="sdpresultvolume" placeholder="" onkeyup="calculateDoubleDose(this.value)" value="<?php echo $row["sdpresultvolume"]; ?>" name="sdpresultvolume">
                                        </div>
                                    </div>
                                </div>

                                <div id="volumesplit" class="form-group col-md-9" style="display:none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Product Volume</th>
                                                <th style="width: 25%">Product Count</th>
                                                <th id="plt_yield_td2" style="width: 25%">Plt Yield</th>
                                                <th style="width: 25%">Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodvolume2(this.value)" class="sdp-number-center form-control" id="sdpprodvolume2" placeholder="" value="<?php echo $row["sdpprodvolume2"]; ?>" name="sdpprodvolume2">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodcount2(this)" class="sdp-number-center form-control" id="sdpprodcount2" placeholder="" value="<?php echo $row["sdpprodcount2"]; ?>" name="sdpprodcount2">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" onkeyup="replaceDecimal(this,2);setSdpprodyltyield2(this.value);" class="sdp-number-center form-control" id="sdpprodyltyield2" placeholder="" value="<?php echo round($row["sdpprodyltyield2"], 2); ?>" name="sdpprodyltyield2">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="sdp-number-center form-control" id="sdpprodunit2" placeholder="" value="<?php echo $row["sdpprodunit2"]; ?>" name="sdpprodunit2">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <!-- <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Volume แบ่งได้ (3X dose)</label>
                                            <input type="number" step="any" class="sdp-number-center form-control"
                                                id="sdpresultvolume3" placeholder="" onkeyup="calculateTripleDose(this.value)"
                                                value="<?php echo $row["sdpresultvolume3"]; ?>" name="sdpresultvolume3">
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="form-group col-md-9">
                                    <label>Triple dose</label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%">Product Volume</th>
                                                <th style="width: 25%">Product Count</th>
                                                <th id="plt_yield_td2" style="width: 25%">Plt Yield</th>
                                                <th style="width: 25%">Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodvolume3(this.value)"
                                                        class="sdp-number-center form-control" id="sdpprodvolume3"
                                                        placeholder="" value="<?php echo $row["sdpprodvolume3"]; ?>"
                                                        name="sdpprodvolume3">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodcount3(this)"
                                                        class="sdp-number-center form-control" id="sdpprodcount3"
                                                        placeholder="" value="<?php echo $row["sdpprodcount3"]; ?>"
                                                        name="sdpprodcount3">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" onkeyup="setSdpprodyltyield3(this.value)"
                                                        class="sdp-number-center form-control" id="sdpprodyltyield3"
                                                        placeholder="" value="<?php echo $row["sdpprodyltyield3"]; ?>"
                                                        name="sdpprodyltyield3">
                                                </td>
                                                <td>
                                                    <input type="number" step="any"
                                                        class="sdp-number-center form-control" id="sdpprodunit3"
                                                        placeholder="" value="<?php echo $row["sdpprodunit3"]; ?>"
                                                        name="sdpprodunit3">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <br />

                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="hpTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th style="width: 80px">pH</th>
                                            <th style="width: 40px">
                                                <button type="button" onclick="sdpHP()" class="btn btn-info btn-sm">
                                                    <i class="fa fa-plus"></i>
                                                </button>

                                            </th>
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

            <hr />
            <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>Problem</b></label>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-3">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="check2" type="checkbox" id="isuseless" name="isuseless" value="1" <?php if (!empty($row['isuseless'])) {
                                                                                                                echo 'checked';
                                                                                                            }  ?>>&nbsp;Useless
                        </label>
                        &emsp;&emsp;

                    </div>
                    <input type="text" class="form-control" id="useless" placeholder="" value="<?php echo $row["useless"]; ?>" name="useless">
                </div>

                <div class="form-group col-md-3">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="check2" type="checkbox" id="islostset" name="islostset" value="1" <?php if (!empty($row['islostset'])) {
                                                                                                                echo 'checked';
                                                                                                            }  ?>>&nbsp;Lost Set
                        </label>
                        &emsp;&emsp;

                    </div>
                    <input type="text" class="form-control" id="lostset" placeholder="" value="<?php echo $row["lostset"]; ?>" name="lostset">
                </div>

                <div class="form-group col-md-3">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="check2" type="checkbox" id="sdpisclaim" name="sdpisclaim" value="1" <?php if (!empty($row['sdpisclaim'])) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?>>&nbsp;Claim
                        </label>
                        &emsp;&emsp;

                    </div>
                    <input type="text" class="form-control" id="sdpclaim" placeholder="" value="<?php echo $row["sdpclaim"]; ?>" name="sdpclaim">
                </div>

                <div class="form-group col-md-2">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="check2" type="checkbox" id="sdpisreturn" name="sdpisreturn" value="1" <?php if (!empty($row['sdpisreturn'])) {
                                                                                                                    echo 'checked';
                                                                                                                }  ?>>&nbsp;Return
                        </label>
                        &emsp;&emsp;

                    </div>
                    <input type="text" class="form-control" id="sdpreturn" placeholder="" value="<?php echo $row["sdpreturn"]; ?>" name="sdpreturn">
                </div>

                <div class="form-group col-md-1" style="margin-top:20px">
                    <a role="button" onclick="showPageLost()" href="#" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>ประวัติ</a>

                </div>

                <div class="form-group col-md-3">
                    <label>Machine</label>
                    <select multiple="multiple" id="problemmachineid" class="form-control problemmachineid" name="problemmachineid[]">
                        <?php
                        $strSQL = "SELECT * FROM problem_machine  ORDER BY problemmachineid ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php
                                    $problemmachineidArr = json_decode($row['problemmachineid']);
                                    foreach ($problemmachineidArr as $valueid) {
                                        if ($objResuut["problemmachineid"] == $valueid)
                                            echo 'selected';
                                    }
                                    ?> value="<?php echo $objResuut['problemmachineid']; ?>">
                                <?php echo $objResuut["problemmachinename"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="otherproblemmachine_div" class="form-group col-md-3">
                    <label>Other Machine</label>
                    <input type="text" class="form-control" id="problemmachineother" placeholder="" value="<?php echo $row["problemmachineother"]; ?>" name="problemmachineother">
                </div>

                <div class="form-group col-md-3">
                    <label>Donor</label>
                    <select multiple="multiple" id="problemdonorid" class="form-control problemdonorid" name="problemdonorid[]">
                        <?php
                        $strSQL = "SELECT * FROM problem_donor  ORDER BY problemdonorid ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php
                                    $problemdonoridArr = json_decode($row['problemdonorid']);
                                    foreach ($problemdonoridArr as $valueid) {
                                        if ($objResuut["problemdonorid"] == $valueid)
                                            echo 'selected';
                                    }
                                    ?> value="<?php echo $objResuut['problemdonorid']; ?>">
                                <?php echo $objResuut["problemdonorname"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="otherproblemdonor_div" class="form-group col-md-3">
                    <label>Other Donor</label>
                    <input type="text" class="form-control" id="problemdonorremark" placeholder="" value="<?php echo $row["problemdonorremark"]; ?>" name="problemdonorremark">
                </div>

                <div class="form-group col-md-3">
                    <label>Product</label>
                    <select multiple="multiple" id="problemproductid" class="form-control problemproductid" name="problemproductid[]">
                        <?php
                        $strSQL = "SELECT * FROM problem_product  ORDER BY problemproductid ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php
                                    $problemproductidArr = json_decode($row['problemproductid']);
                                    foreach ($problemproductidArr as $valueid) {
                                        if ($objResuut["problemproductid"] == $valueid)
                                            echo 'selected';
                                    }
                                    ?> value="<?php echo $objResuut['problemproductid']; ?>">
                                <?php echo $objResuut["problemproductname"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="otherproblemproduct_div" class="form-group col-md-3">
                    <label>Other Product</label>
                    <input type="text" class="form-control" id="problemproductremark" placeholder="" value="<?php echo $row["problemproductremark"]; ?>" name="problemproductremark">
                </div>

                <div class="form-group col-md-3">
                    <label>Human</label>
                    <select multiple="multiple" id="problemhumanid" class="form-control problemhumanid" name="problemhumanid[]">
                        <?php
                        $strSQL = "SELECT * FROM problem_human  ORDER BY problemhumanid ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php
                                    $problemhumanidArr = json_decode($row['problemhumanid']);
                                    foreach ($problemhumanidArr as $valueid) {
                                        if ($objResuut["problemhumanid"] == $valueid)
                                            echo 'selected';
                                    }
                                    ?> value="<?php echo $objResuut['problemhumanid']; ?>">
                                <?php echo $objResuut["problemhumanname"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="otherproblemhuman_div" class="form-group col-md-3">
                    <label>Other Human</label>
                    <input type="text" class="form-control" id="problemhumanremark" placeholder="" value="<?php echo $row["problemhumanremark"]; ?>" name="problemhumanremark">
                </div>
                <div class="form-group col-md-3" style="margin-top:-10px;">
                    <label for="inputEmail4">งดรับบริจาค</label>
                    <select id="sdpdonatenostatusid" class="form-control form-control-sm donatenostatusid" name="sdpdonatenostatusid">
                    </select>
                </div>
                <div class="form-group col-md-3" style="margin-top:-10px;">
                    <label for="inputEmail4">สาเหตุการงดรับบริจาค</label>
                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="sdpdonatenocauseremark" aria-describedby="numberlHelp" value="<?php echo $row["sdpdonatenocauseremark"]; ?>" name="sdpdonatenocauseremark">
                </div>

                <div class="form-group col-md-3" style="margin-top:-10px;">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label" style="margin-bottom:20px">
                            <input class="check2" type="checkbox" id="sdpisdonateremark" name="sdpisdonateremark" value="1" <?php if (!empty($row['sdpisdonateremark'])) {
                                                                                                                                echo 'checked';
                                                                                                                            }  ?>>&nbsp;หมายเหตุ
                        </label>
                        &emsp;&emsp;

                    </div>
                    <input type="text" autocomplete="off" class="form-control form-control-sm" id="sdpdonateremark" aria-describedby="numberlHelp" style="margin-top:-20px;" value="<?php echo $row["sdpdonateremark"]; ?>" name="sdpdonateremark">
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>นัดหมาย</b></label>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-check-label">
                        <input onclick="setCheckMarkAppointment()" class="check2" type="checkbox" id="sdpdonateisappointment" name="sdpdonateisappointment" value="1" <?php if (!empty($row['sdpdonateisappointment'])) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        }  ?>>&nbsp;นัดหมาย SDP
                    </label>
                    <input onchange="getAppointmentDate8()" type="text" class="form-control date1" id="sdpdonateappointmentdate" placeholder="" value="<?php echo (!empty($row["sdpdonateappointmentdate"]) && $row["sdpdonateappointmentdate"] != '0000-00-00') ? date_format(date_create($row["sdpdonateappointmentdate"]), "d/m/Y") : ''; ?>" name="sdpdonateappointmentdate">
                </div>

                <div class="form-group col-md-3">
                    <label class="form-check-label">สาเหตุการนัดหมาย</label>
                    <input type="text" class="form-control" id="sdpdonateappointmentremark" placeholder="" value="<?php echo $row["sdpdonateappointmentremark"]; ?>" name="sdpdonateappointmentremark">
                </div>



                <div class="form-group col-md-3">
                    <label>เจ้าหน้าที่นัด</label>
                    <select id="assignsdp" class="form-control issdpsave" name="assignsdp" readonly>
                        <option value="" selected>โปรดระบุ</option>
                        <?php
                        $strSQL = "SELECT * FROM staff ORDER BY id ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php if ($objResuut["id"] == $row['assignsdp']) {
                                        echo 'selected';
                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                <?php echo $objResuut["name"]; ?>
                                <?php echo $objResuut["surname"]; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>วันที่ทำนัด</label>
                    <input type="text" readonly class="form-control date1" id="assignsdpdate" value="<?php echo (!empty($row["assignsdpdate"]) && $row["assignsdpdate"] != '0000-00-00') ? date_format(date_create($row["assignsdpdate"]), "d/m/Y") : ''; ?>" name="assignsdpdate">
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="form-group col-md-2 tital-card">
                    <label><b>เจ้าหน้าที่</b></label>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-md-3">
                    <label>เจ้าหน้าที่ตรวจสอบผล Lab</label>
                    <select id="ischecklab" class="form-control ischecklab" name="ischecklab">
                        <option value="" selected>โปรดระบุ</option>
                        <?php
                        $strSQL = "SELECT * FROM staff WHERE ischecklab = 1 ORDER BY id ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php if ($objResuut["id"] == $row['ischecklab']) {
                                        echo 'selected';
                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                <?php echo $objResuut["name"]; ?>
                                <?php echo $objResuut["surname"]; ?>
                            </option>
                        <?php
                        }
                        ?>


                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>ผู้บันทึก</label>
                    <select id="issdpsave" class="form-control issdpsave" name="issdpsave">
                        <option value="" selected>โปรดระบุ</option>
                        <?php
                        $strSQL = "SELECT * FROM staff WHERE issdpsave = 1 ORDER BY id ASC";
                        $objQuery = mysql_query($strSQL);
                        while ($objResuut = mysql_fetch_array($objQuery)) {
                        ?>
                            <option <?php if ($objResuut["id"] == $row['issdpsave']) {
                                        echo 'selected';
                                    } ?> value="<?php echo $objResuut['id']; ?>">
                                <?php echo $objResuut["name"]; ?>
                                <?php echo $objResuut["surname"]; ?>
                            </option>
                        <?php
                        }
                        ?>


                    </select>
                </div>




            </div>
        </div><!-- end card-->
    </div>
</div>
<script>
    var Decimal_1 = 0;
    var Decimal_2 = 0;
    var Decimalpremcv = 0;

    function autoDecimal_1() {
        var integer = document.getElementById("sdpprehb").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);

        if (Decimal_1 == 0) {
            document.getElementById("sdpprehb").value = decimal;
            Decimal_1++;
        }
        if (integer == "") {
            Decimal_1--;
        }
    }

    function autoDecimal_2() {
        var integer = document.getElementById("sdpposthb").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);

        if (Decimal_2 == 0) {
            document.getElementById("sdpposthb").value = decimal;
            Decimal_2++;
        }
        if (integer == "") {
            Decimal_2--;
        }
    }

    // function autoDecimalpremcv(){
    //     var integer = document.getElementById("sdppremcv").value;
    //     var float = parseFloat(integer) || 0;
    //     var decimal = float.toFixed(2);
    //     // console.log(decimal);
    //     if(Decimalpremcv == 0){
    //         document.getElementById("sdppremcv").value = decimal;
    //         Decimalpremcv++;
    //     }
    //     if(integer == ""){
    //         Decimalpremcv--;
    //     }
    // }

    function SetPtlColor_0() {
        var val = document.getElementById("sdppreplt").value
        if (val > 200 && val < 400) {
            document.getElementById("sdppreplt").style.color = "#000000"
        }
    }

    function setShow() {
        $("#firsttimedonate").css("display", "block");

    }

    function offShow() {
        $("#firsttimedonate").css("display", "none");

    }
</script>