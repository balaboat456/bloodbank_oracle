function placeidClick(id = 1) {

    if (id == 1) {
        document.getElementById("placeid1").style.display = "block";
        document.getElementById("placeid2").style.display = "none";
        document.getElementById("placeid3").style.display = "none";

        setDataModalSelectValue('unitnameid', '', '');
        setDataModalSelectValue('activityid', '', '');

        localStorage.setItem("unitnameid", "");
        localStorage.setItem("activityid", "");

    } else if (id == 2) {
        document.getElementById("placeid1").style.display = "none";
        document.getElementById("placeid2").style.display = "block";
        document.getElementById("placeid3").style.display = "none";
        document.getElementById("unitnameid").focus();

        setDataModalSelectValue('activityid', '', '');
        localStorage.setItem("activityid", "");

    } else if (id == 3) {
        document.getElementById("placeid1").style.display = "none";
        document.getElementById("placeid2").style.display = "none";
        document.getElementById("placeid3").style.display = "block";
        document.getElementById("activityid").focus();

        setDataModalSelectValue('unitnameid', '', '');
        localStorage.setItem("unitnameid", "");

    } else {
        document.getElementById("placeid1").style.display = "block";
        document.getElementById("placeid2").style.display = "none";
        document.getElementById("placeid3").style.display = "none";
        setDataModalSelectValue('unitnameid', '', '');
        setDataModalSelectValue('activityid', '', '');

        localStorage.setItem("unitnameid", "");
        localStorage.setItem("activityid", "");
    }



    localStorage.setItem("placeid", id);

}

function isIDcardPassport(id = 1) {

    if (id == 1) {
        if (document.getElementById("notdonoridcard").value == "1") {
            document.getElementById("donoridcard").required = false;
            document.getElementById("label_red_donoridcard").style.visibility = 'hidden';
        } else {
            document.getElementById("donoridcard").required = true;
            document.getElementById("label_red_donoridcard").style.visibility = 'visible';
        }

        document.getElementById("donorpassport").required = false;
        document.getElementById("donoridcard").readOnly = false;
        document.getElementById("donorpassport").readOnly = true;

        document.getElementById("label_red_donorpassport").style.visibility = 'hidden';
        document.getElementById("lname").readOnly = false;

        if ($("#lname").val() == ("ชาวต่างชาติ"))
            $("#lname").val("");
    } else if (id == 2) {
        document.getElementById("donoridcard").required = false;
        document.getElementById("donorpassport").required = true;
        document.getElementById("donoridcard").readOnly = true;
        document.getElementById("donorpassport").readOnly = false;
        document.getElementById("label_red_donoridcard").style.visibility = 'hidden';
        document.getElementById("label_red_donorpassport").style.visibility = 'visible';
        document.getElementById("lname").readOnly = true;
        $("#lname").val("ชาวต่างชาติ");
    }

    var genderid = "";

    if (document.getElementById("genderid1").checked) {
        genderid = 1;
    } else if (document.getElementById("donorpassport").checked) {
        genderid = 2;
    }

    setPrefixSelect(genderid, id);


}

function setGenderPrefix(genderid = "") {
    var isidcardpassport = "";
    if (document.getElementById("isidcardpassport1").checked && $("#notdonoridcard").val() == "") {
        isidcardpassport = 1;
    } else if (document.getElementById("isidcardpassport2").checked) {
        isidcardpassport = 2;
    }
    setPrefixSelect(genderid, isidcardpassport);
}


function setPrefixSelect(genderid = "", isIDcardPassport = "1") {
    $('.prefixid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/prefix.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                    genderid: genderid,
                    isIDcardPassport: isIDcardPassport

                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.prefixid,
                            text: item.prefixname,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function(e) {

        var e_prefixid = e.params.args.data.item.prefixid;
        if (e.params.args.data.item.isforeign == 1) {
            $("#lname").val("ชาวต่างชาติ");
            // isIDcardPassport(2);
            document.getElementById("isidcardpassport2").checked = true;

        } else {
            if ($("#lname").val() == 'ชาวต่างชาติ')
                $("#lname").val("");
            // isIDcardPassport(1);
            document.getElementById("isidcardpassport1").checked = true;
        }

        if (e_prefixid == 1 || e_prefixid == 4) {
            document.getElementById("genderid1").checked = true
        } else if (e_prefixid == 2 || e_prefixid == 3 || e_prefixid == 5 || e_prefixid == 6) {
            document.getElementById("genderid2").checked = true
        } else {
            document.getElementById("genderid1").checked = false
            document.getElementById("genderid2").checked = false
        }

    });
}

function donorGetInformation(id) {
    if (id == 2 || id == 4 || id == 3) {
        document.getElementById("donorgetinformation").style.display = "block";
        document.getElementById("donorgetinformation").style.marginTop = "-15px";
        document.getElementById("hn").focus();
        document.getElementById("hn").required = true;
    } else {
        document.getElementById("donorgetinformation").style.display = "none";
        document.getElementById("hn").required = false;
    }

    if (id == 3) {
        document.getElementById("expired_date").readOnly = true;
        document.getElementById("expired_date").value = '';
    } else {
        document.getElementById("expired_date").readOnly = false;
    }


}

function findHn() {
    var patient = document.getElementById('hn').value;
    if (patient.length > 0) {
        // spinnershow();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'api/get-patient-rajavithi.php?hn=' + patient,
            success: function(data) {


                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'data/patient/patient.php?hn=' + patient,
                    complete: function() {
                        var delayInMilliseconds = 200;
                        setTimeout(function() {
                            // spinnerhide();
                        }, delayInMilliseconds);
                    },
                    success: function(data) {
                        if (data.data.length > 0) {
                            $("#an").val(data.data[0].patientan);
                            $("#patientname").val(data.data[0].patientfullname);

                            setDataModalSelectValue('unitofficeid', data.data[0].wardid, data.data[0].wardname);

                            if (document.getElementById('donation_get_type_id3').checked)
                                setBloodDonorRecord(data.data[0]);
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
                                    closeOnConfirm: true
                                },
                                function(inputValue) {
                                    if (inputValue) {
                                        document.getElementById('hn').focus;
                                    }
                                });
                        }
                    },
                    error: function(data) {
                        clearPatient();
                        console.log('An error occurred.');
                        console.log(data);

                    },
                });

            },
            error: function(data) {
                clearPatient();
                console.log('An error occurred.');
                console.log(data);

            },
        });
    } else {
        clearPatient();
    }

}

function setBloodDonorRecord(data) {
    $("#donoridcard").val(data.patientidcard);
    document.getElementById('isidcardpassport1').checked = true;
    isIDcardPassport(1);

    $("#fname").val(data.patientfname);
    $("#lname").val(data.patientlname);
    $("#donoremail").val(data.patientemail);
    $("#showblood").val(data.blood_group);
    setDataModalSelectValue('prefixid', data.prefixid, data.prefixname);

    document.getElementById('genderid1').checked = (data.genderid == 1);
    document.getElementById('genderid1').checked = (data.genderid == 2);

    $("#donorbirthday").val(getDMY(data.patientanbirthday));
    getAge({ value: getDMY(data.patientanbirthday) });

    $("#donormobile").val(data.patientphone);

    setDataModalSelectValue('blood_group', data.patientbloodgroup, data.patientbloodgroup);
    setDataModalSelectValue('rh', data.patientrh, data.rhname3);

    $("#subdistrictid").val(data.subdistrictid);
    subdistrictid = data.subdistrictid;
    setAddress2();

    $("#zipcode").val(data.zipcode);
    $("#address").val(data.address);

}

function setAddress2() {
    // Set Default Country
    var addressselect = $('#addressselect');
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/masterdata/address.php?subdistrictid=' + subdistrictid,
    }).then(function(data) {

        var index = getIndex(data.data, 'subdistrictid', subdistrictid);
        var option;
        if (data.data.length > 0 && subdistrictid && (index || index == 0)) {
            option = new Option(data.data[index].address, data.data[index].subdistrictid, true, true);
            $('#address2').val(data.data[index].address);
        } else {
            $('#addressselect').val(null).trigger('change');
            $('#address2').val('');
        }

        addressselect.append(option).trigger('change');
        addressselect.trigger({
            type: 'select2:select',
            params: {
                data: data
            }
        });

    });
}


