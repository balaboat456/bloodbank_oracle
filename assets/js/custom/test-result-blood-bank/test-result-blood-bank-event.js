var item_lab_new;
var item_lab_edit_tab_2;
var item_lab_edit_tab_2_item2;
var item_lab_new_maintenanceright;
var item_lab_form;

var dataABOTest0SerumArr;


var dataRhConfirmArr;
var dataBloodGroupConfirmArr;
var dataABOTest0SerumComfirmArr;
var dataBloodGroupSerumConfirmArr;

$(document).ready(function() {

    $("#patientid").on('keydown', function(e) {
        if (e.which == 13) {
            scanBarcode();
        }
    });

    getRh().then(function success(data) {
        dataRhArr = data.data;
    });

    getRh2().then(function success(data) {
        dataRh2Arr = data.data;
    });

    getRhConfirm().then(function success(data) {
        dataRhConfirmArr = data.data;
    });


    gettritation().then(function success(data) {
        datatritation = data.data;
    });



    getABOTest0Serum().then(function success(data) {
        dataABOTest0SerumArr = data.data;
    });

    getABOTest0SerumConfirm().then(function success(data) {
        dataABOTest0SerumComfirmArr = data.data;
    });


    getBloodGroupSerum().then(function success(data) {
        dataBloodGroupSerumArr = data.data;
    });

    getBloodGroupSerumConfirm().then(function success(data) {
        dataBloodGroupSerumConfirmArr = data.data;
    });

    getSerumLab().then(function success(data) {
        dataSerumLabArr = data.data;
    });

    getBloodGroup().then(function success(data) {
        dataBloodGroupArr = data.data;
    });

    getBloodGroupConfirm().then(function success(data) {
        dataBloodGroupConfirmArr = data.data;
    });

    getBloodAntiTest().then(function success(data) {
        BloodAntiTest = data.data;

    });


});

function scanBarcode() {
    var patient = document.getElementById('patientid').value;

    document.getElementById("validation_tiktok").checked = false;
    document.getElementById("approve_tiktok").checked = false;

    document.getElementById("list_table_test_item_tr").innerHTML = "";

    if (patient.length > 0) {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn=' + patient,
            success: function(data) {
                var hhn = data.patientid_hn;
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/patient/patient.php?hn=' + hhn,
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function(data) {

                        document.getElementById("dis_tab2").disabled = false;
                        document.getElementById("dis_tab3").disabled = false;
                        document.getElementById("dis_tab4").disabled = false;
                        document.getElementById("dis_tab5").disabled = false;
                        document.getElementById("dis_tab6").disabled = false;

                        if (data.data.length > 0) {
                            setPatient(data.data[0]);
                        } else {
                            clearPatient();
                            swal({
                                    title: "????????????????????????????????? ",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "????????????",
                                    closeOnConfirm: true
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        document.getElementById('patientid').focus;
                                    }
                                });
                        }
                        document.getElementById('patientid').value = '';
                    },
                    error: function(data) {
                        clearPatient();
                        console.log('An error occurred.');
                        console.log(data);
                        document.getElementById('patientid').value = '';
                    },
                });


            },
            error: function(data) {
                spinnerhide();
                clearPatient();
                console.log('An error occurred.');
                console.log(data);
                document.getElementById('patientid').value = '';
            },
        });
    } else {
        clearPatient();
    }

}

function setRh(eid = "", val = "") {
    console.log(eid);
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


function setRhConfirm(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataRhConfirmArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.rhid)
                    .text(value.rhname3 + '|' + value.rhcode2));
        });
        $(eid).val(val);
    }
}



function settritation(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(datatritation, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.tritationid)
                    .text(value.tritationcode));
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

function setBloodGroupSerumConfirm(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupSerumConfirmArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}


function setABOTest0Serum(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataABOTest0SerumArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}


function setABOTest0SerumConfirm(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataABOTest0SerumComfirmArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}




function setABOTest0SerumLAB(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataABOTest0SerumArr, function(key, value) {


            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupserumid)
                    .text(value.bloodgroupserumname));
        });

        $(eid).val(val);

    }
}




//dataSerumLabArr

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


