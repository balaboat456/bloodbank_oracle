"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var item_lab_new;
var item_lab_edit_tab_2;
var item_lab_edit_tab_2_item2;
var item_lab_new_maintenanceright;
var item_lab_form;
var patientinsurance;
var ttest = 0;
var dduck = 0;
$(document).ready(function () {
  $("#patientid").on('keydown', function (e) {
    if (e.which == 13) {
      scanBarcode();
    }
  });
});

function scanBarcode() {
  var patient = document.getElementById('patientid').value;

  if (patient.length > 0) {
    spinnershow();
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: 'api/get-patient-rajavithi.php?hn=' + patient,
      success: function success(data) {
        var hhn = data.patientid_hn;
        var fromdate = document.getElementById("fromdate").value;
        var todate = document.getElementById("todate").value; ///////////////////////////////////////////////////////////////////////////////

        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: 'api/get_lisrequest.php?hn=' + hhn + '&fromdate=' + fromdate + '&todate=' + todate,
          success: function success(data) {
            console.log(data);
          }
        }); /////////////////////////////////////////////////////////////////////////////////

        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: 'data/patient/patient.php?hn=' + hhn,
          complete: function complete() {
            var delayInMilliseconds = 200;
            setTimeout(function () {
              spinnerhide();
            }, delayInMilliseconds);
          },
          success: function success(data) {
            if (data.data.length > 0) {
              setPatient(data.data[0]);
            } else {
              var _swal;

              clearPatient();
              swal((_swal = {
                title: "ไม่พบข้อมูล",
                type: "warning",
                showCloseButton: false,
                showCancelButton: false,
                // dangerMode: true,
                confirmButtonClass: "btn-success"
              }, _defineProperty(_swal, "confirmButtonClass", ""), _defineProperty(_swal, "confirmButtonText", "ตกลง"), _defineProperty(_swal, "closeOnConfirm", true), _swal), function (inputValue) {
                if (inputValue) {
                  document.getElementById('patientid').focus;
                }
              });
            }

            document.getElementById('patientid').value = '';
          },
          error: function error(data) {
            clearPatient();
            console.log('An error occurred.');
            console.log(data);
            document.getElementById('patientid').value = '';
          }
        });
      },
      error: function error(data) {
        spinnerhide();
        clearPatient();
        console.log('An error occurred.');
        console.log(data);
        document.getElementById('patientid').value = '';
      }
    });
  } else {
    clearPatient();
  }
}

function setPatient(data) {
  console.log(data); // loadTableBloodPayStock();

  document.getElementById('hn').value = data.patienthn;
  document.getElementById('patienthn').innerHTML = data.patienthn;
  document.getElementById('labpatientid').value = data.patientid; // document.getElementById('patientan').innerHTML = data.patientan;
  // document.getElementById('patientidcard').innerHTML = data.patientidcard;
  // document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;

  document.getElementById('patientfullname').innerHTML = data.patientfullname;
  document.getElementById('patientage').innerHTML = data.patientage;
  document.getElementById('patientgender').innerHTML = data.patientgender; // document.getElementById('patientinsurance').innerHTML = data.patientinsurance;
  document.getElementById('patient_type').innerHTML = data.patient_type;
  if (diffDate(data.patientanbirthday) < 6) {
    var _swal2;

    swal((_swal2 = {
      title: "ผู้ป่วย เป็นเด็กอายุต่ำกว่า 6 ขวบ กรุณาระมัดระวัง การรักษา",
      type: "warning",
      showCloseButton: false,
      showCancelButton: false,
      // dangerMode: true,
      confirmButtonClass: "btn-success"
    }, _defineProperty(_swal2, "confirmButtonClass", ""), _defineProperty(_swal2, "confirmButtonText", "ตกลง"), _defineProperty(_swal2, "closeOnConfirm", true), _swal2), function (inputValue) {
      if (inputValue) {
        showDataModal(data);
      }
    });
  } else {
    showDataModal(data);
  } // clearFormTab1();

}

