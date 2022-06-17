var countReceivingTypeid_5 = 0;
var dataReceivingTypeid_5 = [];

function loadTableBloodBorrowReceivingtypeid5(receivingtypeid = '') {

    dataReceivingTypeid_5 = [];
    $("#bloodborrowitemid").val("");
    var hospitalid = $("#hospital").val();

    $.ajax({
        url: 'data/bloodstock/blood_borrow_list_receivingtypeid_5.php?hospitalid=' + hospitalid + '&receivingtypeid=' + receivingtypeid,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            var body = document.getElementById("list_blood_borrow_receivingtypeid_5").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            objBloodborrow = obj;
            countReceivingTypeid_5 = 0;
            var event_data = '';
            $.each(obj, function(index, value) {



                value.blood_group_borrow = "A";
                value.qty = (value.a_qty - value.a_qty_get);

                event_data += '';
                event_data += '<tr onClick="chActiveReceivingTypeid_5(this)" >';
                event_data += '<td  style="display:none;" >';
                event_data += index + JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + value.bloodborrowcode + '</td>';
                event_data += '<td style="text-align:left;">' + value.group_bloodstocktypename + '00000</td>';
                event_data += '<td>' + value.group_bloodgroup + '</td>';
                event_data += '<td>' + value.group_sum_bloodgroup + '</td>';
                event_data += '<td>' + value.sum_qty + '</td>';
                event_data += '<td >' + getDMY(value.bloodborrowdate) + '</td>';

                event_data += '<td>' + value.group_bloodstocktypename2_get + '</td>';
                event_data += '<td>' + value.group_bloodgroup_get + '</td>';
                event_data += '<td>' + value.group_sum_bloodgroup_get + '</td>';
                event_data += '<td>' + value.net_sum_bloodgroup_get + ((parseInt(value.net_sum_bloodgroup_get) < 0) ? '<br/><p style="color:red">รับเกินจำนวน</p>' : '') + '</td>';
                event_data += '<td >' + value.group_bloodstockmaindate + '</td>';
                // event_data += '<td >' + (value.sum_qty - value.net_sum_bloodgroup_get)   + '</td>';
                event_data += '</tr>';
                countReceivingTypeid_5++;


            });
            $("#list_blood_borrow_receivingtypeid_5").append(event_data);
            // console.log(data)
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function chActiveReceivingTypeid_5(self) {

    var table = document.getElementById("list_blood_borrow_receivingtypeid_5");
    var r = 1;
    while (row = table.rows[r++]) {
        row.style.background = "#FFF"
    }
    self.style.background = "#b7e4eb";

    var index = self.cells[0].innerHTML;
    var item = objBloodborrow[parseInt(index)]
    dataReceivingTypeid_5 = item;

    chk_bag_icon++;

    // console.log(dataReceivingTypeid_5);

}

function confirmchReceivingTypeid_5() {
    var item = dataReceivingTypeid_5;
    var receivingtypeid = $("#receivingtypeid").val();


    if (item.length == 0) {
        swal({
            title: "กรุณาเลือกรายการที่จะรับเลือด",
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        });
        return false;
    }
    // setDataModalSelectValue('bloodstocktypecross', item.bloodstocktypeid, item.bloodstocktypename2);
    if (receivingtypeid == 5 || receivingtypeid == 6 || receivingtypeid == 11 || receivingtypeid == 12) {
        setDataModalSelectValue('bloodgroupcross', '', '');
    } else {
        setDataModalSelectValue('bloodgroupcross', item.blood_group_borrow, item.blood_group_borrow);
    }
    $("#patienthn").val(item.bloodborrowhn);
    $("#patientfullname").val(item.patientfullname);
    $("#bloodborrowitemid").val(item.bloodborrowitemid);
    // $("#qty").val(item.qty);
    $("#qty").val("");

    if (item.bloodstocktypeid == 'CRYO')
        $("#volume").val("10");

    // document.getElementById('phenotype').value = item.bloodborrowantigen;
    // document.getElementById('phenotypeLable').innerHTML = item.bloodborrowantigen;

    setVolume(item.bloodstocktypeid);

    closeBloodBorrow5();
}