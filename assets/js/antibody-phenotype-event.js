function addPhenotype()
{
    spinnershow();
    var phenotypecode = $("#phenotypecode").val();

    $.ajax({
        url: 'phenotype-insert.php?phenotypecode='+phenotypecode,
        dataType: 'json',
        type: 'get',
        complete: function () {
            var delayInMilliseconds = 200;
            setTimeout(function () {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function (data) {
            if(data.status == true)
            {
                loadPhenotype();
                $("#phenotypecode").val("");
                antibodyModal();
            }
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadPhenotype()
{
    $.ajax({
        url: 'data/masterdata/phenotype.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var header = document.getElementById("phenoTable3").getElementsByTagName('thead')[0];
            while (header.firstChild) {
                header.removeChild(header.firstChild);
            }

            var body = document.getElementById("phenoTable3").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var table = document.getElementById("phenoTable3");

            // start Header
            var header = table.createTHead();

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            if(obj.length > 0)
            {
                document.getElementById('divPhenoTable3').style.display='block';
            }else
            {
                document.getElementById('divPhenoTable3').style.display='none';
            }
         
            var row = header.insertRow(0);  
            $.each(obj, function (index, value) {
                var cell = row.insertCell(0);
                cell.className = "td-table-17";
                cell.innerHTML = '<b>'+value.phenotypecode+'</b>';

            });
            row.insertCell(obj.length);
            // End Header

            var event_data = '';
            event_data += '<tr >';
            $.each(obj, function (index, value) {
                event_data += '<td class="td-table">';
                event_data += '<label class="form-check-label">';
                event_data += '<input type="radio" onclick=checkBox(this) value="'+value.phenotypecode+'+" id="'+value.phenotypecode+'+" name="'+value.phenotypecode+'">&nbsp;+';
                event_data += '</label>';
                event_data += '</td>';
            });
            event_data += '<td></td>';
            event_data += '</tr>';

            event_data += '<tr >';
            $.each(obj, function (index, value) {
                event_data += '<td class="td-table">';
                event_data += '<label class="form-check-label">';
                event_data += '<input type="radio" onclick=checkBox(this) value="'+value.phenotypecode+'-" id="'+value.phenotypecode+'-" name="'+value.phenotypecode+'">&nbsp;-';
                event_data += '</label>';
                event_data += '</td>';
            });
            event_data += '<td></td>';
            event_data += '</tr>';


            $("#phenoTable3").append(event_data);
           

            

        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}


