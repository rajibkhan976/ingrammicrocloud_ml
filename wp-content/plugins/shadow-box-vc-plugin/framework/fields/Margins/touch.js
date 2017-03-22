!function($) {
    "use strict";

    am_vc_field_touch('Margins', function ($input, $cnt) {
        var $left = $cnt.find('.am-margins-lr');
        var $top = $cnt.find('.am-margins-tb');
        var $all = $cnt.find('.am-margins-lr, .am-margins-tb');

        var load = function() {
            var value = $input.val();

            value = value.split(' ');

            var left = parseInt(value[1], 10) || '',
                top = parseInt(value[0], 10) || '';

            $left.val(left).trigger('change');
            $top.val(top).trigger('change');
        };

        var onChange = function(ev) {
            var $el = $(this),
                left = parseInt($left.val(), 10) || 0,
                top = parseInt($top.val(), 10) || 0;

            var str = [top + "px",  left + "px"].join(' ');

            if(!left && !top) {
                str = '';
            }

            $input.val(str);
        };

        load();

        $all.on('change keyup', onChange);

        $all.fixNumberWheel();
    });
}(window.jQuery);