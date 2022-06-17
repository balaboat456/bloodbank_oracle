"use strict";

$(document).ready(function () {
  $("#barcodecross2").on('keydown', function (e) {
    if (e.which == 13) {
      var bloodstocktypecross = $("#bloodstocktypecross").val();
      var barcodecross = $('#barcodecross').val();
      var v1 = barcodecross.replace('.', "");
      v1 = v1.replace('.', "");
      v1 = v1.replace('.', "");
      v1 = v1.replace('.', "");
      var v2 = this.value.replace('.', "");
      v2 = v2.replace('.', "");
      v2 = v2.replace('.', "");
      v2 = v2.replace('.', "");
      v2 = v2.substring(1, v2.length);
      v2 = v2.substring(0, v2.length - 1);

      if (v1 == v2) {
        searchBagNumberInTable(barcodecross, bloodstocktypecross);
      } else {
        swal({
          title: 'หมายเลขถุงไม่ตรงกัน',
          type: "warning",
          showCancelButton: false,
          confirmButtonText: 'OK',
          confirmButtonClass: "btn-danger",
          closeOnConfirm: true
        }).then(function (isConfirm) {
          if (isConfirm) {
            document.getElementById("barcodecross").value = "";
            document.getElementById("barcodecross2").value = "";
            document.getElementById("barcodecross").focus();
          }
        });
      }
    }
  });
  /*
    $("#rfidcodescan").on('keyup', function(e) {
        
        if (e.which == 13) {
            var  rfid = this.value ;
          if(rfid.length > 0)
          {
              var arr = arrInputRFID();
                var arrState = false ;
              arr.forEach(function (item,index) {
                    var v_rfid = document.getElementById(item).value ;
                    if(v_rfid == rfid)
                  {
                      var elm_rfid = document.getElementById(item);
                        var bagnumber = elm_rfid.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.children[1].children[6].children[0].children[1].children[1].innerText
                      
                      arrState = true ;
                        v_elm_rfid = item.replace(/[0-9]/g, '');
                      v_elm_rfid = v_elm_rfid.replace('rfid', '');
                        v_elm_rfid = v_elm_rfid.toLocaleUpperCase();
                        searchBagNumberInTable(bagnumber,v_elm_rfid);
                    }
                  });
                document.getElementById("rfidcodescan").value = "";
                if(!arrState)
              {
                  swal({
                          title: 'ไม่พบข้อมูล',
                          type: "warning",
                          showCancelButton: false,
                          confirmButtonText: 'OK',
                          confirmButtonClass: "btn-danger",
                          closeOnConfirm: true
                      }).then(function(isConfirm) {
                          if (isConfirm) {
                              
                              document.getElementById("rfidcodescan").focus();
                      }
                  });
              }
            }
          
        }
  });
    */

  $('.bloodstocktypecross').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "",
    width: "100%",
    templateResult: function templateResult(state) {
      if (!state.id) {
        return state.text;
      }

      var strState = state.text.split("|");
      var $state = $('<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>');
      return $state;
    },
    templateSelection: function templateSelection(state) {
      if (!state.id) {
        return state.text;
      }

      var strState = state.text.split("|");
      var $state = $('<span class="select2-span3">' + strState[0] + '</span>');
      return $state;
    }
  }).on("select2:selecting", function (e) {
    setTimeout(function () {
      document.getElementById("barcodecross").focus();
    }, 200);
  });
  /*
  $('.bloodstocktypecross').select2({
      allowClear: true,
      theme: "bootstrap",
      placeholder: "",
      width: "100%",
      ajax: {
          url: 'data/masterdata/bloodstocktype.php',
          dataType: 'json',
          type: "GET",
          quietMillis: 50,
          data: function(keyword) {
              return {
                  keyword: keyword.term,
              };
          },
          processResults: function(data) {
              return {
                  results: $.map(data.data, function(item) {
                      return {
                          id: item.bloodstocktypeid,
                          text: "["+item.bloodstocktypecode+"] "+item.bloodstocktypename2,
                          item:item.bloodstocktypename2
                      }
                  })
              };
          },
        }
  }).on("select2:selecting", function(e) {
      var id = 'bloodstocktypecross';
      setDataModalSelectValue(id,e.params.args.data.id,e.params.args.data.item);
      console.log(e.params.args.data.id+'   '+e.params.args.data.item)
    });
  */
});
var counter;

