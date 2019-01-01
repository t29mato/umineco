@extends('layouts.app')

@section('mainContents')
{{ Breadcrumbs::render('album.index') }}
<h1>みんなのアルバム</h1>
<div class="row">
    @foreach ($albums as $i => $album)
    <div class="card m-1" style="width: 16rem;">
        <div class="card-header">{{ $album->user->name }}<br>{{ $album->created_at->format('Y-m-d') }}</div>
        <div id="carouselExampleControls-{{ $i }}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($album->albumPhotos as $j => $albumPhoto)
                <div class="carousel-item @if($j === 0) active @endif">
                    <img class="d-block w-100" src="{{ Storage::url($albumPhoto->filename) }}">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls-{{ $i }}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls-{{ $i }}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <a href="{{ route('album.show', ['id' => $album->id]) }}">
            <div class="card-body">
                <p class="card-text">
                    {{ $album->title }}<br>
                    {{ $album->spot->area->name . ' / ' . $album->spot->name }}
                </p>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
