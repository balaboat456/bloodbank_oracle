$(document).ready(function() {
    loadTable();
    loadTableInOutAg();
    $('.bloodstockstatus').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "สถานะ",
        // tags: [],
        ajax: {
            url: 'data/masterdata/bloodstockstatus.php',
            dataType: 'json',
            type: "GET",
            // quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,

                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodstockstatusid,
                            text: item.bloodstockstatusname
                        }
                    })
                };
            },

        }
    });

    $('.bloodstocktype').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "สถานะ",
        // tags: [],
        ajax: {
            url: 'data/masterdata/bloodstocktype.php',
            dataType: 'json',
            type: "GET",
            // quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,

                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodstocktypeid,
                            text: item.bloodstocktypename
                        }
                    })
                };
            },

        }
    });

    $('.bloodgroup').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "สถานะ",
        // tags: [],
        ajax: {
            url: 'data/masterdata/bloodgroup.php',
            dataType: 'json',
            type: "GET",
            // quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,

                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodgroupid,
                            text: item.bloodgroupname
                        }
                    })
                };
            },

        }
    });
    $('#bloodbrokenid').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
        ajax: {
            url: 'data/masterdata/blood_broken.php?grouptypeid=2',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function data(keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function processResults(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodbrokenid,
                            text: item.bloodbrokenname,
                            item: item
                        };
                    })
                };
            }
        }
    });

    $('.bloodstockpaytypeid').select2({
        allowClear: true,
        theme: "bootstrap",
        width: "100%",
        ajax: {
            url: 'data/masterdata/bloodstock-pay-type.php?grouptypeid=2',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodstockpaytypeid,
                            text: item.bloodstockpaytypename,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function(e) {

        $('#bloodstockmainid').val("");
        clearRefund();
        var id = e.params.args.data.item.bloodstockpaytypeid;
        loadTableBloodPayStock(id);

        if (id == 5 || id == 6 || id == 7 || id == 10) {
            document.getElementById("div_hospital_pay").style.display = "block";
            document.getElementById("divShowRefundBloodBorrow").style.display = "block";

        } else {
            document.getElementById("div_hospital_pay").style.display = "none";
            document.getElementById("divShowRefundBloodBorrow").style.display = "none";
        }

        if (id == 5) {
            document.getElementById("divShowRefundBloodBorrow").style.display = "block";

        } else {
            document.getElementById("divShowRefundBloodBorrow").style.display = "none";
        }

        $("#hn_pay").val("");
        $("#patient_pay").val("");
        document.getElementById("div_hn_pay").style.display = (id == 8) ? "block" : "none";
        document.getElementById("div_patient_pay").style.display = (id == 8) ? "block" : "none";

        document.getElementById("div_patient_date").style.display = (id == 8) ? "block" : "none";
        document.getElementById("div_patient_time").style.display = (id == 8) ? "block" : "none";

        if (id == 2) {
            setDataModalSelectValue("bloodstocktype_pay", "LPRC", 'Leukocyte-Poor Packed Red Cells [LPRC]');

            setTimeout(function() { document.getElementById("bag_number_pay_out").focus(); }, 200);
        } else {
            setDataModalSelectValue("bloodstocktype_pay", null, '');
        }

        if (id == 9) {
            document.getElementById("div_broken_pay").style.display = "block";

        } else {
            document.getElementById("div_broken_pay").style.display = "none";
        }


        document.getElementById("idUnChecked").checked = false;

        $("#list_table_json_out_show_body").html('');
        document.getElementById("bag_number_pay_out_check").value = '';

    });

});



