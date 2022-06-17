var dataRhArr = [];
var dataRh2Arr = [];
var dataBloodGroupSerumArr = [];
var dataABOCellGroupSerumArr = [];
var dataBloodGroupArr = [];
var dataBloodAntiTest = [];
var dataResult = [];
var dataCrossMatchStatus = [];
var dataDoctor = [];
var dataPreparation = [];
var count = 0;
var adrData = [];
var ckrow = '';
var bag_number_error = '';

var datablood = [];

var sum_requestbloodcrossmacthconfirmqty = 0;

$(document).ready(function() {
    getRh().then(function success(data) {
        dataRhArr = data.data;
    });

    getRh2().then(function success(data) {
        dataRh2Arr = data.data;
    });

    getBloodGroupSerum().then(function success(data) {
        dataBloodGroupSerumArr = data.data;
    });

    getABOCellGroupSerum().then(function success(data) {
        dataABOCellGroupSerumArr = data.data;
    });

    getBloodGroup().then(function success(data) {
        dataBloodGroupArr = data.data;
    });

    getBloodAntiTest().then(function success(data) {
        BloodAntiTest = data.data;
    });

    getResult().then(function success(data) {
        dataResult = data.data;
    });


    getCrossMatchStatus().then(function success(data) {
        dataCrossMatchStatus = data.data;
    });

    getDoctor().then(function success(data) {
        dataDoctor = data.data;
    });

    getPreparation().then(function success(data) {
        dataPreparation = data.data;
    });

    $('.checkpatientuser').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/staff.php?type=issdpsave',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name + ' ' + item.surname
                        }
                    })
                };
            },
        }
    });
    $("#bag_number").on('keydown', function(e) {
        if (e.which == 13) {
            scanBlood();
        }
    });

    $("#patientid").on('keydown', function(e) {
        if (e.which == 13) {
            scanBarcode();
        }
    });

});


function setRh(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", '')
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
                .attr("value", '')
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
                .attr("value", '')
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

function setRh4(eid = "", val = "") {


    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", '')
                .text(""));

        // $.each(dataRhArr, function (key, value) {

        //     $(eid)
        //         .append($("<option></option>")
        //             .attr("value", value.rhid)
        //             .text(value.rhname3));
        // });

        $(eid)
            .append($("<option></option>")
                .attr("value", dataRhArr[1].rhid)
                .text(dataRhArr[1].rhname3));


        $(eid)
            .append($("<option></option>")
                .attr("value", dataRhArr[0].rhid)
                .text(dataRhArr[0].rhname3));

        $(eid).val(val);
    }
}

