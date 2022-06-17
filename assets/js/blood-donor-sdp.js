$(document).ready(function() {

    setCheckMarkAppointment();
    if ($("#sdpresultvolume").val() != "")
        $("#volumesplit").css("display", "block");

    $('.machineid').select2({
        width: '100%',
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: 'data/masterdata/machine.php',
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
                            id: item.machineid,
                            text: item.machinename
                        }
                    })
                };
            },
        }
    });

    $(".problemmachineid").select2({
        tags: true,
        width: '100%',
    });

    $(".problemdonorid").select2({
        tags: true,
        width: '100%',
    });

    $(".problemproductid").select2({
        tags: true,
        width: '100%',
    });

    $(".problemhumanid").select2({
        tags: true,
        width: '100%',
    });



    // $('.problemproductid').select2({
    //     width: '100%',
    //     allowClear: true,
    //     theme: "bootstrap",
    //     placeholder: "Search Problem Product",
    //     ajax: {
    //         cache: true,
    //         url: 'data/masterdata/problemproduct.php',
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         data: function (keyword) {
    //             return {
    //                 keyword: keyword.term
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data.data, function (item) {
    //                     return {
    //                         id: item.problemproductid,
    //                         text: item.problemproductname
    //                     }
    //                 })
    //             };
    //         },
    //     }
    // }).on("select2:selecting", function (e) {
    //     setOtherProblemProductBox(e.params.args.data.id);
    // }).on("select2:clearing", function (e) {
    //     setOtherProblemProductBox("");
    // });

    // $('.problemhumanid').select2({
    //     width: '100%',
    //     allowClear: true,
    //     theme: "bootstrap",
    //     placeholder: "Search Problem Human",
    //     ajax: {
    //         cache: true,
    //         url: 'data/masterdata/problemhuman.php',
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         data: function (keyword) {
    //             return {
    //                 keyword: keyword.term
    //             };
    //         },
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data.data, function (item) {
    //                     return {
    //                         id: item.problemhumanid,
    //                         text: item.problemhumanname
    //                     }
    //                 })
    //             };
    //         },
    //     }
    // }).on("select2:selecting", function (e) {
    //     setOtherProblemHumanBox(e.params.args.data.id);
    // }).on("select2:clearing", function (e) {
    //     setOtherProblemHumanBox("");
    // });


    function setMachine() {
        // Set Default Donor Occupation


        var machine = $('#machineid');

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/machine.php',
        }).then(function(data) {
            var index = getIndex(data.data, 'machineid', machineid);
            var option;
            if (data.data.length > 0 && machineid && (index || index == 0)) {



                option = new Option(data.data[index].machinename, data.data[index].machineid, true, true);
                machine.append(option).trigger('change');

                machine.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    function setProblemDonor() {
        // Set Default Donor Occupation
        setOtherProblemDonorBox(problemdonorid);

        var select = $('#problemdonorid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/problemdonor.php',
        }).then(function(data) {
            var index = getIndex(data.data, 'problemdonorid', problemdonorid);
            var option;
            if (data.data.length > 0 && problemdonorid && (index || index == 0)) {

                option = new Option(data.data[index].problemdonorname, data.data[index].problemdonorid, true, true);
                select.append(option).trigger('change');

                select.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }
    /*
    function setProblemMachine() {
        // Set Default Donor Occupation

        setOtherProblemMachineBox(problemmachineid);
        
        var select = $('#problemmachineid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/problemmachine.php',
        }).then(function (data) {
            var index = getIndex(data.data, 'problemmachineid', problemmachineid);
            var option;
            if (data.data.length > 0 && problemmachineid && (index || index == 0)) {

                option = new Option(data.data[index].problemmachinename, data.data[index].problemmachineid, true, true);
                select.append(option).trigger('change');

                select.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }
    */

    function setProblemProduct() {
        // Set Default Donor Occupation
        setOtherProblemProductBox(problemproductid);
        var select = $('#problemproductid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/problemproduct.php',
        }).then(function(data) {
            var index = getIndex(data.data, 'problemproductid', problemproductid);
            var option;
            if (data.data.length > 0 && problemproductid && (index || index == 0)) {

                option = new Option(data.data[index].problemproductname, data.data[index].problemproductid, true, true);
                select.append(option).trigger('change');

                select.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    function setProblemHuman() {
        setOtherProblemHumanBox(problemhumanid);
        var select = $('#problemhumanid');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/masterdata/problemhuman.php',
        }).then(function(data) {
            var index = getIndex(data.data, 'problemhumanid', problemhumanid);
            var option;
            if (data.data.length > 0 && problemhumanid && (index || index == 0)) {

                option = new Option(data.data[index].problemhumanname, data.data[index].problemhumanid, true, true);
                select.append(option).trigger('change');

                select.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            }
        });
    }

    setMachine();
    // setProblemMachine();
    // setProblemDonor();
    // setProblemProduct();
    // setProblemHuman();
    setSDP();
    loadSdpHP();

});

function setOtherProblemMachineBox(id = "") {
    if (id == "99") {
        document.getElementById("otherproblemmachine_div").style.display = "block";
    } else {
        document.getElementById("otherproblemmachine_div").style.display = "none";
    }
}

function setOtherProblemDonorBox(id = "") {
    if (id == "99") {
        document.getElementById("otherproblemdonor_div").style.display = "block";
    } else {
        document.getElementById("otherproblemdonor_div").style.display = "none";
    }
}

function setOtherProblemProductBox(id = "") {
    if (id == "99") {
        document.getElementById("otherproblemproduct_div").style.display = "block";
    } else {
        document.getElementById("otherproblemproduct_div").style.display = "none";
    }
}

function setOtherProblemHumanBox(id = "") {
    if (id == "99") {
        document.getElementById("otherproblemhuman_div").style.display = "block";
    } else {
        document.getElementById("otherproblemhuman_div").style.display = "none";
    }
}

function setSDP() {

    preHbColor();
    preHctColor();
    postHctColor();
    preRbcColor();
    postRbcColor();
    preWbcColor();
    postWbcColor();
    prePltColor();
    postPltColor();
    preMcvColor();

    preEosinophilColor();
    beforePreEosinophilColor();
    postEosinophilColor();

    beforePreHbColor();
    beforePreHctColor();
    beforePreRbcColor();
    beforePreWbcColor();
    beforePreMcvColor();

    beforePreHbColor0();
    beforePreHctColor0();
    beforePreRbcColor0();
    beforePreWbcColor0();
    beforePrePltColor0();
    beforePreMcvColor0();
    beforePreEosinophilColor0();
}

function beforePreHbColor0() {

    if (postGender() == 1) {
        setColor("sdpprehb_before_0", ($("#sdpprehb_before_0").val() >= 13.0 && $("#sdpprehb_before_0").val() <= 17.5));
    } else if (postGender() == 2) {
        setColor("sdpprehb_before_0", ($("#sdpprehb_before_0").val() >= 12.5 && $("#sdpprehb_before_0").val() <= 16.5));
    } else {
        setColor("sdpprehb_before_0", false);
    }
}

function beforePreHbColor() {
    if (postGender() == 1) {
        setColor("sdpprehb_before", ($("#sdpprehb_before").val() >= 13.0 && $("#sdpprehb_before").val() <= 17.5));
    } else if (postGender() == 2) {
        setColor("sdpprehb_before", ($("#sdpprehb_before").val() >= 12.5 && $("#sdpprehb_before").val() <= 16.5));
    } else {
        setColor("sdpprehb_before", false);
    }
}

function preHbColor() {

    if (postGender() == 1) {
        setColor("sdpprehb", ($("#sdpprehb").val() >= 13.0 && $("#sdpprehb").val() <= 17.5));
    } else if (postGender() == 2) {
        console.log(postGender());
        console.log($("#sdpprehb").val());
        setColor("sdpprehb", ($("#sdpprehb").val() >= 12.5 && $("#sdpprehb").val() <= 16.5));
    } else {
        setColor("sdpprehb", false);
    }
}

function postHbColor() {

    if (postGender() == 1) {
        setColor("sdpposthb", ($("#sdpposthb").val() >= 13.0 && $("#sdpposthb").val() <= 17.5));
    } else if (postGender() == 2) {
        setColor("sdpposthb", ($("#sdpposthb").val() >= 12.5 && $("#sdpposthb").val() <= 16.5));
    } else {
        setColor("sdpposthb", false);
    }
}

function beforePreHctColor0() {
    if (postGender() == 1) {
        setColor("sdpprehct_before_0", ($("#sdpprehct_before_0").val() >= 41.5 && $("#sdpprehct_before_0").val() <= 50.4));
    } else if (postGender() == 2) {
        setColor("sdpprehct_before_0", ($("#sdpprehct_before_0").val() >= 36 && $("#sdpprehct_before_0").val() <= 45));
    } else {
        setColor("sdpprehct_before_0", false);
    }
}

function beforePreHctColor() {
    if (postGender() == 1) {
        setColor("sdpprehct_before", ($("#sdpprehct_before").val() >= 41.5 && $("#sdpprehct_before").val() <= 50.4));
    } else if (postGender() == 2) {
        setColor("sdpprehct_before", ($("#sdpprehct_before").val() >= 36 && $("#sdpprehct_before").val() <= 45));
    } else {
        setColor("sdpprehct_before", false);
    }
}

function preHctColor() {
    if (postGender() == 1) {
        setColor("sdpprehct", ($("#sdpprehct").val() >= 41.5 && $("#sdpprehct").val() <= 50.4));
    } else if (postGender() == 2) {
        setColor("sdpprehct", ($("#sdpprehct").val() >= 36 && $("#sdpprehct").val() <= 45));
    } else {
        setColor("sdpprehct", false);
    }
}

function postHctColor() {
    if (postGender() == 1) {
        setColor("sdpposthct", ($("#sdpposthct").val() >= 41.5 && $("#sdpposthct").val() <= 50.4));
    } else if (postGender() == 2) {
        setColor("sdpposthct", ($("#sdpposthct").val() >= 36 && $("#sdpposthct").val() <= 45));
    } else {
        setColor("sdpposthct", false);
    }
}

function beforePreRbcColor0() {
    if (postGender() == 1) {
        setColor("sdpprerbc_before_0", ($("#sdpprerbc_before_0").val() >= 4.5 && $("#sdpprerbc_before_0").val() <= 5.9));
    } else if (postGender() == 2) {
        setColor("sdpprerbc_before_0", ($("#sdpprerbc_before_0").val() >= 4.5 && $("#sdpprerbc_before_0").val() <= 5.1));
    } else {
        setColor("sdpprerbc_before_0", false);
    }
}

function beforePreRbcColor() {
    if (postGender() == 1) {
        setColor("sdpprerbc_before", ($("#sdpprerbc_before").val() >= 4.5 && $("#sdpprerbc_before").val() <= 5.9));
    } else if (postGender() == 2) {
        setColor("sdpprerbc_before", ($("#sdpprerbc_before").val() >= 4.5 && $("#sdpprerbc_before").val() <= 5.1));
    } else {
        setColor("sdpprerbc_before", false);
    }
}

function preRbcColor() {
    if (postGender() == 1) {
        setColor("sdpprerbc", ($("#sdpprerbc").val() >= 4.5 && $("#sdpprerbc").val() <= 5.9));
    } else if (postGender() == 2) {
        setColor("sdpprerbc", ($("#sdpprerbc").val() >= 4.5 && $("#sdpprerbc").val() <= 5.1));
    } else {
        setColor("sdpprerbc", false);
    }
}

function postRbcColor() {
    if (postGender() == 1) {
        setColor("sdppostrbc", ($("#sdppostrbc").val() >= 4.5 && $("#sdppostrbc").val() <= 5.9));
    } else if (postGender() == 2) {
        setColor("sdppostrbc", ($("#sdppostrbc").val() >= 4.5 && $("#sdppostrbc").val() <= 5.1));
    } else {
        setColor("sdppostrbc", false);
    }
}

function beforePreWbcColor0() {
    if (postGender() == 1) {
        setColor("sdpprewbc_before_0", ($("#sdpprewbc_before_0").val() >= 4.4 && $("#sdpprewbc_before_0").val() <= 11.3));
    } else if (postGender() == 2) {
        setColor("sdpprewbc_before_0", ($("#sdpprewbc_before_0").val() >= 4.4 && $("#sdpprewbc_before_0").val() <= 11.3));
    } else {
        setColor("sdpprewbc_before_0", false);
    }
}

function beforePreWbcColor() {
    if (postGender() == 1) {
        setColor("sdpprewbc_before", ($("#sdpprewbc_before").val() >= 4.4 && $("#sdpprewbc_before").val() <= 11.3));
    } else if (postGender() == 2) {
        setColor("sdpprewbc_before", ($("#sdpprewbc_before").val() >= 4.4 && $("#sdpprewbc_before").val() <= 11.3));
    } else {
        setColor("sdpprewbc_before", false);
    }
}

function preWbcColor() {
    if (postGender() == 1) {
        setColor("sdpprewbc", ($("#sdpprewbc").val() >= 4.4 && $("#sdpprewbc").val() <= 11.3));
    } else if (postGender() == 2) {
        setColor("sdpprewbc", ($("#sdpprewbc").val() >= 4.4 && $("#sdpprewbc").val() <= 11.3));
    } else {
        setColor("sdpprewbc", false);
    }
}

function postWbcColor() {
    if (postGender() == 1) {
        setColor("sdppostwbc", ($("#sdppostwbc").val() >= 4.4 && $("#sdppostwbc").val() <= 11.3));
    } else if (postGender() == 2) {
        setColor("sdppostwbc", ($("#sdppostwbc").val() >= 4.4 && $("#sdppostwbc").val() <= 11.3));
    } else {
        setColor("sdppostwbc", false);
    }
}

function beforePrePltColor0() {
    if (postGender() == 1) {
        setColor("sdppreplt_before_0", ($("#sdppreplt_before_0").val() >= 200 && $("#sdppreplt_before_0").val() <= 400));
    } else if (postGender() == 2) {
        setColor("sdppreplt_before_0", ($("#sdppreplt_before_0").val() >= 200 && $("#sdppreplt_before_0").val() <= 400));
    } else {
        setColor("sdppreplt_before_0", false);
    }
}

function beforePrePltColor() {
    if (postGender() == 1) {
        setColor("sdppreplt_before", ($("#sdppreplt_before").val() >= 200 && $("#sdppreplt_before").val() <= 400));
    } else if (postGender() == 2) {
        setColor("sdppreplt_before", ($("#sdppreplt_before").val() >= 200 && $("#sdppreplt_before").val() <= 400));
    } else {
        setColor("sdppreplt_before", false);
    }
}

function prePltColor() {
    if (postGender() == 1) {
        setColor("sdppreplt", ($("#sdppreplt").val() >= 200 && $("#sdppreplt").val() <= 400));
    } else if (postGender() == 2) {
        setColor("sdppreplt", ($("#sdppreplt").val() >= 200 && $("#sdppreplt").val() <= 400));
    } else {
        setColor("sdppreplt", false);
    }
}

function postPltColor() {
    if (postGender() == 1) {
        setColor("sdppostplt", ($("#sdppostplt").val() >= 150 && $("#sdppostplt").val() <= 450));
    } else if (postGender() == 2) {
        setColor("sdppostplt", ($("#sdppostplt").val() >= 150 && $("#sdppostplt").val() <= 450));
    } else {
        setColor("sdppostplt", false);
    }
}

function beforePreMcvColor0() {
    if (postGender() == 1) {
        setColor("sdppremcv_before_0", ($("#sdppremcv_before_0").val() >= 80 && $("#sdppremcv_before_0").val() <= 96));
    } else if (postGender() == 2) {
        setColor("sdppremcv_before_0", ($("#sdppremcv_before_0").val() >= 80 && $("#sdppremcv_before_0").val() <= 96));
    } else {
        setColor("sdppremcv_before_0", false);
    }
}

function beforePreMcvColor() {
    if (postGender() == 1) {
        setColor("sdppremcv_before", ($("#sdppremcv_before").val() >= 80 && $("#sdppremcv_before").val() <= 96));
    } else if (postGender() == 2) {
        setColor("sdppremcv_before", ($("#sdppremcv_before").val() >= 80 && $("#sdppremcv_before").val() <= 96));
    } else {
        setColor("sdppremcv_before", false);
    }
}

function preMcvColor() {
    if (postGender() == 1) {
        setColor("sdppremcv", ($("#sdppremcv").val() >= 80 && $("#sdppremcv").val() <= 96));
    } else if (postGender() == 2) {
        setColor("sdppremcv", ($("#sdppremcv").val() >= 80 && $("#sdppremcv").val() <= 96));
    } else {
        setColor("sdppremcv", false);
    }
}

$('#sdppremcv').change(function() {
    f = parseFloat($(this).val()).toFixed(2)
    $(this).val(f);
});

// $('#sdppreeosinophil').change(function() {
//     f = parseFloat($(this).val()).toFixed(2)
//     $(this).val(f);
// });

$('#sdppostmcv').change(function() {
    f = parseFloat($(this).val()).toFixed(2)
    $(this).val(f);
});

// $('#sdpposteosinophil').change(function() {
//     f = parseFloat($(this).val()).toFixed(2)
//     $(this).val(f);
// });

$('#prebp1').keyup(function() {
    if ($('#donation_type_id2').prop('checked') == true) {
        val = $(this).val();
        $('#sdppretsys').val(val);
    }
});

$('#prebp2').keyup(function() {
    if ($('#donation_type_id2').prop('checked') == true) {
        val = $(this).val();
        $('#sdppretdia').val(val);
    }
});


$('#sdpprodpltyield').change(function() {
    f = parseFloat($(this).val()).toFixed(1)
    $(this).val(f);
});

$('#sdpresultmachineyield').change(function() {
    f = parseFloat($(this).val()).toFixed(1)
    $(this).val(f);
});



function postMcvColor() {
    if (postGender() == 1) {
        setColor("sdppostmcv", ($("#sdppostmcv").val() >= 80 && $("#sdppostmcv").val() <= 96));
    } else if (postGender() == 2) {
        setColor("sdppostmcv", ($("#sdppostmcv").val() >= 80 && $("#sdppostmcv").val() <= 96));
    } else {
        setColor("sdppostmcv", false);
    }
}

function beforePreEosinophilColor0() {
    if (postGender() == 1) {
        setColor("sdppreeosinophil_before_0", ($("#sdppreeosinophil_before_0").val() >= 0 && $("#sdppreeosinophil_before_0").val() < 5));
    } else if (postGender() == 2) {
        setColor("sdppreeosinophil_before_0", ($("#sdppreeosinophil_before_0").val() >= 0 && $("#sdppreeosinophil_before_0").val() < 5));
    } else {
        setColor("sdppreeosinophil_before_0", false);
    }
}

function beforePreEosinophilColor() {
    if (postGender() == 1) {
        setColor("sdppreeosinophil_before", ($("#sdppreeosinophil_before").val() >= 0 && $("#sdppreeosinophil_before").val() < 5));
    } else if (postGender() == 2) {
        setColor("sdppreeosinophil_before", ($("#sdppreeosinophil_before").val() >= 0 && $("#sdppreeosinophil_before").val() < 5));
    } else {
        setColor("sdppreeosinophil_before", false);
    }
}

function preEosinophilColor() {
    if (postGender() == 1) {
        setColor("sdppreeosinophil", ($("#sdppreeosinophil").val() >= 0 && $("#sdppreeosinophil").val() < 5));
    } else if (postGender() == 2) {
        setColor("sdppreeosinophil", ($("#sdppreeosinophil").val() >= 0 && $("#sdppreeosinophil").val() < 5));
    } else {
        setColor("sdppreeosinophil", false);
    }
}



function postEosinophilColor() {
    if (postGender() == 1) {
        setColor("sdpposteosinophil", ($("#sdpposteosinophil").val() >= 0 && $("#sdpposteosinophil").val() < 5));
    } else if (postGender() == 2) {
        setColor("sdpposteosinophil", ($("#sdpposteosinophil").val() >= 0 && $("#sdpposteosinophil").val() < 5));
    } else {
        setColor("sdpposteosinophil", false);
    }
}

function setColor(e, status) {

    if (status) {
        document.getElementById(e).style.color = "#000";
    } else {
        document.getElementById(e).style.color = "#ff0000";
    }

}


function postGender() {
    var gender = 0;
    if (document.getElementById("genderid1").checked) {
        gender = 1;
    } else if (document.getElementById("genderid2").checked) {
        gender = 2;
    }

    return gender;
}



function sdpHP(date = '', value = '') {


    var table = document.getElementById("hpTable");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);


    cell1.innerHTML = '<input type="text"  id="donorhpdate' + hpcount + '" ' +
        'class="form-control date2" name="donorhpdate' + hpcount + '"  onchange="getDateHp(this)" ' +
        'placeholder="" value="' + date + '">';
    cell2.innerHTML = '<input type="number"  step="any" id="donorhpvalue' + hpcount + '" ' +
        'class="sdp-number-center form-control"  name="donorhpvalue' + hpcount + '"  ' +
        'placeholder="" value="' + value + '" requried>';
    cell3.innerHTML = '<button type="button" onclick="deleteRowHP(this)" class="btn btn-danger btn-sm"> ' +
        '<i class="fa fa-trash"></i>' +
        '</button>';


    dateBE('.date2');
    $("#hpcount").val(hpcount);

    if (!$("#donorhpdate" + hpcount).val() || $("#donorhpdate" + hpcount).val() == 'undefined')
        $("#donorhpdate" + hpcount).val(getDMY543());

    if (!$("#donorhpvalue" + hpcount).val() || $("#donorhpvalue" + hpcount).val() == 'undefined')
        $("#donorhpvalue" + hpcount).val();

    hpcount++;

}

function loadSdpHP() {

    var donorid = $("#donorid").val();
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'data/bloodbonor/bloofdonorhp.php?donorid=' + donorid,
    }).then(function(data) {
        data.data.forEach(function(v) {
            sdpHP(getDMY(v.donorhpdate), v.donorhpvalue);
        });
    });
}


function deleteRowHP(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function copyBeforePreTest() {
    $("#sdpprehb").val($("#sdpprehb_before").val());
    $("#sdpprehct").val($("#sdpprehct_before").val());
    $("#sdpprerbc").val($("#sdpprerbc_before").val());
    $("#sdpprewbc").val($("#sdpprewbc_before").val());
    $("#sdppreplt").val($("#sdppreplt_before").val());
    $("#sdppremcv").val($("#sdppremcv_before").val());

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
    $("#sdpprodyltyield1").val(v.toFixed(2));
    setSdpprodyltyield1(v);
    calculateSdpprodunit1(v);
}

function calculateSdpprodunit1(v) {
    var u = v / 0.55;
    $("#sdpprodunit1").val(u.toFixed(2));
}
// Product 1 End

// Product 2 Start
function setSdpprodvolume2(v) {
    if (v >= 250 && v <= 350) {
        setColor("sdpprodvolume2", true);
    } else {
        setColor("sdpprodvolume2", false);
    }

    var pc = $("#sdpprodcount2").val();
    calculateSdpprodyltyield2(v, pc);

}

function setSdpprodcount2(v) {
    var pv = $("#sdpprodvolume2").val();
    calculateSdpprodyltyield2(pv, v.value);
}

function setSdpprodyltyield2(v) {
    if (v >= 3) {
        setColor("sdpprodyltyield2", true);
    } else {
        setColor("sdpprodyltyield2", false);
    }

}

function calculateSdpprodyltyield2(pv, pc) {
    var v = pv * pc / (100000)
    $("#sdpprodyltyield2").val(v.toFixed(2));
    setSdpprodyltyield2(v);
    calculateSdpprodunit2(v);
}

function calculateSdpprodunit2(v) {
    var u = v / 0.55;
    $("#sdpprodunit2").val(u.toFixed(2));
}
// Product 2 End

// Product 3 Start
function setSdpprodvolume3(v) {
    if (v >= 250 && v <= 350) {
        setColor("sdpprodvolume3", true);
    } else {
        setColor("sdpprodvolume3", false);
    }

    var pc = $("#sdpprodcount3").val();
    calculateSdpprodyltyield3(v, pc);

}

function setSdpprodcount3(v) {
    var pv = $("#sdpprodvolume3").val();
    calculateSdpprodyltyield3(pv, v.value);
}

function setSdpprodyltyield3(v) {
    if (v >= 3) {
        setColor("sdpprodyltyield3", true);
    } else {
        setColor("sdpprodyltyield3", false);
    }

}

function calculateSdpprodyltyield3(pv, pc) {
    var v = pv * pc / (100000)
    $("#sdpprodyltyield3").val(v.toFixed(1));
    setSdpprodyltyield3(v);
    calculateSdpprodunit3(v);
}

function calculateSdpprodunit3(v) {
    var u = v / 0.55;
    $("#sdpprodunit3").val(u.toFixed(2));
}
// Product 3 End

function calculateDoubleDose(v) {
    var result = parseFloat($("#sdpprodvolume1").val()) / v;
    setSdpprodvolume1($("#sdpprodvolume1").val());
    $("#sdpprodvolume2").val(result.toFixed(0));
    $("#sdpprodcount2").val($("#sdpprodcount1").val());
    setSdpprodvolume2($("#sdpprodvolume2").val());


}

function calculateTripleDose(v) {
    var result = v / 3;
    setSdpprodvolume1(result.toFixed(2));
    setSdpprodvolume2(result.toFixed(2));
    setSdpprodvolume3(result.toFixed(2));
    $("#sdpprodvolume1").val(result.toFixed(2));
    $("#sdpprodvolume2").val(result.toFixed(2));
    $("#sdpprodvolume3").val(result.toFixed(2));
}

function getDateHp(self) {

    var dateFrom = new Date(dmyToymd(self.value));
    var today = new Date();
    var diffDate = parseInt((dateFrom - today) / (1000 * 60 * 60 * 24), 10);

    if (diffDate >= 0 && diffDate <= 7) {

    } else {
        swal({
                title: 'ขออภัยค่ะ!',
                text: 'ระบุวันที่ไม่ถูกต้อง',
                type: "warning",
                showCancelButton: false,
                confirmButtonText: 'OK',
                confirmButtonClass: "btn-danger",
                closeOnConfirm: true
            },
            function() {
                self.value = "";
            });
    }


}

function SetPtlColor_0() {
    var val = document.getElementById("sdppreplt").value
    if (val > 199 && val < 401) {
        document.getElementById("sdppreplt").style.color = "#000000"
    }
}

function SetPtlColor_00() {
    var val = document.getElementById("sdppreplt_before").value
    if (val > 199 && val < 401) {
        document.getElementById("sdppreplt_before").style.color = "#000000"
    }
}
////////////////////////////// ช่องที่ disable
//Hb
$("#sdpprehb_before").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprehb_before").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprehb_before").value = decimal;
    }
});

//Hct
$("#sdpprehct_before").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprehct_before").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprehct_before").value = decimal;
    }
});

