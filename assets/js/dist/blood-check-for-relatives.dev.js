"use strict";

var type = '';
var typeid = '';

function loadTable() {
  spinnershow();
  fromdate = dmyToymd2($('#fromdate').val());
  todate = dmyToymd2($('#todate').val());
  hn = $('#hn').val();
  $.ajax({
    url: 'data/forrelatives/for-relatives.php?fromdate=' + fromdate + "&todate=" + todate + "&hn=" + hn,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      console.log(data);
      var body = document.getElementById("list_table_blood_relatives").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      $("#blood-tracking-letter").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      var num = 1;
      var num_count = 0;
      $.each(obj, function (index, value) {
        var arr = [value];
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input checked type="checkbox"   >';
        event_data += '</td>';
        event_data += '<td>' + num + '</td>';
        event_data += '<td style="text-align: left;" class="td-table">' + getDMY(value.date_fromdate) + '</td>';
        event_data += '<td class="td-table">' + value.hn + '</td>';
        event_data += '<td style="text-align: left;" class="td-table">' + value.patientname + '</td>';
        event_data += '<td class="td-table">' + value.count_item + '</td>';
        event_data += '</tr>';
        num++;
        num_count = parseInt(num_count) + parseInt(value.count_item);
      });
      $("#num_count").html('รวมทั้งหมด ' + num_count + ' ราย');
      $("#list_table_blood_relatives").append(event_data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function setUnChecked(checkedState) {
  var rows = document.getElementById("list_table_blood_relatives").rows;

  for (var i = 1; i < rows.length; i++) {
    rows[i].cells[1].children[0].checked = checkedState;
  }
}

function getDonationTrackingLetter() {
  var arr = "";
  var rows = document.getElementById("list_table_blood_relatives").rows;

  for (var i = 1; i < rows.length; i++) {
    var str = "";

    if (rows[i].cells[1].getElementsByTagName('input')[0].checked) {
      str = JSON.parse(rows[i].cells[0].innerHTML);
      arr = arr + str[0].group_donateid + ",";
    }
  }

  return arr;
}

function print01() {
  console.log(123);
  var id = lastString(getDonationTrackingLetter());
  var fromdate = dmyToymd2($('#fromdate').val());
  var todate = dmyToymd2($('#todate').val());
  var user_login = document.getElementById("name_login").innerHTML;
  var hn = $('#hn').val();
  console.log(id);
  printJS({
    printable: localurl + "/report/report-blood-compensate.php?id=" + id + "&fromdate=" + fromdate + "&todate=" + todate + "&hn=" + hn + "&user_login=" + user_login,
    showModal: true
  });
}