function setABOCellGroupSerum(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", '')
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


function setABOCellGroupSerum(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", '')
                .text(""));

        $.each(dataABOCellGroupSerumArr, function(key, value) {


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
                .attr("value", '')
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
                .attr("value", '')
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

function removeOption(eid = "") {
    console.log(eid);
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
        url: 'data/masterdata/bloodrh.php',
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
        url: 'data/masterdata/bloodgroupserumcrossmacth.php',
        dataType: 'json',
        type: 'get',
    });
}

function getABOCellGroupSerum() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserum.php?notpn=1',
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

function getResult() {
    return $.ajax({
        url: 'data/masterdata/crossmacthresult.php',
        dataType: 'json',
        type: 'get',
    });
}

function getCrossMatchStatus() {
    return $.ajax({
        url: 'data/masterdata/crossmacthstatus.php',
        dataType: 'json',
        type: 'get',
    });
}

function getDoctor() {
    return $.ajax({
        url: 'data/masterdata/doctor.php',
        dataType: 'json',
        type: 'get',
    });
}

function getPreparation() {
    return $.ajax({
        url: 'data/masterdata/staff.php?type=isbloodpreparation',
        dataType: 'json',
        type: 'get',
    });
}


function antiBody() {
    var anti = '';
    anti += findAntibody(document.getElementById("antiTable1"));
    anti += findAntibody(document.getElementById("antiTable2"));
    document.getElementById('antiLabel').innerHTML = lastString(anti);
}

function Phenotype() {
    // var pheno = '';
    // pheno += findAntibody(document.getElementById("phenoTable1"));
    // pheno += findAntibody(document.getElementById("phenoTable2"));
    // document.getElementById('phenoLabel').value = lastString(pheno);

    var pheno = '';
    pheno += findAntibody(document.getElementById("phenoTable1"));
    pheno += findAntibody(document.getElementById("phenoTable2"));
    pheno += findAntibody(document.getElementById("phenoTable3"));

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
    // document.getElementById('phenoLabel').innerHTML = lastString(pheno);

    ppheno = pheno.substr(0, 1);
    if (ppheno == ',') {
        pppheno = pheno.substr(1, 1000);
        // document.getElementById('pheno').value = lastString(pppheno);
        phenoNew = PhenotypeAgInOutGrouping(pppheno);
    } else {
        // document.getElementById('pheno').value = lastString(pheno);
        phenoNew = PhenotypeAgInOutGrouping(pheno);
    }
    document.getElementById('phenoLabel').innerHTML = lastString(phenoNew);

}

function findAntibodyAgInOut(table) {
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

function PhenotypeAgInOutGrouping(pheno = "") {

    var phenoRsultTwoKey = [];

    // Jk
    phenoRsultTwoKey = AgMapGrouping(pheno, "Jk");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Fy
    phenoRsultTwoKey = AgMapGrouping(pheno, "Fy");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Le
    phenoRsultTwoKey = AgMapGrouping(pheno, "Le");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Di
    phenoRsultTwoKey = AgMapGrouping(pheno, "Di");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Kp
    phenoRsultTwoKey = AgMapGrouping(pheno, "Kp");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Js
    phenoRsultTwoKey = AgMapGrouping(pheno, "Js");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Lu
    phenoRsultTwoKey = AgMapGrouping(pheno, "Lu");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    // Co
    phenoRsultTwoKey = AgMapGrouping(pheno, "Co");
    if (phenoRsultTwoKey.length > 0)
        pheno = phenoReplace(pheno, phenoRsultTwoKey[1], phenoRsultTwoKey[0]);

    return pheno;
}

function phenoReplace(pheno, phenokey, keygroupname) {

    var arrPheno = phenokey.split(",");
    pheno = pheno.replace(arrPheno[0], keygroupname);
    pheno = pheno.replace(arrPheno[1] + ",", "");
    return pheno;

}


function AgMapGrouping(pheno = "", key = "") {
    var rgxp = new RegExp(key, "g");
    var arrPhen = [];

    if ((pheno.match(rgxp) || []).length == 2) {

        var arrPheno = pheno.split(",");

        var keyGroup1 = "";
        var keyGroup2 = "";
        var Phen1 = "";
        var Phen2 = "";
        var CountPhen = 1;
        $.each(arrPheno, function(index, value) {

            if (value.search(key) >= 0) {
                if (CountPhen == 1) {
                    Phen1 = value;
                    keyGroup1 = value.substring(3, 5) //+ value.substring(15,16);
                    console.log(value);
                }

                if (CountPhen == 2) {
                    Phen2 = value;
                    keyGroup2 = value.substring(3, 5) // + value.substring(15,16);
                }

                CountPhen++;
            }

        });


        var keyGroup = "";
        var Phen = "";
        if (keyGroup1 > keyGroup2) {
            keyGroup = keyGroup2 + keyGroup1;
        } else {
            keyGroup = keyGroup1 + keyGroup2;
        }

        if (Phen1 > Phen2) {
            Phen = Phen2 + "," + Phen1;
        } else {
            Phen = Phen1 + "," + Phen2;
        }

        arrPhen = [key + "(" + keyGroup + ")", Phen];

    }
    return arrPhen;
}


function PhenotypeAgInOutGroupingRemove() {


    removeCheckBox(document.getElementById("phenoTable1"));
    removeCheckBox(document.getElementById("phenoTable2"));
    removeCheckBox(document.getElementById("phenoTable3"));

    document.getElementById('pheno').value = "";
    document.getElementById('phenoLabel').value = "";
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

function removeAntiBody() {
    removeCheckBox(document.getElementById("antiTable1"));
    removeCheckBox(document.getElementById("antiTable2"));
    antiBody();
}

function removePhenotype() {
    removeCheckBox(document.getElementById("phenoTable1"));
    removeCheckBox(document.getElementById("phenoTable2"));
    removeCheckBox(document.getElementById("phenoTable3"));
    Phenotype();
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

function checkBox(v) {
    if (v.previous) {
        v.checked = false;
    }
    v.previous = v.checked;

    Phenotype();
}

var anticount = 0;

function addAntiSceeningTest(value = []) {

    if (value.length == 0) {
        value.requestbloodantisceentest = '';
        value.requestbloodantisceenid = '';
        value.requestbloodantisceeno = '';
        value.requestbloodantisceeno1 = '';
        value.requestbloodantisceeno2 = '';
        value.requestbloodantisceenlotno = '';
    }



    var event_data = '';
    event_data += '<tr>';
    event_data += '<td class="td-table" >';
    event_data += '<select  class="form-control" id="requestbloodantisceentest' + anticount + '" name="requestbloodantisceentest' + anticount + '" value="' + value.requestbloodantisceentest + '" ></select>';
    event_data += '</td>'
    event_data += '<td class="td-table" style="width:100px">';
    event_data += '<select id="requestbloodantisceenp1mi' + anticount + '" name="requestbloodantisceenp1mi' + anticount + '" onchange="findListTableAntiSceen()"  class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:80px">';
    event_data += '<select id="requestbloodantisceeno' + anticount + '" name="requestbloodantisceeno' + anticount + '" onchange="findListTableAntiSceen()" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:80px">';
    event_data += '<select id="requestbloodantisceeno1' + anticount + '" name="requestbloodantisceeno1' + anticount + '" onchange="findListTableAntiSceen()" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:80px">';
    event_data += '<select id="requestbloodantisceeno2' + anticount + '" name="requestbloodantisceeno2' + anticount + '" onchange="findListTableAntiSceen()" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:120px">';
    event_data += '<input id="requestbloodantisceenlotno' + anticount + '" value="' + value.requestbloodantisceenlotno + '" name="requestbloodantisceenlotno' + anticount + '" class="form-control">';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="requestbloodantisceenid' + anticount + '" value="' + anticount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_anti_sceen").append(event_data);

    setBloodAntiTest("#requestbloodantisceentest" + anticount, value.requestbloodantisceentest);
    setABOCellGroupSerum("#requestbloodantisceenp1mi" + anticount, value.requestbloodantisceenp1mi);
    setABOCellGroupSerum("#requestbloodantisceeno" + anticount, value.requestbloodantisceeno);
    setABOCellGroupSerum("#requestbloodantisceeno1" + anticount, value.requestbloodantisceeno1);
    setABOCellGroupSerum("#requestbloodantisceeno2" + anticount, value.requestbloodantisceeno2);

    $("#requestbloodantisceentest" + anticount).val(value.requestbloodantisceentest);
    $("#requestbloodantisceenp1mi" + anticount).val(value.requestbloodantisceenp1mi);
    $("#requestbloodantisceeno" + anticount).val(value.requestbloodantisceeno);
    $("#requestbloodantisceeno1" + anticount).val(value.requestbloodantisceeno1);
    $("#requestbloodantisceeno2" + anticount).val(value.requestbloodantisceeno2);

    anticount++;
}


var idencount = 0;

function addAntiIdenTest(value = []) {

    if (value.length == 0) {
        value.requestbloodantiidentest = '';
        value.requestbloodantiiden1 = '';
        value.requestbloodantiiden2 = '';
        value.requestbloodantiiden3 = '';
        value.requestbloodantiiden4 = '';
        value.requestbloodantiiden5 = '';
        value.requestbloodantiiden6 = '';
        value.requestbloodantiiden7 = '';
        value.requestbloodantiiden8 = '';
        value.requestbloodantiiden9 = '';
        value.requestbloodantiiden10 = '';
        value.requestbloodantiiden11 = '';
        value.requestbloodantiidenauto = '';
        value.requestbloodantiidenlotno = '';
    }



    var event_data = '';
    event_data += '<tr>';
    event_data += '<td class="td-table" >';
    event_data += '<select  class="form-control" id="requestbloodantiidentest' + idencount + '" name="requestbloodantiidentest' + idencount + '" value="' + value.requestbloodantiidentest + '" ></select>';
    event_data += '</td>'
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden1' + idencount + '" name="requestbloodantiiden1' + idencount + '"  class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden2' + idencount + '" name="requestbloodantiiden2' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden3' + idencount + '" name="requestbloodantiiden3' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden4' + idencount + '" name="requestbloodantiiden4' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden5' + idencount + '" name="requestbloodantiiden5' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden6' + idencount + '" name="requestbloodantiiden6' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden7' + idencount + '" name="requestbloodantiiden7' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden8' + idencount + '" name="requestbloodantiiden8' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden9' + idencount + '" name="requestbloodantiiden9' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden10' + idencount + '" name="requestbloodantiiden10' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiiden11' + idencount + '" name="requestbloodantiiden11' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select id="requestbloodantiidenauto' + idencount + '" name="requestbloodantiidenauto' + idencount + '" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:120px">';
    event_data += '<input id="requestbloodantiidenlotno' + idencount + '" value="' + value.requestbloodantiidenlotno + '" name="requestbloodantiidenlotno' + idencount + '" class="form-control">';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="requestbloodantisceenid' + idencount + '" value="' + idencount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_anti_iden").append(event_data);

    setBloodAntiTest("#requestbloodantiidentest" + idencount, value.requestbloodantiidentest);
    setABOCellGroupSerum("#requestbloodantiiden1" + idencount, value.requestbloodantiiden1);
    setABOCellGroupSerum("#requestbloodantiiden2" + idencount, value.requestbloodantiiden2);
    setABOCellGroupSerum("#requestbloodantiiden3" + idencount, value.requestbloodantiiden3);
    setABOCellGroupSerum("#requestbloodantiiden4" + idencount, value.requestbloodantiiden4);
    setABOCellGroupSerum("#requestbloodantiiden5" + idencount, value.requestbloodantiiden5);
    setABOCellGroupSerum("#requestbloodantiiden6" + idencount, value.requestbloodantiiden6);
    setABOCellGroupSerum("#requestbloodantiiden7" + idencount, value.requestbloodantiiden7);
    setABOCellGroupSerum("#requestbloodantiiden8" + idencount, value.requestbloodantiiden8);
    setABOCellGroupSerum("#requestbloodantiiden9" + idencount, value.requestbloodantiiden9);
    setABOCellGroupSerum("#requestbloodantiiden10" + idencount, value.requestbloodantiiden10);
    setABOCellGroupSerum("#requestbloodantiiden11" + idencount, value.requestbloodantiiden11);
    setABOCellGroupSerum("#requestbloodantiidenauto" + idencount, value.requestbloodantiidenauto);

    $("#requestbloodantiidentest" + idencount).val(value.requestbloodantiidentest);
    $("#requestbloodantiiden1" + idencount).val(value.requestbloodantiiden1);
    $("#requestbloodantiiden2" + idencount).val(value.requestbloodantiiden2);
    $("#requestbloodantiiden3" + idencount).val(value.requestbloodantiiden3);
    $("#requestbloodantiiden4" + idencount).val(value.requestbloodantiiden4);
    $("#requestbloodantiiden5" + idencount).val(value.requestbloodantiiden5);
    $("#requestbloodantiiden6" + idencount).val(value.requestbloodantiiden6);
    $("#requestbloodantiiden7" + idencount).val(value.requestbloodantiiden7);
    $("#requestbloodantiiden8" + idencount).val(value.requestbloodantiiden8);
    $("#requestbloodantiiden9" + idencount).val(value.requestbloodantiiden9);
    $("#requestbloodantiiden10" + idencount).val(value.requestbloodantiiden10);
    $("#requestbloodantiiden11" + idencount).val(value.requestbloodantiiden11);
    $("#requestbloodantiidenauto" + idencount).val(value.requestbloodantiidenauto);

    idencount++;
}



var rhcount = 0;

function addRhTest(value = []) {

    if (value.length == 0) {
        if (rhcount == 0)
            value.requestbloodrhreagent = 'CAT';
        else
            value.requestbloodrhreagent = '';

        value.requestbloodrhrt = '';
        value.requestbloodrh37c = '';
        value.requestbloodrhiat = '';
        value.requestbloodrhccc = '';
        value.requestbloodrhresult = '';
    }



    var event_data = '';
    event_data += '<tr>';
    event_data += '<td class="td-table" >';
    event_data += '<input  class="form-control" id="requestbloodrhreagent' + rhcount + '" name="requestbloodrhreagent' + rhcount + '" value="' + value.requestbloodrhreagent + '" >';
    event_data += '</td>'
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="requestbloodrhrt' + rhcount + '" name="requestbloodrhrt' + rhcount + '"  class="form-control" onchange="setRequestbloodrhrt(this,' + rhcount + ')"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="requestbloodrh37c' + rhcount + '" name="requestbloodrh37c' + rhcount + '" class="form-control" onchange="setRequestbloodrhrt(this,' + rhcount + ')"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="requestbloodrhiat' + rhcount + '" name="requestbloodrhiat' + rhcount + '" class="form-control" onchange="setRequestbloodrhrt(this,' + rhcount + ')"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="requestbloodrhccc' + rhcount + '" name="requestbloodrhccc' + rhcount + '" class="form-control" ></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:60px">';
    event_data += '<select id="requestbloodrhresult' + rhcount + '" name="requestbloodrhresult' + rhcount + '" onchange="setConfirmRh(this.value)" class="form-control"></select>';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<input type="hidden"  name="requestbloodantisceenid' + rhcount + '" value="' + rhcount + '" >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';


    $("#list_table_rh").append(event_data);

    setABOCellGroupSerum("#requestbloodrhrt" + rhcount, value.requestbloodrhrt);
    setABOCellGroupSerum("#requestbloodrh37c" + rhcount, value.requestbloodrh37c);
    setABOCellGroupSerum("#requestbloodrhiat" + rhcount, value.requestbloodrhiat);
    setABOCellGroupSerum("#requestbloodrhccc" + rhcount, value.requestbloodrhccc);
    setRh2("#requestbloodrhresult" + rhcount, value.requestbloodrhresult);

    $("#requestbloodrhresult" + rhcount).select2({
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

    $("#requestbloodrhrt" + rhcount).val(value.requestbloodrhrt);
    $("#requestbloodrh37c" + rhcount).val(value.requestbloodrh37c);
    $("#requestbloodrhiat" + rhcount).val(value.requestbloodrhiat);
    $("#requestbloodrhccc" + rhcount).val(value.requestbloodrhccc);
    $("#requestbloodrhresult" + rhcount).val(value.requestbloodrhresult);

    rhcount++;
}

function setRequestbloodrhrt(self, id) {

    if (self.value > 1) {
        $("#requestbloodrhresult" + id).val('Rh+').trigger("change");
        $("#confirmrhid").val('Rh+').trigger("change");
        setConfirmRh('Rh+');
    } else if (self.value == 1) {
        $("#requestbloodrhresult" + id).val('Rh-').trigger("change");
        $("#confirmrhid").val('Rh-').trigger("change");
        setConfirmRh('Rh-');
    }

}

function setConfirmRh(rhid = "") {
    var table = document.getElementById("list_table_rh");
    var status = false;
    var value = "";
    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {

            if (c == 6) {
                if (value != "" && value != cell.children[0].value)
                    status = true;

                value = cell.children[0].value;
            }

        }
    }

    if (status) {
        $("#confirmrhid").val(0);
    } else {
        $("#confirmrhid").val(rhid);
    }

    var confirmrhid = $("#confirmrhid").val();
    $("#confirmrhidshow").val(getRhName($("#confirmrhid").val()));
    checkRhCross(confirmrhid);

}

function checkRhCross(rhid) {
    console.log("datablood.rhid : " + datablood.rhid);
    console.log("rhid : " + rhid);
    if (datablood.rhid != '' && datablood.rhid != rhid && rhid != '')
        errorSwal("Rh ไม่ตรงกับที่ระบุไว้ในการแจ้งขอเลือด");
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
    document.getElementById('antibodyshow').innerHTML = document.getElementById('antiLabel').innerHTML;

    document.getElementById('phenotype').value = document.getElementById('phenoText').value;
    document.getElementById('phenotypedisplay').value = document.getElementById('phenoLabel').innerHTML;
    document.getElementById('phenotypeLable').innerHTML = document.getElementById('phenoLabel').innerHTML;


    var ac_antibody = document.getElementById('antibody').value;
    var ac_phenotype = document.getElementById('phenotype').value;

    var patientantibody = document.getElementById('patientantibody').value;
    if (ac_antibody != '')
        patientantibody = patientantibody + ',' + ac_antibody;

    var patientphenotype = document.getElementById('patientphenotype').value;
    if (ac_phenotype != '')
        patientphenotype = patientphenotype + ',' + ac_phenotype;

    var antibody = patientantibody.split(",");
    patientantibody = '';
    antibody.forEach(function(entry) {
        if (patientantibody.search(entry) < 0)
            patientantibody = patientantibody + entry + ',';
    });

    patientantibody = lastString(patientantibody);

    var phenotype = patientphenotype.split(",");
    patientphenotype = '';
    console.log(phenotype);
    phenotype.forEach(function(entry) {
        // if(patientphenotype.search(entry) < 0)
        patientphenotype = patientphenotype + entry + ',';
    });

    patientphenotype = lastString(patientphenotype);

    document.getElementById('patientantibody').value = patientantibody;
    document.getElementById('patientphenotype').value = patientphenotype;

    console.log(document.getElementById('patientantibody').value);

    $("#bloodinvestModal").modal("hide");
    $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
}

function antibodyModal() {
    // removeAntiBody();
    // removePhenotype();
    var antibody = document.getElementById('antibody').value.split(",");
    antibody.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });
    var phenotype = document.getElementById('phenotype').value.split(",");
    phenotype.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });
    document.getElementById('antiLabel').innerHTML = document.getElementById('antibody').value;
    document.getElementById('phenoLabel').innerHTML = document.getElementById('phenotypeLable').innerHTML;
    document.getElementById('phenoText').value = document.getElementById('phenotype').value;

    $("#bloodinvestModal").modal('show');
}

