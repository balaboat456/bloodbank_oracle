var indexDocument = 0;
function loadDocumentTable() {
    
    var bloodexchangeid = $('#bloodexchangeid').val() ;
    console.log(bloodexchangeid);
    $.ajax({
        url: 'data/bloodexchange/blood-exchange-document.php?bloodexchangeid=' + bloodexchangeid ,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_document").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
 
            $.each(obj, function (index, value) {
                indexDocument = index ;
                addRowDocument(value);
                console.log(indexDocument);

            });
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function clickAddRowDocumentItem()
{
    indexDocument++ ;
    addRowDocument();
}

function addRowDocument(im=[]) {
    var arr ;

    if(im.length != 0)
    {
        arr = [{
            bloodexchangedocumentid:im.bloodexchangedocumentid,
            bloodexchangedocumentcode:im.bloodexchangedocumentcode,
            bloodexchangeid:im.bloodexchangeid,
            bloodexchangedocumentname:im.bloodexchangedocumentname,
            bloodexchangedocumentpath:im.bloodexchangedocumentpath,
            bloodexchangedocumentfile:''
        }];
    }else
    {
        arr = [{
            bloodexchangedocumentid:'',
            bloodexchangedocumentcode:'',
            bloodexchangeid: $('#bloodexchangeid').val(),
            bloodexchangedocumentname:'',
            bloodexchangedocumentpath:'',
            bloodexchangedocumentfile:''
        }];
    }

    var event_data = '';

    event_data += '<tr>';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td>' + '1' + '</td>';

    event_data += '<td>' ;
    event_data += '<input  type="text" autocomplete="off" name="bloodexchangedocumentname"'+indexDocument+' ' ;
    event_data += 'class="form-control" value="'+arr[0].bloodexchangedocumentname+'" ' ;
    event_data += ' style="width:100%" onkeyup="setbloodexchangeDocumentName(this)" >' ;
    event_data += '</td>';

    event_data += '<td >' ;
    event_data += '        <input style="width:350px"   type="file"  onchange="getBaseUrlDocumentImage('+indexDocument+',this)" ';
    event_data += '            id="bloodexchangedocumentfile'+indexDocument+'" name="bloodexchangedocumentfile'+indexDocument+'"  /> ';
    event_data += '</td>';

    event_data += '<td>' ;
    if(arr[0].bloodexchangedocumentpath != '')
    { 
        event_data += '<button type="button" onclick=showDocPath("'+arr[0].bloodexchangedocumentpath+'") class="btn btn-info m-l-5">';
        event_data += '<i class="fa fa-search"> ดูเอกสาร</i>';
        event_data += '</button>'
    }
    event_data += '</td>';

    event_data += '<td  >';
    event_data += '<button type="button" onclick="deleteRowDocument(this)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';
    $("#list_table_json_document").append(event_data);
    setNoDocument();
    dateBE('.date2');
}

function saveDocument() {

        var data = {
                        bloodexchangeid:$('#bloodexchangeid').val(),
                    };
        data['bloodexchangedocumentitem'] = JSON.stringify(getDocumentItem());
        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'blood-exchange-docment-emtry-save.php',
            data: data,
            dataType: 'json',
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {
                if (data.status == 1) {
                    myAlertTop();
                    loadDocumentTable();
                } else {
                    myAlertTopError();
                }

            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
                myAlertTopError();
            },
        });
}

function getDocumentItem() {
    var arr = [];
    var rows = document.getElementById("list_table_json_document").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;
}

function setbloodexchangeDocumentName(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].bloodexchangedocumentname = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}


function getBaseUrlDocumentImage (num='',self)  {
    var file = document.getElementById('bloodexchangedocumentfile'+num)['files'][0];
    var reader = new FileReader();
    var baseString;
    reader.onloadend = function () {
        baseString = reader.result;

        var row = self.parentNode.parentNode;
        var item = JSON.parse(row.cells[0].innerHTML);
        item[0].bloodexchangedocumentfile = baseString;
        row.cells[0].innerHTML = JSON.stringify(item);
        
    };
    reader.readAsDataURL(file);
}

function showDocPath(path)
{
    window.open(localurl+'/'+path);
}


function setNoDocument() {

    var rows = document.getElementById("list_table_json_document").rows;
    for (var i = 1; i < rows.length; i++) {
        rows[i].cells[1].innerHTML = i;
    }
}

function deleteRowDocument(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    setNoDocument();
}