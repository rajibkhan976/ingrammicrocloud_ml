!function($) {
    "use strict";

    am_vc_field_touch('Margins4', function ($input, $cnt) {
        var $left = $cnt.find('.am-margins4-left');
        var $top = $cnt.find('.am-margins4-top');
        var $right = $cnt.find('.am-margins4-right');
        var $bottom = $cnt.find('.am-margins4-bottom');
        var $all = $cnt.find('.am-margins4-left, .am-margins4-top, .am-margins4-right, .am-margins4-bottom');

        var load = function() {
            var value = $input.val();

            value = value.split(' ');

            var left = parseInt(value[3], 10) || '',
                right = parseInt(value[1], 10) || '',
                bottom = parseInt(value[2], 10) || '',
                top = parseInt(value[0], 10) || '';

            $left.val(left).trigger('change');
            $top.val(top).trigger('change');
            $right.val(right).trigger('change');
            $bottom.val(bottom).trigger('change');
        };

        var onChange = function(ev) {
            var $el = $(this),
                right = parseInt($right.val(), 10) || 0,
                bottom = parseInt($bottom.val(), 10) || 0,
                left = parseInt($left.val(), 10) || 0,
                top = parseInt($top.val(), 10) || 0;

            var str = [top + "px",  right + "px",  bottom + "px",  left + "px"].join(' ');

            if(!left && !top && !right && !bottom) {
                str = '';
            }

            $input.val(str);
        };

        load();

        $all.on('change keyup', onChange);

        $all.fixNumberWheel();
    });
}(window.jQuery);