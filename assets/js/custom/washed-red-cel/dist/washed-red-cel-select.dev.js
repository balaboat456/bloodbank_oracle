"use strict";

$(document).ready(function () {
  // $('#unitofficeid').select2({
  //     allowClear: true,
  //     width: "100%",
  //     theme: "bootstrap",
  //     placeholder: "",
  //     // tags: [],
  //     ajax: {
  //         url: 'data/masterdata/unitoffice.php',
  //         dataType: 'json',
  //         type: "GET",
  //         quietMillis: 50,
  //         data: function(keyword) {
  //             return {
  //                 keyword: keyword.term
  //             };
  //         },
  //         processResults: function(data) {
  //             return {
  //                 results: $.map(data.data, function(item) {
  //                     return {
  //                         id: item.unitofficeid,
  //                         text: item.unitofficename,
  //                     }
  //                 })
  //             };
  //         },
  //     }
  // });
  // $('#bloodgroupid').select2({
  //     allowClear: true,
  //     width:"100%",
  //     theme: "bootstrap",
  //     placeholder: "",
  //     // tags: [],
  //     ajax: {
  //         url: 'data/masterdata/bloodgroup.php',
  //         dataType: 'json',
  //         type: "GET",
  //         quietMillis: 50,
  //         data: function (keyword) {
  //             return {
  //                 keyword: keyword.term
  //             };
  //         },
  //         processResults: function (data) {
  //             return {
  //                 results: $.map(data.data, function (item) {
  //                     return {
  //                         id: item.bloodgroupid,
  //                         text: item.bloodgroupname,
  //                     }
  //                 })
  //             };
  //         },
  //     }
  // });
  // $('#rhid').select2({
  //     allowClear: true,
  //     width: "100%",
  //     theme: "bootstrap",
  //     placeholder: "",
  //     // tags: [],
  //     ajax: {
  //         url: 'data/masterdata/bloodrh.php',
  //         dataType: 'json',
  //         type: "GET",
  //         quietMillis: 50,
  //         data: function(keyword) {
  //             return {
  //                 keyword: keyword.term
  //             };
  //         },
  //         processResults: function(data) {
  //             return {
  //                 results: $.map(data.data, function(item) {
  //                     return {
  //                         id: item.rhid,
  //                         text: item.rhname3,
  //                     }
  //                 })
  //             };
  //         },
  //     }
  // });
  $('.bloodstocktype').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "ชนิดเลือด",
    width: "100%",
    ajax: {
      url: 'data/masterdata/bloodstocktype.php',
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
              id: item.bloodstocktypeid,
              text: item.bloodstocktypename2
            };
          })
        };
      }
    }
  });
});