$(function () {
    'use strict';
    $('#area').change(function () {
        var $selectedSpotId = $('#area option:selected').data('spot');
        $('#spot').val($selectedSpotId);
    });
    $('#spot').change(function () {
        var $selectedSpotId = $('#spot option:selected').data('area');
        $('#area').val($selectedSpotId);
    });
});