function diffDate(date) {
  var dateFrom = new Date(date);
  var today = new Date();
  var diffDate = parseInt((today - dateFrom) / (1000 * 60 * 60 * 24), 10) / 365.25 + 543;
  return diffDate;
}

function showDataModal(data) {
  requestBloodLabModalShow();
  setTimeout(loadCheckRequestTab1, 1000); // loadCheckRequestTab1();

  loadCheckRequestTab2();
  item_lab_new = '';
  item_lab_new_maintenanceright = '';
  var body = document.getElementById("lab_check_request_modal_tab1_2").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  var event_data = '';
  event_data += '<tr id="trbloodmaintenanceright0" onClick="chActiveMaintenanceright(this)" >';
  event_data += '<td  style="display:none;" >';
  event_data += '</td>';
  event_data += '<td id="patientinsurance_val">' + data.patientinsurance + '</td>';
  event_data += '<td >1</td>';
  event_data += '</tr>';
  $("#lab_check_request_modal_tab1_2").append(event_data);
}

function clearPatient() {// document.getElementById('hn').value = '';
  // document.getElementById('patienthn').innerHTML = '-';
  // document.getElementById('patientan').innerHTML = '-';
  // document.getElementById('patientidcard').innerHTML = '-';
  // document.getElementById('patientbloodgroup').innerHTML = '-';
  // document.getElementById('patientfullname').innerHTML = '-';
  // document.getElementById('patientage').innerHTML = '-';
  // document.getElementById('patientgender').innerHTML = '-';
  // document.getElementById('patientinsurance').innerHTML = '-';
  // clearFormTab1();
}

function chActive(id, self) {
  // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);
  for (i = 0; i < count; i++) {
    document.getElementById("trblood" + i).style.background = "#FFF";
  }

  document.getElementById("trblood" + id).style.background = "#b7e4eb";
  var item = JSON.parse(self.cells[0].innerHTML);
  item_lab_new = item;
  item_lab_new_maintenanceright = '';
  loadMaintenanceright(item);
}

function ch2Active(id, self) {
  dduck++; // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);

  for (i = 0; i < count_tab2; i++) {
    document.getElementById("trblood_tab2" + i).style.background = "#FFF";
  }

  document.getElementById("trblood_tab2" + id).style.background = "#b7e4eb";
  var item = JSON.parse(self.cells[0].innerHTML);
  item_lab_edit_tab_2 = item;
  loadCheckRequestTab2_item1(item.labid);
  loadCheckRequestTab2_item2(item.labcheckrequestid);
}

function chActiveMaintenanceright(id, self) {
  // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);
  for (i = 0; i < 1; i++) {
    document.getElementById("trbloodmaintenanceright0").style.background = "#FFF";
  }

  document.getElementById("trbloodmaintenanceright0").style.background = "#b7e4eb";
  var patientinsurance_val = document.getElementById("patientinsurance_val").innerHTML;
  patientinsurance = patientinsurance_val;
  ttest = 1;
  setValueItem(); // var item = JSON.parse(self.cells[0].innerHTML);
  // item_lab_new_maintenanceright = item;
}

function setItemLab() {
  // if (item_lab_new == '') {
  //     showSwal("กรุณาเลือกรายการที่ต้องการ");
  //     return false;
  // } else if (item_lab_new_maintenanceright == '') {
  //     showSwal("กรุณาเลือกสิทธิ์การรักษา");
  //     return false;
  // } else {
  //     addItemData();
  // }
  addItemData();
}

function setItemManualPayment() {
  // if(!item_lab_new)
  // {
  //     showSwal("กรุณาเลือกรายการที่ต้องการ");
  //     return false;
  // }else
  // {
  //     item_lab_new.maintenancerightid = '99';
  //     item_lab_new.maintenancerightname = 'ผู้ป่วยนอกระบบชำระเงินเอง';
  //     addItemData();
  // }
  // item_lab_new.maintenancerightid = '99';
  // item_lab_new.maintenancerightname = 'ผู้ป่วยนอกระบบชำระเงินเอง';
  addItemData();
}

