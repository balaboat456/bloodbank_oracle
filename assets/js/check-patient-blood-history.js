var count = 0;
var antibodyall = '';
var phenotypedisplayall = '';

function loadTableCheckBloodHistory() {
    var hn = document.getElementById("hn").value;
    $.ajax({
        url: 'data/checkbloodpatient/checkbloodpatient-history.php?hn=' + hn,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("list_request_blood_history_modal").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            antibodyall = '';
            phenotypedisplayall = '';
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));


            count = data.data.length.toString();
            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '';
                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + getDMY(value.requestblooddate) + ' ' + value.requestbloodtime + '</td>';
                event_data += '<td>' + value.confirmbloodgroup + '</td>';
                event_data += '<td>' + value.rhname3 + '</td>';
                event_data += '<td>' + value.confirmsceenname + '</td>';
                event_data += '<td>' + value.antibody + '</td>';
                event_data += '<td>' + value.phenotypedisplay + '</td>';
                event_data += '<td>' + value.checkbloodremark + '</td>';
                event_data += '</tr>';

                if (value.antibody != '')
                    antibodyall += value.antibody + ',';

                if (value.phenotypedisplay != '')
                    phenotypedisplayall += value.phenotypedisplay + ',';

            });
            $("#list_request_blood_history_modal").append(event_data);
            setAntibodyallandPhenotypedisplayall();
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setAntibodyallandPhenotypedisplayall() {
    var antibodyallSting = '';
    var antibodyallArray = antibodyall.split(",");
    var antibodyallArrayNew = Array.from(new Set(antibodyallArray))
    $.each(antibodyallArrayNew, function(index, value) {
        if (value != '')
            antibodyallSting += value + ',';
    });

    console.log("+++++++++");
    console.log(document.getElementById('patientantibodyall'));

    document.getElementById('antibodyAllLable').innerHTML = lastString(antibodyallSting);
    document.getElementById('patientantibodyall').value = lastString(antibodyallSting);


    // document.getElementById('antibodyLable').innerHTML = lastString(antibodyallSting);
    // document.getElementById('antibodyshow').innerHTML = lastString(antibodyallSting);
    // document.getElementById('antibody').value = lastString(antibodyallSting);

    var phenotypedisplayallSting = '';
    var phenotypedisplayallArray = phenotypedisplayall.split(",");
    var phenotypedisplayallArrayNew = Array.from(new Set(phenotypedisplayallArray))
    $.each(phenotypedisplayallArrayNew, function(index, value) {
        if (value != '')
            phenotypedisplayallSting += value + ',';
    });

    document.getElementById('phenotypeAllLable').innerHTML = lastString(phenotypedisplayallSting);
    document.getElementById('patientphenotypeall').value = lastString(phenotypedisplayallSting);

}