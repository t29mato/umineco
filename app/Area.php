<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function spots()
    {
        return $this->hasMany('App\Spot');
    }
}
