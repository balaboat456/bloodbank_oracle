var type = '';
var typeid = '';
function loadTable() {

    spinnershow();
    type = '';
    if(document.getElementById("tpharpr").checked)
    {
        type = type + ",tpharpr";
        typeid = "tpharpr";
    }
    
    if(document.getElementById("hcv").checked)
    {
        type = type + ",hcv";
        typeid = "hcv";
    }
    
    if(document.getElementById("nat").checked)
    {
        type = type + ",nat";
        typeid = "nat";
    }
    
    if(document.getElementById("hiv").checked)
    {
        type = type + ",hiv";
        typeid = "hiv";
    }
    
    if(document.getElementById("hbsag").checked)
    {
        type = type + ",hbsag";
        typeid = "hbsag";
    }

    fromdate = dmyToymd2($('#fromdate').val());
    todate = dmyToymd2($('#todate').val());

    $.ajax({
        url: 'data/blood/blood-check-letter.php?fromdate=' + fromdate +
                "&todate="+todate+"&type="+type,
        dataType: 'json',
        type: 'get',
        complete: function () {
            var delayInMilliseconds = 200;
            setTimeout(function () {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function (data) {


            var body = document.getElementById("list_table_blood_tracking_letter").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var event_data = '';

            $("#blood-tracking-letter").text(data.total);
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function (index, value) {

                var arr = [value];
                event_data += '<tr>';
                event_data += '<td class="td-table"  style="display:none;" >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input checked type="checkbox"   >';
                event_data += '</td>';
                event_data += '<td class="td-table">' + value.bag_number + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input '+((value.tpharpr=="+")?"checked":"")+' type="checkbox"    >';
                event_data += '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input '+((value.hbsag=="+")?"checked":"")+' type="checkbox"    >';
                event_data += '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input '+((value.hivagab=="+" )?"checked":"")+' type="checkbox"    >';
                event_data += '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input '+((value.hcvab=="+")?"checked":"")+' type="checkbox"    >';
                event_data += '</td>';
                event_data += '<td class="td-table">';
                event_data += '<input '+((value.hbvdna=="+" || value.hcvrna=="+" || value.hivrna=="+")?"checked":"")+' type="checkbox"    >';
                event_data += '</td>';
                event_data += '<td class="td-table">' + getDMY(value.donation_date) + '</td>';
                event_data += '<td class="td-table">' + value.fullname+ '</td>';
                event_data += '<td class="td-table">' + value.donorcode + '</td>';
                event_data += '<td class="td-table">' + value.donoremail + '</td>';
               
                event_data += '</tr>';
            });
            $("#list_table_blood_tracking_letter").append(event_data);

            dateBE('.date1');
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

$(document).ready(function () {
  
    $('#bloodgroupid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/bloodgroup.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.bloodgroupid,
                            text: item.bloodgroupname,
                        }
                    })
                };
            },

        }
    });

  

});


var id01 = '';
var id_b = '';
var id_c = '';

function print01()
{
    id01 = '';
    id_b = '';
    id_c = '';

    id01 = lastString(getDonationTrackingLetter01());
    id_b = lastString(getDonationTrackingLetter_b());
    id_c = lastString(getDonationTrackingLetter_c());
    
    if(id01 != '')
    {
        printJS01(id01);
    }else if(id_b != '')
    {
        printJS_B(id_b);
    }else if(id_c != '')
    {
        printJS_C(id_c);
    }

    
}

function printJS01(id='')
{
    printJS({ 
        printable: [
                        localurl+"/report/blood-donation-tracking-infected.php?id="+id+"&report=blood_donation_tracking_letter_infected_01"
                        ], 
            type:'pdf',
            onPrintDialogClose: () => printJS_B(id_b)
        });
}

function printJS_B(id='')
{
    if(id != '')
    {
        printJS({ 
            printable: [
                            localurl+"/report/blood-donation-tracking-infected.php?id="+id+"&report=blood_donation_tracking_letter_infected_b"
                            ], 
                type:'pdf',
                onPrintDialogClose: () => printJS_C(id_c)
            });
    }else
    {
        printJS_C(id_c);
    }
    
}

