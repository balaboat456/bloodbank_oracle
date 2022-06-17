$(document).ready(function() {


    $('#searchcheckresultbloodstatusid').select2({
        allowClear: true,
        width: "100%",
        theme: "bootstrap",
        placeholder: "",
        // tags: [],
        ajax: {
            url: 'data/masterdata/labcheckresultbloodstatus.php',
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
                            id: item.checkresultbloodstatusid,
                            text: item.checkresultbloodstatusname,
                        }
                    })
                };
            },

        }
    });




});