function showSwal() {
  var _swal3;

  var $text = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  swal((_swal3 = {
    title: $text,
    type: "warning",
    showCloseButton: false,
    showCancelButton: false,
    // dangerMode: true,
    confirmButtonClass: "btn-success"
  }, _defineProperty(_swal3, "confirmButtonClass", ""), _defineProperty(_swal3, "confirmButtonText", "ตกลง"), _defineProperty(_swal3, "closeOnConfirm", true), _swal3));
}

function saveSuccessLoadData() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  $.ajax({
    url: 'data/checkrequest/checkrequest-accepted.php?id=' + id,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""'));
      item_lab_edit_tab_2 = obj[0];
      $.ajax({
        url: 'data/checkrequest/checkrequest-accepted-item2.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function success(data) {
          var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""'));
          item_lab_edit_tab_2_item2 = obj; // addItemEditData();
        },
        error: function error(d) {
          /*console.log("error");*/
          alert("404. Please wait until the File is Loaded.");
        }
      });
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function addItemData() {
  requestBloodLabModalClose();
  setValueItem();
}

function addItemEditData() {
  item_lab_new = item_lab_edit_tab_2;
  console.log(item_lab_new);

  if (dduck == 0) {
    var _swal4;

    swal((_swal4 = {
      title: "กรุณาเลือกรายการ",
      type: "warning",
      showCloseButton: false,
      showCancelButton: false,
      // dangerMode: true,
      confirmButtonClass: "btn-success"
    }, _defineProperty(_swal4, "confirmButtonClass", ""), _defineProperty(_swal4, "confirmButtonText", "ตกลง"), _defineProperty(_swal4, "closeOnConfirm", true), _swal4), function (inputValue) {
      if (inputValue) {}
    });
  } else {
    requestBloodLabModalClose();
    setLabFormToItemList('edit');
    setValueItem();
  }
}

function setValueItem() {
  var data = item_lab_new;
  document.getElementById('labcheckrequestid').value = data.labcheckrequestid ? data.labcheckrequestid : '';
  document.getElementById('labunitid').value = data.labunitid ? data.labunitid : '1';
  document.getElementById('labunitname').value = data.labunitname ? data.labunitname : 'Blood Bank';
  document.getElementById('checkresultbloodstatusid').value = data.checkresultbloodstatusid ? data.checkresultbloodstatusid : '1';
  document.getElementById('checkresultbloodstatusname').value = data.checkresultbloodstatusname ? data.checkresultbloodstatusname : 'รอรับสิ่งส่งตรวจ';
  document.getElementById('labjobtypeid').value = data.labjobtypeid ? data.labjobtypeid : '1';
  document.getElementById('labjobtypename').value = data.labjobtypename ? data.labjobtypename : 'Blood Bank';
  document.getElementById('maintenancerightid').value = data.maintenancerightid ? data.maintenancerightid : '99';

  if (ttest != 0) {
    document.getElementById('maintenancerightname').value = patientinsurance;
  } else {
    document.getElementById('maintenancerightname').value = 'ผู้ป่วยนอกระบบชำระเงินเอง';
  }

  document.getElementById('labusersend').value = data.labusersend ? data.labusersend : session_fullname;
  document.getElementById('labuserget').value = data.labuserget ? data.labuserget : '';
  document.getElementById('labid').value = data.labid ? data.labid : '';
  document.getElementById('reqby').value = data.reqby ? data.reqby : '';
  document.getElementById('labdiagnosis').value = data.labdiagnosis ? data.labdiagnosis : '';
  document.getElementById('labremark').value = data.labremark ? data.labremark : '';
  document.getElementById('labdaignosis').value = data.labdaignosis ? data.labdaignosis : '';
  setCancelData(data);

  if (data.labexpress == 1) {
    document.getElementById('labexpress1').checked = true;
  } else if (data.labexpress == 2) {
    document.getElementById('labexpress2').checked = true;
  } //ประวัติการตั้งครรภ์


  if (data.pregnant == 1) {
    document.getElementById('pregnant1').checked = true;
  } else if (data.pregnant == 2) {
    document.getElementById('pregnant2').checked = true;
  } //ประเภทผู้ป่วย


  if (data.patienttype == 1) {
    document.getElementById('patienttype1').checked = true;
  } else if (data.patienttype == 2) {
    document.getElementById('patienttype2').checked = true;
  } else if (data.patienttype == 3) {
    document.getElementById('patienttype3').checked = true;
  } //ประวัติการรับเลือด


  if (data.bloodhistory == 1) {
    document.getElementById('bloodhistory1').checked = true;
  } else if (data.bloodhistory == 2) {
    document.getElementById('bloodhistory2').checked = true;
  } // Date Time Value


  var labgetdatetime = "";
  var labsenddatetime = "";
  var labkeepdatetime = "";
  var labrequestdatetime = "";
  var pregnantdate = "";
  var antenataldate = "";
  var birthdate = "";
  var bloodgetdate = "";
  if (data.labgetdatetime == "0000-00-00 00:00:00" && data.labgetdatetime) labgetdatetime = getDMYHM(StringToDateYMDHMS(data.labgetdatetime));
  if (data.labsenddatetime != "0000-00-00 00:00:00" && data.labsenddatetime) labsenddatetime = getDMYHM(StringToDateYMDHMS(data.labsenddatetime));
  if (data.labkeepdatetime != "0000-00-00 00:00:00" && data.labkeepdatetime) labkeepdatetime = getDMYHM(StringToDateYMDHMS(data.labkeepdatetime));
  if (data.labrequestdatetime != "0000-00-00 00:00:00" && data.labrequestdatetime) labrequestdatetime = getDMYHM(StringToDateYMDHMS(data.labrequestdatetime));
  if (data.pregnantdate != "0000-00-00" && data.pregnantdate) pregnantdate = getDMY(data.pregnantdate);
  if (data.antenataldate != "0000-00-00" && data.antenataldate) antenataldate = getDMY(data.antenataldate);
  if (data.birthdate != "0000-00-00" && data.birthdate) birthdate = getDMY(data.birthdate);
  if (data.bloodgetdate != "0000-00-00" && data.bloodgetdate) bloodgetdate = getDMY(data.bloodgetdate);
  document.getElementById('labgetdatetime').value = labgetdatetime;
  document.getElementById('labsenddate').value = labsenddatetime ? labsenddatetime : getDMYHM();
  document.getElementById('labkeepdatetime').value = labkeepdatetime ? labkeepdatetime : getDMYHM();
  document.getElementById('labrequestdatetime').value = labrequestdatetime ? labrequestdatetime : getDMYHM();
  document.getElementById('pregnantdate').value = pregnantdate ? pregnantdate : '';
  document.getElementById('antenataldate').value = antenataldate ? antenataldate : '';
  document.getElementById('birthdate').value = birthdate ? birthdate : '';
  document.getElementById('bloodgetdate').value = bloodgetdate ? bloodgetdate : ''; // Select Value
  // $("#labunitroomid").select2('data', { id: data.unitofficeid, text: "[" + data.unitofficecode + "] " + data.unitofficename });

  setDataModalSelectValue('labunitroomid', data.unitofficeid, "[" + data.unitofficecode + "] " + data.unitofficename); //หน่วยงานที่ส่งตรวจ

  setDataModalSelectValue('doctorid', data.doctorid, data.doctorname);
  setDataModalSelectValue('reasonsendingid', data.reasonsendingid, data.reasonsendingname);
  setDataModalSelectValue('labdeliveryid', data.labdeliveryid, data.labdeliveryname);
  setDataModalSelectValue('labbloodgroupid', data.labbloodgroupid, data.labbloodgroupname);
  setDataModalSelectValue('labrhid', data.labrhid, data.labrhname);
  setDataModalSelectValue('motherbloodgroup', data.motherbloodgroup, data.motherbloodgroupname);
  setDataModalSelectValue('motherrh', data.motherrh, data.motherrhname);
  $("#labunitroomid").val([data.unitofficeid, "[" + data.unitofficecode + "] " + data.unitofficename]).trigger("change");
}

function setDataModalSelectValue() {
  var elem = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var itemid = arguments.length > 1 ? arguments[1] : undefined;
  var itemtext = arguments.length > 2 ? arguments[2] : undefined;
  var select = $('#' + elem);
  option = new Option(itemtext, itemid, true, true);
  select.append(option).trigger('change');
}

function setNo() {
  var rows = document.getElementById("request_blood_lab").rows;

  for (var i = 1; i < rows.length; i++) {
    rows[i].cells[1].innerHTML = i;
  }
}

function setCancelData(data) {
  if (data.checkresultbloodstatusid == '99') {
    document.getElementById("tab1cencel").style.display = "block";
    document.getElementById("btnSave").style.visibility = "hidden";
    document.getElementById("btnCancel").style.visibility = "hidden";
    document.getElementById('labcheckrequestcancelname').innerHTML = 'สาเหตุ : ' + data.labcheckrequestcancelname + ' ' + data.labcheckrequestcancelremark;
  } else {
    document.getElementById("tab1cencel").style.display = "none";
    document.getElementById("btnSave").style.visibility = "visible";
    document.getElementById("btnCancel").style.visibility = "visible";
  }
}

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  setNo();
}

