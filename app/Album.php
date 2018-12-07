<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title'];

    public static $rules = array(
        'title' => 'required',
    );
}
