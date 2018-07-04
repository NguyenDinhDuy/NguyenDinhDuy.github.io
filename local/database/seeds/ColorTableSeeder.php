<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
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
                'value' => 'Đỏ',
                'slug' => str_slug('Đỏ'),
            ],
            [
                'value' => 'Đỏ Boocdo',
                'slug' => str_slug('Đỏ Boocdo'),
            ],
            [
                'value' => 'Xanh da trời',
                'slug' => str_slug('Xanh da trời'),
            ],
            [
                'value' => 'Xanh lá cây',
                'slug' => str_slug('Xanh lá cây'),
            ],
            [
                'value' => 'Xanh rêu',
                'slug' => str_slug('Xanh rêu'),
            ],
            [
                'value' => 'Xanh navy',
                'slug' => str_slug('Xanh navy'),
            ],
            [
                'value' => 'Vàng',
                'slug' => str_slug('Vàng'),
            ],
            [
                'value' => 'Da cam',
                'slug' => str_slug('Da cam'),
            ],
            [
                'value' => 'Nâu',
                'slug' => str_slug('Nâu'),
            ],
            [
                'value' => 'Đen',
                'slug' => str_slug('Đen'),
            ],
            [
                'value' => 'Trắng',
                'slug' => str_slug('Trắng'),
            ],
            [
                'value' => 'Xám',
                'slug' => str_slug('Xám'),
            ],
            [
                'value' => 'Hồng đào',
                'slug' => str_slug('Hồng đào'),
            ],
        ];
        DB::table('prod_color')->insert($data);
    }
}