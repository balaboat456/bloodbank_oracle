$(document).ready(function () {
    clickshow();
    var usercreate = $("#usercreate").val();
    if(usercreate == "")
    $("#usercreate").val(session_fullname);

    $("#scanhn").on('keydown', function(e) {
        // val = $(this).val();
        if (e.which == 13) {
            scanBarcode();
            // $('#hn').val(val);
        }
    });
    $("#bgnum").on('keydown', function(e) {
        if (e.which == 13) {
            scanblood();
        }
    });

});


function scanBarcode()
{   
    $('#data_exchange_cross').html(' ');
    var scanhn = document.getElementById('scanhn').value ;
    if(scanhn.length > 0)
    {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn='+scanhn,
            success: function (data) {


                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: 'data/patient/patient.php?hn='+scanhn,
                        complete: function () {
                            var delayInMilliseconds = 200;
                            setTimeout(function () {
                                spinnerhide();
                            }, delayInMilliseconds);
                        },
                        success: function (data) {
                        
                            if(data.data.length > 0)
                            {
                                setPatient(data.data[0]);
                                loadTable(data.data[0].patienthn);
                                getTerm();
                            }else
                            {
                                clearPatient();
                                swal({
                                    title: "ไม่พบข้อมูล ",
                                    type: "warning",
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    // dangerMode: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonClass: "",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                },
                                function (inputValue) {
                                    if(inputValue)
                                    {
                                        document.getElementById('scanhn').focus ;
                                    }
                                });
                            }
                            document.getElementById('scanhn').value = '';
                        },
                        error: function (data) {
                            clearPatient();
                            console.log('An error occurred.');
                            console.log(data);
                            document.getElementById('scanhn').value = '';
                        },
                    });


                },
                error: function (data) {
                    spinnerhide();
                    clearPatient();
                    console.log('An error occurred.');
                    console.log(data);
                    document.getElementById('scanhn').value = '';
                },
            });
    }else
    {
        clearPatient();
    }
    
}

