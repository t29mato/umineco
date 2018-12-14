<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Spot extends Model
{
    protected $fillable = array('name');

    public static function getByArea($areaId) :array
    {
        return DB::table('spots')
            ->where('area_id', $areaid)
            ->orderBy('name_kana', 'asc')
            ->get();
    }

    public static function getAreasAndSpots() :array
    {
        $areas = DB::table('areas')->get(['id', 'name']);
        $spots = DB::table('spots')->get(['id', 'area_id', 'name']);
        $areasAndSpots = [];
        foreach ($areas as $area) {
            $array = array(
                'area_id' => $area->id,
                'area_name' => $area->name,
            );
            if (is_null($areasAndSpots)) {
                $areasAndSpots = $array;
            } else {
                array_push($areasAndSpots, $array);
            }
        }
        for ($i = 0; $i < count($areasAndSpots); $i++) {
            $spots = DB::table('spots')->where('area_id', $areasAndSpots[$i]['area_id'])->get(['id', 'name']);
            if (array_key_exists('spots', $areasAndSpots[$i])) {
                array_push($areasAndSpots[$i]['spots'], $spots);
            } else {
                $areasAndSpots[$i]['spots'] = $spots;
            }
        }
        return $areasAndSpots;
    }
}
