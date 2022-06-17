var count = 0;
var countitem = 0;
function loadTable() {
    
    clearData();

    var fromdate = document.getElementById("searchfromdate").value;
    var todate = document.getElementById("searchtodate").value;

    var fromtime = document.getElementById("searchfromtime").value;
    var totime = document.getElementById("searchtotime").value;

    var fromln = document.getElementById("searchfromln").value;
    var toln = document.getElementById("searchtoln").value;
    
    var hn = document.getElementById("searchhn").value;
    var an = document.getElementById("searchan").value;
    var checkresultbloodstatusid = document.getElementById("searchcheckresultbloodstatusid").value;

    var labunitroomid = document.getElementById("searchlabunitroomid").value;
    
    var fullname = document.getElementById("searchpatientfullname").value;

    $.ajax({
        url: 'data/recordrequestbloodlab/recordrequestbloodlab.php?hn=' + hn + '&an=' + an + 
                                        '&fromdate=' + fromdate + '&todate=' + todate + 
                                        '&fromtime=' + fromtime + '&totime=' + totime + 
                                        '&fromln=' + fromln + '&toln=' + toln + 
                                        '&checkresultbloodstatusid=' + checkresultbloodstatusid +
                                        '&labunitroomid=' + labunitroomid +
                                        '&fullname=' + fullname 
        ,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_record_request_blood_lab").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            count = obj.length ;
            var event_data = '';
            $.each(obj, function (index, value) {

                var style = "#FFFFFF";

                event_data += '';
                event_data += '<tr style="background:' + style + ';" id="trblood' + (index) + '" onClick="chActive(' + (index) + ',this)" >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td></td>';
                event_data += '<td><input onclick="setRequestChecked(this);" type="checkbox" '+((value.labcheckrequest_v == 1 )?'checked':'')+' ></td>';
                event_data += '<td><input onclick="setRequestAllowReport(this);" type="checkbox" '+((value.labcheckrequest_a == 1)?'checked':'')+' ></td>';
                event_data += '<td >' + value.labid  + '</td>';
                event_data += '<td>' + value.formt_datetime_labsenddatetime +  '</td>';
                event_data += '<td>' + value.patientfullname +  '</td>';
                event_data += '<td>' + value.labunitroomname +  '</td>';
                event_data += '<td>' + value.patienthn +  '</td>';
                event_data += '<td>' + value.patientan +  '</td>';
                
                event_data += '<td>' + value.checkresultbloodstatusname +  '</td>';
                
                event_data += '</tr>';

            });

            
            $("#list_table_record_request_blood_lab").append(event_data);
            

        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}



function loadTable_item(id) {
  
    $.ajax({
        url: 'data/recordrequestbloodlab/recordrequestbloodlab-item.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_record_request_blood_lab_item").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
          
            var event_data = '';
            item_lab_edit_tab_2_item2 = obj;
            $.each(obj, function (index, value) {
                
                event_data += '';
                event_data += '<tr >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td style="text-align:left;">' + value.labformname + '</td>';
                event_data += '<td>'+value.labcheckresultshow+'</td>';
                event_data += '<td>R</td>';
                event_data += '<td><input type="text" class="form-control" onkeyup="setLabCheckNormal(this)" value="'+value.labchecknormal+'" ></td>';
                event_data += '<td><input type="text" class="form-control" onkeyup="setLabCheckValue(this)" value="'+value.labcheckvalue+'" ></td>';
                event_data += '<td><input type="text" class="form-control" onkeyup="setLabCheckUnit(this)" value="'+value.labcheckunit+'" ></td>';
                event_data += '<td style="text-align:left;">EDTA blood</td>';
                event_data += '<td><input type="text" class="form-control" onkeyup="setLabCheckCommentAnalyze(this)" value="'+value.labcheckcommentanalyze+'" ></td>';
                
                event_data += '</tr>';

            });
            $("#list_table_record_request_blood_lab_item").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function clearData()
{

    var body = document.getElementById("list_table_record_request_blood_lab_item").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

}