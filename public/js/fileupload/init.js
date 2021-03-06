$(function () {
    'use strict';
    var url = '/album/photo/upload';
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
                        '<textarea class="form-control" name="photo_memos[]" placeholder="メモを入力" aria-label="メモを入力"></textarea>' +
                        '<button type="button" class="btn btn-secondary" onclick="$(this).parent().parent().remove()">写真削除</button>' +
                        '<input type="hidden" name="photo_names[]" value="' + file.name + '">' +
                        '</div>' +
                        '</div>';
                    $('#files').append(html);
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
