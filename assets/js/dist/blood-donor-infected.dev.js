"use strict";

var count = 0;
var datablood = [];

function loadTable() {
  var fromdate = '';
  var todate = '';
  var fromnumber = '';
  var tonumber = '';
  var bloodbagtype = '';
  var barcode = $("#barcode").val();

  if (!barcode) {
    fromdate = dmyToymd2($("#fromdate").val());
    todate = dmyToymd2($("#todate").val());
    fromnumber = $("#fromnumber").val();
    tonumber = $("#tonumber").val();
    bloodstocktype = $("#bloodstocktype").val();
    bloodgroup = $("#bloodgroup").val();
    bloodbagtype = $("#bloodbagtype").val();
  }

  spinnershow();
  $.ajax({
    url: 'data/bloodinvest/bloodinvestigate.php?fromdate=' + fromdate + "&todate=" + todate + "&fromnumber=" + fromnumber + "&tonumber=" + tonumber + "&bloodbagtype=" + bloodbagtype + "&barcode=" + barcode,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("infectedTable").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = '';
      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      datablood = obj;
      count = data.data.length.toString();
      $('#countblood').text(count.replace(/\B(?=(\d{3})+(?!\d))/g, ","));
      bloodGroup().then(function success(bloodgroupdata) {
        bloodPosNeg().then(function success(posneg) {
          bloodRh().then(function success(bloodrhdata) {
            $.each(obj, function (index, value) {
              var style = "";

              if (value.bloodstatusid == 1) {
                style = "background:#00FFFF;";
              } else if (value.bloodstatusid == 2) {
                style = "background:#FFFF00;";
              } else if (value.bloodstatusid == 3) {
                if (value.bloodrhsceen_cross == "Rh+") {
                  style = "background:#F39;";
                } else {
                  style = "background:#6C0;";
                } //แดง

              } else if (value.bloodstatusid == 4) {
                style = "background:#C00;";
              } else if (value.bloodstatusid == 5) {
                style = "background:#FFFF00;";
              } else if (value.bloodstatusid == 6) {
                style = "background:#0000FF;";
              } else if (value.bloodstatusid == 7) {
                style = "background:#FFFF00;";
              }

              if (value.prcremark == 15 || value.lprcremark == 15 || value.ldprcremark == 15 || value.ffpremark == 15 || value.pcremark == 15 || value.lppcremark == 15 || value.lppc_pasremark == 15 || value.sdpremark == 15 || value.sdp_pasremark == 15 || value.sdrremark == 15 || value.wbremark == 15) {
                style = "background:#0000FF;";
              }

              var rh_cross = '';

              if (value.rh_cross == 'Rh+') {
                rh_cross = '+';
              } else if (value.rh_cross == 'Rh-') {
                rh_cross = '-';
              } else {
                rh_cross = '';
              }

              var bloodrhsceen_cross = '';

              if (value.bloodrhsceen_cross == 'Rh+') {
                bloodrhsceen_cross = '+';
              } else if (value.bloodrhsceen_cross == 'Rh-') {
                bloodrhsceen_cross = '-';
              } else {
                bloodrhsceen_cross = '';
              }

              event_data += '<tr style="font-weight: bold;" class="tr_infected" id="tr_infected' + index + '" onclick="tr_infected_color(' + index + ') ">';
              event_data += '<td id="0td_infected' + index + '" class="td_infected0 td-table table-s-blood-scroll-left-thead-th3-0" style="' + style + '">' + '</td>';
              event_data += '<td id="1td_infected' + index + '" class="td_infected1 td-table table-s-blood-scroll-left-thead-th3-1" >' + (index + 1) + '</td>';
              event_data += '<td id="2td_infected' + index + '" class="td_infected2 td-table table-s-blood-scroll-left-thead-th3-2" >' + getDMY2(value.donation_date) + '</td>';
              event_data += '<td id="3td_infected' + index + '" class="td_infected3 td-table table-s-blood-scroll-left-thead-th3-3" >' + value.bag_number + '</td>';
              event_data += '<td class="td-table">' + value.blood_group_raj + '</td>';
              event_data += '<td class="td-table">';
              event_data += '<label class="table-Infected-ncb">' + value.blood_group_cross + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table">' + value.rhcode_raj + '</td>';
              event_data += '<td class="td-table">';
              event_data += '<label class="table-Infected-ncb">' + value.rh_cross.replace(/R/g, "").replace(/h/g, "") + '</label>';
              event_data += ' <input hidden type="text" id="rh_cross' + index + '" name="rh_cross' + index + '" style="width:100%; text-align:center;" value="' + value.rh_cross + '">';
              event_data += '</td>';
              event_data += '<td class="td-table">' + value.rhcode_2 + '</td>';
              event_data += '<td class="td-table">';
              event_data += '<label class="table-Infected-ncb">' + value.bloodrhsceen_cross.replace(/R/g, "").replace(/h/g, "") + '</label>';
              event_data += ' <input hidden type="text" id="bloodrhsceen_cross' + index + '" name="bloodrhsceen_cross' + index + '" style="width:100%; text-align:center;" value="' + value.bloodrhsceen_cross + '">';
              event_data += ' <input type="hidden" id="bloodrhsceen_cross_s' + index + '" name="bloodrhsceen_cross_s' + index + '" value="' + value.bloodrhsceen_cross_s + '" />';
              event_data += ' <input type="hidden" id="bloodrhsceen_cross_p' + index + '" name="bloodrhsceen_cross_p' + index + '" value="' + value.bloodrhsceen_cross_p + '" />';
              event_data += ' <input type="hidden" id="bloodrhsceen_cross_c' + index + '" name="bloodrhsceen_cross_c' + index + '" value="' + value.bloodrhsceen_cross_c + '" />';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.tpharpr_grade) + '">';
              event_data += '<label style="font-weight: bold;">' + value.tpharpr + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.tpharpr_grade) + '">';
              event_data += '<label style="font-weight: bold;">' + value.tpharpr_grade + '</label>';
              event_data += '<input  hidden  style="width:100%;text-align:center;' + value.hbsag_grade + '" name="tpharpr_grade' + index + '" type="text" value="' + value.tpharpr_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' >';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hbsag_grade) + '">';
              event_data += '<label>' + value.hbsag + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hbsag_grade) + '">' + value.hbsag_grade + '<input  hidden  style="width:100%;text-align:center" name="hbsag_grade' + index + '" type="text" value="' + value.hbsag_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' ></td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hivagab_grade) + '">';
              event_data += '<label>' + value.hivagab + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hivagab_grade) + '">' + value.hivagab_grade + '<input  hidden  style="width:100%;text-align:center" type="text" name="hivagab_grade' + index + '" value="' + value.hivagab_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' ></td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hcvab_grade) + '">';
              event_data += '<label>' + value.hcvab + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hcvab_grade) + '">' + value.hcvab_grade + '<input  hidden  style="width:100%;text-align:center" type="text" name="hcvab_grade' + index + '"  value="' + value.hcvab_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' ></td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hbvdna_grade) + '">';
              event_data += '<label>' + value.hbvdna + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hbvdna_grade) + '">' + value.hbvdna_grade + '<input  hidden  style="width:100%;text-align:center" type="text" name="hbvdna_grade' + index + '" value="' + value.hbvdna_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' ></td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hcvrna_grade) + '">';
              event_data += '<label>' + value.hcvrna + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hcvrna_grade) + '">' + value.hcvrna_grade + '<input  hidden  style="width:100%;text-align:center" type="text" name="hcvrna_grade' + index + '" value="' + value.hcvrna_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' ></td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hivrna_grade) + '">';
              event_data += '<label>' + value.hivrna + '</label>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="' + setRedBGGrard(value.hivrna_grade) + '">' + value.hivrna_grade + '<input  hidden  style="width:100%;text-align:center" type="text" name="hivrna_grade' + index + '"  value="' + value.hivrna_grade + '" ' + (value.importstatus == '1' ? 'disabled' : '') + ' ></td>';
              event_data += '<td class="td-table" >';
              event_data += '<div class="row">';
              event_data += '<div >';
              event_data += '<input style="margin-left:15px;margin-top:5px" type="checkbox" ' + (value.iscross_remark == 1 ? 'checked' : '') + ' />';
              event_data += '</div>';
              event_data += '<div style="width:75%">';
              event_data += '<input  style="width:100%" type="text"value="' + value.cross_remark + '" >';
              event_data += '</div>';
              event_data += '</div>';
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.donateid;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.bloodstatusid;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.donorcode;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.donorid;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.importstatus;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.bloodstatusid;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.donation_type_id;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodvolume1;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodcount1;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodyltyield1;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodunit1;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodvolume2;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodcount2;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodyltyield2;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.sdpprodunit2;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.donation_qty;
              event_data += '</td>';
              event_data += '<td class="td-table" style="display:none;" >';
              event_data += value.prc != "" || value.lprc != "" || value.ffp != "" || value.pc != "" || value.lppc != "" || value.lppc_pas != "" || value.sdp != "" || value.sdp_pas != "" || value.wb != "" || value.sdr != "" ? "1" : "0";
              event_data += '</td>';
              event_data += '<td class="td-table"  >';
              event_data += '<button class="btn btn-success" onclick="showPageFile(' + value.donateid + ')" type="button">';
              event_data += '<span class="btn-label"><i class="fa fa-upload"></i></span>ไฟล์';
              event_data += '</button>';
              event_data += '</td>';
              event_data += '</tr>';
            });
            $("#infectedTable").append(event_data); // document.getElementById("#td_infected").style.background = "#FFF";
          });
        });
      });
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

