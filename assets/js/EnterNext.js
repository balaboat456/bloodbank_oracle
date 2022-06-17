
$(document).ready(function () {

    $("input,select").bind("keydown", function(event) {
        if (event.which === 13) {
            event.stopPropagation();
            event.preventDefault();
           $(':input:eq(' + ($(':input').index(this) + 1) +')').focus();
        }
    });

});