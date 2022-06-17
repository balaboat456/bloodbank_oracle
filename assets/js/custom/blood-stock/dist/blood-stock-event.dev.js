"use strict";

var countBloodStockPay = 0;
var dataBloodStockPay = [];
var objBloodStockPay = [];
var outhospitalname = "";

function loadTableBloodStockPay() {
  var receivingtypeid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  dataBloodStockPay = [];
  $("#bloodborrowrefunditemid").val("");
  var hospitalid = $("#hospital").val(); // document.getElementById('label_stock_pay').innerHTML   = "ข้อมูลประวัติการแลกเลือดกับ"+outhospitalname;

  clearRefund();
  $.ajax({
    url: 'data/bloodstock/blood_stock_pay.php?hospitalid=' + hospitalid + "&receivingtypeid=" + receivingtypeid,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_blood_stock_pay").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      objBloodStockPay = obj;
      countBloodStockPay = 0;
      var event_data = '';
      $.each(obj, function (index, value) {
        var sum_bloodgroup2 = value.sum_bloodgroup2.replaceAll("<br/><hr/>", ",");
        var sum_bloodgroup2_array = sum_bloodgroup2.split(",");
        var sum_get = 0;
        $.each(sum_bloodgroup2_array, function (idx, v) {
          sum_get += parseInt(v);
        });
        chk = value.sum_bloodgroup - value.sum_group_bloodgroup2;
        event_data += '';
        event_data += '<tr onClick="chActiveBloodStockPay(this)" >';
        event_data += '<td  style="display:none;" >';
        event_data += index;
        event_data += '</td>';
        event_data += '<td>' + value.bloodstockpaymaincode + '</td>';
        event_data += '<td style="text-align:left;">' + value.group_bloodstocktypename + '</td>';
        event_data += '<td>' + value.group_bloodgroup + '</td>';
        event_data += '<td>' + value.group_sum_bloodgroup + '</td>';
        event_data += '<td>' + value.sum_bloodgroup + '</td>';
        event_data += '<td >' + getDMY(value.formatbloodstockpaydatetime) + '</td>';
        event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
        event_data += '<td>' + value.bloodgroup2 + '</td>';
        event_data += '<td>' + value.sum_bloodgroup2 + '</td>';
        event_data += '<td>' + value.sum_group_bloodgroup2 + '</td>';
        event_data += '<td >' + value.bloodstockmaindate2 + '</td>';

        if (chk < 0) {
          event_data += '<td ><font color="red">' + chk + '<font></td>';
        } else {
          event_data += '<td>' + chk + '</td>';
        }

        event_data += '</tr>';
        countBloodStockPay++;
      });
      $("#list_blood_stock_pay").append(event_data);
      console.log(data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function chActiveBloodStockPay(self) {
  var table = document.getElementById("list_blood_stock_pay");
  var r = 1;

  while (row = table.rows[r++]) {
    row.style.background = "#FFF";
  }

  self.style.background = "#b7e4eb";
  var index = self.cells[0].innerHTML;
  var item = objBloodStockPay[parseInt(index)];
  dataBloodStockPay = item;
  chk_bag_icon++;
}

function confirmchBloodStockPay() {
  var item = dataBloodStockPay;

  if (item.length == 0) {
    swal({
      title: "กรุณาเลือกรายการที่ต้องการ",
      type: 'warning',
      confirmButtonText: 'OK',
      allowOutsideClick: false
    });
    return false;
  }

  var receivingtypeid = $("#receivingtypeid").val();
  console.log(receivingtypeid);
  $("#bloodstockpaygroupdate").val(item.formatbloodstockpaydatetime);
  $("#bloodstockpaymainid").val(item.bloodstockpaymainid);

  if (receivingtypeid == 5 || receivingtypeid == 6 || receivingtypeid == 11 || receivingtypeid == 12) {
    setDataModalSelectValue('bloodgroupcross', '', '');
  } else {
    setDataModalSelectValue('bloodgroupcross', item.bloodgroup, item.bloodgroup);
    setDataModalSelectValue('bloodstocktypecross', item.bloodtype, item.bloodstocktypename1);
  }

  if (item.bloodtype == 'CRYO') {
    $("#volume").val("10");
  } // else if (item.bloodtype == 'FFP') {
  //     $("#volume").val("200");
  // }


  closeBloodStockPay();
}

function clearRefund() {
  $("#outbloodborrowid").val("");
  $("#bloodstockpaymainid").val("");
  $("#outbloodborrowitemid").val("");
  $("#outbloodgroup").val("");
  $("#bloodstockpaymainremark").val("");
  $("#bloodstockpaygroupdate").val("");
}