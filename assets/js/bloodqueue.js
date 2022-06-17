var tabactive = "1_1";
var v_wardname = "";
$(document).ready(function() {


    $('#requestunit').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/unitoffice.php',
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
                            id: item.unitofficeid,
                            text: item.unitofficename,
                        }
                    })
                };
            },

        }
    });

    $('#no_wardid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/unitoffice.php',
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
                            id: item.unitofficeid,
                            text: item.unitofficename + '|' + item.unitofficecode,
                            item: item
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
                '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                ' <span >' + strState[0] + '</span>'
            );
            return $state;
        },
    }).on("select2:selecting", function(e) {
        v_wardname = e.params.args.data.item.unitofficename;
    });

    $('.findbloodstocktype').select2({
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
    }).on("select2:close", function() {
        setTimeout(function() { document.getElementById("findbagnumber").focus(); }, 500);
    });

    $('#isbloodblank').select2({
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
    });

    console.log("=========");
    console.log(session_staffid);
    console.log(session_fullname);
    setDataModalSelectValue('isbloodblank', session_staffid, session_fullname);


    $('.payuser').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
    });

    $('#searchhn').keypress(function(e) {
        if (e.keyCode == 13) {
            loadTableAll();
        }
    });

    $("#finfhn").keyup(function(event) {

        if (event.keyCode === 13) {

            var hn = $("#finfhn").val();
            hn = hn.trim();
            if (hn.length == 0) {
                return false;
            }

            if (tabactive == "1_1") {
                if (!findTableHN1_1(hn))
                    errorSwal2("ไม่พบ HN นี้", "finfhn");

            } else if (tabactive == "1_4") {
                if (!findTableHN1_4(hn))
                    errorSwal2("ไม่พบ HN นี้", "finfhn");
            } else if (tabactive == "2_1") {
                if (!findTableHN2_1(hn))
                    errorSwal2("ไม่พบ HN นี้", "finfhn");
            } else if (tabactive == "2_3") {
                if (!findTableHN2_3(hn))
                    errorSwal2("ไม่พบ HN นี้", "finfhn");
            }

            if (tabactive != "2_2") {
                document.getElementById("finfhn").value = "";
                document.getElementById("finfhn").focus();
            }

            if (tabactive == "2_2") {
                document.getElementById("findhn2").value = "";
                document.getElementById("findhn2").focus();
            }

        }
    });


    $("#findhn2").keyup(function(event) {

        if (event.keyCode === 13) {

            var hn1 = $("#finfhn").val();
            var hn2 = $("#findhn2").val();
            hn1 = hn1.trim();
            hn2 = hn2.trim();
            if (hn2.length == 0) {
                return false;
            }

            if (tabactive == "2_2") {

                if (hn1 != hn2) {
                    errorSwal2("HN ไม่ตรงกัน", "findhn2");
                } else if (!findTableHN2_2(hn2))
                    errorSwal2("ไม่พบ HN นี้", "findhn2");
            }

            document.getElementById("findbloodstocktype").disabled = false;
            document.getElementById("findbagnumber").disabled = false;


            document.getElementById("finfhn").value = "";
            document.getElementById("findhn2").value = "";
            document.getElementById("findbloodstocktype").focus();
            $('#findbloodstocktype').select2('open');



        }
    });

    $("#findbagnumber").keyup(function(event) {

        if (event.keyCode === 13) {
            var bagnumber = $("#findbagnumber").val();
            bagnumber = bagnumber.trim();
            if (bagnumber.length == 0) {
                return false;
            }

            if (tabactive == "2_2") {
                if (!findTableBagNumber2_2(bagnumber)) {
                    errorSwal2("ไม่พบผลิตภัณฑ์นี้", "findbagnumber");
                } else {

                }

            }
            setTimeout(function() {
                document.getElementById("findbagnumber").value = "";
                document.getElementById("findbagnumber").focus();
            }, 200);

        }
    });

    $("#hnreprint").keyup(function(event) {
        var hn = $("#hnreprint").val();
        if (event.keyCode === 13) {
            spinnershow();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data/bloodqueue/bloodqueue-reprint-list.php?hn=' + hn,
                complete: function() {
                    var delayInMilliseconds = 200;
                    setTimeout(function() {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function(data) {


                    if (data.total > 0) {
                        printQueueSticker(data.data[0].requestbloodid);
                    }

                    setTimeout(function() {
                        document.getElementById("hnreprint").value = "";
                        document.getElementById("hnreprint").focus();
                    }, 200);

                },
                error: function(data) {

                    console.log('An error occurred.');
                    console.log(data);

                },
            });
        }

    });

    $("#hnnoprint").keyup(function(event) {
        var patient = $("#hnnoprint").val();
        if (event.keyCode === 13) {
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
                                    title: "ไม่พบข้อมูล",
                                    type: 'warning',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then(value => {
                                    if (value) {
                                        document.getElementById('hnnoprint').focus;
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
                    console.log("โหลดข้อมูลจาก RHIS ไม่สำเร็จ");

                    console.log('An error occurred.');
                    console.log(data);

                    checkLoadPatient(patient);

                },
            });


        }

    });


    function checkLoadPatient(patient) {

        swal({
            title: "โหลดข้อมูลจาก RHIS ไม่สำเร็จ",
            type: "warning",
            showCloseButton: false,
            showCancelButton: false,
            // dangerMode: true,
            confirmButtonClass: "btn-success",
            confirmButtonClass: "",
            confirmButtonText: "ตกลง",
            closeOnConfirm: true,
            allowOutsideClick: false
        }).then(value => {
            if (value) {
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
                                title: "ท่านต้องการใช้ข้อมูลเก่าใน RJ log ก่อนหรือไม่",
                                type: 'warning',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then(value => {
                                if (value) {
                                    loadPatient(patient);
                                }

                            });


                        } else {
                            document.getElementById('hnnoprint').value = '';
                        }

                    },
                    error: function(data) {
                        clearPatient();
                        console.log('An error occurred.');
                        console.log(data);
                        document.getElementById('hnnoprint').value = '';
                    },
                });


                document.getElementById('hnnoprint').focus;
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
                /// อันนี้นะ
                if (data.data.length > 0) {
                    var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));


                    console.log(obj);
                    document.getElementById('no_hn').value = obj.patienthn;
                    document.getElementById('no_fullname').value = obj.patientfullname;
                    v_wardname = obj.wardname;
                    setDataModalSelectValue('no_wardid', obj.wardid, obj.wardname);

                } else {

                    clearPatient();
                    swal({
                        title: "ไม่พบข้อมูล",
                        type: 'warning',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then(value => {
                        if (value) {
                            document.getElementById('hnnoprint').focus;
                        }

                    });
                }
                document.getElementById('hnnoprint').value = '';
            },
            error: function(data) {
                clearPatient();
                console.log('An error occurred.');
                console.log(data);

            },
        });
    }

    function clearPatient() {
        document.getElementById('hnnoprint').value = '';
        document.getElementById('no_hn').value = '';
        document.getElementById('no_fullname').value = '';
        $('#no_wardid').val(null).empty();
        v_wardname = '';
    }


});



