$(function () {
  'use strict';
  // Change this to the location of your server-side upload handler:
  var url = '/album/photo/store';
  $('#fileupload').fileupload({
      url: url,
      dataType: 'json',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      done: function (e, data) {
          $.each(data.result.files, function (index, file) {
              $('<p/>').text(file.name).appendTo('#files');
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
