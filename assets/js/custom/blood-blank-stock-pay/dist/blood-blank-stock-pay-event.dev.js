"use strict";

$(document).ready(function () {
  $("#barcode").on('keydown', function (e) {
    if (e.which == 13) {
      loadTable("barcode");
    }
  });
  $('.hospital_pay').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "สาขา",
    width: "100%",
    ajax: {
      url: 'data/masterdata/hospital.php',
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
          results: $.map(data.data, function (item) {
            return {
              id: item.hospitalid,
              text: item.hospitalname,
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
    placeholder: "ประเภทการจ่าย",
    width: "100%",
    ajax: {
      url: 'data/masterdata/bloodstock-pay-type.php?grouptypeid=2',
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
          results: $.map(data.data, function (item) {
            return {
              id: item.bloodstockpaytypeid,
              text: item.bloodstockpaytypename,
              item: item
            };
          })
        };
      }
    }
  });
});

function loadTable() {
  var focusState = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var fromdate = dmyToymd2($('#fromdate').val());
  var todate = dmyToymd2($('#todate').val());
  var bloodstockpaytypeid = $('#bloodstockpaytypeid').val();
  var hospital_pay = $('#hospital_pay').val();
  spinnershow();
  $.ajax({
    url: 'data/bloodblankstockpay/blood-blank-stock-pay-list.php?fromdate=' + fromdate + "&todate=" + todate + '&bloodstockpaytypeid=' + bloodstockpaytypeid + '&hospital_pay=' + hospital_pay,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 0;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      var body = document.getElementById("list_table_blood_pay").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      $("#blood-query").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var arr = [value];
        event_data += '<tr >';
        event_data += '<td class="td-table">' + (index + 1) + '</td>';
        event_data += '<td class="td-table">' + getDMYHM(value.bloodstockpaymaindate) + '</td>';
        event_data += '<td class="td-table" >' + value.bloodstockpaytypename + '</td>';
        event_data += '<td class="td-table" >' + value.hospitalname + '</td>';
        event_data += '<td class="td-table" >' + value.bloodtype_bag_number + '</td>';
        event_data += '<td class="td-table" >' + value.bloodgroup + '</td>';
        event_data += '<td class="td-table" >' + value.group_bag_number + '</td>';
        event_data += '<td class="td-table" >' + value.bloodstockpaymainremark + '</td>';
        event_data += '<td class="td-table" >' + value.fullname + '</td>';

        if (value.bloodstockpaytypeid == "6") {
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>'; // event_data += '<input type = "hidden" id="reportexchange" value = "'+value.bloodstockpaymainid+'">';   
        } else if (value.bloodstockpaytypeid == "7") {
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport1(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
        } else if (value.bloodstockpaytypeid == "5") {
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport2(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
        } else if (value.bloodstockpaytypeid == "2") {
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport3(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
        } else if (value.bloodstockpaytypeid == "3") {
          // หมดอายุ
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport4(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
        } else if (value.bloodstockpaytypeid == "9") {
          // เสียหาย
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport5(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
        } else if (value.bloodstockpaytypeid == "8") {
          // ผู้ป่วยใน
          event_data += '<td class="td-table" >' + '<button type = "button" onclick = "printreport6(' + value.bloodstockpaymainid + ')" margin-right:100px class = "btn btn-light"><span class = "btn-label"><i class="fa fa-print"></i></span>พิมพ์</button>' + '</td>';
        } else {
          event_data += '<td class="td-table" >' + ' ' + '</td>';
        }

        event_data += '</tr>';
      });
      $("#list_table_blood_pay").append(event_data);
      loadTablemini();
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });

  if (focusState == "barcode") {
    document.getElementById("barcode").value = "";
    document.getElementById("barcode").focus;
  } else if (focusState == "rfid") {
    document.getElementById("rfid").value = "";
    document.getElementById("rfid").focus;
  }
}

function loadTablemini() {
  var fromdate = dmyToymd2($('#fromdate').val());
  var todate = dmyToymd2($('#todate').val());
  var bloodstockpaytypeid = $('#bloodstockpaytypeid').val();
  var hospital_pay = $('#hospital_pay').val();
  spinnershow();
  $.ajax({
    url: 'data/bloodblankstockpay/blood-blank-stock-pay-list-sum.php?fromdate=' + fromdate + "&todate=" + todate + '&bloodstockpaytypeid=' + bloodstockpaytypeid + '&hospital_pay=' + hospital_pay,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 0;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      var event_data_sum = '';
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        event_data_sum += '<tr >';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPRC_A > 0 ? 'color="red"' : '') + '>LPRC(A) = ' + value.LPRC_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPRC_A > 0 ? 'color="red"' : '') + '>LDPRC(A) = ' + value.LDPRC_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PRC_A > 0 ? 'color="red"' : '') + '>PRC(A) = ' + value.PRC_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.SDP_A > 0 ? 'color="red"' : '') + '>SDP(A) = ' + value.SDP_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPPC_A > 0 ? 'color="red"' : '') + '>LPPC(A) = ' + value.LPPC_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPPC_A > 0 ? 'color="red"' : '') + '>LDPPC(A) = ' + value.LDPPC_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PC_A > 0 ? 'color="red"' : '') + '>PC(A) = ' + value.PC_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.FFP_A > 0 ? 'color="red"' : '') + '>FFP(A) = ' + value.FFP_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CRP_A > 0 ? 'color="red"' : '') + '>CRP(A) = ' + value.CRP_A + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CAYO_A > 0 ? 'color="red"' : '') + '>CRYO(A) = ' + value.CAYO_A + '</font></th>';
        event_data_sum += '</tr>';
        event_data_sum += '<tr >';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPRC_B > 0 ? 'color="red"' : '') + '>LPRC(B) = ' + value.LPRC_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPRC_B > 0 ? 'color="red"' : '') + '>LDPRC(B) = ' + value.LDPRC_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PRC_B > 0 ? 'color="red"' : '') + '>PRC(B) = ' + value.PRC_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.SDP_B > 0 ? 'color="red"' : '') + '>SDP(B) = ' + value.SDP_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPPC_B > 0 ? 'color="red"' : '') + '>LPPC(B) = ' + value.LPPC_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPPC_B > 0 ? 'color="red"' : '') + '>LDPPC(B) = ' + value.LDPPC_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PC_B > 0 ? 'color="red"' : '') + '>PC(B) = ' + value.PC_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.FFP_B > 0 ? 'color="red"' : '') + '>FFP(B) = ' + value.FFP_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CRP_B > 0 ? 'color="red"' : '') + '>CRP(B) = ' + value.CRP_B + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CAYO_B > 0 ? 'color="red"' : '') + '>CRYO(B) = ' + value.CAYO_B + '</font></th>';
        event_data_sum += '</tr>';
        event_data_sum += '<tr >';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPRC_O > 0 ? 'color="red"' : '') + '>LPRC(O) = ' + value.LPRC_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPRC_O > 0 ? 'color="red"' : '') + '>LDPRC(O) = ' + value.LDPRC_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PRC_O > 0 ? 'color="red"' : '') + '>PRC(O) = ' + value.PRC_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.SDP_O > 0 ? 'color="red"' : '') + '>SDP(O) = ' + value.SDP_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPPC_O > 0 ? 'color="red"' : '') + '>LPPC(O) = ' + value.LPPC_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPPC_O > 0 ? 'color="red"' : '') + '>LDPPC(O) = ' + value.LDPPC_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PC_O > 0 ? 'color="red"' : '') + '>PC(O) = ' + value.PC_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.FFP_O > 0 ? 'color="red"' : '') + '>FFP(O) = ' + value.FFP_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CRP_O > 0 ? 'color="red"' : '') + '>CRP(O) = ' + value.CRP_O + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CAYO_O > 0 ? 'color="red"' : '') + '>CRYO(O) = ' + value.CAYO_O + '</font></th>';
        event_data_sum += '</tr>';
        event_data_sum += '<tr >';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPRC_AB > 0 ? 'color="red"' : '') + '>LPRC(AB) = ' + value.LPRC_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPRC_AB > 0 ? 'color="red"' : '') + '>LDPRC(AB) = ' + value.LDPRC_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PRC_AB > 0 ? 'color="red"' : '') + '>PRC(AB) = ' + value.PRC_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.SDP_AB > 0 ? 'color="red"' : '') + '>SDP(AB) = ' + value.SDP_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LPPC_AB > 0 ? 'color="red"' : '') + '>LPPC(AB) = ' + value.LPPC_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.LDPPC_AB > 0 ? 'color="red"' : '') + '>LDPPC(AB) = ' + value.LDPPC_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.PC_AB > 0 ? 'color="red"' : '') + '>PC(AB) = ' + value.PC_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.FFP_AB > 0 ? 'color="red"' : '') + '>FFP(AB) = ' + value.FFP_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CRP_AB > 0 ? 'color="red"' : '') + '>CRP(AB) = ' + value.CRP_AB + '</font></th>';
        event_data_sum += '<th style="width:120px" class="td-table"><font ' + (value.CAYO_AB > 0 ? 'color="red"' : '') + '>CRYO(AB) = ' + value.CAYO_AB + '</font></th>';
        event_data_sum += '</tr>';
      });
      $("#list_table_json_sum").html(event_data_sum);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}