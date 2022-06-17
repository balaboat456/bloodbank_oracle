"use strict";

var bloodQueueCheckState = true; // 1_1;
var bloodQueueConfirmState = true; //tab 1_4
var bloodQueueUsedWaitState = true; //tab 2_1
var bloodQueueUsedReadyState = true; //tab 2_2

function loadTableBloodQueueWaitUsed() {
    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';
    hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }

    userconfirm().then(
        function success(userconfirmdata) {
            $.ajax({
                url: 'data/bloodqueue/bloodqueue-bloodused-wait.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
                dataType: 'json',
                type: 'get',
                success: function success(data) {
                    var value_request_prc = 0;
                    var value_request_lprc = 0;
                    var value_request_ldprc = 0;
                    var value_request_pc = 0;
                    var value_request_lppc = 0;
                    var value_request_ldppc = 0;
                    var value_request_cryo = 0;
                    var value_request_sdp = 0;
                    var value_request_ffp = 0;
                    var value_request_crp = 0;
                    var value_request_lprc_o = 0;
                    var body = document.getElementById("blood-queue-tab2-1").getElementsByTagName('tbody')[0];

                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }


                    $("#blood-queue-tab-2-1").text(data.total);

                    var requestbloodid = "";
                    var requestbloodColor = false;
                    var requestbloodBloodType = "";
                    var background_color = ""
                    var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                    $.each(obj, function(index, value) {
                        var event_data = '';

                        if (requestbloodid != value.requestbloodid) {
                            requestbloodColor = !requestbloodColor;
                            requestbloodid = value.requestbloodid;
                            requestbloodBloodType = value.bloodstocktypenamegroup;
                        }

                        var color = '';
                        var statusreadonlycc = "";

                        if (parseInt(value.mostandunstatus) > 0) {
                            color = 'background-color:#F39;';

                        } else if (parseInt(value.mostandunstatus2) > 0) {
                            color = 'background-color:#FFFF00;';
                        }

                        if (requestbloodColor) {
                            background_color = "background-color:#E5E7E9;"
                        } else {
                            background_color = "background-color:#F8F9F9;"
                        }

                        var statusreadonlycc = "";
                        if (value.patientage > parseInt(15)) statusreadonlycc = ' readonly ';
                        var arr = [value];
                        event_data += '<tr  id="row2_1' + (index + 2) + '" style="' + ((color == '') ? background_color : color) + '" >';
                        event_data += '<td class="td-table"  style="display:none;" >';
                        event_data += JSON.stringify(arr);
                        event_data += '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<input disabled type="checkbox"  onchange="setBloodQueueCheckTab2_1(this)" >';
                        event_data += '</td>';
                        event_data += '<td class="td-table">' + getDMY2(value.confirmbloodgroupqueuedate) + ' ' + value.confirmbloodgroupqueuetime + '</td>';
                        event_data += '<td class="td-table" style="display:none;">' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                        event_data += '<td class="td-table">' + value.hn + '</td>';
                        event_data += '<td class="td-table" style="text-align:left">' + value.patientfullname + '</td>';
                        // event_data += '<td class="td-table">' +  value.unitofficename1  + '</td>';
                        event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';

                        event_data += '<td class="td-table">' + requestbloodBloodType + '</td>';
                        event_data += '<td class="td-table">' + value.cm_bloodgroup + '</td>';
                        event_data += '<td class="td-table">' + getDMY2(value.usedblooddatefrom) + ' - ' + getDMY2(value.usedblooddateto) + '</td>';
                        event_data += '<td class="td-table">' + value.cm_bloodtype + '</td>';
                        event_data += '<td class="td-table">' + (parseInt(value.count_bloodtype) - parseInt(value.count_used)) + '</td>';
                        event_data += '<td class="td-table" style="display:none;">' + ((value.patientage <= parseInt(15)) ? value.volume : '-') + '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<input readonly type="number"  style="width:50px" onkeyup="setBloodRequestUnitTab2_1(this,' + (parseInt(value.count_bloodtype) - parseInt(value.count_used)) + ')" min="1" max="' + (parseInt(value.count_bloodtype) - parseInt(value.count_used)) + '" />';
                        event_data += '</td>';
                        event_data += '<td class="td-table" >';
                        event_data += '<input readonly type="number" style="width:50px" onkeyup="setBloodRequestCCTab2_1(this,`' + value.volume + '`)"  />';
                        event_data += '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<input type="text" class="date1" style="width:120px" onchange="setBloodConfirmBloodreQuestDateTab2_1(this)" onkeyup="setBloodConfirmBloodreQuestDateTab2_1(this)" />';
                        event_data += '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<input type="text" style="width:60px" onkeyup="setBloodConfirmBloodreQuestTimeTab2_1(this)" />';
                        event_data += '</td>';
                        event_data += '<td class="td-table">' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<select disabled id="userbloodqueue21' + index + '"  onchange="setUserConfirmTab2_1(this)"  ';
                        event_data += 'value="" class="form-control form-control-sm" select2"   > '
                        event_data += '<option  value=""></option>'
                        $.each(userconfirmdata.data, function(ind, v) {
                            event_data += '<option ' + ((session_staffid == v.id) ? 'selected' : '') + '  value="' + v.id + '">' + v.name + ' ' + v.surname + '|' + v.code + '</option>'
                        })
                        event_data += ' </select>';
                        event_data += '</td>';
                        event_data += '</tr>';
                        var arrayStock = value.arr_blood.split(",");
                        var arrayStock2 = value.bloodstocktypenamegroup.split(",");
                        var arrayStock3 = value.arr_qtyblood.split(",");
                        var position = 0;

                        if (value.cm_bloodtype == 'PRC') {
                            value_request_prc += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'LPRC') {
                            value_request_lprc += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'LDPRC') {
                            value_request_ldprc += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'PC') {
                            value_request_pc += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'LPPC') {
                            value_request_lppc += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'LDPPC') {
                            value_request_ldppc += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'CRYO') {
                            value_request_cryo += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'SDP') {
                            value_request_sdp += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'FFP') {
                            value_request_ffp += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'CRP') {
                            value_request_crp += parseInt((value.count_bloodtype - value.count_used));
                        } else if (value.cm_bloodtype == 'LPRC-O') {
                            value_request_lprc_o += parseInt((value.count_bloodtype - value.count_used));
                        }

                        $("#blood-queue-tab2-1").append(event_data);

                        $("#userbloodqueue21" + index).select2({
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
                        });

                        setDataModalSelectValue('userbloodqueue21' + index, session_staffid, session_fullname);


                    });
                    var event_data2 = '';
                    event_data2 += '<table class="thicker position-bottom"  style="width:100%" >';
                    event_data2 += '<tr style="background: #e7fded;">';
                    event_data2 += '<td class="td-table">PRC</td>'; //PRC

                    event_data2 += '<td class="td-table">' + value_request_prc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LPRC</td>'; //LPRC

                    event_data2 += '<td class="td-table">' + value_request_lprc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LDPRC</td>'; //LDPRC

                    event_data2 += '<td class="td-table">' + value_request_ldprc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">PC</td>'; //PC

                    event_data2 += '<td class="td-table">' + value_request_pc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LPPC</td>'; //LPPC

                    event_data2 += '<td class="td-table">' + value_request_lppc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LDPPC</td>'; //LDPPC

                    event_data2 += '<td class="td-table">' + value_request_ldppc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">CRYO</td>'; //CRYO

                    event_data2 += '<td class="td-table">' + value_request_cryo + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">SDP</td>'; //SDP

                    event_data2 += '<td class="td-table">' + value_request_sdp + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">FFP</td>'; //FFP

                    event_data2 += '<td class="td-table">' + value_request_ffp + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">CRP</td>'; //CRP

                    event_data2 += '<td class="td-table">' + value_request_crp + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LPRC-O</td>'; //LPRC-O

                    event_data2 += '<td class="td-table">' + value_request_lprc_o + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '</tr>';

                    $("#tab2-1").html(event_data2);
                    dateBE('.date1');
                },
                error: function error(d) {
                    console.log("error");
                    // alert("404. Please wait until the File is Loaded.");
                }
            });
        });
}