function setRedBGGrard() {
  var v = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (v == "+" || v == "&" || parseInt(v) > 0) {
    return 'background: red;';
  } else {
    return '';
  }
}

function setFindRedBGGrard() {
  var v = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (v == "+" || v == "&" || parseInt(v) > 0) {
    return 'red;';
  } else {
    return '';
  }
}

function tr_infected_color(rec) {
  var galleries = document.getElementsByClassName("tr_infected");
  var len = galleries.length;

  for (var i = 0; i < len; i++) {
    galleries[i].style.backgroundColor = "#FFF";
  } //0


  var galleries0 = document.getElementsByClassName("td_infected0");
  var galleries1 = document.getElementsByClassName("td_infected1");
  var galleries2 = document.getElementsByClassName("td_infected2");
  var galleries3 = document.getElementsByClassName("td_infected3");
  var len0 = galleries0.length;

  for (var i = 0; i < len0; i++) {
    galleries0[i].className = "td_infected0 td-table table-s-blood-scroll-left-thead-th3-0";
    galleries1[i].className = "td_infected1 td-table table-s-blood-scroll-left-thead-th3-1";
    galleries2[i].className = "td_infected2 td-table table-s-blood-scroll-left-thead-th3-2";
    galleries3[i].className = "td_infected3 td-table table-s-blood-scroll-left-thead-th3-3";
  } //1
  // var galleries1 = document.getElementsByClassName("td_infected1");
  // var len1 = galleries1.length;
  // for (var i = 0; i < len1; i++) {
  //     galleries1[i].className = "td_infected1 td-table table-s-blood-scroll-left-thead-th3-1";
  // }
  // //2
  // var galleries2 = document.getElementsByClassName("td_infected2");
  // var len2 = galleries2.length;
  // for (var i = 0; i < len2; i++) {
  //     galleries2[i].className = "td_infected2 td-table table-s-blood-scroll-left-thead-th3-2";
  // }
  // //3
  // var galleries3 = document.getElementsByClassName("td_infected3");
  // var len3 = galleries3.length;
  // for (var i = 0; i < len3; i++) {
  //     galleries3[i].className = "td_infected3 td-table table-s-blood-scroll-left-thead-th3-3";
  // }


  document.getElementById("tr_infected" + rec).style.background = "#b7e4eb";
  document.getElementById("0td_infected" + rec).className = "td_infected0 td-table table-s-blood-scroll-left-thead-th4-0";
  document.getElementById("1td_infected" + rec).className = "td_infected1 td-table table-s-blood-scroll-left-thead-th4-1";
  document.getElementById("2td_infected" + rec).className = "td_infected2 td-table table-s-blood-scroll-left-thead-th4-2";
  document.getElementById("3td_infected" + rec).className = "td_infected3 td-table table-s-blood-scroll-left-thead-th4-3";
}

function bloodGroup() {
  return $.ajax({
    url: 'data/masterdata/bloodgroup.php',
    dataType: 'json',
    type: 'get'
  });
}

function bloodRh() {
  return $.ajax({
    url: 'data/masterdata/bloodrh.php',
    dataType: 'json',
    type: 'get'
  });
}

function bloodPosNeg() {
  return $.ajax({
    url: 'data/masterdata/posneg.php',
    dataType: 'json',
    type: 'get'
  });
}

function bloodRemark() {
  return $.ajax({
    url: 'data/masterdata/bloodremark.php',
    dataType: 'json',
    type: 'get'
  });
} 

