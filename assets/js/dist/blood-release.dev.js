"use strict";

function loadTable() {
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
    url: 'data/blood/blood-release.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate + '&requestunit=' + requestunit,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_blood_release").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var body = document.getElementById("list_table_json_out_sum").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      var event_data_sum = '';
      var LPRC_A = 0;
      var LDPRC_A = 0;
      var PRC_A = 0;
      var SDP_A = 0;
      var LPPC_A = 0;
      var LDPPC_A = 0;
      var PC_A = 0;
      var FFP_A = 0;
      var CRP_A = 0;
      var CAYO_A = 0;
      var LPRC_B = 0;
      var LDPRC_B = 0;
      var PRC_B = 0;
      var SDP_B = 0;
      var LPPC_B = 0;
      var LDPPC_B = 0;
      var PC_B = 0;
      var FFP_B = 0;
      var CRP_B = 0;
      var CAYO_B = 0;
      var LPRC_O = 0;
      var LDPRC_O = 0;
      var PRC_O = 0;
      var SDP_O = 0;
      var LPPC_O = 0;
      var LDPPC_O = 0;
      var PC_O = 0;
      var FFP_O = 0;
      var CRP_O = 0;
      var CAYO_O = 0;
      var LPRC_AB = 0;
      var LDPRC_AB = 0;
      var PRC_AB = 0;
      var SDP_AB = 0;
      var LPPC_AB = 0;
      var LDPPC_AB = 0;
      var PC_AB = 0;
      var FFP_AB = 0;
      var CRP_AB = 0;
      var CAYO_AB = 0;
      $("#blood-release").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var color = '';

        if (value.isdischarge == 1 || value.ispassedaway == 1) {
          color = '#F08080';
        }

        if (value.cm_bloodtype == 'LPRC' && value.CM_bloodgroupid == 'A') {
          LPRC_A++;
        } else if (value.cm_bloodtype == 'LDPRC' && value.CM_bloodgroupid == 'A') {
          LDPRC_A++;
        } else if (value.cm_bloodtype == 'PRC' && value.CM_bloodgroupid == 'A') {
          PRC_A++;
        } else if (value.cm_bloodtype == 'SDP' && value.CM_bloodgroupid == 'A') {
          SDP_A++;
        } else if (value.cm_bloodtype == 'LPPC' && value.CM_bloodgroupid == 'A') {
          LPPC_A++;
        } else if (value.cm_bloodtype == 'LDPPC' && value.CM_bloodgroupid == 'A') {
          LDPPC_A++;
        } else if (value.cm_bloodtype == 'PC' && value.CM_bloodgroupid == 'A') {
          PC_A++;
        } else if (value.cm_bloodtype == 'FFP' && value.CM_bloodgroupid == 'A') {
          FFP_A++;
        } else if (value.cm_bloodtype == 'CRP' && value.CM_bloodgroupid == 'A') {
          CRP_A++;
        } else if (value.cm_bloodtype == 'CAYO' && value.CM_bloodgroupid == 'A') {
          CAYO_A++;
        } else if (value.cm_bloodtype == 'LPRC' && value.CM_bloodgroupid == 'B') {
          LPRC_B++;
        } else if (value.cm_bloodtype == 'LDPRC' && value.CM_bloodgroupid == 'B') {
          LDPRC_B++;
        } else if (value.cm_bloodtype == 'PRC' && value.CM_bloodgroupid == 'B') {
          PRC_B++;
        } else if (value.cm_bloodtype == 'SDP' && value.CM_bloodgroupid == 'B') {
          SDP_B++;
        } else if (value.cm_bloodtype == 'LPPC' && value.CM_bloodgroupid == 'B') {
          LPPC_B++;
        } else if (value.cm_bloodtype == 'LDPPC' && value.CM_bloodgroupid == 'B') {
          LDPPC_B++;
        } else if (value.cm_bloodtype == 'PC' && value.CM_bloodgroupid == 'B') {
          PC_B++;
        } else if (value.cm_bloodtype == 'FFP' && value.CM_bloodgroupid == 'B') {
          FFP_B++;
        } else if (value.cm_bloodtype == 'CRP' && value.CM_bloodgroupid == 'B') {
          CRP_B++;
        } else if (value.cm_bloodtype == 'CAYO' && value.CM_bloodgroupid == 'B') {
          CAYO_B++;
        } else if (value.cm_bloodtype == 'LPRC' && value.CM_bloodgroupid == 'AB') {
          LPRC_AB++;
        } else if (value.cm_bloodtype == 'LDPRC' && value.CM_bloodgroupid == 'AB') {
          LDPRC_AB++;
        } else if (value.cm_bloodtype == 'PRC' && value.CM_bloodgroupid == 'AB') {
          PRC_AB++;
        } else if (value.cm_bloodtype == 'SDP' && value.CM_bloodgroupid == 'AB') {
          SDP_AB++;
        } else if (value.cm_bloodtype == 'LPPC' && value.CM_bloodgroupid == 'AB') {
          LPPC_AB++;
        } else if (value.cm_bloodtype == 'LDPPC' && value.CM_bloodgroupid == 'AB') {
          LDPPC_AB++;
        } else if (value.cm_bloodtype == 'PC' && value.CM_bloodgroupid == 'AB') {
          PC_AB++;
        } else if (value.cm_bloodtype == 'FFP' && value.CM_bloodgroupid == 'AB') {
          FFP_AB++;
        } else if (value.cm_bloodtype == 'CRP' && value.CM_bloodgroupid == 'AB') {
          CRP_AB++;
        } else if (value.cm_bloodtype == 'CAYO' && value.CM_bloodgroupid == 'AB') {
          CAYO_AB++;
        } else if (value.cm_bloodtype == 'LPRC' && value.CM_bloodgroupid == 'O') {
          LPRC_O++;
        } else if (value.cm_bloodtype == 'LDPRC' && value.CM_bloodgroupid == 'O') {
          LDPRC_O++;
        } else if (value.cm_bloodtype == 'PRC' && value.CM_bloodgroupid == 'O') {
          PRC_O++;
        } else if (value.cm_bloodtype == 'SDP' && value.CM_bloodgroupid == 'O') {
          SDP_O++;
        } else if (value.cm_bloodtype == 'LPPC' && value.CM_bloodgroupid == 'O') {
          LPPC_O++;
        } else if (value.cm_bloodtype == 'LDPPC' && value.CM_bloodgroupid == 'O') {
          LDPPC_O++;
        } else if (value.cm_bloodtype == 'PC' && value.CM_bloodgroupid == 'O') {
          PC_O++;
        } else if (value.cm_bloodtype == 'FFP' && value.CM_bloodgroupid == 'O') {
          FFP_O++;
        } else if (value.cm_bloodtype == 'CRP' && value.CM_bloodgroupid == 'O') {
          CRP_O++;
        } else if (value.cm_bloodtype == 'CAYO' && value.CM_bloodgroupid == 'O') {
          CAYO_O++;
        }

        var arr = [value];
        event_data += '<tr style="background:' + color + '">';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? getDMY(value.requestblooddate) + ' ' + value.requestbloodtime : '') + '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? getDMY(value.usedblooddateto) : '') + '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? value.hn : '') + '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? value.patientan : '') + '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? value.patientfullname : '') + '</td>';
        event_data += '<td class="td-table CellWithComment" >' + (value.seq == 1 ? value.unitofficename1.substring(0, 18) + '<span class="CellComment">' + value.unitofficename1 + '</span>' : '') + '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? value.bloodstocktypenamegroup : '') + '</td>';
        event_data += '<td class="td-table">';
        event_data += value.seq == 1 ? '<input type="checkbox" onclick="return false;" ' + (value.isdischarge == 1 ? 'checked' : '') + '  >' : '';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += value.seq == 1 ? '<input type="checkbox" onclick="return false;" ' + (value.ispassedaway == 1 ? 'checked' : '') + '  >' : '';
        event_data += '</td>';
        event_data += '<td class="td-table">' + (value.seq == 1 ? getDMY(value.usedblooddateto) : '') + '</td>';
        event_data += '<td class="td-table">' + value.cm_bloodtype + '</td>';
        event_data += '<td class="td-table">' + value.cm_bag_number + '</td>';
        event_data += '<td class="td-table">' + value.bloodstockrfid + '</td>';
        event_data += '<td class="td-table">' + value.CM_bloodgroupid + '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="checkbox"  onchange="setBloodReleaseCheck(this)" >';
        event_data += '</td>';
        event_data += '</tr>';
      });
      $("#list_table_blood_release").append(event_data);
      event_data_sum += '<tr >';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPRC_A > 0 ? 'color="red"' : '') + '>LPRC(A) = ' + LPRC_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPRC_A > 0 ? 'color="red"' : '') + '>LDPRC(A) = ' + LDPRC_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PRC_A > 0 ? 'color="red"' : '') + '>PRC(A) = ' + PRC_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (SDP_A > 0 ? 'color="red"' : '') + '>SDP(A) = ' + SDP_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPPC_A > 0 ? 'color="red"' : '') + '>LPPC(A) = ' + LPPC_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPPC_A > 0 ? 'color="red"' : '') + '>LDPPC(A) = ' + LDPPC_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PC_A > 0 ? 'color="red"' : '') + '>PC(A) = ' + PC_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (FFP_A > 0 ? 'color="red"' : '') + '>FFP(A) = ' + FFP_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CRP_A > 0 ? 'color="red"' : '') + '>CRP(A) = ' + CRP_A + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CAYO_A > 0 ? 'color="red"' : '') + '>CRYO(A) = ' + CAYO_A + '</font></th>';
      event_data_sum += '</tr>';
      event_data_sum += '<tr >';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPRC_B > 0 ? 'color="red"' : '') + '>LPRC(B) = ' + LPRC_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPRC_B > 0 ? 'color="red"' : '') + '>LDPRC(B) = ' + LDPRC_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PRC_B > 0 ? 'color="red"' : '') + '>PRC(B) = ' + PRC_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (SDP_B > 0 ? 'color="red"' : '') + '>SDP(B) = ' + SDP_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPPC_B > 0 ? 'color="red"' : '') + '>LPPC(B) = ' + LPPC_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPPC_B > 0 ? 'color="red"' : '') + '>LDPPC(B) = ' + LDPPC_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PC_B > 0 ? 'color="red"' : '') + '>PC(B) = ' + PC_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (FFP_B > 0 ? 'color="red"' : '') + '>FFP(B) = ' + FFP_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CRP_B > 0 ? 'color="red"' : '') + '>CRP(B) = ' + CRP_B + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CAYO_B > 0 ? 'color="red"' : '') + '>CRYO(B) = ' + CAYO_B + '</font></th>';
      event_data_sum += '</tr>';
      event_data_sum += '<tr >';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPRC_O > 0 ? 'color="red"' : '') + '>LPRC(O) = ' + LPRC_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPRC_O > 0 ? 'color="red"' : '') + '>LDPRC(O) = ' + LDPRC_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PRC_O > 0 ? 'color="red"' : '') + '>PRC(O) = ' + PRC_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (SDP_O > 0 ? 'color="red"' : '') + '>SDP(O) = ' + SDP_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPPC_O > 0 ? 'color="red"' : '') + '>LPPC(O) = ' + LPPC_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPPC_O > 0 ? 'color="red"' : '') + '>LDPPC(O) = ' + LDPPC_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PC_O > 0 ? 'color="red"' : '') + '>PC(O) = ' + PC_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (FFP_O > 0 ? 'color="red"' : '') + '>FFP(O) = ' + FFP_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CRP_O > 0 ? 'color="red"' : '') + '>CRP(O) = ' + CRP_O + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CAYO_O > 0 ? 'color="red"' : '') + '>CRYO(O) = ' + CAYO_O + '</font></th>';
      event_data_sum += '</tr>';
      event_data_sum += '<tr >';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPRC_AB > 0 ? 'color="red"' : '') + '>LPRC(AB) = ' + LPRC_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPRC_AB > 0 ? 'color="red"' : '') + '>LDPRC(AB) = ' + LDPRC_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PRC_AB > 0 ? 'color="red"' : '') + '>PRC(AB) = ' + PRC_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (SDP_AB > 0 ? 'color="red"' : '') + '>SDP(AB) = ' + SDP_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LPPC_AB > 0 ? 'color="red"' : '') + '>LPPC(AB) = ' + LPPC_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (LDPPC_AB > 0 ? 'color="red"' : '') + '>LDPPC(AB) = ' + LDPPC_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (PC_AB > 0 ? 'color="red"' : '') + '>PC(AB) = ' + PC_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (FFP_AB > 0 ? 'color="red"' : '') + '>FFP(AB) = ' + FFP_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CRP_AB > 0 ? 'color="red"' : '') + '>CRP(AB) = ' + CRP_AB + '</font></th>';
      event_data_sum += '<th style="width:120px" class="td-table"><font ' + (CAYO_AB > 0 ? 'color="red"' : '') + '>CRYO(AB) = ' + CAYO_AB + '</font></th>';
      event_data_sum += '</tr>';
      $("#list_table_json_out_sum").append(event_data_sum);
      dateBE('.date1');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function scanBarcode() {
  var bag_number = $('#barcode').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#barcode').val(bag_number_new);
  searchBagNumber(bag_number_new);
}

