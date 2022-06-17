"use strict";

var countReceivingTypeid_6 = 0;
var dataReceivingTypeid_6 = [];

function loadTableBloodBorrowReceivingtypeid6(receivingtypeid) {
  dataReceivingTypeid_6 = [];
  $("#bloodborrowitemid").val("");
  var vhospital = $("#hospital").val();
  $.ajax({
    url: 'data/bloodstock/blood_borrow_list_receivingtypeid_1.php?receivingtypeid=' + receivingtypeid + "&hospitalid=" + vhospital,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      var body = document.getElementById("list_blood_borrow_receivingtypeid_6").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      countReceivingTypeid_6 = 0;
      var event_data = '';
      $.each(obj, function (index, value) {
        // Group A
        if (value.a_qty > 0) {
          value.blood_group_borrow = "A";
          value.qty = value.a_qty - value.a_qty_get;
          event_data += '';
          event_data += '<tr onClick="chActiveReceivingTypeid_6(this)" >';
          event_data += '<td  style="display:none;" >';
          event_data += JSON.stringify(value);
          event_data += '</td>';
          event_data += '<td >' + getDMY(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodborrowantigen + '</td>';
          event_data += '<td>' + value.blood_group_borrow + '</td>';
          event_data += '<td>' + value.a_qty_get + '</td>';
          event_data += '<td>' + (value.a_qty - value.a_qty_get) + '</td>';
          event_data += '</tr>';
          countReceivingTypeid_6++;
        } // Group B


        if (value.b_qty > 0) {
          value.blood_group_borrow = "B";
          value.qty = value.b_qty - value.b_qty_get;
          event_data += '';
          event_data += '<tr onClick="chActiveReceivingTypeid_6(this)">';
          event_data += '<td  style="display:none;" >';
          event_data += JSON.stringify(value);
          event_data += '</td>';
          event_data += '<td >' + getDMY(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodborrowantigen + '</td>';
          event_data += '<td>' + value.blood_group_borrow + '</td>';
          event_data += '<td>' + value.b_qty_get + '</td>';
          event_data += '<td>' + (value.b_qty - value.b_qty_get) + '</td>';
          event_data += '</tr>';
          countReceivingTypeid_6++;
        } // Group O


        if (value.o_qty > 0) {
          value.blood_group_borrow = "O";
          value.qty = value.o_qty - value.o_qty_get;
          event_data += '';
          event_data += '<tr onClick="chActiveReceivingTypeid_6(this)">';
          event_data += '<td  style="display:none;" >';
          event_data += JSON.stringify(value);
          event_data += '</td>';
          event_data += '<td >' + getDMY(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodborrowantigen + '</td>';
          event_data += '<td>' + value.blood_group_borrow + '</td>';
          event_data += '<td>' + value.o_qty_get + '</td>';
          event_data += '<td>' + (value.o_qty - value.o_qty_get) + '</td>';
          event_data += '</tr>';
          countReceivingTypeid_6++;
        } // Group AB


        if (value.ab_qty > 0) {
          value.blood_group_borrow = "AB";
          value.qty = value.ab_qty - value.ab_qty_get;
          event_data += '';
          event_data += '<tr onClick="chActiveReceivingTypeid_6(this)">';
          event_data += '<td  style="display:none;" >';
          event_data += JSON.stringify(value);
          event_data += '</td>';
          event_data += '<td >' + getDMY(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodborrowantigen + '</td>';
          event_data += '<td>' + value.blood_group_borrow + '</td>';
          event_data += '<td>' + value.ab_qty_get + '</td>';
          event_data += '<td>' + (value.ab_qty - value.ab_qty_get) + '</td>';
          event_data += '</tr>';
          countReceivingTypeid_6++;
        } // Group cryo_qty


        if (value.cryo_qty > 0) {
          value.blood_group_borrow = "";
          value.qty = value.cryo_qty - value.cryo_qty_get;
          event_data += '';
          event_data += '<tr onClick="chActiveReceivingTypeid_1(this)">';
          event_data += '<td  style="display:none;" >';
          event_data += JSON.stringify(value);
          event_data += '</td>';
          event_data += '<td >' + getDMY(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodstocktypename2 + '</td>';
          event_data += '<td style="text-align:left;">' + value.bloodborrowantigen + '</td>';
          event_data += '<td>' + value.blood_group_borrow + '</td>';
          event_data += '<td>' + value.cryo_qty_get + '</td>';
          event_data += '<td>' + (value.cryo_qty - value.cryo_qty_get) + '</td>';
          event_data += '</tr>';
          countReceivingTypeid_6++;
        }
      });
      $("#list_blood_borrow_receivingtypeid_6").append(event_data);
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function chActiveReceivingTypeid_6(self) {
  var table = document.getElementById("list_blood_borrow_receivingtypeid_6");
  var r = 1;

  while (row = table.rows[r++]) {
    row.style.background = "#FFF";
  }

  self.style.background = "#b7e4eb";
  var item = JSON.parse(self.cells[0].innerHTML);
  dataReceivingTypeid_6 = item;
  chk_bag_icon++;
}

function confirmchReceivingTypeid_6() {
  var item = dataReceivingTypeid_6;

  if (item.length == 0) {
    swal({
      title: "กรุณาเลือกรายการที่จะรับเลือด",
      type: 'warning',
      confirmButtonText: 'OK',
      allowOutsideClick: false
    });
    return false;
  }

  setDataModalSelectValue('bloodstocktypecross', item.bloodstocktypeid, item.bloodstocktypename2);
  setDataModalSelectValue('bloodgroupcross', item.blood_group_borrow, item.blood_group_borrow);
  $("#bloodborrowitemid").val(item.bloodborrowitemid); // $("#qty").val(item.qty);

  $("#qty").val();
  if (item.bloodstocktypeid == 'CRYO') $("#volume").val("10"); // document.getElementById('phenotype').value = item.bloodborrowantigen;
  // document.getElementById('phenotypeLable').innerHTML = item.bloodborrowantigen;

  setVolume(item.bloodstocktypeid);
  closeBloodBorrow6();
}