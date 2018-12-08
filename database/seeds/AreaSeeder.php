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
            '伊豆半島',
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
