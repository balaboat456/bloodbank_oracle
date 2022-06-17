"use strict";

var count = 0;
var datablood = [];
var ckrow = '';
var number_search = "";

function loadTable() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  spinnershow();
  var fromdate = '';
  var todate = '';
  var fromnumber = '';
  var tonumber = '';

  if (state == 'search') {
    number_search = '';
  }

  var barcode = $("#barcode").val();

  if (number_search != "") {
    barcode = number_search;
  } else if (!barcode) {
    fromdate = dmyToymd2($("#fromdate").val());
    todate = dmyToymd2($("#todate").val());
    fromnumber = $("#fromnumber").val();
    tonumber = $("#tonumber").val();
    bloodstocktype = $("#bloodstocktype").val();
    bloodgroup = $("#bloodgroup").val();
  } else {
    number_search = barcode;
  }

  $.ajax({
    url: 'data/bloodinvest/bloodinvestigate.php?fromdate=' + fromdate + "&todate=" + todate + "&fromnumber=" + fromnumber + "&tonumber=" + tonumber + "&barcode=" + barcode,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_invest").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      datablood = obj;
      count = data.data.length.toString();
      $('#countblood').text(count.replace(/\B(?=(\d{3})+(?!\d))/g, ","));
      $.each(obj, function (index, value) {
        event_data += '<tr id="trblood' + index + '" onClick="chActive(' + index + ')">';
        event_data += '<td style="width:40px !important">' + '<input type="radio" name="ckblood" id="ckblood' + index + '" value="1">' + '</td>';
        event_data += '<td style="width:60px !important">' + (index + 1) + '</td>';
        event_data += '<td style="width:150px !important">' + getDMY2(value.donation_date) + ' ' + value.donation_time + '</td>';
        event_data += '<td style="width:140px !important">' + value.bag_number + '</td>';
        event_data += '<td style="width:200px !important">' + value.bagtypename + '</td>';
        event_data += '<td style="width:60px !important">' + value.blood_group + '</td>';
        event_data += '<td style="width:60px !important">' + value.rhname3_1 + '</td>';
        event_data += '<td>' + value.prefixname + value.fname + ' ' + value.lname + '</td>';
        event_data += '</tr>';
      });
      $("#list_table_invest").append(event_data);
      if (state != "search") if (ckrow != '' || ckrow === 0) {
        chActive(ckrow);
      }

      if (count == 1) {
        chActive(0);
      }

      $("#barcode").val("");
    },
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function chActive() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
  setBloodGroupSerum("#anti-a1");
  setBloodGroupSerum("#anti-h");
  setBloodGroupSerum("#a2cells");
  setBloodGroupSerum("#dat_poly");
  setBloodGroupSerum("#dat_igg");
  setBloodGroupSerum("#dat_c3d");
  setBloodGroupSerum("#dat_ccc");
  setRh2("#bloodrhinvest");
  setBloodGroupSerumLAB("#bloodrhsceen");
  setBloodGroup("#bloodgroupinvest");
  ckrow = id;
  if (document.getElementById("ckblood" + id)) document.getElementById("ckblood" + id).checked = true; // alert(count);

  for (i = 0; i < count; i++) {
    document.getElementById("trblood" + i).style.background = "#FFF";
  }

  document.getElementById("trblood" + id).style.background = "#b7e4eb";
  document.getElementById('anti-a1').value = datablood[id].antia1;
  document.getElementById('anti-h').value = datablood[id].antih;
  document.getElementById('a2cells').value = datablood[id].a2cells;
  document.getElementById('bloodgroupinvest').value = datablood[id].blood_group_raj;
  document.getElementById('bloodrhinvest').value = datablood[id].rh_raj;
  document.getElementById('bloodrhsceen').value = datablood[id].bloodrh_sceen;
  document.getElementById('bloodrhsceen_cross_s').value = datablood[id].bloodrhsceen_cross_s;
  document.getElementById('bloodrhsceen_cross_p').value = datablood[id].bloodrhsceen_cross_p;
  document.getElementById('bloodrhsceen_cross_c').value = datablood[id].bloodrhsceen_cross_c; // document.getElementById('bloodrhsceen_cross').value = datablood[id].bloodrhsceen_cross;

  document.getElementById('blood_group_cross').value = datablood[id].blood_group_cross;
  document.getElementById('rh_cross').value = datablood[id].rh_cross;
  document.getElementById('dat_poly').value = datablood[id].dat_poly;
  document.getElementById('dat_igg').value = datablood[id].dat_igg;
  document.getElementById('dat_c3d').value = datablood[id].dat_c3d;
  document.getElementById('dat_ccc').value = datablood[id].dat_ccc;
  document.getElementById('donateid').value = datablood[id].donateid;
  document.getElementById('donorid').value = datablood[id].donorid;
  document.getElementById('istube').checked = datablood[id].istube == 1 ? true : false;
  document.getElementById('rouleaux').checked = datablood[id].rouleaux == 1 ? true : false;
  document.getElementById('isblood_invest_remark').checked = datablood[id].isblood_invest_remark == 1 ? true : false;
  document.getElementById('blood_invest_remark').value = datablood[id].blood_invest_remark;
  document.getElementById('antibody').value = datablood[id].antibody;
  document.getElementById('antibodyLable').innerHTML = datablood[id].antibody;
  document.getElementById('phenotype').value = datablood[id].phenotype;
  document.getElementById('phenotypeshow').value = datablood[id].phenotypeshow;
  document.getElementById('phenotypeLable').innerHTML = datablood[id].phenotypeshow;
  document.getElementById('bloodstatusid').innerHTML = datablood[id].bloodstatusid;
  document.getElementById('tpharpr').value = datablood[id].tpharpr;
  document.getElementById('hbsag').value = datablood[id].hbsag;
  document.getElementById('hivagab').value = datablood[id].hivagab;
  document.getElementById('hcvab').value = datablood[id].hcvab;
  document.getElementById('hbvdna').value = datablood[id].hbvdna;
  document.getElementById('hcvrna').value = datablood[id].hcvrna;
  document.getElementById('hivrna').value = datablood[id].hivrna;
  document.getElementById('blood_invest_tube_edta').value = datablood[id].blood_invest_tube_edta;
  document.getElementById('blood_invest_tube_clotted').value = datablood[id].blood_invest_tube_clotted;
  document.getElementById('blood_invest_tube_acd').value = datablood[id].blood_invest_tube_acd;
  document.getElementById('barcodeantibody').value = datablood[id].bag_number; // Start Table ABO

  abocount = 1;
  var aboArr = datablood[id].aboarr;
  var body = document.getElementById("list_table_abo").getElementsByTagName('tbody')[0];
  if (body != undefined) while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (aboArr.length > 0) {
    abocount = 1;
    $.each(aboArr, function (index, value) {
      addABOTest(value);
    });
  } else {
    addABOTest();
  } // End Table ABO
  // Start Table ABO Modal


  abo2count = 1;
  var aboModalArr = datablood[id].abomodalarr;
  var body = document.getElementById("list_table_abo_blodgroup").getElementsByTagName('tbody')[0];
  if (body != undefined) while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (aboModalArr.length > 0) {
    abo2count = 1;
    $.each(aboModalArr, function (index, value) {
      addABOTestModal(value);
    });
  } // End Table ABO Modal
  // Start Table Rh


  rhcount = 1;
  var rhArr = datablood[id].rharr;
  var body = document.getElementById("list_table_rh").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (rhArr.length > 0) {
    $.each(rhArr, function (index, value) {
      addRhTest(value);
    });
  } else {
    addRhTest();
  } // End Table Rh
  // Start Table Anti Sceen


  anticount = 1;
  var antisceenArr = datablood[id].antisceen;
  var body = document.getElementById("list_table_anti_sceen").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  if (antisceenArr.length > 0) {
    $.each(antisceenArr, function (index, value) {
      addAntiSceeningTest(value);
    });
  } else {
    var antisceenArrNew = [{
      donateantisceentest: '13',
      donateantisceenid: '',
      donateantisceeno: '',
      donateantisceeno1: '',
      donateantisceeno2: '',
      donateantisceenlotno: ''
    }, {
      donateantisceentest: '6',
      donateantisceenid: '',
      donateantisceeno: '',
      donateantisceeno1: '',
      donateantisceeno2: '',
      donateantisceenlotno: ''
    }];
    $.each(antisceenArrNew, function (index, value) {
      addAntiSceeningTest(value);
    });
  } // End Table Anti Sceen
  // Start Table Anti Iden


  idencount = 1;
  var antiIdenArr = datablood[id].antiiden;
  var body = document.getElementById("list_table_anti_iden").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  $.each(antiIdenArr, function (index, value) {
    addAntiIdenTest(value);
  }); // End Table Anti Iden

  $("#bloodgroupcross").text(datablood[id].bloodgroupname_cross);
  $("#bgcross").val(datablood[id].bloodgroupname_cross);
  $("#rhcross").text(datablood[id].rhname_cross3_1);
  $("#bloodrhsceencross").text(datablood[id].rhname_cross3_2); // document.getElementById('tubeantibodyscreeningtest').value = datablood[id].tubeantibodyscreeningtest;

  if (datablood[id].tubeantibodyscreeningtest == '1') {
    document.getElementById('tubeantibodyscreeningtest').checked = true;
  }

  document.getElementById('dateantibodyscreeningtest').value = datablood[id].dateantibodyscreeningtest != '00/00/0000' ? datablood[id].dateantibodyscreeningtest : '';
  $("#staffantibodyscreeningtest").val(datablood[id].staffantibodyscreeningtest);
  $('#staffantibodyscreeningtest').trigger('change');
}

