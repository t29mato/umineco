$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    window.onbeforeunload = function () {
        //Chromeでは動かない.デフォルトの文言が表示される.
        return '編集中です。本当に他のページに移動しますか?';
    };
});