function setBloodGroupConfirm(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(dataBloodGroupConfirmArr, function(key, value) {
            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupid)
                    .text(value.bloodgroupname + '|' + value.bloodgroupcode));
        });
        $(eid).val(val);

    }
}

function removeOption(eid = "") {
    var eid = eid.replace("#", "");
    var selectElement = document.getElementById(eid);
    try {
        for (var i = selectElement.length - 1; i >= 0; i--) {
            if (selectElement) {
                selectElement.remove(i);
            }
        }
    } catch (err) {
        console.log("err");
    }

}

function getRh() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php?rhsort=1',
        dataType: 'json',
        type: 'get',
    });
}

function gettritation() {
    return $.ajax({
        url: 'data/masterdata/tritation.php',
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

function getABOTest0Serum() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserum.php?notpn=1',
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



function getRhConfirm() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php?cordblood=1',
        dataType: 'json',
        type: 'get',
    });
}


function getBloodGroupConfirm() {
    return $.ajax({
        url: 'data/masterdata/bloodgroup.php?cordblood=1',
        dataType: 'json',
        type: 'get',
    });
}

function getABOTest0SerumConfirm() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserum.php?notpn=1&cordblood=1',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodGroupSerumConfirm() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserumcrossmacth.php?cordblood=1',
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

function getBloodAntiTest() {
    return $.ajax({
        url: 'data/masterdata/bloodantitest.php',
        dataType: 'json',
        type: 'get',
    });
}

function setPatient(data) {
    /*
    // loadTableBloodPayStock();
    document.getElementById('hn').value = data.patienthn;
    document.getElementById('patienthn').innerHTML = data.patienthn;
    document.getElementById('patientid').value = data.patientid;

    // document.getElementById('patientan').innerHTML = data.patientan;
    // document.getElementById('patientidcard').innerHTML = data.patientidcard;
    // document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;
    document.getElementById('patientfullname').innerHTML = data.patientfullname;
    document.getElementById('patientage').innerHTML = data.patientage;
    document.getElementById('patientgender').innerHTML = data.patientgender;
    // document.getElementById('patientinsurance').innerHTML = data.patientinsurance;
    */

    data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

    document.getElementById('hn').value = data.patienthn;
    document.getElementById('patienthn').innerHTML = data.patienthn;
    document.getElementById('patientan').innerHTML = data.patientan;
    document.getElementById('patientidcard').innerHTML = data.patientidcard;
    document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;
    document.getElementById('patientfullname').innerHTML = data.patientfullname;
    document.getElementById('patientage').innerHTML = data.patientage;
    document.getElementById('patientgender').innerHTML = data.patientgender;
    document.getElementById('patientinsurance').innerHTML = data.patientinsurance;
    document.getElementById('patient_type').innerHTML = data.patient_type;

    if (data.patientimage.replace('data:image/png;base64,', '') != "") {
        document.getElementById('img_profile').src = data.patientimage;
    } else {
        document.getElementById('img_profile').src = "assets/images/profile.png";
    }

    if (diffDate(data.patientanbirthday) < 6) {
        swal({
                title: "????????????????????? ????????????????????????????????????????????????????????? 6 ????????? ????????????????????????????????????????????? ????????????????????????",
                type: "warning",
                showCloseButton: false,
                showCancelButton: false,
                // dangerMode: true,
                confirmButtonClass: "btn-success",
                confirmButtonClass: "",
                confirmButtonText: "????????????",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (inputValue) {
                    showDataModal();
                }
            });
    } else {
        showDataModal();
    }


    // clearFormTab1();
}

function diffDate(date) {
    var dateFrom = new Date(date);
    var today = new Date();
    var diffDate = (parseInt((today - dateFrom) / (1000 * 60 * 60 * 24), 10) / 365.25) + 543;
    return diffDate;
}

function showDataModal() {
    requestBloodLabModalShow();
    loadCheckRequestTab2();
    item_lab_new = '';
    item_lab_new_maintenanceright = '';
}

function clearPatient() {
    // document.getElementById('hn').value = '';
    // document.getElementById('patienthn').innerHTML = '-';
    // document.getElementById('patientan').innerHTML = '-';
    // document.getElementById('patientidcard').innerHTML = '-';
    // document.getElementById('patientbloodgroup').innerHTML = '-';
    // document.getElementById('patientfullname').innerHTML = '-';
    // document.getElementById('patientage').innerHTML = '-';
    // document.getElementById('patientgender').innerHTML = '-';
    // document.getElementById('patientinsurance').innerHTML = '-';
    // clearFormTab1();
}