function clearPatient() {
    $("#an").val("");
    $("#patientname").val("");
}

function setUnitOffice(self) {
    check = self.checked;
    if (check) {
        document.getElementById("isunitofficeblock").style.display = "block";
    } else {
        document.getElementById("isunitofficeblock").style.display = "none";
    }
}

function physicalExamination(id) {
    if (id == 2) {
        document.getElementById("physical_detail").required = true;
        document.getElementById("physical_detail_check").style.display = "block";
        document.getElementById("physical_detail").focus();
    } else {
        document.getElementById("physical_detail").required = false;
        document.getElementById("physical_detail_check").style.display = "none";
    }
}

function donationStatus(id) {
    qty = $('#donation_qty').val();
    console.log(qty);
    if (id == 2) {
        document.getElementById("donatenocauseid").required = true;
        document.getElementById("donation_detail_check").style.display = "block";
        document.getElementById("donatenocauseid").focus();
        document.getElementById("label_red_bag_type_id").style.visibility = 'hidden';
        document.getElementById("bag_type_id").required = false;
        document.getElementById("label_red_bag_number").style.visibility = 'hidden';
        document.getElementById("bag_number").required = false;
        document.getElementById("label_red_blood_group").style.visibility = 'hidden';
        document.getElementById("weight").required = false;
        document.getElementById("label_weight").style.visibility = 'hidden';
        document.getElementById("temperature").required = false;
        document.getElementById("label_temperature").style.visibility = 'hidden';
        document.getElementById("prebp1").required = false;
        document.getElementById("prebp2").required = false;
        document.getElementById("label_prebp1").style.visibility = 'hidden';
        document.getElementById("pulse").required = false;
        document.getElementById("label_pulse").style.visibility = 'hidden';
        document.getElementById("hemoglobin").required = false;
        document.getElementById("label_pulse_status").style.visibility = 'hidden';
        document.getElementById("label_physical_status").style.visibility = 'hidden';
        document.getElementById("label_donation_status").style.visibility = 'hidden';
        document.getElementById("label_bag_staff_id").style.visibility = 'hidden';
        document.getElementById("label_blood_driller_id").style.visibility = 'hidden';
        document.getElementById("label_inspectorid").style.visibility = 'hidden';
        $("#pulse_status_1").prop('required', false)
        $("#physical_status_1").prop('required', false)
            // $("#expired_date").datepicker("destroy");
        $("#expired_date").val("");
        $('#blood_group').prop('required', false)
            // $('#rh').prop('required',false)
        $('#bag_staff_id').prop('required', false)
        $('#blood_driller_id').prop('required', false)
        $('#inspectorid').prop('required', false)

        document.getElementById("isfirstblooddonation").checked = false;

    } else {


        // document.getElementById("label_red_bag_type_id").style.visibility = 'visible';
        // document.getElementById("bag_type_id").required = true;

        // document.getElementById("label_red_bag_number").style.visibility = 'visible';
        // document.getElementById("bag_number").required = true;
        // document.getElementById("label_red_blood_group").style.visibility = 'visible';
        // document.getElementById("weight").required = true;
        // document.getElementById("label_weight").style.visibility = 'visible';
        // document.getElementById("temperature").required = true;
        // document.getElementById("label_temperature").style.visibility = 'visible';
        // document.getElementById("prebp1").required = true;
        // document.getElementById("prebp2").required = true;
        // document.getElementById("label_prebp1").style.visibility = 'visible';
        // document.getElementById("pulse").required = true;
        // document.getElementById("label_pulse").style.visibility = 'visible';
        // document.getElementById("hemoglobin").required = true;
        // document.getElementById("label_pulse_status").style.visibility = 'visible';
        // document.getElementById("label_physical_status").style.visibility = 'visible';
        // document.getElementById("label_donation_status").style.visibility = 'visible';
        // document.getElementById("label_bag_staff_id").style.visibility = 'visible';
        // document.getElementById("label_blood_driller_id").style.visibility = 'visible';
        // document.getElementById("label_inspectorid").style.visibility = 'visible';

        // document.getElementById("donatenocauseid").required = false;
        // document.getElementById("donation_detail_check").style.display = "none";
        // document.getElementById("bag_staff_id").required = true;
        document.getElementById("donatenocauseid").required = false;
        if (document.getElementById("donateid").value != "") {

            document.getElementById("donation_detail_check").style.display = "none";
            document.getElementById("label_red_bag_type_id").style.visibility = 'visible';
            document.getElementById("bag_type_id").required = true;
            document.getElementById("label_red_bag_number").style.visibility = 'visible';
            document.getElementById("bag_number").required = true;
            document.getElementById("label_red_blood_group").style.visibility = 'visible';
            document.getElementById("weight").required = true;
            document.getElementById("label_weight").style.visibility = 'visible';
            document.getElementById("temperature").required = true;
            document.getElementById("label_temperature").style.visibility = 'visible';
            document.getElementById("prebp1").required = true;
            document.getElementById("prebp2").required = true;
            document.getElementById("label_prebp1").style.visibility = 'visible';
            document.getElementById("pulse").required = true;
            document.getElementById("label_pulse").style.visibility = 'visible';
            document.getElementById("hemoglobin").required = true;
            document.getElementById("label_pulse_status").style.visibility = 'visible';
            document.getElementById("label_physical_status").style.visibility = 'visible';
            document.getElementById("label_donation_status").style.visibility = 'visible';
            document.getElementById("label_bag_staff_id").style.visibility = 'visible';
            document.getElementById("label_blood_driller_id").style.visibility = 'visible';
            document.getElementById("label_inspectorid").style.visibility = 'visible';
            $("#pulse_status_1").prop('required', true)
            $("#physical_status_1").prop('required', true)

            $("#expired_date").val("");
            $('#blood_group').prop('required', true)
                // $('#rh').prop('required',true)
            $('#bag_staff_id').prop('required', true)
            $('#blood_driller_id').prop('required', true)
            $('#inspectorid').prop('required', true)
        }

    }
    $('.check9').click(function() {
        old = $('#qty').val();
        chk = $(this).val();

        if (chk == '2') {
            console.log(chk)
            $("#donation_qty").val(old);
        } else {
            $('#donation_detail_check').hide();
            $("#donation_qty").val(parseInt(qty) + 1);
        }
    });

    setDetailDonation(id);

}

function setPrefix2() {
    // Set Default Country
    genderid = 0;
    if (document.getElementById("genderid1").checked) {
        genderid = 1;
    } else if (document.getElementById("genderid2").checked) {
        genderid = 2;
    }

    // var prefix = $('#prefixid');
    // $.ajax({
    //     type: 'GET',
    //     dataType: 'json',
    //     url: 'data/masterdata/prefix.php?genderid=' + genderid,
    // }).then(function (data) {
    //     var option = new Option(data.data[0].prefixname, data.data[0].prefixid, true, true);
    //     prefix.append(option).trigger('change');

    //     prefix.trigger({
    //         type: 'select2:select',
    //         params: {
    //             data: data
    //         }
    //     });
    // });

    setSDP();
}

/*
function getAge(dateString) {

    date8('#donorbirthday');
    var today = new Date();
    var birthDate = new Date(dmyToymd(dateString.value));
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    age = isNaN(age) ? 0 : age;
    document.getElementById("donorage").value = age;
    document.getElementById("donoragetext").value = age;

    getAgeMsg(age)
}
*/

