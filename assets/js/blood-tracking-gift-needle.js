function loadTable() {
    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());
    var donation_qty = $('#donation_qty').val();
    var souvenirid = $('#souvenirid').val();

    $.ajax({
        url: 'data/blood/blood-tracking-letter-gift-needle.php?fromdate=' + fromdate +
            "&todate=" + todate + "&donation_qty=" + donation_qty + "&souvenirid=" + souvenirid,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            console.log(data);
            console.log(data.resultArray);
            Array_id1 = data.Array_id1;
            console.log(Array_id1);

            var event_data = "";
            var obj = JSON.parse(JSON.stringify(data.resultArray).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {
                var arr = [value];
                event_data += '';
                event_data += '<tr onClick="chActiveBloodStockPay(this)">';
                event_data += '<td  style="display:none;" >';
                event_data += index + JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td><input type="checkbox" id="' + value.donateid + '" onchange="setBloodOutCheck(' + value.donateid + ')" ></td>';
                event_data += '<td>' + value.donorcode + '</td>';
                event_data += '<td>' + value.fullname + '</td>';
                event_data += '<td>' + value.blood_group + '</td>';
                event_data += '<td>' + value.donorbirthday + '</td>';
                event_data += '<td>' + value.address + '</td>';
                event_data += '<td>' + value.getcard + '</td>';
                event_data += '<td>' + value.getcarddate + '</td>';
                event_data += '<td>' + value.staffname + '</td>';
                event_data += '</tr>';
                // $count++;

            });
            // document.getElementById('table_body_report').innerHTML = data.data;
            document.getElementById('table_body_report').innerHTML = event_data;

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}


function loadTable2() {
    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());
    var donation_qty = $('#donation_qty').val();
    var souvenirid = $('#souvenirid').val();

    $.ajax({
        url: 'data/blood/blood-tracking-letter-gift-needle2.php?fromdate=' + fromdate +
            "&todate=" + todate + "&donation_qty=" + donation_qty + "&souvenirid=" + souvenirid,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            console.log(data);
            console.log(data.resultArray);
            Array_id1 = data.Array_id1;
            console.log(Array_id1);

            var event_data = "";
            var obj = JSON.parse(JSON.stringify(data.resultArray).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {
                var arr = [value];
                event_data += '';
                event_data += '<tr onClick="chActiveBloodStockPay(this)">';
                event_data += '<td  style="display:none;" >';
                event_data += index + JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td><input type="checkbox" id="' + value.donateid + '" onchange="setBloodOutCheck2(' + value.donateid + ')" ></td>';
                event_data += '<td>' + value.donorcode + '</td>';
                event_data += '<td>' + value.fullname + '</td>';
                event_data += '<td>' + value.blood_group + '</td>';
                event_data += '<td>' + value.donorbirthday + '</td>';
                event_data += '<td>' + value.address + '</td>';
                event_data += '<td>' + value.getcard + '</td>';
                event_data += '<td>' + value.getcarddate + '</td>';
                event_data += '<td>' + value.staffname + '</td>';
                event_data += '</tr>';
                // $count++;

            });
            // document.getElementById('table_body_report').innerHTML = data.data;
            document.getElementById('table_body_report2').innerHTML = event_data;

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}


function loadTable3() {
    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());
    var donation_qty = $('#donation_qty').val();
    var souvenirid = $('#souvenirid').val();

    $.ajax({
        url: 'data/blood/blood-tracking-letter-gift-needle3.php?fromdate=' + fromdate +
            "&todate=" + todate + "&donation_qty=" + donation_qty + "&souvenirid=" + souvenirid,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            console.log(data);
            console.log(data.resultArray);
            Array_id1 = data.Array_id1;
            console.log(Array_id1);

            var event_data = "";
            var obj = JSON.parse(JSON.stringify(data.resultArray).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {
                var arr = [value];
                event_data += '';
                event_data += '<tr onClick="chActiveBloodStockPay(this)">';
                event_data += '<td  style="display:none;" >';
                event_data += index + JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td>' + value.donorcode + '</td>';
                event_data += '<td>' + value.fullname + '</td>';
                event_data += '<td>' + value.blood_group + '</td>';
                event_data += '<td>' + value.donorbirthday + '</td>';
                event_data += '<td>' + value.address + '</td>';
                event_data += '<td>' + value.getcard + '</td>';
                event_data += '<td>' + value.getcarddate + '</td>';
                event_data += '<td>' + value.staffname + '</td>';
                event_data += '</tr>';
                // $count++;

            });
            // document.getElementById('table_body_report').innerHTML = data.data;
            document.getElementById('table_body_report3').innerHTML = event_data;

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}