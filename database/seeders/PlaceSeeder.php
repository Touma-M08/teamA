<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'Y',
            'email' => 'a',
            'password'=>'Y',
            
            ]);
        DB::table('places')->insert([
                'name' => 'a',
                'address' => '命名はデータを基準に考える',
                'tel' => '00000',
                'lat' => '00',
                'lng' => '00',
                'detail' => '時給1000円',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
        DB::table('places')->insert([
                'name' => 'b',
                'address' => '命名はデータを基準に考える',
                'tel' => '00000',
                'lat' => '00',
                'lng' => '00',
                'detail' => '時給1000円',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
        DB::table('places')->insert([
                'name' => 'c',
                'address' => '命名はデータを基準に考える',
                'tel' => '00000',
                'lat' => '00',
                'lng' => '00',
                'detail' => '時給1000円',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('reviews')->insert([
                "review" => "aaaaaa",
                "user_id" => 1,
                "place_id" => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('reviews')->insert([
                "review" => "bbbbbb",
                "user_id" => 1,
                "place_id" => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            "comment" => "aa",
            "user_id" => 1,
            "place_id" => 1
        ]);
        
        DB::table('comments')->insert([
            "comment" => "bb",
            "user_id" => 1,
            "place_id" => 2
        ]);
        
    }
}