function getAge(dateString) {

    console.log(dateString);

    date8('#donorbirthday');
    var today = new Date();
    var birthDate = new Date(dmyToymd(dateString.value));

    var user_date = Date.parse(birthDate);

    var today_date = Date.parse(today);

    var diff_date = today_date - user_date;

    var num_years = diff_date / 31557600000;

    var num_months = (diff_date % 31557600000) / 2628000000;

    var num_days = ((diff_date % 31557600000) % 2628000000) / 86400000;

    num_years = isNaN(num_years) ? 0 : num_years;
    num_months = isNaN(num_months) ? 0 : num_months;
    num_days = isNaN(num_days) ? 0 : num_days;

    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    age = isNaN(age) ? 0 : age;

    var agestr = (Math.floor(num_years)) + ' ปี ' + Math.floor(num_months) + ' เดือน ' + Math.floor(num_days) + ' วัน';
    document.getElementById("donorage").value = age;

    if (dateString.value == "") {
        document.getElementById("donoragetext").value = "";
    } else {
        document.getElementById("donoragetext").value = agestr;
    }

    getAgeMsg(age)

}


var AgeFirst = true;

function getAgeMsg(age) {

    if (!AgeFirst)
        if (age >= 70) {
            swal({
                    title: "ขออภัยค่ะ!",
                    text: "ผู้บริจาคอายุมากกว่า 70 ปี",
                    type: "warning",
                    showCloseButton: false,
                    showCancelButton: false,
                    dangerMode: true,
                    confirmButtonClass: "btn-success",
                    confirmButtonClass: "",
                    confirmButtonText: "ตกลง",
                    closeOnConfirm: true
                },
                function(inputValue) {
                    if (inputValue) {
                        document.getElementById("donation_status2").checked = true;
                        $("#donatenocauseid").val(54);
                        donationStatus(2);
                        setDetailDonation(2);
                        document.getElementById("donormobile").focus();
                    }
                });

        } else if (age > 0 && age < 17) {
        swal({
                title: "ขออภัยค่ะ!",
                text: "ผู้บริจาคอายุไม่ถึง 17 ปีไม่สามารถบริจาคได้",
                type: "warning",
                showCloseButton: false,
                showCancelButton: false,
                dangerMode: true,
                confirmButtonClass: "btn-success",
                confirmButtonClass: "",
                confirmButtonText: "ตกลง",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (inputValue) {
                    document.getElementById("donation_status2").checked = true;
                    // $("#donatenocauseid").val(55);
                    donationStatus(2);
                    setDetailDonation(2);
                    document.getElementById("donormobile").focus();
                    $('#donatenocauseid').val(55).trigger('change');
                }
            });

    } else if (age >= 17 && age < 18) {
        swal({
                title: "ผู้บริจาคอายุไม่ถึง 18 ปี",
                text: "ผู้บริจาคมีใบรับรองจากผู้ปกครองหรือไม่",
                type: "warning",
                showCloseButton: false,
                showCancelButton: true,
                dangerMode: true,
                confirmButtonClass: "",
                CancelButtonClass: "btn-success",
                confirmButtonText: "มี",
                cancelButtonText: "ไม่มี",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (!inputValue) {
                    document.getElementById("donation_status2").checked = true;
                    $("#donatenocauseid").val(55);
                    donationStatus(2);
                    setDetailDonation(2);
                    document.getElementById("donormobile").focus();
                } else {
                    setDonationStatus();
                    setDetailDonation(1);
                }
            });
    } else if (age >= 60) {
        swal({
                title: "ผู้บริจาคอายุมากกว่า 60 ปี",
                text: "ได้รับอนุญาตจากแพทย์หรือผู้ที่ได้รับมอบหมายแล้วหรือไม่",
                type: "warning",
                showCloseButton: false,
                showCancelButton: true,
                dangerMode: true,
                confirmButtonClass: "",
                CancelButtonClass: "btn-success",
                confirmButtonText: "ใช่",
                cancelButtonText: "ไม่ใช่",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (!inputValue) {
                    document.getElementById("donation_status2").checked = true;
                    $("#donatenocauseid").val(54);
                    donationStatus(2);
                    setDetailDonation(2);
                    document.getElementById("donormobile").focus();
                } else {
                    setDonationStatus();
                    setDetailDonation(1);
                }
            });
    } else if (age >= 55) {
        swal({
                title: "ผู้บริจาคอายุมากกว่า 55 ปี",
                text: "ได้รับอนุญาตจากแพทย์หรือผู้ที่ได้รับมอบหมายแล้วหรือไม่",
                type: "warning",
                showCloseButton: false,
                showCancelButton: true,
                dangerMode: true,
                confirmButtonClass: "",
                CancelButtonClass: "btn-success",
                confirmButtonText: "เคย",
                cancelButtonText: "ไม่เคย",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (!inputValue) {
                    document.getElementById("donation_status2").checked = true;
                    $("#donatenocauseid").val(54);
                    donationStatus(2);
                    setDetailDonation(2);
                    document.getElementById("donormobile").focus();
                } else {
                    setDonationStatus();
                    setDetailDonation(1);
                }
            });
    } else {
        setDonationStatus();
        setDetailDonation(2);
    }


    AgeFirst = false;
}

function setDonationStatus() {
    document.getElementById("donation_status2").checked = false;
    $("#donatenocauseid").val(0);
    donationStatus(1);
}

function setDetailDonation(donatenocauseid = 1) {
    // document.getElementById("bag_type_id").required = (donatenocauseid == 1);
    // document.getElementById("blood_group").required = (donatenocauseid == 1);
    // document.getElementById("donation_qty").required = (donatenocauseid == 1);
    // document.getElementById("bag_number").required = (donatenocauseid == 1);

    // document.getElementById("label_red_bag_type_id").style.visibility = (donatenocauseid == 1) ? 'visible' : 'hidden';
    // document.getElementById("label_red_blood_group").style.visibility = (donatenocauseid == 1) ? 'visible' : 'hidden';
    // document.getElementById("label_red_donation_qty").style.visibility = (donatenocauseid == 1) ? 'visible' : 'hidden';
    // document.getElementById("label_red_bag_number").style.visibility = (donatenocauseid == 1) ? 'visible' : 'hidden';
}

function setInputRequired() {

    var donateid_v = $('#donateid').val();
    var donateid_status = (donateid_v.length == 8)


    document.getElementById("bag_type_id").required = donateid_status;
    document.getElementById("blood_group").required = donateid_status;
    document.getElementById("donation_qty").required = donateid_status;
    document.getElementById("bag_number").required = donateid_status;

    document.getElementById("weight").required = donateid_status;
    document.getElementById("temperature").required = donateid_status;
    document.getElementById("prebp1").required = donateid_status;
    document.getElementById("prebp2").required = donateid_status;
    document.getElementById("pulse").required = donateid_status;
    document.getElementById("hemoglobin").required = donateid_status;

    document.getElementById("pulse_status_1").required = donateid_status;
    document.getElementById("physical_status_1").required = donateid_status;
    document.getElementById("donation_status1").required = donateid_status;
    document.getElementById("bag_staff_id").required = donateid_status;
    document.getElementById("blood_driller_id").required = donateid_status;
    document.getElementById("inspectorid").required = donateid_status;


    document.getElementById("label_red_bag_type_id").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_red_blood_group").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_red_donation_qty").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_red_bag_number").style.visibility = donateid_status ? 'visible' : 'hidden';

    document.getElementById("label_weight").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_temperature").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_prebp1").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_pulse").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_hemoglobin").style.visibility = donateid_status ? 'visible' : 'hidden';

    document.getElementById("label_pulse_status").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_physical_status").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_donation_status").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_bag_staff_id").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_blood_driller_id").style.visibility = donateid_status ? 'visible' : 'hidden';
    document.getElementById("label_inspectorid").style.visibility = donateid_status ? 'visible' : 'hidden';

    document.getElementById("donorbirthday").readOnly = donateid_status;
    document.getElementById("donorage").readOnly = donateid_status;
}

function getBloodUseDate() {
    date8('#blood_use_date');
}

function getBloodExpDate() {
    date8('#expired_date');
}

function getBloodDonationDate() {

    date8('#donation_date');
    var type_id = "";

    if (document.getElementById("donation_type_id1").checked) {
        type_id = 1;
    } else if (document.getElementById("donation_type_id2").checked) {
        type_id = 2;
    } else if (document.getElementById("donation_type_id3").checked) {
        type_id = 3;
    } else if (document.getElementById("donation_type_id4").checked) {
        type_id = 4;
    }

    setSDPShow(type_id);


}

