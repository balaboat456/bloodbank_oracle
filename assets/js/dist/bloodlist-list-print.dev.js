"use strict";

function bagNumber() {
  var name = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var bag_number = $('#' + name).val();
  var bag_number_new = numnerPoint(bag_number);
  $('#' + name).val(bag_number_new);
  var remarkid = bag_number_new.substring(7, 8);
  document.getElementById("isclottedblood").checked = true;
  document.getElementById("isedtablood").checked = true;
  document.getElementById("iscpdaacdblood").checked = true;

  if (remarkid == "B") {
    setDataModalSelectValue('donateformremarktypeid5', '2', 'ตรวจซ้ำ HBV');
    donateformremarktypename5 = "ตรวจซ้ำ HBV";
  } else if (remarkid == "C") {
    setDataModalSelectValue('donateformremarktypeid5', '3', 'ตรวจซ้ำ HCV');
    donateformremarktypename5 = "ตรวจซ้ำ HCV";
  } else if (remarkid == "I") {
    setDataModalSelectValue('donateformremarktypeid5', '4', 'ตรวจซ้ำ HIV');
    donateformremarktypename5 = "ตรวจซ้ำ HIV";
  } else if (remarkid == "S") {
    setDataModalSelectValue('donateformremarktypeid5', '5', 'ตรวจซ้ำ Syphilis');
    donateformremarktypename5 = "ตรวจซ้ำ Syphilis";
  } else if (remarkid == "N") {
    setDataModalSelectValue('donateformremarktypeid5', '6', 'ตรวจซ้ำ NAT');
    donateformremarktypename5 = "ตรวจซ้ำ NAT";
  } else {
    setDataModalSelectValue('donateformremarktypeid5', null, '');
    donateformremarktypename5 = ""; // document.getElementById("isclottedblood").checked = false;
    // document.getElementById("isedtablood").checked = false;
    // document.getElementById("iscpdaacdblood").checked = false;
  }
}

function setDataModalSelectValue() {
  var elem = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var itemid = arguments.length > 1 ? arguments[1] : undefined;
  var itemtext = arguments.length > 2 ? arguments[2] : undefined;
  var select = $('#' + elem);
  option = new Option(itemtext, itemid, true, true);
  select.append(option).trigger('change');
}

function clearFormPrint() {
  // document.getElementById("bagnumberfrom1").value = "";
  // document.getElementById("bagnumberto1").value = "";
  document.getElementById("textothers").value = "";
  document.getElementById("isttis1").checked = false;
  document.getElementById("isttis2").checked = true;
  document.getElementById("isonly").checked = false;
  document.getElementById("isothers").checked = false;
  document.getElementById("isclottedblood").checked = true;
  document.getElementById("iscpdaacdblood").checked = true;
  document.getElementById("isedtablood").checked = true;
  document.getElementById("isexpress1").checked = false;
  document.getElementById("isexpress2").checked = false; // document.getElementById("rubberbandnumber1").value = "";
  // document.getElementById("rubberbandnumber2").value = "";
  // document.getElementById("rubberbandnumber3").value = "";
  // document.getElementById("rubberbandnumber6").value = "";
  // document.getElementById("rubberbandnumber7").value = "";
  // document.getElementById("rubberoldbandnumber1").value = "";
  // document.getElementById("rubberoldbandnumber2").value = "";
  // document.getElementById("rubberoldbandnumber3").value = "";
  // document.getElementById("rubberoldbandnumber6").value = "";
  // document.getElementById("rubberoldbandnumber7").value = "";

  document.getElementById("remarkbandnumber1").value = "";
  document.getElementById("remarkbandnumber2").value = "";
  document.getElementById("remarkbandnumber3").value = "";
  document.getElementById("remarkbandnumber6").value = "";
  document.getElementById("remarkbandnumber7").value = "";
}