$('#myform').submit(function (e) {
  if (!$('#donateid').val()) {
    swal({
      title: 'ขออภัยค่ะ!',
      text: 'คุณยังไม่ได้เลือกรายการผู้มาบริจาคเลือด',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      confirmButtonClass: "btn-danger",
      closeOnConfirm: true
    });
    return false;
  }

  var tubeantibodyscreeningtest = document.getElementById("tubeantibodyscreeningtest").checked;
  var dateantibodyscreeningtest = document.getElementById("dateantibodyscreeningtest").value;
  var staffantibodyscreeningtest = document.getElementById("staffantibodyscreeningtest").value; // var tubeantibodyscreeningtest = document.getElementById("tubeantibodyscreeningtest").checked;

  if (tubeantibodyscreeningtest == true) {
    if (dateantibodyscreeningtest == "") {
      swal({
        title: 'ขออภัยค่ะ!',
        text: 'คุณยังไม่ได้ระบุวันที่เจาะ',
        type: "warning",
        showCancelButton: false,
        confirmButtonText: 'OK',
        confirmButtonClass: "btn-danger",
        closeOnConfirm: true
      });
      return false;
    }

    if (staffantibodyscreeningtest == "") {
      swal({
        title: 'ขออภัยค่ะ!',
        text: 'คุณยังไม่ได้ระบุผู้ตรวจ',
        type: "warning",
        showCancelButton: false,
        confirmButtonText: 'OK',
        confirmButtonClass: "btn-danger",
        closeOnConfirm: true
      });
      return false;
    }
  }

  var arr = findAntibodySceenTest(document.getElementById("list_table_anti_sceen"));
  $("#arrAnti").val(JSON.stringify(arr));
  var arrIden = findAntibodyIdenTest(document.getElementById("list_table_anti_iden"));
  $("#arrIden").val(JSON.stringify(arrIden));
  var arrRh = findRh(document.getElementById("list_table_rh"));
  $("#arrRh").val(JSON.stringify(arrRh));
  var arrABO = findABO(document.getElementById("list_table_abo"));
  $("#arrABO").val(JSON.stringify(arrABO));
  var arrABOModal = findABOModal(document.getElementById("list_table_abo_blodgroup"));
  $("#arrABOModal").val(JSON.stringify(arrABOModal));
  spinnershow();
  $.ajax({
    type: "POST",
    url: "blood-investigate-save.php",
    data: $(this).serialize(),
    success: function success(data) {
      spinnerhide();
      var obj = JSON.parse(data);

      if (obj.status) {
        myAlertTop();
        loadTable();
      } else {
        myAlertTopError();
      }
    },
    error: function error(_error) {
      spinnerhide();
      myAlertTopError();
    }
  });
  return false;
});

