<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    protected $fillable = array(
        'album_id',
        'filename',
    );

    public static $rules = array(
        'filename' => 'required',
    );

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
