var count = 0;

function loadTableAllergicToBlood(data) {

    $("#ac_requestbloodcrossmacthid").val("");
    var body = document.getElementById("list_table_allergic_to_blood").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
    count = data.length.toString();
    var event_data = '';
    $.each(obj, function(index, value) {

        event_data += '';
        event_data += '<tr id="trblood' + (index) + '" onClick="chActive(' + (index) + ',this,' + value.requestbloodcrossmacthid + ')">';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td>';
        // if (value.isallergic == 1) {// เงื่อนไขปลิ้นไรสักอย่าง
        event_data += '<button type="button" onclick="printAllergicBlood(' + value.requestbloodcrossmacthid + ')"  class="btn btn-success m-l-5">';
        event_data += '<i class="fa fa-print"></i>';
        event_data += '</button>';
        // }
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="checkbox" onchange="setAllergicToBloodCheck(this)"  ' + ((value.isallergic == 1) ? 'checked' : '') + ' >';
        event_data += '</td>';
        event_data += '<td>' + (index + 1) + '</td>';
        event_data += '<td>' + value.bag_number + '</td>';
        event_data += '<td>' + value.bloodgroupid + '</td>';
        event_data += '<td>' + value.rhname3 + '</td>';
        event_data += '<td>' + value.bloodstocktypename2 + '</td>';
        event_data += '</tr>';

    });
    $("#list_table_allergic_to_blood").append(event_data);

}

function printAllergicBlood(id) {
    printJS({
        printable: localurl + "/report/blood-allergic-form.php?id=" + id,
        type: 'pdf',
        showModal: true
    });
}

function setAllergicToBloodCheck(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.isallergic = (self.checked) ? '1' : '0';
    row.cells[0].innerHTML = JSON.stringify(item);
}


function chActive(id, self, requestbloodcrossmacthid) {

    $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);
    for (i = 0; i < count; i++) {
        document.getElementById("trblood" + i).style.background = "#FFF";
    }
    document.getElementById("trblood" + id).style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);
    setAllergicToBloodData(item);
}

