$(document).ready(function() {

    // document.getElementById("btnSave").style.visibility = "hidden"
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
                            text: item.unitofficename + '|' + item.unitofficecode,
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


        // $('#bloodnotificationtypeid').val(null).empty();

        document.getElementById("forchildren").checked = false;
        // document.getElementById("forchildren").disabled = (!(e.params.args.data.id == 232));

    });

    $('#usedunit').select2({
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
    });

    $('#bloodnotificationtypeid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: "data/masterdata/bloodnotificationtype.php",
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                    requestunit: $('#requestunit').val()
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bloodnotificationtypeid,
                            text: item.bloodnotificationtypename + '|' + item.bloodnotificationtypecode,
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

        if ($('#requestbloodid').val() == '')
            setOpenBloodBlank(e.params.args.data.item.bloodnotificationtypeid);

    });


    $('#doctorid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/doctor.php',
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
                            id: item.doctorid,
                            text: item.doctorname + '|' + item.doctorcode2 + '|' + item.doctorcode,
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
                '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + '<span class="select2-span2">&nbsp;' + strState[2] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
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

        $("#doctorcode2").val(e.params.args.data.item.doctorcode2);

    });

    $('#blood_driller_id').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/nurse.php?select=2',
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
                            id: item.nurseid,
                            text: item.nursename + '|' + item.nursecode,
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
    });

    $('#blood_certifier_id').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/nurse.php?select=2',
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
                            id: item.nurseid,
                            text: item.nursename + '|' + item.nursecode,
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
    });

    $('#nurseid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/nurse.php?select=1',
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
                            id: item.nurseid,
                            text: item.nursename + '|' + item.nursecode,
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
    });

    $('#diseasegroupid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/diseasegroup.php',
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
                            id: item.diseasegroupid,
                            text: item.diseasegroupname,
                        }
                    })
                };
            },

        }
    });

    $('#diagnosisid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        minimumInputLength: 2,
        dropdownAutoWidth: true,
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/diagnosis.php',
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
                            id: item.diagnosisid,
                            text: item.diagnosisname + ' ' + ((item.diagnosisname2 != null) ? item.diagnosisname2 : '') + '|' + item.diagnosiscode,
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
                '<span >' + strState[1] + '</span>'
            );
            return $state;
        },
    }).on("select2:selecting", function(e) {

        $("#diagnosis").val(e.params.args.data.item.diagnosisid);
        $("#diagnosisdetail").val(e.params.args.data.item.diagnosisname);

    }).on("select2:clearing", function(e) {

        $("#diagnosis").val("");
        $("#diagnosisdetail").val("");

    });


});

function addRowReqClick() {
    addRowReq();
}

var countSelectBloodStocktypeid = 0;

