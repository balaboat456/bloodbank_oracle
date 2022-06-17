"use strict";

$(document).ready(function () {
  $('#labunitroomid').select2({
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
              text: "[" + item.unitofficecode + "] " + item.unitofficename
            };
          })
        };
      }
    }
  }); // $('#labunitroomid').select2({
  //     allowClear: true,
  //     width:"100%",
  //     theme: "bootstrap",
  //     placeholder: "",
  //     // tags: [],
  //     ajax: {
  //         url: 'data/masterdata/labunitroom.php',
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
  //                         id: item.labunitroomid,
  //                         text: item.labunitroomname,
  //                     }
  //                 })
  //             };
  //         },
  //     }
  // });

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
  $('#reasonsendingid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/labreasonsending.php',
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
              id: item.reasonsendingid,
              text: item.reasonsendingname
            };
          })
        };
      }
    }
  });
  $('#reasonsendingid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/labreasonsending.php',
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
              id: item.reasonsendingid,
              text: item.reasonsendingname
            };
          })
        };
      }
    }
  });
  $('#labdeliveryid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/labdelivery.php',
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
              id: item.labdeliveryid,
              text: item.labdeliveryname
            };
          })
        };
      }
    }
  });
  $('#labbloodgroupid').select2({
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
  $('#labrhid').select2({
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
  $('#motherbloodgroup').select2({
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
  $('#motherrh').select2({
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
});

function lab_check_request_cancel() {
  $('#labcheckrequestcancelid').select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/recordrequestbloodlab/recordrequestbloodlab-cancel.php',
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
              id: item.labcheckrequestcancelid,
              text: item.labcheckrequestcancelname
            };
          })
        };
      }
    }
  });
}