function setAllergicToBloodData(data) {
    $('#payblooddate').val(getDMY(data.payblooddate));
    $('#paybloodtime').val(data.paybloodtime);

    $('#useblooddate').val(getDMY(data.useblooddate));
    $('#usebloodtime').val(data.usebloodtime);

    $('#bloodallergyrecorder').val(data.bloodallergyrecorder).trigger('change');
    $('#user_testblood').val(data.user_testblood).trigger('change');

    $('#stoppayblooddate_allergic').val(getDMY(data.stoppayblooddate_allergic));
    $('#stoppaybloodtime_allergic').val(data.stoppaybloodtime_allergic);
    $('#totalbloodrequestcc_allergic').val(data.totalbloodrequestcc_allergic);

    $('#sideeffects_allergic').val(data.sideeffects_allergic);
    $('#sideeffectsdate_allergic').val(getDMY(data.sideeffectsdate_allergic));
    $('#sideeffectstime_allergic').val(data.sideeffectstime_allergic);

    $('#othereffects_allergic').val(data.othereffects_allergic);

    $('#before_temp_allergic').val(data.before_temp_allergic);
    $('#before_bpstart_allergic').val(data.before_bpstart_allergic);
    $('#before_bpend_allergic').val(data.before_bpend_allergic);
    $('#before_pmin_allergic').val(data.before_pmin_allergic);
    $('#before_rmin_allergic').val(data.before_rmin_allergic);

    $('#after_temp_allergic').val(data.after_temp_allergic);
    $('#after_bpstart_allergic').val(data.after_bpstart_allergic);
    $('#after_bpend_allergic').val(data.after_bpend_allergic);
    $('#after_pmin_allergic').val(data.after_pmin_allergic);
    $('#after_rmin_allergic').val(data.after_rmin_allergic);

    $('#othereffects2_allergic').val(data.othereffects2_allergic);

    $('#requestbloodcrossmacthid').val(data.requestbloodcrossmacthid);

    document.getElementById("isincreasebodytemp_allergic").checked = (data.isincreasebodytemp_allergic == 1);
    document.getElementById("ischills_allergic").checked = (data.ischills_allergic == 1);
    document.getElementById("isurticaria_allergic").checked = (data.isurticaria_allergic == 1);
    document.getElementById("isitching_allergic").checked = (data.isitching_allergic == 1);
    document.getElementById("isflushing_allergic").checked = (data.isflushing_allergic == 1);
    document.getElementById("ismusclepain_allergic").checked = (data.ismusclepain_allergic == 1);
    document.getElementById("ishypotension_allergic").checked = (data.ishypotension_allergic == 1);
    document.getElementById("ishypertension_allergic").checked = (data.ishypertension_allergic == 1);
    document.getElementById("isanaphylaxis_allergic").checked = (data.isanaphylaxis_allergic == 1);
    document.getElementById("isdyspnea_allergic").checked = (data.isdyspnea_allergic == 1);
    document.getElementById("isdecreaseurineout_allergic").checked = (data.isdecreaseurineout_allergic == 1);
    document.getElementById("isdarkredurine_allergic").checked = (data.isdarkredurine_allergic == 1);
    document.getElementById("isother_allergic").checked = (data.isother_allergic == 1);

    document.getElementById("ishemolytictransfusionreation2_allergic").checked = (data.ishemolytictransfusionreation2_allergic == 1);
    document.getElementById("isfebrilehemolytictransfusionreation2_allergic").checked = (data.isfebrilehemolytictransfusionreation2_allergic == 1);
    document.getElementById("isallergicreation2_allergic").checked = (data.isallergicreation2_allergic == 1);
    document.getElementById("isanaphylaxis2_allergic").checked = (data.isanaphylaxis2_allergic == 1);
    document.getElementById("isinfectionsepsisreatedtransfusion2_allergic").checked = (data.isinfectionsepsisreatedtransfusion2_allergic == 1);

    document.getElementById("istransfusionreatedacutelunginjury2_allergic").checked = (data.istransfusionreatedacutelunginjury2_allergic == 1);
    document.getElementById("isother2_allergic").checked = (data.isother2_allergic == 1);

    document.getElementById("result_testblood1").checked = (data.result_testblood == 1);
    document.getElementById("result_testblood2").checked = (data.result_testblood == 2);
    $('#remark_testblood').val(data.remark_testblood);

    $('#conclusionofinvestigationresults').val(data.conclusionofinvestigationresults);
    $('#interpretation').val(data.interpretation);

    var body = document.getElementById("list_table_test_blood").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    if (data.testblood.length > 0) {
        $.each(data.testblood, function(index, value) {
            addRowBloodTest(value);
        });
    } else {
        var dataArrTest = setInsertData();
        $.each(dataArrTest, function(index, value) {
            addRowBloodTest(value);
        });
    }

}
var crossmatch_minor = 1;

