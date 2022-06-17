"use strict";

function setValueItemTab4(data) {
  // setABOTest0Serum("#antia_child");
  // setABOTest0Serum("#antib_child");
  // setABOTest0Serum("#antiab_child");
  // setABOTest0Serum("#acells_child");
  // setABOTest0Serum("#bcells_child");
  // setABOTest0Serum("#ocells_child");
  // setBloodGroup("#bloodgroup_child");
  // $("#antia_child").val(data.antia_child);
  // $("#antib_child").val(data.antib_child);
  // $("#antiab_child").val(data.antiab_child);
  // $("#acells_child").val(data.acells_child);
  // $("#bcells_child").val(data.bcells_child);
  // $("#ocells_child").val(data.ocells_child);
  // $("#bloodgroup_child").val(data.bloodgroup_child);
  removeRowTable('list_table_abo_child');
  removeRowTable('list_table_rh_child');
  $.each(data.lab_abo_item_child, function (index, value) {
    addABOTest_child(value);
  });

  if (data.lab_abo_item_child == '') {
    addABOTest_child();
  }

  $.each(data.lab_rh_item_child, function (index, value) {
    addRhTest_child(value);
  });

  if (data.lab_rh_item_child == '') {
    addRhTest_child();
  }

  removeRowTable('list_table_abo_father');
  removeRowTable('list_table_rh_father');
  $.each(data.lab_abo_item_father, function (index, value) {
    addABOTest_father(value);
  });

  if (data.lab_abo_item_father == '') {
    addABOTest_father();
  }

  $.each(data.lab_rh_item_father, function (index, value) {
    addRhTest_father(value);
  });

  if (data.lab_rh_item_father == '') {
    addRhTest_father();
  } //BLOOD


  setABOTest0Serum("#antia1_child");
  setABOTest0Serum("#antih_child");
  setABOTest0Serum("#a2cells_child");
  $("#antia1_child").val(data.antia1_child);
  $("#antih_child").val(data.antih_child);
  $("#a2cells_child").val(data.a2cells_child); //DAT 

  setABOTest0Serum("#dat_poly_child");
  setABOTest0Serum("#dat_igg_child");
  setABOTest0Serum("#dat_c3d_child");
  setABOTest0Serum("#dat_ccc_child");
  $("#dat_poly_child").val(data.dat_poly_child);
  $("#dat_igg_child").val(data.dat_igg_child);
  $("#dat_c3d_child").val(data.dat_c3d_child);
  $("#dat_ccc_child").val(data.dat_ccc_child); //RH

  setBloodGroup("#confirmbloodgroup_child");
  setABOTest0Serum("#labrhrt_child");
  setABOTest0Serum("#lab37c_child");
  setABOTest0Serum("#labiat_child");
  setABOTest0Serum("#labccc_child");
  setRh2("#labresult_child");
  setRh2("#confirmrh_child");
  $("#confirmbloodgroup_child").val(data.confirmbloodgroup_child);
  $("#labrhrt_child").val(data.labrhrt_child);
  $("#lab37c_child").val(data.lab37c_child);
  $("#labiat_child").val(data.labiat_child);
  $("#labccc_child").val(data.labccc_child);
  $("#labresult_child").val(data.labresult_child);
  $("#confirmrh_child").val(data.confirmrh_child); //////////////////////////////////////////////////////////////////////////////////////////////////////

  setABOTest0Serum("#antia_father");
  setABOTest0Serum("#antib_father");
  setABOTest0Serum("#antiab_father");
  setABOTest0Serum("#acells_father");
  setABOTest0Serum("#bcells_father");
  setABOTest0Serum("#ocells_father");
  setBloodGroup("#bloodgroup_father");
  $("#antia_father").val(data.antia_father);
  $("#antib_father").val(data.antib_father);
  $("#antiab_father").val(data.antiab_father);
  $("#acells_father").val(data.acells_father);
  $("#bcells_father").val(data.bcells_father);
  $("#ocells_father").val(data.ocells_father);
  $("#bloodgroup_father").val(data.bloodgroup_father); //BLOOD

  setABOTest0Serum("#antia1_father");
  setABOTest0Serum("#antih_father");
  setABOTest0Serum("#a2cells_father");
  $("#antia1_father").val(data.antia1_father);
  $("#antih_father").val(data.antih_father);
  $("#a2cells_father").val(data.a2cells_father); //DAT

  setABOTest0Serum("#dat_poly_father");
  setABOTest0Serum("#dat_igg_father");
  setABOTest0Serum("#dat_c3d_father");
  setABOTest0Serum("#dat_ccc_father");
  $("#dat_poly_father").val(data.dat_poly_father);
  $("#dat_igg_father").val(data.dat_igg_father);
  $("#dat_c3d_father").val(data.dat_c3d_father);
  $("#dat_ccc_father").val(data.dat_ccc_father); //RH

  setBloodGroup("#confirmbloodgroup_father");
  setABOTest0Serum("#labrhrt_father");
  setABOTest0Serum("#lab37c_father");
  setABOTest0Serum("#labiat_father");
  setABOTest0Serum("#labccc_father");
  setRh2("#labresult_father");
  setRh2("#confirmrh_father");
  $("#confirmbloodgroup_father").val(data.confirmbloodgroup_father);
  $("#labrhrt_father").val(data.labrhrt_father);
  $("#lab37c_father").val(data.lab37c_father);
  $("#labiat_father").val(data.labiat_father);
  $("#labccc_father").val(data.labccc_father);
  $("#labresult_father").val(data.labresult_father);
  $("#confirmrh_father").val(data.confirmrh_father);
}

