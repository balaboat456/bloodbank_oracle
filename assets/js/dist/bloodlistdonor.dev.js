"use strict";

var bagnumberArray1 = [];
var bagnumberArray2 = [];
var bagnumber1Min = 0;
var bagnumber1Max = 0;
var bagnumber2Min = 0;
var bagnumber2Max = 0;
var bagnumberQty1 = 0;
var bagnumberQty2 = 0;
var donateformremarktypename4 = '';
var donateformremarktypename5 = '';

function loadTable() {
  var active = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  spinnershow();
  var keyword = '';
  var fromdate = '';
  var todate = '';
  var bloodgroup = '';
  var donatestatus = '';
  var donation_type_id = '';
  var inspectorid = '';
  keyword = $("#keyword").val();
  barcode = $("#barcode").val();

  if (!keyword && !barcode) {
    fromdate = dmyToymd2($("#fromdate").val());
    todate = dmyToymd2($("#todate").val());
    bloodgroup = $("#bloodgroup").val();
    donation_type_id = $("#donation_type_id").val();
    inspectorid = $("#inspectorid").val();
    donatestatus = $("#donatestatus").val();
  }

  $.ajax({
    url: 'data/blood/blooddonorlist.php?keyword=' + keyword + '&fromdate=' + fromdate + '&todate=' + todate + '&bloodgroup=' + bloodgroup + '&donatestatus=' + donatestatus + '&barcode=' + barcode + '&donation_type_id=' + donation_type_id + '&inspectorid=' + inspectorid + '&activepage=' + active + '&numrows=' + 25,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_table_blood").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var event_data = ''; // var start = data.pagination.start;

      $("#total").text("รวมทั้งหมด " + data.total + " ราย");
      bagnumberArray1 = [];
      bagnumberArray2 = [];
      $.each(data.data, function (index, value) {
        event_data += '<tr>';
        event_data += '<td>' + getDMY2(value.donation_date) + '</td>';
        event_data += '<td>' + value.donorcode + '</td>';
        event_data += '<td>' + value.donoridcard + '</td>';
        event_data += '<td>' + value.fname + ' ' + value.lname + '</td>';
        event_data += '<td>' + value.bag_number + '</td>';
        event_data += '<td>' + value.blood_group + '</td>';
        event_data += '<td>' + value.donation_qty + '</td>';
        event_data += '<td>' + value.qtycount + '</td>';
        event_data += '<td>' + value.donation_type_name + '</td>';
        event_data += '<td>' + (value.inspectorid_fullnull != null ? value.inspectorid_fullnull : '') + '</td>';
        event_data += '<td>' + (value.donatestatusname != null ? value.donatestatusname : '') + '</td>';
        event_data += '<td>';
        event_data += '<button type="button" onclick="editPage(' + value.donateid + ')"  class="btn btn-success m-l-5">';
        event_data += '<i class="fa fa-edit"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
        var NumBag_Number1 = parseInt(value.bag_number.split(".").join(""));
        if (!isNaN(NumBag_Number1)) if (value.bag_number.substring(7, 8) == 0) bagnumberArray1.push(NumBag_Number1);
        var NumBag_Number2 = parseInt(value.bag_number.split(".").join(""));
        if (!isNaN(NumBag_Number2)) if (value.bag_number.substring(7, 8) == 1) bagnumberArray2.push(NumBag_Number2);
      });

      if (bagnumberArray1.length > 0) {
        bagnumber1Min = Math.min.apply(Math, bagnumberArray1);
        bagnumber1Max = Math.max.apply(Math, bagnumberArray1);
        $("#bagnumberfrom1").val(numnerPoint(String(bagnumber1Min)));
        $("#bagnumberto1").val(numnerPoint(String(bagnumber1Max)));
      } else {
        $("#bagnumberfrom1").val("");
        $("#bagnumberto1").val("");
      }

      if (bagnumberArray2.length > 0) {
        bagnumber2Min = Math.min.apply(Math, bagnumberArray2);
        bagnumber2Max = Math.max.apply(Math, bagnumberArray2);
        $("#bagnumberfrom2").val(numnerPoint(String(bagnumber2Min)));
        $("#bagnumberto2").val(numnerPoint(String(bagnumber2Max)));
      } else {
        $("#bagnumberfrom2").val("");
        $("#bagnumberto2").val("");
      }

      $("#list_table_blood").append(event_data); // pagination(data.pagination);

      setTableNumber();
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

function setTableNumber() {
  var body = document.getElementById("list_table_blood_number").getElementsByTagName('tbody')[0];

  while (body.firstChild) {
    body.removeChild(body.firstChild);
  }

  var bagnumberfrom1 = $("#bagnumberfrom1").val();
  var bagnumberto1 = $("#bagnumberto1").val();
  var bagnumberfrom2 = $("#bagnumberfrom2").val();
  var bagnumberto2 = $("#bagnumberto2").val();

  if (bagnumberfrom1.length == 14 && bagnumberto1.length == 14) {
    setLoopNumber(bagnumberfrom1, bagnumberto1, bagnumber1Min, bagnumber1Max, 1, 'รพ.ราชวิถี');
  }

  if (bagnumberfrom2.length == 14 && bagnumberto2.length == 14) {
    setLoopNumber(bagnumberfrom2, bagnumberto2, bagnumber2Min, bagnumber2Max, 2, 'หน่วยเคลื่อนที่');
  }

  calRubberbandnumberQtyAll();
}

function setLoopNumber(bagnumberfrom, bagnumberto, Min, Max, rowgroup) {
  var rowname = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : "";

  try {
    var NumBag_NumberFrom = parseInt(bagnumberfrom.split(".").join(""));
    var NumBag_NumberTo = parseInt(bagnumberto.split(".").join(""));

    if (rowgroup == 1) {
      bagnumberQty1 = NumBag_NumberTo - NumBag_NumberFrom + 1;
    } else if (rowgroup == 2) {
      bagnumberQty2 = NumBag_NumberTo - NumBag_NumberFrom + 1;
    }

    var count = 0;
    var event_data = '';
    /*
    event_data += '<tr>';
    event_data += '<td style="display:none;">0</td>';
    event_data += '<td style="display:none;"><input class="big-checkbox-20" type="checkbox" ></td>';
    event_data += '<td colspan="2"><b>'+rowname+'</b></td>';
    event_data += '</tr>';
    */

    for (var i = NumBag_NumberFrom; i <= NumBag_NumberTo; i++) {
      var status = true;
      var bag_number = i;
      $.each(bagnumberArray1, function (index, value) {
        if (bag_number == value) {
          status = false;
        }
      });

      if (status && bag_number >= Min && bag_number <= Max) {
        event_data += '<tr>';
        event_data += '<td style="display:none;">' + rowgroup + '</td>';
        event_data += '<td><input class="big-checkbox-20" type="checkbox" checked onclick="calRubberbandnumberQtyAll();" ></td>';
        event_data += '<td>' + numnerPoint(bag_number.toString()) + '</td>';
        event_data += '</tr>';
        count++;
      }
    }

    $("#list_table_blood_number").append(event_data);
  } catch (err) {
    alert("ไม่สามารถจัดเรียงหมายเลขถุงสำหรับแบบฟอร์มส่งตรวจได้");
  }
}

function setUnChecked(checkedState) {
  var rows = document.getElementById("list_table_blood_number").rows;

  for (var i = 1; i < rows.length; i++) {
    rows[i].cells[1].children[0].checked = checkedState;
  }
}

function scanBarcode() {
  var bag_number = $('#barcode').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#barcode').val(bag_number_new);

  if (bag_number_new.length == 14) {
    loadTable();
  } else if (bag_number_new.length == 0) {
    loadTable();
  }
}

function setFormType(typeid) {
  document.getElementById("div_display1").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_display2").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_display3").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_display4").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_display6").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_display7").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_table_skip").style.visibility = typeid == 2 ? 'hidden' : 'visible';
  document.getElementById("div_display5").style.visibility = typeid == 1 ? 'hidden' : 'visible';
}

