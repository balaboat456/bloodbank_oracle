"use strict";

var donateformremarktypename4 = "";
$(document).ready(function () {
  $('#donoridcard').mask('9-9999-99999-99-9');
  $('#search').select2({
    allowClear: true,
    width: "350px",
    theme: "bootstrap",
    minimumInputLength: 2,
    placeholder: "",
    // tags: [],
    ajax: {
      url: 'data/masterdata/donor.php',
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
              id: item.donorid,
              text: 'ชื่อ-สกุล : ' + item.fname + ' ' + item.lname + ' | ' + 'เลขที่บัตรประชาชน : ' + item.donoridcard + ' | ' + 'เลขที่ผู้บริจาค : ' + item.donorcode,
              item: item
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    $("#donorname5").val(e.params.args.data.item.prefixname + e.params.args.data.item.fname + ' ' + e.params.args.data.item.lname);
    $("#donoridcard5").val(e.params.args.data.item.donoridcard);
    $("#donorpassport5").val(e.params.args.data.item.donorpassport);
    $("#donorcode5").val(e.params.args.data.item.donorcode);
  }).on("select2:clearing", function (e) {
    $("#donorname5").val("");
    $("#donoridcard5").val("");
    $("#donorpassport5").val("");
    $("#donorcode5").val("");
  });
  $('.donatestatus').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "สถานะ",
    // tags: [],
    ajax: {
      url: 'data/masterdata/donatestatus.php',
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
              id: item.donatestatusid,
              text: item.donatestatusname
            };
          })
        };
      }
    }
  });
  $('.bloodstocktype').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "สถานะ",
    // tags: [],
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
              text: item.bloodstocktypename
            };
          })
        };
      }
    }
  });
  $('.bloodgroup').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "หมู่เลือด",
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
  $('.donation_type_id').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "ประเภทการบริจาค",
    // tags: [],
    ajax: {
      url: 'data/masterdata/donationtype.php',
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
              id: item.donation_type_id,
              text: item.donation_type_name
            };
          })
        };
      }
    }
  });
  $('.donateformremarktypeid4').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "",
    width: "100%",
    // tags: [],
    ajax: {
      url: 'data/masterdata/donate-form-remark-type.php?keyword=01',
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
              id: item.donateformremarktypeid,
              text: item.donateformremarktypename
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    donateformremarktypename4 = e.params.args.data.text;
  }).on("select2:clearing", function (e) {
    donateformremarktypename4 = '';
  });
  $('.donateformremarktypeid5').select2({
    allowClear: true,
    theme: "bootstrap",
    placeholder: "",
    width: "100%",
    // tags: [],
    ajax: {
      url: 'data/masterdata/donate-form-remark-type.php?notid=1',
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
              id: item.donateformremarktypeid,
              text: item.donateformremarktypename
            };
          })
        };
      }
    }
  }).on("select2:selecting", function (e) {
    donateformremarktypename5 = e.params.args.data.text;
  }).on("select2:clearing", function (e) {
    donateformremarktypename5 = '';
  });
  $('.inspectorid').select2({
    width: "100%",
    theme: "bootstrap",
    placeholder: "ผู้ปฏิบัติงาน"
  });
});