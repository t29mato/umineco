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
        $items = array(
            '北海道' => array(
                '日の出岬',
                '神恵内',
                '松前小島',
                '茂津多',
                '室蘭',
                '雄冬',
                '奥尻島',
                '積丹半島',
                '支笏湖',
                '知床ラウス',
                '知床ウトロ',
                '焼尻島',
            ),
            '伊豆半島' => array(
                '伊豆山',
                '熱海',
                '初島',
                '宇佐美',
                '川奈',
                '富戸',
                '伊豆海洋公園',
                '北川',
                '熱川',
                '赤沢',
                '稲取',
                '谷津',
                '菖蒲沢',
                '獅子浜',
                '平沢',
                '大瀬崎',
                '井田',
                '土肥',
                '黄金崎',
                '安良里',
                '田子',
                '浮島',
                '雲見',
                '須崎',
                '神子元島',
                '中木',
            )
        );

        foreach ($items as $area => $spots) {
            foreach ($spots as $spot) {
                DB::table('spots')->insert(
                    [
                        [
                            'area_id' => DB::table('areas')->where('name', $area)->value('id'),
                            'name' => $spot,
                        ]
                    ]
                );
            }
        }
    }
}
