<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
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
                'name' => 'Nguyễn Đình Duy',
                'email' => 'toiladuy22@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '0987654321',
                'level' => 1,
            ],
        ];
        DB::table('admins')->insert($data);
    }
}
