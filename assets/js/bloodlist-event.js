var rowid = '_';

function showLppcModal(index = '', bag_number_lppc = "") {
    rowid = index;
    $('#pc_1').val($('#pc_1' + index).val());
    $('#pc_2').val($('#pc_2' + index).val());
    $('#pc_3').val($('#pc_3' + index).val());
    $('#pc_4').val($('#pc_4' + index).val());
    $('#ffp_5').val($('#ffp_5' + index).val());
    $('#volume_lppc').val($('#lppc' + index).val());
    document.getElementById("btnAddModal").hidden = false;

    if ($('#pc_1').val() == "") {
        var row_pc = searchFindLPPC(bag_number_lppc);
        if (row_pc != '') {
            $('#pc_1').val($('#pc_1' + row_pc).val());
            $('#pc_2').val($('#pc_2' + row_pc).val());
            $('#pc_3').val($('#pc_3' + row_pc).val());
            $('#pc_4').val($('#pc_4' + row_pc).val());
            $('#ffp_5').val($('#ffp_5' + row_pc).val());
            $('#volume_lppc').val($('#lppc' + row_pc).val());

            document.getElementById("btnAddModal").hidden = true;
        } else {
            $('#pc_1').val(bag_number_lppc);
        }

    }

    if ($('#ffp_5').val() == "") {
        $('#ffp_5').val(bag_number_lppc);
    }

    $("#lppcModal").modal("show");

}

function closeLppcModal() {
    $("#lppcModal").modal("hide");

}

function setLppcModal() {


    var value_lppc_1 = $('#pc_1').val();
    var value_lppc_2 = $('#pc_2').val();
    var value_lppc_3 = $('#pc_3').val();
    var volume_lppc = $('#volume_lppc').val();

    if (value_lppc_1.length != 14 || value_lppc_2.length != 14 || value_lppc_3.length != 14) {
        swal({
            title: 'ขออภัยค่ะ!',
            text: 'PC ยังไม่ครบ 3 ถุง',
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
        });

        return false;
    } else if (volume_lppc == "") {
        swal({
            title: 'ขออภัยค่ะ!',
            text: 'กรุณาระบุ Volume',
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
        }).then(function(isConfirm) {
            document.getElementById('volume_lppc').focus();
        });

        return false;
    }


    $('#pc_1' + rowid).val($('#pc_1').val());
    $('#pc_2' + rowid).val($('#pc_2').val());
    $('#pc_3' + rowid).val($('#pc_3').val());
    $('#pc_4' + rowid).val($('#pc_4').val());
    $('#ffp_5' + rowid).val($('#ffp_5').val());
    $('#lppc' + rowid).val(volume_lppc);

    console.log(volume_lppc);

    var pc_count = 0;
    var pc_cel_volume = 0;

    if ($('#pc_1').val() != "") {
        pc_count++;
    }

    if ($('#pc_2').val() != "") {
        pc_count++;
    }

    if ($('#pc_3').val() != "") {
        pc_count++;
    }

    if ($('#pc_4').val() != "") {
        pc_count++;
    }

    pc_cel_volume = parseInt(parseFloat($('#volume_lppc').val()) / pc_count);

    set_bag_number_remark($('#pc_1').val(), 'pc_1', 'lppc', pc_cel_volume);
    set_bag_number_remark($('#pc_2').val(), 'pc_2', 'lppc', pc_cel_volume);
    set_bag_number_remark($('#pc_3').val(), 'pc_3', 'lppc', pc_cel_volume);
    set_bag_number_remark($('#pc_4').val(), 'pc_4', 'lppc', pc_cel_volume);
    set_bag_number_remark($('#ffp_5').val(), 'ffp_5', 'lppc');

    setDateExp(rowid, `lppc`)

    $("#lppcModal").modal("hide");

}