function addRowBloodTest(im = []) {
    if (im.labinvestigationid == 21) {
        crossmatch_minor--;
    }

    if (im.labinvestigationid == 3 && crossmatch_minor == 2) {
        addRowBloodTest_crossmatch_minor();
        crossmatch_minor--;
    }
    var arr;

    if (im.length != 0) {
        arr = [{
            labinvestigationid: im.labinvestigationid,
            requestbloodcrossmacthlabtestpre: im.requestbloodcrossmacthlabtestpre,
            requestbloodcrossmacthlabtestpost: im.requestbloodcrossmacthlabtestpost,
            requestbloodcrossmacthlabtestunit: im.requestbloodcrossmacthlabtestunit,
            requestbloodcrossmacthlabtestother: im.requestbloodcrossmacthlabtestother,
            inspector: im.inspector
        }];
    } else {
        arr = [{
            labinvestigationid: '',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }];
    }

    var event_data = '';

    event_data += '<tr>';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td class="td-table" style="text-align: left;">';
    // event_data += '<select   name="bloodstocktypeid"  style="width:100%" ';
    // event_data += 'value="" class="form-control" onchange="setLab(this)"   > '
    // event_data += '<option  value=""></option>'
    // $.each(labInvestigation, function(ind, v) {
    //     event_data += '<option ' + ((arr[0].labinvestigationid == v.labinvestigationid) ? 'selected' : '') + '   value="' + v.labinvestigationid + '">' + v.labinvestigationname + '</option>'
    // })
    // event_data += ' </select>';

    if (arr[0].labinvestigationid == 99) {
        event_data += '<input  type="text" class="form-control" value="' + arr[0].requestbloodcrossmacthlabtestother + '" onkeyup="setRowOther(this)" >'
    } else {
        $.each(labInvestigation, function(ind, v) {
            if (arr[0].labinvestigationid == v.labinvestigationid) {
                event_data += '&nbsp;&nbsp;&nbsp;' + v.labinvestigationname;
            }
        })
    }
    event_data += '<input hidden type="text" name="bloodstocktypeid" value="' + arr[0].labinvestigationid + '">'
    event_data += '</td>';
    // if (arr[0].labinvestigationid == 2) {
    //     event_data += '<td class="td-table" onclick="antibodyModal1()">';
    // } else {
    //     event_data += '<td class="td-table">';
    // }
    event_data += '<td class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(2, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestpre) : '');
    event_data += '</td>';
    // if (arr[0].labinvestigationid == 2) {
    //     event_data += '<td class="td-table" onclick="antibodyModal2()">';
    // } else {
    //     event_data += '<td class="td-table">';
    // }
    event_data += '<td class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(3, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestpost) : '');
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(4, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestunit) : '');
    event_data += '</td>';
    event_data += '<td hidden class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(5, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestother) : '');
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<input type="text" value="' + im.inspector + '" onkeyup="setRowinspector(this)" class="form-control">';
    event_data += '<td hidden>';
    event_data += '<button  type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';
    $("#list_table_test_blood").append(event_data);

    if (arr[0].labinvestigationid == 7) {
        crossmatch_minor++;
    }




    dateBE('.date');
}



function setLab(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].labinvestigationid = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    if (self.value == 1) {
        row.cells[2].innerHTML = rowBloodGroup(2);
        row.cells[3].innerHTML = rowBloodGroup(3);
        row.cells[4].innerHTML = rowBloodGroup(4);
        row.cells[5].innerHTML = '';
    } else if (self.value == 3 || self.value == 8) {
        row.cells[2].innerHTML = rowBloodGroupSerumCrossMacth(2);
        row.cells[3].innerHTML = rowBloodGroupSerumCrossMacth(3);
        row.cells[4].innerHTML = rowBloodGroupSerumCrossMacth(4);
        row.cells[5].innerHTML = '';
    } else if (self.value == 4 || self.value == 5 || self.value == 12) {
        row.cells[2].innerHTML = '';
        row.cells[3].innerHTML = '';
        // row.cells[4].innerHTML = rowBloodBag(4);
        row.cells[4].innerHTML = '';
        row.cells[5].innerHTML = '';
    } else if (self.value == 14 || self.value == 15) {
        row.cells[2].innerHTML = '';
        row.cells[3].innerHTML = '';
        row.cells[4].innerHTML = rowRh(4);
        row.cells[5].innerHTML = '';
    } else if (self.value == 7 || self.value == 21) {
        row.cells[2].innerHTML = rowCrossMacthResult(2);
        row.cells[3].innerHTML = rowCrossMacthResult(3);
        row.cells[4].innerHTML = '';
        row.cells[5].innerHTML = '';
    } else if (self.value == 16) {
        // row.cells[2].innerHTML = rowBloodGroupSerumCrossMacth(2);
        // row.cells[3].innerHTML = rowBloodGroupSerumCrossMacth(3);
        // row.cells[4].innerHTML = rowBloodGroupSerumCrossMacth(4);
        row.cells[2].innerHTML = '';
        row.cells[3].innerHTML = '';
        row.cells[4].innerHTML = '';
        row.cells[5].innerHTML = '';
    } else if (self.value == 10) {
        row.cells[2].innerHTML = rowRhD(2);
        row.cells[3].innerHTML = rowRhD(3);
        row.cells[4].innerHTML = rowRhD(4);
        row.cells[5].innerHTML = '';
    } else if (self.value == 99) {
        row.cells[2].innerHTML = rowText(2);
        row.cells[3].innerHTML = rowText(3);
        row.cells[4].innerHTML = rowText(4);
        row.cells[5].innerHTML = rowText(5);
    } else {
        row.cells[2].innerHTML = rowText(2);
        row.cells[3].innerHTML = rowText(3);
        row.cells[4].innerHTML = rowText(4);
        row.cells[5].innerHTML = '';
    }



}

