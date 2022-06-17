var error_abo = false;
var error_rh = false;
var error_volume = false;
var error_sdp = false;
var no_bag_number = false;
var v_bag_number = '';

function findTableRow(arrData = []) {

    error_abo = false;
    error_rh = false;
    error_sdp = false;
    var status = false;
    var table = document.getElementById("infectedTable");
    var r = 2;
    v_bag_number = arrData.bagnumber;

    while (row = table.rows[r++]) {

        


        // console.log("=============*****TEST*******==================");
        // console.log(arrData.bagnumber)
        
        if(arrData.bagnumber == row.cells[3].innerHTML.split('.').join(''))
        {
            // console.log("==============GG================="+row.cells[41].innerHTML);
            // console.log(row.cells[41].innerHTML == 1);
            console.log((arrData.bagnumber == row.cells[3].innerHTML.split('.').join('') &&
            row.cells[4].innerHTML == arrData.bloodgroup && // ตรวจสอบ ABO ไม่ตรงกัน
            row.cells[6].innerHTML == arrData.bloodrh3  &&   // ตรวจสอบ Rh ไม่ตรวจกัน
            row.cells[41].innerHTML == 1 // ตรวจว่ามี volume ยัง
            ));

            console.log("bagnumber 1 : "+arrData.bagnumber);

            /*
            
            console.log("bagnumber 2 : "+row.cells[3].innerHTML.split('.').join(''));
            console.log(" ABO 1 : "+row.cells[4].innerHTML);
            console.log(" ABO 2 : "+arrData.bloodgroup);
            console.log(" Rh 1 : "+row.cells[6].innerHTML);
            console.log(" Rh 2 : "+arrData.bloodrh3);

            console.log("********************************");
            */
        }
        
    
        if ((arrData.bagnumber == row.cells[3].innerHTML.split('.').join('') &&
            row.cells[4].innerHTML == arrData.bloodgroup && // ตรวจสอบ ABO ไม่ตรงกัน
            row.cells[6].innerHTML == arrData.bloodrh3 &&   // ตรวจสอบ Rh ไม่ตรวจกัน
            row.cells[41].innerHTML == 1 // ตรวจว่ามี volume ยัง
            ) ||
            (arrData.bagnumber == row.cells[3].innerHTML.split('.').join('') && 
                checkSDP(row) &&
                arrData.bagnumber == row.cells[3].innerHTML.split('.').join('') &&
                row.cells[4].innerHTML == arrData.bloodgroup && // ตรวจสอบ ABO ไม่ตรงกัน
                row.cells[6].innerHTML == arrData.bloodrh3  &&   // ตรวจสอบ Rh ไม่ตรวจกัน
                row.cells[41].innerHTML == 1 // ตรวจว่ามี volume ยัง
                
                )
            
        ) {

            console.log(row.cells[5]);
            var remark = '';
            row.cells[5].children[0].innerHTML = arrData.bloodgroup;
            row.cells[7].children[0].innerHTML = arrData.bloodrh1;
            row.cells[9].children[0].innerHTML = arrData.bloodrh2;

            row.cells[9].children[2].value = arrData.bloodrhsceen_cross_s;
            row.cells[9].children[3].value = arrData.bloodrhsceen_cross_p;
            row.cells[9].children[4].value = arrData.bloodrhsceen_cross_c;

            console.log(arrData.bloodrhsceen_cross_c);

            row.cells[5].children[0].disabled = true;
            row.cells[7].children[0].disabled = true;
            row.cells[9].children[0].disabled = true;

            if (arrData.tpharpr == '') {
                row.cells[10].children[0].innerHTML = 'NT';
            } else if (arrData.tpharpr == 0) {
                row.cells[10].children[0].innerHTML = '-';
            } else {
                row.cells[10].children[0].innerHTML = '+';
            }
            row.cells[10].children[0].disabled = true;

            row.cells[11].innerHTML = arrData.tpharpr_grade ;
            row.cells[11].style.background = setFindRedBGGrard(arrData.tpharpr_grade);

            if (arrData.hbsag == '') {
                row.cells[12].children[0].innerHTML = 'NT';
            } else if (arrData.hbsag == 0) {
                row.cells[12].children[0].innerHTML = '-';
            } else {
                row.cells[12].children[0].innerHTML = '+';
            }
            row.cells[12].children[0].disabled = true;

            row.cells[13].innerHTML = arrData.hbsag_grade ;
            row.cells[13].style.background = setFindRedBGGrard(arrData.hbsag_grade);

            if (arrData.hivagab == '') {
                row.cells[14].children[0].innerHTML = 'NT';
            } else if (arrData.hivagab == 0) {
                row.cells[14].children[0].innerHTML = '-';
            } else {
                row.cells[14].children[0].innerHTML = '+';
            }

            row.cells[14].children[0].disabled = true;

            row.cells[15].innerHTML = arrData.hivagab_grade ;
            row.cells[15].style.background = setFindRedBGGrard(arrData.hivagab_grade);

            if (arrData.hcvab == '') {
                row.cells[16].children[0].innerHTML = 'NT';
            } else if (arrData.hcvab == 0) {
                row.cells[16].children[0].innerHTML = '-';
            } else {
                row.cells[16].children[0].innerHTML = '+';
            }
            row.cells[16].children[0].disabled = true;

            row.cells[17].innerHTML = arrData.hcvab_grade ;
            row.cells[17].style.background = setFindRedBGGrard(arrData.hcvab_grade);

            if (arrData.hbvdna == '') {
                row.cells[18].children[0].innerHTML = 'NT';
            } else if (arrData.hbvdna == 0) {
                row.cells[18].children[0].innerHTML = '-';
            } else {
                row.cells[18].children[0].innerHTML = '+';
            }

            row.cells[18].children[0].disabled = true;

            row.cells[19].innerHTML = arrData.hbvdna_grade ;
            row.cells[19].style.background = setFindRedBGGrard(arrData.hbvdna_grade);

            if (arrData.hcvrna == '') {
                row.cells[20].children[0].innerHTML = 'NT';
            } else if (arrData.hcvrna == 0) {
                row.cells[20].children[0].innerHTML = '-';
            } else {
                row.cells[20].children[0].innerHTML = '+';
            }
            row.cells[20].children[0].disabled = true;

            row.cells[21].innerHTML = arrData.hcvrna_grade ;
            row.cells[21].style.background = setFindRedBGGrard(arrData.hcvrna_grade);

            if (arrData.hivrna == '') {
                row.cells[22].children[0].innerHTML = 'NT';
            } else if (arrData.hivrna == 0) {
                row.cells[22].children[0].innerHTML = '-';
            } else {
                row.cells[22].children[0].innerHTML = '+';
            }
            row.cells[22].children[0].disabled = true;

            row.cells[23].innerHTML = arrData.hivrna_grade ;
            row.cells[23].style.background = setFindRedBGGrard(arrData.hivrna_grade);

            row.cells[24].children[0].value = remark;
            row.cells[27].innerHTML = arrData.donorcode;
          
            row.cells[29].innerHTML = 1;

            row.cells[40].innerHTML = arrData.donation_qty ;
            
            findSetColorRow(r - 3);
            status = true;
        }else
        {
            if(arrData.bagnumber != row.cells[3].innerHTML.split('.').join(''))
            {
                no_bag_number = true;
            }else if(row.cells[4].innerHTML != arrData.bloodgroup)
            {
                error_abo = true;
            }else if(row.cells[6].innerHTML != arrData.bloodrh3)
            {
                error_rh = false;
            }else if(row.cells[41].innerHTML != 1)
            {
                error_volume = false;
            }else if(!checkSDP(row))
            {
                error_sdp = false;
            }

   
        }
    }

    return status;

}