function scanRFIDStock(rfid) {
  var count = 20;
  if (counter) clearInterval(counter);
  counter = setInterval(timer, 100); //1000 will  run it every 1 second

  function timer() {
    count = count - 1;

    if (count <= 0) {
      clearInterval(counter);
      var numberArray = rfid.split(",");
      $.each(numberArray, function (index, value) {
        if (value != "") {
          findRFIDStock(value);
        }
      });
      return;
    } //Do code for showing the number of seconds here

  }
}

function findRFIDStock(rfid) {
  var arr = arrInputRFID();
  console.log(arr);
  var arrState = false;
  arr.forEach(function (item, index) {
    var v_rfid = document.getElementById(item).value;

    if (v_rfid == rfid) {
      var elm_rfid = document.getElementById(item);
      var bagnumber = elm_rfid.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.children[1].children[6].children[0].children[1].children[1].innerText;
      arrState = true;
      v_elm_rfid = item.replace(/[0-9]/g, '');
      v_elm_rfid = v_elm_rfid.replace('rfid', '');
      v_elm_rfid = v_elm_rfid.toLocaleUpperCase();
      searchBagNumberInTable(bagnumber, v_elm_rfid);
    }
  });
  document.getElementById("rfidcodescan").value = "";
  /*
  if(!arrState)
  {
      swal({
              title: 'ไม่พบข้อมูล',
              type: "warning",
              showCancelButton: false,
              confirmButtonText: 'OK',
              confirmButtonClass: "btn-danger",
              closeOnConfirm: true
          }).then(function(isConfirm) {
              if (isConfirm) {
                  
                  document.getElementById("rfidcodescan").focus();
          }
      });
  }
  */
}

function arrInputRFID() {
  var arr = [];
  var count = parseInt($("#countblood2").val());

  for (var i = 0; i < count; i++) {
    var prcrfid = document.getElementById("prcrfid" + i);
    var lprcrfid = document.getElementById("lprcrfid" + i);
    var ffprfid = document.getElementById("ffprfid" + i);
    var pcrfid = document.getElementById("pcrfid" + i);
    var lppcrfid = document.getElementById("lppcrfid" + i);
    var lppc_pasrfid = document.getElementById("lppc_pasrfid" + i);
    var sdprfid = document.getElementById("sdprfid" + i);
    var sdp_pasrfid = document.getElementById("sdp_pasrfid" + i);
    var wbrfid = document.getElementById("wbrfid" + i);
    var ldprcrfid = document.getElementById("ldprcrfid" + i);
    var sdrrfid = document.getElementById("sdrrfid" + i);

    if (prcrfid != null) {
      arr.push(prcrfid.name);
    }

    if (lprcrfid != null) {
      arr.push(lprcrfid.name);
    }

    if (ffprfid != null) {
      arr.push(ffprfid.name);
    }

    if (pcrfid != null) {
      arr.push(pcrfid.name);
    }

    if (lppcrfid != null) {
      arr.push(lppcrfid.name);
    }

    if (lppc_pasrfid != null) {
      arr.push(lppc_pasrfid.name);
    }

    if (sdprfid != null) {
      arr.push(sdprfid.name);
    }

    if (sdp_pasrfid != null) {
      arr.push(sdp_pasrfid.name);
    }

    if (wbrfid != null) {
      arr.push(wbrfid.name);
    }

    if (ldprcrfid != null) {
      arr.push(ldprcrfid.name);
    }

    if (sdrrfid != null) {
      arr.push(sdrrfid.name);
    }
  }

  return arr;
}

