$(document).ready(function() {
    setBagType();
    setBagStockType();


    function setBagType() {
        $('.bloodbagtype2').select2({
            allowClear: true,
            theme: "bootstrap",
            placeholder: "ชนิดถุง",
            width: "100%",
            ajax: {
                url: 'data/masterdata/bagtype.php',
                dataType: 'json',
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
                                text: item.bagtypename
                            }
                        })
                    };
                },

            }
        });

    }

    function setBagStockType() {
        $('.bloodstocktypecross').select2({
            allowClear: true,
            theme: "bootstrap",
            // placeholder: "ชนิดเลือด",
            width: "100%",
            ajax: {
                url: 'data/masterdata/bloodstocktype.php',
                dataType: 'json',
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
                                id: item.bloodstocktypeid,
                                text: item.bloodstocktypename2
                            }
                        })
                    };
                },

            }
        });

    }





});