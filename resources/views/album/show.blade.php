@extends('layouts.app')

@section('script')
<script src="/js/fileupload/jquery.ui.widget.js"></script>
<script src="/js/fileupload/jquery.iframe-transport.js"></script>
<script src="/js/fileupload/jquery.fileupload.js"></script>
<script src="/js/fileupload/init.js"></script>
<script src="/js/reload-forbidden.js"></script>
<script src="/js/select-spot.js"></script>
@endsection

@section('mainContents')
<h1>アルバム</h1>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th class="table-primary">ダイビングスポット</th>
            <td>{{ $album->spot->area->name . ' ' . $album->spot->name }}</td>
        </tr>
        <tr>
            <th class="table-primary">日程</th>
            <td>{{ $album->started_at . ' 〜 ' . $album->ended_at }}</td>
        </tr>
        <tr>
            <th class="table-primary">タイトル</th>
            <td>{{ $album->title }}</td>
        </tr>
        <tr>
            <th class="table-primary">メモ</th>
            <td>{{ $album->memo }}</td>
        </tr>
    </tbody>
</table>
</form>

<div id="files" class="files row">
    @foreach ($album->albumPhotos as $photo)
    <div class="col-md-3">
        <a href="#" class="thumbnail">
            <img class="img-fluid" src="{{ Storage::url($photo->filename) }}">
        </a>
        <div class="input-group mb-3">

        </div>
    </div>
    @endforeach
</div>
@endsection
@section('sideContents')
@endsection