function getSouvenirDate() {
    date8('#souvenirdate');
}

function getCardDate() {
    date8('#getcarddate');
}

function getDanateStatusDate() {
    date8('#donatenostatusdate');
}

function getBloodLastDonationDate() {
    date8('#last_donation_date');
}

function getBloodDonationTime() {
    timeFormat('#donation_time');
}

function getBloodLastDonationTime() {
    timeFormat('#last_donation_date');
}

function clickSDPShow(id = 2) {
    setSDPShow(id);
    $('#bag_type_id').val(8);
}

function setSDPShow(id = 1) {

    did = $('#donorid').val();
    result = $('#sdpresultvolproc').val();
    result1 = $('#sdpresultpltweight').val();

    if (id == 2 || id == 3 || id == 4) {
        document.getElementById("sdp").style.display = "block";
    } else {
        document.getElementById("sdp").style.display = "none";
    }

    if (id == 2) {
        $('#titleSDP').text(' รายละเอียด Plateletpheresis (SDP)');
        $('#titleBloodSDP').text('SDP');
        $('#plt_pre_count').text('Plt Pre Count');
        $('#plt_yield').text('Plt Yield');
        $('#plt_yield_td1').text('Plt Yield');
        $('#plt_yield_td2').text('Plt Yield');
        $('#titleBloodUsed').text('PC Used');

        /*
        if(did != ''){
            $('#sdpresultvolproc').prop('required',true)
            $('#sdpresultacvol').prop('required',true)
            $('#sdpresulttime').prop('required',true)
            $('#sdpresultpltweight').prop('required',true)
            $('#sdpresultmachineyield').prop('required',true)
            if(result != '' && result1 != ''){
                $('#sdpprodvolume1').prop('required',true)
                $('#sdpprodcount1').prop('required',true)
                $('#sdpprodyltyield1').prop('required',true)
                $('#sdpprodunit1').prop('required',true)
            }   
        
        }
        */

    } else if (id == 3) {
        $('#titleSDP').text(' รายละเอียด Red Cell Apheresis');
        $('#titleBloodSDP').text('SDR');
        $('#plt_pre_count').text('Rbc Pre Count');
        $('#plt_yield').text('Rbc Yield');
        $('#plt_yield_td1').text('Rbc Yield');
        $('#plt_yield_td2').text('Rbc Yield');
        $('#titleBloodUsed').text('Rbc Used');
    } else if (id == 4) {
        $('#titleSDP').text(' รายละเอียด Plasma Apheresis ');
        $('#titleBloodSDP').text('Plasma');
        $('#plt_pre_count').text('Plt Pre Count');
        $('#plt_yield').text('Plt Yield');
        $('#plt_yield_td1').text('Plt Yield');
        $('#plt_yield_td2').text('Plt Yield');
        $('#titleBloodUsed').text('PC Used');
    } else {
        /*
        $('#sdpresultvolproc').prop('required',false)
        $('#sdpresultacvol').prop('required',false)
        $('#sdpresulttime').prop('required',false)
        $('#sdpresultpltweight').prop('required',false)
        $('#sdpresultmachineyield').prop('required',false)
        $('#sdpprodvolume1').prop('required',false)
        $('#sdpprodcount1').prop('required',false)
        $('#sdpprodyltyield1').prop('required',false)
        $('#sdpprodunit1').prop('required',false)
        */
    }
    setPrint($("#donorid").val(), $("#donateid").val(), document.getElementById("donation_type_id2").checked);

    var d = new Date(dmyToymd2($('#donation_date').val()));
    var date = '';
    if (id == 2) {
        d.setDate(d.getDate() + 15);
        date = getDateToDMY(d);
        document.getElementById("height").required = false;
        document.getElementById("label_red_height").style.visibility = 'hidden';
    } else if (id == 4 || id == 3) {
        d.setDate(d.getDate() + 0);
        date = getDateToDMY(d);
        document.getElementById("height").required = false;
        document.getElementById("label_red_height").style.visibility = 'hidden';
    } else {
        d.setDate(d.getDate() + 90);
        date = getDateToDMY(d);
        document.getElementById("height").required = false;
        document.getElementById("label_red_height").style.visibility = 'hidden';
    }
    $('#expired_date').val(date);


    var op = document.getElementById("bag_type_id").getElementsByTagName("option");

    console.log("SDP=== " + id);

    if (id == 2) {
        for (var i = 0; i < op.length; i++) {
            (op[i].value == "8" || op[i].value == "10") ?
            op[i].disabled = false: op[i].disabled = true;
        }
        // $('#bag_type_id').val(8);
        document.getElementById("bag_type_id").disabled = false;
    } else if (id == 3) {
        for (var i = 0; i < op.length; i++) {
            (op[i].value == "9") ?
            op[i].disabled = false: op[i].disabled = true;
        }
        $('#bag_type_id').val(9);
        document.getElementById("bag_type_id").disabled = true;
    } else {
        for (var i = 0; i < op.length; i++) {
            op[i].disabled = false;
        }
        // $('#bag_type_id').val("");
        document.getElementById("bag_type_id").disabled = false;
    }

}

function setPrint(donorid = "", donateid = "", sdpstatus = false) {


    if (donorid || donateid || isconfirmblooddonation || sdpstatus) {
        document.getElementById("printHeaderForm").style.display = "block";
    } else {
        document.getElementById("printHeaderForm").style.display = "none";
    }

    if (donorid) {
        document.getElementById("printCard").style.display = "block";
        document.getElementById("printCard2").style.display = "block";
        document.getElementById("printAppointment").style.display = "block";
        document.getElementById("printRegister").style.display = "block";
        document.getElementById("printAccident").style.display = "block";

        if (sdpstatus) {
            document.getElementById("printSingleDonorPlatelet").style.display = "block";
        } else {
            document.getElementById("printSingleDonorPlatelet").style.display = "none";
        }

    } else {
        document.getElementById("printCard").style.display = "none";
        document.getElementById("printCard2").style.display = "none";
        document.getElementById("printAppointment").style.display = "none";
        document.getElementById("printRegister").style.display = "none";
        document.getElementById("printAccident").style.display = "none";
        document.getElementById("printSingleDonorPlatelet").style.display = "none";
    }

    if (donateid) {
        document.getElementById("printCertificate").style.display = "block";

    } else {
        document.getElementById("printCertificate").style.display = "none";

    }

    if (isconfirmblooddonation) {
        document.getElementById("printConfirmBlood").style.display = "block";
    } else {
        document.getElementById("printConfirmBlood").style.display = "none";
    }

}

function setPrintAutologousDirect(donation_get_type_id = "") {
    if (donation_get_type_id == "3") {
        document.getElementById("printFormAutologousBloodDonation").style.display = "block";
        document.getElementById("printAutologousBloodDonation").style.display = "block";
        document.getElementById("printAutologousBloodDonationSticker").style.display = "block";
        document.getElementById("printDirectBloodDonation").style.display = "none";
    } else if (donation_get_type_id == "4") {
        document.getElementById("printFormAutologousBloodDonation").style.display = "none";
        document.getElementById("printAutologousBloodDonation").style.display = "none";
        document.getElementById("printAutologousBloodDonationSticker").style.display = "none";
        document.getElementById("printDirectBloodDonation").style.display = "block";
    } else {
        document.getElementById("printFormAutologousBloodDonation").style.display = "none";
        document.getElementById("printAutologousBloodDonation").style.display = "none";
        document.getElementById("printAutologousBloodDonationSticker").style.display = "none";
        document.getElementById("printDirectBloodDonation").style.display = "none";
    }
}

function setDonateStatusDate() {

    // var state = document.getElementById("donatenostatusid").value;
    // if (state == 1) {
    //     document.getElementById("donatenostatusdateblock").style.display = "block";
    // } else {
    //     document.getElementById("donatenostatusdateblock").style.display = "none";
    // }
}

