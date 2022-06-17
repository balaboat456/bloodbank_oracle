var hospitalData ;
var brokenData;

function loadBrokenTable() {
    setStateBroken("เพิ่ม");
    newBroken();
    $.ajax({
        url: 'data/masterdata/blood_broken.php?grouptypeid=2',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_broken").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            hospitalData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                // event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.bloodbrokenid + '</td>';
                event_data += '<td style="text-align: left;">' + value.bloodbrokenname + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editBroken(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>';
                event_data += '<button type="button" onclick="deleteBroken(' + value.bloodbrokenid + ')"  class="btn btn-danger btn-sm">';
                event_data += ' <i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';


            });
            $("#list_table_json_broken").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStateBroken(state)
{
    $("#brokenstate").text(state);
}

function newBroken()
{
    setStateBroken("เพิ่ม");
    document.getElementById("bloodbrokenid_modal").value = "";
    document.getElementById("bloodbrokenname_modal").value = "";
}


function editBroken(self)
{
    setStateBroken("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#bloodbrokenid_modal").val(item.bloodbrokenid) ;
    $("#bloodbrokenname_modal").val(item.bloodbrokenname);
    
    
}

function saveBroken() {

    var bloodbrokenid_modal = $("#bloodbrokenid_modal").val();
    var bloodbrokenname_modal = $("#bloodbrokenname_modal").val();

        
    if (bloodbrokenname_modal == "")
        {
            MsgSmpMoblieHospital("กรุณากรอกชื่อสาเหตุก่อนบันทึก");
            return false;
        }




    var data = { bloodbrokenid: bloodbrokenid_modal, bloodbrokenname: bloodbrokenname_modal };

        console.log(data);

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'data/masterdata/blood_broken_insert.php',
            data: data,
            dataType: 'json',
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {
                $("#bloodbrokenid_modal").val('');
                if (data.status == 1) {
                    myAlertTop();
                    loadBrokenTable();
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
function deleteBroken(id) {

    swal({

        title: "คุณต้องการลบข้อมูลนี้หรือไม่",
        type: "warning",
        showCancelButton: true,
        showDenyButton: true,  
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "ลบ",
        denyButtonText: "ยกเลิก",
        allowOutsideClick: false

      }).then((inputValue) => {
        if(inputValue)
        {
            var param = {
                id: id,
            };

            spinnershow();
            $.ajax({
                type: 'POST',
                url: 'data/masterdata/blood_broken_delete.php',
                data: param,
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
                        loadBrokenTable();
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


// function MsgSmpMoblieHospital(text)
// {
//     swal({
//         title: text,
//         type: "warning",
//         showCancelButton: false,
//         confirmButtonText: 'OK',
//         confirmButtonClass: "btn-danger",
//         closeOnConfirm: true
//       });
// }
