var am_vc_field_touch;
!function($) {

    var am_vc_field_touch_instance = function ($input, $cnt) {
        this.$input = $input;
        this.$cnt = $cnt;
    };

    am_vc_field_touch = function (name, fn) {
        var query = 'am_vc_field_Am' + name;

        $('.wpb-element-edit-modal .am_vc_shortcode_param').each(function() {
            var $el = $(this);
            if($el.hasClass('vc_row-fluid')) $el.removeClass('vc_row-fluid');
        });

        $('#vc_properties-panel,.wpb-element-edit-modal').find('.' + query).each(function () {
            var $el = $(this);

            if ($el.data(query)) return;
            $el.data(query, true);

            var $input = $el.find('.wpb_vc_param_value');
            var $cnt = $el;//.find('.am_vc_field_box');

            fn.apply(new am_vc_field_touch_instance($input, $cnt), [$input, $cnt]);
        });
    };

    jQuery.fn.fixNumberWheel = function() {
        $(this).each(function() {
            var $el = $(this);

            $el.on('focus', function (e) {
                $el.off('.am-fixNumberWheel').on('mousewheel.am-fixNumberWheel', function (e) {
                    e.preventDefault();
                    var step = parseFloat($el.prop('step')) || 1;
                    var min = parseFloat($el.prop('min'));
                    var max = parseFloat($el.prop('max'));
                    var val = parseFloat($el.val()) || 0;

                    var direction = (e.originalEvent.wheelDelta > 0 ? 1 : -1);

                    var finalVal = val + step * direction;
                    if (!isNaN(min) && finalVal < min) finalVal = min;
                    if (!isNaN(max) && finalVal > max) finalVal = max;

                    $el.val(finalVal).trigger('change');
                })
            });

            $el.on('blur', function (e) {
                $el.off('mousewheel.am-fixNumberWheel');
            });
        });
    };

    $(document.body).on('click', '.vc_element-icon', function() {
        var $el = $(this),
            $holder = $el.closest('.wpb_content_element, .wpb_content_holder'),
            $edit = $holder.find('> .vc_controls > .column_edit, > .vc_controls .vc_controls-cc > .vc_control-btn-edit');
        $edit.click();
    });


    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            e.preventDefault();
            var $panel = $('#vc_properties-panel');
            if($panel.length && $panel.is(':visible')) {
                $panel.find('.vc_panel-btn-close').click();
            }
        }
    });

    $(function() {
        "use strict";

        var $previewButton = $('.preview.button');
        if(!$previewButton.length) return;

        $(document).keyup(function(e) {
            if (e.keyCode == 81 && e.ctrlKey) {
                e.preventDefault();
                $previewButton.click();
            }
        });
    });
}(window.jQuery);