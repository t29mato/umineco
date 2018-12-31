<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumPhoto extends Model
{
    use SoftDeletes;

    protected $fillable = array(
        'album_id',
        'filename',
        'deleted_at',
        'memo',
    );

    protected $dates = ['deleted_at'];

    public static $rules = array(
        'album_id' => 'required|integer',
        'filename' => 'required',
    );

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
