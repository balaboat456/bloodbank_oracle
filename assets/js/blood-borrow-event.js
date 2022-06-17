var bloodStockTypeArr = [];

var bloodStockTypeArr_1 = [];
var bloodStockTypeArr_2 = [];
$(document).ready(function() {
    setHospital();
    setReceivingType();
    setBloodBorrowUrgency();
    setBloodDelivery();
    getBloodStockType().then(function success(data) {
        bloodStockTypeArr = data.data;
    });
    getBloodStockType_1().then(function success(data) {
        bloodStockTypeArr_1 = data.data;
    });
    getBloodStockType_2().then(function success(data) {
        bloodStockTypeArr_2 = data.data;
    });


    $("#bloodborrowhn").on('keydown', function(e) {
        if (e.which == 13) {
            scanBarcode();
        }
    });

    // $('#bloodborrowdiagnosis').select2({
    //     allowClear: true,
    //     width: "100%",
    //     theme: "bootstrap",
    //     minimumInputLength: 2,
    //     dropdownAutoWidth: true,
    //     placeholder: "",
    //     // tags: [],
    //     ajax: {
    //         url: 'data/masterdata/diagnosis.php',
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         data: function(keyword) {
    //             return {
    //                 keyword: keyword.term
    //             };
    //         },
    //         processResults: function(data) {
    //             return {
    //                 results: $.map(data.data, function(item) {
    //                     return {
    //                         id: item.diagnosisname,
    //                         text: item.diagnosisname + ' ' + ((item.diagnosisname2 != null) ? item.diagnosisname2 : '') + '|' + item.diagnosiscode
    //                     }
    //                 })
    //             };
    //         },

    //     },
    //     templateResult: function(state) {
    //         if (!state.id) {
    //             return state.text;
    //         }

    //         var strState = state.text.split("|");

    //         var $state = $(
    //             '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
    //         );
    //         return $state;
    //     },
    //     templateSelection: function(state) {
    //         if (!state.id) {
    //             return state.text;
    //         }

    //         var strState = state.text.split("|");

    //         var $state = $(
    //             '<span >' + strState[0] + '</span>'
    //         );
    //         return $state;
    //     },
    // });

    $('#bloodborrowdiagnosiss').select2({
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
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.diagnosisid,
                            text: item.diagnosisname + ' ' + ((item.diagnosisname2 != null) ? item.diagnosisname2 : '') + '|' + item.diagnosiscode,
                            item: item
                        }
                    })
                };
            },

        },
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[1] + '</span>'
            );
            return $state;
        },
    }).on("select2:selecting", function (e) {

        // $("#diagnosis").val(e.params.args.data.item.diagnosisid);
        $("#bloodborrowdiagnosis").val(e.params.args.data.item.diagnosisname);

    }).on("select2:clearing", function (e) {

        // $("#diagnosis").val("");
        $("#bloodborrowdiagnosis").val("");

    });

});



var countReq = 0;

