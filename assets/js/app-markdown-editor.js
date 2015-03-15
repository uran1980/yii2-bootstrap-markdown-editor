var appMdEditor = appMdEditor || {};

!(function ($) {
    "use strict";

    $(document).ready(function () {
        /***********************************************************************
         *                              METHODS
         **********************************************************************/
        // TODO

        /***********************************************************************
         *                          EVENTS HANDLER
         **********************************************************************/
        appMdEditor.eventsHandler = function () {
            $('body').delegate('button[data-handler="bootstrap-markdown-cmdPreview"]', 'click', function () {
                var $mdEditor = $(this).closest('.md-editor'),
                    offset    = $mdEditor.offset(),
                    position  = offset['top'] - 100
                ;
                $.scrollTo(position, 'slow', {easing: 'easeOutCubic'});
            });
        };

        /***********************************************************************
         *                               INIT
         **********************************************************************/
        appMdEditor.init = function () {
            appMdEditor.eventsHandler();
        };
        appMdEditor.init();
    });
})(window.jQuery);