function showLppcPasModal(index = '', bag_number_lppc_pas) {
    rowid = index;
    $('#pc_lppc_pas_1').val($('#pc_lppc_pas_1' + index).val());
    $('#pc_lppc_pas_2').val($('#pc_lppc_pas_2' + index).val());
    $('#pc_lppc_pas_3').val($('#pc_lppc_pas_3' + index).val());
    $('#pc_lppc_pas_4').val($('#pc_lppc_pas_4' + index).val());

    $('#pas_lppc_companypasid').val($('#pas_lppc_companypasid' + index).val());
    $('#pas_lppc_lot_no').val($('#pas_lppc_lot_no' + index).val());
    $('#pas_lppc_exp').val($('#pas_lppc_exp' + index).val());

    if ($('#pc_lppc_pas_1').val() == "") {
        $('#pc_lppc_pas_1').val(bag_number_lppc_pas);
    }

    $("#lppcpasModal").modal("show");
}

function closeLppcPasModal() {
    $("#lppcpasModal").modal("hide");

}

function setLppcPasModal() {

    var value_lppc_pas_1 = $('#pc_lppc_pas_1').val();
    var value_lppc_pas_2 = $('#pc_lppc_pas_2').val();
    var value_lppc_pas_3 = $('#pc_lppc_pas_3').val();
    var volume_lppc_pas = $('#volume_lppc_pas').val();

    if (value_lppc_pas_1.length != 14 || value_lppc_pas_2.length != 14 || value_lppc_pas_3.length != 14) {
        swal({
            title: 'ขออภัยค่ะ!',
            text: 'PC ยังไม่ครบ 3 ถุง',
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
        });

        return false;
    } else if (volume_lppc_pas == "") {
        swal({
            title: 'ขออภัยค่ะ!',
            text: 'กรุณาระบุ Volume',
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
        }).then(function(isConfirm) {
            document.getElementById('volume_lppc_pas').focus();
        });

        return false;
    }

    $('#pc_lppc_pas_1' + rowid).val($('#pc_lppc_pas_1').val());
    $('#pc_lppc_pas_2' + rowid).val($('#pc_lppc_pas_2').val());
    $('#pc_lppc_pas_3' + rowid).val($('#pc_lppc_pas_3').val());
    $('#pc_lppc_pas_4' + rowid).val($('#pc_lppc_pas_4').val());
    $('#pas_lppc_companypasid' + rowid).val($('#pas_lppc_companypasid').val());
    $('#pas_lppc_lot_no' + rowid).val($('#pas_lppc_lot_no').val());
    $('#pas_lppc_exp' + rowid).val($('#pas_lppc_exp').val());
    $('#lppc_pas' + rowid).val(volume_lppc_pas);

    var pc_count = 0;
    var pc_cel_volume = 0;

    if ($('#pc_lppc_pas_1').val() != "") {
        pc_count++;
    }

    if ($('#pc_lppc_pas_2').val() != "") {
        pc_count++;
    }

    if ($('#pc_lppc_pas_3').val() != "") {
        pc_count++;
    }

    if ($('#pc_lppc_pas_4').val() != "") {
        pc_count++;
    }

    pc_cel_volume = parseInt(parseFloat($('#volume_lppc_pas').val()) / pc_count);

    console.log(pc_cel_volume);

    set_bag_number_remark($('#pc_lppc_pas_1').val(), 'pc_lppc_pas_1', 'lppc_pas', pc_cel_volume);
    set_bag_number_remark($('#pc_lppc_pas_2').val(), 'pc_lppc_pas_2', 'lppc_pas', pc_cel_volume);
    set_bag_number_remark($('#pc_lppc_pas_3').val(), 'pc_lppc_pas_3', 'lppc_pas', pc_cel_volume);
    set_bag_number_remark($('#pc_lppc_pas_4').val(), 'pc_lppc_pas_4', 'lppc_pas', pc_cel_volume);

    setDateExp(rowid, `lppc_pas`)

    $("#lppcpasModal").modal("hide");

}

function showSdpPasModal(index = '') {
    rowid = index;
    $('#sdp_sdp_pas_1').val($('#sdp_sdp_pas_1' + index).val());
    $('#sdp_pas_pas_2').val($('#sdp_pas_pas_2' + index).val());

    $('#pas_sdp_companypasid').val($('#pas_sdp_companypasid' + index).val());
    $('#pas_sdp_lot_no').val($('#pas_sdp_lot_no' + index).val());
    $('#pas_sdp_exp').val($('#pas_sdp_exp' + index).val());


    $("#sdppasModal").modal("show");

}

