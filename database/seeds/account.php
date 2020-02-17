<?php

use Illuminate\Database\Seeder;

class account extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data1 = array([
            'role_level' => 1,
            'role_name' => 'test',
        ]);
        DB::table('role')->insert($data1);
        $data2 = array([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);
        DB::table('account')->insert($data2);
    }
}
