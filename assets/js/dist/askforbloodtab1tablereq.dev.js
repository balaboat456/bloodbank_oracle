"use strict";

var countReq = 0;
var dataReq = [];

function loadTableReq() {
  spinnershow();
  removeRowTable("list_request_blood_modal_2");
  removeRowTable("list_request_blood_modal_3");
  removeRowTable("list_request_blood_modal_4");
  var hn = document.getElementById("hn").value;
  var fromdate = document.getElementById("fromdate").value;
  var todate = document.getElementById("todate").value;
  $.ajax({
    url: 'data/requestblood/requestblooddetail.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 0;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      var body = document.getElementById("list_request_blood_modal").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      countReq = obj.length;
      var event_data = '';
      $.each(obj, function (index, value) {
        console.log(value.ispaybloodstatus);
        console.log(value.requestbloodstatusid);

        if (value.bloodnotificationtypeid == 2) {
          value.requestbloodstatusname = 'จ่ายเลือดด่วน O Adsol';
        } else if (value.ispaybloodstatus == 1 && !(value.requestbloodstatusid == 3 || value.requestbloodstatusid == 4)) value.requestbloodstatusname = 'จ่ายเลือดแล้ว';

        var color = '#000';
        if (value.requestbloodstatusid == 3 || value.requestbloodstatusid == 4) color = 'red';
        event_data += '';
        event_data += '<tr id="trbloodReq' + index + '" onClick="chActiveReq(' + index + ',this,' + value.requestbloodstatusid + ')" >';
        event_data += '<td><font color="' + color + '">' + getDMY(value.requestblooddate) + ' ' + value.requestbloodtime + '</font></td>';
        event_data += '<td><font color="' + color + '">' + value.unitofficename1 + '</font></td>';
        event_data += '<td ><font color="' + color + '">' + value.doctorname + '</font></td>';
        event_data += '<td><font color="' + color + '">' + value.bloodnotificationtypename + '</font></td>';
        event_data += '<td><font color="' + color + '">' + getStatusBloodReq(value) + '</font></td>';
        event_data += '<td>';

        if (value.requestbloodstatusid == 4 || value.requestbloodstatusid == 3) {
          event_data += '<button type="button" onclick="selectTableReq(this); setEnableDisable(true);"  class="btn btn-danger m-l-5">';
          event_data += '<span class="btn-label"><i class="fa fa-search"></i></span>ดูข้อมูล';
          event_data += '</button>&nbsp;&nbsp;';
        } else {
          event_data += '<button type="button" onclick="selectTableReq(this)"  class="btn btn-success m-l-5">';
          event_data += '<span class="btn-label"><i class="fa fa-search"></i></span>ดูข้อมูล';
          event_data += '</button>&nbsp;&nbsp;';
        }

        event_data += '</td>';
        event_data += '<td  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '</tr>';
      });
      $("#list_request_blood_modal").append(event_data);
      $('#trbloodReq0').trigger('click');
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
    } else if (data.ispaybloodstatus == 1) {
      status = 'จ่ายเลือดแล้ว';
    } else if (data.isreadybloodstatus == 1) {
      status = 'รอจ่ายเลือด';
    } else if (data.isconfirmbloodgroupqueue == 1) {
      status = 'รอยืนยันการใช้เลือด';
    } else if (data.iscrossmatch == 1) {
      status = 'รอยืนยันผลเลือด';
    }
  } else if (data.requestbloodstatusid == 3) {
    status = 'ปฏิเสธสิ่งส่งตรวจ';
  } else if (data.requestbloodstatusid == 4) {
    status = 'ยกเลิก';
  }

  return status;
}

function chActiveReq(id, self, status) {
  for (i = 0; i < countReq; i++) {
    document.getElementById("trbloodReq" + i).style.background = "#FFF";
  }

  document.getElementById("trbloodReq" + id).style.background = "#b7e4eb";
  var item = JSON.parse(self.cells[6].innerHTML);
  dataReq = item;
  removeRowTable("list_request_blood_modal_2");
  addListRequestBlood_2(item.item);
  addListRequestBlood_3(item.requestbloodid);
}

