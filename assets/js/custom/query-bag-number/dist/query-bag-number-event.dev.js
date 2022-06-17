"use strict";

var count = 0;
var count_his = 0;
$(document).ready(function () {
  $("#barcode").on('keydown', function (e) {
    if (e.which == 13) {
      loadTable("barcode");
    }
  });
  $("#rfid").on('keydown', function (e) {
    if (e.which == 13) {
      loadTable('rfid');
    }
  });
});

function loadTable() {
  var focusState = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var fromdate = dmyToymd2($('#fromdate').val());
  var todate = dmyToymd2($('#todate').val());
  var bag_number = $('#barcode').val();
  var rfid = $('#rfid').val();
  count = 0;
  var body = document.getElementById("list_table_blood_query_bag_number").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  spinnershow();
  $.ajax({
    url: 'data/querybagnumber/query-bag-number-list.php?fromdate=' + fromdate + '&todate=' + todate + '&bag_number=' + bag_number + '&rfid=' + rfid,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 0;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      var event_data = '';
      $("#blood-query").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      count = obj.length;
      var valueO = {};
      $.each(obj, function (index, value) {
        if (index == 0) {
          valueO = value;
        }

        var arr = [value];
        event_data += '<tr id="trblood' + index + '" onClick="chActiveRow(' + index + ',this,`' + value.bag_number + '`,`' + value.sub + '`,`' + value.bloodtype + '`)" >';
        event_data += '<td class="td-table" style="font-size: 20px;">' + (index + 1) + '</td>';
        event_data += '<td class="td-table" style="text-align:left; font-size: 20px;">' + value.receivingtypename + '</td>';
        event_data += '<td class="td-table" style="text-align:left; font-size: 20px;">' + value.hospitalname + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px; color:#B22222;">' + value.bag_number + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + value.sub + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + value.bloodstockrfid + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px; color:#B22222;">' + value.bloodtype + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px; color:#B22222;">' + getDMY(value.bloodexp) + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px; color:#B22222;">' + value.bloodgroup + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + value.rhname3 + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + getStatus(value) + '</td>';
        event_data += '</tr>';
      });
      $("#list_table_blood_query_bag_number").append(event_data);

      if (obj.length > 0) {
        chActiveRow(0, '', valueO.bag_number, valueO.sub, valueO.bloodtype);
      }
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

function getStatus(value) {
  var status = value.bloodstockstatusname;

  if (value.bloodstockstatusid == 1) {
    console.log("====1======");
    status = value.bloodstockstatusname;
  } else if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
    console.log("====2======");
    status = value.requestbloodreturnstatusname;
  } else if (value.crossmacthstatusid == 9) {
    console.log("====3======");
    status = value.crossmacthstatusname;
  } else if (value.bloodstockpaytypeid != "") {
    console.log("====4======");
    status = value.bloodstockpaytypename2;
  } else if (value.crossmacthstatusid == 2 || value.crossmacthstatusid == 3 || value.crossmacthstatusid == 4 || value.crossmacthstatusid == 8) {
    console.log("====5======");
    status = value.crossmacthstatusname;
  }

  return status;
}

function loadTableBagNumber() {
  var bag_number = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var sub = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var bloodtype = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  count_his = 0; // spinnershow();

  $.ajax({
    url: 'data/querybagnumber/query-bag-number-history.php?sub=' + sub + '&bloodtype=' + bloodtype + '&bag_number=' + bag_number,
    dataType: 'json',
    type: 'get',
    // complete: function () {
    //     var delayInMilliseconds = 0;
    //     setTimeout(function () {
    //         spinnerhide();
    //     }, delayInMilliseconds);
    // },
    success: function success(data) {
      var body = document.getElementById("list_table_blood_query_bag_number_history").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = ''; // $("#blood-query-history").text(data.total);

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var arr = [value];
        event_data += '<tr id="trblood_his' + index + '" onClick="chActiveRowHistory(' + index + ',this)" >';
        event_data += '<td class="td-table" style="font-size: 20px;">' + getDMY(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + value.hn + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + value.patientan + '</td>';
        event_data += '<td class="td-table" style="text-align:left; font-size: 20px;">' + value.patientfullname + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + value.crossmacthstatusname + ' ' + getWarm(value.warm_retuen, value.crossmacthstatusid) + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + getDMY(value.payblooddate) + ' ' + value.paybloodtime + '</td>';
        event_data += '<td class="td-table" style="font-size: 20px;">' + getDMY(value.blooddate_return) + ' ' + value.bloodtime_return + '</td>';
        event_data += '</tr>';
        count_his++;
      });
      $("#list_table_blood_query_bag_number_history").append(event_data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function getWarm(v, cid) {
  var result = '';
  if (cid == 11) if (v == 1) {
    result = 'warm';
  } else if (v == 2) {
    result = 'ไม่ warm';
  }
  return result;
}

function chActiveRow(id, self) {
  var bag_number = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var sub = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
  var bloodtype = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : '';

  for (i = 0; i < count; i++) {
    document.getElementById("trblood" + i).style.background = "#FFF";
  }

  document.getElementById("trblood" + id).style.background = "#b7e4eb";
  var body = document.getElementById("list_table_blood_query_bag_number_history").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  var event_data = '';
  event_data += '<tr  >';
  event_data += '    <th colspan="7">';
  event_data += '        <div class="progress">';
  event_data += '            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
  event_data += '        </div>';
  event_data += '    </th>';
  event_data += '</tr>';
  $("#list_table_blood_query_bag_number_history").append(event_data);
  loadTableBagNumber(bag_number, sub, bloodtype);
}

function chActiveRowHistory(id) {
  for (i = 0; i < count_his; i++) {
    document.getElementById("trblood_his" + i).style.background = "#FFF";
  }

  document.getElementById("trblood_his" + id).style.background = "#b7e4eb";
}

function scanNumber(self) {
  self.value = numnerPoint(self.value);
}