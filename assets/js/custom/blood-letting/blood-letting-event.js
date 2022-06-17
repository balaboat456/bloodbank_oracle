$(document).ready(function() {
    // var usercreate = $("#usercreate").val();
    // if (usercreate == "") $("#usercreate").val(session_fullname);
    dateBE(".date1");
    $("#scanhn").on("keydown", function(e) {
        if (e.which == 13) {
            scanBarcode();
        }
    });
});

function scanBarcode() {
    var scanhn = document.getElementById("scanhn").value;
    if (scanhn.length > 0) {
        spinnershow();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "api/get-patient-rajavithi.php?hn=" + scanhn,
            success: function(data) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "data/patient/patient.php?hn=" + scanhn,
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function(data) {
                        if (data.data.length > 0) {
                            setPatient(data.data[0]);
                            loadTable(data.data[0].patienthn);
                        } else {
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
                                    closeOnConfirm: true,
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        document.getElementById("scanhn").focus;
                                    }
                                }
                            );
                        }
                        document.getElementById("scanhn").value = "";
                    },
                    error: function(data) {
                        clearPatient();
                        console.log("An error occurred.");
                        console.log(data);
                        document.getElementById("scanhn").value = "";
                    },
                });
            },
            error: function(data) {
                spinnerhide();
                clearPatient();
                console.log("An error occurred.");
                console.log(data);
                document.getElementById("scanhn").value = "";
            },
        });
    } else {
        clearPatient();
    }
}

function setPatient(data) {
    // document.getElementById("patientid").value = data.patientid;
    // document.getElementById("hn").value = data.patienthn;

    // document.getElementById("patienthn").innerHTML = data.patienthn;
    // document.getElementById("patientfullname").innerHTML = data.patientfullname;
    // document.getElementById("patientage").innerHTML = data.patientage;
    // document.getElementById("patientgender").innerHTML = data.patientgender;


    data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
    document.getElementById('patientid').value = data.patientid;
    document.getElementById('hn').value = data.patienthn;

    document.getElementById('patienthn').innerHTML = getEmpty(data.patienthn);
    document.getElementById('patientan').innerHTML = getEmpty(data.patientan);
    document.getElementById('patientfullname').innerHTML = getEmpty(data.patientfullname);
    document.getElementById('patientage').innerHTML = getEmpty(data.patientage);
    document.getElementById('patientgender').innerHTML = getEmpty(data.patientgender);
    document.getElementById('patientbloodgroup').innerHTML = getEmpty(data.patientbloodgroup);
    document.getElementById('patient_type').innerHTML = data.patient_type;

    if (data.patientimage.replace('data:image/png;base64,', '') != "") {
        document.getElementById('img_profile').src = data.patientimage;
    } else {
        document.getElementById('img_profile').src = "assets/images/profile.png";
    }

}

function getEmpty(v) {
    return (v != "") ? v : "-";
}


function clearPatient() {
    newBloodLetting();
    document.getElementById("patientid").value = "";
    document.getElementById("hn").value = "";

    document.getElementById("patienthn").innerHTML = "";
    document.getElementById('patientan').innerHTML = "";
    document.getElementById("patientfullname").innerHTML = "";
    document.getElementById("patientage").innerHTML = "";
    document.getElementById("patientgender").innerHTML = "";
    document.getElementById("patientbloodgroup").innerHTML = "";
    document.getElementById('img_profile').src = "assets/images/profile.png";
}