function setIsCheck(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.ischeck_return = self.checked;
  item.ck = self.checked ? '1' : '0';
  row.cells[0].innerHTML = JSON.stringify(item);

  if (self.checked) {
    row.style.background = "#b7e4eb";
  } else {
    row.style.background = "#FFF";
  }
}

function getDate8(elename) {
  date8('#' + elename);
}

function deleteRequestBloodLab() {
  swal({
    title: "คุณต้องการยกเลิกรายการนี้หรือไม่",
    html: true,
    text: '<label ">วันที่ยกเลิก</label>' + '<input readonly type="text" autocomplete="off" value="" class="form-control" id="labcheckrequestcanceldatetime" name="labcheckrequestcanceldatetime">' + '<label style="margin-top:10px;">ผู้ยกเลิก</label>' + '<input readonly type="text" autocomplete="off" value="' + session_fullname + '" class="form-control" id="usercancel" name="usercancel">' + '<label style="margin-top:10px">สาเหตุ</label>' + '<select class="form-control" id="labcheckrequestcancelid" name="labcheckrequestcancelid"></select>' + '<label style="margin-top:10px">หมายเหตุ</label>' + '<textarea id="labcheckrequestcancelremark" name="labcheckrequestcancelremark" rows="4" class="form-control" ></textarea>',
    showCloseButton: true,
    showCancelButton: true,
    cancelButtonClass: "",
    confirmButtonClass: "btn-success",
    confirmButtonText: "ตกลง",
    cancelButtonText: "ยกเลิก",
    closeOnConfirm: true
  }, function (inputValue) {
    if (inputValue) {
      var labcheckrequestid = $('#labcheckrequestid').val();
      var usercancel = $('#usercancel').val();
      var labcheckrequestcancelid = $('#labcheckrequestcancelid').val();
      var labcheckrequestcancelremark = $('#labcheckrequestcancelremark').val();
      spinnershow();
      $.ajax({
        url: 'data/recordrequestbloodlab/recordrequestbloodlab-delete.php?labcheckrequestid=' + labcheckrequestid + '&usercancel=' + usercancel + '&labcheckrequestcancelid=' + labcheckrequestcancelid + '&labcheckrequestcancelremark=' + labcheckrequestcancelremark,
        dataType: 'json',
        type: 'get',
        complete: function complete() {
          var delayInMilliseconds = 200;
          setTimeout(function () {
            spinnerhide();
          }, delayInMilliseconds);
        },
        success: function success(data) {
          if (data.status == true) {
            var dataCancel = {
              checkresultbloodstatusid: '99',
              labcheckrequestcancelname: $('#labcheckrequestcancelid').text(),
              labcheckrequestcancelremark: labcheckrequestcancelremark
            };
            setCancelData(dataCancel);
            myAlertTopDelete();
          } else {
            myAlertTopErrorDelete();
          }
        },
        error: function error(d) {
          /*console.log("error");*/
          alert("404. Please wait until the File is Loaded.");
        }
      });
    }
  });
  $("#labcheckrequestcanceldatetime").val(getDMYHM());
  lab_check_request_cancel();
}