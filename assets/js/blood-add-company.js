var companyData ;
function loadCompanyTable() {
    setStateCompany("เพิ่ม");
    newCompany();
    $.ajax({
        url: 'data/masterdata/company.php',
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var body = document.getElementById("list_table_json_company").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            var event_data = '';
            companyData = obj ;
            $.each(obj, function (index, value) {

                event_data += '<tr  >';
                event_data += '<td  style="display:none;" >';
                event_data += JSON.stringify(value);
                event_data += '</td>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + value.companypasname + '</td>';
                event_data += '<td class="td-table">';
                event_data += '<button type="button" onclick="editCompany(this)"  class="btn btn-success btn-sm">';
                event_data += ' <i class="fa fa-edit"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_company").append(event_data);
        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setStateCompany(state)
{
    $("#companystate").text(state);
}

function newCompany()
{
    setStateCompany("เพิ่ม");
    document.getElementById("emtrycompanypasname").value = "";
    document.getElementById("emtrycompanypasid").value = "";
}

function editCompany(self)
{
    setStateCompany("แก้ไข้");
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    $("#emtrycompanypasid").val(item.companypasid) ;
    $("#emtrycompanypasname").val(item.companypasname) ;
    console.log(item);
    

}

function saveCompany() {

    var emtrycompanypasid = "";
    var emtrycompanypasname = $("#emtrycompanypasname").val();
    
    if(emtrycompanypasname == "")
    {
        MsgSmpCompany("กรุณากรอกชื่อบริษัท");
        return false;
    }

    if(checkCompanyDuplicate() )
    {
        MsgSmpCompany("มีบริษัทนี้อยู่แล้ว");
        return false;
    }


    var data = {emtrycompanypasid:$("#emtrycompanypasid").val(),emtrycompanypasname:emtrycompanypasname};

    spinnershow();
    $.ajax({
        type: 'POST',
        url: 'data/masterdata/company-entry.php',
        data: data,
        dataType: 'json',
        complete: function () {
            var delayInMilliseconds = 200;
            setTimeout(function () {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function (data) {
            console.log(data)
            if (data.status == 1) {
                myAlertTop();
                loadCompanyTable();
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

function checkCompanyDuplicate()
{
    var result = false ;
    obj = companyData ;
    if(document.getElementById("emtrycompanypasid").value == "")
    $.each(obj, function (index, value) {

        if(value.companypasname == document.getElementById("emtrycompanypasname").value)
        {
            result = true ;
        }
      
    });
    return result ;
}

function MsgSmpCompany(text)
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
