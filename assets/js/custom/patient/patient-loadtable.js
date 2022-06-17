function loadTable() {

    $.ajax({
        url: 'data/patient/patient-all.php',
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("table_patient_list").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '';
                event_data += '<tr >';
                event_data += '<td>' + value.patientidcard + '</td>';
                event_data += '<td style="text-align:left;">' + value.patientfullname + '</td>';
                event_data += '<td>' + value.patienthn + '</td>';
                event_data += '<td>' + value.patientan + '</td>';
                event_data += '<td>' + value.patientgender + '</td>';
                event_data += '<td >' + getDMY(value.patientanbirthday) + '</td>';

                event_data += '<td>' + value.patientage + '</td>';
                event_data += '<td>' + value.patientbloodgroup + '</td>';
                event_data += '<td>' + value.rhname3 + '</td>';
                event_data += '</tr>';

            });
            $("#table_patient_list").append(event_data);

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}