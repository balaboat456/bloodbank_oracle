"use strict";

$(document).ready(function () {
  setHospital();
  setBagType();
  setBloodGroup();
  setBagStockType2();
  setBloodRh();
  setStaff();
  setReceivingType();
  setSub();
  setBagStockTypePay();
  setHospitalPayOut();
});

function setHospital() {
  $('.hospital').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "สาขา",
    width: "100%",
    ajax: {
      url: 'data/masterdata/hospital.php',
      dataType: 'json',
      type: "GET",
      quietMillis: 50,
      data: function data(keyword) {
        return {
          keyword: keyword.term
        };
      },
      processResults: function processResults(data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              id: item.hospitalid,
              text: '[' + item.hospitalcode + ']' + ' ' + item.hospitalname,
              item: item
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    hospitalname = e.params.args.data.item.hospitalname;
    setReceivingType(e.params.args.data.id);
    $('#receivingtypeid').val(null).empty();
  }).on("select2:clearing", function (e) {
    hospitalname = "";
    setReceivingType("");
    $('#receivingtypeid').val(null).empty();
  });
}

function setValueHospital() {
  // Set Default Donor Occupation
  var hospital = $('#hospital');
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: 'data/masterdata/hospital.php'
  }).then(function (data) {
    var index = getIndex(data.data, 'hospitalid', 1);
    var option;

    if (data.data.length > 0 && (index || index == 0)) {
      option = new Option(data.data[index].hospitalname, data.data[index].hospitalid, true, true);
      hospital.append(option).trigger('change');
      hospital.trigger({
        type: 'select2:select',
        params: {
          data: data
        }
      });
    }
  });
}

function setBagType() {
  $('.bloodbagtype').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: " ",
    width: "100%",
    ajax: {
      url: 'data/masterdata/bagtype.php',
      dataType: 'json',
      type: "GET",
      quietMillis: 50,
      data: function data(keyword) {
        return {
          keyword: keyword.term
        };
      },
      processResults: function processResults(data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              id: item.bagtypeid,
              text: item.bagtypename
            };
          })
        };
      }
    }
  });
}

function setBagStockType2() {
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
      var $state = $('<span >' + strState[0] + '</span>');
      return $state;
    }
  }).on("select2:selecting", function (e) {
    if ($('#donation_date_cross').val().length == 10) {
      expDate(e.params.args.data.id, $('#donation_date_cross').val());
      getBloodDonationDate2(e.params.args.data.id);
    }

    setVolume(e.params.args.data.id);
  }).on("select2:clearing", function (e) {
    setVolume("");
    console.log("====1====");
  });
}

function setBloodGroup() {
  $('.bloodgroupcross').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: " ",
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
      var $state = $('<span >' + strState[0] + '</span>');
      return $state;
    } // ajax: {
    //     url: 'data/masterdata/bloodgroup.php',
    //     dataType: 'json',
    //     type: "GET",
    //     quietMillis: 50,
    //     data: function(keyword) {
    //         return {
    //             keyword: keyword.term,
    //         };
    //     },
    //     processResults: function(data) {
    //         return {
    //             results: $.map(data.data, function(item) {
    //                 return {
    //                     id: item.bloodgroupid,
    //                     text: item.bloodgroupname
    //                 }
    //             })
    //         };
    //     },
    // }

  });
}

function setBloodRh() {
  $('.bloodrhcross').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: " ",
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
      var $state = $('<span >' + strState[0] + '</span>');
      return $state;
    } // ajax: {
    //     url: 'data/masterdata/bloodrh.php',
    //     dataType: 'json',
    //     type: "GET",
    //     quietMillis: 50,
    //     data: function(keyword) {
    //         return {
    //             keyword: keyword.term,
    //         };
    //     },
    //     processResults: function(data) {
    //         return {
    //             results: $.map(data.data, function(item) {
    //                 return {
    //                     id: item.rhid,
    //                     text: item.rhname3,
    //                     item: item
    //                 }
    //             })
    //         };
    //     },
    // }
    // }).on("select2:selecting", function(e) {
    //     rhname3 = e.params.args.data.item.rhname3;
    // }).on("select2:clearing", function(e) {
    //     rhname3 = "";

  });
}

function setStaff() {
  $('.staff').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "เจ้าหน้าที่รับเข้า",
    width: "100%",
    ajax: {
      url: 'data/masterdata/staff.php?type=ispickupofficer',
      dataType: 'json',
      type: "GET",
      quietMillis: 50,
      data: function data(keyword) {
        return {
          keyword: keyword.term
        };
      },
      processResults: function processResults(data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              id: item.id,
              text: item.name + ' ' + item.surname
            };
          })
        };
      }
    }
  });
}

function setReceivingType() {
  var hospitalid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  // alert(hospitalid);
  if (hospitalid == 285 || hospitalid == 175) {
    hospitalid = 1;
  }

  $('.receivingtypeid').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "ประเภทการรับ",
    width: "100%",
    ajax: {
      url: 'data/masterdata/receivingtype.php?condnot=1&hospitalid=' + hospitalid,
      dataType: 'json',
      type: "GET",
      quietMillis: 50,
      data: function data(keyword) {
        return {
          keyword: keyword.term
        };
      },
      processResults: function processResults(data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              id: item.receivingtypeid,
              text: item.receivingtypename,
              item: item
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    receivingtypename = e.params.args.data.item.receivingtypename;
    setReceivingTypeID(e.params.args.data.item.receivingtypeid);
    console.log(e);
  }).on("select2:clearing", function (e) {
    receivingtypename = "";
  });
}

