function ajaxPost(path='',data={}) {
    spinnershow();
   return $.ajax({
        type: "POST",
        url: path,
        dataType: 'json',
        data: data, 
        complete: function () {
            var delayInMilliseconds = 500;
            setTimeout(function () {
                spinnerhide();
            }, delayInMilliseconds);
        },
        error: function (ajaxContext) {
            myAlertTopError();
        }
    });
}


