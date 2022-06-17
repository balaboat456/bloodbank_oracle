"use strict";

$(document).ready(function () {
  $("#bag_number_pay_out").on('keydown', function (e) {
    if (e.which == 13) {
      bagNumber("bag_number_pay_out");
      var bag_number = $("#bag_number_pay_out").val();
      findTableBagNumberOut(bag_number);
    }
  });
});

function bagNumber() {
  var name = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var bag_number = $('#' + name).val();
  var bag_number_new = numnerPoint(bag_number);
  $('#' + name).val(bag_number_new);
}

function loadTableBloodPayStock() {
  var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var isexp = 0;

  if (type == '3') {
    isexp = 1;
  }

  document.getElementById("idUnChecked").disabled = type == 3;
  $.ajax({
    url: 'data/blood/blood-stock-pay.php?isexp=' + isexp + '&type=' + type,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_json_out").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = ''; // $("#blood-queue-tab-2-1").text(data.total);

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var arr = [value];
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="checkbox" id="' + value.bloodstockid + '"  onchange="setBloodOutCheck(this)" >';
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
        event_data += '<td class="td-table">';
        event_data += '<div class="progress">';
        event_data += '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
        event_data += '</div>';
        event_data += '</td>';
        event_data += '</tr>';
      });
      $("#list_table_json_out").append(event_data); // console.log(data);

      dateBE('.date1');
      loadTableStockGate();
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function loadTableStockGate() {
  $.ajax({
    url: 'data/bloodstock/blood_stock_pay_gate.php',
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var rows = document.getElementById("list_table_json_out").rows;
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

      for (var i = 1; i < rows.length; i++) {
        var arrayObj = JSON.parse(rows[i].cells[0].innerHTML);
        rows[i].cells[14].innerHTML = "";
        console.log();
        $.each(obj, function (index, value) {
          if (arrayObj[0].bag_number == value.bag_number && arrayObj[0].bloodtype == value.bloodtype && arrayObj[0].sub == value.sub) {
            console.log("=======ssss========");
            rows[i].cells[14].innerHTML = "ตู้ที่ " + value.gateid;
          }
        });
      }
    },
    error: function error(d) {
      console.log("error");
    }
  });
}

function loadTableBloodPayStockEmRoom() {
  $.ajax({
    url: 'data/blood/blood-stock-pay-askforblood.php',
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_json_out_room").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      $("#blood-release").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var arr = [value];
        event_data += '<tr >';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
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
      $("#list_table_json_out_room").append(event_data);
      dateBE('.date1');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function setBloodOutCheck(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].ischeckout = self.checked;
  item[0].bloodstockpaytypeid = $("#bloodstockpaytypeid").val();
  item[0].hospitalid = $("#hospital_pay").val();
  row.cells[0].innerHTML = JSON.stringify(item);
  console.log(item); // var body = document.getElementById("list_table_json_out_show").getElementsByTagName('tbody')[0];
  // while (body.firstChild) {
  //     body.removeChild(body.firstChild);
  // }

  var event_data = '';

  if (document.getElementById(item[0].bloodstockid).checked == true) {
    event_data += '<tr id="' + item[0].bloodstockid + 'g">';
    event_data += '<td class="td-table">' + item[0].bag_number + '</td>';
    event_data += '<td class="td-table">' + item[0].bloodstockrfid + '</td>';
    event_data += '<td class="td-table">' + item[0].sub + '</td>';
    event_data += '<td class="td-table">' + item[0].bloodtype + '</td>';
    event_data += '<td class="td-table">' + item[0].rubberbandnumber + '</td>';
    event_data += '<td class="td-table">' + item[0].bloodgroup + '</td>';
    event_data += '<td class="td-table">' + item[0].rhname3 + '</td>';
    event_data += '<td class="td-table">' + item[0].volume + '</td>';
    event_data += '<td class="td-table">' + getDMY(item[0].bloodstart) + '</td>';
    event_data += '<td class="td-table">' + getDMY(item[0].bloodexp) + '</td>';
    event_data += '<td class="td-table">' + item[0].antibody + '</td>';
    event_data += '<td class="td-table">' + item[0].phenotype + '</td>';
    event_data += '</tr>';
    $("#list_table_json_out_show_body").append(event_data);
  } else if (document.getElementById(item[0].bloodstockid).checked == false) {
    $("#" + item[0].bloodstockid + "g").remove();
  }
}
/*
$("#bag_number_pay_out").on('keydown', function(e) {
    if (e.which == 13) {
        var number = $("#bag_number_pay_out").val();
        findTableO1HN(number)

        $("#bag_number_pay_out").val("");
    }
});
*/


function findTableO1HN(number) {
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);

    if (item[0].bag_number == number) {
      row.cells[1].children[0].checked = true;
      row.cells[1].children[0].focus();
      item[0].ischeckout = true;
      row.children[0].innerHTML = JSON.stringify(item);
    }
  }
}

