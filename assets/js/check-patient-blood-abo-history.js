var count = 0;
var antibodyall = '';
var phenotypedisplayall = '';
function loadTableCheckBloodABOHistory() {
    var hn = document.getElementById("hn").value;
    $.ajax({
        url: 'data/checkbloodpatient/checkbloodpatient-change-abo-history.php?hn=' + hn,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_request_blood_abo_history_modal").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
         
            $.each(obj, function (index, value) {
                addTableCheckBloodABOHistory(value);
            });
           
            setAntibodyallandPhenotypedisplayall();
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}


function addTableCheckBloodABOHistory(value) {

    var event_data = '';
    event_data += '';
    event_data += '<tr  >';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(value);
    event_data += '</td>';
    event_data += '<td>' + getDMYHM(value.requestbloodchangeabodatetime) + '</td>';
    event_data += '<td>' + value.requestbloodchangeaboold +  '</td>';
    event_data += '<td>' + value.requestbloodchangeabnew +  '</td>';
    event_data += '<td>' + value.requestbloodchangeabofullname +  '</td>';
    event_data += '<td>' + value.requestbloodchangeaboremark +  '</td>';
    event_data += '</tr>';

    $("#list_request_blood_abo_history_modal").append(event_data);

}