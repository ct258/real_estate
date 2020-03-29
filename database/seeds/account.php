<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class account extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        //Role
        $data1 = array([
            'role_level' => 1,
            'role_name' => 'Admin',
            ], [
            'role_level' => 2,
            'role_name' => 'Staff',
            ], [
            'role_level' => 3,
            'role_name' => 'Customer',
            ], [
            'role_level' => 4,
            'role_name' => 'Collaborator',
            ],
        );
        DB:: table('role')->insert($data1);
        //End role

        //Account
        $data2 = array([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ], [
            'username' => 'staff',
            'password' => Hash::make('staff'),
            'role_id' => 2,
        ], [
            'username' => 'collaborator',
            'password' => Hash::make('collaborator'),
            'role_id' => 3,
        ]);
        DB::table('account')->insert($data2);

        for ($i = 4; $i <= 10; ++$i) {
            DB::table('account')->insert([
                'username' => 'customer'.$i,
                'password' => Hash::make('customer'),
                'role_id' => 3,
            ]);
        }
        //End account

        //end customer
        //staff
        DB::table('staff')->insert([
            'account_id' => 2,
            'staff_code' => str_random(10),
            'staff_name' => $faker->unique()->name,
            'staff_email' => $faker->unique()->safeEmail,
            'staff_tel' => $faker->phoneNumber,
            'staff_address' => $faker->address,
        ]);
        //end staff
    }
}
