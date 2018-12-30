<?php

namespace App\Http\Controllers;

use App\Album;
use App\AlbumPhoto;
use App\Area;
use App\Spot;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with(['spot.area', 'albumPhotos'])->take(10)->get();
        return view('album.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderBy('id', 'asc')->with('spots:area_id,id,name')->get(['id', 'name']);
        return view('album.create', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Album::$rules);
        $album = Album::create($request->all());
        foreach ($request->photo_names as $key => $photo_id) {
            AlbumPhoto::create([
                'memo' => $request->photo_memos[$key],
                'filename' => $request->photo_names[$key],
                'album_id' => $album->id
            ]);
        }
        return redirect('/album/' . $album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with(['spot.area', 'albumPhotos'])->find($id);
        return view('album.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }

    public function delete($id)
    {
        Album::find($id)->delete();
        AlbumPhoto::where(['album_id' => $id])->delete();
        return redirect()->route('album.index');
    }
}
