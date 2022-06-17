var dataRhArr = [];
var dataBloodGroupArr = [];

var dataBloodStockTypeArr = [];
var count = 0;
var selfrow;
$(document).ready(function() {
    getRh().then(function success(data) {
        dataRhArr = data.data;
    });

    $.ajax({
        url: 'data/masterdata/bloodstocktype.php',
        dataType: 'json',
        type: 'get',
        success: function(data) {
            dataBloodStockTypeArr = data.data;
        }
    });

    $.ajax({
        url: 'data/masterdata/bagtype.php',
        dataType: 'json',
        type: 'get',
        success: function(data) {
            dataBagTypeArr = data.data;
        }
    });

    // getBloodStockTypeID.then(function success(data) {
    //     dataBloodStockTypeArr = data.data;
    // });

    getBloodGroup().then(function success(data) {
        dataBloodGroupArr = data.data;
    });
    isPickupofficer();
    bloodstockRemarkEdit();


    setDataModalSelectValue('ispickupofficer', session_staffid, session_fullname);
    setDataModalSelectValue("staff", session_staffid, session_fullname);
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
                    .text(value.rhname3));
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
                    .text(value.bloodgroupname));
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

function antibodyModal() {
    removeAntiBody();
    removePhenotype();
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
    document.getElementById('phenoLabel').innerHTML = document.getElementById('phenotype').value;
    document.getElementById('bloodinvestmodaltype').value = 'main';
    $("#bloodinvestModal").modal('show');
}

function antibodyModalTable(self) {

    // removeAntiBody();
    // removePhenotype();
    $('#phenotype').val();
    var row = self.parentNode.parentNode;
    selfrow = row;
    var antibody = row.cells[18].innerHTML.split(",");
    antibody.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });
    var phenotype = row.cells[19].innerHTML.split(",");
    phenotype.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });

    document.getElementById('antiLabel').innerHTML = row.cells[18].innerHTML;
    document.getElementById('phenoLabel').innerHTML = row.cells[19].innerHTML;
    document.getElementById('bloodinvestmodaltype').value = 'table';
    $("#bloodinvestModal").modal('show');
}

function antiBody() {
    var anti = '';
    anti += findAntibody(document.getElementById("antiTable1"));
    anti += findAntibody(document.getElementById("antiTable2"));
    document.getElementById('antiLabel').innerHTML = lastString(anti);
}

function Phenotype() {
    var pheno = $('#phenotype').val();
    pheno = pheno + ",";
    // var arpheno = pheno.split(",");
    // $.each(arpheno,function(key,val){
    //     console.log(key+val);
    // });
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

function confirmAntiPheno() {
    if (document.getElementById('bloodinvestmodaltype').value == 'table') {
        selfrow.cells[18].innerHTML = document.getElementById('antiLabel').innerHTML;
        selfrow.cells[19].innerHTML = document.getElementById('phenoLabel').innerHTML;
        var item = JSON.parse(selfrow.cells[22].innerHTML);
        item[0].antibody = document.getElementById('antiLabel').innerHTML;
        item[0].phenotype = document.getElementById('phenoLabel').innerHTML;
        selfrow.cells[22].innerHTML = JSON.stringify(item);

        $("#bloodinvestModal").modal("hide");
        $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
    } else {
        document.getElementById('antibody').value = document.getElementById('antiLabel').innerHTML;
        document.getElementById('antibodyLable').innerHTML = document.getElementById('antiLabel').innerHTML;
        document.getElementById('phenotype').value = document.getElementById('phenoLabel').innerHTML;
        document.getElementById('phenotypeLable').innerHTML = document.getElementById('phenoLabel').innerHTML;

        $("#bloodinvestModal").modal("hide");
        $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
    }

}

function getRh() {
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



function isPickupofficer() {
    $('.ispickupofficer').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "เจ้าหน้าที่รับเข้า",
        width: "100%",
        ajax: {
            url: 'data/masterdata/staff.php?type=ispickupofficer',
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
                            id: item.id,
                            text: item.name + ' ' + item.surname
                        }
                    })
                };
            },

        }
    });
}

function bloodstockRemarkEdit() {
    $('.bloodstockremarkeditid').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
        ajax: {
            url: 'data/bloodstock/bloodstock_remark_edit.php',
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
                            id: item.bloodstockremarkeditid,
                            text: item.bloodstockremarkedittext,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function(e) {
        setBloodStockRemarkEditOther(e.params.args.data.item.bloodstockremarkeditid);
    }).on("select2:clearing", function(e) {
        setBloodStockRemarkEditOther("");
    });

    $('.bloodstockremarkeditid2').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
        ajax: {
            url: 'data/bloodstock/bloodstock_remark_edit.php',
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
                            id: item.bloodstockremarkeditid,
                            text: item.bloodstockremarkedittext,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function(e) {
        setBloodStockRemarkEditOther2(e.params.args.data.item.bloodstockremarkeditid);
    }).on("select2:clearing", function(e) {
        setBloodStockRemarkEditOther2("");
    });
}

function setDataModalSelectValue(elem = '', itemid, itemtext) {

    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}