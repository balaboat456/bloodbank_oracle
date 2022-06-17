var requestbloodid = "";

function loadTable(id) {
    requestbloodid = id;
    $.ajax({
        url: 'data/bloodqueue/bloodqueue-history-nurse-list.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }


            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                var td_s1 = "";
                var td_s2 = "";

                if (value.requestbloodcrossmacthconfirmcancelstatus == 1) {
                    td_s1 = '<s>';
                    td_s2 = '<s>';
                }

                event_data += '<tr >';
                event_data += '<td>' + td_s1 + value.bloodstocktypename2 + td_s2 + '</td>';
                event_data += '<td>' + td_s1 + value.requestbloodcrossmacthconfirmqty + td_s2 + '</td>';
                event_data += '<td>' + td_s1 + value.volume + td_s2 + '</td>';
                event_data += '<td>' + td_s1 + getDMY(value.requestbloodcrossmacthconfirmdate) + ' ' + value.requestbloodcrossmacthconfirmtime + td_s2 + '</td>';
                event_data += '<td>' + td_s1 + getDMY(value.requestbloodcrossmacthconfirmsavedate) + ' ' + value.requestbloodcrossmacthconfirmsavetime + td_s2 + '</td>';
                event_data += '<td>' + td_s1 + value.fullname + td_s2 + '</td>';
                event_data += '<td>' + value.requestbloodcrossmacthconfirmcancelremark + '</td>';

                event_data += '<td class="td-table">';

                if (value.requestbloodcrossmacthconfirmcancelstatus != 1) {

                    if (parseInt(value.ispaybloodstatus) == 0) {
                        event_data += '<button type="button" onclick="deleteRowReqBlood(' + value.groupid + ')"  class="btn btn-danger m-l-5">';
                        event_data += '<i class="fa fa-trash"></i>';
                        event_data += '</button>&nbsp;&nbsp;';
                    }
                    event_data += '<button type="button" onclick="printForm(' + value.groupid + ')"  class="btn btn-success m-l-5">';
                    event_data += '<i class="fa fa-print"></i>';
                    event_data += '</button>';
                }

                event_data += '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}


function deleteRowReqBlood(id = "") {

    closePage();
    swal({
            title: "คุณต้องการยกเลิกข้อมูลนี้หรือไม่",
            type: "input",
            inputPlaceholder: "กรุณาระบุสาเหตุการยกเลิก",
            showCloseButton: true,
            showCancelButton: true,

            // dangerMode: true,
            cancelButtonClass: "",
            confirmButtonClass: "btn-success",
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: true
        },
        function(inputValue) {
            if (inputValue) {
                spinnershow();
                $.ajax({
                    url: 'data/bloodqueue/requestblood-crossmacth-confirm-delete.php?groupid=' + id + "&value=" + inputValue,
                    dataType: 'json',
                    type: 'get',
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            spinnerhide();
                            showModal(requestbloodid);
                        }, delayInMilliseconds);
                    },
                    success: function(data) {
                        if (data.status == true) {
                            console.log("test");
                            socket.emit('queue', data.gid);

                            myAlertTop();
                            // loadTableBloodQueueWaitUsedNurse();
                            // loadTableBloodQueueHistoryUsedNurse();

                        } else {
                            myAlertTopErrorDelete();
                        }
                    },
                    error: function(d) {
                        /*console.log("error");*/
                        alert("404. Please wait until the File is Loaded.");
                    }
                });

            } else {
                showModal(requestbloodid);
            }
        });
}