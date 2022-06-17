function loadTable() {


    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());


    $.ajax({
        url: 'data/blood/blood-tracking-letter-sms.php?fromdate=' + fromdate +
            "&todate=" + todate,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_blood_tracking_letter").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';

            $("#blood-tracking-letter").text(data.total);
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {
                var address = '';
                if (value.issendletter == '2') {
                    if (value.address_current != "")
                        address = address + ' บ้านเลขที่ ' + value.address_current;

                    if (value.address_moo_current != "")
                        address = address + ' หมู่ที่ ' + value.address_moo_current;

                    if (value.address_alley_current != "")
                        address = address + ' ซอย ' + value.address_alley_current;

                    if (value.address_street_current != "")
                        address = address + ' ถนน ' + value.address_street_current;

                    address = address + value.address2_current;
                } else {
                    if (value.address != "")
                        address = address + ' บ้านเลขที่ ' + value.address;

                    if (value.address_moo != "")
                        address = address + ' หมู่ที่ ' + value.address_moo;

                    if (value.address_alley != "")
                        address = address + ' ซอย ' + value.address_alley;

                    if (value.address_street != "")
                        address = address + ' ถนน ' + value.address_street;

                    address = address + ' ' + value.address2;
                }

                var arr = [value];
                event_data += '<tr>';
                event_data += '<td class="td-table"  style="display:none;" >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input checked type="checkbox"   >';
                event_data += '</td>';
                event_data += '<td class="td-table">' + value.donorcode + '</td>';
                event_data += '<td class="td-table" style="text-align: left">' + value.fullname + '</td>';
                event_data += '<td class="td-table" style="text-align: left" >' + address + '</td>';
                // event_data += '<td class="td-table">' + value.provinceth + '</td>';
                event_data += '<td class="td-table">' + value.donormobile + '</td>';
                event_data += '<td class="td-table">' + value.donoremail + '</td>';
                event_data += '<td class="td-table">' + value.donorage + '</td>';
                event_data += '<td class="td-table">' + value.blood_group + '</td>';
                event_data += '<td class="td-table">' + getDMY(value.donation_date) + '</td>';
                event_data += '<td class="td-table">' + value.donation_qty + '</td>';

                event_data += '</tr>';
            });
            $("#list_table_blood_tracking_letter").append(event_data);

            dateBE('.date1');
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}


function print01() {
    var id = lastString(getDonationTrackingLetter());
    printJS({
        printable: localurl + "/report/blood-donation-tracking-sms.php?id=" + id,
        type: 'pdf',
        showModal: true
    });

}

function print01Excel() {
    var id = lastString(getDonationTrackingLetter());
    window.open(localurl + "/report/blood-donation-tracking-sms-excel.php?id=" + id);
    // printJS( localurl+"/report/blood-donation-tracking-sms-excel.php?id="+id);

}



function getDonationTrackingLetter() {
    var arr = "";

    var rows = document.getElementById("list_table_blood_tracking_letter").rows;
    for (var i = 1; i < rows.length; i++) {
        var str = "";
        if (rows[i].cells[1].getElementsByTagName('input')[0].checked) {
            str = JSON.parse(rows[i].cells[0].innerHTML);
            arr = arr + str[0].donateid + ",";
        }



    }
    return arr;

}