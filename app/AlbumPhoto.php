<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class AlbumPhoto extends Model
{
    protected $fillable = ['album_id', 'filename'];

    public function album()
    {
        return $this->belongsTo('Album');
    }
}
