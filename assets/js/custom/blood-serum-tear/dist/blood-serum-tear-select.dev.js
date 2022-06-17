"use strict";

$(document).ready(function () {
  $('#staffid').select2({
    allowClear: true,
    theme: "bootstrap",
    width: "100%",
    ajax: {
      url: 'data/masterdata/staff.php?type=1',
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
  $('#unitofficeid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/unitoffice.php',
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
              id: item.unitofficeid,
              text: item.unitofficename
            };
          })
        };
      }
    }
  });
  $('#doctorid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/doctor.php',
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
              id: item.doctorid,
              text: item.doctorname
            };
          })
        };
      }
    }
  });
  $('#serumtearvolumeid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/serumtear/serum-tear-volume.php',
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
              id: item.serumtearvolumeid,
              text: item.serumtearvolumename
            };
          })
        };
      }
    }
  });
});