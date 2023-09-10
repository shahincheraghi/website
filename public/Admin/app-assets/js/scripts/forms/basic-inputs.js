/*=========================================================================================
        File Name: basic-inputs.js
        Description: Input field js for label type
        ----------------------------------------------------------------------------------------

==========================================================================================*/

(function(window, document, $) {
    'use strict';
    var $html = $('html');

        //label Positions
    $(".labelUp").labelinplace();
    $(".labelDown").labelinplace({
        labelPosition: "down"
    });

    // Label Icons
    $(".labelIcon").labelinplace({
        labelArrowRight: ' <i class="icons-hand-o-right"></i> ',
        labelArrowDown: ' <i class="icons-hand-o-down"></i> ',
        labelArrowUp: ' <i class="icons-hand-o-up"></i> '
    });

    // Icons After Label
    $(".labelIconAfter").labelinplace({
        labelArrowRight: ' <i class="icons-caret-right"></i> ',
        labelArrowDown: ' <i class="icons-caret-down"></i> ',
        labelArrowUp: ' <i class="icons-caret-up"></i> ',
        labelIconPosition: "after",
        inputAttr: "id"
    });

})(window, document, jQuery);
