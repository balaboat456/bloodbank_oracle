function mgsError(title,text,getDurgicaldateDateCallback)
{
    swal({
        title: title,
        text: text,
        type: "warning",
        showCloseButton: false,
        showCancelButton: false,
        dangerMode: true,
        confirmButtonClass: "btn-success",
        confirmButtonClass: "",
        confirmButtonText: "ตกลง",
        closeOnConfirm: true
    },
    getDurgicaldateDateCallback);
}

function mgsInfo(title,text)
{
    swal({
        title: title,
        text: text,
        type: "warning",
        showCloseButton: false,
        showCancelButton: false,
        dangerMode: true,
        confirmButtonClass: "btn-success",
        confirmButtonClass: "",
        confirmButtonText: "ตกลง",
        closeOnConfirm: true
    });
}