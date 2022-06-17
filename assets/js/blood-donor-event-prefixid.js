var prefixData ;
function loadPrefixTable() {
    setStatePrefix("เพิ่ม");
    newPrefix();
    $.ajax({
        url: 'data/masterdata/prefix.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_prefix").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            prefixData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.prefixname + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editPrefix(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>&nbsp;&nbsp;';
                event_data += '<button type="button" onclick="deletePrefix(' + value.prefixid + ')"  class="btn btn-danger btn-sm">';
                event_data += ' <i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_prefix").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStatePrefix(state)
{
    $("#prefixstate").text(state);
}

function newPrefix()
{
    setStatePrefix("เพิ่ม");
    document.getElementById("emtryprefixname").value = "";
    document.getElementById("emtryprefixid").value = "";
}


function editPrefix(self)
{
    setStatePrefix("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#emtryprefixid").val(item.prefixid) ;
    $("#emtryprefixname").val(item.prefixname) ;
    
    
}

function savePrefix() {

        var emtrygenderid = "";
        var emtryprefixname = $("#emtryprefixname").val();
        
        if(emtryprefixname == "")
        {
            MsgSmpPrefix("กรุณากรอกคำนำหน้านาม");
            return false;
        }

        if(checkPrefixDuplicate() )
        {
            MsgSmpPrefix("มีคำนำหน้านามนี้อยู่แล้ว");
            return false;
        }


        var data = {emtryprefixid:$("#emtryprefixid").val(),emtryprefixname:emtryprefixname,emtrygenderid:emtrygenderid};

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'data/masterdata/prefix-entry.php',
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
                    loadPrefixTable();
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

function checkPrefixDuplicate()
{
    var result = false ;
    obj = prefixData ;
    if(document.getElementById("emtryprefixid").value == "")
    $.each(obj, function (index, value) {

        if(value.prefixname == document.getElementById("emtryprefixname").value)
        {
            result = true ;
        }
      
    });
    return result ;
}
function deletePrefix(id) {


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
                url: 'data/masterdata/prefix-delete.php',
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
                        loadPrefixTable();
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

function MsgSmpPrefix(text)
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

function myAlertTop() {
    $(".myAlert-top").show();
    setTimeout(function () {
        $(".myAlert-top").hide();
    }, 5000);
}

function myAlertTopError() {
    $(".myAlert-top-error").show();
    setTimeout(function () {
        $(".myAlert-top-error").hide();
    }, 5000);
}

function myAlertTopDelete() {
    $(".myAlert-top-delete").show();
    setTimeout(function () {
        $(".myAlert-top-delete").hide();
    }, 5000);
}

function myAlertTopErrorDelete() {
    $(".myAlert-top-error-delete").show();
    setTimeout(function () {
        $(".myAlert-top-error-delete").hide();
    }, 5000);
}
