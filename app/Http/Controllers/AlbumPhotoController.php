<?php

namespace App\Http\Controllers;

use App\AlbumPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function upload(Request $request)
    {
        $photos = [];
        foreach ($request->photos as $photo) {
            $filename = $photo->store('public/photos');
            $photo_object = new \stdClass();
            $photo_object->name = $filename;
            $photo_object->url = Storage::url($filename);
            $photos[] = $photo_object;
        }
        return response()->json(array('files' => $photos), 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AlbumPhotos  $albumPhotos
     * @return \Illuminate\Http\Response
     */
    public function show(AlbumPhotos $albumPhotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AlbumPhotos  $albumPhotos
     * @return \Illuminate\Http\Response
     */
    public function edit(AlbumPhotos $albumPhotos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AlbumPhotos  $albumPhotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlbumPhotos $albumPhotos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AlbumPhotos  $albumPhotos
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlbumPhotos $albumPhotos)
    {
        //
    }
}
