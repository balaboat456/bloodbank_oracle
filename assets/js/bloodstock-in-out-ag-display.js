$(document).ready(function () {
    $("#ag_rfidscan_search").on('keydown', function(e) {
        if (e.which == 13) {
            bloodStockInTypeAgSearch();
        }
    });
});

function loadTableInOutAg() {

    $.ajax({
        url: 'data/blood/bloodstockdisplay-typeag.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {
            StockTableInOutAg(data.data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function StockTableInOutAg(data)
{
    var body = document.getElementById("row_type_ag");
    if(body == null)
    return false ;

    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';

    var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));

    $.each(obj, function (index, value) {


        event_data += '                 <div class="form-group col-md-3">';
        event_data += '									<div class="table-no-scroll">';
        event_data += '										<table id="list_table_ag">';
        event_data += '											<thead>';
        event_data += '												<tr>';
        event_data += '													<th rowspan="2">หมู่เลือด</th>';
        event_data += '													<th colspan="3">'+value.bloodstocktypeagname + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

        event_data += '                                                 </th>';

        event_data += '												</tr>';
        event_data += '												<tr>';
        event_data += '													<th>PRC</th>';
        event_data += '													<th>LPRC</th>';
        event_data += '													<th>LDPRC</th>';
        event_data += '												</tr>';
        event_data += '											</thead>';
        event_data += '											<tbody>';

        var objItem = JSON.parse(JSON.stringify(value.item).replace(/null/g, '""'));
        var prcTotal = 0;
        var lprcTotal = 0;
        var ldprcTotal = 0;


        $.each(objItem, function (inx, vl) {

            prcTotal += parseInt(vl.prc)
            lprcTotal += parseInt(vl.lprc)
            ldprcTotal += parseInt(vl.ldprc)

            event_data += '												<tr>';
            event_data += '													<td>'+vl.bloodgroupname+'</td>';
            event_data += '													<td>'+vl.prc+'</td>';
            event_data += '													<td>'+vl.lprc+'</td>';
            event_data += '													<td>'+vl.ldprc+'</td>';
            event_data += '												</tr>';
        });

        
        
        event_data += '												<tr>';
        event_data += '													<td><b>รวม</b></td>';
        event_data += '													<td><b>'+prcTotal+'</b></td>';
        event_data += '													<td><b>'+lprcTotal+'</b></td>';
        event_data += '													<td><b>'+ldprcTotal+'</b></td>';
        event_data += '												</tr>';
        event_data += '												<tr>';
        event_data += '                                                 <td colspan="4">';       
        event_data += '                                                 <button type="button" onclick="showAddAgPhenotypeModal('+value.bloodstocktypeagid+','+"'"+value.bloodstocktypeagname+"'"+','+"'"+value.bloodstocktypeagphon+"'"+')" class="btn btn-success btn-sm"> '
        event_data += '                                                     <i class="fa fa-plus"></i>'
        event_data += '                                                 </button>';      
        event_data += '                                                 <button type="button" onclick="showSearchAgPhenotypeModal('+value.bloodstocktypeagid+','+"'"+value.bloodstocktypeagname+"'"+','+"'"+value.bloodstocktypeagphon+"'"+')" class="btn btn-info btn-sm"> '
        event_data += '                                                     <i class="fa fa-search"></i>'
        event_data += '                                                 </button>';                
        event_data += '                                                 <button type="button" onclick="PhenotypeAgInOutGroupingDeleteTable('+value.bloodstocktypeagid+','+"'"+value.bloodstocktypeagname+"'"+')" class="btn btn-secondary btn-sm"> '
        event_data += '                                                     <i class="fa fa-trash"></i>'
        event_data += '                                                 </button>';
        event_data += '                                                 </td>';
        event_data += '												</tr>';
        event_data += '											</tbody>';
        event_data += '										</table>';
        event_data += '									</div>';
        event_data += '								</div>';


    });
    $("#row_type_ag").append(event_data);
    
}

function scanBarcodeAddBloodStockInTypeAgSearch() {
    var bag_number = $('#ag_bag_number_search').val();

    var bag_number_new = numnerPoint(bag_number);
    $('#ag_bag_number_search').val(bag_number_new);
    if (bag_number_new.length == 14) {
        bloodStockInTypeAgSearch() ;
    }

}

function bloodStockInTypeAgSearch()
{
    var bloodtype = $("#ag_bloodstocktypecross_search").val();
    var bagnumber = $("#ag_bag_number_search").val();
    var rfid = $("#ag_rfidscan_search").val();

    if(rfid == "")
    {
        if((!bloodtype) && (bagnumber == ""))
        {
            const callback = function(inputValue) {  
                if(inputValue)
                {
                    ClearTypeAgBagNumberSearch();
                }
            }
            mgsErrorAg("กรุณากรอกข้อมูล","",callback);
            return false ;
        }
    }
   

    $.ajax({
        url: 'data/bloodstock/get_blood_type_ag_list.php?bloodtype='+bloodtype+'&bagnumber='+bagnumber+'&rfid='+rfid,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var arrayData = data.data ;
            if(arrayData.length == 0)
            {
                const callback = function(inputValue) {  
                    if(inputValue)
                    {
                        ClearTypeAgBagNumberSearch();
                    }
                }
                mgsErrorAg("ไม่พบข้อมูล","",callback);
                return false ;
            }else
            {
                showSearchAgPhenotypeModal(arrayData[0].bloodstocktypeagid,arrayData[0].bloodstocktypeagname,arrayData[0].bloodstocktypeagphon,arrayData[0].bloodstocktypeagitemid);
                ClearTypeAgBagNumberSearch();
            }
            // addBloodStockInTypeAgTable(data.data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function ClearTypeAgBagNumberSearch()
{

    if(document.getElementById("ag_rfidscan_search").value != "")
    {
        document.getElementById("ag_rfidscan_search").value = '';
        document.getElementById("ag_rfidscan_search").focus();
    }else
    {
        document.getElementById("ag_bag_number_search").value = '';
        document.getElementById("ag_bag_number_search").focus();
    }

    
}