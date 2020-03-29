<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class evaluate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; ++$i) {
            for ($j = 1; $j <= 6; ++$j) {
                DB::table('evaluate')->insert([
                [
                    'customer_id' => $j,
                    'real_estate_id' => $i,
                    'evaluate_rank' => rand(1, 5),
                    'evaluate_title' => str_random(50),
                    'evaluate_content' => str_random(100),
        ],
            ]);
            }
        }
    }
}
