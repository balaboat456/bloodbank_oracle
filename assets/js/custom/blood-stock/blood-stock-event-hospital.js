var hospitalData ;
function loadHospitalTable() {
    setStateHospital("เพิ่ม");
    newHospital();
    $.ajax({
        url: 'data/masterdata/hospital.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_hospital").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            var hospitalcode_check = '';
            hospitalData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                // event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.hospitalcode + '</td>';
                event_data += '<td style="text-align: left;">' + value.hospitalname + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editHospital(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>&nbsp;&nbsp;';
                event_data += '<button type="button" onclick="deleteHospital(' + value.hospitalid + ')"  class="btn btn-danger btn-sm">';
                event_data += ' <i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

                hospitalcode_check += value.hospitalcode+',';

            });
            $("#hospitalcode_check").val(hospitalcode_check);
            $("#list_table_json_hospital").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStateHospital(state)
{
    $("#hospitalstate").text(state);
}

function newHospital()
{
    setStateHospital("เพิ่ม");
    document.getElementById("hospitalname").value = "";
    document.getElementById("hospitalid").value = "";
}


function editHospital(self)
{
    setStateHospital("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#hospitalid").val(item.hospitalid) ;
    $("#hospitalcode").val(item.hospitalcode);
    $("#hospitalname").val(item.hospitalname);
    
    
}

function saveHospital() {

        var emtryhospitalname = $("#hospitalname").val();
    var hospitalcode = $("#hospitalcode").val();

    var hospitalcode_check = document.getElementById("hospitalcode_check").value;
    var hospitalcode_check2 = hospitalcode_check.includes(hospitalcode);

    if (hospitalcode_check2 == true){
        MsgSmpMoblieHospital("รหัสนี้มีอยู่แล้ว");
        return false;
    }
        
        if(emtryhospitalname == "")
        {
            MsgSmpMoblieHospital("กรุณากรอกชื่อสาขา");
            return false;
        }

        if(checkHospitalDuplicate() )
        {
            MsgSmpMoblieHospital("สาขานี้มีอยู่แล้ว");
            return false;
        }



    var data = { hospitalid: $("#hospitalid").val(), hospitalname: emtryhospitalname, hospitalcode: hospitalcode };

        console.log(data);

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'data/masterdata/hospital-entry.php',
            data: data,
            dataType: 'json',
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {
                $("#hospitalcode").val('');
                if (data.status == 1) {
                    myAlertTop();
                    loadHospitalTable();
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

function checkHospitalDuplicate()
{
    var result = false ;
    obj = hospitalData ;
    if(document.getElementById("hospitalid").value == "")
    $.each(obj, function (index, value) {

        if(value.hospitalname == document.getElementById("hospitalname").value)
        {
            result = true ;
        }
      
    });
    return result ;
}
function deleteHospital(id) {

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
                url: 'data/masterdata/hospital-delete.php',
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
                        loadHospitalTable();
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


function MsgSmpMoblieHospital(text)
{
    swal({
        title: text,
        type: "warning",
        showCancelButton: false,
        confirmButtonText: 'OK',
        confirmButtonClass: "btn-danger",
        closeOnConfirm: true
      });
}