function findBloodABO(table) {
    var anti = '';
    var arrCell = [];
    var arrRow = [];
    var r = 2;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {

            if (c == 1)
                arrCell = realMerge(arrCell, [{ reagent: cell.children[0].value }]);

            if (c == 2)
                arrCell = realMerge(arrCell, [{ requestantia: cell.children[0].value }]);

            if (c == 3)
                arrCell = realMerge(arrCell, [{ requestantib: cell.children[0].value }]);

            if (c == 4)
                arrCell = realMerge(arrCell, [{ requestantiab: cell.children[0].value }]);

            if (c == 5)
                arrCell = realMerge(arrCell, [{ requestacells: cell.children[0].value }]);

            if (c == 6)
                arrCell = realMerge(arrCell, [{ requestbcells: cell.children[0].value }]);

            if (c == 7)
                arrCell = realMerge(arrCell, [{ requestocells: cell.children[0].value }]);

            if (c == 8)
                arrCell = realMerge(arrCell, [{ requestbloodgroup: cell.children[0].value }]);


        }
        arrRow.push(arrCell);
        arrCell = [];
    }
    return arrRow;



}


function findAntibodySceenTest(table) {
    var anti = '';
    var arrCell = [];
    var arrRow = [];
    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (c == 1) {
                if (cell.children[0].value != "undefined") {
                    arrCell = realMerge(arrCell, [{ requestbloodantisceentest: cell.children[0].value }]);
                } else {
                    arrCell = realMerge(arrCell, [{ requestbloodantisceentest: "" }]);
                }
            }

            if (c == 2)
                arrCell = realMerge(arrCell, [{ requestbloodantisceenp1mi: cell.children[0].value }]);

            if (c == 3)
                arrCell = realMerge(arrCell, [{ requestbloodantisceeno: cell.children[0].value }]);

            if (c == 4)
                arrCell = realMerge(arrCell, [{ requestbloodantisceeno1: cell.children[0].value }]);

            if (c == 5)
                arrCell = realMerge(arrCell, [{ requestbloodantisceeno2: cell.children[0].value }]);

            if (c == 6) {
                arrCell = realMerge(arrCell, [{ requestbloodantisceenlotno: cell.children[0].value }]);
            }


        }
        arrRow.push(arrCell);
        arrCell = [];
    }
    return arrRow;



}

