<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'spot_id',
        'user_id',
        'started_at',
        'ended_at',
        'title',
        'memo',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    public static $rules = array(
        'spot_id' => 'required|integer',
        'started_at' => 'required|date',
        'ended_at' => 'required|date',
        'title' => 'required|max:50',
        'memo' => 'max:5000',
    );

    public function spot()
    {
        return $this->belongsTo('App\Spot');
    }

    public function albumPhotos()
    {
        return $this->hasMany('App\AlbumPhoto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
