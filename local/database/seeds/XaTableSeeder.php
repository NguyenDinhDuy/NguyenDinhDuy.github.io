<?php

use Illuminate\Database\Seeder;

class XaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 130; $i++) {
            $data = [
                [
                    'name' => 'Phường Phúc Xá',
                    'slug' => str_slug('Phường Phúc Xá'),
                    'district_id' => $i,
                ],

            ];

            DB::table('xas')->insert($data);
        }
    }
}
