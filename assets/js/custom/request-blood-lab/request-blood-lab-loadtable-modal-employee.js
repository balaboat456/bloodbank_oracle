function loadTableEmployee(pumpid) {

    var param = {pumpid:pumpid};
    ajaxPost(base_url+'pumpemployeelist', param).done(function (data) {
        var body = document.getElementById("employee_table").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var event_data = '';

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function (index, value) {

                var arr = [value];
                event_data += '<tr>';
                event_data += '<td style="display:none;" >' + JSON.stringify(value) + '</td>';
                event_data += '<td>' +(index+1) + '</td>';
                event_data += '<td>' + value.PUMPEMPLOYEENAME+ '</td>';
                event_data += '<td>' + value.PUMPEMPLOYEEPHONE+ '</td>';
                event_data += '</tr>';

            });
            $("#employee_table").append(event_data);
    });
  
}