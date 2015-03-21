var appMdEditor = appMdEditor || {};

!(function ($) {
    "use strict";

    $(document).ready(function () {
        /***********************************************************************
         *                              METHODS
         **********************************************************************/
        appMdEditor.fixPreviewButton = function (e) {
            var previewButtonIcon = $(e.$textarea)
                    .closest('div')
                    .find('button[data-handler="bootstrap-markdown-cmdPreview"] span')
            ;

            if ( true === e.$isPreview ) {
                previewButtonIcon
                    .removeClass('glyphicon-search, glyphicon-eye-open')
                    .addClass('glyphicon-eye-close')
                ;
            } else {
                previewButtonIcon
                    .removeClass('glyphicon-search, glyphicon-eye-close')
                    .addClass('glyphicon-eye-open')
                ;
            }
        };

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

                if ( typeof prettyPrint === 'function' ) {
                    window.setTimeout(function () {
                        var langClass = $(this).attr('class') || '';
                        $('code').parent('pre').addClass('prettyprint linenums ' + langClass);
                        prettyPrint();
                    }, 150);
                }
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