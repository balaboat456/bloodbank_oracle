var moblieunitData ;
function loadMoblieUnitTable() {
    setStateMobleUnit("เพิ่ม");
    newMoblieUnit();
    $.ajax({
        url: 'data/masterdata/mobile-unit.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_moblie_unit").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            moblieunitData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.dmu_name + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editMoblieUnit(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>&nbsp;&nbsp;';
                event_data += '<button type="button" onclick="deleteUnit(' + value.id + ')"  class="btn btn-danger btn-sm">';
                event_data += ' <i class="fa fa-trash"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_moblie_unit").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStateMobleUnit(state)
{
    $("#moblieunitstate").text(state);
}

function newMoblieUnit()
{
    setStateMobleUnit("เพิ่ม");
    document.getElementById("emtrymoblieunitname").value = "";
    document.getElementById("emtrymoblieunitid").value = "";
}


function editMoblieUnit(self)
{
    setStateMobleUnit("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#emtrymoblieunitid").val(item.id) ;
    $("#emtrymoblieunitname").val(item.dmu_name) ;
    
    
}

function saveMoblieUnit() {

        var emtrymoblieunit = $("#emtrymoblieunitname").val();
        
        if(emtrymoblieunit == "")
        {
            MsgSmpMoblieUnit("กรุณากรอกหน่วยเคลื่อนที่");
            return false;
        }

        if(checkMoblieUnitDuplicate() )
        {
            MsgSmpMoblieUnit("หน่วยเคลื่อนที่นี้มีอยู่แล้ว");
            return false;
        }


        var data = {emtrymoblieunitid:$("#emtrymoblieunitid").val(),emtrymoblieunitname:emtrymoblieunit};

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'data/masterdata/moblie-unit-entry.php',
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
                    loadMoblieUnitTable();
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

function checkMoblieUnitDuplicate()
{
    var result = false ;
    obj = moblieunitData ;
    if(document.getElementById("emtrymoblieunitid").value == "")
    $.each(obj, function (index, value) {

        if(value.dmu_name == document.getElementById("emtrymoblieunitname").value)
        {
            result = true ;
        }
      
    });
    return result ;
}
function deleteMoblieUnit(id) {


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
                url: 'data/masterdata/moblie-unit-delete.php',
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
                        loadMoblieUnitTable();
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


function deleteUnit(id) {

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
                url: 'data/masterdata/unit-delete.php',
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
                        loadMoblieUnitTable();
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


function MsgSmpMoblieUnit(text)
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