function findTableHN1_1(number) {

    bloodQueueCheckState = false;

    var result = false;
    var rows = document.getElementById("blood-queue-tab1").rows;

    for (var i = 1; i < rows.length; i++) {
        if (rows[i].cells[6].innerHTML == number) {
            result = true;

            rows[i].cells[3].getElementsByTagName('input')[0].disabled = false;
            rows[i].cells[4].getElementsByTagName('input')[0].disabled = false;
            rows[i].cells[3].getElementsByTagName('input')[0].checked = true;
            rows[i].cells[16].getElementsByTagName('select')[0].disabled = false;
            var row = rows[i];
            var item = JSON.parse(row.cells[0].innerHTML);
            item[0].r = true;
            item[0].n = false;
            row.cells[0].innerHTML = JSON.stringify(item);

            getAllergic(row.cells[6].innerHTML, item[0]);
        }
    }
    deleteTableRow(rows, 6, number);
    findTableHN1_1_check_single();
    return result;
}


function findTableHN1_1_check_single() {


    var rows = document.getElementById("blood-queue-tab1").rows;
    var count = 0;
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);
        if (item[0].r) {
            count++;
        }
    }

    if (count > 1) {
        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            rows[i].cells[3].getElementsByTagName('input')[0].checked = false;
            var item = JSON.parse(row.cells[0].innerHTML);
            item[0].r = false;
            item[0].n = false;
            row.cells[0].innerHTML = JSON.stringify(item);
        }
    }
}

function getBagNumberHN(hn = '', donation_get_type_id = '') {
    spinnershow();
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/blood/bloodfind-replacement-autologous-direct.php?hn=' + hn + "&donation_get_type_id=" + donation_get_type_id,
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {

            if (data.data.length > 0) {
                var textObj = '';
                var titleMsg = '';
                $.each(data.data, function(index, value) {
                    textObj += value.bag_number + ' [ ' + value.bloodtype + ' ]\n';
                });

                if (data.data[0].donation_get_type_id == 2) {
                    titleMsg = 'ผู้ป่วยมีเลือดที่เป็น Replacement';
                } else {
                    titleMsg = 'ผู้ป่วยมีเลือดที่เป็น Autologous/Direct';
                }

                swal({
                    title: titleMsg,
                    text: textObj,
                    type: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(value => {
                    if (value) {}

                });
            }

        },
        error: function(data) {

            console.log('An error occurred.');
            console.log(data);

        },
    });
}


