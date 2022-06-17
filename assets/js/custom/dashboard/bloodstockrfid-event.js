function loadStockRFID(state = false) {

    if (state)
        spinnershow();
    $.ajax({
        url: 'data/dashboard/blooodstockrfid.php',
        dataType: 'json',
        type: 'get',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {


            if (data.status) {

                document.getElementById('donatedatetotal').innerHTML = data.donatedatetotal + " คน";
                document.getElementById('bagnumbertotal').innerHTML = data.bagnumbertotal + " ยูนิต";
                document.getElementById('crossmacthdatetotal').innerHTML = data.crossmacthdatetotal + " ยูนิต";


                // StockTableRFID(data.data);
            } else {
                document.getElementById('gatetotal').innerHTML = "0";
                document.getElementById('bagnumbertotal').innerHTML = "0";
            }

        },
        error: function(d) {
            /*console.log("error");*/
        }
    });

}

function loadStockRFID2(state = false) {

    if (state)
        spinnershow();
    $.ajax({
        url: 'data/dashboard/blooodstockrfid-gate.php',
        dataType: 'json',
        type: 'get',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {


            if (data.status) {

                // document.getElementById('gatetotal').innerHTML = data.gatetotal + " ยูนิต";

            }

        },
        error: function(d) {
            /*console.log("error");*/
        }
    });

}

function StockTableRFID(data) {


    var event_data = '';

    var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));

    $.each(obj, function(index, value) {

        event_data += '<div class="row">';
        event_data += '    <div class="table-no-scroll">';
        event_data += '        <table >';
        event_data += '            <thead>';
        event_data += '                <tr>';
        event_data += '                    <th rowspan="2">หมู่เลือด</th>';
        event_data += '                    <th colspan="13">จำนวน Stock โลหิต ตู้ ' + value.gateid + '</th>';
        event_data += '                </tr>';
        event_data += '                <tr>';
        event_data += '                    <th style="width:80px">PRC</th>';
        event_data += '                    <th style="width:80px">LPRC</th>';
        event_data += '                    <th style="width:80px">LDPRC</th>';
        event_data += '                    <th style="width:80px">WB</th>';
        event_data += '                    <th style="width:80px">SDR</th>';

        event_data += '                    <th style="width:40px">FFP</th>';
        event_data += '                    <th style="width:40px">PC</th>';
        event_data += '                    <th style="width:40px">LPPC</th>';
        event_data += '                    <th style="width:40px">LPPC<br />(PAS)</th>';
        event_data += '                    <th style="width:40px">SDP</th>';
        event_data += '                    <th style="width:40px">SDP<br />(PAS)</th>';
        event_data += '                    <th style="width:40px">Cryo</th>';

        event_data += '                    <th style="width:80px">รวม</th>';
        event_data += '                </tr>';
        event_data += '            </thead>';
        event_data += '            <tbody>';

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
        $.each(value.data, function(inx, vl) {
            amountItem = parseInt(vl.prc) + parseInt(vl.lprc) + parseInt(vl.ldprc) +
                parseInt(vl.sdr) + parseInt(vl.wb);
            event_data += '<tr>';
            event_data += '<td>' + vl.bloodgroupname + '</td>';
            event_data += '<td>' + ((vl.prc > 0) ? vl.prc : '-') + '</td>';
            event_data += '<td>' + ((vl.lprc > 0) ? vl.lprc : '-') + '</td>';
            event_data += '<td>' + ((vl.ldprc > 0) ? vl.ldprc : '-') + '</td>';
            event_data += '<td>' + ((vl.wb > 0) ? vl.wb : '-') + '</td>';
            event_data += '<td>' + ((vl.sdr > 0) ? vl.sdr : '-') + '</td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td bgcolor="#808080"></td>';
            event_data += '<td><b>' + amountItem + '</b></td>';


            prc += parseInt(vl.prc);
            lprc += parseInt(vl.lprc);
            ldprc += parseInt(vl.ldprc);
            ffp += parseInt(vl.ffp);
            pc += parseInt(vl.pc);
            sdp += parseInt(vl.sdp);
            sdp_pas += parseInt(vl.sdp_pas);
            sdr += parseInt(vl.sdr);
            wb += parseInt(vl.wb);
            lppc += parseInt(vl.lppc);
            lppc_pas += parseInt(vl.lppc_pas);
            cryo += parseInt(vl.cryo);
            amount += parseInt(amountItem);
        });

        event_data += '<tr>';
        event_data += '<td><b>' + 'รวม' + '</b></td>';
        event_data += '<td><b>' + prc + '</b></td>';
        event_data += '<td><b>' + lprc + '</b></td>';
        event_data += '<td><b>' + ldprc + '</b></td>';
        event_data += '<td><b>' + wb + '</b></td>';
        event_data += '<td><b>' + sdr + '</b></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td bgcolor="#808080"></td>';
        event_data += '<td><b>' + amount + '</b></td>';

        event_data += '</tr>';


        event_data += '            </tbody>';
        event_data += '        </table>';
        event_data += '    </div>'
        event_data += '</div>';


    });



    $("#row_bug_number").append(event_data);

}