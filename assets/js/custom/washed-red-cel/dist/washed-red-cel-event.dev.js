"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var usercreate = $("#usercreate").val();

  if (usercreate == "") {// $("#usercreate").val(session_fullname);
  }

  $("#scanhn").on('keydown', function (e) {
    if (e.which == 13) {
      scanBarcode();
    }
  });
  $("#bgnum").on('keydown', function (e) {
    if (e.which == 13) {
      // searchbagnumber_crossmatch();
      findTableBagNumber();
    }
  });
});

function scanBarcode() {
  // alert('666');
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
              setPatient(data.data[0]); // loadTable(data.data[0].patienthn);

              requestBloodModalShow();
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

            document.getElementById('scanhn').value = ''; // washBloodModalShow();
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
  document.getElementById('patienthn').innerHTML = getEmpty(data.patienthn);
  document.getElementById('patientan').innerHTML = getEmpty(data.patientan);
  document.getElementById('patientfullname').innerHTML = getEmpty(data.patientfullname);
  document.getElementById('patientage').innerHTML = getEmpty(data.patientage);
  document.getElementById('patientgender').innerHTML = getEmpty(data.patientgender);
  document.getElementById('patientbloodgroup').innerHTML = getEmpty(data.patientbloodgroup);

  if (data.patientimage.replace('data:image/png;base64,', '') != "") {
    document.getElementById('img_profile').src = data.patientimage;
  } else {
    document.getElementById('img_profile').src = "assets/images/profile.png";
  }
}

function getEmpty(v) {
  return v != "" ? v : "-";
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
  document.getElementById("bag_number").value = bag_number;
  document.getElementById("bloodgroupid").value = '';
  document.getElementById("rhname").value = '';
  document.getElementById("rhid").value = '';
  document.getElementById("blood_wash_use_date").value = '';
  document.getElementById("diagnosis").value = '';
  document.getElementById("diagnosisdetail").value = '';
  document.getElementById("doctorname").value = '';
  document.getElementById("unitofficename").value = '';
  document.getElementById("cc").value = '';
  document.getElementById("val_after").value = '';
  document.getElementById("val_before").value = '';
  document.getElementById("qty").value = '';
  document.getElementById("nss").value = '';
  document.getElementById("nss_value").value = '';
  document.getElementById("nss_lot").value = '';
  document.getElementById("nss_exp").value = '';
  document.getElementById("hb_before").value = '';
  document.getElementById("hb_after").value = '';
  document.getElementById("hct_before").value = '';
  document.getElementById("hct_after").value = '';
  document.getElementById("plt_before").value = '';
  document.getElementById("plt_after").value = '';
  document.getElementById("rbc_before").value = '';
  document.getElementById("rbc_after").value = '';
  document.getElementById("mcv_before").value = '';
  document.getElementById("mcv_after").value = '';
  document.getElementById("wbc_before").value = '';
  document.getElementById("wbc_after").value = '';
  document.getElementById("bloodwashedredcellid").value = '';
  document.getElementById("remark").value = '';
  document.getElementById("report").value = '';
  document.getElementById("datenow").value = getDMY543();
  document.getElementById("timenow").value = getTimeNow();

  for (i = 0; i < count; i++) {
    if (document.getElementById("trblood" + i)) document.getElementById("trblood" + i).style.background = stylecolor[i];
  }
}

function chActive(id) {
  for (i = 0; i < count; i++) {
    if (document.getElementById("trblood" + i)) document.getElementById("trblood" + i).style.background = stylecolor[i];
  }

  document.getElementById("trblood" + id).style.background = "#b7e4eb";
  var item = dataObj[id];
  indexActive = id; // setDataBloodLetting(item);
}

function setDataBloodLetting(data) {
  document.getElementById('patientid').value = data.patientid;
  document.getElementById('bloodwashedredcellid').value = data.bloodwashedredcellid;
  document.getElementById('bloodwashedredcelldatetime').value = getDMYHM(data.bloodwashedredcelldatetime);
  document.getElementById('diagnosis').value = data.diagnosis;
  document.getElementById('diagnosisdetail').value = data.diagnosisdetail; // document.getElementById('unit').value = data.unit;

  document.getElementById('cc').value = data.cc;
  document.getElementById('qty').value = data.qty;
  document.getElementById('hb').value = data.hb;
  document.getElementById('hct').value = data.hct;
  document.getElementById('plt').value = data.plt;
  document.getElementById('rbc').value = data.rbc;
  document.getElementById('mcv').value = data.mcv;
  document.getElementById('wbc').value = data.wbc;
  document.getElementById('usercreate').value = data.usercreate;
  document.getElementById('remark').value = data.remark; // Select Value

  setDataModalSelectValue('unitofficeid', data.unitofficeid, data.unitofficename);
  setDataModalSelectValue('bloodgroupid', data.bloodgroupid, data.bloodgroupname);
  setDataModalSelectValue('rhid', data.rhid, data.rhname3);
}

function setDataModalSelectValue() {
  var elem = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var itemid = arguments.length > 1 ? arguments[1] : undefined;
  var itemtext = arguments.length > 2 ? arguments[2] : undefined;
  var select = $('#' + elem);
  option = new Option(itemtext, itemid, true, true);
  select.append(option).trigger('change');
}

