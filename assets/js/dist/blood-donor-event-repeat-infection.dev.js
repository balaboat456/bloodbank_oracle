"use strict";

var indexRepeatInfection = 0;

function loadRepeatInfectionTable() {
  var donateid = $('#donateid').val();
  $.ajax({
    url: 'data/bloodbonor/bloodrepeatinfection.php?donateid=' + donateid,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_json_appointment_blood").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        indexRepeatInfection = index;
        addRowRepeatInfection(value);
      });
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function clickAddRowRepeatInfectionItem() {
  indexRepeatInfection++;
  addRowRepeatInfection();
}

function addRowRepeatInfection() {
  var im = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var arr;

  if (im.length != 0) {
    arr = [{
      repeatinfectionid: im.repeatinfectionid,
      repeatinfectioncode: im.repeatinfectioncode,
      donateid: im.donateid,
      repeatinfectiondate1: !(im.repeatinfectiondate1 == "" || im.repeatinfectiondate1 == "0000-00-00") ? getDMY(im.repeatinfectiondate1) : '',
      repeatinfectiondate2: !(im.repeatinfectiondate2 == "" || im.repeatinfectiondate2 == "0000-00-00") ? getDMY(im.repeatinfectiondate2) : '',
      repeatinfectiondate3: !(im.repeatinfectiondate3 == "" || im.repeatinfectiondate3 == "0000-00-00") ? getDMY(im.repeatinfectiondate3) : '',
      repeatinfectionqty: im.repeatinfectionqty,
      repeatinfectionreason: im.repeatinfectionreason,
      repeatinfectionresult: im.repeatinfectionresult,
      repeatinfectionpath: im.repeatinfectionpath,
      repeatinfectionfile: im.repeatinfectionfile
    }];
  } else {
    arr = [{
      repeatinfectionid: '',
      repeatinfectioncode: '',
      donateid: $('#donateid').val(),
      repeatinfectiondate1: '',
      repeatinfectiondate2: '',
      repeatinfectiondate3: '',
      repeatinfectionqty: '',
      repeatinfectionreason: '',
      repeatinfectionresult: '',
      repeatinfectionpath: '',
      repeatinfectionfile: ''
    }];
  }

  var event_data = '';
  event_data += '<tr>';
  event_data += '<td  style="display:none;" >';
  event_data += JSON.stringify(arr);
  event_data += '</td>';
  event_data += '<td>' + '1' + '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="repeatinfectiondate2"' + indexRepeatInfection + '  ';
  event_data += 'class="form-control date2" value="' + arr[0].repeatinfectiondate2 + '" ';
  event_data += ' style="width:160px" onchange="setRepeatinfectiondate2(this)" onkeyup="setRepeatinfectiondate2(this)" >';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="repeatinfectiondate3"' + indexRepeatInfection + '  ';
  event_data += 'class="form-control date2" value="' + arr[0].repeatinfectiondate3 + '" ';
  event_data += ' style="width:160px" onchange="setRepeatinfectiondate3(this)" onkeyup="setRepeatinfectiondate3(this)" >';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="repeatinfectiondate1"' + indexRepeatInfection + '  ';
  event_data += 'class="form-control date2" value="' + arr[0].repeatinfectiondate1 + '" ';
  event_data += ' style="width:160px" onchange="setRepeatinfectiondate1(this)" onkeyup="setRepeatinfectiondate1(this)" >';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="repeatinfectionqty"' + indexRepeatInfection + ' ';
  event_data += 'class="form-control" value="' + arr[0].repeatinfectionqty + '" ';
  event_data += ' style="width:100%" onchange="setRepeatinfectionqty(this)" >';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="repeatinfectionreason"' + indexRepeatInfection + ' ';
  event_data += 'class="form-control" value="' + arr[0].repeatinfectionreason + '" ';
  event_data += ' style="width:100%" onchange="setRepeatinfectionreason(this)" data-toggle="tooltip" data-placement="bottom" title="' + arr[0].repeatinfectionreason + '" >  ';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="repeatinfectionresult"' + indexRepeatInfection + ' ';
  event_data += 'class="form-control " value="' + arr[0].repeatinfectionresult + '" ';
  event_data += ' style="width:100%" onchange="setRepeatinfectionresult(this)" data-toggle="tooltip" data-placement="bottom" title="' + arr[0].repeatinfectionresult + '">';
  event_data += '</td>';
  event_data += '<td >';
  event_data += '        <input style="width:140px"   type="file"  onchange="getBaseUrlImage(' + indexRepeatInfection + ',this)" ';
  event_data += '            id="repeatinfectionfile' + indexRepeatInfection + '" name="repeatinfectionfile' + indexRepeatInfection + '"  /> ';
  event_data += '</td>';
  event_data += '<td>';

  if (arr[0].repeatinfectionpath != '') {
    event_data += '<button type="button" onclick=showDoc("' + arr[0].repeatinfectionpath + '") class="btn btn-info m-l-5">';
    event_data += '<i class="fa fa-search"> ดูเอกสาร</i>';
    event_data += '</button>';
  }

  event_data += '</td>';
  event_data += '<td  >';
  event_data += '<button type="button" onclick="deleteRowAppointment(this)" class="btn btn-danger m-l-5">';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_json_appointment_blood").append(event_data);
  setNoAppointment();
  dateBE('.date2');
}

function saveAppointment() {
  var data = {
    donateid: $('#donateid').val(),
    isconfirmblooddonation: document.getElementById("isconfirmblooddonation").checked ? '1' : '',
    isconfirmdonorblooddonation: document.getElementById("isconfirmdonorblooddonation").checked ? '1' : '',
    isconfirmdonorsdp: document.getElementById("isconfirmdonorsdp").checked ? '1' : '',
    confirmblooddonationremark: $("#confirmblooddonationremark").val(),
    confirmblooddonationid: $('#confirmblooddonationid').val(),
    isconfirmblooddonation_user: $('#isconfirmblooddonation_user').val(),
    isconfirmdonorblooddonation_user: $('#isconfirmdonorblooddonation_user').val(),
    isconfirmdonorsdp_user: $('#isconfirmdonorsdp_user').val(),
    isconfirmblooddonation_datetime: $('#isconfirmblooddonation_datetime').val(),
    isconfirmdonorblooddonation_datetime: $('#isconfirmdonorblooddonation_datetime').val(),
    isconfirmdonorsdp_datetime: $('#isconfirmdonorsdp_datetime').val()
  };
  data['repeatinfectionitem'] = JSON.stringify(getAppointment());
  var confirmblooddonationid = $("#confirmblooddonationid").val();
  var confirmblooddonationremark = $("#confirmblooddonationremark").val();

  if (confirmblooddonationid == "" || confirmblooddonationid == null) {
    var callback = function callback(inputValue) {};

    mgsError("ขออภัยค่ะ!", "กรุณาระบุผู้อนุญาติ", callback);
    return false;
  }

  if (confirmblooddonationremark == "" || confirmblooddonationremark == null) {
    var _callback = function _callback(inputValue) {};

    mgsError("ขออภัยค่ะ!", "กรุณาระบุสาเหตุ", _callback);
    return false;
  }

  spinnershow();
  $.ajax({
    type: 'POST',
    url: 'blood-donor-record-appointment-emtry-save.php',
    data: data,
    dataType: 'json',
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      if (data.status == 1) {
        myAlertTop();
        loadRepeatInfectionTable();
      } else {
        myAlertTopError();
      }
    },
    error: function error(data) {
      console.log('An error occurred.');
      console.log(data);
      myAlertTopError();
    }
  });
}

