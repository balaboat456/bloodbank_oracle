"use strict";

var monthtext = "";
$(document).ready(function () {
  setShow();
  $("#unitofficeid").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/unitoffice.php",
      dataType: "json",
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
  $("#departmentid").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/department.php",
      dataType: "json",
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
              id: item.departmentid,
              text: item.departmentname
            };
          })
        };
      }
    }
  });
  $("#unitofficeid_ward").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/unitoffice.php",
      dataType: "json",
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
  $("#namepatient").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    minimumInputLength: 2,
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/namepatient.php",
      dataType: "json",
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
              id: item.patientfullname,
              text: 'hn: ' + item.patienthn + ' ชืื่อผู้ป่วย:' + item.patientfullname
            };
          })
        };
      }
    }
  });
  $("#bloodgroupid").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/bloodgroup.php",
      dataType: "json",
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
  $("#unitnameid").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/donatmobileunit.php",
      dataType: "json",
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
              text: item.dmu_name
            };
          })
        };
      }
    }
  });
  $("#hospitalid").select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "",
    width: "100%",
    ajax: {
      url: "data/masterdata/hospital.php",
      dataType: "json",
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
  $('#activityid').select2({
    allowClear: true,
    width: "250px",
    theme: "bootstrap",
    placeholder: "",
    ajax: {
      cache: true,
      url: 'data/masterdata/donate-activity.php',
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
              id: item.activityid,
              text: item.activityname,
              item: item
            };
          })
        };
      }
    }
  });
  $("#rhid").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/bloodrh.php",
      dataType: "json",
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
  $("#type").select2({
    allowClear: true,
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/blood-report-type.php",
      dataType: "json",
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
              text: item.receivingtypename2
            };
          })
        };
      }
    }
  });
  $("#month").select2({
    width: "100%",
    theme: "bootstrap",
    placeholder: "",
    // tags: [],
    ajax: {
      url: "data/masterdata/month.php",
      dataType: "json",
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
              id: item.monthcode,
              text: item.monthname
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    monthtext = e.params.args.data.text;
  });
  $("#usercreate").select2({
    allowClear: true,
    theme: "bootstrap",
    width: "100%",
    placeholder: "",
    ajax: {
      url: "data/bloodletting/letting_staff.php",
      dataType: "json",
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
              text: item.name + " " + item.surname
            };
          })
        };
      }
    }
  });
});

