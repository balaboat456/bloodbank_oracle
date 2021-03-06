var bloodStockTypeArr = [];
var bloodReturnStatusArr = [];
var labInvestigation = [];
var dataPreparation = [];
var dataBloodGroupArr = [];
var dataRhArr = [];
var dataBloodGroupSerumArr = [];
var dataBloodGroupSerumCrossMacthArr = [];
var dataBloodBagArr = [];
var dataCrossMacthResultArr = [];
var dataRhDArr = [];
var dtataArray = [];
$(document).ready(function() {

    getBloodStockType().then(function success(data) {
        bloodStockTypeArr = data.data;
    });

    getRequestBloodReturnStatus().then(function success(data) {
        bloodReturnStatusArr = data.data;
    });

    getLabInvestigation().then(function success(data) {
        labInvestigation = data.data;
    });

    getPreparation().then(function success(data) {
        dataPreparation = data.data;
    });

    getBloodGroup().then(function success(data) {
        dataBloodGroupArr = data.data;
    });

    getRh().then(function success(data) {
        dataRhArr = data.data;
    });

    getRhD().then(function success(data) {
        dataRhDArr = data.data;
    });

    getBloodGroupSerum().then(function success(data) {
        dataBloodGroupSerumArr = data.data;
    });

    getBloodGroupSerumCrossMacth().then(function success(data) {
        dataBloodGroupSerumCrossMacthArr = data.data;
    });

    getBloodBag().then(function success(data) {
        dataBloodBagArr = data.data;
    });

    getCrossMacthResult().then(function success(data) {
        dataCrossMacthResultArr = data.data;
    });

    dateBE('.date');

    $("#patientid").on('keydown', function(e) {
        if (e.which == 13) {
            scanBarcode();
        }
    });

    $("#findbagnumber_o1").on('keydown', function(e) {
        if (e.which == 13) {
            var number = $("#findbagnumber_o1").val();
            findTableO1HN(number)

            $("#findbagnumber_o1").val("");
        }
    });

    $("#findbagnumber2").on('keydown', function(e) {
        if (e.which == 13) {
            var number = $("#findbagnumber2").val();
            findTable2HN(number)

            $("#findbagnumber2").val("");
        }
    });

    $("#findbagnumber3").on('keydown', function(e) {
        if (e.which == 13) {
            var number = $("#findbagnumber3").val();
            findTable3HN(number)

            $("#findbagnumber3").val("");
        }
    });

    $('.findbloodstocktype2').select2({
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
        setTimeout(function() { document.getElementById("findbagnumber2").focus(); }, 200);

    });

    $('.findbloodstocktype3').select2({
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
        setTimeout(function() { document.getElementById("findbagnumber3").focus(); }, 200);

    });

});

function scanBarcode() {
    var patient = document.getElementById('patientid').value;

    document.getElementById('requestbloodgroupname').value = "";
    document.getElementById('requestrhname').value = "";
    document.getElementById('requestdat').value = "";
    document.getElementById('requestantibodyscreening').value = "";
    document.getElementById('requestantibody').innerHTML = "";
    if (patient.length > 0) {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn=' + patient,
            timeout: 1000 * 60,
            success: function(data) {

                if (data.status) {
                    loadPatient(patient);
                } else {

                    spinnerhide();

                    console.log(data);

                    if (data.data) {
                        if (data.data.MessageCode == "400") {
                            swal({
                                    title: "?????????????????????????????????",
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
                        } else {
                            checkLoadPatient(patient);
                        }
                    } else {
                        checkLoadPatient(patient);
                    }


                }


            },
            error: function(data) {

                spinnerhide();
                console.log("??????????????????????????????????????? RHIS ???????????????????????????");

                console.log('An error occurred.');
                console.log(data);

                checkLoadPatient(patient);

            },
        });
    } else {
        clearPatient();
        setEnableDisable(true);
    }

}

function checkLoadPatient(patient) {
    swal({
            title: "??????????????????????????????????????? RHIS ???????????????????????????",
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

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/patient/patient.php?hn=' + patient,
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function(data) {
                        if (data.data.length > 0) {

                            swal({
                                    title: "?????????????????????????????????????????????????????????????????????????????? RJ log ?????????????????????????????????",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: true,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "????????????",
                                    closeOnConfirm: true
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        loadPatient(patient);
                                    }
                                });


                        } else {
                            document.getElementById('patientid').value = '';
                        }

                    },
                    error: function(data) {
                        clearPatient();
                        console.log('An error occurred.');
                        console.log(data);
                        document.getElementById('patientid').value = '';
                    },
                });


                document.getElementById('patientid').focus;
            }
        });
}