function addRowReq(im = [], bloodnotificationtypeid2 = '') {

    // ตรวจสอบว่ากรอกข้อมูลหรือยัง
    if (bloodnotificationtypeid2 != 2)
        if (checkEntryText()) {
            return false;
        }

    if (checkDateRequestBlood()) {
        const callback = function(inputValue) {};
        mgsError("ขออภัยค่ะ!", "กรุณาระบุวันที่ใช้เกล็ดเลือด", callback);

        return false;
    }

    var arr;

    var bloodnotificationtypeid = $("#bloodnotificationtypeid").val();

    if (im.length != 0) {


        arr = [{
            requestblooditemid: im.requestblooditemid,
            bloodstocktypeid: im.bloodstocktypeid,
            requestblooditemqty: im.requestblooditemqty,
            requestblooditemcc: im.requestblooditemcc,
            requestblooditemdate: getDMY(im.requestblooditemdate),
            requestbloodid: im.requestbloodid
        }];
    } else {
        arr = [{
            requestblooditemid: '',
            bloodstocktypeid: (bloodnotificationtypeid2 == 2) ? 'LPRC-O' : '',
            requestblooditemqty: '',
            requestblooditemcc: '',
            requestblooditemdate: '',
            requestbloodid: ''
        }];
    }

    var typestatus = "";
    if (checkTypeArray(arr[0].bloodstocktypeid) || im.length == 0) {
        typestatus = 'hidden'
    }


    var disabled = '';
    var readonlyState = false;
    if (bloodnotificationtypeid == 2 || bloodnotificationtypeid2 == 2) {
        disabled = 'disabled';
        readonlyState = true;
    }


    var disabled2 = '';
    if (arr[0].requestblooditemid != "") {
        disabled2 = 'disabled';
        document.getElementById("btnAddRowReqTab1").disabled = true;
    }

    var event_data = '';

    event_data += '<tr>';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td>' + '1' + '</td>';
    event_data += '<td>';
    event_data += '<select ' + disabled2 + ' required  id="bloodstocktypeid' + countSelectBloodStocktypeid + '" name="bloodstocktypeid' + countSelectBloodStocktypeid + '"  style="width:100%" ';
    event_data += 'value="" class="form-control selectbloodstocktypeid" onchange="setRequestBloodBloodStockType(this)"   > '
    event_data += '<option  value=""></option>'
    $.each(bloodStockTypeArr, function(ind, v) {

        if (bloodnotificationtypeid == 2 || bloodnotificationtypeid2 == 2) {
            if (v.bloodstocktypeid == 'LPRC-O')
                event_data += '<option ' + ((arr[0].bloodstocktypeid == v.bloodstocktypeid) ? 'selected' : '') + '   value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>';
        } else {
            if (v.bloodstocktypeid != 'LPRC-O')
                event_data += '<option ' + ((arr[0].bloodstocktypeid == v.bloodstocktypeid) ? 'selected' : '') + '   value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>';
        }

    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td>';
    event_data += '<input ' + disabled2 + ' ' + ((readonlyState) ? 'readonly' : '') + '  required  type="number" autocomplete="off" id="requestblooditemqty' + countSelectBloodStocktypeid + '" name="requestblooditemqty' + countSelectBloodStocktypeid + '"  ';
    event_data += 'class="form-control" value="' + arr[0].requestblooditemqty + '" ';
    event_data += ' style="width:100%" onkeyup="setRequestBloodUnit(this)" >';
    event_data += '</td>';
    event_data += '<td>';
    event_data += '<input ' + disabled2 + ' ' + ((parseInt(dtataArray.patientage) > 15 || readonlyState) ? 'readonly' : '') + ' realonly    type="number" autocomplete="off" name="requestblooditemcc"  ';
    event_data += 'class="form-control" value="' + arr[0].requestblooditemcc + '" ';
    event_data += ' style="width:100%" onkeyup="setRequestBloodCC(this)" >';
    event_data += '</td>';
    event_data += '<td>';
    event_data += '<input ' + disabled2 + ' ' + typestatus + ' type="text" autocomplete="off" name="requestblooditemdate" ';
    event_data += 'class="form-control date" value="' + arr[0].requestblooditemdate + '" ';
    event_data += ' style="width:100%" onchange="setRequestBloodDate(this)" >';
    event_data += '</td>';
    event_data += '<td  >';
    event_data += '<button ' + disabled2 + ' ' + disabled + ' type="button" onclick="deleteRowReq(this,`list_table_tab1`)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';

    event_data += '</tr>';
    $("#list_table_tab1").append(event_data);
    setNoReq('list_table_tab1');
    dateBE('.date');

    getTableTypeOfRequestBlood();

    $("#bloodstocktypeid" + countSelectBloodStocktypeid).select2({ width: "100%", theme: "bootstrap" });
    countSelectBloodStocktypeid++;

    $("#div_list_table_tab1").scrollTop($("#list_table_tab1")[0].scrollHeight);

}

function setRequestBloodBloodStockType(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    console.log(row);
    item[0].bloodstocktypeid = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    if (checkTypeArray(self.value)) {
        row.cells[5].children[0].hidden = true;
    } else {
        row.cells[5].children[0].hidden = false;
    }

    if (checkDuplicateTableReq(self.value)) {
        const callback = function(inputValue) {
            if (inputValue) {
                self.value = 0;
                var fieldname = self.id;
                setDataModalSelectValue(fieldname, '', '');
                getTableTypeOfRequestBlood();
            }
        }
        mgsError("ขออภัยค่ะ!", "Request Product ซ้ำ", callback);
    }

    if (checkDuplicateTablePlatelet(self.value)) {
        const callback = function(inputValue) {
            if (inputValue) {
                self.value = 0;
                var fieldname = self.id;
                setDataModalSelectValue(fieldname, '', '');
                getTableTypeOfRequestBlood();
            }
        }
        mgsError("ขออภัยค่ะ!", "มีการเพิ่ม Platelet แล้ว", callback);
    }


    getTableTypeOfRequestBlood()

}

function checkDuplicateTableReq(v = "") {
    var body = document.getElementById("list_table_tab1").getElementsByTagName('tbody')[0];
    var status = false;
    var count = 0;
    $.each(body.children, function(ind, vl) {


        if (v == 'LPRC' || v == 'LDPRC' || v == 'PRC' || v == 'SDR' || v == 'LDSDR') {
            if (
                vl.children[2].children[0].value == 'LPRC' ||
                vl.children[2].children[0].value == 'LDPRC' ||
                vl.children[2].children[0].value == 'PRC' ||
                vl.children[2].children[0].value == 'SDR' ||
                vl.children[2].children[0].value == 'LDSDR'
            ) {
                if (count > 0)
                    status = true;

                count++;
            }
        } else if (v == 'PC' || v == 'LPPC' || v == 'SDP' || v == 'SDP_PAS' || v == 'LDPPC' || v == 'LDPPC_PAS' || v == 'LPPC_PAS' || v == 'PLDPC') {
            if (
                vl.children[2].children[0].value == 'PC' ||
                vl.children[2].children[0].value == 'LPPC' ||
                vl.children[2].children[0].value == 'SDP' ||
                vl.children[2].children[0].value == 'SDP_PAS' ||
                vl.children[2].children[0].value == 'LDPPC' ||
                vl.children[2].children[0].value == 'LDPPC_PAS' ||
                vl.children[2].children[0].value == 'LPPC_PAS' ||
                vl.children[2].children[0].value == 'PLDPC'
            ) {
                if (count > 0)
                    status = true;

                count++;
            }
        } else if (v == 'FFP' || v == 'CRP') {
            if (
                vl.children[2].children[0].value == 'FFP' ||
                vl.children[2].children[0].value == 'CRP'
            ) {
                if (count > 0)
                    status = true;

                count++;
            }
        } else if (v == 'CRYO' || v == 'HTFDC') {
            if (
                vl.children[2].children[0].value == 'CRYO' ||
                vl.children[2].children[0].value == 'HTFDC'
            ) {
                if (count > 0)
                    status = true;

                count++;
            }
        } else if (vl.children[2].children[0].value == v) {
            if (count > 0)
                status = true;

            count++;
        }

    })


    return status;
}

function checkDuplicateTablePlatelet(v = "") {
    var body = document.getElementById("list_table_tab1").getElementsByTagName('tbody')[0];
    var status = false;
    var count = 0;
    $.each(body.children, function(ind, vl) {

        if (!checkTypeArray(vl.children[2].children[0].value) && v != "") {
            if (count > 0)
                status = true;

            count++;
        }

    })

    return status;
}

function checkTypeArray(v = "") {
    var status = true;
    var array = ["LDPPC", "LDPPC_PAS", "LPPC", "LPPC_PAS", "PC", "PLDPC", "SDP", "SDP_PAS"];

    $.each(array, function(ind, vl) {
        if (v == vl) {
            status = false
        }

    })

    return status;

}

function setRequestBloodUnit(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].requestblooditemqty = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    console.log(self.value);
}

function setRequestBloodCC(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].requestblooditemcc = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}


