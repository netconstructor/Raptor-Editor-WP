<?php
require_once('../../../../wp-config.php');
require_once(ABSPATH.'/wp-admin/includes/admin.php');
ob_start(); ?>
    (function($) {

        var bambooEditorOptions = {
            uiOrder: [
                ['save', 'cancel', 'revisions'], 
                ['dock', 'showGuides'],
                ['viewSource'],
                ['undo', 'redo'],
                ['alignLeft', 'alignCenter', 'alignJustify', 'alignRight'],
                ['textBold', 'textItalic', 'textUnderline', 'textStrike'],
                ['textSub', 'textSuper'],
                ['listUnordered', 'listOrdered'],
                ['hr', 'quoteBlock'],
                ['fontSizeInc', 'fontSizeDec'],
                ['link', 'unlink'],
                ['insertFile'],
                ['floatLeft', 'floatNone', 'floatRight'],
                ['tag-menu']
            ],
            enableUi: false,
            ui: {
                textBold: true,
                textItalic: true,
                textUnderline: true,
                textStrike: true,
                textSub: true,
                textSuper: true,
                alignLeft: true,
                alignRight: true,
                alignCenter: true,
                alignJustify: true,
                quoteBlock: true,
                save: true,
                cancel: true,
                floatLeft: true,
                floatRight: true,
                floatNone: true,
                fontSizeInc: true,
                fontSizeDec: true,
                hr: true,
                undo: true,
                redo: true,
                link: true,
                unlink: true,
                listUnordered: true,
                listOrdered: true,
                tagMenu: true
            },
            plugins: {
                dock: {
                    docked: true,
                    dockUnder: '#wpadminbar'
                },
                save: {
                    postName: 'raptor-post-content',
                    showResponse: true,
                    ajax: {
                        url: '<?php echo RAPTOR_AJAX_ROOT; ?>'
                    }
                }
            }
        };

        $(function(){
            $('.raptor-editable-content').editor(bambooEditorOptions);
        });

    })(jQuery);
<?php echo ob_get_clean(); ?>