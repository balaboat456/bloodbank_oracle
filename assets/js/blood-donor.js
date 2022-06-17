var statusSearch = false;
var valueSearch = '';
var valueNoStatus = false;
var smartCardStatus = false;
var sdp30alertstatus = false;
var objDonor = [];
var warrantorsdp30name = '';


$(document).ready(function () {
    $("#confirmblooddonationid").select2({ width: "100%", theme: "bootstrap" });

    var check_first = document.getElementById("check_first").value;
    var check_true = document.getElementById("donation_status2").checked;
    if (check_first == 0 && check_true != true) {
        document.getElementById("isfirstblooddonation").checked = true;
    }

    $("#unitofficeid").select2({ width: "100%", theme: "bootstrap" });
    // $("#bag_type_id").select2({width:"100%",theme: "bootstrap"});
    $("#blood_group").select2({
        width: "100%",
        theme: "bootstrap",
        color: "red",
        // templateResult: function (state) 
        // { 
        //     if (!state.id) {
        //         return state.text;
        //     }

        //     var strState = state.text.split("|");

        //     var $state = $(
        //         '<span class="select2-span">&nbsp;'+strState[1]+'</span>' +' <span >&nbsp;'+strState[0]+'</span>'
        //     );
        //     return $state;
        // } ,
        //     templateSelection: function (state) 
        // { 
        //     if (!state.id) {
        //         return state.text;
        //     }

        //     var strState = state.text.split("|");

        //     var $state = $(
        //         '<span >'+strState[0]+'</span>'
        //     );
        //     return $state;
        // } ,
    })


    $("#rh").select2({
        width: "100%",
        theme: "bootstrap",
        // templateResult: function (state) 
        //     { 
        //         if (!state.id) {
        //             return state.text;
        //         }

        //         var strState = state.text.split("|");

        //         var $state = $(
        //             '<span class="select2-span">&nbsp;'+strState[1]+'</span>' +' <span >&nbsp;'+strState[0]+'</span>'
        //         );
        //         return $state;
        //     } ,
        //         templateSelection: function (state) 
        //     { 
        //         if (!state.id) {
        //             return state.text;
        //         }

        //         var strState = state.text.split("|");

        //         var $state = $(
        //             '<span >'+strState[0]+'</span>'
        //         );
        //         return $state;
        //     } ,
    });

    $("#hn").on('keydown', function (e) {
        if (e.which == 13) {
            findHn();
        }
    });

    $("#patientname").on('keydown', function (e) {
        var patientname = document.getElementById("patientname").value;
        var patienttrue = patientname.includes("+");
        var patienttruearray = patientname.split("+");
        if (e.which == 13) {
            // findHn();
            if (patienttrue == true) {
                // alert(patienttruearray[0]);
                // alert(patienttruearray[1]);
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'api/get-patient-rajavithi-name.php?name=' + patienttruearray[0] + '&surname=' + patienttruearray[1],
                    success: function (data) {
                        // console.log(data);
                        // $("#hn").val(data.patienthnext);
                        if (data.patienthnext < 1) {
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
                                    if (inputValue) {
                                        document.getElementById('hn').focus;
                                    }
                                });
                        }
                        else{
                            $.ajax({
                                type: 'GET',
                                dataType: 'json',
                                url: 'data/patient/patient_name.php?patientfname=' + patienttruearray[0] + '&patientlname=' + patienttruearray[1],
                                complete: function () {
                                    var delayInMilliseconds = 200;
                                    setTimeout(function () {
                                        // spinnerhide();
                                    }, delayInMilliseconds);
                                },
                                success: function (data) {
                                    console.log(data);
                                    var body = document.getElementById("list_table_jsonpatient_modal").getElementsByTagName('tbody')[0];
                                    while (body.firstChild) {
                                        body.removeChild(body.firstChild);
                                    }
                                    var event_data = '';
                                    var td_count = 0;
                                    var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                                    $.each(obj, function (index, value) {
                                        var arr = [value];
                                        event_data += '<tr>';
                                        event_data += '<td  style="display:none;" >';
                                        event_data += JSON.stringify(arr);
                                        event_data += '</td>';
                                        event_data += '<td class="td-table">' + value.patienthn + '</td>';
                                        event_data += '<td class="td-table">' + value.patientan + '</td>';
                                        event_data += '<td class="td-table">' + value.patientfullname + '</td>';
                                        event_data += '<td class="td-table">' + value.wardname + '</td>';
                                        event_data += '<td class="td-table"><button type="button" onclick="select_patient(this)" class="btn btn-success m-l-5"><i class="fa fa-plus"></i></button></td>';
                                        event_data += '</tr>';
                                        td_count++;
                                    });
                                    $("#list_table_jsonpatient_modal").append(event_data);

                                    $("#patient_modal").modal('show');
                                },
                                error: function (data) {
                                    clearPatient();
                                    console.log('An error occurred.');
                                    console.log(data);

                                },
                            });
                        }
                            
                        // $.ajax({
                        //     type: 'GET',
                        //     dataType: 'json',
                        //     url: 'data/patient/patient.php?hn=' + data.patienthnext,
                        //     complete: function () {
                        //         var delayInMilliseconds = 200;
                        //         setTimeout(function () {
                        //             // spinnerhide();
                        //         }, delayInMilliseconds);
                        //     },
                        //     success: function (data) {
                        //         if (data.data.length > 0) {
                        //             $("#an").val(data.data[0].patientan);
                        //             $("#patientname").val(data.data[0].patientfullname);

                        //             setDataModalSelectValue('unitofficeid', data.data[0].wardid, data.data[0].wardname);

                        //             if (document.getElementById('donation_get_type_id3').checked)
                        //                 setBloodDonorRecord(data.data[0]);
                        //         } else {
                        //             clearPatient();
                        //             swal({
                        //                 title: "ไม่พบข้อมูล ",
                        //                 type: "warning",
                        //                 showCloseButton: false,
                        //                 showCancelButton: false,
                        //                 // dangerMode: true,
                        //                 confirmButtonClass: "btn-success",
                        //                 confirmButtonClass: "",
                        //                 confirmButtonText: "ตกลง",
                        //                 closeOnConfirm: true
                        //             },
                        //                 function (inputValue) {
                        //                     if (inputValue) {
                        //                         document.getElementById('hn').focus;
                        //                     }
                        //                 });
                        //         }
                        //     },
                        //     error: function (data) {
                        //         clearPatient();
                        //         console.log('An error occurred.');
                        //         console.log(data);

                        //     },
                        // });

                    },
                    error: function (data) {
                        clearPatient();
                        console.log('An error occurred.');
                        console.log(data);

                    },
                });
            }
        }
    });


    $('#diagnosisid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        minimumInputLength: 2,
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/diagnosis.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.diagnosisid,
                            text: item.diagnosisname + '|' + item.diagnosiscode,
                            item: item
                        }
                    })
                };
            },

        },
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
    }).on("select2:selecting", function (e) {

        $("#diagnosis").val(e.params.args.data.item.diagnosiscode);
        $("#diagnosisdetail").val(e.params.args.data.item.diagnosisname);

    }).on("select2:clearing", function (e) {

        $("#diagnosis").val("");
        $("#diagnosisdetail").val("");

    });

    $('#search').select2({
        allowClear: true,
        width: "350px",
        theme: "bootstrap",
        minimumInputLength: 2,
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/donor.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.donorid,
                            text: 'ชื่อ-สกุล : ' + item.fname + ' ' + item.lname + ' | ' +
                                'เลขที่บัตรประชาชน : ' + item.donoridcard + ' | ' +
                                'เลขที่ผู้บริจาค : ' + item.donorcode,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function (e) {

        document.getElementById("donorid").value = e.params.args.data.id;
        setDonorData(e.params.args.data.item);

    }).on("select2:clearing", function (e) {
        var lastdate1 = getDMY543();
        document.getElementById("checkfalse").style.display = "block";
        document.getElementById("checktrue").style.display = "none";
        document.getElementById("donorid").value = '';
        document.getElementById("donorcode").value = '';
        document.getElementById("donoridcard").value = '';
        document.getElementById("donorbirthday").value = '';
        getAge({ value: document.getElementById("donorbirthday").value });
        document.getElementById("donorage").value = '';
        document.getElementById("donoragetext").value = '';

        document.getElementById("donoroccupation").value = '';
        document.getElementById("donortelhome").value = '';
        document.getElementById("donormobile").value = '';
        document.getElementById("fname").value = '';
        document.getElementById("lname").value = '';
        document.getElementById("donoremail").value = '';
        document.getElementById("address").value = '';
        document.getElementById("zipcode").value = '';
        document.getElementById("souvenirid").value = '';
        document.getElementById("genderid1").checked = true;
        document.getElementById("genderid2").checked = false;
        document.getElementById("provinceid").value = '';
        document.getElementById("districtid").value = '';
        document.getElementById("subdistrictid").value = '';
        document.getElementById("provincecurrentid").value = '';
        document.getElementById("districtcurrentid").value = '';
        document.getElementById("subdistrictcurrentid").value = '';

        document.getElementById("donoroccupationother").value = '';
        $("#last_donation_date").val(lastdate1);
        $("#last_donation_time").val($("#donation_time").val());

        $("#sdpprehb_before").val("");
        $("#sdpprehct_before").val("");
        $("#sdpprerbc_before").val("");
        $("#sdpprewbc_before").val("");
        $("#sdppreplt_before").val("");
        $("#sdppremcv_before").val("");
        $("#sdppreeosinophil_before").val("");

        $("#istube_after").val("");
        $("#blood_invest_tube_edta_after").val("");
        $("#blood_invest_tube_clotted_after").val("");
        $("#blood_invest_tube_acd_after").val("");

        $("#donation_qty").val("");


        prefixid = '';
        countryid = '';
        countrycurrentid = '';
        provinceid = '';
        districtid = '';
        subdistrictid = '';
        provincecurrentid = '';
        districtcurrentid = '';
        subdistrictcurrentid = '';
        donoroccupation = '';

        setPrefix();
        setCountry();
        setCountryCurrent();
        setAddress2();
        setAddress2Current();
        setDonorOccupation();
        setPrint($("#donorid").val(), $("#donateid").val(), document.getElementById("donation_type_id2").checked);
        setBtnChangeName();
        setBtnChangePassport();
        setBtnChangeBlood_Group();
    }).on("select2:open", function () {
        statusSearch = true;
        valueSearch = '';
    }).on("select2:close", function () {
        var str = '';
        if ($('#search').val() == null) {
            if (numberR(valueSearch).length > 0 && valueSearch.length == 10) {
                $('#donorcode').val(valueSearch);
            } else if (numberR(valueSearch).length == 13) {
                if (checkID(valueSearch)) {
                    $('#donoridcard').val(valueSearch);
                } else {
                    swal({
                        title: 'ขออภัยค่ะ!',
                        text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        confirmButtonClass: "btn-danger",
                        closeOnConfirm: true
                    },
                        function () {
                            document.getElementById("donoridcard").focus();
                        });
                }

            } else {
                str = valueSearch.replace(" ", ",");
                var res = str.split(",");
                if (res[0]) {
                    $('#fname').val(res[0]);

                    $('#isfirstblooddonation').prop('checked', true);
                }


                if (res[1]) {
                    $('#lname').val(res[1]);


                }


            }
        }
        statusSearch = false;
    });


    function setDonorData(item) {

        console.log("===========11111111");
        document.getElementById("isfirstblooddonation").checked = false;

        if (item.DATE_NOW == item.donation_date) {
            spinnershow();
            window.location.href = "blood-donor-record.php?id=" + item.donateid + '&edit=1';
            return false;
        }

        $.ajax({
            url: 'data/bloodbonor/blooddonor.php?donorid=' + item.donorid,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                console.log(data);
                var status = false;
                var screenpoststatus = false;
                var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                $.each(obj, function (index, value) {

                    if (posNeg(value) == 'Positive') {
                        status = true;
                    }

                    if (value.bloodrhsceen_cross == 'Rh+') {
                        screenpoststatus = true;
                    }

                });


                if (status) {
                    swal({
                        title: "ผู้บริจาคมีผลติดเชื้อ",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonText: 'ตกลง',
                        confirmButtonClass: "btn-danger",
                        closeOnConfirm: true
                    },
                        function () {
                            console.log("*************");

                            setTimeout(function () { alertSceenPost(item, obj[0], screenpoststatus); }, 200);

                        });
                } else {
                    alertSceenPost(item, obj[0], screenpoststatus);
                }

            }
        });




    }

    function alertSceenPost(item, item2 = [], screenpoststatus = false) {
        console.log("***aaa**********");
        if (screenpoststatus) {
            swal({
                title: "ผู้บริจาคมีประวัติ screen Positive\nกรุณาเลือกถุง Double",
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'ตกลง',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            },
                function () {
                    setDonorDataExp(item, item2);
                });
        } else {
            setDonorDataExp(item, item2);
        }

    }


    function setDonorDataExp(item, item2 = []) {

        objDonor = item2;
        sdp30alertstatus = false;

        var date1 = new Date(item.donation_date);
        var date2 = new Date(getYMD543());
        var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));

        result = $('#sdpresultvolproc').val();
        result1 = $('#sdpresultpltweight').val();
        chk = $('#donation_type_id2').prop('checked');
        if (item.donation_type_id == 2) {

            if (diffDays < 15 && (item2.donation_status == 1)) {
                setItem(item);
                setTimeout(function () {
                    swal({
                        title: "ผู้บริจาคยังไม่ครบกำหนด 15 วัน",
                        text: "ผู้บริจาคเคยบริจาค Plateletpheresis (SDP) \nเมื่อวันที่ " + getDMY2(item.donation_date) + " เหลืออีก " + (15 - diffDays) + " วัน",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonText: 'ตกลง',
                        confirmButtonClass: "btn-danger",
                        closeOnConfirm: true
                    },
                        function () {
                            loadTable(true);
                        });
                }, 500);
            } else if (diffDays < 30 && (item2.donation_status == 1)) {

                sdp30alertstatus = true;
                setTimeout(function () {

                    selectDonor("30 วัน", "Plateletpheresis (SDP)", getDMY2(item.donation_date), (30 - diffDays), item, '', 'SDP');
                }, 500);
            } else {
                setItem(item);
                loadTable();
            }

        } else if (item.donation_type_id == 4) {
            if (diffDays < 14 && (item2.donation_status == 1)) {

                setTimeout(function () {
                    selectDonor("14 วัน", "Plasma Apheresis", getDMY2(item.donation_date), (14 - diffDays), item);
                }, 500);

            } else {
                setItem(item);
                loadTable();
            }
        } else {
            var type = "โลหิตทั่วไป";
            if (item.donation_type_id == 3 && (item2.donation_status == 1)) {
                type = "Red Cell Apheresis";
            }
            if (diffDays < 83 && (item2.donation_status == 1)) {

                setTimeout(function () {
                    selectDonor("83 วัน", type, getDMY2(item.donation_date), (83 - diffDays), item);
                }, 500);
            } else {

                setItem(item);
                loadTable();

            }
        }

        setBtnChangeName();
        setBtnChangePassport();
        setBtnChangeBlood_Group();
    }

    $(document).on('keyup', '.select2-search__field', function (e) {
        if (statusSearch) {
            valueSearch = $(this).val();
        }

        if (e.keyCode === 13) {
            if (statusSearch) {
                $("#search").select2("close");
            }

        }

    });


    /*

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
                    genderid: genderid

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
            isIDcardPassport(2);
            document.getElementById("isidcardpassport2").checked = true;


        } else {
            $("#lname").val("");
            isIDcardPassport(1);
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
    */

    function setItem(item) {
        console.log(item);
        var lastdate1 = getDMY(item.lastcheckdate);

        document.getElementById("donorid").value = item.donorid;
        document.getElementById("donorcode").value = item.donorcode;
        document.getElementById("donoremail").value = item.donoremail;
        document.getElementById("donoroccupation").value = item.donoroccupation;
        document.getElementById("donortelhome").value = item.donortelhome;
        document.getElementById("donormobile").value = item.donormobile;

        $("#showblood").val(item.blood_group);

        document.getElementById("address_current").value = item.address_current;
        document.getElementById("address_moo_current").value = item.address_moo_current;
        document.getElementById("address_alley_current").value = item.address_alley_current;
        document.getElementById("address_street_current").value = item.address_street_current;

        document.getElementById("zipcode_current").value = item.zipcode_current;
        // document.getElementById("souvenirid").value = item.souvenirid;


        document.getElementById("provincecurrentid").value = item.provincecurrentid;
        document.getElementById("districtcurrentid").value = item.districtcurrentid;
        document.getElementById("subdistrictcurrentid").value = item.subdistrictcurrentid;
        findLast(item.donorid);


        document.getElementById("isidcardpassport1").checked = (item.isidcardpassport == 1)
        document.getElementById("isidcardpassport2").checked = (item.isidcardpassport == 2)
        if (item.isidcardpassport == 2) {
            document.getElementById("donorpassport").value = item.donorpassport;
        }


        if (!smartCardStatus) {
            document.getElementById("donoridcard").value = item.donoridcard;
            document.getElementById("fname").value = item.fname;
            document.getElementById("lname").value = item.lname;
            document.getElementById("donorbirthday").value = getDMY(item.donorbirthday);
            getAge({ value: document.getElementById("donorbirthday").value });
            document.getElementById("imagePofile").src = (item.donorimagepath == "" || item.donorimagepath == null) ? "assets/images/profile.png" : item.donorimagepath;
            document.getElementById("donorage").value = item.donorage;


            document.getElementById("address").value = item.address;
            document.getElementById("address_moo").value = item.address_moo;
            document.getElementById("address_alley").value = item.address_alley;
            document.getElementById("address_street").value = item.address_street;
            document.getElementById("genderid1").checked = (item.genderid == 1);
            document.getElementById("genderid2").checked = (item.genderid == 2);
            document.getElementById("provinceid").value = item.provinceid;
            document.getElementById("districtid").value = item.districtid;
            document.getElementById("subdistrictid").value = item.subdistrictid;
            document.getElementById("zipcode").value = item.zipcode;
        }


        // getAge(this);


        if (item.blood_group != 0 && item.blood_group != '') {
            setDataModalSelectValue("blood_group", item.blood_group, item.blood_group);
        } else {
            setDataModalSelectValue("blood_group", "", "");
        }


        setDataModalSelectValue("rh", item.rh, item.rhname3);



        document.getElementById("donoroccupationother").value = item.donoroccupationother;

        $("#last_donation_date").val(lastdate1);
        $("#last_donation_time").val(item.lastchecktime);

        document.getElementById("isunitoffice").checked = (item.donor_isunitoffice == 1);
        setUnitOffice(document.getElementById("isunitoffice"));
        $("#departmentid").val(item.donor_departmentid);

        prefixid = item.prefixid;
        countryid = item.countryid;
        countrycurrentid = item.countrycurrentid;
        provinceid = item.provinceid;
        districtid = item.districtid;
        subdistrictid = item.subdistrictid;
        provincecurrentid = item.provincecurrentid;
        districtcurrentid = item.districtcurrentid;
        subdistrictcurrentid = item.subdistrictcurrentid;
        donoroccupation = item.donoroccupation;

        var isidcardpassport = "";
        if (document.getElementById("isidcardpassport1").checked) {
            isidcardpassport = 1;
        } else if (document.getElementById("isidcardpassport2").checked) {
            isidcardpassport = 2;
        }

        var genderid = "";
        if (document.getElementById("genderid1").checked) {
            genderid = 1;
        } else if (document.getElementById("donorpassport").checked) {
            genderid = 2;
        }

        setPrefixSelect(genderid, isidcardpassport)

        setPrefix();
        setCountry();
        setCountryCurrent();
        setAddress2();
        setAddress2Current();

        setDonorOccupation();
        setPrint($("#donorid").val(), $("#donateid").val(), document.getElementById("donation_type_id2").checked);
    }

    function findLast(id = "") {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/donate/donate-last.php?donorid=' + id,
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    // spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {
                // chk = $('.check9').val();
                // v = (data.data.length) - 1;
                // console.log(data.data[v].donation_status)
                // console.log(data.data[v]);
                // console.log(data.data)
                if (data.data.length > 0) {

                    $("#sdpprehb_before").val(data.data[0].sdpprehb_before);
                    $("#sdpprehct_before").val(data.data[0].sdpprehct_before);
                    $("#sdpprerbc_before").val(data.data[0].sdpprerbc_before);
                    $("#sdpprewbc_before").val(data.data[0].sdpprewbc_before);
                    $("#sdppreplt_before").val(data.data[0].sdppreplt_before);
                    $("#sdppremcv_before").val(data.data[0].sdppremcv_before);
                    $("#sdppreeosinophil_before").val(data.data[0].sdppreeosinophil_before);

                    $("#istube_after").val(data.data[0].istube);
                    $("#blood_invest_tube_edta_after").val(data.data[0].blood_invest_tube_edta);
                    $("#blood_invest_tube_clotted_after").val(data.data[0].blood_invest_tube_clotted);
                    $("#blood_invest_tube_acd_after").val(data.data[0].blood_invest_tube_acd);
                    $("#donation_qty").val(parseInt(data.data[0].donation_qty));
                    $("#qty").val(parseInt(data.data[0].donation_qty));
                    setBtnChangeName();
                    setBtnChangePassport();
                    setBtnChangeBlood_Group();

                    // $('#bag_staff_id').prop('required', true)
                    // $('#blood_driller_id').prop('required', true)
                    // $('#inspectorid').prop('required', true)




                } else {
                    $("#sdpprehb_before").val("");
                    $("#sdpprehct_before").val("");
                    $("#sdpprerbc_before").val("");
                    $("#sdpprewbc_before").val("");
                    $("#sdppreplt_before").val("");
                    $("#sdppremcv_before").val("");
                    $("#sdppreeosinophil_before").val("");

                    $("#istube_after").val("");
                    $("#blood_invest_tube_edta_after").val("");
                    $("#blood_invest_tube_clotted_after").val("");
                    $("#blood_invest_tube_acd_after").val("");

                    $("#donation_qty").val("");
                    $('#bag_staff_id').prop('required', false)
                    $('#blood_driller_id').prop('required', false)
                    $('#inspectorid').prop('required', false)
                    setBtnChangeName();
                    setBtnChangePassport();
                    setBtnChangeBlood_Group();
                }
            },
            error: function (data) {
                clearPatient();
                console.log('An error occurred.');
                console.log(data);

            },
        });

    }

    function selectDonor(time = "", text = "", date = "", b = "", item = null, swalType = 'warning', bloodtype = "") {


        swal({
            title: "ผู้บริจาคยังไม่ครบกำหนด " + time,
            text: "ผู้บริจาคเคยบริจาค " + text + " \nเมื่อวันที่ " + date + " เหลืออีก " + b + " วัน",
            type: swalType,
            inputPlaceholder: "ระบุสาเหตุ",
            showCloseButton: true,
            showCancelButton: true,
            // dangerMode: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "เพิ่ม",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: true
        },
            function (inputValue) {

                console.log(inputValue);

                if (inputValue != "" && inputValue != false) {
                    setItem(item);
                    loadTable();

                    if (bloodtype == "SDP") {
                        $("#donateremark").val("สาเหตุที่บริจาค SDP ได้ : " + inputValue + " (ผู้อนุญาต : " + $('#fullname').val() + ")");
                    } else {
                        document.getElementById("nottimedonate").value = 1;
                        document.getElementById("donation_status2").checked = true;
                        donationStatus(2);
                    }



                } else if (inputValue === "") {
                    setTimeout(function () {
                        swal({
                            title: "กรุณาระบุสาเหตุ",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonText: 'ตกลง',
                            closeOnConfirm: true
                        },
                            function () {
                                setDonorDataExp(item, objDonor);
                            });
                    }, 500);

                } else {
                    newPage();
                }


            });

        return false;

    }

    $('.address2').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/address.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.zipcode,
                            text: item.address,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function (e) {
        setAddress2Data(e.params.args.data.item);
    });

    function setAddress2Data(item) {

        document.getElementById("address2").value = item.address;
        document.getElementById("provinceid").value = item.provinceid;
        document.getElementById("districtid").value = item.districtid;
        document.getElementById("subdistrictid").value = item.subdistrictid;
        document.getElementById("zipcode").value = item.zipcode;

        subdistrictid = item.subdistrictid;
        districtid = item.districtid;
        provinceid = item.provinceid;
    }


    $('.address2_current').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/address.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.zipcode,
                            text: item.address,
                            item: item
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function (e) {

        document.getElementById("address2_current").value = e.params.args.data.text;
        document.getElementById("provincecurrentid").value = e.params.args.data.item.provinceid;
        document.getElementById("districtcurrentid").value = e.params.args.data.item.districtid;
        document.getElementById("subdistrictcurrentid").value = e.params.args.data.item.subdistrictid;
        document.getElementById("zipcode_current").value = e.params.args.data.item.zipcode;

    });

    $('.countryid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/country.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.countryid,
                            text: item.countryth
                        }
                    })
                };
            },
        }
    });

    $('.countrycurrentid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/country.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.countryid,
                            text: item.countryth
                        }
                    })
                };
            },
        }
    });

    $('.donoroccupation').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/occupation.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.occupationid,
                            text: item.occupationname
                        }
                    })
                };
            },
        }
    }).on("select2:selecting", function (e) {

        if (e.params.args.data.id == '99') {
            document.getElementById("donoroccupationotherblock").style.display = "block";
            document.getElementById("donoroccupationother").required = true;
        } else {
            document.getElementById("donoroccupationotherblock").style.display = "none";
            document.getElementById("donoroccupationother").required = false;
        }


    });


    $('.unitnameid').select2({
        allowClear: true,
        width: "250px",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/mobile-unit.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.id,
                            text: item.dmu_name,
                            item: item
                        }
                    })
                };
            },
        }
    }).on("select2:selecting", function (e) {

        localStorage.setItem("unitnameid", e.params.args.data.item.id);
        localStorage.setItem("unitnamename", e.params.args.data.item.dmu_name);

    });


    $('.activityid').select2({
        allowClear: true,
        width: "250px",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/donate-activity.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.activityid,
                            text: item.activityname,
                            item: item
                        }
                    })
                };
            },
        }
    }).on("select2:selecting", function (e) {

        localStorage.setItem("activityid", e.params.args.data.item.activityid);
        localStorage.setItem("activityname", e.params.args.data.item.activityname);

    });

    setDataModalSelectValue("unitnameid", localStorage.getItem("unitnameid"), localStorage.getItem("unitnamename"));
    setDataModalSelectValue("activityid", localStorage.getItem("activityid"), localStorage.getItem("activityname"));

    $('.donationproblemsid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/donationproblems.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.donationproblemsid,
                            text: item.donationproblemsname
                        }
                    })
                };
            },
        }
    });

    $('.donatereactionid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/donatereaction.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.donatereactionid,
                            text: item.donatereactionname
                        }
                    })
                };
            },
        }
    });

    $('.donatenostatusid').select2({

        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/donatenostatus.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.donatenostatusid,
                            text: item.donatenostatusname
                        }
                    })
                };

            },
        }
    }).on("select2:selecting", function (e) {
        setDonateStatusDate();

    }).on("select2:close", function () {
        setDonateStatusDate();
    });

    $('.provinceid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        // placeholder: "Search Provinces",
        // tags: [],
        ajax: {
            url: 'data/masterdata/provinces.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.provinceid,
                            text: item.provinceth
                        }
                    })
                };
            },

        }
    });


    $('.districtid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        // placeholder: "Search Districts",
        // tags: [],
        ajax: {
            url: 'data/masterdata/districts.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term,
                    provinceid: $("#provinceid").select2('val')
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {

                        return {
                            id: item.districtid,
                            text: item.districtth
                        }
                    })
                };
            },
        }
    });

    $('.subdistrictid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        // placeholder: "Search Sub Districts",
        // tags: [],
        ajax: {
            url: 'data/masterdata/subdistricts.php',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (keyword) {
                return {
                    keyword: keyword.term,
                    districtid: $("#districtid").select2('val')
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.subdistrictid,
                            text: item.subdistrictth,
                            zipcode: item.zipcode,
                        }
                    })
                };
            },

        }
    }).on("select2:selecting", function (e) {
        document.getElementById("zipcode").value = e.params.args.data.zipcode;
    });

    $('.bag_staff_id').select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    $('.staffsouvenirid').select2({
        width: "180px",
        theme: "bootstrap",
        // placeholder: "เลือกเจ้าหน้าที่ผู้จ่ายเข็ม",
    });

    $('.staffcardid').select2({
        width: "100%",
        theme: "bootstrap",
        // placeholder: "เจ้าหน้าที่ผู้จ่ายบัตร",
    });

    $('#staffneedleid').select2({
        width: "100%",
        theme: "bootstrap",
        // placeholder: "เจ้าหน้าที่ผู้จ่ายบัตร",
    });

    $('#receivestaffneedleid').select2({
        width: "100%",
        theme: "bootstrap",
        // placeholder: "เจ้าหน้าที่ผู้จ่ายบัตร",
    });

    $('.blood_driller_id').select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        // placeholder: "เลือกผู้เจาะโลหิต",
    });

    $('.inspectorid').select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        // placeholder: "เลือกลงชื่อผู้ตรวจ",
    });

    $('#staff_screening').select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        // placeholder: "เลือกลงชื่อผู้ตรวจ",
    });

    $('#experienced_staff').select2({
        width: "100%",
        theme: "bootstrap",
        templateResult: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function (state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        // placeholder: "เลือกลงชื่อผู้ตรวจ",
    });

    $('.ischecklab').select2({
        width: "100%",
        theme: "bootstrap",
        // placeholder: "เจ้าหน้าที่ตรวจสอบผล Lab",
    });

    $('.issdpsave').select2({
        width: "100%",
        theme: "bootstrap",
        // placeholder: "ผู้บันทึก",
    });


    setPrefix();
    setCountry();
    setCountryCurrent();
    setAddress2();
    setAddress2Current();
    setDonorOccupation();
    setDonationProblems();
    setDonateReaction();
    setDonateNoStatus();
    setSDPShow(donation_type_id);
    setPrint($("#donorid").val(), $("#donateid").val(), document.getElementById("donation_type_id2").checked);
    setUnitOffice(document.getElementById("isunitoffice"));
    setDonateNoCauseDetail();
    setCheckMarkAutologousAppointment();


    // setProvince();
    // setDistrict();
    // setSubDistrict();

    function setPrefix() {
        // Set Default Country
        var genderid = 0;
        if (document.getElementById("genderid1").checked) {
            genderid = 1;
        } else if (document.getElementById("genderid2").checked) {
            genderid = 2;
        }

        var prefix = $('#prefixid');

        if (prefixid) {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'data/masterdata/prefix.php?keyword=' + prefixid,
            }).then(function (data) {
                var option = new Option(data.data[0].prefixname, data.data[0].prefixid, true, true);
                prefix.append(option).trigger('change');

                prefix.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            });
        }

    }

    function setAddress2Current() {
        // Set Default Country
        var address2_current_select = $('#address2_current_select');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/address.php?subdistrictid=' + subdistrictcurrentid,
        }).then(function (data) {

            var index = getIndex(data.data, 'subdistrictid', subdistrictcurrentid);

            var option;
            if (data.data.length > 0 && subdistrictcurrentid && (index || index == 0)) {
                option = new Option(data.data[index].address, data.data[index].subdistrictid, true, true);
                $('#address2_current').val(data.data[index].address);

            } else {
                $('#address2_current_select').val(null).trigger('change');
                $('#address2_current').val('');
            }

            address2_current_select.append(option).trigger('change');
            address2_current_select.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });

        });
    }

    function setAddress2() {

        // Set Default Country
        var addressselect = $('#addressselect');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/address.php?subdistrictid=' + subdistrictid,
        }).then(function (data) {

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


    function setCountry() {
        // Set Default Country
        if (!countryid)
            countryid = 'THA';

        var country = $('#countryid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/country.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'countryid', countryid);
            var option;
            if (data.data.length > 0 && countryid && (index || index == 0)) {

                option = new Option(data.data[index].countryth, data.data[index].countryid, true, true);
                country.append(option).trigger('change');

                country.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    function setCountryCurrent() {
        // Set Default Country
        if (!countrycurrentid)
            countrycurrentid = 'THA';

        var country = $('#countrycurrentid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/country.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'countryid', countrycurrentid);
            var option;
            if (data.data.length > 0 && countrycurrentid && (index || index == 0)) {

                option = new Option(data.data[index].countryth, data.data[index].countryid, true, true);
                country.append(option).trigger('change');

                country.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    function setDonorOccupation() {
        // Set Default Donor Occupation

        var occupation = $('#donoroccupation');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/occupation.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'occupationid', donoroccupation);
            var option;
            if (data.data.length > 0 && donoroccupation && (index || index == 0)) {

                option = new Option(data.data[index].occupationname, data.data[index].occupationid, true, true);
                occupation.append(option).trigger('change');

                occupation.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });

                if (data.data[index].occupationid == '99') {
                    document.getElementById("donoroccupationotherblock").style.display = "block";
                    document.getElementById("donoroccupationother").required = true;
                } else {
                    document.getElementById("donoroccupationotherblock").style.display = "none";
                    document.getElementById("donoroccupationother").required = false;
                }
            }
        });
    }

    function setDonationProblems() {
        // Set Default Donor Occupation

        var donationproblems = $('#donationproblemsid');

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/donationproblems.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'donationproblemsid', donationproblemsid);

            var option;
            if (data.data.length > 0 && donationproblemsid && (index || index == 0)) {

                option = new Option(data.data[index].donationproblemsname, data.data[index].donationproblemsid, true, true);

                donationproblems.append(option).trigger('change');

                donationproblems.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    function setDonateReaction() {
        // Set Default Donor Occupation

        var donatereaction = $('#donatereactionid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/donatereaction.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'donatereactionid', donatereactionid);
            var option;
            if (data.data.length > 0 && donatereactionid && (index || index == 0)) {

                option = new Option(data.data[index].donatereactionname, data.data[index].donatereactionid, true, true);
                donatereaction.append(option).trigger('change');

                donatereaction.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    function setDonateNoStatus() {
        // Set Default Donor Occupation

        var donatenostatus = $('#donatenostatusid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/donatenostatus.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'donatenostatusid', donatenostatusid);
            var option;
            if (data.data.length > 0 && donatenostatusid && (index || index == 0)) {

                option = new Option(data.data[index].donatenostatusname, data.data[index].donatenostatusid, true, true);
                donatenostatus.append(option).trigger('change');

                donatenostatus.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
            setDonateStatusDate();
        });
    }

    function setProvince() {
        // Set Default จังหวัด
        if (!provinceid)
            provinceid = 0;

        var province = $('#provinceid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/provinces.php',
        }).then(function (data) {

            var index = getIndex(data.data, 'provinceid', provinceid);
            var option;
            if (data.data.length > 0 && provinceid && index) {

                option = new Option(data.data[index].provinceth, data.data[index].provinceid, true, true);

            } else {
                option = new Option('', 0, true, true);
            }

            province.append(option).trigger('change');
            province.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });

        });
    }

    function setDistrict() {
        // Set Default อำเภอ

        if (!districtid)
            districtid = 0;

        var district = $('#districtid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/districts.php?provinceid=' + provinceid,
        }).then(function (data) {
            var index = getIndex(data.data, 'districtid', districtid);
            var option;
            if (data.data.length > 0 && districtid && index) {
                option = new Option(data.data[index].districtth, data.data[index].districtid, true, true);
            } else {
                option = new Option('', 0, true, true);
            }
            district.append(option).trigger('change');
            district.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });
    }

    function setSubDistrict() {
        // Set Default ตำบล

        if (!subdistrictid)
            subdistrictid = 0;

        var subdistrict = $('#subdistrictid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/subdistricts.php?districtid=' + districtid,
        }).then(function (data) {
            var index = getIndex(data.data, 'subdistrictid', subdistrictid);
            var option;
            if (data.data.length > 0 && subdistrictid) {
                option = new Option(data.data[index].subdistrictth, data.data[index].subdistrictid, true, true);
            } else {
                option = new Option('', 0, true, true);
            }

            subdistrict.append(option).trigger('change');

            subdistrict.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });

        });
    }


    $('#myform').submit(function () {

        // spinnershow();



        var donoridcard = document.getElementById("donoridcard").value;
        var bag_number = document.getElementById("bag_number").value;


        console.log("==========");
        if (!checkID(donoridcard) && document.getElementById("isidcardpassport1").checked && $("#notdonoridcard").val() == "") {

            swal({
                title: 'ขออภัยค่ะ!',
                text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            },
                function () {
                    document.getElementById("donoridcard").focus();
                });
            spinnerhide();

        } else {
            var arr = [];
            for (i = 0; i < hpcount; i++) {
                if ($("#donorhpvalue" + i).val()) {
                    arr.push({
                        donorhpdate: $("#donorhpdate" + i).val(),
                        donorhpvalue: $("#donorhpvalue" + i).val()
                    })
                }
            }
            $("#hparr").val(JSON.stringify(arr));

            if (bag_number.length != 14 && document.getElementById("donation_status1").checked && $("#donateid").val() != '') {
                spinnerhide();
                swal({
                    title: 'ขออภัยค่ะ!',
                    text: 'หมายเลขถุงไม่ถูกต้อง',
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: true
                },
                    function () {
                        document.getElementById("bag_number").focus();
                    });
                return false;
            }

        }

        var dataForm = getFormData2($("#myform"));

        spinnershow();
        $.ajax({
            type: 'POST',
            url: 'blood-donor-record-save.php',
            data: dataForm,
            dataType: "json",
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {

                console.log(data);
                if (data.status == true) {
                    window.location.href = data.url;
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
        return false;

        // if (document.getElementById("isidcardpassport1").checked && $("#notdonoridcard").val() == "")
        //     return checkID(donoridcard);

    });

    function getFormData2($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }

    $('#remarkaccident').keypress(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            this.value = this.value.substring(0, this.selectionStart) + "" + "\n" + this.value.substring(this.selectionEnd, this.value.length);
        }
    });

    var IntervalState = true;
    var donateid = $('#donateid').val();
    if (donateid == "") {
        setInterval(function () {
            if (IntervalState)
                loadCardReader();
        }, 1000);

    }

    function loadCardReader() {


        $.ajax({
            url: cardreader_config,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                // console.log(data.data.address2.amphur)
                var obj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
                var objRaw = JSON.stringify(data);
                // var objj = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
                console.log("=====success=====" + obj.success);
                if (obj.success) {
                    IntervalState = false;
                    // console.log(obj)
                    if (!smartCardStatus) {

                        console.log("********");
                        document.getElementById("address").required = true;
                        document.getElementById("addr").hidden = false;

                        $('#add_curr').prop('hidden', true);
                        $('#curr_zip').prop('hidden', true);
                        $('#curr_dis').prop('hidden', true);
                        $('#curr_county').prop('hidden', true);
                        // $("#address_street_current").prop('required',true);
                        $("#address_current").prop('required', false);
                        $("#address2_current").prop('required', false);
                        $("#address2_current").prop('zipcode_current', false);

                        $.ajax({
                            url: 'blood-donor-record-log-save.php',
                            data: { donoridcard: obj.data.citizenid, donatelogtext: objRaw },
                            type: 'POST',
                            dataType: 'json',
                            success: function (obj) {


                            }
                        });


                        var citiid = obj.data.citizenid
                        $.ajax({
                            url: 'data/masterdata/checkaddress.php',
                            data: { data: citiid },
                            type: 'POST',
                            dataType: 'json',
                            success: function (obj) {
                                // console.log(obj)
                                // console.log(obj.olddata[0].districtid)
                                if (data.data.address2.amphur.substr(0, 3) == 'เขต') {
                                    dist = data.data.address2.amphur.slice(3)
                                    newdisttitle = 'เขต';
                                    newsubdist = 'แขวง';
                                } else {
                                    // อำเภอ
                                    dist = data.data.address2.amphur.slice(5)
                                    newdisttitle = 'อำเภอ';
                                    newsubdist = 'ตำบล';

                                }

                                var olddatalengthstatus = (obj.olddata.length > 0);

                                oldstr = (olddatalengthstatus) ? (obj.olddata[0].address + '' + obj.olddata[0].address_alley + "แขวง" + obj.olddata[0].subdistrictth + obj.olddata[0].districtth + obj.olddata[0].provinceth) : ""
                                oldstrtrim = oldstr.replace(/\s+/g, '');

                                alley = data.data.address2.road
                                alleysl = alley.slice(3);
                                subslice = data.data.address2.tambol
                                slic = subslice.slice(4)
                                pro = data.data.address2.province.slice(7)

                                // console.log(data.data.address2.amphur.substr(0,3))


                                // console.log(data.data.address2.province)
                                // console.log(alleysl)
                                // console.log(slic)

                                // str = data.data.address
                                str = data.data.address2.houseno + alleysl + subslice + data.data.address2.amphur + data.data.address2.province

                                new_str = str.replace(/\s+/g, '');
                                oldstrtrim = oldstrtrim.replace("แขวง", "");
                                oldstrtrim = oldstrtrim.replace("เขต", "");
                                oldstrtrim = oldstrtrim.replace("อำเภอ", "");
                                oldstrtrim = oldstrtrim.replace("ตำบล", "");
                                oldstrtrim = oldstrtrim.replace("จังหวัด", "");
                                new_str = new_str.replace(newdisttitle, "");
                                new_str = new_str.replace(newsubdist, "");
                                new_str = new_str.replace("จังหวัด", "");
                                console.log('old')
                                console.log(oldstrtrim)
                                console.log('new')
                                console.log(new_str)
                                if (olddatalengthstatus)
                                    if (new_str != oldstrtrim) {
                                        swal({
                                            title: "ต้องการแก้ไขข้อมูลที่อยู่หรือไม่<br>",
                                            text: "ข้อมูลที่อยู่เก่า: " + ((olddatalengthstatus) ? (obj.olddata[0].address + obj.olddata[0].address_alley + "แขวง" + obj.olddata[0].subdistrictth + obj.olddata[0].districtth + obj.olddata[0].provinceth + "<hr>ข้อมูลที่อยู่ใหม่: " + new_str + "") : ""),
                                            type: "warning",
                                            showCancelButton: true,
                                            html: true,
                                            confirmButtonClass: "btn-success",
                                            confirmButtonText: "ยืนยัน",
                                            cancelButtonText: "ยกเลิก",
                                            closeOnConfirm: false
                                        },
                                            function () {

                                                $.ajax({
                                                    url: 'data/masterdata/updateaddress.php',
                                                    data: {
                                                        // ตรงนี้คือส่งtextไปถูกป้ะเยส
                                                        id: data.data.citizenid,
                                                        address: data.data.address2.houseno,
                                                        alley: alleysl,
                                                        subdist: slic,
                                                        dist: dist,
                                                        pro: pro
                                                    },
                                                    dataType: 'json',
                                                    type: 'POST',
                                                    success: function (data) {
                                                        swal("แก้ไขสำเร็จ!", "ข้อมู่นลที่อยู่ถูกแก้ไขแล้ว.", "success");
                                                        console.log(data)
                                                    }

                                                });
                                            });

                                    }

                                setInputRequired();


                            },
                            error: function (d) {
                                IntervalState = false;
                                console.log("no data");
                            }
                        });

                        smartCardStatus = true;
                        myAlertTopPofile();
                        loadDonorData(obj);
                        var imagePofile = 'data:image/jpeg;base64,' + obj.data.photo;
                        document.getElementById('imagePofile').src = imagePofile;
                        document.getElementById('donorfile').value = imagePofile;
                        document.getElementById("donorbirthday").readOnly = true;
                        // $( "#donorbirthday" ).datepicker( "hidden" )
                        $("#donorbirthday").datepicker("destroy");
                        document.getElementById("donorage").readOnly = true;
                        if (!smartCardStatus) {
                            $('#add_curr').prop('hidden', false);
                            // $('#add_curr_st').prop('hidden',false);
                            $('#curr_zip').prop('hidden', false);
                            $('#curr_dis').prop('hidden', false);
                            $('#curr_county').prop('hidden', false);
                            // $("#address_street_current").prop('required',true);
                            $("#address_current").prop('required', true);

                        } else {
                            // $('#addr').prop('hidden',false);
                            $('#zip').prop('hidden', false);
                            $('#dis').prop('hidden', false);
                            $('#county').prop('hidden', false);
                            $("#address_current").prop('required', false);
                            // $("#address_street_current").prop('required',false);

                        }


                    }
                } else {
                    $('#add_curr').prop('hidden', false);
                    $('#curr_zip').prop('hidden', false);
                    $('#curr_dis').prop('hidden', false);
                    $('#curr_county').prop('hidden', false);
                    // $("#address_street_current").prop('required',true);
                    $("#address_current").prop('required', true);
                    $("#address2_current").prop('required', true);
                    $("#address2_current").prop('zipcode_current', true);
                }
            },
            error: function (d) {
                IntervalState = false;
                if (!smartCardStatus) {

                    $('#add_curr').prop('hidden', false);
                    $('#curr_zip').prop('hidden', false);
                    $('#curr_dis').prop('hidden', false);
                    $('#curr_county').prop('hidden', false);
                    // $("#address_street_current").prop('required',true);
                    $("#address_current").prop('required', true);

                } else {
                    // $('#addr').prop('hidden',false);
                    $('#zip').prop('hidden', false);
                    $('#dis').prop('hidden', false);
                    $('#county').prop('hidden', false);
                    $("#address_current").prop('required', false);
                    // $("#address_street_current").prop('required',false);

                }
                console.log("error");
            }
        });
    }

    function hexToBase64(str) {
        return btoa(String.fromCharCode.apply(null, str.replace(/\r|\n/g, "").replace(/([\da-fA-F]{2}) ?/g, "0x$1 ").replace(/ +$/, "").split(" ")));
    }

    function loadDonorData(objData) {
        $.ajax({
            url: 'data/masterdata/donor.php?donoridcard=' + objData.data.citizenid,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                if (data.status)
                    if (data.data.length > 0) {
                        var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));

                        if ($("#donoridcard").val() == "") {
                            setDonorData(obj);
                        }
                    } else {

                    }
                document.getElementById("isfirstblooddonation").checked = (data.data.length == 0);
                setCardReaderData(objData);
            },
            error: function (d) {
                console.log("error");
            }
        });
    }

    function loadAddressData(objData) {

        var subdistrict = objData.data.address2.tambol.replace("ตำบล", "");
        var district = objData.data.address2.amphur.replace("อำเภอ", "");
        var province = objData.data.address2.province.replace("จังหวัด", "");

        subdistrict = subdistrict.replace("แขวง", "");
        district = district.replace("เขต", "");

        spinnershow();
        $.ajax({
            url: 'data/masterdata/address.php?province=' + province + "&district=" + district + "&subdistrict=" + subdistrict,
            dataType: 'json',
            type: 'get',
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {

                if (data.status)
                    if (data.data.length > 0) {
                        var obj = JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""'));
                        setAddress2Data(obj);

                        var addressselect = $('#addressselect');
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

                    }

            },
            error: function (d) {
                console.log("error");
            }
        });
    }

    function setCardReaderData(obj) {
        document.getElementById("isidcardpassport1").checked = true;
        isIDcardPassport(1);
        $("#donoridcard").val(obj.data.citizenid);

        $("#fname").val(obj.data.firstname_th);
        $("#lname").val(obj.data.lastname_th);
        document.getElementById("genderid1").checked = (obj.data.gender == 1);
        document.getElementById("genderid2").checked = (obj.data.gender == 2);
        $("#donorbirthday").val(obj.data.dob);
        getAge({ value: obj.data.dob });
        $("#address").val(obj.data.address2.houseno);
        $("#address_moo").val(obj.data.address2.villageno.replace("หมู่ที่ ", ""));
        $("#address_alley").val(obj.data.address2.road.replace("ซอย", ""));
        $("#address_street").val(findRold(obj.data.address));
        loadAddressData(obj);

        $.ajax({
            url: 'blood-donor-record-prefix-check-and-save.php',
            data: { prefixname: obj.data.prefixname_th, genderid: obj.data.gender },
            type: 'POST',
            dataType: 'json',
            success: function (obj) {

                setDataModalSelectValue('prefixid', obj.data[0].prefixid, obj.data[0].prefixname);

            }
        });

    }


    function setPrefixData(prefixname) {
        if (prefixname == "นาย") {
            setDataModalSelectValue('prefixid', '1', prefixname);
        } else if (prefixname == "นาง") {
            setDataModalSelectValue('prefixid', '2', prefixname);
        } else if (prefixname == "น.ส.") {
            setDataModalSelectValue('prefixid', '3', prefixname);
        }
    }



    setDataModalSelectValue('activityid', activityid, activityname);
    setDataModalSelectValue('unitnameid', unitnameid, unitname);



});

