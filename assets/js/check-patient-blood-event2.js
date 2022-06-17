var crosscount = 0;
var crossold = 0;
var countreqcrosslog = 0;
var bloodexp = '0000-00-00';
var crossmatchitemold = '';

var bloodstart = '0000-00-00';

function addRowBlood(im = []) {

    var im = JSON.parse(JSON.stringify(im).replace(/null/g, '""'));

    var confirmbloodgroup_result = $("#confirmbloodgroup").val();
    var confirmrhid_result = $("#confirmrhid").val();
    var bloodsampletube = $("#bloodsampletube").val();
    var isconfirmbloodgroupqueue = $("#isconfirmbloodgroupqueue").val();
    var isreadybloodstatus = $("#isreadybloodstatus").val();

    if (im.length == 0) {
        im = {
            bag_number: "Auto Control",
            sub: "",
            islight: "",
            hlamatch: "",
            bloodgroupid: "",
            rhid: "",
            bloodtype: "",
            ctt_rt: "",
            ctt_37c: "",
            ctt_iat: "",
            ctt_ccc: "",
            cat: "",
            rou: "",
            crossmacthresultid: "",
            crossmacthstatusid: "",
            doctorid: "",
            isbloodpreparation: "",
            requestbloodcrossmacthdatetime: "",
            requestbloodcrossmacthremark: "",
            ispayblood: "",
            payblooddate: "",
            paybloodtime: "",
            payuser: "",
            requestbloodcrossmacthid: "",
            bloodstockid: "",
            bloodgroup: "",
            rhcode: "",
            isautocontrol: "1",
            crossmacthstatus2id: ""

        };
    }


    if (!im.crossmacthstatusid) {


        if (findCrossMatchItemBagnumber(document.getElementById("list_table_tab2_2"), im.bag_number, im.sub)) {
            setTimeout(function() {
                swal({
                        title: "ผลิตภัณฑ์นี้ถูกเพิ่มแล้ว",
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

                        }
                    });
            }, 1000);

            return false;
        }

        if (im.bloodsampletube == 2) {
            im.crossmacthstatusid = 2;
        }

        if (im.bloodtype == "CRYO") {

            console.log("===========findCrossMatchItemQtyCryo============");
            console.log(findCrossMatchItemQtyCryo(document.getElementById('list_table_tab2_2')));
            if (isreadybloodstatus == 1 && findCrossMatchItemQtyCryo(document.getElementById('list_table_tab2_2')) < sum_requestbloodcrossmacthconfirmqty) {
                im.crossmacthstatusid = 4;
            } else if (isreadybloodstatus == 1 && findCrossMatchItemQtyCryo(document.getElementById('list_table_tab2_2')) >= sum_requestbloodcrossmacthconfirmqty) {
                im.crossmacthstatusid = 2;
            } else if (isconfirmbloodgroupqueue == 1 || bloodsampletube == 2) {
                im.crossmacthstatusid = 2;
            } else {
                im.crossmacthstatusid = 1;
            }

            im.crossmacthresultid = 1;


            if (im.isbloodpreparation == undefined || im.isbloodpreparation == '') {
                im.isbloodpreparation = session_staffid;
            }

        }

        /*
        if(im.bloodgroup != confirmbloodgroup_result && im.bloodtype != "CRYO")
        {
            if(bloodsampletube == 2)
            {
                im.crossmacthstatusid = 2;
            }else
            {
                im.crossmacthstatusid = 1;
            }
            
        }else if(im.bloodsampletube == 2)
        {
            im.crossmacthstatusid = 2;
        }else
        {
            im.crossmacthstatusid = 1;
        }
        */
    }

    if (im.requestbloodcrossmacthremark == undefined) {
        im.requestbloodcrossmacthremark = '';
    }

    if (im.ispayblood == undefined) {
        im.ispayblood = '';
    }

    if (im.payblooddate == undefined) {
        im.payblooddate = '';
    }

    if (im.paybloodtime == undefined) {
        im.paybloodtime = '';
    }

    if (im.payuser == undefined) {
        im.payuser = '';
    }

    if (im.requestbloodcrossmacthid == undefined) {
        im.requestbloodcrossmacthid = '';
    }

    if (im.bloodstockid == undefined) {
        im.bloodstockid = '';
    }

    if (im.isautocontrol == undefined) {
        im.isautocontrol = '';
    }

    if (im.isautocontrol == 1) {
        im.sub = '';
    }

    if (im.crossmacthstatus2id == undefined) {
        im.crossmacthstatus2id = '';
    }

    



    // if(
    //     im.bloodtype == 'CRP' ||
    //     im.bloodtype == 'FFP' ||
    //     im.bloodtype == 'LDPPC' ||
    //     im.bloodtype == 'LPPC' ||
    //     im.bloodtype == 'LPPC_PAS' ||
    //     im.bloodtype == 'PC' ||
    //     im.bloodtype == 'SDP' ||
    //     im.bloodtype == 'SDP_PAS'
    //     )
    // {

    //     var crossmacthresultid = "";
    //     if(confirmbloodgroup_result == "A")
    //     {
    //         crossmacthresultid = "4";
    //     }else if(confirmbloodgroup_result == "B")
    //     {
    //         crossmacthresultid = "5";
    //     }else if(confirmbloodgroup_result == "O")
    //     {
    //         crossmacthresultid = "6";
    //     }else if(confirmbloodgroup_result == "AB")
    //     {   
    //         crossmacthresultid = "7";
    //     }

    //     if(!im.crossmacthresultid || im.crossmacthresultid == 0)
    //     im.crossmacthresultid = crossmacthresultid;

    // }

    if (im.receivingtypeid == 2 && im.patienthn == $("#hn").val()) {

    }

    var idUnChecked = (im.requestbloodcrossmacthck == 1 || im.requestbloodcrossmacthck == undefined) ? 'checked' : '';

    var confirmbloodgroup = $("#confirmbloodgroup").val();// เช็ค confirmbloodgroup

    var event_data = '';
    event_data += '<tr style="background-color:' + getColor(im.crossmacthstatusid, im.warm_retuen) + '" >';
    event_data += '<td class="td-table">';
    event_data += '<input type="checkbox"  ' + ((im.isautocontrol != 1) ? idUnChecked : 'disabled') + '  >';
    event_data += '</td>';
    event_data += '<td class="td-table">' + '1' + '</td>';
    event_data += '<td class="td-table"><label>' + im.bag_number + '</label>' + ((im.bloodtype == 'LPPC' || im.bloodtype == 'LPPC_PAS' || im.bloodtype == 'SDP' || im.bloodtype == 'SDP_PAS') ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button style="margin-right: -15px;" type="button" onclick="checkBagNumberLPPC(`' + im.bloodstockid + '`)">...</button>' : '') + '</td>';
    event_data += '<td class="td-table">' + im.sub + '</td>';
    event_data += '<td class="td-table">';
    event_data += '<input type="checkbox" ' + ((im.islight == '1') ? 'checked' : '') + ' >';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<input type="checkbox" ' + ((im.hlamatch == '1') ? 'checked' : '') + ' >';
    event_data += '</td>';
    event_data += '<td class="td-table">' + im.bloodgroup + '</td>';
    event_data += '<td class="td-table">' + im.rhcode + '</td>';
    event_data += '<td class="td-table">' + im.bloodtype + '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataABOCellGroupSerumArr, function(ind, v) {
        event_data += '<option ' + ((im.ctt_rt == v.bloodgroupserumid) ? 'selected' : '') + '  value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataABOCellGroupSerumArr, function(ind, v) {
        event_data += '<option ' + ((im.ctt_37c == v.bloodgroupserumid) ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataABOCellGroupSerumArr, function(ind, v) {
        event_data += '<option ' + ((im.ctt_iat == v.bloodgroupserumid) ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataABOCellGroupSerumArr, function(ind, v) {
        event_data += '<option ' + ((im.ctt_ccc == v.bloodgroupserumid) ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataABOCellGroupSerumArr, function(ind, v) {
        event_data += '<option ' + ((im.cat == v.bloodgroupserumid) ? 'selected' : '') + ' value="' + v.bloodgroupserumid + '">' + v.bloodgroupserumname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<input type="checkbox" ' + ((im.rou == '1') ? 'checked' : '') + ' >';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control" onchange="setStatusCrossmacth(this)"  > '
    event_data += '<option  value=""></option>'
    $.each(dataResult, function(ind, v) {
        event_data += '<option ' + ((im.crossmacthresultid == v.crossmacthresultid) ? 'selected' : '') + '  value="' + v.crossmacthresultid + '">' + v.crossmacthresultname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select  onchange="setColor(this)" onclick="setoldvalue(this)" ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    // ดักสถานะ ย้อนกลับ
    // if (im.crossmacthstatusid == 1 && confirmbloodgroup != ''){
    //     im.crossmacthstatusid = 2;
    // }
    $.each(dataCrossMatchStatus, function(ind, v) {
        event_data += '<option ' + ((im.crossmacthstatusid == v.crossmacthstatusid) ? 'selected' : '') + ' value="' + v.crossmacthstatusid + '">' + v.crossmacthstatusname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control doctorselect2"  onchange="setStatusCrossmacthDoctor(this)"   > '
    event_data += '<option  value=""></option>'
    $.each(dataDoctor, function(ind, v) {
        event_data += '<option ' + ((im.doctorid == v.doctorid) ? 'selected' : '') + '  value="' + v.doctorid + '">' + v.doctorname + '</option>'
    })
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td class="td-table">';
    event_data += '<select    ';
    event_data += 'value="" class="form-control preparationselect2"   > '
    event_data += '<option  value=""></option>'
    $.each(dataPreparation, function(ind, v) {
        event_data += '<option ' + ((im.isbloodpreparation == v.id) ? 'selected' : "") + '  value="' + v.id + '">' + v.name + ' ' + v.surname + '</option>'
    })
    console.log(im.isbloodpreparation);
    event_data += ' </select>';
    event_data += '</td>';
    event_data += '<td>' + ((im.requestbloodcrossmacthdatetime != undefined) ? im.requestbloodcrossmacthdatetime : '') + '</td>';
    event_data += '<td class="td-table">';
    event_data += '<input type="text" class="form-control" value="' + im.requestbloodcrossmacthremark + '"  >';
    event_data += '</td>';
    event_data += '<td class="td-table" style="width:40px">';


    event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';

    event_data += '</td>';
    event_data += '<td class="td-table" style="display:none;">';
    event_data += '<input type="text" class="form-control" value="' + im.ispayblood + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.payblooddate + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.paybloodtime + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.payuser + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.requestbloodcrossmacthid + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.bloodstockid + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.bloodstocktypegroupid + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.isautocontrol + '"  >';
    event_data += '<input type="text" class="form-control" value="' + im.crossmacthstatus2id + '"  >';
    event_data += '</td>';
    event_data += '</tr>';
    $("#list_table_tab2_2").append(event_data);
    setNo1_2('list_table_tab2_2');


    $("#div_list_table_tab2_2").scrollTop($("#list_table_tab2_2")[0].scrollHeight);

    // $('.doctorselect2').select2({
    //     allowClear: true,
    //     theme: "bootstrap",
    //     width: "100%",
    // });


}

function showPageLogCrossMtach() {

    $("#customLogCrossMatchModal").modal("show");
    loadCustomLogCrossMatchModal();

}


function loadCustomLogCrossMatchModal() {
    var requestbloodid = document.getElementById("requestbloodid").value;

    var body = document.getElementById("list_table__cross_match_log_main_json").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.ajax({
        url: 'data/checkbloodpatient/checkbloodpatient-cross-match-log-main.php?requestbloodid=' + requestbloodid,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            console.log(data);


            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            countreqcrosslog = obj.length;

            $.each(obj, function(index, value) {
                setCustomLogCrossMatchModal(value, index);
            });

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setCustomLogCrossMatchModal(value, index) {

    var event_data = '';
    event_data += '';
    event_data += '<tr id="trbloodreqcrosslogblood' + index + '" onclick="setCustomLogCrossMatchLogItem(this,' + value.requestbloodcrossmacthlogmainid + ')" >';
    event_data += '<td style="display:none;"  >';
    event_data += JSON.stringify(value);
    event_data += '</td>';
    event_data += '<td>' + getDMYHM(value.requestbloodcrossmacthlogmaindate) + '</td>';
    event_data += '<td>' + value.requestbloodcrossmacthlogmainuser + '</td>';
    event_data += '</tr>';

    $("#list_table__cross_match_log_main_json").append(event_data);

}

function setCustomLogCrossMatchLogItem(self, requestbloodcrossmacthlogmainid) {
    for (i = 0; i < countreqcrosslog; i++) {

        document.getElementById("trbloodreqcrosslogblood" + i).style.background = "#FFF";

    }

    self.style.background = "#b7e4eb";
    loadCustomLogCrossMatchLogModal(requestbloodcrossmacthlogmainid);
}

function loadCustomLogCrossMatchLogModal(requestbloodcrossmacthlogmainid) {

    var body = document.getElementById("list_table__cross_match_log_json").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $.ajax({
        url: 'data/checkbloodpatient/checkbloodpatient-cross-match-log.php?requestbloodcrossmacthlogmainid=' + requestbloodcrossmacthlogmainid,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            console.log(data);


            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '';
                event_data += '<tr  >';
                event_data += '<td style="display:none;"  >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.bag_number + '</td>';
                event_data += '<td>' + value.sub + '</td>';
                event_data += '<td>' + value.islight + '</td>';
                event_data += '<td>' + value.hlamatch + '</td>';
                event_data += '<td>' + value.bloodgroupid + '</td>';
                event_data += '<td>' + value.rhcode + '</td>';
                event_data += '<td>' + value.bloodtype + '</td>';

                event_data += '<td>' + value.bloodgroupserumname_rt + '</td>';
                event_data += '<td>' + value.bloodgroupserumname_37c + '</td>';
                event_data += '<td>' + value.bloodgroupserumname_iat + '</td>';
                event_data += '<td>' + value.bloodgroupserumname_ccc + '</td>';
                event_data += '<td>' + value.bloodgroupserumname_cat + '</td>';

                event_data += '<td>' + value.rou + '</td>';

                event_data += '<td>' + value.crossmacthresultname + '</td>';
                event_data += '<td>' + value.crossmacthstatusname + '</td>';
                event_data += '<td>' + value.doctorname + '</td>';

                event_data += '<td>' + value.staff_name + '</td>';

                event_data += '<td>' + value.requestbloodcrossmacthdatetime + '</td>';

                event_data += '<td>' + value.requestbloodcrossmacthremark + '</td>';

                event_data += '</tr>';


            });
            $("#list_table__cross_match_log_json").append(event_data);

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}



function findCrossMatchItemQty(table, data) {

    var status = false;
    var r = 2;

    var count = 0;
    while (row = table.rows[r++]) {
        if (row.children[22].children[6].value == bloodstocktypegroupid) {
            count++;
        }

    }

    if (count >= bloodstocktypeqty) {
        status = true;
    }

    if (status) {
        setTimeout(function() {
            swal({
                    title: "crossmatch มากกว่าจำนวนที่ขอ ต้องการเพิ่มถุงเลือดหรือไม่",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    allowOutsideClick: false,
                },
                function(inputValue) {
                    if (inputValue) {
                        addRowBlood(data);
                    }
                });
        }, 1000);
    } else {
        addRowBlood(data);
    }

}


function findCrossMatchItemQtyCryo(table) {

    var r = 2;

    var count = 0;
    while (row = table.rows[r++]) {
        if (row.children[8].innerHTML == 'CRYO') {
            count++;
        }

    }

    return count;

}


function findCrossMatchItemPrintView(table) {

    var bag_number_gr = "";
    var r = 2;
    var count = 0;
    while (row = table.rows[r++]) {
        if (row.children[0].children[0].checked)
            bag_number_gr += row.children[22].children[4].value + ",";

    }

    return lastString(bag_number_gr);

}

function findCrossMatchItemPrint(table) {

    var bag_number_gr = "";
    var r = 2;
    var count = 0;
    while (row = table.rows[r++]) {
        if (row.children[0].children[0].checked && row.children[8].innerHTML != 'CRYO')
            bag_number_gr += row.children[22].children[4].value + ",";

    }

    return lastString(bag_number_gr);

}

function findCrossMatchItemPrintCryo(table) {

    var bag_number_gr = "";
    var r = 2;
    var count = 0;
    while (row = table.rows[r++]) {
        console.log(row.children[8].innerHTML);
        if (row.children[0].children[0].checked && row.children[8].innerHTML == 'CRYO')
            bag_number_gr += row.children[22].children[4].value + ",";

    }

    return lastString(bag_number_gr);

}

function findCrossMatchItemPrintClear(table) {
    var r = 2;
    while (row = table.rows[r++]) {
        row.children[0].children[0].checked = false;
    }

}


function findCrossMatchItemBagnumber(table, bag_number = "", sub = "") {

    var status = false;
    var r = 2;
    var v = bloodstocktypecode;

    while (row = table.rows[r++]) {
        var bt = row.children[8].innerHTML;
        var v_statusid = row.children[16].children[0].value;
        if(v_statusid != 10)
        if (v == 'LPRC' || v == 'LDPRC' || v == 'PRC' || v == 'SDR' || v == 'LDSDR') {
            if ((bt == 'LPRC' || bt == 'LDPRC' || bt == 'PRC' || bt == 'SDR' || bt == 'LDSDR') && row.children[2].children[0].innerHTML == bag_number && row.children[3].innerHTML == sub)
                status = true
        } else if (v == 'PC' || v == 'LPPC' || v == 'SDP' || v == 'LDSDP' || v == 'SDP_PAS' || v == 'LDPPC' || v == 'LDPPC_PAS' || v == 'LPPC_PAS' || v == 'PLDPC') {
            if ((bt == 'PC' || bt == 'LPPC' || bt == 'SDP' || bt == 'LDSDP' || bt == 'SDP_PAS' || bt == 'LDPPC' || bt == 'LDPPC_PAS' || bt == 'LPPC_PAS' || bt == 'PLDPC') && row.children[2].children[0].innerHTML == bag_number && row.children[3].innerHTML == sub)
                status = true
        } else if (v == 'FFP' || v == 'CRP') {
            if ((bt == 'FFP' || bt == 'CRP') && row.children[2].children[0].innerHTML == bag_number && row.children[3].innerHTML == sub)
                status = true
        } else if (v == 'CRYO' || v == 'HTFDC') {
            if ((bt == 'CRYO' || bt == 'HTFDC') && row.children[2].children[0].innerHTML == bag_number && row.children[3].innerHTML == sub)
                status = true
        }

    }


    return status;

}

function bagNumberFormat() {
    var bag_number = $('#bag_number').val();
    var bag_number_new = numnerPoint(bag_number);
    $('#bag_number').val(bag_number_new);
}

function scanBlood() {
    var bloodtype = bloodstocktypecode;
    if (bloodtype == '') {
        function myFunction() {
            swal({
                    title: "กรุณาเลือก\n TYPE OF REQUEST",
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

                    }
                });
        }

        setTimeout(myFunction, 500)



    } else {
        var confirmbloodgroup = $("#confirmbloodgroup").val();
        var confirmrhid = $("#confirmrhid").val();
        console.log("=======================");
        console.log(confirmbloodgroup);
        console.log(confirmrhid);
        if (confirmbloodgroup == '' || confirmrhid == '' || confirmbloodgroup == 0 || confirmrhid == 0) {
            function myFunction() {
                swal({
                        title: "ยังไม่ลงผลหมู่เลือดหรือRh",
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
                            document.getElementById('bag_number').focus;
                        }
                    });
            }
            setTimeout(myFunction, 500)
            return false;
        }

        document.getElementById('bag_number').value = document.getElementById('bag_number').value.trim();
        var bag_number = document.getElementById('bag_number').value;
        if (bag_number.length > 0) {
            spinnershow();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data/bloodstock/getbagnumber.php?bag_number=' + bag_number + '&bloodtype=' + bloodtype,
                complete: function() {
                    var delayInMilliseconds = 200;
                    setTimeout(function() {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function(data) {
                    if (data.data.length > 0) {
                        var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                        checkBloodOrderExp(obj);
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
                                if (inputValue) {
                                    document.getElementById('bag_number').focus;
                                }
                            });
                    }
                    document.getElementById('bag_number').value = '';
                    document.getElementById('bag_number').focus;

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                    document.getElementById('bag_number').value = '';
                    document.getElementById('bag_number').focus;
                },
            });
        }


    }


}

function checkBloodOrderExp(data) {

    var date = new Date();
    date.setFullYear(date.getFullYear() + 543);
    var date1 = bloodexp.replace(/-/g, '');
    var date2 = moment(date).format('YYYYMMDD');


    console.log("******date********");
    console.log(date1);
    console.log(date2);

    if (parseInt(date1) < parseInt(date2)) {
        swal({
                title: "เกินวันที่ต้องการใช้เลือดแล้ว",
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
                    document.getElementById('bag_number').focus;
                }
            });
    } else {
        checkBloodNowDate(data);
    }


}


function checkBloodNowDate(data) {

    console.log(data.statusexp);
    if (parseInt(data.statusexp) < 0) {
        swal({
                title: "ผลิตภัณฑ์เลือดนี้มีวันหมดอายุแล้ว",
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
                    document.getElementById('bag_number').focus;
                }
            });
    } else {
        checkBloodNowExp(data);
    }


}


function checkBloodNowExp(data) {

    var date1 = data.bloodexp.replace(/-/g, '');
    var date2 = bloodstart.replace(/-/g, '');

    console.log("******date********");
    console.log(date1);
    console.log(date2);

    if (parseInt(date1) < parseInt(date2)) {
        swal({
                title: "ผลิตภัณฑ์เลือดนี้มีวันหมดอายุก่อนช่วงวันที่ใช้เลือด",
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
                    document.getElementById('bag_number').focus;
                }
            });
    } else {
        checkBlood(data);
    }


}

function checkBlood(data) {
    console.log("====check blood========" + data.bloodrh);
    if ((($("#confirmbloodgroup").val() == data.bloodgroup) && ($("#confirmrhid").val() == data.bloodrh || data.bloodrh == "Rh-")) || data.bloodtype == "CRYO") {
        checkBloodExp(data);
    } else {

        if ($("#confirmbloodgroup").val() != data.bloodgroup && $("#confirmrhid").val() != data.bloodrh) {
            swal({
                    title: "หมู่เลือด/Rh ของผู้ป่วย กับ หมู่เลือด/Rh ของถุงเลือดไม่ตรงกัน ต้องการเตรียมเลือดให้ผู้ป่วยหรือไม่",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    allowOutsideClick: false,

                },
                function(inputValue) {
                    if (inputValue) {
                        checkBloodExp(data);
                    }
                });
        } else if ($("#confirmrhid").val() != data.bloodrh) {
            swal({
                    title: "Rh ของผู้ป่วยกับ Rh ของถุงเลือดไม่ตรงกัน ต้องการเตรียมเลือดให้ผู้ป่วยหรือไม่",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    allowOutsideClick: false,

                },
                function(inputValue) {
                    if (inputValue) {
                        checkBloodExp(data);
                    }
                });
        } else {
            swal({
                    title: "หมู่เลือดของผู้ป่วยกับหมู่เลือดของถุงเลือดไม่ตรงกัน ต้องการเตรียมเลือดให้ผู้ป่วยหรือไม่",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    allowOutsideClick: false,

                },
                function(inputValue) {
                    if (inputValue) {
                        checkBloodExp(data);
                    }
                });
        }

    }

}

function checkBloodExp(data) {

    var date1 = data.bloodexp.replace(/-/g, '');
    var date2 = bloodexp.replace(/-/g, '');

    if (parseInt(date1) < parseInt(date2)) {

        setTimeout(function() {
            swal({
                    title: "ผลิตภัณฑ์เลือดมีวันหมดอายุอยู่ในช่วงวันที่จอง",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: false,
                    closeOnCancel: true,


                },
                function(inputValue) {
                    if (inputValue) {
                        setBloodRare(data);
                    }
                });
        }, 1000);
    } else {
        setBloodRare(data);
    }
}

function addRowBlood2(data) {
    if ((($("#confirmbloodgroup").val() == data.bloodgroup) && ($("#confirmrhid").val() == data.bloodrh || data.bloodrh == 'Rh-')) || data.bloodtype == 'CRYO') {
        swal.close();
        setBloodRare(data);
    } else {
        setTimeout(function() {
            swal({
                    title: "หมู่เลือดของผู้ป่วยกับหมู่เลือดของถุงเลือดไม่ตรงกันต้องการเตรียมเลือดให้ผู้ป่วยหรือไม่",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    allowOutsideClick: false,
                },
                function(inputValue) {
                    if (inputValue) {
                        findCrossMatchItemQty(document.getElementById('list_table_tab2_2'), data);
                    }
                });
        }, 1000);

    }

}

function setBloodRare(data) {
    swal.close();
    if (data.receivingtypeid == 2 && data.patienthn != $("#hn").val()) {
        setTimeout(function() {
            swal({
                    title: "เลือดถุงนี้เป็นการเบิกเลือดหายากของ HN " + data.patienthn + " ต้องการเตรียมเลือดถุงนี้ให้ผู้ป่วยหรือไม่",
                    type: 'warning',
                    // inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
                    showCloseButton: true,
                    showCancelButton: true,

                    // dangerMode: true,
                    cancelButtonClass: "",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "ตกลง",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    allowOutsideClick: false,
                },
                function(inputValue) {
                    if (inputValue) {
                        findCrossMatchItemQty(document.getElementById('list_table_tab2_2'), data);
                    }
                });
        }, 1000);
    } else {
        findCrossMatchItemQty(document.getElementById('list_table_tab2_2'), data);
    }
}


function setStatusCrossmacth(self) {
    var row = self.parentNode.parentNode;
    var statusid = "0";
    var confirmbloodgroup_result = $("#confirmbloodgroup").val();
    var confirmrhid_result = $("#confirmrhid").val();
    var bloodsampletube = $("#bloodsampletube").val();
    var isconfirmbloodgroupqueue = $("#isconfirmbloodgroupqueue").val();
    var bloodtype = row.cells[8].innerHTML;
    var bloodgroup = row.cells[6].innerHTML;
    var rh = row.cells[7].innerHTML;
    var isAutoControl = row.cells[22].children[7].value; // Auto Control

    if (self.value == 1 || self.value == 2 || self.value == 3 || self.value == 4 || self.value == 5 || self.value == 6 || self.value == 7) {
        statusid = "1";
    } else if (self.value == 8) {
        statusid = "10";
    }

    if (bloodsampletube == 2) {
        if (row.cells[6].innerHTML != confirmbloodgroup_result && row.cells[8].innerHTML != 'CRYO') {
            statusid = "3";
        }else if (row.cells[7].innerHTML != getRhData(confirmrhid_result) && row.cells[8].innerHTML != 'CRYO') {
            statusid = "3";
        } else if (self.value == 2 || self.value == 3) {
            statusid = "3";
        } else if (self.value == 1) {
            statusid = "2";
        }
    } else {
        if (isconfirmbloodgroupqueue != 1) {
            statusid = "1";
        } else if (row.cells[6].innerHTML != confirmbloodgroup_result && row.cells[8].innerHTML != 'CRYO' || self.value == 2 || self.value == 3) {
            statusid = "3";
        } else if (isconfirmbloodgroupqueue == 1) {
            statusid = "2";
        } else {
            statusid = "1";
        }
    }


    if (
        bloodtype == 'CRP' ||
        bloodtype == 'FFP' ||
        bloodtype == 'LDPPC' ||
        bloodtype == 'LDPPC_PAS' ||
        bloodtype == 'LPPC' ||
        bloodtype == 'LPPC_PAS' ||
        bloodtype == 'PLDPC' ||
        bloodtype == 'PC' ||
        bloodtype == 'SDP' ||
        bloodtype == 'SDP_PAS' ||
        bloodtype == 'WB' ||
        bloodtype == 'CRYO' ||
        bloodtype == 'HTFDC'
    ) {


        var bgl = "";
        if (self.value == "4") {
            bgl = "A";
        } else if (self.value == "5") {
            bgl = "B";
        } else if (self.value == "6") {
            bgl = "O";
        } else if (self.value == "7") {
            bgl = "AB";
        }

        if (self.value == 1) {
            if (bloodsampletube == 2 || isconfirmbloodgroupqueue == 1) {
                statusid = "2";
            } else {
                statusid = "1";
            }

        } else if (self.value == 2 || self.value == 3) {
            statusid = "3";
        } else if (confirmbloodgroup_result != bgl) {
            statusid = "3";
        } else {

            if (bloodsampletube == 2 || isconfirmbloodgroupqueue == 1) {
                statusid = "2";
            } else {
                statusid = "1";
            }

        }

    }

    if (self.value == 8) {
        statusid = "10";
    }

    if (isAutoControl == 1) {
        statusid = "";
    }


    row.cells[18].getElementsByTagName('select')[0].value = session_staffid;

    if (row.cells[16].getElementsByTagName('select')[0].value != 9) {
        row.cells[16].getElementsByTagName('select')[0].value = statusid;
        row.style.backgroundColor = getColor(statusid);
    }

}

function getRhData(v)
{
    var result = '';
    if(v == 'Rh+')
    {
        result = '+';
    }else if(v == 'Rh-')
    {
        result = '-';
    }
    return result;
}

function setStatusCrossmacthDoctor(self) {


    var row = self.parentNode.parentNode;
    var statusid = "0";
    if (self.value != 0 || self.value != "") {
        statusid = "2";

        if (crossold == 0)
            crossold = row.cells[16].getElementsByTagName('select')[0].value;
    } else {
        statusid = crossold;
    }

    row.cells[16].getElementsByTagName('select')[0].value = statusid;
    row.style.backgroundColor = getColor(statusid);
}

function checkBagNumberLPPC(id = "") {

    spinnershow();
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/checkbloodpatient/checkbloodpatient-lppc.php?id=' + id,
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {

            var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));

            var textBagNumber = "";
            var titleBagNumber = "ไม่พบรายละเอียด";

            if (obj.pc_1 != "") {
                textBagNumber += obj.pc_1 + '\n';
            }

            if (obj.pc_2 != "") {
                textBagNumber += obj.pc_2 + '\n';
            }

            if (obj.pc_3 != "") {
                textBagNumber += obj.pc_3 + '\n';
            }

            if (obj.pc_4 != "") {
                textBagNumber += obj.pc_4 + '\n';
            }

            if (obj.ffp_5 != "") {
                textBagNumber += obj.pc_5 + '\n';
            }

            if (textBagNumber != "") {
                titleBagNumber = "หมายเลขถุง";
            }

            swal({
                    title: titleBagNumber,
                    text: textBagNumber,
                    showCloseButton: false,
                    showCancelButton: false,
                    // dangerMode: true,
                    confirmButtonClass: "btn-success",
                    confirmButtonClass: "",
                    confirmButtonText: "ปิด",
                    closeOnConfirm: true
                },
                function(inputValue) {
                    if (inputValue) {

                    }
                });
        },
        error: function(data) {
            console.log('An error occurred.');
        },
    });


}

function setUnChecked(checkedState) {
    var rows = document.getElementById("list_table_tab2_2").rows;
    for (var i = 2; i < rows.length; i++) {
        if (rows[i].cells[22].children[7].value != 1)
            rows[i].cells[0].children[0].checked = checkedState;
    }
}


function setDataModalSelectValue(elem = '', itemid, itemtext) {

    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}