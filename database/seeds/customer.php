<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class customer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        //customer
        for ($i = 4; $i <= 10; ++$i) {
            DB::table('customer')->insert([
                'account_id' => $i,
                // 'customer_code'          => str_random(10),
                'customer_name'          => $faker->unique()->name,
                'customer_email'         => $faker->unique()->safeEmail,
                'customer_tel'           => rand(1000000000, 9999999999),
                'customer_address'       => $faker->address,
                'customer_identity_card' => rand(1000000000, 9999999999),
                'rank_id'                => rand(1, 5),
                'ward_id'                => rand(1, 11283),
            ]);
            DB::table('cart')::insert([
                'payment_id'=>1,
            ]);
        }
    }
}