function setLoadLab(row, id, val = '') {
    var event_data = '';
    // if (id == 1) { // ABO
    //     if (row == 2 || row == 3 || row == 4)
    //         event_data = rowBloodGroup(row, val);
    // } 

    if (id == 7 || id == 21) { //Crossmatch
        if (row == 2 || row == 3) {
            event_data = '<input type="search" onkeyup="setRowPrePost(this,' + row + ')" value="' + val + '" list="crossmatch" class="form-control">'
            event_data += '<datalist id="crossmatch">';
            event_data += '<option value="Compatible">Compatible</option>';
            event_data += '<option value="Incompatible">Incompatible</option>';
            event_data += '<option value="Most compatible">Most compatible</option>';
            event_data += '</datalist>';
        } else if (row == 4) {
            event_data = rowTextread(row, val);
        }
    } else if (id == 3 || id == 8) { //Antibody Identification
        if (row == 2 || row == 3 || row == 4) {
            event_data = '<input type="search" onkeyup="setRowPrePost(this,' + row + ')" value="' + val + '" list="blood_group_serum_crossmacth" class="form-control">'
            event_data += '<datalist id="blood_group_serum_crossmacth">';
            event_data += '<option value="Negative">Negative</option>';
            event_data += '<option value="Positive (0.5)">Positive (0.5)</option>';
            event_data += '<option value="Positive (1+)">Positive (1+)</option>';
            event_data += '<option value="Positive (2+)">Positive (2+)</option>';
            event_data += '<option value="Positive (3+)">Positive (3+)</option>';
            event_data += '<option value="Positive (4+)">Positive (4+)</option>';
            event_data += '<option value="Weakly Positive">Weakly Positive</option>';
            event_data += '</datalist>';
        }
    }
    // else if (id == 10) { // Rh(D)
    //     if (row == 2 || row == 3 || row == 4)
    //         event_data = rowRhD(row, val);
    // } 
    else if (id == 99) {
        if (row == 2 || row == 3 || row == 4 || row == 5)
            event_data = rowText(row, val);
    } else if (id == 4 || id == 5) { //  Appearance of blood bag
        if (row == 2 || row == 3) {
            event_data = rowTextread(row, val);
        } else if (row == 4) {
            event_data = '<input type="search" onkeyup="setRowPrePost(this,' + row + ')" value="' + val + '" list="appearance" class="form-control">'
            event_data += '<datalist id="appearance">';
            event_data += '<option value="Normal">Normal</option>';
            event_data += '</datalist>';
        }
    } else if (id == 12) { // Visual check of blood sample
        if (row == 2 || row == 3) {
            event_data = '<input type="search" onkeyup="setRowPrePost(this,' + row + ')" value="' + val + '" list="visualcheckofbloodsample" class="form-control">'
            event_data += '<datalist id="visualcheckofbloodsample">';
            event_data += '<option value="Normal">Normal</option>';
            event_data += '<option value="Hemolysis">Hemolysis</option>';
            event_data += '</datalist>';
        } else if (row == 4) {
            event_data = rowTextread(row, val);
        }
    } else if (id == 18 || id == 17 || id == 16 || id == 19 || id == 11) { // Free // Icteric
        if (row == 2 || row == 3) {
            event_data = '<input type="search" onkeyup="setRowPrePost(this,' + row + ')" value="' + val + '" list="yesno" class="form-control">'
            event_data += '<datalist id="yesno">';
            event_data += '<option value="Yes">Yes</option>';
            event_data += '<option value="No">No</option>';
            event_data += '</datalist>';
        } else if (row == 4) {
            event_data = rowTextread(row, val);
        }
    } else if (id == 2) { //Antibody Identification
        if (row == 2) {
            event_data = rowText(row, val);
            // event_data = rowanti1(row, val);
        } else if (row == 3) {
            event_data = rowText(row, val);
            // event_data = rowanti2(row, val);
        } else if (row == 4) {
            event_data = rowText(row, val);
        }
    } else if (id == 1) { // blood
        if (row == 2) {
            event_data = rowBloodGroup_2(row, val);
        } else if (row == 3) {
            event_data = rowBloodGroup_2(row, val);
        } else if (row == 4) {
            event_data = rowBloodGroup_2(row, val);
        }
    } else if (id == 10) { // rh
        if (row == 2) {
            event_data = rowRh_2(row, val);
        } else if (row == 3) {
            event_data = rowRh_2(row, val);
        } else if (row == 4) {
            event_data = rowRh_2(row, val);
        }
    } else {
        if (row == 2 || row == 3 || row == 4)
            event_data = rowText(row, val);
    }
    return event_data;
}

