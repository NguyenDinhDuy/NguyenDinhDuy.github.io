<?php

use Illuminate\Database\Seeder;

class ProductSpecifiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'product_id' =>1,
                'prod_color_id' =>1 ,
                'prod_size_id'=>1,
                'quantity'=>5,
                'image'=>'1_2_05_2_04_007_217_01_10700041_01_thumb_294x441.jpg',
            ],
            [
                'product_id' =>1,
                'prod_color_id' =>1 ,
                'prod_size_id'=>2,
                'quantity'=>10,
                'image'=>'1_2_05_2_04_007_217_01_10700041_01_thumb_294x441.jpg',
            ],
            [
                'product_id' =>1,
                'prod_color_id' =>2 ,
                'prod_size_id'=>1,
                'quantity'=>5,
                'image'=>'1_2_05_2_02_004_217_01_10400014_01_thumb_294x440.jpg',
            ],
            [
                'product_id' =>1,
                'prod_color_id' =>2 ,
                'prod_size_id'=>2,
                'quantity'=>10,
                'image'=>'1_2_05_2_02_004_217_01_10400014_01_thumb_294x440.jpg',
            ],

            [
                'product_id' =>2,
                'prod_color_id' =>3 ,
                'prod_size_id'=>3,
                'quantity'=>15,
                'image'=>'1_2_06_2_06_002_118_01_11100013_01_thumb_294x441.jpg',
            ],
            [
                'product_id' =>1,
                'prod_color_id' =>3 ,
                'prod_size_id'=>4,
                'quantity'=>20,
                'image'=>'1_2_06_2_06_002_118_01_11100013_01_thumb_294x441.jpg',
            ],
            [
                'product_id' =>1,
                'prod_color_id' =>4 ,
                'prod_size_id'=>3,
                'quantity'=>15,
                'image'=>'1_2_06_2_04_001_118_01_20300020_01_thumb_294x441.jpg',
            ],
            [
                'product_id' =>1,
                'prod_color_id' =>4 ,
                'prod_size_id'=>4,
                'quantity'=>20,
                'image'=>'1_2_06_2_04_001_118_01_20300020_01_thumb_294x441.jpg',
            ],
        ];
        DB::table('prod_specifi')->insert($data);
    }
}