function newBloodLetting() {
    document.getElementById("editbloodletting").hidden = true;

    // document.getElementById('bloodlettingid').value
    document.getElementById("bloodlettingid").value = "";
    // document.getElementById("bloodlettingdatetime").value = "";
    document.getElementById("diagnosis").value = "";
    document.getElementById("diagnosis").readOnly = false;
    document.getElementById("diagnosisdetail").value = "";
    document.getElementById("diagnosisdetail").readOnly = false;

    document.getElementById("volume").value = "";
    // document.getElementById("volume").readOnly = false;

    // document.getElementById('remark').value = '';
    document.getElementById("remark2").value = "";

    document.getElementById("forward").value = "";
    document.getElementById("forward").readOnly = false;
    document.getElementById("volume_ml").value = "";
    document.getElementById("volume_ml").readOnly = false;

    document.getElementById("pressure_before_1").value = "";
    document.getElementById("pressure_before_1").readOnly = false;
    document.getElementById("pressure_before_2").value = "";
    document.getElementById("pressure_before_2").readOnly = false;
    document.getElementById("pressure_after_1").value = "";
    document.getElementById("pressure_after_1").readOnly = false;
    document.getElementById("pressure_after_2").value = "";
    document.getElementById("pressure_after_2").readOnly = false;
    document.getElementById("pulse_before_1").value = "";
    document.getElementById("pulse_before_1").readOnly = false;
    document.getElementById("pulse_after_1").value = "";
    document.getElementById("pulse_after_1").readOnly = false;
    document.getElementById("symptom_detail_before").value = "";
    document.getElementById("symptom_detail_before").readOnly = false;
    document.getElementById("symptom_detail_after").value = "";
    document.getElementById("symptom_detail_after").readOnly = false;
    document.getElementById("appoittext").value = "";
    document.getElementById("appoittext").readOnly = false;
    document.getElementById("appointment").value = "";
    document.getElementById("appointment").readOnly = false;

    document.getElementById("symptom_before1").checked = false;
    document.getElementById("symptom_before1").disabled = false;
    document.getElementById("symptom_before2").checked = false;
    document.getElementById("symptom_before2").disabled = false;
    document.getElementById("symptom_after1").checked = false;
    document.getElementById("symptom_after1").disabled = false;
    document.getElementById("symptom_after2").checked = false;
    document.getElementById("symptom_after2").disabled = false;

    document.getElementById("remark2").value = "";
    document.getElementById("remark2").readOnly = false;

    document.getElementById("bloodlettingdatetime").value = getDMY543();
    document.getElementById("bloodlettingdatetime").disabled = false;

    document.getElementById("bloodlettingtime").value = getTimeNow();
    document.getElementById("bloodlettingtime").disabled = false;

    document.getElementById("bloodlettingdatetimesave").value = getDMY543();

    document.getElementById("appointment").disabled = false;

    // Select Value
    $("select").prop("disabled", false);

    setDataModalSelectValue("unitofficeid", "", "");
    setDataModalSelectValue("lettingproblemid", "", "");
    setDataModalSelectValue("usercreate", "", "");
    setDataModalSelectValue("user_before", "", "");
    setDataModalSelectValue("user_after", "", "");
    setDataModalSelectValue("user_before2", "", "");
    setDataModalSelectValue("user_after2", "", "");
    setDataModalSelectValue("doctorid", "", "");
    setDataModalSelectValue("bagtypeid", "", "");

    for (i = 0; i < count; i++) {
        document.getElementById("trblood" + i).style.background = stylecolor[i];
    }
}

function chActive(id) {
    for (i = 0; i < count; i++) {
        document.getElementById("trblood" + i).style.background = stylecolor[i];
    }
    document.getElementById("trblood" + id).style.background = "#b7e4eb";
    var item = dataObj[id];
    indexActive = id;
    setDataBloodLetting(item);
}

