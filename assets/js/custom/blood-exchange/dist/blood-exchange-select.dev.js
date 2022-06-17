"use strict";

$(document).ready(function () {
  $('#bloodgroupid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/bloodgroup.php',
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
              id: item.bloodgroupid,
              text: item.bloodgroupname
            };
          })
        };
      }
    }
  });
  $('#rhid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/bloodrh.php',
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
              id: item.rhid,
              text: item.rhname3
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
  $('#exchangemachineid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/bloodexchange/blood-exchange-machine.php',
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
              id: item.exchangemachineid,
              text: item.exchangemachinename
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
  $('#staff').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "" // ajax: {
    //     url: 'data/masterdata/nurse.php',
    //     dataType: 'json',
    //     type: "GET",
    //     quietMillis: 50,
    //     data: function (keyword) {
    //         return {
    //             keyword: keyword.term
    //         };
    //     },
    //     processResults: function (data) {
    //         return {
    //             results: $.map(data.data, function (item) {
    //                 return {
    //                     id: item.unitofficeid,
    //                     text: item.unitofficename,
    //                 }
    //             })
    //         };
    //     },
    // }

  });
  $('#problemmachineid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: ""
  });
  $('#problemdonorid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: ""
  });
  $('#problemproductid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: ""
  });
  $('#problemhumanid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: ""
  });
});