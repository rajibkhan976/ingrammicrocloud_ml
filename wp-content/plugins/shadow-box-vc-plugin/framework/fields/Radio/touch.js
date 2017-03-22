!function($) {
    "use strict";

    am_vc_field_touch('Radio', function ($input, $cnt) {
        var $radios = $cnt.find('[type=radio]');

        $input.change(function() {
            var value = $input.val();

            $radios.filter("[value='"+value+"']").prop('checked');
        });

        $radios.change(function() {
            var $radio = $(this),
                value = $radio.val();

            $input.val(value).trigger('change');

//            console.log($radio.val())
        });
    });
}(window.jQuery);