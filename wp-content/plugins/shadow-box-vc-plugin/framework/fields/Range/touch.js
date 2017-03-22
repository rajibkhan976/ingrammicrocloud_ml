!function ($) {

    am_vc_field_touch('Range', function ($input, $cnt) {
        $input.not('[type=number]').remove();
        $input = $input.filter('[type=number]');
        var el = $input[0];

        var up = function () {
            var w = ((el.value.length + 1) * 9) + 30;
            if (w < 70) w = 70;

            el.style.width = w + 'px';
        };

        up();
        $input.on('change keypress', up);

        $input.fixNumberWheel();
    });
}(window.jQuery);