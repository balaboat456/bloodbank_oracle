"use strict";

function loadTable() {
  spinnershow();
  var fromdate = '';
  var todate = '';
  var donation_type_id = '1';
  var bloodgroupid = $('#bloodgroupid').val();
  var rhid = $('#rhid').val();
  fromdate = dmyToymd2($('#fromdate').val());
  todate = dmyToymd2($('#todate').val());
  if (document.getElementById("donation_type_id2").checked) donation_type_id = '2';
  $.ajax({
    url: 'data/blood/blood-tracking-letter.php?fromdate=' + fromdate + '&todate=' + todate + "&donation_type_id=" + donation_type_id + "&bloodgroupid=" + bloodgroupid + "&rhid=" + rhid,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      var body = document.getElementById("list_table_blood_tracking_letter").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      $("#blood-tracking-letter").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        var address = '';

        if (value.address_current != '') {
          if (value.address_current != "") address = address + ' บ้านเลขที่ ' + value.address_current;
          if (value.address_moo_current != "") address = address + ' หมู่ที่ ' + value.address_moo_current;
          if (value.address_alley_current != "") address = address + ' ซอย ' + value.address_alley_current;
          if (value.address_street_current != "") address = address + ' ถนน ' + value.address_street_current;
          address = address + value.address2_current;
        } else {
          if (value.address != "") address = address + ' บ้านเลขที่ ' + value.address;
          if (value.address_moo != "") address = address + ' หมู่ที่ ' + value.address_moo;
          if (value.address_alley != "") address = address + ' ซอย ' + value.address_alley;
          if (value.address_street != "") address = address + ' ถนน ' + value.address_street;
          address = address + ' ' + value.address2;
        }

        var arr = [value];
        event_data += '<tr>';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input checked type="checkbox"   >';
        event_data += '</td>';
        event_data += '<td class="td-table">' + getDMY(value.donation_date) + '</td>';
        event_data += '<td class="td-table">' + getDMY(value.expired_date) + '</td>';
        event_data += '<td class="td-table">' + value.donorcode + '</td>';
        event_data += '<td class="td-table" style="text-align: left">' + value.fullname + '</td>';
        event_data += '<td class="td-table">' + value.donorage + '</td>';
        event_data += '<td class="td-table">' + value.blood_group + '</td>';
        event_data += '<td class="td-table">' + value.rhname3 + '</td>';
        event_data += '<td class="td-table">' + value.donation_qty + '</td>';
        event_data += '<td class="td-table" style="text-align: left">' + address + '</td>';
        event_data += '<td class="td-table">' + value.donormobile + '</td>';
        event_data += '<td class="td-table">' + value.donoremail + '</td>';
        event_data += '</tr>';
      });
      $("#list_table_blood_tracking_letter").append(event_data);
      dateBE('.date1');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

$(document).ready(function () {
  $('#bloodgroupid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/bloodgroup.php',
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
              id: item.bloodgroupid,
              text: item.bloodgroupname
            };
          })
        };
      }
    }
  });
  $('#rhid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/bloodrh.php',
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
              id: item.rhid,
              text: item.rhname3
            };
          })
        };
      }
    }
  });
});

function print01() {
  var id = lastString(getDonationTrackingLetter());
  printJS({
    printable: localurl + "/report/blood-donation-tracking-letter.php?id=" + id,
    type: 'pdf',
    showModal: true
  });
}

function printExcel() {
  var id = lastString(getDonationTrackingLetter());
  window.open(localurl + "/report/blood-donation-tracking-letter-excel.php?id=" + id);
}

function print02() {
  var id = lastString(getDonationTrackingLetter());
  printJS({
    printable: localurl + "/report/blood-donation-tracking-letter-front.php?id=" + id,
    type: 'pdf',
    showModal: true
  });
}

function getDonationTrackingLetter() {
  var arr = "";
  var rows = document.getElementById("list_table_blood_tracking_letter").rows;

  for (var i = 1; i < rows.length; i++) {
    var str = "";

    if (rows[i].cells[1].getElementsByTagName('input')[0].checked) {
      str = JSON.parse(rows[i].cells[0].innerHTML);
      arr = arr + str[0].donateid + ",";
    }
  }

  return arr;
}

function setUnChecked(checkedState) {
  var rows = document.getElementById("list_table_blood_tracking_letter").rows;

  for (var i = 1; i < rows.length; i++) {
    rows[i].cells[1].children[0].checked = checkedState;
  }
}