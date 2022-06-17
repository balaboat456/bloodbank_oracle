"use strict";

var count = 0;
var countitem = 0;
var stylecolor = [];

function loadTable() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  clearData();
  var fromdate = document.getElementById("fromdate").value;
  var todate = document.getElementById("todate").value;
  var hn = document.getElementById("hn").value;
  var an = document.getElementById("an").value;
  var checkresultbloodstatusid = document.getElementById("searchcheckresultbloodstatusid").value;
  spinnershow();
  $.ajax({
    url: localurl + '/api/get_lisrequest_queue.php?fromdate=' + fromdate + '&todate=' + todate,
    dataType: 'json',
    type: 'get',
    success: function success(resultdata) {
      $.ajax({
        url: 'data/getrequestbloodlab/getrequestbloodlab.php?hn=' + hn + '&an=' + an + '&fromdate=' + fromdate + '&todate=' + todate + '&checkresultbloodstatusid=' + checkresultbloodstatusid,
        dataType: 'json',
        type: 'get',
        complete: function complete() {
          var delayInMilliseconds = 500;
          setTimeout(function () {
            spinnerhide();
          }, delayInMilliseconds);
        },
        success: function success(data) {
          var body = document.getElementById("get_request_blood_lab_table").getElementsByTagName('tbody')[0];

          while (body.firstChild) {
            body.removeChild(body.firstChild);
          }

          var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
          count = obj.length;
          var event_data = '';
          $.each(obj, function (index, value) {
            var style = "#FFFFFF";
            if (value.checkresultbloodstatusid == 1) style = "#FFFF00";else if (value.checkresultbloodstatusid == 2) style = "#6C0";else if (value.checkresultbloodstatusid == 99) style = "#C00";
            stylecolor[index] = style;
            console.log(value);
            event_data += '';
            event_data += '<tr style="background:' + style + '" id="trblood' + index + '" onClick="chActive(' + index + ',this)" >';
            event_data += '<td  style="display:none;" >';
            event_data += JSON.stringify(value);
            event_data += '</td>';
            event_data += '<td>' + (value.labexpress == 1 ? 'ด่วน' : 'ไม่ด่วน') + '</td>';
            event_data += '<td >' + value.patienthn + '</td>';
            event_data += '<td>' + (value.patientan == "" ? "-" : value.patientan) + '</td>';
            event_data += '<td>' + value.formt_datetime_labsenddatetime + '</td>';
            event_data += '<td>' + value.patientfullname + '</td>';
            event_data += '<td>' + value.labunitroomname + '</td>';
            event_data += '<td>' + value.checkresultbloodstatusname + '</td>';
            event_data += '<td>' + value.labremark + '</td>';
            event_data += '</tr>';
          });
          $("#get_request_blood_lab_table").append(event_data);
          $('#trblood0').click();
          if (hn != "") setTimeout(function () {
            $("#hn").val("");
            document.getElementById("hn").focus();
          }, 500);
          if (an != "") setTimeout(function () {
            $("#an").val("");
            document.getElementById("an").focus();
          }, 500);
        },
        error: function error(d) {
          /*console.log("error");*/
          alert("404. Please wait until the File is Loaded.");
        }
      });
    },
    error: function error(ajaxContext) {
      spinnerhide();
    }
  });
}

function loadCheckRequestTab2_item1() {
  var labid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var labstatus = arguments.length > 1 ? arguments[1] : undefined;
  var body = document.getElementById("get_request_blood_lab_right_table1").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  var event_data = '';
  event_data += '<tr>';

  if (labstatus > 1) {
    event_data += '<td>';
    event_data += '</td>';
    event_data += '<td>';
    event_data += '</td>';
  } else {
    event_data += '<td>';

    if (document.getElementById("hn").value != "") {
      event_data += '<input required checked type="radio" id="checkresultbloodstatusidR" name="checkresultbloodstatusid" value="2"  >';
    } else {
      event_data += '<input required type="radio" id="checkresultbloodstatusidR" name="checkresultbloodstatusid" value="2"  >';
    }

    event_data += '</td>';
    event_data += '<td>';
    event_data += '<input type="radio" id="checkresultbloodstatusidN" name="checkresultbloodstatusid" onclick="cancelItem()" value="99"  >';
    event_data += '</td>';
  }

  event_data += '<td>' + labid + '</td>';
  event_data += '<td>EDTA blood</td>';
  event_data += '<td>0</td>';
  event_data += '</tr>';
  $("#get_request_blood_lab_right_table1").append(event_data);
}

function loadCheckRequestTab2_item2(id) {
  $.ajax({
    url: 'data/checkrequest/checkrequest-accepted-item2.php?id=' + id,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("get_request_blood_lab_right_table2").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      var event_data = '';
      item_lab_edit_tab_2_item2 = obj;
      $.each(obj, function (index, value) {
        event_data += '';
        event_data += '<tr >';
        event_data += '<td  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td>' + value.labformcode + '</td>';
        event_data += '<td>' + value.labformname + '</td>';
        event_data += '</tr>';
      });
      $("#get_request_blood_lab_right_table2").append(event_data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function clearData() {
  stylecolor = [];
  document.getElementById("btnSave").style.visibility = 'hidden';
  $("#labcheckrequestid").val("");
  var body = document.getElementById("get_request_blood_lab_right_table1").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  var body = document.getElementById("get_request_blood_lab_right_table2").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }
}