function showPrinterSettingModal() {

    var body = document.getElementById("list_table_printer_setting_activity").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    $("#customPrinterSettingModal").modal("show");

    var printers = getPrintterSetting();

    $.each(printers, function(index, value) {
        addPrinterSetting(value[0].clientname,value[0].printername);
    });
    

}

function savePrinterSetting()
{
    $(".myAlert-top").show();
    setTimeout(function() {
        $(".myAlert-top").hide();
    }, 5000);

    var printer_setting_array = findTablePrinterSetting(document.getElementById("list_table_printer_setting_activity"));
    localStorage.setItem("printers", JSON.stringify(printer_setting_array));

    setPrintName();

}


function addPrinterSetting(clientname="",printersettingname="")
{
    var event_data = '';
    event_data += '<tr>';

    event_data += '<td class="td-table" style="width:60px">';
    event_data += '';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  class="form-control" value="'+clientname+'">';
    event_data += '</td>';

    event_data += '<td class="td-table" >';
    event_data += '<input  class="form-control" value="'+printersettingname+'">';
    event_data += '</td>';

    event_data += '<td class="td-table" style="width:40px">';
    event_data += '<button type="button" onclick="deletePrinterSettingRow(this)" class="btn btn-danger btn-sm"> ';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>';
    event_data += '</td>';
    event_data += '</tr>';

    $("#list_table_printer_setting_activity").append(event_data);
    setPrinterSettingNo();
}

function deletePrinterSettingRow(btn) {
    var row = btn.parentNode.parentNode;

    row.parentNode.removeChild(row);
    setPrinterSettingNo();
}

function setPrinterSettingNo() {

    var rows = document.getElementById("list_table_printer_setting_activity").rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[0].innerHTML = i ;
    }
}


function findTablePrinterSetting(table) {
    var arrCell = [];
    var arrRow = [];
    var r = 1;
    while (row = table.rows[r++]) {
        arrCell = realMerge(arrCell, [{
            clientname: row.cells[1].children[0].value,
            printername: row.cells[2].children[0].value
        }]);

        arrRow.push(arrCell);
        arrCell = [];
    }
    return arrRow;
}