function setShow() {
  document.getElementById("div_infectiousform").style.display = "none";
  document.getElementById("div_hn").style.display = "none";
  document.getElementById("div_unitofficeid_ward").style.display = "none";
  document.getElementById("div_fromdate").style.display = "none";
  document.getElementById("div_todate").style.display = "none";
  document.getElementById("div_fromtime").style.display = "none";
  document.getElementById("div_totime").style.display = "none";
  document.getElementById("div_fromyear").style.display = "none";
  document.getElementById("div_toyear").style.display = "none";
  document.getElementById("div_month").style.display = "none";
  document.getElementById("div_year").style.display = "none";
  document.getElementById("div_unitofficeid").style.display = "none";
  document.getElementById("div_bloodgroupid").style.display = "none";
  document.getElementById("div_rhid").style.display = "none";
  document.getElementById("div_place").style.display = "none";
  document.getElementById("div_month_and_day_form").style.display = "none";
  document.getElementById("div_hospitalid").style.display = "none";
  document.getElementById("div_onedate").style.display = "none";
  document.getElementById("div_departmentid").style.display = "none";
  document.getElementById("isunitofficeblock").style.display = "none";
  document.getElementById("isactivityblock").style.display = "none";
  document.getElementById("div_btn_search").style.display = "none";
  document.getElementById("div_usercreate").style.display = "none";
  document.getElementById("div_namepatient").style.display = "none";

  if (report == 1) {} else if (report == 2) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 3) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_unitofficeid").style.display = "block";
    document.getElementById("div_bloodgroupid").style.display = "block";
    document.getElementById("div_donation_status2").style.display = "block"; // document.getElementById("div_hn").style.display = "block";

    document.getElementById("div_namepatient").style.display = "block";
  } else if (report == 4) {
    document.getElementById("div_infectiousform").style.display = "block";
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_place").style.display = "block";
  } else if (report == 5) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_place").style.display = "block";
    document.getElementById("isunitofficeblock").style.display = "none";
  } else if (report == 6) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 7) {} else if (report == 8) {} else if (report == 9) {
    document.getElementById("div_fromyear").style.display = "block";
    document.getElementById("div_toyear").style.display = "block";
  } else if (report == 10) {
    // document.getElementById("div_month_and_day_form").style.display = "block";
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_hospitalid").style.display = "block";
    document.getElementById('div_hospitalid').hidden = false;
  } else if (report == 11) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_place").style.display = "block";
    document.getElementById("div_donation_status").style.display = "block";
  } else if (report == 12) {
    document.getElementById("div_onedate").style.display = "block";
  } else if (report == 13) {
    document.getElementById("div_month").style.display = "block";
    document.getElementById("div_year").style.display = "block";
    document.getElementById("div_hospitalid").style.display = "block";
  } else if (report == 14) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_place").style.display = "block";
  } else if (report == 15) {
    document.getElementById("reportPrintExCel").style.visibility = "visible";
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_bloodgroupid").style.display = "block";
    document.getElementById("div_rhid").style.display = "block";
    document.getElementById("div_place").style.display = "block";
  } else if (report == 16) {
    document.getElementById("reportPrintExCel").style.visibility = "visible";
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_bloodgroupid").style.display = "block";
    document.getElementById("div_rhid").style.display = "block";
    document.getElementById("div_departmentid").style.display = "block";
    document.getElementById("div_donation_status2").style.display = "block";
  } else if (report == 17) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 18) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 19) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 20) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 21) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
  } else if (report == 23) {
    document.getElementById("div_month").style.display = "block";
    document.getElementById("div_year").style.display = "block";
  } else if (report == 24) {
    document.getElementById("div_categoryblood").style.display = "block";
    document.getElementById("div_usercreate").style.display = "block";
    document.getElementById("div_todatetime").style.display = "block";
    document.getElementById("div_fromdatetime").style.display = "block";
  } else if (report == 25) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_fromtime").style.display = "block";
    document.getElementById("div_totime").style.display = "block";
  } else if (report == 26) {
    document.getElementById("reportPrintExCel").style.visibility = "visible";
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_fromtime").style.display = "block";
    document.getElementById("div_totime").style.display = "block";
    document.getElementById("div_totime").style.display = "block";
    document.getElementById("div_btn_search").style.display = "block";
    document.getElementById("div_usercreate").style.display = "block";
  } else if (report == 27) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("reportPrintExCel").style.visibility = "visible";
    document.getElementById("reportPrintPdf").style.visibility = "visible";
  } else if (report == 28) {
    document.getElementById("reportPrintExCel").style.visibility = "visible";
    document.getElementById("reportPrintPdf").style.visibility = "visible";
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_patientcode").style.display = "block";
  } else if (report == 29) {
    document.getElementById("div_year").style.display = "block";
    document.getElementById("div_btn_search").style.display = "block";
  } else if (report == 30) {
    document.getElementById("div_year").style.display = "block";
    document.getElementById("div_btn_search").style.display = "block";
  } else if (report == 31) {
    document.getElementById("div_fromdate").style.display = "block";
    document.getElementById("div_todate").style.display = "block";
    document.getElementById("div_hn").style.display = "block";
    document.getElementById("div_type").style.display = "block";
    document.getElementById("reportPrintExCel").style.visibility = "visible";
    document.getElementById("reportPrintPdf").style.visibility = "visible";
  } else if (report == 32) {
    document.getElementById("div_month").style.display = "block";
    document.getElementById("div_year").style.display = "block";
  }
}

function placeidClick() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;

  if (id == 1) {
    // document.getElementById("placeid1").style.display = "block";
    // document.getElementById("placeid2").style.display = "none";
    // document.getElementById("placeid3").style.display = "none";
    document.getElementById("isunitofficeblock").style.display = "none";
    document.getElementById("isactivityblock").style.display = "none";
    console.log(id);
  } else if (id == 2) {
    document.getElementById("isunitofficeblock").style.display = "block";
    document.getElementById("isactivityblock").style.display = "none";
    document.getElementById("isunitofficeblock").hidden = false; // document.getElementById("placeid1").style.display = "none";
    // document.getElementById("placeid2").style.display = "block";
    // document.getElementById("placeid3").style.display = "none";

    console.log(id); // document.getElementById("unitnameid").focus();
  } else if (id == 3) {
    document.getElementById("isunitofficeblock").hidden = true;
    document.getElementById("isactivityblock").style.display = "block"; // document.getElementById("placeid1").style.display = "none";
    // document.getElementById("placeid2").style.display = "none";
    // document.getElementById("placeid3").style.display = "block"

    console.log(id);
    ; // document.getElementById("activityid").focus();
  } else {
    document.getElementById("placeid1").style.display = "block";
    document.getElementById("placeid2").style.display = "none";
    document.getElementById("placeid3").style.display = "none";
  }

  localStorage.setItem("placeid", id);
}