function findTableBagNumberOut(number) {
  console.log("=========");
  var result = false;
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);

    if (item[0].bag_number == number && item[0].bloodtype == $("#bloodstocktype_pay").val()) {
      console.log("***********");
      result = true;
      rows[i].cells[1].getElementsByTagName('input')[0].checked = true;
      rows[i].cells[1].getElementsByTagName('input')[0].focus();
      item[0].ischeckout = true;
      item[0].bloodstockpaytypeid = $("#bloodstockpaytypeid").val();
      item[0].hospitalid = $("#hospital_pay").val();
      rows[i].cells[0].innerHTML = JSON.stringify(item);
      console.log(item[0].bloodstockid);
      var event_data = '';
      event_data += '<tr id="' + item[0].bloodstockid + 'g">';
      event_data += '<td class="td-table">' + item[0].bag_number + '</td>';
      event_data += '<td class="td-table">' + item[0].bloodstockrfid + '</td>';
      event_data += '<td class="td-table">' + item[0].sub + '</td>';
      event_data += '<td class="td-table">' + item[0].bloodtype + '</td>';
      event_data += '<td class="td-table">' + item[0].rubberbandnumber + '</td>';
      event_data += '<td class="td-table">' + item[0].bloodgroup + '</td>';
      event_data += '<td class="td-table">' + item[0].rhname3 + '</td>';
      event_data += '<td class="td-table">' + item[0].volume + '</td>';
      event_data += '<td class="td-table">' + getDMY(item[0].bloodstart) + '</td>';
      event_data += '<td class="td-table">' + getDMY(item[0].bloodexp) + '</td>';
      event_data += '<td class="td-table">' + item[0].antibody + '</td>';
      event_data += '<td class="td-table">' + item[0].phenotype + '</td>';
      event_data += '</tr>';
      $("#list_table_json_out_show_body").append(event_data);
    }
  }

  console.log(result);

  if (result) {
    document.getElementById('bag_number_pay_out').value = "";
    setTimeout(function () {
      document.getElementById('bag_number_pay_out').focus();
    }, 200);
  } else {
    setTimeout(function () {
      swal({
        title: "ไม่พบหมายเลขถุง",
        type: 'warning',
        confirmButtonText: 'OK',
        allowOutsideClick: false
      }).then(function (value) {
        document.getElementById('bag_number_pay_out').value = "";
        setTimeout(function () {
          document.getElementById('bag_number_pay_out').focus();
        }, 200);
      });
    }, 500);
  }
}

var counter;

function scanRFIDOunt(rfid) {
  var count = 20;
  if (counter) clearInterval(counter);
  counter = setInterval(timer, 100); //1000 will  run it every 1 second

  function timer() {
    count = count - 1;

    if (count <= 0) {
      clearInterval(counter);
      findTableRFIDOut(rfid);
      return;
    } //Do code for showing the number of seconds here

  }
}