function getAllergic(hn = '', valueItem = {}) {
    spinnershow();
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/patient/patient.php?hn=' + hn,
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {
            if (data.data.length > 0) {
                var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                alertdead(obj);
            } else {
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
                        // if (inputValue) {
                        //     document.getElementById('patientid').focus;
                        // }
                    });
            }
        },
        error: function(data) {
            clearPatient();
            console.log('An error occurred.');
            console.log(data);
        },
    });
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/bloodqueue/bloodqueue-allergic.php?hn=' + hn,
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {

            if (data.data.length > 0) {
                swal({
                    title: "ผู้ป่วยเคยมีประวัติแพ้เลือด",
                    type: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(value => {
                    if (value) {
                        msgQueueStandby(hn, valueItem);

                    }
                });


            } else {
                msgQueueStandby(hn, valueItem);
            }

        },
        error: function(data) {

            console.log('An error occurred.');
            console.log(data);

        },
    });
}

function alertdead(data) {
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
                return false;
            });
    }
}


function findTableHN1_4(number) {

    bloodQueueConfirmState = false;

    var result = false;
    var rows = document.getElementById("blood-queue-tab4").rows;
    for (var i = 1; i < rows.length; i++) {
        console.log(rows[i].cells[5].innerHTML);
        if (rows[i].cells[5].innerHTML == number) {
            result = true;

            rows[i].cells[1].getElementsByTagName('input')[0].disabled = false;
            rows[i].cells[1].getElementsByTagName('input')[0].checked = true;

            var row = rows[i];
            var item = JSON.parse(row.cells[0].innerHTML);
            item[0].ck = true;
            row.cells[0].innerHTML = JSON.stringify(item);

            row.cells[11].children[0].disabled = false;
            row.cells[12].children[0].disabled = false;
            row.cells[13].children[0].disabled = false;

            row.cells[11].children[0].required = true;
            row.cells[12].children[0].required = true;
            row.cells[13].children[0].required = true;
        }
    }
    deleteTableRow(rows, 5, number);
    return result;
}

function findTableHN2_1(number) {

    bloodQueueUsedWaitState = false;

    var count = 1;
    var indexSinge = 0;
    var result = false;
    var rows = document.getElementById("blood-queue-tab2-1").rows;
    for (var i = 2; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);
        if (item[0].hn == number) {
            result = true;

            rows[i].cells[1].getElementsByTagName('input')[0].disabled = false;

            rows[i].cells[15].children[0].value = getDMY543();
            rows[i].cells[16].children[0].value = getTimeNow();

            rows[i].cells[18].children[0].disabled = false;

            item[0].confirmbloodrequestdate = getDMY543();
            item[0].confirmbloodrequesttime = getTimeNow();
            indexSinge = i;
            // item[0].isreadyblood = true;
            row.cells[0].innerHTML = JSON.stringify(item);
            result = true;
            $("#blood-queue-tab-2-1").text(count);
            count++;
        }
    }

    if (count == 2) {
        var row = rows[indexSinge];
        var item = JSON.parse(row.cells[0].innerHTML);
        item[0].isreadyblood = true;
        row.cells[1].getElementsByTagName('input')[0].disabled = false;
        row.cells[1].getElementsByTagName('input')[0].checked = true;


        row.cells[13].children[0].required = false;

        row.cells[13].children[0].readOnly = false;
        if (parseInt(item[0].patientage) <= 15) row.cells[14].children[0].readOnly = false;
        row.cells[15].children[0].readOnly = false;
        row.cells[16].children[0].readOnly = false;
        row.cells[15].children[0].value = getDMY543();
        row.cells[16].children[0].value = getTimeNow();
        item[0].confirmbloodrequestdate = getDMY543();
        item[0].confirmbloodrequesttime = getTimeNow();

        row.cells[0].innerHTML = JSON.stringify(item);
    }


    if (result) {
        for (var i = 2; i < rows.length; i++) {
            var row = rows[i];
            var item = JSON.parse(row.cells[0].innerHTML);
            if (item[0].hn != number) {


                var elem = document.getElementById("row2_1" + i);

                elem.style.display = 'none';

            }
        }
    }

    return result;
}


var hnfind2 = '';