function chActive(id, self) {

    // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);

    for (i = 0; i < count; i++) {
        document.getElementById("trblood" + i).style.background = "#FFF";
    }
    document.getElementById("trblood" + id).style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);
    item_lab_new = item;
    item_lab_new_maintenanceright = '';
    loadMaintenanceright(item);
}

function ch2Active(id, self) {

    // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);

    for (i = 0; i < count_tab2; i++) {
        document.getElementById("trblood_tab2" + i).style.background = "#FFF";
    }
    document.getElementById("trblood_tab2" + id).style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);
    item_lab_edit_tab_2 = item;
    loadCheckRequestTab2_item1(item.labid);
    loadCheckRequestTab2_item2(item.labcheckrequestid);
}


function chActiveMaintenanceright(id, self) {

    // $("#ac_requestbloodcrossmacthid").val(requestbloodcrossmacthid);

    for (i = 0; i < 1; i++) {
        document.getElementById("trbloodmaintenanceright0").style.background = "#FFF";
    }
    document.getElementById("trbloodmaintenanceright0").style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);
    item_lab_new_maintenanceright = item;


}

function setItemLab() {

    if (!item_lab_new) {
        showSwal("??????????????????????????????????????????????????????????????????????????????");
        return false;
    } else if (!item_lab_new_maintenanceright) {
        showSwal("????????????????????????????????????????????????????????????????????????");
        return false;
    } else {
        addItemData();
    }

}

function setItemManualPayment() {
    addItemData();
}

function showSwal($text = "") {
    swal({
        title: $text,
        type: "warning",
        showCloseButton: false,
        showCancelButton: false,
        // dangerMode: true,
        confirmButtonClass: "btn-success",
        confirmButtonClass: "",
        confirmButtonText: "????????????",
        closeOnConfirm: true
    });
}