function searchBagNumber() {
  var bag_number = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (bag_number.length != 14) {
    return false;
  }

  if (!findTableBagNumber(bag_number)) {
    errorSwal2('ไม่พบผลิตภัณฑ์นี้');
  }

  document.getElementById("barcode").value = '';
  document.getElementById("barcode").focus();
}

function findTableBagNumber(number) {
  var result = false;
  var rows = document.getElementById("list_table_blood_release").rows;

  for (var i = 1; i < rows.length; i++) {
    if (rows[i].cells[12].innerHTML == number) {
      result = true;
      rows[i].cells[15].getElementsByTagName('input')[0].checked = true;
      rows[i].cells[15].getElementsByTagName('input')[0].focus();
      var row = rows[i];
      var item = JSON.parse(row.cells[0].innerHTML);
      item[0].crossmacthstatusid = '10';
      row.cells[0].innerHTML = JSON.stringify(item);
      break;
    }
  }

  return result;
}

var counter;

function scanRFID() {
  var count = 20;
  if (counter) clearInterval(counter);
  counter = setInterval(timer, 100); //1000 will  run it every 1 second

  function timer() {
    count = count - 1;

    if (count <= 0) {
      clearInterval(counter);
      var rfid = $('#rfid').val();
      searchRFID(rfid);
      return;
    } //Do code for showing the number of seconds here

  }
}

