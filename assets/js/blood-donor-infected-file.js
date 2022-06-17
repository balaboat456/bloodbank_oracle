var indexRepeatInfection = 0;

function loadRepeatInfectionTable(id = "") {

    $("#donateid").val(id);

    $.ajax({
        url: 'data/blood/bloodinfectionfile.php?donateid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("list_table_json_blood_infected_file").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {
                indexRepeatInfection = index;
                addRowRepeatInfection(value);

            });
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function clickAddRowRepeatInfectionItem() {
    indexRepeatInfection++;
    addRowRepeatInfection();
}


function addRowRepeatInfection(im = []) {
    var arr;

    if (im.length != 0) {
        arr = [{
            donateinfectedfileid: im.donateinfectedfileid,
            donateinfectedfilecode: im.donateinfectedfilecode,
            donateinfectedfilename: im.donateinfectedfilename,
            donateinfectedfilepath: im.donateinfectedfilepath,
            donateid: im.donateid,

        }];
    } else {
        arr = [{
            donateinfectedfileid: '',
            donateinfectedfilecode: '',
            donateinfectedfilename: '',
            donateinfectedfilepath: '',
            donateid: $("#donateid").val()
        }];
    }

    var event_data = '';

    event_data += '<tr>';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td>' + '1' + '</td>';

    event_data += '<td>';
    event_data += '<input  type="text" autocomplete="off" name="donateinfectedfilename"' + indexRepeatInfection + ' ';
    event_data += 'class="form-control" value="' + arr[0].donateinfectedfilename + '" ';
    event_data += ' style="width:100%" onchange="setDonateInfectedFileName(this)" >';
    event_data += '</td>';

    event_data += '<td >';
    event_data += '        <input   type="file"  onchange="getBaseUrlImage(' + indexRepeatInfection + ',this)" ';
    event_data += '            id="donateinfectedfile' + indexRepeatInfection + '" name="donateinfectedfile' + indexRepeatInfection + '"  /> ';
    event_data += '</td>';

    event_data += '<td>';
    if (arr[0].donateinfectedfilepath != '') {
        event_data += '<button type="button" onclick=showDoc("' + arr[0].donateinfectedfilepath + '") class="btn btn-info m-l-5">';
        event_data += '<i class="fa fa-search"> ดูเอกสาร</i>';
        event_data += '</button>'
    }
    event_data += '</td>';

    event_data += '<td  >';
    event_data += '<button type="button" onclick="deleteRowInfected(this)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';
    $("#list_table_json_blood_infected_file").append(event_data);
    setNoInfected();
    dateBE('.date2');
}

function saveInfectedFile() {

    var data = {};
    data['repeatinfectionitem'] = JSON.stringify(getFileTable());
    spinnershow();
    $.ajax({
        type: 'POST',
        url: 'blood-Infected-file-save.php',
        data: data,
        dataType: 'json',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {
            if (data.status == 1) {
                myAlertTop();
                loadRepeatInfectionTable(data.id);
            } else {
                myAlertTopError();
            }

        },
        error: function(data) {
            console.log('An error occurred.');
            console.log(data);
            myAlertTopError();
        },
    });
}

function getFileTable() {
    var arr = [];
    var rows = document.getElementById("list_table_json_blood_infected_file").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;
}

function setDonateInfectedFileName(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].donateinfectedfilename = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}


function getBaseUrlImage(num = '', self) {
    var file = document.getElementById('donateinfectedfile' + num)['files'][0];
    var reader = new FileReader();
    var baseString;
    reader.onloadend = function() {
        baseString = reader.result;

        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[0].innerHTML);
        item[0].donateinfectedfile = baseString;
        row.cells[0].innerHTML = JSON.stringify(item);

    };
    reader.readAsDataURL(file);
}

function showDoc(path) {
    window.open(localurl + '/' + path);
}


function setNoInfected() {

    var rows = document.getElementById("list_table_json_blood_infected_file").rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[1].innerHTML = i;
    }
}

function deleteRowInfected(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    setNoInfected();
}