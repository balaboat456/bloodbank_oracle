"use strict";

$(document).ready(function () {
  $("#finfhn").keyup(function (event) {
    if (event.keyCode === 13) {
      var hn = $("#finfhn").val();
      hn = hn.trim();

      if (hn.length == 0) {
        return false;
      }

      if (!findTableHN2_2(hn)) errorSwal2("ไม่พบ HN นี้", "finfhn");
      document.getElementById("finfhn").value = "";
      document.getElementById("finfhn").focus();
    }
  });
  $("#findbagnumber").keyup(function (event) {
    if (event.keyCode === 13) {
      var bagnumber = $("#findbagnumber").val();
      bagnumber = bagnumber.trim();

      if (bagnumber.length == 0) {
        return false;
      }

      if (!findTableBagNumber2_2(bagnumber)) errorSwal2("ไม่พบผลิตภัณฑ์นี้", "findbagnumber");
      document.getElementById("findbagnumber").value = "";
      document.getElementById("findbagnumber").focus();
    }
  });
});

function findTableHN2_2(number) {
  var count = 1;
  var result = false;
  var rows = document.getElementById("list_table_blood_return").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);

    if (item[0].hn == number) {
      result = true;
      $("#blood-return").text(count);
      count++;
    }
  }

  if (result) {
    console.log(rows);

    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      console.log(row);
      var item = JSON.parse(row.cells[0].innerHTML);
      console.log("=====HN====");
      console.log(number);
      console.log(item[0].hn);

      if (!(item[0].hn == number)) {
        row.parentNode.removeChild(row);
        i--;
      }
    }
  }

  return result;
}

function findTableBagNumber2_2(number) {
  var result = false;
  var rows = document.getElementById("list_table_blood_return").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);

    if (item[0].bag_number == number) {
      result = true;
      rows[i].cells[1].getElementsByTagName('input')[0].checked = true;
      item[0].requestbloodreturnstatusid = 3;
      row.cells[0].innerHTML = JSON.stringify(item);
    }
  }

  return result;
}

function errorSwal2() {
  var msg = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var inputname = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
  swal({
    title: msg,
    type: 'warning',
    confirmButtonText: 'OK',
    allowOutsideClick: false
  }).then(function (value) {
    if (value) {
      document.getElementById(inputname).value = '';
      document.getElementById(inputname).focus();
    }
  });
  return false;
}

function loadTableGetReturnBlood(self) {
  if (self) setNewHN(self);
  var hn = '';
  var fromdate = '';
  var todate = '';
  hn = $('#searchhn').val();

  if (!hn) {
    fromdate = dmyToymd2($('#fromdate').val());
    todate = dmyToymd2($('#todate').val());
    requestunit = $('#requestunit').val();
  }

  $.ajax({
    url: 'data/blood/blood-return.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_blood_return").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      $("#blood-return").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var bg = "";

        if (value.warm_retuen == 1) {
          // bg = "background: #0f9df7";
          bg = "background: #ea9999";
        } else {
          // bg = "background: #d935cb";
          bg = "background: #ffffff";
        }

        var arr = [value];
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="checkbox"  onchange="setBloodReturnCheck(this)" >';
        event_data += '</td>';
        event_data += '<td class="td-table">' + (index + 1) + '</td>';
        event_data += '<td class="td-table">' + getDMY(value.bloodsavedate_return) + ' ' + value.bloodsavetime_return + '</td>';
        event_data += '<td class="td-table">' + getDMY(value.blooddate_return) + ' ' + value.bloodtime_return + '</td>';
        event_data += '<td class="td-table">' + getDMY(value.payblooddate) + ' ' + value.paybloodtime + '</td>';
        event_data += '<td class="td-table">' + value.hn + '</td>';
        event_data += '<td class="td-table">' + value.patientfullname + '</td>';
        event_data += '<td class="td-table">' + value.bag_number + '</td>';
        event_data += '<td class="td-table">' + value.bloodtype + '</td>';
        event_data += '<td class="td-table">' + value.bloodgroupid + '</td>';
        event_data += '<td class="td-table">' + value.rhname3 + '</td>';
        event_data += '<td class="td-table" style="' + bg + '">' + getWarm(value.warm_retuen) + '</td>';
        event_data += '<td class="td-table">' + value.unitofficename + '</td>';
        event_data += '<td class="td-table">' + value.fullname + '</td>';
        event_data += '</tr>';
      });
      $("#list_table_blood_return").append(event_data);
      dateBE('.date1');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function getWarm(v) {
  var result = '';

  if (v == 1) {
    result = 'warm';
  } else if (v == 2) {
    result = 'ไม่ warm';
  }

  return result;
}

function setBloodReturnCheck(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].requestbloodreturnstatusid = self.checked ? '3' : '2';
  row.cells[0].innerHTML = JSON.stringify(item);
}

function scanNumber(self) {
  self.value = numnerPoint(self.value);
}