function printJS_C(id='')
{
    if(id != '')
    {
        printJS({ 
            printable: [
                            localurl+"/report/blood-donation-tracking-infected.php?id="+id+"&report=blood_donation_tracking_letter_infected_c"
                            ], 
                type:'pdf',
            });
    }
}


function getDonationTrackingLetter01() {
    var arr = "";
    
    var rows = document.getElementById("list_table_blood_tracking_letter").rows;
    for (var i = 1; i < rows.length; i++) {
            var str = "";
            if(rows[i].cells[1].getElementsByTagName('input')[0].checked)
            {


                var status = false;
                if(
                    (rows[i].cells[3].getElementsByTagName('input')[0].checked ) ||
                    (rows[i].cells[5].getElementsByTagName('input')[0].checked ) ||
                    (rows[i].cells[7].getElementsByTagName('input')[0].checked )
                )
                {
                    status = true ;
                }

                if(
                    rows[i].cells[4].getElementsByTagName('input')[0].checked &&
                    rows[i].cells[6].getElementsByTagName('input')[0].checked 
                    )
                {
                    status = true ;
                }

                if(status)
                {
                    str = JSON.parse(rows[i].cells[0].innerHTML);
                    arr = arr+str[0].donateid+",";
                }
                
            }
            
            
    }
    return arr;

}

function getDonationTrackingLetter_b() {
    var arr = "";
    
    var rows = document.getElementById("list_table_blood_tracking_letter").rows;
    for (var i = 1; i < rows.length; i++) {
            var str = "";
            if(rows[i].cells[1].getElementsByTagName('input')[0].checked)
            {
                if(
                    (rows[i].cells[4].getElementsByTagName('input')[0].checked && document.getElementById("hbsag").checked) &&
                    (! rows[i].cells[3].getElementsByTagName('input')[0].checked ) &&
                    (! rows[i].cells[5].getElementsByTagName('input')[0].checked ) &&
                    (! rows[i].cells[6].getElementsByTagName('input')[0].checked ) &&
                    (! rows[i].cells[7].getElementsByTagName('input')[0].checked )
                )
                {
                    str = JSON.parse(rows[i].cells[0].innerHTML);
                    arr = arr+str[0].donateid+",";
                }
                
            }
            
            
    }
    return arr;

}

function getDonationTrackingLetter_c() {
    var arr = "";
    
    var rows = document.getElementById("list_table_blood_tracking_letter").rows;
    for (var i = 1; i < rows.length; i++) {
            var str = "";
            if(rows[i].cells[1].getElementsByTagName('input')[0].checked)
            {
                if(
                    (rows[i].cells[6].getElementsByTagName('input')[0].checked && document.getElementById("hcv").checked) &&
                    (! rows[i].cells[3].getElementsByTagName('input')[0].checked ) &&
                    (! rows[i].cells[4].getElementsByTagName('input')[0].checked ) &&
                    (! rows[i].cells[5].getElementsByTagName('input')[0].checked ) &&
                    (! rows[i].cells[7].getElementsByTagName('input')[0].checked )
                )
                {
                    str = JSON.parse(rows[i].cells[0].innerHTML);
                    arr = arr+str[0].donateid+",";
                }
                
            }
            
            
    }

    

    return arr;

}

function print02()
{
    var id = lastString(getDonationTrackingLetter());
    printJS({
        printable: localurl+"/report/blood-donation-tracking-letter-front.php?id="+id,
        type: 'pdf',
        showModal: true
    });
    
}

function getDonationTrackingLetter() {
    var arr = "";
    
    var rows = document.getElementById("list_table_blood_tracking_letter").rows;
    for (var i = 1; i < rows.length; i++) {
            var str = "";
            if(rows[i].cells[1].getElementsByTagName('input')[0].checked)
            {
                str = JSON.parse(rows[i].cells[0].innerHTML);
                arr = arr+str[0].donateid+",";
            }
            

            
    }
    return arr;

}