function addRowReq(im = []) {
    countReq++;
    var arr;

    var hospitalid = document.getElementById("hospitalid").value;
    var receivingtypeid = document.getElementById("receivingtypeid").value;

    var intrautherinetransfusion = document.getElementById("intrautherinetransfusion").checked;

    // alert(hospitalid);
    // alert(receivingtypeid);

    if (im.length != 0) {
        arr = [{
            bloodstocktypeid: im.bloodstocktypeid,
            bloodstocktypename: im.bloodstocktypename2,
            a_qty: im.a_qty,
            b_qty: im.b_qty,
            o_qty: im.o_qty,
            ab_qty: im.ab_qty,
            cryo_qty: im.cryo_qty,
            rhaa: im.rhaa,
            rhbb: im.rhbb,
            rhoo: im.rhoo,
            rhab: im.rhab
        }];
    } else {
        arr = [{
            bloodstocktypeid: '',
            bloodstocktypename: '',
            a_qty: '',
            b_qty: '',
            o_qty: '',
            ab_qty: '',
            cryo_qty: '',
            rhaa: '',
            rhbb: '',
            rhoo: '',
            rhab: ''
        }];
    }
    var id = $('#tbd_list_borrow tr:last-child').attr('id');
    if (id) {
        id = id.substr(4);
        id = parseInt(id) + 1;
    } else {
        id = 1;
    }


    var event_data = '';

    event_data += '<tr id="trid' + id + '">';
    event_data += '<td class="td-table"   style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td class="td-table" >' + '1' + '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select required  id="bloodstocktypeid' + countReq + '"  name="bloodstocktypeid"  style="width:100%" ';
    event_data += 'value="" class="form-control bloodstocktypeid" onchange="setBloodType(this)"   > '
    event_data += '<option  value=""></option>'

    if (receivingtypeid == "2") {
        $.each(bloodStockTypeArr, function(ind, v) {
            if (v.bloodstocktypeid == "PRC" || v.bloodstocktypeid == "LPRC" || v.bloodstocktypeid == "LDPRC" || v.bloodstocktypeid == "SDR" || v.bloodstocktypeid == "FFP")
                event_data += '<option    value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>'
        })
    } else if (hospitalid == "1") {
        $.each(bloodStockTypeArr, function(ind, v) {
            if (v.bloodstocktypeid == "CRYO" || v.bloodstocktypeid == "CRP" || v.bloodstocktypeid == "FFP" ||
                v.bloodstocktypeid == "LPRC" || v.bloodstocktypeid == "LPRC-O" || v.bloodstocktypeid == "LDPRC" ||
                v.bloodstocktypeid == "PRC" || v.bloodstocktypeid == "SDP" || v.bloodstocktypeid == "LDSDP" || v.bloodstocktypeid == "SDR" ||
                v.bloodstocktypeid == "WB" || v.bloodstocktypeid == "LDPPC_PAS" || v.bloodstocktypeid == "LDSDR" ||
                v.bloodstocktypeid == "PLDPC" || v.bloodstocktypeid == "SDP_PAS")
                event_data += '<option    value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>'
        })
    } else if (hospitalid == "2") {
        $.each(bloodStockTypeArr, function(ind, v) {
            if (v.bloodstocktypeid == "CRYO" || v.bloodstocktypeid == "CRP" || v.bloodstocktypeid == "FFP" ||
                v.bloodstocktypeid == "LPRC" || v.bloodstocktypeid == "LPRC-O" || v.bloodstocktypeid == "LDPRC" ||
                v.bloodstocktypeid == "PRC" || v.bloodstocktypeid == "SDP" || v.bloodstocktypeid == "LDSDP" || v.bloodstocktypeid == "SDR" ||
                v.bloodstocktypeid == "WB" || v.bloodstocktypeid == "LDPPC" || v.bloodstocktypeid == "LDPPC_PAS" || v.bloodstocktypeid == "LDSDR" ||
                v.bloodstocktypeid == "LPPC_PAS" || v.bloodstocktypeid == "PLDPC" || v.bloodstocktypeid == "SDP_PAS")
                event_data += '<option    value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>'
        })
    } else {
        $.each(bloodStockTypeArr, function(ind, v) {
            event_data += '<option value="' + v.bloodstocktypeid + '">' + v.bloodstocktypename2 + '</option>'
        })
    }
    var blood_grp = document.getElementById("borrowbloodgroup").value;
    console.log(blood_grp);

    event_data += ' </select>';
    event_data += '</td>';
    
    if (blood_grp == 'A' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].a_qty != 0) ? arr[0].a_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupA(this)">';
        event_data += '</td>';
    } else {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].a_qty != 0) ? arr[0].a_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupA(this)" readonly >';
        event_data += '</td>';
    }
    event_data += '<td class="td-table" >';
    if (blood_grp == 'A' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<select id="rhaa' + countReq + '" onchange="setRhA(this)" autocomplete="off" class="form-control" style="width:110px"';
        event_data += '><option value=""></option>';
        event_data += '<option value="Rh+">Positive</option>';
        event_data += '<option value="Rh-">Negative</option>';
        event_data += '</select>';
    } else {
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="" ';
        event_data += ' style="width:50px" readonly >';
    }
    event_data += '</td>';
    
    if (blood_grp == 'B' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].b_qty != 0) ? arr[0].b_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupB(this)" >';
        event_data += '</td>';
    } else {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].b_qty != 0) ? arr[0].b_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupB(this)" readonly >';
        event_data += '</td>';
    }
    event_data += '<td class="td-table" >';
    if (blood_grp == 'B' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<select id="rhbb' + countReq + '" onchange="setRhB(this)" autocomplete="off" class="form-control" style="width:110px"';
        event_data += '><option value=""></option>';
        event_data += '<option value="Rh+">Positive</option>';
        event_data += '<option value="Rh-">Negative</option>';
        event_data += '</select>';
    } else {
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="" ';
        event_data += ' style="width:50px" readonly >';
    }
    event_data += '</td>';
    
    if (blood_grp == 'O' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].o_qty != 0) ? arr[0].o_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupO(this)" >';
        event_data += '</td>';
    } else {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].o_qty != 0) ? arr[0].o_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupO(this)" readonly >';
        event_data += '</td>';
    }
    event_data += '<td class="td-table" >';
    if (blood_grp == 'O' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<select id="rhoo' + countReq + '" onchange="setRhO(this)" autocomplete="off" class="form-control" style="width:110px"';
        event_data += '><option value=""></option>';
        event_data += '<option value="Rh+">Positive</option>';
        event_data += '<option value="Rh-">Negative</option>';
        event_data += '</select>';
    } else {
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="" ';
        event_data += ' style="width:50px" readonly >';
    }
    event_data += '</td>';
    
    if (blood_grp == 'AB' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].ab_qty != 0) ? arr[0].ab_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupAB(this)"  >';
        event_data += '</td>';
    } else {
        event_data += '<td class="td-table" >';
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="' + ((arr[0].ab_qty != 0) ? arr[0].ab_qty : '') + '" ';
        event_data += ' style="width:50px" onkeyup="setGroupAB(this)"  readonly>';
        event_data += '</td>';
    }
    event_data += '<td class="td-table" >';
    if (blood_grp == 'AB' || blood_grp == '' || blood_grp == 'ไม่ทราบ' || blood_grp == 'null' || intrautherinetransfusion == true) {
        event_data += '<select id="rhab' + countReq + '" onchange="setRhAB(this)" autocomplete="off" class="form-control" style="width:110px"';
        event_data += '><option value=""></option>';
        event_data += '<option value="Rh+">Positive</option>';
        event_data += '<option value="Rh-">Negative</option>';
        event_data += '</select>';
    } else {
        event_data += '<input  type="number" autocomplete="off"  ';
        event_data += 'class="form-control" value="" ';
        event_data += ' style="width:50px" readonly >';
    }
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + ((arr[0].cryo_qty != 0) ? arr[0].cryo_qty : '') + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupCryo(this)" readonly >';
    event_data += '</td>';
    event_data += '<td class="td-table"   >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';

    $("input,select").bind("keydown", function(event) {
        if (event.which === 13) {
            event.stopPropagation();
            event.preventDefault();
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
        }
    });

    $("#table_list_borrow").append(event_data);

    setDataModalSelectValue('bloodstocktypeid' + countReq, arr[0].bloodstocktypeid, arr[0].bloodstocktypename);
    setNo();

    $('#' + 'bloodstocktypeid' + countReq).select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        tags: true,
        placeholder: '',
    }).on("select2:selecting", function(e) {
        setBloodType(this)
    });

    if (blood_grp == 'AB') {
        $('#rhab' + countReq).val(arr[0].rhab);
    } else if (blood_grp == 'A') {
        $('#rhaa' + countReq).val(arr[0].rhaa);
    } else if (blood_grp == 'B') {
        $('#rhbb' + countReq).val(arr[0].rhbb);
    } else if (blood_grp == 'O') {
        $('#rhoo' + countReq).val(arr[0].rhoo);
    }

}

