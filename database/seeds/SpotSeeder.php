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
                array('name' => '焼尻島', 'name_kana' => 'やぎしりとう'), ),
            '東北' => array(
                array('name' => '女川', 'name_kana' => 'おながわ'),
                array('name' => '四島', 'name_kana' => 'よつしま'),
            ),
            '北陸' => array(
                array('name' => '佐渡島', 'name_kana' => 'さどしま'),
            ),
            '房総半島' => array(
                array('name' => '勝浦', 'name_kana' => 'かつうら'),
                array('name' => '行川', 'name_kana' => 'なめがわ'),
                array('name' => '伊戸', 'name_kana' => 'いと'),
                array('name' => '西川名', 'name_kana' => 'にわかわな'),
            ),
            '三浦半島' => array(
                array('name' => '城ヶ島', 'name_kana' => 'じょうがしま'),
            ),
            '湘南' => array(
                array('name' => '葉山', 'name_kana' => 'はやま'),
                array('name' => '逗子', 'name_kana' => 'ずし'),
                array('name' => '江ノ島', 'name_kana' => 'えのしま'),
                array('name' => '早川', 'name_kana' => 'はやかわ'),
                array('name' => '石橋', 'name_kana' => 'いしばし'),
                array('name' => '根府川', 'name_kana' => 'ねぶがわ'),
                array('name' => '江の浦', 'name_kana' => 'えのうら'),
                array('name' => '岩', 'name_kana' => 'いわ'),
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
            '伊豆諸島・小笠原諸島' => array(
                array('name' => '伊豆大島', 'name_kana' => 'いずおおしま'),
                array('name' => '利島', 'name_kana' => 'としま'),
                array('name' => '新島', 'name_kana' => 'にいじま'),
                array('name' => '式根島', 'name_kana' => 'しきねじま'),
                array('name' => '神津島', 'name_kana' => 'こうづしま'),
                array('name' => '三宅島', 'name_kana' => 'みやけじま'),
                array('name' => '八丈島', 'name_kana' => 'はちじょうじま'),
                array('name' => '小笠原', 'name_kana' => 'おがさわら'),
            ),
            '紀伊半島' => array(
                array('name' => '名前01', 'name_kana' => '読み仮名01'),
            ),
            '四国' => array(
                array('name' => '名前02', 'name_kana' => '読み仮名02'),
            ),
            '山陽' => array(
                array('name' => '名前03', 'name_kana' => '読み仮名03'),
            ),
            '九州' => array(
                array('name' => '名前04', 'name_kana' => '読み仮名04'),
            ),
            '薩南諸島' => array(
                array('name' => '名前05', 'name_kana' => '読み仮名05'),
            ),
            '沖縄本島' => array(
                array('name' => '名前06', 'name_kana' => '読み仮名06'),
            ),
            '沖縄離島' => array(
                array('name' => '名前07', 'name_kana' => '読み仮名07'),
            ),

        );

        // REFACTOR: merge AreaSeeder and SpotSeeder
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
