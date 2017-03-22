!function($) {
    "use strict";

    am_vc_field_touch('Border', function ($input, $cnt) {
        var $width = $cnt.find('.am-border-width');
        var $style = $cnt.find('.am-border-style');
        var $color = $cnt.find('.am-border-color');
        var $example = $cnt.find('.ab-border-example');
        var $all = $cnt.find('.am-border-width, .am-border-style, .am-border-color');

        var load = function() {
            var value = $input.val();
//            value = '1px double red';

            $example.css('border', value);

            value = value.split(' ');

            $width.val(parseInt(value[0])).trigger('change');
            $style.val(value[1]).trigger('change');
            $color.val(value[2]).trigger('change');
        };

        var onChange = function(ev) {
            var $el = $(this),
                width = parseInt($width.val(), 10),
                style =  $style.val();
            if(!style) {
                $style.val('solid');
                style = $style.val();
            }

            var str = [width + 'px', style, $color.val()].join(' ');

            if(!width) {
                str = '';
            }

            $input.val(str);
            $example.css('border', str);
//            console.log(str);
        };

        //$style.select2($.extend({minimumResultsForSearch: -1}, {dropdownWidth:100}));
        $color.iris({
            palletes: true,
            change: onChange
        });

        $color.click(function(ev) {
            ev.stopPropagation();
            $color.iris('show');
        })

        $('body').click(function() {
            try {
                $color.iris('hide');
            } catch(e) {}
        });

        load();

        $all.on('change keyup', onChange);

        $all.fixNumberWheel();
    });

}(window.jQuery);