function loadPatient(patient) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/patient/patient.php?hn=' + patient,
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {
            /// ????????????????????????
            if (data.data.length > 0) {
                var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                setPatient(obj);

                console.log(obj.ispassedaway);

                if (obj.ispassedaway == 1) {
                    setEnableDisable(true);
                } else {
                    setEnableDisable(false);
                }
            } else {
                setEnableDisable(true);
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
}

function setPatient(data) {
    data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
    dtataArray = data;
    loadTableBloodPayStock();
    document.getElementById('hn').value = data.patienthn;
    document.getElementById('an').value = data.patientan;
    document.getElementById('fn').value = data.patientfn;
    document.getElementById('vn').value = data.patientvn;
    document.getElementById('prvno').value = data.patientprvno;
    document.getElementById('insuranceid').value = data.patientinsuranceid;
    document.getElementById('insurancetext').value = data.patientinsurance;

    console.log(dtataArray);

    document.getElementById('patienthn').innerHTML = data.patienthn;
    document.getElementById('patientan').innerHTML = data.patientan;
    document.getElementById('patientidcard').innerHTML = data.patientidcard;
    document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;
    document.getElementById('patientfullname').innerHTML = data.patientfullname;
    document.getElementById('patientage').innerHTML = data.patientage;
    document.getElementById('patientgender').innerHTML = data.patientgender;
    document.getElementById('patientinsurance').innerHTML = data.patientinsurance;
    document.getElementById('patient_type').innerHTML = data.patient_type;

    if (data.ispassedaway == 1){
        document.getElementById('patientdead').innerHTML = "?????????????????????????????????????????? " + getDMY2(data.ispassedaway_date);
    }
    else{
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

        var status = true;
        setEnableDisable(status);
        swal({
                title: "????????????????????????????????????????????????????????????",
                text: "????????????????????????????????????????????????????????????",
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
                requestBloodModalShow();
            });
    } else {
        requestBloodModalShow();
    }


    document.getElementById("btnAddModal").style.visibility = (data.ispassedaway == 1) ? "hidden" : "visible";


    clearFormTab1();
    if (document.getElementById('requestunit').value == 'null') {
        setDataModalSelectValue('requestunit', data.wardid, data.wardname);
    }

    if (document.getElementById('doctorid').value == 'null') {
        setDataModalSelectValue('doctorid', data.patientdoctorid, data.patientdoctorname);
    }

    requestBloodRhLast();
}

function clearPatient() {
    dtataArray = [];
    document.getElementById('hn').value = '';
    document.getElementById('patienthn').innerHTML = '-';
    document.getElementById('patientan').innerHTML = '-';
    document.getElementById('patientidcard').innerHTML = '-';
    document.getElementById('patientbloodgroup').innerHTML = '-';
    document.getElementById('patientfullname').innerHTML = '-';
    document.getElementById('patientage').innerHTML = '-';
    document.getElementById('patientgender').innerHTML = '-';
    document.getElementById('patientinsurance').innerHTML = '-';
    document.getElementById('patient_type').innerHTML = '-';

    document.getElementById('img_profile').src = "assets/images/profile.png";
    clearFormTab1();
}



function getDate8(elename) {
    date8('#' + elename);
}

function getDurgicaldateDate8(elename) {
    date8('#' + elename);
    var durgicalData = new Date(dmyToymd($("#" + elename).val()));
    var dateFrom = new Date(dmyToymd($("#usedblooddatefrom").val()));
    var dateTo = new Date(dmyToymd($("#usedblooddateto").val()));

    if (parseInt(moment(dateFrom).format('YYYYMMDD')) > parseInt(moment(durgicalData).format('YYYYMMDD')) ||
        parseInt(moment(dateTo).format('YYYYMMDD')) < parseInt(moment(durgicalData).format('YYYYMMDD'))
    ) {
        mgsError("???????????????????????????!", "??????????????????????????????????????????????????? ????????????????????????????????????????????????????????????????????????????????????", getUsedbloodgetDurgicaldateDateCallback);
    }

}

function getDurgicaldateDatePlatelets(elename) {
    date8('#' + elename);
    var durgicalData = new Date(dmyToymd($("#" + elename).val()));
    var dateFrom = new Date(dmyToymd($("#usedblooddatefrom").val()));
    var dateTo = new Date(dmyToymd($("#usedblooddateto").val()));

    if (parseInt(moment(dateFrom).format('YYYYMMDD')) > parseInt(moment(durgicalData).format('YYYYMMDD')) ||
        parseInt(moment(dateTo).format('YYYYMMDD')) < parseInt(moment(durgicalData).format('YYYYMMDD'))
    ) {
        const callback = function(inputValue) {
            if (inputValue) {
                document.getElementById(elename + "").value = "";
                document.getElementById(elename + "").focus();
            }
        }

        mgsError("???????????????????????????!", "????????????????????????????????????????????????????????????????????????	????????????????????????????????????????????????????????????????????????????????????", callback);
    }

}

function getDurgicaldateDateCallback(inputValue) {
    if (inputValue) {
        document.getElementById("durgicaldate").value = "";
        document.getElementById("durgicaldate").focus();
    }
}

function getUsedblooddateFromToDate8(elename) {
    date8('#' + elename);
    getUsedblooddateFromTo();
}

function getUsedblooddateFromTo() {

    var dateFrom = new Date(dmyToymd($("#usedblooddatefrom").val()));
    var dateTo = new Date(dmyToymd($("#usedblooddateto").val()));
    var today = new Date();
    var diffData = parseInt((dateTo - dateFrom) / (1000 * 60 * 60 * 24), 10);
    var diffData14 = parseInt((dateFrom - today) / (1000 * 60 * 60 * 24), 10);
    console.log(diffData14);
    if (diffData > 3) {
        mgsError("???????????????????????????!", "???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? 3 ?????????", getUsedbloodDateFromToCallback);
    } else if (diffData14 > 11) {
        mgsError("???????????????????????????!", "???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? 11 ?????????", getUsedbloodDateFromTo1Callback);
    } else if (parseInt(moment(today).format('YYYYMMDD')) > parseInt(moment(dateFrom).format('YYYYMMDD')) && dateFrom) {
        mgsError("???????????????????????????!", "????????????????????????????????????????????????????????????", getUsedbloodDateFromTo1Callback);
    } else if (parseInt(moment(today).format('YYYYMMDD')) > parseInt(moment(dateTo).format('YYYYMMDD')) && dateTo) {
        mgsError("???????????????????????????!", "????????????????????????????????????????????????????????????", getUsedbloodDateFromTo2Callback);
    } else if (parseInt(moment(dateFrom).format('YYYYMMDD')) > parseInt(moment(dateTo).format('YYYYMMDD')) && dateTo) {
        mgsError("???????????????????????????!", "????????????????????????????????????????????????????????????", getUsedbloodDateFromTo2Callback);
    }

    $("#durgicaldate").val("");


}

function getUsedbloodDateFromToCallback(inputValue) {
    if (inputValue) {
        document.getElementById("usedblooddateto").value = "";
        document.getElementById("usedblooddateto").focus();
    }
}

function getUsedbloodDateFromTo1Callback(inputValue) {
    if (inputValue) {
        document.getElementById("usedblooddatefrom").value = "";
        document.getElementById("usedblooddatefrom").focus();
    }
}

function getUsedbloodDateFromTo2Callback(inputValue) {

    if (inputValue) {
        document.getElementById("usedblooddateto").value = "";
        document.getElementById("usedblooddateto").focus();
    }
}

function getUsedbloodgetDurgicaldateDateCallback(inputValue) {
    if (inputValue) {
        document.getElementById("durgicaldate").value = "";
        document.getElementById("durgicaldate").focus();
    }
}

function deleteRow(btn, table) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    setNo(table);
}

