<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Spot extends Model
{
    protected $fillable = array('name');

    // TODO: doesnt use
    public static function searchByKeyword($keyword)
    {
        return DB::table('spots')
        ->where('name', 'like', '%' . $keyword . '%')
        ->limit(10)
        ->get();
    }

    public static function showByArea($areaId)
    {
        return DB::table('spots')
        ->where('area_id', $areaId)
        ->orderBy('name_kana', 'asc')
        ->get();
    }
}
