var count = 0;
var stylecolor = [];
var dataObj = [];
var indexActive = '';
// function loadTable(hn='',state='') {

//     $.ajax({
//         url: 'data/bloodexchange/blood-exchange.php?hn=' + hn ,
//         dataType: 'json',
//         type: 'get',
//         success: function (data) {

//             var body = document.getElementById("table_blood_exchange").getElementsByTagName('tbody')[0];
//             while (body.firstChild) {
//                 body.removeChild(body.firstChild);
//             }

//             var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""'));
//             dataObj = obj;
//             count = obj.length ;
//             var event_data = '';
//             $.each(obj, function (index, value) {

//                 var style = "#FFFFFF"                

                

//                 event_data += '';
//                 event_data += '<tr style="background:' + style + '" id="trblood' + (index) + '" onClick="chActive(' + (index) + ',this)" >';
//                 event_data += '<td  style="display:none;" >';
//                 event_data += JSON.stringify(value);
//                 event_data += '</td>';
//                 event_data += '<td>' + value.patientan +  '</td>';
//                 event_data += '<td>' + value.terms +  '</td>';
//                 event_data += '<td >' + getDMYHM(value.bloodexchangedatetime)  + '</td>';
//                 event_data += '<td>' + value.bloodexchangetypename +  '</td>';
//                 event_data += '<td>' + value.exchangemachinename +  '</td>';
//                 event_data += '<td>' + value.doctorname +  '</td>';
//                 event_data += '<td>' + value.diagnosis +  '</td>';
                
//                 event_data += '</tr>';

//             });
//             $("#table_blood_exchange").append(event_data);

//             if(state == "insert")
//             {
//                 chActive(0);
//             }else if(state == "update")
//             {
//                 chActive(indexActive);
//             }

//         },
//         error: function (d) {
//             /*console.log("error");*/
//             alert("404. Please wait until the File is Loaded.");
//         }
//     });

    function loadTable(hn='') {

        $.ajax({
            url: 'data/bloodexchange/blood-exchange-cross.php?hn=' + hn ,
            dataType: 'json',
            type: 'get',
            success: function (data) {
    
                console.log(data.data);
                var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                            count_cross = obj.length;
                            // count_cross = data.data.length.toString();
                            var count = 0;
                            var event_data = '';
                $.each(obj, function (index, value) {
    
                    count++;
                    event_data += '<tr class="tr_color_1" id="tr_cross_req' + count + '">';
                    event_data += '<td  style="display:none;" >';
                    event_data += JSON.stringify(value);
                    event_data += '</td>';
                    event_data += '<td>';
                    event_data += '<input type="checkbox" id = "chk'+ count +'" class ="setblood"  onchange="setBloodOutCheck(' + count +')" >';
                    event_data += '</td>';
                    event_data += '<td>' + count + '</td>';
                    event_data += '<td id="bag_number_cross' + count + '">' + value.bag_number + '</td>';
                    event_data += '<td id="bloodgroupid' + count + '">' + value.bloodgroupid + '</td>';
                    event_data += '<td id="bloodtype' + count + '">' + value.bloodtype + '</td>';
                    event_data += '<td hidden id="rhid' + count + '">' + value.rhid + '</td>';
                    event_data += '<td id="rhname3' + count + '">' + value.rhname3 + '</td>';
                    event_data += '<td id="volume' + count + '">' + value.volume + '</td>';
                    event_data += '<td id="requestbloodcrossmacthdatetime' + count + '">' + value.requestbloodcrossmacthdatetime + '</td>';
                    event_data += '<td id="crossmacthstatusname' + count + '">' + value.crossmacthstatusname + '</td>';
                    event_data += '<td hidden id="staff' + count + '">' + value.isbloodpreparation + '</td>';
                    event_data += '<td>' + value.name + ' ' + value.surname + '</td>';
                    event_data += '<td hidden id="patientid' + count + '">' + value.patientid + '</td>'; //
                    event_data += '<td hidden id="requestunit' + count + '">' + value.requestunit + '</td>'; //รหัสหน่วยงาน
                    event_data += '<td hidden id="unitofficename' + count + '">' + value.unitofficename + '</td>'; //ชื่อหน่วยงาน                        
                    event_data += '<td hidden id="requestblooddate' + count + '">' + getDMY(value.requestblooddate) + '</td>'; //วันที่  ที่ใช้
                    event_data += '<td hidden id="requestbloodtime' + count + '">' + value.requestbloodtime + '</td>'; //เวลา ที่ใช้
                    event_data += '<td hidden id="wash_status' + count + '">' + value.wash_status + '</td>'; //ยกเลิก
                    event_data += '<td hidden id="wash_status_remark' + count + '">' + value.wash_status_remark + '</td>'; //สาเหตุยกเลิก
                    event_data += '<td hidden id="doctorid' + count + '">' + value.doctorid + '</td>'; //รหัสผู้สั่งทำ
                    event_data += '<td hidden id="doctorname' + count + '">' + value.doctorname + '</td>'; //ผู้สั่งทำ
                    event_data += '<td hidden id="diagnosis' + count + '">' + value.diagnosis + '</td>'; //diagnosis
                    event_data += '<td hidden id="diagnosisdetail' + count + '">' + value.diagnosisdetail + '</td>'; //diagnosisdetail
                    
                    
                    

                    event_data += '</tr>';
    
                });
                $("#table_blood_exchange_cross").append(event_data);
    
            
    
            },
            error: function (d) {
                /*console.log("error");*/
                alert("404. Please wait until the File is Loaded.");
            }
        });
}