function findAntibodyIdenTest(table) {

    var arrCell = [];
    var arrRow = [];
    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (c == 1)
                arrCell = realMerge(arrCell, [{ requestbloodantiidentest: cell.children[0].value }]);

            if (c == 2)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden1: cell.children[0].value }]);

            if (c == 3)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden2: cell.children[0].value }]);

            if (c == 4)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden3: cell.children[0].value }]);

            if (c == 5)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden4: cell.children[0].value }]);

            if (c == 6)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden5: cell.children[0].value }]);

            if (c == 7)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden6: cell.children[0].value }]);

            if (c == 8)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden7: cell.children[0].value }]);

            if (c == 9)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden8: cell.children[0].value }]);

            if (c == 10)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden9: cell.children[0].value }]);

            if (c == 11)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden10: cell.children[0].value }]);

            if (c == 12)
                arrCell = realMerge(arrCell, [{ requestbloodantiiden11: cell.children[0].value }]);

            if (c == 13)
                arrCell = realMerge(arrCell, [{ requestbloodantiidenauto: cell.children[0].value }]);

            if (c == 14)
                arrCell = realMerge(arrCell, [{ requestbloodantiidenlotno: cell.children[0].value }]);

        }
        arrRow.push(arrCell);
        arrCell = [];
    }
    return arrRow;



}