function calRubberbandnumberQtyAll() {
  calRubberbandnumberQty1();
  calRubberbandnumberQty2();
  calRubberbandnumberQty3();
  calRubberbandnumberQty6();
  calRubberbandnumberQty7();
}

function calRubberbandnumberQty1() {
  var bagnumberfrom1 = $("#bagnumberfrom1").val();
  var bagnumberto1 = $("#bagnumberto1").val();

  if (bagnumberto1 == "") {
    bagnumberto1 = bagnumberfrom1;
  }

  var NumBag_NumberFrom = parseInt(bagnumberfrom1.split(".").join(""));
  var NumBag_NumberTo = parseInt(bagnumberto1.split(".").join(""));
  var qty = NumBag_NumberTo - NumBag_NumberFrom + 1;

  if (bagnumberfrom1.length == 14 && bagnumberto1.length == 14) {
    var skip_qty = 0;
    var group_number_skip1 = getBagNumberSkip(1);

    if (group_number_skip1 != "") {
      skip_qty = group_number_skip1.split(",").length;
    }

    $("#rubberbandnumber1").val(qty - skip_qty);
    $("#rubberoldbandnumber1").val(qty - skip_qty);
  } else {
    $("#rubberbandnumber1").val("");
    $("#rubberoldbandnumber2").val("");
  }
}