function findTableRFIDOut(rfid) {
  if (rfid.length == 0) {
    return false;
  }

  var result = false;
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);
    var numberArray = rfid.split(",");
    $.each(numberArray, function (index, value) {
      if (value != "") {
        if (item[0].bloodstockrfid == value) {
          result = true;
          rows[i].cells[1].getElementsByTagName('input')[0].checked = true;
          item[0].ischeckout = true;
          item[0].bloodstockpaytypeid = $("#bloodstockpaytypeid").val();
          item[0].hospitalid = $("#hospital_pay").val();
          rows[i].cells[0].innerHTML = JSON.stringify(item);
          console.log(item[0].bloodstockid);
          var event_data = '';
          event_data += '<tr id="' + item[0].bloodstockid + 'g">';
          event_data += '<td class="td-table">' + item[0].bag_number + '</td>';
          event_data += '<td class="td-table">' + item[0].bloodstockrfid + '</td>';
          event_data += '<td class="td-table">' + item[0].sub + '</td>';
          event_data += '<td class="td-table">' + item[0].bloodtype + '</td>';
          event_data += '<td class="td-table">' + item[0].rubberbandnumber + '</td>';
          event_data += '<td class="td-table">' + item[0].bloodgroup + '</td>';
          event_data += '<td class="td-table">' + item[0].rhname3 + '</td>';
          event_data += '<td class="td-table">' + item[0].volume + '</td>';
          event_data += '<td class="td-table">' + getDMY(item[0].bloodstart) + '</td>';
          event_data += '<td class="td-table">' + getDMY(item[0].bloodexp) + '</td>';
          event_data += '<td class="td-table">' + item[0].antibody + '</td>';
          event_data += '<td class="td-table">' + item[0].phenotype + '</td>';
          event_data += '</tr>';
          $("#list_table_json_out_show_body").append(event_data);
        }
      }
    });
  }

  document.getElementById('rfidscan_pay_out').value = "";
  document.getElementById('rfidscan_pay_out').focus;
}

function setUnChecked(checkedState) {
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    var item = JSON.parse(rows[i].cells[0].innerHTML);
    rows[i].cells[1].children[0].checked = checkedState;
    item[0].ischeckout = checkedState;
    item[0].bloodstockpaytypeid = $("#bloodstockpaytypeid").val();
    item[0].hospitalid = $("#hospital_pay").val();
    rows[i].cells[0].innerHTML = JSON.stringify(item);
    var event_data = '';

    if (document.getElementById(item[0].bloodstockid).checked == true) {
      event_data += '<tr id="' + item[0].bloodstockid + 'g">';
      event_data += '<td class="td-table">' + item[0].bag_number + '</td>';
      event_data += '<td class="td-table">' + item[0].bloodstockrfid + '</td>';
      event_data += '<td class="td-table">' + item[0].sub + '</td>';
      event_data += '<td class="td-table">' + item[0].bloodtype + '</td>';
      event_data += '<td class="td-table">' + item[0].rubberbandnumber + '</td>';
      event_data += '<td class="td-table">' + item[0].bloodgroup + '</td>';
      event_data += '<td class="td-table">' + item[0].rhname3 + '</td>';
      event_data += '<td class="td-table">' + item[0].volume + '</td>';
      event_data += '<td class="td-table">' + getDMY(item[0].bloodstart) + '</td>';
      event_data += '<td class="td-table">' + getDMY(item[0].bloodexp) + '</td>';
      event_data += '<td class="td-table">' + item[0].antibody + '</td>';
      event_data += '<td class="td-table">' + item[0].phenotype + '</td>';
      event_data += '</tr>';
      $("#list_table_json_out_show_body").append(event_data);
    } else if (document.getElementById(item[0].bloodstockid).checked == false) {
      $("#" + item[0].bloodstockid + "g").remove();
    }
  }
}