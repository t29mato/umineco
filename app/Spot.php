<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Area;

class Spot extends Model
{
    protected $fillable = array('name');

    public function area()
    {
        return $this->belongsTo('Area');
    }

    public static function getByArea($areaId) :array
    {
        return DB::table('spots')
            ->where('area_id', $areaid)
            ->orderBy('name_kana', 'asc')
            ->get();
    }

    // TODO: maybe should be delete./
    public static function getAreasAndSpots() :array
    {
        $areas = DB::table('areas')->orderBy('id', 'asc')->get(['id', 'name']);
        $areasAndSpots = [];
        foreach ($areas as $area) {
            $array = array(
                'id' => $area->id,
                'name' => $area->name,
            );
            if (is_null($areasAndSpots)) {
                $areasAndSpots = $array;
            } else {
                array_push($areasAndSpots, $array);
            }
        }
        for ($i = 0; $i < count($areasAndSpots); $i++) {
            $spots = DB::table('spots')->where('area_id', $areasAndSpots[$i]['id'])->get(['id', 'name']);
            if (array_key_exists('spots', $areasAndSpots[$i])) {
                array_push($areasAndSpots[$i]['spots'], $spots);
            } else {
                $areasAndSpots[$i]['spots'] = $spots;
            }
        }
        return $areasAndSpots;
    }
}