function rowBloodGroup(cell, val = '') {
    var event_data = '';
    event_data += '<select  onchange="setRowPrePost(this,' + cell + ')"  ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataBloodGroupArr, function(ind, v) {
        event_data += '<option ' + ((val == v.bloodgroupname) ? 'selected' : '') + '  value="' + v.bloodgroupname + '">' + v.bloodgroupname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}

function rowBloodGroup_2(cell, val = '') {
    var event_data = '';
    event_data += '<input type="search" list="blood_group_datalist" onkeyup="setRowPrePost(this,' + cell + ')" value="' + val + '" class="form-control">';
    event_data += '<datalist id="blood_group_datalist">';
    $.each(dataBloodGroupArr, function(ind, v) {
        event_data += '<option value="' + v.bloodgroupname + '"></option>'
    })
    event_data += '</datalist>';
    return event_data;
}

function rowRh_2(cell, val = '') {
    var event_data = '';
    event_data += '<input type="search" list="rh_datalist" onkeyup="setRowPrePost(this,' + cell + ')" value="' + val + '" class="form-control">';
    event_data += '<datalist id="rh_datalist">';
    $.each(dataRhArr, function(ind, v) {
        event_data += '<option value="' + v.rhname3 + '"></option>'
    })
    event_data += '</datalist>';
    return event_data;
}


function rowBloodGroupSerum(cell, val = '') {
    var event_data = '';
    event_data += '<select onchange="setRowPrePost(this,' + cell + ')"   ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataBloodGroupSerumArr, function(ind, v) {
        event_data += '<option ' + ((val == v.bloodgroupserumname) ? 'selected' : '') + '  value="' + v.bloodgroupserumname + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}

function rowBloodGroupSerumCrossMacth(cell, val = '') {
    var event_data = '';
    event_data += '<select onchange="setRowPrePost(this,' + cell + ')"   ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataBloodGroupSerumCrossMacthArr, function(ind, v) {
        event_data += '<option ' + ((val == v.bloodgroupserumname) ? 'selected' : '') + '  value="' + v.bloodgroupserumname + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}

function rowBloodBag(cell, val = '') {
    var event_data = '';
    event_data += '<select onchange="setRowPrePost(this,' + cell + ')"   ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataBloodBagArr, function(ind, v) {
        event_data += '<option ' + ((val == v.bloodbagname) ? 'selected' : '') + '  value="' + v.bloodbagname + '">' + v.bloodbagname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}

function rowCrossMacthResult(cell, val = '') {
    var event_data = '';
    event_data += '<select onchange="setRowPrePost(this,' + cell + ')"   ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataCrossMacthResultArr, function(ind, v) {
        event_data += '<option ' + ((val == v.crossmacthresultname) ? 'selected' : '') + '  value="' + v.crossmacthresultname + '">' + v.crossmacthresultname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}


function rowRh(cell, val = '') {
    var event_data = '';
    event_data += '<select  onchange="setRowPrePost(this,' + cell + ')"  ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataRhArr, function(ind, v) {
        event_data += '<option ' + ((val == v.rhname3) ? 'selected' : '') + '  value="' + v.rhname3 + '">' + v.rhname3 + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}

function rowRhD(cell, val = '') {
    var event_data = '';
    event_data += '<select  onchange="setRowPrePost(this,' + cell + ')"  ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataRhDArr, function(ind, v) {
        event_data += '<option ' + ((val == v.rhdname) ? 'selected' : '') + '  value="' + v.rhdname + '">' + v.rhdname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}

function rowText(cell, val = '') {
    var event_data = '';
    event_data += '<input type="text" onkeyup="setRowPrePost(this,' + cell + ')" value="' + val + '" class="form-control">';
    return event_data;
}

