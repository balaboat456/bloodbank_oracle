$(document).ready(function () {

    $("#patientid").on('keydown', function(e) {
        if (e.which == 13) {
            scanBarcode();
        }
    });


});

function scanBarcode()
{   
    var patient = document.getElementById('patientid').value ;
    if(patient.length > 0)
    {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn='+patient,
            success: function (data) {

                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: 'data/patient/patient.php?hn='+patient,
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
                                        document.getElementById('patientid').focus ;
                                    }
                                });
                            }
                            document.getElementById('patientid').value = '';
                        },
                        error: function (data) {
                            clearPatient();
                            console.log('An error occurred.');
                            console.log(data);
                            document.getElementById('patientid').value = '';
                        },
                    });

                },
                error: function (data) {
                    spinnerhide();
                    clearPatient();
                    console.log('An error occurred.');
                    console.log(data);
                    document.getElementById('patientid').value = '';
                },
            });


    }else
    {
        clearPatient();
    }
    
}

function setPatient(data)
{
    data = JSON.parse(JSON.stringify(data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
    // loadTableBloodPayStock();
    document.getElementById('hn').value = data.patienthn;
    document.getElementById('patienthn').innerHTML = data.patienthn;
    // document.getElementById('patientan').innerHTML = data.patientan;
    // document.getElementById('patientidcard').innerHTML = data.patientidcard;
    // document.getElementById('patientbloodgroup').innerHTML = data.patientbloodgroup;
    document.getElementById('patientfullname').innerHTML = data.patientfullname;
    document.getElementById('patientage').innerHTML = data.patientage;
    document.getElementById('patientgender').innerHTML = data.patientgender;
    // document.getElementById('patientinsurance').innerHTML = data.patientinsurance;
    document.getElementById('patient_type').innerHTML = data.patient_type;
    
    requestBloodLabModalShow();
    
    // clearFormTab1();
}

function clearPatient()
{
        // document.getElementById('hn').value = '';
        // document.getElementById('patienthn').innerHTML = '-';
        // document.getElementById('patientan').innerHTML = '-';
        // document.getElementById('patientidcard').innerHTML = '-';
        // document.getElementById('patientbloodgroup').innerHTML = '-';
        // document.getElementById('patientfullname').innerHTML = '-';
        // document.getElementById('patientage').innerHTML = '-';
        // document.getElementById('patientgender').innerHTML = '-';
        // document.getElementById('patientinsurance').innerHTML = '-';
        // clearFormTab1();
}