function loadTable(stateDonate = false) {
    var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }
    var id = document.getElementById("donorid").value;

    var donation_status = 0;
    $.ajax({
        url: 'data/bloodbonor/blooddonor.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            // console.log(data)

            var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }
            if (data.data.length > 0) {
                // $("#customModal").modal('show');
                $('#customModal').modal({ backdrop: 'static', keyboard: false })
                document.getElementById("checkfalse").style.display = "none";
                document.getElementById("checktrue").style.display = "block";

            } else {
                document.getElementById("checkfalse").style.display = "block";
                document.getElementById("checktrue").style.display = "none";
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            if (document.getElementById("btnAddModal"))
                document.getElementById("btnAddModal").hidden = false;
            var event_data = '';
            var isconfirmblooddonation = false;
            $.each(obj, function(index, value) {

                valueNoStatus = false;
                var color = "";
                var color2 = "";
                var colorNoStatus = "";
                var textNoStatus = '';
                var textSDPNoStatus = '';

                // if (document.getElementById("btnAddModal"))
                //     document.getElementById("btnAddModal").hidden = false;

                if (posNeg(value) == 'Positive') {
                    color = "color4_red";

                    console.log("======isconfirmb1xlooddonation======" + value.isconfirmblooddonation);

                    if (document.getElementById("btnAddModal"))
                        document.getElementById("btnAddModal").hidden = true;

                    if (value.isconfirmblooddonation == "1") {

                        console.log("======isconfirmblooddonation======" + value.isconfirmblooddonation);

                        if (document.getElementById("btnAddModal"))
                            document.getElementById("btnAddModal").hidden = false;

                        textNoStatus = 'ปลดล็อคการติดเชื้อแล้ว<br/>ผู้อนุญาต : ' + value.confirmblooddonationname + '<br/>วัน-เวลาที่อนุญาต : ' + getDMYHM(value.confirmblooddonationdatetime) + '<br/>สาเหตุ : ' + value.confirmblooddonationremark + '<br/>';
                        colorNoStatus = "color3_green";
                        valueNoStatus = true;

                        isconfirmblooddonation = true;
                    }

                } else if (posNeg(value) == 'Negative') {
                    color = "color3_green";
                }

                if (value.bloodrhsceen_cross == 'Rh+') {
                    color2 = "color2";
                }

                if (value.donatenostatusid == 1) {
                    if (document.getElementById("btnAddModal"))
                        document.getElementById("btnAddModal").hidden = true;
                    textNoStatus = 'งดรับบริจาคชั่วคราว<br/>สาเหตุ : ' + value.donatenocauseremark;
                    colorNoStatus = "color4_red";

                    if (value.isconfirmdonorblooddonation == 1) {
                        if (document.getElementById("btnAddModal"))
                            document.getElementById("btnAddModal").hidden = false;
                        textNoStatus = 'ปลดล็อคการงดรับบริจาคแล้ว<br/>ผู้อนุญาต : ' + value.confirmblooddonationname + '<br/>วัน-เวลาที่อนุญาต : ' + getDMYHM(value.confirmblooddonationdatetime) + '<br/>สาเหตุ : ' + value.confirmblooddonationremark + '<br/>';
                        colorNoStatus = "color3_green";
                    }
                } else if (value.donatenostatusid == 2) {
                    if (document.getElementById("btnAddModal"))
                        document.getElementById("btnAddModal").hidden = true;
                    textNoStatus += 'งดรับบริจาคถาวร<br/>สาเหตุ : ' + value.donatenocauseremark;
                    colorNoStatus = "color4_red";
                }


                if (value.sdpdonatenostatusid == 1) {
                    if (document.getElementById("donation_type_id2"))
                        document.getElementById("donation_type_id2").disabled = true;
                    textSDPNoStatus = 'งดรับบริจาค SDP ชั่วคราว<br/>สาเหตุ : ' + value.sdpdonatenocauseremark + '<br/>';
                    document.getElementById("sdpdonatenocausetext").innerHTML = "<b>งดรับบริจาค SDP ชั่วคราว</b>&emsp;";
                    colorNoStatus = "color4_red";

                    if (value.isconfirmdonorsdp == 1) {
                        if (document.getElementById("donation_type_id2"))
                            document.getElementById("donation_type_id2").disabled = false;
                        textSDPNoStatus = 'ปลดล็อคการงดรับบริจาคแล้ว<br/>ผู้อนุญาต : ' + value.confirmblooddonationname + '<br/>วัน-เวลาที่อนุญาต : ' + getDMYHM(value.confirmblooddonationdatetime) + '<br/>สาเหตุ : ' + value.confirmblooddonationremark + '<br/>';
                        document.getElementById("sdpdonatenocausetext").innerHTML = "";
                        colorNoStatus = "color3_green";
                    }
                } else if (value.sdpdonatenostatusid == 2) {
                    if (document.getElementById("donation_type_id2"))
                        document.getElementById("donation_type_id2").disabled = true;
                    textSDPNoStatus += 'งดรับบริจาค SDP ถาวร<br/>สาเหตุ : ' + value.sdpdonatenocauseremark + '<br/>';
                    document.getElementById("sdpdonatenocausetext").innerHTML = "<b>งดรับบริจาค SDP ถาวร</b>&emsp;";
                    colorNoStatus = "color4_red";
                }

                event_data += '<tr>';
                event_data += '<td style="color:blue; font-weight: bold; font-size: 16px;">' + value.donorcode + '</td>';
                event_data += '<td style="font-weight: bold; font-size: 16px;">' + getDMY(value.donation_date) + ' ' + (value.donation_time) + '</td>';
                event_data += '<td style="color:blue; font-weight: bold; font-size: 16px;">' + value.prefixname + value.fname + ' ' + value.lname + '</td>';
                event_data += '<td style="color:blue; font-weight: bold; font-size: 16px;">' + value.donation_qty + '</td>';
                event_data += '<td style="color:blue; font-weight: bold; font-size: 16px;">' + value.donation_type_name + '</td>';
                event_data += '<td style="font-weight: bold; font-size: 16px;">' + value.bag_number + '</td>';
                event_data += '<td style="color:blue; font-weight: bold; font-size: 16px;"  class="' + color + '"><div id="square">' + posNeg(value) + ((posNeg(value) == 'Positive') ? '<br/>' + setPosInfectious(value) : '') + '</div></span></td>';
                event_data += '<td style="font-weight: bold; font-size: 16px;" class="' + color2 + '"><div id="square">' + value.rhname3 + '</div></td>';

                if (phoneStatus) {
                    event_data += '<td>' + value.donateantibody.replace(/,/g, ', ') + '</td>';
                    event_data += '<td>' + value.donatephenotypeshow.replace(/,/g, ', ') + '</td>';
                }

                event_data += '<td style="text-align: left; color:blue; font-weight: bold; font-size: 16px;" class="' + colorNoStatus + '" >';
                // if(value.blood_invest_tube_edta == '' && value.sdpisdonateremark == ''){
                //     event_data += textNoStatus + ((value.isdonateremark == 1) ? value.donateremark + '<br/>' : '') + ' ' + ((value.isblood_invest_remark == 1) ? value.blood_invest_remark + '<br/>' : '') + ' ' + ((value.iscross_remark == 1) ? value.cross_remark + '<br/>' : '') + ' ' + value.donationproblemsname + ' ' + value.donatereactionname ;
                // }else{
                //     event_data += textNoStatus + ((value.isdonateremark == 1) ? value.donateremark + '<br/>' : '') + ' ' + ((value.isblood_invest_remark == 1) ? value.blood_invest_remark + '<br/>' : '') + ' ' + ((value.iscross_remark == 1) ? value.cross_remark + '<br/>' : '') + ' ' + value.donationproblemsname + ' ' + value.donatereactionname + "<font color='#00008B'><b>เจาะ tube <br>" +"EDTA :" + value.blood_invest_tube_edta + ",Clotted :" + value.blood_invest_tube_clotted + ",ACD :" + value.blood_invest_tube_acd +"</b></font>"+((value.sdpisdonateremark != '')?",SDP Problem:"+value.sdpdonatenocauseremark:'');
                // }

                event_data += textNoStatus + textSDPNoStatus + ((value.isdonateremark == 1) ? value.donateremark + '<br/>' : '') + ' ' +
                    ((value.isblood_invest_remark == 1) ? value.blood_invest_remark + '<br/>' : '') + ' ' +
                    ((value.iscross_remark == 1) ? 'หมายเหตุเลือดติดเชื้อ : ' + value.cross_remark + '<br/>' : '') + ' ' +
                    ((value.donationproblemsid > 0) ? 'ปัญหาของการรับบริจาค : ' + value.donationproblemsname + '<br/>' : '') + ' ' +
                    ((value.donatereactionid > 0) ? 'ปฏิกิริยาหลังเจาะ : ' + value.donatereactionname + '<br/>' : '') + ' ' +


                    "<font color='#00008B'><b>" + ((value.istube == 1) ? "เจาะ tube <br>" : '') +
                    ((value.blood_invest_tube_edta != '') ? "EDTA :" + value.blood_invest_tube_edta : '') +
                    ((value.blood_invest_tube_clotted != '') ? ",Clotted :" + value.blood_invest_tube_clotted : '') +
                    ((value.blood_invest_tube_acd != '') ? ",ACD :" + value.blood_invest_tube_acd : '') + "</b>" +
                    ((value.donation_status == 2) ? value.donatenocausename : '') + "</b></font>" +
                    ((value.sdpisdonateremark == 1) ? ",SDP Problem:" + value.sdpdonatenocauseremark : '')

                ;


                if (value.iscross_remark == 1) {
                    var array = value.group_donateinfectedfilepath.split(',');
                    $.each(array, function(index_array, value_array) {
                        if (value_array != "") {
                            event_data += '<button type="button" onclick=showDoc("' + value_array + '") class="btn btn-info m-l-5">';
                            event_data += '<i class="fa fa-search"> ดูเอกสาร ' + (index_array + 1) + '</i>';
                            event_data += '</button>'
                        }
                    });
                }


                event_data += '</td>';
                event_data += '<td>';
                event_data += '<button type="button" onclick="editPage(' + value.donateid + ')"  class="btn btn-primary m-l-5">';
                event_data += ' <i class="fa fa-search"></i>';
                event_data += '</button>';
                event_data += '</td>';
                event_data += '</tr>';

                if (value.donation_status != 0) {
                    donation_status++;
                }

            });
            $("#list_table_json").append(event_data);



            if (stateDonate && obj[0].isconfirmdonorsdp != 1)
                if (document.getElementById("btnAddModal"))
                    document.getElementById("btnAddModal").hidden = true;



            if (isconfirmblooddonation) {
                console.log("=========");
                swal({
                        title: "ปลดล็อคติดเชื้อแล้ว",
                        text: "ผู้บริจาคเคยมีประวัติผลเลือดติดเชื้อ แต่มีการยืนยันให้รับบริจาคเลือดได้",
                        type: "warning",
                        showCloseButton: false,
                        showCancelButton: false,
                        dangerMode: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonClass: "",
                        confirmButtonText: "ตกลง",
                        closeOnConfirm: true
                    },
                    function(inputValue) {

                    });
            } else if (stateDonate && obj[0].isconfirmdonorsdp == 1) {
                swal({
                        title: "ปลดล็อค SDP แล้ว",
                        text: "ผู้บริจาคยังไม่ครบกำหนด 15 วัน แต่มีการยืนยันให้รับบริจาคเลือดได้",
                        type: "warning",
                        showCloseButton: false,
                        showCancelButton: false,
                        dangerMode: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonClass: "",
                        confirmButtonText: "ตกลง",
                        closeOnConfirm: true
                    },
                    function(inputValue) {

                    });
            }

            // if (donation_status != 0) {
            //     swal({
            //             title: "มีข้อมูลที่ยังไม่ได้ลงรายละเอียดการบริจาค",
            //             text: "มีข้อมูลที่ยังไม่ได้ลงรายละเอียดการบริจาค กรุณาใส่รายละเอียดการบริจาคให้เสร็จก่อนเพิ่มรายการใหม่",
            //             type: "warning",
            //             showCloseButton: false,
            //             showCancelButton: false,
            //             dangerMode: true,
            //             confirmButtonClass: "btn-success",
            //             confirmButtonClass: "",
            //             confirmButtonText: "ตกลง",
            //             closeOnConfirm: true
            //         },
            //         function(inputValue) {

            //         });
            // }

            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function confirmAddBloodDonation() {

    closePage();
    warrantorsdp30name = $('#fullname').val();

    if (sdp30alertstatus) {
        swal({
                title: "ผู้บริจาค SDP ยังไม่ครบกำหนด 30 วัน",
                html: true,
                text: '<h3>อนุญาตให้บริจาคได้หรือไม่</h3>' +
                    '<select id="warrantorsdp30"></select>',
                type: "input",
                showCancelButton: true,
                confirmButtonText: 'อนุญาต',
                cancelButtonText: 'ไม่อนุญาต',
                cancelButtonClass: "btn-danger",
                confirmButtonClass: "btn-success",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (inputValue != '') {
                    $("#donateremark").val("สาเหตุที่บริจาค SDP ได้ : " + inputValue + " (ผู้อนุญาต : " + warrantorsdp30name + ")");
                    confirmAddBloodDonationandcheck();
                } else if (!inputValue) {
                    setTimeout(function() {
                        confirmAddBloodDonation();
                    }, 500);
                } else {
                    closePageReset();
                }
            });


        $('#warrantorsdp30').select2({
            allowClear: true,
            width: "100%",
            theme: "bootstrap",
            placeholder: "",
            // tags: [],
            ajax: {
                url: 'data/masterdata/staff.php?type=1',
                dataType: 'json',
                type: "GET",
                quietMillis: 50,
                data: function(keyword) {
                    return {
                        keyword: keyword.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data.data, function(item) {
                            return {
                                id: item.id,
                                text: item.name + '|' + item.code,
                                item: item
                            }
                        })
                    };
                },

            },
            templateResult: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                );
                return $state;
            },
            templateSelection: function(state) {
                if (!state.id) {
                    return state.text;
                }

                var strState = state.text.split("|");

                var $state = $(
                    '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
                );
                return $state;
            },
        }).on("select2:selecting", function(e) {
            warrantorsdp30name = e.params.args.data.item.name;
        }).on("select2:clearing", function(e) {
            warrantorsdp30name = '';
        });

        setDataModalSelectValue('warrantorsdp30', '99999', $('#fullname').val() + '|');

    } else {
        confirmAddBloodDonationandcheck();
    }




}