function findAntibodySceenTest(table) {
  var anti = '';
  var arrCell = [];
  var arrRow = [];
  var r = 1;

  while (row = table.rows[r++]) {
    var c = 0;

    while (cell = row.cells[c++]) {
      if (c == 1) {
        if (cell.children[0].value != "undefined") {
          arrCell = realMerge(arrCell, [{
            donateantisceentest: cell.children[0].value
          }]);
        } else {
          arrCell = realMerge(arrCell, [{
            donateantisceentest: ""
          }]);
        }
      }

      if (c == 2) arrCell = realMerge(arrCell, [{
        donateantisceenp1mi: cell.children[0].value
      }]);
      if (c == 3) arrCell = realMerge(arrCell, [{
        donateantisceeno: cell.children[0].value
      }]);
      if (c == 4) arrCell = realMerge(arrCell, [{
        donateantisceeno1: cell.children[0].value
      }]);
      if (c == 5) arrCell = realMerge(arrCell, [{
        donateantisceeno2: cell.children[0].value
      }]);

      if (c == 6) {
        arrCell = realMerge(arrCell, [{
          donateantisceenlotno: cell.children[0].value
        }]);
      }
    }

    arrRow.push(arrCell);
    arrCell = [];
  }

  return arrRow;
}

function findAntibodyIdenTest(table) {
  var arrCell = [];
  var arrRow = [];
  var r = 1;

  while (row = table.rows[r++]) {
    var c = 0;

    while (cell = row.cells[c++]) {
      if (c == 1) arrCell = realMerge(arrCell, [{
        donateantiidentest: cell.children[0].value
      }]);
      if (c == 2) arrCell = realMerge(arrCell, [{
        donateantiiden1: cell.children[0].value
      }]);
      if (c == 3) arrCell = realMerge(arrCell, [{
        donateantiiden2: cell.children[0].value
      }]);
      if (c == 4) arrCell = realMerge(arrCell, [{
        donateantiiden3: cell.children[0].value
      }]);
      if (c == 5) arrCell = realMerge(arrCell, [{
        donateantiiden4: cell.children[0].value
      }]);
      if (c == 6) arrCell = realMerge(arrCell, [{
        donateantiiden5: cell.children[0].value
      }]);
      if (c == 7) arrCell = realMerge(arrCell, [{
        donateantiiden6: cell.children[0].value
      }]);
      if (c == 8) arrCell = realMerge(arrCell, [{
        donateantiiden7: cell.children[0].value
      }]);
      if (c == 9) arrCell = realMerge(arrCell, [{
        donateantiiden8: cell.children[0].value
      }]);
      if (c == 10) arrCell = realMerge(arrCell, [{
        donateantiiden9: cell.children[0].value
      }]);
      if (c == 11) arrCell = realMerge(arrCell, [{
        donateantiiden10: cell.children[0].value
      }]);
      if (c == 12) arrCell = realMerge(arrCell, [{
        donateantiiden11: cell.children[0].value
      }]);
      if (c == 13) arrCell = realMerge(arrCell, [{
        donateantiidenauto: cell.children[0].value
      }]);
      if (c == 14) arrCell = realMerge(arrCell, [{
        donateantiidenlotno: cell.children[0].value
      }]);
    }

    arrRow.push(arrCell);
    arrCell = [];
  }

  return arrRow;
}

