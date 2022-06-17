var activeTab = '';

function antibodyModal(tab = '0') {
    activeTab = tab;
    removeAntiBody();
    removePhenotype();
    var antibody = document.getElementById('antibody' + activeTab).value.split(",");
    antibody.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });
    var phenotype = document.getElementById('phenotype' + activeTab).value.split(",");
    phenotype.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });
    document.getElementById('antiLabel').innerHTML = document.getElementById('antibody' + activeTab).value;
    document.getElementById('phenoLabel').innerHTML = document.getElementById('phenotypeLable' + activeTab).innerHTML;
    document.getElementById('phenoText').value = document.getElementById('phenotype' + activeTab).value;

    $("#modalAntibodyPhenotype").modal('show');
}



function antiBody() {
    var anti = '';
    anti += findAntibody(document.getElementById("antiTable1"));
    anti += findAntibody(document.getElementById("antiTable2"));
    document.getElementById('antiLabel').innerHTML = lastString(anti);
}

function Phenotype() {
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
    ppheno = pheno.substr(0, 1);
    if (ppheno == ',') {
        pppheno = pheno.substr(1, 1000);
        document.getElementById('phenoLabel').innerHTML = lastString(pppheno);
    } else {
        document.getElementById('phenoLabel').innerHTML = lastString(pheno);
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



function Phenotype() {
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
        document.getElementById('pheno').value = lastString(pppheno);
        phenoNew = PhenotypeAgInOutGrouping(pppheno);
    } else {
        document.getElementById('pheno').value = lastString(pheno);
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


function confirmAntiPheno() {
    document.getElementById('antibody' + activeTab).value = document.getElementById('antiLabel').innerHTML;
    document.getElementById('antibodyLable' + activeTab).innerHTML = document.getElementById('antiLabel').innerHTML;

    document.getElementById('phenotype' + activeTab).value = document.getElementById('pheno').value;
    document.getElementById('phenotypedisplay' + activeTab).value = document.getElementById('phenoLabel').innerHTML;
    document.getElementById('phenotypeLable' + activeTab).innerHTML = document.getElementById('phenoLabel').innerHTML;



    $("#modalAntibodyPhenotype").modal("hide");
    $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
}