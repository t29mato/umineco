@extends('layouts.app')

@section('mainContents')
{{ Breadcrumbs::render('album.show', $album) }}

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
<div id="files" class="files row">
    @foreach ($album->albumPhotos as $photo)
    <div class="col-md-3">
        <a href="#" class="thumbnail">
            <img class="img-fluid" src="{{ Storage::url($photo->filename) }}">
        </a>
        <div class="input-group mb-3">
            {{ $photo->memo }}
        </div>
    </div>
    @endforeach
</div>
<button type="button" class="btn btn-outline-secondary m-2" data-toggle="modal" data-target="#exampleModal">アルバム削除</button>
<a href="{{ route('album.edit', ['id' => $album->id]) }}" class="btn btn-outline-primary m-2" data-target="#exampleModal">アルバム編集</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">アルバム削除</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        アルバムを削除すると他の人からアルバムが見えなくなります。
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">削除しない</button>
        <a href="{{ route('album.delete', ['id' => $album->id]) }}" class="btn btn-danger">本当に削除する</a>
      </div>
    </div>
  </div>
</div>
@endsection
@section('sideContents')
@endsection
