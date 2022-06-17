"use strict";

var item_lab_new;

function chActive(id, self) {
  // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);
  for (i = 0; i < count; i++) {
    document.getElementById("trblood" + i).style.background = stylecolor[i];
  }

  document.getElementById("trblood" + id).style.background = "#b7e4eb";
  var item = JSON.parse(self.cells[0].innerHTML);
  item_lab_new = item;
  $("#remarkcancelitem").val("");
  loadCheckRequestTab2_item1(item.labid, item.checkresultbloodstatusid);
  loadCheckRequestTab2_item2(item.labcheckrequestid);
  $("#labcheckrequestid").val(item.labcheckrequestid);
  document.getElementById("btnSave").style.visibility = 'visible';
}

function cancelItem() {
  var valremarkcancelitem = $("#remarkcancelitem").val();
  swal({
    title: "สาเหตุการปฏิเสธสิ่งส่งตรวจ",
    type: "input",
    inputValue: valremarkcancelitem,
    inputPlaceholder: "กรุณาระบุสาเหตุการปฏิเสธสิ่งส่งตรวจ",
    showCloseButton: true,
    showCancelButton: true,
    // dangerMode: true,
    cancelButtonClass: "",
    confirmButtonClass: "btn-success",
    confirmButtonText: "ตกลง",
    cancelButtonText: "ยกเลิก",
    closeOnConfirm: true
  }, function (inputValue) {
    if (inputValue) {
      console.log(inputValue);
      $("#remarkcancelitem").val(inputValue);
    }
  });
}