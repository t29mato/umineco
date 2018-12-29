$(function () {
    'use strict';
    var url = '/album/photo/create';
    $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    // TODO: jQueryでDOM生成する
                    var html = '<div class="col-md-3">' +
                        '<a href="#" class="thumbnail">' +
                        '<img class="img-fluid" src="' + file.url + '">' +
                        '</a>' +
                        '<div class="input-group mb-3">' +
                        '<input type="text" class="form-control" name="photo_memos[]" placeholder="タイトルを入力" aria-label="タイトルを入力" aria-describedby="basic-addon1">' +
                        '</div>' +
                        '</div>' +
                        '<input type="hidden" name="photo_ids[]" value="' + file.fileID + '">'
                        ;
                    $('#files ').append(html);
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
