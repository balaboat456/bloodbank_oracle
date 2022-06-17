"use strict";

var count = 0;

function loadTableCheckBlood() {
  var hn = document.getElementById("hn").value;
  $.ajax({
    url: 'data/checkbloodpatient/checkbloodpatientdetail.php?hn=' + hn,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_blood_req").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var body = document.getElementById("list_table_blood_req_crossmatch").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var body = document.getElementById("list_request_blood_modal2").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      count = data.data.length.toString();
      var event_data = '';
      $.each(obj, function (index, value) {
        var color = '#000';
        if (value.requestbloodstatusid == 3) color = 'red';
        event_data += '';
        event_data += '<tr ' + (value.requestbloodstatusid == 1 ? 'style="background-color:#E0E0E0;"' : '') + ' id="trblood' + index + '" onClick="chActive(' + index + ',this,' + value.requestbloodstatusid + ')" >';
        event_data += '<td  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td><font color="' + color + '">' + getDMY(value.requestblooddate) + ' ' + value.requestbloodtime + '</font></td>';
        event_data += '<td><font color="' + color + '">' + value.hn + '</font></td>';
        event_data += '<td><font color="' + color + '">' + value.patientan + '</font></td>';
        event_data += '<td><font color="' + color + '">' + value.bloodnotificationtypename + '</font></td>';
        event_data += '<td>';
        event_data += value.forchildren == 1 ? '<i class="fa fa-check-square fa-2x" style="color: #009999;" aria-hidden="true"></i>' : '';
        event_data += '</td>';
        event_data += '<td><font color="' + color + '">' + value.unitofficename1 + '</font></td>';
        event_data += '<td ><font color="' + color + '">' + value.doctorname + '</font></td>';
        event_data += '<td>';

        if (value.requestbloodstatusid != 1) {
          if (value.requestbloodstatusid == 4) {} else {
            event_data += '<button type="button" onclick="selectTableCheckBlood(this)"  class="btn btn-success m-l-5">';
            event_data += '<span class="btn-label"><i class="fa fa-search"></i></span>ดูข้อมูล';
            event_data += '</button>&nbsp;&nbsp;';
          }
        }

        event_data += '</td>';
        event_data += '</tr>';
      });
      $("#list_request_blood_modal2").append(event_data);
      $('#trblood0').trigger('click');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function loadTableCheckBloodSign() {
  var requestbloodid = document.getElementById("requestbloodid").value;
  $.ajax({
    url: 'data/checkbloodpatient/checkbloodpatientdetail.php?requestbloodid=' + requestbloodid,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
      setTableCheckBlood(obj);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}