function loadData(id) {
    console.log("======" + id + "=======");
    $.ajax({
        url: 'data/bloodborrow/bloodborrow.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            if (data.data.length > 0) {
                console.log(data);
                var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
                setInputValue(obj.data[0]);
            }
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setInputValue(data) {
    setHiddenInput();
    setShowInput(data.receivingtypeid);
    $('#bloodborrowid').val(data.bloodborrowid);
    $('#bloodborrowcode').val(data.bloodborrowcode);
    $('#bloodborrowdate').val(getDMY(data.bloodborrowdate));
    $('#bloodborrowtime').val(data.bloodborrowtime);
    $('#bloodborrowhn').val(data.bloodborrowhn);
    $('#patientfullname').val(data.patientfullname);
    $('#rh').val(data.bloodborrowrh);
    $('#patientgender').val(data.patientgender);
    $('#patientage').val(data.patientage);
    $('#patientbloodgroup').val(data.patientbloodgroup);
    $('#bloodborrowdiagnosis').val(data.bloodborrowdiagnosis);
    $('#bloodborrowhct').val(data.bloodborrowhct);
    $('#bloodborrowhb').val(data.bloodborrowhb);
    $('#bloodborrowdateused').val(getDMY(data.bloodborrowdateused));
    $('#bloodborrowantigen').val(data.bloodborrowantigen);
    document.getElementById('phenotypeLable').innerHTML = data.bloodborrowantigen;
    $('#bloodborrowremark').val(data.bloodborrowremark);
    document.getElementById("bloodborrowirradiated").checked = (data.bloodborrowirradiated == 1);
    document.getElementById("bloodborrowhlacrossmatch").checked = (data.bloodborrowhlacrossmatch == 1);
    $('#bloodborrowfor').val(data.bloodborrowfor);

    setDataModalSelectValue('hospitalid', data.hospitalid, data.hospitalname);
    setDataModalSelectValue('receivingtypeid', data.receivingtypeid, data.receivingtypename2);
    setDataModalSelectValue('bloodborrowurgencyid', data.bloodborrowurgencyid, data.bloodborrowurgencyname);
    setDataModalSelectValue('blooddeliveryid', data.blooddeliveryid, data.blooddeliveryname);

    setDataModalSelectValue('bloodborrowdiagnosiss', data.bloodborrowdiagnosiss, data.bloodborrowdiagnosiss + '|' + data.bloodborrowdiagnosiss);
    // $('#bloodborrowdiagnosiss').val(data.bloodborrowdiagnosiss).trigger('change');
    

    setDataModalSelectValue('bloodborrowdoctorid', data.bloodborrowdoctorid, data.doctorname);


    setDataModalSelectValue('borrowbloodgroup', setBloodGroupName(data.borrowbloodgroup), data.borrowbloodgroup);
    setDataModalSelectValue('borrowrh', data.borrowrh, setRhName(data.borrowrh));

    var body = document.getElementById("table_list_borrow").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.each(data.item, function(index, value) {
        addRowReq(value);
    });

    if (data.intrautherinetransfusion == 1){
        document.getElementById("intrautherinetransfusion").checked = true;
    }

}

function setBloodType(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].bloodstocktypeid = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    var chk = item[0].bloodstocktypeid;
    setColunm(self);
    // sameval(chk);

    // console.log(item.bloodstocktypeid)
    // 
    // console.log(chk);
    // alert($(this).closest('#table_list_borrow tbody tr').find('select').val());
    // $('#table_list_borrow tbody tr').each(function() {
    //     bs = $(this).val();
    //     chk = $(this).find('select').val();
    //     console.log(chk)
    //     if(bs == chk){
    //         swal('กรุณาอย่าเลือกซ้ำ');
    //         // $('.bloodstocktypeid').val();    
    //         // $(".bloodstocktypeid").select2("val", "");
    //         // $(".bloodstocktypeid").empty();
    //         $(".bloodstocktypeid").val('')


    //     }
    // })
}


function setGroupA(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].a_qty = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setGroupB(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].b_qty = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setGroupO(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].o_qty = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setGroupAB(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].ab_qty = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setGroupCryo(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].cryo_qty = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRhA(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].rhaa = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRhB(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].rhbb = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRhO(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].rhoo = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRhAB(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].rhab = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setColunm(self) {

    var row = self.parentNode.parentNode;

    var blood_grp = document.getElementById("patientbloodgroup").value.trim();

    if (blood_grp == 'A') {
        row.cells[3].children[0].readOnly = (self.value == "CRYO");
        // row.cells[4].children[0].readOnly = (self.value == "CRYO"); // RH
    } else if (blood_grp == 'B') {
        row.cells[5].children[0].readOnly = (self.value == "CRYO");
        // row.cells[6].children[0].readOnly = (self.value == "CRYO"); // RH
    } else if (blood_grp == 'O') {
        row.cells[7].children[0].readOnly = (self.value == "CRYO");
        // row.cells[8].children[0].readOnly = (self.value == "CRYO"); // RH
    } else if (blood_grp == 'AB') {
        row.cells[9].children[0].readOnly = (self.value == "CRYO");
        // row.cells[10].children[0].readOnly = (self.value == "CRYO"); // RH
    } else {
        row.cells[3].children[0].readOnly = (self.value == "CRYO");
        row.cells[5].children[0].readOnly = (self.value == "CRYO");
        row.cells[7].children[0].readOnly = (self.value == "CRYO");
        row.cells[9].children[0].readOnly = (self.value == "CRYO");

    }
    row.cells[11].children[0].readOnly = (self.value != "CRYO");
}

function scanBarcode() {
    var patient = document.getElementById('bloodborrowhn').value;
    if (patient.length > 0) {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn=' + patient,
            timeout: 3000,
            success: function(data) {

                loadPatient(patient);

            },
            error: function(data) {
                spinnerhide();
                loadPatient(patient)
                console.log('An error occurred.');
                console.log(data);

            },
        });

    } else {
        clearPatient();
    }

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
            if (data.data.length > 0) {
                setPatient(data.data[0]);
                document.getElementById('bloodborrowdiagnosis').focus;
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
                            document.getElementById('bloodborrowhn').value = '';
                            document.getElementById('bloodborrowhn').focus;

                        }
                    });
            }
        },
        error: function(data) {
            clearPatient();
            console.log('An error occurred.');
            console.log(data);
            document.getElementById('bloodborrowhn').value = '';
            document.getElementById('bloodborrowhn').focus;

        },
    });
}