function loadTableBloodQueueUsedReady() {

    document.getElementById("findbloodstocktype").disabled = true;
    document.getElementById("findbagnumber").disabled = true;

    setDataModalSelectValue('findbloodstocktype', null, '');
    document.getElementById("findbagnumber").value = '';

    console.log("****3*****");
    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';
    hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }

    userconfirm().then(
        function success(userconfirmdata) {
            $.ajax({
                url: 'data/bloodqueue/bloodqueue-bloodused-ready.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
                dataType: 'json',
                type: 'get',
                success: function success(data) {
                    var value_request_prc = 0;
                    var value_request_lprc = 0;
                    var value_request_ldprc = 0;
                    var value_request_pc = 0;
                    var value_request_lppc = 0;
                    var value_request_ldppc = 0;
                    var value_request_cryo = 0;
                    var value_request_sdp = 0;
                    var value_request_ffp = 0;
                    var value_request_crp = 0;
                    var value_request_lprc_o = 0;
                    var body = document.getElementById("blood-queue-tab2-2").getElementsByTagName('tbody')[0];

                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }

                    var requestbloodid = "";
                    var requestbloodColor = false;
                    var background_color = "";
                    var requestbloodBloodType = "";


                    $("#blood-queue-tab-2-2").text(data.total);
                    var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                    $.each(obj, function(index, value) {
                        var event_data = '';
                        if (requestbloodid != value.requestbloodid) {
                            requestbloodColor = !requestbloodColor;
                            requestbloodid = value.requestbloodid;
                            requestbloodBloodType = value.bloodstocktypenamegroup;
                        }

                        if (requestbloodColor) {

                            background_color = "background-color:#E5E7E9;"
                        } else {
                            background_color = "background-color:#F8F9F9;"
                        }

                        var arr = [value];
                        event_data += '<tr  id="row2_2' + (index + 2) + '" style="' + background_color + '" >';
                        event_data += '<td class="td-table"  style="display:none;">';
                        event_data += JSON.stringify(arr);
                        event_data += '</td>';
                        event_data += '<td class="td-table">' + getDMY(value.confirmbloodrequestdate) + ' ' + value.confirmbloodrequesttime + '</td>';
                        event_data += '<td class="td-table" style="display:none;">' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                        event_data += '<td class="td-table">' + value.hn + '</td>';
                        event_data += '<td class="td-table" style="text-align:left">' + value.patientfullname + '</td>';
                        // event_data += '<td class="td-table">' +  value.unitofficename1  + '</td>';
                        event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 16) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';

                        event_data += '<td class="td-table">' + requestbloodBloodType + '</td>';
                        event_data += '<td class="td-table">' + value.cm_bloodtype + '</td>';
                        event_data += '<td class="td-table">' + value.bloodrequestunit + '</td>';
                        event_data += '<td class="td-table">' + value.bloodrequestcc + '</td>';
                        event_data += '<td class="td-table">' + value.cm_bag_number + '</td>';
                        event_data += '<td class="td-table">' + value.crossmacthresultname + '</td>';
                        event_data += '<td class="td-table"><input disabled type="checkbox" onchange="setBloodQueueCheckTab2_2(this)"  /> </td>';
                        event_data += '<td class="td-table"><input type="text" onkeyup="setBloodQueueBeaconTab2_2(this)"   /></td>';
                        event_data += '<td class="td-table"><input type="text" onkeyup="setBloodQueueRFIDTab2_2(this)" value="' + value.bloodstockrfid + '" ' + ((value.bloodstockrfid != '') ? 'readonly' : '') + '   /></td>';
                        event_data += '<td class="td-table" >' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<select disabled id="userbloodqueue22' + index + '"  onchange="setUserConfirmTab2_2(this)"  ';
                        event_data += 'value="" class="form-control form-control-sm" select2"   > '
                        event_data += '<option  value=""></option>'
                        $.each(userconfirmdata.data, function(ind, v) {
                            event_data += '<option ' + ((session_staffid == v.id) ? 'selected' : '') + '  value="' + v.id + '">' + v.name + ' ' + v.surname + '|' + v.code + '</option>'
                        })
                        event_data += ' </select>';
                        event_data += '</td>';
                        event_data += '</tr>';
                        var arrayStock = value.bloodtypeid_request.split(",");
                        var arrayStock2 = value.bloodstocktypenamegroup.split(",");
                        var arrayStock3 = value.qtyblooditem_request.split(",");
                        var position = 0;
                        $.each(arrayStock2, function(inx, v) {
                            if (arrayStock3[position] == '') {
                                arrayStock3[position] = 0;
                            }

                            if (arrayStock[position] == 'PRC') {
                                value_request_prc += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'LPRC') {
                                value_request_lprc += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'LDPRC') {
                                value_request_ldprc += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'PC') {
                                value_request_pc += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'LPPC' || arrayStock[position] == 'LPPC_PAS') {
                                value_request_lppc += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'LDPPC' || arrayStock[position] == 'LDPPC_PAS') {
                                value_request_ldppc += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'CRYO') {
                                value_request_cryo += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'SDP') {
                                value_request_sdp += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'FFP') {
                                value_request_ffp += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'CRP') {
                                value_request_crp += parseInt(arrayStock3[position]);
                            } else if (arrayStock[position] == 'LPRC-O') {
                                value_request_lprc_o += parseInt(arrayStock3[position]);
                            }

                            position++;
                        });


                        $("#blood-queue-tab2-2").append(event_data);

                        $("#userbloodqueue22" + index).select2({
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
                        });

                        setDataModalSelectValue('userbloodqueue22' + index, session_staffid, session_fullname);

                    });
                    var event_data2 = '';
                    event_data2 += '<table class="thicker position-bottom"  style="width:100%" >';
                    event_data2 += '<tr style="background: #e7fded;">';
                    event_data2 += '<td class="td-table">PRC</td>'; //PRC

                    event_data2 += '<td class="td-table">' + value_request_prc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LPRC</td>'; //LPRC

                    event_data2 += '<td class="td-table">' + value_request_lprc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LDPRC</td>'; //LDPRC

                    event_data2 += '<td class="td-table">' + value_request_ldprc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">PC</td>'; //PC

                    event_data2 += '<td class="td-table">' + value_request_pc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LPPC</td>'; //LPPC

                    event_data2 += '<td class="td-table">' + value_request_lppc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LDPPC</td>'; //LDPPC

                    event_data2 += '<td class="td-table">' + value_request_ldppc + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">CRYO</td>'; //CRYO

                    event_data2 += '<td class="td-table">' + value_request_cryo + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">SDP</td>'; //SDP

                    event_data2 += '<td class="td-table">' + value_request_sdp + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">FFP</td>'; //FFP

                    event_data2 += '<td class="td-table">' + value_request_ffp + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">CRP</td>'; //CRP

                    event_data2 += '<td class="td-table">' + value_request_crp + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '<td class="td-table">LPRC-O</td>'; //CRP

                    event_data2 += '<td class="td-table">' + value_request_lprc_o + '</td>';
                    event_data2 += '<td class="td-table">Unit</td>';
                    event_data2 += '</tr>';

                    $("#tab2-2").html(event_data2);
                    dateBE('.date1');
                },
                error: function error(d) {
                    console.log("error");
                    // alert("404. Please wait until the File is Loaded.");
                }
            });
        });
}

