function loadTableBloodQueue() {

    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';

    // hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }

    userconfirm().then(
        function success(userconfirmdata) {
            $.ajax({
                url: 'data/bloodqueue/bloodqueue-standby.php?hn=' + hn +
                    '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
                dataType: 'json',
                type: 'get',
                success: function(data) {


                    var body = document.getElementById("blood-queue-tab1").getElementsByTagName('tbody')[0];
                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }




                    $("#blood-queue-tab-1").text(data.total);
                    var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

                    $.each(obj, function(index, value) {
                        var event_data = '';
                        var arr = [value];
                        event_data += '<tr id="row' + (index + 1) + '">';
                        event_data += '<td  style="display:none;" >';
                        event_data += JSON.stringify(arr);
                        event_data += '</td>';
                        event_data += '<td >';
                        event_data += '<button  type="button" onclick="setBloodQueuePrint1_1(' + value.requestbloodid + ')"  class="btn btn-success m-l-5">';
                        event_data += '<i class="fa fa-print"></i>';
                        event_data += '</button>';
                        event_data += '</td>';
                        event_data += '<td>' + (index + 1) + '</td>';
                        event_data += '<td>';
                        event_data += '<input disabled type="radio" name="radio' + index + '" onclick="setBloodQueueConfirmTab1_1(this,' + index + ')" class="check2" value="1" ' + ((value.r == 1) ? 'checked' : '') + '  />';
                        event_data += '</td>';
                        event_data += '<td>';
                        event_data += '<input disabled type="radio" name="radio' + index + '" onchange="setBloodQueueCancelTab1_1(this)" class="check2" value="1" ' + ((value.n == 1) ? 'checked' : '') + ' />';
                        event_data += '</td>';
                        event_data += '<td>' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';

                        event_data += '<td>' + value.hn + '</td>';
                        event_data += '<td style="text-align:left">' + value.patientfullname + '</td>';
                        event_data += '<td>' + ((value.bloodgroupid != '') ? value.bloodgroupid : 'ไม่ทราบ') + '</td>';
                        event_data += '<td>' + ((value.rhname3 != '') ? value.rhname3 : 'ไม่ทราบ') + '</td>';
                        event_data += '<td>' + value.bloodsampletubename + '</td>';
                        // var bloodnotifiname = value.bloodnotificationtypename.substring
                        // ความเร่งด่วน
                        event_data += '<td class="CellWithComment">' + value.bloodnotificationtypename.substring(0, 41) + '<span class="CellComment">' + value.bloodnotificationtypename + '</span></td>';
                        event_data += '<td>';
                        event_data += ((value.forchildren == 1) ? '<i class="fa fa-check-square fa-2x" style="color: #009999;" aria-hidden="true"></i>' : '');
                        event_data += '</td>';
                        // หน่วยงานที่แจ้ง
                        event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';
                        event_data += '<td>' + value.bloodstocktypenamegroup + '</td>';
                        event_data += '<td>' + getDMY2(value.usedblooddatefrom) + ' - ' + getDMY2(value.usedblooddateto) + '</td>';
                        event_data += '<td class="td-table">';
                        event_data += '<select disabled id="userbloodqueuebloodgroup_tab1' + index + '"  onchange="setUserConfirmBloodGorupTab1_1(this)"  ';
                        event_data += 'value="" class="form-control form-control-sm" select2"   > '
                        event_data += '<option  value=""></option>'
                        $.each(userconfirmdata.data, function(ind, v) {
                            event_data += '<option ' + ((session_staffid == v.id) ? 'selected' : '') + '  value="' + v.id + '">' + v.name + ' ' + v.surname + '|' + v.code + '</option>'
                        })
                        event_data += ' </select>';
                        event_data += '</td>';
                        event_data += '</tr>';

                        $("#blood-queue-tab1").append(event_data);

                        $("#userbloodqueuebloodgroup_tab1" + index).select2({
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

                        setDataModalSelectValue('userbloodqueuebloodgroup_tab1' + index, session_staffid, session_fullname);

                    });


                },
                error: function(d) {
                    console.log("error");
                    // alert("404. Please wait until the File is Loaded.");
                }
            });
        });

}

function loadTableBloodQueueCancel() {

    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';

    // hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }


    $.ajax({
        url: 'data/bloodqueue/bloodqueue-cancel.php?hn=' + hn +
            '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("blood-queue-tab2").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';

            $("#blood-queue-tab-2").text(data.total);
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {

                var arr = [value];
                event_data += '<tr id="row' + (index + 1) + '">';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td>';
                event_data += '<button type="button" onclick="setBloodQueuePrint1_2(' + value.requestbloodid + ')"  class="btn btn-success m-l-5">';
                event_data += '<i class="fa fa-print"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + getDMY2(value.requestqueueblooddate) + ' ' + value.requestqueuebloodtime + '</td>';
                event_data += '<td>' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                event_data += '<td>' + value.hn + '</td>';
                event_data += '<td style="text-align:left">' + value.patientfullname + '</td>';
                event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';
                event_data += '<td>' + value.bloodstocktypenamegroup + '</td>';
                event_data += '<td>' + value.requestbloodcancelnamegroup + '</td>';
                event_data += '</tr>';

            });
            $("#blood-queue-tab2").append(event_data);
        },
        error: function(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });

}