function setValueReceivingType() {
  // Set Default Donor Occupation
  var receivingtype = $('#receivingtypeid');
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: 'data/masterdata/receivingtype.php'
  }).then(function (data) {
    var index = getIndex(data.data, 'receivingtypeid', 1);
    var option;

    if (data.data.length > 0 && (index || index == 0)) {
      option = new Option(data.data[index].receivingtypename, data.data[index].receivingtypeid, true, true);
      receivingtype.append(option).trigger('change');
      receivingtype.trigger({
        type: 'select2:select',
        params: {
          data: data
        }
      });
    }
  });
}

function setBagStockTypePay() {
  $('.bloodstocktype_pay').select2({
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
      var $state = $('<span >' + strState[0] + '</span>');
      return $state;
    }
  }).on("select2:selecting", function (e) {
    setTimeout(function () {
      document.getElementById("bag_number_pay_out").focus();
    }, 200);
  });
}

function setHospitalPayOut() {
  $('.hospital_pay').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "สาขา",
    width: "100%",
    ajax: {
      url: 'data/masterdata/hospital.php',
      dataType: 'json',
      type: "GET",
      quietMillis: 50,
      data: function data(keyword) {
        return {
          keyword: keyword.term
        };
      },
      processResults: function processResults(data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              id: item.hospitalid,
              text: item.hospitalname,
              item: item
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    clearRefund();
    outhospitalname = e.params.args.data.item.hospitalname;
  });
}

function setVolume() {
  var bloodtype = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if (bloodtype == "CRYO") {
    $("#volume").val("10");
    setDataModalSelectValue('bloodgroupcross', '', '');
    setDataModalSelectValue('bloodrhcross', '', '');
  } // else if (bloodtype == "FFP") {
  //     $("#volume").val("200");
  // setDataModalSelectValue('bloodgroupcross', '', '');
  // setDataModalSelectValue('bloodrhcross', '', '');
  // } else {
  // $("#volume").val("");
  // setDataModalSelectValue('bloodgroupcross', '', '');
  // setDataModalSelectValue('bloodrhcross', '', '');
  // }

}

function setSub() {
  $('.sub').select2({
    theme: "bootstrap",
    placeholder: "sub",
    width: "100%"
  });
}

function getBloodDonationDate() {
  var countid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var self = arguments.length > 1 ? arguments[1] : undefined;
  console.log("************" + countid);
  console.log("************" + self);
  date8('#donation_date_cross' + countid);
  var bloodstocktypecross = $("#bloodstocktypecross").val();
  console.log(bloodstocktypecross);

  if (self != undefined) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[22].innerHTML);
    item[0].donation_date_cross = self.value;
    bloodstocktypecross = item[0].bloodstocktypecross;
  }

  if ($('#donation_date_cross' + countid).val().length == 10) {
    // expDate($('#bloodstocktypecross').val(),$('#donation_date_cross'+countid).val());
    var today = new Date(dmyToymd2($('#donation_date_cross' + countid).val()));

    if (bloodstocktypecross == "PRC") {
      today.setDate(today.getDate() + 35);
    } else if (bloodstocktypecross == "LPRC") {
      today.setDate(today.getDate() + 42);
    } else if (bloodstocktypecross == "LDPRC") {
      today.setDate(today.getDate() + 42);
    } else if (bloodstocktypecross == "FFP") {
      today.setFullYear(today.getFullYear() + 1);
      today.setDate(today.getDate() + 1);
    } else if (bloodstocktypecross == "CRYO") {
      today.setDate(today.getDate() + 1);
      today.setFullYear(today.getFullYear() + 1);
    } else if (bloodstocktypecross == "PC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "LPPC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "LPPC_PAS") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "PLDPC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "LDPPC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "LDPPC_PAS") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "SDP") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "SDP_PAS") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "SDR") {
      today.setDate(today.getDate() + 42);
    } else if (bloodstocktypecross == "WB") {
      today.setDate(today.getDate() + 35);
    } else {
      today.setDate(today.getDate());
    }

    $('#donation_exp_cross' + countid).val(getDateToString(today));

    if (self != undefined) {
      item[0].donation_exp_cross = $('#donation_exp_cross' + countid).val();
      row.cells[22].innerHTML = JSON.stringify(item);
    }
  }
}

function getBloodDonationDate2() {
  var bloodstocktypecross = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";

  if ($('#donation_date_cross').val().length == 10) {
    var today = new Date(dmyToymd2($('#donation_date_cross').val()));

    if (bloodstocktypecross == "PRC") {
      today.setDate(today.getDate() + 35);
    } else if (bloodstocktypecross == "LPRC") {
      today.setDate(today.getDate() + 42);
    } else if (bloodstocktypecross == "LDPRC") {
      today.setDate(today.getDate() + 42);
    } else if (bloodstocktypecross == "FFP") {
      today.setDate(today.getDate() + 365);
    } else if (bloodstocktypecross == "CRYO") {
      today.setDate(today.getDate() + 365);
    } else if (bloodstocktypecross == "PC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "LPPC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "PLDPC") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "SDP") {
      today.setDate(today.getDate() + 5);
    } else if (bloodstocktypecross == "SDR") {
      today.setDate(today.getDate() + 42);
    } else if (bloodstocktypecross == "WB") {
      today.setDate(today.getDate() + 35);
    } else {
      today.setDate(today.getDate());
    }

    $('#donation_exp_cross').val(getDateToString(today));
  }
}

function getBloodExpDate() {
  date8('#donation_exp_cross');
}

function getBloodExpDate2() {
  var countid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  var self = arguments.length > 1 ? arguments[1] : undefined;
  date8('#donation_exp_cross' + countid);
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[22].innerHTML);
  item[0].donation_exp_cross = self.value;
  row.cells[22].innerHTML = JSON.stringify(item);
}