//RBC
$("#sdpprerbc_before").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprerbc_before").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdpprerbc_before").value = decimal;
    }
});

//WBC
$("#sdpprewbc_before").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprewbc_before").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdpprewbc_before").value = decimal;
    }
});

//MCV
$("#sdppremcv_before").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppremcv_before").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdppremcv_before").value = decimal;
    }
});

//Eosinophil
$("#sdppreeosinophil_before").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppreeosinophil_before").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdppreeosinophil_before").value = decimal;
    }
});

////////////////////////////// pre-test
//Hb
$("#sdpprehb").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprehb").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprehb").value = decimal;
    }
});

//Hct
$("#sdpprehct").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprehct").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprehct").value = decimal;
    }
});

//RBC
$("#sdpprerbc").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprerbc").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdpprerbc").value = decimal;
    }
});

//WBC
$("#sdpprewbc").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprewbc").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdpprewbc").value = decimal;
    }
});

//MCV
$("#sdppremcv").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppremcv").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdppremcv").value = decimal;
    }
});

//Eosinophil
// $("#sdppreeosinophil").keydown(function(event) {
//     var keycode = (event.keyCode ? event.keyCode : event.which);
//     if (keycode == '13') {
//         var integer = document.getElementById("sdppreeosinophil").value;
//         var float = parseFloat(integer) || 0;
//         var decimal = float.toFixed(1);
//         document.getElementById("sdppreeosinophil").value = decimal;
//     }
// });
////////////////////////////// post-test
//Hb
$("#sdpposthb").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpposthb").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpposthb").value = decimal;
    }
});

