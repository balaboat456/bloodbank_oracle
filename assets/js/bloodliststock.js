var dataObj = [];

function loadTable(active = 1, bag_number = "", rfidcode = "") {

    spinnershow();

    var keyword = '';
    var fromdate = '';
    var todate = '';
    var receivingtypeid2 = '';
    var bloodstocktypecross = '';
    var donatebloodtype = '';

    var hn = document.getElementById("hn").value;

    if (!bag_number && !rfidcode) {
        fromdate = dmyToymd2($("#fromdate").val());
        todate = dmyToymd2($("#todate").val());

        receivingtypeid2 = $("#receivingtypeid2").val();

        donatebloodtype = $("#donatebloodtype").val();
        bloodstocktypecross = $("#bloodstocktypecross2").val();
    }

    if (bag_number) {
        bloodstocktypecross = $("#bloodstocktypecross2").val();
    }

    $.ajax({
        url: 'data/blood/bloodstocklist.php?keyword=' + keyword +
            '&fromdate=' + fromdate +
            '&todate=' + todate +
            '&receivingtypeid2=' + receivingtypeid2 +
            '&bloodstocktypecross=' + bloodstocktypecross +
            '&donatebloodtype=' + donatebloodtype +
            '&bag_number=' + bag_number +
            '&rfidcode=' + rfidcode +
            '&activepage=' + active +
            '&hn=' + hn +
            '&numrows=' + 25,
        dataType: 'json',
        type: 'get',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {

            var body = document.getElementById("list_table_stock").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var body = document.getElementById("list_table_json_sum").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var event_data = '';
            var event_data_sum = '';



            var LPRC_A = 0;
            var LDPRC_A = 0;
            var PRC_A = 0;
            var SDP_A = 0;
            var LPPC_A = 0;
            var LDPPC_A = 0;
            var PC_A = 0;
            var FFP_A = 0;
            var CRP_A = 0;
            var CAYO_A = 0;

            var LPRC_B = 0;
            var LDPRC_B = 0;
            var PRC_B = 0;
            var SDP_B = 0;
            var LPPC_B = 0;
            var LDPPC_B = 0;
            var PC_B = 0;
            var FFP_B = 0;
            var CRP_B = 0;
            var CAYO_B = 0;

            var LPRC_O = 0;
            var LDPRC_O = 0;
            var PRC_O = 0;
            var SDP_O = 0;
            var LPPC_O = 0;
            var LDPPC_O = 0;
            var PC_O = 0;
            var FFP_O = 0;
            var CRP_O = 0;
            var CAYO_O = 0;

            var LPRC_AB = 0;
            var LDPRC_AB = 0;
            var PRC_AB = 0;
            var SDP_AB = 0;
            var LPPC_AB = 0;
            var LDPPC_AB = 0;
            var PC_AB = 0;
            var FFP_AB = 0;
            var CRP_AB = 0;
            var CAYO_AB = 0;


            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            dataObj = obj;
            var num = 1;
            $.each(obj, function(index, value) {

                var delete_item_start = "";
                var delete_item_end = "";
                if (value.active != 1) {
                    delete_item_start = "<s>";
                    delete_item_end = "</s>";
                }

                if (value.bloodtype == 'LPRC' && value.bloodgroup == 'A') {
                    LPRC_A++;
                } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'A') {
                    LDPRC_A++;
                } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'A') {
                    PRC_A++;
                } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'A') {
                    SDP_A++;
                } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'A') {
                    LPPC_A++;
                } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'A') {
                    LDPPC_A++;
                } else if (value.bloodtype == 'PC' && value.bloodgroup == 'A') {
                    PC_A++;
                } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'A') {
                    FFP_A++;
                } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'A') {
                    CRP_A++;
                } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'A') {
                    CAYO_A++;
                } else if (value.bloodtype == 'LPRC' && value.bloodgroup == 'B') {
                    LPRC_B++;
                } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'B') {
                    LDPRC_B++;
                } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'B') {
                    PRC_B++;
                } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'B') {
                    SDP_B++;
                } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'B') {
                    LPPC_B++;
                } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'B') {
                    LDPPC_B++;
                } else if (value.bloodtype == 'PC' && value.bloodgroup == 'B') {
                    PC_B++;
                } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'B') {
                    FFP_B++;
                } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'B') {
                    CRP_B++;
                } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'B') {
                    CAYO_B++;
                } else if (value.bloodtype == 'LPRC' && value.bloodgroup == 'AB') {
                    LPRC_AB++;
                } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'AB') {
                    LDPRC_AB++;
                } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'AB') {
                    PRC_AB++;
                } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'AB') {
                    SDP_AB++;
                } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'AB') {
                    LPPC_AB++;
                } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'AB') {
                    LDPPC_AB++;
                } else if (value.bloodtype == 'PC' && value.bloodgroup == 'AB') {
                    PC_AB++;
                } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'AB') {
                    FFP_AB++;
                } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'AB') {
                    CRP_AB++;
                } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'AB') {
                    CAYO_AB++;
                } else if (value.bloodtype == 'LPRC' && value.bloodgroup == 'O') {
                    LPRC_O++;
                } else if (value.bloodtype == 'LDPRC' && value.bloodgroup == 'O') {
                    LDPRC_O++;
                } else if (value.bloodtype == 'PRC' && value.bloodgroup == 'O') {
                    PRC_O++;
                } else if (value.bloodtype == 'SDP' && value.bloodgroup == 'O') {
                    SDP_O++;
                } else if (value.bloodtype == 'LPPC' && value.bloodgroup == 'O') {
                    LPPC_O++;
                } else if (value.bloodtype == 'LDPPC' && value.bloodgroup == 'O') {
                    LDPPC_O++;
                } else if (value.bloodtype == 'PC' && value.bloodgroup == 'O') {
                    PC_O++;
                } else if (value.bloodtype == 'FFP' && value.bloodgroup == 'O') {
                    FFP_O++;
                } else if (value.bloodtype == 'CRP' && value.bloodgroup == 'O') {
                    CRP_O++;
                } else if (value.bloodtype == 'CAYO' && value.bloodgroup == 'O') {
                    CAYO_O++;
                }

                event_data += '<tr>';

                if (value.seq == '1')
                    event_data += '<td rowspan="' + value.bloodstockmainamount + '" style="width:40px">' + num + '</td>';

                if (value.seq == '1')
                    event_data += '<td rowspan="' + value.bloodstockmainamount + '" >' + getDMY2(value.bloodstockmaindate) + ' ' + value.bloodstockmaintime + '</td>';

                if (value.seq == '1')
                    event_data += '<td rowspan="' + value.bloodstockmainamount + '">' + value.receivingtypename + '</td>';

                event_data += '<td>' + delete_item_start + value.seq + delete_item_end + '</td>';

                event_data += '<td>' + delete_item_start + value.bloodtype + delete_item_end + '</td>';
                event_data += '<td>' + delete_item_start + value.bag_number + delete_item_end + '</td>';
                event_data += '<td>' + delete_item_start + value.bloodstockrfid + delete_item_end + '</td>';
                event_data += '<td>' + delete_item_start + value.rubberbandnumber + delete_item_end + '</td>';
                event_data += '<td>' + delete_item_start + value.bloodgroup + delete_item_end + '</td>';
                event_data += '<td>' + delete_item_start + value.rhname3 + delete_item_end + '</td>';
                event_data += '<td>' + delete_item_start + value.volume + delete_item_end + '</td>';
                event_data += '<td >' + delete_item_start + getDMY2(value.bloodstart) + delete_item_end + '</td>';
                event_data += '<td >' + delete_item_start + getDMY2(value.bloodexp) + delete_item_end + '</td>';
                event_data += '<td style="width:200px">' + delete_item_start + value.antibody + delete_item_end + '</td>';
                event_data += '<td style="width:200px">' + delete_item_start + value.phenotype + delete_item_end + '</td>';

                if (value.seq == '1')
                    event_data += '<td rowspan="' + value.bloodstockmainamount + '" style="width:200px" id="staffname' + index + '">' + value.bloodstockcreatefullname + '</td>';

                var onclickblood = 'getdatastaffname(' + index + '); addBloodBlank2(' + index + '); ';
                if (value.receivingtypeid == '10')
                    onclickblood = 'getdatastaffname(' + index + '); addBloodBlank2(' + index + '); ';


                if (value.seq == '1') {
                    event_data += '<td rowspan="' + value.bloodstockmainamount + '">';
                    event_data += '<button type="button" onclick="' + onclickblood + '"  class="btn btn-success m-l-5">';
                    event_data += '<i class="fa fa-edit"></i>';
                    event_data += '</button>';
                    event_data += '</td>';
                }

                event_data += '</tr>';

                if (value.seq == '1')
                    num++;

            });
            $("#list_table_stock").append(event_data);

            event_data_sum += '<tr >';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPRC_A > 0) ? 'color="red"' : '') + '>LPRC(A) = ' + LPRC_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPRC_A > 0) ? 'color="red"' : '') + '>LDPRC(A) = ' + LDPRC_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PRC_A > 0) ? 'color="red"' : '') + '>PRC(A) = ' + PRC_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((SDP_A > 0) ? 'color="red"' : '') + '>SDP(A) = ' + SDP_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPPC_A > 0) ? 'color="red"' : '') + '>LPPC(A) = ' + LPPC_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPPC_A > 0) ? 'color="red"' : '') + '>LDPPC(A) = ' + LDPPC_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PC_A > 0) ? 'color="red"' : '') + '>PC(A) = ' + PC_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((FFP_A > 0) ? 'color="red"' : '') + '>FFP(A) = ' + FFP_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CRP_A > 0) ? 'color="red"' : '') + '>CRP(A) = ' + CRP_A + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CAYO_A > 0) ? 'color="red"' : '') + '>CRYO(A) = ' + CAYO_A + '</font></th>';
            event_data_sum += '</tr>';

            event_data_sum += '<tr >';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPRC_B > 0) ? 'color="red"' : '') + '>LPRC(B) = ' + LPRC_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPRC_B > 0) ? 'color="red"' : '') + '>LDPRC(B) = ' + LDPRC_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PRC_B > 0) ? 'color="red"' : '') + '>PRC(B) = ' + PRC_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((SDP_B > 0) ? 'color="red"' : '') + '>SDP(B) = ' + SDP_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPPC_B > 0) ? 'color="red"' : '') + '>LPPC(B) = ' + LPPC_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPPC_B > 0) ? 'color="red"' : '') + '>LDPPC(B) = ' + LDPPC_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PC_B > 0) ? 'color="red"' : '') + '>PC(B) = ' + PC_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((FFP_B > 0) ? 'color="red"' : '') + '>FFP(B) = ' + FFP_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CRP_B > 0) ? 'color="red"' : '') + '>CRP(B) = ' + CRP_B + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CAYO_B > 0) ? 'color="red"' : '') + '>CRYO(B) = ' + CAYO_B + '</font></th>';
            event_data_sum += '</tr>';

            event_data_sum += '<tr >';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPRC_O > 0) ? 'color="red"' : '') + '>LPRC(O) = ' + LPRC_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPRC_O > 0) ? 'color="red"' : '') + '>LDPRC(O) = ' + LDPRC_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PRC_O > 0) ? 'color="red"' : '') + '>PRC(O) = ' + PRC_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((SDP_O > 0) ? 'color="red"' : '') + '>SDP(O) = ' + SDP_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPPC_O > 0) ? 'color="red"' : '') + '>LPPC(O) = ' + LPPC_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPPC_O > 0) ? 'color="red"' : '') + '>LDPPC(O) = ' + LDPPC_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PC_O > 0) ? 'color="red"' : '') + '>PC(O) = ' + PC_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((FFP_O > 0) ? 'color="red"' : '') + '>FFP(O) = ' + FFP_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CRP_O > 0) ? 'color="red"' : '') + '>CRP(O) = ' + CRP_O + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CAYO_O > 0) ? 'color="red"' : '') + '>CRYO(O) = ' + CAYO_O + '</font></th>';
            event_data_sum += '</tr>';

            event_data_sum += '<tr >';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPRC_AB > 0) ? 'color="red"' : '') + '>LPRC(AB) = ' + LPRC_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPRC_AB > 0) ? 'color="red"' : '') + '>LDPRC(AB) = ' + LDPRC_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PRC_AB > 0) ? 'color="red"' : '') + '>PRC(AB) = ' + PRC_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((SDP_AB > 0) ? 'color="red"' : '') + '>SDP(AB) = ' + SDP_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LPPC_AB > 0) ? 'color="red"' : '') + '>LPPC(AB) = ' + LPPC_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((LDPPC_AB > 0) ? 'color="red"' : '') + '>LDPPC(AB) = ' + LDPPC_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((PC_AB > 0) ? 'color="red"' : '') + '>PC(AB) = ' + PC_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((FFP_AB > 0) ? 'color="red"' : '') + '>FFP(AB) = ' + FFP_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CRP_AB > 0) ? 'color="red"' : '') + '>CRP(AB) = ' + CRP_AB + '</font></th>';
            event_data_sum += '<th style="width:120px" class="td-table"><font ' + ((CAYO_AB > 0) ? 'color="red"' : '') + '>CRYO(AB) = ' + CAYO_AB + '</font></th>';
            event_data_sum += '</tr>';

            $("#list_table_json_sum").append(event_data_sum);

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}
var staffname = '';

function getdatastaffname(data) {
    staffname = document.getElementById("staffname" + data).innerHTML;
    console.log("___________________________");
    console.log(staffname);
    console.log("___________________________");

}

function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

function bloodRemark() {
    return $.ajax({
        url: 'data/masterdata/bloodremark.php',
        dataType: 'json',
        type: 'get',
    });
}