count_child = 0;

function addRhTest_child() {
  var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var table = document.getElementById("list_table_rh_child").rows.length;

  if (table == 1) {
    if (value.length == 0) {
      value = {
        labrhreagent_child: 'CAT',
        labrhrt_child: '',
        lab37c_child: '',
        labiat_child: '',
        labccc_child: '',
        labresult_child: ''
      };
    }
  } else {
    if (value.length == 0) {
      value = {
        labrhreagent_child: '',
        labrhrt_child: '',
        lab37c_child: '',
        labiat_child: '',
        labccc_child: '',
        labresult_child: ''
      };
    }
  }

  var event_data = '';
  event_data += '<tr>';
  event_data += '<td class="td-table"  style="display:none;" >';
  event_data += JSON.stringify(value);
  event_data += '</td>';
  event_data += '<td class="td-table" >';
  event_data += '<input  class="form-control" id="labrhreagent_child' + count_child + '" name="labrhreagent_child' + count_child + '" value="' + value.labrhreagent_child + '" onkeyup="setLabRhReagent_child(this)" >';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labrhrt_child' + count_child + '" name="labrhrt_child' + count_child + '"  class="form-control" onchange="setLabRhRt_child(this); setpos_child(' + count_child + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="lab37c_child' + count_child + '" name="lab37c_child' + count_child + '" class="form-control" onchange="setLab37C_child(this); setpos_child(' + count_child + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labiat_child' + count_child + '" name="labiat_child' + count_child + '" class="form-control" onchange="setLabIAT_child(this); setpos_child(' + count_child + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labccc_child' + count_child + '" name="labccc_child' + count_child + '" class="form-control" onchange="setLabCCC_child(this); setpos_child(' + count_child + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labresult_child' + count_child + '" name="labresult_child' + count_child + '" class="form-control" onchange="setLabResult_child(this); setpos_child(' + count_child + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:40px">';
  event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_rh_child").append(event_data);
  setABOTest0Serum("#labrhrt_child" + count_child, value.labrhrt3);
  setABOTest0Serum("#lab37c_child" + count_child, value.lab37c3);
  setABOTest0Serum("#labiat_child" + count_child, value.labiat3);
  setABOTest0Serum("#labccc_child" + count_child, value.labccc3);
  setRh2("#labresult_child" + count_child, value.labresult3);
  $("#labresult_child" + count_child).select2({
    width: "100%",
    theme: "bootstrap",
    templateResult: function templateResult(state) {
      if (!state.id) {
        return state.text;
      }

      var strState = state.text.split("|");
      var $state = $('<span class="select2-span">&nbsp;' + (strState[1] ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>');
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
  });
  count_child++;
}

count_father = 0;

function addRhTest_father() {
  var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var table = document.getElementById("list_table_rh_father").rows.length;

  if (table == 1) {
    if (value.length == 0) {
      value = {
        labrhreagent_father: 'CAT',
        labrhrt_father: '',
        lab37c_father: '',
        labiat_father: '',
        labccc_father: '',
        labresult_father: ''
      };
    }
  } else {
    if (value.length == 0) {
      value = {
        labrhreagent_father: '',
        labrhrt_father: '',
        lab37c_father: '',
        labiat_father: '',
        labccc_father: '',
        labresult_father: ''
      };
    }
  }

  var event_data = '';
  event_data += '<tr>';
  event_data += '<td class="td-table"  style="display:none;" >';
  event_data += JSON.stringify(value);
  event_data += '</td>';
  event_data += '<td class="td-table" >';
  event_data += '<input  class="form-control" id="labrhreagent_father' + count_father + '" name="labrhreagent_father' + count_father + '" value="' + value.labrhreagent_father + '" onkeyup="setLabRhReagent_father(this)" >';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labrhrt_fatehr' + count_father + '" name="labrhrt_fatehr' + count_father + '"  class="form-control" onchange="setLabRhRt_fatehr(this); setpos_fatehr(' + count_father + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="lab37c_fatehr' + count_father + '" name="lab37c_fatehr' + count_father + '" class="form-control" onchange="setLab37C_fatehr(this); setpos_fatehr(' + count_father + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labiat_fatehr' + count_father + '" name="labiat_fatehr' + count_father + '" class="form-control" onchange="setLabIAT_fatehr(this); setpos_fatehr(' + count_father + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labccc_fatehr' + count_father + '" name="labccc_fatehr' + count_father + '" class="form-control" onchange="setLabCCC_fatehr(this); setpos_fatehr(' + count_father + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:60px">';
  event_data += '<select id="labresult_fatehr' + count_father + '" name="labresult_fatehr' + count_father + '" class="form-control" onchange="setLabResult_fatehr(this); setpos_fatehr(' + count_father + ',this,3);"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table" style="width:40px">';
  event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_rh_father").append(event_data);
  setABOTest0Serum("#labrhrt_fatehr" + count_father, value.labrhrt3);
  setABOTest0Serum("#lab37c_fatehr" + count_father, value.lab37c3);
  setABOTest0Serum("#labiat_fatehr" + count_father, value.labiat3);
  setABOTest0Serum("#labccc_fatehr" + count_father, value.labccc3);
  setRh2("#labresult_fatehr" + count_father, value.labresult3);
  $("#labresult_fatehr" + count_father).select2({
    width: "100%",
    theme: "bootstrap",
    templateResult: function templateResult(state) {
      if (!state.id) {
        return state.text;
      }

      var strState = state.text.split("|");
      var $state = $('<span class="select2-span">&nbsp;' + (strState[1] ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>');
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
  });
  count_father++;
}

function autoBlood_child() {
  var antia = $("#antia_child").val();
  var antib = $("#antib_child").val();
  var antiab = $("#antiab_child").val();
  var acells = $("#acells_child").val();
  var bcells = $("#bcells_child").val();
  var ocells = $("#ocells_child").val();

  if (antia && antib && antia != "0" && antib != "0" && acells && bcells && acells != "0" && bcells != "0") {
    if (antia != "11" && antib == "11" && bcells != "11" && acells == "11" || antia != "1" && antib == "1" && bcells != "1" && acells == "1") {
      $("#confirmbloodgroup_child").val("A").trigger("change");
      $("#bloodgroup_child").val("A").trigger("change");
      return false;
    } else if (antia == "11" && antib != "11" && bcells == "11" && acells != "11" || antia == "1" && antib != "1" && bcells == "1" && acells != "1") {
      $("#confirmbloodgroup_child").val("B").trigger("change");
      $("#bloodgroup_child").val("B").trigger("change");
      return false;
    } else if (antia == "11" && antib == "11" && bcells != "11" && acells != "11" || antia == "1" && antib == "1" && bcells != "1" && acells != "1") {
      $("#confirmbloodgroup_child").val("O").trigger("change");
      $("#bloodgroup_child").val("O").trigger("change");
      return false;
    } else if (antia != 11 && antib != 11 && bcells == 11 && acells == 11 || antia != 1 && antib != 1 && bcells == 1 && acells == 1) {
      $("#confirmbloodgroup_child").val("AB").trigger("change");
      $("#bloodgroup_child").val("AB").trigger("change");
      return false;
    } else {
      errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
      $("#confirmbloodgroup_child").val("0").trigger("change");
      $("#bloodgroup_child").val("0").trigger("change");
    }
  }

  if (antia && antib && antiab && acells && bcells && ocells && antia != "0" && antib != "0" && antiab != "0" && acells != "0" && bcells != "0" && ocells != "0") {
    if ((antia != "1" || antia != "11") && (antib == "1" || antib == "11") && (antiab != "1" || antiab != "11") && (acells == "1" || acells == "11") && (bcells != "1" || bcells != "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_child").val("A").trigger("change");
      $("#bloodgroup_child").val("A").trigger("change");
    } else if ((antia == "1" || antia == "11") && (antib != "1" || antib != "11") && (antiab != "1" || antiab != "11") && (acells != "1" || acells != "11") && (bcells == "1" || bcells == "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_child").val("B").trigger("change");
      $("#bloodgroup_child").val("B").trigger("change");
    } else if ((antia == "1" || antia == "11") && (antib == "1" || antib == "11") && (antiab == "1" || antiab == "11") && (acells != "1" || acells != "11") && (bcells != "1" || bcells != "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_child").val("O").trigger("change");
      $("#bloodgroup_child").val("O").trigger("change");
    } else if ((antia != "1" || antia != "11") && (antib != "1" || antib != "11") && (antiab != "1" || antiab != "11") && (acells == "1" || acells == "11") && (bcells == "1" || bcells == "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_child").val("AB").trigger("change");
      $("#bloodgroup_child").val("AB").trigger("change");
    } else {
      errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
      $("#confirmbloodgroup_child").val("0").trigger("change");
      $("#bloodgroup_child").val("0").trigger("change");
    }
  } else {
    $("#bloodgroup_child").val("0");
  }
}

function autoBlood_father() {
  var abocount_father = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "0";
  var self = arguments.length > 1 ? arguments[1] : undefined;
  var col = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var antia = $("#antia_father" + abocount_father).val();
  var antib = $("#antib_father" + abocount_father).val();
  var antiab = $("#antiab_father" + abocount_father).val();
  var acells = $("#acells_father" + abocount_father).val();
  var bcells = $("#bcells_father" + abocount_father).val();
  var ocells = $("#ocells_father" + abocount_father).val();

  if (antia && antib && antia != "0" && antib != "0" && acells && bcells && acells != "0" && bcells != "0") {
    if (antia != "11" && antib == "11" && bcells != "11" && acells == "11" || antia != "1" && antib == "1" && bcells != "1" && acells == "1") {
      $("#confirmbloodgroup_father").val("A").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("A").trigger("change");
      return false;
    } else if (antia == "11" && antib != "11" && bcells == "11" && acells != "11" || antia == "1" && antib != "1" && bcells == "1" && acells != "1") {
      $("#confirmbloodgroup_father").val("B").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("B").trigger("change");
      return false;
    } else if (antia == "11" && antib == "11" && bcells != "11" && acells != "11" || antia == "1" && antib == "1" && bcells != "1" && acells != "1") {
      $("#confirmbloodgroup_father").val("O").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("O").trigger("change");
      return false;
    } else if (antia != 11 && antib != 11 && bcells == 11 && acells == 11 || antia != 1 && antib != 1 && bcells == 1 && acells == 1) {
      $("#confirmbloodgroup_father").val("AB").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("AB").trigger("change");
      return false;
    } else {
      errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
      $("#confirmbloodgroup_father").val("0").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("0").trigger("change");
    }
  }

  if (antia && antib && antiab && acells && bcells && ocells && antia != "0" && antib != "0" && antiab != "0" && acells != "0" && bcells != "0" && ocells != "0") {
    if ((antia != "1" || antia != "11") && (antib == "1" || antib == "11") && (antiab != "1" || antiab != "11") && (acells == "1" || acells == "11") && (bcells != "1" || bcells != "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_father").val("A").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("A").trigger("change");
    } else if ((antia == "1" || antia == "11") && (antib != "1" || antib != "11") && (antiab != "1" || antiab != "11") && (acells != "1" || acells != "11") && (bcells == "1" || bcells == "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_father").val("B").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("B").trigger("change");
    } else if ((antia == "1" || antia == "11") && (antib == "1" || antib == "11") && (antiab == "1" || antiab == "11") && (acells != "1" || acells != "11") && (bcells != "1" || bcells != "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_father").val("O").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("O").trigger("change");
    } else if ((antia != "1" || antia != "11") && (antib != "1" || antib != "11") && (antiab != "1" || antiab != "11") && (acells == "1" || acells == "11") && (bcells == "1" || bcells == "11") && (ocells == "1" || ocells == "11")) {
      $("#confirmbloodgroup_father").val("AB").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("AB").trigger("change");
    } else {
      errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
      $("#confirmbloodgroup_father").val("0").trigger("change");
      $("#lababobloodgroup_father" + abocount_father).val("0").trigger("change");
    }
  } else {
    $("#lababobloodgroup_father" + abocount_father).val("0");
  }
}

function setpos_child() {
  var labrhrt_child = $("#labrhrt_child").val();
  var lab37c_child = $("#lab37c_child").val();
  var labiat_child = $("#labiat_child").val();
  var labccc_child = $("#labccc_child").val();
  var labresult_child = $("#labresult_child").val();

  if (labrhrt_child > 1 || lab37c_child > 1 || labiat_child > 1 || labccc_child > 1 || labresult_child > 1) {
    $("#confirmrh_child").val("Rh+");
  }
}

function setpos_father() {
  var labrhrt_father = $("#labrhrt_father").val();
  var lab37c_father = $("#lab37c_father").val();
  var labiat_father = $("#labiat_father").val();
  var labccc_father = $("#labccc_father").val();
  var labresult_father = $("#labresult_father").val();

  if (labrhrt_father > 1 || lab37c_father > 1 || labiat_father > 1 || labccc_father > 1 || labresult_father > 1) {
    $("#confirmrh_father").val("Rh+");
  }
}

var abocount_child = 0;

function addABOTest_child() {
  var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var table = document.getElementById("list_table_abo_child").rows.length;

  if (table == 2) {
    if (value.length == 0) {
      value = {
        labreagent_child: 'CAT',
        lababoid_child: '',
        lababocode_child: '',
        lababoantia_child: '',
        lababoantib_child: '',
        lababoantiab_child: '',
        lababoacells_child: '',
        lababobcells_child: '',
        lababoocells_child: '',
        lababobloodgroup_child: ''
      };
    }
  } else {
    if (value.length == 0) {
      value = {
        labreagent_child: '',
        lababoid_child: '',
        lababocode_child: '',
        lababoantia_child: '',
        lababoantib_child: '',
        lababoantiab_child: '',
        lababoacells_child: '',
        lababobcells_child: '',
        lababoocells_child: '',
        lababobloodgroup_child: ''
      };
    }
  }

  var event_data = '';
  event_data += '<tr>';
  event_data += '<td class="td-table"  style="display:none;" >';
  event_data += JSON.stringify(value);
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<input type="text" id="labreagent_child' + abocount_child + '" value="' + value.labreagent_child + '" name="labreagent_child' + abocount_child + '" onkeyup="setLabBloodReagent_child(this)" class="form-control">';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoantia_child' + abocount_child + '" name="lababoantia_child' + abocount_child + '" onchange="setBloodABO_child(this)"  class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoantib_child' + abocount_child + '" name="lababoantib_child' + abocount_child + '" onchange="setBloodABO_child(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoantiab_child' + abocount_child + '" name="lababoantiab_child' + abocount_child + '" onchange="setBloodABO_child(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoacells_child' + abocount_child + '" name="lababoacells_child' + abocount_child + '" onchange="setBloodABO_child(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababobcells_child' + abocount_child + '" name="lababobcells_child' + abocount_child + '" onchange="setBloodABO_child(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoocells_child' + abocount_child + '" name="lababoocells_child' + abocount_child + '" onchange="setBloodABO_child(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababobloodgroup_child' + abocount_child + '" name="lababobloodgroup_child' + abocount_child + '" onchange="setLabBloodABO_child(this);"  class="form-control select2"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_abo_child").append(event_data);
  setABOTest0Serum("#lababoantia_child" + abocount_child, value.lababoantia_child);
  setABOTest0Serum("#lababoantib_child" + abocount_child, value.lababoantib_child);
  setABOTest0Serum("#lababoantiab_child" + abocount_child, value.lababoantiab_child);
  setABOTest0Serum("#lababoacells_child" + abocount_child, value.lababoacells_child);
  setABOTest0Serum("#lababobcells_child" + abocount_child, value.lababobcells_child);
  setABOTest0Serum("#lababoocells_child" + abocount_child, value.lababoocells_child);
  setBloodGroup("#lababobloodgroup_child" + abocount_child, value.lababobloodgroup_child);
  $("#lababoantia_child" + abocount_child).val(value.lababoantia_child);
  $("#lababoantib_child" + abocount_child).val(value.lababoantib_child);
  $("#lababoantiab_child" + abocount_child).val(value.lababoantiab_child);
  $("#lababoacells_child" + abocount_child).val(value.lababoacells_child);
  $("#lababobcells_child" + abocount_child).val(value.lababobcells_child);
  $("#lababoocells_child" + abocount_child).val(value.lababoocells_child);
  $("#lababobloodgroup_child" + abocount_child).select2({
    width: "100%",
    theme: "bootstrap",
    templateResult: function templateResult(state) {
      if (!state.id) {
        return state.text;
      }

      var strState = state.text.split("|");
      var $state = $('<span class="select2-span">&nbsp;' + (strState[1] ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>');
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
  });
  $("#lababobloodgroup_child" + abocount_child).val(value.lababobloodgroup_child);
  abocount_child++;
}

var abocount_father = 0;

function addABOTest_father() {
  var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var table = document.getElementById("list_table_abo_father").rows.length;

  if (table == 2) {
    if (value.length == 0) {
      value = {
        labreagent_father: 'CAT',
        lababoid_father: '',
        lababocode_father: '',
        lababoantia_father: '',
        lababoantib_father: '',
        lababoantiab_father: '',
        lababoacells_father: '',
        lababobcells_father: '',
        lababoocells_father: '',
        lababobloodgroup_father: ''
      };
    }
  } else {
    if (value.length == 0) {
      value = {
        labreagent_father: '',
        lababoid_father: '',
        lababocode_father: '',
        lababoantia_father: '',
        lababoantib_father: '',
        lababoantiab_father: '',
        lababoacells_father: '',
        lababobcells_father: '',
        lababoocells_father: '',
        lababobloodgroup_father: ''
      };
    }
  }

  var event_data = '';
  event_data += '<tr>';
  event_data += '<td class="td-table"  style="display:none;" >';
  event_data += JSON.stringify(value);
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<input type="text" id="labreagent_father' + abocount_father + '" value="' + value.labreagent_father + '" name="labreagent_father' + abocount_father + '" onkeyup="setLabBloodReagent_father(this)" class="form-control">';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoantia_father' + abocount_father + '" name="lababoantia_father' + abocount_father + '" onchange="setBloodABO_father(this)"  class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoantib_father' + abocount_father + '" name="lababoantib_father' + abocount_father + '" onchange="setBloodABO_father(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoantiab_father' + abocount_father + '" name="lababoantiab_father' + abocount_father + '" onchange="setBloodABO_father(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoacells_father' + abocount_father + '" name="lababoacells_father' + abocount_father + '" onchange="setBloodABO_father(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababobcells_father' + abocount_father + '" name="lababobcells_father' + abocount_father + '" onchange="setBloodABO_father(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababoocells_father' + abocount_father + '" name="lababoocells_father' + abocount_father + '" onchange="setBloodABO_father(this)" class="form-control"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<select id="lababobloodgroup_father' + abocount_father + '" name="lababobloodgroup_father' + abocount_father + '" onchange="setLabBloodABO_father(this);"  class="form-control select2"></select>';
  event_data += '</td>';
  event_data += '<td class="td-table">';
  event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_abo_father").append(event_data);
  setABOTest0Serum("#lababoantia_father" + abocount_father, value.lababoantia_father);
  setABOTest0Serum("#lababoantib_father" + abocount_father, value.lababoantib_father);
  setABOTest0Serum("#lababoantiab_father" + abocount_father, value.lababoantiab_father);
  setABOTest0Serum("#lababoacells_father" + abocount_father, value.lababoacells_father);
  setABOTest0Serum("#lababobcells_father" + abocount_father, value.lababobcells_father);
  setABOTest0Serum("#lababoocells_father" + abocount_father, value.lababoocells_father);
  setBloodGroup("#lababobloodgroup_father" + abocount_father, value.lababobloodgroup_father);
  $("#lababoantia_father" + abocount_father).val(value.lababoantia_father);
  $("#lababoantib_father" + abocount_father).val(value.lababoantib_father);
  $("#lababoantiab_father" + abocount_father).val(value.lababoantiab_father);
  $("#lababoacells_father" + abocount_father).val(value.lababoacells_father);
  $("#lababobcells_father" + abocount_father).val(value.lababobcells_father);
  $("#lababoocells_father" + abocount_father).val(value.lababoocells_father);
  $("#lababobloodgroup_father" + abocount_father).select2({
    width: "100%",
    theme: "bootstrap",
    templateResult: function templateResult(state) {
      if (!state.id) {
        return state.text;
      }

      var strState = state.text.split("|");
      var $state = $('<span class="select2-span">&nbsp;' + (strState[1] ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>');
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
  });
  $("#lababobloodgroup_father" + abocount_father).val(value.lababobloodgroup_father);
  abocount_father++;
}