$(document).ready(function() {

    setTimeNow();

    $("#findbagnumber34").on('keydown', function(e) {
        if (e.which == 13) {
            var number = $("#findbagnumber34").val();
            findTable34HN(number)

            $("#findbagnumber34").val("");
        }
    });

    $('.findbloodstocktype34').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
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
    }).on("select2:selecting", function(e) {
        setTimeout(function() { document.getElementById("findbloodstocktype34").focus(); }, 200);

    });



    $('#crossmatchuserid').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
        ajax: {
            url: 'data/masterdata/staff.php?type=isbloodpreparation',
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
                            item: item,
                            text: item.name + '|' + item.code,
                        }
                    })
                };
            },
        },

        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
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
    }).on("select2:selecting", function(e) {

        $('#crossmatchuser').val(e.params.args.data.item.name);

    });


});

var datablood = [];
var countreq = 0;
var bloodstocktypecode = "";
var bloodstocktypegroupid = "";
var bloodstocktypeqty = 0;

function scanBarcode(hn = '') {

    var patientid = document.getElementById('hn').value;

    if (hn == '') {
        patientid = document.getElementById('patientid').value;
    }


    if (patientid.length > 0) {
        spinnershow();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/patient/patient.php?hn=' + patientid,
            complete: function() {
                var delayInMilliseconds = 200;
                setTimeout(function() {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function(data) {
                if (data.data.length > 0) {
                    var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                    setPatient(obj, (hn == ''));
                } else {
                    clearPatient();
                    swal({
                            title: "ไม่พบข้อมูล ",
                            type: "warning",
                            showCloseButton: false,
                            showCancelButton: false,
                            // dangerMode: true,
                            confirmButtonClass: "btn-success",
                            confirmButtonClass: "",
                            confirmButtonText: "ตกลง",
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
    } else {
        clearPatient();
    }

}

function setPatient(data, state = true) {
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

    if (data.ispassedaway == 1) {
        document.getElementById('patientdead').innerHTML = "เสียชีวิตเมื่อ " + getDMY2(data.ispassedaway_date);
    }
    else {
        document.getElementById('patientdead').innerHTML = "";
    }

    var labelNameBlodIcon = document.getElementById("labelNameBlodIcon");
    if (data.isconfirmbloodgroup == 1) {
        labelNameBlodIcon.style.color = '#28a745';
        labelNameBlodIcon.innerHTML = '<i class="fa fa-smile-o fa-2x" ></i>&nbsp;';

    } else {
        labelNameBlodIcon.style.color = '#dc3545';
        labelNameBlodIcon.innerHTML = '<i class="fa fa-meh-o fa-2x" ></i>&nbsp;';
    }


    if (data.patientimage.replace('data:image/png;base64,', '') != "") {
        document.getElementById('img_profile').src = data.patientimage;
    } else {
        document.getElementById('img_profile').src = "assets/images/profile.png";
    }

    if (data.ispassedaway == 1) {

        // var status = true;
        // setEnableDisable(status);
        swal({
                title: "ผู้ป่วยเสียชีวิตแล้ว",
                text: "",
                type: "warning",
                showCloseButton: false,
                showCancelButton: false,
                // dangerMode: true,
                confirmButtonClass: "btn-success",
                confirmButtonClass: "",
                confirmButtonText: "ตกลง",
                closeOnConfirm: true
            },
            function(inputValue) {

            });
    } else {
        if (state)
            checkBloodModalShow();
    }


    // clearFormTab1();
}

function clearPatient() {
    setEnableDisable(true);
    document.getElementById('hn').value = '';
    document.getElementById('patienthn').innerHTML = '-';
    document.getElementById('patientan').innerHTML = '-';
    document.getElementById('patientidcard').innerHTML = '-';
    document.getElementById('patientbloodgroup').innerHTML = '-';
    document.getElementById('patientfullname').innerHTML = '-';
    document.getElementById('patientage').innerHTML = '-';
    document.getElementById('patientgender').innerHTML = '-';
    document.getElementById('patientinsurance').innerHTML = '-';
    document.getElementById('img_profile').src = "assets/images/profile.png";
    document.getElementById('patient_type').innerHTML = '-';
    // clearFormTab1();
}

function checkBloodModalShow() {
    $("#checkbloodmodal").modal('show');
    loadTableCheckBlood();
}

function checkBloodModalClose() {
    $("#checkbloodmodal").modal('hide');
    loadTableCheckBlood();
}

function checkBloodModalHistoryShow() {
    $("#checkbloodhistorymodal").modal('show');
    loadTableCheckBloodHistory();
}

function checkBloodModalHistoryClose() {
    $("#checkbloodhistorymodal").modal('hide');
}

function checkBloodABOModalHistoryShow() {
    $("#checkblooABOdhistorymodal").modal('show');
}

function checkBloodABOModalHistoryClose() {
    $("#checkblooABOdhistorymodal").modal('hide');
}


function closePageADR() {
    $("#customModalADR").modal("hide");
}

function closeReplacement() {
    $("#customModalReplacement").modal("hide");
}

function showPageADR(page) {
    if (page == '3,4') {
        document.getElementById('customModalADRLabel').innerHTML = "Autologous&Direct";
    } else if (page == 5) {
        document.getElementById('customModalADRLabel').innerHTML = "Direct Ag";
    } else {
        document.getElementById('customModalADRLabel').innerHTML = "Replacement";
    }
    findBloodPatient(page, true);
    $("#customModalADR").modal("show");

}

function showReplacement() {
    checkFindBloodPatientReplacement()
    $("#customModalReplacement").modal("show");
}

function substring_1(val) {
    var val2 = val.substring(0, 1);

    if (val2 == ',') {
        return val.substring(1);
    } else {
        return val;
    }
}

var dataselect;

function selectTableCheckBlood(btn) {
    setEnableDisable(false);
    checkBloodModalClose();
    var row = btn.parentNode.parentNode;
    var data = JSON.parse(row.cells[0].innerHTML);
    dataselect = data;
    msgCheckSpecial(data)

    setTableCheckBlood(data);
    setTimeNow();

    console.log($('#defaultOpen'));

    var defaultOpen = $('#defaultOpen');
    var evt = {
        currentTarget: defaultOpen[0]
    }
    openTab(evt, 1);

}

function findRhNegative(data) {
    console.log(data);
    if (data.patientrh == "Rh-") {

        swal({
            title: "ผู้ป่วยมีหมู่เลือด Rh Negative",
            html: true,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }, function(inputValue) {
            if (data.group_antibody.replace(/,/g, "") != "") {
                errorSwalAnti("ผู้ป่วยมีประวัติ Antibody ", substring_1(data.group_antibody), data);
                // alert(data.group_antibody.replace(/,/g, ""));
                setTimeout(function() {
                    swal({
                        title: "ผู้ป่วยมีประวัติ Antibody ",
                        html: true,
                        text: substring_1(data.group_antibody),
                        type: 'warning',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    });
                }, 1000);

            } else {
                checkFindBloodPatient(5);
            }
        });
    } else {
        findCheckAntibody(data)
    }
}

function findCheckAntibody(data) {
    if (data.group_antibody.replace(/,/g, "") != "") {
        errorSwalAnti("ผู้ป่วยมีประวัติ Antibody ", substring_1(data.group_antibody), data);
    } else {
        checkFindBloodPatient(5);
    }
}


function chActive(id, self, status) {

    for (i = 0; i < count; i++) {
        if (status == 1) {
            if (document.getElementById("trblood" + i))
                document.getElementById("trblood" + i).style.background = "#E0E0E0";
        } else {
            if (document.getElementById("trblood" + i))
                document.getElementById("trblood" + i).style.background = "#FFF";
        }

    }
    document.getElementById("trblood" + id).style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);


    var body = document.getElementById("list_table_blood_req").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.each(item.item, function(index, value) {
        addRowItemReq(value);
    });

    var body = document.getElementById("list_table_blood_req_crossmatch").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.each(item.crossitem, function(index, value) {
        addRowItemReqCrossmatch(value);
    });
}

function chActiveAddRowReqBlood(id, self, bloodstocktypeid, qty = 0, vgroupid = "") {

    for (i = 0; i < countreq; i++) {

        document.getElementById("trbloodreqblood" + i).style.background = "#FFF";

    }
    document.getElementById("trbloodreqblood" + id).style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);
    bloodstocktypecode = bloodstocktypeid;
    bloodstocktypeqty = qty;

    bloodstocktypegroupid = vgroupid;
}


function addRowItemReq(im = [], index = 0) {

    var event_data = '';

    event_data += '<tr>';

    event_data += '<td>' + im.bloodstocktypeid + '</td>';
    event_data += '<td>' + im.requestblooditemqty + '</td>';
    event_data += '<td></td>';
    event_data += '</tr>';


    $("#list_table_blood_req").append(event_data);
}

function addRowItemReqCrossmatch(im = [], index = 0) {
    var event_data = '';

    event_data += '<tr>';

    event_data += '<td>' + im.bag_number + '</td>';
    event_data += '<td>' + im.bloodtype + '</td>';
    event_data += '<td>' + im.bloodgroup + '</td>';
    event_data += '<td>' + im.crossmacthstatusname + '</td>';
    event_data += '</tr>';


    $("#list_table_blood_req_crossmatch").append(event_data);

}



function setTableCheckBlood(data) {

    datablood = data;
    bloodexp = data.usedblooddateto;
    bloodstart = data.usedblooddatefrom;
    document.getElementById('requestbloodid').value = data.requestbloodid;
    document.getElementById('requestbloodcode').value = data.requestbloodcode;
    document.getElementById('requestqueueblooddate').value = getDMY(data.requestqueueblooddate);

    var datedefa = new Date(getYMD_Diff543(data.requestqueueblooddate) + ' ' + data.requestqueuebloodtime);

    var time = data.requestqueuebloodtime.replace(":", ".");


    var fullday = datedefa.getDay();

    if (fullday == 0 || fullday == 6) {
        document.getElementById('inouttime2').checked = true;
    } else {
        if (time > 16 || time < 8) {
            document.getElementById('inouttime2').checked = true;

        } else {
            document.getElementById('inouttime1').checked = true;

        }
    }


    document.getElementById('requestqueuebloodtime').value = data.requestqueuebloodtime;

    document.getElementById('requestbloodstatusid').value = data.requestbloodstatusid;



    if (data.inouttime == 1 && data.inouttime == 2) {
        setTimeNow(true);
    }


    // document.getElementById("confirmbloodgroup").required = (data.bloodsampletube == 1);
    // document.getElementById("confirmrhid").required = (data.bloodsampletube == 1);
    // document.getElementById("confirmsceen").required = (data.bloodsampletube == 1);


    setABOCellGroupSerum("#anti-a1", data.antia1);
    setABOCellGroupSerum("#anti-h", data.antih);
    setABOCellGroupSerum("#a2cells", data.a2cells);

    // setBloodGroup("#bloodgroup",data.bloodgroup);


    setABOCellGroupSerum("#dat_poly", data.dat_poly);
    setABOCellGroupSerum("#dat_igg", data.dat_igg);
    setABOCellGroupSerum("#dat_c3d", data.dat_c3d);
    setABOCellGroupSerum("#dat_ccc", data.dat_ccc);


    setBloodGroup("#confirmbloodgroup", data.confirmbloodgroup);

    document.getElementById('confirmbloodgroup').value = datablood.confirmbloodgroup;
    $("#confirmbloodgroupshow").val(data.confirmbloodgroup);

    // setRh4("#confirmrhid", data.confirmrhid);
    $("#confirmrhidshow").val(getRhName(data.confirmrhid));
    setRh2("#confirmrhid", data.confirmrhid);
    // if (data.confirmrhid == 'Rh-') {

    //     swal({
    //         title: "ผู้ป่วยมีหมู่เลือด Rh Negative",
    //         html: true,
    //         // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
    //         type: 'warning',
    //         confirmButtonText: 'OK',
    //         allowOutsideClick: false
    //     }, function(inputValue) {
    //         findCheckAntibody(data);
    //     });
    // }

    setRh3("#confirmsceen", data.confirmsceen);
    $("#confirmabsreenshow").val(getRhName(data.confirmsceen));

    document.getElementById('ischeckbloodremark').checked = (data.ischeckbloodremark == 1);
    document.getElementById('autocontrol').checked = (data.autocontrol == 1);

    document.getElementById('checkbloodremark').value = data.checkbloodremark;

    document.getElementById('patientantibody').value = data.antibody;
    document.getElementById('antibody').value = data.antibody;
    document.getElementById('antibodyLable').innerHTML = data.antibody;
    document.getElementById('antibodyshow').innerHTML = data.antibody;

    document.getElementById('patientphenotype').value = data.phenotype;
    document.getElementById('phenotype').value = data.phenotype;
    document.getElementById('phenotypedisplay').value = data.phenotypedisplay;
    document.getElementById('phenotypeLable').innerHTML = data.phenotypedisplay;


    // เพิ่มบุตร
    document.getElementById('forchildren').value = data.forchildren;

    document.getElementById('bloodsampletube').value = data.bloodsampletube;


    document.getElementById('isconfirmbloodgroupqueue').value = data.isconfirmbloodgroupqueue;
    document.getElementById('isreadybloodstatus').value = data.isreadybloodstatus;

    if (data.crossmatchuserid == '') {
        setDataModalSelectValue('crossmatchuserid', session_staffid, session_fullname);
    } else {
        setDataModalSelectValue('crossmatchuserid', data.crossmatchuserid, data.crossmatchuser);
    }

    console.log("========iscrossmatch===========");
    console.log(data.iscrossmatch);
    console.log(data.crossmatchuserid);
    console.log(data.crossmatchuser);
    // setDataModalSelectValue('crossmatchuserid', data.crossmatchuserid, data.crossmatchuser);



    document.getElementById('crossmatchuser').value = data.crossmatchuser;
    document.getElementById('crossmatchdate').value = getDMY(data.crossmatchdate);
    document.getElementById('crossmatchtime').value = data.crossmatchtime;

    document.getElementById('crossmatchuser_show').value = data.crossmatchuser;
    document.getElementById('crossmatchdate_show').value = getDMY(data.crossmatchdate);
    document.getElementById('crossmatchtime_show').value = data.crossmatchtime;

    document.getElementById('checkpatientuser').value = data.checkpatientuser;
    document.getElementById('checkpatientdate').value = getDMY(data.checkpatientdate);
    document.getElementById('checkpatienttime').value = data.checkpatienttime;


    document.getElementById('checkbloodremark2').value = data.checkbloodremark2;
    // document.getElementById('checkpatientdate_show').value = ((data.checkpatientdate == "" || data.checkpatientdate == "0000-00-00") ? "" : getDMY(data.checkpatientdate));
    // document.getElementById('checkpatienttime_show').value = data.checkpatienttime;

    // alert(data.userconfirmbloodgroupqueue);
    // document.getElementById('checkpatientuser_show').value = data.checkpatientuser;

    document.getElementById('userconfirmbloodgroupqueue').value = data.checkpatientuserconfirmbloodgroupqueue;
    document.getElementById('confirmbloodgroupqueuedate').value = getDMY(data.confirmbloodgroupqueuedate);
    document.getElementById('confirmbloodgroupqueuetime').value = data.confirmbloodgroupqueuetime;


    // var select = $('#checkpatientuser');
    // var option = new Option(data.checkpatientusername, data.checkpatientuser, true, true);

    // select.append(option).trigger('change');

    // Start Table ABO
    abocount = 1;
    var aboArr = data.aboarr;

    var body = document.getElementById("list_table_abo").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    if (aboArr.length > 0) {
        $.each(aboArr, function(index, value) {
            addABOTest(value);
        });
    } else {
        addABOTest();
    }
    loadTableCheckBloodHistory();
    // End Table ABO

    // Start Table Rh
    abo = 1;
    var rhArr = data.rharr;

    var body = document.getElementById("list_table_rh").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    rhcount = 0;
    if (rhArr.length > 0) {
        $.each(rhArr, function(index, value) {
            addRhTest(value);
        });
    } else {
        addRhTest();
    }

    // End Table Rh


    // Start Table Anti Sceen
    anticount = 1;
    var antisceenArr = datablood.antisceen;

    var body = document.getElementById("list_table_anti_sceen").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    if (antisceenArr.length > 0) {
        $.each(antisceenArr, function(index, value) {
            addAntiSceeningTest(value);
        });
    } else {
        var antisceenArrNew = [{
                requestbloodantisceentest: '13',
                requestbloodantisceenid: '',
                requestbloodantisceeno: '',
                requestbloodantisceeno1: '',
                requestbloodantisceeno2: '',
                requestbloodantisceenlotno: ''
            },
            {
                requestbloodantisceentest: '6',
                requestbloodantisceenid: '',
                requestbloodantisceeno: '',
                requestbloodantisceeno1: '',
                requestbloodantisceeno2: '',
                requestbloodantisceenlotno: ''
            }
        ];
        $.each(antisceenArrNew, function(index, value) {
            addAntiSceeningTest(value);
        });
    }

    // End Table Anti Sceen


    // Start Table Anti Iden
    idencount = 1;
    var antiIdenArr = datablood.antiiden;

    var body = document.getElementById("list_table_anti_iden").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.each(antiIdenArr, function(index, value) {
        addAntiIdenTest(value);
    });
    // End Table Anti Iden

    var item = datablood.item;

    var body = document.getElementById("list_table_tab2_1").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    countreq = item.length;
    bloodstocktypecode = "";
    $.each(item, function(index, value) {
        addRowCrossMacth(value, index);
    });

    if (item.length > 0) {
        var trbloodreqblood0 = document.getElementById("trbloodreqblood0");
        chActiveAddRowReqBlood(0, trbloodreqblood0, item[0].bloodstocktypeid, item[0].requestblooditemqty, item[0].bloodstocktypegroupid)
        console.log("---------");
        console.log(item);
    }


    var crossitem = datablood.crossitem;

    var body = document.getElementById("list_table_tab2_2").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.each(crossitem, function(index, value) {
        addRowBlood(value, index);
    });

    loadTableCheckBloodABOHistory();

    setReadOnlyTable(document.getElementById("list_table_tab2_2"));

    var crossmatchitemoldStr = findCrossMatchItem(document.getElementById("list_table_tab2_2"));
    var crossmatchitemold = JSON.stringify(crossmatchitemoldStr)
    console.log("======crossmatchitemold======");
    console.log(crossmatchitemold);



    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/checkbloodpatient/checkbloodpatient-confirm-cryo-qty.php?id=' + data.requestbloodid,
        success: function(data) {
            sum_requestbloodcrossmacthconfirmqty = parseInt(data.data[0].sum_requestbloodcrossmacthconfirmqty);

        },
        error: function(data) {

            console.log('An error occurred.');
            console.log(data);

        },
    });


}

function msgCheckSpecial(item) {
    console.log(item.plasmaexchange);
    if (item.plasmaexchange == "1" ||
        item.screenforplateletantibody == "1" ||
        item.hlacrossmatchsingledonorplatelet == "1" ||
        item.washedredbloodcell == "1" ||
        item.light == "1"
    ) {

        var textMsg = "";
        if (item.plasmaexchange == "1") {
            textMsg += "(\u2713) Plasma Exchange\n";
        }

        if (item.screenforplateletantibody == "1") {
            textMsg += "(\u2713) Screen for platelet antibody\n";
        }

        if (item.hlacrossmatchsingledonorplatelet == "1") {
            textMsg += "(\u2713) HLA Crossmatch Single donor platelet\n";
        }

        if (item.washedredbloodcell == "1") {
            textMsg += "(\u2713) Washed Red Blood Cell\n";
        }

        if (item.light == "1") {
            textMsg += "(\u2713) ฉายแสง\n";
        }

        console.log("++++++++++++++");
        setTimeout(function() {
            mgsError("มีคำสั่งพิเศษ!", textMsg, getCheckSpecialCallback);
            console.log("***********");
        }, 1000);


    } else {
        findRhNegative(item);
    }
}


function checkFindBloodPatient(page = 3) {
    var patient = document.getElementById('hn').value;
    if (patient.length > 0) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/blood/bloodfind-replacement-autologous-direct.php?hn=' + patient + "&donation_get_type_id=" + page,
            success: function(data) {

                if (data.data.length > 0) {
                    setTimeout(function() {
                        if (data.data[0].donation_get_type_id == 2) {
                            mgsError("ผู้ป่วยมีเลือดที่เป็น Replacement", "จำนวน " + data.data.length + " Unit", getBloodPatientCallback(2));
                        } else if (data.data[0].donation_get_type_id == 5) {
                            mgsError("ผู้ป่วยมีเลือดที่เป็น Direct Ag", "จำนวน " + data.data.length + " Unit", getBloodPatientCallback(5));
                        } else {
                            mgsError("ผู้ป่วยมีเลือดที่เป็น Autologous/Direct", "จำนวน " + data.data.length + " Unit", getBloodPatientCallback('3,4'));
                        }

                        console.log("Autologous/Direct");
                        //your code to be executed after 1 second
                    }, 1500);

                } else {
                    if (page == 5) {
                        checkFindBloodPatient('3,4');
                    } else if (page == '3,4') {
                        checkFindBloodPatient(2);
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


function checkFindBloodPatientReplacement() {
    var body = document.getElementById("list_table_replacement_json").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }
    var patient = document.getElementById('hn').value;
    if (patient.length > 0) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/blood/bloodfind-replacement.php?hn=' + patient,
            success: function(data) {

                var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

                var event_data = '';
                var amount = 0;
                $.each(obj, function(index, value) {

                    amount += parseInt(value.blood_qty);
                    event_data += '<tr  >';
                    event_data += '<td style="display:none;"  >';
                    event_data += JSON.stringify(value);
                    event_data += '</td>';
                    event_data += '<td><b>' + value.bloodgroupname + '</b></td>';
                    event_data += '<td><b>' + numberWithCommas(value.blood_qty) + '</b></td>';
                    event_data += '</tr>';

                });

                event_data += '<tr  >';
                event_data += '<td style="display:none;"  >';
                event_data += '</td>';
                event_data += '<td><b>รวม</b></td>';
                event_data += '<td><b>' + numberWithCommas(amount) + '</b></td>';
                event_data += '</tr>';



                $("#list_table_replacement_json").append(event_data);

            },
            error: function(data) {

                console.log('An error occurred.');
                console.log(data);

            },
        });
    }

}

function getCheckSpecialCallback(inputValue) {
    if (inputValue) {
        // findBloodPatient('3,4');
        // findBloodPatient(2);
        setTimeout(function() {
            findRhNegative(dataselect);
        }, 1000);
    }
}

function getBloodPatientCallback(inputValue, page) {
    if (page == 5) {
        checkFindBloodPatient('3,4');
    } else if (page == '3,4') {
        checkFindBloodPatient(2);
    }
}

function setNo(table) {

    var rows = document.getElementById(table).rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[0].innerHTML = (i - 1);
    }
}

function setNo1_2(table) {

    var rows = document.getElementById(table).rows;
    for (var i = 2; i < rows.length; i++) {
        rows[i].cells[1].innerHTML = (i - 1);
    }
}

function getNumberTable1_2(table) {
    var arrRow = [];
    var rows = document.getElementById(table).rows;
    for (var i = 2; i < rows.length; i++) {
        arrRow.push([rows[i].cells[1].innerHTML, rows[i].cells[7].innerHTML, rows[i].cells[2].innerHTML]);
    }
    return arrRow;
}

function errorSwal($msg = "") {
    swal({
        title: $msg,
        // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
        type: 'warning',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    });


}

function errorSwalRh($msg = "") {

    swal({
            title: $msg,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
        },
        function(inputValue1) {
            findCheckAntibody(datablood);

        });


}

function errorSwalAnti($title = "", $msg = "", data) {


    swal({
            title: $title,
            text: $msg,
            html: true,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
        },
        function(inputValue) {
            checkFindBloodPatient(5);

        });


}


function setEnableDisable(status = false) {
    // document.getElementById('btnAddABOTest').disabled = status;
    document.getElementById('confirmbloodgroup').disabled = status;

    document.getElementById('anti-a1').disabled = status;
    document.getElementById('anti-h').disabled = status;
    document.getElementById('a2cells').disabled = status;

    document.getElementById('btnAddRhTest').disabled = status;
    document.getElementById('confirmrhid').disabled = status;

    document.getElementById('btnAddAntiSceeningTest').disabled = status;
    document.getElementById('confirmsceen').disabled = status;

    document.getElementById('dat_poly').disabled = status;
    document.getElementById('dat_igg').disabled = status;
    document.getElementById('dat_c3d').disabled = status;
    document.getElementById('dat_ccc').disabled = status;

    document.getElementById('btnAddAntiIdenTest').disabled = status;
    document.getElementById('crossmatchuserid').disabled = status;
    document.getElementById('checkbloodremark').disabled = status;

    document.getElementById('bag_number').disabled = status;


}

function bagNumberScan(elm = "") {
    var bag_number = $('#' + elm).val();
    var bag_number_new = numnerPoint(bag_number);
    $('#' + elm).val(bag_number_new);

}

function findTable34HN(number) {
    var bloodstocktype = $("#findbloodstocktype34").val();
    var rows = document.getElementById("list_table_json").rows;
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);

        if (item.bag_number == number && item.bloodtype == bloodstocktype) {

            adrData[i - 1].ischecked = true;
            row.cells[1].children[0].checked = true;
            row.style.background = "#FF66B2";


        }

    }

    $("#findbagnumber34").val("");
    document.getElementById('findbagnumber34').focus();

}


