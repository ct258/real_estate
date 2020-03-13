<?php

use Illuminate\Database\Seeder;

class unit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB:: table('unit')->insert([
            [
            'unit_id'    => 1,
            'unit_value' => 1,
            'form_id'    => 1, ],
            [
            'unit_id'    => 2,
            'unit_value' => 1000000,
            'form_id'    => 1,       ],
            [
            'unit_id'    => 3,
            'unit_value' => 1000000000,
            'form_id'    => 1,          ],
            [
            'unit_id'    => 4,
            'unit_value' => 100000,
            'form_id'    => 1,      ],
            [
            'unit_id'    => 5,
            'unit_value' => 1000000,
            'form_id'    => 1,       ],
            [
            'unit_id'    => 6,
            'unit_value' => 1,
            'form_id'    => 2, ],
            [
            'unit_id'    => 7,
            'unit_value' => 1000000,
            'form_id'    => 2,       ],
            [
            'unit_id'    => 8,
            'unit_value' => 1000000,
            'form_id'    => 2,       ],
            [
            'unit_id'    => 9,
            'unit_value' => 100000,
            'form_id'    => 2,      ],
            [
            'unit_id'    => 10,
            'unit_value' => 1000000,
            'form_id'    => 2,       ],
            [
            'unit_id'    => 11,
            'unit_value' => 1000,
            'form_id'    => 2,    ],
         ]);

        DB::table('unit_translation')->insert([[
            'unit_id'                 => 1,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Thỏa thuận', ], [
            'unit_id'                 => 1,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Agreement', ], [
            'unit_id'                 => 2,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Triệu', ], [
            'unit_id'                 => 2,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Million', ], [
            'unit_id'                 => 3,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Tỷ', ], [
            'unit_id'                 => 3,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Billion', ], [
            'unit_id'                 => 4,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Trăm nghìn/m2', ], [
            'unit_id'                 => 4,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Hundred thousand/m2', ], [
            'unit_id'                 => 5,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Triệu/m2', ], [
            'unit_id'                 => 5,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Million/m2', ], [
            'unit_id'                 => 6,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Thỏa thuận', ], [
            'unit_id'                 => 6,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Agreement', ], [
            'unit_id'                 => 7,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Trăm nghìn/tháng', ], [
            'unit_id'                 => 7,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Hundred thousand/month', ], [
            'unit_id'                 => 8,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Triệu/tháng', ], [
            'unit_id'                 => 8,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Million/month', ], [
            'unit_id'                 => 9,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Trăm nghìn/m2/tháng', ], [
            'unit_id'                 => 9,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Hundred thousand/m2/month', ], [
            'unit_id'                 => 10,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Triệu/m2/tháng', ], [
            'unit_id'                 => 10,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Million/m2/month', ], [
            'unit_id'                 => 11,
            'unit_translation_locale' => 'vi',
            'unit_translation_name'   => 'Nghìn/m2/tháng', ], [
            'unit_id'                 => 11,
            'unit_translation_locale' => 'en',
            'unit_translation_name'   => 'Thousand/m2/month', ],
         ]);
    }
}
