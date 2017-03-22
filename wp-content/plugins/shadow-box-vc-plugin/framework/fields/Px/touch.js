!function ($) {

    am_vc_field_touch('Px', function ($input, $cnt) {
        var $input2 = $cnt.find(".am-px");

        $input2.val(parseInt($input.val(), 10));

        var el = $input2[0];

        var up = function () {
            var w = ((el.value.length + 1) * 9) + 30;
            if (w < 70) w = 70;

            el.style.width = w + 'px';

            $input.val(parseInt($input2.val(), 10) + 'px');
            console.log($input.val());
        };

        up();
        $input2.on('change keypress', up);

        $input2.fixNumberWheel();
    });
}(window.jQuery);