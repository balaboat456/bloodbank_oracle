"use strict";

$(document).ready(function () {
  setHospital();
  setReceivingType();
  setDoctor();
});

function setHospital() {
  $('#hospitalid').select2({
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
              text: item.hospitalname
            };
          })
        };
      }
    }
  });
}

function setReceivingType() {
  $('#receivingtypeid').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "ประเภทการรับ",
    width: "100%",
    ajax: {
      url: 'data/masterdata/receivingtype.php',
      dataType: 'json',
      type: "GET",
      quietMillis: 50,
      data: function data(keyword) {
        return {
          keyword: keyword.term,
          donatebloodtypeid: 2
        };
      },
      processResults: function processResults(data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              id: item.receivingtypeid,
              text: item.receivingtypename2
            };
          })
        };
      }
    }
  });
}