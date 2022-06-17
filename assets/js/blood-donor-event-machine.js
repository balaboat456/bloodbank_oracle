var machineData ;
function loadMachineTable() {
    console.log("test");
    setStateMachine("เพิ่ม");
    newMachine();
    $.ajax({
        url: 'data/masterdata/machine.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_machine").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            machineData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.machinename + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editMachine(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>';
                event_data += '<button type="button" onclick="deleteMachine('+value.machineid+')"  class="btn btn-danger btn-sm">';
                event_data += ' <i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_machine").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStateMachine(state)
{
    $("#machinestate").text(state);
}

function newMachine()
{
    setStateMachine("เพิ่ม");
    document.getElementById("emtrymachinename").value = "";
    document.getElementById("emtrymachineid").value = "";
}


function editMachine(self)
{
    setStateMachine("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#emtrymachineid").val(item.machineid) ;
    $("#emtrymachinename").val(item.machinename) ;
    
}

function saveMachine() {

        var emtrymachinename = $("#emtrymachinename").val();
        
        if(emtrymachinename == "")
        {
            MsgSmpMachine("กรุณากรอก Machine");
            return false;
        }

        if(checkMachineDuplicate() )
        {
            MsgSmpMachine("มี Machine นี้อยู่แล้ว");
            return false;
        }

        var data = {emtrymachineid:$("#emtrymachineid").val(),emtrymachinename:emtrymachinename};

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'data/masterdata/machine-entry.php',
            data: data,
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
                    loadMachineTable();
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

function checkMachineDuplicate()
{
    var result = false ;
    obj = machineData ;
    if(document.getElementById("emtrymachineid").value == "")
    $.each(obj, function (index, value) {

        if(value.machinename == document.getElementById("emtrymachinename").value)
        {
            result = true ;
        }
      
    });
    return result ;
}
function deleteMachine(id) {


    swal({
        title: "คุณต้องการลบข้อมูลนี้หรือไม่",
        type: "warning",
        showCloseButton: true,
        showCancelButton: true,
        // dangerMode: true,
        cancelButtonClass: "",
        confirmButtonClass: "btn-success",
        confirmButtonText: " ลบ",
        cancelButtonText: "ยกเลิก",
        closeOnConfirm: true
    },
    function (inputValue) {
        if(inputValue)
        {
            var param = {
                id: id,
            };

            spinnershow();
            $.ajax({
                type: 'POST',
                url: 'data/masterdata/machine-delete.php',
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
                        loadMachineTable();
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

function MsgSmpMachine(text)
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
