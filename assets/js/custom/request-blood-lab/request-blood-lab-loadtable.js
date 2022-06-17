var count = 0;
var count_tab2 = 0;

function loadCheckRequestTab1() {

    var hn = document.getElementById("hn").value;
    $.ajax({
        url: 'data/checkrequest/checkrequest.php?hn=' + hn,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("lab_check_request_modal_tab1").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            count = obj.length;
            var event_data = '';
            $.each(obj, function(index, value) {


                event_data += '';
                event_data += '<tr id="trblood' + (index) + '" onClick="chActive(' + (index) + ',this)" >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + getDMY(value.labsenddatetime) + '</td>';
                event_data += '<td>' + value.patientan + '</td>';
                event_data += '<td >' + value.fn + '</td>';
                event_data += '<td>' + value.vn + '</td>';
                event_data += '<td>' + value.doctorname + '</td>';
                event_data += '<td>' + value.labunitroomname + '</td>';

                event_data += '</tr>';

            });
            $("#lab_check_request_modal_tab1").append(event_data);

            if (obj.length == 0) {
                swal({
                        title: "ยังไม่มีการส่งตรวจจากเวชระเบียน",
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
                        if (inputValue) {}
                    });
            }
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}
var count_0 = 0;

function loadCheckRequestTab2() {

    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var hn = document.getElementById("hn").value;
    ///////////////////////////////////////////////////////////////////////////////
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'api/get_lisrequest.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate,
        success: function(data) {
            console.log(data);
            load_lab_check_request_table();
        }
    });
    /////////////////////////////////////////////////////////////////////////////////

}

function load_lab_check_request_table() {
    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var hn = document.getElementById("hn").value;
    $.ajax({
        url: 'data/checkrequest/checkrequest-accepted.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("lab_check_request_modal_tab2").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            count_tab2 = obj.length;
            var event_data = '';
            $.each(obj, function(index, value) {


                event_data += '';
                event_data += '<tr id="trblood_tab2' + (index) + '" onClick="ch2Active(' + (index) + ',this)" >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + getDMY(value.labsenddatetime) + '</td>';
                event_data += '<td>' + value.patientan + '</td>';
                event_data += '<td>' + value.checkresultbloodstatusname + '</td>';
                event_data += '<td>' + value.labunitroomname + '</td>';

                event_data += '</tr>';

            });
            $("#lab_check_request_modal_tab2").append(event_data);

            $("#trblood_tab20").trigger('click');
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadCheckRequestTab2_item1(labid = "") {

    var body = document.getElementById("lab_check_request_modal_tab2_item1").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    event_data += '<tr >';
    event_data += '<td>EDTA blood</td>';
    event_data += '<td>' + labid + '</td>';
    event_data += '</tr>';

    $("#lab_check_request_modal_tab2_item1").append(event_data);
}

function loadCheckRequestTab2_item2(id) {

    $.ajax({
        url: 'data/checkrequest/checkrequest-accepted-item2.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("lab_check_request_modal_tab2_item2").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            // count = obj.length ;
            var event_data = '';
            item_lab_edit_tab_2_item2 = obj;
            $.each(obj, function(index, value) {


                event_data += '';
                event_data += '<tr >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + value.labformname + '</td>';

                event_data += '</tr>';

            });
            $("#lab_check_request_modal_tab2_item2").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadMaintenanceright(item) {
    var body = document.getElementById("lab_check_request_modal_tab1_2").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    event_data += '<tr id="trbloodmaintenanceright0" onClick="chActiveMaintenanceright(0,this)" >';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(item);
    event_data += '</td>';
    event_data += '<td>' + item.maintenancerightname + '</td>';
    event_data += '<td >1</td>';

    event_data += '</tr>';

    $("#lab_check_request_modal_tab1_2").append(event_data);
}


function loadLabForm(labformtypeid = "1") {
    item_lab_form = '';
    $.ajax({
        url: 'data/masterdata/labform.php?labformtypeid=' + labformtypeid,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("lab_form_bloodbank_modal").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '';
                event_data += '<tr >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td >';
                event_data += '<input type="checkbox"  onchange="setIsCheck(this)"  ' + ((value.ischeck_return == 1) ? 'checked' : '') + '  >';
                event_data += '</td>';
                event_data += '<td>' + value.labformcode + '</td>';
                event_data += '<td style="text-align: left">' + value.labformname + '</td>';
                event_data += '<td>' + numberWithCommas(value.price) + '</td>';

                event_data += '</tr>';

            });
            $("#lab_form_bloodbank_modal").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}


function setLabFormToItemList(state = "add") {
    labFormModalClose();
    var event_data = '';
    var item;

    if (state == "edit") {
        var body = document.getElementById("request_blood_lab").getElementsByTagName('tbody')[0];
        while (body.firstChild) {
            body.removeChild(body.firstChild);
        }

        item = item_lab_edit_tab_2_item2;
        $.each(item, function(index, value) {

            value.price

            event_data += '';
            event_data += '<tr >';
            event_data += '<td  style="display:none;" >';
            event_data += JSON.stringify(value);
            event_data += '</td>';
            event_data += '<td>1</td>';
            event_data += '<td style="text-align: left">' + value.labformname + '</td>';
            event_data += '<td style="text-align: left">EDTA blood</td>';
            event_data += '<td style="text-align: right">' + numberWithCommas(value.labcheckrequestitemprice) + '</td>';
            event_data += '<td style="text-align: right">' + numberWithCommas(value.labcheckrequestitemwiden) + '</td>';
            event_data += '<td style="text-align: left">Blood Bank</td>';
            event_data += '<td class="td-table" style="width:40px">';
            event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
            event_data += '<i class="fa fa-trash"></i>';
            event_data += '</button>';
            event_data += '</td>';
            event_data += '</tr>';


        });
    } else {

        item = getLabFrom();
        $.each(item, function(index, value) {

            if (value.ck == 1) {
                value.labcheckrequestitemprice = value.price
                value.labcheckrequestitemwiden = value.price

                event_data += '';
                event_data += '<tr >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>1</td>';
                event_data += '<td style="text-align: left">' + value.labformname + '</td>';
                event_data += '<td style="text-align: left">EDTA blood</td>';
                event_data += '<td style="text-align: right">' + numberWithCommas(value.price) + '</td>';
                event_data += '<td style="text-align: right">' + numberWithCommas(value.price) + '</td>';
                event_data += '<td style="text-align: left">Blood Bank</td>';
                event_data += '<td class="td-table" style="width:40px">';
                event_data += '<button type="button" onclick="deleteRow(this)" class="btn btn-danger btn-sm"> ';
                event_data += '<i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';
            }

        });
    }


    $("#request_blood_lab").append(event_data);
    setNo();
    var itemLabFromRequestBloodLab = getLabFromRequestBloodLab();
    var amount = 0;
    $.each(itemLabFromRequestBloodLab, function(index, value) {
        amount += parseFloat(value.labcheckrequestitemwiden);
    });
    document.getElementById("labamount").value = numberWithCommas(amount);

}



function getLabFrom() {
    var arr = [];
    var rows = document.getElementById("lab_form_bloodbank_modal").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(JSON.parse(rows[i].cells[0].innerHTML));
    }
    return arr;

}

function getLabFromRequestBloodLab() {
    var arr = [];
    var rows = document.getElementById("request_blood_lab").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(JSON.parse(rows[i].cells[0].innerHTML));
    }
    return arr;

}