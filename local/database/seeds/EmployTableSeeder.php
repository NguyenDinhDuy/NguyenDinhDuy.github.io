<?php

use Illuminate\Database\Seeder;

class EmployTableSeeder extends Seeder
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
                'name' => 'Nguyễn Khương Duy',
                'email' => 'nguyenkhuongduy@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '0987654321',
                'level' => 2,
            ],
            [
                'name' => 'Nguyễn Văn Nam',
                'email' => 'namntt223@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '0987654321',
                'level' => 2,
            ],
            [
                'name' => 'Nguyễn Đình Đạt',
                'email' => 'nguyendinhdat@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '0987654321',
                'level' => 2,
            ],
        ];
        DB::table('admins')->insert($data);
    }
}
