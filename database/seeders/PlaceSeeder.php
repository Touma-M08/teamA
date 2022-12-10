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
    }
}