function confirmAddBloodDonationandcheck() {


    if (valueNoStatus) {
        swal({
                title: "ผู้ป่วยมีประวัติ ติดเชื้อ",
                html: true,
                text: '<h1>ยืนยันรับบริจาค</h1>' +
                    '<input  type="text" autocomplete="off" value="" class="form-control" id="confirmusername" name="confirmusername" placeholder="Username">' +
                    '<input style="margin-top:10px;" type="password" autocomplete="off" value="" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Password">',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonClass: "",
                confirmButtonClass: "btn-success",
                confirmButtonText: "เข้าสู่ระบบ",
                cancelButtonText: "ยกเลิก",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (inputValue) {

                    var confirmusername = $("#confirmusername").val();
                    var confirmpassword = $("#confirmpassword").val();
                    spinnershow();
                    $.ajax({
                        url: 'data/checklogin.php?confirmusername=' + confirmusername +
                            '&confirmpassword=' + confirmpassword,
                        dataType: 'json',
                        type: 'get',
                        complete: function() {
                            var delayInMilliseconds = 200;
                            setTimeout(function() {
                                spinnerhide();
                            }, delayInMilliseconds);
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == true) {

                            } else {
                                myAlertTopErrorLogin();
                                confirmAddBloodDonation();
                            }
                        },
                        error: function(d) {
                            /*console.log("error");*/
                            alert("404. Please wait until the File is Loaded.");
                        }
                    });

                } else {
                    newPage();
                }
            });
    }
}


