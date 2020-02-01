<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class taoadmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $data = array([
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        DB::table('taikhoan')->insert($data);
    }
}
