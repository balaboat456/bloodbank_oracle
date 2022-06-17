$(document).ready(function () {

    $('#patientid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/patient.php',
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
                            id: item.patientid,
                            text: 'ID CARD ' + item.patientidcard + ' | HN '+ item.patienthn + ' '  +item.patientfullname,
                        }
                    })
                };
            },

        }
    });

    $('#labunitroomid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/labunitroom.php',
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
                            id: item.labunitroomid,
                            text: item.labunitroomname,
                        }
                    })
                };
            },

        }
    });

    $('#doctorid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/doctor.php',
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
                            id: item.doctorid,
                            text: item.doctorname,
                        }
                    })
                };
            },

        }
    });

    $('#reasonsendingid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/labreasonsending.php',
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
                            id: item.reasonsendingid,
                            text: item.reasonsendingname,
                        }
                    })
                };
            },

        }
    });


    $('#labdeliveryid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/labdelivery.php',
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
                            id: item.labdeliveryid,
                            text: item.labdeliveryname,
                        }
                    })
                };
            },

        }
    });

    $('#maintenancerightid').select2({
        allowClear: true,
        width:"100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/maintenanceright.php',
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
                            id: item.maintenancerightid,
                            text: item.maintenancerightname,
                        }
                    })
                };
            },

        }
    });


    

    

});
