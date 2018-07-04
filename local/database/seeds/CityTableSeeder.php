<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
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
                'name' => 'An Giang',
                'slug' => str_slug('An Giang'),
            ],
            [
                'name' => 'Bà Rịa – Vũng Tàu	',
                'slug' => str_slug('Bà Rịa – Vũng Tàu'),
            ],
            [
                'name' => 'Bạc Liêu',
                'slug' => str_slug('Bạc Liêu'),
            ],
            [
                'name' => 'Bắc Kạn',
                'slug' => str_slug('Bắc Kạn'),
            ],
            [
                'name' => 'Bắc Giang',
                'slug' => str_slug('Bắc Giang'),
            ],
            [
                'name' => 'Bắc Ninh',
                'slug' => str_slug('Bắc Ninh'),
            ],
            [
                'name' => 'Bến Tre',
                'slug' => str_slug('Bến Tre'),
            ],
            [
                'name' => 'Bình Dương',
                'slug' => str_slug('Bình Dương'),
            ],
            [
                'name' => 'Bình Định',
                'slug' => str_slug('Bình Định'),
            ],
            [
                'name' => 'Bình Phước',
                'slug' => str_slug('Bình Phước'),
            ],
            [
                'name' => 'Bình Thuận',
                'slug' => str_slug('Bình Thuận'),
            ],
            [
                'name' => 'Cà Mau',
                'slug' => str_slug('Cà Mau'),
            ],
            [
                'name' => 'Cao Bằng',
                'slug' => str_slug('Cao Bằng'),
            ],
            [
                'name' => 'Cần Thơ',
                'slug' => str_slug('Cần Thơ'),
            ],
            [
                'name' => 'Đà Nẵng',
                'slug' => str_slug('Đà Nẵng'),
            ],
            [
                'name' => 'Đắk Lắk',
                'slug' => str_slug('Đắk Lắk'),
            ],
            [
                'name' => 'Đắk Nông',
                'slug' => str_slug('Đắk Nông'),
            ],
            [
                'name' => 'Điện Biên',
                'slug' => str_slug('Điện Biên'),
            ],
            [
                'name' => 'Đồng Nai',
                'slug' => str_slug('Đồng Nai'),
            ],
            [
                'name' => 'Đồng Tháp',
                'slug' => str_slug('Đồng Tháp'),
            ],
            [
                'name' => 'Gia Lai',
                'slug' => str_slug('Gia Lai'),
            ],
            [
                'name' => 'Hà Giang',
                'slug' => str_slug('Hà Giang'),
            ],
            [
                'name' => 'Hà Nam',
                'slug' => str_slug('Hà Nam'),
            ],
            [
                'name' => 'Hà Nội',
                'slug' => str_slug('Hà Nội'),
            ],
            [
                'name' => 'Hà Tĩnh',
                'slug' => str_slug('Hà Tĩnh'),
            ],
            [
                'name' => 'Hải Dương',
                'slug' => str_slug('Hải Dương'),
            ],
            [
                'name' => 'Hải Phòng',
                'slug' => str_slug('Hải Phòng '),
            ],
            [
                'name' => 'Hòa Bình',
                'slug' => str_slug('Hòa Bình'),
            ],
            [
                'name' => 'Hồ Chí Minh',
                'slug' => str_slug('Hồ Chí Minh'),
            ],
            [
                'name' => 'Hậu Giang',
                'slug' => str_slug('Hậu Giang'),
            ],
            [
                'name' => 'Hưng Yên',
                'slug' => str_slug('Hưng Yên'),
            ],
            [
                'name' => 'Khánh Hòa',
                'slug' => str_slug('Khánh Hòa'),
            ],
            [
                'name' => 'Kiên Giang',
                'slug' => str_slug('Kiên Giang'),
            ],
            [
                'name' => 'Kon Tum',
                'slug' => str_slug('Kon Tum'),
            ],
            [
                'name' => 'Lai Châu',
                'slug' => str_slug('Lai Châu '),
            ],
            [
                'name' => 'Lào Cai',
                'slug' => str_slug('Lào Cai'),
            ],
            [
                'name' => 'Lạng Sơn',
                'slug' => str_slug('Lạng Sơn'),
            ],
            [
                'name' => 'Lâm Đồng',
                'slug' => str_slug('Lâm Đồng'),
            ],
            [
                'name' => 'Long An',
                'slug' => str_slug('Long An'),
            ],
            [
                'name' => 'Nam Định',
                'slug' => str_slug('Nam Định'),
            ],
            [
                'name' => 'Nghệ An',
                'slug' => str_slug('Nghệ An'),
            ],[
                'name' => 'Ninh Bình',
                'slug' => str_slug('Ninh Bình'),
            ],
            [
                'name' => 'Ninh Thuận',
                'slug' => str_slug('Ninh Thuận'),
            ],
            [
                'name' => 'Phú Thọ',
                'slug' => str_slug('Phú Thọ'),
            ],
            [
                'name' => 'Phú Yên',
                'slug' => str_slug('Phú Yên'),
            ],
            [
                'name' => 'Quảng Bình',
                'slug' => str_slug('Quảng Bình'),
            ],
            [
                'name' => 'Quảng Nam',
                'slug' => str_slug('Quảng Nam'),
            ],
            [
                'name' => 'Quảng Ngãi',
                'slug' => str_slug('Quảng Ngãi'),
            ],[
                'name' => 'Quảng Ninh',
                'slug' => str_slug('Quảng Ninh'),
            ],
            [
                'name' => 'Quảng Trị',
                'slug' => str_slug('Quảng Trị'),
            ],
            [
                'name' => 'Sóc Trăng',
                'slug' => str_slug('Sóc Trăng'),
            ],
            [
                'name' => 'Sơn La',
                'slug' => str_slug('Sơn La'),
            ],
            [
                'name' => 'Tây Ninh',
                'slug' => str_slug('Tây Ninh'),
            ],
            [
                'name' => 'Thái Bình',
                'slug' => str_slug('Thái Bình'),
            ],
            [
                'name' => 'Thái Nguyên',
                'slug' => str_slug('Thái Nguyên'),
            ],
            [
                'name' => 'Thanh Hóa',
                'slug' => str_slug('Thanh Hóa'),
            ],[
                'name' => 'Thừa Thiên-Huế',
                'slug' => str_slug('Thừa Thiên-Huế'),
            ],
            [
                'name' => 'Tiền Giang',
                'slug' => str_slug('Tiền Giang'),
            ],
            [
                'name' => 'Trà Vinh',
                'slug' => str_slug('Trà Vinh'),
            ],
            [
                'name' => 'Tuyên Quang',
                'slug' => str_slug('Tuyên Quang'),
            ],
            [
                'name' => 'Vĩnh Long',
                'slug' => str_slug('Vĩnh Long'),
            ],
            [
                'name' => 'Vĩnh Phúc',
                'slug' => str_slug('Vĩnh Phúc'),
            ],
            [
                'name' => 'Yên Bái',
                'slug' => str_slug('Yên Bái'),
            ],
        ];
        DB::table('cities')->insert($data);
    }
}
