var dataRhArr = [];
var dataRh2Arr = [];
var dataBloodGroupSerumArr = [];
var dataBloodGroupSerum2Arr = [];
var dataBloodGroupSerum3Arr = [];
var dataBloodGroupSerumABOFirstArr = [];
var dataBloodGroupArr = [];
var dataBloodAntiTest = [];
var dataSerumLabArr = [];

$(document).ready(function() {
    getRh().then(function success(data) {
        dataRhArr = data.data;
    });

    getRh2().then(function success(data) {
        dataRh2Arr = data.data;
    });

    getBloodGroupSerum().then(function success(data) {
        dataBloodGroupSerumArr = data.data; ////
    });

    getBloodGroupSerum2().then(function success(data) {
        dataBloodGroupSerum2Arr = data.data;
    });

    getBloodGroupSerum3().then(function success(data) {
        dataBloodGroupSerum3Arr = data.data;
    });

    getBloodGroupSerumABOFirst().then(function success(data) {
        dataBloodGroupSerumABOFirstArr = data.data;
    });

    getBloodGroup().then(function success(data) {
        dataBloodGroupArr = data.data;
    });

    getBloodAntiTest().then(function success(data) {
        BloodAntiTest = data.data;
    });

    getSerumLab().then(function success(data) {
        dataSerumLabArr = data.data;
    });
});


function setRh(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataRhArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.rhid)
                    .text(value.rhname2));
        });

        $(eid).val(val);
    }
}

function setRh2(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataRh2Arr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.rhid)
                    .text(value.rhname3 + '|' + value.rhcode2));
        });
        $(eid).val(val);
    }
}

function setRh3(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataRhArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.rhid)
                    .text(value.rhname3));
        });
        $(eid).val(val);
    }
}



function setBloodGroupSerum(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupSerumArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}

function setBloodGroupSeru3(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupSerum3Arr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}

function setBloodGroupSerum2(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupSerum2Arr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}

function setBloodGroupSerumABOFirst(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupSerumABOFirstArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}

function setBloodAntiTest(eid = "", val = "") {
    if (eid) {

        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(BloodAntiTest, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodantiid)
                    .text(value.bloodantiname));
        });

        $(eid).val(val);

    }
}

function setBloodGroup(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupArr, function(key, value) {
            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupid)
                    .text(value.bloodgroupname + '|' + value.bloodgroupcode));
        });
        $(eid).val(val);

    }

}

function setBloodGroupSerumLAB(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataSerumLabArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}

function removeOption(eid = "") {
    var eid = eid.replace("#", "");
    var selectElement = document.getElementById(eid);
    for (var i = selectElement.length - 1; i >= 0; i--) {
        if (selectElement) {
            selectElement.remove(i);
        }
    }
}

function getRh() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php?rhsort=1',
        dataType: 'json',
        type: 'get',
    });
}

function getRh2() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php?firstsort=P',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodGroup() {
    return $.ajax({
        url: 'data/masterdata/bloodgroup.php',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodGroupSerum() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserum.php',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodGroupSerum2() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserumcrossmacth.php',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodGroupSerum3() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserum_no_pn.php',
        dataType: 'json',
        type: 'get',
    });
}


function getBloodGroupSerumABOFirst() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserum.php?abofirst=1&firstsort=P',
        dataType: 'json',
        type: 'get',
    });
}


function getBloodAntiTest() {
    return $.ajax({
        url: 'data/masterdata/bloodantitest.php',
        dataType: 'json',
        type: 'get',
    });
}

function getSerumLab() {
    return $.ajax({
        url: 'data/masterdata/blood_group_serum_lab.php',
        dataType: 'json',
        type: 'get',
    });
}

function antiBody() {
    chk = $('#ROU').val();
    if (chk != '') {
        console.log(chk);
        var anti = '';
        anti += findAntibody(document.getElementById("antiTable1"));
        anti += findAntibody(document.getElementById("antiTable2"));
        document.getElementById('antiLabel').innerHTML = chk + ',' + lastString(anti);
    } else {
        var anti = '';
        anti += findAntibody(document.getElementById("antiTable1"));
        anti += findAntibody(document.getElementById("antiTable2"));
        document.getElementById('antiLabel').innerHTML = lastString(anti);
    }


}



function findAntibody(table) {
    var anti = '';

    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (cell.getElementsByTagName('input')[0] != undefined)
                if (cell.getElementsByTagName('input')[0].checked)
                    anti += cell.getElementsByTagName('input')[0].value + ',';
        }
    }
    return anti;

}


function checkAnti() {
    antiBody();
}



function removeCheckBox(table) {
    var anti = '';

    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (cell.getElementsByTagName('input')[0] != undefined)
                cell.getElementsByTagName('input')[0].checked = false;
        }
    }
    return anti;

}

function checkBox(h, v) {
    if (v.previous) {
        v.checked = false;
    }
    v.previous = v.checked;

    // var newphan = [...new Set(phan)];

    Phenotype();
}

function removeAntiBody() {
    removeCheckBox(document.getElementById("antiTable1"));
    removeCheckBox(document.getElementById("antiTable2"));
    phan = [];
    antiBody();
}