function loadTable() {

    $.ajax({
        url: 'data/blood/bloodstockdisplay.php',
        dataType: 'json',
        type: 'get',
        success: function(data) {
            Stock1('list_table_stock1', data.data1);
            Stock2_3('list_table_stock2', data.data2);
            Stock2_3('list_table_stock3', data.data3);
            Stock4('list_table_stock4', data.data4);
            Stock5('list_table_stock5', data.data5, data.data5_1);

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function Stock1(eid = '', data) {


    var body = document.getElementById(eid).getElementsByTagName(
        'tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    var prc = 0;
    var lprc = 0;
    var ldprc = 0;
    var ffp = 0;
    var pc = 0;
    var sdp = 0;
    var sdp_pas = 0;
    var sdr = 0;
    var wb = 0;
    var lppc = 0;
    var lppc_pas = 0;
    var cryo = 0;
    var amount = 0;
    var amountItem = 0;
    $.each(data, function(index, value) {
        amountItem = parseInt(value.prc) + parseInt(value.lprc) + parseInt(value.ldprc) +
            parseInt(value.ffp) + parseInt(value.pc) + parseInt(value.sdp) +
            parseInt(value.sdr) + parseInt(value.wb) + parseInt(value.lppc) +
            parseInt(value.sdp_pas) + parseInt(value.lppc_pas);
        // parseInt(value.cryo);
        event_data += '<tr>';
        event_data += '<td>' + value.bloodgroupname + '</td>';
        event_data += '<td>' + ((value.prc > 0) ? value.prc : '-') + '</td>';
        event_data += '<td>' + ((value.lprc > 0) ? value.lprc : '-') + '</td>';
        event_data += '<td>' + ((value.ffp > 0) ? value.ffp : '-') + '</td>';
        event_data += '<td>' + ((value.pc > 0) ? value.pc : '-') + '</td>';
        event_data += '<td>' + ((value.lppc > 0) ? value.lppc : '-') + '</td>';
        event_data += '<td>' + ((value.lppc_pas > 0) ? value.lppc_pas : '-') + '</td>';
        event_data += '<td>' + ((value.sdp > 0) ? value.sdp : '-') + '</td>';
        event_data += '<td>' + ((value.sdp_pas > 0) ? value.sdp_pas : '-') + '</td>';
        event_data += '<td>' + ((value.wb > 0) ? value.wb : '-') + '</td>';
        event_data += '<td>' + ((value.ldprc > 0) ? value.ldprc : '-') + '</td>';
        event_data += '<td>' + ((value.sdr > 0) ? value.sdr : '-') + '</td>';
        event_data += '<td><b>' + amountItem + '</b></td>';


        event_data += '</tr>';

        prc += parseInt(value.prc);
        lprc += parseInt(value.lprc);
        ldprc += parseInt(value.ldprc);
        ffp += parseInt(value.ffp);
        pc += parseInt(value.pc);
        sdp += parseInt(value.sdp);
        sdp_pas += parseInt(value.sdp_pas);
        sdr += parseInt(value.sdr);
        wb += parseInt(value.wb);
        lppc += parseInt(value.lppc);
        lppc_pas += parseInt(value.lppc_pas);
        cryo += parseInt(value.cryo);
        amount += parseInt(amountItem);

    });
    event_data += '<tr>';
    event_data += '<td><b>' + 'รวม' + '</b></td>';
    event_data += '<td><b>' + prc + '</b></td>';
    event_data += '<td><b>' + lprc + '</b></td>';
    event_data += '<td><b>' + ffp + '</b></td>';
    event_data += '<td><b>' + pc + '</b></td>';
    event_data += '<td><b>' + lppc + '</b></td>';
    event_data += '<td><b>' + lppc_pas + '</b></td>';
    event_data += '<td><b>' + sdp + '</b></td>';
    event_data += '<td><b>' + sdp_pas + '</b></td>';
    event_data += '<td><b>' + wb + '</b></td>';
    event_data += '<td><b>' + ldprc + '</b></td>';
    event_data += '<td><b>' + sdr + '</b></td>';
    event_data += '<td><b>' + amount + '</b></td>';
    // event_data += '<td><b>' + cryo + '</b></td>';

    event_data += '</tr>';
    $('#' + eid).append(event_data);

}

function Stock2_3(eid = '', data) {


    var body = document.getElementById(eid).getElementsByTagName(
        'tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    var prc = 0;
    var lprc = 0;
    var ldprc = 0;
    var ffp = 0;
    var pc = 0;
    var sdp = 0;
    var sdp_pas = 0;
    var sdr = 0;
    var wb = 0;
    var lppc = 0;
    var lppc_pas = 0;
    var cryo = 0;
    var amount = 0;
    var amountItem = 0;

    var prc2 = 0;
    var lprc2 = 0;
    var ldprc2 = 0;
    var ffp2 = 0;
    var pc2 = 0;
    var sdp2 = 0;
    var sdp_pas2 = 0;
    var sdr2 = 0;
    var wb2 = 0;
    var lppc2 = 0;
    var lppc_pas2 = 0;
    var cryo2 = 0;
    var amount2 = 0;
    var amountItem2 = 0;
    $.each(data, function(index, value) {
        amountItem = parseInt(value.prc) + parseInt(value.lprc) + parseInt(value.ldprc) +
            parseInt(value.ffp) + parseInt(value.pc) + parseInt(value.sdp) +
            parseInt(value.sdr) + parseInt(value.wb) + parseInt(value.lppc) +
            parseInt(value.lppc_pas) + parseInt(value.sdp_pas);
        // parseInt(value.cryo) + parseInt(value.lppc_pas) + parseInt(value.sdp_pas);

        amountItem2 = parseInt(value.prc2) + parseInt(value.lprc2) + parseInt(value.ldprc2) +
            parseInt(value.ffp2) + parseInt(value.pc2) + parseInt(value.sdp2) +
            parseInt(value.sdr2) + parseInt(value.wb2) + parseInt(value.lppc2) +
            parseInt(value.lppc_pas2) + parseInt(value.sdp_pas2);
        // parseInt(value.cryo2) + parseInt(value.lppc_pas2) + parseInt(value.sdp_pas2);
        event_data += '<tr>';
        event_data += '<td>' + value.bloodgroupname + '</td>';
        event_data += '<td>' + ((value.prc > 0) ? value.prc : '-') + '</td>';
        event_data += '<td>' + ((value.lprc > 0) ? value.lprc : '-') + '</td>';
        event_data += '<td>' + ((value.ffp > 0) ? value.ffp : '-') + '</td>';
        event_data += '<td>' + ((value.pc > 0) ? value.pc : '-') + '</td>';
        event_data += '<td>' + ((value.lppc > 0) ? value.lppc : '-') + '</td>';
        event_data += '<td>' + ((value.lppc_pas > 0) ? value.lppc_pas : '-') + '</td>';
        event_data += '<td>' + ((value.sdp > 0) ? value.sdp : '-') + '</td>';
        event_data += '<td>' + ((value.sdp_pas > 0) ? value.sdp_pas : '-') + '</td>';
        event_data += '<td>' + ((value.wb > 0) ? value.wb : '-') + '</td>';
        event_data += '<td>' + ((value.ldprc > 0) ? value.ldprc : '-') + '</td>';
        event_data += '<td>' + ((value.sdr > 0) ? value.sdr : '-') + '</td>';
        event_data += '<td><b>' + amountItem + '</b></td>';
        // event_data += '<td>' + ((value.cryo > 0) ? value.cryo : '-') + '</td>';



        event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';

        event_data += '<td>' + ((value.prc2 > 0) ? value.prc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lprc2 > 0) ? value.lprc2 : '-') + '</td>';
        event_data += '<td>' + ((value.ffp2 > 0) ? value.ffp2 : '-') + '</td>';
        event_data += '<td>' + ((value.pc2 > 0) ? value.pc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lppc2 > 0) ? value.lppc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lppc_pas2 > 0) ? value.lppc_pas2 : '-') + '</td>';
        event_data += '<td>' + ((value.sdp2 > 0) ? value.sdp2 : '-') + '</td>';
        event_data += '<td>' + ((value.sdp_pas2 > 0) ? value.sdp_pas2 : '-') + '</td>';
        event_data += '<td>' + ((value.wb2 > 0) ? value.wb2 : '-') + '</td>';
        event_data += '<td>' + ((value.ldprc2 > 0) ? value.ldprc2 : '-') + '</td>';
        event_data += '<td>' + ((value.sdr2 > 0) ? value.sdr2 : '-') + '</td>';
        event_data += '<td><b>' + amountItem2 + '</b></td>';
        // event_data += '<td>' + ((value.cryo2 > 0) ? value.cryo2 : '-') + '</td>';



        event_data += '</tr>';

        prc += parseInt(value.prc);
        lprc += parseInt(value.lprc);
        ldprc += parseInt(value.ldprc);
        ffp += parseInt(value.ffp);
        pc += parseInt(value.pc);
        sdp += parseInt(value.sdp);
        sdp_pas += parseInt(value.sdp_pas);
        sdr += parseInt(value.sdr);
        wb += parseInt(value.wb);
        lppc += parseInt(value.lppc);
        lppc_pas += parseInt(value.lppc_pas);
        cryo += parseInt(value.cryo);
        amount += parseInt(amountItem);

        prc2 += parseInt(value.prc2);
        lprc2 += parseInt(value.lprc2);
        ldprc2 += parseInt(value.ldprc2);
        ffp2 += parseInt(value.ffp2);
        pc2 += parseInt(value.pc2);
        sdp2 += parseInt(value.sdp2);
        sdp_pas2 += parseInt(value.sdp_pas2);
        sdr2 += parseInt(value.sdr2);
        wb2 += parseInt(value.wb2);
        lppc2 += parseInt(value.lppc2);
        lppc_pas2 += parseInt(value.lppc_pas2);
        cryo2 += parseInt(value.cryo2);
        amount2 += parseInt(amountItem2);

    });
    event_data += '<tr>';
    event_data += '<td><b>' + 'รวม' + '</b></td>';
    event_data += '<td><b>' + prc + '</b></td>';
    event_data += '<td><b>' + lprc + '</b></td>';
    event_data += '<td><b>' + ffp + '</b></td>';
    event_data += '<td><b>' + pc + '</b></td>';
    event_data += '<td><b>' + lppc + '</b></td>';
    event_data += '<td><b>' + lppc_pas + '</b></td>';
    event_data += '<td><b>' + sdp + '</b></td>';
    event_data += '<td><b>' + sdp_pas + '</b></td>';
    event_data += '<td><b>' + wb + '</b></td>';
    event_data += '<td><b>' + ldprc + '</b></td>';
    event_data += '<td><b>' + sdr + '</b></td>';
    event_data += '<td><b>' + amount + '</b></td>';
    // event_data += '<td><b>' + cryo + '</b></td>';

    event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';

    event_data += '<td><b>' + prc2 + '</b></td>';
    event_data += '<td><b>' + lprc2 + '</b></td>';
    event_data += '<td><b>' + ffp2 + '</b></td>';
    event_data += '<td><b>' + pc2 + '</b></td>';
    event_data += '<td><b>' + lppc2 + '</b></td>';
    event_data += '<td><b>' + lppc_pas2 + '</b></td>';
    event_data += '<td><b>' + sdp2 + '</b></td>';
    event_data += '<td><b>' + sdp_pas2 + '</b></td>';
    event_data += '<td><b>' + wb2 + '</b></td>';
    event_data += '<td><b>' + ldprc2 + '</b></td>';
    event_data += '<td><b>' + sdr2 + '</b></td>';
    event_data += '<td><b>' + amount2 + '</b></td>';
    // event_data += '<td><b>' + cryo2 + '</b></td>';
    event_data += '</tr>';
    $('#' + eid).append(event_data);

}

function Stock4(eid = '', data) {


    var body = document.getElementById(eid).getElementsByTagName(
        'tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    $.each(data, function(index, value) {
        event_data += '<tr>';
        event_data += '<td><b>' + value.cryo + '</b></td>';
        event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';
        event_data += '<td><b>' + value.cryo2 + '</b></td>';
        event_data += '</tr>';
    });



    event_data += '</tr>';
    $('#' + eid).append(event_data);

}


function Stock5(eid = '', data, data2) {


    var body = document.getElementById(eid).getElementsByTagName(
        'tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var sum_prc = 0;
    var sum_lprc = 0;
    var sum_min = 0;

    var sum_diff_lprc = 0;
    var sum_diff_prc = 0;

    var event_data = '';

    var stylebackground = 'style="background: red;"';

    var count_blg = 1;

    $.each(data, function(index, value) {

        sum_prc += parseInt(value.prc);
        sum_lprc += parseInt(value.lprc);
        sum_prc_lprc = (parseInt(value.lprc) + parseInt(value.prc))
        min = parseInt(data2[index].qty);
        sum_min += min;

        diff_lprc = parseInt(((min - parseInt(sum_prc_lprc)) * 2 / 3))
        diff_prc = parseInt(((min - parseInt(sum_prc_lprc)) * 1 / 3))

        diff_lprc = (diff_lprc > 0) ? diff_lprc : 0;
        diff_prc = (diff_prc > 0) ? diff_prc : 0;

        sum_diff_lprc += diff_lprc;
        sum_diff_prc += diff_prc;


        event_data += '<tr>';
        event_data += '<td><b>' + value.bloodgroupname + '</b></td>';
        event_data += '<td>' + value.lprc + '</td>'; ///
        event_data += '<td>' + value.prc + '</td>';
        event_data += '<td>' + sum_prc_lprc + '</td>';
        event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';
        event_data += '<td>' + min + '</td>';
        event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';
        event_data += '<td id="diff_lprc' + count_blg + '"' + ((diff_lprc > 0) ? stylebackground : '') + ' >' + diff_lprc + '</td>';
        event_data += '<td id="diff_prc' + count_blg + '" ' + ((diff_prc > 0) ? stylebackground : '') + ' >' + diff_prc + '</td>';
        event_data += '<td ' + (((parseInt(diff_lprc) + parseInt(diff_prc)) > 0) ? stylebackground : '') + ' >' + (parseInt(diff_lprc) + parseInt(diff_prc)) + '</td>';

        event_data += '</tr>';

        count_blg++;
    });

    event_data += '<tr>';
    event_data += '<td><b>รวม</b></td>';
    event_data += '<td>' + sum_lprc + '</td>';
    event_data += '<td>' + sum_prc + '</td>';
    event_data += '<td>' + (parseInt(sum_lprc) + parseInt(sum_prc)) + '</td>';
    event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';
    event_data += '<td>' + sum_min + '</td>';
    event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';
    event_data += '<td ' + ((sum_diff_lprc > 0) ? stylebackground : '') + ' >' + sum_diff_lprc + '</td>';
    event_data += '<td ' + ((sum_diff_prc > 0) ? stylebackground : '') + '>' + sum_diff_prc + '</td>';
    event_data += '<td ' + (((parseInt(sum_diff_lprc) + parseInt(sum_diff_prc)) > 0) ? stylebackground : '') + ' ><b>' + (parseInt(sum_diff_lprc) + parseInt(sum_diff_prc)) + '</b></td>';
    event_data += '</tr>';



    event_data += '</tr>';
    $('#' + eid).append(event_data);

}