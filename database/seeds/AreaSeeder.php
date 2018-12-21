<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array(
            '北海道',
            '東北',
            '北陸',
            '房総半島',
            '三浦半島',
            '湘南',
            '伊豆半島',
            '伊豆諸島',
            '紀伊半島',
            '四国',
            '山陽',
            '九州',
            '薩南諸島',
            '沖縄本島',
            '沖縄離島',
        );
        foreach ($names as $name) {
            DB::table('areas')->insert(
                [
                    'name' => $name,
                ]
            );
        }
    }
}