function findRold(addressData = "") {
    var result = "";
    var obj = addressData.split(" ");


    if (obj.length > 0)
        $.each(obj, function (index, value) {
            if (value.search("ถนน") == 0) {
                result = value.trim().replace("ถนน", "");
            }
        });

    return result;

}


function copyAddress() {
    document.getElementById("address_current").value = document.getElementById("address").value;
    document.getElementById("address_moo_current").value = document.getElementById("address_moo").value;
    document.getElementById("address_alley_current").value = document.getElementById("address_alley").value;
    document.getElementById("address_street_current").value = document.getElementById("address_street").value;
    document.getElementById("zipcode_current").value = document.getElementById("zipcode").value;

    document.getElementById("provincecurrentid").value = document.getElementById("provinceid").value;
    document.getElementById("districtcurrentid").value = document.getElementById("districtid").value;
    document.getElementById("subdistrictcurrentid").value = document.getElementById("subdistrictid").value;

    countrycurrentid = document.getElementById("countryid").value;
    subdistrictcurrentid = document.getElementById("subdistrictid").value;

    setCountryCurrent();
    setAddress2Current();
}


function setCountryCurrent() {
    // Set Default Country
    if (!countrycurrentid)
        countrycurrentid = 'THA';

    var country = $('#countrycurrentid');
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/masterdata/country.php',
    }).then(function (data) {
        var index = getIndex(data.data, 'countryid', countrycurrentid);
        var option;
        if (data.data.length > 0 && countrycurrentid && (index || index == 0)) {

            option = new Option(data.data[index].countryth, data.data[index].countryid, true, true);
            country.append(option).trigger('change');

            country.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        }
    });
}