function checkSDP(row) {
    
    console.log(row);
    console.log(row.cells[31].innerHTML);

    if (row.cells[31].innerHTML == '2' ||
        row.cells[31].innerHTML == '3' ||
        row.cells[31].innerHTML == '4'
    ) {
        if (
            row.cells[32].innerHTML != '' &&
            row.cells[33].innerHTML != '' &&
            row.cells[34].innerHTML != '' &&
            row.cells[35].innerHTML != '' 
        ) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }


}

function findSetColorRow(index = "") {
    var table = document.getElementById("infectedTable");
    var bloodstatusid = 0;
    index = index + 2;


    if (table.rows[index].cells[10].children[0].innerHTML == '+' ||
        table.rows[index].cells[12].children[0].innerHTML == '+' ||
        table.rows[index].cells[14].children[0].innerHTML == '+' ||
        table.rows[index].cells[16].children[0].innerHTML == '+' ||
        table.rows[index].cells[18].children[0].innerHTML == '+' ||
        table.rows[index].cells[20].children[0].innerHTML == '+' ||
        table.rows[index].cells[22].children[0].innerHTML == '+'
    ) {
        bloodstatusid = 4;
    } else {
        if ((table.rows[index].cells[5].children[0].innerHTML != 0) ||
            (table.rows[index].cells[7].children[0].innerHTML != 0) ||
            (table.rows[index].cells[9].children[0].innerHTML != 0)
        )
            bloodstatusid = 3
        else
            bloodstatusid = 2


        if (
            (
                (table.rows[index].cells[4].innerHTML != table.rows[index].cells[5].children[0].innerHTML) &&
                (table.rows[index].cells[5].children[0].innerHTML != 0) &&
                (table.rows[index].cells[5].children[0].innerHTML != '') &&
                (table.rows[index].cells[4].innerHTML != '')
            ) ||
            (
                (getRhText(table.rows[index].cells[6].innerHTML) != table.rows[index].cells[7].children[0].innerHTML) &&
                (table.rows[index].cells[7].children[0].innerHTML != 0) &&
                (table.rows[index].cells[7].children[0].innerHTML != '') &&
                (table.rows[index].cells[6].innerHTML != '')
            ) ||
            (
                (getRhText(table.rows[index].cells[8].innerHTML) != table.rows[index].cells[9].children[0].innerHTML) &&
                (table.rows[index].cells[9].children[0].innerHTML != 0) &&
                (table.rows[index].cells[9].children[0].innerHTML != '') &&
                (table.rows[index].cells[8].innerHTML != '')
            )
        ) {
            bloodstatusid = 3
        }
    }


    if (bloodstatusid == 1)
        table.rows[index].cells[0].style.background = "#00FFFF"
    else if (bloodstatusid == 2)
        table.rows[index].cells[0].style.background = "#FFFF00"
    else if (bloodstatusid == 3)
    {
        if(table.rows[index].cells[9].children[0].innerHTML == "Rh+" || table.rows[index].cells[9].children[0].innerHTML == "+")
        {
            table.rows[index].cells[0].style.background = "#F39"
        }else
        {
            table.rows[index].cells[0].style.background = "#6C0"
        }
        
    }
    else if (bloodstatusid == 4)
        table.rows[index].cells[0].style.background = "#C00"
    else if (bloodstatusid == 5)
        table.rows[index].cells[0].style.background = "#FFFF00"
    else if (bloodstatusid == 6)
        table.rows[index].cells[0].style.background = "#0000FF"
    else if (bloodstatusid == 7)
        table.rows[index].cells[0].style.background = "#FFFF00"

    table.rows[index].cells[26].innerHTML = bloodstatusid;

}

