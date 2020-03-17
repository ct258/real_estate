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
            ['currency_name' => 'VND',
            'currency_rate' => 1,
            'currency_symbol' => 'đ',
            ], [
            'currency_name' => 'USD',
            'currency_rate' => 0.00004,
            'currency_symbol' => '$',
            ], [
            'currency_name' => 'EUR',
            'currency_rate' => 0.04,
            'currency_symbol' => '€',
            ],  [
            'currency_name' => 'JPY',
            'currency_rate' => 4.53,
            'currency_symbol' => '¥',
            ],  [
            'currency_name' => 'GBP',
            'currency_rate' => 0.03,
            'currency_symbol' => '£',
            ],
        ]);
    }
}
