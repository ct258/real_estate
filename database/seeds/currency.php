<?php

use Illuminate\Database\Seeder;

class currency extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('currency')->insert([
            ['currency_name' => 'Vietnamese dong',
            'currency_rate'   => 1,
            'currency_symbol' => 'VND',
            ], [
            'currency_name'   => 'U.S dollar',
            'currency_rate'   => 0.00004,
            'currency_symbol' => 'USD',
            ], [
            'currency_name'   => 'Euro',
            'currency_rate'   => 0.04,
            'currency_symbol' => 'EUR',
            ],  [
            'currency_name'   => 'Japanese yen',
            'currency_rate'   => 4.53,
            'currency_symbol' => 'JPY',
            ],  [
            'currency_name'   => 'British pound',
            'currency_rate'   => 0.03,
            'currency_symbol' => 'GBP',
            ],
        ]);
    }
}