function findTableHN2_2(number) {

    bloodQueueUsedReadyState = false;
    var count = 1;
    var result = false;
    var rows = document.getElementById("blood-queue-tab2-2").rows;

    for (var i = 2; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);
        var elem = document.getElementById("row2_2" + i);
        if (item[0].hn != number) {
            elem.style.display = 'none';
        }

        rows[i].cells[12].getElementsByTagName('input')[0].disabled = true;
        rows[i].cells[12].getElementsByTagName('input')[0].checked = false;
        item[0].ispayblood = true;

    }


    for (var i = 2; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);
        if (item[0].hn == number) {
            result = true;
            hnfind2 = item[0].hn;


            if (item[0].cm_bloodtype == "CRYO") {

                rows[i].cells[12].getElementsByTagName('input')[0].checked = true;
                row.cells[12].children[0].disabled = false;

                item[0].ispayblood = true;
                row.cells[0].innerHTML = JSON.stringify(item);

                // row.cells[13].children[0].required = true;

                if (item[0].bloodstocktypegroupid == 1) {
                    row.cells[14].children[0].required = true;
                }


            }



            $("#blood-queue-tab-2-2").text(count);
            count++;
        }
    }



    return result;
}


function findTableBagNumber2_2(number) {

    bloodQueueUsedReadyState = false;

    var result = false;
    var rows = document.getElementById("blood-queue-tab2-2").rows;

    var bloodtype = $("#findbloodstocktype").val();
    var arrayCheckPay = [];
    var index = "";

    for (var i = 2; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);
        if (item[0].cm_bag_number == number && item[0].cm_bloodtype == bloodtype && item[0].hn == hnfind2) {
            result = true;

            rows[i].cells[12].getElementsByTagName('input')[0].disabled = false;
            rows[i].cells[12].getElementsByTagName('input')[0].checked = true;

            item[0].ispayblood = true;

            row.cells[0].innerHTML = JSON.stringify(item);

            // ปิดการใช้งานช่องกระติกไปก่อน 
            // row.cells[13].children[0].required = true;

            console.log(item[0].bloodstocktypegroupid);

            if (item[0].bloodstocktypegroupid == 1) {
                // ปิดการใช้งานช่องกระติกไปก่อน 
                // row.cells[14].children[0].required = true;
            }

            if (item[0].cm_bloodtype == "CRYO") {
                row.cells[14].children[0].required = false;

            }

            row.cells[16].children[0].disabled = false;

            arrayCheckPay = item[0];
            index = (i - 2);

        }
    }

    if (index !== "") {

        var date = new Date();
        date.setFullYear(date.getFullYear() + 543);
        var date1 = arrayCheckPay.bloodexp.replace(/-/g, '');
        var date2 = moment(date).format('YYYYMMDD');

        if (parseInt(date1) < parseInt(date2)) 
        {
            swal({
                title: 'ถุงเลือดนี้หมดอายุแล้ว',
                type: 'warning',
               
            }).then(function(value) {
            
                var item = JSON.parse(rows[index + 2].cells[0].innerHTML);
                rows[index + 2].cells[12].getElementsByTagName('input')[0].disabled = true;
                rows[index + 2].cells[12].getElementsByTagName('input')[0].checked = false;

                item[0].ispayblood = false;

                rows[index + 2].cells[0].innerHTML = JSON.stringify(item);
                document.getElementById('findbagnumber').focus();
            });
        }else if (checkPayExp(arrayCheckPay.bloodexp, arrayCheckPay.hn, arrayCheckPay.bloodstocktypegroupid, index)) {

            swal({
                title: 'มีถุงเลือดที่หมดอายุก่อนถุงนี้',
                text: 'ต้องการใช้ถุงเลือดนี้หรือไม่?',
                type: 'warning',
                buttons: {
                    confirm: {
                        text: "ใช่",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true
                    },
                    cancel: {
                        text: "ไม่",
                        value: false,
                        visible: true,
                        className: "",
                        closeModal: true,
                    }
                }
            }).then(function(value) {
                if (!value) {
                    console.log("----------");
                    var item = JSON.parse(rows[index + 2].cells[0].innerHTML);
                    rows[index + 2].cells[12].getElementsByTagName('input')[0].disabled = true;
                    rows[index + 2].cells[12].getElementsByTagName('input')[0].checked = false;

                    item[0].ispayblood = false;

                    rows[index + 2].cells[0].innerHTML = JSON.stringify(item);
                    document.getElementById('findbagnumber').focus();
                }
            });

            /*
            errorSwal2("กรุณาเลือกถุงเลือดที่หมดอายุก่อน", "findbagnumber");

            var item = JSON.parse(rows[index + 2].cells[0].innerHTML);
            rows[index + 2].cells[12].getElementsByTagName('input')[0].disabled = true;
            rows[index + 2].cells[12].getElementsByTagName('input')[0].checked = false;

            item[0].ispayblood = false;

            // ปิดการใช้งานช่องกระติกไปก่อน 
            // rows[index+2].cells[13].children[0].required = false;
            // rows[index+2].cells[14].children[0].required = false;

            rows[index + 2].cells[0].innerHTML = JSON.stringify(item);
            */
        }

    }

    return result;
}