function findRh(table) {
    var arrCell = [];
    var arrRow = [];
    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (c == 1)
                arrCell = realMerge(arrCell, [{ requestbloodrhreagent: cell.children[0].value }]);

            if (c == 2)
                arrCell = realMerge(arrCell, [{ requestbloodrhrt: cell.children[0].value }]);

            if (c == 3)
                arrCell = realMerge(arrCell, [{ requestbloodrh37c: cell.children[0].value }]);

            if (c == 4)
                arrCell = realMerge(arrCell, [{ requestbloodrhiat: cell.children[0].value }]);

            if (c == 5)
                arrCell = realMerge(arrCell, [{ requestbloodrhccc: cell.children[0].value }]);

            if (c == 6)
                arrCell = realMerge(arrCell, [{ requestbloodrhresult: cell.children[0].value }]);

        }
        arrRow.push(arrCell);
        arrCell = [];
    }
    return arrRow;



}


function findListTableAntiSceen() {
    var status = false;
    var table = document.getElementById('list_table_anti_sceen');
    var r = 1;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (c == 2 || c == 3 || c == 4 || c == 5) {

                if (cell.children[0].value > 1) {
                    status = true;
                }
            }

        }
    }

    if (status) {
        $("#confirmsceen").val("Rh+");
        $("#confirmsceen").trigger('change');
        $("#confirmabsreenshow").val(getRhName("Rh+")).trigger("change");
    } else {
        $("#confirmsceen").val("Rh-");
        $("#confirmsceen").trigger('change');
        $("#confirmabsreenshow").val(getRhName("Rh-")).trigger("change");
    }

}

function findCrossMatchItem(table) {

    var arrCell = [];
    var arrRow = [];
    var r = 2;
    while (row = table.rows[r++]) {
        var c = 0;
        while (cell = row.cells[c++]) {
            if (c == 1)
                arrCell = realMerge(arrCell, [{ requestbloodcrossmacthck: ((cell.children[0].checked) ? '1' : '') }]);

            if (c == 3)
                arrCell = realMerge(arrCell, [{ bag_number: cell.children[0].innerHTML }]);

            if (c == 4)
                arrCell = realMerge(arrCell, [{ sub: cell.innerHTML }]);

            if (c == 5)
                arrCell = realMerge(arrCell, [{ islight: ((cell.children[0].checked) ? '1' : '') }]);

            if (c == 6)
                arrCell = realMerge(arrCell, [{ hlamatch: ((cell.children[0].checked) ? '1' : '') }]);

            if (c == 7)
                arrCell = realMerge(arrCell, [{ bloodgroupid: cell.innerHTML }]);

            if (c == 8)
                arrCell = realMerge(arrCell, [{ rhid: getRhid(cell.innerHTML) }]);

            if (c == 9)
                arrCell = realMerge(arrCell, [{ bloodtype: cell.innerHTML }]);

            if (c == 10)
                arrCell = realMerge(arrCell, [{ ctt_rt: cell.children[0].value }]);

            if (c == 11)
                arrCell = realMerge(arrCell, [{ ctt_37c: cell.children[0].value }]);

            if (c == 12)
                arrCell = realMerge(arrCell, [{ ctt_iat: cell.children[0].value }]);

            if (c == 13)
                arrCell = realMerge(arrCell, [{ ctt_ccc: cell.children[0].value }]);

            if (c == 14)
                arrCell = realMerge(arrCell, [{ cat: cell.children[0].value }]);

            if (c == 15)
                arrCell = realMerge(arrCell, [{ rou: ((cell.children[0].checked) ? '1' : '') }]);

            if (c == 16)
                arrCell = realMerge(arrCell, [{ crossmacthresultid: cell.children[0].value }]);

            if (c == 17)
                arrCell = realMerge(arrCell, [{ crossmacthstatusid: cell.children[0].value }]);

            if (c == 18)
                arrCell = realMerge(arrCell, [{ doctorid: cell.children[0].value }]);

            if (c == 19)
                arrCell = realMerge(arrCell, [{ isbloodpreparation: cell.children[0].value }]);

            if (c == 20)
                arrCell = realMerge(arrCell, [{ requestbloodcrossmacthdatetime: cell.innerHTML }]);

            if (c == 21)
                arrCell = realMerge(arrCell, [{ requestbloodcrossmacthremark: cell.children[0].value }]);

            if (c == 23) {
                arrCell = realMerge(arrCell, [{ ispayblood: cell.children[0].value }]);
                arrCell = realMerge(arrCell, [{ payblooddate: cell.children[1].value }]);
                arrCell = realMerge(arrCell, [{ paybloodtime: cell.children[2].value }]);
                arrCell = realMerge(arrCell, [{ payuser: cell.children[3].value }]);
                arrCell = realMerge(arrCell, [{ requestbloodcrossmacthid: cell.children[4].value }]);
                arrCell = realMerge(arrCell, [{ bloodstockid: cell.children[5].value }]);

                arrCell = realMerge(arrCell, [{ isautocontrol: cell.children[7].value }]);

                arrCell = realMerge(arrCell, [{ crossmacthstatus2id: cell.children[8].value }]);

            }




        }
        arrRow.push(arrCell);
        arrCell = [];
    }
    console.log(arrRow);
    return arrRow;



}

function checkResultCrossMatchItem(table) {

    var r = 2;
    var status = false;
    while (row = table.rows[r++]) {

        if (row.cells[16].children[0].value != 9 && row.cells[22].children[7].value != 1)
            if (row.cells[15].children[0].value == "") {
                status = true;
                bag_number_error = row.cells[2].children[0].innerHTML;
            }

    }

    return status;

}