function getTerm()
{
    var an = $("#an").val();

    $.ajax({
        url: 'data/bloodexchange/blood-exchange-terms.php?an=' + an ,
        dataType: 'json',
        type: 'get',
        success: function (data) {

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            $("#terms").val(obj[0].terms);

        },
        error: function (d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setPatient(data)
{
    data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
    document.getElementById('patientid').value = data.patientid;
    document.getElementById('hn').value = data.patienthn;
    document.getElementById('an').value = data.patientan;
    document.getElementById('gender').value = data.patientgender;

    document.getElementById('patientan').innerHTML = data.patientan;
    document.getElementById('patienthn').innerHTML = data.patienthn;
    document.getElementById('patientfullname').innerHTML = data.patientfullname;
    document.getElementById('patientage').innerHTML = data.patientage;
    document.getElementById('patientgender').innerHTML = data.patientgender;
    document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;
    document.getElementById('patient_type').innerHTML = data.patient_type;
}

function clearPatient()
{
    newBloodLetting();
    document.getElementById('patientid').value = '';
    document.getElementById('hn').value = '';
    document.getElementById('an').value = '';

    document.getElementById('patientan').innerHTML = '';
    document.getElementById('patienthn').innerHTML = '';
    document.getElementById('patientfullname').innerHTML = '';
    document.getElementById('patientage').innerHTML = '';
    document.getElementById('patientgender').innerHTML = '';
    document.getElementById('patientbloodgroup').innerHTML = '';
    document.getElementById('patient_type').innerHTML = '-';
    
}

function newBloodLetting()
{
    getTerm();
    document.getElementById('bloodexchangeid').value = '';
    document.getElementById('bloodexchangedatetime').value = '';

    document.getElementById('terms').value = '';
    document.getElementById('weight').value = '';
    document.getElementById('height').value = '';
    document.getElementById('diagnosis').value = '';
    document.getElementById('diagnosisdetail').value = '';

    document.getElementById('setlotno').value = '';
    document.getElementById('acdalotno').value = '';
    document.getElementById('nsslotno').value = '';
    document.getElementById('albuminelotno').value = '';
    document.getElementById('other').value = '';


    
    document.getElementById('pretest_sys').value = '';
    document.getElementById('pretest_dia').value = '';
    document.getElementById('pretest_pulse').value = '';
    document.getElementById('pretest_hb').value = '';
    document.getElementById('pretest_hct').value = '';
    document.getElementById('pretest_rbc').value = '';
    document.getElementById('pretest_wbc').value = '';
    document.getElementById('pretest_plt').value = '';
    document.getElementById('pretest_calcium').value = '';
    document.getElementById('pretest_spo2').value = '';
    document.getElementById('pretest_other').value = '';
    document.getElementById('pretest_remark').value = '';

    document.getElementById('posttest_sys').value = '';
    document.getElementById('posttest_dia').value = '';
    document.getElementById('posttest_pulse').value = '';
    document.getElementById('posttest_hb').value = '';
    document.getElementById('posttest_hct').value = '';
    document.getElementById('posttest_rbc').value = '';
    document.getElementById('posttest_wbc').value = '';
    document.getElementById('posttest_plt').value = '';
    document.getElementById('posttest_calcium').value = '';
    document.getElementById('posttest_spo2').value = '';
    document.getElementById('posttest_other').value = '';
    document.getElementById('posttest_remark').value = '';

    document.getElementById('other2detail').value = '';
    document.getElementById('tbv').value = '';
    document.getElementById('tpv').value = '';
    document.getElementById('fluidbalance').value = '';
    document.getElementById('volumeexchange').value = '';
    document.getElementById('acused').value = '';
    document.getElementById('actopatient').value = '';
    document.getElementById('removebag').value = '';
    document.getElementById('replacementused').value = '';
    document.getElementById('bolus').value = '';
    document.getElementById('buffycoatvolume').value = '';
    document.getElementById('additionalfluid').value = '';

    document.getElementById('additionalfluiddetail').value = '';
    document.getElementById('time').value = '';
    document.getElementById('remark').value = '';
    document.getElementById('bloodexchangeresult').value = '';
    document.getElementById('patientcause').value = '';
    document.getElementById('machinecause').value = '';
    document.getElementById('humancause').value = '';
    document.getElementById('result').value = '';
    document.getElementById('dose').value = '';
    document.getElementById('albuminpercent').value = '';

    document.getElementById('appointment').value = '';
    document.getElementById('appoittext').value = '';
    // Select Value
    setDataModalSelectValue('doctorid','','');
    setDataModalSelectValue('unitofficeid','','');
    setDataModalSelectValue('bloodgroupid','','');
    setDataModalSelectValue('rhid','','');
    setDataModalSelectValue('exchangemachineid','','');

    // Radio
    document.getElementById('bloodexchangetypeid1').checked = false;
    document.getElementById('bloodexchangetypeid2').checked = false;
    document.getElementById('bloodexchangetypeid3').checked = false;

    document.getElementById('tpvtype1').checked = false;
    document.getElementById('tpvtype1_5').checked = false;
    document.getElementById('tpvtype2').checked = false;
    document.getElementById('tpvtype3').checked = false;

    // Check Box
    document.getElementById('ffp').checked = false;
    document.getElementById('albumin').checked = false;
    document.getElementById('nss').checked = false;
    document.getElementById('albuminpercent').checked = false;
    document.getElementById('other2').checked = false;

    for (i = 0; i < count; i++) {
        document.getElementById("trblood" + i).style.background = stylecolor[i] ;
    }
}




function chActive(id) {

    // for (i = 0; i < count; i++) {
    //     document.getElementById("trblood" + i).style.background = stylecolor[i] ;
    // }
    // document.getElementById("trblood" + id).style.background = "#b7e4eb";
    var item = dataObj[id];
    indexActive = id;
    setDataBloodLetting(item);
    exchangebloodclose();
}

function setDataBloodLetting(data)
{
    document.getElementById('patientid').value = data.patientid;
    document.getElementById('bloodexchangeid').value = data.bloodexchangeid;
    document.getElementById('bloodexchangedatetime').value = getDMY(data.bloodexchangedate);
    // console.log(data);
    document.getElementById('bloodexchangetime').value = data.bloodexchangedate.substr(11,5);
    document.getElementById('terms').value = data.terms;
    document.getElementById('weight').value = data.weight;
    document.getElementById('height').value = data.height;
    document.getElementById('diagnosis').value = data.diagnosis;
    document.getElementById('diagnosisdetail').value = data.diagnosisdetail;

    document.getElementById('setlotno').value = data.setlotno;
    document.getElementById('acdalotno').value = data.acdalotno;
    document.getElementById('nsslotno').value = data.nsslotno;
    document.getElementById('albuminelotno').value = data.albuminelotno;
    document.getElementById('other').value = data.other;


    
    document.getElementById('pretest_sys').value = data.pretest_sys;
    document.getElementById('pretest_dia').value = data.pretest_dia;
    document.getElementById('pretest_pulse').value = data.pretest_pulse;
    document.getElementById('pretest_hb').value = data.pretest_hb;
    document.getElementById('pretest_hct').value = data.pretest_hct;
    document.getElementById('pretest_rbc').value = data.pretest_rbc;
    document.getElementById('pretest_wbc').value = data.pretest_wbc;
    document.getElementById('pretest_plt').value = data.pretest_plt;
    document.getElementById('pretest_calcium').value = data.pretest_calcium;
    document.getElementById('pretest_spo2').value = data.pretest_spo2;
    document.getElementById('pretest_other').value = data.pretest_other;
    document.getElementById('pretest_remark').value = data.pretest_remark;

    document.getElementById('posttest_sys').value = data.posttest_sys;
    document.getElementById('posttest_dia').value = data.posttest_dia;
    document.getElementById('posttest_pulse').value = data.posttest_pulse;
    document.getElementById('posttest_hb').value = data.posttest_hb;
    document.getElementById('posttest_hct').value = data.posttest_hct;
    document.getElementById('posttest_rbc').value = data.posttest_rbc;
    document.getElementById('posttest_wbc').value = data.posttest_wbc;
    document.getElementById('posttest_plt').value = data.posttest_plt;
    document.getElementById('posttest_calcium').value = data.posttest_calcium;
    document.getElementById('posttest_spo2').value = data.posttest_spo2;
    document.getElementById('posttest_other').value = data.posttest_other;
    document.getElementById('posttest_remark').value = data.posttest_remark;

    document.getElementById('other2detail').value = data.other2detail;
    document.getElementById('tbv').value = data.tbv;
    document.getElementById('tpv').value = data.tpv;
    document.getElementById('fluidbalance').value = data.fluidbalance;
    document.getElementById('volumeexchange').value = data.volumeexchange;
    document.getElementById('acused').value = data.acused;
    document.getElementById('actopatient').value = data.actopatient;
    document.getElementById('removebag').value = data.removebag;
    document.getElementById('replacementused').value = data.replacementused;
    document.getElementById('bolus').value = data.bolus;
    document.getElementById('buffycoatvolume').value = data.buffycoatvolume;
    document.getElementById('additionalfluid').value = data.additionalfluid;

    document.getElementById('additionalfluiddetail').value = data.additionalfluiddetail;
    // document.getElementById('time').value = data.time;
    // document.getElementById('remark').value = data.remark;
    // document.getElementById('bloodexchangeresult').value = data.bloodexchangeresult;
    document.getElementById('bag_number').value = data.bag_number;
    document.getElementById('starttime').value = data.starttime;
    document.getElementById('endtime').value = data.endtime;
    document.getElementById('timeuse').value = data.timeuse;
    // document.getElementById('patientcause').value = data.patientcause;
    // document.getElementById('machinecause').value = data.machinecause;
    // document.getElementById('humancause').value = data.humancause;
    document.getElementById('nurse').value = data.usercreate;
    document.getElementById('dose').value = data.dose;
    document.getElementById('albuminpercent').value = data.albuminpercent;
    document.getElementById('result').value = data.result;
    document.getElementById('appointment').value = data.appointment;
    document.getElementById('appoittext').value = data.appoittext;
    document.getElementById('sdpresultvolproc').value = data.sdpresultvolproc;
    document.getElementById('sdpresultacvol').value = data.sdpresultacvol;
    document.getElementById('sdpresulttime').value = data.sdpresulttime;
    document.getElementById('sdpresultpltweight').value = data.sdpresultpltweight;
    document.getElementById('sdpresultmachineyield').value = data.sdpresultmachineyield;
    document.getElementById('sdpprodvolume1').value = data.sdpprodvolume1;
    document.getElementById('sdpprodcount1').value = data.sdpprodcount1;
    document.getElementById('sdpprodyltyield1').value = data.sdpprodyltyield1;
    document.getElementById('sdpprodunit1').value = data.sdpprodunit1;

    document.getElementById('problemmachineother').value = data.problemmachineother;
    document.getElementById('problemdonorremark').value = data.problemdonorremark;
    document.getElementById('problemproductremark').value = data.problemproductremark;
    document.getElementById('problemhumanremark').value = data.problemhumanremark;

    

    // Select Value
    setDataModalSelectValue('unitofficeid',data.unitofficeid,data.unitofficename);
    setDataModalSelectValue('doctorid',data.doctorid,data.doctorname);
    
    setDataModalSelectValue('bloodgroupid',data.bloodgroupid,data.bloodgroupname);
    setDataModalSelectValue('rhid',data.rhid,data.rhname3);
    setDataModalSelectValue('exchangemachineid',data.exchangemachineid,data.exchangemachinename);
    setDataModalSelectValue('staff',data.staff,data.name);

    // Radio
    document.getElementById('bloodexchangetypeid1').checked = (data.bloodexchangetypeid == 1);
    document.getElementById('bloodexchangetypeid2').checked = (data.bloodexchangetypeid == 2);
    document.getElementById('bloodexchangetypeid3').checked = (data.bloodexchangetypeid == 3);

    document.getElementById('tpvtype1').checked = (data.tpvtype == 1);
    document.getElementById('tpvtype1_5').checked = (data.tpvtype == 1.5);
    document.getElementById('tpvtype2').checked = (data.tpvtype == 2);
    document.getElementById('tpvtype3').checked = (data.tpvtype == 3);

    document.getElementById('sdpresulttype2').checked = (data.sdpresulttype2 == 2);
    document.getElementById('sdpresulttype1').checked = (data.sdpresulttype1 == 1);

    // Check Box
    document.getElementById('ffp').checked = (data.ffp == 1);
    document.getElementById('albumin').checked = (data.albumin == 1);
    document.getElementById('nss').checked = (data.nss == 1);
    document.getElementById('calcium').checked = (data.calcium == 1);
    document.getElementById('ffpqty').value = data.ffpqty;
    document.getElementById('albuminqty').value = data.albuminqty;
    document.getElementById('nssqty').value = data.nssqty;

    document.getElementById('other2').checked = (data.other2 == 1); 
    document.getElementById('isuseless').checked = (data.isuseless == 1);
    document.getElementById('islostset').checked = (data.islostset == 1);
    
}

function setDataModalSelectValue(elem='',itemid,itemtext)
{

    var select = $('#'+elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function scanblood(){
    var val = $('#bgnum').val();
    console.log(val)
    if (val.length == 14) {
        console.log('pass')
        document.getElementById('bgnum').value = document.getElementById('bgnum').value.trim();
        var bag_number = document.getElementById('bgnum').value;
        if (bag_number.length > 0) {
            spinnershow();
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data/bloodexchange/blood-bagnum.php?bag_number=' + bag_number,
                complete: function() {
                    var delayInMilliseconds = 200;
                    setTimeout(function() {
                        spinnerhide();
                    }, delayInMilliseconds);
                },
                success: function(data) {
                    if (data.data.length > 0) {
                        var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                        console.log(obj.bag_number);
                        if($('#bag_number') != ''){
                            chk = $('#bag_number').val();
                            $('#bag_number').val(chk+obj.bag_number+',');
                        }
                        
                    } else {
                        swal({
                                title: "ไม่พบข้อมูล ",
                                type: "warning",
                                showCloseButton: false,
                                showCancelButton: false,
                                // dangerMode: true,
                                confirmButtonClass: "btn-success",
                                confirmButtonClass: "",
                                confirmButtonText: "ตกลง",
                                closeOnConfirm: true
                            },
                            function(inputValue) {
                                if (inputValue) {
                                    document.getElementById('bgnum').focus;
                                }
                            });
                    }
                    document.getElementById('bgnum').value = '';
                    document.getElementById('bgnum').focus;

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                    document.getElementById('bgnum').value = '';
                    document.getElementById('bgnum').focus;
                },
            });
        }
    }
    
}
function loadTableLost() {
    // var id = document.getElementById("donorid").value;
    var id = 0;
    $.ajax({
        url: 'data/bloodbonor/blooddonorlost.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json_Lost").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {
                event_data += '<tr>';
                event_data += '<td>' + (index + 1) + '</td>';
                event_data += '<td>' + getDMY2(value.donorlostdate) + '</td>';
                event_data += '<td>' + value.donorlosttext + '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_Lost").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}
function clickshow(id = 1) {
    setshow(id)
}
function setshow(id = 3) {
    if(id == 1){
        document.getElementById("show1").style.display = "block";
        document.getElementById("show2").style.display = "none";
    }else if(id == 3){
        document.getElementById("show2").style.display = "block";
        document.getElementById("show1").style.display = "none";
    }
}
function setColor(e, status) {

    if (status) {
        document.getElementById(e).style.color = "#000";
    } else {
        document.getElementById(e).style.color = "#ff0000";
    }

}

// Product 1 Start
function setSdpprodvolume1(v) {
    if (v >= 250 && v <= 350) {
        setColor("sdpprodvolume1", true);
    } else {
        setColor("sdpprodvolume1", false);
    }

    var pc = $("#sdpprodcount1").val();
    calculateSdpprodyltyield1(v, pc);

}

function setSdpprodcount1(v) {
    var pv = $("#sdpprodvolume1").val();
    calculateSdpprodyltyield1(pv, v.value);
}

function setSdpprodyltyield1(v) {
    if (v >= 3) {
        setColor("sdpprodyltyield1", true);
    } else {
        setColor("sdpprodyltyield1", false);
    }

}

function calculateSdpprodyltyield1(pv, pc) {
    var v = pv * pc / (100000)
    $("#sdpprodyltyield1").val(v.toFixed(1));
    setSdpprodyltyield1(v);
    calculateSdpprodunit1(v);
}

function calculateSdpprodunit1(v) {
    var u = v / 0.55;
    $("#sdpprodunit1").val(u.toFixed(2));
}
// Product 1 End
function postGender() {
    var gender = 0;
        gen = document.getElementById("gender").value;
        if(gen == "ชาย"){
            gender = 1; 
        }else{
            gender = 2;
        }
        
    // console.log(gender);
    return gender;
}

function setColor(e, status) {
    if (status) {
        document.getElementById(e).style.color = "#000";
    } else {
        document.getElementById(e).style.color = "#ff0000";
    }
}

function preWbcColor() {
    if (postGender() == 1) {
        setColor("pretest_wbc", ($("#pretest_wbc").val() >= 4.4 && $("#pretest_wbc").val() <= 11.3));
    } else if (postGender() == 2) {
        setColor("pretest_wbc", ($("#pretest_wbc").val() >= 4.4 && $("#pretest_wbc").val() <= 11.3));
    } else {
        setColor("pretest_wbc", false);
    }
}

function postWbcColor() {
    if (postGender() == 1) {
        setColor("posttest_wbc", ($("#posttest_wbc").val() >= 4.4 && $("#posttest_wbc").val() <= 11.3));
    } else if (postGender() == 2) {
        setColor("posttest_wbc", ($("#posttest_wbc").val() >= 4.4 && $("#posttest_wbc").val() <= 11.3));
    } else {
        setColor("posttest_wbc", false);
    }
}

function preHbColor() {

    if (postGender() == 1) {
        setColor("pretest_hb", ($("#pretest_hb").val() >= 13.0 && $("#pretest_hb").val() <= 17.5));
    } else if (postGender() == 2) {
        // console.log(postGender());
        // console.log($("#pretest_hb").val());
        setColor("pretest_hb", ($("#pretest_hb").val() >= 12.5 && $("#pretest_hb").val() <= 16.5));
    } else {
        setColor("pretest_hb", false);
    }
}

function postHbColor() {

    if (postGender() == 1) {
        setColor("posttest_hb", ($("#posttest_hb").val() >= 13.0 && $("#posttest_hb").val() <= 17.5));
    } else if (postGender() == 2) {
        setColor("posttest_hb", ($("#posttest_hb").val() >= 12.5 && $("#posttest_hb").val() <= 16.5));
    } else {
        setColor("posttest_hb", false);
    }
}

function preHctColor() {
    if (postGender() == 1) {
        setColor("pretest_hct", ($("#pretest_hct").val() >= 41.5 && $("#pretest_hct").val() <= 50.4));
    } else if (postGender() == 2) {
        setColor("pretest_hct", ($("#pretest_hct").val() >= 36 && $("#pretest_hct").val() <= 45));
    } else {
        setColor("pretest_hct", false);
    }
}

function postHctColor() {
    if (postGender() == 1) {
        setColor("posttest_hct", ($("#posttest_hct").val() >= 41.5 && $("#posttest_hct").val() <= 50.4));
    } else if (postGender() == 2) {
        setColor("posttest_hct", ($("#posttest_hct").val() >= 36 && $("#posttest_hct").val() <= 45));
    } else {
        setColor("posttest_hct", false);
    }
}

function preRbcColor() {
    if (postGender() == 1) {
        setColor("pretest_rbc", ($("#pretest_rbc").val() >= 4.5 && $("#pretest_rbc").val() <= 5.9));
    } else if (postGender() == 2) {
        setColor("pretest_rbc", ($("#pretest_rbc").val() >= 4.5 && $("#pretest_rbc").val() <= 5.1));
    } else {
        setColor("pretest_rbc", false);
    }
}

function postRbcColor() {
    if (postGender() == 1) {
        setColor("posttest_rbc", ($("#posttest_rbc").val() >= 4.5 && $("#posttest_rbc").val() <= 5.9));
    } else if (postGender() == 2) {
        setColor("posttest_rbc", ($("#posttest_rbc").val() >= 4.5 && $("#posttest_rbc").val() <= 5.1));
    } else {
        setColor("posttest_rbc", false);
    }
}

function prePltColor() {
    if (postGender() == 1) {
        setColor("pretest_plt", ($("#pretest_plt").val() >= 200 && $("#pretest_plt").val() <= 400));
    } else if (postGender() == 2) {
        setColor("pretest_plt", ($("#pretest_plt").val() >= 200 && $("#pretest_plt").val() <= 400));
    } else {
        setColor("pretest_plt", false);
    }
}

function postPltColor() {
    if (postGender() == 1) {
        setColor("posttest_plt", ($("#posttest_plt").val() >= 150 && $("#posttest_plt").val() <= 450));
    } else if (postGender() == 2) {
        setColor("posttest_plt", ($("#posttest_plt").val() >= 150 && $("#posttest_plt").val() <= 450));
    } else {
        setColor("posttest_plt", false);
    }
}