//Hct
$("#sdpposthct").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpposthct").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpposthct").value = decimal;
    }
});

//RBC
$("#sdppostrbc").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppostrbc").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdppostrbc").value = decimal;
    }
});

//WBC
$("#sdppostwbc").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppostwbc").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdppostwbc").value = decimal;
    }
});

//MCV
$("#sdppostmcv").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppostmcv").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdppostmcv").value = decimal;
    }
});

//Eosinophil
// $("#sdpposteosinophil").keydown(function(event) {
//     var keycode = (event.keyCode ? event.keyCode : event.which);
//     if (keycode == '13') {
//         var integer = document.getElementById("sdpposteosinophil").value;
//         var float = parseFloat(integer) || 0;
//         var decimal = float.toFixed(1);
//         document.getElementById("sdpposteosinophil").value = decimal;
//     }
// });

$("#sdpprodhct").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprodhct").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprodhct").value = decimal;
    }
});



//Hb
$("#sdpprehb_before_0").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprehb_before_0").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprehb_before_0").value = decimal;
    }
});

//Hct
$("#sdpprehct_before_0").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprehct_before_0").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdpprehct_before_0").value = decimal;
    }
});

//RBC
$("#sdpprerbc_before_0").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprerbc_before_0").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdpprerbc_before_0").value = decimal;
    }
});

