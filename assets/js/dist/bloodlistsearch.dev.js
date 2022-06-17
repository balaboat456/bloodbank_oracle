"use strict";

$(document).ready(function () {
  $("#pc_1").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pc_2').focus();
      }, 200);
    }
  });
  $("#pc_2").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pc_3').focus();
      }, 200);
    }
  });
  $("#pc_3").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pc_4').focus();
      }, 200);
    }
  });
  $("#pc_4").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('ffp_5').focus();
      }, 200);
    }
  });
  $("#ffp_5").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('volume_lppc').focus();
      }, 200);
    }
  });
  $("#pc_lppc_pas_1").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pc_lppc_pas_2').focus();
      }, 200);
    }
  });
  $("#pc_lppc_pas_2").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pc_lppc_pas_3').focus();
      }, 200);
    }
  });
  $("#pc_lppc_pas_3").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pc_lppc_pas_4').focus();
      }, 200);
    }
  });
  $("#pc_lppc_pas_4").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pas_lppc_companypasid').focus();
      }, 200);
    }
  });
  $("#pas_lppc_companypasid").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pas_lppc_lot_no').focus();
      }, 200);
    }
  });
  $("#pas_lppc_lot_no").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('pas_lppc_exp').focus();
      }, 200);
    }
  });
  $("#pas_lppc_exp").on('keydown', function (e) {
    if (e.which == 13) {
      setTimeout(function () {
        document.getElementById('volume_lppc_pas').focus();
      }, 200);
    }
  });
  $('.bloodstatus').select2({
    allowClear: true,
    theme: "bootstrap",
    // placeholder: "สถานะ",
    // tags: [],
    ajax: {
      url: 'data/masterdata/bloodstatus.php',
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
              id: item.bloodstatusid,
              text: item.bloodstatusname
            };
          })
        };
      }
    }
  });
});

function scanBarcode() {
  var bag_number = $('#barcode').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#barcode').val(bag_number_new);

  if (bag_number_new.length == 14) {
    loadTable(bag_number_new);
  } else if (bag_number_new.length == 0) {
    loadTable();
  }
}

function scanRFID() {
  var rfid = $('#rfid').val();
  loadTable('', rfid);
}

function fromNumber() {
  var bag_number = $('#fromnumber').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#fromnumber').val(bag_number_new);
}

function toNumber() {
  var bag_number = $('#tonumber').val();
  var bag_number_new = numnerPoint(bag_number);
  $('#tonumber').val(bag_number_new);
}