<?php

use Illuminate\Database\Seeder;

class NewDistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 11; $i <= 63; $i++) {
            $data = [
                [
                    'name' => 'Quận Ninh Kiều',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Quận Ô Môn',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Quận Bình Thủy',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Quận Cái Răng',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Quận Thốt Nốt',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Huyện Vĩnh Thanh',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Huyện Cờ Đỏ',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Huyện Phong Điền',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Huyện Thới Lai',
                    'city_id' => $i,
                ],
                [
                    'name' => 'Thành phố Long Xuyên',
                    'city_id' => $i,
                ],
            ];
            DB::table('districts')->insert($data);
        }


        $data1 = [
            [
                'code' => 'TRE123',
                'type' => 'fixed',
                'value' => 100000,
            ],
            [
                'code' => 'HTG426',
                'type' => 'percent',
                'percent_off' => 10,
            ],
            [
                'code' => 'LSD415',
                'type' => 'percent',
                'percent_off' => 15,
            ],
            [
                'code' => 'YOU987',
                'type' => 'fixed',
                'value' => 50000,
            ],
            [
                'code' => 'AKA951',
                'type' => 'percent',
                'percent_off' => 20,
            ],
        ];
        DB::table('coupons')->insert($data1);

    }
}