function getAppointment() {
  var arr = [];
  var rows = document.getElementById("list_table_json_appointment_blood").rows;

  for (var i = 1; i < rows.length; i++) {
    arr.push(rows[i].cells[0].innerHTML);
  }

  return arr;
}

function setRepeatinfectiondate1(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].repeatinfectiondate1 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setRepeatinfectiondate2(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].repeatinfectiondate2 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setRepeatinfectiondate3(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].repeatinfectiondate3 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setRepeatinfectionqty(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].repeatinfectionqty = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setRepeatinfectionreason(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].repeatinfectionreason = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setRepeatinfectionresult(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].repeatinfectionresult = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function getBaseUrlImage() {
  var num = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var self = arguments.length > 1 ? arguments[1] : undefined;
  var file = document.getElementById('repeatinfectionfile' + num)['files'][0];
  var reader = new FileReader();
  var baseString;

  reader.onloadend = function () {
    baseString = reader.result;
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].repeatinfectionfile = baseString;
    row.cells[0].innerHTML = JSON.stringify(item);
  };

  reader.readAsDataURL(file);
}

function showDoc(path) {
  window.open(localurl + '/' + path);
}

function setNoAppointment() {
  var rows = document.getElementById("list_table_json_appointment_blood").rows;

  for (var i = 1; i < rows.length; i++) {
    rows[i].cells[1].innerHTML = i;
  }
}

function deleteRowAppointment(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  setNoAppointment();
}