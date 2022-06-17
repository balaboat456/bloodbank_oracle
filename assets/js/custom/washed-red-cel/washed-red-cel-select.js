$(document).ready(function() {


    // $('#unitofficeid').select2({
    //     allowClear: true,
    //     width: "100%",
    //     theme: "bootstrap",
    //     placeholder: "",
    //     // tags: [],
    //     ajax: {
    //         url: 'data/masterdata/unitoffice.php',
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         data: function(keyword) {
    //             return {
    //                 keyword: keyword.term
    //             };
    //         },
    //         processResults: function(data) {
    //             return {
    //                 results: $.map(data.data, function(item) {
    //                     return {
    //                         id: item.unitofficeid,
    //                         text: item.unitofficename,
    //                     }
    //                 })
    //             };
    //         },

    //     }
    // });

    // $('#bloodgroupid').select2({
    //     allowClear: true,
    //     width:"100%",
    //     theme: "bootstrap",
    //     placeholder: "",
    //     // tags: [],
    //     ajax: {
    //         url: 'data/masterdata/bloodgroup.php',
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
    //                         id: item.bloodgroupid,
    //                         text: item.bloodgroupname,
    //                     }
    //                 })
    //             };
    //         },

    //     }
    // });

    // $('#rhid').select2({
    //     allowClear: true,
    //     width: "100%",
    //     theme: "bootstrap",
    //     placeholder: "",
    //     // tags: [],
    //     ajax: {
    //         url: 'data/masterdata/bloodrh.php',
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         data: function(keyword) {
    //             return {
    //                 keyword: keyword.term
    //             };
    //         },
    //         processResults: function(data) {
    //             return {
    //                 results: $.map(data.data, function(item) {
    //                     return {
    //                         id: item.rhid,
    //                         text: item.rhname3,
    //                     }
    //                 })
    //             };
    //         },

    //     }
    // });

    $('#user_send_wash').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
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
                            id: item.name,
                            item: item,
                            text: item.name + '|' + item.code,
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
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    $('#user_receive_wash').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
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
                            id: item.name,
                            item: item,
                            text: item.name + '|' + item.code,
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
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    $('#user_done_wash').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
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
                            id: item.name,
                            item: item,
                            text: item.name + '|' + item.code,
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
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    $('#user_send_washed').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
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
                            id: item.name,
                            item: item,
                            text: item.name + '|' + item.code,
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
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });

    $('#user_get_bag_washed').select2({
        allowClear: true,
        theme: "bootstrap",
        placeholder: "",
        width: "100%",
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
                            id: item.name,
                            item: item,
                            text: item.name + '|' + item.code,
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
                '<span class="select2-span">&nbsp;' + strState[1] + '</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    });



});