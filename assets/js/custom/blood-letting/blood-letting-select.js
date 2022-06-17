$(document).ready(function() {

    $("#lettingproblemid").change(function() {
        var problemid = $(this).children("option:selected").val();
        // console.log(problemid);
        // alert(problemid);
        if (problemid == 7 || problemid == 8) {
            document.getElementById("lettingproblemotherblock").style.display =
                "block";
            document.getElementById("lettingproblemother").required = true;
            document.getElementById("lettingproblemotheremply_1").style.display =
                "block";
            document.getElementById("lettingproblemotheremply_2").style.display =
                "none";
        } else {
            document.getElementById("lettingproblemotherblock").style.display =
                "none";
            document.getElementById("lettingproblemotheremply_1").style.display =
                "none";
            document.getElementById("lettingproblemotheremply_2").style.display =
                "block";
            document.getElementById("lettingproblemother").required = false;
        }
    });
    $("#unitofficeid").change(function() {
        var unitofficeid = $(this).children("option:selected").val();
        if (unitofficeid == 2 || unitofficeid == 178) {
            // document.getElementById("user_opd").hidden = true;
            // document.getElementById("user_opd").style.display = "none";
            // document.getElementById("user_before2").style.display = "none";
            // document.getElementById("user_after2").style.display = "none";
            console.log("OPD");
        } else {
            // data = '';
            // data +='<tr>';
            // data +='<td>ผู้ประเมิน 2</td>' ;
            // data +='<td>' ;
            // data +=' <input type="text" autocomplete="off" value="" class="form-control" id="user_before2" name="user_before2">';
            // data +='<td></td>' ;
            // data +=' <input type="text" autocomplete="off" value="" class="form-control" id="user_after2" name="user_after2">' ;
            // data +=' </td>' ;
            // data +="  </tr> ";
            // $("#user_opd").html(data);
            // document.getElementById("user_opd").hidden = false;
            // document.getElementById("user_opd").style.display = "block";
            // document.getElementById("user_before2").style.display = "block";
            // document.getElementById("user_after2").style.display = "block";
            console.log("ไม่ใช่");
        }
    });
    $("#unitofficeid").select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: "data/masterdata/unitoffice.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.unitofficeid,
                            text: "[" + item.unitofficecode + "] " + item.unitofficename,
                        };
                    }),
                };
            },
        },
    });

    $("#doctorid").select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: "data/masterdata/doctor.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.doctorid,
                            text: item.doctorname,
                        };
                    }),
                };
            },
        },
    });

    $("#bagtypeid").select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: "data/masterdata/bagtype_2.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.bagtypeid,
                            text: item.bagtypename,
                        };
                    }),
                };
            },
        },
    });

    $("#lettingproblemid").select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        ajax: {
            cache: true,
            url: "data/masterdata/lettingproblem.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.lettingproblemid,
                            text: item.lettingproblemname,
                        };
                    }),
                };
            },
        },
    });

    $("#usercreate").select2({
        allowClear: true,
        theme: "bootstrap",
        width: "100%",
        placeholder: "",
        ajax: {
            url: "data/bloodletting/letting_staff.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name + " " + item.surname,
                        };
                    }),
                };
            },
        },
    });
    $("#user_before").select2({
        allowClear: true,
        theme: "bootstrap",
        width: "100%",
        placeholder: "",
        ajax: {
            url: "data/bloodletting/letting_staff.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name + " " + item.surname,
                        };
                    }),
                };
            },
        },
    });
    $("#user_after").select2({
        allowClear: true,
        theme: "bootstrap",
        width: "100%",
        placeholder: "",
        ajax: {
            url: "data/bloodletting/letting_staff.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name + " " + item.surname,
                        };
                    }),
                };
            },
        },
    });
    $("#user_before2").select2({
        allowClear: true,
        theme: "bootstrap",
        width: "100%",
        placeholder: "",
        ajax: {
            url: "data/bloodletting/letting_staff.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name + " " + item.surname,
                        };
                    }),
                };
            },
        },
    });
    $("#user_after2").select2({
        allowClear: true,
        theme: "bootstrap",
        width: "100%",
        placeholder: "",
        ajax: {
            url: "data/bloodletting/letting_staff.php",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function(keyword) {
                return {
                    keyword: keyword.term,
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data.data, function(item) {
                        return {
                            id: item.id,
                            text: item.name + " " + item.surname,
                        };
                    }),
                };
            },
        },
    });
});