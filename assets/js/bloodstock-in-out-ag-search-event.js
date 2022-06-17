$(document).ready(function () {
    $("#ag_rfidscan").on('keydown', function(e) {
        if (e.which == 13) {
            addBloodStockInTypeAg();
        }
    });
});

function BloodStockInTypeSearchItemAg(bloodstocktypeagitemid = "")
{
    var id = $("#searchbloodstocktypeagid").val();

    $.ajax({
        url: 'data/bloodstock/get_blood_type_ag_list.php?id='+id+'&bloodstocktypeagitemid='+bloodstocktypeagitemid,
        dataType: 'json',
        type: 'get',
        success: function (data) {
            console.log(data.data);
            var body = document.getElementById("list_table_json_type_ag_search").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var event_data = '';
            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
    
            $.each(obj, function (index, value) {
    
                var arr = [value];
                event_data += '<tr >';
                event_data += '<td class="td-table"  style="display:none;" >';
                event_data += JSON.stringify(arr);
                event_data += '</td>';
                event_data += '<td class="td-table">' + (index + 1) + '</td>';
                event_data += '<td class="td-table">' + value.bloodtype + '</td>';
                event_data += '<td class="td-table">' + value.bag_number + '</td>';
                event_data += '<td class="td-table">' + value.sub+ '</td>';
                event_data += '<td class="td-table">' + value.bloodgroup + '</td>';
                event_data += '<td class="td-table">' + value.rhname3 + '</td>';
                event_data += '<td class="td-table">' + value.volume + '</td>';
                event_data += '<td class="td-table">' + value.phenotype + '</td>';
                event_data += '<td class="td-table">' + value.bloodexp + '</td>';
                event_data += '<td>';
                event_data += '<button type="button" onclick="PhenotypeAgOutItemDelete('+value.bloodstocktypeagitemid+',`'+value.bag_number+'`)" class="btn btn-danger m-l-5">';
                event_data += '<i class="fa fa-times"> นำออก</i>';
                event_data += '</button>'
                event_data += '</td>';
                event_data += '</tr>';
    
            });
            $("#list_table_json_type_ag_search").append(event_data);

        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function PhenotypeAgOutItemDelete(id,bag_number)
{

    swal({
        title: "คุณต้องการนำผลิตภัณฑ์ออกนี้หรือไม่",
        text: "หมายเลขถุง "+ bag_number ,
        type: "warning",
        icon: "warning",
        buttons: [
            'ยกเลิก',
            'ลบ'
        ],
    }).then(value => {
        
        if(value)
        {
            spinnershow();

            var data = {id:id};

            $.ajax({
                type: 'POST',
                url: 'inventory-blood-bank-ag-phenotype-item-delete.php',
                data: data,
                dataType: 'json',
                complete: function () {
                    var delayInMilliseconds = 200;
                    setTimeout(function () {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function (data) {
                 
                        if (data.status) {
                            myAlertTop();
                            BloodStockInTypeSearchItemAg();
                            loadTableInOutAg();
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
        
    });

}