function reportPrint() {
  var group_obj = "";
  var group_number1 = "";
  var group_number_skip1 = "";
  var group_number2 = "";
  var group_number_skip2 = "";
  var group_number3 = "";
  var group_number_skip3 = "";
  var group_number6 = "";
  var group_number_skip6 = "";
  var group_number7 = "";
  var group_number_skip7 = "";
  var group_number4 = "";
  var group_number5 = "";
  var issend1 = document.getElementById("issend1").checked;
  var issend2 = document.getElementById("issend2").checked;
  var issend3 = document.getElementById("issend3").checked;
  var issend4 = document.getElementById("issend4").checked;
  var issend6 = document.getElementById("issend6").checked;
  var issend7 = document.getElementById("issend7").checked;
  var formtype2 = document.getElementById("formtype2").checked;
  var bagnumberfrom1 = document.getElementById("bagnumberfrom1").value;
  var bagnumberto1 = document.getElementById("bagnumberto1").value;
  var bagnumberfrom2 = document.getElementById("bagnumberfrom2").value;
  var bagnumberto2 = document.getElementById("bagnumberto2").value;
  var bagnumberfrom3 = document.getElementById("bagnumberfrom3").value;
  var bagnumberto3 = document.getElementById("bagnumberto3").value;
  var bagnumberfrom6 = document.getElementById("bagnumberfrom6").value;
  var bagnumberto6 = document.getElementById("bagnumberto6").value;
  var bagnumberfrom7 = document.getElementById("bagnumberfrom7").value;
  var bagnumberto7 = document.getElementById("bagnumberto7").value;
  var bagnumberfrom4 = document.getElementById("bagnumberfrom4").value;
  var bagnumber_skip3_1 = document.getElementById("bagnumber_skip3_1").value;
  var bagnumber_skip3_2 = document.getElementById("bagnumber_skip3_2").value;
  var bagnumber_skip6_1 = document.getElementById("bagnumber_skip6_1").value;
  var bagnumber_skip6_2 = document.getElementById("bagnumber_skip6_2").value;
  var bagnumber_skip7_1 = document.getElementById("bagnumber_skip7_1").value;
  var bagnumber_skip7_2 = document.getElementById("bagnumber_skip7_2").value;
  var bagnumberfrom5 = document.getElementById("bagnumberfrom5").value;
  var donorname5 = document.getElementById("donorname5").value;
  var donoridcard5 = document.getElementById("donoridcard5").value;
  var donorcode5 = document.getElementById("donorcode5").value;
  var donorpassport5 = document.getElementById("donorpassport5").value;
  var rubberbandnumber1 = document.getElementById("rubberbandnumber1").value;
  var rubberbandnumber2 = document.getElementById("rubberbandnumber2").value;
  var rubberbandnumber3 = document.getElementById("rubberbandnumber3").value;
  var rubberbandnumber6 = document.getElementById("rubberbandnumber6").value;
  var rubberbandnumber7 = document.getElementById("rubberbandnumber7").value;
  var rubberoldbandnumber1 = document.getElementById("rubberoldbandnumber1").value;
  var rubberoldbandnumber2 = document.getElementById("rubberoldbandnumber2").value;
  var rubberoldbandnumber3 = document.getElementById("rubberoldbandnumber3").value;
  var rubberoldbandnumber6 = document.getElementById("rubberoldbandnumber6").value;
  var rubberoldbandnumber7 = document.getElementById("rubberoldbandnumber7").value;
  var remarkbandnumber1 = document.getElementById("remarkbandnumber1").value;
  var remarkbandnumber2 = document.getElementById("remarkbandnumber2").value;
  var remarkbandnumber3 = document.getElementById("remarkbandnumber3").value;
  var remarkbandnumber6 = document.getElementById("remarkbandnumber6").value;
  var remarkbandnumber7 = document.getElementById("remarkbandnumber7").value;
  var datecheck1 = document.getElementById("datecheck").value;
  var fromyear1 = datecheck1.substr(-4, 4);
  var frommouth1 = datecheck1.substr(-7, 2);
  var fromday1 = datecheck1.substr(0, 2);
  var datecheck = fromyear1 + '-' + frommouth1 + '-' + fromday1;
  var donateformremarktypeid4 = document.getElementById("donateformremarktypeid4").value; // หมายเหตุ ถุงเลือด6

  var donateformremarktypeid5 = document.getElementById("donateformremarktypeid5").value; // หมายเหตุ Tube

  if (rubberbandnumber1 != rubberoldbandnumber1 && remarkbandnumber1 == "") {
    swal({
      title: 'ขออภัยค่ะ!',
      text: 'มีการเปลี่ยนจำนวนหมายเลขสาย กรุณาระบุสาเหตุ',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      closeOnConfirm: true
    }, function (inputValue) {
      setTimeout(function () {
        document.getElementById("remarkbandnumber1").focus();
      }, 500);
    });
    return false;
  } else if (rubberbandnumber2 != rubberoldbandnumber2 && remarkbandnumber2 == "") {
    swal({
      title: 'ขออภัยค่ะ!',
      text: 'มีการเปลี่ยนจำนวนหมายเลขสาย กรุณาระบุสาเหตุ',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      closeOnConfirm: true
    }, function (inputValue) {
      setTimeout(function () {
        document.getElementById("remarkbandnumber2").focus();
      }, 500);
    });
    return false;
  } else if (rubberbandnumber3 != rubberoldbandnumber3 && remarkbandnumber3 == "") {
    swal({
      title: 'ขออภัยค่ะ!',
      text: 'มีการเปลี่ยนจำนวนหมายเลขสาย กรุณาระบุสาเหตุ',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      closeOnConfirm: true
    }, function (inputValue) {
      setTimeout(function () {
        document.getElementById("remarkbandnumber3").focus();
      }, 500);
    });
    return false;
  } else if (rubberbandnumber6 != rubberoldbandnumber6 && remarkbandnumber6 == "") {
    swal({
      title: 'ขออภัยค่ะ!',
      text: 'มีการเปลี่ยนจำนวนหมายเลขสาย กรุณาระบุสาเหตุ',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      closeOnConfirm: true
    }, function (inputValue) {
      setTimeout(function () {
        document.getElementById("remarkbandnumber6").focus();
      }, 500);
    });
    return false;
  } else if (rubberbandnumber7 != rubberoldbandnumber7 && remarkbandnumber7 == "") {
    swal({
      title: 'ขออภัยค่ะ!',
      text: 'มีการเปลี่ยนจำนวนหมายเลขสาย กรุณาระบุสาเหตุ',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      closeOnConfirm: true
    }, function (inputValue) {
      setTimeout(function () {
        document.getElementById("remarkbandnumber7").focus();
      }, 500);
    });
    return false;
  }

  var textothers = document.getElementById("textothers").value;
  var isttis1 = 0;
  var isttis2 = 0;
  var isonly = 0;
  var isothers = 0;
  var isclottedblood = 0;
  var iscpdaacdblood = 0;
  var isedtablood = 0;
  var isexpress1 = 0;
  var isexpress2 = 0;
  var isexpress = 0;

  if (formtype2) {
    if (bagnumberfrom5 != "") {
      group_number5 += bagnumberfrom5 + '<br/>';
    }

    if (donorname5 != "") {
      group_number5 += 'ชื่อ ' + donorname5 + '<br/>';
    }

    if (donorcode5 != "") {
      group_number5 += 'ID ' + donorcode5 + '<br/>';
    }

    if (donoridcard5 != "") {
      group_number5 += 'เลข ปปช ' + donoridcard5 + '<br/>';
    }

    if (donorpassport5 != "") {
      group_number5 += 'Passport ' + donorpassport5 + '<br/>';
    }

    if (group_number5 != "") {
      var bag_number_int = parseInt(bagnumberfrom5.split(".").join(""));
      group_obj += group_number5 + ';;' + donateformremarktypename5 + ';' + ';' + bag_number_int + ';' + '|';
    }
  } else {
    if (issend1) {
      if (bagnumberfrom1 != "" && bagnumberto1 != "") {
        group_number1 = bagnumberfrom1 + ' - ' + bagnumberto1;
      } else if (bagnumberfrom1 != "") {
        group_number1 = bagnumberfrom1;
      }

      if (bagnumberfrom1 != "") {
        group_number_skip1 = getBagNumberSkip(1);
      }

      if (group_number1 != "") {
        var bag_number_int = parseInt(bagnumberfrom1.split(".").join(""));
        group_obj += group_number1 + ';' + group_number_skip1 + ';' + remarkbandnumber1 + ';' + bagnumberQty1 + ';' + bag_number_int + ';' + rubberbandnumber1 + '|';
      }
    }

    if (issend2) {
      if (bagnumberfrom2 != "" && bagnumberto2 != "") {
        group_number2 = bagnumberfrom2 + ' - ' + bagnumberto2;
      } else if (bagnumberfrom2 != "") {
        group_number2 = bagnumberfrom2;
      }

      if (bagnumberfrom2 != "") {
        group_number_skip2 = getBagNumberSkip(2);
      }

      if (group_number2 != "") {
        var bag_number_int = parseInt(bagnumberfrom2.split(".").join(""));
        group_obj += group_number2 + ';' + group_number_skip2 + ';' + remarkbandnumber2 + ';' + bagnumberQty2 + ';' + bag_number_int + ';' + rubberbandnumber2 + '|';
      }
    }

    if (issend3) {
      if (bagnumberfrom3 != "" && bagnumberto3 != "") {
        group_number3 = bagnumberfrom3 + ' - ' + bagnumberto3;
      } else if (bagnumberfrom3 != "") {
        group_number3 = bagnumberfrom3;
      }

      if (bagnumberfrom3 != "" && bagnumber_skip3_1 != "") {
        group_number_skip3 += bagnumber_skip3_1 + ',';
      }

      if (bagnumberfrom3 != "" && bagnumber_skip3_2 != "") {
        group_number_skip3 += bagnumber_skip3_2 + ',';
      }

      group_number_skip3 = lastString(group_number_skip3);

      if (group_number3 != "") {
        var NumBag_NumberFrom = parseInt(bagnumberfrom3.split(".").join(""));
        var NumBag_NumberTo = parseInt(bagnumberto3.split(".").join(""));
        var diff = NumBag_NumberTo - NumBag_NumberFrom + 1;
        diff = isNaN(diff) ? '1' : diff;
        var bag_number_int = parseInt(bagnumberfrom3.split(".").join(""));
        group_obj += group_number3 + ';' + group_number_skip3 + ';' + remarkbandnumber3 + ';' + diff + ';' + bag_number_int + ';' + rubberbandnumber3 + '|';
      }
    }

    if (issend6) {
      if (bagnumberfrom6 != "" && bagnumberto6 != "") {
        group_number6 = bagnumberfrom6 + ' - ' + bagnumberto6;
      } else if (bagnumberfrom6 != "") {
        group_number6 = bagnumberfrom6;
      }

      if (bagnumberfrom6 != "" && bagnumber_skip6_1 != "") {
        group_number_skip6 += bagnumber_skip6_1 + ',';
      }

      if (bagnumberfrom6 != "" && bagnumber_skip6_2 != "") {
        group_number_skip6 += bagnumber_skip6_2 + ',';
      }

      group_number_skip6 = lastString(group_number_skip6);

      if (group_number6 != "") {
        var NumBag_NumberFrom = parseInt(bagnumberfrom6.split(".").join(""));
        var NumBag_NumberTo = parseInt(bagnumberto6.split(".").join(""));
        var diff = NumBag_NumberTo - NumBag_NumberFrom + 1;
        console.log(diff);
        diff = isNaN(diff) ? '1' : diff;
        var bag_number_int = parseInt(bagnumberfrom6.split(".").join(""));
        group_obj += group_number6 + ';' + group_number_skip6 + ';' + remarkbandnumber6 + ';' + diff + ';' + bag_number_int + ';' + rubberbandnumber6 + '|';
      }
    }

    if (issend7) {
      if (bagnumberfrom7 != "" && bagnumberto7 != "") {
        group_number7 = bagnumberfrom7 + ' - ' + bagnumberto7;
      } else if (bagnumberfrom7 != "") {
        group_number7 = bagnumberfrom7;
      }

      if (bagnumberfrom7 != "" && bagnumber_skip7_1 != "") {
        group_number_skip7 += bagnumber_skip7_1 + ',';
      }

      if (bagnumberfrom7 != "" && bagnumber_skip7_2 != "") {
        group_number_skip7 += bagnumber_skip7_2 + ',';
      }

      group_number_skip7 = lastString(group_number_skip7);

      if (group_number7 != "") {
        var NumBag_NumberFrom = parseInt(bagnumberfrom7.split(".").join(""));
        var NumBag_NumberTo = parseInt(bagnumberto7.split(".").join(""));
        var diff = NumBag_NumberTo - NumBag_NumberFrom + 1;
        diff = isNaN(diff) ? '1' : diff;
        var bag_number_int = parseInt(bagnumberfrom7.split(".").join(""));
        group_obj += group_number7 + ';' + group_number_skip7 + ';' + remarkbandnumber7 + ';' + diff + ';' + bag_number_int + ';' + rubberbandnumber7 + '|';
      }
    }

    if (issend4) {
      if (bagnumberfrom4 != "") {
        group_number4 = bagnumberfrom4;
      }

      if (group_number4 != "") {
        var bag_number_int = parseInt(bagnumberfrom4.split(".").join(""));
        group_obj += group_number4 + ';;' + donateformremarktypename4 + ';' + ';' + bag_number_int + ';' + '|';
      }
    }
  }

  if (document.getElementById("isttis1").checked) {
    isttis1 = 1;
  }

  if (document.getElementById("isttis2").checked) {
    isttis2 = 1;
  }

  if (document.getElementById("isonly").checked) {
    isonly = 1;
  }

  if (document.getElementById("isothers").checked) {
    isothers = 1;
  }

  if (document.getElementById("isclottedblood").checked) {
    isclottedblood = 1;
  }

  if (document.getElementById("iscpdaacdblood").checked) {
    iscpdaacdblood = 1;
  }

  if (document.getElementById("isedtablood").checked) {
    isedtablood = 1;
  }

  if (document.getElementById("isexpress1").checked) {
    isexpress1 = 1;
    isexpress = 1;
  }

  if (document.getElementById("isexpress2").checked) {
    isexpress2 = 1;
    isexpress = 2;
  } ////// ติ๊ก


  if (formtype2) {
    var formtype = 2;
  } else {
    var formtype = 1;
  }

  console.log("========");
  console.log(iscpdaacdblood);
  spinnershow();
  $.ajax({
    url: 'blood-donor-record-docment-form-emtry-save.php',
    dataType: 'json',
    data: {
      formtype: formtype,
      // วันที่ส่งตรวจ
      datecheck: datecheck,
      // ติ๊ก
      bagnumberfrom1: bagnumberfrom1,
      // 
      bagnumberto1: bagnumberto1,
      //
      rubberbandnumber1: rubberbandnumber1,
      // 
      remarkbandnumber1: remarkbandnumber1,
      //
      bagnumberfrom2: bagnumberfrom2,
      //
      bagnumberto2: bagnumberto2,
      //
      rubberbandnumber2: rubberbandnumber2,
      //
      remarkbandnumber2: remarkbandnumber2,
      //
      bagnumberfrom3: bagnumberfrom3,
      //
      bagnumberto3: bagnumberto3,
      //
      bagnumber_skip3_1: bagnumber_skip3_1,
      //
      bagnumber_skip3_2: bagnumber_skip3_2,
      //
      rubberbandnumber3: rubberbandnumber3,
      //
      remarkbandnumber3: remarkbandnumber3,
      //
      bagnumberfrom6: bagnumberfrom6,
      //
      bagnumberto6: bagnumberto6,
      //
      bagnumber_skip6_1: bagnumber_skip6_1,
      //
      bagnumber_skip6_2: bagnumber_skip6_2,
      //
      rubberbandnumber6: rubberbandnumber6,
      //
      remarkbandnumber6: remarkbandnumber6,
      //
      bagnumberfrom7: bagnumberfrom7,
      //
      bagnumberto7: bagnumberto7,
      //
      bagnumber_skip7_1: bagnumber_skip7_1,
      //
      bagnumber_skip7_2: bagnumber_skip7_2,
      //
      rubberbandnumber7: rubberbandnumber7,
      //
      remarkbandnumber7: remarkbandnumber7,
      //
      bagnumberfrom4: bagnumberfrom4,
      //
      donateformremarktypeid4: donateformremarktypeid4,
      // ไม่ใช้
      isttis1: isttis1,
      //
      isttis2: isttis2,
      //
      isonly: isonly,
      //
      isothers: isothers,
      //
      textothers: textothers,
      //
      isclottedblood: isclottedblood,
      //
      iscpdaacdblood: iscpdaacdblood,
      //
      isedtablood: isedtablood,
      //
      isexpress: isexpress,
      //
      bagnumberfrom5: bagnumberfrom5,
      //
      donateformremarktypeid5: donateformremarktypeid5,
      //
      donorname5: donorname5,
      //
      donoridcard5: donoridcard5,
      //
      donorpassport5: donorpassport5,
      //
      donorcode5: donorcode5,
      //
      group_obj: group_obj
    },
    type: 'get',
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      if (data.status == true) {
        printJS({
          printable: localurl + "/report/blood-testing-request-form.php?bagnumberfrom1=" + bagnumberfrom1 + "&bagnumberfrom2=" + bagnumberfrom2 + "&bagnumberto1=" + bagnumberto1 + "&bagnumberto2=" + bagnumberto2 + "&textothers=" + textothers + "&isttis1=" + isttis1 + "&isttis2=" + isttis2 + "&isonly=" + isonly + "&isothers=" + isothers + "&isothers=" + isothers + "&isclottedblood=" + isclottedblood + "&datecheck=" + datecheck + "&isedtablood=" + isedtablood + "&iscpdaacdblood=" + iscpdaacdblood + "&isexpress=" + isexpress + "&isexpress1=" + isexpress1 + "&isexpress2=" + isexpress2 + "&code=" + data.runn + "&code2=" + data.runn2 + "&group_obj=" + group_obj,
          type: 'pdf',
          showModal: true
        });
      } else {
        myAlertTopError();
      }
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function getBagNumberSkip(group) {
  var rows = document.getElementById("list_table_blood_number").rows;
  var number_group = "";

  for (var i = 1; i < rows.length; i++) {
    if (rows[i].cells[0].innerHTML == group && rows[i].cells[1].children[0].checked) {
      number_group += rows[i].cells[2].innerHTML + ",";
    }
  }

  return lastString(number_group);
}