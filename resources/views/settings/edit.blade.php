@extends('layouts.app')

@section('script')
@endsection

@section('mainContents')
{{ Breadcrumbs::render('settings.profile') }}
<h1>アカウント</h1>
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('settings.update') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>ニックネーム</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label>性別</label><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="gender1" name="gender" class="custom-control-input" value="1" @isset ($user->gender)
            @if ($user->gender === 1) checked="checked" @endif @endisset>
            <label class="custom-control-label" for="gender1">男性</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="gender2" name="gender" class="custom-control-input" value="2" @isset ($user->gender)
            @if ($user->gender === 2) checked="checked" @endif @endisset>
            <label class="custom-control-label" for="gender2">女性</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="gender3" name="gender" class="custom-control-input" value="3" @isset ($user->gender)
            @if ($user->gender === 3) checked="checked" @endif @endisset>
            <label class="custom-control-label" for="gender3">その他</label>
        </div>
    </div>

    <div class="form-group">
        <label>生まれ年</label>
        <select class="custom-select mb-3" id="birth_year" name="birth_year">
            <option selected>年齢を選択してください</option>
            @for ($i = 2019; $i > 1920; $i--)
            <option value="{{ $i }}" @if ($user->birth_year === $i) selected @endif>{{ $i }}年</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label>プロフィール</label>
        <textarea class="form-control" id="profile" name="profile" rows="3">
        @isset ($user->profile) $user->profile @endisset
    </textarea>
    </div>
    <div class="form-group">
        <label>ダイビング本数</label>
        <input type="text" class="form-control" id="dive_count" name="dive_count" placeholder="120本" value="@isset ($user->dive_count) {{ $user->dive_count }} @endisset">
    </div>
    <div class="form-group">
        <label>ダイビング始めた年</label>
        <select class="custom-select mb-3" id="dive_year" name="dive_year">
            <option selected>ダイビング始めた年を選択してください</option>
            @for ($i = 2019; $i > 1950; $i--)
            <option value="{{ $i }}" @if ($user->dive_year === $i) selected @endif>{{ $i }}年</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label>ライセンス</label>
        <input type="text" class="form-control" id="license" name="license" placeholder="" value="@isset ($user->license) {{ $user->license }} @endisset">
    </div>
    <div class="form-group">
        <label>所属団体</label>
        <input type="text" class="form-control" id="organization" name="organization" placeholder="" value="@isset ($user->organization) {{ $user->organization }} @endisset">
    </div>
    <button type="submit" class="btn btn-primary">プロフィールを更新</button>
</form>
@endsection

@section('sideContents')
@endsection