function findTableHN2_3(number) {

    var result = false;
    var rows = document.getElementById("blood-queue-tab2-3").rows;
    for (var i = 1; i < rows.length; i++) {
        console.log(rows[i].cells[5].innerHTML);
        if (rows[i].cells[5].innerHTML == number) {
            result = true;
        }
    }
    deleteTableRow(rows, 5, number);
    return result;
}


function errorSwal2(msg = "", inputname = "") {
    swal({
        title: msg,
        type: 'warning',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then(value => {
        if (value) {
            document.getElementById(inputname).value = '';
            document.getElementById(inputname).focus();
            loadTableAll();
        }

    });
    return false;

}

function deleteTableRow(rows, c, number) {
    for (var i = 1; i < rows.length; i++) {
        if (rows[i].cells[c].innerHTML != number) {
            rows[i].style.display = 'none';
        }
    }
}

function setDataModalSelectValue(elem = '', itemid, itemtext) {

    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function loadTableAll() {

    console.log("****2*****");

    if (bloodQueueCheckState)
        loadTableBloodQueue();

    loadTableBloodQueueCancel();
    loadTableCheckBloodPatient();
    loadTableCheckResultBloodPatient();

    if (bloodQueueConfirmState)
        loadTableCrossmatch();

    if (bloodQueueUsedWaitState)
        loadTableBloodQueueWaitUsed();

    if (bloodQueueUsedReadyState)
        loadTableBloodQueueUsedReady();
    loadTableBloodQueuePay();
    // loadTableBloodQueueBeacon();
    loadTableBloodReaderBeacon();
}

function setBloodQueueCheckState() {
    bloodQueueCheckState = true;
}

function setBloodQueueConfirmState() {
    bloodQueueConfirmState = true;
}

function setBloodQueueUsedWaitState() {
    bloodQueueUsedWaitState = true;
}

function setBloodQueueUsedReadyState() {
    bloodQueueUsedReadyState = true;
}

function checkPayExp(todate, hn, bloodstocktypegroupid, index) {
    var status = false;
    var todate = todate.replace(/-/g, '');

    var count = 0;
    var rows = document.getElementById("blood-queue-tab2-2").rows;
    for (var i = 2; i < rows.length; i++) {

        var item = JSON.parse(rows[i].cells[0].innerHTML);

        if (count != index && hn == item[0].hn && item[0].bloodstocktypegroupid == bloodstocktypegroupid && item[0].ispayblood != 1) {
            var bloodexp = item[0].bloodexp.replace(/-/g, '');
            console.log(parseInt(todate));
            console.log(item[0].bag_number);
            console.log(parseInt(bloodexp));
            if (parseInt(todate) > parseInt(bloodexp)) {
                status = true;
            }
        }

        count++;
    }

    return status;
}


// Printter Start
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

function setPrintQty() {
    document.getElementById("printqty").value = (getDefaultQty() == null) ? 4 : getDefaultQty();

}
setPrintQty();


function getPrintterSetting() {
    return JSON.parse(localStorage.getItem("printers"));
}

function setDefaultPrinter(defaulprinter_sticker_queue) {
    localStorage.setItem("defaulprinter_sticker_queue", defaulprinter_sticker_queue);
}


function getDefaultPrinter() {
    return localStorage.getItem("defaulprinter_sticker_queue");
}

function setDefaultQty(defaulprinter_sticker_queue) {
    localStorage.setItem("defaulprinter_sticker_queue_qty", defaulprinter_sticker_queue);
}

function getDefaultQty() {
    return localStorage.getItem("defaulprinter_sticker_queue_qty");
}

function setDefaultRadioPrinter(defaulradioprinter_sticker_queue) {
    localStorage.setItem("defaulradioprinter_sticker_queue", defaulradioprinter_sticker_queue);
}

function getDefaultRadioPrinter() {
    return localStorage.getItem("defaulradioprinter_sticker_queue");
}


function showPrint() {
    $("#stickerModal").modal("show");

}

function closePrint() {
    $("#stickerModal").modal("hide");
}
// Printter End