function setRequestBloodDate(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].requestblooditemdate = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);

    getDurgicaldateDatePlatelets(self.id);
}

function getTableRequestBlood() {
    var arr = [];
    var rows = document.getElementById("list_table_tab1").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;

}

function checkTableRequestBlood() {
    var status = false;
    var rows = document.getElementById("list_table_tab1").rows;
    for (var i = 1; i < rows.length; i++) {
        status = true;
    }
    return status;

}

function checkDateRequestBlood() {
    var status = false;
    var rows = document.getElementById("list_table_tab1").rows;
    for (var i = 1; i < rows.length; i++) {

        if (!rows[i].cells[5].children[0].hidden && rows[i].cells[5].children[0].value == "")
            status = true;
    }
    return status;
}

function requestBloodModalShow() {
    $("#requestbloodmodal").modal('show');
    loadTableReq();
}

function requestBloodModalClose() {
    $("#requestbloodmodal").modal('hide');
}


var requestbloodcancelname = '';

function deleteRowReqBlood() {

    var requestbloodid = $('#requestbloodid').val();

    swal({
            title: "คุณต้องการยกเลิกข้อมูลนี้หรือไม่",
            type: "input",
            html: true,
            text: '<select id="requestbloodcancel" class="form-control form-control-sm requestbloodcancel" name="requestbloodcancel">',
            inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
            showCloseButton: true,
            showCancelButton: true,

            // dangerMode: true,
            cancelButtonClass: "",
            confirmButtonClass: "btn-success",
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: true
        },
        function(inputValue) {

            var v_requestbloodcancel = $("#requestbloodcancel").val();

            if (inputValue || v_requestbloodcancel) {
                spinnershow();
                $.ajax({
                    url: 'data/requestblood/requestblooddetail-delete.php?requestbloodid=' + requestbloodid + "&value=" + inputValue + "&requestbloodcancel=" + v_requestbloodcancel,
                    dataType: 'json',
                    type: 'get',
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function(data) {
                        if (data.status == true) {
                            myAlertTopDelete();

                            data = { grouprequestbloodcancelname: inputValue, requestbloodcancelother: '', requestbloodid: requestbloodid };

                            openCancel(data);
                        } else {
                            myAlertTopErrorDelete();
                        }
                    },
                    error: function(d) {
                        /*console.log("error");*/
                        alert("404. Please wait until the File is Loaded.");
                    }
                });

            }
        });

    requestbloodcancelname = '';

    $('#requestbloodcancel').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: "data/masterdata/request-blood-cancel2.php",
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                    requestunit: $('#requestunit').val()
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.requestbloodcancelid,
                            text: item.requestbloodcancelname + '|' + item.requestbloodcancelcode,
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

        requestbloodcancelname = e.params.args.data.item.requestbloodcancelname;

    });
}

