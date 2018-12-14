<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'spot_id',
        'started_at',
        'ended_at',
        'title',
        'memo',
    ];

    public static $rules = array(
        'spot_id' => 'required|integer',
        'started_at' => 'required|date',
        'ended_at' => 'required|date',
        'title' => 'required|max:50',
        'memo' => 'max:5000',
    );
}
