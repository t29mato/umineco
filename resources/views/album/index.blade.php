@extends('layouts.app')

@section('mainContents')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($albums as $album)
        <div class="card m-1" style="width: 18rem;">
            <img class="card-img-top" src="{{ Storage::url($album->albumPhotos[0]->filename) }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $album->title }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
