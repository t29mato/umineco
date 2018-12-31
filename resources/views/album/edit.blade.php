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
{{ Breadcrumbs::render('album.edit', $album) }}
<h1>アルバム編集</h1>
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('album.update', $album->id) }}" method="post">
    {{ csrf_field() }}
    <p class="lead">ダイビングスポット</p>
    <div class="row">
        <div class="form-group mb-3 col-sm">
            <label for="exampleFormControlInput1">エリア</label>
            <select class="form-control" id="area" name="area_id" required>
                @foreach ($areas as $area)
                <option value="{{ $area->id }}" @if (isset($area->spots[0]->id))
                    data-spot="{{ $area->spots[0]->id }}"
                    @endif
                    @if ($area->id === $album->spot->area->id)
                    selected
                    @endif
                    >{{ $area->name }}
                </option>
                @endforeach

            </select>
        </div>
        <div class="form-group mb-3 col-sm">
            <label for="exampleFormControlInput1">スポット</label>
            <select class="form-control multiple-task" id="spot" name="spot_id" required>
                @foreach ($areas as $area)
                <optgroup label="{{ $area->name }}">
                    @foreach ($area->spots as $spot)
                    <option value="{{ $spot->id }}" data-area="{{ $area->id }}" @if ($spot->id === $album->spot->id)
                        selected
                        @endif
                        >{{ $spot->name }}
                    </option>
                    @endforeach
                </optgroup>
                @endforeach

            </select>
        </div>
    </div>
    <p class="lead">日程</p>
    <div class="input-group mb-3">
        <input type="date" name="started_at" value="{{ $album->started_at }}" class="form-control" required>
        <div class="input-group-prepend">
            <span class="input-group-text" id="">〜</span>
        </div>
        <input type="date" name="ended_at" value="{{ $album->ended_at }}" class="form-control" required>
    </div>
    <hr>
    <p class="lead">タイトル</p>
    <div class="input-group mb-3">
        <input type="text" name="title" value="{{ $album->title }}" class="form-control" placeholder="タイトルを入力"
            aria-label="タイトルを入力" aria-describedby="basic-addon1" required>
    </div>
    <p class="lead">メモ</p>
    <div class="input-group mb-3">
        <textarea class="form-control" name="memo" placeholder="メモを入力" aria-label="メモを入力">{{ $album->memo }}</textarea>
    </div>
    <p class="lead">画像</p>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="photos[]" multiple aria-label>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files row">
        @foreach ($album->albumPhotos as $index => $photo)
        <div class="col-md-3">
            <a href="#" class="thumbnail">
                <img class="img-fluid" src="{{ Storage::url($photo->filename) }}">
            </a>
            <div class="input-group mb-3">
                <p><input type="text" class="form-control" name="photo_memos[]" placeholder="タイトルを入力" aria-label="タイトルを入力" aria-describedby="basic-addon1" value="{{ $photo->memo }}"></p>
                <button type="button" class="btn btn-secondary" onclick="$(this).parent().parent().remove()">写真削除</button>
                <input type="hidden" name="photo_names[]" value="{{ $photo->filename }}">
            </div>
        </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">アルバムを更新</button>
</form>
@endsection

@section('sideContents')
@endsection
