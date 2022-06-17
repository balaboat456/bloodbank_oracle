$(document).ready(function () {

    $("#searchhn").keyup(function (event) {

        if (event.keyCode === 13) {
            scanBarcode();
        }
    });
});

function scanBarcode()
{   
    
    var hn = document.getElementById('searchhn').value ;
    if(hn.length > 0)
    {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn='+hn,
            success: function (data) {

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/patient/patient.php?hn='+hn  ,
                    complete: function () {
                        var delayInMilliseconds = 200;
                        setTimeout(function () {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function (data) {
                            if(data.data.length > 0)
                            {
                                $('#patientfullname').val(data.data[0].patientfullname);
                                $('#patienthn').val(data.data[0].patienthn);
                                loadTable();
                            }else
                            {
                                swal({
                                    title: "ไม่พบข้อมูล ",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                },
                                function (inputValue) {
                                    if(inputValue)
                                    {
                                        document.getElementById('searchhn').focus ;
                                    }
                                });
                            }
                            document.getElementById('searchhn').value = '';
                        },
                        error: function (data) {
                            console.log('An error occurred.');
                            console.log(data);
                            document.getElementById('searchhn').value = '';
                        },
                    });

                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                    document.getElementById('searchhn').value = '';
                },
            });


    }
    
}


var count = 0;
var countitem = 0;
function loadTable() {
    
    clearData();

    var fromdate = document.getElementById("fromdate").value;
    var todate = document.getElementById("todate").value;
    var hn = document.getElementById("patienthn").value;

    $.ajax({
        url: 'data/recordrequestbloodlab/recordrequestbloodlab.php?hn=' + hn + '&fromdate=' + fromdate + '&todate=' + todate 
        ,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_query_result_test_lab").getElementsByTagName('tbody')[0];
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
                event_data += '<td>'
                event_data += '<button type="button" onclick="printLabTestResultBloodBank(' + value.labcheckrequestid + ')"  class="btn btn-success m-l-5">';
                event_data += '<i class="fa fa-print"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '<td>' + value.formt_datetime_labsenddatetime +  '</td>';
                event_data += '<td >' + value.labid  + '</td>';
                event_data += '<td>' + value.patientan +  '</td>';
                event_data += '<td>' + value.checkresultbloodstatusname +  '</td>';
                event_data += '<td>' + value.labunitroomname +  '</td>';
                event_data += '</tr>';

            });

            
            $("#list_table_query_result_test_lab").append(event_data);
            

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

            var body = document.getElementById("list_table_query_result_test_lab_item").getElementsByTagName('tbody')[0];
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
                event_data += '<td>';
                event_data += '<a onclick="showModal('+value.labformid+',`'+value.labformname+'`)" role="button" href="#" ';
                event_data += 'class="btn btn-info"><span class="btn-label"><i class="fa fa-sticky-note"></i></span>Compare</a> ';
                event_data += '</td>';
                event_data += '<td>'+value.labchecknormal+'</td>';
                event_data += '<td>'+value.labcheckvalue+'</td>';
                event_data += '<td>'+value.labcheckunit+'</td>';
                event_data += '<td style="text-align:left;">EDTA blood</td>';
                event_data += '<td>'+value.labcheckcommentanalyze+'</td>';
                
                event_data += '</tr>';

            });
            $("#list_table_query_result_test_lab_item").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadTable_Item_Compare(labformid="") {
    var hn = document.getElementById("patienthn").value;
    $.ajax({
        url: 'data/recordrequestbloodlab/recordrequestbloodlab-item.php?labformid=' + labformid+"&hn="+hn,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_query_result_test_lab_compare_item").getElementsByTagName('tbody')[0];
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
                event_data += '<td>'+value.formt_datetime_labsenddatetime+'</td>';
                event_data += '<td>'+value.labcheckresultshow+'</td>';
                event_data += '<td>'+value.labchecknormal+'</td>';
                event_data += '<td>'+value.labcheckvalue+'</td>';
                event_data += '<td>'+value.labcheckunit+'</td>';
                event_data += '<td style="text-align:left;">EDTA blood</td>';
                event_data += '<td>'+value.labcheckcommentanalyze+'</td>';
                
                event_data += '</tr>';

            });
            $("#list_table_query_result_test_lab_compare_item").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function clearData()
{

    var body = document.getElementById("list_table_query_result_test_lab_item").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

}