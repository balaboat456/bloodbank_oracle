function loadTableTime(id="") {


    var param = {id:id};
    ajaxPost(base_url+'shopdaylist', param).done(function (data) {
        var body = document.getElementById("tabletime").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

           

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function (index, value) {
                var event_data = '';
                var arr = [value];
                
                var rowcolor = '';

                if(value.STATUSID != 1)
                {
                    rowcolor = '#D5D8DC' ;

                }
                

                event_data += '<tr bgcolor="'+rowcolor+'">';
                event_data += '<td style="display:none;" >' + JSON.stringify(value) + '</td>';
                event_data += '<td>' + value.DAYNAME+ '</td>';

                event_data += '<td style="padding:0px">';
                event_data += '<input style="background-color: '+rowcolor+'" id="" value="'+value.SHOPTIMESTART+'" type="text" autocomplete="off" class="width-100vh masktime" onchange="setTimeStart(this)"  />';
                event_data += '</td>'

                event_data += '<td style="padding:0px">';
                event_data += '<input style="background-color: '+rowcolor+'" id="" value="'+value.SHOPTIMEEND+'" type="text" autocomplete="off" class="width-100vh masktime" onchange="setTimeEnd(this)"  />';
                event_data += '</td>'

                event_data += '<td style="padding:0px">';
                event_data += '<select style="background-color: '+rowcolor+'" class="form-control"  ID="STATUSID'+index+'">';
                event_data += '</select>';
                event_data += '</td>'

                event_data += '</tr>';

                $("#tabletime").append(event_data);

                loadStatus('#STATUSID'+index);

                if(value.STATUSID)
                {
                    setSelect2Value('STATUSID'+index,value.STATUSID,value.STATUSNAME);
                }

            });
           
    });
  
}