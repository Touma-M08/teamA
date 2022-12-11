<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    private $categories = [
        "寿司",
        "和食",
        "ラーメン・麺類",
        "丼物",
        "粉物",
        "郷土料理",
        "中華",
        "イタリアン",
        "洋食",
        "フレンチ",
        "焼肉・ステーキ",
        "焼き鳥・串料理",
        "鍋",
        "しゃぶしゃぶ・すき焼き",
        "居酒屋",
        "カフェ",
        "スイーツ",
        "その他"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