function setPatient(data) {
    $('#patientfullname').val(data.patientfullname);
    $('#patientgender').val(data.patientgender);
    $('#patientage').val(data.patientage);
    $('#patientbloodgroup').val(data.patientbloodgroup);

    setDataModalSelectValue('borrowbloodgroup', setBloodGroupName(data.patientbloodgroup), data.patientbloodgroup);
    setDataModalSelectValue('borrowrh', data.patientrh, setRhName(data.patientrh));

    var data_table = '';
    $('#tbd_list_borrow').html(data_table);

}

function setBloodGroupName(v) {
    var result = v;
    if (v == 'ไม่ทราบ') {
        result = '';
    }
    return result;
}

function setRhName(v) {
    var result = '';
    if (v == 'Rh+') {
        result = 'Positive';
    } else if (v == 'Rh-') {
        result = 'Negative';
    }
    return result;
}

function clearPatient() {
    $('#patientfullname').val('');
    $('#patientgender').val('');
    $('#patientage').val('');
    $('#patientbloodgroup').val('');

    var data_table = '';
    $('#tbd_list_borrow').html(data_table);
}

function setHospital() {
    $('#hospitalid').select2({
        allowClear: true,
        theme: "bootstrap",
        // placeholder: "สาขา",
        width: "100%",
        ajax: {
            url: 'data/masterdata/hospital.php',
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
                            id: item.hospitalid,
                            text: '[' + item.hospitalcode + ']' + ' ' + item.hospitalname
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function(e) {
        setReceivingType(e.params.args.data.id);
        $('#receivingtypeid').val(null).empty();
    }).on("select2:clearing", function(e) {
        setReceivingType();
        $('#receivingtypeid').val(null).empty();
    });
}

function setReceivingType(hospitalid = "") {

    $('#receivingtypeid').select2({
        allowClear: true,
        theme: "bootstrap",
        // placeholder: "ประเภทการรับ",
        width: "100%",
        ajax: {
            url: 'data/masterdata/receivingtype.php?hospitalid=' + hospitalid,
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                    donatebloodtypeid: 2
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.receivingtypeid,
                            text: item.receivingtypename2,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function(e) {
        setHiddenInput();
        setShowInput(e.params.args.data.item.receivingtypeid);
    }).on("select2:clearing", function(e) {
        setHiddenInput();
    });
}



function setBloodBorrowUrgency() {
    $('#bloodborrowurgencyid').select2({
        allowClear: true,
        theme: "bootstrap",
        // placeholder: "ความเร่งด่วน",
        width: "100%",
        ajax: {
            url: 'data/masterdata/bloodborrowurgency.php',
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
                            id: item.bloodborrowurgencyid,
                            text: item.bloodborrowurgencyname
                        }
                    })
                };
            },

        }
    });
}