function closeSdpPasModal() {
    $("#sdppasModal").modal("hide");

}

function setSdpPasModal() {
    $('#sdp_sdp_pas_1' + rowid).val($('#sdp_sdp_pas_1').val());
    $('#sdp_pas_pas_2' + rowid).val($('#sdp_pas_pas_2').val());
    $('#pas_sdp_companypasid' + rowid).val($('#pas_sdp_companypasid').val());
    $('#pas_sdp_lot_no' + rowid).val($('#pas_sdp_lot_no').val());
    $('#pas_sdp_exp' + rowid).val($('#pas_sdp_exp').val());
    $("#sdppasModal").modal("hide");

    set_bag_number_remark($('#sdp_sdp_pas_1').val(), 'sdp_sdp_pas_1', 'lppc_pas');

}

function set_bag_number_remark(bag_number = '', bag_number_name = '', state = 'lppc', volume = '') {
    if (bag_number.length == 14) {
        findIndex(bag_number, bag_number_name, state, volume);
    }
}


function set_bag_number(bag_number_name = '') {

    var bag_number = $('#' + bag_number_name).val();
    var bag_number_new = numnerPoint(bag_number);
    $('#' + bag_number_name).val(bag_number_new);


    var blood_group_index = document.getElementById('blood_group_' + rowid).value;

    if (bag_number_new.length == 14) {
        if (!document.getElementById('bloodstatusid' + bag_number_new)) {
            swal({
                title: 'ขออภัยค่ะ!',
                text: 'ไม่พบผลิตภัณฑ์นี้',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#' + bag_number_name).val("");
                    document.getElementById(bag_number_name).focus();
                }
            });
        } else if (document.getElementById('bloodstatusid' + bag_number_new).value == 4) {
            swal({
                title: 'ขออภัยค่ะ!',
                text: 'ผลิตภัณฑ์มีการติดเชื้อ',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#' + bag_number_name).val("");
                    document.getElementById(bag_number_name).focus();
                }
            });
        } else if (document.getElementById('bloodstatusid' + bag_number_new).value != 3) {
            swal({
                title: 'ขออภัยค่ะ!',
                text: 'ผลิตภัณฑ์ยังไม่พร้อมจ่าย',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#' + bag_number_name).val("");
                    document.getElementById(bag_number_name).focus();
                }
            });
        } else if ((bag_number_name == "pc_1" || bag_number_name == "pc_2" || bag_number_name == "pc_3" || bag_number_name == "pc_4") && document.getElementById('pcused' + bag_number_new).value == 1) {
            swal({
                title: 'ขออภัยค่ะ!',
                text: 'ผลิตภัณฑ์นี้รับเข้าคลังแล้ว',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#' + bag_number_name).val("");
                    document.getElementById(bag_number_name).focus();
                }
            });
        } else if (bag_number_name == "ffp_5" && document.getElementById('ffpused' + bag_number_new).value == 1) {
            swal({
                title: 'ขออภัยค่ะ!',
                text: 'ผลิตภัณฑ์นี้รับเข้าคลังแล้ว',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#' + bag_number_name).val("");
                    document.getElementById(bag_number_name).focus();
                }
            });
        } else if (blood_group_index != document.getElementById('blood_group_' + bag_number_new).value) {
            swal({
                title: 'ขออภัยค่ะ!',
                text: 'หมู่เลือดไม่ตรงกัน',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#' + bag_number_name).val("");
                    document.getElementById(bag_number_name).focus();
                }
            });
        }


    }

}


