"use strict";

function scanBarcode() {
  var hn = document.getElementById('searchhn').value;
  $("#patienthn").val("");
  $("#patientfullname").val("");
  var body = document.getElementById("blood-queue-tab2-1").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  var body = document.getElementById("blood-queue-tab2-2").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (hn.length > 0) {
    spinnershow();
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: 'data/patient/patient.php?hn=' + hn,
      complete: function complete() {
        var delayInMilliseconds = 200;
        setTimeout(function () {
          spinnerhide();
        }, delayInMilliseconds);
      },
      success: function success(data) {
        if (data.data.length > 0) {
          $('#patientfullname').val(data.data[0].patientfullname);
          $('#patienthn').val(data.data[0].patienthn);
          loadTableBloodQueueWaitUsedNurse();
          loadTableBloodQueueHistoryUsedNurse();
        } else {
          document.getElementById("have").innerHTML = "ไม่พบข้อมูล HN";
          swal({
            title: "ไม่พบข้อมูล",
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
          }, function (inputValue) {
            if (inputValue) {
              document.getElementById('searchhn').focus;
            }
          });
        }

        document.getElementById('searchhn').value = '';
      },
      error: function error(data) {
        console.log('An error occurred.');
        console.log(data);
        document.getElementById('searchhn').value = '';
      }
    });
  }
}

