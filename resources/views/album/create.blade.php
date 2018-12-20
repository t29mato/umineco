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
<h1>アルバム作成</h1>
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/album/create" method="post">
    {{ csrf_field() }}
    <p class="lead">ダイビングスポット</p>
    <div class="row">
        <div class="form-group mb-3 col-sm">
            <label for="exampleFormControlInput1">エリア</label>
            <select class="form-control" id="area" name="area_id" required>
                @foreach ($areas as $area)
                <option value="{{ $area->id }}" @if (isset($area->spots[0]->id)) data-spot="{{ $area->spots[0]->id }}" @endif>{{ $area->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group mb-3 col-sm">
            <label for="exampleFormControlInput1">スポット</label>
            <select class="form-control multiple-task" id="spot" name="spot_id" required>
                @foreach ($areas as $area)
                <optgroup label="{{ $area->name }}">
                    @foreach ($area->spots as $spot)
                    <option value="{{ $spot->id }}" data-area="{{ $area->id }}">{{ $spot->name }}</option>
                    @endforeach
                </optgroup>
                @endforeach

            </select>
        </div>
    </div>
    <p class="lead">日程</p>
    <div class="input-group mb-3">
        <input type="date" name="started_at" value="{{ old('started_at') }}" class="form-control" required>
        <div class="input-group-prepend">
            <span class="input-group-text" id="">〜</span>
        </div>
        <input type="date" name="ended_at" value="{{ old('ended_at') }}" class="form-control" required>
    </div>
    <hr>
    <p class="lead">タイトル</p>
    <div class="input-group mb-3">
        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="タイトルを入力"
            aria-label="タイトルを入力" aria-describedby="basic-addon1" required>
    </div>
    <p class="lead">メモ</p>
    <div class="input-group mb-3">
        <textarea class="form-control" name="memo" value="{{ old('memo') }}" placeholder="メモを入力" aria-label="メモを入力"></textarea>
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
    <div id="files" class="files row"></div>
    <input type="hidden" name="file_ids" id="file_ids" value="">
    <button type="submit" class="btn btn-primary">アルバムを作成</button>
</form>
@endsection

@section('sideContents')
@endsection
