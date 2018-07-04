<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                'cate_name' => 'Sơ mi',
                'cate_slug' => str_slug('Sơ mi'),
            ],
            [
                'cate_name' => 'Áo phông',
                'cate_slug' => str_slug('Áo phông'),
            ],
            [
                'cate_name' => 'Áo khoác',
                'cate_slug' => str_slug('Áo khoác'),
            ],
            [
                'cate_name' => 'Áo nỉ',
                'cate_slug' => str_slug('Áo nỉ'),
            ],
            [
                'cate_name' => 'Quần short',
                'cate_slug' => str_slug('Quần short'),
            ],
            [
                'cate_name' => 'Quần dài',
                'cate_slug' => str_slug('Quần dài'),
            ],
        ];
        DB::table('categories')->insert($data);
    }
}