$("#hb_before").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("hb_before").value;

    var _float = parseFloat(integer) || 0;

    var decimal = _float.toFixed(1);

    document.getElementById("hb_before").value = decimal;
  }
});
$("#hb_after").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("hb_after").value;

    var _float2 = parseFloat(integer) || 0;

    var decimal = _float2.toFixed(1);

    document.getElementById("hb_after").value = decimal;
  }
});
$("#hct_before").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("hct_before").value;

    var _float3 = parseFloat(integer) || 0;

    var decimal = _float3.toFixed(1);

    document.getElementById("hct_before").value = decimal;
  }
});
$("#hct_after").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("hct_after").value;

    var _float4 = parseFloat(integer) || 0;

    var decimal = _float4.toFixed(1);

    document.getElementById("hct_after").value = decimal;
  }
});
$("#rbc_before").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("rbc_before").value;

    var _float5 = parseFloat(integer) || 0;

    var decimal = _float5.toFixed(2);

    document.getElementById("rbc_before").value = decimal;
  }
});
$("#rbc_after").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("rbc_after").value;

    var _float6 = parseFloat(integer) || 0;

    var decimal = _float6.toFixed(2);

    document.getElementById("rbc_after").value = decimal;
  }
});
$("#mcv_before").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("mcv_before").value;

    var _float7 = parseFloat(integer) || 0;

    var decimal = _float7.toFixed(1);

    document.getElementById("mcv_before").value = decimal;
  }
});
$("#mcv_after").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("mcv_after").value;

    var _float8 = parseFloat(integer) || 0;

    var decimal = _float8.toFixed(1);

    document.getElementById("mcv_after").value = decimal;
  }
});
$("#wbc_before").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("wbc_before").value;

    var _float9 = parseFloat(integer) || 0;

    var decimal = _float9.toFixed(2);

    document.getElementById("wbc_before").value = decimal;
  }
});
$("#wbc_after").keydown(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;

  if (keycode == '13') {
    var integer = document.getElementById("wbc_after").value;

    var _float10 = parseFloat(integer) || 0;

    var decimal = _float10.toFixed(2);

    document.getElementById("wbc_after").value = decimal;
  }
});

function setColor(e, status) {
  if (status) {
    document.getElementById(e).style.color = "#000";
  } else {
    document.getElementById(e).style.color = "#ff0000";
  }
}

function chkbox1() {
  var checkBox = document.getElementById("checkbox1");
  var user = document.getElementById("name_login").innerHTML;
  var d = new Date(),
      dformat = [d.getDate(), d.getMonth() + 1, d.getFullYear()].join('/') + ' ' + [d.getHours(), d.getMinutes(), d.getSeconds()].join(':');

  if (checkBox.checked == true) {
    document.getElementById("user_send_wash").value = user;
    document.getElementById("user_send_wash_date").value = dformat;
  } else {
    document.getElementById("user_send_wash").value = "";
    document.getElementById("user_send_wash_date").value = "";
  }
}

function chkbox2() {
  var checkBox = document.getElementById("checkbox2");
  var user = document.getElementById("name_login").innerHTML;
  var d = new Date(),
      dformat = [d.getDate(), d.getMonth() + 1, d.getFullYear()].join('/') + ' ' + [d.getHours(), d.getMinutes(), d.getSeconds()].join(':');

  if (checkBox.checked == true) {
    document.getElementById("user_receive_wash").value = user;
    document.getElementById("user_receive_wash_date").value = dformat;
  } else {
    document.getElementById("user_receive_wash").value = "";
    document.getElementById("user_receive_wash_date").value = "";
  }
}

function chkbox3() {
  var checkBox = document.getElementById("checkbox3");
  var user = document.getElementById("name_login").innerHTML;
  var d = new Date(),
      dformat = [d.getDate(), d.getMonth() + 1, d.getFullYear()].join('/') + ' ' + [d.getHours(), d.getMinutes(), d.getSeconds()].join(':');

  if (checkBox.checked == true) {
    document.getElementById("user_done_wash").value = user;
    document.getElementById("user_done_wash_date").value = dformat;
  } else {
    document.getElementById("user_done_wash").value = "";
    document.getElementById("user_done_wash_date").value = "";
  }
}

function chkbox4() {
  var checkBox = document.getElementById("checkbox4");
  var user = document.getElementById("name_login").innerHTML;
  var d = new Date(),
      dformat = [d.getDate(), d.getMonth() + 1, d.getFullYear()].join('/') + ' ' + [d.getHours(), d.getMinutes(), d.getSeconds()].join(':');

  if (checkBox.checked == true) {
    document.getElementById("user_send_washed").value = user;
    document.getElementById("user_send_washed_date").value = dformat;
  } else {
    document.getElementById("user_send_washed").value = "";
    document.getElementById("user_send_washed_date").value = "";
  }
}

function chkbox5() {
  var checkBox = document.getElementById("checkbox5");
  var user = document.getElementById("name_login").innerHTML;
  var d = new Date(),
      dformat = [d.getDate(), d.getMonth() + 1, d.getFullYear()].join('/') + ' ' + [d.getHours(), d.getMinutes(), d.getSeconds()].join(':');

  if (checkBox.checked == true) {
    document.getElementById("user_get_bag_washed").value = user;
    document.getElementById("user_get_bag_washed_date").value = dformat;
  } else {
    document.getElementById("user_get_bag_washed").value = "";
    document.getElementById("user_get_bag_washed_date").value = "";
  }
}

function findTableBagNumber() {
  var number = $("#bgnum").val();
  var rows = document.getElementById("list_wash_blood_modal").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);

    if (item.bag_number == number) {
      row.children[1].children[0].setAttribute('checked', 'checked');
      showdatacount(i - 1);
      chActiveReq_2(i - 1);
      setCKwash(1, true);
    }
  }

  $("#bgnum").val("");
  document.getElementById('bgnum').focus();
}

function scanNumber(self) {
  self.value = numnerPoint(self.value);
}

function uncheckBox(v) {
  if (v.previous) {
    v.checked = false;
  }

  v.previous = v.checked;
}