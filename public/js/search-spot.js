$(function () {
    'use strict';
    var url = '/spot/search/';
    $('#search-spot button').click(function() {
        $.ajax({
            url: url + $('#search-spot input[name="spot"]').val(),
            type: 'GET',
            dataType: 'json',
        }).done(function($data) {
            console.log($data);
        })
    });
});
