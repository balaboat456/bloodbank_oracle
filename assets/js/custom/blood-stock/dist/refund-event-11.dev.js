"use strict";

var countRefundReceivingTypeid_11 = 0;
var dataRefundReceivingTypeid_11 = [];
var outhospitalname = "";

function loadTableBloodrefundReceivingtypeid5() {
  dataRefundReceivingTypeid_11 = [];
  $("#bloodborrowrefunditemid").val("");
  var hospitalid = $("#hospital_pay").val();
  document.getElementById('label_refund_receivingtypeid_11').innerHTML = "ข้อมูลประวัติการยืมเลือดกับ" + outhospitalname;
  clearRefund();
  $.ajax({
    url: 'data/bloodstock/blood_borrow_list_receivingtypeid_11.php?hospitalid=' + hospitalid,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_blood_refund_receivingtypeid_11").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      objBloodpay = obj;
      countRefundReceivingTypeid_11 = 0;
      var event_data = '';
      $.each(obj, function (index, value) {
        var array = {
          bloodborrowid: value.bloodborrowid,
          bloodborrowitemid: value.bloodborrowitemid,
          hospitalid: value.hospitalid,
          bloodstocktypeid: value.bloodstocktypeid
        };
        event_data += '';
        event_data += '<tr onClick="chActiveRefundReceivingTypeid_11(this)" >';
        event_data += '<td  style="display:none;" >';
        event_data += JSON.stringify(array);
        event_data += '</td>';
        event_data += '<td>' + value.bloodborrowcode + '</td>';
        event_data += '<td style="text-align:left;">' + value.group_bloodstocktypename + '</td>';
        event_data += '<td>' + value.group_bloodgroup + '</td>';
        event_data += '<td>' + value.group_sum_bloodgroup + '</td>';
        event_data += '<td>' + value.sum_qty + '</td>';
        event_data += '<td >' + value.group_bloodstockmaindate + '</td>';
        event_data += '<td>' + value.group_bloodstocktypename_pay + '</td>';
        event_data += '<td>' + value.group_bloodgroup_pay + '</td>';
        event_data += '<td>' + value.group_sum_bloodgroup_pay + '</td>';
        event_data += '<td>' + value.sum_payqty + '</td>';
        event_data += '<td >' + value.group_bloodstockpaymaindate_pay + '</td>';
        event_data += '<td >' + (value.sum_qty - value.sum_payqty) + '</td>';
        event_data += '</tr>';
        countRefundReceivingTypeid_11++;
      });
      $("#list_blood_refund_receivingtypeid_11").append(event_data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function chActiveRefundReceivingTypeid_11(self) {
  var table = document.getElementById("list_blood_refund_receivingtypeid_11");
  var r = 1;

  while (row = table.rows[r++]) {
    row.style.background = "#FFF";
  }

  self.style.background = "#b7e4eb";
  console.log(self.cells[0]);
  var item = JSON.parse(self.cells[0].innerHTML);
  console.log(item);
  dataRefundReceivingTypeid_11 = item;
}

function confirmchReceivingTypeid_11() {
  var item = dataRefundReceivingTypeid_11; // console.log(item.hospitalid);

  if (item.length == 0) {
    swal({
      title: "กรุณาเลือกรายการที่ต้องการคืนเลือด",
      type: 'warning',
      confirmButtonText: 'OK',
      allowOutsideClick: false
    });
    return false;
  }

  console.log(item);
  $("#outbloodborrowid").val(item.bloodborrowid);
  $("#outbloodborrowitemid").val(item.bloodborrowitemid);
  $("#outhospitalid").val(item.hospitalid); // if(item.bloodstocktypeid == "CRYO")
  // {
  //     $("#outbloodgroup").val(item.bloodstocktypeid);
  // }else
  // {
  //     $("#outbloodgroup").val(item.blood_group_borrow);
  // }

  closeBloodRefund5();
}

function clearRefund() {
  $("#outbloodborrowid").val("");
  $("#outbloodborrowitemid").val("");
  $("#outbloodgroup").val("");
  $("#bloodstockpaymainremark").val("");
}