function calRubberbandnumberQty2() {
  var bagnumberfrom2 = $("#bagnumberfrom2").val();
  var bagnumberto2 = $("#bagnumberto2").val();

  if (bagnumberto2 == "") {
    bagnumberto2 = bagnumberfrom2;
  }

  var NumBag_NumberFrom = parseInt(bagnumberfrom2.split(".").join(""));
  var NumBag_NumberTo = parseInt(bagnumberto2.split(".").join(""));
  var qty = NumBag_NumberTo - NumBag_NumberFrom + 1;

  if (bagnumberfrom2.length == 14 && bagnumberto2.length == 14) {
    var skip_qty = 0;
    var group_number_skip2 = getBagNumberSkip(2);

    if (group_number_skip2 != "") {
      skip_qty = group_number_skip2.split(",").length;
    }

    $("#rubberbandnumber2").val(qty - skip_qty);
    $("#rubberoldbandnumber2").val(qty - skip_qty);
  } else {
    $("#rubberbandnumber2").val("");
    $("#rubberoldbandnumber2").val("");
  }
}

function calRubberbandnumberQty3() {
  var bagnumberfrom3 = $("#bagnumberfrom3").val();
  var bagnumberto3 = $("#bagnumberto3").val();

  if (bagnumberto3 == "") {
    bagnumberto3 = bagnumberfrom3;
  }

  var NumBag_NumberFrom = parseInt(bagnumberfrom3.split(".").join(""));
  var NumBag_NumberTo = parseInt(bagnumberto3.split(".").join(""));
  var qty = NumBag_NumberTo - NumBag_NumberFrom + 1;

  if (bagnumberfrom3.length == 14 && bagnumberto3.length == 14) {
    skip_qty1 = $("#bagnumber_skip3_1").val().length == 14 ? 1 : 0;
    skip_qty2 = $("#bagnumber_skip3_2").val().length == 14 ? 1 : 0;
    $("#rubberbandnumber3").val(qty - skip_qty1 - skip_qty2);
    $("#rubberoldbandnumber3").val(qty - skip_qty1 - skip_qty2);
  } else {
    $("#rubberbandnumber3").val("");
    $("#rubberoldbandnumber3").val("");
  }
}

function calRubberbandnumberQty6() {
  var bagnumberfrom6 = $("#bagnumberfrom6").val();
  var bagnumberto6 = $("#bagnumberto6").val();

  if (bagnumberto6 == "") {
    bagnumberto6 = bagnumberfrom6;
  }

  var NumBag_NumberFrom = parseInt(bagnumberfrom6.split(".").join(""));
  var NumBag_NumberTo = parseInt(bagnumberto6.split(".").join(""));
  var qty = NumBag_NumberTo - NumBag_NumberFrom + 1;

  if (bagnumberfrom6.length == 14 && bagnumberto6.length == 14) {
    skip_qty1 = $("#bagnumber_skip6_1").val().length == 14 ? 1 : 0;
    skip_qty2 = $("#bagnumber_skip6_2").val().length == 14 ? 1 : 0;
    $("#rubberbandnumber6").val(qty - skip_qty1 - skip_qty2);
    $("#rubberoldbandnumber6").val(qty - skip_qty1 - skip_qty2);
  } else {
    $("#rubberbandnumber6").val("");
    $("#rubberoldbandnumber6").val("");
  }
}

function calRubberbandnumberQty7() {
  var bagnumberfrom7 = $("#bagnumberfrom7").val();
  var bagnumberto7 = $("#bagnumberto7").val();

  if (bagnumberto7 == "") {
    bagnumberto7 = bagnumberfrom7;
  }

  var NumBag_NumberFrom = parseInt(bagnumberfrom7.split(".").join(""));
  var NumBag_NumberTo = parseInt(bagnumberto7.split(".").join(""));
  var qty = NumBag_NumberTo - NumBag_NumberFrom + 1;

  if (bagnumberfrom7.length == 14 && bagnumberto7.length == 14) {
    skip_qty1 = $("#bagnumber_skip7_1").val().length == 14 ? 1 : 0;
    skip_qty2 = $("#bagnumber_skip7_2").val().length == 14 ? 1 : 0;
    $("#rubberbandnumber7").val(qty - skip_qty1 - skip_qty2);
    $("#rubberoldbandnumber7").val(qty - skip_qty1 - skip_qty2);
  } else {
    $("#rubberbandnumber7").val("");
    $("#rubberoldbandnumber7").val("");
  }
}