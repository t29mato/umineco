@extends('layouts.app')

@section('script')
<script src="/js/fileupload/jquery.ui.widget.js"></script>
<script src="/js/fileupload/jquery.iframe-transport.js"></script>
<script src="/js/fileupload/jquery.fileupload.js"></script>
<script src="/js/fileupload/init.js"></script>
<script src="/js/reload-forbidden.js"></script>
<script src="/js/search-spot.js"></script>
@endsection

@section('mainContents')
<h2>アルバム作成</h2>
<div class="card">
    <div class="card-header">アルバムの設定</div>
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="card-body" action="/album/create" method="post">
        {{ csrf_field() }}
        <p class="lead">ダイビングスポット</p>
        <div class="form-group mb-3" id="search-spot">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <select multiple class="form-control" id="exampleFormControlSelect2">
                                <option value="">-- エリアを選択</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select multiple class="form-control" id="exampleFormControlSelect2">
                            <option value="">-- スポットを選択</option>
                                @foreach ($spots as $spot)
                                    <option value="{{ $spot->id }}">{{ $spot->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
                <label for="exampleFormControlSelect2">Example multiple select</label>
        </div>
        <p class="lead">日程</p>
        <div class="input-group mb-3">
            <input type="date" class="form-control">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">〜</span>
            </div>
            <input type="date" class="form-control">
        </div>
        <p class="lead">公開設定</p>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02">
                <option value="1" selected>一般公開</option>
                <option value="2">非公開</option>
                <option value="3">限定公開</option>
            </select>
        </div>
        <p class="lead">コメント設定</p>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02">
                <option value="1" selected>受け付ける</option>
                <option value="2">受け付けない</option>
            </select>
        </div>
        <hr>
        <p class="lead">タイトル</p>
        <div class="input-group mb-3">
            <input type="text" name="title" value="" class="form-control" placeholder="タイトルを入力" aria-label="タイトルを入力"
                aria-describedby="basic-addon1">
        </div>
        <p class="lead">メモ</p>
        <div class="input-group mb-3">
            <textarea class="form-control" placeholder="メモを入力" aria-label="メモを入力"></textarea>
        </div>
        <p class="lead">タグ</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="キーワードで検索" aria-label="キーワードで検索" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">検索</button>
            </div>
        </div>
        <p class="lead">画像</p>
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select files...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileupload" type="file" name="photos[]" multiple>
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
        <button type="button" class="btn btn-primary">アルバムを作成</button>
    </form>
</div>
@endsection

@section('sideContents')
@endsection