function scanBarcodeCross() {
  var bag_number = $('#barcodecross').val();
  var bag_number_new = numnerPoint2(bag_number);
  $('#barcodecross').val(bag_number_new);

  if (bag_number_new.length == 14) {
    var bloodstocktypecross = $("#bloodstocktypecross").val(); // document.getElementById("barcodecross2").focus();

    searchBagNumberInTable(bag_number_new, bloodstocktypecross, true);
  }
}

function scanBarcodePointBC() {
  var bag_number = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var bag_number_new = numnerPointBC(bag_number);
  $('#barcodecross2').val(bag_number_new);
}

function searchBagNumberInTable() {
  var barcodecross = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var bloodstocktypecross = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
  var stateSigle = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
  var state = false;
  var rowTable = 0;
  var rows = document.getElementById("list_table_json").rows;

  if (bloodstocktypecross == null) {
    swal({
      title: 'กรุณาเลือกชนิดเลือด',
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      confirmButtonClass: "btn-danger",
      closeOnConfirm: true
    }).then(function (isConfirm) {
      if (isConfirm) {
        document.getElementById("bloodstocktypecross").focus();
      }
    });
  }

  for (var i = 3; i < rows.length; i++) {
    if (rows[i].cells[1].children[6].children[0].children[1].children[1].children[0].innerText == barcodecross) {
      state = true;
      rowTable = i;
    }
  }

  if (state) {
    var rowType = "";
    var remarkvalue = "";

    if (bloodstocktypecross == "PRC") {
      rowType = rows[rowTable].cells[3];
      remarkvalue = $("#prcremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "LPRC") {
      rowType = rows[rowTable].cells[4];
      remarkvalue = $("#lprcremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "FFP") {
      rowType = rows[rowTable].cells[5];
      remarkvalue = $("#ffpremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "PC") {
      rowType = rows[rowTable].cells[6];
      remarkvalue = $("#pcremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "LPPC") {
      rowType = rows[rowTable].cells[7];
      remarkvalue = $("#lppcremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "LPPC_PAS") {
      rowType = rows[rowTable].cells[8];
      remarkvalue = $("#lppc_pasremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "SDP") {
      rowType = rows[rowTable].cells[9];
      remarkvalue = $("#sdpremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "SDP_PAS") {
      rowType = rows[rowTable].cells[10];
      remarkvalue = $("#sdp_pasremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "WB") {
      rowType = rows[rowTable].cells[11];
      remarkvalue = $("#wbremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "LDPRC") {
      rowType = rows[rowTable].cells[12];
      remarkvalue = $("#ldprcremark" + (rowTable - 3)).val();
    } else if (bloodstocktypecross == "SDR") {
      rowType = rows[rowTable].cells[13];
      remarkvalue = $("#sdrremark" + (rowTable - 3)).val();
    }

    var valuebloodstatus = $("#bloodstatusid" + (rowTable - 3)).val();

    if (rowType.innerText != undefined && rowType.innerText != "") {
      var stockObj = {
        volume: rowType.children[0].children[0].children[0].children[0].children[0].value,
        bloodstart: rows[rowTable].cells[1].children[6].children[0].children[1].children[0].innerText,
        bloodexp: rowType.children[0].children[0].children[0].children[1].children[0].value,
        bloodstockrfid: rowType.children[0].children[0].children[1].children[0].children[0].value,
        bloodstocktypecross: bloodstocktypecross,
        bag_number: barcodecross,
        sub: 1,
        rubberbandnumber: rows[rowTable].cells[2].children[0].value,
        bloodgroup: $("#value_blood_group_cross" + (rowTable - 3)).val(),
        bloodrh: $("#value_rh_cross" + (rowTable - 3)).val(),
        bagtypeid: $("#value_bag_type_id" + (rowTable - 3)).val(),
        antibody: '',
        phenotype: '',
        donateid: rows[rowTable].cells[1].children[0].value,
        donorid: $("#value_donorid" + (rowTable - 3)).val()
      };
      console.log(stockObj);
      console.log(stateSigle);
      console.log("valuebloodstatus = " + valuebloodstatus);
      console.log(barcodecross);
      var bloodrhsceen_cross = document.getElementById("bloodrhsceen_cross" + barcodecross).value;
      console.log(bloodrhsceen_cross);

      if (valuebloodstatus == 4 && stateSigle) // ติดเชื้อ
        {
          console.log("=================");
          swal({
            title: 'ผลิตภัณฑ์มีการติดเชื้อ',
            text: 'หมายเลขถุง : ' + barcodecross,
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
          }).then(function (isConfirm) {
            if (isConfirm) {
              var infObj = {
                bag_number: barcodecross,
                bloodstocktypecross: bloodstocktypecross,
                donateid: rows[rowTable].cells[1].children[0].value
              };
              var stockInfectArr = $("#stockInfectArr").val();
              var obj = JSON.parse(stockInfectArr.replace(/null/g, '""'));
              obj.push(infObj);
              $("#stockInfectArr").val(JSON.stringify(obj));
              rowType.children[0].children[0].children[0].children[0].children[0].style.backgroundColor = "#C00";
              rowType.children[0].children[0].children[0].children[1].children[0].style.backgroundColor = "#C00";
              rowType.children[0].children[0].children[1].children[0].children[0].style.backgroundColor = "#C00";
              rowType.children[0].children[0].children[2].children[0].children[1].children[0].children[0].style.background = "#C00";
              rowType.children[0].children[0].children[1].children[0].children[0].focus();
            }
          });
        } else if (bloodrhsceen_cross == "Rh+" && stateSigle && (bloodstocktypecross == "FFP" || bloodstocktypecross == "PC" || bloodstocktypecross == "LPPC" || bloodstocktypecross == "LPPC_PAS" || bloodstocktypecross == "SDP" || bloodstocktypecross == "SDP_PAS" || bloodstocktypecross == "WB")) {
        swal({
          title: 'มีผล Ab Sceen Positive',
          text: 'ต้องการรับเข้าคลังหรือไม่\nหมายเลขถุง : ' + barcodecross,
          type: "warning",
          buttons: ['ไม่', 'ใช่'],
          showCancelButton: true,
          confirmButtonText: 'OK',
          confirmButtonClass: "btn-danger",
          closeOnConfirm: true
        }).then(function (isConfirm) {
          if (isConfirm) {
            document.getElementById("barcodecross").value = barcodecross;
            document.getElementById("barcodecross2").focus();
          } else {
            setRemarkStock(rowType, bloodstocktypecross, rows[rowTable]);
          }
        });
      } else if (valuebloodstatus == 3 && stateSigle && remarkvalue != 0) // หมายเหตุ
        {
          swal({
            title: 'พบปัญหาในผลิตภัณฑ์นี้',
            text: 'หมายเลขถุง : ' + barcodecross,
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
          }).then(function (isConfirm) {
            if (isConfirm) {
              setRemarkStock(rowType, bloodstocktypecross, rows[rowTable]);
            }
          });
        } else if (valuebloodstatus == 6 && stateSigle) // หมายเหตุ
        {
          swal({
            title: 'ผลิตภัณฑ์พบปัญหา',
            text: 'หมายเหตุ : ' + rowType.children[0].children[0].children[0].children[0].children[0].value + '\nหมายเลขถุง : ' + barcodecross + '\nชนิดเลือด : ' + bloodstocktypecross,
            type: "warning",
            showCancelButton: false,
            confirmButtonText: 'OK',
            confirmButtonClass: "btn-danger",
            closeOnConfirm: true
          }).then(function (isConfirm) {
            if (isConfirm) {
              rowType.children[0].children[0].children[0].children[0].children[0].focus();
            }
          });
        } else if (valuebloodstatus != 3 && stateSigle) {
        swal({
          title: 'ผลิตภัณฑ์ยังไม่พร้อมจ่าย',
          text: 'หมายเลขถุง : ' + barcodecross,
          type: "warning",
          showCancelButton: false,
          confirmButtonText: 'OK',
          confirmButtonClass: "btn-danger",
          closeOnConfirm: true
        }).then(function (isConfirm) {
          if (isConfirm) {
            document.getElementById("barcodecross").focus();
          }
        });
      } else {
        if (stateSigle) return false;
        rowType.children[0].children[0].children[0].children[0].children[0].style.backgroundColor = "#6C0";
        rowType.children[0].children[0].children[0].children[1].children[0].style.backgroundColor = "#6C0";
        rowType.children[0].children[0].children[1].children[0].children[0].style.backgroundColor = "#6C0";
        rowType.children[0].children[0].children[2].children[0].children[1].children[0].children[0].style.background = "#6C0";
        var stockConfirmArr = $("#stockConfirmArr").val();
        var obj = JSON.parse(stockConfirmArr.replace(/null/g, '""'));
        obj.push(stockObj);
        console.log(stockObj);

        if (parseInt($("#value_sdpresultvolume" + (rowTable - 3)).val()) > 1 && (stockObj.bloodstocktypecross == 'SDP' || stockObj.bloodstocktypecross == 'SDP_PAS')) {
          var stockObj2 = {
            volume: rowType.children[0].children[0].children[0].children[0].children[0].value,
            bloodstart: rows[rowTable].cells[1].children[6].children[0].children[1].children[0].innerText,
            bloodexp: rowType.children[0].children[0].children[0].children[1].children[0].value,
            bloodstockrfid: rowType.children[0].children[0].children[1].children[0].children[0].value,
            bloodstocktypecross: bloodstocktypecross,
            bag_number: barcodecross,
            sub: 2,
            rubberbandnumber: rows[rowTable].cells[2].children[0].value,
            bloodgroup: $("#value_blood_group_cross" + (rowTable - 3)).val(),
            bloodrh: $("#value_rh_cross" + (rowTable - 3)).val(),
            bagtypeid: $("#value_bag_type_id" + (rowTable - 3)).val(),
            antibody: '',
            phenotype: '',
            donateid: rows[rowTable].cells[1].children[0].value,
            donorid: $("#value_donorid" + (rowTable - 3)).val()
          };
          obj.push(stockObj2);
          console.log(stockObj2);
        }

        if (parseInt($("#value_sdpresultvolume" + (rowTable - 3)).val()) > 2 && (stockObj.bloodstocktypecross == 'SDP' || stockObj.bloodstocktypecross == 'SDP_PAS')) {
          var stockObj3 = {
            volume: rowType.children[0].children[0].children[0].children[0].children[0].value,
            bloodstart: rows[rowTable].cells[1].children[6].children[0].children[1].children[0].innerText,
            bloodexp: rowType.children[0].children[0].children[0].children[1].children[0].value,
            bloodstockrfid: rowType.children[0].children[0].children[1].children[0].children[0].value,
            bloodstocktypecross: bloodstocktypecross,
            bag_number: barcodecross,
            sub: 2,
            rubberbandnumber: rows[rowTable].cells[2].children[0].value,
            bloodgroup: $("#value_blood_group_cross" + (rowTable - 3)).val(),
            bloodrh: $("#value_rh_cross" + (rowTable - 3)).val(),
            bagtypeid: $("#value_bag_type_id" + (rowTable - 3)).val(),
            antibody: '',
            phenotype: '',
            donateid: rows[rowTable].cells[1].children[0].value,
            donorid: $("#value_donorid" + (rowTable - 3)).val()
          };
          obj.push(stockObj3);
          console.log(stockObj3);
        }

        $("#stockConfirmArr").val(JSON.stringify(obj));
        setTimeout(function () {
          if (bloodstocktypecross == 'PRC' || bloodstocktypecross == 'LPRC' || bloodstocktypecross == 'LDPRC' || bloodstocktypecross == 'SDR') {
            rowType.children[0].children[0].children[1].children[0].children[0].required = true;
          } else {
            setTimeout(function () {
              document.getElementById("bloodstocktypecross").focus();
              $("#bloodstocktypecross").select2("open");
            }, 300);
          }

          rowType.children[0].children[0].children[1].children[0].children[0].focus();
        }, 300);
      }
    } else {
      swal({
        title: 'ไม่พบข้อมูล',
        text: 'หมายเลขถุง : ' + barcodecross + '\nชนิดเลือด : ' + bloodstocktypecross,
        type: "warning",
        showCancelButton: false,
        confirmButtonText: 'OK',
        confirmButtonClass: "btn-danger",
        closeOnConfirm: true
      }).then(function (isConfirm) {
        if (isConfirm) {
          document.getElementById("bloodstocktypecross").focus();
        }
      });
    }
  } else {
    swal({
      title: 'ไม่พบข้อมูล',
      text: 'หมายเลขถุง : ' + barcodecross,
      type: "warning",
      showCancelButton: false,
      confirmButtonText: 'OK',
      confirmButtonClass: "btn-danger",
      closeOnConfirm: true
    }).then(function (isConfirm) {
      if (isConfirm) {
        document.getElementById("barcodecross").value = "";
        document.getElementById("barcodecross2").value = "";
        document.getElementById("barcodecross").focus();
      }
    });
  }

  document.getElementById("barcodecross").value = "";
  document.getElementById("barcodecross2").value = "";
}

function setRemarkStock(rowType, bloodstocktypecross, rows_rowTable) {
  var infObj = {
    bag_number: barcodecross,
    bloodstocktypecross: bloodstocktypecross,
    donateid: rows_rowTable.cells[1].children[0].value
  };
  var stockRemarkArr = $("#stockRemarkArr").val();
  var obj = JSON.parse(stockRemarkArr.replace(/null/g, '""'));
  obj.push(infObj);
  $("#stockRemarkArr").val(JSON.stringify(obj));
  rowType.children[0].children[0].children[0].children[0].children[0].style.backgroundColor = "#0000FF";
  rowType.children[0].children[0].children[0].children[1].children[0].style.backgroundColor = "#0000FF";
  rowType.children[0].children[0].children[1].children[0].children[0].style.backgroundColor = "#0000FF";
  rowType.children[0].children[0].children[2].children[0].children[1].children[0].children[0].style.background = "#0000FF";
  rowType.children[0].children[0].children[2].children[0].children[1].children[0].children[0].children[0].style.color = "#FFF";
  rowType.children[0].children[0].children[0].children[0].children[0].focus();
}

function setRFIDCODE(bloodtype, bag_number, self) {
  var stockConfirmArr = $("#stockConfirmArr").val();
  var obj = JSON.parse(stockConfirmArr.replace(/null/g, '""'));
  console.log(obj);
  $.each(obj, function (index, value) {
    if (value.bloodstocktypecross == bloodtype && value.bag_number == bag_number) {
      obj[index].bloodstockrfid = self.value;
      console.log("==============");
      console.log(obj[index].bloodstockrfid);
    }
  });
  $("#stockConfirmArr").val(JSON.stringify(obj));
  setRFIDKey();
}

var counterrfidcode;

function setRFIDKey() {
  var count = 20;
  if (counterrfidcode) clearInterval(counterrfidcode);
  counterrfidcode = setInterval(timer, 100); //1000 will  run it every 1 second

  function timer() {
    count = count - 1;

    if (count <= 0) {
      clearInterval(counterrfidcode);
      setTimeout(function () {
        document.getElementById("bloodstocktypecross").focus(); // $("#bloodstocktypecross").select2("open");
      }, 1000);
      return;
    } //Do code for showing the number of seconds here

  }
}