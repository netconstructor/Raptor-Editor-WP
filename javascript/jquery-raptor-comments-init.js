(function($) {

    var raptorCommentOptions = {
        uiOrder: [
            ['viewSource'],
            ['undo', 'redo'],
            ['textBold', 'textItalic', 'textUnderline', 'textStrike'],
            ['listUnordered', 'listOrdered'],
            ['quoteBlock'],
            ['link', 'unlink']
        ],
        autoEnable: true,
        enableUi: false,
        replace: true,
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
                dockToElement: true
            },
            save: false,
            unsavedEditWarning: false
        }
    };

    $(function(){
        $('#comment').editor(raptorCommentOptions);
    });

})(jQuery);