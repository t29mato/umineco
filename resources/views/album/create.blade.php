@extends('layouts.app')

@section('script')
<script src="/js/fileupload/jquery.ui.widget.js"></script>
<script src="/js/fileupload/jquery.iframe-transport.js"></script>
<script src="/js/fileupload/jquery.fileupload.js"></script>
<script src="/js/fileupload/init.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h2>アルバム作成</h2>
            <div class="card">
                <div class="card-header">アルバムの設定</div>
                <div class="card-body">
                    <p class="lead">日程</p>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">〜</span>
                        </div>
                        <input type="date" class="form-control">
                    </div>
                    <p class="lead">場所</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="キーワードで検索" aria-label="キーワードで検索" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">検索</button>
                        </div>
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
                        <input type="text" class="form-control" placeholder="タイトルを入力" aria-label="タイトルを入力" aria-describedby="basic-addon1">
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
                        <input id="fileupload" type="file" name="files[]" multiple>
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>



                </div>
            </div>
        </div>
        <div class="col-md-3">
            TODO: サイドメニューインポート
        </div>
    </div>
</div>
@endsection