// Printter

function showPrinterSettingModal() {

    var body = document.getElementById("list_table_printer_setting_activity").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $("#customPrinterSettingModal").modal("show");

    var printers = getPrintterSetting();

    $.each(printers, function(index, value) {
        addPrinterSetting(value[0].clientname, value[0].printername);
    });


}

function setPrintName() {
    console.log("=======");
    document.getElementById("printernames").innerHTML = "";
    var printers = getPrintterSetting();

    var select = document.getElementById("printernames");
    if (printers)
        printers.forEach((entry) => {
            var option = document.createElement("option");
            option.text = entry[0].printername + " [" + entry[0].clientname + "]";
            option.value = entry[0].printername + "|" + entry[0].clientname;

            select.appendChild(option);

            if (getDefaultPrinter() == option.value) {
                select.value = getDefaultPrinter();
                console.log(getDefaultPrinter());
            }

        });

}
setPrintName();


function setPrintRadio() {
    var printers = getDefaultRadioPrinter();

    if (printers == 'printer_p') {
        document.getElementById("printer_p").checked = true;
    } else {
        document.getElementById("printer_a").checked = true;
    }

}
setPrintRadio();


function getPrintterSetting() {
    return JSON.parse(localStorage.getItem("printers"));
}

function setDefaultPrinter(defaulprinter_sticker_crossmacth) {
    localStorage.setItem("defaulprinter_sticker_crossmacth", defaulprinter_sticker_crossmacth);
}

function getDefaultPrinter() {
    return localStorage.getItem("defaulprinter_sticker_crossmacth");
}

function setDefaultRadioPrinter(defaulradioprinter_sticker_crossmacth) {
    localStorage.setItem("defaulradioprinter_sticker_crossmacth", defaulradioprinter_sticker_crossmacth);
}

function getDefaultRadioPrinter() {
    return localStorage.getItem("defaulradioprinter_sticker_crossmacth");
}


function showPrint() {
    $("#stickerModal").modal("show");

}

function closePrint() {
    $("#stickerModal").modal("hide");

}