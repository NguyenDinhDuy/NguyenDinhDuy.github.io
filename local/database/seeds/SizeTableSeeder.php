<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
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
                'value' => 'S'
            ],
            [
                'value' => 'M'
            ],
            [
                'value' => 'L'
            ],
            [
                'value' => 'XL'
            ],
            [
                'value' => '28'
            ],
            [
                'value' => '30'
            ],
            [
                'value' => '32'
            ],
            [
                'value' => '34'
            ],
        ];
        DB::table('prod_size')->insert($data);
    }
}