function setBtnChangeName() {

    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorhistory.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            if (data.data.length > 0) {
                document.getElementById("btnchangename").style.display = "block";
            } else {
                document.getElementById("btnchangename").style.display = "block";
            }

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setBtnGetCard() {

    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorgetcard.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            if (data.data.length > 0) {
                document.getElementById("btngetcard").style.display = "block";
            } else {
                document.getElementById("btngetcard").style.display = "none";
            }

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setBtnChangePassport() {

    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorpassporthistory.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            if (data.data.length > 0) {
                document.getElementById("btnchangepassport").style.display = "block";
            } else {
                document.getElementById("btnchangepassport").style.display = "none";
            }

        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function setBtnChangeBlood_Group() {
    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorbloodgrouphistory.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {
            if (data.data.length > 0) {
                document.getElementById("btnchangebloodgroup").style.display = "block";
            } else {
                document.getElementById("btnchangebloodgroup").style.display = "none";
            }
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadTableChangeBloodGroup() {
    $("#customChangeBloodModal").modal("show");
    var id = document.getElementById("donorid").value;
    console.log(id);
    $.ajax({
        url: 'data/bloodbonor/blooddonorbloodgrouphistory.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json_chanhe_Blood").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '<tr>';
                event_data += '<td>' + getDMYHM(value.updatetime) + " " + value.fullname + '</td>';
                event_data += '<td>' + value.donorblood_group + '</td>';
                event_data += '<td>' + value.donorblood_group_new + '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_chanhe_Blood").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}



function loadTableChangeName() {
    $("#customChangeNameModal").modal("show");
    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorhistory.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json_chanhe_name").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '<tr  >';
                event_data += '<td>' + getDMYHM(value.updatetime) + '</td>';
                event_data += '<td>' + value.fname + ' ' + value.lname + '</td>';
                event_data += '<td>' + value.fnamenew + ' ' + value.lnamenew + '</td>';
                event_data += '<td>' + value.fullname + '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_chanhe_name").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function loadTableChangePassport() {
    $("#customChangePassportModal").modal("show");
    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorpassporthistory.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json_chanhe_passport").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '<tr  >';
                event_data += '<td>' + getDMYHM(value.updatetime) + '</td>';
                event_data += '<td>' + value.donorpassport + '</td>';
                event_data += '<td>' + value.donorpassportnew + '</td>';
                event_data += '<td>' + value.fullname + '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_chanhe_passport").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}



function loadTableGetCard() {
    $("#customGetCardModal").modal("show");
    var id = document.getElementById("donorid").value;
    $.ajax({
        url: 'data/bloodbonor/blooddonorgetcard.php?donorid=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json_chanhe_get_card").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {

                event_data += '<tr  >';
                event_data += '<td>' + getDMY(value.getcarddate) + '</td>';
                event_data += '<td>' + value.name + ' ' + value.surname + '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_chanhe_get_card").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function showDoc(path) {
    window.open(localurl + '/' + path);
}

function posNeg(v) {
    if (
        v.tpharpr == '+' ||
        v.hbsag == '+' ||
        v.hivagab == '+' ||
        v.hcvab == '+' ||
        v.hbvdna == '+' ||
        v.hcvrna == '+' ||
        v.hivrna == '+'
    ) {
        return 'Positive';
    } else if (
        v.tpharpr == '-' &&
        v.hbsag == '-' &&
        v.hivagab == '-' &&
        v.hcvab == '-' &&
        v.hbvdna == '-' &&
        v.hcvrna == '-' &&
        v.hivrna == '-'
    ) {
        return 'Negative';
    } else {
        return '';
    }
}

function setPosInfectious(v) {
    var str = "";

    if (v.tpharpr == '+')
        str += "SYPHILIS TPHA RPR(" + v.tpharpr_grade + "+),";

    if (v.hbsag == '+')
        str += "HBs Ag(" + v.hbsag_grade + "+),";

    if (v.hivagab == '+')
        str += "HIV Ag/Ab(" + v.hivagab_grade + "+),";

    if (v.hcvab == '+')
        str += "HCV Ab(" + v.hcvab_grade + "+),";

    if (v.hbvdna == '+')
        str += "HBV DNA(" + v.hbvdna_grade + "+),";

    if (v.hcvrna == '+')
        str += "HCV RNA(" + v.hcvrna_grade + "+),";

    if (v.hivrna == '+')
        str += "HIV RNA(" + v.hivrna_grade + "+),";

    if (str.length > 0)
        str = str.substring(0, str.length - 1);

    return str;
}


function loadTableLost() {
    var id = document.getElementById("donorid").value;
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

function loadTableCheckBlood() {
    var id = document.getElementById("donateid").value;
    $.ajax({
        url: 'data/blood/blood-check-blood.php?id=' + id,
        dataType: 'json',
        type: 'get',
        success: function(data) {


            var body = document.getElementById("list_table_json_check_blood").getElementsByTagName('tbody')[0];
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));

            var event_data = '';
            $.each(obj, function(index, value) {
                event_data += '<tr>';
                event_data += '<td>' + value.tpharpr + '</td>';
                event_data += '<td>' + value.hbsag + '</td>';
                event_data += '<td>' + value.hivagab + '</td>';
                event_data += '<td>' + value.hcvab + '</td>';
                event_data += '<td>' + value.hbvdna + '</td>';
                event_data += '<td>' + value.hcvrna + '</td>';
                event_data += '<td>' + value.hivrna + '</td>';
                event_data += '</tr>';

            });
            $("#list_table_json_check_blood").append(event_data);
            // $("#list_table_json").append(event_data);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });
}

function bagNumber() {
    var bag_number = $('#bag_number').val();
    var bag_number_new = numnerPoint(bag_number);
    $('#bag_number').val(bag_number_new);
    // cut = bag_number.substr(7,1)
    // console.log(chk)
    if (bag_number_new.length == 14) {

        findBagNumber(bag_number_new);

        checkBagNumberUnit(bag_number_new);
        console.log(bag_number_new);
        $("#donation_status1").prop("checked", true);
    }

}

function checkBagNumberUnit(bag_number_new) {
    $('.check2').each(function() {
        if ($(this).prop('checked') == true) {
            chk = $(this).val();
        }
    });
    console.log(chk)



    if (document.getElementById("checkplaceid1").checked) {
        if (bag_number_new.substring(7, 8) != "0") {
            swal({
                    title: "รูปแบบหมายเลขถุงไม่ถูกต้อง",
                    text: "ท่านต้องการใช้หมายเลขถุงนี้หรือไม่",
                    type: "warning",
                    showCloseButton: true,
                    showCancelButton: true,
                    // dangerMode: true,
                    cancelButtonClass: "btn-success",
                    confirmButtonClass: "",
                    confirmButtonText: "ยกเลิก",
                    cancelButtonText: "ยืนยัน",
                    closeOnConfirm: true
                },
                function(inputValue) {
                    if (inputValue) {
                        $('#bag_number').val("");
                    }

                });

        }
    } else if (document.getElementById("checkplaceid2").checked) {
        // console.log('else')
        if (bag_number_new.substring(7, 8) == "0") {
            swal({
                    title: "รูปแบบถุงนี้เป็นของ รพ.ราชวิถี",
                    text: "ท่านต้องการใช้หมายเลขถุงนี้หรือไม่",
                    type: "warning",
                    showCloseButton: true,
                    showCancelButton: true,
                    // dangerMode: true,
                    cancelButtonClass: "btn-success",
                    confirmButtonClass: "",
                    confirmButtonText: "ยกเลิก",
                    cancelButtonText: "ยืนยัน",
                    closeOnConfirm: true
                },
                function(inputValue) {
                    if (inputValue) {
                        $('#bag_number').val("");
                    }
                });
        }
    }


}

function gotoBloodInfected(bag_number) {
    window.location.href = 'blood-Infected.php?bagnumber=' + bag_number;
}

function findBagNumber(barcode) {

    spinnershow();
    $.ajax({
        url: 'data/blood/blooddonorlist.php?barcode=' + barcode +
            '&activepage=1' +
            '&numrows=' + 25,
        dataType: 'json',
        type: 'get',
        complete: function() {
            var delayInMilliseconds = 0;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {


            var val = data.data;
            console.log(val[0])
            if (val.length > 0) {
                swal({
                        title: "หมายเลขถุง " + val[0].bag_number,
                        text: "ชื่อผู้บริจาค " + val[0].fname + " " + val[0].lname + " \nเมื่อวันที่ " + getDMY2(val[0].donation_date),
                        type: "warning",
                        showCloseButton: true,
                        showCancelButton: true,
                        // dangerMode: true,
                        cancelButtonClass: "btn-success",
                        confirmButtonClass: "",
                        confirmButtonText: "ปิด",
                        cancelButtonText: "ดูข้อมูล",
                        closeOnConfirm: true
                    },
                    function(inputValue) {
                        if (!inputValue) {
                            window.location.href = 'blood-donor-record.php?id=' + val[0].donateid;
                            // console.log(inputValue);
                        }
                        if (inputValue) {
                            $('#bag_number').val('');
                        }



                    });
            }

        },
        error: function(d) {
            console.log("error");
        }
    });
}

function handleSelectChangeUnitnameid(event) {
    var selectElement = event.target;
    var value = selectElement.value;
    localStorage.setItem("unitnameid", value);
}

function handleSelectChangeActivityid(event) {
    var selectElement = event.target;
    var value = selectElement.value;
    localStorage.setItem("activityid", value);
}


console.log("========placeid=======");
console.log(placeid);
if (placeid == 0 && localStorage.getItem("placeid")) {
    placeid = localStorage.getItem("placeid");
    document.getElementById("checkplaceid" + placeid).checked = true;

}

setTimeout(function() {
    if (unitnameid == "")
        setDataModalSelectValue("unitnameid", localStorage.getItem("unitnameid"), localStorage.getItem("unitnamename"));

    if (activityid == "")
        setDataModalSelectValue("activityid", localStorage.getItem("activityid"), localStorage.getItem("activityname"));
}, 2000);



placeidClick(placeid);
donorGetInformation(donation_get_type_id);
physicalExamination(physical_status);


setInputRequired();
donationStatus(donation_status);
getAge(document.getElementById("donorbirthday"));

//////////////////////////////////////////////////
document.getElementById("donorcode").focus();
$(window).scrollTop(0);

if (document.getElementById("donateid").value) {
    document.getElementById("checkfalse").style.display = "none";
    document.getElementById("checktrue").style.display = "block";
} else {
    document.getElementById("checkfalse").style.display = "block";
    document.getElementById("checktrue").style.display = "none";
}

function checkBox(v) {
    if (v.previous) {
        v.checked = false;
    }
    v.previous = v.checked;

}

function setDonateNoCauseDetail() {
    var donation_status2 = document.getElementById("donation_status2").checked;
    var donatenocauseid = $("#donatenocauseid").val();

    if (donation_status2 && (donatenocauseid == "36" || donatenocauseid == "75")) {
        document.getElementById("div_donatenocausedetail").style.display = "block";
        if (donatenocauseid == "36") {
            document.getElementById("lable_donatenocausedetail").value = "ระบุ";
        } else if (donatenocauseid == "75") {
            document.getElementById("lable_donatenocausedetail").value = "ระบุ";
        } else {
            document.getElementById("lable_donatenocausedetail").value = "ระบุ";
        }

        document.getElementById("donatenocausedetail").required = true;
        document.getElementById("donatenocausedetail").focus();
    } else {
        document.getElementById("div_donatenocausedetail").style.display = "none";
        document.getElementById("donatenocausedetail").value = "";
        document.getElementById("donatenocausedetail").required = false;
    }


}

function setCheckMarkAutologousAppointment() {
    var autologousisappointment = document.getElementById("autologousisappointment").checked;

    document.getElementById("autologousappointmentdate").readOnly = !autologousisappointment;
    document.getElementById("autologousappointmentremark").readOnly = !autologousisappointment;

    if (!autologousisappointment) {
        document.getElementById("autologousappointmentdate").value = "";
        document.getElementById("autologousappointmentremark").value = "";
    }

}

function getAutologousAppointmentDate8() {

    var dateFrom = new Date(dmyToymd($("#donation_date").val()));
    var dateTo = new Date(dmyToymd($("#autologousappointmentdate").val()));
    var today = new Date();
    var diffData = parseInt((dateTo - dateFrom) / (1000 * 60 * 60 * 24), 10);

    if (diffData < 0) {
        mgsError("ขออภัยค่ะ!", "วันนัดหมายไม่ถูกต้อง", getAutologousAppointmentDateDiff);
    }

}

function getAutologousAppointmentDateDiff(inputValue) {
    if (inputValue) {
        document.getElementById("autologousappointmentdate").value = "";
        document.getElementById("autologousappointmentdate").focus();
    }
}


function clickDonateStatusRemark() {
    if ($("#nottimedonate").val() == 1) {
        swal({
                title: 'ยังไม่ครบกำหนดบริจาค',
                text: 'กรุณาระบุสาเหตุที่บริจาคได้',
                type: "input",
                showCancelButton: true,
                confirmButtonText: 'OK',
                closeOnConfirm: true
            },
            function(v) {

                console.log(v);

                if (v !== "" && v !== false) {
                    var remark = $("#donateremark").val();
                    $("#donateremark").val(remark + " " + v);

                    
                    document.getElementById("donatenocauseid").required = false;
                } else if (v === "") {
                    setTimeout(function() {
                        clickDonateStatusRemark();
                    }, 500);

                } else {
                    document.getElementById("donation_status2").checked = true;
                    donationStatus(2);
                }
            });
    }
}

var customModalMaxMinState = true;

function customModalMaxMin() {
    customModalMaxMinState = !customModalMaxMinState;

    if (customModalMaxMinState) {
        document.getElementById("table_stock_customModal").style.height = "75vh";
        document.getElementById("btnIconMaxMin").innerHTML = '<i class="fa fa-caret-up" aria-hidden="true">';

    } else {
        document.getElementById("table_stock_customModal").style.height = "15vh";
        document.getElementById("btnIconMaxMin").innerHTML = '<i class="fa fa-caret-down" aria-hidden="true">';
    }
}

var phoneStatus = false;

function showAntiPhone() {
    phoneStatus = !phoneStatus;
    var elem = '';
    elem += '<tr>'
    elem += '<th class="table-td-header">เลขที่ผู้บริจาค</th>'
    elem += '<th class="table-td-header" style="min-width: 140px;">วัน-เวลาที่บริจาค</th>'
    elem += '<th class="table-td-header" style="min-width: 180px;">ชื่อ-สกุล</th>'
    elem += '<th class="table-td-header" style="min-width: 40px;">ครั้งที่<br/>บริจาค</th>'
    elem += '<th class="table-td-header" style="min-width: 170px;">ชนิดเลือด<br/>ที่บริจาค</th>'
    elem += '<th class="table-td-header" style="min-width: 120px;">หมายเลขถุง</th>'
    elem += '<th class="table-td-header" >Infectious<br/>Markers</th>'
    elem += '<th class="table-td-header" >Antibody<br/>Screening</th>';
    if (phoneStatus) {
        elem += '<th id="h_antibody" class="table-td-header" style="min-width: 140px;">Antibody</th>'
        elem += '<th id="h_phenotype" class="table-td-header" style="min-width: 140px;">phenotype</th>'
    }

    elem += '<th class="table-td-header" style="min-width: 140px;">หมายเหตุ</th>'
    elem += '<th class="table-td-header">แก้ไข</th>'
    elem += '</tr>';
    document.getElementById("list_table_header_json").innerHTML = elem;

    if (phoneStatus) {
        document.getElementById("idAntiPhone").innerHTML = '<span class="btn-label"><i class="fa fa-arrows-v"></i></span>ซ่อน Antibody และ Phenotype';
    } else {
        document.getElementById("idAntiPhone").innerHTML = '<span class="btn-label"><i class="fa fa-arrows-h"></i></span>แสดง Antibody และ Phenotype';
    }



    loadTable('');



}