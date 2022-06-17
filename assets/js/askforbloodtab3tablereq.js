function loadTableReturnBlood(data) {


    var body = document.getElementById("list_table_return_blood").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
    count = data.length.toString();
    var event_data = '';
    $.each(obj, function(index, value) {

        var color = '';
        if (value.requestbloodreturnstatusid == 1) {
            color = '#FFFF66';
        } else if (value.requestbloodreturnstatusid == 2) {
            color = '#FF66B2';
        } else if (value.requestbloodreturnstatusid == 3) {
            color = '#66FF66';
        } else if (value.requestbloodreturnstatusid == 4) {
            color = '#A0A0A0';
        }

        if (value.bloodcc_return == "")
            value.bloodcc_return = value.volume;

        event_data += '';
        event_data += '<tr style="background:' + color + '">';
        event_data += '<td class="td-table"  style="display:none;" >';
        event_data += JSON.stringify(value);
        event_data += '</td>';
        event_data += '<td class="td-table" >';
        

        // event_data += '<button type="button" onclick="setBloodQueuePrint1_1(' + value.requestbloodid + ')"  class="btn btn-success m-l-5">';
        // event_data += '<i class="fa fa-print"></i>';
        // event_data += '</button>';

        if(value.ischeck_return == 1)
        {
            event_data += '<input type="checkbox" checked   >';
        }
        

        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="checkbox" ';
        if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
            event_data += 'onclick="return false;"';
        }
        event_data += 'onchange="setIsCheckRetrn(this)"  ' + ((value.ischeck_return == 1) ? 'checked' : '') + '  >';
        event_data += '</td>';
        event_data += '<td class="td-table">' + (index + 1) + '</td>';
        event_data += '<td class="td-table">';
        if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
            event_data += '<input type="text" readonly class="form-control" onchange="setDateRetrn(this)" value="' + getDMY(value.blooddate_return) + '" >';
        } else {
            event_data += '<input type="text" class="form-control date1" onchange="setDateRetrn(this)" value="' + getDMY(value.blooddate_return) + '" >';
        }
        event_data += '</td>';
        event_data += '<td class="td-table">';
        if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
            event_data += '<input type="text" readonly class="form-control" onchange="setTimeRetrn(this)" value="' + value.bloodtime_return + '"  >';
        } else {
            event_data += '<input type="text" class="form-control" onchange="setTimeRetrn(this)" value="' + value.bloodtime_return + '"  >';
        }
        event_data += '</td>';
        event_data += '<td class="td-table">' + value.bag_number + '</td>';
        event_data += '<td class="td-table">' + value.bloodtype + '</td>';
        event_data += '<td class="td-table">' + '1' + '</td>';
        event_data += '<td class="td-table">';
        if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
            event_data += '<input type="text" readonly class="form-control" onchange="setCCRetrn(this)" value="' + value.bloodcc_return + '" >';
        } else {
            event_data += '<input type="text" class="form-control" onchange="setCCRetrn(this)" value="' + value.bloodcc_return + '" >';
        }
        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="radio" name="warm' + index + '" ';
        if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
            event_data += 'onclick="return false;"';
        }
        event_data += 'onchange="setWarmRetrn(this)"  ' + ((value.warm_retuen == 1) ? 'checked' : '') + ' value="1" >';

        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<input type="radio" name="warm' + index + '" ';
        if (value.requestbloodreturnstatusid == 2 || value.requestbloodreturnstatusid == 3) {
            event_data += 'onclick="return false;"';
        }
        event_data += 'onchange="setWarmRetrn(this)"  ' + ((value.warm_retuen == 2) ? 'checked' : '') + ' value="2" >';

        event_data += '</td>';
        event_data += '<td class="td-table">';
        event_data += '<select disabled  onchange="setRequestBloodStatusRetrn(this)"  ';
        event_data += 'value="1" class="form-control"   > '
        $.each(bloodReturnStatusArr, function(ind, v) {
            event_data += '<option ' + ((value.requestbloodreturnstatusid == v.requestbloodreturnstatusid) ? 'selected' : '') + ' value="' + v.requestbloodreturnstatusid + '">' + v.requestbloodreturnstatusname + '</option>'
        });
        event_data += ' </select>';
        event_data += '</td>';
        event_data += '</tr>';

    });
    $("#list_table_return_blood").append(event_data);
    dateBE('.date1');

}

function setIsCheckRetrn(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.ischeck_return = self.checked;
    item.requestbloodreturnstatusid = (self.checked) ? '2' : '1';
    row.cells[12].getElementsByTagName('select')[0].value = (self.checked) ? '2' : '1';


    if (self.checked) {
        var dateNow = new Date();
        dateNow.setFullYear(dateNow.getFullYear() + 543);
        row.children[4].children[0].value = moment(dateNow).format('DD/MM/YYYY');
        row.children[5].children[0].value = moment(dateNow).format('HH:mm');
        row.style.background = "#FF66B2";

        item.blooddate_return = moment(dateNow).format('YYYY-MM-DD');
        item.bloodtime_return = moment(dateNow).format('HH:mm');
    } else {
        row.children[4].children[0].value = "";
        row.children[5].children[0].value = "";
        row.style.background = "#FFFF66";

        item.blooddate_return = "";
        item.bloodtime_return = "";
    }

    row.cells[4].children[0].required = self.checked;
    row.cells[5].children[0].required = self.checked;
    row.cells[9].children[0].required = self.checked;
    row.cells[10].children[0].required = self.checked;

    row.cells[0].innerHTML = JSON.stringify(item);

}

function setDateRetrn(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.blooddate_return = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setTimeRetrn(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.bloodtime_return = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setCCRetrn(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.bloodcc_return = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setWarmRetrn(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.warm_retuen = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setRequestBloodStatusRetrn(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.requestbloodreturnstatusid = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function findTable3HN(number) {
    var bloodstocktype = $("#findbloodstocktype3").val();
    var rows = document.getElementById("list_table_return_blood").rows;
    for (var i = 2; i < rows.length; i++) {
        var row = rows[i];
        var item = JSON.parse(row.cells[0].innerHTML);

        if (item.bag_number == number && item.bloodtype == bloodstocktype) {
            item.ischeck_return = true;
            item.requestbloodreturnstatusid = 2;


            row.style.background = "#FF66B2";

            row.children[2].children[0].checked = true;
            row.children[12].children[0].value = 2;

            var dateNow = new Date();
            dateNow.setFullYear(dateNow.getFullYear() + 543);
            row.children[4].children[0].value = moment(dateNow).format('DD/MM/YYYY');
            row.children[5].children[0].value = moment(dateNow).format('HH:mm');

            item.blooddate_return = moment(dateNow).format('YYYY-MM-DD');
            item.bloodtime_return = moment(dateNow).format('HH:mm');

            row.cells[4].children[0].required = true;
            row.cells[5].children[0].required = true;
            row.cells[9].children[0].required = true;
            row.cells[10].children[0].required = true;

            row.children[0].innerHTML = JSON.stringify(item);

        }

    }

    $("#findbagnumber3").val("");
    document.getElementById('findbagnumber3').focus();

}