function saveSuccessLoadData(id = "") {
    $.ajax({
        url: 'data/checkrequest/checkrequest-accepted.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            item_lab_edit_tab_2 = obj[0];

            $.ajax({
                url: 'data/checkrequest/checkrequest-accepted-item2.php?id=' + id,
                dataType: 'json',
                type: 'get',
                success: function(data) {

                    var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                    item_lab_edit_tab_2_item2 = obj;
                    addItemEditData();
                },
                error: function(d) {
                    /*console.log("error");*/
                    alert("404. Please wait until the File is Loaded.");
                }
            });

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function addItemData() {
    requestBloodLabModalClose();
    setValueItem();
}

function addItemEditData() {
    item_lab_new = item_lab_edit_tab_2;
    requestBloodLabModalClose();
    setValueItem();
    // setLabFormToItemList('edit');
}

function setValueItem() {

    var data = item_lab_new;
    console.log(data);
    // Start Tab 1
    if (document.getElementById('labcheckrequestid'))
        document.getElementById('labcheckrequestid').value = (data.labcheckrequestid) ? data.labcheckrequestid : '';

    if (document.getElementById('labunitroomname'))
        document.getElementById('labunitroomname').value = (data.unitofficename) ? data.unitofficename : '';

    if (document.getElementById('doctorname'))
        document.getElementById('doctorname').value = (data.doctorname) ? data.doctorname : '';

    if (document.getElementById('labkeepuser'))
        document.getElementById('labkeepuser').value = (data.labkeepuser) ? data.labkeepuser : '';

    if (document.getElementById('labbloodgroupid'))
        document.getElementById('labbloodgroupid').value = (data.labbloodgroupid) ? data.labbloodgroupid : '';

    if (document.getElementById('labrhname'))
        document.getElementById('labrhname').value = (data.rhname3) ? data.rhname3 : '';

    if (document.getElementById('labdiagnosis'))
        document.getElementById('labdiagnosis').value = (data.labdiagnosis) ? data.labdiagnosis : '';

    if (document.getElementById('motherbloodgroup'))
        document.getElementById('motherbloodgroup').value = (data.mombloodgroupname) ? data.mombloodgroupname : '';

    if (document.getElementById('motherrh'))
        document.getElementById('motherrh').value = (data.momrhname3) ? data.momrhname3 : '';

    var labgetdatetime = '';
    var labsenddatetime = '';
    var labkeepdatetime = '';
    var pregnantdate = '';
    var birthdate = '';
    var antenataldate = '';
    var bloodgetdate = '';

    document.getElementById('reportedby').value = '';
    document.getElementById('reportedby_date').value = '';
    document.getElementById('approvedby').value = '';
    document.getElementById('approvedby_date').value = '';

    if (data.labgetdatetime != "0000-00-00 00:00:00" && data.labgetdatetime != '') {
        labgetdatetime = getDMYHM(StringToDateYMDHMS(data.labgetdatetime))
    } else {
        labgetdatetime = "";
    }

    if (data.labsenddatetime != "0000-00-00 00:00:00" && data.labsenddatetime != '') {
        labsenddatetime = getDMYHM(StringToDateYMDHMS(data.labsenddatetime))
    } else {
        labsenddatetime = "";
    }

    if (data.labkeepdatetime != "0000-00-00 00:00:00" && data.labkeepdatetime != '') {
        labkeepdatetime = getDMYHM(StringToDateYMDHMS(data.labkeepdatetime))
    } else {
        labkeepdatetime = "";
    }

    if (data.pregnantdate != "0000-00-00" && data.pregnantdate != '') {
        pregnantdate = getDMY(data.pregnantdate)
    } else {
        pregnantdate = "";
    }

    if (data.birthdate != "0000-00-00" && data.birthdate != '') {
        birthdate = getDMY(data.birthdate)
    } else {
        birthdate = "";
    }

    if (data.antenataldate != "0000-00-00" && data.antenataldate != '') {
        antenataldate = getDMY(data.antenataldate)
    } else {
        antenataldate = "";
    }

    if (data.bloodgetdate != "0000-00-00" && data.bloodgetdate != '') {
        bloodgetdate = getDMY(data.bloodgetdate)
    } else {
        bloodgetdate = "";
    }

    if (data.labcheckrequest_v_user != '') {
        document.getElementById('reportedby').value = data.labcheckrequest_v_user;
        document.getElementById('reportedby_date').value = getDMYHM(data.labcheckrequest_v_datetime);
    }



    if (data.labcheckrequest_a_user != '') {
        document.getElementById('approvedby').value = data.labcheckrequest_a_user;
        document.getElementById('approvedby_date').value = getDMYHM(data.labcheckrequest_a_datetime);
    }

    document.getElementById('labgetdatetime').value = labgetdatetime;
    document.getElementById('labgetdatetime0').value = labgetdatetime;
    document.getElementById('labgetdatetime1').value = labgetdatetime;
    document.getElementById('labgetdatetime2').value = labgetdatetime;
    document.getElementById('labgetdatetime3').value = labgetdatetime;
    document.getElementById('labsenddatetime').value = labsenddatetime;
    document.getElementById('labkeepdatetime').value = labkeepdatetime;
    document.getElementById('pregnantdate').value = pregnantdate;
    document.getElementById('birthdate').value = birthdate;
    document.getElementById('antenataldate').value = antenataldate;
    document.getElementById('bloodgetdate').value = bloodgetdate;

    document.getElementById('pregnant1').checked = (data.pregnant == 1);
    document.getElementById('pregnant2').checked = (data.pregnant == 2);

    document.getElementById('patienttype1').checked = (data.patienttype == 1);
    document.getElementById('patienttype2').checked = (data.patienttype == 2);
    document.getElementById('patienttype3').checked = (data.patienttype == 3);

    document.getElementById('bloodhistory1').checked = (data.bloodhistory == 1);
    document.getElementById('bloodhistory2').checked = (data.bloodhistory == 2);
    // End Tab 1

    // Item Table Test
    removeRowTable('list_table_test_item');
    $.each(data.lab_labcheckrequest_item, function(index, value) {
        addItemTest(index, value);
    });

    setValueItemTab0(data);
    setValueItemTab1(data);
    setValueItemTab2(data);
    setValueItemTab3(data);

    setValueItemTab4(data);


}

function addItemTest(index = 0, value = []) {


    console.log(value);
    if (value.labformid == '1154')
        value.labcheckresultshow = '-'

    var event_data = '';


    event_data += '<tr>';
    event_data += '<td class="td-table"  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += index + 1;
    event_data += '</td>';
    event_data += '<td><input name="validation_tik" onchange="setRequestCheckedTable(this)" type="checkbox" ' + ((value.labcheckrequestitem_v == 1) ? 'checked' : '') + ' /></td>';
    event_data += '<td><input name="approve_tik" onchange="setRequestAllowReportTable(this)" type="checkbox" ' + ((value.labcheckrequestitem_a == 1) ? 'checked' : '') + ' /></td>';

    // event_data += '<td><input name="validation_tik" onchange="setRequestCheckedTable(this)" type="checkbox" /></td>';
    // event_data += '<td><input name="approve_tik" onchange="setRequestAllowReportTable(this)" type="checkbox" /></td>';
    event_data += '<td>' + value.labformname + '</td>';
    event_data += '<td>' + value.labcheckresultshow + '</td>';
    event_data += '<td hidden>' + value.lab_user_v + '</td>';
    event_data += '<td hidden>' + value.v_date_time + '</td>';
    event_data += '<td hidden>' + value.lab_user_a + '</td>';
    event_data += '<td hidden>' + value.a_date_time + '</td>';
    event_data += '<td><input onkeyup="setremark_item(this)" type="text" value="' + value.item_remark + '" class="form-control"></td>';
    event_data += '</tr>';

    $("#list_table_test_item").append(event_data);

    // if(value.lab_user_v != ''){
    //     document.getElementById('reportedby').value = value.lab_user_v;
    //     document.getElementById('reportedby_date').value = value.v_date_time;
    // }

    // if(value.lab_user_a != ''){
    //     document.getElementById('approvedby').value = value.lab_user_a;
    //     document.getElementById('approvedby_date').value = value.a_date_time;
    // }

}

function validation_tiky() {
    var ele = document.getElementsByName('validation_tik');
    if (document.getElementById("validation_tiktok").checked == true) {
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox') {
                ele[i].click();
                ele[i].checked = true;
            }
        }

    } else {
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox') {
                ele[i].click();
                ele[i].checked = false;
            }
        }
    }
}