function searchRFID() {
  var rfid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (rfid.length < 1) {
    return false;
  }

  if (!findTableRFID(rfid)) {
    errorSwal2('ไม่พบผลิตภัณฑ์นี้');
  }

  document.getElementById("rfid").value = '';
  document.getElementById("rfid").focus();
}

function findTableRFID(number) {
  var result = false;
  var rows = document.getElementById("list_table_blood_release").rows;

  for (var i = 1; i < rows.length; i++) {
    var numberArray = number.split(",");
    $.each(numberArray, function (index, value) {
      if (value != "") {
        if (rows[i].cells[13].innerHTML == value) {
          result = true;
          rows[i].cells[15].getElementsByTagName('input')[0].checked = true;
          rows[i].cells[15].getElementsByTagName('input')[0].focus();
          var row = rows[i];
          var item = JSON.parse(row.cells[0].innerHTML);
          item[0].crossmacthstatusid = '10';
          row.cells[0].innerHTML = JSON.stringify(item);
        }
      }
    });
  }

  return result;
}

function errorSwal2() {
  var $msg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  swal({
    title: $msg,
    // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
    type: 'warning',
    confirmButtonText: 'OK',
    allowOutsideClick: false
  }).then(function (value) {
    document.getElementById("barcode").value = '';
    document.getElementById("barcode").focus();
  });
  return false;
}

function setBloodReleaseCheck(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].crossmacthstatusid = self.checked ? '10' : '';
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setCauseReleaseRemark(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].causereleaseremark = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}