function addListRequestBlood_2(data) {
  var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
  var event_data = '';
  $.each(obj, function (index, value) {
    var arr = [value];
    event_data += '<tr >';
    event_data += '<td class="td-table">' + value.bloodstocktypename2 + '</td>';
    event_data += '<td class="td-table">' + value.requestblooditemqty + '</td>';
    event_data += '</tr>';
  });
  $("#list_request_blood_modal_2").append(event_data);
}

var countReq3 = 0;

function addListRequestBlood_3() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var body = document.getElementById("list_request_blood_modal_4").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  $.ajax({
    url: 'data/requestblood/requestblooddetail-payblood.php?id=' + id,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_request_blood_modal_3").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      countReq3 = obj.length;
      var event_data = '';
      $.each(obj, function (index, value) {
        event_data += '';
        event_data += '<tr id="trbloodReq3' + index + '" onClick="chActiveReq3(' + index + ',this)" >';
        event_data += '<td  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table">' + value.bloodstocktypename2 + '</td>';
        event_data += '<td class="td-table">' + value.qty + '</td>';
        event_data += '</tr>';
      });
      $("#list_request_blood_modal_3").append(event_data); // document.getElementById("trbloodReq30").click();
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function chActiveReq3(id, self) {
  for (i = 0; i < countReq3; i++) {
    document.getElementById("trbloodReq3" + i).style.background = "#FFF";
  }

  document.getElementById("trbloodReq3" + id).style.background = "#b7e4eb";
  var item = JSON.parse(self.cells[0].innerHTML);
  removeRowTable("list_request_blood_modal_4");
  addListRequestBlood_4(item.requestbloodid, item.bloodtype);
}

function addListRequestBlood_4() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var bloodtype = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  $.ajax({
    url: 'data/requestblood/requestblooddetail-payblood-item.php?id=' + id + '&bloodtype=' + bloodtype,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      var event_data = '';
      $.each(obj, function (index, value) {
        event_data += '';
        event_data += '<tr >';
        event_data += '<td class="td-table">' + value.bag_number + '</td>';
        event_data += '</tr>';
      });
      $("#list_request_blood_modal_4").append(event_data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function loadTableBloodPayStock() {
  $.ajax({
    url: 'data/blood/blood-stock-pay-askforblood.php',
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
        event_data += '<input type="checkbox"  onchange="setBloodOutCheck(this)" >';
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
      $("#list_table_json_out").append(event_data);
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
  row.cells[0].innerHTML = JSON.stringify(item);
}

function selectTableReq(btn) {
  requestBloodModalClose(); // $("#requestbloodgroupname").val("");
  // $("#requestrhname").val("");
  // $("#requestdat").val("");
  // $("#requestantibodyscreening").val("");
  // $("#requestantibody").html("");

  var data;

  if (btn == 0) {
    // document.getElementById("btnSave").style.visibility = "visible"
    setInsertReq();
    requestBloodLastDate();
    requestBloodRhLast();
  } else {
    // document.getElementById("btnSave").style.visibility = "hidden"
    var row = btn.parentNode.parentNode;
    data = JSON.parse(row.cells[6].innerHTML);
    setTableReq(data);
  }

  requestBloodRhLast();
}

function loadDataReqSinger(id) {
  spinnershow();
  var hn = document.getElementById("hn").value;
  $.ajax({
    url: 'data/requestblood/requestblooddetail.php?id=' + id + "&hn=" + hn,
    dataType: 'json',
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      setTableReq(obj[0]);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function setReOrder() {
  setTableReq(dataReq, true, 1);
  $('#requestbloodid').val('');
  $('#requestbloodcode').val(''); // $('#usedblooddatefrom').val('');
  // $('#usedblooddateto').val('');
  // $('#durgicaldate').val('');
  // $('#nurseid').val(null).empty();
  // $('#blood_driller_id').val(null).empty();

  $('#requestbloodmodal').modal('hide');
  document.getElementById("tab1cencel").style.display = "none";
}

function setInsertReq() {
  $('#requestbloodid').val('');
  $('#requestbloodcode').val('');
  $('#durgicaldate').val('');
  $('#usedblooddatefrom').val('');
  $('#usedblooddateto').val('');
  $('#diagnosis').val('');
  $('#diagnosisdetail').val('');
  document.getElementById("bloodsampletube1").checked = false;
  document.getElementById("bloodsampletube2").checked = false;
  document.getElementById("forchildren").checked = false;
  document.getElementById("pregnant1").checked = false;
  document.getElementById("pregnant2").checked = false;
  $('#pregnantdate').val('');
  $('#pregnantqty').val('');
  document.getElementById("bloodtransfusion1").checked = false;
  document.getElementById("bloodtransfusion2").checked = false;
  $('#bloodtransfusionlast').val('');
  document.getElementById("plasmaexchange").checked = false;
  document.getElementById("screenforplateletantibody").checked = false;
  document.getElementById("hlacrossmatchsingledonorplatelet").checked = false;
  document.getElementById("washedredbloodcell").checked = false;
  document.getElementById("light").checked = false; // setDataModalSelectValue('requestunit',null,'');
  // setDataModalSelectValue('usedunit',null,'');
  // setDataModalSelectValue('bloodnotificationtypeid',null,'');
  // setDataModalSelectValue('nurseid',null,'');
  // setDataModalSelectValue('doctorid',null,'');
  // setDataModalSelectValue('blood_driller_id',null,'');
  // setDataModalSelectValue('diseasegroupid',null,'');
  // $('#requestunit').val(null).empty();

  if (localStorage.getItem("pointwardid", '')) setDataModalSelectValue('requestunit', localStorage.getItem("pointwardid", ''), localStorage.getItem("pointwardname", ''));
  $('#usedunit').val(null).empty();
  $('#bloodnotificationtypeid').val(null).empty();
  $('#nurseid').val(null).empty(); // $('#doctorid').val(null).empty();

  $('#blood_driller_id').val(null).empty();
  $('#blood_certifier_id').val(null).empty();
  $('#diseasegroupid').val(null).empty();
  $('#diagnosisid').val(null).empty(); // setDataModalSelectValue('bloodgroupid',null,'');
  // setDataModalSelectValue('rhid',null,'');

  $("#bloodgroupid").val('');
  $("#bloodgroupname").val('');
  $("#rhid").val('');
  $("#rhname").val('');
  document.getElementById("btnAddRowReqTab1").disabled = false;
  loadTableAllergicToBlood([]);
  loadTableReturnBlood([]);
  document.getElementById("tab1cencel").style.display = "none";
  var body = document.getElementById("list_table_tab1").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }
}

function setTableReq(data) {
  var reorder = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  var sta_order = arguments.length > 2 ? arguments[2] : undefined;
  console.log(data);
  $('#requestbloodid').val(data.requestbloodid);
  $('#requestbloodstatusid').val(data.requestbloodstatusid);
  $('#requestbloodcode').val(data.requestbloodcode);
  $('#durgicaldate').val(getDMY(data.durgicaldate));
  $('#usedblooddatefrom').val(getDMY(data.usedblooddatefrom));
  $('#usedblooddateto').val(getDMY(data.usedblooddateto));
  $('#diagnosis').val(data.diagnosis);
  $('#diagnosisdetail').val(data.diagnosisdetail);
  document.getElementById("bloodsampletube1").checked = data.bloodsampletube == 1 ? 1 : '';
  document.getElementById("bloodsampletube2").checked = data.bloodsampletube == 2 ? 1 : '';
  document.getElementById("forchildren").checked = data.forchildren;
  document.getElementById("pregnant1").checked = data.pregnant == 1 ? 1 : '';
  document.getElementById("pregnant2").checked = data.pregnant == 2 ? 1 : '';
  $('#pregnantdate').val(getDMY(data.pregnantdate));
  $('#pregnantqty').val(data.pregnantqty);
  document.getElementById("bloodtransfusion1").checked = data.bloodtransfusion == 1 ? 1 : '';
  document.getElementById("bloodtransfusion2").checked = data.bloodtransfusion == 2 ? 1 : '';
  $('#bloodtransfusionlast').val(getDMY(data.bloodtransfusionlast));
  document.getElementById("plasmaexchange").checked = data.plasmaexchange;
  document.getElementById("screenforplateletantibody").checked = data.screenforplateletantibody;
  document.getElementById("hlacrossmatchsingledonorplatelet").checked = data.hlacrossmatchsingledonorplatelet;
  document.getElementById("washedredbloodcell").checked = data.washedredbloodcell;
  document.getElementById("light").checked = data.light; // document.getElementById("forchildren").disabled = (!(data.requestunit == 191));

  setDataModalSelectValue('requestunit', data.requestunit, data.unitofficename1);
  setDataModalSelectValue('usedunit', data.usedunit, data.unitofficename2);
  setDataModalSelectValue('bloodnotificationtypeid', data.bloodnotificationtypeid, data.bloodnotificationtypename);
  setDataModalSelectValue('nurseid', data.nurseid, data.nursename);
  setDataModalSelectValue('doctorid', data.doctorid, data.doctorname);
  setDataModalSelectValue('blood_driller_id', data.blood_driller_id, data.stafffullname);
  setDataModalSelectValue('blood_certifier_id', data.blood_certifier_id, data.blood_certifier_name);
  setDataModalSelectValue('diseasegroupid', data.diseasegroupid, data.diseasegroupname);
  setDataModalSelectValue('diagnosisid', data.diagnosisid, data.diagnosisdetail + '|' + data.diagnosis);
  setBloodDrillerIdStar(data.bloodsampletube == 1);
  setBloodCertifierLableStar(data.bloodsampletube == 1);
  document.getElementById('requestantibody').innerHTML = data.group_antibody;
  $("#group_antibody").val(data.group_antibody); // setDataModalSelectValue('bloodgroupid',data.bloodgroupid,data.bloodgroupname);
  // setDataModalSelectValue('rhid',data.rhid,data.rhname3);

  $("#bloodgroupid").val(data.bloodgroupid);
  $("#bloodgroupname").val(data.bloodgroupname);
  $("#rhid").val(data.rhid);
  $("#rhname").val(data.rhname3);
  setOpenBloodBlank(data.bloodnotificationtypeid);
  document.getElementById("btnReject").style.visibility = data.requestbloodstatusid == 1 || data.requestbloodstatusid == 2 && reject_permission ? "visible" : 'hidden';

  if (reorder) {
    loadTableAllergicToBlood([]);
    loadTableReturnBlood([]); // document.getElementById("btnSave").style.visibility = "visible";
  } else {
    loadTableAllergicToBlood(data.requestbloodcrossmacth);
    loadTableReturnBlood(data.requestbloodcrossmacth);
  }

  if (data.requestbloodstatusid == '3' || data.requestbloodstatusid == '4') {
    openCancel(data);
  } else {
    document.getElementById("tab1cencel").style.display = "none";
  }

  var body = document.getElementById("list_table_tab1").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  $.each(data.item, function (index, value) {
    if (sta_order = 1) {
      addRowReq2(value);
    } else {
      addRowReq(value);
    }
  });
}

function setDataModalSelectValue() {
  var elem = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var itemid = arguments.length > 1 ? arguments[1] : undefined;
  var itemtext = arguments.length > 2 ? arguments[2] : undefined;
  var select = $('#' + elem);
  option = new Option(itemtext, itemid, true, true);
  select.append(option).trigger('change');
}

function getTableTypeOfRequestBlood() {
  var rows = document.getElementById("list_table_tab1").rows;

  for (var i = 1; i < rows.length; i++) {
    if (rows[i].cells[2].children[0].value == 'LPRC' || rows[i].cells[2].children[0].value == 'LPRC-O' || rows[i].cells[2].children[0].value == 'LDPRC' || rows[i].cells[2].children[0].value == 'PRC' || rows[i].cells[2].children[0].value == 'SDR' || rows[i].cells[2].children[0].value == 'LDSDR') rows[i].style.backgroundColor = "#F39";else if (rows[i].cells[2].children[0].value == 'PC' || rows[i].cells[2].children[0].value == 'LPPC' || rows[i].cells[2].children[0].value == 'SDP' || rows[i].cells[2].children[0].value == 'SDP_PAS' || rows[i].cells[2].children[0].value == 'LDPPC' || rows[i].cells[2].children[0].value == 'LDPPC_PAS' || rows[i].cells[2].children[0].value == 'LPPC_PAS') rows[i].style.backgroundColor = "#FFFF00";else if (rows[i].cells[2].children[0].value == 'FFP' || rows[i].cells[2].children[0].value == 'CRP') rows[i].style.backgroundColor = "#6C0";else if (rows[i].cells[2].children[0].value == 'CRYO' || rows[i].cells[2].children[0].value == 'HTFDC') rows[i].style.backgroundColor = "#00FFFF";else rows[i].style.backgroundColor = "#FFF";
  }
}

function setEnableDisable() {
  var status = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  document.getElementById('requestunit').disabled = status;
  document.getElementById('usedunit').disabled = status;
  document.getElementById('bloodnotificationtypeid').disabled = status;
  document.getElementById('usedblooddatefrom').disabled = status;
  document.getElementById('usedblooddateto').disabled = status;
  document.getElementById('durgicaldate').disabled = status;
  document.getElementById('nurseid').disabled = status;
  document.getElementById('doctorid').disabled = status;
  document.getElementById('blood_driller_id').disabled = status;
  document.getElementById('blood_certifier_id').disabled = status;
  document.getElementById('diseasegroupid').disabled = status;
  document.getElementById('diagnosisid').disabled = status;
  document.getElementById('diagnosisdetail').disabled = status;
  document.getElementById('bloodsampletube1').disabled = status;
  document.getElementById('bloodsampletube2').disabled = status;
  document.getElementById('pregnant1').disabled = status;
  document.getElementById('pregnant2').disabled = status;
  document.getElementById('pregnantdate').disabled = status;
  document.getElementById('pregnantqty').disabled = status;
  document.getElementById('bloodtransfusion1').disabled = status;
  document.getElementById('bloodtransfusion2').disabled = status;
  document.getElementById('plasmaexchange').disabled = status;
  document.getElementById('screenforplateletantibody').disabled = status;
  document.getElementById('hlacrossmatchsingledonorplatelet').disabled = status;
  document.getElementById('washedredbloodcell').disabled = status;
  document.getElementById('light').disabled = status;
  document.getElementById('btnAddRowReqTab1').disabled = status; // document.getElementById("btnTab2").style.display = (status)?"none":"block";
  // document.getElementById("btnTab3").style.display = (status)?"none":"block";
}

function findTableO1HN(number) {
  var rows = document.getElementById("list_table_json_out").rows;

  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var item = JSON.parse(row.cells[0].innerHTML);

    if (item[0].bag_number == number) {
      row.cells[1].children[0].checked = true;
      item[0].ischeckout = true;
      item[0].bloodstockpaytypeid = $("#bloodstockpaytypeid").val();
      row.children[0].innerHTML = JSON.stringify(item);
    }
  }

  $("#findbagnumber_o1").val("");
  document.getElementById('findbagnumber_o1').focus();
}

function addRowReq2() {
  var im = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var bloodnotificationtypeid2 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  // ตรวจสอบว่ากรอกข้อมูลหรือยัง
  if (bloodnotificationtypeid2 != 2) if (checkEntryText()) {
    return false;
  }

  if (checkDateRequestBlood()) {
    var callback = function callback(inputValue) {};

    mgsError("ขออภัยค่ะ!", "กรุณาระบุวันที่ใช้เกล็ดเลือด", callback);
    return false;
  }

  var arr;
  var bloodnotificationtypeid = $("#bloodnotificationtypeid").val();

  if (im.length != 0) {
    arr = [{
      requestblooditemid: im.requestblooditemid,
      bloodstocktypeid: im.bloodstocktypeid,
      requestblooditemqty: im.requestblooditemqty,
      requestblooditemcc: im.requestblooditemcc,
      requestblooditemdate: getDMY(im.requestblooditemdate),
      requestbloodid: im.requestbloodid
    }];
  } else {
    arr = [{
      requestblooditemid: '',
      bloodstocktypeid: bloodnotificationtypeid2 == 2 ? 'LPRC-O' : '',
      requestblooditemqty: '',
      requestblooditemcc: '',
      requestblooditemdate: '',
      requestbloodid: ''
    }];
  }

  var typestatus = "";

  if (checkTypeArray(arr[0].bloodstocktypeid) || im.length == 0) {
    typestatus = 'hidden';
  }

  var disabled = '';
  var readonlyState = false;
  var disabled2 = '';
  var event_data = '';
  event_data += '<tr>';
  event_data += '<td  style="display:none;" >';
  event_data += JSON.stringify(arr);
  event_data += '</td>';
  event_data += '<td>' + '1' + '</td>';
  event_data += '<td>';
  event_data += '<select ' + disabled2 + ' required  id="bloodstocktypeid' + countSelectBloodStocktypeid + '" name="bloodstocktypeid' + countSelectBloodStocktypeid + '"  style="width:100%" ';
  event_data += 'value="" class="form-control selectbloodstocktypeid" onchange="setRequestBloodBloodStockType(this)"   > ';
  event_data += '<option  value=""></option>';
  $.each(bloodStockTypeArr, function (ind, v) {
    if (bloodnotificationtypeid == 2 || bloodnotificationtypeid2 == 2) {
      if (v.bloodstocktypeid == 'LPRC-O') event_data += '<option ' + (arr[0].bloodstocktypeid == v.bloodstocktypeid ? 'selected' : '') + '   value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>';
    } else {
      if (v.bloodstocktypeid != 'LPRC-O') event_data += '<option ' + (arr[0].bloodstocktypeid == v.bloodstocktypeid ? 'selected' : '') + '   value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>';
    }
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input ' + disabled2 + ' ' + (readonlyState ? 'readonly' : '') + '  required  type="number" autocomplete="off" id="requestblooditemqty' + countSelectBloodStocktypeid + '" name="requestblooditemqty' + countSelectBloodStocktypeid + '"  ';
  event_data += 'class="form-control" value="' + arr[0].requestblooditemqty + '" ';
  event_data += ' style="width:100%" onkeyup="setRequestBloodUnit(this)" >';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input ' + disabled2 + ' ' + (parseInt(dtataArray.patientage) > 15 || readonlyState ? 'readonly' : '') + ' realonly    type="number" autocomplete="off" name="requestblooditemcc"  ';
  event_data += 'class="form-control" value="' + arr[0].requestblooditemcc + '" ';
  event_data += ' style="width:100%" onkeyup="setRequestBloodCC(this)" >';
  event_data += '</td>';
  event_data += '<td>';
  event_data += '<input ' + disabled2 + ' ' + typestatus + ' type="text" autocomplete="off" name="requestblooditemdate" ';
  event_data += 'class="form-control date" value="' + arr[0].requestblooditemdate + '" ';
  event_data += ' style="width:100%" onchange="setRequestBloodDate(this)" >';
  event_data += '</td>';
  event_data += '<td  >';
  event_data += '<button ' + disabled2 + ' ' + disabled + ' type="button" onclick="deleteRowReq(this,`list_table_tab1`)" class="btn btn-danger m-l-5">';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_tab1").append(event_data);
  setNoReq('list_table_tab1');
  dateBE('.date');
  getTableTypeOfRequestBlood();
  $("#bloodstocktypeid" + countSelectBloodStocktypeid).select2({
    width: "100%",
    theme: "bootstrap"
  });
  countSelectBloodStocktypeid++;
  $("#div_list_table_tab1").scrollTop($("#list_table_tab1")[0].scrollHeight);
}