function rowTextread(cell, val = '') {
    var event_data = '';
    event_data += '<input type="text" readonly onkeyup="setRowPrePost(this,' + cell + ')" value="' + val + '" class="form-control">';
    return event_data;
}

function rowYesNo(cell, val = '') {
    var event_data = '';
    event_data += '<select onchange="setRowPrePost(this,' + cell + ')" class="form-control">';
    event_data += '<option value=""></option>';
    event_data += '<option ' + ((val == 'Yes') ? 'selected' : '') + ' value="Yes">Yes</option>';
    event_data += '<option ' + ((val == 'No') ? 'selected' : '') + ' value="No">No</option>';
    event_data += '</select>';
    return event_data;
}

function rowanti1(cell, val = '') {
    var event_data = '';
    // event_data += '<p onclick="antibodyModal1()" id="anti1_val_label"></p>';
    event_data += '<p id="anti1_val_label"></p>';
    event_data += '<input hidden type="text" value="" id="anti1_val" onclick="setRowPrePost(this,' + cell + ')" class="form-control">';
    return event_data;
}

function rowanti2(cell, val = '') {
    var event_data = '';
    // event_data += '<p onclick="antibodyModal2()" id="anti2_val_label"></p>';
    event_data += '<p id="anti2_val_label"></p>';
    event_data += '<input hidden type="text" value="" id="anti2_val" onclick="setRowPrePost(this,' + cell + ')" class="form-control">';
    return event_data;
}

function rowTextOther(cell, val = '') {
    var event_data = '';
    event_data += '<input type="text" onkeyup="setRowOther(this,' + cell + ')" value="' + val + '" class="form-control">';
    return event_data;
}

function rowAntibody(cell, val = '') {
    var event_data = '';
    event_data += '<div class="col-md-12 div-anti" onclick="antibodyModalTable(this,' + cell + ')">';
    event_data += '<label >' + val + '</label>';
    event_data += '</div>';
    return event_data;
}


function setRowPrePost(self, cell) {
    console.log("********");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    if (cell == 2) {
        item[0].requestbloodcrossmacthlabtestpre = self.value;
    } else if (cell == 3) {
        item[0].requestbloodcrossmacthlabtestpost = self.value;
    } else if (cell == 4) {
        item[0].requestbloodcrossmacthlabtestunit = self.value;
    } else if (cell == 5) {
        item[0].requestbloodcrossmacthlabtestother = self.value;
    }
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRowOther(self, cell) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].requestbloodcrossmacthlabtestother = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRowRequestBloodCrossmacthLabTestUnit(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].requestbloodcrossmacthlabtestunit = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRowRequestBloodCrossmacthLabTestOther(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].requestbloodcrossmacthlabtestother = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRowinspector(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].inspector = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

var selfrow;
var selfcell;

function antibodyModalTable(self, cell) {

    removeAntiBody();
    removePhenotype();

    selfrow = self;
    selfcell = cell;
    var antibody = self.getElementsByTagName('label')[0].innerHTML.split(",");
    antibody.forEach(function(entry) {
        if (entry)
            if (document.getElementById(entry) != undefined)
                document.getElementById(entry).checked = true;
    });

    document.getElementById('antiLabel').innerHTML = self.getElementsByTagName('label')[0].innerHTML;
    $("#bloodinvestModal").modal('show');
}