function loadTableBloodQueuePay() {
    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';
    var payuser = '';

    var value_request_prc = 0;
    var value_request_lprc = 0;
    var value_request_ldprc = 0;
    var value_request_pc = 0;
    var value_request_lppc = 0;
    var value_request_ldppc = 0;
    var value_request_cryo = 0;
    var value_request_sdp = 0;
    var value_request_ffp = 0;
    var value_request_crp = 0;
    var value_request_lprc_o = 0;
    var value_request_other = 0;
    var value_request_total = 0;


    var value_no_use_prc = 0;
    var value_no_use_lprc = 0;
    var value_no_use_ldprc = 0;
    var value_no_use_pc = 0;
    var value_no_use_lppc = 0;
    var value_no_use_ldppc = 0;
    var value_no_use_cryo = 0;
    var value_no_use_sdp = 0;
    var value_no_use_ffp = 0;
    var value_no_use_crp = 0;
    var value_no_use_lprc_o = 0;
    var value_no_use_other = 0;
    var value_no_use_total = 0;

    var value_use_prc = 0;
    var value_use_lprc = 0;
    var value_use_ldprc = 0;
    var value_use_pc = 0;
    var value_use_lppc = 0;
    var value_use_ldppc = 0;
    var value_use_cryo = 0;
    var value_use_sdp = 0;
    var value_use_ffp = 0;
    var value_use_crp = 0;
    var value_use_lprc_o = 0;
    var value_use_other = 0;
    var value_use_total = 0;

    var fromwithdate = "";
    var towithdate = "";
    var fromwithtime = "";
    var timewithtime = "";

    var frompaydate = "";
    var topaydate = "";
    var frompaytime = "";
    var timepaytime = "";

    hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
        payuser = $('#payuser').val();

        fromwithdate = dmyToymd2($('#fromwithdate').val());
        towithdate = dmyToymd2($('#towithdate').val());
        fromwithtime = $('#fromwithtime').val();
        timewithtime = $('#towithtime').val();

        frompaydate = dmyToymd2($('#frompaydate').val());
        topaydate = dmyToymd2($('#topaydate').val());
        frompaytime = $('#frompaytime').val();
        timepaytime = $('#topaytime').val();
    }

    // if (fromwithdate != "" && towithdate != "") {
    //     fromdate = "";
    //     todate = "";
    //     requestunit = $('#requestunit').val();
    //     payuser = $('#payuser').val();

    //     fromwithdate = dmyToymd2($('#fromwithdate').val());
    //     towithdate = dmyToymd2($('#towithdate').val());
    //     fromwithtime = $('#fromwithtime').val();
    //     timewithtime = $('#towithtime').val();

    //     frompaydate = "";
    //     topaydate = "";
    //     frompaytime = "";
    //     timepaytime = "";
    // }

    // if (frompaydate != "" && topaydate != "") {
    //     fromdate = "";
    //     todate = "";
    //     requestunit = $('#requestunit').val();
    //     payuser = $('#payuser').val();

    //     fromwithdate = "";
    //     towithdate = "";
    //     fromwithtime = "";
    //     timewithtime = "";

    //     frompaydate = dmyToymd2($('#frompaydate').val());
    //     topaydate = dmyToymd2($('#topaydate').val());
    //     frompaytime = $('#frompaytime').val();
    //     timepaytime = $('#topaytime').val();
    // }

    $.ajax({
        url: 'data/bloodqueue/bloodqueue-bloodused-pay.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit + '&payuser=' + payuser +
            '&fromwithdate=' + fromwithdate + '&towithdate=' + towithdate + '&fromwithtime=' + fromwithtime + '&timewithtime=' + timewithtime +
            '&frompaydate=' + frompaydate + '&topaydate=' + topaydate + '&frompaytime=' + frompaytime + '&timepaytime=' + timepaytime,
        dataType: 'json',
        type: 'get',
        success: function success(data) {
            var body = document.getElementById("blood-queue-tab2-3").getElementsByTagName('tbody')[0];

            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var event_data = '';

            var grouppayid = "";
            var requestbloodColor = false;
            var requestbloodBloodType = "";
            var background_color = ""
            var groupIndex = 1;



            var countPay = 0;
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var groupRequestbloodid = [];


            $.each(obj, function(index, value) {

                groupRequestbloodid.push({
                    requestbloodid: value.requestbloodid,
                    bloodstocktypenamegroup_obj: value.bloodstocktypenamegroup_obj
                });

                if (grouppayid != value.grouppayid) {
                    requestbloodColor = !requestbloodColor;
                    grouppayid = value.grouppayid;
                    requestbloodBloodType = value.bloodstocktypenamegroup;
                    groupIndex = 1;
                    countPay++;
                }

                if (requestbloodColor) {

                    background_color = "background-color:#E5E7E9;"
                } else {
                    background_color = "background-color:#F8F9F9;"
                }




                var arr = [value];
                event_data += '<tr style="' + background_color + '">';
                event_data += '<td class="td-table"   style="display:none;" >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td>';

                if (groupIndex == 1) {
                    event_data += '<button type="button" onclick="setBloodQueuePrint2_3(`' + value.grouppayid + '`)"  class="btn btn-success m-l-5">';
                    event_data += '<i class="fa fa-print"></i>';
                    event_data += '</button>';
                }

                event_data += '</td>';

                event_data += '<td class="td-table">' + (getDMY(value.requestblooddate) + ' ' + value.requestbloodtime) + '</td>';
                event_data += '<td class="td-table">' + (getDMY(value.readyblooddate) + ' ' + value.readybloodtime) + '</td>';
                event_data += '<td class="td-table">' + (getDMY(value.payblooddate) + ' ' + value.paybloodtime) + '</td>';

                event_data += '<td class="td-table">' + (value.hn) + '</td>';
                event_data += '<td class="td-table" style="text-align:left">' + (value.patientfullname) + '</td>';
                event_data += '<td class="td-table">' + (value.confirmbloodgroup) + '</td>';
                event_data += '<td class="td-table">' + (value.confirmrhname3) + '</td>';
                // event_data += '<td class="td-table">' + ( value.unitofficename1 ) + '</td>';
                event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';
                event_data += '<td class="td-table">' + (value.payuser_fullname) + '</td>';
                event_data += '<td class="td-table">' + (value.bloodstocktypenamegroup) + '</td>';
                event_data += '<td class="td-table">' + (value.bloodtype) + '</td>';
                event_data += '<td class="td-table">' + value.count_make + '</td>';
                event_data += '<td class="td-table">' + (value.bloodtype) + '</td>';
                event_data += '<td class="td-table">' + value.count_pay + '</td>';

                event_data += '<td class="td-table">' + (parseInt(value.count_make) - parseInt(value.count_b)) + '</td>';

                event_data += '<td>';
                if (groupIndex == 1) {
                    event_data += '<a style="margin-top: 7px;" onclick="showBloodHistoryPrintPayFormModal(`' + value.grouppayid + '`);" role="button" href="#" class="btn btn-info btn-info-2"><span class="btn-label"><i class="fa fa-history"></i></span>ประวัติการพิมพ์</a>';
                }
                event_data += '</td>';


                event_data += '</tr>';

                groupIndex++;


                if (value.bloodtype == "PRC") {
                    value_use_prc += parseInt(value.count_pay);
                    value_no_use_prc += parseInt(value.count_b);
                } else if (value.bloodtype == "LPRC") {
                    value_use_lprc += parseInt(value.count_pay);
                    value_no_use_lprc += parseInt(value.count_b);
                } else if (value.bloodtype == "LDPRC") {
                    value_use_ldprc += parseInt(value.count_pay);
                    value_no_use_ldprc += parseInt(value.count_b);
                } else if (value.bloodtype == "PC") {
                    value_use_pc += parseInt(value.count_pay);
                    value_no_use_pc += parseInt(value.count_b);
                } else if (value.bloodtype == "LPPC" || value.bloodtype == "LPPC_PAS") {
                    value_use_lppc += parseInt(value.count_pay);
                    value_no_use_lppc += parseInt(value.count_b);
                } else if (value.bloodtype == "LDPPC" || value.bloodtype == "LDPPC_PAS") {
                    value_use_ldppc += parseInt(value.count_pay);
                    value_no_use_ldppc += parseInt(value.count_b);
                } else if (value.bloodtype == "CRYO") {
                    value_use_cryo += parseInt(value.count_pay);
                    value_no_use_cryo += parseInt(value.count_b);
                } else if (value.bloodtype == "SDP") {
                    value_use_sdp += parseInt(value.count_pay);
                    value_no_use_sdp += parseInt(value.count_b);
                } else if (value.bloodtype == "FFP") {
                    value_use_ffp += parseInt(value.count_pay);
                    value_no_use_ffp += parseInt(value.count_b);
                } else if (value.bloodtype == "CRP") {
                    value_use_crp += parseInt(value.count_pay);
                    value_no_use_crp += parseInt(value.count_b);
                } else if (value.bloodtype == "LPRC-O") {
                    value_use_lprc_o += parseInt(value.count_pay);
                    value_no_use_lprc_o += parseInt(value.count_b);
                } else {
                    value_use_other += parseInt(value.count_pay);
                    value_no_use_other += parseInt(value.count_b);
                }

                value_use_total += parseInt(value.count_pay);
                value_no_use_total += parseInt(value.count_b);




            });


            var groupBy = function(xs, key) {
                return xs.reduce(function(rv, x) {
                    (rv[x[key]] = rv[x[key]] || []).push(x);
                    return rv;
                }, {});
            };

            var groubedByData = groupBy(groupRequestbloodid, 'requestbloodid')

            $.each(groubedByData, function(index, value) {

                var objArrayLv1 = value[0].bloodstocktypenamegroup_obj.split(";");

                $.each(objArrayLv1, function(inx, v) {

                    var objArray = v.split(":");

                    if (objArray[0] == "PRC") {
                        value_request_prc += parseInt(objArray[1]);
                    } else if (objArray[0] == "LPRC") {
                        value_request_lprc += parseInt(objArray[1]);
                    } else if (objArray[0] == "LDPRC") {
                        value_request_ldprc += parseInt(objArray[1]);
                    } else if (objArray[0] == "PC") {
                        value_request_pc += parseInt(objArray[1]);
                    } else if (objArray[0] == "LPPC" || objArray[0] == "LPPC_PAS") {
                        value_request_lppc += parseInt(objArray[1]);
                    } else if (objArray[0] == "CRYO") {
                        value_request_cryo += parseInt(objArray[1]);
                    } else if (objArray[0] == "SDP") {
                        value_request_sdp += parseInt(objArray[1]);
                    } else if (objArray[0] == "FFP") {
                        value_request_ffp += parseInt(objArray[1]);
                    } else if (objArray[0] == "CRP") {
                        value_request_crp += parseInt(objArray[1]);
                    } else if (objArray[0] == "LPRC-O") {
                        value_request_lprc_o += parseInt(objArray[1]);
                    } else if (objArray[0] == "LDPPC" || objArray[0] == "LDPPC_PAS") {
                        value_request_ldppc += parseInt(objArray[1]);
                    } else {
                        value_request_other += parseInt(objArray[1]);
                    }

                    value_request_total += parseInt(objArray[1]);


                });





            });

            $("#blood-queue-tab-2-3").text(countPay);

            var event_data2 = '';
            event_data2 += '<table class="thicker position-bottom" style="width:100%">';

            event_data2 += '<tr style="background: aliceblue;">';
            event_data2 += '<td rowspan="2" style="text-align: left; font-size" class="td-table"><font color="#FF4500"><b>จำนวนที่ขอ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' + value_request_total + ' Unit</b></font></td>';
            event_data2 += '<td class="td-table">PRC</td>'; //PRC

            event_data2 += '<td class="td-table">' + value_request_prc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPRC</td>'; //LPRC

            event_data2 += '<td class="td-table">' + value_request_lprc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LDPRC</td>'; //LDPRC

            event_data2 += '<td class="td-table">' + value_request_ldprc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">PC</td>'; //PC

            event_data2 += '<td class="td-table">' + value_request_pc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPPC</td>'; //LPPC

            event_data2 += '<td class="td-table">' + value_request_lppc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LDPPC</td>'; //LDPPC

            event_data2 += '<td class="td-table">' + value_request_ldppc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">CRYO</td>'; //CRYO

            event_data2 += '<td class="td-table">' + value_request_cryo + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '</tr>';
            event_data2 += '<tr style="background: aliceblue;">';
            event_data2 += '<td class="td-table">SDP</td>'; //SDP

            event_data2 += '<td class="td-table">' + value_request_sdp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">FFP</td>'; //FFP

            event_data2 += '<td class="td-table">' + value_request_ffp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">CRP</td>'; //CRP

            event_data2 += '<td class="td-table">' + value_request_crp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPRC-O</td>'; //LPRC-O

            event_data2 += '<td class="td-table">' + value_request_lprc_o + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';

            event_data2 += '<td class="td-table">Other</td>'; //LPRC-O

            event_data2 += '<td class="td-table">' + value_request_other + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';


            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';

            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';

            event_data2 += '</tr>';



            event_data2 += '<tr style="background: #fbdfe4;">';
            event_data2 += '<td rowspan="2" style="text-align: left; font-size" class="td-table"><font color="#FF4500"><b>จำนวนที่ไม่ได้จ่าย &nbsp;: ' + value_no_use_total + ' Unit</b></font></td>';
            event_data2 += '<td class="td-table">PRC</td>'; //PRC

            event_data2 += '<td class="td-table">' + value_no_use_prc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPRC</td>'; //LPRC

            event_data2 += '<td class="td-table">' + value_no_use_lprc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LDPRC</td>'; //LDPRC

            event_data2 += '<td class="td-table">' + value_no_use_ldprc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">PC</td>'; //PC

            event_data2 += '<td class="td-table">' + value_no_use_pc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPPC</td>'; //LPPC

            event_data2 += '<td class="td-table">' + value_no_use_lppc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LDPPC</td>'; //LDPPC

            event_data2 += '<td class="td-table">' + value_no_use_ldppc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">CRYO</td>'; //CRYO

            event_data2 += '<td class="td-table">' + value_no_use_cryo + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '</tr>';
            event_data2 += '<tr style="background: #fbdfe4;">';
            event_data2 += '<td class="td-table">SDP</td>'; //SDP

            event_data2 += '<td class="td-table">' + value_no_use_sdp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">FFP</td>'; //FFP

            event_data2 += '<td class="td-table">' + value_no_use_ffp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">CRP</td>'; //CRP

            event_data2 += '<td class="td-table">' + value_no_use_crp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPRC-O</td>'; //LPRC-O

            event_data2 += '<td class="td-table">' + value_no_use_lprc_o + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';

            event_data2 += '<td class="td-table">Other</td>'; //LPRC-O

            event_data2 += '<td class="td-table">' + value_no_use_other + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';


            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';

            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';

            event_data2 += '</tr>';





            event_data2 += '<tr style="background: #e7fded;">';
            event_data2 += '<td rowspan="2" style="text-align: left; font-size" class="td-table"><font color="#FF4500"><b>จำนวนที่จ่าย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' + value_use_total + ' Unit</b></font></td>';
            event_data2 += '<td class="td-table">PRC</td>'; //PRC

            event_data2 += '<td class="td-table">' + value_use_prc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPRC</td>'; //LPRC

            event_data2 += '<td class="td-table">' + value_use_lprc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LDPRC</td>'; //LDPRC

            event_data2 += '<td class="td-table">' + value_use_ldprc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">PC</td>'; //PC

            event_data2 += '<td class="td-table">' + value_use_pc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPPC</td>'; //LPPC

            event_data2 += '<td class="td-table">' + value_use_lppc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LDPPC</td>'; //LDPPC

            event_data2 += '<td class="td-table">' + value_use_ldppc + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">CRYO</td>'; //CRYO

            event_data2 += '<td class="td-table">' + value_use_cryo + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '</tr>';
            event_data2 += '<tr style="background: #e7fded;">';
            event_data2 += '<td class="td-table">SDP</td>'; //SDP

            event_data2 += '<td class="td-table">' + value_use_sdp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">FFP</td>'; //FFP

            event_data2 += '<td class="td-table">' + value_use_ffp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">CRP</td>'; //CRP

            event_data2 += '<td class="td-table">' + value_use_crp + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';
            event_data2 += '<td class="td-table">LPRC-O</td>'; //LPRC-O

            event_data2 += '<td class="td-table">' + value_use_lprc_o + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';

            event_data2 += '<td class="td-table">Other</td>'; //LPRC-O

            event_data2 += '<td class="td-table">' + value_use_other + '</td>';
            event_data2 += '<td class="td-table">Unit</td>';


            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';

            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';
            event_data2 += '<td class="td-table"></td>';

            event_data2 += '</tr>';
            event_data2 += '<table>';
            $("#event_data2").html(event_data2);

            $("#blood-queue-tab2-3").append(event_data);
            dateBE('.date1');
        },
        error: function error(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadTableBloodQueueBeacon() {
    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';
    hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }

    $.ajax({
        url: 'data/bloodqueue/bloodqueue-bloodused-beacon.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
        dataType: 'json',
        type: 'get',
        success: function success(data) {

            var body = document.getElementById("blood-queue-tab2-5").getElementsByTagName('tbody')[0];

            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var requestbloodid = "";
            var requestbloodColor = false;
            var background_color = ""

            var event_data = '';
            $("#blood-queue-tab-2-5").text(data.total);
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            $.each(obj, function(index, value) {
                var arr = [value];

                if (requestbloodid != value.requestbloodid) {
                    requestbloodColor = !requestbloodColor;
                    requestbloodid = value.requestbloodid;
                }

                if (requestbloodColor) {

                    background_color = "background-color:#E5E7E9;"
                } else {
                    background_color = "background-color:#F8F9F9;"
                }

                event_data += '<tr id="row2_5' + (index + 1) + '" style="' + background_color + '">';
                event_data += '<td class="td-table"  style="display:none;"  >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td class="td-table">' + getDMY(value.payblooddate) + ' ' + value.paybloodtime + '</td>';
                event_data += '<td class="td-table">' + (getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime) + '</td>';
                event_data += '<td class="td-table">' + (value.hn) + '</td>';
                event_data += '<td class="td-table" style="text-align:left">' + (value.patientfullname) + '</td>';

                event_data += '<td class="CellWithComment">' + (value.unitofficename1.substring(0, 18)) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';

                event_data += '<td class="td-table">' + value.bloodtype + '</td>';
                event_data += '<td class="td-table">' + value.cm_bag_number + '</td>';
                event_data += '<td class="td-table">' + value.crossmacthresultname + '</td>';
                event_data += '<td class="td-table">' + value.beaconid + '</td>';
                event_data += '<td class="td-table"> ';

                if (value.beaconid != "") {
                    event_data += '<a style="margin-top: 7px;" onclick="showBeaconTimeLineModal(`' + value.beaconid + '`,`' + value.payblooddate + ' ' + value.paybloodtime + '`);"  role="button" href="#" class="btn btn-info btn-info-1"><span class="btn-label"><i class="fa fa-map-signs"></i></span>ข้อมูลเส้นทาง</a>&nbsp;&nbsp;&nbsp;';
                    event_data += '<a style="margin-top: 7px;" onclick="gotoBeaConMap(`' + value.beaconid + '`);" role="button" href="#" class="btn btn-info btn-info-2"><span class="btn-label"><i class="fa fa-map-marker"></i></span>ตำแหน่งปัจจุบัน</a>';
                }



                event_data += '</td>';


                event_data += '</tr>';

            });

            $("#blood-queue-tab2-5").append(event_data);

        },
        error: function error(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });
}


function loadTableBloodReaderBeacon() {
    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';
    hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
    }

    $.ajax({
        url: 'data/bloodqueue/bloodqueue-checkbeacon.php?fromdate=' + fromdate + '&todate=' + todate,
        dataType: 'json',
        type: 'get',
        success: function success(data) {

            var body = document.getElementById("blood-queue-tab2-6").getElementsByTagName('tbody')[0];

            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';
            $("#blood-queue-tab-2-6").text(data.total);
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            $.each(obj, function(index, value) {
                var arr = [value];

                event_data += '<tr id="row2_6' + (index + 1) + '" >';
                event_data += '<td class="td-table"  style="display:none;"  >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td class="td-table">' + getDMYHM(value.requestbeacontime) + '</td>';
                event_data += '<td class="td-table">' + value.beaconid + '</td>';
                event_data += '<td class="td-table">' + value.beaconname + '</td>';
                event_data += '<td class="td-table">' + value.bloodtype + '</td>';
                event_data += '<td class="td-table">' + value.bag_number + '</td>';
                // event_data += '<td class="td-table">' + value.sub + '</td>';
                // event_data += '<td class="td-table"></td>';
                event_data += '</tr>';

            });

            $("#blood-queue-tab2-6").append(event_data);

        },
        error: function error(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadTableBloodHistoryPrintPay(id) {

    $.ajax({
        url: 'data/bloodqueue/bloodqueue-history-print-pay-form.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function success(data) {

            var body = document.getElementById("list_blood_history_print_pay_modal").getElementsByTagName('tbody')[0];

            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            $.each(obj, function(index, value) {

                event_data += '<tr  >';
                event_data += '<td>';
                event_data += '<button type="button" onclick="setBloodQueueHistoryPayFormPrint(`' + value.requestbloodhistorypaypath + '`)"  class="btn btn-success m-l-5">';
                event_data += '<i class="fa fa-print"> เปิด</i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '<td class="td-table">' + getDMYHM(value.requestbloodhistorypaydate) + '</td>';
                event_data += '<td class="td-table">' + value.fullname + '</td>';
                event_data += '</tr>';

            });

            $("#list_blood_history_print_pay_modal").append(event_data);

        },
        error: function error(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });
}



function setBloodQueueCheckTab2_1(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    row.cells[13].children[0].required = self.checked;

    if (self.checked) {
        row.cells[13].children[0].readOnly = false;
        if (parseInt(item[0].patientage) <= 15) row.cells[14].children[0].readOnly = false;
        row.cells[15].children[0].readOnly = false;
        row.cells[16].children[0].readOnly = false;
        row.cells[18].children[0].disabled = false;
        row.cells[15].children[0].value = getDMY543();
        row.cells[16].children[0].value = getTimeNow();
        item[0].confirmbloodrequestdate = getDMY543();
        item[0].confirmbloodrequesttime = getTimeNow();
    } else {
        row.cells[13].children[0].readOnly = true;
        row.cells[14].children[0].readOnly = true;
        row.cells[15].children[0].readOnly = true;
        row.cells[16].children[0].readOnly = true;
        row.cells[18].children[0].disabled = true;
        row.cells[15].children[0].value = "";
        row.cells[16].children[0].value = "";
        item[0].confirmbloodrequestdate = "";
        item[0].confirmbloodrequesttime = "";
    }

    item[0].isreadyblood = self.checked;



    row.cells[0].innerHTML = JSON.stringify(item);
}

function setBloodRequestUnitTab2_1(self, valueMax) {

    var v = '';
    if (valueMax >= self.value && self.value > parseInt(0)) {
        v = self.value;
    }

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    row.cells[0].innerHTML = JSON.stringify(item);

    if (valueMax >= self.value && self.value > parseInt(0)) {
        row.cells[11].innerHTML = parseInt(valueMax) - parseInt(((self.value == "") ? "0" : self.value));
    } else {
        row.cells[11].innerHTML = parseInt(valueMax);
    }

    item[0].bloodrequestunit = v;
    self.value = v;
    row.cells[0].innerHTML = JSON.stringify(item);



}

function setBloodRequestCCTab2_1(self, valueMax) {
    var v = '';
    valueMax = parseInt(valueMax);
    if (valueMax >= parseInt(self.value) && parseInt(self.value) > parseInt(0)) {
        // if (valueMax >= self.value && self.value > parseInt(0)) {
        v = self.value;
    }

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].bloodrequestcc = v;
    row.cells[0].innerHTML = JSON.stringify(item);

    if (valueMax >= self.value && self.value > parseInt(0)) {
        row.cells[12].innerHTML = parseInt(valueMax) - parseInt(((self.value == "") ? "0" : self.value));
    } else {
        row.cells[12].innerHTML = parseInt(valueMax);
    }

    self.value = v;

    row.cells[13].children[0].readOnly = (v != '');
    row.cells[13].children[0].required = (v == '');

    console.log("--------");

}

function setBloodConfirmBloodreQuestDateTab2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].confirmbloodrequestdate = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setBloodConfirmBloodreQuestTimeTab2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].confirmbloodrequesttime = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setBloodQueueCheckTab2_2(self) {
    bloodQueueUsedReadyState = false;
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].ispayblood = self.checked;
    row.cells[0].innerHTML = JSON.stringify(item);

    row.cells[13].children[0].required = self.checked;
    row.cells[16].children[0].disabled = !self.checked;

    console.log(item[0].bloodstocktypegroupid);
    console.log("=============");
    if (item[0].bloodstocktypegroupid == 1) {
        // row.cells[14].children[0].required = self.checked;
    } else {
        // row.cells[14].children[0].required = false;
    }


}

function setBloodQueueBeaconTab2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].beaconid = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

}

