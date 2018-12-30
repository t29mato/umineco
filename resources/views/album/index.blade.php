@extends('layouts.app')

@section('mainContents')
<div class="container">
    <div class="row">
        @foreach ($albums as $i => $album)
        <div class="card m-1" style="width: 16rem;">
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

            <div class="card-body">
                <p class="card-text">
                    場所：{{ $album->spot->area->name . ' / ' . $album->spot->name }}<br>
                    作成日：{{ $album->created_at }} <br>
                    <a href="{{ route('album.show', ['id' => $album->id]) }}">{{ $album->title }}</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="http://localhost:8000/storage/photos/qNVWLIQ3WUybStQVTZf5JeHl4yLdoM2V92hSgqy2.jpeg"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="http://localhost:8000/storage/photos/qNVWLIQ3WUybStQVTZf5JeHl4yLdoM2V92hSgqy2.jpeg"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="http://localhost:8000/storage/photos/qNVWLIQ3WUybStQVTZf5JeHl4yLdoM2V92hSgqy2.jpeg"
                    alt="Third slide">
            </div>
        </div>
    </div>

</div>
@endsection
