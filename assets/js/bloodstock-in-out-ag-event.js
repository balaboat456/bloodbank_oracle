function scanBarcodeAddBloodStockInTypeAg() {
    var bag_number = $('#ag_bag_number').val();

    var bag_number_new = numnerPoint(bag_number);
    $('#ag_bag_number').val(bag_number_new);
    if (bag_number_new.length == 14) {
        addBloodStockInTypeAg();
    }

}

function addBloodStockInTypeAg() {
    var bloodtype = $("#ag_bloodstocktypecross1").val();
    var bagnumber = $("#ag_bag_number").val();
    var rfid = $("#ag_rfidscan").val();

    $.ajax({
        url: 'data/blood/bloodstocktypeag-list.php?bloodtype=' + bloodtype + '&bagnumber=' + bagnumber + '&rfid=' + rfid,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            addBloodStockInTypeAgTable(data.data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function addBloodStockInTypeAgTable(data = []) {
    var arrayData = data[0];

    // ไม่พบข้อมูล
    if (data.length == 0) {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("ไม่พบข้อมูล", "", callback);
        return false;
    }

    // เพิ่มไปแล้ว
    if (arrayData.istypeag == 1) {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("หมายเลขถุงนี้ได้ถูกเพิ่มแล้ว", "[ " + arrayData.bloodtype + " ] " + arrayData.bag_number, callback);
        return false;
    }

    // ซ้ำกับที่เพิ่มในตาราง
    if (checkBloodStockInTypeAgRow(arrayData.bag_number)) {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("หมายเลขถุงนี้ซ้ำ", "[ " + arrayData.bloodtype + " ] " + arrayData.bag_number, callback);
        return false;
    }

    // ไม่พบ Phenotype
    if (arrayData.phenotype == "") {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("ไม่พบ Phenotype ในหมายเลขถุงนี้", "[ " + arrayData.bloodtype + " ] " + arrayData.bag_number, callback);
        return false;
    }

    // ตรวจสอบ Phenotype
    if (checkBloodStockInTypeAgPheno(arrayData)) {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("Phenotype ไม่ตรงกัน", arrayData.phenotype, callback);
        return false;
    }

    // ตรวจสอบ ABO
    if (checkBloodStockInTypeABO(arrayData.bloodgroup)) {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("หมู่เลือดต้องเป็น A , B , O , AB เท่านั้น", "หมู่เลือดถุงนี้คือ " + arrayData.bloodgroup, callback);
        return false;
    }

    addBloodStockInTypeAgRow(arrayData);

}

function checkBloodStockInTypeAgRow(bagnumber = "") {
    var status = false;
    var ArrayRow = getTableListTypeAg();
    $.each(ArrayRow, function(index, value) {
        var arr = JSON.parse(value);
        if (arr.bag_number == bagnumber) {
            status = true;
        }

    });
    return status;
}

function checkBloodStockInTypeABO(v = "") {
    var status = true;
    if (v == "A" || v == "B" || v == "AB" || v == "O") {
        status = false;
    }

    return status;
}

function checkBloodStockInTypeAgPheno(data = []) {
    var phenotype = $("#addAgPhenotypeTitle").val();
    var arrPhenotype = phenotype.split(",");
    var status = true;
    var count = 0;
    $.each(arrPhenotype, function(inx, vl) {

        var arrData = data.phenotype.split(",");

        $.each(arrData, function(index, value) {

            if (value == vl) {
                count++;
            }

        });
    });

    if (count == arrPhenotype.length && count > 0) {
        status = false;
    }

    return status;
}

function addBloodStockInTypeAgRow(data = []) {
    var event_data = '';

    var arr = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));

    event_data += '<tr>';
    event_data += '<td  style="display:none;" >';
    event_data += JSON.stringify(arr);
    event_data += '</td>';
    event_data += '<td>' + "1" + '</td>';
    event_data += '<td>';
    event_data += arr.bloodtype;
    event_data += '</td>';
    event_data += '<td>';
    event_data += arr.bag_number;
    event_data += '</td>';
    event_data += '<td>';
    event_data += arr.phenotype;
    event_data += '</td>';
    event_data += '<td>';
    event_data += '<button type="button" onclick="deleteRowAg(this)" class="btn btn-danger m-l-5">';
    event_data += '<i class="fa fa-trash"></i>';
    event_data += '</button>'
    event_data += '</td>';
    event_data += '</tr>';

    $("#list_table_json_type_ag").append(event_data);

    ClearTypeAgBagNumber();

}

function PhenotypeAgInItemSave() {
    var ArrayRow = getTableListTypeAg();
    var bloodstocktypeagid = $("#bloodstocktypeagid").val();

    if (ArrayRow.length == 0) {
        const callback = function(inputValue) {
            if (inputValue) {
                ClearTypeAgBagNumber();
            }
        }
        mgsErrorAg("คุณยังไม่เพิ่มผลิตภัณฑ์", "", callback);
        return false;
    }

    spinnershow();

    var data = { bloodstocktypeagitem: JSON.stringify(ArrayRow), bloodstocktypeagid: bloodstocktypeagid };

    $.ajax({
        type: 'POST',
        url: 'inventory-blood-bank-ag-phenotype-item-save.php',
        data: data,
        dataType: 'json',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {

            if (data.status) {
                myAlertTop();
                closeAddAgPhenotypeModal();
                loadTableInOutAg();
            } else {
                myAlertTopError();
            }

        },
        error: function(data) {
            console.log('An error occurred.');
            console.log(data);
            myAlertTopError();
        },
    });
    return false;
}


function mgsErrorAg(title, text, getDurgicaldateDateCallback) {

    swal({
        title: title,
        text: text,
        html: true,
        icon: 'warning',
        type: 'html',
        confirmButtonText: 'OK',
        allowOutsideClick: false
    }).then(getDurgicaldateDateCallback);


}

function getTableListTypeAg() {
    var arr = [];
    var rows = document.getElementById("list_table_json_type_ag").rows;
    for (var i = 1; i < rows.length; i++) {
        arr.push(rows[i].cells[0].innerHTML);
    }
    return arr;

}

function ClearTypeAgBagNumber() {

    if (document.getElementById("ag_rfidscan").value != "") {
        document.getElementById("ag_rfidscan").value = '';
        document.getElementById("ag_rfidscan").focus();
    } else {
        document.getElementById("ag_bag_number").value = '';
        document.getElementById("ag_bag_number").focus();
    }


}

function deleteRowAg(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}