function findRh(table) {
  var arrCell = [];
  var arrRow = [];
  var r = 1;

  while (row = table.rows[r++]) {
    var c = 0;

    while (cell = row.cells[c++]) {
      if (c == 1) arrCell = realMerge(arrCell, [{
        donaterhreagent: cell.children[0].value
      }]);
      if (c == 2) arrCell = realMerge(arrCell, [{
        donaterhrt: cell.children[0].value
      }]);
      if (c == 3) arrCell = realMerge(arrCell, [{
        donaterh37c: cell.children[0].value
      }]);
      if (c == 4) arrCell = realMerge(arrCell, [{
        donaterhiat: cell.children[0].value
      }]);
      if (c == 5) arrCell = realMerge(arrCell, [{
        donaterhccc: cell.children[0].value
      }]);
      if (c == 6) arrCell = realMerge(arrCell, [{
        donaterhresult: cell.children[0].value
      }]);
    }

    arrRow.push(arrCell);
    arrCell = [];
  }

  return arrRow;
}

function findABO(table) {
  var arrCell = [];
  var arrRow = [];
  var r = 2;

  while (row = table.rows[r++]) {
    var c = 0;

    while (cell = row.cells[c++]) {
      if (c == 1) arrCell = realMerge(arrCell, [{
        donatereagent: cell.children[0].value
      }]);
      if (c == 2) arrCell = realMerge(arrCell, [{
        donateantia: cell.children[0].value
      }]);
      if (c == 3) arrCell = realMerge(arrCell, [{
        donateantib: cell.children[0].value
      }]);
      if (c == 4) arrCell = realMerge(arrCell, [{
        donateantiab: cell.children[0].value
      }]);
      if (c == 5) arrCell = realMerge(arrCell, [{
        donateacells: cell.children[0].value
      }]);
      if (c == 6) arrCell = realMerge(arrCell, [{
        donatebcells: cell.children[0].value
      }]);
      if (c == 7) arrCell = realMerge(arrCell, [{
        donateocells: cell.children[0].value
      }]);
      if (c == 8) arrCell = realMerge(arrCell, [{
        donatebloodgroup: cell.children[0].value
      }]);
    }

    arrRow.push(arrCell);
    arrCell = [];
  }

  return arrRow;
}

