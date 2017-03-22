!function($) {
    "use strict";

    am_vc_field_touch('Switch', function ($input, $cnt) {
        new Switchery($input[0], {
            color:'#2980b9'
        });
    });

}(window.jQuery);