function findIndex(bag_number = '', bag_number_name = '', state = 'lppc', volome = '') {

    if (document.getElementById('bag_number_' + bag_number)) {
        var v = document.getElementById('bag_number_' + bag_number).value;
        if (bag_number_name == 'sdp_sdp_pas_1') {
            setDataModalSelectValue('sdpremark' + v, 8, '[8] ทำ SDP(PAS)');
            // document.getElementById('sdpremark'+v).disabled = true;
            setRFIDColor(document.getElementById('sdprfid' + v));
        } else if (bag_number_name == 'ffp_5') {
            setDataModalSelectValue('ffpremark' + v, 4, '[4] ทำ LPPC');
            setDateExp(v, `ffp`);
            // document.getElementById('ffpremark'+v).disabled = true;
            setRFIDColor(document.getElementById('ffprfid' + v));
        } else if ((bag_number_name == 'pc_1') || (bag_number_name == 'pc_2') || (bag_number_name == 'pc_3') || (bag_number_name == 'pc_4')) {
            setDataModalSelectValue('pcremark' + v, 4, '[4] ทำ LPPC');
            // document.getElementById('pcremark'+v).disabled = true;
            setRFIDColor(document.getElementById('pcrfid' + v));
            setDateExp(v, `pc`);
            document.getElementById('pc' + v).value = volome;
        } else if ((bag_number_name == 'pc_lppc_pas_1') || (bag_number_name == 'pc_lppc_pas_2') || (bag_number_name == 'pc_lppc_pas_3') || (bag_number_name == 'pc_lppc_pas_4')) {
            setDataModalSelectValue('pcremark' + v, 7, '[7] ทำ LPPC(PAS)');
            // document.getElementById('pcremark'+v).disabled = true;
            setRFIDColor(document.getElementById('pcrfid' + v));
            document.getElementById('pc' + v).value = volome;
            setDateExp(v, `pc`);
        }

        if (state == 'lppc') {
            setDataModalSelectValue('lppc_pasremark' + v, 9, '[9] ไม่ทำ');
            // document.getElementById('lppc_pasremark'+v).disabled = true;
            setRFIDColor(document.getElementById('lppc_pasrfid' + v));


            if (rowid != v) {
                setDataModalSelectValue('lppcremark' + v, 9, '[9] ไม่ทำ');
                // document.getElementById('lppcremark'+v).disabled = true;
                setRFIDColor(document.getElementById('lppcrfid' + v));
            }

        } else {
            setDataModalSelectValue('lppcremark' + v, 9, '[9] ไม่ทำ');
            // document.getElementById('lppcremark'+v).disabled = true;
            setRFIDColor(document.getElementById('lppcrfid' + v));

            if (rowid != v) {
                setDataModalSelectValue('lppc_pasremark' + v, 9, '[9] ไม่ทำ');
                // document.getElementById('lppc_pasremark'+v).disabled = true;
                setRFIDColor(document.getElementById('lppc_pasrfid' + v));
            }
        }





    }

}


function chActiveTable(id) {
    var countTable = parseInt($('#countblood2').val());
    for (i = 0; i < countTable; i++) {
        document.getElementById("table" + i).style.background = "#FFF";
        document.getElementById("rubberbandnumberTd" + i).style.background = "#FFF";

    }
    document.getElementById("table" + id).style.background = "#b7e4eb";
    document.getElementById("rubberbandnumberTd" + id).style.background = "#b7e4eb";

}

function setRFIDColor(self) {
    /*
    if(self.value != '0')
    {
        self.disabled = true;
        self.classList.add("color99");
    }else
    {
       self.disabled = false;
       self.classList.remove("color99");
    }
    */

    console.log("=========");
    console.log(self);

    if (self) {
        var rfid = document.getElementById(self.name.replace("remark", "rfid"));
        setRFID(self, rfid, numberR(self.name));
    }


}

function searchFindLPPC(number = '') {
    var state = false;
    var rowTable = '';
    var rows = document.getElementById("list_table_json").rows;

    var rowIndex = 0;
    for (var i = 3; i < rows.length; i++) {

        if (rows[i].cells[7].innerText.length > 0) {
            var pc_row = rows[i].cells[7].children[0].children[0].children[1].children[0];
            if (
                pc_row.children[0].value == number ||
                pc_row.children[1].value == number ||
                pc_row.children[2].value == number ||
                pc_row.children[3].value == number ||
                pc_row.children[4].value == number
            ) {
                rowTable = rowIndex
                state
            }
        }

        rowIndex++;

    }
    return rowTable;

}