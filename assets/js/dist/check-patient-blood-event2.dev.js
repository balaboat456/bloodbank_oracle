"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var crosscount = 0;
var crossold = 0;
var bloodexp = '0000-00-00';

function addRowBlood() {
  var im = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  // console.log(findCrossMatchItemQty(document.getElementById('list_table_tab2_2')));
  var confirmbloodgroup_result = $("#confirmbloodgroup").val();
  var bloodsampletube = $("#bloodsampletube").val();
  var isconfirmbloodgroupqueue = $("#isconfirmbloodgroupqueue").val();

  if (!im.crossmacthstatusid) {
    if (im.bloodsampletube == 2) {
      im.crossmacthstatusid = 2;
    }

    if (im.bloodtype == "CRYO") {
      if (isconfirmbloodgroupqueue == 1 || bloodsampletube == 2) {
        im.crossmacthstatusid = 2;
      } else {
        im.crossmacthstatusid = 1;
      }

      im.crossmacthresultid = 1;
    }
    /*
    if(im.bloodgroup != confirmbloodgroup_result && im.bloodtype != "CRYO")
    {
        if(bloodsampletube == 2)
        {
            im.crossmacthstatusid = 2;
        }else
        {
            im.crossmacthstatusid = 1;
        }
        
    }else if(im.bloodsampletube == 2)
    {
        im.crossmacthstatusid = 2;
    }else
    {
        im.crossmacthstatusid = 1;
    }
    */

  }

  if (im.requestbloodcrossmacthremark == undefined) {
    im.requestbloodcrossmacthremark = '';
  }

  if (im.ispayblood == undefined) {
    im.ispayblood = '';
  }

  if (im.payblooddate == undefined) {
    im.payblooddate = '';
  }

  if (im.paybloodtime == undefined) {
    im.paybloodtime = '';
  }

  if (im.payuser == undefined) {
    im.payuser = '';
  } // if(
  //     im.bloodtype == 'CRP' ||
  //     im.bloodtype == 'FFP' ||
  //     im.bloodtype == 'LDPPC' ||
  //     im.bloodtype == 'LPPC' ||
  //     im.bloodtype == 'LPPC_PAS' ||
  //     im.bloodtype == 'PC' ||
  //     im.bloodtype == 'SDP' ||
  //     im.bloodtype == 'SDP_PAS'
  //     )
  // {
  //     var crossmacthresultid = "";
  //     if(confirmbloodgroup_result == "A")
  //     {
  //         crossmacthresultid = "4";
  //     }else if(confirmbloodgroup_result == "B")
  //     {
  //         crossmacthresultid = "5";
  //     }else if(confirmbloodgroup_result == "O")
  //     {
  //         crossmacthresultid = "6";
  //     }else if(confirmbloodgroup_result == "AB")
  //     {   
  //         crossmacthresultid = "7";
  //     }
  //     if(!im.crossmacthresultid || im.crossmacthresultid == 0)
  //     im.crossmacthresultid = crossmacthresultid;
  // }


  if (im.receivingtypeid == 2 && im.patienthn == $("#hn").val()) {}

  var event_data = '';
  event_data += '<tr style="background-color:' + getColor(im.crossmacthstatusid) + '" >';
  event_data += '<td class="td-table">' + '1' + '</td>'; // event_data += '<td class="td-table">';
  // event_data += '<input type="checkbox" '+((im.requestbloodcrossmacthck == '1')?'checked':'')+' >';
  // event_data += '</td>';

  event_data += '<td class="td-table">' + im.bag_number + '</td>';
  event_data += '<td class="td-table">' + im.sub + '</td>';
  event_data += '<td class="td-table">';
  event_data += '<input type="checkbox" ' + (im.islight == '1' ? 'checked' : '') + ' >';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<input type="checkbox" ' + (im.hlamatch == '1' ? 'checked' : '') + ' >';
  event_data += '</td>';
  event_data += '<td class="td-table">' + im.bloodgroup + '</td>';
  event_data += '<td class="td-table">' + im.rhcode + '</td>';
  event_data += '<td class="td-table">' + im.bloodtype + '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataBloodGroupSerumArr, function (ind, v) {
    event_data += '<option ' + (im.ctt_rt == v.bloodgroupserumid ? 'selected' : '') + '  value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataBloodGroupSerumArr, function (ind, v) {
    event_data += '<option ' + (im.ctt_37c == v.bloodgroupserumid ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataBloodGroupSerumArr, function (ind, v) {
    event_data += '<option ' + (im.ctt_iat == v.bloodgroupserumid ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataBloodGroupSerumArr, function (ind, v) {
    event_data += '<option ' + (im.ctt_ccc == v.bloodgroupserumid ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataBloodGroupSerumArr, function (ind, v) {
    event_data += '<option ' + (im.cat == v.bloodgroupserumid ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<input type="checkbox" ' + (im.rou == '1' ? 'checked' : '') + ' >';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control" onchange="setStatusCrossmacth(this)"  > ';
  event_data += '<option  value=""></option>';
  $.each(dataResult, function (ind, v) {
    event_data += '<option ' + (im.crossmacthresultid == v.crossmacthresultid ? 'selected' : '') + '  value="' + v.crossmacthresultid + '">' + v.crossmacthresultname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select  onchange="setColor(this)"  ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataCrossMatchStatus, function (ind, v) {
    event_data += '<option ' + (im.crossmacthstatusid == v.crossmacthstatusid ? 'selected' : '') + ' value="' + v.crossmacthstatusid + '">' + v.crossmacthstatusname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"  onchange="setStatusCrossmacthDoctor(this)"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataDoctor, function (ind, v) {
    event_data += '<option ' + (im.doctorid == v.doctorid ? 'selected' : '') + '  value="' + v.doctorid + '">' + v.doctorname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select    ';
  event_data += 'value="" class="form-control"   > ';
  event_data += '<option  value=""></option>';
  $.each(dataPreparation, function (ind, v) {
    event_data += '<option ' + (im.isbloodpreparation == v.id ? 'selected' : session_staffid == v.id ? 'selected' : '') + '  value="' + v.id + '">' + v.name + ' ' + v.surname + '</option>';
  });
  event_data += ' </select>';
  event_data += '</td>';
  event_data += '<td>' + (im.requestbloodcrossmacthdatetime != undefined ? im.requestbloodcrossmacthdatetime : '') + '</td>';
  event_data += '<td class="td-table">';
  event_data += '<input type="text" class="form-control" value="' + im.requestbloodcrossmacthremark + '"  >';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:40px">';
  event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="display:none;">';
  event_data += '<input type="text" class="form-control" value="' + im.ispayblood + '"  >';
  event_data += '<input type="text" class="form-control" value="' + im.payblooddate + '"  >';
  event_data += '<input type="text" class="form-control" value="' + im.paybloodtime + '"  >';
  event_data += '<input type="text" class="form-control" value="' + im.payuser + '"  >';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_tab2_2").append(event_data);
  setNo1_2('list_table_tab2_2');
  $("#div_list_table_tab2_2").scrollTop($("#list_table_tab2_2")[0].scrollHeight);
}

function findCrossMatchItemQty(table) {
  var status = false;
  var r = 2;
  console.log("********");
  var count = 0;

  while (row = table.rows[r++]) {
    if (row.children[7].innerHTML == bloodstocktypecode) count++;
  }

  console.log("********" + count);
  return status;
}

function findCrossMatchItemBagnumber(table) {
  var bag_number = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
  var sub = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "";
  var status = false;
  var r = 2;
  console.log("********");
  var count = 0;

  while (row = table.rows[r++]) {
    if (row.children[1].innerHTML == bloodstocktypecode) count++;
  }

  console.log("********" + count);
  return status;
}

function bagNumberFormat() {
  var bag_number = $('#bag_number').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#bag_number').val(bag_number_new);
}

function scanBlood() {
  var bloodtype = bloodstocktypecode;

  if (bloodtype == '') {
    var myFunction = function myFunction() {
      var _swal;

      swal((_swal = {
        title: "กรุณาเลือก\n TYPE OF REQUEST",
        type: "warning",
        showCloseButton: false,
        showCancelButton: false,
        // dangerMode: true,
        confirmButtonClass: "btn-success"
      }, _defineProperty(_swal, "confirmButtonClass", ""), _defineProperty(_swal, "confirmButtonText", "ตกลง"), _defineProperty(_swal, "closeOnConfirm", true), _swal), function (inputValue) {
        if (inputValue) {}
      });
    };

    setTimeout(myFunction, 500);
  } else {
    document.getElementById('bag_number').value = document.getElementById('bag_number').value.trim();
    var bag_number = document.getElementById('bag_number').value;

    if (bag_number.length > 0) {
      spinnershow();
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/bloodstock/getbagnumber.php?bag_number=' + bag_number + '&bloodtype=' + bloodtype,
        complete: function complete() {
          var delayInMilliseconds = 200;
          setTimeout(function () {
            spinnerhide();
          }, delayInMilliseconds);
        },
        success: function success(data) {
          if (data.data.length > 0) {
            var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
            checkBlood(obj);
          } else {
            var _swal2;

            swal((_swal2 = {
              title: "ไม่พบข้อมูล ",
              type: "warning",
              showCloseButton: false,
              showCancelButton: false,
              // dangerMode: true,
              confirmButtonClass: "btn-success"
            }, _defineProperty(_swal2, "confirmButtonClass", ""), _defineProperty(_swal2, "confirmButtonText", "ตกลง"), _defineProperty(_swal2, "closeOnConfirm", true), _swal2), function (inputValue) {
              if (inputValue) {
                document.getElementById('bag_number').focus;
              }
            });
          }

          document.getElementById('bag_number').value = '';
          document.getElementById('bag_number').focus;
        },
        error: function error(data) {
          console.log('An error occurred.');
          console.log(data);
          document.getElementById('bag_number').value = '';
          document.getElementById('bag_number').focus;
        }
      });
    }
  }
}

function checkBlood(data) {
  var date1 = data.bloodexp.replace(/-/g, '');
  var date2 = bloodexp.replace(/-/g, '');

  if (parseInt(date1) < parseInt(date2)) {
    swal({
      title: "ผลิตภัณฑ์เลือดมีวันหมดอายุอยู่ในช่วงวันที่จอง",
      type: 'warning',
      // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
      showCloseButton: true,
      showCancelButton: true,
      // dangerMode: true,
      cancelButtonClass: "",
      confirmButtonClass: "btn-success",
      confirmButtonText: "ตกลง",
      cancelButtonText: "ยกเลิก",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function (inputValue) {
      if (inputValue) {
        setBloodRare(data);
      }
    });
  } else if ($("#confirmbloodgroup").val() == data.bloodgroup && $("#confirmrhid").val() == data.bloodrh || data.bloodtype == "CRYO") {
    setBloodRare(data);
  } else {
    swal({
      title: "หมู่เลือดของผู้ป่วยกับหมู่เลือดของถุงเลือดไม่ตรงกันต้องการเตรียมเลือดให้ผู้ป่วยหรือไม่",
      type: 'warning',
      // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
      showCloseButton: true,
      showCancelButton: true,
      // dangerMode: true,
      cancelButtonClass: "",
      confirmButtonClass: "btn-success",
      confirmButtonText: "ตกลง",
      cancelButtonText: "ยกเลิก",
      closeOnConfirm: true,
      closeOnCancel: true,
      allowOutsideClick: false
    }, function (inputValue) {
      if (inputValue) {
        setBloodRare(data);
      }
    });
  }
}

function addRowBlood2(data) {
  if ($("#confirmbloodgroup").val() == data.bloodgroup && $("#confirmrhid").val() == data.bloodrh || data.bloodtype == 'CRYO') {
    swal.close();
    setBloodRare(data);
  } else {
    setTimeout(function () {
      swal({
        title: "หมู่เลือดของผู้ป่วยกับหมู่เลือดของถุงเลือดไม่ตรงกันต้องการเตรียมเลือดให้ผู้ป่วยหรือไม่",
        type: 'warning',
        // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
        showCloseButton: true,
        showCancelButton: true,
        // dangerMode: true,
        cancelButtonClass: "",
        confirmButtonClass: "btn-success",
        confirmButtonText: "ตกลง",
        cancelButtonText: "ยกเลิก",
        closeOnConfirm: true,
        closeOnCancel: true,
        allowOutsideClick: false
      }, function (inputValue) {
        if (inputValue) {
          addRowBlood(data);
        }
      });
    }, 1000);
  }
}

function setBloodRare(data) {
  swal.close();

  if (data.receivingtypeid == 2 && data.patienthn != $("#hn").val()) {
    setTimeout(function () {
      swal({
        title: "เลือดถุงนี้เป็นการเบิกเลือดหายากของ HN " + data.patienthn + " ต้องการเตรียมเลือดถุงนี้ให้ผู้ป่วยหรือไม่",
        type: 'warning',
        // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
        showCloseButton: true,
        showCancelButton: true,
        // dangerMode: true,
        cancelButtonClass: "",
        confirmButtonClass: "btn-success",
        confirmButtonText: "ตกลง",
        cancelButtonText: "ยกเลิก",
        closeOnConfirm: true,
        closeOnCancel: true,
        allowOutsideClick: false
      }, function (inputValue) {
        if (inputValue) {
          addRowBlood(data);
        }
      });
    }, 1000);
  } else {
    addRowBlood(data);
  }
}

function setStatusCrossmacth(self) {
  var row = self.parentNode.parentNode;
  var statusid = "0";
  var confirmbloodgroup_result = $("#confirmbloodgroup").val();
  var bloodsampletube = $("#bloodsampletube").val();
  var bloodtype = row.cells[7].innerHTML;
  var bloodgroup = row.cells[5].innerHTML;

  if (self.value == 1 || self.value == 2 || self.value == 3 || self.value == 4 || self.value == 5 || self.value == 6 || self.value == 7) {
    statusid = "1";
  } else if (self.value == 8) {
    statusid = "10";
  }

  if (bloodsampletube == 2) {
    if (self.value == 1) {
      statusid = "2";
    } else if (row.cells[6].innerHTML != confirmbloodgroup_result && row.cells[6].innerHTML != 'CRYO') {
      statusid = "3";
    } else if (self.value == 2 || self.value == 3) {
      statusid = "3";
    }
  }

  if (bloodtype == 'CRP' || bloodtype == 'FFP' || bloodtype == 'LDPPC' || bloodtype == 'LPPC' || bloodtype == 'LPPC_PAS' || bloodtype == 'PC' || bloodtype == 'SDP' || bloodtype == 'SDP_PAS' || bloodtype == 'WB' || bloodtype == 'CRYO' || bloodtype == 'HTFDC') {
    console.log(confirmbloodgroup_result);
    console.log(self.value);
    var bgl = "";

    if (self.value == "4") {
      bgl = "A";
    } else if (self.value == "5") {
      bgl = "B";
    } else if (self.value == "6") {
      bgl = "O";
    } else if (self.value == "7") {
      bgl = "AB";
    }

    if (confirmbloodgroup_result != bgl) {
      statusid = "3";
    } else {
      statusid = "2";
    }
  }

  if (row.cells[15].getElementsByTagName('select')[0].value != 9) {
    row.cells[15].getElementsByTagName('select')[0].value = statusid;
    row.style.backgroundColor = getColor(statusid);
  }
}

function setStatusCrossmacthDoctor(self) {
  var row = self.parentNode.parentNode;
  var statusid = "0";

  if (self.value != 0 || self.value != "") {
    statusid = "2";
    if (crossold == 0) crossold = row.cells[15].getElementsByTagName('select')[0].value;
  } else {
    statusid = crossold;
  }

  row.cells[15].getElementsByTagName('select')[0].value = statusid;
  row.style.backgroundColor = getColor(statusid);
}