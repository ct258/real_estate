<?php

use Illuminate\Database\Seeder;

class standard extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data1 = array([
            'standard_price_name' => 'Thỏa thuận',
            'standard_price_value1' => null,
            'standard_price_value2' => null,
            'form_id' => 2,
        ], [
            'standard_price_name' => '< 1 triệu',
            'standard_price_value1' => 100,
            'standard_price_value2' => 1000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '1 - 3 triệu',
            'standard_price_value1' => 1000000,
            'standard_price_value2' => 3000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '3 - 5 triệu ',
            'standard_price_value1' => 3000000,
            'standard_price_value2' => 5000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '5 - 10 triệu',
            'standard_price_value1' => 5000000,
            'standard_price_value2' => 10000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '10 - 40 triệu',
            'standard_price_value1' => 10000000,
            'standard_price_value2' => 40000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '40 - 70 triệu',
            'standard_price_value1' => 40000000,
            'standard_price_value2' => 70000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '70 - 100 triệu',
            'standard_price_value1' => 70000000,
            'standard_price_value2' => 100000000,
            'form_id' => 2,
        ], [
            'standard_price_name' => '> 100 triệu',
            'standard_price_value1' => 100,
            'standard_price_value2' => null,
            'form_id' => 2,
        ], [
            'standard_price_name' => 'Thỏa thuận',
            'standard_price_value1' => null,
            'standard_price_value2' => null,
            'form_id' => 1,
        ], [
            'standard_price_name' => '500 - 800 triệu',
            'standard_price_value1' => 500000000,
            'standard_price_value2' => 800000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '800 - 1 tỷ',
            'standard_price_value1' => 800000000,
            'standard_price_value2' => 1000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '1 - 2 tỷ',
            'standard_price_value1' => 1000000000,
            'standard_price_value2' => 2000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '2 - 3 tỷ',
            'standard_price_value1' => 2000000000,
            'standard_price_value2' => 3000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '3 - 5 tỷ',
            'standard_price_value1' => 3000000000,
            'standard_price_value2' => 5000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '5 - 7 tỷ',
            'standard_price_value1' => 5000000000,
            'standard_price_value2' => 7000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '7 - 10 tỷ',
            'standard_price_value1' => 7000000000,
            'standard_price_value2' => 10000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '10 - 20 tỷ',
            'standard_price_value1' => 10000000000,
            'standard_price_value2' => 20000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '20 - 30 tỷ',
            'standard_price_value1' => 20000000000,
            'standard_price_value2' => 30000000000,
            'form_id' => 1,
        ], [
            'standard_price_name' => '> 30 tỷ',
            'standard_price_value1' => 30000000000,
            'standard_price_value2' => null,
            'form_id' => 1,
        ],
    );
        DB::table('standard_price')->insert($data1);

        $data2 = array([
            'standard_acreage_name' => 'Chưa xác định',
            'standard_acreage_value1' => null,
            'standard_acreage_value2' => null,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '<= 30m2',
            'standard_acreage_value1' => 0,
            'standard_acreage_value2' => 30,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '30 - 50 m2',
            'standard_acreage_value1' => 30,
            'standard_acreage_value2' => 50,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '50 - 80 m2',
            'standard_acreage_value1' => 50,
            'standard_acreage_value2' => 80,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '80 - 100 m2',
            'standard_acreage_value1' => 80,
            'standard_acreage_value2' => 100,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '100 - 150 m2',
            'standard_acreage_value1' => 100,
            'standard_acreage_value2' => 150,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '150 - 200 m2',
            'standard_acreage_value1' => 150,
            'standard_acreage_value2' => 200,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '200 - 250 m2',
            'standard_acreage_value1' => 200,
            'standard_acreage_value2' => 250,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '250 - 300 m2',
            'standard_acreage_value1' => 250,
            'standard_acreage_value2' => 300,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '300 - 500 m2',
            'standard_acreage_value1' => 300,
            'standard_acreage_value2' => 500,
            'form_id' => 2,
        ], [
            'standard_acreage_name' => '>= 500 m2',
            'standard_acreage_value1' => 500,
            'standard_acreage_value2' => null,
            'form_id' => 2,
        ],
    );
        DB::table('standard_acreage')->insert($data2);
    }
}
