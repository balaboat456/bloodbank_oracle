$(document).ready(function () {

    $("#patienthn").on('keydown', function(e) {
        if (e.which == 13) {
            scanPatientHN();
        }
    });
    

});


function scanPatientHN()
{   
    var patienthn = document.getElementById('patienthn').value ;
    if(patienthn.length > 0)
    {
        spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn='+patienthn,
            success: function (data) {


                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/patient/patient.php?hn='+patienthn,
                    complete: function () {
                        var delayInMilliseconds = 200;
                        setTimeout(function () {
                            spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function (data) {
                        if(data.data.length > 0)
                        {
                            $("#patientfullname").val(data.data[0].patientfullname);
                        }else
                        {
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
                                    document.getElementById('patienthn').value = ''
                                    document.getElementById('patienthn').focus ;
                                }
                            });
                        }
                    },
                    error: function (data) {
                        console.log('An error occurred.');
                        console.log(data);
                        document.getElementById('patienthn').value = '';
                    },
                });


            },
            error: function (data) {
                spinnerhide();
                console.log('An error occurred.');
                console.log(data);
                document.getElementById('patienthn').value = '';
            },
        });
    }
    
}