function getRhText(v = '') {
    var t = v;
    // if (v == '+')
    //     t = 'Rh+'
    // else if (v == '-')
    //     t = 'Rh-'
    // else if (v == 'D')
    //     t = 'Rh(D)';

    return t;
}

var input = document.getElementById("fileInput");
var output = document.getElementById("text");


input.addEventListener("change", function () {
    if (this.files && this.files[0]) {
        var myFile = this.files[0];
        var reader = new FileReader();

        reader.addEventListener('load', function (e) {
            console.log("9999");
            var number_group_error = [];
            var text = e.target.result;
            var lines = text.split('\n');

            var stateSuccess = 0;
            var stateError = 0;
            var swalType = 'success';
            var text = "";

            for (var line = 0; line < lines.length; line++) {
                var inf = replaceTrim(lines[line]);
                //    console.log(inf[0]);
                var stateStatus = findTableRow(inf[0]);

                console.log(line);

                if(stateStatus)
                {
                    stateSuccess++;
                }else
                {
                    stateError++;
                    swalType = 'warning';

                    if(error_abo)
                    {
                        number_group_error.push({bag_number:v_bag_number,text:'ABO ไม่ตรงกัน'});
                    }else if(error_rh)
                    {
                        number_group_error.push({bag_number:v_bag_number,text:'Rh ไม่ตรงกัน'});
                    }else if(error_volume)
                    {
                        number_group_error.push({bag_number:v_bag_number,text:'ยังไม่ระบุ Volume'});
                    }else if(error_sdp)
                    {
                        number_group_error.push({bag_number:v_bag_number,text:'ยังไม่ลงผล SDP'});
                    }else
                    {
                        number_group_error.push({bag_number:v_bag_number,text:'ไม่พบหมายเลขถุง'});
                    }
                }
                
            }

            text = "จำนวน Import ทั้งหมด  : "+lines.length+"\nจำนวนสำเร็จ           : "+stateSuccess+"\nจำนวนไม่สำเร็จ        : "+stateError;
        
            swal({
                title: 'Import เรียบร้อย!',
                text: text,
                type: swalType,
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: false
            }).then(function(){
                if(stateError > 0)
                {
                    showErrorPrint(number_group_error);
                }
            })
            $("#fileInput").val('');

        });

        reader.readAsText(myFile, "UTF-8");
    }
});


