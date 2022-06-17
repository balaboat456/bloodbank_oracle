$(document).ready(function() {
    $('.agbloodstocktype').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "ชนิดเลือด",
        width: "100%",
        ajax: {
            url: 'data/masterdata/bloodstocktype-ag.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodstocktypeid,
                            text: item.bloodstocktypename2
                        }
                    })
                };
            },


        }
    });

    $('.ag_bloodstocktypecross_search').select2({
        allowClear: true,
        theme: "bootstrap",
        // placeholder: "ชนิดเลือด",
        width: "100%",
        ajax: {
            url: 'data/masterdata/bloodstocktype-ag.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodstocktypeid,
                            text: item.bloodstocktypename2
                        }
                    })
                };
            },


        }
    });
});

function getBagNumber() {

}


function getBloodTypeAg(bloodtype = "", bag_number = "") {
    if (bloodtype != "" || bag_number != "") {
        return false;
    }

    $.ajax({
        url: 'data/bloodstock/bloodstocktype-ag.php',
        dataType: 'json',
        type: 'get',
        success: function(data) {

            console.log(data);

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}


function checkBoxAgInOut(v) {
    if (v.previous) {
        v.checked = false;
    }
    v.previous = v.checked;

    PhenotypeAgInOut();
}

function PhenotypeAgInOut() {
    var pheno = '';
    pheno += findAntibodyAgInOut(document.getElementById("AG_phenoTable1"));
    pheno += findAntibodyAgInOut(document.getElementById("AG_phenoTable2"));

    phenoNew = PhenotypeAgInOutGrouping(pheno);


    document.getElementById('AG_pheno').value = lastString(pheno);
    document.getElementById('AG_phenoLabel').innerHTML = lastString(phenoNew);
    // PhenotypeAgInOutGroupingCheck(lastString(phenoNew));
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


function PhenotypeAgInOutGroupingCheck(pheno = "") {

    var arrPheno = pheno.split(",");
    if (arrPheno.length > 1) {
        swal({
            title: 'สามารถเลือก Phenotype ได้เพียงหนึ่งชุดเท่านั้น',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {

            PhenotypeAgInOutGroupingRemove();

        });
    }


}


function PhenotypeAgInOutGroupingRemove() {


    removeCheckBox(document.getElementById("AG_phenoTable1"));
    removeCheckBox(document.getElementById("AG_phenoTable2"));

    document.getElementById('AG_pheno').value = "";
    document.getElementById('AG_phenoLabel').innerHTML = "";
}


function PhenotypeAgInOutGroupingSave() {
    var AG_pheno = $("#AG_pheno").val();

    if (AG_pheno == "") {
        swal({
            title: 'คุณยังไม่ได้เลือก',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        });
        return false;
    }

    spinnershow();

    var data = { bloodstocktypeagname: document.getElementById('AG_phenoLabel').innerHTML, bloodstocktypeagphon: document.getElementById('AG_pheno').value };

    $.ajax({
        type: 'POST',
        url: 'inventory-blood-bank-ag-phenotype-save.php',
        data: data,
        dataType: 'json',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {
            if (!data.duplicate) {
                if (data.status) {
                    myAlertTop();
                    closeAgStockPhenotype();
                    loadTableInOutAg();
                } else {
                    myAlertTopError();
                }
            } else {
                myAlertTopErrorDelete();
            }

        },
        error: function(data) {
            console.log('An error occurred.');
            console.log(data);
            myAlertTopError();
        },
    });
    return false;
}

function PhenotypeAgInOutGroupingDeleteTable(id, tablenmae) {

    swal({
        title: "คุณต้องการลบตาราง " + tablenmae + " หรือไม่",
        type: "warning",
        icon: "warning",
        buttons: [
            'ยกเลิก',
            'ลบ'
        ],
    }).then(value => {

        if (value) {
            spinnershow();

            var data = { id: id };

            $.ajax({
                type: 'POST',
                url: 'inventory-blood-bank-ag-phenotype-table-delete.php',
                data: data,
                dataType: 'json',
                complete: function() {
                    var delayInMilliseconds = 200;
                    setTimeout(function() {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function(data) {

                    if (data.status) {
                        myAlertTop();
                        loadTableInOutAg();
                    } else {
                        myAlertTopError();
                    }

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                    myAlertTopError();
                },
            });
        }

    });

}