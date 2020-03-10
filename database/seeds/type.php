<?php

use Illuminate\Database\Seeder;

class type extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 16; ++$i) {
            DB:: table('type')->insert([
                'type_id' => $i,
                'form_id' => 1,
            ], [
                'type_id' => 16 - $i,
                'form_id' => 2,
            ]);
        }
        DB:: table('type_translation')->insert([
            [
                'type_id'                 => 1,
                'type_translation_name'   => 'Bán căn hộ chung cư',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 2,
                'type_translation_name'   => 'Bán nhà riêng',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 3,
                'type_translation_name'   => 'Bán nhà biệt thự liền kề',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 4,
                'type_translation_name'   => 'Bán nhà mặt phố',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 5,
                'type_translation_name'   => 'Bán đất nền dự án',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 6,
                'type_translation_name'   => 'Bán đất',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 7,
                'type_translation_name'   => 'Bán trang trại, khu nghỉ dưỡng',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 8,
                'type_translation_name'   => 'Bán kho, nhà xưởng',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 9,
                'type_translation_name'   => 'Bán loại bất động sản khác',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 10,
                'type_translation_name'   => 'Cho thuê căn hộ chung cư',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 11,
                'type_translation_name'   => 'Cho thuê nhà riêng',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 12,
                'type_translation_name'   => 'Cho thuê nhà mặt phố',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 13,
                'type_translation_name'   => 'Cho thuê nhà trọ, phòng trọ',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 14,
                'type_translation_name'   => 'Cho thuê cửa hàng, ki ốt',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 15,
                'type_translation_name'   => 'Cho thuê kho, nhà xưởng, đất',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 16,
                'type_translation_name'   => 'Cho thuê loại bất động sản khác',
                'type_translation_locale' => 'vi',
            ],
            [
                'type_id'                 => 1,
                'type_translation_name'   => 'Sell apartments',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 2,
                'type_translation_name'   => 'Sell a private house',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 3,
                'type_translation_name'   => 'Sell adjacent villas',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 4,
                'type_translation_name'   => 'Sell house on the street',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 5,
                'type_translation_name'   => 'Land for sale project',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 6,
                'type_translation_name'   => 'Sell land',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 7,
                'type_translation_name'   => 'Selling farm resort',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 8,
                'type_translation_name'   => 'Sell warehouse, factory',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 9,
                'type_translation_name'   => 'Sell other real estate types',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 10,
                'type_translation_name'   => 'Renting apartments',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 11,
                'type_translation_name'   => 'Private house for rent',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 12,
                'type_translation_name'   => 'House for rent on the street',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 13,
                'type_translation_name'   => 'Rental inn, motel room',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 14,
                'type_translation_name'   => 'Rental shops, kiosks',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 15,
                'type_translation_name'   => 'Warehouse, factory, land for rent',
                'type_translation_locale' => 'en',
            ],
            [
                'type_id'                 => 16,
                'type_translation_name'   => 'Renting other real estate types',
                'type_translation_locale' => 'en',
            ],
         ]);
    }
}