function loadTableBloodQueueWaitUsedNurse() {
  var hn = '';
  hn = $('#patienthn').val();
  var body = document.getElementById("blood-queue-tab2-1").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (hn == "") {
    return false;
  }

  $.ajax({
    url: 'data/bloodqueue/bloodqueue-bloodused-wait.php?hn=' + hn,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var event_data = '';
      $("#blood-queue-tab-2-1").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

      if (obj.length > 0) {
        document.getElementById("have").innerHTML = "มีเลือดพร้อมสำหรับยืนยันการใช้เลือด";
      } else {
        document.getElementById("have").innerHTML = "ไม่มีเลือดพร้อมสำหรับยืนยันการใช้เลือด";
      }

      var requestbloodBloodType = "";
      var requestbloodid = "";
      $.each(obj, function (index, value) {
        if (requestbloodid != value.requestbloodid) {
          requestbloodid = value.requestbloodid;
          requestbloodBloodType = value.bloodstocktypenamegroup;
        }

        var color = '';
        var status = true;
        var statusreadonlycc = "";

        if (parseInt(value.mostandunstatus) > 0) {
          color = '#F39'; // if(value.doctorstatus == '0')
          // status = false;
        } else if (parseInt(value.mostandunstatus2) > 0) {
          color = '#FFFF00'; // if(value.doctorstatus == '0')
          // status = false;
        }

        if (value.patientage > parseInt(15)) statusreadonlycc = ' readonly ';
        var arr = [value];
        event_data += '<tr style="background:' + color + '">';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table">';
        if (status) event_data += '<input type="checkbox"  onchange="setBloodQueueCheckTab2_1(this,' + index + ')" >';
        event_data += '</td>';
        event_data += '<td class="td-table">' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
        event_data += '<td class="td-table">' + value.unitofficename1 + '</td>';
        event_data += '<td class="td-table">';
        event_data += value.forchildren == 1 ? '<i class="fa fa-check-square fa-2x" style="color: #009999;" aria-hidden="true"></i>' : '';
        event_data += '</td>';
        event_data += '<td class="td-table">' + requestbloodBloodType + '</td>';
        event_data += '<td class="td-table">' + value.cm_bloodgroup + '</td>'; // event_data += '<td class="td-table">' +  value.bloodgroupid : '') + '</td>';

        event_data += '<td class="td-table">' + (getDMY2(value.usedblooddatefrom) + ' - ' + getDMY2(value.usedblooddateto)) + '</td>';
        event_data += '<td class="td-table">' + value.cm_bloodtype + '</td>';
        event_data += '<td class="td-table">' + (parseInt(value.count_bloodtype) - parseInt(value.count_used)) + '</td>';
        event_data += '<td class="td-table">' + (value.patientage <= parseInt(15) ? value.volume2 : '-') + '</td>';
        event_data += '<td class="td-table">';
        if (status) event_data += '<input readonly type"text" style="width:50px" onkeyup="setBloodRequestUnitTab2_1(this,' + (parseInt(value.count_bloodtype) - parseInt(value.count_used)) + ')"  />';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        if (status) event_data += '<input readonly type"text"  style="width:50px" onkeyup="setBloodRequestCCTab2_1(this,`' + parseInt(value.volume2) + '`)"  />';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        if (status) event_data += '<input readonly type"text" class="date1" style="width:120px" onchange="setBloodConfirmBloodreQuestDateTab2_1(this)" onkeyup="setBloodConfirmBloodreQuestDateTab2_1(this)" />';
        event_data += '</td>';
        event_data += '<td class="td-table">';
        if (status) event_data += '<input readonly type"text" style="width:60px" onkeyup="setBloodConfirmBloodreQuestTimeTab2_1(this)" />';
        event_data += '</td>';
        event_data += '</tr>';
      });
      $("#blood-queue-tab2-1").append(event_data);
      dateBE('.date1');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function loadTableBloodQueueHistoryUsedNurse() {
  var hn = '';
  hn = $('#patienthn').val();
  var body = document.getElementById("blood-queue-tab2-2").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (hn == "") {
    return false;
  }

  $.ajax({
    url: 'data/bloodqueue/bloodqueue-history-nurse.php?hn=' + hn,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var event_data = '';
      $("#blood-queue-tab-2-1").text(data.total);
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      i = 0;
      var arr2 = [];
      $.each(obj, function (index, value) {
        if (value.bloodnotificationtypeid == 2) {
          value.requestbloodstatusname = 'จ่ายเลือดด่วน O Adsol';
        } else if (value.ispaybloodstatus == 1 && !(value.requestbloodstatusid == 3 || value.requestbloodstatusid == 4)) value.requestbloodstatusname = 'จ่ายเลือดแล้ว';

        var arr = [value];
        event_data += '<tr >';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '<td class="td-table" >' + getDMY2(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
        event_data += '<td class="td-table">' + getDMY2(value.requestqueueblooddate) + ' ' + value.requestqueuebloodtime + '</td>';
        event_data += '<td class="td-table" >' + getDMY2(value.usedblooddatefrom) + ' - ' + getDMY2(value.usedblooddateto) + '</td>';
        event_data += '<td class="td-table">' + value.unitofficename1 + '</td>';
        event_data += '<td class="td-table">' + value.bloodnotificationtypename + '</td>';
        event_data += '<td class="td-table">';
        event_data += value.forchildren == 1 ? '<i class="fa fa-check-square fa-2x" style="color: #009999;" aria-hidden="true"></i>' : '';
        event_data += '</td>';
        event_data += '<td class="td-table">' + value.bloodstocktypenamegroup + '</td>';
        event_data += '<td class="td-table">' + getStatusBloodReq(value) + '</td>';
        event_data += '<input class = "chk" type = "hidden" id ="chk' + index + '" name = "chk" value = "' + getStatusBloodReq(value) + '">';
        event_data += '<td class="td-table">' + value.requestbloodcancelnamegroup + '</td>';
        event_data += '<td class="td-table">';

        if (value.isreadybloodstatus == 1) {
          event_data += '<button type="button" onclick="showModal(' + value.requestbloodid + ')"  class="btn btn-success m-l-5">';
          event_data += '<i class="fa fa-search"></i>';
          event_data += '</button>';
        }

        event_data += '</td>';
        event_data += '</tr>';
        arr2.push(getStatusBloodReq(value));
        i++;
      }); // if(data[0].isconfirmbloodgroupqueue == 1 || data[0].isreadybloodstatus == 1){
      //     alert (1)
      // }else{
      //     alert(2)
      // }
      // console.log(getStatusBloodReq(data))

      $("#blood-queue-tab2-2").append(event_data); // $.each(arr2, function(index, value) {
      //     if (value == "รอยืนยันการใช้เลือด" || value == "รอยืนยันจากแพทย์" || value == "รอจ่ายเลือด" || value == "จ่ายเลือดแล้ว" || value == "จ่ายเลือดบางส่วน") {
      //         $('#have').prop('hidden', false);
      //         $('#no').prop('hidden', true);
      //     } else {
      //         $('#have').prop('hidden', true);
      //         $('#no').prop('hidden', false);
      //     }
      // });
      // v = $('#chk'+i-1).val();    
      // console.log(v);

      dateBE('.date1');
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function getStatusBloodReq(data) {
  var status = '';

  if (data.requestbloodstatusid == 1) {
    status = 'รอรับสิ่งส่งตรวจ';
  } else if (data.requestbloodstatusid == 2) {
    status = 'รับสิ่งส่งตรวจแล้ว';

    if (data.bloodnotificationtypeid == 2) {
      status = 'จ่ายเลือดด่วน O Adsol';
    } else if (data.wait_refund > 0) {
      status = 'เกินวันที่ต้องการใช้เลือด';
    } else if (data.cross_qty - data.pay_success > 0 && data.pay_success > 0) {
      status = 'จ่ายเลือดบางส่วน';
    } else if (data.ispaybloodstatus == 1 && data.cross_qty > 0) {
      status = 'จ่ายเลือดแล้ว';
    } else if (data.isreadybloodstatus == 1 && data.cross_qty > 0) {
      status = 'รอจ่ายเลือด';
    } else if (data.isconfirmbloodgroupqueue == 1 && data.cross_qty > 0) {
      status = 'รอยืนยันการใช้เลือด';
    } else if (data.iscrossmatch == 1 && data.isconfirmbloodgroupqueue != 1) {
      status = 'รอยืนยันผลเลือด';
    }
  } else if (data.requestbloodstatusid == 3) {
    status = 'ปฏิเสธสิ่งส่งตรวจ';
  } else if (data.requestbloodstatusid == 4) {
    status = 'ยกเลิก';
  }

  return status;
}

function setBloodQueueCheckTab2_1(self, index) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);

  if (self.checked) {
    if (checkRedCell(item[0].usedblooddateto, index)) {
      swal({
        title: "คุณต้องการยืนยันใช้เลือดรายการนี้หรือไม่ ?",
        text: "มีรายการที่จะครบกำหนดใช้เลือดก่อนรายการนี้",
        type: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'ใช่',
        cancelButtonText: "ไม่",
        closeOnConfirm: true,
        closeOnCancel: true,
        allowOutsideClick: false
      }, function (inputValue) {
        if (inputValue) {
          setBloodQueueCheckItemTab2_1(self, index);
        } else {
          self.checked = false;
        }
      });
      return false;
    } else {
      setBloodQueueCheckItemTab2_1(self, index);
    }
  } else {
    setBloodQueueCheckItemTab2_1(self, index);
  }
}

function setBloodQueueCheckItemTab2_1(self, index) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  row.cells[11].children[0].required = self.checked;

  if (self.checked) {
    row.cells[11].children[0].readOnly = false;
    if (parseInt(item[0].patientage) <= 15) row.cells[12].children[0].readOnly = false;
    console.log(row.cells[12].children[0]);
    row.cells[13].children[0].readOnly = false;
    row.cells[14].children[0].readOnly = false;
    row.cells[13].children[0].value = getDMY543();
    row.cells[14].children[0].value = getTimeNow();
    item[0].confirmbloodrequestdate = getDMY543();
    item[0].confirmbloodrequesttime = getTimeNow();
    checkDateExp(index);
  } else {
    row.cells[11].children[0].readOnly = true;
    row.cells[12].children[0].readOnly = true;
    row.cells[13].children[0].readOnly = true;
    row.cells[14].children[0].readOnly = true;
    row.cells[13].children[0].value = "";
    row.cells[14].children[0].value = "";
    item[0].confirmbloodrequestdate = "";
    item[0].confirmbloodrequesttime = "";
  }

  item[0].isreadyblood = self.checked;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function checkRedCell(todate, index) {
  var status = false;
  var todate = todate.replace(/-/g, '');
  var count = 0;
  var rows = document.getElementById("blood-queue-tab2-1").rows;

  for (var i = 2; i < rows.length; i++) {
    var item = JSON.parse(rows[i].cells[0].innerHTML);

    if (count != index && item[0].bloodstocktypegroupid == 1 && item[0].isreadyblood != 1) {
      var usedblooddateto = item[0].usedblooddateto.replace(/-/g, '');

      if (parseInt(todate) > parseInt(usedblooddateto)) {
        status = true;
      }
    }

    count++;
  }

  return status;
}

function checkDateExp() {// var bloodQueueTab = getBloodQueueTab2_1() ;
  // $.each(obj, function (index, value) {
  //     var item = JSON.parse(value);
  //     console.log(item);
  // });

  var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
}

function getBloodQueueTab2_1() {
  var arr = [];
  var rows = document.getElementById("blood-queue-tab2-1").rows;

  for (var i = 2; i < rows.length; i++) {
    arr.push(rows[i].cells[0].innerHTML);
  }

  return arr;
}

function setBloodRequestUnitTab2_1(self, valueMax) {
  var v = '';

  if (valueMax >= self.value && self.value > parseInt(0)) {
    v = self.value;
  }

  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  row.cells[0].innerHTML = JSON.stringify(item);

  if (valueMax >= self.value && self.value > parseInt(0)) {
    row.cells[9].innerHTML = parseInt(valueMax) - parseInt(self.value == "" ? "0" : self.value);
  } else {
    row.cells[9].innerHTML = parseInt(valueMax);
  }

  item[0].bloodrequestunit = v;
  self.value = v;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setBloodRequestCCTab2_1(self, valueMax) {
  var v = '';

  if (valueMax >= self.value && self.value > parseInt(0)) {
    v = self.value;
  }

  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].bloodrequestcc = v;
  row.cells[0].innerHTML = JSON.stringify(item);

  if (valueMax >= self.value && self.value > parseInt(0)) {
    row.cells[10].innerHTML = parseInt(valueMax) - parseInt(self.value == "" ? "0" : self.value);
  } else {
    row.cells[10].innerHTML = parseInt(valueMax);
  }

  row.cells[11].children[0].required = v == '';
  self.value = v;
  row.cells[11].children[0].readOnly = v != '';
  row.cells[11].children[0].required = v == '';
}

function setBloodConfirmBloodreQuestDateTab2_1(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].confirmbloodrequestdate = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setBloodConfirmBloodreQuestTimeTab2_1(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].confirmbloodrequesttime = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}