function approve_tiky() {
    var ele = document.getElementsByName('approve_tik');
    if (document.getElementById("approve_tiktok").checked == true) {
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox') {
                ele[i].click();
                ele[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < ele.length; i++) {
            if (ele[i].type == 'checkbox') {
                ele[i].click();
                ele[i].checked = false;
            }
        }
    }
}

function setRequestCheckedTable(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.labcheckrequestitem_v = (self.checked) ? "1" : "";
    row.cells[0].innerHTML = JSON.stringify(item);


}

function setRequestAllowReportTable(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.labcheckrequestitem_a = (self.checked) ? "1" : "";
    row.cells[0].innerHTML = JSON.stringify(item);

}


function setDataModalSelectValue(elem = '', itemid, itemtext) {

    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function setNo() {

    var rows = document.getElementById("request_blood_lab").rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[1].innerHTML = i;
    }


}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}


function setIsCheck(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.ischeck_return = self.checked;
    item.ck = (self.checked) ? '1' : '0';

    row.cells[0].innerHTML = JSON.stringify(item);

    if (self.checked) {
        row.style.background = "#b7e4eb";
    } else {
        row.style.background = "#FFF";
    }

}

function getDate8(elename) {
    date8('#' + elename);
}

function removeRowTable(table = '') {
    var body = document.getElementById(table).getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }
}

function setRequestChecked(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.labcheckrequest_v = (self.checked) ? "1" : "";
    row.cells[0].innerHTML = JSON.stringify(item);

    // setCheckObject(row,item);

}

function setRequestAllowReport(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.labcheckrequest_a = (self.checked) ? "1" : "";
    row.cells[0].innerHTML = JSON.stringify(item);

    // setCheckObject(row,item);
}

