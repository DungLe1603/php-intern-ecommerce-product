<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => '123456',
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => '123456',
            ]
        ];

        DB::table('users')->insert($data);
    }
}