function replaceTrim(str = '') {
    var v = '';
    var arr = [];
    var donorcode = '';
    var bagnumber = '';
    var bloodgroup = '';
    var bloodrh1 = '';
    var bloodrh2 = '';
    var bloodrh3 = '';

    var bloodrhsceen_cross_s = '';
    var bloodrhsceen_cross_p = '';
    var bloodrhsceen_cross_c = '';

    var tpharpr = '';
    var hbsag = '';
    var hivagab = '';
    var hcvab = '';
    var hbvdna = '';
    var hcvrna = '';
    var hivrna = '';


    var find991 = str.search(" 991");
    find991++;
    
    v = str.substring(find991, str.length);

    bagnumber = v.substring(0, 11);
    var donation_qty = v.substring(11, 14);
    bloodgroup = v.substring(25, 29).split(' ').join('');
    bloodrh1 = v.substring(30, 31).split(' ').join('');
    if (bloodrh1 == '+')
        bloodrh1 = '+'
    else if (bloodrh1 == '-')
        bloodrh1 = '-'

    bloodrh2 = v.substring(33, 34).split(' ').join('');
    if (bloodrh2 == '0')
        bloodrh2 = '-'
    else
        bloodrh2 = '+'

    
    bloodrhsceen_cross_s = v.substring(31, 32).split(' ').join('');
    bloodrhsceen_cross_p = v.substring(32, 33).split(' ').join('');
    bloodrhsceen_cross_c = v.substring(33, 34).split(' ').join('');

    bloodrh3 = v.substring(30, 31).split(' ').join('');

    donorcode = str.substring(0, 10).split(' ').join('');
    tpharpr = v.substring(36, 37).split(' ').join('');
    hbsag = v.substring(37, 38).split(' ').join('');
    hivagab = v.substring(38, 39).split(' ').join('');
    hcvab = v.substring(46, 47).split(' ').join('');
    hbvdna = v.substring(42, 43).split(' ').join('');
    hcvrna = v.substring(43, 44).split(' ').join('');
    hivrna = v.substring(44, 46).split(' ').join('');
    arr = [{
        donorcode: donorcode,
        bagnumber: bagnumber,
        bloodgroup: bloodgroup,
        bloodrh1: bloodrh1,
        bloodrh2: bloodrh2,
        bloodrh3: bloodrh3,
        bloodrhsceen_cross_s:bloodrhsceen_cross_s,
        bloodrhsceen_cross_p:bloodrhsceen_cross_p,
        bloodrhsceen_cross_c:bloodrhsceen_cross_c,
        tpharpr: tpharpr,
        hbsag: hbsag,
        hivagab: hivagab,
        hcvab: hcvab,
        hbvdna: hbvdna,
        hcvrna: hcvrna,
        hivrna: hivrna,

        tpharpr_grade: tpharpr,
        hbsag_grade: hbsag,
        hivagab_grade: hivagab,
        hcvab_grade: hcvab,
        hbvdna_grade: hbvdna,
        hcvrna_grade: hcvrna,
        hivrna_grade: hivrna,
        donation_qty:donation_qty
    }];

    return arr;
}



