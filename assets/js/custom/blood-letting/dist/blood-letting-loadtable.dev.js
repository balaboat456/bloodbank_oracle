"use strict";

var count = 0;
var stylecolor = [];
var dataObj = [];
var indexActive = '';

function loadTable() {
  var hn = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var state = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  $.ajax({
    url: 'data/bloodletting/bloodletting.php?hn=' + hn,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_blood_letting").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      dataObj = obj;
      count = obj.length;
      var event_data = '';
      $.each(obj, function (index, value) {
        var style = "#FFFFFF";
        stylecolor[index] = style;
        event_data += '';
        event_data += '<tr style="background:' + style + '" id="trblood' + index + '" onClick="chActive(' + index + ',this)" >';
        event_data += '<td  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td >' + value.bloodlettingdatetime + '</td>';
        event_data += '<td>' + value.doctorname + '</td>';
        event_data += '<td>' + value.remark2 + '</td>';
        event_data += '<td>' + value.name + " " + value.surname + '</td>';
        event_data += '</tr>';
      });
      $("#list_table_blood_letting").append(event_data);

      if (state == "insert") {
        chActive(0);
      } else if (state == "update") {
        chActive(indexActive);
      }
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}