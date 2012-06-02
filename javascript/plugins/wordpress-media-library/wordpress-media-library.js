/**
 * @fileOverview UI Components for invoking wordpress media library
 * @author Michael Robinson michael@panmedia.co.nz
 */
(function($) {

    $.ui.editor.registerUi({

        /**
         * @name $.editor.ui.wordpressMediaLibrary
         * @augments $.ui.editor.defaultUi
         * @class Invokes wordpress media library
         */
        wordpressMediaLibrary: /** @lends $.editor.ui.wordpressMediaLibrary.prototype */ {

            dialog: null,

            /**
             * @see $.ui.editor.defaultUi#init
             */
            init: function(editor) {

                this.bindSendToEditor();

                return editor.uiButton({
                    title: 'Media Library',
                    icon: 'ui-icon-wordpress-media-library',
                    click: function() {
                        this.show();
                    }
                });
            },

            bindSendToEditor: function() {
                var ui = this;
                window.send_to_editor = function(html) {

                    console.log(html);
                    console.log(ui.editor);

                    ui.editor.restoreSelection();
                    ui.editor.replaceSelection(html);

                    ui.dialog.dialog('destroy');
                    ui.dialog = null;
                };
            },

            show: function() {
                var ui = this;
                ui.editor.saveSelection();
                this.dialog = $('<div style="display:none"><iframe src="' + raptorMediaLibrary.url + '?type=image&TB_iframe=true" /></div>').appendTo('body');
                this.dialog.dialog({
                    title: 'Media Library',
                    position: 'center center',
                    resizable: true,
                    modal: true,
                    closeOnEscape: true,
                    minWidth: 695,
                    minHeight: 440,
                    dialogClass: ui.options.baseClass + '-dialog',
                    resize: function() {
                        ui.resizeIframe();
                    },
                    open: function() {
                        ui.resizeIframe();
                    },
                    close: function() {
                        ui.editor.restoreSelection();
                        if (ui.dialog) {
                            ui.dialog.dialog('destroy');
                            ui.dialog = null;
                        }
                    }
                });
            },
            resizeIframe: function() {
                $(this.dialog).find('iframe').height($(this.dialog).height()-30);  $(this.dialog).find('iframe').width($(this.dialog).width());
            }
        }
    });
})(jQuery);
