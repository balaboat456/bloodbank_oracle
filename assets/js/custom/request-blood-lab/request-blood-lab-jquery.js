function loadJquery()
{

    jQuery(function ($) {

        $('.money').mask("#,###", {reverse: true});
        $('.masktime').mask("99.99", {reverse: true});
        $('.interest').mask("99.99", {reverse: true});

    });

}