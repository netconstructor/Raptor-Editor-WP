(function($) {
    $('#post-body #content').editor({
        replace: true,
        autoEnable: true,
        uiOrder: [
            ['showGuides'],
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
            ['tagMenu']
        ],
        enableUi: false,
        disabledPlugins: [
            'unsavedEditWarning'
        ],
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
            unsavedEditWarning: false,
            dock: {
                docked: true,
                dockToElement: true
            }
        }
    });
})(jQuery);
