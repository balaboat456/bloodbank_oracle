"use strict";

function loadStockRFID() {
  $.ajax({
    url: 'data/dashboard/blooodstockrfid.php',
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var row_bug_number = document.getElementById("row_bug_number");
      if (row_bug_number == null) return false;

      while (row_bug_number.firstChild) {
        row_bug_number.removeChild(row_bug_number.firstChild);
      }

      if (data.status) {
        StockTableRFID(data.data);
        document.getElementById('gatetotal').innerHTML = data.gatetotal;
        document.getElementById('bagnumbertotal').innerHTML = data.bagnumbertotal;
      } else {
        document.getElementById('gatetotal').innerHTML = "0";
        document.getElementById('bagnumbertotal').innerHTML = "0";
      }
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function StockTableRFID(data) {
  var event_data = '';
  var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
  $.each(obj, function (index, value) {
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
    $.each(value.data, function (inx, vl) {
      amountItem = parseInt(vl.prc) + parseInt(vl.lprc) + parseInt(vl.ldprc) + parseInt(vl.sdr) + parseInt(vl.wb);
      event_data += '<tr>';
      event_data += '<td>' + vl.bloodgroupname + '</td>';
      event_data += '<td>' + (vl.prc > 0 ? vl.prc : '-') + '</td>';
      event_data += '<td>' + (vl.lprc > 0 ? vl.lprc : '-') + '</td>';
      event_data += '<td>' + (vl.ldprc > 0 ? vl.ldprc : '-') + '</td>';
      event_data += '<td>' + (vl.wb > 0 ? vl.wb : '-') + '</td>';
      event_data += '<td>' + (vl.sdr > 0 ? vl.sdr : '-') + '</td>';
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
    event_data += '    </div>';
    event_data += '</div>';
  });
  $("#row_bug_number").append(event_data);
} // function StockTableRFID(data)
// {
//     var event_data = '';
//     var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
//     $.each(obj, function (index, value) {
//         event_data +='<div class="row">';
//         event_data +='    <div class="table-no-scroll">';
//         event_data +='        <table >';
//         event_data +='            <thead>';
//         event_data +='                <tr>';
//         event_data +='                    <th rowspan="2">หมู่เลือด</th>';
//         event_data +='                    <th colspan="13">จำนวน Stock โลหิต ตู้ '+value.gateid+'</th>';
//         event_data +='                </tr>';
//         event_data +='                <tr>';
//         event_data +='                    <th>PRC</th>';
//         event_data +='                    <th>LPRC</th>';
//         event_data +='                    <th>FFP</th>';
//         event_data +='                    <th>PC</th>';
//         event_data +='                    <th>LPPC</th>';
//         event_data +='                    <th>LPPC<br />(PAS)</th>';
//         event_data +='                    <th>SDP</th>';
//         event_data +='                    <th>SDP<br />(PAS)</th>';
//         event_data +='                    <th>WB</th>';
//         event_data +='                    <th>LDPRC</th>';
//         event_data +='                    <th>SDR</th>';
//         event_data +='                    <th>Cryo</th>';
//         event_data +='                    <th>รวม</th>';
//         event_data +='                </tr>';
//         event_data +='            </thead>';
//         event_data +='            <tbody>';
//         var prc = 0;
//         var lprc = 0;
//         var ldprc = 0;
//         var ffp = 0;
//         var pc = 0;
//         var sdp = 0;
//         var sdp_pas = 0;
//         var sdr = 0;
//         var wb = 0;
//         var lppc = 0;
//         var lppc_pas = 0;
//         var cryo = 0;
//         var amount = 0;
//         var amountItem = 0;
//         $.each(value.data, function (inx, vl) {
//             amountItem = parseInt(vl.prc) + parseInt(vl.lprc) + parseInt(vl.ldprc) +
//             parseInt(vl.ffp) + parseInt(vl.pc) + parseInt(vl.sdp) +
//             parseInt(vl.sdr) + parseInt(vl.wb) + parseInt(vl.lppc) +
//             parseInt(vl.sdp_pas) + parseInt(vl.lppc_pas) +
//             parseInt(vl.cryo);
//             event_data += '<tr>';
//             event_data += '<td>' + vl.bloodgroupname + '</td>';
//             event_data += '<td>' + ((vl.prc > 0) ? vl.prc : '-') + '</td>';
//             event_data += '<td>' + ((vl.lprc > 0) ? vl.lprc : '-') + '</td>';
//             event_data += '<td>' + ((vl.ffp > 0) ? vl.ffp : '-') + '</td>';
//             event_data += '<td>' + ((vl.pc > 0) ? vl.pc : '-') + '</td>';
//             event_data += '<td>' + ((vl.lppc > 0) ? vl.lppc : '-') + '</td>';
//             event_data += '<td>' + ((vl.lppc_pas > 0) ? vl.lppc_pas : '-') + '</td>';
//             event_data += '<td>' + ((vl.sdp > 0) ? vl.sdp : '-') + '</td>';
//             event_data += '<td>' + ((vl.sdp_pas > 0) ? vl.sdp_pas : '-') + '</td>';
//             event_data += '<td>' + ((vl.wb > 0) ? vl.wb : '-') + '</td>';
//             event_data += '<td>' + ((vl.ldprc > 0) ? vl.ldprc : '-') + '</td>';
//             event_data += '<td>' + ((vl.sdr > 0) ? vl.sdr : '-') + '</td>';
//             event_data += '<td>' + ((vl.cryo > 0) ? vl.cryo : '-') + '</td>';
//             event_data += '<td><b>' + amountItem + '</b></td>';
//             prc += parseInt(vl.prc);
//             lprc += parseInt(vl.lprc);
//             ldprc += parseInt(vl.ldprc);
//             ffp += parseInt(vl.ffp);
//             pc += parseInt(vl.pc);
//             sdp += parseInt(vl.sdp);
//             sdp_pas += parseInt(vl.sdp_pas);
//             sdr += parseInt(vl.sdr);
//             wb += parseInt(vl.wb);
//             lppc += parseInt(vl.lppc);
//             lppc_pas += parseInt(vl.lppc_pas);
//             cryo += parseInt(vl.cryo);
//             amount += parseInt(amountItem);
//         });
//         event_data += '<tr>';
//         event_data += '<td><b>' + 'รวม' + '</b></td>';
//         event_data += '<td><b>' + prc + '</b></td>';
//         event_data += '<td><b>' + lprc + '</b></td>';
//         event_data += '<td><b>' + ffp + '</b></td>';
//         event_data += '<td><b>' + pc + '</b></td>';
//         event_data += '<td><b>' + lppc + '</b></td>';
//         event_data += '<td><b>' + lppc_pas + '</b></td>';
//         event_data += '<td><b>' + sdp + '</b></td>';
//         event_data += '<td><b>' + sdp_pas + '</b></td>';
//         event_data += '<td><b>' + wb + '</b></td>';
//         event_data += '<td><b>' + ldprc + '</b></td>';
//         event_data += '<td><b>' + sdr + '</b></td>';
//         event_data += '<td><b>' + cryo + '</b></td>';
//         event_data += '<td><b>' + amount + '</b></td>';
//         event_data += '</tr>';
//         event_data +='            </tbody>';
//         event_data +='        </table>';
//         event_data +='    </div>'
//         event_data +='</div>';
//     });
//     $("#row_bug_number").append(event_data);
// }