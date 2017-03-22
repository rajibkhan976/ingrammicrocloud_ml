jQuery(document).ready(function ($) {

    jQuery('.newsletter-ajax-form').on('submit', function (e) {
        e.preventDefault();

        var $form = $(this);

        jQuery.post($form.attr('action'), $form.serialize(), function (data) {
            if (data.error) {
                jQuery("#email_address").css('border', "1px solid red");
                jQuery(".bg-success").html('').hide();
                jQuery(".bg-danger").html(data.error_message).show('slow');

            } else {
                jQuery(".bg-danger").html('').hide();
                jQuery(".bg-success").html(data.success_message).show('slow');
                jQuery("#email_address").css('border', "1px solid #ffffff");
                jQuery("#email_address").val('');
                setTimeout('jQuery(".bg-success").html("").hide("slow");', 3000);
            }

        }, 'json');
    });

    jQuery('#super-menu input[type="radio"]').on(
            'change',
            function (e) {
                //location.reload();
                var url = $(this).val();
                var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

                if (RegExp.test(url)) {
                    window.location.href = url;
                } else {
                    return false;
                }
            }
    );
    
});