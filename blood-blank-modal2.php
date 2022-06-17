<!-- Modal -->
<style>
    #bloodgroupcross+.select2 .select2-selection__rendered {
        font-weight: bold;
        color: #dc3545
    }

    #bloodstocktypecross+.select2 .select2-selection__rendered {
        font-weight: bold;
        color: #dc3545
    }

    #receivingtypeid+.select2 .select2-selection__rendered {
        font-weight: bold;
        color: #dc3545
    }
</style>

<div class="modal fade blank-modal" id="blankModal2" role="dialog" aria-labelledby="blankModal2" aria-hidden="true" style="overflow:auto !important">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รับเลือดเข้าคลังจากสถานที่อื่น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity"><b>สาขา</b></label>
                        <select autofocus name="hospital" class="form-control hospital" id="hospital"></select>
                        <a href="#" onclick="showCustomHospital()"><small class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มสาขา</small></a>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4"><b>ประเภทถุง</b></label>
                        <select id="bloodbagtype" class="form-control bloodbagtype" name="bloodbagtype"></select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4"><b>ชนิดเลือด</b></label>
                        </select>
                        <select id="bloodstocktypecross" class="form-control form-control-sm bloodstocktypecross" name="bloodstocktypecross">
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

                    <div class="form-group col-md-2">
                        <label for="inputEmail4"><b>ประเภทการรับ</b></label>
                        <select id="receivingtypeid" class="form-control receivingtypeid" name="receivingtypeid">
                        </select>
                    </div>
                    <div id="divShowBloodBorrow" class="form-group col-md-1">
                        <br />
                        <a role="button" href="#" onclick="showBloodBorrow()" style="margin-top:8px" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span><i class="fa fa-calendar-o" aria-hidden="true"></i></a>

                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputEmail4"><b>Blood Gr.</b></label>
                        <select id="bloodgroupcross" class="form-control bloodgroupcross" name="bloodgroupcross">
                            <option value="">โปรดระบุ</option>
                            <?php
                            $strSQL = "SELECT * FROM blood_group WHERE bloodgroupid != '' AND cordblood != 1 ORDER BY bloodgroupsort";
                            $objQuery = mysql_query($strSQL);
                            while ($objResuut = mysql_fetch_array($objQuery)) {
                            ?>
                                <option value="<?php echo $objResuut["bloodgroupid"]; ?>">
                                    <?php echo $objResuut["bloodgroupname"] . "|" . $objResuut["bloodgroupcode"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputEmail4"><b>Rh</b></label>
                        <div hidden id="dex1">
                            <input type="text" readonly value="Negative" name="Negative" class="form-control" id="Negative">
                        </div>
                        <div hidden id="dex2">
                            <select id="bloodrhcross" class="form-control bloodrhcross" name="bloodrhcross">
                                <option value="">โปรดระบุ</option>
                                <?php
                                $strSQL = "SELECT * FROM rh ORDER BY FIND_IN_SET(rhid,'Rh+,Rh-,Rh(D)')";
                                $objQuery = mysql_query($strSQL);
                                while ($objResuut = mysql_fetch_array($objQuery)) {
                                ?>
                                    <option value="<?php echo $objResuut["rhid"]; ?>">
                                        <?php echo $objResuut["rhname3"] . "|" . $objResuut["rhcode2"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group col-md-2">
                        <label for="inputEmail4"><b>วันที่เจาะเลือด</b></label>

                        <input type="text" autocomplete="off" class="form-control date1" id="donation_date_cross" aria-describedby="numberlHelp" placeholder="" onchange="getBloodDonationDate(); convertBE2();" value="" name="donation_date_cross">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputEmail4"><b>วันที่หมดอายุ</b></label>

                        <input type="text" autocomplete="off" class="form-control date1" id="donation_exp_cross" aria-describedby="numberlHelp" placeholder="" onkeyup="getBloodExpDate()" value="" name="donation_exp_cross">
                    </div>



                    <!-- <div class="form-group col-md-2">
                        <label for="inputEmail4">Sub</label>
                        <select onchange="scanBagNumberModal2()" id="sub" class="form-control sub" name="sub">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div> -->


                    <div id="divShowHn" class="form-group col-md-1">
                        <label for="inputCity">HN</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="patienthn" autocomplete="off" class="form-control" id="patienthn" placeholder="" onkeyup="setNewHN(this)">
                    </div>

                    <div id="divShowPatientFullname" class="form-group col-md-3">
                        <label for="inputCity">ชื่อ-สกุล</label>
                        <input readonly type="text" autocomplete="off" name="patientfullname" class="form-control" id="patientfullname" style="font-weight: bold;color:#dc3545;" placeholder="">
                    </div>
                    <div id="divShowAntigen" class="form-group col-md-2">
                        <label for="inputCity">antigen</label>
                        <input readonly type="text" autocomplete="off" name="patientantigen" class="form-control" id="patientantigen" style="font-weight: bold;color:#dc3545;" placeholder="">
                    </div>

                    <!-- <div class="form-group col-md-2">
                        <label for="inputCity">Volume</label>
                        <input type="text" autocomplete="off" name="volume" onkeyup="" class="form-control" id="volume" placeholder="">
                    </div> -->
                    <input type="hidden" autocomplete="off" name="volume" onkeyup="" class="form-control" id="volume" placeholder="">
                    <!-- <div class="form-group col-md-2">
                        <label for="inputEmail4">เจ้าหน้าที่รับเลือดเข้าคลัง</label>
                        <select onchange="addBlood()" id="staff" class="form-control staff" name="staff">
                        </select>
                    </div> -->

                    <div class="form-group col-md-1">
                        <label for="inputCity">จำนวน</label>
                        <input type="number" autocomplete="off" name="qty" class="form-control" id="qty">
                    </div>


                    <input type="hidden" autocomplete="off" name="phenotype" class="form-control" id="phenotype" placeholder="">


                    <div class="form-group col-md-1">
                        <br>
                        <a style="margin-top: 7px;" onclick="addBlood()" role="button" href="#" class="btn btn-success"><span class="btn-label"><i class="fa fa-plus"></i></span>เพิ่ม</a>
                    </div>
                </div>
                <form role="form" id="formBlood2" action="inventory-blood-bank.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="bloodstockmainid" name="bloodstockmainid">
                    <input type="hidden" id="bloodstockpaymainid" name="bloodstockpaymainid">
                    <input type="hidden" id="bloodborrowitemid" name="bloodborrowitemid">
                    <input type="hidden" id="bloodstockpaygroupdate" name="bloodstockpaygroupdate">
                    <div id="div_list_table_json_cross" class="table-stock-scroll" style="z-index:9999;height:45vh;">
                        <table id="list_table_json_cross" style="width:2800px">
                            <thead>
                                <tr>
                                    <th class="td-table">No.</th>
                                    <th style="width:180px" class="td-table">สาขา</th>
                                    <th style="width:200px" class="td-table">ประเภทการรับ</th>
                                    <th style="width:100px" class="td-table">ชนิดเลือด</th>
                                    <th style="width:140px" class="td-table">หมายเลขถุง</th>
                                    <th style="width:50px" class="td-table">Sub</th>
                                    <th style="width:140px" class="td-table">RFID</th>
                                    <th style="width:120px" class="td-table">หมายเลขสาย</th>
                                    <th class="td-table">Bl.Gr.</th>
                                    <th class="td-table">Rh</th>
                                    <th class="td-table" style="width:110px">Confirm<br />Bl.Gr.</th>
                                    <th class="td-table" style="width:150px">Confirm<br />Rh</th>
                                    <th class="td-table" style="width:90px">Volume</th>
                                    <th style="width:90px" class="td-table">วันที่เจาะ</th>
                                    <th style="width:90px" class="td-table">วันที่หมดอายุ</th>
                                    <th style="width:220px" class="td-table">ประเภทถุง</th>
                                    <th style="width:100px" class="td-table">HN</th>
                                    <th style="width:200px" class="td-table">ชื่อ-สกุล</th>
                                    <th class="td-table">Antibody</th>
                                    <th class="td-table">Phenotype</th>
                                    <th style="width:140px" class="td-table">เจ้าหน้ารับเลือด</th>
                                    <th style="width:40px" class="td-table"></th>
                                </tr>
                            </thead>
                            <tbody id="white_set">


                            </tbody>
                        </table>
                    </div>

                    <br />
                    <div class="form-row" id="divbloodstockfloor2" style="visibility:hidden;">
                        <div class="form-group col-md-2">
                            <label for="inputCity">ผู้แก้ไข</label>
                            <input type="hidden" id="bloodstockeditusername2" name="bloodstockeditusername2" class="form-control" value="">
                            <input readonly type="text" id="bloodstockeditfullname2" name="bloodstockeditfullname2" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputEmail4">สาเหตุที่แก้ไข</label>
                            <select id="bloodstockremarkeditid2" class="form-control bloodstockremarkeditid2" name="bloodstockremarkeditid2"></select>
                        </div>

                        <div class="form-group col-md-2" id="divbloodstockotherremark2" style="visibility:hidden;">
                            <label for="inputCity">อื่นๆ</label>
                            <input type="text" id="bloodstockotherremark2" name="bloodstockotherremark2" class="form-control" value="">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <button style="margin-right:150px" onclick="reportPrintGetBlood()" class="btn btn-light" type="button">
                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ใบรับเลือด
                            </button>
                        </div>
                        <div class="form-group col-md-3">
                            <button onclick="newBloodBlank2()" class="btn btn-success" type="button">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>สร้างใหม่
                            </button>
                        </div>
                        <div class="form-group col-md-6 text-right m-b-0">

                            <div style="display:none;" id="loader2" class="loader"></div>
                            <button class="btn btn-primary" type="submit">
                                <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                            </button>
                            <button type="button" onclick="closeBloodBlank2()" class="btn btn-warning m-l-5">
                                <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script language="JavaScript">
    var count = 1;
    var addstatus = true;
    var bugmsg = '';
    var receivingtypename = "รับจากการเบิกเลือดสำหรับ Stock";
    var hospitalname = "สภากาชาดไทย";
    var rhname3 = "";
    var bag_number_error = "";



    function saveCross() {
        var hospi = $("#hospital").val();

        if (hospi == 285) {
            chk_bag_icon = 1;
        }


        if (checkDuplicateBagNumber('bag_number') && $("#bloodstockmainid").val() == "") {
            errorSwal('หมายเลขถุงซ้ำ');
        } else if (checkFormatBagNumber()) {
            errorSwal('รูปแบบหมายเลขถุง \n' + bag_number_error + '\nไม่ถูกต้อง');
        } else if (document.getElementById("list_table_json_cross").rows.length > 1 || $("#bloodstockmainid").val() != "") {

            // console.log(getTableStockCross());
            // return false;

            document.getElementById("loader2").style.display = "block";
            if (chk_bag_icon == 0) {
                swal({
                    title: 'กรุณาเลือกกระเป๋า',
                    type: 'warning',
                    icon: "warning",
                    confirmButtonText: 'ตกลง',
                    allowOutsideClick: false
                });
                chk_bag_icon = 0;
            } else if (chk_edit == 1) {
                var edit = $("#bloodstockremarkeditid2").val();

                if (edit == 0 || edit == "" || edit == null) {
                    swal({
                        title: 'กรุณาระบุหมายเหตุเพื่อแก้ไข',
                        type: 'warning',
                        icon: "warning",
                        confirmButtonText: 'ตกลง',
                        allowOutsideClick: false
                    });
                } else {
                    chk_edit = 0;
                    saveCross();
                }

            } else {
                spinnershow();
                $.ajax({
                    type: 'POST',
                    url: 'blood-blank-cross-save.php',
                    data: {
                        stockcross: JSON.stringify(getTableStockCross()),
                        bloodstockpaymainid: $("#bloodstockpaymainid").val(),
                        bloodstockmainid: $("#bloodstockmainid").val(),
                        bloodstockeditusername: $("#bloodstockeditusername2").val(),
                        bloodstockremarkeditid: $("#bloodstockremarkeditid2").val(),
                        bloodstockotherremark: $("#bloodstockotherremark2").val(),
                        bloodstockpaygroupdate: $("#bloodstockpaygroupdate").val()
                    },
                    dataType: 'json',
                    complete: function() {
                        spinnerhide();
                    },
                    success: function(data) {
                        if (data.status) {
                            swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                icon: "success",
                                confirmButtonText: 'ตกลง',
                                allowOutsideClick: false
                            }).then(value => {
                                spinnershow();
                                newBloodBlank2();
                            });
                            // myAlertTop();
                            // loadTable();
                            // $('#bloodstockmainid').val(data.id);
                        } else {
                            myAlertTopError();
                        }

                        document.getElementById("loader2").style.display = "none";

                    },
                    error: function(data) {
                        closeBloodBlank2();
                        document.getElementById("loader2").style.display = "none";
                        console.log('An error occurred.');
                        console.log(data);
                        myAlertTopError();
                    },
                });

            }


        } else {
            errorSwal('ยังไม่มีการเพิ่มผลิตภัณฑ์');
        }

    }



    function checkDuplicateBagNumber(state = "bag_number") {
        var status = false;
        var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
        var strArray = [];
        $.each(body.children, function(ind, vl) {
            var obj = vl.children[22].innerHTML;
            var item = JSON.parse(obj);

            if (state == 'rfidcode') {
                strArray.push(item[0].rfidcode);
            } else {
                if (item[0].bag_number != "")
                    strArray.push(item[0].bag_number + item[0].sub);
            }

        });

        let findDuplicates = arr => arr.filter((item, index) => arr.indexOf(item) != index)
        var arrDuplicates = findDuplicates(strArray);
        if (arrDuplicates.length > 0) {
            status = true;
        }

        return status;
    }

    function checkFormatBagNumber() {
        var status = false;
        var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];
        var strArray = [];
        $.each(body.children, function(ind, vl) {
            var obj = vl.children[22].innerHTML;
            var item = JSON.parse(obj);

            console.log(item[0].bag_number.length);
            if (item[0].bag_number.length != 14) {
                status = true;
                bag_number_error = item[0].bag_number;
            }

        });


        return status;
    }


    function reportPrintGetBlood() {
        var id = $("#bloodstockmainid").val();

        printJS({
            printable: localurl + "/report/blood-get-form.php?id=" + id,
            type: 'pdf',
            showModal: true
        });


    }
    count_0 = 0;

    var chk_edit = 0;

    function addBlood(stateEntry = "ADD", im = [], dat = [], dataLength = 0) {


        count_0 - count_0;
        if (stateEntry != "EDIT") {
            // $('#bag_number').focus();
            if (!$('#hospital').val()) {
                $('#hospital').focus();
                return false;
            }
            val = $('#bloodstocktypecross').val();
            // console.log(val);

            if (val == 'PRC') {
                if (!$('#bloodbagtype').val()) {
                    $('#bloodbagtype').focus();
                    return false;
                }
            } else if (val == 'LPRC') {
                if (!$('#bloodbagtype').val()) {
                    $('#bloodbagtype').focus();
                    return false;
                }
            } else if (val == 'LDPRC') {
                if (!$('#bloodbagtype').val()) {
                    $('#bloodbagtype').focus();
                    return false;
                }
            } else if (val == 'SDR') {
                if (!$('#bloodbagtype').val()) {
                    $('#bloodbagtype').focus();
                    return false;
                }
            }
            // if (!$('#bloodbagtype').val()) {
            //     $('#bloodbagtype').focus();
            //     return false;
            // }

            if (!$('#bloodstocktypecross').val()) {
                $('#bloodstocktypecross').focus();
                return false;
            }

            if (!$('#receivingtypeid').val()) {
                $('#receivingtypeid').focus();
                return false;
            }

            if (!$('#bloodgroupcross').val() && $('#bloodstocktypecross').val() != "CRYO") {
                $('#bloodgroupcross').focus();
                return false;
            }

            if (!$('#bloodrhcross').val() && $('#bloodstocktypecross').val() != "CRYO") {
                $('#bloodrhcross').focus();
                return false;
            }



            if (!$('#donation_date_cross').val()) {
                $('#donation_date_cross').focus();
                return false;
            }

            if (!$('#donation_exp_cross').val()) {
                $('#donation_exp_cross').focus();
                return false;
            }


            // if (!$('#volume').val()) {
            //     $('#volume').focus();
            //     return false;
            // }

            var bag_number = $('#bag_number').val();
            // if (bag_number.length != 14) {
            //     $('#bag_number').focus();
            //     return false;
            // }

            // if (!$('#rfidcode').val()) {
            //     $('#rfidcode').focus();
            //     return false;
            // }

            if (!$('#qty').val()) {
                $('#qty').focus();
                return false;
            }

            // if (!$('#staff').val()) {
            //     $('#staff').focus();
            //     return false;
            // }

            // if (findTableCross($('#rfidcode').val())) {
            //     errorSwal('RFID Code ซ้ำ');
            //     return false;
            // }



            if (!addstatus) {
                bagNumberMsg();
                return false;
            }

            chk_edit = 0;
        } else {
            chk_edit = 1;

        }


        var arr = [{
            bloodstockid: '',
            hospital: $('#hospital').val(),
            receivingtypeid: $('#receivingtypeid').val(),
            bloodstocktypecross: $('#bloodstocktypecross').val(),
            bag_number: '',
            rfidcode: ' ',
            sub: '1',
            rubberbandnumber: '',
            bloodgroupcross: $('#bloodgroupcross').val(),
            bloodrhcross: $('#bloodrhcross').val(),
            bloodgroupcrossconfirm: '',
            bloodrhcrossconfirm: '',
            volume: $('#volume').val(),
            donation_date_cross: $('#donation_date_cross').val(),
            donation_exp_cross: $('#donation_exp_cross').val(),
            bloodbagtype: $('#bloodbagtype').val(),
            antibody: $('#antibody').val(),
            phenotype: $('#phenotype').val(),
            staff: session_staffid,
            bloodstockmainid: $('#bloodstockmainid').val(),
            patienthn: $('#patienthn').val(),
            patientfullname: $('#patientfullname').val(),
            bloodborrowitemid: $("#bloodborrowitemid").val()
        }];

        if (stateEntry == "EDIT") {
            arr = [{
                bloodstockid: im.bloodstockid,
                hospital: im.hospitalid,
                receivingtypeid: im.receivingtypeid,
                bloodstocktypecross: im.bloodtype,
                bag_number: im.bag_number,
                rfidcode: im.bloodstockrfid,
                sub: im.sub,
                rubberbandnumber: im.rubberbandnumber,
                bloodgroupcross: im.bloodgroup,
                bloodrhcross: im.bloodrh,
                bloodgroupcrossconfirm: im.bloodgroupconfirm,
                bloodrhcrossconfirm: im.bloodrhconfirm,
                volume: im.volume,
                donation_date_cross: getDMY2(im.bloodstart), ////55
                donation_exp_cross: getDMY2(im.bloodexp), ////55
                bloodbagtype: im.bagtypeid, ////55
                antibody: im.antibody,
                phenotype: im.phenotype,
                staff: dat.pickupofficer,
                bloodstockmainid: im.bloodstockmainid,
                patienthn: im.patienthn,
                patientfullname: im.patientfullname,
                bloodborrowitemid: im.bloodborrowitemid
            }];

            hospitalname = im.hospitalname;
            receivingtypename = im.receivingtypename;

        }

        console.log(arr);


        if (arr[0].bloodstocktypecross == "FFP") {
            arr[0].volume = "200";
        }

        var event_data = '';

        var qty = (stateEntry == "EDIT") ? parseInt(dataLength) : parseInt($("#qty").val());
        var i;
        for (i = 0; i < qty; i++) {
            var record = i + 1;
            event_data = '';
            count_0++;

            var redcell_required = "";
            if (arr[0].bloodstocktypecross == 'PRC' || arr[0].bloodstocktypecross == 'LPRC' || arr[0].bloodstocktypecross == 'LDPRC' || arr[0].bloodstocktypecross == 'SDR') {
                redcell_required = ' required ';
            }

            event_data += '<tr class="tr_color_1" id="tr_' + count + '" onclick="setBloodColor1(this)">';
            event_data += '<td class="td-table">' + '1' + '</td>';
            // event_data += '<td class="td-table">' + '<input type="radio" name="ckblood" id="ckblood' + record + '">' + '</td>';
            event_data += '<td style="width:200px" class="td-table">' + hospitalname + '</td>';
            event_data += '<td style="width:200px" class="td-table">' + receivingtypename + '</td>';
            // event_data += '<td class="td-table">' + arr[0].bloodstocktypecross + '</td>';

            event_data += '<td class="td-table">'
            event_data += '<select ' + redcell_required + ' name="bloodstocktypecross' + count + '" id="bloodstocktypecrosss' + count + '"  style="width:70px" ';
            event_data += 'value="" class="form-control bloodstocktypecross" onchange="setBloodType(this,' + count + ')"  > '
            event_data += '<option  value=""></option>'
            $.each(dataBloodStockTypeArr, function(ind, v) {
                if (v.bloodstocktypecode == null) {
                    v.bloodstocktypecode = '';
                }
                event_data += '<option ' + ((arr[0].bloodstocktypecross == v.bloodstocktypeid) ? 'selected' : '') + '  value="' + v.bloodstocktypeid + '">' + v.bloodstocktypeid + '|' + v.bloodstocktypecode + '</option>'
            })
            event_data += ' </select>';
            event_data += '</td>'
            event_data += '<td class="td-table">' +
                '<input required type="text" maxlength="14" autocomplete="off" name="bag_number' + count + '" id="bag_number' +
                count +
                '" class="form-control"  value="' + arr[0].bag_number + '" '
            event_data += ' style="width:140px; font-weight: bold; color:#dc3545;" onkeyup="setBagNumberModalTable(this,' + count + ')" placeholder="">' + '</td>';

            event_data += '<td class="td-table">';
            event_data += '<input required type="text"  autocomplete="off" name="sub' + count + '" id="sub' + count + '" class="form-control"  value="1" '
            event_data += ' style="width:40px; font-weight: bold;" onkeyup="setBagNumberModalTable2(this)" placeholder="">' + '</td>';
            // event_data +=
            //     '<select style="width:60px" onchange="setBagNumberModalTable2(this)" id="sub" class="form-control sub" name="sub"> '
            // event_data += '                    <option value="1">1</option>'
            // event_data += '                    <option value="2">2</option>'
            // event_data += '                    <option value="3">3</option>'
            // event_data += '                </select>'
            event_data += '</td>';
            event_data += '<td class="td-table">' +
                '<input ' + redcell_required + ' type="text" autocomplete="off" name="rfidcode' + count + '" id="rfidcode' +
                count +
                '" class="form-control"  value="' + arr[0].rfidcode + '" '
            event_data += ' style="width:140px" onkeyup="setRFIDcode(this)" placeholder="">' + '</td>';


            event_data += '<td class="td-table">' +
                '<input ' + redcell_required + ' type="text" maxlength="8" autocomplete="off" name="rubberbandnumber' + count + '" id="rubberbandnumber' +
                count +
                '" class="form-control"  '
            event_data += ' style="width:140px" onkeyup="setRubberbandnumber(this)" value="' + arr[0].rubberbandnumber + '"  placeholder="">' + '</td>';

            event_data += '<td class="td-table" style="width:40px">' + arr[0].bloodgroupcross + '</td>';
            event_data += '<td class="td-table" style="width:40px">' + getPosNeg(arr[0].bloodrhcross) + '</td>';
            event_data += '<td class="td-table">';



            event_data += '<select ' + redcell_required + ' name="bloodgroupid' + count + '" id="bloodgroupid' + count + '"  style="width:70px" ';
            event_data += 'value="" class="form-control bloodgroupid" onchange="setBloodgroupConfirm(this,' + count + ')"  > '
            event_data += '<option  value=""></option>'
            $.each(dataBloodGroupArr, function(ind, v) {
                event_data += '<option ' + ((arr[0].bloodgroupcrossconfirm == v.bloodgroupid) ? 'selected' : '') + '  value="' + v.bloodgroupid + '">' + v.bloodgroupname + '|' + v.bloodgroupcode + '</option>'
            })
            event_data += ' </select>';
            event_data += '</td>';


            event_data += '<td class="td-table">';
            event_data += '<select ' + redcell_required + ' name="rhid' + count + '" id="rhid' + count + '"';
            event_data += 'value="" class="form-control rhid" onchange="setRfidConfirm(this)"  > '
            event_data += '<option  value=""></option>'
            $.each(dataRhArr, function(ind, v) {
                event_data += '<option ' + ((arr[0].bloodrhcrossconfirm == v.rhid) ? 'selected' : '') + '  value="' + v.rhid + '">' + v.rhname3 + '|' + v.rhcode2 + '</option>'
            })

            event_data += ' </select>';

            event_data += '</td>';

            event_data += '<td class="td-table">' +
                '<input required type="number" autocomplete="off" name="volume' + count + '" id="volume' +
                count +
                '" class="form-control"  value="' + arr[0].volume + '" '
            event_data += ' onkeyup="setVolume2(this)" placeholder="">' + '</td>';

            event_data += '<td class="td-table">' +
                '<input required type="text" autocomplete="off" name="donation_date_cross' + count +
                '" id="donation_date_cross' + count +
                '" class="form-control date1"  value="' + arr[0].donation_date_cross + '" '
            event_data += ' style="width:140px"  placeholder="" onkeyup="getBloodDonationDate(' + count +
                ',this)" onchange="getBloodDonationDate(' + count + ',this); convertBE3(' + count + ',this)" >' + '</td>';

            event_data += '<td class="td-table">' +
                '<input required type="text" autocomplete="off" name="donation_exp_cross' + count +
                '" id="donation_exp_cross' +
                count +
                '" class="form-control date1"  value="' + arr[0].donation_exp_cross + '" '
            event_data += ' style="width:140px"  placeholder="" onkeyup="getBloodExpDate2(' + count +
                ',this)" onchange="getBloodExpDate2(' + count + ',this)" >' + '</td>';

            event_data += '<td style="width:160px" class="td-table">' + $('#bloodbagtype').text() + '</td>';
            event_data += '<td class="td-table">' + arr[0].patienthn + '</td>';
            event_data += '<td class="td-table">' + arr[0].patientfullname + '</td>';
            event_data += '<td class="td-table">' + '' + '</td>';
            event_data += '<td class="td-table">' + arr[0].phenotype + '</td>';
            if (stateEntry == "EDIT") {
                event_data += '<td style="width:140px" class="td-table">' + staffname + '</td>';
            } else {
                event_data += '<td style="width:140px" class="td-table">' + session_fullname + '</td>';
            }
            event_data += '<td  class="td-table" >';
            // event_data += '<a role="button" onclick="antibodyModalTable(this)"  href="#" ';
            // event_data += ' class="btn btn-primary" >A&P</a>';

            event_data +=
                '<button type="button" onclick="deleteRowCross(this)" class="btn btn-danger m-l-5">';
            event_data +=
                '<i class="fa fa-trash"></i>';
            event_data += '</button>'
            event_data += '</td>';
            event_data += '<td class="td-table" style="display:none;" >';
            event_data += JSON.stringify(arr);
            event_data += '</td>';
            event_data += '</tr>';


            $("#list_table_json_cross").append(event_data);

            setSelectConfirmBloodgroup('bloodgroupid', count);
            setSelectConfirmRh('rhid', count);
            setSelectConfirmType('bloodstocktypecrosss', count);

            console.log('bloodstocktypecrosss' + count);

            setEnterRubberbandNumber('rubberbandnumber', count);
            setEnterVolume("volume", count);
            dateBE(".date1");
            count++;


        }


        setNoCross();
        // clearValue();


        setTimeout(function() {

            $("#div_list_table_json_cross").scrollTop($("#list_table_json_cross")[0].scrollHeight);

            if (arr[0].bloodstocktypecross == "CRYO") {

            } else {
                // document.getElementById("volume").focus();
            }

        }, 200);


    }



    function setEnterRubberbandNumber(idname = "", countnumber = "") {
        $("#" + idname + countnumber).on('keydown', function(e) {
            if (e.which == 13) {
                $("#bloodgroupid" + countnumber).select2('open');
            }
        });
    }

    function setEnterVolume(idname = "", countnumber = "") {

        $("#" + idname + countnumber).on('keydown', function(e) {
            if (e.which == 13) {

                countnumber_new = parseInt(countnumber) + 1;

                setTimeout(function() {
                    if ($("#bag_number" + countnumber_new)) {
                        // document.getElementById("bag_number"+countnumber_new).focus();
                        // console.log(document.getElementById("bag_number"+countnumber_new));

                        var _self = document.getElementById("bag_number" + countnumber)
                        var row = _self.parentNode.parentNode;

                        var rows = document.getElementById("list_table_json_cross").rows;
                        var _index = "";
                        for (var i = 1; i < rows.length; i++) {
                            if (rows[i].id.replace("tr_", "") == countnumber) {
                                _index = i + 1;

                            }
                        }

                        if (rows[_index]) {
                            rows[_index].cells[4].children[0].focus();
                        }
                    }

                }, 500);

            }
        });

    }


    function blood_color(record) {
        var galleries = document.getElementsByClassName("tr_color_1");
        var len = galleries.length;

        for (var i = 0; i < len; i++) {
            galleries[i].style.backgroundColor = "#FFF";
        }
        document.getElementById("tr_" + record).style.background = "#b7e4eb";
    }

    function getPosNeg(v) {
        console.log(v);
        var result = "";
        if (v == "Rh+") {
            result = "Positive";
        } else if (v == "Rh-") {
            result = "Negative";
        } else if (v == "Rh(D)") {
            result = "Weak D";
        }
        return result;
    }

    function blood_color_1(rec) {

        var galleries = document.getElementsByClassName("tr_color_1");
        var len = galleries.length;

        for (var i = 0; i < len; i++) {
            galleries[i].style.backgroundColor = "#FFF";
        }
        document.getElementById("tr_1_" + rec).style.background = "#b7e4eb";
    }

    function setBloodColor1(self) {

        var galleries = document.getElementsByClassName("tr_color_1");
        var len = galleries.length;

        for (var i = 0; i < len; i++) {
            galleries[i].style.backgroundColor = "#FFF";
        }
        self.style.background = "#b7e4eb";
    }

    function clearValue() {
        // $('#hospital').val(null);
        // $('#hospital').trigger('change');
        // $('#bloodbagtype').val(null);
        // $('#bloodbagtype').trigger('change');
        // $('#bloodstocktypecross').val(null);
        // $('#bloodstocktypecross').trigger('change');
        // $('#bloodgroupcross').val(null);
        // $('#bloodgroupcross').trigger('change');
        // $('#bloodrhcross').val(null);
        // $('#bloodrhcross').trigger('change');
        if ($('#bloodstocktypecross').val() != "CRYO" && $('#bloodstocktypecross').val() != "FFP")
            $('#volume').val('');

        $('#rfidcode').val('');
        $('#bag_number').val('');
        $('#qty').val('');
        // $('#donation_date_cross').val('');
        // $('#donation_exp_cross').val('');


        setReceivingTypeID($('#receivingtypeid').val());
    }



    function findTableCross(v) {
        var result = false;
        var index = -1;
        var rows = document.getElementById("list_table_json_cross").rows;
        for (var i = 1; i < rows.length; i++) {

            if (rows[i].cells[5].innerHTML == v) {
                result = true;
                break;
            }
        }
        return result;
    }

    function setNoCross() {

        var rows = document.getElementById("list_table_json_cross").rows;
        for (var i = 1; i < rows.length; i++) {
            rows[i].cells[0].innerHTML = i;
        }
    }

    function getTableStockCross() {
        var arr = [];
        var rows = document.getElementById("list_table_json_cross").rows;
        for (var i = 1; i < rows.length; i++) {
            arr.push(rows[i].cells[22].innerHTML);
            // alert(arr);
        }

        return arr;

    }

    function closeBloodBlank2() {
        $('#blankModal2').modal('hide');
    }
    //ถุงเลือด
    function setBagNumber(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].bag_number = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    //blood type
    function setBloodType(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].bloodstocktypecross = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    //sub
    function setSub99(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].sub = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    //volume
    // function setVolume(self) {
    //     var row = self.parentNode.parentNode;
    //     var item = JSON.parse(row.cells[22].innerHTML);
    //     item[0].volume = self.value;
    //     row.cells[22].innerHTML = JSON.stringify(item);
    // }

    //bloodstart
    function setBloodstart(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].donation_date_cross = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    //bloodexp
    function setBloodexp(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].donation_exp_cross = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    //imbagtypename
    function setBagtypename(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].bloodbagtype = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    //rfid
    function setRFID(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].rfidcode = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
    }

    var scanrfidcounter = false;

    function setRFIDcode(self) {

        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].rfidcode = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);

        var count = 20;
        if (scanrfidcounter)
            clearInterval(scanrfidcounter);

        scanrfidcounter = setInterval(timer, 100); //1000 will  run it every 1 second

        function timer() {

            console.log("=======");
            count = count - 1;

            if (count <= 0) {
                clearInterval(scanrfidcounter);
                row.cells[7].children[0].focus();
                return;
            }
        }

    }



    function setRubberbandnumber(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].rubberbandnumber = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);

    }

    function setVolume2(self) {
        console.log('******');
        var v = $(self).val();
        var c = Math.round(v);
        if (c == 0)
            c = "";
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].volume = c;
        row.cells[22].innerHTML = JSON.stringify(item);
        // console.log('DEV');     
        // console.log(item);     
        // console.log(row.cells[22]); 
        // $(self).val(c);
        console.log(c);
    }


    function setBloodgroupConfirm(self, index) {
        console.log("********");

        var body = document.getElementById("list_table_json_cross").getElementsByTagName('tbody')[0];

        var countIndex = 0;
        var bloodgroup = '';
        $.each(body.children, function(ind, vl) {

            if (countIndex == index) {
                var item = JSON.parse(vl.children[22].innerHTML);
                item[0].bloodgroupcrossconfirm = self.value;
                bloodgroup = item[0].bloodgroupcross;
                vl.children[22].innerHTML = JSON.stringify(item);
            }

            countIndex++;
        });

        console.log(bloodgroup);
        console.log(self.value);

        if (bloodgroup != '') {
            if (bloodgroup != self.value && self.value != "") {
                swal({
                    title: 'หมู่เลือดไม่ตรง',
                    type: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(value => {
                    setDataModalSelectValue(self.id, "", '');
                });



            }
        }

        /*
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.children[22].innerHTML);
        item[0].bloodgroupcrossconfirm = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);
        // chk = item.val();

        val = $('#bloodgroupcross').val();
        if (val != '') {
            if (val != self.value && self.value != "") {
                swal({
                    title: 'หมู่เลือดไม่ตรง',
                    type: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(value => {
                    setDataModalSelectValue(self.id, "", '');
                });

                

            }
        }
        */
        // console.log(val);
        // console.log(self.value);
    }

    function setRfidConfirm(self) {
        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].bloodrhcrossconfirm = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);

        val = $('#bloodrhcross').val();
        if (val != '') {
            if (val != self.value) {
                errorSwal2('Rhไม่ตรง');

                $(self).val('');
                // $(this).val('');

            }
        }

    }



    function deleteRowCross(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        setNoCross();
    }



    function scanBagNumberModal2() {
        var bag_number = $('#bag_number').val();
        var sub = $('#sub').val();
        var bag_number_new = numnerPoint(bag_number);
        $('#bag_number').val(bag_number_new);


        if (bag_number_new.length == 14) {

            document.getElementById("rfidcode").focus();

            if (!$('#bloodstocktypecross').val()) {
                swal({
                    title: 'กรุณาเลือกชนิดเลือดก่อน',
                    type: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(value => {
                    document.getElementById("bag_number").value = '';
                    document.getElementById("bloodstocktypecross").focus();
                });
                return false;
            }
            var bloodstocktypecross = $('#bloodstocktypecross').val();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data/masterdata/findbagnumber.php?bag_number=' + bag_number_new + '&sub=' + sub +
                    '&bloodtype=' + bloodstocktypecross,
                success: function(data) {

                    var obj = data.data;

                    if (obj.length > 0) {
                        bugmsg = 'หมายเลขถุง ' + bag_number_new + '\n ชนิดเลือด ' + bloodstocktypecross +
                            '\n Sub ' + sub + ' มีการรับเข้าคลังแล้ว';
                        bagNumberMsg();
                        addstatus = false;
                    } else {
                        addstatus = true;
                    }
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }

    }

    function setBagNumberModalTable(self, index) {

        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].bag_number = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);

        var bag_number = self.value;
        var sub = item[0].sub;
        var bag_number_new = numnerPoint(bag_number);
        self.value = bag_number_new;
        checkBagNumberModalTable(bag_number_new, sub, self);

        if (bag_number_new.length == 14) {
            setTimeout(function() {
                if (checkDuplicateBagNumber('bag_number') && $("#bloodstockmainid").val() == "") {

                    swal({
                        title: 'หมายเลขถุงซ้ำ',
                        type: 'warning',
                        icon: "warning",
                        confirmButtonText: 'ตกลง',
                        allowOutsideClick: false
                    }).then(value => {
                        self.value = "";
                        item[0].bag_number = "";
                        row.cells[22].innerHTML = JSON.stringify(item);

                    });

                } else {
                    var bloodtype = row.cells[3].innerHTML;
                    if (bloodtype == "SDR" || bloodtype == "LDPRC" || bloodtype == "LDSDR" || bloodtype == "LPRC" || bloodtype == "LPRC-O" || bloodtype == "PRC") {
                        row.cells[5].children[0].focus();
                    } else {
                        row.cells[6].children[0].focus();
                    }

                }
            }, 200);

        }

    }

    function setBagNumberModalTable2(self) {

        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[22].innerHTML);
        item[0].sub = self.value;
        row.cells[22].innerHTML = JSON.stringify(item);

        var bag_number = item[0].bag_number;
        var sub = self.value;
        checkBagNumberModalTable(bag_number, sub, self);

    }

    function checkBagNumberModalTable(bag_number2, sub, self) {
        var bag_number_new2 = bag_number2;
        if (bag_number_new2.length == 14) {

            // if (!$('#bloodstocktypecross').val()) {
            //     swal({
            //         title: 'กรุณาเลือกชนิดเลือดก่อน',
            //         type: 'warning',
            //         confirmButtonText: 'OK',
            //         allowOutsideClick: false
            //     }).then(value => {
            //         self.value = '';
            //         document.getElementById("bloodstocktypecross").focus();
            //     });
            //     return false;

            // }
            var bloodstocktypecross = $('#bloodstocktypecross').val();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data/masterdata/findbagnumber.php?bag_number=' + bag_number_new2 + '&sub=' + sub +
                    '&bloodtype=' + bloodstocktypecross,
                success: function(data) {

                    var obj = data.data;

                    if (obj.length > 0) {

                        self.value = '';
                        var row = self.parentNode.parentNode;
                        var item = JSON.parse(row.cells[22].innerHTML);
                        item[0].bag_number = '';
                        row.cells[22].innerHTML = JSON.stringify(item);

                        bugmsg = 'หมายเลขถุง ' + bag_number_new2 + '\n ชนิดเลือด ' + bloodstocktypecross +
                            '\n Sub ' + sub + ' มีการรับเข้าคลังแล้ว';
                        bagNumberMsgSelf(self);
                        addstatus = false;
                    } else {
                        addstatus = true;
                    }
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }
    }



    function bagNumberMsg() {
        swal({
            title: bugmsg,
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            document.getElementById("sub").focus();
        });
    }

    function bagNumberMsgSelf(self) {
        swal({
            title: bugmsg,
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            self.focus();
        });
    }

    function expDate(type, date) {
        var dateNow = dateExp(type, date);
        $('#donation_exp_cross').val(getDMY(dateNow));
    }

    function setReceivingTypeID(receivingtypeid = '') {

        if (receivingtypeid == 2 || receivingtypeid == 3 || receivingtypeid == 12) {
            document.getElementById("dex1").hidden = true;
            document.getElementById("dex2").hidden = false;
            document.getElementById("divShowBloodBorrow").style.display = "block";
            document.getElementById("divShowHn").style.display = "block";
            document.getElementById("divShowPatientFullname").style.display = "block";
            document.getElementById("divShowAntigen").style.display = "block";
        } else if (receivingtypeid == 1 || receivingtypeid == 5 || receivingtypeid == 6 || receivingtypeid == 11) {
            document.getElementById("dex1").hidden = true;
            document.getElementById("dex2").hidden = false;
            document.getElementById("divShowBloodBorrow").style.display = "block";
            document.getElementById("divShowHn").style.display = "none";
            document.getElementById("divShowPatientFullname").style.display = "none";
            document.getElementById("divShowAntigen").style.display = "none";
        } else if (receivingtypeid == 4) {
            $('#bloodrhcross').val('Rh-');
            $('#bloodrhcross').trigger('change');
            document.getElementById("dex1").hidden = false;
            document.getElementById("dex2").hidden = true;

            document.getElementById("divShowBloodBorrow").style.display = "block";
            document.getElementById("divShowHn").style.display = "block";
            document.getElementById("divShowPatientFullname").style.display = "block";
            document.getElementById("divShowAntigen").style.display = "block";
        } else {
            document.getElementById("dex1").hidden = true;
            document.getElementById("dex2").hidden = false;
            // document.getElementById("divShowBloodBorrow").style.display = "none";
            document.getElementById("divShowHn").style.display = "none";
            document.getElementById("divShowPatientFullname").style.display = "none";
            document.getElementById("divShowAntigen").style.display = "none";
        }
    }
    // donation_date_cross วันเจาะ
    // donation_exp_cross วันหมดอายุ
    function convertBE2() {
        var date_cross = document.getElementById("donation_date_cross").value;

        var bloodstocktypecross = document.getElementById("bloodstocktypecross").value;

        var substr = date_cross.substr(-4, 4);
        var n = substr.includes("/");
        var date = new Date();
        if (n == true) {
            var substr2 = date_cross.substr(-2, 2);
            var test = "25" + substr2;
            var daymounth = date_cross.replace(substr2, "");
            var data = daymounth + "" + "" + test;
            document.getElementById("donation_date_cross").value = data;
            document.getElementById("donation_exp_cross").value = data;

        } else {
            var fullyear = date.getFullYear() + 543;
            var daymounth = date_cross.replace(substr, "");
            var get = fullyear - substr;
            if (get >= 543) {
                var convert = parseInt(substr) + 543;

                var data = daymounth + "" + "" + convert;
                document.getElementById("donation_date_cross").value = data;
                document.getElementById("donation_exp_cross").value = data;
            }
        }

        if (bloodstocktypecross == 'FFP' || bloodstocktypecross == 'CRYO') {
            var substr2 = date_cross.substr(-2, 2);
            var substr3 = parseInt(substr2) + 1;

            var ss1 = date_cross.substr(0, 8) + substr3;
            document.getElementById("donation_exp_cross").value = ss1;
            // alert(ss1);
        }
        // document.getElementById("donation_date_cross").value = "01/01/2564";
    }

    function convertBE3(id, self) {
        var date_cross = self.value;

        var bloodstocktypecross = document.getElementById("bloodstocktypecross").value;

        var substr = date_cross.substr(-4, 4);
        var n = substr.includes("/");
        var date = new Date();
        if (n == true) {
            var substr2 = date_cross.substr(-2, 2);
            var test = "25" + substr2;
            var daymounth = date_cross.replace(substr2, "");
            var data = daymounth + "" + "" + test;
            document.getElementById("donation_date_cross" + id).value = data;
            document.getElementById("donation_exp_cross" + id).value = data;

        } else {
            var fullyear = date.getFullYear() + 543;
            var daymounth = date_cross.replace(substr, "");
            var get = fullyear - substr;
            if (get >= 543) {
                var convert = parseInt(substr) + 543;

                var data = daymounth + "" + "" + convert;
                document.getElementById("donation_date_cross" + id).value = data;
                document.getElementById("donation_exp_cross" + id).value = data;
            }
        }

        if (bloodstocktypecross == 'FFP' || bloodstocktypecross == 'CRYO') {
            var substr2 = date_cross.substr(-2, 2);
            var substr3 = parseInt(substr2) + 1;

            var ss1 = date_cross.substr(0, 8) + substr3;
            document.getElementById("donation_exp_cross" + id).value = ss1;
            // alert(ss1);
        }
        // document.getElementById("donation_date_cross").value = "01/01/2564";
    }

    function setSelectConfirmBloodgroup(elm = "", index) {

        $("#" + elm + index).select2({
            width: "100%",
            theme: "bootstrap",
            templateResult: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                );
                return $state;
            },
            templateSelection: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span >' + strState[0] + '</span>'
                );
                return $state;
            },
        }).on("select2:selecting", function(e) {

            setTimeout(function() {
                $("#rhid" + index).select2('open');
            }, 200);

        });

    }

    function setSelectConfirmRh(elm = "", index) {

        $("#" + elm + index).select2({
            width: "100%",
            theme: "bootstrap",
            templateResult: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                );
                return $state;
            },
            templateSelection: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span >' + strState[0] + '</span>'
                );
                return $state;
            },
        }).on("select2:selecting", function(e) {

            setTimeout(function() {
                $("#volume" + index).focus();
            }, 200);

        });

    }

    function setSelectConfirmType(elm = "", index) {

        $("#" + elm + index).select2({
            width: "100%",
            theme: "bootstrap",
            templateResult: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                );
                return $state;
            },
            templateSelection: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span >' + strState[0] + '</span>'
                );
                return $state;
            },
        }).on("select2:selecting", function(e) {

            setTimeout(function() {
                $("#volume" + index).focus();
            }, 200);

        });

    }



    function newBloodBlank2() {
        window.location.href = 'inventory-blood-bank.php?modal2=1';
    }
</script>