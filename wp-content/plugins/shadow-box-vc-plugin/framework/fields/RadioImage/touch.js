!function ($) {
    "use strict";

    am_vc_field_touch('RadioImage', function ($input, $cnt) {
        var $radios = $cnt.find('[type=radio]');
        var $labels = $cnt.find('.radio-image-label');

        $input.change(function () {
            var value = $input.val();

            $radios.filter("[value='" + value + "']").prop('checked');
            $labels.removeClass('checked');
            $labels.filter("[data-value='" + value + "']").addClass('checked');
        });

        $radios.change(function () {
            var $radio = $(this),
                value = $radio.val();

            $input.val(value).trigger('change');
        });
    });
}(window.jQuery);