function deleteRowReq(btn, table) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    setNoReq('list_table_tab1');
}


function setNo(table) {

    var rows = document.getElementById(table).rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[0].innerHTML = i;
    }
}

function setNoReq(table) {

    var rows = document.getElementById(table).rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[1].innerHTML = i;
    }
}

function setBloodStockType(eid = "", val = "") {
    if (eid) {
        removeOption(eid);
        $(eid)
            .append($("<option></option>")
                .attr("value", 0)
                .text(""));

        $.each(bloodStockTypeArr, function(key, value) {
            $(eid)
                .append($("<option></option>")
                    .attr("value", value.bloodgroupid)
                    .text(value.bloodgroupname));
        });
        $(eid).val(val);

    }
}

function getBloodStockType() {
    return $.ajax({
        url: 'data/masterdata/bloodstocktype.php',
        dataType: 'json',
        type: 'get',
    });
}

function getRequestBloodReturnStatus() {
    return $.ajax({
        url: 'data/masterdata/requestbloodreturnstatus.php',
        dataType: 'json',
        type: 'get',
    });
}

function getLabInvestigation() {
    return $.ajax({
        url: 'data/masterdata/labinvestigation.php',
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


function getBloodGroup() {
    return $.ajax({
        url: 'data/masterdata/bloodgroup.php',
        dataType: 'json',
        type: 'get',
    });
}

function getRh() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php',
        dataType: 'json',
        type: 'get',
    });
}

function getRhD() {
    return $.ajax({
        url: 'data/masterdata/rh-d.php',
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

function getBloodGroupSerumCrossMacth() {
    return $.ajax({
        url: 'data/masterdata/bloodgroupserumcrossmacth.php',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodBag() {
    return $.ajax({
        url: 'data/masterdata/bloodbag.php',
        dataType: 'json',
        type: 'get',
    });
}

function getCrossMacthResult() {
    return $.ajax({
        url: 'data/masterdata/crossmacthresult.php',
        dataType: 'json',
        type: 'get',
    });
}



function removeRowTable(table = '') {
    var body = document.getElementById(table).getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }
}

function bagNumberScan(elm = "") {
    var bag_number = $('#' + elm).val();
    var bag_number_new = numnerPoint(bag_number);
    $('#' + elm).val(bag_number_new);

}