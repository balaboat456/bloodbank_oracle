var activityData ;
function loadActivityTable() {
    setStateActivity("เพิ่ม");
    newActivity();
    $.ajax({
        url: 'data/masterdata/donate-activity.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_activity").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            activityData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.activityname + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editActivity(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>&nbsp;&nbsp;';
                event_data += '<button type="button" onclick="deleteActivity(' + value.activityid + ')"  class="btn btn-danger btn-sm">';
                event_data += ' <i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_activity").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStateActivity(state)
{
    $("#activitystate").text(state);
}

function newActivity()
{
    setStateActivity("เพิ่ม");
    document.getElementById("emtryactivityname").value = "";
    document.getElementById("emtryactivityid").value = "";
}


function editActivity(self)
{
    setStateActivity("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#emtryactivityid").val(item.id) ;
    $("#emtryactivityname").val(item.activityname) ;
    
    
}

function saveActivity() {

        var emtryactivityname = $("#emtryactivityname").val();
        
        if(emtryactivityname == "")
        {
            MsgSmpActivity("กรุณากรอกกิจกรรม");
            return false;
        }

        if(checkActivityDuplicate() )
        {
            MsgSmpActivity("กิจกรรมนี้มีอยู่แล้ว");
            return false;
        }


        var data = {emtryactivityid:$("#emtryactivityid").val(),emtryactivityname:emtryactivityname};

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'data/masterdata/donate-activity-entry.php',
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
                    loadActivityTable();
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

function checkActivityDuplicate()
{
    var result = false ;
    obj = activityData ;
    if(document.getElementById("emtryactivityid").value == "")
    $.each(obj, function (index, value) {

        if(value.activityname == document.getElementById("emtryactivityname").value)
        {
            result = true ;
        }
      
    });
    return result ;
}
function deleteActivity(id) {


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
                url: 'data/masterdata/activity-delete.php',
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
                        loadActivityTable();
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



function MsgSmpActivity(text)
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