function findABOModal(table) {
  var arrCell = [];
  var arrRow = [];
  var r = 2;

  while (row = table.rows[r++]) {
    var c = 0;

    while (cell = row.cells[c++]) {
      if (c == 1) arrCell = realMerge(arrCell, [{
        donatemodalreagent: cell.children[0].value
      }]);
      if (c == 2) arrCell = realMerge(arrCell, [{
        donatemodalantia: cell.children[0].value
      }]);
      if (c == 3) arrCell = realMerge(arrCell, [{
        donatemodalantib: cell.children[0].value
      }]);
      if (c == 4) arrCell = realMerge(arrCell, [{
        donatemodalantiab: cell.children[0].value
      }]);
      if (c == 5) arrCell = realMerge(arrCell, [{
        donatemodalacells: cell.children[0].value
      }]);
      if (c == 6) arrCell = realMerge(arrCell, [{
        donatemodalbcells: cell.children[0].value
      }]);
      if (c == 7) arrCell = realMerge(arrCell, [{
        donatemodalocells: cell.children[0].value
      }]);
      if (c == 8) arrCell = realMerge(arrCell, [{
        donatemodalbloodgroup: cell.children[0].value
      }]);
      if (c == 9) arrCell = realMerge(arrCell, [{
        donatemodalaboremark: cell.innerHTML
      }]);
      if (c == 10) arrCell = realMerge(arrCell, [{
        donatemodalstaff: cell.innerHTML
      }]);
      if (c == 11) arrCell = realMerge(arrCell, [{
        donatemodaldatetime: cell.innerHTML
      }]);
    }

    arrRow.push(arrCell);
    arrCell = [];
  }

  return arrRow;
}

function htmlToElement(html) {
  var template = document.createElement('template');
  html = html.trim(); // Never return a text node of whitespace as the result

  template.innerHTML = html;
  return template.content.firstChild;
}

function bloodRemark() {
  return $.ajax({
    url: 'data/masterdata/bloodremark.php',
    dataType: 'json',
    type: 'get'
  });
}

function antibodyModal() {
  removeAntiBody();
  removePhenotype();
  var antibody = datablood[ckrow].antibody.split(",");
  antibody.forEach(function (entry) {
    if (entry) if (document.getElementById(entry) != undefined) document.getElementById(entry).checked = true;
  });
  var phenotype = datablood[ckrow].phenotype.split(",");
  phenotype.forEach(function (entry) {
    console.log(entry);
    console.log(document.getElementById(entry));
    if (entry) if (document.getElementById(entry) != undefined) document.getElementById(entry).checked = true;
  });
  document.getElementById('antiLabel').innerHTML = document.getElementById('antibody').value;
  document.getElementById('phenoText').innerHTML = document.getElementById('phenotype').value;
  document.getElementById('phenoLabel').innerHTML = document.getElementById('phenotypeshow').value;
  $("#bloodinvestModal").modal('show');
}

function scanBarcode() {
  var bag_number = $('#barcode').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#barcode').val(bag_number_new); // if (bag_number_new.length == 14) {
  //     loadTable("search");
  // } else if (bag_number_new.length == 0) {
  //     loadTable("search");
  // }
}

function setRequestbloodrhrt(self, id) {
  if (self.value == 10) {
    self.parentNode.parentNode.cells[5].children[0].value = 'Rh+';
    $("#requestbloodrhresult" + id).val('Rh+').trigger("change");
    $("#confirmrhid").val('Rh+').trigger("change");
    setConfirmRh('Rh+');
  } else if (self.value == 11) {
    self.parentNode.parentNode.cells[5].children[0].value = 'Rh-';
    $("#requestbloodrhresult" + id).val('Rh-').trigger("change");
    $("#confirmrhid").val('Rh-').trigger("change");
    setConfirmRh('Rh-');
  }
}

function setConfirmRh() {
  var rhid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "0";
  var table = document.getElementById("list_table_rh");
  var status = false;
  var status2 = false;
  var value = "";
  var r = 1;

  while (row = table.rows[r++]) {
    var c = 0;

    while (cell = row.cells[c++]) {
      if (c == 6) {
        if (cell.children[0].value == "Rh+") {
          status = true;
        } else if (cell.children[0].value == "Rh-") {
          status2 = true;
        }
      }
    }
  }

  if (status && !status2) {
    $("#bloodrhinvest").val("Rh+");
  } else if (status2 && !status) {
    $("#bloodrhinvest").val("Rh-");
  } else {
    $("#bloodrhinvest").val("0");
  }
}

function getSceenValue(v) {
  return v.replace("Rh", "");
}