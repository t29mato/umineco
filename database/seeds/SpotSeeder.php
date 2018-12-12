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
                array('name' => '日の出岬', 'name_kana' => 'ひのでみさき'),
                array('name' => '神恵内', 'name_kana' => 'かもえない'),
                array('name' => '松前小島', 'name_kana' => 'おしまこじま'),
                array('name' => '茂津多', 'name_kana' => 'もった'),
                array('name' => '室蘭', 'name_kana' => 'むろらん'),
                array('name' => '雄冬', 'name_kana' => 'おふゆ'),
                array('name' => '奥尻島', 'name_kana' => 'おくしりとう'),
                array('name' => '積丹半島', 'name_kana' => 'しゃこたんはんとう'),
                array('name' => '支笏湖', 'name_kana' => 'しこつこ'),
                array('name' => '知床ラウス', 'name_kana' => 'しれとこらうす'),
                array('name' => '知床ウトロ', 'name_kana' => 'しれとこうとろ'),
                array('name' => '焼尻島', 'name_kana' => 'やぎしりとう'),
            ),
            '伊豆半島' => array(
                array('name' => '伊豆山', 'name_kana' => 'いずさん'),
                array('name' => '熱海', 'name_kana' => 'あたみ'),
                array('name' => '初島', 'name_kana' => 'はつしま'),
                array('name' => '宇佐美', 'name_kana' => 'うさみ'),
                array('name' => '川奈', 'name_kana' => 'かわな'),
                array('name' => '富戸', 'name_kana' => 'ふと'),
                array('name' => '伊豆海洋公園', 'name_kana' => 'いずかいようこうえん'),
                array('name' => '北川', 'name_kana' => 'きたかわ'),
                array('name' => '熱川', 'name_kana' => 'あつかわ'),
                array('name' => '赤沢', 'name_kana' => 'あかざわ'),
                array('name' => '稲取', 'name_kana' => 'いなとり'),
                array('name' => '谷津', 'name_kana' => 'やつ'),
                array('name' => '菖蒲沢', 'name_kana' => 'しょうぶざわ'),
                array('name' => '獅子浜', 'name_kana' => 'ししはま'),
                array('name' => '平沢', 'name_kana' => 'ひらさわ'),
                array('name' => '大瀬崎', 'name_kana' => 'おおせざき'),
                array('name' => '井田', 'name_kana' => 'いた'),
                array('name' => '土肥', 'name_kana' => 'とい'),
                array('name' => '黄金崎', 'name_kana' => 'こんごうさき'),
                array('name' => '安良里', 'name_kana' => 'あらり'),
                array('name' => '田子', 'name_kana' => 'たご'),
                array('name' => '浮島', 'name_kana' => 'うきしま'),
                array('name' => '雲見', 'name_kana' => 'くもみ'),
                array('name' => '須崎', 'name_kana' => 'すざき'),
                array('name' => '神子元島', 'name_kana' => 'みこもと'),
                array('name' => '中木', 'name_kana' => 'なかぎ'),
            ),
        );

        foreach ($items as $area => $spots) {
            foreach ($spots as $spot) {
                DB::table('spots')->insert(
                    [
                        [
                            'area_id' => DB::table('areas')->where('name', $area)->value('id'),
                            'name' => $spot['name'],
                            'name_kana' => $spot['name_kana'],
                        ]
                    ]
                );
            }
        }
    }
}