function setBloodDelivery() {
    $('#blooddeliveryid').select2({
        allowClear: true,
        theme: "bootstrap",
        // placeholder: "การจัดส่งโลหิต",
        width: "100%",
        ajax: {
            url: 'data/masterdata/blooddelivery.php',
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
                            id: item.blooddeliveryid,
                            text: item.blooddeliveryname
                        }
                    })
                };
            },

        }
    });
}

function getBloodStockType() {
    return $.ajax({
        url: 'data/masterdata/bloodstocktype.php',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodStockType_1() {
    return $.ajax({
        url: 'data/masterdata/bloodstocktype_1.php',
        dataType: 'json',
        type: 'get',
    });
}

function getBloodStockType_2() {
    return $.ajax({
        url: 'data/masterdata/bloodstocktype_2.php',
        dataType: 'json',
        type: 'get',
    });
}

function setNo() {

    var rows = document.getElementById("table_list_borrow").rows;
    for (var i = 2; i < rows.length; i++) {
        rows[i].cells[1].innerHTML = i - 1;
    }
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function setDataModalSelectValue(elem = '', itemid, itemtext) {

    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function setDataModalSelectValue_1(elem = '', itemid, itemtext) {

    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function setShowInput(id) {
    if (id == 1 || id == 5 || id == 6 || id == 11) {
        setreceivingtypeid01();
    } else if (id == 2) {
        setreceivingtypeid02();
    } else if (id == 3) {
        setreceivingtypeid03();
    } else if (id == 4) {
        setreceivingtypeid04();
    } else if (id == 12) {
        setreceivingtypeid02();
    }
}

function setHiddenInput() {
    document.getElementById("divbloodborrowurgencyid").style.display = "none";
    document.getElementById("divbloodborrowhn").style.display = "none";
    document.getElementById("divpatientfullname").style.display = "none";
    document.getElementById("divpatientgender").style.display = "none";
    document.getElementById("divpatientage").style.display = "none";
    document.getElementById("divpatientbloodgroup").style.display = "none";
    document.getElementById("divbloodborrowdiagnosiss").style.display = "none";
    document.getElementById("divbloodborrowdiagnosis").style.display = "none";
    document.getElementById("divbloodborrowirradiated").style.display = "none";
    document.getElementById("divbloodborrowhct").style.display = "none";
    document.getElementById("divbloodborrowhb").style.display = "none";
    document.getElementById("divbloodborrowdateused").style.display = "none";
    document.getElementById("divbloodborrowfor").style.display = "none";
    document.getElementById("divbloodborrowremark").style.display = "none";
    document.getElementById("divbloodborrowantigen").style.display = "none";
    document.getElementById("divblooddeliveryid").style.display = "none";

    document.getElementById("divbloodborrowdoctor").style.display = "none";

    document.getElementById("divborrowbloodgroup").style.display = "none";
    document.getElementById("divborrowrh").style.display = "none";

    document.getElementById("divintrautherinetransfusion").style.display = "none";



}

function setreceivingtypeid01() {
    document.getElementById("divbloodborrowantigen").style.display = "block";
}

function setreceivingtypeid02() {
    document.getElementById("divbloodborrowhn").style.display = "block";
    document.getElementById("divpatientfullname").style.display = "block";
    document.getElementById("divpatientgender").style.display = "block";
    document.getElementById("divpatientage").style.display = "block";
    document.getElementById("divbloodborrowdiagnosiss").style.display = "block";
    document.getElementById("divbloodborrowdiagnosis").style.display = "block";
    document.getElementById("divbloodborrowhct").style.display = "block";
    document.getElementById("divbloodborrowhb").style.display = "block";
    document.getElementById("divbloodborrowdateused").style.display = "block";
    document.getElementById("divbloodborrowantigen").style.display = "block";
    document.getElementById("divblooddeliveryid").style.display = "block";
    document.getElementById("divbloodborrowremark").style.display = "block";

    document.getElementById("divbloodborrowdoctor").style.display = "none";

    document.getElementById("divborrowbloodgroup").style.display = "block";
    document.getElementById("divborrowrh").style.display = "block";

    document.getElementById("divintrautherinetransfusion").style.display = "block";
}

function setreceivingtypeid03() {
    document.getElementById("divbloodborrowhn").style.display = "block";
    document.getElementById("divpatientfullname").style.display = "block";
    document.getElementById("divpatientgender").style.display = "block";
    document.getElementById("divpatientage").style.display = "block";
    document.getElementById("divpatientbloodgroup").style.display = "block";
    document.getElementById("divbloodborrowdiagnosiss").style.display = "block";

    document.getElementById("divbloodborrowdiagnosis").style.display = "block";
    document.getElementById("divbloodborrowirradiated").style.display = "block";
    document.getElementById("divbloodborrowhct").style.display = "block";
    document.getElementById("divbloodborrowhb").style.display = "block";
    document.getElementById("divbloodborrowdateused").style.display = "block";
    document.getElementById("divbloodborrowremark").style.display = "block";
    document.getElementById("divbloodborrowantigen").style.display = "none";
    document.getElementById("divblooddeliveryid").style.display = "none";

    document.getElementById("divbloodborrowdoctor").style.display = "none";
}

function setreceivingtypeid04() {
    document.getElementById("divbloodborrowurgencyid").style.display = "block";
    document.getElementById("divbloodborrowhn").style.display = "block";
    document.getElementById("divpatientfullname").style.display = "block";
    document.getElementById("divpatientgender").style.display = "block";
    document.getElementById("divpatientage").style.display = "block";
    document.getElementById("divbloodborrowdiagnosiss").style.display = "block";

    document.getElementById("divbloodborrowdiagnosis").style.display = "block";
    document.getElementById("divbloodborrowfor").style.display = "block";
    document.getElementById("divblooddeliveryid").style.display = "none";

    document.getElementById("divbloodborrowdoctor").style.display = "block";

}

function addRowReq_1(im = []) {
    countReq++;
    var arr;

    var hospitalid = document.getElementById("hospitalid").value;
    var receivingtypeid = document.getElementById("receivingtypeid").value;

    // alert(hospitalid);
    // alert(receivingtypeid);

    if (im.length != 0) {
        arr = [{
            bloodstocktypeid: im.bloodstocktypeid,
            bloodstocktypename: im.bloodstocktypename2,
            a_qty: im.a_qty,
            b_qty: im.b_qty,
            o_qty: im.o_qty,
            ab_qty: im.ab_qty,
            cryo_qty: im.cryo_qty,
            rhaa: im.rhaa,
            rhbb: im.rhbb,
            rhoo: im.rhoo,
            rhab: im.rhab
        }];
    } else {
        arr = [{
            bloodstocktypeid: 'LPRC',
            bloodstocktypename: 'Leukocyte-Poor Packed Red Cells (LPRC)',
            a_qty: lprc_a,
            b_qty: lprc_b,
            o_qty: lprc_o,
            ab_qty: lprc_ab,
            cryo_qty: '',
            rhaa: '',
            rhbb: '',
            rhoo: '',
            rhab: ''
        }];
    }
    var id = $('#tbd_list_borrow tr:last-child').attr('id');
    if (id) {
        id = id.substr(4);
        id = parseInt(id) + 1;
    } else {
        id = 1;
    }


    var event_data = '';

    event_data += '<tr id="trid' + id + '">';
    event_data += '<td class="td-table"   style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td class="td-table" >' + '1' + '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select required  id="bloodstocktypeid' + countReq + '"  name="bloodstocktypeid"  style="width:100%" ';
    event_data += 'class="form-control bloodstocktypeid" onchange="setBloodType(this)">'
    event_data += '<option value="LPRC">Leukocyte-Poor Packed Red Cells (LPRC)</option>'

    var blood_grp = document.getElementById("patientbloodgroup").value;
    console.log(blood_grp);

    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + lprc_a + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupA(this)"  >';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + lprc_b + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupB(this)"  >';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + lprc_o + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupO(this)"  >';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + lprc_ab + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupAB(this)"  >';
    event_data += '</td>';
    event_data += '<td class="td-table" >';

    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + ((arr[0].cryo_qty != 0) ? arr[0].cryo_qty : '') + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupCryo(this)" readonly >';
    event_data += '</td>';

    event_data += '<td class="td-table"   >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';

    $("input,select").bind("keydown", function(event) {
        if (event.which === 13) {
            event.stopPropagation();
            event.preventDefault();
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
        }
    });

    $("#table_list_borrow").append(event_data);

    setNo();

    $('#' + 'bloodstocktypeid' + countReq).select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        tags: true,
        placeholder: '',
    }).on("select2:selecting", function(e) {
        setBloodType(this)
    });
}

function addRowReq_2(im = []) {
    countReq++;
    var arr;

    var hospitalid = document.getElementById("hospitalid").value;
    var receivingtypeid = document.getElementById("receivingtypeid").value;

    // alert(hospitalid);
    // alert(receivingtypeid);

    if (im.length != 0) {
        arr = [{
            bloodstocktypeid: im.bloodstocktypeid,
            bloodstocktypename: im.bloodstocktypename2,
            a_qty: im.a_qty,
            b_qty: im.b_qty,
            o_qty: im.o_qty,
            ab_qty: im.ab_qty,
            cryo_qty: im.cryo_qty,
            rhaa: im.rhaa,
            rhbb: im.rhbb,
            rhoo: im.rhoo,
            rhab: im.rhab
        }];
    } else {
        arr = [{
            bloodstocktypeid: 'PRC',
            bloodstocktypename: 'Packed Red Cells (PRC)',
            a_qty: prc_a,
            b_qty: prc_b,
            o_qty: prc_o,
            ab_qty: prc_ab,
            cryo_qty: '',
            rhaa: '',
            rhbb: '',
            rhoo: '',
            rhab: ''
        }];
    }
    var id = $('#tbd_list_borrow tr:last-child').attr('id');
    if (id) {
        id = id.substr(4);
        id = parseInt(id) + 1;
    } else {
        id = 1;
    }


    var event_data = '';

    event_data += '<tr id="trid' + id + '">';
    event_data += '<td class="td-table"   style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td class="td-table" >' + '1' + '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<select required  id="bloodstocktypeid' + countReq + '"  name="bloodstocktypeid"  style="width:100%" ';
    event_data += 'class="form-control bloodstocktypeid" onchange="setBloodType(this)">'
    event_data += '<option value="PRC">Packed Red Cells (PRC)</option>'

    var blood_grp = document.getElementById("patientbloodgroup").value;
    console.log(blood_grp);

    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + prc_a + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupA(this)"  >';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + prc_b + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupB(this)"  >';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + prc_o + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupO(this)"  >';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + prc_ab + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupAB(this)"  >';
    event_data += '</td>';
    event_data += '<td class="td-table" >';

    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="" ';
    event_data += ' style="width:50px" readonly >';

    event_data += '</td>';
    event_data += '<td class="td-table" >';
    event_data += '<input  type="number" autocomplete="off"  ';
    event_data += 'class="form-control" value="' + ((arr[0].cryo_qty != 0) ? arr[0].cryo_qty : '') + '" ';
    event_data += ' style="width:50px" onkeyup="setGroupCryo(this)" readonly >';
    event_data += '</td>';

    event_data += '<td class="td-table"   >';
    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';

    $("input,select").bind("keydown", function(event) {
        if (event.which === 13) {
            event.stopPropagation();
            event.preventDefault();
            $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();
        }
    });

    $("#table_list_borrow").append(event_data);

    setNo();

    $('#' + 'bloodstocktypeid' + countReq).select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        tags: true,
        placeholder: '',
    }).on("select2:selecting", function(e) {
        setBloodType(this)
    });
}