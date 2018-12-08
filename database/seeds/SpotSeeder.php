<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = array(
            'izu-hanto' => '伊豆半島',
        );

        $names = array(
            [
                'area' => '伊豆半島',
                'spot' => '伊豆半島'
            ]
        );

        $areaName = '伊豆半島';
        $spotName = '伊豆山';
        $areaId = DB::table('areas')->where('name', $areaName)->value('id');

        DB::table('spots')->insert(
            [
                [
                    'area_id' => $areaId,
                    'name' => $spotName,
                ]
            ]
        );
    }
}