$('#myform').submit(function (e) {


    var arr = findTableInfected(document.getElementById("infectedTable"));
 
    $("#arrInfected").val(JSON.stringify(arr));

    spinnershow();

    $.ajax({
        type: "POST",
        url: "blood-Infected-save.php",
        data: $(this).serialize(),
        complete: function() {
            var delayInMilliseconds = 0;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status) {
                myAlertTop();
                setTimeout(function() {
                    loadTable();
                }, 200);
                

            } else {
                myAlertTopError();
            }
        },
        error: function (error) {
            myAlertTopError();
        }
    });

    return false;
});

function findTableInfected(table) {
    var arrCell = [];
    var arrRow = [];
    var r = 2;
    while (row = table.rows[r++]) {
        arrCell = realMerge(arrCell, [{
            blood_group_cross: row.cells[5].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            rh_cross: row.cells[7].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            bloodrhsceen_cross: row.cells[9].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            bloodrhsceen_cross_s: row.cells[9].children[2].value
        }]);
        arrCell = realMerge(arrCell, [{
            bloodrhsceen_cross_p: row.cells[9].children[3].value
        }]);
        arrCell = realMerge(arrCell, [{
            bloodrhsceen_cross_c: row.cells[9].children[4].value
        }]);
        arrCell = realMerge(arrCell, [{
            tpharpr: row.cells[10].children[0].innerHTML
        }]);

        arrCell = realMerge(arrCell, [{
            tpharpr_grade: row.cells[11].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hbsag: row.cells[12].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hbsag_grade: row.cells[13].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hivagab: row.cells[14].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hivagab_grade: row.cells[15].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hcvab: row.cells[16].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hcvab_grade: row.cells[17].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hbvdna: row.cells[18].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hbvdna_grade: row.cells[19].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hcvrna: row.cells[20].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hcvrna_grade: row.cells[21].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hivrna: row.cells[22].children[0].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            hivrna_grade: row.cells[23].innerHTML
        }]);


        arrCell = realMerge(arrCell, [{
            iscross_remark: ((row.cells[24].children[0].children[0].children[0].checked) ? '1' : '0')
        }]);
        arrCell = realMerge(arrCell, [{
            cross_remark: row.cells[24].children[0].children[1].children[0].value
        }]);

        arrCell = realMerge(arrCell, [{
            donateid: row.cells[25].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            bloodstatusid: row.cells[26].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            donorcode: row.cells[27].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            donorid: row.cells[28].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            importstatus: row.cells[29].innerHTML
        }]);
        arrCell = realMerge(arrCell, [{
            donation_qty: row.cells[40].innerHTML
        }]);


        
        arrRow.push(arrCell);
        arrCell = [];
    }
    return arrRow;
}

function fromNumber() {
    var bag_number = $('#fromnumber').val();
    var bag_number_new = numnerPoint(bag_number);
    $('#fromnumber').val(bag_number_new);
}

function toNumber() {
    var bag_number = $('#tonumber').val();
    var bag_number_new = numnerPoint(bag_number);
    $('#tonumber').val(bag_number_new);
}

function setBagType() {
    $('.bloodbagtype').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "ชนิดถุง",
        // tags: [],
        ajax: {
            url: 'data/masterdata/bagtype.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.bagtypeid,
                            text: item.bagtypename
                        }
                    })
                };
            },

        }
    });

}

$("#barcode").on("keyup",function(event) {
    scanBarcode();
});

function scanBarcode() {
    var bag_number = $('#barcode').val();
    var bag_number_new = numnerPoint(bag_number);
    $('#barcode').val(bag_number_new);

    // if (bag_number_new.length == 14) {
    //     loadTable();
    // } else if (bag_number_new.length == 0) {
    //     loadTable();
    // }
}