function setReadOnlyTable(table) {


    var r = 2;
    while (row = table.rows[r++]) {
        var statusValue = row.cells[16].children[0].value;
        var resultValue = row.cells[15].children[0].value;
        var userValue = row.cells[18].children[0].value;
        // var resultStatus = (resultValue == 5 || resultValue == 6 || resultValue == 7 || resultValue == 8 || resultValue == 9);
        var resultStatus = (statusValue == 9 && (resultValue != "" || resultValue != 0));
        var resultStatus9 = (statusValue == 9);
        var resultStatus2 = (statusValue == 5 || statusValue == 6 || statusValue == 7 || statusValue == 8 || statusValue == 10 || statusValue == 11);
        row.cells[9].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[10].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[11].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[12].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[13].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[14].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[15].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[16].children[0].disabled = (resultStatus || resultStatus2 || resultStatus9);
        row.cells[17].children[0].disabled = (resultStatus || resultStatus2);
        row.cells[18].children[0].disabled = (resultStatus || resultStatus2 || (userValue != '' && userValue != 0));
        row.cells[21].children[0].disabled = (resultStatus || resultStatus2 || resultStatus9);

    }


}


function getRhid(v) {
    var result = '';
    if (v == '+') {
        result = 'Rh+';
    } else if (v == '-') {
        result = 'Rh-';
    } else if (v == 'weak D') {
        result = 'Rh(D)';
    }
    return result;
}

function getRhName(v) {
    var result = '';
    if (v == 'Rh+') {
        result = 'Positive';
    } else if (v == 'Rh-') {
        result = 'Negative';
    } else if (v == 'Rh(D)') {
        result = 'Weak D';
    }
    return result;
}

function addRowCrossMacth(im = [], index = 0, ) {

    var event_data = '';

    event_data += '<tr id="trbloodreqblood' + (index) + '" onClick="chActiveAddRowReqBlood(' + (index) + ',this,`' + im.bloodstocktypeid + '`,`' + im.requestblooditemqty + '`,`' + im.bloodstocktypegroupid + '`)">';

    event_data += '<td>' + (index + 1) + '</td>';

    event_data += '<td>' + im.bloodstocktypename2 + '</td>';
    event_data += '<td>' + im.requestblooditemqty + '</td>';
    event_data += '<td>' + im.requestblooditemcc + '</td>';
    event_data += '<td></td>';
    event_data += '</tr>';
    $("#list_table_tab2_1").append(event_data);
    // setNo('list_table_tab2_1');
}

function confirmbloodgroupChange() {
    $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());

}

function confirmrhChange() {
    $("#confirmrhidshow").val(getRhName($("#confirmrhid").val()));
    checkRhCross($("#confirmrhid").val());
}

function confirmabscreenChange() {
    $("#confirmabsreenshow").val(getRhName($("#confirmsceen").val()));
}

function setColor(btn) {
    var row = btn.parentNode.parentNode;

    var valueResult = btn.value;

    if (valueResult == 4 || valueResult == 5 || valueResult == 6 || valueResult == 7 || valueResult == 8 || valueResult == 9 || valueResult == 11) {
        btn.value = btn.getAttribute("oldvalue");
        errorSwal('ไม่สามารถเลือกสถานะนี้ได้');
        return false;
    } else if (valueResult == 1 && btn.getAttribute("oldvalue") == 2) {
        btn.value = btn.getAttribute("oldvalue");
        errorSwal('ไม่สามารถเลือกสถานะนี้ได้');
        return false;
    }

    row.style.backgroundColor = getColor(btn.value);
}

function setoldvalue(element) {
    element.setAttribute("oldvalue", element.value);
}


function getColor(v, warm_retuen = "") {
    var color = '#FFF';
    if (v == 1 || v == 2 || v == 4) {
        color = "#FFFF00";
    } else if (v == 3) {
        color = "#FF8000";
    } else if (v == 5 || v == 6 || v == 7 || v == 8 || v == 9) {
        color = "#6C0";
    } else if (v == 10) {
        color = "#C00";
    } else if (v == 11) {
        if (warm_retuen == 1) {
            color = "#0f9df7";
        } else if (warm_retuen == 2) {
            color = "#d935cb";
        }

    }
    return color;
}


function findBloodPatient(page = 3, loaddata = false) {
    var patient = document.getElementById('hn').value;
    if (patient.length > 0) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/blood/bloodfind-replacement-autologous-direct.php?hn=' + patient + "&donation_get_type_id=" + page,
            success: function(data) {

                if (loaddata) {
                    loadADR(data);
                } else {
                    if (data.data.length > 0) {
                        setTimeout(function() {
                            if (data.data[0].donation_get_type_id == 2) {
                                errorSwal("ผู้ป่วยมีเลือดที่เป็น Replacement จำนวน " + data.data.length + " Unit");
                            } else if (data.data[0].donation_get_type_id == 5) {
                                errorSwal("ผู้ป่วยมีเลือดที่เป็น Direct Ag จำนวน " + data.data.length + " Unit");
                            } else {
                                errorSwal("ผู้ป่วยมีเลือดที่เป็น Autologous/Direct จำนวน " + data.data.length + " Unit");
                            }

                            console.log("Autologous/Direct");
                            //your code to be executed after 1 second
                        }, 1500);

                    }
                }



            },
            error: function(data) {

                console.log('An error occurred.');
                console.log(data);

            },
        });
    }

}

function adrToBloodRow() {
    $("#customModalADR").modal("hide");
    $.each(adrData, function(index, value) {
        if (value.ischecked)
            addRowBlood(value, index);
    });
}



function loadADR(data) {


    var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
    adrData = obj;
    var event_data = '';
    $.each(obj, function(index, value) {

        if (checkADRInsert(value.bag_number, value.bloodtype, value.sub)) {
            event_data += '<tr  >';
            event_data += '<td class="td-table"  style="display:none;" >';
            event_data += JSON.stringify(value);
            event_data += '</td>';
            event_data += '<td class="td-table">';
            event_data += '<input type="checkbox"  onchange="setNumberBloodCheck(this,' + index + ')" >';
            event_data += '</td>';
            event_data += '<td>' + value.bag_number + '</td>';
            event_data += '<td>' + value.bloodgroup + '</td>';
            event_data += '<td>' + value.rhname3 + '</td>';
            event_data += '<td>' + value.bloodstocktypename2 + '</td>';
            event_data += '</tr>';
        }

    });
    $("#list_table_json").append(event_data);
    // $("#list_table_json").append(event_data);
}

