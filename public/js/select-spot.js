$(function () {
    'use strict';
    var url = '/spot/search/';
    $('#area_id').change(function() {
        $.ajax({
            url: url + $('#area_id').val(),
            type: 'GET',
            dataType: 'json',
        }).done(function($data) {
            $('#spot_id').empty();
            $('#spot_id').append($('<option>').text('-- スポットを選択'));
            $data.forEach($spot => {
                var $option = $('<option>')
                    .val($spot.id)
                    .text($spot.name);
                $('#spot_id').append($option);
            });
        }).fail(function() {
            console.log('failed...');
        })
    });
});
