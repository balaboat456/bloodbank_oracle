"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var usercreate = $("#usercreate").val();
  if (usercreate == "") $("#usercreate").val(session_fullname);
  $("#scanhn").on('keydown', function (e) {
    if (e.which == 13) {
      scanBarcode();
    }
  });
});

function scanBarcode() {
  var scanhn = document.getElementById('scanhn').value;

  if (scanhn.length > 0) {
    spinnershow();
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: 'api/get-patient-rajavithi.php?hn=' + scanhn,
      success: function success(data) {
        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: 'data/patient/patient.php?hn=' + scanhn,
          complete: function complete() {
            var delayInMilliseconds = 200;
            setTimeout(function () {
              spinnerhide();
            }, delayInMilliseconds);
          },
          success: function success(data) {
            if (data.data.length > 0) {
              setPatient(data.data[0]);
              loadTable(data.data[0].patienthn);
            } else {
              var _swal;

              clearPatient();
              swal((_swal = {
                title: "ไม่พบข้อมูล ",
                type: "warning",
                showCloseButton: false,
                showCancelButton: false,
                // dangerMode: true,
                confirmButtonClass: "btn-success"
              }, _defineProperty(_swal, "confirmButtonClass", ""), _defineProperty(_swal, "confirmButtonText", "ตกลง"), _defineProperty(_swal, "closeOnConfirm", true), _swal), function (inputValue) {
                if (inputValue) {
                  document.getElementById('scanhn').focus;
                }
              });
            }

            document.getElementById('scanhn').value = '';
          },
          error: function error(data) {
            clearPatient();
            console.log('An error occurred.');
            console.log(data);
            document.getElementById('scanhn').value = '';
          }
        });
      },
      error: function error(data) {
        spinnerhide();
        clearPatient();
        console.log('An error occurred.');
        console.log(data);
        document.getElementById('scanhn').value = '';
      }
    });
  } else {
    clearPatient();
  }
}

function setPatient(data) {
  data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
  document.getElementById('patientid').value = data.patientid;
  document.getElementById('hn').value = data.patienthn;
  document.getElementById('patienthn').innerHTML = data.patienthn;
  document.getElementById('patientfullname').innerHTML = data.patientfullname;
  document.getElementById('patientage').innerHTML = data.patientage;
  document.getElementById('patientgender').innerHTML = data.patientgender;
  document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;
}

function clearPatient() {
  newBloodLetting();
  document.getElementById('patientid').value = '';
  document.getElementById('hn').value = '';
  document.getElementById('patienthn').innerHTML = '';
  document.getElementById('patientfullname').innerHTML = '';
  document.getElementById('patientage').innerHTML = '';
  document.getElementById('patientgender').innerHTML = '';
  document.getElementById('patientbloodgroup').innerHTML = '';
}

function newBloodLetting() {
  document.getElementById('serumtearid').value = '';
  document.getElementById('serumteardatetime').value = '';
  document.getElementById('diagnosis').value = '';
  document.getElementById('diagnosisdetail').value = '';
  document.getElementById('clotted').value = '';
  document.getElementById('qty').value = '';
  document.getElementById('remark').value = '';
  document.getElementById('usercreate').value = '';
  document.getElementById('hemolysis').checked = false; // Select Value

  setDataModalSelectValue('unitofficeid', '', '');
  setDataModalSelectValue('doctorid', '', '');
  setDataModalSelectValue('serumtearvolumeid', '', '');
  setDataModalSelectValue('staffid', '', '');

  for (i = 0; i < count; i++) {
    document.getElementById("trblood" + i).style.background = stylecolor[i];
  }
}

function chActive(id) {
  for (i = 0; i < count; i++) {
    document.getElementById("trblood" + i).style.background = stylecolor[i];
  }

  document.getElementById("trblood" + id).style.background = "#b7e4eb";
  var item = dataObj[id];
  indexActive = id;
  setDataBloodLetting(item);
}

function setDataBloodLetting(data) {
  document.getElementById('patientid').value = data.patientid;
  document.getElementById('serumtearid').value = data.serumtearid;
  document.getElementById('serumteardatetime').value = getDMYHM(data.serumteardatetime);
  document.getElementById('diagnosis').value = data.diagnosis;
  document.getElementById('diagnosisdetail').value = data.diagnosisdetail;
  document.getElementById('clotted').value = data.clotted;
  document.getElementById('qty').value = data.qty;
  document.getElementById('datenow').value = getDMY(data.serumteardatetime.substr(0, 10));
  document.getElementById('timenow').value = data.serumteardatetime.substr(11, 5);
  document.getElementById('remark').value = data.remark;

  if (data.remark != "" || data.remark != null) {
    document.getElementById('chk_remark').checked = true;
    document.getElementById("remark").disabled = false;
  } else {
    document.getElementById('chk_remark').checked = false;
    document.getElementById("remark").disabled = true;
  }

  document.getElementById('usercreate').value = data.usercreate;
  document.getElementById('hemolysis').checked = data.hemolysis == 1;

  if (data.hemolysis == 1) {
    document.getElementById('chk_remark').checked = false;
    document.getElementById("remark").disabled = true;
  }

  document.getElementById('report').value = data.report;
  document.getElementById('appointment').value = data.appointment;
  document.getElementById('appoittext').value = data.appoittext;

  if (data.anhn == 1) {
    document.getElementById('anhn').checked = true;
  }

  if (data.slide == 1) {
    document.getElementById('slide').checked = true;
  }

  if (data.catheter == 1) {
    document.getElementById('catheter').checked = true;
  }

  if (data.sticker == 1) {
    document.getElementById('sticker').checked = true;
  }

  if (data.temp == 1) {
    document.getElementById('temp').checked = true;
  }

  if (data.fivecc == 1) {
    document.getElementById('fivecc').checked = true;
  }

  if (data.othertube == 1) {
    document.getElementById('othertube').checked = true;
  }

  if (data.abnormal == 1) {
    document.getElementById('abnormal').checked = true;
  } // Select Value


  setDataModalSelectValue('unitofficeid', data.unitofficeid, data.unitofficename);
  setDataModalSelectValue('staffid', data.staffid, data.staffname);
  setDataModalSelectValue('doctorid', data.doctorid, data.doctorname);
  setDataModalSelectValue('serumtearvolumeid', data.serumtearvolumeid, data.serumtearvolumename);
}

function setDataModalSelectValue() {
  var elem = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var itemid = arguments.length > 1 ? arguments[1] : undefined;
  var itemtext = arguments.length > 2 ? arguments[2] : undefined;
  var select = $('#' + elem);
  option = new Option(itemtext, itemid, true, true);
  select.append(option).trigger('change');
}