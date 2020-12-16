jQuery(function ($) {
    'use strict';
    var selector = '.fw-framework-widget-options-widget';
    var timeoutId;

    $(document).on('remove', selector, function () { // ReInit options on html replace (on widget Save)
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function () { // wait a few milliseconds for html replace to finish
            fwEvents.trigger('fw:options:init', {$elements: $(selector)});
        }, 200);
    });
    $(document).on('widget-updated widget-added', function (e) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function () { // wait a few milliseconds for html replace to finish
            fwEvents.trigger('fw:options:init', {$elements: $(selector)});
        }, 200);
    });

    //fix for addable box in customizer
    if(typeof wp.customize !== 'undefined') {
        $(document).on('fw:option-type:addable-box:box:init', function (e) {
            $('.fw-option-box-control small').on('click', function (e) {
                var $input = $(this).closest('.fw-backend-customizer-option > .fw-backend-customizer-option-inner > .fw-backend-option > .fw-backend-option-input');
                $input.trigger('click');
            });
        });
    }
});