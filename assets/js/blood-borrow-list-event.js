function loadTable(active = 1) {

    var bloodborrowhn = '';
    var fromdate = '';
    var todate = '';
    var hospitalid = '';
    var receivingtypeid = '';

    bloodborrowhn = $("#bloodborrowhn").val();

    if (!bloodborrowhn) {
        fromdate = dmyToymd2($("#fromdate").val());
        todate = dmyToymd2($("#todate").val());

        hospitalid = $("#hospitalid").val();
        receivingtypeid = $("#receivingtypeid").val();
    }

    $.ajax({
        url: 'data/bloodborrow/bloodborrowlist.php?bloodborrowhn=' + bloodborrowhn +
            '&fromdate=' + fromdate +
            '&todate=' + todate +
            '&hospitalid=' + hospitalid +
            '&receivingtypeid=' + receivingtypeid +
            '&activepage=' + active +
            '&numrows=' + 25,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_blood").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var event_data = '';
            var start = data.pagination.start;

            $("#total").text("รวมทั้งหมด " + data.pagination.total + " ราย");

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            $.each(obj, function(index, value) {
                event_data += '<tr id="'+value.status +'">';
                if(value.status == 0){
                    event_data += '<td>' + getDMY2(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</td>';
                    event_data += '<td>' + value.receivingtypename2 + '</td>';
                    event_data += '<td>' + value.hospitalname + '</td>';
                    event_data += '<td>' + value.bloodborrowhn + '</td>';
                    event_data += '<td>' + value.patientfullname + ' </td>';
                    event_data += '<td>';
                    event_data += '<button type="button" onclick="editPage(' + value.bloodborrowid + ')"  class="btn btn-success m-l-5">';
                    event_data += '<i class="fa fa-edit"></i>';
                    event_data += '</button>';
                    event_data += '</td>';
                    event_data += '</tr>';
                }else{
                    event_data += '<td><s>' + getDMY2(value.bloodborrowdate) + ' ' + value.bloodborrowtime + '</s></td>';
                    event_data += '<td><s>' + value.receivingtypename2 + '</s></td>';
                    event_data += '<td><s>' + value.hospitalname + '</s></td>';
                    event_data += '<td><s>' + value.bloodborrowhn + '</s></td>';
                    event_data += '<td><s>' + value.patientfullname + ' </s></td>';
                    event_data += '<td>';
                    event_data += '<button type="button" onclick="editPage(' + value.bloodborrowid + ')"  class="btn btn-success m-l-5">';
                    event_data += '<i class="fa fa-edit"></i>';
                    event_data += '</button>';
                    event_data += '</td>';
                    event_data += '</tr>';
                }
             

            });
            $("#list_table_blood").append(event_data);

            pagination(data.pagination);


        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function scanBarcode(self) {
    setNewHN(self);
    loadTable();

}