function loadTableCheckResultBloodPatient() {

    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';

    var value_request_prc = 0;
    var value_request_lprc = 0;
    var value_request_ldprc = 0;
    var value_request_pc = 0;
    var value_request_lppc = 0;
    var value_request_ldppc = 0;
    var value_request_ldppc_pas = 0;
    var value_request_cryo = 0;
    var value_request_sdp = 0;
    var value_request_ffp = 0;
    var value_request_crp = 0;
    var value_request_lprc_o = 0;

    // hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }

    $.ajax({
        url: 'data/bloodqueue/bloodqueue-checkblood-result.php?hn=' + hn +
            '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("blood-queue-tab3-1").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';


            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var countTab3_1 = 0;
            $.each(obj, function(index, value) {
                var arrayStock = value.bloodstocktypeidgroup.split(",");
                var state = false;
                $.each(arrayStock, function(inx, v) {

                    if (v == "PRC" || v == "LPRC" || v == "LPRC-O" || v == "LDPRC" || v == "SDR") {
                        state = true;
                    }

                });


                if (!state) {
                    countTab3_1++;
                    var arr = [value];
                    event_data += '<tr id="row' + (index + 1) + '">';
                    event_data += '<td  style="display:none;" >';
                    event_data += JSON.stringify(arr);
                    event_data += '</td>';
                    event_data += '<td>' + (index + 1) + '</td>';
                    event_data += '<td>' + getDMY2(value.crossmatchdate) + ' ' + value.crossmatchtime + '</td>';
                    event_data += '<td>' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                    event_data += '<td>' + getDMY2(value.requestqueueblooddate) + ' ' + value.requestqueuebloodtime + '</td>';
                    event_data += '<td>' + value.hn + '</td>';
                    event_data += '<td style="text-align:left">' + value.patientfullname + '</td>';
                    event_data += '<td>' + ((value.bloodgroupid != '') ? value.bloodgroupid : 'ไม่ทราบ') + '</td>';
                    event_data += '<td>' + ((value.rhname3 != '') ? value.rhname3 : 'ไม่ทราบ') + '</td>';
                    event_data += '<td class="CellWithComment">' + value.bloodnotificationtypename.substring(0, 41) + '<span class="CellComment">' + value.bloodnotificationtypename + '</span></td>';
                    event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';
                    event_data += '<td>' + value.bloodstocktypenamegroup + '</td>';
                    event_data += '</tr>';

                    var arrayStock2 = value.bloodstocktypenamegroup.split(",");
                    var arrayStock3 = value.num.split(",");

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
                        } else if (arrayStock[position] == 'LPPC') {
                            value_request_lppc += parseInt(arrayStock3[position]);
                        } else if (arrayStock[position] == 'LDPPC') {
                            value_request_ldppc += parseInt(arrayStock3[position]);
                        } else if (arrayStock[position] == 'LDPPC_PAS') {
                            value_request_ldppc_pas += parseInt(arrayStock3[position]);
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

                }

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

            $("#blood-queue-tab-3-1").text(countTab3_1);
            $("#blood-queue-tab3-1").append(event_data);
            $("#table_1_3_1").html(event_data2);
        },
        error: function(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });

}

function loadTableCheckBloodPatient() {

    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';

    // hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }


    $.ajax({
        url: 'data/bloodqueue/bloodqueue-checkblood.php?hn=' + hn +
            '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
        dataType: 'json',
        type: 'get',
        success: function(data) {
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

            var body = document.getElementById("blood-queue-tab3").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';


            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var countTab3 = 0;
            $.each(obj, function(index, value) {

                var arrayStock = value.bloodstocktypeidgroup.split(",");
                var state = false;
                $.each(arrayStock, function(inx, v) {

                    if (v == "PRC" || v == "LPRC" || v == "LPRC-O" || v == "LDPRC" || v == "SDR") {
                        state = true;
                    }
                });

                if (state) {
                    countTab3++;
                    var arr = [value];
                    event_data += '<tr id="row' + (index + 1) + '" >';
                    event_data += '<td  style="display:none;" >';
                    event_data += JSON.stringify(arr);
                    event_data += '</td>';
                    event_data += '<td>' + (index + 1) + '</td>';
                    event_data += '<td>' + getDMY2(value.crossmatchdate) + ' ' + value.crossmatchtime + '</td>';
                    event_data += '<td>' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                    event_data += '<td>' + getDMY2(value.requestqueueblooddate) + ' ' + value.requestqueuebloodtime + '</td>';
                    event_data += '<td>' + value.hn + '</td>';
                    event_data += '<td style="text-align:left">' + value.patientfullname + '</td>';
                    event_data += '<td>' + ((value.confirmbloodgroup != '') ? value.confirmbloodgroup : ((value.bloodgroupid != '') ? value.bloodgroupid : 'ไม่ทราบ')) + '</td>';
                    event_data += '<td>' + ((value.confirmrhname3 != '') ? value.confirmrhname3 : ((value.rhname3 != '') ? value.rhname3 : 'ไม่ทราบ')) + '</td>';
                    event_data += '<td class="CellWithComment">' + value.bloodnotificationtypename.substring(0, 41) + '<span class="CellComment">' + value.bloodnotificationtypename + '</span></td>';
                    event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';
                    event_data += '<td>' + value.bloodstocktypenamegroup + '</td>';
                    event_data += '</tr>';
                    var arrayStock2 = value.bloodstocktypenamegroup.split(",");
                    var arrayStock3 = value.num.split(",");

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
                        } else if (arrayStock[position] == 'LPPC') {
                            value_request_lppc += parseInt(arrayStock3[position]);
                        } else if (arrayStock[position] == 'LDPPC') {
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

                }

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
            $("#blood-queue-tab-3").text(countTab3);
            $("#blood-queue-tab3").append(event_data);
            $("#table_3_1").html(event_data2);
        },
        error: function(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });

}

function loadTableCrossmatch() {

    var hn = '';
    var fromdate = '';
    var todate = '';
    var requestunit = '';

    // hn = $('#searchhn').val();

    if (!hn) {
        fromdate = dmyToymd2($('#fromdate').val());
        todate = dmyToymd2($('#todate').val());
        requestunit = $('#requestunit').val();
    }


    $.ajax({
        url: 'data/bloodqueue/bloodqueue-crossmatch.php?hn=' + hn +
            '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("blood-queue-tab4").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';

            $("#blood-queue-tab-4").text(data.total);
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            bloodgroup().then(
                function success(bloodgroupdata) {

                    userconfirm().then(
                        function success(userconfirmdata) {
                            rh33().then(
                                function success(rh_ddata) {

                                    var count_index4 = 0;
                                    $.each(obj, function(index, value) {
                                        count_index4++;

                                        var disable = '';
                                        // if (value.isaddblood != 1 || value.bloodsampletube == 2)
                                        //     disable = 'disabled="disabled"';

                                        if (value.isaddblood != 1 || value.bloodsampletube == 2)
                                            disable = '';

                                        value.userconfirmbloodgroupqueue = session_staffid;

                                        console.log(value.checkpatientdate);

                                        var arr = [value];
                                        event_data += '<tr id="row' + count_index4 + '">';
                                        event_data += '<td  style="display:none;" >';
                                        event_data += JSON.stringify(arr);
                                        event_data += '</td>';
                                        event_data += '<td class="td-table">';
                                        event_data += '<input disabled ' + disable + ' type="checkbox"  onchange="setCheckTab1_4(this)" >';
                                        event_data += '</td>';
                                        event_data += '<td>' + count_index4 + '</td>';
                                        event_data += '<td>' + getDMY2(value.checkpatientdate) + ' ' + value.checkpatienttime + '</td>';
                                        event_data += '<td>' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                                        event_data += '<td>' + value.hn + '</td>';
                                        event_data += '<td style="text-align:left">' + value.patientfullname + '</td>';
                                        event_data += '<td>' + ((value.confirmbloodgroup != '') ? value.confirmbloodgroup : 'ไม่ทราบ') + '</td>';
                                        event_data += '<td>' + ((value.confirmrhname3 != '') ? value.confirmrhname3 : 'ไม่ทราบ') + '</td>';
                                        event_data += '<td class="CellWithComment">' + value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span></td>';
                                        event_data += '<td>' + value.bloodstocktypenamegroup + '</td>';
                                        event_data += '<td class="td-table">';
                                        event_data += '<select disabled="disabled" id="rowblood_group' + count_index4 + '"  onchange="setBloodGroupConfirmTab1_4(this)"  ';
                                        event_data += 'value="" class="form-control form-control-sm"   > ';
                                        event_data += '<option  value=""></option>';
                                        $.each(bloodgroupdata.data, function(ind, v) {
                                            event_data += '<option  value="' + v.bloodgroupid + '">' + v.bloodgroupname + '|' + v.bloodgroupcode + '</option>'
                                        })
                                        event_data += ' </select>';
                                        event_data += '</td>';
                                        /////////////////////////////////////////// 
                                        event_data += '<td class="td-table">';

                                        event_data += '<select disabled="disabled" id="rowrh' + count_index4 + '" onchange="setRhConfirmTab1_4(this)"  class="form-control form-control-sm" >';
                                        event_data += '<option value=""></option>';
                                        // event_data += '<option value="' + value.rhid + '">' + value.confirmrhname3 + '</option>';
                                        $.each(rh_ddata.data, function(ind, v) {
                                            event_data += '<option  value="' + v.rhid + '">' + v.rhname3 + '|' + v.rhcode2 + '</option>'
                                        })
                                        event_data += ' </select>';
                                        event_data += '</td>';
                                        //////////////////////////////////////////
                                        event_data += '<td class="td-table">';
                                        event_data += '<select disabled id="userconfirmbloodgroup' + count_index4 + '"  onchange="setUserConfirmBloodGorupTab1_4(this)"  ';
                                        event_data += 'value="" class="form-control form-control-sm" select2"   > '
                                        event_data += '<option  value=""></option>'
                                        $.each(userconfirmdata.data, function(ind, v) {
                                            event_data += '<option ' + ((session_staffid == v.id) ? 'selected' : '') + '  value="' + v.id + '">' + v.name + ' ' + v.surname + '|' + v.code + '</option>'
                                        })
                                        event_data += ' </select>';
                                        event_data += '</td>';
                                        event_data += '</tr>';
                                        $("#blood-queue-tab4-tr").html(event_data);




                                        for (let i = 1; i < count_index4 + 1; i++) {



                                            $("#userconfirmbloodgroup" + i).select2({
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

                                            setDataModalSelectValue('userconfirmbloodgroup' + i, session_staffid, session_fullname);




                                            $("#rowblood_group" + i).select2({
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

                                            $("#rowrh" + i).select2({
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




                                        }

                                    });

                                });
                        });
                });
        },
        error: function(d) {
            console.log("error");
            // alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setBloodQueueConfirmTab1_1(self, id) {

    clearBloodQueueTab1_1(id);

    if (self.previous) {
        self.checked = false;
    }
    self.previous = self.checked;

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].r = self.checked;
    item[0].n = false;

    row.cells[0].innerHTML = JSON.stringify(item);

    if (self.checked) {
        getAllergic(row.cells[6].innerHTML, item[0]);
    }

}


function msgQueueStandby(hn, item) {
    if (item.plasmaexchange == "1" ||
        item.screenforplateletantibody == "1" ||
        item.hlacrossmatchsingledonorplatelet == "1" ||
        item.washedredbloodcell == "1" ||
        item.light == "1"
    ) {
        var textMsg = "";
        if (item.plasmaexchange == "1") {
            textMsg += "(\u2713) Plasma Exchange\n";
        }

        if (item.screenforplateletantibody == "1") {
            textMsg += "(\u2713) Screen for platelet antibody\n";
        }

        if (item.hlacrossmatchsingledonorplatelet == "1") {
            textMsg += "(\u2713) HLA Crossmatch Single donor platelet\n";
        }

        if (item.washedredbloodcell == "1") {
            textMsg += "(\u2713) Washed Red Blood Cell\n";
        }

        if (item.light == "1") {
            textMsg += "(\u2713) ฉายแสง\n";
        }

        swal({
            title: "มีคำสั่งพิเศษ",
            text: textMsg,
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            if (value) {
                // getBagNumberHN(hn, 2);
                // getBagNumberHN(hn, 3);
                // getBagNumberHN(hn, 4);

                findRhNegative(item, hn);

            }
        });
    } else {
        // getBagNumberHN(hn, 2);
        // getBagNumberHN(hn, 3);
        // getBagNumberHN(hn, 4);

        findRhNegative(item, hn);
    }
}


function findRhNegative(data, hn) {
    if (data.patientrh == "Rh-") {

        swal({
            title: "ผู้ป่วยมีหมู่เลือด Rh Negative",
            html: true,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            if (data.group_antibody.replace(/,/g, "") != "") {
                errorSwalAnti("ผู้ป่วยมีประวัติ Antibody ", substring_1(data.group_antibody), data);
                // alert(data.group_antibody.replace(/,/g, ""));
                setTimeout(function() {
                    swal({
                        title: "ผู้ป่วยมีประวัติ Antibody ",
                        html: true,
                        text: substring_1(data.group_antibody),
                        type: 'warning',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    });
                }, 1000);

            } else {
                getBagNumberHN(hn, 2);
                getBagNumberHN(hn, 3);
                getBagNumberHN(hn, 4);
            }
        });

        /*
        swal({
            title: "ผู้ป่วยมีหมู่เลือด Rh Negative",
            html: true,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }, function(inputValue) {
            if (data.group_antibody.replace(/,/g, "") != "") {
                errorSwalAnti("ผู้ป่วยมีประวัติ Antibody ", substring_1(data.group_antibody), data);
                // alert(data.group_antibody.replace(/,/g, ""));
                setTimeout(function() {
                    swal({
                        title: "ผู้ป่วยมีประวัติ Antibody ",
                        html: true,
                        text: substring_1(data.group_antibody),
                        type: 'warning',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    });
                }, 1000);

            } else {
                getBagNumberHN(hn, 2);
                getBagNumberHN(hn, 3);
                getBagNumberHN(hn, 4);
            }
        });
        */
    } else {
        findCheckAntibody(data, hn)
    }
}


function findCheckAntibody(data, hn) {
    if (data.group_antibody.replace(/,/g, "") != "") {
        errorSwalAnti("ผู้ป่วยมีประวัติ Antibody ", substring_1(data.group_antibody), data, hn);
    } else {
        getBagNumberHN(hn, 2);
        getBagNumberHN(hn, 3);
        getBagNumberHN(hn, 4);
    }
}

function errorSwalAnti($title = "", $msg = "", data, hn) {

    const wrapper = document.createElement('div');
    wrapper.innerHTML = $msg;

    swal({
        title: $title,
        content: wrapper,
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then(value => {
        if (value) {
            getBagNumberHN(hn, 2);
            getBagNumberHN(hn, 3);
            getBagNumberHN(hn, 4);

        }
    });


}


function setCheckTab1_4(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].ck = self.checked;
    row.cells[0].innerHTML = JSON.stringify(item);

    row.cells[11].children[0].disabled = !(self.checked);
    row.cells[12].children[0].disabled = !(self.checked);

    row.cells[11].children[0].required = self.checked;
    row.cells[12].children[0].required = self.checked;

}

function setBloodGroupConfirmTab1_4(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].confirmbloodgroupqueue = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    if (row.cells[7].innerHTML != self.value) {
        swal({
            title: "กรุ๊ปเลือดไม่ตรงกับที่ระบุไว้",
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            if (value) {
                self.value = "";
            }

        });
    }


}


function setRhConfirmTab1_4(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].confirmrhqueue = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    if (item[0].confirmrhid != self.value) {
        swal({
            title: "Rh ไม่ตรงกับที่ระบุไว้",
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            if (value) {
                self.value = "";
            }

        });
    }


}


function setUserConfirmBloodGorupTab1_1(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].userbloodqueuebloodgroup = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    console.log("========");

}

function setUserConfirmBloodGorupTab1_4(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].userconfirmbloodgroupqueue = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    console.log("======11====");
    console.log(item[0].userconfirmbloodgroupqueue);

}

function setUserConfirmTab2_1(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].username2_1 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    console.log("======iii====");
    console.log(item[0].username2_1);

}

function setUserConfirmTab2_2(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].username2_2 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    console.log("======iissi====");
    console.log(item[0].username2_2);

}



var objectrow;

function setBloodQueueCancelTab1_1(self) {
    object = self;
    $("#bloodCancelModal").modal('show');
    var row = self.parentNode.parentNode;
    objectrow = row;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].r = false;
    item[0].n = self.checked;
    row.cells[0].innerHTML = JSON.stringify(item);


    document.getElementById("requestbloodcancelother").value = '';
    document.getElementById("bloodcancel1").checked = false;
    document.getElementById("bloodcancel2").checked = false;
    document.getElementById("bloodcancel3").checked = false;
    document.getElementById("bloodcancel4").checked = false;
    document.getElementById("bloodcancel5").checked = false;
    document.getElementById("bloodcancel6").checked = false;
    document.getElementById("bloodcancel7").checked = false;
    document.getElementById("bloodcancel8").checked = false;
    document.getElementById("bloodcancel9").checked = false;
    document.getElementById("bloodcancel10").checked = false;
    document.getElementById("bloodcancel11").checked = false;
    document.getElementById("bloodcancel12").checked = false;



}

function bloodCancelModalClose() {
    $("#bloodCancelModal").modal('hide');
}


function bloodCancelModalOK() {
    $("#bloodCancelModal").modal('hide');

    var val = '';
    var other = document.getElementById("requestbloodcancelother").value;
    var isbloodblank = document.getElementById("isbloodblank").value;

    if (document.getElementById("bloodcancel1").checked)
        val += '1,';

    if (document.getElementById("bloodcancel2").checked)
        val += '2,';

    if (document.getElementById("bloodcancel3").checked)
        val += '3,';

    if (document.getElementById("bloodcancel4").checked)
        val += '4,';

    if (document.getElementById("bloodcancel5").checked)
        val += '5,';

    if (document.getElementById("bloodcancel6").checked)
        val += '6,';

    if (document.getElementById("bloodcancel7").checked)
        val += '7,';

    if (document.getElementById("bloodcancel8").checked)
        val += '8,';

    if (document.getElementById("bloodcancel9").checked)
        val += '9,';

    if (document.getElementById("bloodcancel10").checked)
        val += '10,';

    if (document.getElementById("bloodcancel11").checked)
        val += '11,';

    if (document.getElementById("bloodcancel12").checked)
        val += '12,';

    var item = JSON.parse(objectrow.cells[0].innerHTML);
    item[0].requestbloodcancelid = val;
    item[0].requestbloodcancelother = other;
    item[0].isbloodblank = isbloodblank;

    objectrow.cells[0].innerHTML = JSON.stringify(item);

}

function bloodReprintModalShow() {
    $("#bloodReprintModal").modal('show');
    setTimeout(function() {
        document.getElementById("hnreprint").focus();
    }, 400);

}


function bloodReprintNoHistoryModalShow() {
    document.getElementById('hnnoprint').value = '';
    document.getElementById('no_hn').value = '';
    document.getElementById('no_fullname').value = '';
    $('#no_wardid').val(null).empty();
    v_wardname = '';
    $("#bloodReprintNoHistoryModal").modal('show');
    setTimeout(function() {
        document.getElementById("hnnoprint").focus();

    }, 400);

}

function bloodReprintModalClose() {
    $("#bloodReprintModal").modal('hide');
}

function bloodReprintNoHistoryModalClose() {
    $("#bloodReprintNoHistoryModal").modal('hide');
}

function clearBloodQueueTab1_1(id) {

    var rows = document.getElementById("blood-queue-tab1").rows;
    for (var i = 1; i < rows.length; i++) {
        if ((i - 1) != id) {
            var item = JSON.parse(rows[i].cells[0].innerHTML);

            item[0].r = false;
            item[0].n = false;

            rows[i].cells[3].children[0].checked = false;
            rows[i].cells[4].children[0].checked = false;

            rows[i].cells[0].innerHTML = JSON.stringify(item);
        }

    }

}

function getBloodQueueTab1_1() {
    var arr = [];
    var rows = document.getElementById("blood-queue-tab1").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;

}

function getBloodQueueTab1_4() {
    var arr = [];
    var rows = document.getElementById("blood-queue-tab4").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;

}

function getBloodQueueTab2_1() {
    var arr = [];
    var rows = document.getElementById("blood-queue-tab2-1").rows;
    for (var i = 2; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;

}

function getBloodQueueTab2_2() {
    var arr = [];
    var rows = document.getElementById("blood-queue-tab2-2").rows;
    for (var i = 2; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;

}

function setBloodQueuePrint1_1(id) {
    // printJS(localurl + "/report/blood-request-patient-sticker.php?id=" + id);
    printQueueSticker(id);
}

function printQueueSticker(id) {

    var printer_url = localurl + "/report/blood-request-patient-sticker.php?id=" + id;
    var printer_url_auto = localurl + "/report/blood-request-patient-sticker-auto.php?id=" + id;
    var printqty = parseInt(document.getElementById("printqty").value);
    if (document.getElementById("printer_a").checked) {

        try {
            var n = Date.now();
            var filenameram = "stickerbag" + n + makeid(5);

            var printers = getPrintterSetting();

            var printernames = $("#printernames").val();
            var printernamesArr = printernames.split("|");

            var dataReport = {
                "Printtername": printernamesArr[0],
                "Filename": filenameram,
                "Fileurl": printer_url_auto,
                "username": printernamesArr[1],
                "Numberset": printqty
            };

            spinnershow();


            $.ajax({
                type: 'POST',
                url: 'report/printering-auto.php',
                data: dataReport,
                dataType: 'json',
                complete: function() {
                    var delayInMilliseconds = 200;
                    setTimeout(function() {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                    myAlertTopError();
                },
            });



        } catch (err) {
            console.log("error auto printer");
            console.log("printing preview");
            printJS(printer_url);
        }




    } else {
        printJS(printer_url);
    }



}

function printQueueStickerNoHistory() {
    console.log("--------");

    var v_no_hn = document.getElementById('no_hn').value;
    var v_no_fullname = document.getElementById('no_fullname').value;

    var printer_url = localurl + "/report/blood-request-patient-sticker-no-history.php?no_hn=" + v_no_hn + "&no_fullname=" + v_no_fullname + "&no_wardname=" + v_wardname;
    var printer_url_auto = localurl + "/report/blood-request-patient-sticker-no-history-auto.php?no_hn=" + v_no_hn + "&no_fullname=" + v_no_fullname + "&no_wardname=" + v_wardname;
    var printqty = parseInt(document.getElementById("printqty").value);
    if (document.getElementById("printer_a").checked) {

        try {
            var n = Date.now();
            var filenameram = "stickerbag" + n + makeid(5);

            var printernames = $("#printernames").val();
            var printernamesArr = printernames.split("|");

            var dataReport = {
                "Printtername": printernamesArr[0],
                "Filename": filenameram,
                "Fileurl": printer_url_auto,
                "username": printernamesArr[1],
                "Numberset": printqty
            };

            spinnershow();


            $.ajax({
                type: 'POST',
                url: 'report/printering-auto.php',
                data: dataReport,
                dataType: 'json',
                complete: function() {
                    var delayInMilliseconds = 200;
                    setTimeout(function() {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                    myAlertTopError();
                },
            });



        } catch (err) {
            console.log("error auto printer");
            console.log("printing preview");
            printJS(printer_url);
        }




    } else {
        printJS(printer_url);
    }

}

function setBloodQueuePrint1_2(id) {
    printJS({
        printable: localurl + "/report/blood-request-patient-cancel.php?id=" + id,
        type: 'pdf',
        showModal: true
    });
}

function bloodgroup() {
    return $.ajax({
        url: 'data/masterdata/bloodgroup.php',
        dataType: 'json',
        type: 'get',
    });
}

function rh_d() {
    return $.ajax({
        url: 'data/masterdata/rh-d.php',
        dataType: 'json',
        type: 'get',
    });
}

function rh33() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php',
        dataType: 'json',
        type: 'get',
    });
}




function userconfirm() {
    return $.ajax({
        url: 'data/masterdata/staff.php?type=issdpsave',
        dataType: 'json',
        type: 'get',
    });
}

function substring_1(val) {
    var val2 = val.substring(0, 1);

    if (val2 == ',') {
        return val.substring(1);
    } else {
        return val;
    }
}