function setBloodQueueRFIDTab2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].bloodstockrfid = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

}

function gotoBeaConMap(beaconid) {

    var evt = {
        currentTarget: ''
    }

    openTab(evt, '2_4', 'tabcontent2', 'tablinks2_1')
    document.getElementById('dashboardMap').src = '';
    setTimeout(function() {

        document.getElementById('dashboardMap').src = 'http://192.168.7.14/#/dashboard/map?beaconId=' + beaconid;
        $(document).scrollTop("250");


    }, 1000);

    document.getElementById("openTab2_4").classList.add("active");

}


function setBloodQueuePrint2_3(id) {

    var printableurl = localurl + "/report/blood-pay-form.php?id=" + id;
    printJS({
        printable: printableurl,
        type: 'pdf',
        showModal: true
    });


    $.ajax({
        type: 'POST',
        url: 'report/blood-pay-download-form.php',
        data: { id: id, url: printableurl },
        dataType: 'json',
    });

}

function setBloodQueueHistoryPayFormPrint(printableurl) {
    printJS({
        printable: printableurl,
        type: 'pdf',
        showModal: true
    });
}


function setLoadBBTimeLine(beacon, datetimestart) {
    var body = document.getElementById("list_time_line_modal").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    event_data += '<tr  >';
    event_data += '    <th colspan="2">';
    event_data += '        <div class="progress">';
    event_data += '            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
    event_data += '        </div>';
    event_data += '    </th>';
    event_data += '</tr>';

    $("#list_time_line_modal").append(event_data);



    datetimestart = getYMDHMDiff543(datetimestart);
    var datetimeend = getYMDHMPushH1(datetimestart);
    datetimestart = datetimestart.replace(" ", "%20");
    datetimeend = datetimeend.replace(" ", "%20");


    $.ajax({
        url: 'http://192.168.7.14:5000/api/BBTimeLine?keyword=' + beacon + '&start_date=' + datetimestart + '&end_date=' + datetimeend + '&total_row=1000',
        dataType: 'json',
        type: 'get',
        success: function success(data) {

            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            event_data = "";

            var gatewayid = "";

            if (data.length > 0) {
                var obj = JSON.parse(JSON.stringify(data[0].device).replace(/null/g, '""'));
                $.each(obj, function(index, value) {


                    if (gatewayid != value.gatewayid) {
                        event_data += '<tr  >';
                        event_data += '    <th >';
                        event_data += value.gatewayname;
                        event_data += '    </th>';
                        event_data += '    <th>';
                        event_data += getDMYHM543(value.times);
                        event_data += '    </th>';
                        event_data += '</tr>';

                        gatewayid = value.gatewayid
                    }

                });
            }



            $("#list_time_line_modal").append(event_data);

        },
        error: function error(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });

}


function scanNumber(self) {
    self.value = numnerPoint(self.value);
}