function setremark_item(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.item_remark = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function confirmBloodgroupResult(value = "") {

    getTYPE_OF_REQUEST("list_table_test_item", 8901, value, value);
    getTYPE_OF_REQUEST("list_table_test_item", 8927, value, value);
    getTYPE_OF_REQUEST("list_table_test_item", 8938, value, value);

}

function confirm_antibodyidentificationtestTubeMethod(value = "") {

    console.log(value);

    getTYPE_OF_REQUEST("list_table_test_item", 8929, value, value);

}

function confirmRhResult(value = "") {
    var show = "";
    $.each(dataRhConfirmArr, function(key, v) {

        if (v.rhid == value) {
            show = v.rhname3;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8902, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8934, value, show);

}

function confirmDATResult(value = "") {
    var show = "";
    $.each(dataABOTest0SerumComfirmArr, function(key, v) {

        if (v.bloodgroupserumid == value) {

            show = v.bloodgroupserumname2;

            console.log(show);
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8935, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8903, value, show);
}

function confirmIgGResult(value = "") {
    var show = "";
    $.each(dataABOTest0SerumComfirmArr, function(key, v) {

        if (v.bloodgroupserumid == value) {
            show = v.bloodgroupserumname2;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8913, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8926, value, show);
}

function confirmC3dResult(value = "") {
    var show = "";
    $.each(dataABOTest0SerumComfirmArr, function(key, v) {

        if (v.bloodgroupserumid == value) {
            show = v.bloodgroupserumname2;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8933, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8912, value, show);
}

function confirmAntibodySceeningTestResult(value = "") {
    var show = "";
    $.each(dataBloodGroupSerumConfirmArr, function(key, v) {

        if (v.bloodgroupserumid == value) {
            show = v.bloodgroupserumname;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8936, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8909, value, show);

}

function confirmColdAgglutininResult(value = "") {
    var show = "";
    $.each(datatritation, function(key, v) {

        if (v.tritationid == value) {

            show = v.tritationcode;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8921, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8916, value, show);
}

function confirmSalivaTestResult(value = "") {
    getTYPE_OF_REQUEST("list_table_test_item", 8911, value, value);
    getTYPE_OF_REQUEST("list_table_test_item", 8919, value, value);
}

function confirmRhDResult(value = "") {
    var show = "";
    $.each(dataRh2Arr, function(key, v) {

        if (v.rhid == value) {
            show = v.rhname3;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8934, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8902, value, show);
}

function confirmTitrationResult(value = "") {
    var show = "";
    $.each(dataRh2Arr, function(key, v) {

        if (v.rhid == value) {

            show = v.rhname3;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8930, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8906, value, show);
}

function confirmTitrationResult1(value = "") {
    var show = "";
    $.each(datatritation, function(key, v) {

        if (v.tritationid == value) {

            show = v.tritationcode;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8930, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8906, value, show);
}

function confirmAdsorptionResult(value = "") {
    getTYPE_OF_REQUEST("list_table_test_item", 8932, value, value);
    getTYPE_OF_REQUEST("list_table_test_item", 8910, value, value);
}

function confirmElutionResult(value = "") {
    getTYPE_OF_REQUEST("list_table_test_item", 8937, value, value);
    getTYPE_OF_REQUEST("list_table_test_item", 8910, value, value);
}

function confirmAntibodyIdentificationTestTubeMethodResult(value = "") {
    var show = "";
    $.each(dataRh2Arr, function(key, v) {

        if (v.rhid == value) {
            show = v.rhname3;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8905, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8929, value, show);
}

function confirmAntibodyScreeningTubeMethodResult(value = "") {
    var show = "";
    $.each(dataSerumLabArr, function(key, v) {

        if (v.bloodgroupserumid == value) {
            show = v.bloodgroupserumname;
        }

    });
    getTYPE_OF_REQUEST("list_table_test_item", 8904, value, show);
    getTYPE_OF_REQUEST("list_table_test_item", 8928, value, show);
}


function getTYPE_OF_REQUEST(table = '', labformid = '', value = '', show = '') {
    var arr = [];
    console.log(value);
    // value = value.replace('_CB', ' (cord blood)');
    show = show.replace('_CB', ' (cord blood)');

    var rows = document.getElementById(table).rows;
    for (var i = 1; i < rows.length; i++) {

        if (rows[i].cells[0]) {
            var item = JSON.parse(rows[i].cells[0].innerHTML);

            if (labformid == item.labformid) {
                item.labcheckresult = value;
                item.labcheckresultshow = show;
                rows[i].cells[5].innerHTML = show;
                rows[i].cells[0].innerHTML = JSON.stringify(item);
            }


        }
    }
}