function setAddress2Current() {
    // Set Default Country
    var address2_current_select = $('#address2_current_select');
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/masterdata/address.php?subdistrictid=' + subdistrictcurrentid,
    }).then(function (data) {

        var index = getIndex(data.data, 'subdistrictid', subdistrictcurrentid);
        console.log(data);
        var option;
        if (data.data.length > 0 && subdistrictcurrentid && (index || index == 0)) {
            option = new Option(data.data[index].address, data.data[index].subdistrictid, true, true);
            $('#address2_current').val(data.data[index].address);


        } else {
            $('#address2_current_select').val(null).trigger('change');
            $('#address2_current').val('');
        }

        address2_current_select.append(option).trigger('change');
        address2_current_select.trigger({
            type: 'select2:select',
            params: {
                data: data
            }
        });

    });
}

function setDataModalSelectValue(elem = '', itemid, itemtext) {
    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function setDataModalSelectValue2(elem = '', itemid, itemtext) {
    var select = $('.' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}

function select_patient(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    // alert(item[0].patienthn);
    // alert(item[0].patientan);
    // alert(item[0].patientfullname);
    // alert(item[0].wardid);
    // alert(item[0].wardname);

    console.log(item);
    $("#an").val(item[0].patientan);
    $("#patientname").val(item[0].patientfullname);

    $("#hn").val(item[0].patienthn);

    setDataModalSelectValue('unitofficeid', item[0].wardid, item[0].wardname);

    $("#patient_modal").modal('hide');

    if (document.getElementById('donation_get_type_id3').checked)
        setBloodDonorRecord(item[0]);

}

function open_patient_modal(){
    $("#patient_modal").modal('show');
}