function openCancel(data = []) {
    document.getElementById("tab1cencel").style.display = "block"

    if (data.requestbloodstatusid == '3') {
        document.getElementById("cancelnametext").innerHTML = 'ปฏิเสธสิ่งส่งตรวจแล้ว';
    } else {
        document.getElementById("cancelnametext").innerHTML = 'ยกเลิกข้อมูลแล้ว';
    }

    $.ajax({
        url: 'data/requestblood/requestblood-cancel-item.php?requestbloodid=' + data.requestbloodid,
        dataType: 'json',
        type: 'get',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(resultData) {
            var resultData = JSON.parse(JSON.stringify(resultData).replace(/null/g, '""'));

            if (resultData.status) {
                if (data.requestbloodstatusid == '3') {
                    if (resultData.data.length > 0) {
                        document.getElementById("labcheckrequestcancelname").innerHTML = 'สาเหตุ : ' + resultData.data[0].grouprequestbloodcancelname + ' , ' + data.requestbloodcancelother;

                    } else {
                        document.getElementById("labcheckrequestcancelname").innerHTML = 'สาเหตุ : ' + data.requestbloodcancelother;

                    }
                    console.log("=====2===========");
                } else {
                    // if (data.grouprequestbloodcancelname == undefined)
                    //     data.grouprequestbloodcancelname = "";

                    document.getElementById("labcheckrequestcancelname").innerHTML = 'สาเหตุ : ' + resultData.data[0].grouprequestbloodcancelname + ' , ' + resultData.data[0].requestbloodcancelother;

                    // console.log(resultData);
                    // console.log(resultData.data);
                    // console.log(resultData.data[0].grouprequestbloodcancelname);
                    // console.log(resultData.data[0].requestbloodcancelother);
                }
                console.log("================");
            }

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function clearFormTab1() {
    setBloodDrillerIdStar(true);
    setBloodCertifierLableStar(true);
    document.getElementById("tab1cencel").style.display = "none";
    $('#requestbloodid').val('');
    $('#requestbloodcode').val('');
    $('#durgicaldate').val('');
    $('#usedblooddatefrom').val('');
    $('#usedblooddateto').val('');
    $('#diagnosis').val('');
    $('#diagnosisdetail').val('');
    document.getElementById("bloodsampletube1").checked = false;
    document.getElementById("bloodsampletube2").checked = false;
    document.getElementById("forchildren").checked = false;
    document.getElementById("pregnant1").checked = false;
    document.getElementById("pregnant2").checked = false;
    $('#bloodgrouppregnant').val('');
    $('#pregnantdate').val('');
    $('#pregnantqty').val('');
    document.getElementById("bloodtransfusion1").checked = false;
    document.getElementById("bloodtransfusion2").checked = false;
    $('#bloodtransfusionlast').val('');
    document.getElementById("plasmaexchange").checked = false;
    document.getElementById("screenforplateletantibody").checked = false;
    document.getElementById("hlacrossmatchsingledonorplatelet").checked = false;
    document.getElementById("washedredbloodcell").checked = false;
    document.getElementById("light").checked = false;




    setDataModalSelectValue('requestunit', null, '');
    setDataModalSelectValue('usedunit', null, '');
    setDataModalSelectValue('bloodnotificationtypeid', '', '');
    setDataModalSelectValue('nurseid', null, '');
    setDataModalSelectValue('doctorid', null, '');
    setDataModalSelectValue('blood_driller_id', null, '');
    setDataModalSelectValue('blood_certifier_id', null, '');
    setDataModalSelectValue('diseasegroupid', null, '');

    $("#bloodgroupid").val('');
    $("#bloodgroupname").val('');
    $("#rhid").val('');
    $("#rhname").val('');

    document.getElementById('requestantibody').innerHTML = '';
    $("#group_antibody").val('');

    // setDataModalSelectValue('bloodgroupid','','');
    // setDataModalSelectValue('rhid','','');

    var body = document.getElementById("list_table_tab1").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }
}

function removeOthers(self) {
    $('option', self).not(':eq(0), :selected').remove();
    //now refresh your select2
}

function requestBloodLastDate() {

    var hn = document.getElementById("hn").value;
    $.ajax({
        url: 'data/requestblood/requestbloodlastdate.php?hn=' + hn,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            if (obj.length > 0) {
                $("#bloodtransfusionlast").val(obj[0].LASTDATE);
                document.getElementById("bloodtransfusion2").checked = true;
            } else {
                document.getElementById("bloodtransfusion1").checked = true;
            }
        },
        error: function(d) {
            console.log("error");
        }
    });
}

function requestBloodRhLast() {
    var hn = document.getElementById("hn").value;
    $.ajax({
        url: 'data/askforblood/request-blood-lab-last.php?hn=' + hn,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            if (obj.length > 0) {

                // setDataModalSelectValue('bloodgroupid',obj[0].confirmbloodgroup,obj[0].bloodgroupname);
                // setDataModalSelectValue('rhid',obj[0].confirmrhid,obj[0].rhname3)
                $("#bloodgroupid").val(obj[0].confirmbloodgroup);
                $("#bloodgroupname").val(obj[0].bloodgroupname);
                $("#rhid").val(obj[0].confirmrhid);
                $("#rhname").val(obj[0].rhname3);

                $("#requestbloodgroupname").val(obj[0].bloodgroupname);
                $("#requestrhname").val(obj[0].rhname3);

                $("#requestantibodyscreening").val(obj[0].confirmsceenname);
                document.getElementById('requestantibody').innerHTML = removeCommaAni(obj[0].group_antibody_all);
                $("#group_antibody").val(removeCommaAni(obj[0].group_antibody_all));

                // document.getElementById('requestantibody').innerHTML = obj[0].group_antibody;

                // $("#group_antibody").val(obj[0].group_antibody);
                $("#group_phenotypedisplay").val(obj[0].group_phenotypedisplay_all);


            }

        },
        error: function(d) {
            console.log("error");
        }
    });
}

function removeCommaAni(v) {
    var str = '';
    const myArray = v.split(",");

    var uniqueNames = [];
    $.each(myArray, function(i, el) {
        if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
    });


    $.each(uniqueNames, function(index, value) {
        if (value)
            str += value + ',';
    });
    return lastString(str);
}

function setOpenBloodBlank(bloodnotificationtypeid = '') {
    setDurgicalDateLableStar(bloodnotificationtypeid);
    if (bloodnotificationtypeid == 2) {
        removeRowTable("list_table_tab1");
        document.getElementById("divOpenBloodBlank").style.visibility = "visible";
        document.getElementById("btnAddRowReqTab1").disabled = true;

        addRowReq('', 2);
    } else {
        document.getElementById("divOpenBloodBlank").style.visibility = "hidden";
        document.getElementById("btnAddRowReqTab1").disabled = false;
    }

}

function setDurgicalDateLableStar(bloodnotificationtypeid = '') {
    if (bloodnotificationtypeid == 4) {
        document.getElementById("durgicaldateLableStar").style.visibility = "visible";
        document.getElementById("durgicaldate").required = true;

    } else {
        removeRowTable("list_table_tab1");
        document.getElementById("durgicaldateLableStar").style.visibility = "hidden";
        document.getElementById("durgicaldate").required = false;
    }
}

function setBloodDrillerIdStar(status = false) {
    document.getElementById("bloodDrillerLableStar").style.visibility = (status) ? "visible" : "hidden";
    document.getElementById("blood_driller_id").required = status;
}

function setBloodCertifierLableStar(status = false) {
    // document.getElementById("bloodCertifierLableStar").style.visibility = (status) ? "visible" : "hidden";
    // document.getElementById("blood_certifier_id").required = status;
}


function checkEntryText() {
    var status = false;

    var requestbloodid = $("#requestbloodid").val();

    if (checkOptionText('requestunit')) {
        const callback = function(inputValue) { document.getElementById("requestunit").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ หน่วยงานที่แจ้งขอเลือด", callback);
        status = true;
    } else if (checkOptionText('bloodnotificationtypeid')) {
        const callback = function(inputValue) { document.getElementById("bloodnotificationtypeid").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ ประเภทการแจ้งขอเลือด", callback);
        status = true;
    } else if (checkOptionText('usedblooddatefrom')) {
        const callback = function(inputValue) { document.getElementById("usedblooddatefrom").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ วันที่ต้องการใช้เลือด", callback);
        status = true;
    } else if (checkOptionText('usedblooddateto')) {
        const callback = function(inputValue) { document.getElementById("usedblooddateto").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ วันที่ต้องการใช้เลือด", callback);
        status = true;
    } else if ($("#bloodnotificationtypeid").val() == 4 && checkOptionText('durgicaldate')) {
        const callback = function(inputValue) { document.getElementById("durgicaldate").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ กำหนดวันผ่าตัด", callback);
        status = true;
    } else if (checkOptionText('nurseid')) {
        const callback = function(inputValue) { document.getElementById("nurseid").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ พยาบาลผู้รับคำสั่ง", callback);
        status = true;
    } else if (checkOptionText('doctorid')) {
        const callback = function(inputValue) { document.getElementById("doctorid").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ แพทย์ผู้สั่ง", callback);
        status = true;
    } else if (checkOptionText('blood_driller_id') && document.getElementById("bloodsampletube1").checked) {
        const callback = function(inputValue) { document.getElementById("blood_driller_id").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ ผู้เจาะเลือด", callback);
        status = true;
    }
    // else if (checkOptionText('blood_certifier_id') && document.getElementById("bloodsampletube1").checked && requestbloodid == '') {
    //     const callback = function(inputValue) { document.getElementById("blood_certifier_id").focus() };
    //     mgsError("ขออภัยค่ะ!", "กรุณาระบุ ผู้ตรวจสอบ", callback);
    //     status = true;
    // } 
    else if (checkOptionText('diagnosisdetail')) {
        const callback = function(inputValue) { document.getElementById("diagnosis").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ Diagnosis", callback);
        status = true;
    } else if (!document.getElementById("bloodsampletube1").checked && !document.getElementById("bloodsampletube2").checked) {
        const callback = function(inputValue) { document.getElementById("bloodsampletube1").focus() };
        mgsError("ขออภัยค่ะ!", "กรุณาระบุ Blood Sample/Tube", callback);
        status = true;
    }




    return status;
}

function countAdsol() {
    var countTotal = 0;
    var rows = document.getElementById("list_table_json_out").rows;
    for (var i = 1; i < rows.length; i++) {
        if (rows[i].cells[1].children[0].checked)
            countTotal++;
    }
    setCountAdsol(countTotal);

}


function setCountAdsol(qty = 0) {

    var rows = document.getElementById("list_table_tab1").rows;

    if (rows.length > 0) {
        var item = JSON.parse(rows[1].cells[0].innerHTML);
        item[0].requestblooditemqty = qty;
        rows[1].cells[3].children[0].value = qty;
        rows[1].cells[0].innerHTML = JSON.stringify(item);
    }

    $("#requestblooditemqty").val(qty);

}


function checkOptionText(textName = "") {
    var status = false;
    if ($("#" + textName).val() == null || $("#" + textName).val() == 0 || $("#" + textName).val() == "") {
        status = true;
    }

    return status;
}