function confirmAntiPheno() {
    selfrow.getElementsByTagName('label')[0].innerHTML = document.getElementById('antiLabel').innerHTML;
    var row = selfrow.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    if (selfcell == 2) {
        item[0].requestbloodcrossmacthlabtestpre = document.getElementById('antiLabel').innerHTML;
    } else if (selfcell == 3) {
        item[0].requestbloodcrossmacthlabtestpost = document.getElementById('antiLabel').innerHTML;
    }
    row.cells[0].innerHTML = JSON.stringify(item);

    $("#bloodinvestModal").modal("hide");
    $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
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
    // removeCheckBox(document.getElementById("antiTable3"));
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

function setInsertData() {
    arr = [{
            labinvestigationid: '12',
            labinvestigationname: 'Visual check of blood sample',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        },
        {
            labinvestigationid: '17',
            labinvestigationname: 'Urine free hemoglobin',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        },
        {
            labinvestigationid: '18',
            labinvestigationname: 'Icteric',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '4',
            labinvestigationname: 'Appearance of blood bag',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '5',
            labinvestigationname: 'Appearance of blood set',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '1',
            labinvestigationname: 'ABO',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '10',
            labinvestigationname: 'Rh(D) Typing',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '7',
            labinvestigationname: 'Crossmatch',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '3',
            labinvestigationname: 'Antibody screening',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '2',
            labinvestigationname: 'Antibody Identification',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '8',
            labinvestigationname: 'DAT',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '16',
            labinvestigationname: 'MF Agglutination',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '19',
            labinvestigationname: 'Free hemoglobin',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '11',
            labinvestigationname: 'Serum Birilubin',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '15',
            labinvestigationname: 'Gram stain',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '14',
            labinvestigationname: 'Bacterial culture',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: '',
            inspector: ''
        }, {
            labinvestigationid: '99',
            labinvestigationname: 'Other Testing',
            requestbloodcrossmacthlabtestpre: '',
            requestbloodcrossmacthlabtestpost: '',
            requestbloodcrossmacthlabtestunit: '',
            requestbloodcrossmacthlabtestother: 'Other Testing',
            inspector: ''
        }
    ];

    return arr;
}

function findTable2HN(number) {
    var bloodstocktype = $("#findbloodstocktype2").val();
    var rows = document.getElementById("list_table_allergic_to_blood").rows;
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);


        if (item.bag_number == number && item.bloodtype == bloodstocktype) {
            item.isallergic = '1';
            row.children[0].innerHTML = JSON.stringify(item);
            row.children[2].children[0].setAttribute('checked', 'checked');
        }

    }

    $("#findbagnumber2").val("");
    document.getElementById('findbagnumber2').focus();

}

function addRowBloodTest_crossmatch_minor() {
    var arr;
    arr = [{
        labinvestigationid: 21,
        requestbloodcrossmacthlabtestpre: '',
        requestbloodcrossmacthlabtestpost: '',
        requestbloodcrossmacthlabtestunit: '',
        requestbloodcrossmacthlabtestother: '',
        inspector: ''
    }];

    var event_data = '';

    event_data += '<tr>';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td class="td-table" style="text-align: left;">';

    if (arr[0].labinvestigationid == 99) {
        event_data += '<input  type="text" class="form-control" value="' + arr[0].requestbloodcrossmacthlabtestother + '" onkeyup="setRowOther(this)" >'
    } else {
        $.each(labInvestigation, function(ind, v) {
            if (arr[0].labinvestigationid == v.labinvestigationid) {
                event_data += '&nbsp;&nbsp;&nbsp;' + v.labinvestigationname;
            }
        })
    }
    event_data += '<input hidden type="text" name="bloodstocktypeid" value="' + arr[0].labinvestigationid + '">'
    event_data += '</td>';
    // if (arr[0].labinvestigationid == 2) {
    //     event_data += '<td class="td-table" onclick="antibodyModal1()">';
    // } else {
    //     event_data += '<td class="td-table">';
    // }
    event_data += '<td class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(2, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestpre) : '');
    event_data += '</td>';
    // if (arr[0].labinvestigationid == 2) {
    //     event_data += '<td class="td-table" onclick="antibodyModal2()">';
    // } else {
    //     event_data += '<td class="td-table">';
    // }
    event_data += '<td class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(3, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestpost) : '');
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(4, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestunit) : '');
    event_data += '</td>';
    event_data += '<td hidden class="td-table">';
    event_data += ((arr[0].labinvestigationid) ? setLoadLab(5, arr[0].labinvestigationid, arr[0].requestbloodcrossmacthlabtestother) : '');
    event_data += '</td>';

    event_data += '<td class="td-table">';
    event_data += '<input type="text" value="' + arr[0].inspector + '" onkeyup="setRowinspector(this)" class="form-control">';
    event_data += '<td hidden>';
    event_data += '<button  type="button" onclick="deleteRow(this,`list_table_test_blood`)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';
    $("#list_table_test_blood").append(event_data);
}