//WBC
$("#sdpprewbc_before_0").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdpprewbc_before_0").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(2);
        document.getElementById("sdpprewbc_before_0").value = decimal;
    }
});

//MCV
$("#sdppremcv_before_0").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppremcv_before_0").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdppremcv_before_0").value = decimal;
    }
});

//Eosinophil
$("#sdppreeosinophil_before_0").keydown(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var integer = document.getElementById("sdppreeosinophil_before_0").value;
        var float = parseFloat(integer) || 0;
        var decimal = float.toFixed(1);
        document.getElementById("sdppreeosinophil_before_0").value = decimal;
    }
});

function SetPtlColor() {
    var val = document.getElementById("sdppreplt_before_0").value
    if (val > 199 && val < 401) {
        document.getElementById("sdppreplt_before_0").style.color = "#000000"
    }
}


function getAppointmentDate8() {

    var dateFrom = new Date(dmyToymd($("#donation_date").val()));
    var dateTo = new Date(dmyToymd($("#sdpdonateappointmentdate").val()));
    var today = new Date();
    var diffData = parseInt((dateTo - dateFrom) / (1000 * 60 * 60 * 24), 10);

    if (diffData < 0) {
        mgsError("ขออภัยค่ะ!", "วันนัดหมายไม่ถูกต้อง", getAppointmentDateDiff);
    } else if (diffData <= 15) {
        mgsError("ขออภัยค่ะ!", "ยังไม่ครบ 15 วัน", getAppointmentDateDiff);
    } else if (diffData <= 30) {

        swal({
                title: "ยังไม่ครบ 30 วัน ต้องการนัดหมายหรือไม่",
                type: 'warning',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "ใช่",
                cancelButtonText: "ไม่",
                closeOnConfirm: true
            },
            function(inputValue) {

                if (inputValue != "" && inputValue != false) {


                } else {
                    document.getElementById("sdpdonateappointmentdate").value = "";
                    document.getElementById("sdpdonateappointmentdate").focus();
                }


            });
    }

}

function getAppointmentDateDiff(inputValue) {
    if (inputValue) {
        document.getElementById("sdpdonateappointmentdate").value = "";
        document.getElementById("sdpdonateappointmentdate").focus();
    }
}

function setCheckMarkAppointment() {
    var sdpdonateisappointment = document.getElementById("sdpdonateisappointment").checked;

    document.getElementById("sdpdonateappointmentdate").readOnly = !sdpdonateisappointment;
    document.getElementById("sdpdonateappointmentremark").readOnly = !sdpdonateisappointment;

    document.getElementById("assignsdp").readOnly = !assignsdp;
    document.getElementById("assignsdpdate").readOnly = !assignsdpdate;

    if (!sdpdonateisappointment) {
        document.getElementById("sdpdonateappointmentdate").value = "";
        document.getElementById("sdpdonateappointmentremark").value = "";
        document.getElementById("assignsdpdate").value = "";

    }

}