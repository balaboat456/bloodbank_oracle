"use strict";

function loadTable() {
  $.ajax({
    url: 'data/blood/blood-stock-pay-askforblood.php',
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_json_out").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      } // var body = document.getElementById("list_table_json_out_sum").getElementsByTagName('tbody')[0];
      // while (body.firstChild) {
      //     body.removeChild(body.firstChild);
      // }


      var event_data = '';
      var event_data_sum = '';
      $("#blood-release").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      var bloodExp = "";
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
      $.each(obj, function (index, value) {
        var arr = [value];

        if (checkBloodExp(value.bloodexp)) {
          bloodExp = bloodExp + value.bag_number + "\n,";
        }

        if (value.bloodtype == 'LPRC' && value.bloodgroup == 'A') {
          LPRC_A++;
        } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'A') {
          LDPRC_A++;
        } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'A') {
          PRC_A++;
        } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'A') {
          SDP_A++;
        } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'A') {
          LPPC_A++;
        } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'A') {
          LDPPC_A++;
        } else if (value.bloodtype == 'PC' && value.bloodgroup == 'A') {
          PC_A++;
        } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'A') {
          FFP_A++;
        } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'A') {
          CRP_A++;
        } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'A') {
          CAYO_A++;
        } else if (value.bloodtype == 'LPRC' && value.bloodgroup == 'B') {
          LPRC_B++;
        } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'B') {
          LDPRC_B++;
        } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'B') {
          PRC_B++;
        } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'B') {
          SDP_B++;
        } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'B') {
          LPPC_B++;
        } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'B') {
          LDPPC_B++;
        } else if (value.bloodtype == 'PC' && value.bloodgroup == 'B') {
          PC_B++;
        } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'B') {
          FFP_B++;
        } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'B') {
          CRP_B++;
        } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'B') {
          CAYO_B++;
        } else if (value.bloodtype == 'LPRC' && value.bloodgroup == 'AB') {
          LPRC_AB++;
        } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'AB') {
          LDPRC_AB++;
        } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'AB') {
          PRC_AB++;
        } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'AB') {
          SDP_AB++;
        } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'AB') {
          LPPC_AB++;
        } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'AB') {
          LDPPC_AB++;
        } else if (value.bloodtype == 'PC' && value.bloodgroup == 'AB') {
          PC_AB++;
        } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'AB') {
          FFP_AB++;
        } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'AB') {
          CRP_AB++;
        } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'AB') {
          CAYO_AB++;
        } else if (value.bloodtype == 'LPRC' && value.bloodgroup == 'O') {
          LPRC_O++;
        } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'O') {
          LDPRC_O++;
        } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'O') {
          PRC_O++;
        } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'O') {
          SDP_O++;
        } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'O') {
          LPPC_O++;
        } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'O') {
          LDPPC_O++;
        } else if (value.bloodtype == 'PC' && value.bloodgroup == 'O') {
          PC_O++;
        } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'O') {
          FFP_O++;
        } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'O') {
          CRP_O++;
        } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'O') {
          CAYO_O++;
        }

        var styleState = "";
        if (parseInt(value.exp_diff) <= 7) styleState = "background: red;";
        event_data += '<tr style="' + styleState + '">';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="checkbox"  onchange="setBloodOutCheck(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table">' + value.bag_number + '</td>';
        event_data += '<td class="td-table">' + value.bloodstockrfid + '</td>';
        event_data += '<td class="td-table">' + value.sub + '</td>';
        event_data += '<td class="td-table">' + value.bloodtype + '</td>';
        event_data += '<td class="td-table">' + value.rubberbandnumber + '</td>';
        event_data += '<td class="td-table">' + value.bloodgroup + '</td>';
        event_data += '<td class="td-table">' + value.rhname3 + '</td>';
        event_data += '<td class="td-table">' + value.volume + '</td>';
        event_data += '<td class="td-table">' + getDMY(value.bloodstart) + '</td>';
        event_data += '<td class="td-table">' + getDMY(value.bloodexp) + '</td>';
        event_data += '<td class="td-table">' + value.antibody + '</td>';
        event_data += '<td class="td-table">' + value.phenotype + '</td>';
        event_data += '</tr>';
      });
      $("#list_table_json_out").append(event_data);
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
      event_data_sum += '</tr>'; // $("#list_table_json_out_sum").append(event_data_sum);

      dateBE('.date1');

      if (bloodExp != "") {
        var callback = function callback(inputValue) {
          if (inputValue) {}
        };

        mgsInfo("หมายเลขถุงใกล้หมดอายุแล้ว", lastString(bloodExp), callback);
      }

      console.log(lastString(bloodExp));
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function checkBloodExp(dateExp) {
  var dateFrom = new Date(dmyToymd(getDMY(dateExp)));
  var today = new Date();
  console.log(dateFrom);
  console.log(today);
  var diffData7 = parseInt((dateFrom - today) / (1000 * 60 * 60 * 24), 10);
  var $status = false;
  console.log(diffData7);

  if (diffData7 >= 0 && diffData7 < 6) {
    $status = true;
  }

  return $status;
}

function scanBarcode() {
  var bag_number = $('#barcode').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#barcode').val(bag_number_new);
}

function searchBagNumber() {
  var bag_number = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (!findTableBagNumber(bag_number)) {
    errorSwal2('ไม่พบผลิตภัณฑ์นี้');
  }

  document.getElementById("barcode").value = '';
  document.getElementById("barcode").focus();
}

function findTableBagNumber(number) {
  var result = false;
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    if (rows[i].cells[2].innerHTML == number) {
      result = true;
      rows[i].cells[1].getElementsByTagName('input')[0].checked = true;
      var row = rows[i];
      var item = JSON.parse(row.cells[0].innerHTML);
      item[0].ck = true;
      row.cells[0].innerHTML = JSON.stringify(item);
      break;
    }
  }

  return result;
}

function searchRfid() {
  var rfid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (!findTableRfid(rfid)) {
    errorSwal2('ไม่พบผลิตภัณฑ์นี้');
  }
}

function findTableRfid(number) {
  var result = false;
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    if (rows[i].cells[3].innerHTML == number) {
      result = true;
      rows[i].cells[1].getElementsByTagName('input')[0].checked = true;
      var row = rows[i];
      var item = JSON.parse(row.cells[0].innerHTML);
      item[0].ck = true;
      row.cells[0].innerHTML = JSON.stringify(item);
      break;
    }
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

function setBloodOutCheck(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].ck = self.checked;
  row.cells[0].innerHTML = JSON.stringify(item);
}