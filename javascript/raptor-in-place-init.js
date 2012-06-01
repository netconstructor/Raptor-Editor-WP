(function($) {
    $('.raptor-editable-post').editor({
        uiOrder: [
            ['save', 'cancel'],
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
            ['tag-menu']
        ],
        enableUi: false,
        disabledPlugins: [
            'unsavedEditsWarning'
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
            tagMenu: true,
            save: true,
            cancel: true
        },
        plugins: {
            unsavedEditsWarning: false,
            dock: {
                docked: true,
                dockUnder: '#wpadminbar'
            },
            saveJson: {
                showResponse: true,
                id: {
                    attr: 'data-post_id'
                },
                postName: raptorInPlaceSave.action,
                ajax: {
                    url: raptorInPlaceSave.url,// + '?action=' + raptorInPlaceSave.postName,
                    type: 'post',
                    cache: false,
                    data: function(id, contentData) {
                        console.log(arguments);
                        var data = {
                            action: raptorInPlaceSave.action,
                            posts: contentData,
                            nonce: raptorInPlaceSave.nonce
                        };
                        console.log(data);
                        return data;
                    }
                }
            }
        }
    });
})(jQuery);