function setDataBloodLetting(data) {
    // console.log(data);
    document.getElementById("patientid").value = data.patientid;
    document.getElementById("bloodlettingid").value = data.bloodlettingid;

    document.getElementById("diagnosis").value = data.diagnosis;
    document.getElementById("diagnosis").readOnly = true;
    document.getElementById("diagnosisdetail").value = data.diagnosisdetail;
    document.getElementById("diagnosisdetail").readOnly = true;
    document.getElementById("volume").value = data.volume;
    document.getElementById("volume").readOnly = true;
    // document.getElementById("volumeunit").value = data.volumeunit;

    // document.getElementById("remark").value = data.remark;
    // document.getElementById("usercreate").value = data.usercreate;
    // data.pressure_before
    document.getElementById("pressure_before").value = data.pressure_before;
    document.getElementById("pressure_before").readOnly = true;
    document.getElementById("pulse_before").value = data.pulse_before;
    document.getElementById("pulse_before").readOnly = true;
    document.getElementById("symptom_before1").checked = data.symptom_before == 1;
    document.getElementById("symptom_before1").disabled = true;
    document.getElementById("symptom_before2").checked = data.symptom_before == 2;
    document.getElementById("symptom_before2").disabled = true;
    document.getElementById("symptom_detail_before").value = data.symptom_detail_before;
    document.getElementById("symptom_detail_before").readOnly = true;


    document.getElementById("user_before").value = data.user_before;
    document.getElementById("user_before").readOnly = true;

    document.getElementById("pulse_before_1").value = data.pulse_before;
    document.getElementById("pulse_before_1").readOnly = true;
    document.getElementById("pulse_after_1").value = data.pulse_after;
    document.getElementById("pulse_after_1").readOnly = true;
    document.getElementById("symptom_after1").checked = data.symptom_after == 1;
    document.getElementById("symptom_after1").disabled = true;
    document.getElementById("symptom_after2").checked = data.symptom_after == 2;
    document.getElementById("symptom_after2").disabled = true;
    document.getElementById("symptom_detail_after").value = data.symptom_detail_after;
    document.getElementById("symptom_detail_after").readOnly = true;


    document.getElementById("user_after").value = data.user_after;
    document.getElementById("user_after").readOnly = true;

    document.getElementById("remark2").value = data.remark2;
    document.getElementById("remark2").readOnly = true;

    document.getElementById("forward").value = data.remark2;
    document.getElementById("forward").readOnly = true;

    document.getElementById("volume_ml").value = data.volumeml;
    document.getElementById("volume_ml").readOnly = true;

    document.getElementById("appoittext").value = data.appoittext;
    document.getElementById("appoittext").readOnly = true;


    document.getElementById("bloodlettingdatetime").value = getDMY(data.bloodlettingdatetime);
    document.getElementById("bloodlettingdatetime").disabled = true;

    document.getElementById("bloodlettingtime").value = data.bloodlettingdatetime.substr(11, 5);
    document.getElementById("bloodlettingtime").disabled = true;

    document.getElementById("bloodlettingdatetimesave").value = data.bloodlettingdatetimesave;
    document.getElementById("bloodlettingdatetimesave").readOnly = true;

    document.getElementById("appointment").value = data.appointment;
    document.getElementById("appointment").disabled = true;
    // Select Value

    // $(".unitofficeid").prop("disabled", false);

    setDataModalSelectValue(
        "unitofficeid",
        data.unitofficeid,
        data.unitofficename
    );
    // $("unitofficeid option:selected").prop("disabled", true);

    // อันนี้


    // console.log(data.pressure_after + " " + data.pressure_before);

    var pressure_before = data.pressure_before.split("/");

    for (i = 0; i < pressure_before.length; i++) {
        if (i == 0) {
            document.getElementById("pressure_before_1").value = pressure_before[i];
            document.getElementById("pressure_before_1").readOnly = true;
            document.getElementById("pressure_before_2").readOnly = true;
        } else {
            document.getElementById("pressure_before_2").value = pressure_before[i];
            document.getElementById("pressure_before_1").readOnly = true;
            document.getElementById("pressure_before_2").readOnly = true;
        }
    }

    var pressure_after = data.pressure_after.split("/");

    for (i = 0; i < pressure_after.length; i++) {
        if (i == 0) {
            document.getElementById("pressure_after_1").value = pressure_after[i];
            document.getElementById("pressure_after_1").readOnly = true;
            document.getElementById("pressure_after_2").readOnly = true;
        } else {
            document.getElementById("pressure_after_2").value = pressure_after[i];
            document.getElementById("pressure_after_1").readOnly = true;
            document.getElementById("pressure_after_2").readOnly = true;
        }
    }
    // console.log();
    document.getElementById("editbloodletting").hidden = false;

    setDataModalSelectValue(
        "usercreate",
        data.usercreate,
        data.name
    );
    setDataModalSelectValue(
        "user_before",
        data.user_before,
        data.user_before_name
    );
    setDataModalSelectValue(
        "user_after",
        data.user_after,
        data.user_after_name
    );
    setDataModalSelectValue(
        "user_before2",
        data.user_before2,
        data.name + " " + data.surname
    );
    setDataModalSelectValue(
        "user_after2",
        data.user_after2,
        data.name + " " + data.surname
    );
    setDataModalSelectValue(
        "lettingproblemid",
        data.lettingproblemid,
        data.lettingproblemname
    );
    setDataModalSelectValue("doctorid", data.doctorid, data.doctorname);
    setDataModalSelectValue("bagtypeid", data.bagtypeid, data.bagtypename);
    // console.log(data);

    $("select").prop("disabled", true);

}

function setDataModalSelectValue(elem = "", itemid, itemtext) {
    var select = $("#" + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger("change");
}

function editBloodLetting() {
    document.getElementById("diagnosis").readOnly = false;
    document.getElementById("diagnosisdetail").readOnly = false;
    document.getElementById("volume").readOnly = false;
    document.getElementById("pressure_before").readOnly = false;
    document.getElementById("pulse_before").readOnly = false;
    document.getElementById("symptom_before1").disabled = false;
    document.getElementById("symptom_before2").disabled = false;
    document.getElementById("symptom_detail_before").readOnly = false;
    document.getElementById("user_before").readOnly = false;
    document.getElementById("pulse_before_1").readOnly = false;
    document.getElementById("pulse_after_1").readOnly = false;
    document.getElementById("symptom_after1").disabled = false;
    document.getElementById("symptom_after2").disabled = false;
    document.getElementById("symptom_detail_after").readOnly = false;
    document.getElementById("user_after").readOnly = false;
    document.getElementById("remark2").readOnly = false;
    document.getElementById("forward").readOnly = false;
    document.getElementById("volume_ml").readOnly = false;
    document.getElementById("appoittext").readOnly = false;
    document.getElementById("bloodlettingdatetime").disabled = false;
    document.getElementById("bloodlettingtime").disabled = false;
    document.getElementById("bloodlettingdatetimesave").readOnly = false;
    document.getElementById("appointment").disabled = false;
    $("select").prop("disabled", false);
    document.getElementById("pressure_before_1").readOnly = false;
    document.getElementById("pressure_before_2").readOnly = false;

    document.getElementById("pressure_after_1").readOnly = false;
    document.getElementById("pressure_after_2").readOnly = false;

}