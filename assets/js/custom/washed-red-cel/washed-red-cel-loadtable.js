var count = 0;
var stylecolor = [];
var dataObj = [];
var indexActive = '';

function loadTable(hn = '', state = '') {

    $.ajax({
        url: 'data/washedredcell/washed-red-cell.php?hn=' + hn,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("table_blood_washed_red_cell").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            dataObj = obj;
            count = obj.length;
            var event_data = '';
            $.each(obj, function(index, value) {

                var style = "#FFFFFF"

                stylecolor[index] = style;

                event_data += '';
                event_data += '<tr style="background:' + style + '" id="trblood' + (index) + '" onClick="chActive(' + (index) + ',this)" >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td >' + getDMYHM(value.bloodwashedredcelldatetime) + '</td>';
                event_data += '<td>' + value.unitofficename + '</td>';
                event_data += '<td>' + value.diagnosis + '</td>';
                event_data += '<td>' + value.usercreate + '</td>';

                event_data += '</tr>';

            });
            // $("#table_blood_washed_red_cell").append(event_data);

            if (state == "insert") {
                chActive(0);
            } else if (state == "update") {
                chActive(indexActive);
            }

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}