function removePhenotype() {
    removeCheckBox(document.getElementById("phenoTable1"));
    removeCheckBox(document.getElementById("phenoTable2"));
    removeCheckBox(document.getElementById("phenoTable3"));
    phan = [];
    Phenotype();
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function Phenotype() {
    var pheno = '';
    var pheonFull = '';
    pheno += findAntibody(document.getElementById("phenoTable1"));
    pheno += findAntibody(document.getElementById("phenoTable2"));
    pheno += findAntibody(document.getElementById("phenoTable3"));
    pheonFull = lastString(pheno);


    var JKa_1 = pheno.includes('Jk(a+)');
    var JKa_2 = pheno.includes('Jk(a-)');

    var JKb_1 = pheno.includes('Jk(b+)');
    var JKb_2 = pheno.includes('Jk(b-)');

    if (JKa_1 == true && JKb_1 == true) {
        pheno = pheno.replace("Jk(a+)", "");
        pheno = pheno.replace("Jk(b+)", "Jk(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (JKa_1 == true && JKb_2 == true) {
        pheno = pheno.replace("Jk(a+)", "");
        pheno = pheno.replace("Jk(b-)", "Jk(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (JKa_2 == true && JKb_1 == true) {
        pheno = pheno.replace("Jk(a-)", "");
        pheno = pheno.replace("Jk(b+)", "Jk(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (JKa_2 == true && JKb_2 == true) {
        pheno = pheno.replace("Jk(a-)", "");
        pheno = pheno.replace("Jk(b-)", "Jk(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    // Fy(a+) Fy(b+)
    var FYa_1 = pheno.includes('Fy(a+)');
    var FYa_2 = pheno.includes('Fy(a-)');

    var FYb_1 = pheno.includes('Fy(b+)');
    var FYb_2 = pheno.includes('Fy(b-)');

    if (FYa_1 == true && FYb_1 == true) {
        pheno = pheno.replace("Fy(a+)", "");
        pheno = pheno.replace("Fy(b+)", "Fy(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (FYa_1 == true && FYb_2 == true) {
        pheno = pheno.replace("Fy(a+)", "");
        pheno = pheno.replace("Fy(b-)", "Fy(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (FYa_2 == true && FYb_1 == true) {
        pheno = pheno.replace("Fy(a-)", "");
        pheno = pheno.replace("Fy(b+)", "Fy(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (FYa_2 == true && FYb_2 == true) {
        pheno = pheno.replace("Fy(a-)", "");
        pheno = pheno.replace("Fy(b-)", "Fy(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    // Le(a+),Le(b+)
    var LEa_1 = pheno.includes('Le(a+)');
    var LEa_2 = pheno.includes('Le(a-)');

    var LEb_1 = pheno.includes('Le(b+)');
    var LEb_2 = pheno.includes('Le(b-)');

    if (LEa_1 == true && LEb_1 == true) {
        pheno = pheno.replace("Le(a+)", "");
        pheno = pheno.replace("Le(b+)", "Le(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (LEa_1 == true && LEb_2 == true) {
        pheno = pheno.replace("Le(a+)", "");
        pheno = pheno.replace("Le(b-)", "Le(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (LEa_2 == true && LEb_1 == true) {
        pheno = pheno.replace("Le(a-)", "");
        pheno = pheno.replace("Le(b+)", "Le(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (LEa_2 == true && LEb_2 == true) {
        pheno = pheno.replace("Le(a-)", "");
        pheno = pheno.replace("Le(b-)", "Le(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    //Di(a+),Di(b+)
    var Dia_1 = pheno.includes('Di(a+)');
    var Dia_2 = pheno.includes('Di(a-)');

    var Dib_1 = pheno.includes('Di(b+)');
    var Dib_2 = pheno.includes('Di(b-)');

    if (Dia_1 == true && Dib_1 == true) {
        pheno = pheno.replace("Di(a+)", "");
        pheno = pheno.replace("Di(b+)", "Di(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Dia_1 == true && Dib_2 == true) {
        pheno = pheno.replace("Di(a+)", "");
        pheno = pheno.replace("Di(b-)", "Di(a+b-)");
        pheno = pheno.replace(",,", ",,");
    } else if (Dia_2 == true && Dib_1 == true) {
        pheno = pheno.replace("Di(a-)", "");
        pheno = pheno.replace("Di(b+)", "Di(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Dia_2 == true && Dib_2 == true) {
        pheno = pheno.replace("Di(a-)", "");
        pheno = pheno.replace("Di(b-)", "Di(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    //Kp(a+),Kp(b+)
    var Kpa_1 = pheno.includes('Kp(a+)');
    var Kpa_2 = pheno.includes('Kp(a-)');

    var Kpb_1 = pheno.includes('Kp(b+)');
    var Kpb_2 = pheno.includes('Kp(b-)');

    if (Kpa_1 == true && Kpb_1 == true) {
        pheno = pheno.replace("Kp(a+)", "");
        pheno = pheno.replace("Kp(b+)", "Kp(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Kpa_1 == true && Kpb_2 == true) {
        pheno = pheno.replace("Kp(a+)", "");
        pheno = pheno.replace("Kp(b-)", "Kp(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (Dia_2 == true && Dib_1 == true) {
        pheno = pheno.replace("Kp(a-)", "");
        pheno = pheno.replace("Kp(b+)", "Kp(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Kpa_2 == true && Kpb_2 == true) {
        pheno = pheno.replace("Kp(a-)", "");
        pheno = pheno.replace("Kp(b-)", "Kp(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    //Js(a+),Js(b+)
    var Jsa_1 = pheno.includes('Js(a+)');
    var Jsa_2 = pheno.includes('Js(a-)');

    var Jsb_1 = pheno.includes('Js(b+)');
    var Jsb_2 = pheno.includes('Js(b-)');

    if (Jsa_1 == true && Jsb_1 == true) {
        pheno = pheno.replace("Js(a+)", "");
        pheno = pheno.replace("Js(b+)", "Js(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Jsa_1 == true && Jsb_2 == true) {
        pheno = pheno.replace("Js(a+)", "");
        pheno = pheno.replace("Js(b-)", "Js(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (Jsa_2 == true && Jsb_1 == true) {
        pheno = pheno.replace("Js(a-)", "");
        pheno = pheno.replace("Js(b+)", "Js(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Jsa_2 == true && Jsb_2 == true) {
        pheno = pheno.replace("Js(a-)", "");
        pheno = pheno.replace("Js(b-)", "Js(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    //Lu(a+),Lu(b+)
    var Lua_1 = pheno.includes('Lu(a+)');
    var Lua_2 = pheno.includes('Lu(a-)');

    var Lub_1 = pheno.includes('Lu(b+)');
    var Lub_2 = pheno.includes('Lu(b-)');

    if (Lua_1 == true && Lub_1 == true) {
        pheno = pheno.replace("Lu(a+)", "");
        pheno = pheno.replace("Lu(b+)", "Lu(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Lua_1 == true && Lub_2 == true) {
        pheno = pheno.replace("Lu(a+)", "");
        pheno = pheno.replace("Lu(b-)", "Lu(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (Lua_2 == true && Lub_1 == true) {
        pheno = pheno.replace("Lu(a-)", "");
        pheno = pheno.replace("Lu(b+)", "Lu(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Lua_2 == true && Lub_2 == true) {
        pheno = pheno.replace("Lu(a-)", "");
        pheno = pheno.replace("Lu(b-)", "Lu(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    //Co(a+),Co(b+)
    var Coa_1 = pheno.includes('Co(a+)');
    var Coa_2 = pheno.includes('Co(a-)');

    var Cob_1 = pheno.includes('Co(b+)');
    var Cob_2 = pheno.includes('Co(b-)');

    if (Coa_1 == true && Cob_1 == true) {
        pheno = pheno.replace("Co(a+)", "");
        pheno = pheno.replace("Co(b+)", "Co(a+b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Coa_1 == true && Cob_2 == true) {
        pheno = pheno.replace("Co(a+)", "");
        pheno = pheno.replace("Co(b-)", "Co(a+b-)");
        pheno = pheno.replace(",,", ",");
    } else if (Coa_2 == true && Cob_1 == true) {
        pheno = pheno.replace("Co(a-)", "");
        pheno = pheno.replace("Co(b+)", "Co(a-b+)");
        pheno = pheno.replace(",,", ",");
    } else if (Coa_2 == true && Cob_2 == true) {
        pheno = pheno.replace("Co(a-)", "");
        pheno = pheno.replace("Co(b-)", "Co(a-b-)");
        pheno = pheno.replace(",,", ",");
    }
    ppheno = pheno.substr(0, 1);
    if (ppheno == ',') {
        pppheno = pheno.substr(1, 1000);
        document.getElementById('phenoLabel').innerHTML = lastString(pppheno);


    } else {
        document.getElementById('phenoLabel').innerHTML = lastString(pheno);
    }

    document.getElementById('phenoText').value = pheonFull;


}
var anticount = 0;

function addAntiSceeningTest(value = []) {

    if (value.length == 0) {
        value.donateantisceentest = '';
        value.donateantisceenid = '';
        value.donateantisceeno = '';
        value.donateantisceeno1 = '';
        value.donateantisceeno2 = '';
        value.donateantisceenlotno = '';
    }



    var event_data = '';
    event_data += '<tr>';
    event_data += '<td class="td-table" >';
    event_data += '<select  class="form-control" id="donateantisceentest' + anticount + '" name="donateantisceentest' + anticount + '" value="' + value.donateantisceentest + '" ></select>';
    event_data += '</td>'
    event_data += '<td class="td-table" style="width:100px">';
    event_data += '<select id="donateantisceenp1mi' + anticount + '" name="donateantisceenp1mi' + anticount + '"  class="form-control" onchange="setResultAntibodySceen_pos(' + anticount + ',this,3); autoclick_tube();"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:80px">';
    event_data += '<select id="donateantisceeno' + anticount + '" name="donateantisceeno' + anticount + '" class="form-control"  onchange="setResultAntibodySceen_pos(' + anticount + ',this,3); autoclick_tube();"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:80px">';
    event_data += '<select id="donateantisceeno1' + anticount + '" name="donateantisceeno1' + anticount + '" class="form-control"  onchange="setResultAntibodySceen_pos(' + anticount + ',this,3); autoclick_tube();"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:80px">';
    event_data += '<select id="donateantisceeno2' + anticount + '" name="donateantisceeno2' + anticount + '" class="form-control"  onchange="setResultAntibodySceen_pos(' + anticount + ',this,3); autoclick_tube();"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:120px">';
    event_data += '<input id="donateantisceenlotno' + anticount + '" value="' + value.donateantisceenlotno + '" name="donateantisceenlotno' + anticount + '" class="form-control">';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="donateantisceenid' + anticount + '" value="' + anticount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_anti_sceen").append(event_data);

    setBloodAntiTest("#donateantisceentest" + anticount, value.donateantisceentest);
    setBloodGroupSeru3("#donateantisceenp1mi" + anticount, value.donateantisceenp1mi);
    setBloodGroupSeru3("#donateantisceeno" + anticount, value.donateantisceeno);
    setBloodGroupSeru3("#donateantisceeno1" + anticount, value.donateantisceeno1);
    setBloodGroupSeru3("#donateantisceeno2" + anticount, value.donateantisceeno2);

    $("#donateantisceentest" + anticount).val(value.donateantisceentest);
    $("#donateantisceenp1mi" + anticount).val(value.donateantisceenp1mi);
    $("#donateantisceeno" + anticount).val(value.donateantisceeno);
    $("#donateantisceeno1" + anticount).val(value.donateantisceeno1);
    $("#donateantisceeno2" + anticount).val(value.donateantisceeno2);

    anticount++;
}

var antibodysceeningtest = '';

function setResultAntibodySceen_pos(indexcount0, self, col = '') {
    if (self.value > antibodysceeningtest) {
        antibodysceeningtest = self.value;
    }

    // alert(antibodysceeningtest);

    $("#bloodrhsceen").val(antibodysceeningtest);
}

var idencount = 0;

function addAntiIdenTest(value = []) {

    if (value.length == 0) {
        value.donateantiidentest = '';
        value.donateantiiden1 = '';
        value.donateantiiden2 = '';
        value.donateantiiden3 = '';
        value.donateantiiden4 = '';
        value.donateantiiden5 = '';
        value.donateantiiden6 = '';
        value.donateantiiden7 = '';
        value.donateantiiden8 = '';
        value.donateantiiden9 = '';
        value.donateantiiden10 = '';
        value.donateantiiden11 = '';
        value.donateantiidenauto = '';
        value.donateantiidenlotno = '';
    }



    var event_data = '';
    event_data += '<tr>';
    event_data += '<td class="td-table" >';
    event_data += '<select  class="form-control" id="donateantiidentest' + idencount + '" name="donateantiidentest' + idencount + '" value="' + value.donateantiidentest + '" ></select>';
    event_data += '</td>'
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden1' + idencount + '" name="donateantiiden1' + idencount + '"  class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden2' + idencount + '" name="donateantiiden2' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden3' + idencount + '" name="donateantiiden3' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden4' + idencount + '" name="donateantiiden4' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden5' + idencount + '" name="donateantiiden5' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden6' + idencount + '" name="donateantiiden6' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden7' + idencount + '" name="donateantiiden7' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden8' + idencount + '" name="donateantiiden8' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden9' + idencount + '" name="donateantiiden9' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden10' + idencount + '" name="donateantiiden10' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiiden11' + idencount + '" name="donateantiiden11' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select id="donateantiidenauto' + idencount + '" name="donateantiidenauto' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input id="donateantiidenlotno' + idencount + '" value="' + value.donateantiidenlotno + '" name="donateantiidenlotno' + idencount + '" class="form-control">';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="donateantisceenid' + idencount + '" value="' + idencount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_anti_iden").append(event_data);

    setBloodAntiTest("#donateantiidentest" + idencount, value.donateantiidentest);
    setBloodGroupSerum("#donateantiiden1" + idencount, value.donateantiiden1);
    setBloodGroupSerum("#donateantiiden2" + idencount, value.donateantiiden2);
    setBloodGroupSerum("#donateantiiden3" + idencount, value.donateantiiden3);
    setBloodGroupSerum("#donateantiiden4" + idencount, value.donateantiiden4);
    setBloodGroupSerum("#donateantiiden5" + idencount, value.donateantiiden5);
    setBloodGroupSerum("#donateantiiden6" + idencount, value.donateantiiden6);
    setBloodGroupSerum("#donateantiiden7" + idencount, value.donateantiiden7);
    setBloodGroupSerum("#donateantiiden8" + idencount, value.donateantiiden8);
    setBloodGroupSerum("#donateantiiden9" + idencount, value.donateantiiden9);
    setBloodGroupSerum("#donateantiiden10" + idencount, value.donateantiiden10);
    setBloodGroupSerum("#donateantiiden11" + idencount, value.donateantiiden11);
    setBloodGroupSerum("#donateantiidenauto" + idencount, value.donateantiidenauto);

    $("#donateantiidentest" + idencount).val(value.donateantiidentest);
    $("#donateantiiden1" + idencount).val(value.donateantiiden1);
    $("#donateantiiden2" + idencount).val(value.donateantiiden2);
    $("#donateantiiden3" + idencount).val(value.donateantiiden3);
    $("#donateantiiden4" + idencount).val(value.donateantiiden4);
    $("#donateantiiden5" + idencount).val(value.donateantiiden5);
    $("#donateantiiden6" + idencount).val(value.donateantiiden6);
    $("#donateantiiden7" + idencount).val(value.donateantiiden7);
    $("#donateantiiden8" + idencount).val(value.donateantiiden8);
    $("#donateantiiden9" + idencount).val(value.donateantiiden9);
    $("#donateantiiden10" + idencount).val(value.donateantiiden10);
    $("#donateantiiden11" + idencount).val(value.donateantiiden11);
    $("#donateantiidenauto" + idencount).val(value.donateantiidenauto);

    idencount++;
}

var rhcount = 0;

function addRhTest(value = []) {

    if (value.length == 0) {
        value.donaterhreagent = 'NBC';
        value.donaterhrt = '';
        value.donaterh37c = '';
        value.donaterhiat = '';
        value.donaterhccc = '';
        value.donaterhresult = '';
    }



    var event_data = '';
    event_data += '<tr>';
    event_data += '<td class="td-table" >';
    event_data += '<input  class="form-control" id="donaterhreagent' + rhcount + '" name="donaterhreagent' + rhcount + '" value="' + value.donaterhreagent + '" >';
    event_data += '</td>'
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donaterhrt' + rhcount + '" name="donaterhrt' + rhcount + '"  class="form-control" onchange="setRequestbloodrhrt(this,' + rhcount + ');setpos(' + rhcount + ');"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donaterh37c' + rhcount + '" name="donaterh37c' + rhcount + '" class="form-control" onchange="setRequestbloodrhrt(this,' + rhcount + ');setpos(' + rhcount + ');"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donaterhiat' + rhcount + '" name="donaterhiat' + rhcount + '" class="form-control" onchange="setRequestbloodrhrt(this,' + rhcount + ');setpos(' + rhcount + ');"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donaterhccc' + rhcount + '" name="donaterhccc' + rhcount + '" class="form-control" ></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donaterhresult' + rhcount + '" name="donaterhresult' + rhcount + '" class="form-control" onchange="setConfirmRh(this.value)"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="donateantisceenid' + rhcount + '" value="' + rhcount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_rh").append(event_data);

    if (rhcount == 1) {
        setBloodGroupSerumABOFirst("#donaterhrt" + rhcount, value.donaterhrt);
        setBloodGroupSerumABOFirst("#donaterh37c" + rhcount, value.donaterh37c);
        setBloodGroupSerumABOFirst("#donaterhiat" + rhcount, value.donaterhiat);
        setBloodGroupSerumABOFirst("#donaterhccc" + rhcount, value.donaterhccc);
    } else {
        setBloodGroupSerum("#donaterhrt" + rhcount, value.donaterhrt);
        setBloodGroupSerum("#donaterh37c" + rhcount, value.donaterh37c);
        setBloodGroupSerum("#donaterhiat" + rhcount, value.donaterhiat);
        setBloodGroupSerum("#donaterhccc" + rhcount, value.donaterhccc);
    }

    setRh2("#donaterhresult" + rhcount, value.donaterhresult);

    $("#donaterhrt" + rhcount).val(value.donaterhrt);
    $("#donaterh37c" + rhcount).val(value.donaterh37c);
    $("#donaterhiat" + rhcount).val(value.donaterhiat);
    $("#donaterhccc" + rhcount).val(value.donaterhccc);
    $("#donaterhresult" + rhcount).val(value.donaterhresult);

    $("#donaterhresult" + rhcount).select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    rhcount++;
}

function setpos(indexcount0) {

    var donaterhrt = $("#donaterhrt" + indexcount0).val();
    var donaterh37c = $("#donaterh37c" + indexcount0).val();
    var donaterhiat = $("#donaterhiat" + indexcount0).val();
    var labccc0 = $("#labccc0" + indexcount0).val();
    var labresult0 = $("#labresult0" + indexcount0).val();

    console.log(donaterhrt);

    if (donaterhrt == 10 || donaterh37c == 10 || donaterhiat == 10) {

        setDataModalSelectValue(`bloodrhinvest`, 'Rh+', 'Positive');
        setDataModalSelectValue(`donaterhresult` + indexcount0, 'Rh+', 'Positive');

    } else if (donaterhrt == 11 || donaterh37c == 11 || donaterhiat == 11) {
        setDataModalSelectValue(`bloodrhinvest`, 'Rh-', 'Negative');
        setDataModalSelectValue(`donaterhresult` + indexcount0, 'Rh-', 'Negative');
    } else {
        setDataModalSelectValue(`bloodrhinvest`, '', '');
        setDataModalSelectValue(`donaterhresult` + indexcount0, '', '');

    }
}


var abocount = 1;

function addABOTest(value = []) {

    if (value.length == 0) {
        value.donateaboid = '';
        value.donateabocode = '';
        value.donateantia = '';
        value.donateantib = '';
        value.donateantiab = '';
        value.donateacells = '';
        value.donatebcells = '';
        value.donateocells = '';
        value.donatebloodgroup = '';
        value.donateid = '';

        if (abocount == 1) {
            value.donatereagent = 'NBC';
        } else {
            value.donatereagent = '';
        }

    }

    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<input id="donatereagent' + abocount + '" name="donatereagent' + abocount + '" value="' + value.donatereagent + '"  class="form-control" />';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donateantia' + abocount + '" name="donateantia' + abocount + '" onchange="autoBlood(' + abocount + ')"  class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donateantib' + abocount + '" name="donateantib' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donateantiab' + abocount + '" name="donateantiab' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donateacells' + abocount + '" name="donateacells' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donatebcells' + abocount + '" name="donatebcells' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="donateocells' + abocount + '" name="donateocells' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select required id="donatebloodgroup' + abocount + '" name="donatebloodgroup' + abocount + '" onchange="checkBloodGroup(this.value,this)" class="form-control">';


    event_data += '</select></td>';

    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="donateaboid' + abocount + '" value="' + abocount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_abo").append(event_data);


    setBloodGroupSerumABOFirst
    if (abocount == 1) {
        setBloodGroupSerumABOFirst("#donateantia" + abocount, value.donateantia);
        setBloodGroupSerumABOFirst("#donateantib" + abocount, value.donateantib);
        setBloodGroupSerumABOFirst("#donateantiab" + abocount, value.donateantiab);
        setBloodGroupSerumABOFirst("#donateacells" + abocount, value.donateacells);
        setBloodGroupSerumABOFirst("#donatebcells" + abocount, value.donatebcells);
        setBloodGroupSerumABOFirst("#donateocells" + abocount, value.donateocells);
    } else {
        setBloodGroupSerum("#donateantia" + abocount, value.donateantia);
        setBloodGroupSerum("#donateantib" + abocount, value.donateantib);
        setBloodGroupSerum("#donateantiab" + abocount, value.donateantiab);
        setBloodGroupSerum("#donateacells" + abocount, value.donateacells);
        setBloodGroupSerum("#donatebcells" + abocount, value.donatebcells);
        setBloodGroupSerum("#donateocells" + abocount, value.donateocells);
    }


    setBloodGroup("#donatebloodgroup" + abocount, value.donatebloodgroup);

    $("#donateantia" + abocount).val(value.donateantia);
    $("#donateantib" + abocount).val(value.donateantib);
    $("#donateantiab" + abocount).val(value.donateantiab);
    $("#donateacells" + abocount).val(value.donateacells);
    $("#donatebcells" + abocount).val(value.donatebcells);
    $("#donateocells" + abocount).val(value.donateocells);
    $("#donatebloodgroup" + abocount).val(value.donatebloodgroup);




    $("#donatebloodgroup" + abocount).select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    abocount++;

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


function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function confirmAntiPheno() {
    document.getElementById('antibody').value = document.getElementById('antiLabel').innerHTML;
    document.getElementById('antibodyLable').innerHTML = document.getElementById('antiLabel').innerHTML;
    document.getElementById('phenotype').value = document.getElementById('phenoText').value;
    document.getElementById('phenotypeshow').value = document.getElementById('phenoLabel').innerHTML;
    document.getElementById('phenotypeLable').innerHTML = document.getElementById('phenoLabel').innerHTML;


    console.log(document.getElementById('phenoText').value);


    $("#bloodinvestModal").modal("hide");
    $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
}


function autoBlood(indexcount = "0") {

    var antia = $("#donateantia" + indexcount).val();
    var antib = $("#donateantib" + indexcount).val();
    var antiab = $("#donateantiab" + indexcount).val();
    var acells = $("#donateacells" + indexcount).val();
    var bcells = $("#donatebcells" + indexcount).val();
    var ocells = $("#donateocells" + indexcount).val();

    var vdonatebloodgroup = document.getElementById('donatebloodgroup' + indexcount);

    if ((antia) && (antib)) {
        // if ((antia) && (antib) && (antia != "0") && (antib != "0") && !(acells) && !(bcells) && (acells != "0") && (bcells != "0")) {
        // if ((antia) && (antib) && (antia != "0") && (antib != "0") && (acells) && (bcells) && (acells != "0") && (bcells != "0")) 
        if (
            ((antia != "11") && (antib == "11")) ||
            ((antia != "1") && (antib == "1"))
        ) {
            $("#bloodgroupinvest" + indexcount).val("A");
            $("#donatebloodgroup" + indexcount).val("A");

            $("#bloodgroupinvest" + indexcount).trigger('change');
            $("#donatebloodgroup" + indexcount).trigger('change');
            checkBloodGroup("A", vdonatebloodgroup);
            return false;
        } else if (
            ((antia == "11") && (antib != "11")) ||
            ((antia == "1") && (antib != "1"))
        ) {
            $("#bloodgroupinvest" + indexcount).val("B");
            $("#donatebloodgroup" + indexcount).val("B");

            $("#bloodgroupinvest" + indexcount).trigger('change');
            $("#donatebloodgroup" + indexcount).trigger('change');
            checkBloodGroup("B", vdonatebloodgroup);
            return false;
        } else if (
            ((antia == "11") && (antib == "11")) ||
            ((antia == "1") && (antib == "1"))
        ) {
            $("#bloodgroupinvest" + indexcount).val("O");
            $("#donatebloodgroup" + indexcount).val("O");

            $("#bloodgroupinvest" + indexcount).trigger('change');
            $("#donatebloodgroup" + indexcount).trigger('change');
            checkBloodGroup("O", vdonatebloodgroup);
            return false;
        } else if (
            ((antia != 11) && (antib != 11)) ||
            ((antia != 1 && antib != 1))
        ) {

            $("#bloodgroupinvest" + indexcount).val("AB");
            $("#donatebloodgroup" + indexcount).val("AB");

            $("#bloodgroupinvest" + indexcount).trigger('change');
            $("#donatebloodgroup" + indexcount).trigger('change');
            checkBloodGroup("AB", vdonatebloodgroup);
            return false;
        } else {
            errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
            $("#bloodgroupinvest" + indexcount).val("0");
            $("#donatebloodgroup" + indexcount).val("0");

            $("#bloodgroupinvest" + indexcount).trigger('change');
            $("#donatebloodgroup" + indexcount).trigger('change');
            setConfirmBloodGroup(0);
        }
    }

    // if ((antia) && (antib) && (antiab) && (acells) && (bcells) && (ocells) &&
    //     (antia != "0") && (antib != "0") && (antiab != "0") && (acells != "0") && (bcells != "0") && (ocells != "0")
    // ) {
    //     if ((antia != "1" || antia != "11") &&
    //         (antib == "1" || antib == "11") &&
    //         (antiab != "1" || antiab != "11") &&
    //         (acells == "1" || acells == "11") &&
    //         (bcells != "1" || bcells != "11") &&
    //         (ocells == "1" || ocells == "11")
    //     ) {
    //         $("#bloodgroupinvest" + indexcount).val("A");
    //         $("#donatebloodgroup" + indexcount).val("A");

    //         $("#bloodgroupinvest" + indexcount).trigger('change');
    //         $("#donatebloodgroup" + indexcount).trigger('change');
    //         checkBloodGroup("A", vdonatebloodgroup);

    //     } else if (
    //         (antia == "1" || antia == "11") &&
    //         (antib != "1" || antib != "11") &&
    //         (antiab != "1" || antiab != "11") &&
    //         (acells != "1" || acells != "11") &&
    //         (bcells == "1" || bcells == "11") &&
    //         (ocells == "1" || ocells == "11")) {
    //         $("#bloodgroupinvest" + indexcount).val("B");
    //         $("#donatebloodgroup" + indexcount).val("B");

    //         $("#bloodgroupinvest" + indexcount).trigger('change');
    //         $("#donatebloodgroup" + indexcount).trigger('change');
    //         checkBloodGroup("B", vdonatebloodgroup);
    //     } else if (
    //         (antia == "1" || antia == "11") &&
    //         (antib == "1" || antib == "11") &&
    //         (antiab == "1" || antiab == "11") &&
    //         (acells != "1" || acells != "11") &&
    //         (bcells != "1" || bcells != "11") &&
    //         (ocells == "1" || ocells == "11")) {
    //         $("#bloodgroupinvest" + indexcount).val("O");
    //         $("#donatebloodgroup" + indexcount).val("O");

    //         $("#bloodgroupinvest" + indexcount).trigger('change');
    //         $("#donatebloodgroup" + indexcount).trigger('change');
    //         checkBloodGroup("O", vdonatebloodgroup);
    //     } else if (
    //         (antia != "1" || antia != "11") &&
    //         (antib != "1" || antib != "11") &&
    //         (antiab != "1" || antiab != "11") &&
    //         (acells == "1" || acells == "11") &&
    //         (bcells == "1" || bcells == "11") &&
    //         (ocells == "1" || ocells == "11")
    //     ) {
    //         $("#bloodgroupinvest" + indexcount).val("AB");
    //         $("#donatebloodgroup" + indexcount).val("AB");

    //         $("#bloodgroupinvest" + indexcount).trigger('change');
    //         $("#donatebloodgroup" + indexcount).trigger('change');
    //         checkBloodGroup("AB", vdonatebloodgroup);

    //     } else {
    //         errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
    //         $("#bloodgroupinvest" + indexcount).val("0");
    //         $("#donatebloodgroup" + indexcount).val("0");

    //         $("#bloodgroupinvest" + indexcount).trigger('change');
    //         $("#donatebloodgroup" + indexcount).trigger('change');
    //         setConfirmBloodGroup("0");
    //     }
    // } else {
    //     $("#donatebloodgroup" + indexcount).val("0");

    //     $("#donatebloodgroup" + indexcount).trigger('change');
    //     setConfirmBloodGroup("0");
    // }

}

function setConfirmBloodGroup(blood_group = "") {
    console.log("*********");
    console.log("*********" + blood_group);
    var table = document.getElementById("list_table_abo");
    var status = false;
    var value = "";
    var r = 2;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {

            if (c == 8) {
                if (value != "" && value != cell.children[0].value)
                    status = true;

                value = cell.children[0].value;
            }


        }
    }


    if (status) {
        setDataModalSelectValue('bloodgroupinvest', '', '');
    } else {
        setDataModalSelectValue('bloodgroupinvest', blood_group, blood_group);
    }

    return status;

}

function checkBloodGroup(blood = "", self) {
    // chk = $('#bgcross').val();
    var chk = datablood[ckrow].blood_group;
    console.log(chk)
    console.log(blood)
    if (chk == blood) {
        setConfirmBloodGroup(blood);
    } else {

    }
    if (datablood[ckrow].blood_group != blood) {
        errorSwalABO("กรุ๊ปเลือดไม่ตรงกับที่ระบุไว้ในการรับบริจาค", self);
    }
}

function checkBloodGroup2(blood = "", self = null) {
    chk = $('#bgcross').val();
    console.log(chk)
    console.log(blood)
        // if(chk == blood){
        // setConfirmBloodGroup(blood);
        // }else{
        //     setConfirmBloodGroup();
        // }

    if (datablood[ckrow].blood_group != blood) {
        errorSwalABO("กรุ๊ปเลือดไม่ตรงกับที่ระบุไว้ในการรับบริจาค", self, true)
    }

}


function errorSwal($msg = "") {
    swal({
        title: $msg,
        type: 'warning',
        confirmButtonText: 'รับทราบ',
        allowOutsideClick: false
    });


}

function errorSwalABO($msg = "", self, statusabo = false) {
    console.log(self);
    swal({
        title: $msg,
        text: 'คุณต้องการเปลี่ยนกรุ๊ปเลือด หรือไม่',
        type: 'input',
        inputPlaceholder: "ระบุสาเหตุ",
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "YES",
        cancelButtonText: "NO",
        allowOutsideClick: false
    }, function(inputValue1) {
        console.log(inputValue1);
        if (inputValue1 != "" && inputValue1 != false) {

            var arrValue = {
                donatemodalaboid: '',
                donatemodalabocode: '',
                donatemodalreagent: '',
                donatemodalantia: '',
                donatemodalantib: '',
                donatemodalantiab: '',
                donatemodalacells: '',
                donatemodalbcells: '',
                donatemodalocells: '',
                donatemodalbloodgroup: self.value,
                donatemodalaboremark: inputValue1,
                donatemodalid: '',
            };

            // donatemodalaboid: '',
            //     donatemodalabocode: '',

            //     donatemodaldonordate: '',
            //     donatemodaldonoraboold: '',
            //     donatemodaldonorabonew: '',
            //     donatemodaldonorabouser: '',
            //     donatemodaldonoraboremark: '',

            //     donatemodalrajdate: '',
            //     donatemodalrajaboold: '',
            //     donatemodalrajabonew: self.value,
            //     donatemodalrajabouser: '',
            //     donatemodalrajaboremark: inputValue1,

            //     donatemodalrajdate: '',
            //     donatemodalrajabo: '',

            //     donatemodalid: '',

            if (statusabo) {
                addABOTestBloodGroup(self.parentNode.parentNode, inputValue1, arrValue, true);
            } else {
                addABOTestBloodGroup(self.parentNode.parentNode, inputValue1, arrValue);
            }



        } else if (inputValue1 === false) {
            if (statusabo) {
                self.value = 0;
            } else {
                deleteRow(self.parentNode);
                addABOTest();
            }
            setConfirmBloodGroup();

        } else {
            setTimeout(function() {
                swal({
                        title: "กรุณาระบุสาเหตุ",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonText: 'ตกลง',
                        closeOnConfirm: true
                    },
                    function() {
                        setTimeout(function() {
                            errorSwalABO($msg, self);
                        }, 500);
                    });
            }, 500);
        }
    });

}

function errorSwal2($msg = "", self) {
    console.log(self);
    swal({
        title: $msg,
        type: 'warning',
        confirmButtonText: 'รับทราบ',
        allowOutsideClick: false
    }, function(inputValue1) {
        if (inputValue1) {

            addABOTestBloodGroup(self.parentNode.parentNode);
            deleteRow(self.parentNode);
            addABOTest();
        }
    });

}

function errorSwal3($msg = "") {
    console.log(self);
    swal({
        title: $msg,
        type: 'warning',
        confirmButtonText: 'รับทราบ',
        allowOutsideClick: false
    }, function(inputValue1) {
        if (inputValue1) {

            $("#bloodgroupinvest").val("");
        }
    });

}


function addABOTestBloodGroup(self, donatemodalaboremark = "", aboconfirmarr, aboconfirm = false) {

    var arrValue;

    if (aboconfirm) {
        arrValue = aboconfirmarr;
    } else {
        arrValue = {
            donatemodalaboid: '',
            donatemodalabocode: '',
            donatemodalreagent: self.children[0].children[0].value,
            donatemodalantia: self.children[1].children[0].value,
            donatemodalantib: self.children[2].children[0].value,
            donatemodalantiab: self.children[3].children[0].value,
            donatemodalacells: self.children[4].children[0].value,
            donatemodalbcells: self.children[5].children[0].value,
            donatemodalocells: self.children[6].children[0].value,
            donatemodalbloodgroup: self.children[7].children[0].value,
            donatemodalaboremark: donatemodalaboremark,
            donatemodalid: '',
        };
    }

    addABOTestModal(arrValue);

}

var abo2count = 1;

function addABOTestModal(value = []) {

    if (value.length == 0) {
        value.donatemodalaboid = '';
        value.donatemodalabocode = '';
        value.donatemodalantia = '';
        value.donatemodalantib = '';
        value.donatemodalantiab = '';
        value.donatemodalacells = '';
        value.donatemodalbcells = '';
        value.donatemodalocells = '';
        value.donatemodalbloodgroup = '';
        value.donatemodalid = '';
        value.donatemodalstaff = '';
        value.donatemodalaboremark = '',
            value.donatemodaldatetime = '';

        if (abo2count == 1) {
            value.donatemodalreagent = 'NBC';
        } else {
            value.donatemodalreagent = '';
        }

    }

    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<input style="background: red;" id="donatemodalreagent' + abo2count + '" name="donatemodalreagent' + abo2count + '" value="' + value.donatemodalreagent + '"  class="form-control" />';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalantia' + abo2count + '" name="donatemodalantia' + abo2count + '" onchange="autoBlood(' + abo2count + ')"  class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalantib' + abo2count + '" name="donatemodalantib' + abo2count + '" onchange="autoBlood(' + abo2count + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalantiab' + abo2count + '" name="donatemodalantiab' + abo2count + '" onchange="autoBlood(' + abo2count + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalacells' + abo2count + '" name="donatemodalacells' + abo2count + '" onchange="autoBlood(' + abo2count + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalbcells' + abo2count + '" name="donatemodalbcells' + abo2count + '" onchange="autoBlood(' + abo2count + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalocells' + abo2count + '" name="donatemodalocells' + abo2count + '" onchange="autoBlood(' + abo2count + ')" class="form-control"></select>';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += '<select style="background: red;" id="donatemodalbloodgroup' + abo2count + '" name="donatemodalbloodgroup' + abo2count + '" onchange="checkBloodGroup(this.value,this)" class="form-control">';
    event_data += '</select></td>';

    event_data += '<td class="td-table" style="width:60px;background: red;" >';
    event_data += value.donatemodalaboremark;
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;" >';
    event_data += ((value.donatemodalstaff == '' || value.donatemodalstaff == undefined) ? session_fullname : value.donatemodalstaff);
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:60px;background: red;">';
    event_data += ((value.donatemodaldatetime == "" || value.donatemodaldatetime == undefined) ? getDMYHM543(moment().format('YYYY-MM-DD HH:mm')) : value.donatemodaldatetime);
    event_data += '</td>';


    $("#list_table_abo_blodgroup").append(event_data);


    if (abo2count == 1) {
        setBloodGroupSerumABOFirst("#donatemodalantia" + abo2count, value.donatemodalantia);
        setBloodGroupSerumABOFirst("#donatemodalantib" + abo2count, value.donatemodalantib);
        setBloodGroupSerumABOFirst("#donatemodalantiab" + abo2count, value.donatemodalantiab);
        setBloodGroupSerumABOFirst("#donatemodalacells" + abo2count, value.donatemodalacells);
        setBloodGroupSerumABOFirst("#donatemodalbcells" + abo2count, value.donatemodalbcells);
        setBloodGroupSerumABOFirst("#donatemodalocells" + abo2count, value.donatemodalocells);
    } else {
        setBloodGroupSerum("#donatemodalantia" + abo2count, value.donatemodalantia);
        setBloodGroupSerum("#donatemodalantib" + abo2count, value.donatemodalantib);
        setBloodGroupSerum("#donatemodalantiab" + abo2count, value.donatemodalantiab);
        setBloodGroupSerum("#donatemodalacells" + abo2count, value.donatemodalacells);
        setBloodGroupSerum("#donatemodalbcells" + abo2count, value.donatemodalbcells);
        setBloodGroupSerum("#donatemodalocells" + abo2count, value.donatemodalocells);
    }


    setBloodGroup("#donatemodalbloodgroup" + abo2count, value.donatemodalbloodgroup);

    $("#donatemodalantia" + abo2count).val(value.donatemodalantia);
    $("#donatemodalantib" + abo2count).val(value.donatemodalantib);
    $("#donatemodalantiab" + abo2count).val(value.donatemodalantiab);
    $("#donatemodalacells" + abo2count).val(value.donatemodalacells);
    $("#donatemodalbcells" + abo2count).val(value.donatemodalbcells);
    $("#donatemodalocells" + abo2count).val(value.donatemodalocells);
    $("#donatemodalbloodgroup" + abo2count).val(value.donatemodalbloodgroup);

    $("#donatebloodgroup" + abocount).select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    abo2count++;


}

function setDataModalSelectValue(elem = '', itemid, itemtext) {
    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}