function checkADRInsert(bag_number = '', bloodtype = '', sub = '') {

    var status = true;
    var dataArr = getNumberTable1_2('list_table_tab2_2');
    $.each(dataArr, function(index, value) {

        if (bag_number == value[0] && bloodtype == value[1] && sub == value[2])
            status = false
    });

    return status;
}

function setNumberBloodCheck(self, index) {
    adrData[index].ischecked = self.checked;
}

function setTimeNow(v = false) {
    if (v) {
        var time = new Date();
        var numTime = parseFloat(time.getHours() + "." + time.getMinutes())
        if (numTime >= 8.00 && numTime <= 16.00) {
            document.getElementById('inouttime1').checked = true;
        } else {
            document.getElementById('inouttime2').checked = true;
        }
    } else {
        if (!document.getElementById('inouttime1').checked && !document.getElementById('inouttime2').checked) {
            var time = new Date();
            var numTime = parseFloat(time.getHours() + "." + time.getMinutes())
            if (numTime >= 8.00 && numTime <= 16.00) {
                document.getElementById('inouttime1').checked = true;
            } else {
                document.getElementById('inouttime2').checked = true;
            }


        }
    }

}

var abocount = 0;

function addABOTest(value = []) {


    if (value.length == 0) {
        value.requestaboid = '';
        value.requestabocode = '';
        value.reagent = '';
        value.requestantia = '';
        value.requestantib = '';
        value.requestantiab = '';
        value.requestacells = '';
        value.requestbcells = '';
        value.requestocells = '';
        value.requestbloodgroup = '';
        value.requestid = '';

        if (abocount == 1)
            value.reagent = 'CAT';
    }

    var agepatient = document.getElementById("patientage").innerHTML;
    // alert(agepatient);

    if (agepatient != '0') {
        // alert("hggg");
        var event_data = '';
        event_data += '<tr>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<input id="reagent' + abocount + '" name="reagent' + abocount + '" value="' + value.reagent + '"  class="form-control" />';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestantia' + abocount + '" name="requestantia' + abocount + '" onchange="autoBlood(' + abocount + ')"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestantib' + abocount + '" name="requestantib' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestantiab' + abocount + '" name="requestantiab' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestacells' + abocount + '" name="requestacells' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestbcells' + abocount + '" name="requestbcells' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestocells' + abocount + '" name="requestocells' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestbloodgroup' + abocount + '" name="requestbloodgroup' + abocount + '" onchange="setResultBloodGroup(this.value)"  class="form-control select2"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:40px">';
        event_data += '<input type="hidden"  name="requestaboid' + abocount + '" value="' + abocount + '" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    } else if (agepatient == '0') {
        // alert("66666666666");
        var event_data = '';
        event_data += '<tr>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<input id="reagent' + abocount + '" name="reagent' + abocount + '" value="' + value.reagent + '"  class="form-control" />';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestantia' + abocount + '" name="requestantia' + abocount + '" onchange="autoBlood(' + abocount + ')"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestantib' + abocount + '" name="requestantib' + abocount + '" onchange="autoBlood(' + abocount + ')" class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestantiab' + abocount + '" name="requestantiab' + abocount + '"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestacells' + abocount + '" name="requestacells' + abocount + '"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestbcells' + abocount + '" name="requestbcells' + abocount + '"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:60px">';
        event_data += '<select id="requestocells' + abocount + '" name="requestocells' + abocount + '"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:80px" nowrap>';
        event_data += '<select id="requestbloodgroup' + abocount + '" name="requestbloodgroup' + abocount + '"  class="form-control"></select>';
        event_data += '</td>';

        event_data += '<td class="td-table" style="width:40px">';
        event_data += '<input type="hidden"  name="requestaboid' + abocount + '" value="' + abocount + '" >';
        event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
        event_data += '<i class="fa fa-trash"></i>';
        event_data += '</button>';
        event_data += '</td>';
        event_data += '</tr>';
    }




    $("#list_table_abo").append(event_data);

    setABOCellGroupSerum("#requestantia" + abocount, value.requestantia);
    setABOCellGroupSerum("#requestantib" + abocount, value.requestantib);
    setABOCellGroupSerum("#requestantiab" + abocount, value.requestantiab);
    setABOCellGroupSerum("#requestacells" + abocount, value.requestacells);
    setABOCellGroupSerum("#requestbcells" + abocount, value.requestbcells);
    setABOCellGroupSerum("#requestocells" + abocount, value.requestocells);
    setBloodGroup("#requestbloodgroup" + abocount, value.requestbloodgroup);

    $("#requestbloodgroup" + abocount).select2({
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

    $("#requestantia" + abocount).val(value.requestantia);
    $("#requestantib" + abocount).val(value.requestantib);
    $("#requestantiab" + abocount).val(value.requestantiab);
    $("#requestacells" + abocount).val(value.requestacells);
    $("#requestbcells" + abocount).val(value.requestbcells);
    $("#requestocells" + abocount).val(value.requestocells);
    $("#requestbloodgroup" + abocount).val(value.requestbloodgroup);



    abocount++;
    // $(".select2").select2({
    //     width: "100%",
    //     theme: "bootstrap",
    //     placeholder: "",
    //     allowClear: true
    // })
}

function autoBlood(indexcount = "") {


    var antia = $("#requestantia" + indexcount).val();
    var antib = $("#requestantib" + indexcount).val();
    var antiab = $("#requestantiab" + indexcount).val();
    var acells = $("#requestacells" + indexcount).val();
    var bcells = $("#requestbcells" + indexcount).val();
    var ocells = $("#requestocells" + indexcount).val();

    var patientage = parseInt(document.getElementById('patientage').innerHTML);

    // antia = (antia == null) ? "" : antia;
    // antib = (antib == null) ? "" : antib;
    // antiab = (antiab == null) ? "" : antiab;
    // acells = (acells == null) ? "" : acells;
    // bcells = (bcells == null) ? "" : bcells;
    // ocells = (ocells == null) ? "" : ocells;
    console.log(antia);
    console.log(antib);
    console.log(antiab);
    console.log(acells);
    console.log(bcells);
    console.log(ocells);

    if ((antia) && (antib) && (antia != "") && (antib != "") && (acells) && (bcells) && (acells != "") && (bcells != "")) {
        if (
            ((antia != "11") && (antib == "11") && (bcells != "11") && (acells == "11")) ||
            ((antia != "1") && (antib == "1") && (bcells != "1") && (acells == "1"))
        ) {
            $("#requestbloodgroup" + indexcount).val("A");
            $("#requestbloodgroup" + indexcount).trigger('change');

            checkBloodGroup("A");
            setConfirmBloodGroup("A");
            return false;
        } else if (
            ((antia == "11") && (antib != "11") && (bcells == "11") && (acells != "11")) ||
            ((antia == "1") && (antib != "1") && (bcells == "1") && (acells != "1"))
        ) {

            $("#requestbloodgroup" + indexcount).val("B");
            $("#requestbloodgroup" + indexcount).trigger('change');
            checkBloodGroup("B");
            setConfirmBloodGroup("B");

            return false;
        } else if (
            ((antia == "11") && (antib == "11") && (bcells != "11") && (acells != "11")) ||
            ((antia == "1") && (antib == "1") && (bcells != "1") && (acells != "1"))
        ) {

            $("#requestbloodgroup" + indexcount).val("O");
            $("#requestbloodgroup" + indexcount).trigger('change');
            checkBloodGroup("O");
            setConfirmBloodGroup("O");

            return false;
        } else if (

            ((antia != 11) && (antib != 11) && (bcells == 11) && (acells == 11)) ||
            ((antia != 1) && (antib != 1) && (bcells == 1) && (acells == 1))

        ) {
            $("#requestbloodgroup" + indexcount).val("AB");
            $("#requestbloodgroup" + indexcount).trigger('change');
            checkBloodGroup("AB");
            setConfirmBloodGroup("AB");

            return false;
        } else {
            errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
            $("#requestbloodgroup" + indexcount).val("");
            $("#requestbloodgroup" + indexcount).trigger('change');
            checkBloodGroup("");
            setConfirmBloodGroup("");
        }
    }

    console.log("*****" + patientage);
    if (patientage < 1)
        if ((antia) && (antib) &&
            (antia != "") && (antib != "")
        ) {
            if ((antia != "1") &&
                (antib == "1")
            ) {
                console.log("****A*****");
                $("#requestbloodgroup" + indexcount).val("A").trigger("change");
                checkBloodGroup("A");
                setConfirmBloodGroup("A");
            } else if (
                (antia == "1") &&
                (antib != "1")) {
                console.log("****B*****");
                $("#requestbloodgroup" + indexcount).val("B").trigger("change");
                checkBloodGroup("B");
                setConfirmBloodGroup("B");
            } else if (
                (antia == "1") &&
                (antib == "1")) {


                $("#requestbloodgroup" + indexcount).val("O").trigger("change");
                checkBloodGroup("O");
                setConfirmBloodGroup("O");
            } else if (
                (antia != "1") &&
                (antib != "1")
            ) {
                $("#requestbloodgroup" + indexcount).val("AB").trigger("change");
                checkBloodGroup("AB");
                setConfirmBloodGroup("AB");
            } else {
                errorSwal("ผลกรุ๊ปเลือดของ Cell Grouping ไม่ตรงกับ Serum Grouping");
                $("#requestbloodgroup" + indexcount).val("");
                $("#requestbloodgroup" + indexcount).trigger('change');
                checkBloodGroup("");
                setConfirmBloodGroup("");
            }
        }

    $("#chk_bloodgroup").val("#requestbloodgroup" + indexcount);


}

// var chk_bloodgroup = 0;

function setResultBloodGroup(blood_group = "") {
    // chk_bloodgroup++;
    // alert(chk_bloodgroup);
    checkBloodGroup(blood_group);
    setConfirmBloodGroup(blood_group);
}


function setConfirmBloodGroup(blood_group = "") {
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
        $("#confirmbloodgroup").val(0);
        $("#confirmbloodgroup").trigger('change');
        $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
    } else {
        $("#confirmbloodgroup").val(blood_group);
        $("#confirmbloodgroup").trigger('change');
        $("#confirmbloodgroupshow").val($("#confirmbloodgroup").val());
    }

    return status;

}

function checkBloodGroup(blood = "") {
    console.log("========checkBloodGroup========");
    var patientbloodgroup = document.getElementById("patientbloodgroup").innerHTML;
    console.log(patientbloodgroup);
    console.log(blood);


    if (patientbloodgroup != "ไม่ทราบ" && patientbloodgroup != "Discrepancy" && patientbloodgroup != "" && patientbloodgroup != blood) {
        checkDiffBloodGroup(patientbloodgroup, blood);
    }


    $("#confirmbloodgroupshow").val(blood);
}

function checkDiffBloodGroup(bloodold, bloodnew) {

    swal({
            title: "หมู่เลือดไม่ตรงกับที่ระบุไว้ในการแจ้งขอเลือด",
            text: "คุณต้องการเปลี่ยนแปลงหมู่เลือดผู้ป่วยหรือไม่?",
            type: "input",
            inputPlaceholder: "ระบุสาเหตุ",
            showCloseButton: true,
            showCancelButton: true,

            // dangerMode: true,
            cancelButtonClass: "",
            confirmButtonClass: "btn-success",
            confirmButtonText: "ใช่",
            cancelButtonText: "ไม่",
            closeOnConfirm: true
        },
        function(inputValue) {
            if (inputValue) {

                var value = {
                    requestbloodchangeaboid: '',
                    requestbloodchangeabocode: '',
                    requestbloodid: $("#requestbloodid").val(),
                    requestbloodchangeaboold: bloodold,
                    requestbloodchangeabnew: bloodnew,
                    requestbloodchangeabodatetime: '',
                    requestbloodchangeabouser: session_staffid,
                    requestbloodchangeabofullname: session_fullname,
                    requestbloodchangeaboremark: inputValue
                };

                addTableCheckBloodABOHistory(value)


            } else {
                $("#confirmbloodgroupshow").val("");
                setDataModalSelectValue("confirmbloodgroup", "", '');
            }
        });
}

function errorSwal($msg = "") {
    swal({
        title: $msg,
        type: 'warning',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    });


}