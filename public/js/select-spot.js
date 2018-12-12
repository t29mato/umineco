$(function () {
    'use strict';
    var url = '/spot/search/';
    $('#search-spot #area').change(function() {
        $.ajax({
            url: url + $('#search-spot #area').val(),
            type: 'GET',
            dataType: 'json',
        }).done(function($data) {
            $('#search-spot #spot').empty();
            $('#search-spot #spot').append($('<option>').text('-- スポットを選択'));
            $data.forEach($spot => {
                var $option = $('<option>')
                    .val($spot.id)
                    .text($spot.name);
                $('#search-spot #spot').append($option);
            });
        }).fail(function() {
            console.log('failed...');
        })
    });
});
